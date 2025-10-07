<?php
require_once __DIR__ . '/../db/config.php';
$conn->exec("SET NAMES utf8");

$id_persona = $_GET['id_persona'] ?? null;
$tipo       = $_GET['tipo'] ?? null;
$id_taller  = $_GET['id_taller'] ?? null;

if ($id_persona && $tipo && $id_taller) {
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM asistentes_taller WHERE ID_Persona = :id_persona AND TipoPersona = :tipo AND ID_Taller = :id_taller";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_persona', $id_persona);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':id_taller', $id_taller);

        $stmt->execute();

        header("Location: ../pages/ver-asistentes-taller.php?id_taller=$id_taller&statusss=deleted");
        exit();
    } catch (PDOException $e) {
        header("Location: ../pages/ver-asistentes-taller.php?id_taller=$id_taller&statusss=error&msg=" . urlencode($e->getMessage()));
        exit();
    }
} else {
    header("Location: ../pages/ver-asistentes-taller.php?statusss=error&msg=Faltan parámetros");
    exit();
}
?>
