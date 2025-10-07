<?php
require_once __DIR__ . '/../pages/seccion.php';

?>

<?php
require_once __DIR__ . '/../db/config.php';
$conn->exec("SET NAMES utf8");

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Si se envió el formulario, actualiza los datos
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_asignacion = $_POST['ID_Asignacion'];
        $id_taller = $_POST['ID_Taller'];
        $id_ponente = $_POST['ID_Ponente'];
        $fecha = $_POST['FechaAsignacion'];

        $sql = "UPDATE asignacion_ponentes_taller 
                SET ID_Taller = :id_taller, ID_Ponente = :id_ponente, FechaAsignacion = :fecha 
                WHERE ID = :id_asignacion";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_taller', $id_taller);
        $stmt->bindParam(':id_ponente', $id_ponente);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':id_asignacion', $id_asignacion);
        $stmt->execute();

        header("Location: ./../pages/ver-taller-ponente.php?mssg=success");
        exit();
    }

    // Obtener el ID de la asignación
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        die("ID de asignación no válido");
    }
    $id_asignacion = $_GET['id'];

    // Obtener datos de la asignación actual
    $sql = "SELECT * FROM asignacion_ponentes_taller WHERE ID = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id_asignacion);
    $stmt->execute();
    $asignacion = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$asignacion) {
        die("No se encontró la asignación");
    }

    // Obtener lista de talleres
    $talleres = $conn->query("SELECT ID_Taller, Nombre FROM talleres ORDER BY Nombre ASC")->fetchAll(PDO::FETCH_ASSOC);

    // Obtener lista de ponentes
    $ponentes = $conn->query("SELECT ID_Ponente, Nombre FROM ponentes ORDER BY Nombre ASC")->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Error en la base de datos: " . $e->getMessage());
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
    <h2>Editar Asignación de Ponente a Taller</h2>
    <p class="lead"></p>
  </div>

  <div class="row g-5">
    <div class="col-xxl-12">
      <form class="needs-validation" action="" method="POST" novalidate>
        <div class="row g-3">

          <!-- ID oculto -->
          <input type="hidden" name="ID_Asignacion" value="<?= htmlspecialchars($asignacion['ID']) ?>">

          <!-- Selección de Taller -->
          <div class="col-sm-12">
            <label for="id_taller" class="form-label">Taller</label>
            <select name="ID_Taller" id="id_taller" class="form-select" required>
              <option value="">Seleccione un taller</option>
              <?php foreach ($talleres as $taller): ?>
                <option value="<?= $taller['ID_Taller'] ?>" <?= $taller['ID_Taller'] == $asignacion['ID_Taller'] ? 'selected' : '' ?>>
                  <?= htmlspecialchars($taller['Nombre']) ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <!-- Selección de Ponente -->
          <div class="col-sm-12">
            <label for="id_ponente" class="form-label">Ponente</label>
            <select name="ID_Ponente" id="id_ponente" class="form-select" required>
              <option value="">Seleccione un ponente</option>
              <?php foreach ($ponentes as $ponente): ?>
                <option value="<?= $ponente['ID_Ponente'] ?>" <?= $ponente['ID_Ponente'] == $asignacion['ID_Ponente'] ? 'selected' : '' ?>>
                  <?= htmlspecialchars($ponente['Nombre']) ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <!-- Fecha de asignación -->
          <div class="col-sm-12">
            <label for="fecha" class="form-label">Fecha de Asignación</label>
            <input type="datetime-local" class="form-control" id="fecha" name="FechaAsignacion"
                   value="<?= date('Y-m-d\TH:i', strtotime($asignacion['FechaAsignacion'])) ?>" required>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Actualizar</button>
        </div>
      </form>
    </div>
  </div>
</main>
</div>

<script>
document.querySelector('select[name="ID_Persona"]').addEventListener('change', function() {
    const tipo = this.selectedOptions[0].getAttribute('data-tipo');
    document.getElementById('tipoPersona').value = tipo || '';
});
</script>

    <footer class="my-5 pt-5 text-body-secondary text-center text-small">
        <?php require_once __DIR__ . '/../checkout/CR.php'; ?>
    </footer>
</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if (!empty($mensaje)): ?>
<script>
Swal.fire({
    icon: "<?= $tipoMensaje ?>",
    title: "<?= $mensaje ?>",
    showConfirmButton: false,
    timer: 3000
}).then(() => {
    window.location.href = "../pages/ver-taller.php";
});
</script>
<?php endif; ?>



<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="checkout.js"></script>
<script src="validation-donante.js"></script>
        </html>

