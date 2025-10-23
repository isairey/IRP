<?php
require_once __DIR__ . '/../pages/seccion.php';

?>
<?php
require_once __DIR__ . '/../db/config.php';
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->exec("SET NAMES utf8");

// --- CONTROLADOR AJAX ---
if (isset($_GET['accion'])) {
    header('Content-Type: application/json; charset=utf-8');

    // 🔹 Obtener módulos por diplomado
    if ($_GET['accion'] === 'modulos' && isset($_GET['diplomado_id'])) {
        $stmt = $conn->prepare("SELECT ID_Modulo, NombreModulo FROM modulos WHERE DiplomadoID = ?");
        $stmt->execute([$_GET['diplomado_id']]);
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        exit;
    }

    // 🔹 Obtener secciones por módulo
    if ($_GET['accion'] === 'secciones' && isset($_GET['modulo_id'])) {
        $stmt = $conn->prepare("SELECT ID, NombreSeccion FROM secciones WHERE ModuloID = ?");
        $stmt->execute([$_GET['modulo_id']]);
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        exit;
    }

    // 🔹 Ponentes ya asignados a una sección
    if ($_GET['accion'] === 'ponentes_asignados' && isset($_GET['seccion_id'])) {
        $stmt = $conn->prepare("
            SELECT p.ID_Ponente, CONCAT(p.Nombre, ' ', p.ApellidoPaterno, ' ', p.ApellidoMaterno) AS NombreCompleto
            FROM seccion_ponentes sp
            INNER JOIN ponentes p ON sp.ID_Ponente = p.ID_Ponente
            WHERE sp.ID_Seccion = ?
        ");
        $stmt->execute([$_GET['seccion_id']]);
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        exit;
    }

    // 🔹 Lista completa de ponentes
    if ($_GET['accion'] === 'todos_ponentes') {
        $stmt = $conn->query("
            SELECT ID_Ponente, CONCAT(Nombre, ' ', ApellidoPaterno, ' ', ApellidoMaterno) AS NombreCompleto
            FROM ponentes
        ");
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        exit;
    }


// 🔹 Obtener actividades de ponentes asignados a una sección
// 🔹 Obtener actividades de un ponente en una sección
// 🔹 Obtener actividades de un ponente específico en una sección
if (isset($_GET['accion']) && $_GET['accion'] === 'actividades_ponentes' 
    && isset($_GET['seccion_id']) && isset($_GET['ponente_id'])) {

    $stmt = $conn->prepare("
        SELECT ID, Actividad, HorarioInicio, HorarioFin, Materiales
        FROM ponente_actividad
        WHERE ID_Seccion = ? AND ID_Ponente = ?
    ");
    $stmt->execute([$_GET['seccion_id'], $_GET['ponente_id']]);
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    exit;
}




}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_seccion = $_POST['id_seccion'] ?? null;
    $id_ponente = $_POST['select_ponente'] ?? null; // Ponente seleccionado
    $actividad_ids = $_POST['actividad_id'] ?? [];
    $actividad_nombres = $_POST['actividad_nombre'] ?? [];
    $actividad_hora_inicio = $_POST['actividad_hora_inicio'] ?? [];
    $actividad_hora_fin = $_POST['actividad_hora_fin'] ?? [];
    $actividad_materiales = $_POST['actividad_materiales'] ?? [];

    if ($id_seccion && $id_ponente && !empty($actividad_nombres)) {

        $insert_stmt = $conn->prepare("INSERT INTO ponente_actividad 
            (ID_Seccion, ID_Ponente, Actividad, HorarioInicio, HorarioFin, Materiales)
            VALUES (?, ?, ?, ?, ?, ?)");

        $update_stmt = $conn->prepare("UPDATE ponente_actividad SET
            Actividad = ?, HorarioInicio = ?, HorarioFin = ?, Materiales = ?
            WHERE ID = ?");

        foreach ($actividad_nombres as $i => $nombre) {
            $id_actividad = $actividad_ids[$i] ?? null;
            $inicio = $actividad_hora_inicio[$i] ?? null;
            $fin = $actividad_hora_fin[$i] ?? null;
            $materiales = $actividad_materiales[$i] ?? '';

            if (!$nombre || !$inicio || !$fin) continue; // saltar si falta dato

            if (!empty($id_actividad)) {
                // Actualizar actividad existente
                $update_stmt->execute([$nombre, $inicio, $fin, $materiales, $id_actividad]);
            } else {
                // Insertar nueva actividad
                $insert_stmt->execute([$id_seccion, $id_ponente, $nombre, $inicio, $fin, $materiales]);
            }
        }
    }

    header("Location: ./../pages/ver-ponentes-diplomado.php?status=success");
    exit;
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
    <title>Asignacion Proyecto</title>
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





     
<div class="container mt-5">
  <div class="text-center mb-4">
    <img src="../assets/img/logo 1.png" alt="Logo" width="100">
    <h2 class="mt-3">Asignar Ponentes a Sección</h2>
  </div>

  <form method="POST" class="border p-4 rounded shadow-sm bg-light">
    <!-- DIPLOMADO -->
    <div class="mb-3">
      <label class="form-label">Diplomado</label>
      <select id="diplomado_id" class="form-select" onchange="cargarModulos()" required>
        <option value="">Seleccione un diplomado</option>
        <?php
        $sql = "SELECT ID_Diplomado, NombreDiplomado FROM diplomados";
        foreach ($conn->query($sql) as $row) {
            echo "<option value='{$row['ID_Diplomado']}'>{$row['NombreDiplomado']}</option>";
        }
        ?>
      </select>
    </div>

    <!-- MÓDULO -->
    <div class="mb-3">
      <label class="form-label">Módulo</label>
      <select id="modulo_id" class="form-select" onchange="cargarSecciones()" required>
        <option value="">Seleccione un módulo</option>
      </select>
    </div>

    <!-- SECCIÓN -->
    <div class="mb-3">
      <label class="form-label">Sección</label>
      <select name="id_seccion" id="id_seccion" class="form-select" onchange="cargarPonentesPorSeccion()" required>
        <option value="">Seleccione una sección</option>
      </select>
    </div>

    <!-- Ponentes ya asignados -->
    <div class="mb-3">
  <label class="form-label">Ponente</label>
  <select id="select_ponente" name="select_ponente" class="form-select" onchange="cargarActividadesPonente()">
    <option value="">Seleccione un ponente</option>
</select>

</div>

<!-- Contenedor donde se generarán los inputs de actividades -->
<div id="actividades-inputs-container"></div>


<!-- Contenedor donde se generarán los inputs -->
<div id="actividades-inputs-container"></div>


<!-- Contenedor para la actividad del ponente -->
<div id="actividad-ponente" class="mb-4"></div>

    <div class="d-flex gap-2 mt-3">
      <button type="button" class="btn btn-primary flex-grow-1" onclick="agregarActividadInput()">➕ Agregar Ponente</button>
      <button type="submit" class="btn btn-success flex-grow-1">💾 Guardar Cambios</button>
    </div>
  </form>
</div>



 <footer class="my-5 pt-5 text-body-secondary text-center text-small">
          <?php
          require_once __DIR__ . '/../checkout/CR.php';
          ?>
            
                <ul class="list-inline">
                </ul>
        </footer>


<!-- SweetAlert para notificaciones -->
<?php if (isset($_GET['status'])): ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
Swal.fire({
  icon: "<?= $_GET['status'] === 'success' ? 'success' : 'error' ?>",
  title: "<?= $_GET['status'] === 'success' ? 'Cambios guardados' : 'Error al guardar' ?>",
  timer: 2000,
  showConfirmButton: false
});
</script>
<?php endif; ?>


<script>
// --- Cargar módulos ---
function cargarModulos() {
  const diplomadoId = document.getElementById("diplomado_id").value;
  fetch(`?accion=modulos&diplomado_id=${diplomadoId}`)
    .then(res => res.json())
    .then(data => {
      const modSel = document.getElementById("modulo_id");
      modSel.innerHTML = '<option value="">Seleccione un módulo</option>';
      data.forEach(m => modSel.innerHTML += `<option value="${m.ID_Modulo}">${m.NombreModulo}</option>`);
    });
}

// --- Cargar secciones ---
function cargarSecciones() {
  const moduloId = document.getElementById("modulo_id").value;
  fetch(`?accion=secciones&modulo_id=${moduloId}`)
    .then(res => res.json())
    .then(data => {
      const secSel = document.getElementById("id_seccion");
      secSel.innerHTML = '<option value="">Seleccione una sección</option>';
      data.forEach(s => secSel.innerHTML += `<option value="${s.ID}">${s.NombreSeccion}</option>`);
    });
}

// --- Cargar ponentes asignados a la sección seleccionada ---
function cargarPonentesPorSeccion() {
  const seccionId = document.getElementById("id_seccion").value;
  const sel = document.getElementById("select_ponente");
  const cont = document.getElementById("actividad-ponente");
  sel.innerHTML = '<option value="">Seleccione un ponente</option>';
  cont.innerHTML = "";

  if (!seccionId) return;

  fetch(`?accion=ponentes_asignados&seccion_id=${seccionId}`)
    .then(res => res.json())
    .then(data => {
      if (data.length === 0) {
        sel.innerHTML = '<option value="">(No hay ponentes asignados)</option>';
      } else {
        data.forEach(p => {
          sel.innerHTML += `<option value="${p.ID_Ponente}">${p.NombreCompleto}</option>`;
        });
      }
    });
}

// --- Al seleccionar un ponente, cargar sus actividades ---
function cargarActividadPonente() {
  const idPonente = document.getElementById("select_ponente").value;
  const idSeccion = document.getElementById("id_seccion").value;
  const cont = document.getElementById("actividad-ponente");

  cont.innerHTML = "";

  if (!idPonente || !idSeccion) return;

  fetch(`?accion=actividades_ponentes&seccion_id=${idSeccion}`)
    .then(res => res.json())
    .then(data => {
      const actividad = data.find(a => a.ID_Ponente == idPonente);

      if (actividad && actividad.ActividadID) {
        cont.innerHTML = `
          <h6>Actividad existente:</h6>
          <p><strong>Actividad:</strong> ${actividad.Actividad}</p>
          <p><strong>Horario:</strong> ${actividad.Horario}</p>
          <p><strong>Materiales:</strong> ${actividad.Materiales}</p>
          <button class="btn btn-warning" onclick="editarActividad(${actividad.ActividadID})">✏️ Editar Actividad</button>
        `;
      } else {
        cont.innerHTML = `
          <h6>Agregar nueva actividad:</h6>
          <button class="btn btn-success" onclick="agregarActividad(${idPonente}, ${idSeccion})">➕ Agregar Actividad</button>
        `;
      }
    });
}
</script>


<script>
// Al cambiar el ponente, cargar sus actividades
function cargarActividadesPonente() {
    const idSeccion = document.getElementById("id_seccion").value;
    const idPonente = document.getElementById("select_ponente").value;
    const container = document.getElementById("actividades-inputs-container");

    container.innerHTML = ""; // Limpiar previo

    if (!idSeccion || !idPonente) return;

    fetch(`?accion=actividades_ponentes&seccion_id=${idSeccion}&ponente_id=${idPonente}`)
        .then(res => res.json())
        .then(data => {
            if (data.length === 0) {
                agregarActividadInput(); // Si no hay actividades, mostrar input vacío
            } else {
                data.forEach(act => {
                    agregarActividadInput(act); // Crear inputs por cada actividad existente
                });
            }
        });
}


// Función para agregar un input de actividad, recibe actividad existente opcional
function agregarActividadInput(actividad = {}) {
    const container = document.getElementById("actividades-inputs-container");
    const index = container.children.length; // índice para los arrays

    const html = `
        <div class="card mb-2 border-primary">
            <div class="card-body">
                <h5>Actividad ${index + 1}</h5>
                <input type="hidden" name="actividad_id[]" value="${actividad.ID || ''}">

                <div class="mb-2">
                    <label class="form-label">Nombre de la actividad</label>
                    <input type="text" name="actividad_nombre[]" class="form-control" value="${actividad.Actividad || ''}" required>
                </div>

                <div class="mb-2">
                    <label class="form-label">Horario</label>
                    <div class="d-flex gap-2">
                        <input type="time" name="actividad_hora_inicio[]" class="form-control" value="${actividad.HorarioInicio || ''}" required>
                        <span class="align-self-center">a</span>
                        <input type="time" name="actividad_hora_fin[]" class="form-control" value="${actividad.HorarioFin || ''}" required>
                    </div>
                </div>

                <div class="mb-2">
                    <label class="form-label">Materiales</label>
                    <textarea name="actividad_materiales[]" class="form-control" rows="2">${actividad.Materiales || ''}</textarea>
                </div>
            </div>
        </div>
    `;

    container.insertAdjacentHTML('beforeend', html);
}

</script>





    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="checkout.js"></script>



</body>
        </html>




