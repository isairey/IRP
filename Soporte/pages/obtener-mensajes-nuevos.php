<?php
// obtener_mensajes_nuevos.php
require_once __DIR__ . '/../db/config.php';
session_start();

// Consultar todos los usuarios (personal) y contar sus mensajes no leídos
$sql = "
    SELECT p.ID_Personal, p.Nombre, COUNT(m.id_mensaje) AS noLeidos
    FROM personal p
    LEFT JOIN chat_soporte m ON m.destinatario_id = p.ID_Personal AND m.leido = 0
    GROUP BY p.ID_Personal, p.Nombre
";
$stmt = $conn->prepare($sql);
$stmt->execute();
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Devolver JSON
header('Content-Type: application/json');
echo json_encode($usuarios);
