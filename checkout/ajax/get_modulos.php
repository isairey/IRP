<?php
require_once __DIR__ . '/../db/config.php';
header('Content-Type: application/json; charset=utf-8');

$id_diplomado = $_GET['id_diplomado'] ?? null;
if (!$id_diplomado) {
    echo json_encode([]);
    exit;
}

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT ID_Modulo, NombreModulo FROM modulos WHERE DiplomadoID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_diplomado]);
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
} catch (Exception $e) {
    echo json_encode([]);
}
