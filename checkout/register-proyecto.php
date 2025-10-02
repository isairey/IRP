<?php
session_start();

// Verificar si el usuario ha iniciado sesión y tiene el rol adecuado
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role_id']) || $_SESSION['role_id'] != 1) {
    // Si el usuario no ha iniciado sesión o no tiene el rol adecuado, redirigirlo a otra página
    header("Location: ../sign-in/index.php"); // O a una página de acceso denegado
    exit();
}

?>

<?php
// Incluir el archivo de configuración de la base de datos
require_once __DIR__ . '/../db/config.php';

// Verificar si se recibieron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $id_personal = $_POST["id_personal"];
    $nombre_proyecto = $_POST["nombre_proyecto"];
    $monto_financiamiento = $_POST["monto_financiamiento"];
    $fecha_inicio = $_POST["fecha_inicio"];
    $fecha_termino = $_POST["fecha_termino"];
    $dependencia = $_POST["dependencia"];
    $descripcion_proyecto = $_POST["descripcion_proyecto"];
    $administrador = $_POST["administrador"];

    try {
        // Preparar la consulta SQL para insertar los datos
        $sql = "INSERT INTO Proyectos (ID_Personal, NombreProyecto, MontoFinanciamiento, FechaInicio, FechaTermino, Dependencia, DescripcionProyecto, Administrador) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // Vincular los parámetros
        $stmt->bindParam(1, $id_personal);
        $stmt->bindParam(2, $nombre_proyecto);
        $stmt->bindParam(3, $monto_financiamiento);
        $stmt->bindParam(4, $fecha_inicio);
        $stmt->bindParam(5, $fecha_termino);
        $stmt->bindParam(6, $dependencia);
        $stmt->bindParam(7, $descripcion_proyecto);
        $stmt->bindParam(8, $administrador);

        // Ejecutar la consulta
        $stmt->execute();
            header("Location: ../pages/ver-proyectos.php?status=success");
exit();
    } catch (PDOException $e) {
        // Manejar errores de manera adecuada
       header("Location: ../pages/ver-proyectos.php?status=error&msg=" . urlencode($e->getMessage()));
exit();
    }

    // Cerrar la conexión a la base de datos
    $conn = null;
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
    <title>Registro de Proyectos</title>
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
        <h2>Registro de Proyectos </h2>
        <p class="lead"></p>
    </div>

    <div class="row g-5">
    <div class="col-xxl-12 col-xxl-12">
        <h4 class="mb-3">Datos Generales</h4>
        <form class="needs-validation" action="register-proyecto.php" method="POST" enctype="multipart/form-data"  novalidate>
    <div class="row g-3">


    <div class="col-sm-12">
    <label for="id_personal">Encargada de proyecto</label>
        <select name="id_personal" class="form-select" id="id_personal" required>
    <?php
        // Incluir el archivo de configuración de la base de datos
        require_once __DIR__ . '/../db/config.php';
        try {
            // Crear conexión a la base de datos
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            // Establecer el modo de error para lanzar excepciones en caso de errores
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Consultar la base de datos para obtener los IDs de personal
            $sql = "SELECT ID_Personal, CONCAT(Nombre, ' ', ApellidoPaterno, ' ', ApellidoMaterno) AS nombre_completo FROM Personal";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            // Si hay resultados, mostrar opciones en el select
            if ($stmt->rowCount() > 0) {
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . $row['ID_Personal'] . "'>" . $row['nombre_completo'] . "</option>";
                }
            } else {
                echo "<option value=''>No hay personal disponible</option>";
            }
        } catch(PDOException $e) {
            // Manejar errores de manera adecuada
            echo "<option value=''>Error al obtener los IDs de personal</option>";
        }
    ?>
    </select>
    </div>


            
    <div class="col-sm-12">
        <label for="nombre_proyecto" class="form-label">Nombre del Proyecto</label>
        <input type="text" class="form-control" id="nombre_proyecto" name="nombre_proyecto" placeholder="" required>
    <div class="invalid-feedback">Se requiere un nombre válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="monto_financiamiento" class="form-label">Monto de Financiamiento</label>
        <input type="text" class="form-control" id="monto_financiamiento" name="monto_financiamiento" step="0.01" required>
        <div class="invalid-feedback">Se requiere un apellido paterno válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
        <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" placeholder="" required>
        <div class="invalid-feedback">Se requiere una Fecha de Inicio válida.</div>
    </div>

    <div class="col-sm-6">
        <label for="fecha_termino" class="form-label">Fecha de Término</label>
        <input type="date" class="form-control" id="fecha_termino" name="fecha_termino" placeholder="" required>
        <div class="invalid-feedback">Se requiere una Fecha de Término válida.</div>
    </div>

    <div class="col-sm-6">
        <label for="dependencia" class="form-label">Dependencia</label>
        <input type="text" class="form-control" id="dependencia" name="dependencia" placeholder="" required>
        <div class="invalid-feedback">Se requiere una calle válida.</div>
    </div>

    <div class="col-sm-12">
    <div class="mb-3">
        <label for="descripcion_proyecto" class="form-label">Descripción del Proyecto</label>
        <textarea class="form-control" id="descripcion_proyecto" name="descripcion_proyecto" rows="3"  required></textarea>
    </div>
    <div class="invalid-feedback">Por favor, proporcione una Observacion válida.</div>
    </div>


    <div class="col-sm-12">
        <label for="administrador" class="form-label">Auxiliar</label>
        <input type="text" class="form-control" id="administrador" name="administrador" placeholder="" required>
        <div class="invalid-feedback">Se requiere una calle válida.</div>
    </div>

            <hr class="my-4">

    <button class="w-100 btn btn-primary btn-lg" type="submit"  onclick="return confirmarEnvio();">Registrar</button>
    </form>
    </div>
    </div>
    </main>

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
    <script src="validationproyecto.js"></script>
        </html>
