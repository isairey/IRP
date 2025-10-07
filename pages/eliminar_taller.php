<?php
require_once __DIR__ . '/../pages/seccion.php';

?>

<?php
require_once __DIR__ . '/../db/config.php';

if (!isset($_GET['eliminar_id']) || !is_numeric($_GET['eliminar_id'])) {
    die("ID inválido.");
}

$idTaller = (int) $_GET['eliminar_id'];

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("DELETE FROM talleres WHERE ID_Taller = :id");
    $stmt->bindValue(':id', $idTaller, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: ./ver-taller.php?msg=success");
        exit();
    } else {
         header("Location: ./ver-taller.php?msg=error");
        exit();
    }
} catch (PDOException $e) {
    echo "Error en la base de datos: " . $e->getMessage();
}
?>
