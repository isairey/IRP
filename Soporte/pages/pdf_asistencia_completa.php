<?php
require('../../fpdf/fpdf.php');
require_once __DIR__ . '/../db/config.php';

if (!isset($_GET['id_diplomado'])) {
    die('Falta el ID del diplomado.');
}

$idDiplomado = $_GET['id_diplomado'];

// Contar número total de secciones del diplomado
$sqlSecciones = "SELECT COUNT(*) AS total FROM secciones WHERE DiplomadoID = ?";
$stmt = $conn->prepare($sqlSecciones);
$stmt->execute([$idDiplomado]);
$totalSecciones = $stmt->fetchColumn();

// Buscar asistentes con asistencia completa
$sql = "
    SELECT 
        a.id_usu,
        a.TipoUsuario,
        COUNT(DISTINCT a.id_seccion) AS AsistenciasCompletas
    FROM asistencias a
    WHERE a.ID_Diplomado = :id
      AND a.presente = 1
    GROUP BY a.id_usu, a.TipoUsuario
    HAVING COUNT(DISTINCT a.id_seccion) = :total
";

$stmt = $conn->prepare($sql);
$stmt->execute([
    ':id' => $idDiplomado,
    ':total' => $totalSecciones
]);
$asistentes = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Crear PDF
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, utf8_decode('Asistentes con Asistencia Completa'), 0, 1, 'C');
$pdf->Ln(5);

// Encabezado
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(10, 10, '#', 1, 0, 'C');
$pdf->Cell(60, 10, 'Nombre', 1, 0, 'C');
$pdf->Cell(60, 10, 'Email', 1, 0, 'C');
$pdf->Cell(30, 10, 'Tipo', 1, 0, 'C');
$pdf->Cell(30, 10, 'Asistencias', 1, 1, 'C');

$pdf->SetFont('Arial', '', 10);
$contador = 1;

foreach ($asistentes as $a) {
    $nombre = "Desconocido";
    $email = "";

    // Consultar según el tipo
    switch ($a['TipoUsuario']) {
        case 'usuario':
            $q = $conn->prepare("SELECT Nombre, Email FROM usuario WHERE ID = ?");
            break;
        case 'personal':
            $q = $conn->prepare("SELECT Nombre, Email FROM personal WHERE ID_Personal = ?");
            break;
        case 'participante':
            $q = $conn->prepare("SELECT Nombre, Email FROM participante WHERE ID_Participante = ?");
            break;
        default:
            $q = null;
    }

    if ($q) {
        $q->execute([$a['id_usu']]);
        $info = $q->fetch(PDO::FETCH_ASSOC);
        if ($info) {
            $nombre = $info['Nombre'];
            $email = $info['Email'];
        }
    }

    // Agregar al PDF
    $pdf->Cell(10, 8, $contador++, 1, 0, 'C');
    $pdf->Cell(60, 8, utf8_decode($nombre), 1);
    $pdf->Cell(60, 8, utf8_decode($email), 1);
    $pdf->Cell(30, 8, utf8_decode($a['TipoUsuario']), 1, 0, 'C');
    $pdf->Cell(30, 8, $a['AsistenciasCompletas'], 1, 1, 'C');
}

$pdf->Output('I', 'asistencia_completa.pdf');
?>
