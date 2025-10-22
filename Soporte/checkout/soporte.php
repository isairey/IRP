<?php
require_once __DIR__ . '/../pages/seccion.php';
require_once __DIR__ . '/../db/config.php';

$id_personal = $_GET['id_personal'] ?? null;

// REGISTRAR UN NUEVO MENSAJE
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['mensaje'])) {
    $mensaje = trim($_POST['mensaje']);

    if ($mensaje && $id_personal) {
        $sql = "INSERT INTO chat_soporte (id_personal, mensaje, remitente, leido, fecha) 
                VALUES (:id_personal, :mensaje, 'soporte', 0, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':id_personal' => $id_personal,
            ':mensaje'     => $mensaje
        ]);
    }
}

// MARCAR MENSAJES COMO LEÍDOS al abrir el chat
if ($id_personal) {
    $sql = "UPDATE chat_soporte 
            SET leido = 1 
            WHERE id_personal = :id_personal 
            AND remitente = 'personal'";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id_personal' => $id_personal]);
}

// Obtener lista de usuarios con mensajes
$usuarios = $conn->query("
    SELECT DISTINCT cs.id_personal, p.nombre
    FROM chat_soporte cs
    JOIN personal p ON p.ID_Personal = cs.id_personal
")->fetchAll(PDO::FETCH_ASSOC);

// Obtener mensajes actualizados
$mensajes = [];
if ($id_personal) {
    $stmt = $conn->prepare("SELECT * FROM chat_soporte WHERE id_personal = :id_personal ORDER BY fecha ASC");
    $stmt->execute([':id_personal' => $id_personal]);
    $mensajes = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>



<!doctype html>
<html lang="en" data-bs-theme="auto">
    <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Registro de Cita</title>
    <script src="register.js"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/checkout/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos del Formulario-->
    <link href="checkout.css" rel="stylesheet">
    <style>
.chat-contenedor {
    border: 1px solid #ccc;
    border-radius: 10px;
    padding: 10px;
    height: 350px;
    overflow-y: auto;
    background: #f9f9f9;
}

.mensaje-chat {
    max-width: 75%;
    padding: 10px;
    margin-bottom: 8px;
    border-radius: 15px;
    line-height: 1.4;
    word-wrap: break-word;
}

.mensaje-usuario {
    background: #007bff;
    color: white;
    margin-left: auto;
    text-align: right;
}

.mensaje-personal {
    background: #eaeaea;
    color: black;
    margin-right: auto;
    text-align: left;
}

.mensaje-fecha {
    font-size: 0.75em;
    color: gray;
}

        </style>
    </head>


    <body class="bg-body-tertiary">
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
      <symbol id="check2" viewBox="0 0 16 16">
        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
      </symbol>
      <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
      </symbol>
      <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
      </symbol>
      <symbol id="sun-fill" viewBox="0 0 16 16">
        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
      </symbol>
    </svg>



<?php
require_once __DIR__ . '/../pages/header.php';
?>




    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
      <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
              id="bd-theme"
              type="button"
              aria-expanded="false"
              data-bs-toggle="dropdown"
              aria-label="Toggle theme (auto)">
        <svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#circle-half"></use></svg>
        <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
      </button>
      <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
            <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#sun-fill"></use></svg>
            Light
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
            <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#moon-stars-fill"></use></svg>
            Dark
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
            <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#circle-half"></use></svg>
            Auto
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
      </ul>
    </div>

<style>
        .chat-contenedor {
            border: none;
            border-radius: 20px;
            padding: 20px;
            height: 500px;
            overflow-y: auto;
            background: linear-gradient(180deg, #ece5dd 0%, #d9fdd3 100%);
            box-shadow: inset 0 0 15px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .mensaje {
            max-width: 75%;
            padding: 12px 16px;
            margin-bottom: 12px;
            border-radius: 18px;
            line-height: 1.5;
            font-size: 0.95rem;
            word-wrap: break-word;
            position: relative;
        }
        .mensaje-personal {
            align-self: flex-start;
            background: #ffffff;
            color: #111;
            border-radius: 10px 10px 10px 0;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .mensaje-soporte {
            align-self: flex-end;
            background: #dcf8c6;
            color: #111;
            border-radius: 10px 10px 0 10px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.15);
        }
        .mensaje-fecha {
            font-size: 0.75em;
            color: rgba(0,0,0,0.55);
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 3px;
            margin-top: 5px;
        }
        .checks {
            font-size: 0.9em;
            color: gray;
        }
        .checks.leido {
            color: #34f199ff;
        }
        textarea.form-control {
            resize: none;
            border-radius: 20px;
            padding: 10px;
            font-size: 0.95rem;
        }
    </style>




<style>
/* --- CONTENEDOR DEL CHAT --- */
.chat-contenedor {
    border: none;
    border-radius: 20px;
    padding: 20px;
    height: 500px;
    overflow-y: auto;
    background: linear-gradient(180deg, var(--bs-body-bg) 0%, var(--bs-tertiary-bg) 100%);
    box-shadow: inset 0 0 15px rgba(0,0,0,0.05);
    display: flex;
    flex-direction: column;
    gap: 10px;
    transition: background 0.4s ease, color 0.4s ease;
}

/* --- MENSAJES --- */
.mensaje {
    max-width: 75%;
    padding: 12px 16px;
    margin-bottom: 12px;
    border-radius: 18px;
    line-height: 1.5;
    font-size: 0.95rem;
    word-wrap: break-word;
    position: relative;
    transition: background 0.4s ease, color 0.4s ease, transform 0.3s ease;
    animation: fadeIn 0.3s ease;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(5px); }
    to { opacity: 1; transform: translateY(0); }
}

/* --- MENSAJE DEL USUARIO (recibido) --- */
.mensaje-personal {
    align-self: flex-start;
    background: #ffffff !important;
    color: #111 !important;
    border-radius: 10px 10px 10px 0;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
}

/* --- MENSAJE ENVIADO (soporte verde militar) --- */
.mensaje-soporte {
    align-self: flex-end;
    background: #556B2F !important; /* Verde militar */
    color: #fff !important;
    border-radius: 10px 10px 0 10px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.15);
}

.mensaje-fecha {
    font-size: 0.75em;
    color: rgba(0,0,0,0.55);
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 3px;
    margin-top: 5px;
}

.checks {
    font-size: 0.9em;
    color: gray;
}

.checks.leido {
    color: #4B5320;
}

textarea.form-control {
    resize: none;
    border-radius: 20px;
    padding: 10px;
    font-size: 0.95rem;
}

/* ===== MODO OSCURO ===== */
[data-bs-theme="dark"] .chat-contenedor {
    background: linear-gradient(180deg, #1a1d20 0%, #2c2f33 100%);
    box-shadow: inset 0 0 20px rgba(255,255,255,0.05);
}

[data-bs-theme="dark"] .mensaje-personal {
    background: #2e3237 !important;
    color: #e6e6e6 !important;
    box-shadow: 0 1px 3px rgba(255,255,255,0.05);
}

[data-bs-theme="dark"] .mensaje-soporte {
    background: #4B5320 !important; /* Verde militar más oscuro */
    color: #e6e6e6 !important;
    box-shadow: 0 1px 3px rgba(255,255,255,0.1);
}

[data-bs-theme="dark"] .mensaje-fecha {
    color: rgba(255,255,255,0.55);
}

[data-bs-theme="dark"] textarea.form-control {
    background-color: #2c2f33;
    color: #e6e6e6;
    border: 1px solid #444;
}
.list-group-item{
color: #4B5320;
}
</style>

</head>
<body class="bg-body-tertiary">
<div class="container mt-4">
    <h3>💬 Chat de Soporte</h3>
    <div class="row">
        <div class="col-md-4">
            <h5>Usuarios</h5>
            <ul class="list-group">
                <?php foreach ($usuarios as $u): ?>
                    <li class="list-group-item <?= ($u['id_personal'] == $id_personal) ? 'active' : '' ?>" >
                        <a href="?id_personal=<?= $u['id_personal'] ?>" class="text-decoration-none text-dark d-block">
                            <?= htmlspecialchars($u['nombre']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="col-md-8">
            <?php if ($id_personal): ?>
                <div id="chat-contenedor" class="chat-contenedor">
                    <?php foreach ($mensajes as $msg): ?>
                        <div class="mensaje <?= $msg['remitente'] === 'soporte' ? 'mensaje-soporte' : 'mensaje-personal' ?>">
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
                </div>

                <form id="form-chat" method="POST">
                    <div class="input-group">
                        <textarea name="mensaje" id="mensaje" class="form-control" rows="1" placeholder="Escribe un mensaje..." required></textarea>
                        <button class="btn btn-success px-4">Enviar</button>
                    </div>
                </form>
            <?php else: ?>
                <p class="text-muted">Selecciona un usuario para ver el chat.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
<?php if ($id_personal): ?>
// Cargar mensajes con AJAX
function cargarMensajes() {
    $.get('obtener_mensajes.php', { id_personal: <?= $id_personal ?> }, function(data) {
        $('#chat-contenedor').html(data);
        $('#chat-contenedor').scrollTop($('#chat-contenedor')[0].scrollHeight);
    });
}

// Enviar mensaje sin recargar
$('#form-chat').on('submit', function(e) {
    e.preventDefault();
    const mensaje = $('#mensaje').val();
    if (mensaje.trim() === '') return;

    $.post('soporte.php?id_personal=<?= $id_personal ?>', { mensaje: mensaje }, function() {
        $('#mensaje').val('');
        cargarMensajes();
    });
});

// Cargar mensajes cada 3 segundos
setInterval(cargarMensajes, 3000);
cargarMensajes();
<?php endif; ?>
</script>


        <footer class="my-5 pt-5 text-body-secondary text-center text-small">
             <?php
          require_once __DIR__ . '/../checkout/CR.php';
          ?>
                <ul class="list-inline">

                </ul>
        </footer>
 

 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if (!empty($mensaje)): ?>
<script>
Swal.fire({
    icon: "<?= $tipoMensaje ?>",
    title: "<?= $mensaje ?>",
    showConfirmButton: false,
    timer: 3000
}).then(() => {
    window.location.href = "../pages/ver-citas.php";
});
</script>
<?php endif; ?>



    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="checkout.js"></script>
    <script src="validation-citas.js"></script></body>
        </html>



