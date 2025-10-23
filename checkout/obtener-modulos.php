<?php
require_once __DIR__ . '/../db/config.php';

if (!isset($_GET['diplomado_id']) || !is_numeric($_GET['diplomado_id'])) {
    echo json_encode([]);
    exit;
}

$diplomadoId = (int)$_GET['diplomado_id'];

$stmt = $conn->prepare("SELECT ID_Modulo, NombreModulo FROM modulos WHERE DiplomadoID = ? ORDER BY ID_Modulo ASC");
$stmt->execute([$diplomadoId]);

$modulos = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($modulos);
