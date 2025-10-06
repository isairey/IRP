<?php
require_once __DIR__ . '/../pages/seccion.php';

?>


<?php
require_once __DIR__ . '/../db/config.php'; // Ajusta la ruta si es diferente

// Verificar que venga el ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID de ponente inválido.");
}

$idPonente = (int) $_GET['id'];

try {
    // Conexión PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Antes de eliminar, verificar si el ponente existe
    $check = $conn->prepare("SELECT * FROM ponentes WHERE ID_Ponente = :id");
    $check->bindParam(':id', $idPonente, PDO::PARAM_INT);
    $check->execute();

    if ($check->rowCount() === 0) {
        die("El ponente no existe.");
    }

    // Intentar eliminar (si hay asignaciones relacionadas puede fallar por FK)
    $stmt = $conn->prepare("DELETE FROM ponentes WHERE ID_Ponente = :id");
    $stmt->bindParam(':id', $idPonente, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // Redirigir con mensaje de éxito
        header("Location: ./ver-ponente.php?msg=success");
        exit();
    } else {
        header("Location: ./ver-ponente.php?msg=error");
        exit();
    }

} catch (PDOException $e) {
    // Si hay error de integridad referencial (FK), atraparlo
    if ($e->getCode() == "23000") {
        die("No se puede eliminar este ponente porque está asignado a diplomados, seminarios o talleres.");
    } else {
        die("Error en la base de datos: " . $e->getMessage());
    }
}
