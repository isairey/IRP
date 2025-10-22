<?php
require_once __DIR__ . '/../pages/seccion.php';

require_once __DIR__ . '/../db/config.php';

// --- OBTENER DIPLOMADOS ---
$diplomados = $conn->query("SELECT ID_Diplomado, NombreDiplomado FROM diplomados ORDER BY NombreDiplomado")->fetchAll(PDO::FETCH_ASSOC);

// --- PROCESAR FORMULARIO ---
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["guardar_secciones"])) {
    $diplomadoId = (int)$_POST["diplomado_id"];
    $moduloId = (int)$_POST["modulo_id"];

    $idsSecciones      = $_POST["seccion_id"] ?? [];
    $nombresSecciones  = $_POST["nombre_seccion"] ?? [];
    $descsSecciones    = $_POST["descripcion_seccion"] ?? [];
    $fechasSecciones   = $_POST["fecha_seccion"] ?? [];

    try {
        $conn->beginTransaction();

        for ($i = 0; $i < count($nombresSecciones); $i++) {
            $idSec = $idsSecciones[$i] ?? null;
            $nombre = trim($nombresSecciones[$i]);
            $descripcion = trim($descsSecciones[$i]);
            $fecha = trim($fechasSecciones[$i]);

            if ($nombre !== "" && $fecha !== "") {
                if ($idSec) {
                    // Actualizar existente
                    $stmt = $conn->prepare("UPDATE secciones SET NombreSeccion = ?, Descripcion = ?, Fecha = ? WHERE ID = ?");
                    $stmt->execute([$nombre, $descripcion, $fecha, $idSec]);
                } else {
                    // Insertar nuevo
                    $stmt = $conn->prepare("INSERT INTO secciones (DiplomadoID, NumSeccion, Fecha, ModuloID, NombreSeccion, Descripcion) VALUES (?, ?, ?, ?, ?, ?)");
                    // Calcular número de sección
                    $stmtNum = $conn->prepare("SELECT COUNT(*) FROM secciones WHERE ModuloID = ?");
                    $stmtNum->execute([$moduloId]);
                    $numSec = (int)$stmtNum->fetchColumn() + 1;

                    $stmt->execute([$diplomadoId, $numSec, $fecha, $moduloId, $nombre, $descripcion]);
                }
            }
        }

        $conn->commit();
       header("Location: ../pages/ver-seciones.php?mensaje=success");
        exit();

    } catch (Exception $e) {
       $conn->rollBack();
        header("Location: ../pages/ver-seciones.php?mensaje=error&msg=" . urlencode($e->getMessage()));
        exit();
    }
}

// --- AJAX para cargar módulos y secciones ---
if (isset($_GET["accion"])) {
    if ($_GET["accion"] === "modulos" && isset($_GET["diplomado_id"])) {
        $diplomadoId = (int)$_GET["diplomado_id"];
        $modulos = $conn->prepare("SELECT ID_Modulo, NombreModulo FROM modulos WHERE DiplomadoID = ?");
        $modulos->execute([$diplomadoId]);
        echo json_encode($modulos->fetchAll(PDO::FETCH_ASSOC));
        exit;
    }

    if ($_GET["accion"] === "secciones" && isset($_GET["modulo_id"])) {
        $moduloId = (int)$_GET["modulo_id"];
        $secciones = $conn->prepare("SELECT ID, NombreSeccion, Descripcion, Fecha FROM secciones WHERE ModuloID = ?");
        $secciones->execute([$moduloId]);
        echo json_encode($secciones->fetchAll(PDO::FETCH_ASSOC));
        exit;
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
   <h2>Asignar Secciones a Módulo</h2>

<?php if (!empty($msg)) echo "<div class='alert alert-info'>$msg</div>"; ?>

<form method="POST">
    <div class="mb-3">
        <label class="form-label">Diplomado</label>
        <select id="diplomado_id" name="diplomado_id" class="form-select" required onchange="cargarModulos()">
            <option value="">Seleccione un diplomado</option>
            <?php foreach ($diplomados as $d) : ?>
                <option value="<?= $d["ID_Diplomado"] ?>"><?= htmlspecialchars($d["NombreDiplomado"]) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Módulo</label>
        <select id="modulo_id" name="modulo_id" class="form-select" required onchange="cargarSecciones()">
            <option value="">Seleccione un módulo</option>
        </select>
    </div>

    <div id="secciones-container"></div>

    <button type="button" class="btn btn-primary mt-2" onclick="agregarSeccion()">➕ Agregar Sección</button>
    <button type="submit" class="btn btn-success mt-2" name="guardar_secciones">💾 Guardar Secciones</button>
</form>

<script>
let contadorSecciones = 0;

function cargarModulos() {
    const diplomadoId = document.getElementById("diplomado_id").value;
    const moduloSelect = document.getElementById("modulo_id");
    moduloSelect.innerHTML = "<option>Cargando módulos...</option>";

    fetch("?accion=modulos&diplomado_id=" + diplomadoId)
        .then(res => res.json())
        .then(data => {
            moduloSelect.innerHTML = '<option value="">Seleccione un módulo</option>';
            data.forEach(m => {
                moduloSelect.innerHTML += `<option value="${m.ID_Modulo}">${m.NombreModulo}</option>`;
            });
        });
}

function cargarSecciones() {
    const moduloId = document.getElementById("modulo_id").value;
    const container = document.getElementById("secciones-container");

    if (!moduloId) {
        container.innerHTML = "";
        return;
    }

    container.innerHTML = "Cargando secciones...";

    fetch("?accion=secciones&modulo_id=" + moduloId)
        .then(res => res.json())
        .then(secciones => {
            container.innerHTML = "";
            contadorSecciones = secciones.length;

            if (secciones.length === 0) {
                agregarSeccion();
                return;
            }

            secciones.forEach((s, i) => {
                container.innerHTML += crearSeccionHTML(s.ID, s.NombreSeccion, s.Descripcion, s.Fecha, i + 1);
            });
        })
        .catch(err => {
            console.error(err);
            container.innerHTML = "<p class='text-danger'>Error al cargar secciones.</p>";
        });
}


function agregarSeccion() {
    contadorSecciones++;
    const container = document.getElementById("secciones-container");
    container.innerHTML += crearSeccionHTML("", "", "", "", contadorSecciones);
}

function crearSeccionHTML(id, nombre, descripcion, fecha, numero) {
    return `
    <div class="card p-3 mb-2 border">
        <h5>Sección ${numero}</h5>
        <input type="hidden" name="seccion_id[]" value="${id}">
        <div class="mb-2">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre_seccion[]" class="form-control" value="${nombre}">
        </div>
        <div class="mb-2">
            <label class="form-label">Descripción</label>
            <textarea name="descripcion_seccion[]" class="form-control" rows="2">${descripcion}</textarea>
        </div>
        <div class="mb-2">
            <label class="form-label">Fecha</label>
            <input type="date" name="fecha_seccion[]" class="form-control" value="${fecha}">
        </div>
    </div>`;
}
</script>


        <footer class="my-5 pt-5 text-body-secondary text-center text-small">
            <?php
          require_once __DIR__ . '/../checkout/CR.php';
          ?>
                <ul class="list-inline">
                </ul>
        </footer>
    </div>

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


