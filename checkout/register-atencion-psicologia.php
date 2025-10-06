<?php
require_once __DIR__ . '/../pages/seccion.php';

?>
<?php
require_once __DIR__ . '/../db/config.php';

// Verificamos si se recibieron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mensaje = "";
$tipoMensaje = "";
    // Recibimos los datos del formulario
    $id_usuario = $_POST["id_usuario"];
    $id_personal = $_POST["id_personal"];
    $tipo_atencion = $_POST["tipo_atencion"];
    $motivo_atencion = $_POST["motivo_atencion"];
    $modalidad = $_POST["modalidad"];
    $herramientas = $_POST["herramientas"];
    $transtorno = $_POST["transtorno"];
    $sindrome = $_POST["sindrome"];
    $canalizacion = $_POST["canalizacion"];
    $donde = $_POST["donde"]; // Campo adicional
    $porcentaje_avance = $_POST["porcentaje_avance"];
    $estado_caso = $_POST["estado_caso"];
    $estado_cita = $_POST["estado_cita"];
    $horas = $_POST["horas"];
    $descripcion = $_POST["descripcion"];
    $fecha_registro = $_POST["fecha_registro"];

    try {
        // Preparamos la consulta SQL para insertar los datos
        $sql = "INSERT INTO Detalles_APsicologico (ID_Usuario, ID_Personal, TipoAtencion, MotivoAtencion, Modalidad, Herramientas, Transtorno, Sindrome, Canalizacion, Donde, PorcentajeAvance, EstadoCaso, EstadoCita, Horas, Descripcion, FechaRegistro) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        // Preparamos la sentencia
        $stmt = $conn->prepare($sql);
        
        // Vinculamos los parámetros
        $stmt->bindParam(1, $id_usuario);
        $stmt->bindParam(2, $id_personal);
        $stmt->bindParam(3, $tipo_atencion);
        $stmt->bindParam(4, $motivo_atencion);
        $stmt->bindParam(5, $modalidad);
        $stmt->bindParam(6, $herramientas);
        $stmt->bindParam(7, $transtorno);
        $stmt->bindParam(8, $sindrome);
        $stmt->bindParam(9, $canalizacion);
        $stmt->bindParam(10, $donde); // Vincular el campo adicional
        $stmt->bindParam(11, $porcentaje_avance);
        $stmt->bindParam(12, $estado_caso);
        $stmt->bindParam(13, $estado_cita);
        $stmt->bindParam(14, $horas);
        $stmt->bindParam(15, $descripcion);
        $stmt->bindParam(16, $fecha_registro);

        // Ejecutamos la consulta
          if ($stmt->execute()) {
            $mensaje = "Personal actualizado correctamente";
            $tipoMensaje = "success";
        } else {
            $mensaje = "Error al actualizar Personal";
            $tipoMensaje = "error";
        }
    } catch (PDOException $e) {
        // Manejar errores de manera adecuada
        echo '<script>alert("Error al registrar los detalles de atención: ' . $e->getMessage() . '");</script>';
    }

    // Cerramos la conexión
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
    <title>Registro de Atencion Psicologia</title>
    <!-- <script src="register.js"></script> -->
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
        <h2>Registro de Atencion</h2>
        <p class="lead">Descripción de este formulario.</p>
    </div>

    <div class="row g-5">
    <div class="col-xxl-12 col-xxl-12">
        <h4 class="mb-3">Datos Generales</h4>
        <form class="needs-validation" action="register-atencion-psicologia.php" method="POST" enctype="multipart/form-data"  novalidate>
    <div class="row g-3">

    <div class="col-sm-12">
    <label for="id_usuario" class="form-label">Usuario Atendido</label>
<select name="id_usuario" class="form-select"  id="id_usuario">
<?php
    // Incluir el archivo de configuración de la base de datos
    require_once __DIR__ . '/../db/config.php';
    try {
        // Crear conexión a la base de datos
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Establecer el modo de error para lanzar excepciones en caso de errores
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Consulta para obtener los IDs de usuario con el nombre completo
        $sql = "SELECT id, CONCAT(Nombre, ' ', ApellidoPaterno, ' ', ApellidoMaterno) AS NombreCompleto FROM Usuario";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        // Si hay resultados, mostrar opciones en el select
        if ($stmt->rowCount() > 0) {
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='" . $row['id'] . "'>" . $row['NombreCompleto'] . "</option>";
            }
        } else {
            echo "<option value=''>No hay usuarios disponibles</option>";
        }
    } catch(PDOException $e) {
        // Manejar errores de manera adecuada
        echo "<option value=''>Error al obtener los usuarios</option>";
        // Puedes mostrar el mensaje de error si necesitas depurar el problema
        // echo "Error: " . $e->getMessage();
    }
?>
</select>
</div>

<div class="col-sm-12">
    <label for="id_personal">Personal</label>
        <select name="id_personal" class="form-select" id="id_personal" required>
    <?php
        // Incluir el archivo de configuración de la base de datos
        require_once __DIR__ . '/../db/config.php';
        
        try {
            // Crear conexión a la base de datos
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
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
    <label for="motivo_atencion" class="form-label">Motivo de Atencion</label>
    <select class="form-select" id="motivo_atencion" name="motivo_atencion" placeholder="Selecciona una opción" required >
        <option selected disabled value="">Selecciona una opción...</option>
        <option value="ASESORÍA">ASESORÍA</option>
        <option value="PROCEDIMIENTO LEGAL">PROCEDIMIENTO LEGAL</option> 
        <option value="CANALIZACIÓN">CANALIZACIÓN</option>
        <option value="CITA">CITA</option>
    </select>
    <div class="invalid-feedback">Se requiere una selección válida.</div>
</div> 

<div id="campos_adicionales_asesoria" class="col-sm-12">
    <label for="modalidad" class="form-label">Modalidad</label>
    <select class="form-select" id="modalidad" name="modalidad" placeholder="Selecciona una opción" >
        <option selected disabled value="">Selecciona una opción...</option>
        <option value="TELEFÓNICA">TELEFÓNICA</option>
        <option value="VIRTUAL">VIRTUAL</option> 
        <option value="FÍSICA">FÍSICA</option>
    </select>
    <div class="invalid-feedback">Se requiere una selección válida.</div>
</div>

<div id="herramientas" class="col-sm-12">
    <label for="herramientas" class="form-label">Herramientas Proporcionadas</label>
    <select class="form-select" id="herramientas" name="herramientas" placeholder="Selecciona una opción">
        <option selected disabled value="">Selecciona una opción...</option>
        <option value="PENAL">PLAN DE VIDA </option>
        <option value="PENAL">PLAN DE EMPODERAMIENTO</option>
        <option value="PENAL">NINGUNA</option>
    </select>
    <div class="invalid-feedback">Se requiere una selección válida.</div>

    <div class="col-sm-12">
        <div class="mb-3">
            <label for="sindrome" class="form-label">Síndrome</label>
            <input class="form-control" id="sindrome" name="sindrome" rows="3" placeholder="Síndrome Detectado" ></input>
        </div>
        <div class="invalid-feedback">Por favor, proporcione una descripción válida.</div>
    </div>

    <div class="col-sm-12">
        <div class="mb-3">
            <label for="transtorno" class="form-label">Trastorno</label>
            <input class="form-control" id="transtorno" name="transtorno" rows="3" placeholder="Trastorno Detectado"></input>
        </div>
        <div class="invalid-feedback">Por favor, proporcione una descripción válida.</div>
    </div>

    <div class="col-sm-12">
    <label class="form-label">¿Canalización?</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="canalizacion" id="canalizacion1" value="SI" required onclick="showCanaInput()">
        <label class="form-check-label" for="canalizacion1">SI</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="canalizacion" id="canalizacion2" value="NO" onclick="hideCanaInput()">
        <label class="form-check-label" for="canalizacion2">NO</label>
    </div>
</div>

<div id="campos_adicionales_cita" class="col-sm-12" style="display: none;">
    <label for="donde" class="form-label">¿Dónde se Canalizó?</label>
    <input class="form-control" id="donde" name="donde" rows="3" placeholder="">
    <div class="invalid-feedback">Por favor, proporcione una descripción válida.</div>
</div>

<div id="fff" class="col-sm-12" style="display: none;">
    <label for="tipo_atencion" class="form-label">¿Dónde se Canalizó?</label>
    <input class="form-control" id="tipo_atencion" name="tipo_atencion" rows="3" value="SIN DATOS">
    <div class="invalid-feedback">Por favor, proporcione una descripción válida.</div>
</div>

    <div class="col-sm-12">
    <label for="porcentaje_avance" class="form-label">Porcentaje de Avance</label>
    <input type="range" class="form-range" min="0" max="100" id="porcentaje_avance" name="porcentaje_avance" required>
    <div id="porcentaje_valor"></div>
    <div class="invalid-feedback">Se requiere una Porcentaje valido.</div>
    </div>

    <div class="col-sm-12">
        <label for="estado_caso" class="form-label">Estado del Caso</label>
        <select class="form-select" id="estado_caso" name="estado_caso" placeholde="Selecciona una opción" required>
        <option selected disabled value="">Selecciona una opción...</option>
            <option value="ABANDONO">ABANDONO</option>
            <option value="CERRADO">CERRADO</option>
            <option value="PROCESO">PROCESO</option>
            <option value="OTRO">RESUELTO</option>
        </select>
    <div class="invalid-feedback">Se requiere una selección válida.</div>
    </div>

    <div class="col-sm-12">
        <label for="estado_cita" class="form-label">Estado del Cita</label>
        <select class="form-select" id="estado_cita" name="estado_cita"  required>
        <option selected disabled value="">Selecciona una opción...</option>
        <option value="CAMBIO DE NÚMERO">CAMBIO DE NÚMERO</option>
        <option value="NO ASISTIÓ">NO ASISTIÓ</option>
        <option value="SÍ ASISTIÓ">SÍ ASISTIÓ</option>
        <option value="CANCELO">CANCELO</option>
        <option value="REAGENDO">REAGENDO</option>
        <option value="NO CONTESTO">NO CONTESTO</option>
        <option value="CONFIRMO Y NO ASISTIÓ">CONFIRMO Y NO ASISTIÓ</option>
        </select>
    <div class="invalid-feedback">Se requiere una selección válida.</div>
    </div>

    <div class="col-sm-12">
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción de la atención</label>
        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Breve descripción del motivo de la solicitud de atención. (Circunstancias de modo, tiempo y lugar)" required></textarea>
    </div>
    <div class="invalid-feedback">Por favor, proporcione una descripción válida.</div>
    </div>

    <div class="col-sm-12">
        <label for="fecharegistro" class="form-label">Fecha</label>
        <input type="date" class="form-control" id="fecharegistro" name="fecha_registro" placeholder="" required>
        <div class="invalid-feedback">Se requiere una Fecha de Inicio válida.</div>
    </div>

    <div class="col-sm-12">
        <label for="horas" class="form-label">Horas de Trabajo</label>
        <input type="number" min="1" class="form-control" id="horas" name="horas" placeholder="" required>
        <div class="invalid-feedback">Se requiere una Fecha de Inicio válida.</div>
    </div>

    <div class="col-sm-12">
        <label for="valoracionRiesgo" class="form-label" id="valoracionRiesgo"  placeholder="Especifique el tipo de Violencia">Valoración de riesgo</label>
        <select class="form-select" id="valoracionRiesgo" name="valoracionRiesgo" required>
        <option selected disabled value="">Selecciona una opción...</option>
        <option value="RIESGO BAJO ">Riesgo Bajo </option>
        <option value="RIESGO MODERADO">Riesgo Moderado</option>
        <option value="RIESGO ALTO">Riesgo Alto</option>
        <option value="RIESGO SEVERO">Riesgo Severo</option>
        </select>
    <div class="invalid-feedback">Selecciona una opción Válida.</div>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#porcentaje_avance').on('input', function() {
            $('#porcentaje_valor').text($(this).val() + '%');
        });
    });
</script>

<script src="checkout.js"></script>

<script src="validation-citas.js"></script></body>
<script>
    function showCanaInput() {
        document.getElementById("campos_adicionales_cita").style.display = "block";
    }

    function hideCanaInput() {
        document.getElementById("campos_adicionales_cita").style.display = "none";
    }
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
    window.location.href = "../pages/ver-atenciones.php";
});
</script>
<?php endif; ?>
 
        </html>



