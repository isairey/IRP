<?php
session_start();

// Verificación de sesión (solo admin con role_id = 1)
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role_id']) || $_SESSION['role_id'] != 1) {
    header("Location: ../sign-in/index.php");
    exit();
}

// Conexión BD
require_once __DIR__ . '/../db/config.php';

// Validar ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID de ponente inválido.");
}

$id = (int)$_GET['id'];

try {
    // Obtener datos del ponente
    $stmt = $conn->prepare("SELECT * FROM ponentes WHERE ID_Ponente = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $ponente = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$ponente) {
        die("Ponente no encontrado.");
    }

    // Procesar el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['Nombre'] ?? '';
        $apellidoPaterno = $_POST['ApellidoPaterno'] ?? '';
        $apellidoMaterno = $_POST['ApellidoMaterno'] ?? '';
        $correo = $_POST['Correo'] ?? '';
        $telefono = $_POST['Telefono'] ?? '';
        $especialidad = $_POST['Especialidad'] ?? '';
        $biografia = $_POST['Biografia'] ?? '';
        $redes = $_POST['RedesSociales'] ?? '';

        // Manejo de la foto
        $foto = $ponente['Foto'];
        if (!empty($_FILES['Foto']['name'])) {
            $targetDir = "../uploads/ponentes/";
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }
            $fotoName = time() . "_" . basename($_FILES["Foto"]["name"]);
            $targetFile = $targetDir . $fotoName;

            if (move_uploaded_file($_FILES["Foto"]["tmp_name"], $targetFile)) {
                $foto = $fotoName;
            }
        }

        $update = $conn->prepare("UPDATE ponentes 
            SET Nombre = :nombre,
                ApellidoPaterno = :ap,
                ApellidoMaterno = :am,
                Correo = :correo,
                Telefono = :telefono,
                Especialidad = :especialidad,
                Biografia = :biografia,
                RedesSociales = :redes,
                Foto = :foto
            WHERE ID_Ponente = :id");

        $update->execute([
            ':nombre' => $nombre,
            ':ap' => $apellidoPaterno,
            ':am' => $apellidoMaterno,
            ':correo' => $correo,
            ':telefono' => $telefono,
            ':especialidad' => $especialidad,
            ':biografia' => $biografia,
            ':redes' => $redes,
            ':foto' => $foto,
            ':id' => $id
        ]);

        header("Location: /ERP/ERP_IRP/pages/ver-ponentes.php?msg=editado");
        exit();
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
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
    <title>Registro de Donantes</title>
    <script src="register.js"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/checkout/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos del Formulario-->
    <link href="checkout.css" rel="stylesheet">
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

    
      <div class="container">
    <main>
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="../assets/img/logo 1.png" alt="" width="100" height="100">
            <h2>Editar Ponentes</h2>
        </div>

        <div class="row g-5">
            <div class="col-12">
          
  <meta charset="UTF-8">
  <title>Editar Ponentes</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body class="container mt-5">

   <form method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label">Nombre</label>
      <input type="text" name="Nombre" class="form-control" value="<?= htmlspecialchars($ponente['Nombre']) ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Apellido Paterno</label>
      <input type="text" name="ApellidoPaterno" class="form-control" value="<?= htmlspecialchars($ponente['ApellidoPaterno']) ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Apellido Materno</label>
      <input type="text" name="ApellidoMaterno" class="form-control" value="<?= htmlspecialchars($ponente['ApellidoMaterno']) ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">Correo</label>
      <input type="email" name="Correo" class="form-control" value="<?= htmlspecialchars($ponente['Correo']) ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Teléfono</label>
      <input type="text" name="Telefono" class="form-control" value="<?= htmlspecialchars($ponente['Telefono']) ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">Especialidad</label>
      <input type="text" name="Especialidad" class="form-control" value="<?= htmlspecialchars($ponente['Especialidad']) ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">Biografía</label>
      <textarea name="Biografia" class="form-control" rows="4"><?= htmlspecialchars($ponente['Biografia']) ?></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Redes Sociales</label>
      <input type="text" name="RedesSociales" class="form-control" value="<?= htmlspecialchars($ponente['RedesSociales']) ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">Foto</label><br>
      <?php if (!empty($ponente['Foto'])): ?>
        <img src="../uploads/ponentes/<?= htmlspecialchars($ponente['Foto']) ?>" alt="Foto actual" width="100"><br><br>
      <?php endif; ?>
      <input type="file" name="Foto" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    <a href="listado_ponentes.php" class="btn btn-secondary">Cancelar</a>
  </form>
            </div>
        </div>
    </main>

    <footer class="my-5 pt-5 text-body-secondary text-center text-small">
        <?php require_once __DIR__ . '/../checkout/CR.php'; ?>
    </footer>
</div>

<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="checkout.js"></script>
<script src="validation-donante.js"></script>
        </html>