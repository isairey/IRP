<?php
require_once __DIR__ . '/../pages/seccion.php';

?>


<?php
require_once __DIR__ . '/../db/config.php';

if (!isset($_GET['eliminar_id']) || !is_numeric($_GET['eliminar_id'])) {
    die("ID inválido.");
}

$idSeminario = (int) $_GET['eliminar_id'];

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("DELETE FROM seminarios WHERE ID_Seminario = :id");
    $stmt->bindValue(':id', $idSeminario, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "<script>alert('Seminario eliminado correctamente'); window.location.href='./ver-seminario.php';</script>";
    } else {
        echo "<script>alert('Error al eliminar el seminario'); window.location.href='./ver-seminario.php';</script>";
    }
} catch (PDOException $e) {
    echo "Error en la base de datos: " . $e->getMessage();
}
?>
