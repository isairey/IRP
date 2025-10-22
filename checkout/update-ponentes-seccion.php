
<?php
require_once __DIR__ . '/../pages/seccion.php';

?>
<?php
require_once __DIR__ . '/../db/config.php';

$idSeccion = $_POST['id_seccion'] ?? null;
$idsSeleccionados = $_POST['id_ponente'] ?? [];

if (!$idSeccion) die("ID de sección no especificado.");

// 1. Obtener los ponentes actuales asociados a la sección
$stmt = $conn->prepare("SELECT ID_Ponente FROM seccion_ponentes WHERE ID_Seccion = ?");
$stmt->execute([$idSeccion]);
$idsActuales = $stmt->fetchAll(PDO::FETCH_COLUMN);

// 2. Agregar nuevas asociaciones
foreach ($idsSeleccionados as $idPonente) {
    if (!in_array($idPonente, $idsActuales) && !empty($idPonente)) {
        $stmt = $conn->prepare("INSERT INTO seccion_ponentes (ID_Seccion, ID_Ponente) VALUES (?, ?)");
        $stmt->execute([$idSeccion, $idPonente]);
    }
}

// 3. Eliminar asociaciones que fueron quitadas
$idsEliminar = array_diff($idsActuales, $idsSeleccionados);
if (!empty($idsEliminar)) {
    $in  = str_repeat('?,', count($idsEliminar) - 1) . '?';
    $stmt = $conn->prepare("DELETE FROM seccion_ponentes WHERE ID_Seccion = ? AND ID_Ponente IN ($in)");
    $stmt->execute(array_merge([$idSeccion], $idsEliminar));
}

header("Location: ./../pages/ver-ponentes-diplomado.php?id=$idSeccion");
exit;
?>
