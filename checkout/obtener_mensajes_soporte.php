<?php
require_once __DIR__ . '/../pages/seccion.php';

?>


<?php
require_once __DIR__ . '/../db/config.php';


$id_personal = $_SESSION['user_id'] ?? 0;
if (!$id_personal) exit;

// Marcar como leídos todos los mensajes de soporte
$stmt = $conn->prepare("UPDATE chat_soporte SET leido = 1 WHERE id_personal = :id_personal AND remitente = 'soporte'");
$stmt->execute([':id_personal' => $id_personal]);

// Traer todo el historial del chat para este usuario
$stmt = $conn->prepare("
    SELECT mensaje, remitente, fecha, leido
    FROM chat_soporte
    WHERE id_personal = :id_personal
    ORDER BY fecha ASC
");
$stmt->execute([':id_personal' => $id_personal]);
$mensajes = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($mensajes as $msg):
?>
<div class="mensaje-chat <?= ($msg['remitente'] === 'personal') ? 'mensaje-usuario' : 'mensaje-personal' ?>" style="display:flex; flex-direction:column;">
    <div><?= nl2br(htmlspecialchars($msg['mensaje'])) ?></div>
    <div class="mensaje-fecha" style="font-size:0.8em; color:gray; display:flex; align-items:center; justify-content:<?= ($msg['remitente'] === 'personal') ? 'flex-end' : 'flex-start' ?>;">
        <?= date('H:i', strtotime($msg['fecha'])) ?>
        <?php if ($msg['remitente'] === 'personal'): ?>
            <span class="checks <?= $msg['leido'] == 1 ? 'leido' : '' ?>" style="margin-left:5px; color:<?= $msg['leido'] == 1 ? 'blue' : 'gray' ?>;">
                <?= $msg['leido'] == 1 ? '✔✔' : '✔' ?>
            </span>
        <?php endif; ?>
    </div>
</div>
<?php endforeach; ?>
