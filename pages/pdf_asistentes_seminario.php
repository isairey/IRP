<?php
require('../fpdf/fpdf.php');
require_once __DIR__ . '/../db/config.php';

if (!isset($_GET['id_seminario'])) {
    die('Falta el ID del seminario.');
}

$idSeminario = $_GET['id_seminario'];

// Consulta combinada para obtener todos los asistentes sin importar el tipo
$sql = "
(
    SELECT 
        CONCAT(u.Nombre, ' ', u.ApellidoPaterno, ' ', u.ApellidoMaterno) AS Nombre,
        u.Email,
        a.FechaAsignacion,
        'Usuario' AS Tipo
    FROM asignaciones_seminario a
    INNER JOIN usuario u ON a.ID_Persona = u.ID
    WHERE a.ID_Seminario = :id AND a.Tipo = 'usuario'
)
UNION ALL
(
    SELECT 
        CONCAT(p.Nombre, ' ', p.ApellidoPaterno, ' ', p.ApellidoMaterno) AS Nombre,
        p.Email,
        a.FechaAsignacion,
        'Personal' AS Tipo
    FROM asignaciones_seminario a
    INNER JOIN personal p ON a.ID_Persona = p.ID_Personal
    WHERE a.ID_Seminario = :id AND a.Tipo = 'personal'
)
UNION ALL
(
    SELECT 
        CONCAT(pa.Nombre, ' ', pa.ApellidoPaterno, ' ', pa.ApellidoMaterno) AS Nombre,
        pa.Email,
        a.FechaAsignacion,
        'Participante' AS Tipo
    FROM asignaciones_seminario a
    INNER JOIN participante pa ON a.ID_Persona = pa.ID_Participante
    WHERE a.ID_Seminario = :id AND a.Tipo = 'participante'
)
ORDER BY Nombre ASC
";

$stmt = $conn->prepare($sql);
$stmt->execute([':id' => $idSeminario]);
$asistentes = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Crear PDF
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'Lista de Asistentes del Seminario', 0, 1, 'C');
$pdf->Ln(5);

// Encabezado de tabla
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(10, 10, '#', 1);
$pdf->Cell(60, 10, 'Nombre', 1);
$pdf->Cell(60, 10, 'Email', 1);
$pdf->Cell(30, 10, 'Tipo', 1);
$pdf->Cell(30, 10, 'Asignado', 1);
$pdf->Ln();

$pdf->SetFont('Arial', '', 10);
$contador = 1;

foreach ($asistentes as $a) {
    $pdf->Cell(10, 8, $contador++, 1);
    $pdf->Cell(60, 8, utf8_decode($a['Nombre']), 1);
    $pdf->Cell(60, 8, utf8_decode($a['Email']), 1);
    $pdf->Cell(30, 8, utf8_decode($a['Tipo']), 1);
    $pdf->Cell(30, 8, date('d/m/Y', strtotime($a['FechaAsignacion'])), 1);
    $pdf->Ln();
}

$pdf->Output('I', 'asistentes_seminario.pdf');
?>
