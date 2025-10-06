<?php
require_once __DIR__ . '/../pages/seccion.php';

?>


<?php
require_once __DIR__ . '/../db/config.php';

// Cabeceras para CSV
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=feminicidios.csv');

$output = fopen('php://output', 'w');
fwrite($output, "\xEF\xBB\xBF"); // BOM para Excel

// Encabezados
fputcsv($output, [
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
    'FORMA EN QUE SE ENCONTRO EL CUERPO',
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
]);

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

// Traer datos ordenados por fecha
$query = "SELECT *, YEAR(FechaHecho) AS Anio FROM feminicidios ORDER BY FechaHecho ASC, ID ASC";
$stmt = $conn->prepare($query);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Contadores
$idCasoAnual = 0;
$numAlertaGenero = 0;
$contadorPorAnio = [];

foreach ($rows as $f) {
    $anio = $f['Anio'];

    // Incrementar contadores
    $idCasoAnual++;
    $numAlertaGenero++;
    if (!isset($contadorPorAnio[$anio])) {
        $contadorPorAnio[$anio] = 1;
    } else {
        $contadorPorAnio[$anio]++;
    }

    // Nombre completo
    $nombreCompleto = limpiar(($f['NombreVictima'] ?? '') . ' ' . ($f['ApellidoPaterno'] ?? '') . ' ' . ($f['ApellidoMaterno'] ?? ''));

    fputcsv($output, [
        $idCasoAnual, // ID CASO ANUAL (consecutivo sexenio)
        $contadorPorAnio[$anio], // NUM DE AÑO (consecutivo anual)
        $numAlertaGenero, // NUM. DE ALERTA DE GÉNERO (total)
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
    ]);
}

fclose($output);
exit;
?>

