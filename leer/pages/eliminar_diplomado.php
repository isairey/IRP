<?php
session_start();

// Verificar sesión y permisos (ajústalo según tu sistema)
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role_id']) || $_SESSION['role_id'] != 1) {
    header("Location: ../sign-in/index.php");
    exit();
}

require_once __DIR__ . '/../db/config.php';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['eliminar_id'])) {
        $id = intval($_GET['eliminar_id']);

        // Primero verificar si existe
        $stmt = $conn->prepare("SELECT * FROM Diplomados WHERE ID_Diplomado = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Eliminar
            $delete = $conn->prepare("DELETE FROM Diplomados WHERE ID_Diplomado = :id");
            $delete->bindParam(':id', $id, PDO::PARAM_INT);

            if ($delete->execute()) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        ¡Diplomado eliminado correctamente!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                      </div>';
                      echo "<script>window.location.href='../pages/ver-diplomado.php';</script>";
            } else {
                echo '<div class="alert alert-danger">Error al eliminar el diplomado.</div>';
            }
        } else {
            echo '<div class="alert alert-warning">El diplomado no existe.</div>';
        }
    } else {
        echo '<div class="alert alert-danger">No se recibió ningún ID válido.</div>';
    }

} catch (PDOException $e) {
    echo "Error en la base de datos: " . $e->getMessage();
}
