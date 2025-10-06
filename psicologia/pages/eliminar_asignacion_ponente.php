<?php
require_once __DIR__ . '/../db/config.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID inválido.");
}

$idAsignacion = (int) $_GET['id'];

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("DELETE FROM asignacionponente WHERE ID_Asignacion = :id");
    $stmt->bindValue(':id', $idAsignacion, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "<script>alert('Asignación eliminada correctamente'); window.location.href='./ver-diplomado-ponente.php';</script>";
    } else {
        echo "<script>alert('Error al eliminar la asignación'); window.location.href='./ver-diplomado-ponente.php';</script>";
    }
} catch (PDOException $e) {
    echo "Error en la base de datos: " . $e->getMessage();
}
