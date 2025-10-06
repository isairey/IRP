<?php
require_once __DIR__ . '/../pages/seccion.php';

?>

<?php
// ajax_add_especialidad.php
header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/../db/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(405);
  echo json_encode(['ok' => false, 'error' => 'Método no permitido']);
  exit;
}

$nombre = isset($_POST['nueva_especialidad']) ? trim($_POST['nueva_especialidad']) : '';
$descripcion = isset($_POST['descripcion']) ? trim($_POST['descripcion']) : '';
if ($nombre === '') {
  echo json_encode(['ok' => false, 'error' => 'La especialidad no puede estar vacía']);
  exit;
}

try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
  ]);

  // Evitar duplicados (case-insensitive)
  $stmt = $pdo->prepare("SELECT ID_Especialidad FROM Especialidades WHERE LOWER(NombreEspecialidad) = LOWER(:nombre)");
  $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
  $stmt->execute();
  $existe = $stmt->fetchColumn();
  

  if ($existe) {
    echo json_encode(['ok' => false, 'error' => 'Ya existe esa especialidad']);
    exit;
  }else{}

  $ins = $pdo->prepare("INSERT INTO Especialidades (NombreEspecialidad, Descripcion) VALUES (?, ?)");
  $ins->execute([$nombre, $descripcion]);
  
  $id = $pdo->lastInsertId();

  echo json_encode(['ok' => true, 'id' => $id, 'NombreEspecialidad' => $nombre]);
} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode(['ok' => false, 'error' => 'Error de servidor']);
}
    

