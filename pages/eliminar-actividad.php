<?php
require_once __DIR__ . '/../db/config.php';

// Verificar que el ID fue pasado por GET
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID de actividad no válido.");
}

$idActividad = $_GET['id'];

try {
    // Verificar que la actividad exista antes de eliminarla
    $check = $conn->prepare("SELECT * FROM ponente_actividad WHERE ID = ?");
    $check->execute([$idActividad]);
    $actividad = $check->fetch(PDO::FETCH_ASSOC);

    if (!$actividad) {
        die("<script>alert('La actividad no existe.'); window.location.href='../pages/lista_actividades.php';</script>");
    }

    // Eliminar actividad
    $delete = $conn->prepare("DELETE FROM ponente_actividad WHERE ID = ?");
    $delete->execute([$idActividad]);

   header("Location: ./ver-actividades.php?mensaje=success");
        exit;

} catch (PDOException $e) {
    header("Location: ./ver-actividades.php?mensaje=error&msg=" . urlencode($e->getMessage()));
        exit();
}
?>
