<?php
require_once __DIR__ . '/../pages/seccion.php';
require_once __DIR__ . '/../db/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Preparar eliminación
        $query = $conn->prepare("DELETE FROM secciones WHERE ID = :id");
        $query->execute(['id' => $id]);

        // Redirigir con mensaje de éxito
        header("Location: ../pages/ver-seciones.php?msgg=deleted");
        exit;
    } catch (PDOException $e) {
        header("Location: ../pages/ver-seciones.php?msgg=error&msg=" . urlencode($e->getMessage()));
        exit();
    }
} else {
    echo "ID de sección no proporcionado.";
}
?>
