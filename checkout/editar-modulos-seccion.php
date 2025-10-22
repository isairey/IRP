<?php

require_once __DIR__ . '/../pages/seccion.php';
require_once __DIR__ . '/../db/config.php';

$idDiplomado = $_GET['id'] ?? null;
$idModulo = $_GET['idmod'] ?? null;

if (!$idDiplomado || !$idModulo) {
    die("Faltan parámetros: ID de diplomado o módulo no especificado.");
}

// Obtener diplomado
$stmt = $conn->prepare("SELECT ID_Diplomado, NombreDiplomado FROM diplomados WHERE ID_Diplomado = ?");
$stmt->execute([$idDiplomado]);
$diplomado = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$diplomado) die("Diplomado no encontrado.");

// Obtener módulo
$stmt = $conn->prepare("SELECT ID_Modulo, NombreModulo, Descripcion FROM modulos WHERE ID_Modulo = ? AND DiplomadoID = ?");
$stmt->execute([$idModulo, $idDiplomado]);
$modulo = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$modulo) die("Módulo no encontrado o no pertenece al diplomado.");

// Obtener secciones del módulo
$stmt = $conn->prepare("SELECT ID, NombreSeccion, Descripcion FROM secciones WHERE ModuloID = ? ORDER BY NumSeccion ASC");
$stmt->execute([$idModulo]);
$secciones = $stmt->fetchAll(PDO::FETCH_ASSOC);
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

  <div class="container">
  <main>
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="../assets/img/logo 1.png" alt="Logo" width="100" height="100">
      <h2>Editar Módulo de <?= htmlspecialchars($diplomado['NombreDiplomado']) ?></h2>
      <p class="lead">Modifica el módulo y sus secciones asociadas.</p>
    </div>

    <form action="./update-modulo-secciones.php" method="POST" id="moduloForm">
      <input type="hidden" name="id_diplomado" value="<?= $diplomado['ID_Diplomado'] ?>">
      <input type="hidden" name="id_modulo" value="<?= $modulo['ID_Modulo'] ?>">

      <!-- Datos del módulo -->
      <div class="card mb-4 shadow-sm">
        <div class="card-body">
          <h5 class="card-title">Datos del Módulo</h5>
          <div class="mb-3">
            <label class="form-label">Nombre del Módulo</label>
            <input type="text" name="nombre_modulo" class="form-control" value="<?= htmlspecialchars($modulo['NombreModulo']) ?>" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="descripcion_modulo" class="form-control" rows="3" required><?= htmlspecialchars($modulo['Descripcion']) ?></textarea>
          </div>
        </div>
      </div>

      <!-- Secciones -->
      <h4 class="mb-3">Secciones del Módulo</h4>
      <div id="seccionesContainer">
        <?php foreach ($secciones as $i => $sec): ?>
          <div class="card mb-3 shadow-sm seccion-item">
            <div class="card-body">
              <h5 class="card-title">Sección <?= $i + 1 ?></h5>

              <div class="mb-3">
                <label class="form-label">Título de la Sección</label>
                <input type="text" name="titulo_seccion[]" class="form-control" value="<?= htmlspecialchars($sec['NombreSeccion']) ?>" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea name="descripcion_seccion[]" class="form-control" rows="3" required><?= htmlspecialchars($sec['Descripcion']) ?></textarea>
              </div>

              <input type="hidden" name="id_seccion[]" value="<?= $sec['ID'] ?>">
              <button type="button" class="btn btn-danger btn-sm removeSeccion">Eliminar Sección</button>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <button type="button" id="agregarSeccion" class="btn btn-success mb-3">Agregar Sección</button>

      <hr class="my-4">
      <button class="btn btn-primary w-100" type="submit">Guardar Cambios</button>
    </form>
  </main>
</div>

<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script>
let contadorSecciones = <?= count($secciones) ?>;

// Agregar nueva sección
document.getElementById('agregarSeccion').addEventListener('click', function () {
  contadorSecciones++;
  const cont = document.getElementById('seccionesContainer');
  const html = `
    <div class="card mb-3 shadow-sm seccion-item">
      <div class="card-body">
        <h5 class="card-title">Sección ${contadorSecciones}</h5>

        <div class="mb-3">
          <label class="form-label">Título de la Sección</label>
          <input type="text" name="titulo_seccion[]" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Descripción</label>
          <textarea name="descripcion_seccion[]" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
          <label class="form-label">Fecha de la Sección</label>
          <input type="date" name="fecha_seccion[]" class="form-control" required>
        </div>

        <input type="hidden" name="id_seccion[]" value="">
        <button type="button" class="btn btn-danger btn-sm removeSeccion">Eliminar Sección</button>
      </div>
    </div>
  `;
  cont.insertAdjacentHTML('beforeend', html);
});

// Eliminar secciones visualmente
document.getElementById('seccionesContainer').addEventListener('click', function(e) {
  if (e.target.classList.contains('removeSeccion')) {
    e.target.closest('.seccion-item').remove();
  }
});
</script>



 <footer class="my-5 pt-5 text-body-secondary text-center text-small">
            <?php
          require_once __DIR__ . '/../checkout/CR.php';
          ?>
                <ul class="list-inline">
                </ul>
        </footer>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="checkout.js"></script></body>
    <script src="validation-donante.js"></script>




     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if (!empty($mensaje)): ?>
<script>
Swal.fire({
    icon: "<?= $tipoMensaje ?>",
    title: "<?= $mensaje ?>",
    showConfirmButton: false,
    timer: 3000
}).then(() => {
    window.location.href = "../pages/ver-diplomado.php";
});
</script>
<?php endif; ?>
        </html>