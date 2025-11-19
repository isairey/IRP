<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../../db/config.php'; // Ajusta según tu estructura

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $q = isset($_GET['q']) ? trim($_GET['q']) : '';
    if ($q === '') {
        echo json_encode([]);
        exit;
    }

    $stmt = $conn->prepare("SELECT ID_Proyecto, NombreProyecto
                            FROM Proyectos
                            WHERE NombreProyecto LIKE :q
                            LIMIT 10");
    $stmt->execute(['q' => "%$q%"]);

    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
