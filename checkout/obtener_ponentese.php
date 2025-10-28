<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../db/config.php';

$idSeminario = isset($_GET['id_seminario']) ? (int)$_GET['id_seminario'] : 0;

if (!$idSeminario) {
    echo json_encode(['id' => null, 'nombre' => null]);
    exit;
}

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("
        SELECT p.ID_Ponente AS id, CONCAT(p.Nombre, ' ', p.ApellidoPaterno, ' ', p.ApellidoMaterno) AS nombre
        FROM asignacion_ponente_seminario aps
        INNER JOIN ponentes p ON aps.ID_Ponente = p.ID_Ponente
        WHERE aps.ID_Seminario = :id_seminario
        ORDER BY aps.FechaAsignacion DESC
        LIMIT 1
    ");
    $stmt->execute(['id_seminario' => $idSeminario]);
    $ponente = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode($ponente ? $ponente : ['id' => null, 'nombre' => null]);

} catch(PDOException $e) {
    echo json_encode(['id' => null, 'nombre' => null, 'error' => $e->getMessage()]);
}
