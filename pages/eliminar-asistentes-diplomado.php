<?php
require_once __DIR__ . '/../db/config.php';
$conn->exec("SET NAMES utf8");

$id_persona = $_GET['id_persona'] ?? null;
$tipo       = $_GET['tipo'] ?? null;
$id_diplomado = $_GET['id_diplomado'] ?? null;

if ($id_persona && $tipo && $id_diplomado) {
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM asignacionesdiplomado
                WHERE ID_Usuario = :id_persona 
                  AND TipoUsuario = :tipo 
                  AND ID_Diplomado = :id_diplomado";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_persona', $id_persona);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':id_diplomado', $id_diplomado);

        $stmt->execute();

        header("Location: ../pages/asistentes.php?id_diplomado=$id_diplomado&statusss=deleted");
        exit();
    } catch (PDOException $e) {
        header("Location: ../pages/asistentes.php?id_diplomado=$id_diplomado&statusss=error&msg=" . urlencode($e->getMessage()));
        exit();
    }
} else {
    header("Location: ../pages/asistentes.php?statusss=error&msg=Faltan parámetros");
    exit();
}
?>
