<?php
require_once __DIR__ . '/../pages/seccion.php';

?>
<?php
require_once __DIR__ . '/../db/config.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID inválido.");
}

$idAsignacion = (int) $_GET['id'];

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("DELETE FROM asignacion_ponentes_taller WHERE ID = :id");
    $stmt->bindValue(':id', $idAsignacion, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: ./ver-taller-ponente.php?msg=success");
        exit();
    } else {
         header("Location: ./ver-taller-ponente.php?msg=error");
        exit();
    }
} catch (PDOException $e) {
    echo "Error en la base de datos: " . $e->getMessage();
}
?>
