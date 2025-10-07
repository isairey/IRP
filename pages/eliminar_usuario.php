<?php
require_once __DIR__ . '/../pages/seccion.php';

?>


<?php
require_once __DIR__ . '/../db/config.php';
// Función para eliminar un usuario
function eliminarUsuario($id) {
    global $conn; // Acceder a la conexión con la base de datos

    try {
        // Preparar y ejecutar la consulta SQL para eliminar el usuario
        $query = "DELETE FROM Usuario WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        // Verificar si se eliminó el usuario correctamente
        if ($stmt->rowCount() > 0) {
            return true; // Éxito al eliminar el usuario
        } else {
            return false; // No se encontró el usuario con el ID proporcionado
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false; // Error al intentar eliminar el usuario
    }
}

// Verificar si se ha enviado una solicitud para eliminar un usuario
if(isset($_GET['eliminar_id'])) {
    $id = $_GET['eliminar_id'];

    // Llamar a la función para eliminar el usuario
    if(eliminarUsuario($id)) {
        header("Location: ./ver-usuaria.php?msg=success");
        exit();
    } else {
         header("Location: ./ver-usuaria.php?msg=error");
        exit();
    }
}
?>
