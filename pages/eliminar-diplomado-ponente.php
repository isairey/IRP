<?php
require_once __DIR__ . '/../db/config.php';
$conn->exec("SET NAMES utf8");

$id_asignacion = $_GET['id'] ?? null;


if ($id_asignacion) {
    try {
        // Conexión segura con PDO
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Eliminar la asignación
        $sql = "DELETE FROM asignacionponente WHERE ID_Asignacion = :id_asignacion";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_asignacion', $id_asignacion, PDO::PARAM_INT);
        $stmt->execute();

        // Redirigir con mensaje de éxito
        header("Location: ../pages/ver-diplomado-ponente.php?msg=deleted");
        exit();

    } catch (PDOException $e) {
        // Redirigir con mensaje de error
        header("Location: ../pages/ver-diplomado-ponente.php?msg=error&msg=" . urlencode($e->getMessage()));
        exit();
    }
} else {
    // Si faltan parámetros
    header("Location: ../pages/ver-diplomado-ponente.php?msg=error&msg=Faltan parámetros");
    exit();
}
?>
