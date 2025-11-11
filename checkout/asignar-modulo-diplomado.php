<?php
require_once __DIR__ . '/../pages/seccion.php';

require_once __DIR__ . '/../db/config.php';

// Manejar AJAX: cargar módulos del diplomado seleccionado
if (isset($_GET['diplomado_id']) && is_numeric($_GET['diplomado_id'])) {
    $idDiplomado = (int)$_GET['diplomado_id'];

    $stmtMod = $conn->prepare("SELECT ID_Modulo, NombreModulo, Descripcion FROM modulos WHERE DiplomadoID = ? ORDER BY ID_Modulo ASC");
    $stmtMod->execute([$idDiplomado]);
    echo json_encode($stmtMod->fetchAll(PDO::FETCH_ASSOC));
    exit;
}

// Manejar envío del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["guardar_modulos"])) {
    $idDiplomado = (int)$_POST["diplomado_id"];
    $numModulos = (int)$_POST["num_modulos"];
    $modulo_ids = $_POST['modulo_id'] ?? [];
    $modulo_nombres = $_POST['modulo_nombre'] ?? [];
    $modulo_descripciones = $_POST['modulo_descripcion'] ?? [];

    try {
        $conn->beginTransaction();

        for ($i = 0; $i < $numModulos; $i++) {
            $idMod = $modulo_ids[$i] ?? null;
            $nombre = trim($modulo_nombres[$i] ?? '');
            $desc = trim($modulo_descripciones[$i] ?? '');

            if ($idMod) {
                $stmtUpdate = $conn->prepare("UPDATE modulos SET NombreModulo = ?, Descripcion = ? WHERE ID_Modulo = ?");
                $stmtUpdate->execute([$nombre ?: 'Sin título', $desc, $idMod]);
            } else {
                if ($nombre !== '') {
                    $stmtInsert = $conn->prepare("INSERT INTO modulos (DiplomadoID, NombreModulo, Descripcion) VALUES (?, ?, ?)");
                    $stmtInsert->execute([$idDiplomado, $nombre, $desc]);
                }
            }
        }

        $stmtCount = $conn->prepare("SELECT COUNT(*) FROM modulos WHERE DiplomadoID = ?");
        $stmtCount->execute([$idDiplomado]);
        $num = (int)$stmtCount->fetchColumn();

        $stmtUpd = $conn->prepare("UPDATE diplomados SET Num = ? WHERE ID_Diplomado = ?");
        $stmtUpd->execute([$num, $idDiplomado]);

        $conn->commit();
        header("Location: ../pages/ver-modulos.php?mensaje=success");
        exit();

    } catch (Exception $e) {
        $conn->rollBack();
        header("Location: ../pages/ver-modulos.php?mensaje=error&msg=" . urlencode($e->getMessage()));
        exit();
    }
}

// Obtener diplomados
$stmt = $conn->query("SELECT ID_Diplomado, NombreDiplomado FROM diplomados ORDER BY NombreDiplomado ASC");
$diplomados = $stmt->fetchAll(PDO::FETCH_ASSOC);
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

    <div class="container py-5">
   <h2>Asignar Módulos a Diplomado</h2>

<form method="POST" id="form-modulos">
    <div class="mb-3">
        <label class="form-label">Seleccionar Diplomado</label>
        <select name="diplomado_id" id="diplomado_id" class="form-select" required>
            <option value="">-- Seleccione --</option>
            <?php foreach ($diplomados as $d): ?>
                <option value="<?= $d['ID_Diplomado'] ?>"><?= htmlspecialchars($d['NombreDiplomado']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Número de módulos</label>
        <input type="number" id="num_modulos" name="num_modulos" class="form-control" min="1" value="1">
    </div>

    <div id="modulos-inputs-container"></div>

    <button type="submit" name="guardar_modulos" class="btn btn-success mt-3">💾 Guardar Módulos</button>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
let modulosExistentes = [];

function generarModulos() {
    const container = $("#modulos-inputs-container");
    container.html("");

    let num = parseInt($("#num_modulos").val());
    if (isNaN(num) || num < 1) return;

    for (let i = 0; i < num; i++) {
        const modExist = modulosExistentes[i] || { ID_Modulo: '', NombreModulo: '', Descripcion: '' };
        container.append(`
            <div class="card mb-2">
                <div class="card-body">
                    <h5>Módulo ${i + 1}</h5>
                    <input type="hidden" name="modulo_id[]" value="${modExist.ID_Modulo}">
                    <div class="mb-2">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="modulo_nombre[]" class="form-control" value="${modExist.NombreModulo}">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Descripción</label>
                        <textarea name="modulo_descripcion[]" class="form-control" rows="2">${modExist.Descripcion}</textarea>
                    </div>
                </div>
            </div>
        `);
    }
}

$("#diplomado_id").change(function() {
    const id = $(this).val();
    if (!id) {
        modulosExistentes = [];
        generarModulos();
        return;
    }

    $.getJSON("asignar-modulo-diplomado.php", { diplomado_id: id }, function(data) {
        modulosExistentes = data;
        $("#num_modulos").val(modulosExistentes.length || 1);
        generarModulos();
    });
});

$("#num_modulos").on("change", generarModulos);
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