<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../../db/config.php';

$q = isset($_GET['q']) ? trim($_GET['q']) : '';

if ($q === '') {
    echo json_encode([]);
    exit;
}

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("
        SELECT ID_Seminario, Nombre
        FROM seminarios
        WHERE Nombre LIKE :q
        LIMIT 10
    ");
    $stmt->execute(['q' => "%$q%"]);

    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($resultados);

} catch(PDOException $e) {
    echo json_encode(['error'=>$e->getMessage()]);
}
