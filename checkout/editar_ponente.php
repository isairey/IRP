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
  $id_especialidad = $_POST["especialidad"] ?? '';  // Aquí recibes el ID
    $id_titulo = $_POST["titulo_profesional"] ?? '';  // Aquí recibes el ID
    $id_institucion = $_POST["institucion"] ?? '';    // Aquí recibes el ID
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
                ID_Especialidad = :id_especialidad, 
                 ID_Titulo = :id_titulo, 
                 ID_Institucion = :id_institucion,
                
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
          ':id_especialidad' => $id_especialidad,
          ':id_titulo' => $id_titulo,
          ':id_institucion' => $id_institucion,
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



<?php
require_once __DIR__ . '/../db/config.php';
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Traer especialidades
    $especialidades = $conn->query("SELECT ID_Especialidad, NombreEspecialidad FROM Especialidades ORDER BY NombreEspecialidad ASC")->fetchAll(PDO::FETCH_ASSOC);

    // Traer títulos profesionales
    $titulos = $conn->query("SELECT ID_Titulo, NombreTitulo FROM TitulosProfesionales ORDER BY NombreTitulo ASC")->fetchAll(PDO::FETCH_ASSOC);

    // Traer instituciones
    $instituciones = $conn->query("SELECT ID_Institucion, NombreInstitucion FROM Instituciones ORDER BY NombreInstitucion ASC")->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Error al conectar con la base de datos: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellido_paterno = $_POST["apellido_paterno"];
    $apellido_materno = $_POST["apellido_materno"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $id_especialidad = $_POST["especialidad"];  // Aquí recibes el ID
    $id_titulo = $_POST["titulo_profesional"];  // Aquí recibes el ID
    $id_institucion = $_POST["institucion"];    // Aquí recibes el ID
    $biografia = $_POST["biografia"];
    $redes = $_POST["redes_sociales"];

    // Manejo de la foto
    $foto = null;
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        $carpetaDestino = "../uploads/ponentes/";
        if (!file_exists($carpetaDestino)) {
            mkdir($carpetaDestino, 0777, true);
        }
        $nombreArchivo = uniqid() . "_" . basename($_FILES["foto"]["name"]);
        $rutaArchivo = $carpetaDestino . $nombreArchivo;

        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $rutaArchivo)) {
            $foto = $nombreArchivo;
        }
    }

    try {
        $sql = "INSERT INTO Ponentes 
                (Nombre, ApellidoPaterno, ApellidoMaterno, Correo, Telefono, ID_Especialidad, 
                 ID_Titulo, ID_Institucion, Biografia, Foto, RedesSociales) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $nombre);
        $stmt->bindParam(2, $apellido_paterno);
        $stmt->bindParam(3, $apellido_materno);
        $stmt->bindParam(4, $email);
        $stmt->bindParam(5, $telefono);
        $stmt->bindParam(6, $id_especialidad, PDO::PARAM_INT);
        $stmt->bindParam(7, $id_titulo, PDO::PARAM_INT);
        $stmt->bindParam(8, $id_institucion, PDO::PARAM_INT);
        $stmt->bindParam(9, $biografia);
        $stmt->bindParam(10, $foto);
        $stmt->bindParam(11, $redes);

        if ($stmt->execute()) {
            echo '<script>alert("Ponente registrado correctamente.");</script>';
            echo '<script>window.location.href = "/ERP/ERP_IRP/pages/ver-ponentes.php";</script>';
            exit;
        } else {
            echo "Error al registrar ponente: " . $stmt->errorInfo()[2];
        }

    } catch (PDOException $e) {
        echo '<script>alert("Error al registrar el ponente: ' . $e->getMessage() . '");</script>';
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
      <label class="form-label">Biografía</label>
      <textarea name="Biografia" class="form-control" rows="4"><?= htmlspecialchars($ponente['Biografia']) ?></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Redes Sociales</label>
      <input type="text" name="RedesSociales" class="form-control" value="<?= htmlspecialchars($ponente['RedesSociales']) ?>">
    </div>


     <!-- Especialidad -->
    <div class="mb-3">
      <label class="form-label">Especialidad</label>
      <select name="especialidad" id="especialidad" class="form-select" required>
        <option value="">-- Selecciona una especialidad --</option>
        <?php foreach ($especialidades as $esp): ?>
          <option value="<?= htmlspecialchars($esp['ID_Especialidad']) ?>">
            <?= htmlspecialchars($esp['NombreEspecialidad']) ?>
          </option>
        <?php endforeach; ?>
        <option value="__otro__">➕ Otro…</option>
      </select>
      <div class="invalid-feedback">Selecciona una especialidad.</div>
    </div>

<!-- Título Profesional -->
<div class="mb-3">
  <label class="form-label">Título Profesional</label>
  <select name="titulo_profesional" id="titulo_profesional" class="form-select" required>
    <option value="">-- Selecciona un título profesional --</option>
    <?php foreach ($titulos as $tit): ?>
      <option value="<?= htmlspecialchars($tit['ID_Titulo']) ?>">
        <?= htmlspecialchars($tit['NombreTitulo']) ?>
      </option>
    <?php endforeach; ?>
    <option value="__otro__">➕ Otro…</option>
  </select>
  <div class="invalid-feedback">Selecciona un título profesional.</div>
</div>


<!-- Institución -->
<div class="mb-3">
  <label class="form-label">Institución</label>
  <select name="institucion" id="institucion" class="form-select" required>
    <option value="">-- Selecciona una institución --</option>
    <?php foreach($instituciones as $inst): ?>
      <option value="<?= htmlspecialchars($inst['ID_Institucion']) ?>">
        <?= htmlspecialchars($inst['NombreInstitucion']) ?>
      </option>
    <?php endforeach; ?>
    <option value="__otro__">➕ Otro…</option>
  </select>
  <div class="invalid-feedback">Selecciona una institución.</div>
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




<!-- Modal para nueva especialidad -->
<!-- MODAL: Agregar Especialidad (FUERA del form principal) -->
<div class="modal fade" id="modalEspecialidad" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="formEspecialidad" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Agregar nueva especialidad</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <div id="espAlert" class="alert alert-danger d-none"></div>
        <label class="form-label">Nombre de la especialidad</label>
        <input type="text" name="nueva_especialidad" class="form-control" required>
      </div>
      <div class="modal-body">
        <div id="espAlert" class="alert alert-danger d-none"></div>
        <label class="form-label">Descripcion de la especialidad</label>
        <input type="text" name="descripcion" class="form-control" required>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button id="btnGuardarEsp" type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </form>
  </div>
</div>


<!-- Modal para nueva especialidad -->
<!-- MODAL: Agregar Especialidad (FUERA del form principal) -->
<div class="modal fade" id="modalTitulo" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="formTitulo" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Agregar nuevo título profesional</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <div id="tituloAlert" class="alert alert-danger d-none"></div>
        <label class="form-label">Nombre del título</label>
        <input type="text" name="nuevo_titulo" class="form-control" required>
      </div>
      <div class="modal-body">
        <label class="form-label">Descripción del título</label>
        <input type="text" name="descripcion" class="form-control" required>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button id="btnGuardarTitulo" type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </form>
  </div>
</div>





<!-- Modal de Institución -->
<div class="modal fade" id="modalInstitucion" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="formInstitucion" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Agregar Institución</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div id="instAlert" class="alert alert-danger d-none"></div>
        <div class="mb-3">
          <label>Nombre de la Institución</label>
          <input type="text" name="nueva_institucion" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Descripción</label>
          <textarea name="descripcion" class="form-control"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" id="btnGuardarInst" class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </form>
  </div>
</div>






    <footer class="my-5 pt-5 text-body-secondary text-center text-small">
        <?php require_once __DIR__ . '/../checkout/CR.php'; ?>
    </footer>
</div>

<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="checkout.js"></script>
<script src="validation-donante.js"></script>
<script>
  const selInst = document.getElementById('institucion');
  const modalInstEl = document.getElementById('modalInstitucion');
  const modalInst = new bootstrap.Modal(modalInstEl);
  let lastValidInstValue = "";

  // Guardar valor anterior al abrir
  selInst.addEventListener('focus', () => { lastValidInstValue = selInst.value; });

  // Abrir modal al elegir "Otro"
  selInst.addEventListener('change', () => {
    if (selInst.value === '__otro__') {
      document.getElementById('instAlert').classList.add('d-none');
      document.getElementById('formInstitucion').reset();
      modalInst.show();
      selInst.value = ''; // limpiar select
    }
  });








  

  // AJAX para agregar institución
  document.getElementById('formInstitucion').addEventListener('submit', async (e) => {
    e.preventDefault();
    const btn = document.getElementById('btnGuardarInst');
    btn.disabled = true;

    const fd = new FormData(e.target);
    try {
      const resp = await fetch('ajax_add_institucion.php', { method: 'POST', body: fd });
      const data = await resp.json();

      if (!data.ok) {
        const alert = document.getElementById('instAlert');
        alert.textContent = data.error || 'Error desconocido';
        alert.classList.remove('d-none');
        btn.disabled = false;
        return;
      }

      // Agregar nueva opción al select y seleccionarla
      const opt = document.createElement('option');
      opt.value = data.id;
      opt.textContent = data.NombreInstitucion; // igual que en PHP
      const otro = selInst.querySelector('option[value="__otro__"]');
      selInst.insertBefore(opt, otro);
      selInst.value = data.id;

      modalInst.hide();
    } catch (err) {
      const alert = document.getElementById('instAlert');
      alert.textContent = 'No se pudo guardar. Intenta de nuevo.';
      alert.classList.remove('d-none');
    } finally {
      btn.disabled = false;
    }
  });

  // Restaurar valor si cierran modal sin guardar
  modalInstEl.addEventListener('hidden.bs.modal', () => {
    if (selInst.value === '') {
      selInst.value = lastValidInstValue || '';
    }
  });
</script>


<script>
  const selEsp = document.getElementById('especialidad');
  const modalEspEl = document.getElementById('modalEspecialidad');
  const modalEsp = new bootstrap.Modal(modalEspEl);
  let lastValidEspValue = ""; // para restaurar si cancelan

  // Abrir modal al elegir "Otro"
  selEsp.addEventListener('focus', () => { lastValidEspValue = selEsp.value; });
  selEsp.addEventListener('change', () => {
    if (selEsp.value === '__otro__') {
      document.getElementById('espAlert').classList.add('d-none');
      document.getElementById('formEspecialidad').reset();
      modalEsp.show();
    }
  });



  // Guardar por AJAX sin recargar
  document.getElementById('formEspecialidad').addEventListener('submit', async (e) => {
    e.preventDefault();
    const btn = document.getElementById('btnGuardarEsp');
    btn.disabled = true;

    const fd = new FormData(e.target);
    try {
      const resp = await fetch('ajax_add_especialidad.php', { method: 'POST', body: fd });
      const data = await resp.json();

      if (!data.ok) {
        // Mostrar error en el modal
        const alert = document.getElementById('espAlert');
        alert.textContent = data.error || 'Error desconocido';
        alert.classList.remove('d-none');
        btn.disabled = false;
        return;
      }

      // Crear opción nueva en el select y seleccionarla
      const opt = document.createElement('option');
      opt.value = data.id;
      opt.textContent = data.NombreEspecialidad;

      // Insertarla antes de "Otro…"
      const otro = selEsp.querySelector('option[value="__otro__"]');
      selEsp.insertBefore(opt, otro);
      selEsp.value = data.id;

      modalEsp.hide();
    } catch (err) {
      const alert = document.getElementById('espAlert');
      alert.textContent = 'No se pudo guardar. Intenta de nuevo.';
      alert.classList.remove('d-none');
    } finally {
      btn.disabled = false;
    }
  });

  // Si cierran el modal sin guardar, restaurar el valor anterior del select
  modalEspEl.addEventListener('hidden.bs.modal', () => {
    if (selEsp.value === '__otro__') {
      selEsp.value = lastValidEspValue || '';
    }
  });


















/*
  document.getElementById('titulo_profesional').addEventListener('change', function() {
  if (this.value === '__otro__') {
    var modal = new bootstrap.Modal(document.getElementById('modalTitulo'));
    modal.show();
    this.value = ''; // Reset select
  }
});

document.getElementById('formNuevoTitulo').addEventListener('submit', function(e) {
  e.preventDefault();
  const nombre = document.getElementById('nuevo_titulo').value.trim();
  const descripcion = document.getElementById('descripcion_titulo').value.trim(); // NUEVO
  if (!nombre) return;

  fetch('ajax_add_titulo.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: 'nuevo_titulo=' + encodeURIComponent(nombre) +
          '&descripcion=' + encodeURIComponent(descripcion) // NUEVO
  })
  .then(res => res.json())
  .then(data => {
    if (data.ok) {
      // Agregar al select
      const select = document.getElementById('titulo_profesional');
      const option = document.createElement('option');
      option.value = data.id;
      option.textContent = data.NombreTitulo;
      option.selected = true;
      select.appendChild(option);

      // Cerrar modal
      const modalEl = document.getElementById('modalTitulo');
      const modal = bootstrap.Modal.getInstance(modalEl);
      modal.hide();

      // Limpiar formulario
      document.getElementById('nuevo_titulo').value = '';
      document.getElementById('descripcion_titulo').value = '';
    } else {
      alert(data.error || 'Error al agregar el título');
    }
  });
});  */

</script>


<script>

const selTitulo = document.getElementById('titulo_profesional');
  const modalTituloEl = document.getElementById('modalTitulo');
  const modalTitulo = new bootstrap.Modal(modalTituloEl);
  let lastValidTituloValue = ""; // para restaurar si cancelan

  // Guardar valor previo
  selTitulo.addEventListener('focus', () => { 
    lastValidTituloValue = selTitulo.value; 
  });

  // Abrir modal al elegir "Otro"
  selTitulo.addEventListener('change', () => {
    if (selTitulo.value === '__otro__') {
      document.getElementById('tituloAlert').classList.add('d-none');
      document.getElementById('formTitulo').reset();
      modalTitulo.show();
    }
  });

  // Guardar por AJAX sin recargar
  document.getElementById('formTitulo').addEventListener('submit', async (e) => {
    e.preventDefault();
    const btn = document.getElementById('btnGuardarTitulo');
    btn.disabled = true;

    const fd = new FormData(e.target);
    try {
      const resp = await fetch('ajax_add_titulo.php', { method: 'POST', body: fd });
      const data = await resp.json();

      if (!data.ok) {
        // Mostrar error en el modal
        const alert = document.getElementById('tituloAlert');
        alert.textContent = data.error || 'Error desconocido';
        alert.classList.remove('d-none');
        btn.disabled = false;
        return;
      }

      // Crear opción nueva en el select y seleccionarla
      const opt = document.createElement('option');
      opt.value = data.id;
      opt.textContent = data.NombreTitulo;

      // Insertar antes de "Otro…"
      const otro = selTitulo.querySelector('option[value="__otro__"]');
      selTitulo.insertBefore(opt, otro);
      selTitulo.value = data.id;

      modalTitulo.hide();
    } catch (err) {
      const alert = document.getElementById('tituloAlert');
      alert.textContent = 'No se pudo guardar. Intenta de nuevo.';
      alert.classList.remove('d-none');
    } finally {
      btn.disabled = false;
    }
  });

  // Si cierran el modal sin guardar, restaurar el valor anterior
  modalTituloEl.addEventListener('hidden.bs.modal', () => {
    if (selTitulo.value === '__otro__') {
      selTitulo.value = lastValidTituloValue || '';
    }
  });
</script>
        </html>