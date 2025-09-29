<?php
require_once __DIR__ . '/../db/config.php';
require 'vendor/autoload.php'; // Asegúrate que apunte a tu autoload de Composer

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Crear nuevo documento
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Encabezados
$encabezados = [
    'ID CASO ANUAL',
    'NUM DE AÑO',
    'NUM. DE ALERTA DE GÉNERO',
    'FECHA',
    'NOMBRE DE LA VÍCTIMA',
    'EDAD',
    'RANGO DE EDAD',
    'OCUPACIÓN',
    'LUGAR DE ORIGEN',
    'LUGAR DE LOS HECHOS',
    'MUNICIPIO',
    'CLAVE DEL MUNICIPIO',
    'REGIÓN',
    'ALERTA DE GÉNERO',
    'MUNICIPIO CON ALERTA DE GÉNERO',
    'DESAPARECIDA',
    'FECHA DE DESAPARICIÓN',
    'LUGAR EN DONDE FUE LOCALIZADO EL CUERPO',
    'FORMA EN QUE SE ENCONTRÓ EL CUERPO',
    'FORMA DE MUERTE',
    'TIPO DE ARMA',
    'CAUSAS',
    'NOMBRE DEL AGRESOR',
    'PARENTESCO',
    'SITUACIÓN JURÍDICA',
    'NUM. DE HIJAS/OS',
    'EDAD HIJAS/OS',
    'FUENTE PERIODÍSTICA',
    'AUTOR DE LA NOTA PERIODÍSTICA',
    'LINK DE LA NOTA'
];

// Escribir encabezados en la fila 1
$col = 1;
foreach ($encabezados as $titulo) {
    $sheet->setCellValueByColumnAndRow($col, 1, $titulo);
    $col++;
}

// Poner en negritas la fila de encabezados
$sheet->getStyle('A1:' . $sheet->getHighestColumn() . '1')->getFont()->setBold(true);

// Función rango de edad
function rangoEdad($edad) {
    if ($edad === null || $edad === '') return 'No especificado';
    $edad = intval($edad);
    if ($edad < 12) return 'Niñez';
    if ($edad < 18) return 'Adolescencia';
    if ($edad < 30) return 'Joven';
    if ($edad < 60) return 'Adultez';
    return 'Adulto Mayor';
}

// Consulta a la BD
$query = "SELECT * FROM Feminicidios ORDER BY FechaHecho DESC";
$stmt = $conn->prepare($query);
$stmt->execute();
$feminicidios = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Escribir datos desde la fila 2
$fila = 2;
foreach ($feminicidios as $f) {
    $sheet->setCellValue("A$fila", $f['IDCasoAnual']);
    $sheet->setCellValue("B$fila", $f['Numa']); // num de año
    $sheet->setCellValue("C$fila", $f['ID']);   // num total feminicidios (ID incremental)
    $sheet->setCellValue("D$fila", $f['FechaHecho']);
    $sheet->setCellValue("E$fila", $f['NombreVictima'] . ' ' . $f['ApellidoPaterno'] . ' ' . $f['ApellidoMaterno']);
    $sheet->setCellValue("F$fila", $f['Edad']);
    $sheet->setCellValue("G$fila", rangoEdad($f['Edad']));
    $sheet->setCellValue("H$fila", $f['Ocupacion']);
    $sheet->setCellValue("I$fila", $f['LugarOrigen']);
    $sheet->setCellValue("J$fila", $f['Calle'] . ' ' . $f['Numero']);
    $sheet->setCellValue("K$fila", $f['Municipio']);
    $sheet->setCellValue("L$fila", $f['ClaveMunicipio']);
    $sheet->setCellValue("M$fila", $f['Region']);
    $sheet->setCellValue("N$fila", $f['AlertaGenero'] == 1 ? 'Sí' : 'No');
    $sheet->setCellValue("O$fila", $f['AlertaGenero'] == 1 ? $f['Municipio'] : '-');
    $sheet->setCellValue("P$fila", $f['Desaparecida']);
    $sheet->setCellValue("Q$fila", $f['FechaDesaparicion']);
    $sheet->setCellValue("R$fila", $f['LugarEncontradoCuerpo']);
    $sheet->setCellValue("S$fila", $f['DescripcionCuerpo']);
    $sheet->setCellValue("T$fila", $f['FormaMuerte']);
    $sheet->setCellValue("U$fila", $f['TipoArma']);
    $sheet->setCellValue("V$fila", $f['Causas']);
    $sheet->setCellValue("W$fila", $f['NombreAgresor']);
    $sheet->setCellValue("X$fila", $f['ParentescoAgresor']);
    $sheet->setCellValue("Y$fila", $f['SituacionJuridica']);
    $sheet->setCellValue("Z$fila", $f['NumDescendencia']);
    $sheet->setCellValue("AA$fila", $f['Descendencia']);
    $sheet->setCellValue("AB$fila", $f['FuentePeriodistica']);
    $sheet->setCellValue("AC$fila", $f['AutorNota']);
    $sheet->setCellValue("AD$fila", $f['LinkNota']);
    $fila++;
}

// Ajustar ancho automático de columnas
foreach (range('A', $sheet->getHighestColumn()) as $columna) {
    $sheet->getColumnDimension($columna)->setAutoSize(true);
}

// Enviar archivo al navegador
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="feminicidios.xlsx"');
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;
