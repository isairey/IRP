<?php
require_once __DIR__ . '/../db/config.php';
$conn->exec("SET NAMES utf8");

$id_persona = $_GET['id_persona'] ?? null;
$tipo       = $_GET['tipo'] ?? null;
$id_seminario = $_GET['id_seminario'] ?? null;

if ($id_persona && $tipo && $id_seminario) {
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM asignaciones_seminario 
                WHERE ID_Persona = :id_persona 
                  AND Tipo = :tipo 
                  AND ID_Seminario = :id_seminario";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_persona', $id_persona);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':id_seminario', $id_seminario);

        $stmt->execute();

        header("Location: ../pages/ver-asistentes-seminario.php?id_seminario=$id_seminario&statusss=deleted");
        exit();
    } catch (PDOException $e) {
        header("Location: ../pages/ver-asistentes-seminario.php?id_seminario=$id_seminario&statusss=error&msg=" . urlencode($e->getMessage()));
        exit();
    }
} else {
    header("Location: ../pages/ver-asistentes-seminario.php?statusss=error&msg=Faltan parámetros");
    exit();
}
?>
