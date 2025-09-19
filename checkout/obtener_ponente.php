<?php
require_once __DIR__ . '/../db/config.php';
header('Content-Type: application/json');

if(isset($_GET['id_seminario']) && !empty($_GET['id_seminario'])) {
    $id_seminario = $_GET['id_seminario'];

    try {
     

        $sql = "SELECT p.ID_Ponente, CONCAT(p.Nombre, ' ', p.ApellidoPaterno, ' ', p.ApellidoMaterno) AS NombrePonente
                FROM Ponentes p
                INNER JOIN asignacion_ponente_seminario aps ON p.ID_Ponente = aps.ID_Ponente
                WHERE aps.ID_Seminario = :id_seminario
                LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_seminario', $id_seminario);
        $stmt->execute();
        $ponente = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($ponente) {
            echo json_encode(['id' => $ponente['ID_Ponente'], 'nombre' => $ponente['NombrePonente']]);
        } else {
            echo json_encode(['id' => '', 'nombre' => 'Sin ponente asignado']);
        }

    } catch(PDOException $e) {
        echo json_encode(['id' => '', 'nombre' => 'Error al cargar ponente']);
    }
} else {
    echo json_encode(['id' => '', 'nombre' => 'Seleccione un seminario primero']);
}
