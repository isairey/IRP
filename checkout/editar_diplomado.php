<?php
require_once __DIR__ . '/../pages/seccion.php';


require_once __DIR__ . '/../db/config.php';

// Verificar ID recibido
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("❌ ID no válido.");
}

$idDiplomado = (int)$_GET['id'];


try {
    // Traer los datos del diplomado junto con el ponente asignado
    $sql = "SELECT d.ID_Diplomado, d.NombreDiplomado, d.Descripcion, d.FechaInicio, d.FechaFin, d.Num,
       ad.ID_Ponente,
       p.Nombre AS NombrePonente
FROM diplomados d
LEFT JOIN asignacionponente ad ON d.ID_Diplomado = ad.ID_Diplomado
LEFT JOIN ponentes p ON ad.ID_Ponente = p.ID_Ponente
WHERE d.ID_Diplomado = :id
LIMIT 1
";


    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $idDiplomado, PDO::PARAM_INT);
    $stmt->execute();
    $diplomado = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$diplomado) {
        die("❌ Diplomado no encontrado.");
    }

    // Traer todos los ponentes disponibles para llenar el <select>
    $sqlPonentes = "SELECT ID_Ponente, Nombre FROM ponentes ORDER BY Nombre ASC";
    $stmtPonentes = $conn->query($sqlPonentes);
    $ponentes = $stmtPonentes->fetchAll(PDO::FETCH_ASSOC);


    // Traer fechas registradas del diplomado
$sqlFechas = "SELECT Fecha FROM secciones WHERE DiplomadoID = :id ORDER BY nUMSeccion ASC";
$stmtFechas = $conn->prepare($sqlFechas);
$stmtFechas->bindParam(':id', $idDiplomado, PDO::PARAM_INT);
$stmtFechas->execute();
$fechas = $stmtFechas->fetchAll(PDO::FETCH_COLUMN); // Array de strings de fechas


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
      <img class="d-block mx-auto mb-4" src="../assets/img/logo 1.png" alt="" width="100" height="100">
      <h2>Editar Diplomado</h2>
    </div>

    <form action="" method="POST" class="needs-validation" novalidate>
      <input type="hidden" name="id_diplomado" value="<?= htmlspecialchars($diplomado['ID_Diplomado']) ?>">

      <div class="mb-3">
        <label for="nombre_diplomado" class="form-label">Nombre del Diplomado</label>
        <input type="text" class="form-control" id="nombre_diplomado" 
               name="nombre_diplomado" value="<?= htmlspecialchars($diplomado['NombreDiplomado']) ?>" required>
      </div>

<div class="mb-3">
    <label class="form-label"><strong>Ponente asignado</strong></label>
    <select name="ID_Ponente" class="form-control" required>
       
        <?php foreach ($ponentes as $p): ?>
            <option value="<?= $p['ID_Ponente'] ?>" 
                <?= ($diplomado['ID_Ponente'] == $p['ID_Ponente']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($p['Nombre']) ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>


      <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea class="form-control" id="descripcion" name="descripcion" rows="3"><?= htmlspecialchars($diplomado['Descripcion']) ?></textarea>
      </div>

      <div class="row">
        <div class="col-md-4 mb-3">
          <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
          <input type="date" class="form-control" id="fecha_inicio" 
                 name="fecha_inicio" value="<?= htmlspecialchars($diplomado['FechaInicio']) ?>" required>
        </div>

        <div class="col-md-4 mb-3">
          <label for="fecha_fin" class="form-label">Fecha de Fin</label>
          <input type="date" class="form-control" id="fecha_fin" 
                 name="fecha_fin" value="<?= htmlspecialchars($diplomado['FechaFin']) ?>" required>
        </div>

        <div class="col-md-4 mb-3">
          <label for="num_secciones" class="form-label">Número de Secciones</label>
          <input type="number" class="form-control" id="num_secciones" 
                 name="num_secciones" min="1" value="<?= htmlspecialchars($diplomado['Num']) ?>" required>
        </div>
      </div>
<div id="preview-fechas" class="mt-4"></div>


      <button class="btn btn-success w-100" type="submit">💾 Guardar Cambios</button>
    </form>
  </main>
</div>

<!-- Vista previa -->

<script>
let fechasRegistradas = <?= json_encode($fechas) ?>;
</script>


<script>
function generarFechas() {
    const container = document.getElementById("preview-fechas");
    container.innerHTML = "";

    let num = parseInt(document.getElementById("num_secciones").value);

    if (isNaN(num) || num <= 0) return;

    let html = `
        <h5 class="mb-3">📅 Fechas de Secciones</h5>
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center align-middle">
                <thead >
                    <tr>
                        <th>Sección</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
    `;

    for (let i = 0; i < num; i++) {
        let fechaValue = fechasRegistradas[i] || ""; // Si existe, usarla, si no dejar vacío
        html += `
            <tr>
                <td><strong>${i + 1}</strong></td>
                <td>
                    <input type="date" class="form-control" 
                           name="seccion_fecha[]" 
                           value="${fechaValue}" required>
                </td>
            </tr>
        `;
    }

    html += `
                </tbody>
            </table>
        </div>
    `;

    container.innerHTML = html;
}

document.getElementById("num_secciones").addEventListener("change", generarFechas);
document.getElementById("fecha_inicio").addEventListener("change", generarFechas);
document.getElementById("fecha_fin").addEventListener("change", generarFechas);

document.addEventListener("DOMContentLoaded", generarFechas);
</script>



        <footer class="my-5 pt-5 text-body-secondary text-center text-small">
            <?php
          require_once __DIR__ . '/../checkout/CR.php';
          ?>
                <ul class="list-inline">
                </ul>
        </footer>
    </div>

<?php
session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['role_id']) || $_SESSION['role_id'] != 1) {
    header("Location: ../sign-in/index.php"); 
    exit();
}

require_once __DIR__ . '/../db/config.php';

$mensaje = "";
$tipoMensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $nombreDiplomado = $_POST["nombre_diplomado"];
    $descripcion = $_POST["descripcion"];
    $fechaInicio = $_POST["fecha_inicio"];
    $fechaFin = $_POST["fecha_fin"];
    $numSecciones = $_POST["num_secciones"];
    $idPonente = $_POST["id_ponente"] ?? null;

    try {
        $conn->beginTransaction();

        // 1) Actualizar diplomado
        $sql = "UPDATE diplomados 
                SET NombreDiplomado = ?, Descripcion = ?, Num = ?, FechaInicio = ?, FechaFin = ?
                WHERE ID_Diplomado = ?";
        $stmt = $conn->prepare($sql);
        $resultado = $stmt->execute([$nombreDiplomado, $descripcion, $numSecciones, $fechaInicio, $fechaFin, $idDiplomado]);

        if ($resultado) {
            $mensaje = "Diplomado actualizado correctamente";
            $tipoMensaje = "success";
        } else {
            $mensaje = "Error al actualizar Diplomado";
            $tipoMensaje = "error";
        }

        // 2) Volver a generar secciones según fechas nuevas
        $inicio = new DateTime($fechaInicio);
        $fin = new DateTime($fechaFin);
        $diferencia = $inicio->diff($fin)->days;
        $intervalo = ($numSecciones > 1) ? floor($diferencia / ($numSecciones - 1)) : 0;

        for ($i = 0; $i < $numSecciones; $i++) {
            $fechaSeccion = clone $inicio;
            $fechaSeccion->modify("+" . ($i * $intervalo) . " days");
            if ($i === $numSecciones - 1) $fechaSeccion = $fin;

            $sqlSec = "INSERT INTO secciones (DiplomadoID, NumSeccion, Fecha) VALUES (?, ?, ?)";
            $stmtSec = $conn->prepare($sqlSec);
            $stmtSec->execute([$idDiplomado, $i + 1, $fechaSeccion->format("Y-m-d")]);
        }

        // 3) Actualizar ponente asignado
        if ($idPonente) {
            $sqlCheck = "SELECT COUNT(*) FROM asignacionesdiplomado WHERE ID_Diplomado = ?";
            $stmtCheck = $conn->prepare($sqlCheck);
            $stmtCheck->execute([$idDiplomado]);
            $existe = $stmtCheck->fetchColumn();

            if ($existe) {
                $sqlUpdatePonente = "UPDATE asignacionesdiplomado 
                                     SET ID_Ponente = ? 
                                     WHERE ID_Diplomado = ?";
                $stmtUpdate = $conn->prepare($sqlUpdatePonente);
                $stmtUpdate->execute([$idPonente, $idDiplomado]);
            } else {
                $sqlInsertPonente = "INSERT INTO asignacionesdiplomado (ID_Diplomado, ID_Ponente) 
                                     VALUES (?, ?)";
                $stmtInsert = $conn->prepare($sqlInsertPonente);
                $stmtInsert->execute([$idDiplomado, $idPonente]);
            }
        }

        $conn->commit();

    } catch (PDOException $e) {
        $conn->rollBack();
        $mensaje = "Error: " . $e->getMessage();
        $tipoMensaje = "error";
    }
}
?>

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




