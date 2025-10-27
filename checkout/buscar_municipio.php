<?php
$host = 'localhost';
$db   = 'oaxacaa';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
    exit;
}

header('Content-Type: application/json');

$nombre = $_GET['nombre'] ?? '';
if (!$nombre) {
    echo json_encode(['error' => 'Nombre de municipio no proporcionado']);
    exit;
}

$stmt = $pdo->prepare("SELECT id_municipio_inegi FROM municipios WHERE nombre = ? LIMIT 1");
$stmt->execute([$nombre]);
$result = $stmt->fetch();

if ($result) {
    echo json_encode($result);
} else {
    echo json_encode([]);
}
?>
