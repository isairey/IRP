<?php
require_once __DIR__ . '/../pages/seccion.php';

?>

<?php
require_once __DIR__ . '/../db/config.php'; // Ajusta la ruta si es diferente

// Verificar que venga el ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID de donante inválido.");
}

$idDonante = (int) $_GET['id'];

try {
    // Conexión PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Antes de eliminar, verificar si el donante existe
    $check = $conn->prepare("SELECT * FROM donantes WHERE ID_Donante = :id");
    $check->bindParam(':id', $idDonante, PDO::PARAM_INT);
    $check->execute();

    if ($check->rowCount() === 0) {
        die("El donante no existe.");
    }

    // Intentar eliminar (puede fallar si hay FK relacionadas)
    $stmt = $conn->prepare("DELETE FROM donantes WHERE ID_Donante = :id");
    $stmt->bindParam(':id', $idDonante, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // Redirigir con mensaje de éxito
     
        header("Location: ./ver-donantes.php?msg=success");
        exit();
    } else {
         
        header("Location: ./ver-donantes.php?msg=error");
        exit();
    }

} catch (PDOException $e) {
    // Si hay error de integridad referencial (FK), atraparlo
    if ($e->getCode() == "23000") {
        die("No se puede eliminar este donante porque tiene registros relacionados.");
    } else {
        die("Error en la base de datos: " . $e->getMessage());
    }
}
