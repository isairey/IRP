<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

$error = "";
$mensajeEnviado = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $mensaje = trim($_POST['mensaje'] ?? '');

    if ($nombre && $email && $mensaje) {
        try {
            $mail = new PHPMailer(true);

            // Configuración SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'isaireyes2003@gmail.com';
            $mail->Password = 'ratxpqaxfklpenxl'; // ⚠️ Cambia esto por tu password o app password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Remitente y destinatario
            $mail->setFrom($email, $nombre);
            $mail->addAddress('isaireyes2003@gmail.com', 'Soporte');

            // Contenido
            $mail->isHTML(true);
            $mail->Subject = 'Nuevo mensaje de soporte';
            $mail->Body = "
                <strong>Nombre:</strong> {$nombre}<br>
                <strong>Email:</strong> {$email}<br>
                <strong>Mensaje:</strong><br>{$mensaje}
            ";

            $mail->send();
            $mensajeEnviado = true;

        } catch (Exception $e) {
            $error = "Error al enviar el correo: " . $mail->ErrorInfo;
        }
    } else {
        $error = "Por favor completa todos los campos.";
    }
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


    
    <BR>
   <div class="container">

   <div class="d-flex justify-content-center gap-3 mb-4">
    <a href="../checkout/soporte.php" class="btn btn-outline-danger">
      <i class="bi bi-file-earmark-pdf-fill me-2"></i> Chat
    </a>
    <a href="./correo.php" class="btn btn-outline-success">
      <i class="bi bi-file-earmark-check-fill me-2"></i> Enviar Correo
    </a>
</div>
    <h2>Enviar Correo</h2>

    <?php if ($mensajeEnviado): ?>
        <div class="alert alert-success">✅ Correo enviado correctamente.</div>
    <?php elseif ($error): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Correo electrónico</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Mensaje</label>
            <textarea name="mensaje" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Enviar Correo</button>
    </form>
</div>



        <footer class="my-5 pt-5 text-body-secondary text-center text-small">
             <?php
          require_once __DIR__ . '/../checkout/CR.php';
          ?>
                <ul class="list-inline">

                </ul>
        </footer>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function cargarMensajes() {
    $.get('obtener_mensajes_soporte.php', function(data) {
        $('.chat-contenedor').html(data);
        $('.chat-contenedor').scrollTop($('.chat-contenedor')[0].scrollHeight);
    });
}

$(document).ready(function() {
    cargarMensajes();
    setInterval(cargarMensajes, 3000);

    $('#form-soporte').on('submit', function(e) {
        e.preventDefault();
        $.post('soporte.php', $(this).serialize(), function() {
            $('#form-soporte')[0].reset();
            cargarMensajes();
        });
    });
});
</script>


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



