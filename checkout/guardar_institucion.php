<?php
require_once "../db/config.php"; // Ajusta la ruta según tu estructura
header('Content-Type: application/json');

try {
    $nombre = trim($_POST['nueva_institucion'] ?? '');
    $descripcion = trim($_POST['descripcion'] ?? '');

    if ($nombre === '') {
        echo json_encode(['success' => false, 'message' => 'El nombre es obligatorio']);
        exit;
    }

    // Verificar si ya existe
    $stmt = $conn->prepare("SELECT ID_Institucion FROM instituciones WHERE NombreInstitucion = :nombre");
    $stmt->execute([':nombre' => $nombre]);
    if ($stmt->fetch()) {
        echo json_encode(['success' => false, 'message' => 'La institución ya existe']);
        exit;
    }

    // Insertar nueva institución
    $stmt = $conn->prepare("INSERT INTO instituciones (NombreInstitucion, Descripcion) VALUES (:nombre, :descripcion)");
    $stmt->execute([':nombre' => $nombre, ':descripcion' => $descripcion]);

    echo json_encode([
        'success' => true,
        'id' => $conn->lastInsertId(),
        'nombre' => htmlspecialchars($nombre)
    ]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
}
