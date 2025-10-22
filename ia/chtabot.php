<?php
// chatbot.php
require_once __DIR__ . '/../vendor/autoload.php'; // Asegúrate de tener la librería de OpenAI instalada
require_once __DIR__ . '/../db/config.php';

use OpenAI\OpenAI;

session_start();

// Clave API OpenAI (guárdala segura)
$OPENAI_API_KEY = "TU_API_KEY_AQUI"; // 🔒 pon tu API Key real aquí

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mensaje'])) {
    $mensajeUsuario = trim($_POST['mensaje']);

    if ($mensajeUsuario !== "") {
        try {
            $client = new OpenAI([
                'api_key' => $OPENAI_API_KEY
            ]);

            $respuesta = $client->chat()->create([
                'model' => 'gpt-4',
                'messages' => [
                    ['role' => 'system', 'content' => "Eres un asistente útil de soporte técnico."],
                    ['role' => 'user', 'content' => $mensajeUsuario]
                ]
            ]);

            $respuestaChat = $respuesta->choices[0]->message->content ?? "No pude responder a eso.";

            // Guardar el mensaje en DB
            $id_personal = $_SESSION['user_id'] ?? 0;
            $sql = "INSERT INTO chat_soporte (id_personal, mensaje, remitente, leido) 
                    VALUES (:id_personal, :mensaje, 'IA', 1)";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id_personal', $id_personal, PDO::PARAM_INT);
            $stmt->bindValue(':mensaje', $respuestaChat, PDO::PARAM_STR);
            $stmt->execute();

            echo json_encode(['respuesta' => $respuestaChat]);
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    } else {
        echo json_encode(['error' => 'No hay mensaje.']);
    }

    exit;
}
?>
