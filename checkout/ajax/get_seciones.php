<?php
require_once __DIR__ . '/../db/config.php';
header('Content-Type: application/json; charset=utf-8');

$id_modulo = $_GET['id_modulo'] ?? null;
if (!$id_modulo) {
    echo json_encode([]);
    exit;
}

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT ID, NombreSeccion FROM secciones WHERE ModuloID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_modulo]);
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
} catch (Exception $e) {
    echo json_encode([]);
}
