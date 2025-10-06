<?php
require_once __DIR__ . '/../pages/seccion.php';

?>

<?php
require_once __DIR__ . '/../db/config.php';
require_once __DIR__ . '/../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Crear documento Excel
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

// Escribir encabezados
$col = 'A';
foreach ($encabezados as $titulo) {
    $sheet->setCellValue($col . '1', $titulo);
    $col++;
}

// Poner encabezados en negritas
$sheet->getStyle('A1:' . $sheet->getHighestColumn() . '1')
      ->getFont()
      ->setBold(true);

// Función rango de edad
function rangoEdad($edad) {
    if (!$edad) return 'No especificado';
    $edad = (int)$edad;
    if ($edad < 12) return 'Niñez';
    if ($edad < 18) return 'Adolescencia';
    if ($edad < 30) return 'Joven';
    if ($edad < 60) return 'Adultez';
    return 'Adulto Mayor';
}

// Limpiar texto
function limpiar($txt) {
    if (!$txt) return '';
    return trim(strip_tags(preg_replace('#<br\s*/?>#i', ' ', $txt)));
}

// Consulta BD
$query = "SELECT *, YEAR(FechaHecho) AS Anio FROM feminicidios ORDER BY FechaHecho ASC, ID ASC";
$stmt = $conn->prepare($query);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Contadores
$idCasoAnual = 0;
$numAlertaGenero = 0;
$contadorPorAnio = [];

$fila = 2; // fila inicial después del encabezado

foreach ($rows as $f) {
    $anio = $f['Anio'];

    $idCasoAnual++;
    $numAlertaGenero++;
    if (!isset($contadorPorAnio[$anio])) {
        $contadorPorAnio[$anio] = 1;
    } else {
        $contadorPorAnio[$anio]++;
    }

    $nombreCompleto = limpiar(($f['NombreVictima'] ?? '') . ' ' . ($f['ApellidoPaterno'] ?? '') . ' ' . ($f['ApellidoMaterno'] ?? ''));

    $datos = [
        $idCasoAnual,
        $contadorPorAnio[$anio],
        $numAlertaGenero,
        limpiar($f['FechaHecho'] ?? ''),
        $nombreCompleto,
        $f['Edad'] ?? '',
        rangoEdad($f['Edad'] ?? ''),
        limpiar($f['Ocupacion'] ?? ''),
        limpiar($f['LugarOrigen'] ?? ''),
        limpiar(($f['Calle'] ?? '') . ' ' . ($f['Numero'] ?? '')),
        limpiar($f['Municipio'] ?? ''),
        limpiar($f['ClaveMunicipio'] ?? ''),
        limpiar($f['Region'] ?? ''),
        !empty($f['AlertaGenero']) ? 'Sí' : 'No',
        !empty($f['AlertaGenero']) ? limpiar($f['Municipio'] ?? '') : '-',
        limpiar($f['Desaparecida'] ?? ''),
        limpiar($f['FechaDesaparicion'] ?? ''),
        limpiar($f['LugarEncontradoCuerpo'] ?? ''),
        limpiar($f['DescripcionCuerpo'] ?? ''),
        limpiar($f['FormaMuerte'] ?? ''),
        limpiar($f['TipoArma'] ?? ''),
        limpiar($f['Causas'] ?? ''),
        limpiar($f['NombreAgresor'] ?? ''),
        limpiar($f['ParentescoAgresor'] ?? ''),
        limpiar($f['SituacionJuridica'] ?? ''),
        limpiar($f['NumDescendencia'] ?? ''),
        limpiar($f['Descendencia'] ?? ''),
        limpiar($f['FuentePeriodistica'] ?? ''),
        limpiar($f['AutorNota'] ?? ''),
        limpiar($f['LinkNota'] ?? '')
    ];

    // Escribir fila en Excel
    $col = 'A';
    foreach ($datos as $valor) {
        $sheet->setCellValue($col . $fila, $valor);
        $col++;
    }
    $fila++;
}



// Auto-ajustar ancho
foreach (range('A', $sheet->getHighestColumn()) as $columna) {
    $sheet->getColumnDimension($columna)->setAutoSize(true);
}

// Descargar Excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="feminicidios.xlsx"');
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;
?>
