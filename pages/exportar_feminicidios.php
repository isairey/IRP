<?php
require_once __DIR__ . '/../db/config.php';

// Cabeceras para descargar CSV
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=feminicidios.csv');

// Abrir salida
$output = fopen('php://output', 'w');

// UTF-8 BOM para Excel
fwrite($output, "\xEF\xBB\xBF");

// Encabezados
fputcsv($output, [
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
    'FORMA EN QUE SE ENCONTRO EL CUERPO',
    'FORMA DE MUERTE',
    'TIPO DE ARMA',
    'CAUSAS',
    'NOMBRE DEL AGRESOR',
    'PARENTESCO',
    'SITUACIÓN JURÍDICA',
    'NUM. DE HIJAS/OS',
    'EDAD HIJAS/OS',
    'FUENTE PERIODÍDICA',
    'AUTOR DE LA NOTA PERIODÍSTICA',
    'LINK DE LA NOTA'
]);

// Función para calcular rango de edad
function rangoEdad($edad) {
    if ($edad === null || $edad === '') return 'No especificado';
    $edad = intval($edad);
    if ($edad < 12) return 'Niñez';
    if ($edad < 18) return 'Adolescencia';
    if ($edad < 30) return 'Joven';
    if ($edad < 60) return 'Adultez';
    return 'Adulto Mayor';
}

// Función para limpiar texto y eliminar <br> u otras etiquetas HTML
function limpiarTextoCSV($texto) {
    if (!$texto) return '';
    // Reemplaza <br>, <br/> o <br /> por espacio
    $texto = preg_replace('#<br\s*/?>#i', ' ', $texto);
    // Elimina otras etiquetas HTML
    $texto = strip_tags($texto);
    return trim($texto);
}

// Consulta
$query = "SELECT * FROM Feminicidios ORDER BY FechaHecho DESC";
$stmt = $conn->prepare($query);
$stmt->execute();
$feminicidios = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Recorrer registros
foreach ($feminicidios as $f) {
    fputcsv($output, [
        limpiarTextoCSV($f['FechaHecho']),
        limpiarTextoCSV($f['NombreVictima'] . ' ' . $f['ApellidoPaterno'] . ' ' . $f['ApellidoMaterno']),
        $f['Edad'],
        rangoEdad($f['Edad']),
        limpiarTextoCSV($f['Ocupacion']),
        limpiarTextoCSV($f['LugarOrigen']),
        limpiarTextoCSV($f['Calle'] . ' ' . $f['Numero']),
        limpiarTextoCSV($f['Municipio']),
        limpiarTextoCSV($f['ClaveMunicipio']),
        limpiarTextoCSV($f['Region']),
        $f['AlertaGenero'] == 1 ? 'Sí' : 'No',
        $f['AlertaGenero'] == 1 ? limpiarTextoCSV($f['Municipio']) : '-',
        limpiarTextoCSV($f['Desaparecida']),
        limpiarTextoCSV($f['FechaDesaparicion']),
        limpiarTextoCSV($f['LugarEncontradoCuerpo']),
        limpiarTextoCSV($f['DescripcionCuerpo']),
        limpiarTextoCSV($f['FormaMuerte']),
        limpiarTextoCSV($f['TipoArma']),
        limpiarTextoCSV($f['Causas']),
        limpiarTextoCSV($f['NombreAgresor']),
        limpiarTextoCSV($f['ParentescoAgresor']),
        limpiarTextoCSV($f['SituacionJuridica']),
        limpiarTextoCSV($f['NumDescendencia']),
        isset($f['EdadDescendencia']) ? limpiarTextoCSV($f['EdadDescendencia']) : '',

        limpiarTextoCSV($f['FuentePeriodistica']),
        limpiarTextoCSV($f['AutorNota']),
        limpiarTextoCSV($f['LinkNota'])
    ]);
}

fclose($output);
exit;
?>
