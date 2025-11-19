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

    $sql = "
        SELECT ID_Participante AS id, CONCAT(Nombre, ' ', ApellidoPaterno, ' ', ApellidoMaterno) AS NombreCompleto, 'participante' AS tipo
        FROM Participante
        WHERE Nombre LIKE :q OR ApellidoPaterno LIKE :q OR ApellidoMaterno LIKE :q
        UNION
        SELECT ID_Personal AS id, CONCAT(Nombre, ' ', ApellidoPaterno, ' ', ApellidoMaterno) AS NombreCompleto, 'personal' AS tipo
        FROM Personal
        WHERE Nombre LIKE :q OR ApellidoPaterno LIKE :q OR ApellidoMaterno LIKE :q
        UNION
        SELECT id AS id, CONCAT(Nombre, ' ', ApellidoPaterno, ' ', ApellidoMaterno) AS NombreCompleto, 'usuario' AS tipo
        FROM Usuario
        WHERE Nombre LIKE :q OR ApellidoPaterno LIKE :q OR ApellidoMaterno LIKE :q
        LIMIT 10
    ";

    $stmt = $conn->prepare($sql);
    $stmt->execute(['q' => "%$q%"]);

    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
