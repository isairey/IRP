<?php
require('../../fpdf/fpdf.php');
require_once __DIR__ . '/../db/config.php';

if (!isset($_GET['id_seminario'])) {
    die('Falta el ID del seminario.');
}

$idSeminario = $_GET['id_seminario'];

// Buscar asistentes que sí asistieron
$sql = "
    SELECT ID_Persona, TipoPersona, FechaRegistro
    FROM asistencias_seminario
    WHERE ID_Seminario = :id AND Asistio = 1
";
$stmt = $conn->prepare($sql);
$stmt->execute([':id' => $idSeminario]);
$asistencias = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Crear PDF
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, utf8_decode('Asistentes con Asistencia'), 0, 1, 'C');
$pdf->Ln(5);

// Encabezado
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(10, 10, '#', 1, 0, 'C');
$pdf->Cell(60, 10, 'Nombre', 1, 0, 'C');
$pdf->Cell(60, 10, 'Email', 1, 0, 'C');
$pdf->Cell(30, 10, 'Tipo', 1, 0, 'C');
$pdf->Cell(30, 10, 'Fecha Registro', 1, 1, 'C');

$pdf->SetFont('Arial', '', 10);
$contador = 1;

foreach ($asistencias as $a) {
    $nombre = "Desconocido";
    $email = "";

    // Consultar según el tipoPersona
    switch ($a['TipoPersona']) {
        case 'usuario':
            $q = $conn->prepare("SELECT Nombre, ApellidoPaterno, ApellidoMaterno, Email FROM usuario WHERE ID = ?");
            break;
        case 'personal':
            $q = $conn->prepare("SELECT Nombre, ApellidoPaterno, ApellidoMaterno, Email FROM personal WHERE ID_Personal = ?");
            break;
        case 'participante':
            $q = $conn->prepare("SELECT Nombre, ApellidoPaterno, ApellidoMaterno, Email FROM participante WHERE ID_Participante = ?");
            break;
        default:
            $q = null;
    }

    if ($q) {
        $q->execute([$a['ID_Persona']]);
        $info = $q->fetch(PDO::FETCH_ASSOC);
        if ($info) {
            $nombre = $info['Nombre'] . " " . $info['ApellidoPaterno'] . " " . $info['ApellidoMaterno'];
            $email = $info['Email'];
        }
    }

    // Agregar al PDF
    $pdf->Cell(10, 8, $contador++, 1, 0, 'C');
    $pdf->Cell(60, 8, utf8_decode($nombre), 1);
    $pdf->Cell(60, 8, utf8_decode($email), 1);
    $pdf->Cell(30, 8, utf8_decode($a['TipoPersona']), 1, 0, 'C');
    $pdf->Cell(30, 8, date('d/m/Y', strtotime($a['FechaRegistro'])), 1, 1, 'C');
}

$pdf->Output('I', 'asistencia_seminario.pdf');
?>
