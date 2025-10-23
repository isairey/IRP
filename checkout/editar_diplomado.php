<?php

require_once __DIR__ . '/../pages/seccion.php';

require_once __DIR__ . '/../db/config.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("❌ ID no válido.");
}
$idDiplomado = (int)$_GET['id'];

// Cargar diplomado + módulos (para mostrar en el form)
try {
    $stmt = $conn->prepare("SELECT ID_Diplomado, NombreDiplomado, Descripcion, FechaInicio, FechaFin, Num FROM diplomados WHERE ID_Diplomado = :id LIMIT 1");
    $stmt->execute([':id' => $idDiplomado]);
    $diplomado = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$diplomado) {
        die("Diplomado no encontrado.");
    }

    $stmtMod = $conn->prepare("SELECT ID_Modulo, NombreModulo, Descripcion FROM modulos WHERE DiplomadoID = ? ORDER BY ID_Modulo ASC");
    $stmtMod->execute([$idDiplomado]);
    $modulosExistentes = $stmtMod->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

// --- PROCESAR envío del formulario ---
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreDiplomado = trim($_POST["nombre_diplomado"] ?? '');
    $descripcion = trim($_POST["descripcion"] ?? '');
    $fechaInicio = $_POST["fecha_inicio"] ?? null;
    $fechaFin = $_POST["fecha_fin"] ?? null;
    $numModulos = isset($_POST["num_modulos"]) ? (int)$_POST["num_modulos"] : 0;

    // Arrays enviados desde el form
    $modulo_ids          = $_POST['modulo_id'] ?? [];           // pueden venir vacíos para nuevos
    $modulo_nombres      = $_POST['modulo_nombre'] ?? [];
    $modulo_descripciones= $_POST['modulo_descripcion'] ?? [];

    try {
        $conn->beginTransaction();

        // 1) Actualizar datos del diplomado (incluye Num provisional)
        $stmtUpdDipl = $conn->prepare("UPDATE diplomados SET NombreDiplomado = ?, Descripcion = ?, Num = ?, FechaInicio = ?, FechaFin = ? WHERE ID_Diplomado = ?");
        $stmtUpdDipl->execute([$nombreDiplomado, $descripcion, $numModulos, $fechaInicio, $fechaFin, $idDiplomado]);

        // 2) Obtener IDs actuales en BD
        $stmtIds = $conn->prepare("SELECT ID_Modulo FROM modulos WHERE DiplomadoID = ?");
        $stmtIds->execute([$idDiplomado]);
        $currentIDs = $stmtIds->fetchAll(PDO::FETCH_COLUMN);

        // 3) IDs recibidos desde el formulario (filtramos vacíos y casteamos a int)
        $receivedIDs = [];
        foreach ($modulo_ids as $v) {
            if ($v === '' || $v === null) continue;
            $receivedIDs[] = (int)$v;
        }
        // 4) Eliminar módulos que existían en BD pero ya no vinieron en el formulario
        $toDelete = array_diff($currentIDs, $receivedIDs);
        if (count($toDelete) > 0) {
            $placeholders = implode(',', array_fill(0, count($toDelete), '?'));
            $stmtDel = $conn->prepare("DELETE FROM modulos WHERE ID_Modulo IN ($placeholders)");
            $stmtDel->execute(array_values($toDelete));
        }

        // 5) Recorrer lo enviado y actualizar/insertar según corresponda.
        $loopCount = max($numModulos, count($modulo_nombres));
        for ($i = 0; $i < $loopCount; $i++) {
            $idMod = isset($modulo_ids[$i]) && $modulo_ids[$i] !== '' ? (int)$modulo_ids[$i] : null;
            $nom   = trim($modulo_nombres[$i] ?? '');
            $desc  = trim($modulo_descripciones[$i] ?? '');

            if ($idMod) {
                // actualizar
                $stmtUpdate = $conn->prepare("UPDATE modulos SET NombreModulo = ?, Descripcion = ? WHERE ID_Modulo = ?");
                $stmtUpdate->execute([$nom ?: 'Sin título', $desc, $idMod]);
            } else {
                // insertar nuevo
                $stmtInsert = $conn->prepare("INSERT INTO modulos (DiplomadoID, NombreModulo, Descripcion) VALUES (?, ?, ?)");
                $stmtInsert->execute([$idDiplomado, $nom ?: 'Nuevo módulo', $desc]);
            }
        }

        // 6) Asegurar que el campo Num en diplomados refleje la cantidad real
        $stmtCount = $conn->prepare("SELECT COUNT(*) FROM modulos WHERE DiplomadoID = ?");
        $stmtCount->execute([$idDiplomado]);
        $actualCount = (int)$stmtCount->fetchColumn();

        $stmtUpdNum = $conn->prepare("UPDATE diplomados SET Num = ? WHERE ID_Diplomado = ?");
        $stmtUpdNum->execute([$actualCount, $idDiplomado]);

        $conn->commit();

        header("Location: ../pages/ver-diplomado.php?msg=success");
        exit;
    } catch (Exception $e) {
        $conn->rollBack();
        // redirigir con error
        header("Location: ../pages/editar-diplomado.php?id={$idDiplomado}&msg=error&err=" . urlencode($e->getMessage()));
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
  <main class="py-5">
    <div class="text-center mb-4">
      <img src="../assets/img/logo 1.png" alt="" width="100" height="100" class="mb-3">
      <h2>Editar Diplomado</h2>
    </div>

    <form method="POST" class="needs-validation" novalidate>
      <input type="hidden" name="id_diplomado" value="<?= htmlspecialchars($diplomado['ID_Diplomado']) ?>">

      <div class="mb-3">
        <label class="form-label">Nombre del Diplomado</label>
        <input type="text" name="nombre_diplomado" class="form-control" required value="<?= htmlspecialchars($diplomado['NombreDiplomado']) ?>">
      </div>

      <div class="mb-3">
        <label class="form-label">Descripción</label>
        <textarea name="descripcion" class="form-control" rows="3"><?= htmlspecialchars($diplomado['Descripcion']) ?></textarea>
      </div>

      <div class="row">
        <div class="col-md-4 mb-3">
          <label class="form-label">Fecha de Inicio</label>
          <input type="date" name="fecha_inicio" class="form-control" value="<?= htmlspecialchars($diplomado['FechaInicio']) ?>">
        </div>

        <div class="col-md-4 mb-3">
          <label class="form-label">Fecha de Fin</label>
          <input type="date" name="fecha_fin" class="form-control" value="<?= htmlspecialchars($diplomado['FechaFin']) ?>">
        </div>

        <div class="col-md-4 mb-3">
          <label class="form-label">Número de Módulos</label>
          <input type="number" id="num_modulos" name="num_modulos" class="form-control" min="1" required value="<?= htmlspecialchars($diplomado['Num']) ?>">
        </div>
      </div>

      <div id="modulos-inputs-container" class="mt-3"></div>

      <button type="submit" class="btn btn-success w-100 mt-3">💾 Guardar Cambios</button>
    </form>
  </main>
</div>

<script>
// Datos traídos desde PHP: array de { ID_Modulo, NombreModulo, Descripcion }
const modulosExistentes = <?= json_encode($modulosExistentes, JSON_HEX_TAG|JSON_HEX_APOS|JSON_HEX_QUOT|JSON_HEX_AMP) ?>;

function generarModulos() {
    const container = document.getElementById("modulos-inputs-container");
    // preservar contenido actual si existe
    const currNames = Array.from(document.getElementsByName('modulo_nombre[]')).map(i => i.value);
    const currDescs = Array.from(document.getElementsByName('modulo_descripcion[]')).map(i => i.value);
    const currIds   = Array.from(document.getElementsByName('modulo_id[]')).map(i => i.value);

    container.innerHTML = "";

    const num = parseInt(document.getElementById("num_modulos").value) || 0;
    if (num <= 0) return;

    const table = document.createElement('table');
    table.className = 'table table-bordered';
    table.innerHTML = `<thead><tr><th style="width:50px">#</th><th>Nombre</th><th>Descripción</th></tr></thead>`;
    const tbody = document.createElement('tbody');

    for (let i = 0; i < num; i++) {
        const tr = document.createElement('tr');

        const tdIndex = document.createElement('td');
        tdIndex.textContent = i + 1;

        const tdName = document.createElement('td');
        const inputName = document.createElement('input');
        inputName.type = 'text';
        inputName.name = 'modulo_nombre[]';
        inputName.className = 'form-control';

        const hiddenId = document.createElement('input');
        hiddenId.type = 'hidden';
        hiddenId.name = 'modulo_id[]';

        const tdDesc = document.createElement('td');
        const textarea = document.createElement('textarea');
        textarea.name = 'modulo_descripcion[]';
        textarea.className = 'form-control';
        textarea.rows = 2;

        // Priorizar: si ya había contenido en los inputs (preservado), usarlo.
        // Si no, usar datos que vinieron desde la DB (modulosExistentes).
        const nombrePreservado = currNames[i];
        const descPreservado   = currDescs[i];
        const idPreservado     = currIds[i];

        if (typeof nombrePreservado !== 'undefined' && nombrePreservado !== '') {
            inputName.value = nombrePreservado;
        } else if (modulosExistentes[i] && modulosExistentes[i].NombreModulo) {
            inputName.value = modulosExistentes[i].NombreModulo;
        } else {
            inputName.value = '';
        }

        if (typeof descPreservado !== 'undefined' && descPreservado !== '') {
            textarea.value = descPreservado;
        } else if (modulosExistentes[i] && (modulosExistentes[i].Descripcion !== undefined)) {
            textarea.value = modulosExistentes[i].Descripcion;
        } else {
            textarea.value = '';
        }

        if (typeof idPreservado !== 'undefined' && idPreservado !== '') {
            hiddenId.value = idPreservado;
        } else if (modulosExistentes[i] && modulosExistentes[i].ID_Modulo) {
            hiddenId.value = modulosExistentes[i].ID_Modulo;
        } else {
            hiddenId.value = '';
        }

        tdName.appendChild(inputName);
        tdName.appendChild(hiddenId);
        tdDesc.appendChild(textarea);

        tr.appendChild(tdIndex);
        tr.appendChild(tdName);
        tr.appendChild(tdDesc);

        tbody.appendChild(tr);
    }

    table.appendChild(tbody);
    container.appendChild(table);
}

document.getElementById("num_modulos").addEventListener("change", generarModulos);
document.addEventListener("DOMContentLoaded", generarModulos);
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
    window.location.href = "../pages/ver-diplomado.php";
});
</script>
<?php endif; ?>






    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="checkout.js"></script></body>
    <script src="validation-donante.js"></script>
        </html>




