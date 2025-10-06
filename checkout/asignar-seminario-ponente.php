<?php
require_once __DIR__ . '/../pages/seccion.php';


require_once __DIR__ . '/../db/config.php'; // debe definir $conn (PDO)

$mensaje = '';
$error = '';
$redirigir = false;

// helpers para obtener títulos (flexible con nombre del campo)
function tituloSeminarioFromRow($row) {
    return $row['titulo'] ?? $row['Nombre'] ?? $row['nombre'] ?? $row['NombreSeminario'] ?? ("Seminario " . ($row['ID_Seminario'] ?? ''));
}
function nombrePonenteFromRow($row) {
    if (isset($row['Nombre']) || isset($row['ApellidoPaterno']) || isset($row['ApellidoMaterno'])) {
        $n = ($row['Nombre'] ?? '') . ' ' . ($row['ApellidoPaterno'] ?? '') . ' ' . ($row['ApellidoMaterno'] ?? '');
        return trim(preg_replace('/\s+/', ' ', $n));
    }
    return $row['NombreCompleto'] ?? $row['NombrePonente'] ?? ("Ponente " . ($row['ID_Ponente'] ?? ''));
}

// manejar CREATE / UPDATE
try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $accion = $_POST['accion'] ?? 'create';
        $id_seminario = isset($_POST['id_seminario']) ? (int)$_POST['id_seminario'] : 0;
        $id_ponente   = isset($_POST['id_ponente'])   ? (int)$_POST['id_ponente']   : 0;
        $fechaAsign   = !empty($_POST['fecha_asignacion']) ? $_POST['fecha_asignacion'] : date('Y-m-d H:i:s');

        if ($id_seminario <= 0 || $id_ponente <= 0) {
            $error = "Selecciona seminario y ponente válidos.";
        } else {
            if ($accion === 'create') {
                $ins = $conn->prepare("INSERT INTO asignacion_ponente_seminario (ID_Seminario, ID_Ponente, FechaAsignacion) VALUES (:seminario, :ponente, :fecha)");
                $ins->execute([':seminario'=>$id_seminario, ':ponente'=>$id_ponente, ':fecha'=>$fechaAsign]);
                $mensaje = "Asignación creada correctamente.";
            } elseif ($accion === 'update' && !empty($_POST['id_asignacion'])) {
                $id_asig = (int)$_POST['id_asignacion'];
                $upd = $conn->prepare("UPDATE asignacion_ponente_seminario SET ID_Seminario=:seminario, ID_Ponente=:ponente, FechaAsignacion=:fecha WHERE ID_Asignacion = :id");
                $upd->execute([':seminario'=>$id_seminario, ':ponente'=>$id_ponente, ':fecha'=>$fechaAsign, ':id'=>$id_asig]);
                $mensaje = "Asignación actualizada correctamente.";
            }

            // Marcar para redirección con alerta
            $redirigir = true;
        }
    }

    // manejar DELETE por GET ?delete=ID
    if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
        $delId = (int)$_GET['delete'];
        $del = $conn->prepare("DELETE FROM asignacion_ponente_seminario WHERE ID_Asignacion = :id");
        $del->execute([':id'=>$delId]);
        header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
        exit();
    }
} catch (PDOException $ex) {
    $error = "Error en la base de datos: " . $ex->getMessage();
}

// cargar seminarios y ponentes (para selects)
$seminariosRows = $conn->query("SELECT * FROM seminarios ORDER BY fecha ASC")->fetchAll(PDO::FETCH_ASSOC);
$ponentesRows   = $conn->query("SELECT * FROM Ponentes ORDER BY Nombre ASC")->fetchAll(PDO::FETCH_ASSOC);

// mapas para mostrar nombres en la tabla
$seminariosMap = [];
foreach ($seminariosRows as $r) $seminariosMap[$r['ID_Seminario']] = tituloSeminarioFromRow($r);
$ponentesMap = [];
foreach ($ponentesRows as $r) $ponentesMap[$r['ID_Ponente']] = nombrePonenteFromRow($r);

// cargar asignaciones para listar
$asigs = $conn->query("SELECT * FROM asignacion_ponente_seminario ORDER BY FechaAsignacion DESC")->fetchAll(PDO::FETCH_ASSOC);

// si estamos editando (GET ?edit=ID) pre-cargar registro
$editing = false;
$editRecord = null;
if (isset($_GET['edit']) && is_numeric($_GET['edit'])) {
    $idEdit = (int)$_GET['edit'];
    $stmt = $conn->prepare("SELECT * FROM asignacion_ponente_seminario WHERE ID_Asignacion = :id");
    $stmt->execute([':id'=>$idEdit]);
    $editRecord = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($editRecord) $editing = true;
}

// Si debe redirigir después del POST
if ($redirigir) {
           header("Location: ../pages/ver-seminario-ponente.php?status=success");
exit();
   
}else{
        //  header("Location: ../pages/ver-seminario-ponente.php?status=error&msg=" . urlencode($error));
//exit();

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

    
        
    <div class="container">
  <h2 class="mb-4">Asignar Ponente a Seminario</h2>

  <?php if ($mensaje): ?>
    <div class="alert alert-success"><?= htmlspecialchars($mensaje) ?></div>
  <?php endif; ?>
  <?php if ($error): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>

  <div class="card mb-4">
    <div class="card-body">
      <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) . (isset($_GET['edit']) ? '?edit=' . (int)$_GET['edit'] : '') ?>">
        <input type="hidden" name="accion" value="<?= $editing ? 'update' : 'create' ?>">
        <?php if ($editing): ?>
          <input type="hidden" name="id_asignacion" value="<?= (int)$editRecord['ID_Asignacion'] ?>">
        <?php endif; ?>

        <div class="row g-3">
          <div class="col-md-6">
            <label for="id_seminario" class="form-label">Seminario</label>
            <select id="id_seminario" name="id_seminario" class="form-select" required>
              <option value="">-- Selecciona un Seminario --</option>
              <?php foreach ($seminariosRows as $s): 
                $title = tituloSeminarioFromRow($s);
                $sel = ($editing && $editRecord['ID_Seminario']==$s['ID_Seminario']) ? 'selected' : '';
              ?>
                <option value="<?= $s['ID_Seminario'] ?>" <?= $sel ?>><?= htmlspecialchars($title) ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="col-md-6">
            <label for="id_ponente" class="form-label">Ponente</label>
            <select id="id_ponente" name="id_ponente" class="form-select" required>
              <option value="">-- Selecciona un Ponente --</option>
              <?php foreach ($ponentesRows as $p):
                $name = nombrePonenteFromRow($p);
                $sel = ($editing && $editRecord['ID_Ponente']==$p['ID_Ponente']) ? 'selected' : '';
              ?>
                <option value="<?= $p['ID_Ponente'] ?>" <?= $sel ?>><?= htmlspecialchars($name) ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="col-md-6">
            <label for="fecha_asignacion" class="form-label">Fecha de Asignación</label>
            <input type="datetime-local" id="fecha_asignacion" name="fecha_asignacion" class="form-control"
                value="<?= $editing ? date('Y-m-d\TH:i', strtotime($editRecord['FechaAsignacion'])) : date('Y-m-d\TH:i') ?>">
          </div>

       <div class="col-md-6 d-flex align-items-end gap-2">
    <button class="btn btn-primary flex-grow-1" type="submit">
        <?= $editing ? 'Guardar cambios' : 'Registrar asignación' ?>
    </button>
    <a href="../pages/ver-seminario-ponente.php" class="btn btn-secondary">
        Salir
    </a>
</div>

        </div>
      </form>
    </div>
  </div>

  <!-- Tabla de asignaciones -->
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>#</th>
          <th>Seminario</th>
          <th>Ponente</th>
          <th>FechaAsignación</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($asigs as $a): ?>
          <tr>
            <td><?= (int)$a['ID_Asignacion'] ?></td>
            <td><?= htmlspecialchars($seminariosMap[$a['ID_Seminario']] ?? ('ID ' . $a['ID_Seminario'])) ?></td>
            <td><?= htmlspecialchars($ponentesMap[$a['ID_Ponente']] ?? ('ID ' . $a['ID_Ponente'])) ?></td>
            <td><?= htmlspecialchars($a['FechaAsignacion']) ?></td>
            <td>
              <a class="btn btn-sm btn-outline-primary" href="?edit=<?= $a['ID_Asignacion'] ?>">Editar</a>
              <a class="btn btn-sm btn-outline-danger" href="?delete=<?= $a['ID_Asignacion'] ?>"
                 onclick="return confirm('Eliminar asignación #<?= $a['ID_Asignacion'] ?>?')">Eliminar</a>
            </td>
          </tr>
        <?php endforeach; ?>
        <?php if (count($asigs)===0): ?>
          <tr><td colspan="5" class="text-center">No hay asignaciones todavía.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

</div>



        <footer class="my-5 pt-5 text-body-secondary text-center text-small">
          <?php
          require_once __DIR__ . '/../checkout/CR.php';
          ?>
            
                <ul class="list-inline">
                </ul>
        </footer>
    </div>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="checkout.js"></script>
   <script>
let valorAnterior = null; // Guardará el valor previo del select

function mostrarModalSiOtro(valor) {
    const select = document.getElementById('id_usuario');
    if(valor === "_otro_") {
        // Guardar el valor actual antes de abrir modal
        valorAnterior = select.value;

        // Mostrar el modal
        var modal = new bootstrap.Modal(document.getElementById('modalOtro'));
        modal.show();

        // Escuchar cuando el modal se oculta
        var modalEl = document.getElementById('modalOtro');
        modalEl.addEventListener('hidden.bs.modal', function () {
            // Si no se agregó nueva usuaria, restaurar el valor anterior
            if (select.value === "_otro_") {
                select.value = valorAnterior;
            }
        }, { once: true }); // solo una vez
    }
}

// Enviar el formulario de nueva usuaria vía AJAX
document.getElementById('formNuevoParticipante').addEventListener('submit', function(e){
    e.preventDefault();
    var formData = new FormData(this);

    fetch('../checkout/registrar_participante.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if(data.success){
            // Agregar la nueva usuaria al select
            var select = document.getElementById('id_usuario');
            var option = document.createElement("option");
            option.value = data.id;
            option.text = data.nombreCompleto;
            option.selected = true;
            select.add(option);
// Mostrar alerta simple
            alert("¡Participante registrado correctamente!");

            // Cerrar modal
            var modalEl = document.getElementById('modalOtro');
            var modal = bootstrap.Modal.getInstance(modalEl);
            modal.hide();
        } else {
            alert("Error: " + data.message);
        }
    })
    .catch(error => {
        console.error("Error al registrar la usuaria:", error);
    });
});
</script>


</body>
        </html>




