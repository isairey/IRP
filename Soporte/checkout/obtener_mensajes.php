<?php
require_once __DIR__ . '/../db/config.php';

$id_personal = $_GET['id_personal'] ?? null;
if (!$id_personal) exit;

$stmt = $conn->prepare("
    SELECT cs.mensaje, cs.remitente, cs.fecha, cs.leido,
           CASE WHEN cs.remitente = 'soporte' THEN 'Soporte' ELSE p.nombre END AS nombre
    FROM chat_soporte cs
    JOIN personal p ON p.ID_Personal = cs.id_personal
    WHERE cs.id_personal = :id_personal
    ORDER BY cs.fecha ASC
");
$stmt->execute([':id_personal' => $id_personal]);
$mensajes = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($mensajes as $msg): ?>
    <div class="mensaje <?= $msg['remitente']==='soporte' ? 'mensaje-soporte' : 'mensaje-personal' ?>">
        <span class="nombre"><?= htmlspecialchars($msg['nombre']) ?></span>
        <?= nl2br(htmlspecialchars($msg['mensaje'])) ?>
        <span class="mensaje-fecha">
            <?= date('H:i', strtotime($msg['fecha'])) ?>
            <?php if ($msg['remitente'] === 'soporte'): ?>
                <span class="checks <?= $msg['leido'] == 1 ? 'leido' : '' ?>">
                    <?= $msg['leido'] == 1 ? '✔✔' : '✔' ?>
                </span>
            <?php endif; ?>
        </span>
    </div>
<?php endforeach; ?>
