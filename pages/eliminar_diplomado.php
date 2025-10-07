<?php

require_once __DIR__ . '/../pages/seccion.php';


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
                header("Location: ./ver-diplomado.php?msg=success");
        exit();
            } else {
                header("Location: ./ver-diplomado.php?msg=error");
        exit();
            }
        } else {
             header("Location: ./ver-diplomado.php?msg=error");
        exit();
        }
    } else {
          header("Location: ./ver-diplomado.php?msg=error");
        exit();
    }

} catch (PDOException $e) {
    echo "Error en la base de datos: " . $e->getMessage();
}
