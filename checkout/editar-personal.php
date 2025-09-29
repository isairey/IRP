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
require_once __DIR__ . '/../db/config.php';

// Verificar si se recibió un ID de personal válido
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $personal_id = $_GET['id'];

    // Consulta SQL para obtener los datos del personal basados en el ID proporcionado
    $sql = "SELECT * FROM Personal WHERE ID_Personal = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$personal_id]);
    $personal = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$personal) {
        echo "No se encontró ningún personal con el ID proporcionado.";
        exit;
    } 

    // Verificamos si se recibieron datos del formulario de edición
    if ($_SERVER["REQUEST_METHOD"] == "POST") {



require_once __DIR__ . '/../db/config.php';

try {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM Personal WHERE ID_Personal = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $personal = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$personal) {
        echo "Personal no encontrado.";
        exit;
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
}

// Carpeta donde guardar la foto
$uploadDirFoto = __DIR__ . '/../uploads/personal/';

// Inicializar variable de foto
$foto = $personal['foto'] ?? "SIN DATOS";

// Función para subir archivo (general)
function subirArchivo($inputName, $uploadDir, $rutaActual) {
    if (isset($_FILES[$inputName]) && $_FILES[$inputName]['error'] === UPLOAD_ERR_OK) {
        $nombreArchivo = time() . "_" . basename($_FILES[$inputName]['name']);
        $rutaDestino = $uploadDir . $nombreArchivo;

        if (move_uploaded_file($_FILES[$inputName]['tmp_name'], $rutaDestino)) {
            return "uploads/personal/" . $nombreArchivo; // Ruta relativa
        }
    }
    // Si no se sube archivo, retorna la ruta actual (mantiene el archivo existente)
    return $rutaActual;
}

// Subir foto y mantener si no cambia
$foto = subirArchivo('foto', $uploadDirFoto, $foto);






        // Recibimos los datos actualizados del formulario
        $rol = $_POST["rol"];
        $nombre = $_POST["nombre"];
        $apellido_paterno = $_POST["apellido_paterno"];
        $apellido_materno = $_POST["apellido_materno"];
        $fecha_nacimiento = $_POST["fecha_nacimiento"];
        $calle = $_POST["calle"];
        $num_interior = $_POST["NumInterior"];
        $num_exterior = $_POST["NumExterior"];
        $cp = $_POST["cp"];
        $estado = $_POST["estado"];
        $municipio = $_POST["municipio"];
        $colonia = $_POST["colonia"];
        $region = $_POST["region"];
        $pais_procedencia = $_POST["pais_procedencia"];
        $direccion_temporal = $_POST["direccion_temporal"];
        $sexo = $_POST["sexo"];
        $genero = $_POST["genero"];
        $email = $_POST["email"];
        $tel = $_POST["tel"];
        $nombre_contacto_emergencia = $_POST["nombre_contacto_emergencia"];
        $tel_contacto_emergencia = $_POST["tel_contacto_emergencia"];
        $grado_academico = $_POST["grado_academico"];
        $institucion = $_POST["institucion"];
        $area_asignada = $_POST["area_asignada"];
        $estatus_personal = $_POST["estatus_personal"];
        $fecha_ingreso = $_POST["fecha_ingreso"];
        $fecha_termino = $_POST["fecha_termino"];
        $clasificacion_personal = $_POST["clasificacion_personal"];
        $problemas_salud_considerables = $_POST["problemas_salud_considerables"];
        $problemas_movilidad = $_POST["problemas_movilidad"];
        $observaciones = $_POST["observaciones"];
        $password = $_POST["password"];
    
        // Encriptar la contraseña
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
        try {
            // Preparamos la consulta SQL de actualización
            $sql_update = "UPDATE Personal SET 
                            ID_Rol = ?, 
                            Nombre = ?, 
                            ApellidoPaterno = ?, 
                            ApellidoMaterno = ?, 
                            FechaNacimiento = ?, 
                            Calle = ?, 
                            NumInterior = ?, 
                            NumExterior = ?, 
                            CP = ?, 
                            Estado = ?, 
                            Municipio = ?, 
                            Colonia = ?, 
                            Region = ?, 
                            PaisProcedencia = ?, 
                            DireccionTemporal = ?, 
                            Sexo = ?, 
                            Genero = ?, 
                            Email = ?, 
                            Tel = ?, 
                            NombreContactoEmergencia = ?, 
                            TelContactoEmergencia = ?, 
                            GradoAcademico = ?, 
                            Institucion = ?, 
                            AreaAsignada = ?, 
                            EstatusPersonal = ?, 
                            FechaIngreso = ?, 
                            FechaTermino = ?, 
                            ClasificacionPersonal = ?, 
                            ProblemasSaludConsiderables = ?, 
                            ProblemasMovilidad = ?, 
                            Observaciones = ?, 
                            foto = ?, 
                            Password = ? 
                            WHERE ID_Personal = ?";
            $stmt_update = $conn->prepare($sql_update);
    
            // Vinculamos los parámetros
            $stmt_update->bindParam(1, $rol);
            $stmt_update->bindParam(2, $nombre);
            $stmt_update->bindParam(3, $apellido_paterno);
            $stmt_update->bindParam(4, $apellido_materno);
            $stmt_update->bindParam(5, $fecha_nacimiento);
            $stmt_update->bindParam(6, $calle);
            $stmt_update->bindParam(7, $num_interior);
            $stmt_update->bindParam(8, $num_exterior);
            $stmt_update->bindParam(9, $cp);
            $stmt_update->bindParam(10, $estado);
            $stmt_update->bindParam(11, $municipio);
            $stmt_update->bindParam(12, $colonia);
            $stmt_update->bindParam(13, $region);
            $stmt_update->bindParam(14, $pais_procedencia);
            $stmt_update->bindParam(15, $direccion_temporal);
            $stmt_update->bindParam(16, $sexo);
            $stmt_update->bindParam(17, $genero);
            $stmt_update->bindParam(18, $email);
            $stmt_update->bindParam(19, $tel);
            $stmt_update->bindParam(20, $nombre_contacto_emergencia);
            $stmt_update->bindParam(21, $tel_contacto_emergencia);
            $stmt_update->bindParam(22, $grado_academico);
            $stmt_update->bindParam(23, $institucion);
            $stmt_update->bindParam(24, $area_asignada);
            $stmt_update->bindParam(25, $estatus_personal);
            $stmt_update->bindParam(26, $fecha_ingreso);
            $stmt_update->bindParam(27, $fecha_termino);
            $stmt_update->bindParam(28, $clasificacion_personal);
            $stmt_update->bindParam(29, $problemas_salud_considerables);
            $stmt_update->bindParam(30, $problemas_movilidad);
            $stmt_update->bindParam(31, $observaciones);
            $stmt_update->bindParam(32, $foto);
            $stmt_update->bindParam(33, $hashed_password);
            $stmt_update->bindParam(34, $personal_id);
    
            // Ejecutamos la consulta de actualización
            if ($stmt_update->execute()) {
                echo '<script>alert("Datos actualizados correctamente.");</script>';
                echo '<script>window.location.href = "/ERP/ERP_IRP/pages/ver-personal.php";</script>';
            } else {
                echo "Error al actualizar los datos: " . $stmt_update->errorInfo()[2];
            }
        } catch (PDOException $e) {
            // Registro de errores en un archivo de registro
            $error_message = "Error al ejecutar la consulta SQL: " . $e->getMessage() . "\n";
            $file_path = '/xampp/htdocs/ERP/ERP_IRP/db/error_log.txt';
        
        
            // Mostrar un mensaje genérico al usuario
            echo '<script>alert("Se produjo un error en el servidor. Por favor, inténtalo de nuevo más tarde.");</script>';
        }
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
    <title>Registro de Personal</title>
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

    <?php
// Determinar la foto
$foto = "default.png"; // Imagen por defecto
if ($personal && !empty($personal['foto']) && strtoupper($personal['foto']) !== "SIN DATOS") {
    if (strpos($personal['foto'], "uploads/") !== false) {
        $foto = "../" . $personal['foto'];
    } else {
        $foto = "../uploads/personal/" . $personal['foto'];
    }
}
?>
    ?>
        <div class="container">
        <main>
    <div class="py-5 text-center">
       
        <h2>Registro de Personal </h2>
       
    </div>

    <div class="row g-5">
    <div class="col-xxl-12 col-xxl-12">
        <h4 class="mb-3">Datos Generales</h4>
        <form action="" method="POST" enctype="multipart/form-data" >
    <div class="row g-3"> 

            
    <div class="col-sm-12">
       <div class="py-5 text-center">
    <!-- Foto circular -->
    <img src="<?= htmlspecialchars($foto) ?>" 
         alt="Foto de <?= htmlspecialchars($personal['Nombre'] ?? 'Personal') ?>" 
         class="rounded-circle shadow" 
         width="150" height="150"
         style="object-fit: cover;">

    <h2 class="mt-3">Registro de Personal</h2>
    <?php if ($personal): ?>
        <h5><?= htmlspecialchars($personal['Nombre'] . " " . $personal['ApellidoPaterno'] . " " . $personal['ApellidoMaterno']) ?></h5>
    <?php endif; ?>
</div><label for="firstName" class="form-label">Nombre:</label>
        <input type="text" class="form-control" id="firstName" name="nombre" value="<?php echo $personal['Nombre']; ?>">
    <div class="invalid-feedback">Se requiere un nombre válido.</div>
    </div>
    

    <div class="mb-3">
  <label class="form-label">Foto</label><br>
  <?php if (!empty($personal['foto']) && strtoupper($personal['foto']) !== "SIN DATOS"): ?>
     <?php
if (!empty($personal['foto']) && strpos($personal['foto'], "uploads/") !== false) {
    $foto = "../" . htmlspecialchars($personal['foto']);
} elseif (!empty($personal['foto'])) {
    $foto = "../uploads/personal/" . htmlspecialchars($personal['foto']);
} else {
    $foto = "../uploads/personal/default.png";
}
?>
<img src="<?= $foto ?>" alt="Foto actual" width="100" class="rounded-circle shadow" style="object-fit: cover; height:100px;">

  <?php else: ?>
      <span class="text-muted">Sin foto</span><br><br>
  <?php endif; ?>
  <input type="file" name="foto" class="form-control">
</div>


    <div class="col-sm-6">
        <label for="lastName" class="form-label">Apellido Paterno:</label>
        <input type="text" class="form-control" id="lastName" name="apellido_paterno" value="<?php echo $personal['ApellidoPaterno']; ?>">
        <div class="invalid-feedback">Se requiere un apellido paterno válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="secondLastName" class="form-label">Apellido Materno:</label>
        <input type="text" class="form-control" id="secondLastName" name="apellido_materno" value="<?php echo $personal['ApellidoMaterno']; ?>">
        <div class="invalid-feedback">Se requiere un apellido materno válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="birthdate" class="form-label">Fecha de Nacimiento:</label>
        <input type="date" class="form-control" id="birthdate" name="fecha_nacimiento" value="<?php echo $personal['FechaNacimiento']; ?>">
        <div class="invalid-feedback">Se requiere una fecha de nacimiento válida.</div>
    </div>

    <div class="col-sm-6">
    <label for="sexo" class="form-label">Sexo</label>
    <select class="form-select" id="sexo" name="sexo" aria-label="Selecciona una opción">
        <option <?php if ($personal['Sexo'] == '') echo 'selected'; ?> disabled value="">Selecciona una opción...</option>
        <option <?php if ($personal['Sexo'] == 'MASCULINO') echo 'selected'; ?> value="MASCULINO">MASCULINO</option>
        <option <?php if ($personal['Sexo'] == 'FEMENINO') echo 'selected'; ?> value="FEMENINO">FEMENINO</option>
        <option <?php if ($personal['Sexo'] == 'OTRO') echo 'selected'; ?> value="OTRO">OTRO</option>
        <option <?php if ($personal['Sexo'] == 'SIN DATOS') echo 'selected'; ?> value="SIN DATOS">SIN DATOS</option>
    </select>
    <div class="invalid-feedback">Se requiere una selección válida.</div>
</div>

<div class="col-sm-6">
    <label for="genero" class="form-label">Género</label>
    <select class="form-select" id="genero" name="genero" aria-label="Selecciona una opción" required>
        <option <?php if ($personal['Genero'] == '') echo 'selected'; ?> disabled value="">Selecciona una opción...</option>
        <option <?php if ($personal['Genero'] == 'CISGÉNERO') echo 'selected'; ?> value="CISGÉNERO">CISGÉNERO</option>
        <option <?php if ($personal['Genero'] == 'TRANSGÉNERO') echo 'selected'; ?> value="TRANSGÉNERO">TRANSGÉNERO</option>
        <option <?php if ($personal['Genero'] == 'GÉNERO FLUIDO') echo 'selected'; ?> value="GÉNERO FLUIDO">GÉNERO FLUIDO</option>
        <option <?php if ($personal['Genero'] == 'TERCER GÉNERO') echo 'selected'; ?> value="TERCER GÉNERO">TERCER GÉNERO</option>
        <option <?php if ($personal['Genero'] == 'OTRO') echo 'selected'; ?> value="OTRO">Otro</option>
    </select>
    <div class="invalid-feedback">Se requiere una selección válida.</div>
</div>


    <h4>Datos de Domicilio</h4>
        <hr class="my-4">


<div class="col-sm-6">
        <label for="calle" class="form-label">Calle</label>
        <input type="text"  class="form-control" id="calle" name="calle" value="<?php echo $personal['Calle']; ?>"><br>
        <div class="invalid-feedback">Se requiere un número interior válido.</div>
    </div>



        <div class="col-sm-6">
        <label for="numInterior" class="form-label">Número interior</label>
        <input type="number" max="100000" min="0" class="form-control" id="numInterior" name="NumInterior" value="<?php echo $personal['NumInterior']; ?>"><br>
        <div class="invalid-feedback">Se requiere un número interior válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="numExterior" class="form-label">Número exterior</label>
        <input type="number" max="100000" min="0"  class="form-control" id="numExterior" name="NumExterior" nampersonalxterior" value="<?php echo $personal['NumExterior']; ?>"><br>
    <div class="invalid-feedback">Se requiere un número exterior válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="cp" class="form-label">Código Postal (CP)</label>
        <input type="number" max="100000" min="0"  class="form-control" id="cp" name="cp" value="<?php echo $personal['CP']; ?>"><br>
    <div class="invalid-feedback">Se requiere un código postal válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="estado" class="form-label">Estado</label>
        <input type="text" class="form-control" id="estado" name="estado" value="<?php echo $personal['Estado']; ?>"><br>
        <div class="invalid-feedback">Se requiere un estado válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="municipio" class="form-label">Municipio</label>
        <select class="form-select" id="municipioss" name="municipio" aria-label="Selecciona una opción" onchange="mostrarRegionn()">
        <option selected disabled value="">Seleccionar municipio...</option>
        <option <?php if ($personal['Municipio'] == 'SIN DATOS') echo 'selected'; ?> value="SIN DATOS">SIN DATOS</option>
        <option <?php if ($personal['Municipio'] == 'CUILAPAM DE GUERRERO') echo 'selected'; ?> value="CUILAPAM DE GUERRERO">CUILAPAM DE GUERRERO</option>
        <option <?php if ($personal['Municipio'] == 'OAXACA DE JUÁREZ') echo 'selected'; ?> value="OAXACA DE JUÁREZ">OAXACA DE JUÁREZ</option>
        <option <?php if ($personal['Municipio'] == 'SAN AGUSTIN DE LAS JUNTAS') echo 'selected'; ?> value="SAN AGUSTIN DE LAS JUNTAS">SAN AGUSTIN DE LAS JUNTAS</option>
        <option <?php if ($personal['Municipio'] == 'SAN AGUSTIN YATARENI') echo 'selected'; ?> value="SAN AGUSTIN YATARENI">SAN AGUSTIN YATARENI</option>
        <option <?php if ($personal['Municipio'] == 'SAN ANDRÉS HUAYAPAM') echo 'selected'; ?> value="SAN ANDRÉS HUAYAPAM">SAN ANDRÉS HUAYAPAM</option>
        <option <?php if ($personal['Municipio'] == 'SAN ANDRÉS IXTLAHUACA') echo 'selected'; ?> value="SAN ANDRÉS IXTLAHUACA">SAN ANDRÉS IXTLAHUACA</option>
        <option <?php if ($personal['Municipio'] == 'SAN ANTONIO DE LA CAL') echo 'selected'; ?> value="SAN ANTONIO DE LA CAL">SAN ANTONIO DE LA CAL</option>
        <option <?php if ($personal['Municipio'] == 'SAN BARTOLO COYOTEPEC') echo 'selected'; ?> value="SAN BARTOLO COYOTEPEC">SAN BARTOLO COYOTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN JACINTO AMILPAS') echo 'selected'; ?> value="SAN JACINTO AMILPAS">SAN JACINTO AMILPAS</option>
        <option <?php if ($personal['Municipio'] == 'ANIMAS TRUJANO') echo 'selected'; ?> value="ANIMAS TRUJANO">ANIMAS TRUJANO</option>
        <option <?php if ($personal['Municipio'] == 'SAN PEDRO IXTLAHUACA') echo 'selected'; ?> value="SAN PEDRO IXTLAHUACA">SAN PEDRO IXTLAHUACA</option>
        <option <?php if ($personal['Municipio'] == 'SAN RAYMUNDO JALPAN') echo 'selected'; ?> value="SAN RAYMUNDO JALPAN">SAN RAYMUNDO JALPAN</option>
        <option <?php if ($personal['Municipio'] == 'SAN SEBASTIÁN TUTLA') echo 'selected'; ?> value="SAN SEBASTIÁN TUTLA">SAN SEBASTIÁN TUTLA</option>
        <option <?php if ($personal['Municipio'] == 'SANTA CRUZ AMILPAS') echo 'selected'; ?> value="SANTA CRUZ AMILPAS">SANTA CRUZ AMILPAS</option>
        <option <?php if ($personal['Municipio'] == 'SANTA CRUZ XOXOCOTLAN') echo 'selected'; ?> value="SANTA CRUZ XOXOCOTLAN">SANTA CRUZ XOXOCOTLAN</option>
        <option <?php if ($personal['Municipio'] == 'SANTA LUCIA DEL CAMINO') echo 'selected'; ?> value="SANTA LUCIA DEL CAMINO">SANTA LUCIA DEL CAMINO</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA ATZOMPA') echo 'selected'; ?> value="SANTA MARÍA ATZOMPA">SANTA MARÍA ATZOMPA</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA COYOTEPEC') echo 'selected'; ?> value="SANTA MARÍA COYOTEPEC">SANTA MARÍA COYOTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA EL TULE') echo 'selected'; ?> value="SANTA MARÍA EL TULE">SANTA MARÍA EL TULE</option>
        <option <?php if ($personal['Municipio'] == 'SANTO DOMINGO TOMALTEPEC') echo 'selected'; ?> value="SANTO DOMINGO TOMALTEPEC">SANTO DOMINGO TOMALTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'TLALIXTAC DE CABRERA') echo 'selected'; ?> value="TLALIXTAC DE CABRERA">TLALIXTAC DE CABRERA</option>
        <option <?php if ($personal['Municipio'] == 'COATECAS ALTAS') echo 'selected'; ?> value="COATECAS ALTAS">COATECAS ALTAS</option>
        <option <?php if ($personal['Municipio'] == 'LA COMPAÑÍA') echo 'selected'; ?> value="LA COMPAÑÍA">LA COMPAÑÍA</option>
        <option <?php if ($personal['Municipio'] == 'HEROICA CD. DE EJUTLA DE CRESPO') echo 'selected'; ?> value="HEROICA CD. DE EJUTLA DE CRESPO">HEROICA CD. DE EJUTLA DE CRESPO</option>
        <option <?php if ($personal['Municipio'] == 'LA PE') echo 'selected'; ?> value="LA PE">LA PE</option>
        <option <?php if ($personal['Municipio'] == 'SAN AGUSTIN AMATENGO') echo 'selected'; ?> value="SAN AGUSTIN AMATENGO">SAN AGUSTIN AMATENGO</option>
        <option <?php if ($personal['Municipio'] == 'SAN ANDRÉS ZABACHE') echo 'selected'; ?> value="SAN ANDRÉS ZABACHE">SAN ANDRÉS ZABACHE</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN LACHIGALLA') echo 'selected'; ?> value="SAN JUAN LACHIGALLA">SAN JUAN LACHIGALLA</option>
        <option <?php if ($personal['Municipio'] == 'SAN MARTIN DE LOS CANSECOS') echo 'selected'; ?> value="SAN MARTIN DE LOS CANSECOS">SAN MARTIN DE LOS CANSECOS</option>
        <option <?php if ($personal['Municipio'] == 'SAN MARTIN LACHILA') echo 'selected'; ?> value="SAN MARTIN LACHILA">SAN MARTIN LACHILA</option>
        <option <?php if ($personal['Municipio'] == 'SAN MIGUEL EJUTLA') echo 'selected'; ?> value="SAN MIGUEL EJUTLA">SAN MIGUEL EJUTLA</option>
        <option <?php if ($personal['Municipio'] == 'SAN VICENTE COATLAN') echo 'selected'; ?> value="SAN VICENTE COATLAN">SAN VICENTE COATLAN</option>
        <option <?php if ($personal['Municipio'] == 'TANICHE') echo 'selected'; ?> value="TANICHE">TANICHE</option>
        <option <?php if ($personal['Municipio'] == 'YOGANA') echo 'selected'; ?> value="YOGANA">YOGANA</option>
        <option <?php if ($personal['Municipio'] == 'GUADALUPE ETLA') echo 'selected'; ?> value="GUADALUPE ETLA">GUADALUPE ETLA</option>
        <option <?php if ($personal['Municipio'] == 'MAGDALENA APASCO') echo 'selected'; ?> value="MAGDALENA APASCO">MAGDALENA APASCO</option>
        <option <?php if ($personal['Municipio'] == 'NAZARENO ETLA') echo 'selected'; ?> value="NAZARENO ETLA">NAZARENO ETLA</option>
        <option <?php if ($personal['Municipio'] == 'REYES ETLA') echo 'selected'; ?> value="REYES ETLA">REYES ETLA</option>
        <option <?php if ($personal['Municipio'] == 'SAN AGUSTÍN ETLA') echo 'selected'; ?> value="SAN AGUSTÍN ETLA">SAN AGUSTÍN ETLA</option>
        <option <?php if ($personal['Municipio'] == 'SAN ANDRÉS ZAUTLA') echo 'selected'; ?> value="SAN ANDRÉS ZAUTLA">SAN ANDRÉS ZAUTLA</option>
        <option <?php if ($personal['Municipio'] == 'SAN FELIPE TEJALAPAM') echo 'selected'; ?> value="SAN FELIPE TEJALAPAM">SAN FELIPE TEJALAPAM</option>
        <option <?php if ($personal['Municipio'] == 'SAN FRANCISCO TELIXTLAHUACA') echo 'selected'; ?> value="SAN FRANCISCO TELIXTLAHUACA">SAN FRANCISCO TELIXTLAHUACA</option>
        <option <?php if ($personal['Municipio'] == 'SAN JERÓNIMO SOSOLA') echo 'selected'; ?> value="SAN JERÓNIMO SOSOLA">SAN JERÓNIMO SOSOLA</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN BAUTISTA ATATLAUCA') echo 'selected'; ?> value="SAN JUAN BAUTISTA ATATLAUCA">SAN JUAN BAUTISTA ATATLAUCA</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN BAUTISTA GUELACHE') echo 'selected'; ?> value="SAN JUAN BAUTISTA GUELACHE">SAN JUAN BAUTISTA GUELACHE</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN BAUTISTA JAYACATLAN') echo 'selected'; ?> value="SAN JUAN BAUTISTA JAYACATLAN">SAN JUAN BAUTISTA JAYACATLAN</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN DEL ESTADO') echo 'selected'; ?> value="SAN JUAN DEL ESTADO">SAN JUAN DEL ESTADO</option>
        <option <?php if ($personal['Municipio'] == 'SAN LORENZO CACAOTEPEC') echo 'selected'; ?> value="SAN LORENZO CACAOTEPEC">SAN LORENZO CACAOTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN PABLO ETLA') echo 'selected'; ?> value="SAN PABLO ETLA">SAN PABLO ETLA</option>
        <option <?php if ($personal['Municipio'] == 'SAN PABLO HUITZO') echo 'selected'; ?> value="SAN PABLO HUITZO">SAN PABLO HUITZO</option>
        <option <?php if ($personal['Municipio'] == 'VILLA DE ETLA') echo 'selected'; ?> value="VILLA DE ETLA">VILLA DE ETLA</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA PEÑOLES') echo 'selected'; ?> value="SANTA MARÍA PEÑOLES">SANTA MARÍA PEÑOLES</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO SUCHILQUITONGO') echo 'selected'; ?> value="SANTIAGO SUCHILQUITONGO">SANTIAGO SUCHILQUITONGO</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO TENANGO') echo 'selected'; ?> value="SANTIAGO TENANGO">SANTIAGO TENANGO</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO TLASOYALTEPEC') echo 'selected'; ?> value="SANTIAGO TLASOYALTEPEC">SANTIAGO TLASOYALTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SANTO TOMÁS MAZALTEPEC') echo 'selected'; ?> value="SANTO TOMÁS MAZALTEPEC">SANTO TOMÁS MAZALTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SOLEDAD ETLA') echo 'selected'; ?> value="SOLEDAD ETLA">SOLEDAD ETLA</option>
        <option <?php if ($personal['Municipio'] == 'ASUNCIÓN OCOTLÁN') echo 'selected'; ?> value="ASUNCIÓN OCOTLÁN">ASUNCIÓN OCOTLÁN</option>
        <option <?php if ($personal['Municipio'] == 'MAGDALENA OCOTLAN') echo 'selected'; ?> value="MAGDALENA OCOTLAN">MAGDALENA OCOTLAN</option>
        <option <?php if ($personal['Municipio'] == 'OCOTLAN DE MORELOS') echo 'selected'; ?> value="OCOTLAN DE MORELOS">OCOTLAN DE MORELOS</option>
        <option <?php if ($personal['Municipio'] == 'SAN JOSÉ DEL PROGRESO') echo 'selected'; ?> value="SAN JOSÉ DEL PROGRESO">SAN JOSÉ DEL PROGRESO</option>
        <option <?php if ($personal['Municipio'] == 'SAN ANTONINO CASTILLO VELASCO') echo 'selected'; ?> value="SAN ANTONINO CASTILLO VELASCO">SAN ANTONINO CASTILLO VELASCO</option>
        <option <?php if ($personal['Municipio'] == 'SAN BALTAZAR CHICHICAPAM') echo 'selected'; ?> value="SAN BALTAZAR CHICHICAPAM">SAN BALTAZAR CHICHICAPAM</option>
        <option <?php if ($personal['Municipio'] == 'SAN DIONISIO OCOTLAN') echo 'selected'; ?> value="SAN DIONISIO OCOTLAN">SAN DIONISIO OCOTLAN</option>
        <option <?php if ($personal['Municipio'] == 'SAN JERÓNIMO TAVICHE') echo 'selected'; ?> value="SAN JERÓNIMO TAVICHE">SAN JERÓNIMO TAVICHE</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN CHILATECA') echo 'selected'; ?> value="SAN JUAN CHILATECA">SAN JUAN CHILATECA</option>
        <option <?php if ($personal['Municipio'] == 'SAN MARTÍN TILCAJETE') echo 'selected'; ?> value="SAN MARTÍN TILCAJETE">SAN MARTÍN TILCAJETE</option>
        <option <?php if ($personal['Municipio'] == 'SAN MIGUEL TILQUIAPAM') echo 'selected'; ?> value="SAN MIGUEL TILQUIAPAM">SAN MIGUEL TILQUIAPAM</option>
        <option <?php if ($personal['Municipio'] == 'SAN PEDRO APÓSTOL') echo 'selected'; ?> value="SAN PEDRO APÓSTOL">SAN PEDRO APÓSTOL</option>
        <option <?php if ($personal['Municipio'] == 'SAN PEDRO MARTIR') echo 'selected'; ?> value="SAN PEDRO MARTIR">SAN PEDRO MARTIR</option>
        <option <?php if ($personal['Municipio'] == 'SAN PEDRO TAVICHE') echo 'selected'; ?> value="SAN PEDRO TAVICHE">SAN PEDRO TAVICHE</option>
        <option <?php if ($personal['Municipio'] == 'SANTA ANA ZEGACHE') echo 'selected'; ?> value="SANTA ANA ZEGACHE">SANTA ANA ZEGACHE</option>
        <option <?php if ($personal['Municipio'] == 'SANTA CATARINA MINAS') echo 'selected'; ?> value="SANTA CATARINA MINAS">SANTA CATARINA MINAS</option>
        <option <?php if ($personal['Municipio'] == 'SANTA LUCIA OCOTLAN') echo 'selected'; ?> value="SANTA LUCIA OCOTLAN">SANTA LUCIA OCOTLAN</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO APÓSTOL') echo 'selected'; ?> value="SANTIAGO APÓSTOL">SANTIAGO APÓSTOL</option>
        <option <?php if ($personal['Municipio'] == 'SANTO TOMÁS JALIEZA') echo 'selected'; ?> value="SANTO TOMÁS JALIEZA">SANTO TOMÁS JALIEZA</option>
        <option <?php if ($personal['Municipio'] == 'YAXE') echo 'selected'; ?> value="YAXE">YAXE</option>
        <option <?php if ($personal['Municipio'] == 'MAGDALENA TEITIPAC') echo 'selected'; ?> value="MAGDALENA TEITIPAC">MAGDALENA TEITIPAC</option>
        <option <?php if ($personal['Municipio'] == 'ROJAS DE CUAHUTEMOC') echo 'selected'; ?> value="ROJAS DE CUAHUTEMOC">ROJAS DE CUAHUTEMOC</option>
        <option <?php if ($personal['Municipio'] == 'SAN BARTOLOMÉ QUIALANA') echo 'selected'; ?> value="SAN BARTOLOMÉ QUIALANA">SAN BARTOLOMÉ QUIALANA</option>
        <option <?php if ($personal['Municipio'] == 'SAN DIONISIO OCOTEPEC') echo 'selected'; ?> value="SAN DIONISIO OCOTEPEC">SAN DIONISIO OCOTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN FRANCISCO LACHIGOLO') echo 'selected'; ?> value="SAN FRANCISCO LACHIGOLO">SAN FRANCISCO LACHIGOLO</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN DEL RIO') echo 'selected'; ?> value="SAN JUAN DEL RIO">SAN JUAN DEL RIO</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN GUELAVIA') echo 'selected'; ?> value="SAN JUAN GUELAVIA">SAN JUAN GUELAVIA</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN TEITIPAC') echo 'selected'; ?> value="SAN JUAN TEITIPAC">SAN JUAN TEITIPAC</option>
        <option <?php if ($personal['Municipio'] == 'SAN LORENZO ALBARRADAS') echo 'selected'; ?> value="SAN LORENZO ALBARRADAS">SAN LORENZO ALBARRADAS</option>
        <option <?php if ($personal['Municipio'] == 'SAN LUCAS QUIAVINI') echo 'selected'; ?> value="SAN LUCAS QUIAVINI">SAN LUCAS QUIAVINI</option>
        <option <?php if ($personal['Municipio'] == 'SAN PABLO VILLA DE MITLA') echo 'selected'; ?> value="SAN PABLO VILLA DE MITLA">SAN PABLO VILLA DE MITLA</option>
        <option <?php if ($personal['Municipio'] == 'SAN PEDRO QUIATONI') echo 'selected'; ?> value="SAN PEDRO QUIATONI">SAN PEDRO QUIATONI</option>
        <option <?php if ($personal['Municipio'] == 'SAN PEDRO TOTOLAPAN') echo 'selected'; ?> value="SAN PEDRO TOTOLAPAN">SAN PEDRO TOTOLAPAN</option>
        <option <?php if ($personal['Municipio'] == 'SAN SEBASTIÁN ABASOLO') echo 'selected'; ?> value="SAN SEBASTIÁN ABASOLO">SAN SEBASTIÁN ABASOLO</option>
        <option <?php if ($personal['Municipio'] == 'SAN SEBASTIÁN TEITIPAC') echo 'selected'; ?> value="SAN SEBASTIÁN TEITIPAC">SAN SEBASTIÁN TEITIPAC</option>
        <option <?php if ($personal['Municipio'] == 'SANTA ANA DEL VALLE') echo 'selected'; ?> value="SANTA ANA DEL VALLE">SANTA ANA DEL VALLE</option>
        <option <?php if ($personal['Municipio'] == 'SANTA CRUZ PAPALUTLA') echo 'selected'; ?> value="SANTA CRUZ PAPALUTLA">SANTA CRUZ PAPALUTLA</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA GUELACE') echo 'selected'; ?> value="SANTA MARÍA GUELACE">SANTA MARÍA GUELACE</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA ZOQUITLAN') echo 'selected'; ?> value="SANTA MARÍA ZOQUITLAN">SANTA MARÍA ZOQUITLAN</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO MATATLAN') echo 'selected'; ?> value="SANTIAGO MATATLAN">SANTIAGO MATATLAN</option>
        <option <?php if ($personal['Municipio'] == 'SANTO DOMINGO ALBARRADAS') echo 'selected'; ?> value="SANTO DOMINGO ALBARRADAS">SANTO DOMINGO ALBARRADAS</option>
        <option <?php if ($personal['Municipio'] == 'TEOTITLAN DEL VALLE') echo 'selected'; ?> value="TEOTITLAN DEL VALLE">TEOTITLAN DEL VALLE</option>
        <option <?php if ($personal['Municipio'] == 'SAN JERONIMO TLACOCHAHUAYA') echo 'selected'; ?> value="SAN JERONIMO TLACOCHAHUAYA">SAN JERONIMO TLACOCHAHUAYA</option>
        <option <?php if ($personal['Municipio'] == 'TLACOLULA DE MATAMOROS') echo 'selected'; ?> value="TLACOLULA DE MATAMOROS">TLACOLULA DE MATAMOROS</option>
        <option <?php if ($personal['Municipio'] == 'VILLA DE DIAZ ORDAZ') echo 'selected'; ?> value="VILLA DE DIAZ ORDAZ">VILLA DE DIAZ ORDAZ</option>
        <option <?php if ($personal['Municipio'] == 'SAN ANTONIO HUITEPEC') echo 'selected'; ?> value="SAN ANTONIO HUITEPEC">SAN ANTONIO HUITEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN MIGUEL PERAS') echo 'selected'; ?> value="SAN MIGUEL PERAS">SAN MIGUEL PERAS</option>
        <option <?php if ($personal['Municipio'] == 'SAN PABLO CUATRO VENADOS') echo 'selected'; ?> value="SAN PABLO CUATRO VENADOS">SAN PABLO CUATRO VENADOS</option>
        <option <?php if ($personal['Municipio'] == 'SANTA INES DEL MONTE') echo 'selected'; ?> value="SANTA INES DEL MONTE">SANTA INES DEL MONTE</option>
        <option <?php if ($personal['Municipio'] == 'TRINIDAD ZAACHILA') echo 'selected'; ?> value="TRINIDAD ZAACHILA">TRINIDAD ZAACHILA</option>
        <option <?php if ($personal['Municipio'] == 'VILLA DE ZAACHILA') echo 'selected'; ?> value="VILLA DE ZAACHILA">VILLA DE ZAACHILA</option>
        <option <?php if ($personal['Municipio'] == 'CIÉNEGA DE ZIMATLAN') echo 'selected'; ?> value="CIÉNEGA DE ZIMATLAN">CIÉNEGA DE ZIMATLAN</option>
        <option <?php if ($personal['Municipio'] == 'MAGDALENA MIXTEPEC') echo 'selected'; ?> value="MAGDALENA MIXTEPEC">MAGDALENA MIXTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN ANTONIO EL ALTO') echo 'selected'; ?> value="SAN ANTONIO EL ALTO">SAN ANTONIO EL ALTO</option>
        <option <?php if ($personal['Municipio'] == 'SAN BERNARDO MIXTEPEC') echo 'selected'; ?> value="SAN BERNARDO MIXTEPEC">SAN BERNARDO MIXTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN MIGUEL MIXTEPEC') echo 'selected'; ?> value="SAN MIGUEL MIXTEPEC">SAN MIGUEL MIXTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN PABLO HUIXTEPEC') echo 'selected'; ?> value="SAN PABLO HUIXTEPEC">SAN PABLO HUIXTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SANTA ANA TLAPACOYAN') echo 'selected'; ?> value="SANTA ANA TLAPACOYAN">SANTA ANA TLAPACOYAN</option>
        <option <?php if ($personal['Municipio'] == 'SANTA CATARINA QUIANE') echo 'selected'; ?> value="SANTA CATARINA QUIANE">SANTA CATARINA QUIANE</option>
        <option <?php if ($personal['Municipio'] == 'SANTA CRUZ MIXTEPEC') echo 'selected'; ?> value="SANTA CRUZ MIXTEPEC">SANTA CRUZ MIXTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SANTA GERTRUDIS') echo 'selected'; ?> value="SANTA GERTRUDIS">SANTA GERTRUDIS</option>
        <option <?php if ($personal['Municipio'] == 'SANTA INES YATZECHE') echo 'selected'; ?> value="SANTA INES YATZECHE">SANTA INES YATZECHE</option>
        <option <?php if ($personal['Municipio'] == 'AYOQUEZCO DE ALDAMA') echo 'selected'; ?> value="AYOQUEZCO DE ALDAMA">AYOQUEZCO DE ALDAMA</option>
        <option <?php if ($personal['Municipio'] == 'ZIMATLÁN DE ALVAREZ') echo 'selected'; ?> value="ZIMATLÁN DE ALVAREZ">ZIMATLÁN DE ALVAREZ</option>
        <option <?php if ($personal['Municipio'] == 'MARTIRES DE TACUBAYA') echo 'selected'; ?> value="MARTIRES DE TACUBAYA">MARTIRES DE TACUBAYA</option>
        <option <?php if ($personal['Municipio'] == 'PINOTEPA DE DON LUIS') echo 'selected'; ?> value="PINOTEPA DE DON LUIS">PINOTEPA DE DON LUIS</option>
        <option <?php if ($personal['Municipio'] == 'SAN AGUSTIN CHAYUCO') echo 'selected'; ?> value="SAN AGUSTIN CHAYUCO">SAN AGUSTIN CHAYUCO</option>
        <option <?php if ($personal['Municipio'] == 'SAN ANDRÉS HUAXPALTEPEC') echo 'selected'; ?> value="SAN ANDRÉS HUAXPALTEPEC">SAN ANDRÉS HUAXPALTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN ANTONIO TEPETLAPA') echo 'selected'; ?> value="SAN ANTONIO TEPETLAPA">SAN ANTONIO TEPETLAPA</option>
        <option <?php if ($personal['Municipio'] == 'SAN JOSE ESTANCIA GRANDE') echo 'selected'; ?> value="SAN JOSE ESTANCIA GRANDE">SAN JOSE ESTANCIA GRANDE</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN BAUTISTA LO DE SOTO') echo 'selected'; ?> value="SAN JUAN BAUTISTA LO DE SOTO">SAN JUAN BAUTISTA LO DE SOTO</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN CACAHUATEPEC') echo 'selected'; ?> value="SAN JUAN CACAHUATEPEC">SAN JUAN CACAHUATEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN COLORADO') echo 'selected'; ?> value="SAN JUAN COLORADO">SAN JUAN COLORADO</option>
        <option <?php if ($personal['Municipio'] == 'SAN LORENZO') echo 'selected'; ?> value="SAN LORENZO">SAN LORENZO</option>
        <option <?php if ($personal['Municipio'] == 'SAN MIGUEL TLACAMAMA') echo 'selected'; ?> value="SAN MIGUEL TLACAMAMA">SAN MIGUEL TLACAMAMA</option>
        <option <?php if ($personal['Municipio'] == 'SAN PEDRO ATOYAC') echo 'selected'; ?> value="SAN PEDRO ATOYAC">SAN PEDRO ATOYAC</option>
        <option <?php if ($personal['Municipio'] == 'SAN PEDRO JICAYAN') echo 'selected'; ?> value="SAN PEDRO JICAYAN">SAN PEDRO JICAYAN</option>
        <option <?php if ($personal['Municipio'] == 'SAN SEBASTIÁN IXCAPAC') echo 'selected'; ?> value="SAN SEBASTIÁN IXCAPAC">SAN SEBASTIÁN IXCAPAC</option>
        <option <?php if ($personal['Municipio'] == 'SANTA CATARINA MECHOACAN') echo 'selected'; ?> value="SANTA CATARINA MECHOACAN">SANTA CATARINA MECHOACAN</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA CORTIJO') echo 'selected'; ?> value="SANTA MARÍA CORTIJO">SANTA MARÍA CORTIJO</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA HUAZOLOTITLAN') echo 'selected'; ?> value="SANTA MARÍA HUAZOLOTITLAN">SANTA MARÍA HUAZOLOTITLAN</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO IXTAYUTLA') echo 'selected'; ?> value="SANTIAGO IXTAYUTLA">SANTIAGO IXTAYUTLA</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO JAMILTEPEC') echo 'selected'; ?> value="SANTIAGO JAMILTEPEC">SANTIAGO JAMILTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO LLANO GRANDE') echo 'selected'; ?> value="SANTIAGO LLANO GRANDE">SANTIAGO LLANO GRANDE</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO PINOTEPA NACIONAL') echo 'selected'; ?> value="SANTIAGO PINOTEPA NACIONAL">SANTIAGO PINOTEPA NACIONAL</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO TEPEXTLA') echo 'selected'; ?> value="SANTIAGO TEPEXTLA">SANTIAGO TEPEXTLA</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO TETEPEC') echo 'selected'; ?> value="SANTIAGO TETEPEC">SANTIAGO TETEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SANTO DOMINGO ARMENTA') echo 'selected'; ?> value="SANTO DOMINGO ARMENTA">SANTO DOMINGO ARMENTA</option>
        <option <?php if ($personal['Municipio'] == 'SAN GABRIEL MIXTEPEC') echo 'selected'; ?> value="SAN GABRIEL MIXTEPEC">SAN GABRIEL MIXTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN LACHAO') echo 'selected'; ?> value="SAN JUAN LACHAO">SAN JUAN LACHAO</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN QUIAHIJE') echo 'selected'; ?> value="SAN JUAN QUIAHIJE">SAN JUAN QUIAHIJE</option>
        <option <?php if ($personal['Municipio'] == 'SAN MIGUEL PANIXTLAHUACA') echo 'selected'; ?> value="SAN MIGUEL PANIXTLAHUACA">SAN MIGUEL PANIXTLAHUACA</option>
        <option <?php if ($personal['Municipio'] == 'SAN PEDRO JUCHATENGO') echo 'selected'; ?> value="SAN PEDRO JUCHATENGO">SAN PEDRO JUCHATENGO</option>
        <option <?php if ($personal['Municipio'] == 'SAN PEDRO MIXTEPEC') echo 'selected'; ?> value="SAN PEDRO MIXTEPEC">SAN PEDRO MIXTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'VILLA DE TUTUTEPEC DE MELCHOR OCAMPO') echo 'selected'; ?> value="VILLA DE TUTUTEPEC DE MELCHOR OCAMPO">VILLA DE TUTUTEPEC DE MELCHOR OCAMPO</option>
        <option <?php if ($personal['Municipio'] == 'SANTA CATARINA JUQUILA') echo 'selected'; ?> value="SANTA CATARINA JUQUILA">SANTA CATARINA JUQUILA</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA TEMAXCALTEPEC') echo 'selected'; ?> value="SANTA MARÍA TEMAXCALTEPEC">SANTA MARÍA TEMAXCALTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO YAITEPEC') echo 'selected'; ?> value="SANTIAGO YAITEPEC">SANTIAGO YAITEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SANTOS REYES NOPALA') echo 'selected'; ?> value="SANTOS REYES NOPALA">SANTOS REYES NOPALA</option>
        <option <?php if ($personal['Municipio'] == 'TATALTEPEC DE VALDES') echo 'selected'; ?> value="TATALTEPEC DE VALDES">TATALTEPEC DE VALDES</option>
        <option <?php if ($personal['Municipio'] == 'CANDELARIA LOXICHA') echo 'selected'; ?> value="CANDELARIA LOXICHA">CANDELARIA LOXICHA</option>
        <option <?php if ($personal['Municipio'] == 'PLUMA HIDALGO') echo 'selected'; ?> value="PLUMA HIDALGO">PLUMA HIDALGO</option>
        <option <?php if ($personal['Municipio'] == 'SAN AGUSTIN LOXICHA') echo 'selected'; ?> value="SAN AGUSTIN LOXICHA">SAN AGUSTIN LOXICHA</option>
        <option <?php if ($personal['Municipio'] == 'SAN BALTAZAR LOXICHA') echo 'selected'; ?> value="SAN BALTAZAR LOXICHA">SAN BALTAZAR LOXICHA</option>
        <option <?php if ($personal['Municipio'] == 'SAN BARTOLOMÉ LOXICHA') echo 'selected'; ?> value="SAN BARTOLOMÉ LOXICHA">SAN BARTOLOMÉ LOXICHA</option>
        <option <?php if ($personal['Municipio'] == 'SAN MATEO PIÑAS') echo 'selected'; ?> value="SAN MATEO PIÑAS">SAN MATEO PIÑAS</option>
        <option <?php if ($personal['Municipio'] == 'SAN MIGUEL DEL PUERO') echo 'selected'; ?> value="SAN MIGUEL DEL PUERO">SAN MIGUEL DEL PUERO</option>
        <option <?php if ($personal['Municipio'] == 'SAN PEDRO EL ALTO') echo 'selected'; ?> value="SAN PEDRO EL ALTO">SAN PEDRO EL ALTO</option>
        <option <?php if ($personal['Municipio'] == 'SAN PEDRO POCHUTLA') echo 'selected'; ?> value="SAN PEDRO POCHUTLA">SAN PEDRO POCHUTLA</option>
        <option <?php if ($personal['Municipio'] == 'SANTA CATARINA LOXICHA') echo 'selected'; ?> value="SANTA CATARINA LOXICHA">SANTA CATARINA LOXICHA</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA COLOTEPEC') echo 'selected'; ?> value="SANTA MARÍA COLOTEPEC">SANTA MARÍA COLOTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA HUATULCO') echo 'selected'; ?> value="SANTA MARÍA HUATULCO">SANTA MARÍA HUATULCO</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA TONAMECA') echo 'selected'; ?> value="SANTA MARÍA TONAMECA">SANTA MARÍA TONAMECA</option>
        <option <?php if ($personal['Municipio'] == 'SANTO DOMINGO DE MORELOS') echo 'selected'; ?> value="SANTO DOMINGO DE MORELOS">SANTO DOMINGO DE MORELOS</option>
        <option <?php if ($personal['Municipio'] == 'CONCEPCIÓN PÁPALO') echo 'selected'; ?> value="CONCEPCIÓN PÁPALO">CONCEPCIÓN PÁPALO</option>
        <option <?php if ($personal['Municipio'] == 'CUYAMECALCO VILLA DE ZARAGOZA') echo 'selected'; ?> value="CUYAMECALCO VILLA DE ZARAGOZA">CUYAMECALCO VILLA DE ZARAGOZA</option>
        <option <?php if ($personal['Municipio'] == 'CHIQUIHUITLAN DE BENITO JUÁREZ') echo 'selected'; ?> value="CHIQUIHUITLAN DE BENITO JUÁREZ">CHIQUIHUITLAN DE BENITO JUÁREZ</option>
        <option <?php if ($personal['Municipio'] == 'SAN ANDRÉS TEOTILÁPAM') echo 'selected'; ?> value="SAN ANDRÉS TEOTILÁPAM">SAN ANDRÉS TEOTILÁPAM</option>
        <option <?php if ($personal['Municipio'] == 'SAN FRANCISCO CHAPULAPA') echo 'selected'; ?> value="SAN FRANCISCO CHAPULAPA">SAN FRANCISCO CHAPULAPA</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN BAUTISTA CUICATLÁN') echo 'selected'; ?> value="SAN JUAN BAUTISTA CUICATLÁN">SAN JUAN BAUTISTA CUICATLÁN</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN BAUTISTA TLACOATZINTEPEC') echo 'selected'; ?> value="SAN JUAN BAUTISTA TLACOATZINTEPEC">SAN JUAN BAUTISTA TLACOATZINTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN TEPEUXILA') echo 'selected'; ?> value="SAN JUAN TEPEUXILA">SAN JUAN TEPEUXILA</option>
        <option <?php if ($personal['Municipio'] == 'SAN MIGUEL SANTA FLOR') echo 'selected'; ?> value="SAN MIGUEL SANTA FLOR">SAN MIGUEL SANTA FLOR</option>
        <option <?php if ($personal['Municipio'] == 'SAN PEDRO JALTEPETONGO') echo 'selected'; ?> value="SAN PEDRO JALTEPETONGO">SAN PEDRO JALTEPETONGO</option>
        <option <?php if ($personal['Municipio'] == 'SAN PEDRO JOCOTIPAC') echo 'selected'; ?> value="SAN PEDRO JOCOTIPAC">SAN PEDRO JOCOTIPAC</option>
        <option <?php if ($personal['Municipio'] == 'SAN PEDRO SOCHIAPAM') echo 'selected'; ?> value="SAN PEDRO SOCHIAPAM">SAN PEDRO SOCHIAPAM</option>
        <option <?php if ($personal['Municipio'] == 'SAN PEDRO TEUTILA') echo 'selected'; ?> value="SAN PEDRO TEUTILA">SAN PEDRO TEUTILA</option>
        <option <?php if ($personal['Municipio'] == 'SANTA ANA CUAUHTÉMOC') echo 'selected'; ?> value="SANTA ANA CUAUHTÉMOC">SANTA ANA CUAUHTÉMOC</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA PÁPALO') echo 'selected'; ?> value="SANTA MARÍA PÁPALO">SANTA MARÍA PÁPALO</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA TEXCATITLÁN') echo 'selected'; ?> value="SANTA MARÍA TEXCATITLÁN">SANTA MARÍA TEXCATITLÁN</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA TLALIXTAC') echo 'selected'; ?> value="SANTA MARÍA TLALIXTAC">SANTA MARÍA TLALIXTAC</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO NACALTEPEC') echo 'selected'; ?> value="SANTIAGO NACALTEPEC">SANTIAGO NACALTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SANTOS REYES PÁPALO') echo 'selected'; ?> value="SANTOS REYES PÁPALO">SANTOS REYES PÁPALO</option>
        <option <?php if ($personal['Municipio'] == 'VALERIO TRUJANO') echo 'selected'; ?> value="VALERIO TRUJANO">VALERIO TRUJANO</option>
        <option <?php if ($personal['Municipio'] == 'ELOXOCHITLÁN DE FLORES MAGÓN') echo 'selected'; ?> value="ELOXOCHITLÁN DE FLORES MAGÓN">ELOXOCHITLÁN DE FLORES MAGÓN</option>
        <option <?php if ($personal['Municipio'] == 'SAN MIGUEL HUAUTEPEC') echo 'selected'; ?> value="SAN MIGUEL HUAUTEPEC">SAN MIGUEL HUAUTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'HUAUTLA DE JIMÉNEZ') echo 'selected'; ?> value="HUAUTLA DE JIMÉNEZ">HUAUTLA DE JIMÉNEZ</option>
        <option <?php if ($personal['Municipio'] == 'MAZATLÁN VILLA DE FLORES') echo 'selected'; ?> value="MAZATLÁN VILLA DE FLORES">MAZATLÁN VILLA DE FLORES</option>
        <option <?php if ($personal['Municipio'] == 'SAN ANTONIO NANAHUATIPAM') echo 'selected'; ?> value="SAN ANTONIO NANAHUATIPAM">SAN ANTONIO NANAHUATIPAM</option>
        <option <?php if ($personal['Municipio'] == 'SAN BARTOLOMÉ AYAUTLA') echo 'selected'; ?> value="SAN BARTOLOMÉ AYAUTLA">SAN BARTOLOMÉ AYAUTLA</option>
        <option <?php if ($personal['Municipio'] == 'SAN FRANCISCO HUEHUETLÁN') echo 'selected'; ?> value="SAN FRANCISCO HUEHUETLÁN">SAN FRANCISCO HUEHUETLÁN</option>
        <option <?php if ($personal['Municipio'] == 'SAN JERÓNIMO TECOATL') echo 'selected'; ?> value="SAN JERÓNIMO TECOATL">SAN JERÓNIMO TECOATL</option>
        <option <?php if ($personal['Municipio'] == 'SAN JOSÉ TENANGO') echo 'selected'; ?> value="SAN JOSÉ TENANGO">SAN JOSÉ TENANGO</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN COATZOSPAM') echo 'selected'; ?> value="SAN JUAN COATZOSPAM">SAN JUAN COATZOSPAM</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN DE LOS CUES') echo 'selected'; ?> value="SAN JUAN DE LOS CUES">SAN JUAN DE LOS CUES</option>
        <option <?php if ($personal['Municipio'] == 'SAN LORENZO CUANECUILTITLA') echo 'selected'; ?> value="SAN LORENZO CUANECUILTITLA">SAN LORENZO CUANECUILTITLA</option>
        <option <?php if ($personal['Municipio'] == 'SAN LUCAS ZOQUIAPAM') echo 'selected'; ?> value="SAN LUCAS ZOQUIAPAM">SAN LUCAS ZOQUIAPAM</option>
        <option <?php if ($personal['Municipio'] == 'SAN MARTÍN TOXPALAN') echo 'selected'; ?> value="SAN MARTÍN TOXPALAN">SAN MARTÍN TOXPALAN</option>
        <option <?php if ($personal['Municipio'] == 'SAN MATEO YOLOXCHITLAN') echo 'selected'; ?> value="SAN MATEO YOLOXCHITLAN">SAN MATEO YOLOXCHITLAN</option>
        <option <?php if ($personal['Municipio'] == 'SAN PEDRO OCOPETATILLO') echo 'selected'; ?> value="SAN PEDRO OCOPETATILLO">SAN PEDRO OCOPETATILLO</option>
        <option <?php if ($personal['Municipio'] == 'SANTA ANA ATEIXTLAHUACA') echo 'selected'; ?> value="SANTA ANA ATEIXTLAHUACA">SANTA ANA ATEIXTLAHUACA</option>
        <option <?php if ($personal['Municipio'] == 'SANTA CRUZ ACATEPEC') echo 'selected'; ?> value="SANTA CRUZ ACATEPEC">SANTA CRUZ ACATEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA LA ASUNCIÓN') echo 'selected'; ?> value="SANTA MARÍA LA ASUNCIÓN">SANTA MARÍA LA ASUNCIÓN</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA CHILCHOTLA') echo 'selected'; ?> value="SANTA MARÍA CHILCHOTLA">SANTA MARÍA CHILCHOTLA</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA IXCATLÁN') echo 'selected'; ?> value="SANTA MARÍA IXCATLÁN">SANTA MARÍA IXCATLÁN</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA TECOMAVACA') echo 'selected'; ?> value="SANTA MARÍA TECOMAVACA">SANTA MARÍA TECOMAVACA</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA TEOPOXCO') echo 'selected'; ?> value="SANTA MARÍA TEOPOXCO">SANTA MARÍA TEOPOXCO</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO TEXCALCINGO') echo 'selected'; ?> value="SANTIAGO TEXCALCINGO">SANTIAGO TEXCALCINGO</option>
        <option <?php if ($personal['Municipio'] == 'TEOTITLAN DE FLORES MAGÓN') echo 'selected'; ?> value="TEOTITLAN DE FLORES MAGÓN">TEOTITLAN DE FLORES MAGÓN</option>
        <option <?php if ($personal['Municipio'] == 'ASUNCIÓN IXTALTEPEC') echo 'selected'; ?> value="ASUNCIÓN IXTALTEPEC">ASUNCIÓN IXTALTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'BARRIO DE LA SOLEDAD') echo 'selected'; ?> value="BARRIO DE LA SOLEDAD">BARRIO DE LA SOLEDAD</option>
        <option <?php if ($personal['Municipio'] == 'CIUDAD IXTEPEC') echo 'selected'; ?> value="CIUDAD IXTEPEC">CIUDAD IXTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'CHAHUITES') echo 'selected'; ?> value="CHAHUITES">CHAHUITES</option>
        <option <?php if ($personal['Municipio'] == 'EL ESPINAL') echo 'selected'; ?> value="EL ESPINAL">EL ESPINAL</option>
        <option <?php if ($personal['Municipio'] == 'JUCHITAN DE ZARAGOZA') echo 'selected'; ?> value="JUCHITAN DE ZARAGOZA">JUCHITAN DE ZARAGOZA</option>
        <option <?php if ($personal['Municipio'] == 'MATIAS ROMERO') echo 'selected'; ?> value="MATIAS ROMERO">MATIAS ROMERO</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO NILTEPEC') echo 'selected'; ?> value="SANTIAGO NILTEPEC">SANTIAGO NILTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'REFORMA DE PINEDA') echo 'selected'; ?> value="REFORMA DE PINEDA">REFORMA DE PINEDA</option>
        <option <?php if ($personal['Municipio'] == 'SAN DIONISIO DEL MAR') echo 'selected'; ?> value="SAN DIONISIO DEL MAR">SAN DIONISIO DEL MAR</option>
        <option <?php if ($personal['Municipio'] == 'SAN FRANCISCO DEL MAR') echo 'selected'; ?> value="SAN FRANCISCO DEL MAR">SAN FRANCISCO DEL MAR</option>
        <option <?php if ($personal['Municipio'] == 'SAN FRANCISCO IXHUATAN') echo 'selected'; ?> value="SAN FRANCISCO IXHUATAN">SAN FRANCISCO IXHUATAN</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN GUICHICOVI') echo 'selected'; ?> value="SAN JUAN GUICHICOVI">SAN JUAN GUICHICOVI</option>
        <option <?php if ($personal['Municipio'] == 'SAN MIGUEL CHIMALAPA') echo 'selected'; ?> value="SAN MIGUEL CHIMALAPA">SAN MIGUEL CHIMALAPA</option>
        <option <?php if ($personal['Municipio'] == 'SAN PEDRO TAPANATEPEC') echo 'selected'; ?> value="SAN PEDRO TAPANATEPEC">SAN PEDRO TAPANATEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA CHIMALAPA') echo 'selected'; ?> value="SANTA MARÍA CHIMALAPA">SANTA MARÍA CHIMALAPA</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA PETAPA') echo 'selected'; ?> value="SANTA MARÍA PETAPA">SANTA MARÍA PETAPA</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA XADANI') echo 'selected'; ?> value="SANTA MARÍA XADANI">SANTA MARÍA XADANI</option>
        <option <?php if ($personal['Municipio'] == 'SANTO DOMINGO INGENIO') echo 'selected'; ?> value="SANTO DOMINGO INGENIO">SANTO DOMINGO INGENIO</option>
        <option <?php if ($personal['Municipio'] == 'SANTO DOMINGO PETAPA') echo 'selected'; ?> value="SANTO DOMINGO PETAPA">SANTO DOMINGO PETAPA</option>
        <option <?php if ($personal['Municipio'] == 'SANTO DOMINGO ZANATEPEC') echo 'selected'; ?> value="SANTO DOMINGO ZANATEPEC">SANTO DOMINGO ZANATEPEC</option>
        <option <?php if ($personal['Municipio'] == 'UNIÓN HIDALGO') echo 'selected'; ?> value="UNIÓN HIDALGO">UNIÓN HIDALGO</option>
        <option <?php if ($personal['Municipio'] == 'GUEVEA DE HUMBOLT') echo 'selected'; ?> value="GUEVEA DE HUMBOLT">GUEVEA DE HUMBOLT</option>
        <option <?php if ($personal['Municipio'] == 'MAGDALENA TEQUISISTLAN') echo 'selected'; ?> value="MAGDALENA TEQUISISTLAN">MAGDALENA TEQUISISTLAN</option>
        <option <?php if ($personal['Municipio'] == 'MAGDALENA TLACOTEPEC') echo 'selected'; ?> value="MAGDALENA TLACOTEPEC">MAGDALENA TLACOTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SALINA CRUZ') echo 'selected'; ?> value="SALINA CRUZ">SALINA CRUZ</option>
        <option <?php if ($personal['Municipio'] == 'SAN BLAS ATEMPA') echo 'selected'; ?> value="SAN BLAS ATEMPA">SAN BLAS ATEMPA</option>
        <option <?php if ($personal['Municipio'] == 'SAN MATEO DEL MAR') echo 'selected'; ?> value="SAN MATEO DEL MAR">SAN MATEO DEL MAR</option>
        <option <?php if ($personal['Municipio'] == 'SAN MIGUEL TENANGO') echo 'selected'; ?> value="SAN MIGUEL TENANGO">SAN MIGUEL TENANGO</option>
        <option <?php if ($personal['Municipio'] == 'SAN PEDRO COMITANCILLO') echo 'selected'; ?> value="SAN PEDRO COMITANCILLO">SAN PEDRO COMITANCILLO</option>
        <option <?php if ($personal['Municipio'] == 'SAN PEDRO HUAMELULA') echo 'selected'; ?> value="SAN PEDRO HUAMELULA">SAN PEDRO HUAMELULA</option>
        <option <?php if ($personal['Municipio'] == 'SAN PEDRO HUILOTEPEC') echo 'selected'; ?> value="SAN PEDRO HUILOTEPEC">SAN PEDRO HUILOTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA GUIENAGATI') echo 'selected'; ?> value="SANTA MARÍA GUIENAGATI">SANTA MARÍA GUIENAGATI</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA JALAPA DEL MARQUEZ') echo 'selected'; ?> value="SANTA MARÍA JALAPA DEL MARQUEZ">SANTA MARÍA JALAPA DEL MARQUEZ</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA MIXTEQUILLA') echo 'selected'; ?> value="SANTA MARÍA MIXTEQUILLA">SANTA MARÍA MIXTEQUILLA</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA TOTOLAPILLA') echo 'selected'; ?> value="SANTA MARÍA TOTOLAPILLA">SANTA MARÍA TOTOLAPILLA</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO ASTATA') echo 'selected'; ?> value="SANTIAGO ASTATA">SANTIAGO ASTATA</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO LACHIGUIRI') echo 'selected'; ?> value="SANTIAGO LACHIGUIRI">SANTIAGO LACHIGUIRI</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO LAOLLAGA') echo 'selected'; ?> value="SANTIAGO LAOLLAGA">SANTIAGO LAOLLAGA</option>
        <option <?php if ($personal['Municipio'] == 'SANTO DOMINGO CHIHUITAN') echo 'selected'; ?> value="SANTO DOMINGO CHIHUITAN">SANTO DOMINGO CHIHUITAN</option>
        <option <?php if ($personal['Municipio'] == 'SANTO DOMINGO TEHUANTEPEC') echo 'selected'; ?> value="SANTO DOMINGO TEHUANTEPEC">SANTO DOMINGO TEHUANTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'CONCEPCIÓN BUENAVISTA') echo 'selected'; ?> value="CONCEPCIÓN BUENAVISTA">CONCEPCIÓN BUENAVISTA</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MAGDALENA JICOTLÁN') echo 'selected'; ?> value="SANTA MAGDALENA JICOTLÁN">SANTA MAGDALENA JICOTLÁN</option>
        <option <?php if ($personal['Municipio'] == 'SAN CRISTÓBAL SUCHIXTLAHUACA') echo 'selected'; ?> value="SAN CRISTÓBAL SUCHIXTLAHUACA">SAN CRISTÓBAL SUCHIXTLAHUACA</option>
        <option <?php if ($personal['Municipio'] == 'SAN FRANCISCO TEOPAN') echo 'selected'; ?> value="SAN FRANCISCO TEOPAN">SAN FRANCISCO TEOPAN</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN BAUTISTA COIXTLAHUACA') echo 'selected'; ?> value="SAN JUAN BAUTISTA COIXTLAHUACA">SAN JUAN BAUTISTA COIXTLAHUACA</option>
        <option <?php if ($personal['Municipio'] == 'SAN MATEO TLAPILTEPEC') echo 'selected'; ?> value="SAN MATEO TLAPILTEPEC">SAN MATEO TLAPILTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN MIGUEL TEQUIXTEPEC') echo 'selected'; ?> value="SAN MIGUEL TEQUIXTEPEC">SAN MIGUEL TEQUIXTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN MIGUEL TULANCINGO') echo 'selected'; ?> value="SAN MIGUEL TULANCINGO">SAN MIGUEL TULANCINGO</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA NATIVITAS') echo 'selected'; ?> value="SANTA MARÍA NATIVITAS">SANTA MARÍA NATIVITAS</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO IHUITLÁN PLUMAS') echo 'selected'; ?> value="SANTIAGO IHUITLÁN PLUMAS">SANTIAGO IHUITLÁN PLUMAS</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO TEPETLAPA') echo 'selected'; ?> value="SANTIAGO TEPETLAPA">SANTIAGO TEPETLAPA</option>
        <option <?php if ($personal['Municipio'] == 'TEPELMEME VILLA DE MORELOS') echo 'selected'; ?> value="TEPELMEME VILLA DE MORELOS">TEPELMEME VILLA DE MORELOS</option>
        <option <?php if ($personal['Municipio'] == 'TLACOTEPEC PLUMAS') echo 'selected'; ?> value="TLACOTEPEC PLUMAS">TLACOTEPEC PLUMAS</option>
        <option <?php if ($personal['Municipio'] == 'ASUNCIÓN CUYOTEPEJI') echo 'selected'; ?> value="ASUNCIÓN CUYOTEPEJI">ASUNCIÓN CUYOTEPEJI</option>
        <option <?php if ($personal['Municipio'] == 'COSOLTEPEC') echo 'selected'; ?> value="COSOLTEPEC">COSOLTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'FRESNILLO DE TRUJANO') echo 'selected'; ?> value="FRESNILLO DE TRUJANO">FRESNILLO DE TRUJANO</option>
        <option <?php if ($personal['Municipio'] == 'HUAJUAPAM DE LEÓN') echo 'selected'; ?> value="HUAJUAPAM DE LEÓN">HUAJUAPAM DE LEÓN</option>
        <option <?php if ($personal['Municipio'] == 'MARISCALA DE JUÁREZ') echo 'selected'; ?> value="MARISCALA DE JUÁREZ">MARISCALA DE JUÁREZ</option>
        <option <?php if ($personal['Municipio'] == 'SAN ANDRÉS DINICUITI') echo 'selected'; ?> value="SAN ANDRÉS DINICUITI">SAN ANDRÉS DINICUITI</option>
        <option <?php if ($personal['Municipio'] == 'SAN JERÓNIMO SILACOYOAPILLA') echo 'selected'; ?> value="SAN JERÓNIMO SILACOYOAPILLA">SAN JERÓNIMO SILACOYOAPILLA</option>
        <option <?php if ($personal['Municipio'] == 'SAN JORGE NUCHITA') echo 'selected'; ?> value="SAN JORGE NUCHITA">SAN JORGE NUCHITA</option>
        <option <?php if ($personal['Municipio'] == 'SAN JOSÉ AYUQUILILLA') echo 'selected'; ?> value="SAN JOSÉ AYUQUILILLA">SAN JOSÉ AYUQUILILLA</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN BAUTISTA SUCHIXTEPEC') echo 'selected'; ?> value="SAN JUAN BAUTISTA SUCHIXTEPEC">SAN JUAN BAUTISTA SUCHIXTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN MARCOS ARTEAGA') echo 'selected'; ?> value="SAN MARCOS ARTEAGA">SAN MARCOS ARTEAGA</option>
        <option <?php if ($personal['Municipio'] == 'SAN MARTÍN ZACATEPEC') echo 'selected'; ?> value="SAN MARTÍN ZACATEPEC">SAN MARTÍN ZACATEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN MIGUEL AMATITLÁN') echo 'selected'; ?> value="SAN MIGUEL AMATITLÁN">SAN MIGUEL AMATITLÁN</option>
        <option <?php if ($personal['Municipio'] == 'SAN PEDRO Y SAN PABLO TEQUIXTEPEC') echo 'selected'; ?> value="SAN PEDRO Y SAN PABLO TEQUIXTEPEC">SAN PEDRO Y SAN PABLO TEQUIXTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN SIMÓN ZAHUATLÁN') echo 'selected'; ?> value="SAN SIMÓN ZAHUATLÁN">SAN SIMÓN ZAHUATLÁN</option>
        <option <?php if ($personal['Municipio'] == 'SANTA CATARINA ZAPOQUILLA') echo 'selected'; ?> value="SANTA CATARINA ZAPOQUILLA">SANTA CATARINA ZAPOQUILLA</option>
        <option <?php if ($personal['Municipio'] == 'SANTA CRUZ TACACHE DE MINA') echo 'selected'; ?> value="SANTA CRUZ TACACHE DE MINA">SANTA CRUZ TACACHE DE MINA</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA CAMOTLÁN') echo 'selected'; ?> value="SANTA MARÍA CAMOTLÁN">SANTA MARÍA CAMOTLÁN</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO AYUQUILLA') echo 'selected'; ?> value="SANTIAGO AYUQUILLA">SANTIAGO AYUQUILLA</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO CACALOXTEPEC') echo 'selected'; ?> value="SANTIAGO CACALOXTEPEC">SANTIAGO CACALOXTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO CHAZUMBA') echo 'selected'; ?> value="SANTIAGO CHAZUMBA">SANTIAGO CHAZUMBA</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO HUAJOLOTITLÁN') echo 'selected'; ?> value="SANTIAGO HUAJOLOTITLÁN">SANTIAGO HUAJOLOTITLÁN</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO MILTEPEC') echo 'selected'; ?> value="SANTIAGO MILTEPEC">SANTIAGO MILTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SANTO DOMINGO TONALÁ') echo 'selected'; ?> value="SANTO DOMINGO TONALÁ">SANTO DOMINGO TONALÁ</option>
        <option <?php if ($personal['Municipio'] == 'SANTO DOMINGO YODOHINO') echo 'selected'; ?> value="SANTO DOMINGO YODOHINO">SANTO DOMINGO YODOHINO</option>
        <option <?php if ($personal['Municipio'] == 'SANTOS REYES YUCUNA') echo 'selected'; ?> value="SANTOS REYES YUCUNA">SANTOS REYES YUCUNA</option>
        <option <?php if ($personal['Municipio'] == 'TEZOATLÁN DE SEGURA Y LUNA') echo 'selected'; ?> value="TEZOATLÁN DE SEGURA Y LUNA">TEZOATLÁN DE SEGURA Y LUNA</option>
        <option <?php if ($personal['Municipio'] == 'ZAPOTITLÁN PALMAS') echo 'selected'; ?> value="ZAPOTITLÁN PALMAS">ZAPOTITLÁN PALMAS</option>
        <option <?php if ($personal['Municipio'] == 'COICOYÁN DE LAS FLORES') echo 'selected'; ?> value="COICOYÁN DE LAS FLORES">COICOYÁN DE LAS FLORES</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN MIXTEPEC') echo 'selected'; ?> value="SAN JUAN MIXTEPEC">SAN JUAN MIXTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN MARTÍN PERAS') echo 'selected'; ?> value="SAN MARTÍN PERAS">SAN MARTÍN PERAS</option>
        <option <?php if ($personal['Municipio'] == 'SAN MIGUEL TLACOTEPEC') echo 'selected'; ?> value="SAN MIGUEL TLACOTEPEC">SAN MIGUEL TLACOTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN SEBASTIÁN TECOMAXTLAHUACA') echo 'selected'; ?> value="SAN SEBASTIÁN TECOMAXTLAHUACA">SAN SEBASTIÁN TECOMAXTLAHUACA</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO JUXTLAHUACA') echo 'selected'; ?> value="SANTIAGO JUXTLAHUACA">SANTIAGO JUXTLAHUACA</option>
        <option <?php if ($personal['Municipio'] == 'SANTOS REYES TEPEJILLO') echo 'selected'; ?> value="SANTOS REYES TEPEJILLO">SANTOS REYES TEPEJILLO</option>
        <option <?php if ($personal['Municipio'] == 'ASUNCIÓN NOCHIXTLÁN') echo 'selected'; ?> value="ASUNCIÓN NOCHIXTLÁN">ASUNCIÓN NOCHIXTLÁN</option>
        <option <?php if ($personal['Municipio'] == 'MAGDALENA JALTEPEC') echo 'selected'; ?> value="MAGDALENA JALTEPEC">MAGDALENA JALTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'MAGDALENA ZAHUATLÁN') echo 'selected'; ?> value="MAGDALENA ZAHUATLÁN">MAGDALENA ZAHUATLÁN</option>
        <option <?php if ($personal['Municipio'] == 'SAN ANDRÉS NUXIÑO') echo 'selected'; ?> value="SAN ANDRÉS NUXIÑO">SAN ANDRÉS NUXIÑO</option>
        <option <?php if ($personal['Municipio'] == 'SAN ANDRÉS SINAXTLA') echo 'selected'; ?> value="SAN ANDRÉS SINAXTLA">SAN ANDRÉS SINAXTLA</option>
        <option <?php if ($personal['Municipio'] == 'SAN FRANCISCO CHINDÚA') echo 'selected'; ?> value="SAN FRANCISCO CHINDÚA">SAN FRANCISCO CHINDÚA</option>
        <option <?php if ($personal['Municipio'] == 'SAN FRANCISCO JALTEPETONGO') echo 'selected'; ?> value="SAN FRANCISCO JALTEPETONGO">SAN FRANCISCO JALTEPETONGO</option>
        <option <?php if ($personal['Municipio'] == 'SAN FRANCISCO NUXAÑO') echo 'selected'; ?> value="SAN FRANCISCO NUXAÑO">SAN FRANCISCO NUXAÑO</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN DIUXI') echo 'selected'; ?> value="SAN JUAN DIUXI">SAN JUAN DIUXI</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN SAYULTEPEC') echo 'selected'; ?> value="SAN JUAN SAYULTEPEC">SAN JUAN SAYULTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN TAMAZOLA') echo 'selected'; ?> value="SAN JUAN TAMAZOLA">SAN JUAN TAMAZOLA</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN YUCUITA') echo 'selected'; ?> value="SAN JUAN YUCUITA">SAN JUAN YUCUITA</option>
        <option <?php if ($personal['Municipio'] == 'SAN MATEO ETLATONGO') echo 'selected'; ?> value="SAN MATEO ETLATONGO">SAN MATEO ETLATONGO</option>
        <option <?php if ($personal['Municipio'] == 'SAN MATEO SINDIHUI') echo 'selected'; ?> value="SAN MATEO SINDIHUI">SAN MATEO SINDIHUI</option>
        <option <?php if ($personal['Municipio'] == 'SAN MIGUEL CHICAHUA') echo 'selected'; ?> value="SAN MIGUEL CHICAHUA">SAN MIGUEL CHICAHUA</option>
        <option <?php if ($personal['Municipio'] == 'SAN MIGUEL HUATLA') echo 'selected'; ?> value="SAN MIGUEL HUATLA">SAN MIGUEL HUATLA</option>
        <option <?php if ($personal['Municipio'] == 'SAN MIGUEL PIEDRAS') echo 'selected'; ?> value="SAN MIGUEL PIEDRAS">SAN MIGUEL PIEDRAS</option>
        <option <?php if ($personal['Municipio'] == 'SAN MIGUEL TECOMATLÁN') echo 'selected'; ?> value="SAN MIGUEL TECOMATLÁN">SAN MIGUEL TECOMATLÁN</option>
        <option <?php if ($personal['Municipio'] == 'SAN PEDRO COXCALTEPEC CÁNTAROS') echo 'selected'; ?> value="SAN PEDRO COXCALTEPEC CÁNTAROS">SAN PEDRO COXCALTEPEC CÁNTAROS</option>
        <option <?php if ($personal['Municipio'] == 'SAN PEDRO TEOZACOALCO') echo 'selected'; ?> value="SAN PEDRO TEOZACOALCO">SAN PEDRO TEOZACOALCO</option>
        <option <?php if ($personal['Municipio'] == 'SAN PEDRO TIDAÁ') echo 'selected'; ?> value="SAN PEDRO TIDAÁ">SAN PEDRO TIDAÁ</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA APAZCO') echo 'selected'; ?> value="SANTA MARÍA APAZCO">SANTA MARÍA APAZCO</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA CHACHOAPAM') echo 'selected'; ?> value="SANTA MARÍA CHACHOAPAM">SANTA MARÍA CHACHOAPAM</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO APOALA') echo 'selected'; ?> value="SANTIAGO APOALA">SANTIAGO APOALA</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO HUAUCLILLA') echo 'selected'; ?> value="SANTIAGO HUAUCLILLA">SANTIAGO HUAUCLILLA</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO TILALTONGO') echo 'selected'; ?> value="SANTIAGO TILALTONGO">SANTIAGO TILALTONGO</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO TILLO') echo 'selected'; ?> value="SANTIAGO TILLO">SANTIAGO TILLO</option>
        <option <?php if ($personal['Municipio'] == 'SANTO DOMINGO NUXAÁ') echo 'selected'; ?> value="SANTO DOMINGO NUXAÁ">SANTO DOMINGO NUXAÁ</option>
        <option <?php if ($personal['Municipio'] == 'SANTO DOMINGO YANHUITLÁN') echo 'selected'; ?> value="SANTO DOMINGO YANHUITLÁN">SANTO DOMINGO YANHUITLÁN</option>
        <option <?php if ($personal['Municipio'] == 'MAGDALENA YODOCONO DE PORFIRIO DÍAZ') echo 'selected'; ?> value="MAGDALENA YODOCONO DE PORFIRIO DÍAZ">MAGDALENA YODOCONO DE PORFIRIO DÍAZ</option>
        <option <?php if ($personal['Municipio'] == 'YUTANDUCHI DE GUERRERO') echo 'selected'; ?> value="YUTANDUCHI DE GUERRERO">YUTANDUCHI DE GUERRERO</option>
        <option <?php if ($personal['Municipio'] == 'SANTA INÉS DE ZARAGOZA') echo 'selected'; ?> value="SANTA INÉS DE ZARAGOZA">SANTA INÉS DE ZARAGOZA</option>
        <option <?php if ($personal['Municipio'] == 'CALIHUALA') echo 'selected'; ?> value="CALIHUALA">CALIHUALA</option>
        <option <?php if ($personal['Municipio'] == 'GUADALUPE DE RAMÍREZ') echo 'selected'; ?> value="GUADALUPE DE RAMÍREZ">GUADALUPE DE RAMÍREZ</option>
        <option <?php if ($personal['Municipio'] == 'IXPANTEPEC NIEVES') echo 'selected'; ?> value="IXPANTEPEC NIEVES">IXPANTEPEC NIEVES</option>
        <option <?php if ($personal['Municipio'] == 'SAN AGUSTÍN ATENANGO') echo 'selected'; ?> value="SAN AGUSTÍN ATENANGO">SAN AGUSTÍN ATENANGO</option>
        <option <?php if ($personal['Municipio'] == 'SAN ANDRÉS TEPETLAPA') echo 'selected'; ?> value="SAN ANDRÉS TEPETLAPA">SAN ANDRÉS TEPETLAPA</option>
        <option <?php if ($personal['Municipio'] == 'SAN FRANCISCO TLAPANCINGO') echo 'selected'; ?> value="SAN FRANCISCO TLAPANCINGO">SAN FRANCISCO TLAPANCINGO</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN BAUTISTA TLACHICHILCO') echo 'selected'; ?> value="SAN JUAN BAUTISTA TLACHICHILCO">SAN JUAN BAUTISTA TLACHICHILCO</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN CIENEGUILLA') echo 'selected'; ?> value="SAN JUAN CIENEGUILLA">SAN JUAN CIENEGUILLA</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN IHUALTEPEC') echo 'selected'; ?> value="SAN JUAN IHUALTEPEC">SAN JUAN IHUALTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN LORENZO VICTORIA') echo 'selected'; ?> value="SAN LORENZO VICTORIA">SAN LORENZO VICTORIA</option>
        <option <?php if ($personal['Municipio'] == 'SAN MATEO NEJAPAM') echo 'selected'; ?> value="SAN MATEO NEJAPAM">SAN MATEO NEJAPAM</option>
        <option <?php if ($personal['Municipio'] == 'SAN MIGUEL AHUEHUETITLAN') echo 'selected'; ?> value="SAN MIGUEL AHUEHUETITLAN">SAN MIGUEL AHUEHUETITLAN</option>
        <option <?php if ($personal['Municipio'] == 'SAN NICOLÁS HIDALGO') echo 'selected'; ?> value="SAN NICOLÁS HIDALGO">SAN NICOLÁS HIDALGO</option>
        <option <?php if ($personal['Municipio'] == 'SANTA CRUZ DE BRAVO') echo 'selected'; ?> value="SANTA CRUZ DE BRAVO">SANTA CRUZ DE BRAVO</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO DEL RÍO') echo 'selected'; ?> value="SANTIAGO DEL RÍO">SANTIAGO DEL RÍO</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO TAMAZOLA') echo 'selected'; ?> value="SANTIAGO TAMAZOLA">SANTIAGO TAMAZOLA</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO YUCUYACHI') echo 'selected'; ?> value="SANTIAGO YUCUYACHI">SANTIAGO YUCUYACHI</option>
        <option <?php if ($personal['Municipio'] == 'SILACAYOAPAM') echo 'selected'; ?> value="SILACAYOAPAM">SILACAYOAPAM</option>
        <option <?php if ($personal['Municipio'] == 'ZAPOTITLAN LAGUNAS') echo 'selected'; ?> value="ZAPOTITLAN LAGUNAS">ZAPOTITLAN LAGUNAS</option>
        <option <?php if ($personal['Municipio'] == 'SAN ANDRÉS LAGUNAS') echo 'selected'; ?> value="SAN ANDRÉS LAGUNAS">SAN ANDRÉS LAGUNAS</option>
        <option <?php if ($personal['Municipio'] == 'SAN ANTONIO MONTE VERDE') echo 'selected'; ?> value="SAN ANTONIO MONTE VERDE">SAN ANTONIO MONTE VERDE</option>
        <option <?php if ($personal['Municipio'] == 'SAN ANTONIO ACUTLA') echo 'selected'; ?> value="SAN ANTONIO ACUTLA">SAN ANTONIO ACUTLA</option>
        <option <?php if ($personal['Municipio'] == 'SAN BARTOLO SOYALTEPEC') echo 'selected'; ?> value="SAN BARTOLO SOYALTEPEC">SAN BARTOLO SOYALTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN TEPOSCOLULA') echo 'selected'; ?> value="SAN JUAN TEPOSCOLULA">SAN JUAN TEPOSCOLULA</option>
        <option <?php if ($personal['Municipio'] == 'SAN PEDRO NOPALA') echo 'selected'; ?> value="SAN PEDRO NOPALA">SAN PEDRO NOPALA</option>
        <option <?php if ($personal['Municipio'] == 'SAN PEDRO TOPILTEPEC') echo 'selected'; ?> value="SAN PEDRO TOPILTEPEC">SAN PEDRO TOPILTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN PEDRO Y SAN PABLO TEPOSCOLULA') echo 'selected'; ?> value="SAN PEDRO Y SAN PABLO TEPOSCOLULA">SAN PEDRO Y SAN PABLO TEPOSCOLULA</option>
        <option <?php if ($personal['Municipio'] == 'SAN PEDRO YUCUNAMA') echo 'selected'; ?> value="SAN PEDRO YUCUNAMA">SAN PEDRO YUCUNAMA</option>
        <option <?php if ($personal['Municipio'] == 'SAN SEBASTIÁN NICANANDUTA') echo 'selected'; ?> value="SAN SEBASTIÁN NICANANDUTA">SAN SEBASTIÁN NICANANDUTA</option>
        <option <?php if ($personal['Municipio'] == 'VILLA CHILAPA DE DÍAZ') echo 'selected'; ?> value="VILLA CHILAPA DE DÍAZ">VILLA CHILAPA DE DÍAZ</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA NDUAYACO') echo 'selected'; ?> value="SANTA MARÍA NDUAYACO">SANTA MARÍA NDUAYACO</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO NEJAPILLA') echo 'selected'; ?> value="SANTIAGO NEJAPILLA">SANTIAGO NEJAPILLA</option>
        <option <?php if ($personal['Municipio'] == 'VILLA TEJUPAM DE LA UNIÓN') echo 'selected'; ?> value="VILLA TEJUPAM DE LA UNIÓN">VILLA TEJUPAM DE LA UNIÓN</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO YOLOMÉCATL') echo 'selected'; ?> value="SANTIAGO YOLOMÉCATL">SANTIAGO YOLOMÉCATL</option>
        <option <?php if ($personal['Municipio'] == 'SANTO DOMINGO TLATAYAPAM') echo 'selected'; ?> value="SANTO DOMINGO TLATAYAPAM">SANTO DOMINGO TLATAYAPAM</option>
        <option <?php if ($personal['Municipio'] == 'SANTO DOMINGO TONALTEPEC') echo 'selected'; ?> value="SANTO DOMINGO TONALTEPEC">SANTO DOMINGO TONALTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN VICENTE NUYU') echo 'selected'; ?> value="SAN VICENTE NUYU">SAN VICENTE NUYU</option>
        <option <?php if ($personal['Municipio'] == 'VILLA DE TAMAZULAPAM DEL PROGRESO') echo 'selected'; ?> value="VILLA DE TAMAZULAPAM DEL PROGRESO">VILLA DE TAMAZULAPAM DEL PROGRESO</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO TEOTONGO') echo 'selected'; ?> value="SANTIAGO TEOTONGO">SANTIAGO TEOTONGO</option>
        <option <?php if ($personal['Municipio'] == 'LA TRINIDAD VISTA HERMOSA') echo 'selected'; ?> value="LA TRINIDAD VISTA HERMOSA">LA TRINIDAD VISTA HERMOSA</option>
        <option <?php if ($personal['Municipio'] == 'CHALCATONGO DE HIDALGO') echo 'selected'; ?> value="CHALCATONGO DE HIDALGO">CHALCATONGO DE HIDALGO</option>
        <option <?php if ($personal['Municipio'] == 'MAGDALENA PEÑASCO') echo 'selected'; ?> value="MAGDALENA PEÑASCO">MAGDALENA PEÑASCO</option>
        <option <?php if ($personal['Municipio'] == 'SAN AGUSTÍN TLACOTEPEC') echo 'selected'; ?> value="SAN AGUSTÍN TLACOTEPEC">SAN AGUSTÍN TLACOTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN ANTONIO SINACAHUA') echo 'selected'; ?> value="SAN ANTONIO SINACAHUA">SAN ANTONIO SINACAHUA</option>
        <option <?php if ($personal['Municipio'] == 'SAN BARTOLOMÉ YUCUAÑE') echo 'selected'; ?> value="SAN BARTOLOMÉ YUCUAÑE">SAN BARTOLOMÉ YUCUAÑE</option>
        <option <?php if ($personal['Municipio'] == 'SAN CRISTÓBAL AMOLTEPEC') echo 'selected'; ?> value="SAN CRISTÓBAL AMOLTEPEC">SAN CRISTÓBAL AMOLTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN ESTEBAN ATATLAHUACA') echo 'selected'; ?> value="SAN ESTEBAN ATATLAHUACA">SAN ESTEBAN ATATLAHUACA</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN ACHIUTLA') echo 'selected'; ?> value="SAN JUAN ACHIUTLA">SAN JUAN ACHIUTLA</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN ÑUMI') echo 'selected'; ?> value="SAN JUAN ÑUMI">SAN JUAN ÑUMI</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN TEITA') echo 'selected'; ?> value="SAN JUAN TEITA">SAN JUAN TEITA</option>
        <option <?php if ($personal['Municipio'] == 'SAN MARTÍN HUAMELULPAM') echo 'selected'; ?> value="SAN MARTÍN HUAMELULPAM">SAN MARTÍN HUAMELULPAM</option>
        <option <?php if ($personal['Municipio'] == 'SAN MARTÍN ITUNYOSO') echo 'selected'; ?> value="SAN MARTÍN ITUNYOSO">SAN MARTÍN ITUNYOSO</option>
        <option <?php if ($personal['Municipio'] == 'SAN MATEO PEÑASCO') echo 'selected'; ?> value="SAN MATEO PEÑASCO">SAN MATEO PEÑASCO</option>
        <option <?php if ($personal['Municipio'] == 'SAN MIGUEL ACHIUTLA') echo 'selected'; ?> value="SAN MIGUEL ACHIUTLA">SAN MIGUEL ACHIUTLA</option>
        <option <?php if ($personal['Municipio'] == 'SAN MIGUEL EL GRANDE') echo 'selected'; ?> value="SAN MIGUEL EL GRANDE">SAN MIGUEL EL GRANDE</option>
        <option <?php if ($personal['Municipio'] == 'SAN PABLO TIJALTEPEC') echo 'selected'; ?> value="SAN PABLO TIJALTEPEC">SAN PABLO TIJALTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN PEDRO MARTIR YUCOXACO') echo 'selected'; ?> value="SAN PEDRO MARTIR YUCOXACO">SAN PEDRO MARTIR YUCOXACO</option>
        <option <?php if ($personal['Municipio'] == 'SAN PEDRO MOLINOS') echo 'selected'; ?> value="SAN PEDRO MOLINOS">SAN PEDRO MOLINOS</option>
        <option <?php if ($personal['Municipio'] == 'SANTA CATARINA TAYATA') echo 'selected'; ?> value="SANTA CATARINA TAYATA">SANTA CATARINA TAYATA</option>
        <option <?php if ($personal['Municipio'] == 'SANTA CATARINA TICUA') echo 'selected'; ?> value="SANTA CATARINA TICUA">SANTA CATARINA TICUA</option>
        <option <?php if ($personal['Municipio'] == 'SANTA CATARINA YOSONOTU') echo 'selected'; ?> value="SANTA CATARINA YOSONOTU">SANTA CATARINA YOSONOTU</option>
        <option <?php if ($personal['Municipio'] == 'SANTA CRUZ NUNDACO') echo 'selected'; ?> value="SANTA CRUZ NUNDACO">SANTA CRUZ NUNDACO</option>
        <option <?php if ($personal['Municipio'] == 'SANTA CRUZ TACAHUA') echo 'selected'; ?> value="SANTA CRUZ TACAHUA">SANTA CRUZ TACAHUA</option>
        <option <?php if ($personal['Municipio'] == 'SANTA CRUZ TAYATA') echo 'selected'; ?> value="SANTA CRUZ TAYATA">SANTA CRUZ TAYATA</option>
        <option <?php if ($personal['Municipio'] == 'HEROICA CIUDAD DE TLAXIACO') echo 'selected'; ?> value="HEROICA CIUDAD DE TLAXIACO">HEROICA CIUDAD DE TLAXIACO</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA DEL ROSARIO') echo 'selected'; ?> value="SANTA MARÍA DEL ROSARIO">SANTA MARÍA DEL ROSARIO</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA TATALTEPEC') echo 'selected'; ?> value="SANTA MARÍA TATALTEPEC">SANTA MARÍA TATALTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA YOLOTEPEC') echo 'selected'; ?> value="SANTA MARÍA YOLOTEPEC">SANTA MARÍA YOLOTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA YOSOYUA') echo 'selected'; ?> value="SANTA MARÍA YOSOYUA">SANTA MARÍA YOSOYUA</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA YUCUITI') echo 'selected'; ?> value="SANTA MARÍA YUCUITI">SANTA MARÍA YUCUITI</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO NUNDICHI') echo 'selected'; ?> value="SANTIAGO NUNDICHI">SANTIAGO NUNDICHI</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO NOYOO') echo 'selected'; ?> value="SANTIAGO NOYOO">SANTIAGO NOYOO</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO YOSONDUA') echo 'selected'; ?> value="SANTIAGO YOSONDUA">SANTIAGO YOSONDUA</option>
        <option <?php if ($personal['Municipio'] == 'SANTO DOMINGO IXCATLAN') echo 'selected'; ?> value="SANTO DOMINGO IXCATLAN">SANTO DOMINGO IXCATLAN</option>
        <option <?php if ($personal['Municipio'] == 'SANTO TOMÁS OCOTEPEC') echo 'selected'; ?> value="SANTO TOMÁS OCOTEPEC">SANTO TOMÁS OCOTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN COMALTEPEC') echo 'selected'; ?> value="SAN JUAN COMALTEPEC">SAN JUAN COMALTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN LALANA') echo 'selected'; ?> value="SAN JUAN LALANA">SAN JUAN LALANA</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN PETLAPA') echo 'selected'; ?> value="SAN JUAN PETLAPA">SAN JUAN PETLAPA</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO CHOAPAM') echo 'selected'; ?> value="SANTIAGO CHOAPAM">SANTIAGO CHOAPAM</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO JOCOTEPEC') echo 'selected'; ?> value="SANTIAGO JOCOTEPEC">SANTIAGO JOCOTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO YAVEO') echo 'selected'; ?> value="SANTIAGO YAVEO">SANTIAGO YAVEO</option>
        <option <?php if ($personal['Municipio'] == 'ACATLÁN DE PÉREZ FIGUEROA') echo 'selected'; ?> value="ACATLÁN DE PÉREZ FIGUEROA">ACATLÁN DE PÉREZ FIGUEROA</option>
        <option <?php if ($personal['Municipio'] == 'AYOTZINTEPEC') echo 'selected'; ?> value="AYOTZINTEPEC">AYOTZINTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'COSOAPA') echo 'selected'; ?> value="COSOAPA">COSOAPA</option>
        <option <?php if ($personal['Municipio'] == 'LOMA BONITA') echo 'selected'; ?> value="LOMA BONITA">LOMA BONITA</option>
        <option <?php if ($personal['Municipio'] == 'SAN FELIPE JALAPA DE DÍAZ') echo 'selected'; ?> value="SAN FELIPE JALAPA DE DÍAZ">SAN FELIPE JALAPA DE DÍAZ</option>
        <option <?php if ($personal['Municipio'] == 'SAN FELIPE USILA') echo 'selected'; ?> value="SAN FELIPE USILA">SAN FELIPE USILA</option>
        <option <?php if ($personal['Municipio'] == 'SAN JOSÉ CHILTEPEC') echo 'selected'; ?> value="SAN JOSÉ CHILTEPEC">SAN JOSÉ CHILTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN JOSÉ INDEPENDENCIA') echo 'selected'; ?> value="SAN JOSÉ INDEPENDENCIA">SAN JOSÉ INDEPENDENCIA</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN BAUTISTA TUXTEPEC') echo 'selected'; ?> value="SAN JUAN BAUTISTA TUXTEPEC">SAN JUAN BAUTISTA TUXTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN LUCAS OJITLÁN') echo 'selected'; ?> value="SAN LUCAS OJITLÁN">SAN LUCAS OJITLÁN</option>
        <option <?php if ($personal['Municipio'] == 'SAN MIGUEL SOYALTEPEC') echo 'selected'; ?> value="SAN MIGUEL SOYALTEPEC">SAN MIGUEL SOYALTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN PEDRO IXCATLÁN') echo 'selected'; ?> value="SAN PEDRO IXCATLÁN">SAN PEDRO IXCATLÁN</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MRÍA JACATEPEC') echo 'selected'; ?> value="SANTA MRÍA JACATEPEC">SANTA MRÍA JACATEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN BAUTISTA VALLE NACIONAL') echo 'selected'; ?> value="SAN JUAN BAUTISTA VALLE NACIONAL">SAN JUAN BAUTISTA VALLE NACIONAL</option>
        <option <?php if ($personal['Municipio'] == 'ABEJONES') echo 'selected'; ?> value="ABEJONES">ABEJONES</option>
        <option <?php if ($personal['Municipio'] == 'GUELATAO DE JUÁREZ') echo 'selected'; ?> value="GUELATAO DE JUÁREZ">GUELATAO DE JUÁREZ</option>
        <option <?php if ($personal['Municipio'] == 'IXTLÁN DE JUÁREZ') echo 'selected'; ?> value="IXTLÁN DE JUÁREZ">IXTLÁN DE JUÁREZ</option>
        <option <?php if ($personal['Municipio'] == 'NATIVIDAD') echo 'selected'; ?> value="NATIVIDAD">NATIVIDAD</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN ATEPEC') echo 'selected'; ?> value="SAN JUAN ATEPEC">SAN JUAN ATEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN CHICOMEZÚCHIL') echo 'selected'; ?> value="SAN JUAN CHICOMEZÚCHIL">SAN JUAN CHICOMEZÚCHIL</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN EVANGELISTA ANALCO') echo 'selected'; ?> value="SAN JUAN EVANGELISTA ANALCO">SAN JUAN EVANGELISTA ANALCO</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN QUIOTEPEC') echo 'selected'; ?> value="SAN JUAN QUIOTEPEC">SAN JUAN QUIOTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'CAPULALPAM DE MÉNDEZ') echo 'selected'; ?> value="CAPULALPAM DE MÉNDEZ">CAPULALPAM DE MÉNDEZ</option>
        <option <?php if ($personal['Municipio'] == 'SAN MIGUEL ALOÁPAM') echo 'selected'; ?> value="SAN MIGUEL ALOÁPAM">SAN MIGUEL ALOÁPAM</option>
        <option <?php if ($personal['Municipio'] == 'SAN MIGUEL AMATLÁN') echo 'selected'; ?> value="SAN MIGUEL AMATLÁN">SAN MIGUEL AMATLÁN</option>
        <option <?php if ($personal['Municipio'] == 'SAN MIGUEL DEL RÍO') echo 'selected'; ?> value="SAN MIGUEL DEL RÍO">SAN MIGUEL DEL RÍO</option>
        <option <?php if ($personal['Municipio'] == 'SAN MIGUEL YOTAO') echo 'selected'; ?> value="SAN MIGUEL YOTAO">SAN MIGUEL YOTAO</option>
        <option <?php if ($personal['Municipio'] == 'SAN PABLO MACUILTIANGUIS') echo 'selected'; ?> value="SAN PABLO MACUILTIANGUIS">SAN PABLO MACUILTIANGUIS</option>
        <option <?php if ($personal['Municipio'] == 'SAN PEDRO YANERI') echo 'selected'; ?> value="SAN PEDRO YANERI">SAN PEDRO YANERI</option>
        <option <?php if ($personal['Municipio'] == 'SAN PEDRO YOLOX') echo 'selected'; ?> value="SAN PEDRO YOLOX">SAN PEDRO YOLOX</option>
        <option <?php if ($personal['Municipio'] == 'SANTA ANA YANERI') echo 'selected'; ?> value="SANTA ANA YANERI">SANTA ANA YANERI</option>
        <option <?php if ($personal['Municipio'] == 'SANTA CATARINA IXTEPEJI') echo 'selected'; ?> value="SANTA CATARINA IXTEPEJI">SANTA CATARINA IXTEPEJI</option>
        <option <?php if ($personal['Municipio'] == 'SANTA CATARINA LACHATAO') echo 'selected'; ?> value="SANTA CATARINA LACHATAO">SANTA CATARINA LACHATAO</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA JALTIANGUIS') echo 'selected'; ?> value="SANTA MARÍA JALTIANGUIS">SANTA MARÍA JALTIANGUIS</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA YAVESÍA') echo 'selected'; ?> value="SANTA MARÍA YAVESÍA">SANTA MARÍA YAVESÍA</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO COMALTEPEC') echo 'selected'; ?> value="SANTIAGO COMALTEPEC">SANTIAGO COMALTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO LAXOPA') echo 'selected'; ?> value="SANTIAGO LAXOPA">SANTIAGO LAXOPA</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO XIACUÍ') echo 'selected'; ?> value="SANTIAGO XIACUÍ">SANTIAGO XIACUÍ</option>
        <option <?php if ($personal['Municipio'] == 'NUEVO ZOQUIAPAM') echo 'selected'; ?> value="NUEVO ZOQUIAPAM">NUEVO ZOQUIAPAM</option>
        <option <?php if ($personal['Municipio'] == 'TEOCOCUILCO DE MARCOS PÉREZ') echo 'selected'; ?> value="TEOCOCUILCO DE MARCOS PÉREZ">TEOCOCUILCO DE MARCOS PÉREZ</option>
        <option <?php if ($personal['Municipio'] == 'ASUNCIÓN CACALOTEPEC') echo 'selected'; ?> value="ASUNCIÓN CACALOTEPEC">ASUNCIÓN CACALOTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'TAMAZALUPAM DEL ESPÍRITU SANTO') echo 'selected'; ?> value="TAMAZALUPAM DEL ESPÍRITU SANTO">TAMAZALUPAM DEL ESPÍRITU SANTO</option>
        <option <?php if ($personal['Municipio'] == 'MIXISTLÁN DE LA REFORMA') echo 'selected'; ?> value="MIXISTLÁN DE LA REFORMA">MIXISTLÁN DE LA REFORMA</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN COTZOCON') echo 'selected'; ?> value="SAN JUAN COTZOCON">SAN JUAN COTZOCON</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN MAZATLÁN') echo 'selected'; ?> value="SAN JUAN MAZATLÁN">SAN JUAN MAZATLÁN</option>
        <option <?php if ($personal['Municipio'] == 'SAN LUCAS CAMOTLÁN') echo 'selected'; ?> value="SAN LUCAS CAMOTLÁN">SAN LUCAS CAMOTLÁN</option>
        <option <?php if ($personal['Municipio'] == 'SAN MIGUEL QUETZALTEPEC') echo 'selected'; ?> value="SAN MIGUEL QUETZALTEPEC">SAN MIGUEL QUETZALTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN PEDRO OCOTEPEC') echo 'selected'; ?> value="SAN PEDRO OCOTEPEC">SAN PEDRO OCOTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN PEDRO Y SAN PABLO AYUTLA') echo 'selected'; ?> value="SAN PEDRO Y SAN PABLO AYUTLA">SAN PEDRO Y SAN PABLO AYUTLA</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA ALOTEPEC') echo 'selected'; ?> value="SANTA MARÍA ALOTEPEC">SANTA MARÍA ALOTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA TEPANTLALI') echo 'selected'; ?> value="SANTA MARÍA TEPANTLALI">SANTA MARÍA TEPANTLALI</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA TLAHUILTOLTEPEC') echo 'selected'; ?> value="SANTA MARÍA TLAHUILTOLTEPEC">SANTA MARÍA TLAHUILTOLTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO ATITLÁN') echo 'selected'; ?> value="SANTIAGO ATITLÁN">SANTIAGO ATITLÁN</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO IXCUINTEPEC') echo 'selected'; ?> value="SANTIAGO IXCUINTEPEC">SANTIAGO IXCUINTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO ZACATEPEC') echo 'selected'; ?> value="SANTIAGO ZACATEPEC">SANTIAGO ZACATEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SANTO DOMINGO TEPUXTEPEC') echo 'selected'; ?> value="SANTO DOMINGO TEPUXTEPEC">SANTO DOMINGO TEPUXTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'TOTONTEPEC VILLA DE MORELOS') echo 'selected'; ?> value="TOTONTEPEC VILLA DE MORELOS">TOTONTEPEC VILLA DE MORELOS</option>
        <option <?php if ($personal['Municipio'] == 'VILLA HIDALGO') echo 'selected'; ?> value="VILLA HIDALGO">VILLA HIDALGO</option>
        <option <?php if ($personal['Municipio'] == 'SAN ANDRÉS SOLAGA') echo 'selected'; ?> value="SAN ANDRÉS SOLAGA">SAN ANDRÉS SOLAGA</option>
        <option <?php if ($personal['Municipio'] == 'SAN ANDRÉS YAA') echo 'selected'; ?> value="SAN ANDRÉS YAA">SAN ANDRÉS YAA</option>
        <option <?php if ($personal['Municipio'] == 'SAN BALTAZAR YATZACHI EL BAJO') echo 'selected'; ?> value="SAN BALTAZAR YATZACHI EL BAJO">SAN BALTAZAR YATZACHI EL BAJO</option>
        <option <?php if ($personal['Municipio'] == 'SAN BARTOLOMÉ ZOOGOCHO') echo 'selected'; ?> value="SAN BARTOLOMÉ ZOOGOCHO">SAN BARTOLOMÉ ZOOGOCHO</option>
        <option <?php if ($personal['Municipio'] == 'SAN CRISTÓBAL LACHIRIOAG') echo 'selected'; ?> value="SAN CRISTÓBAL LACHIRIOAG">SAN CRISTÓBAL LACHIRIOAG</option>
        <option <?php if ($personal['Municipio'] == 'SAN FRANCISCO CAJONOS') echo 'selected'; ?> value="SAN FRANCISCO CAJONOS">SAN FRANCISCO CAJONOS</option>
        <option <?php if ($personal['Municipio'] == 'SAN ILDEFONSO VILLA ALTA') echo 'selected'; ?> value="SAN ILDEFONSO VILLA ALTA">SAN ILDEFONSO VILLA ALTA</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN JUQUILA VIJANOS') echo 'selected'; ?> value="SAN JUAN JUQUILA VIJANOS">SAN JUAN JUQUILA VIJANOS</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN TABAA') echo 'selected'; ?> value="SAN JUAN TABAA">SAN JUAN TABAA</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN YAEE') echo 'selected'; ?> value="SAN JUAN YAEE">SAN JUAN YAEE</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN YATZONA') echo 'selected'; ?> value="SAN JUAN YATZONA">SAN JUAN YATZONA</option>
        <option <?php if ($personal['Municipio'] == 'SAN MATEO CAJONOS') echo 'selected'; ?> value="SAN MATEO CAJONOS">SAN MATEO CAJONOS</option>
        <option <?php if ($personal['Municipio'] == 'SAN MELCHOR BETAZA') echo 'selected'; ?> value="SAN MELCHOR BETAZA">SAN MELCHOR BETAZA</option>
        <option <?php if ($personal['Municipio'] == 'VILLA TALEA DE CASTRO') echo 'selected'; ?> value="VILLA TALEA DE CASTRO">VILLA TALEA DE CASTRO</option>
        <option <?php if ($personal['Municipio'] == 'SAN PABLO YAGANIZA') echo 'selected'; ?> value="SAN PABLO YAGANIZA">SAN PABLO YAGANIZA</option>
        <option <?php if ($personal['Municipio'] == 'SAN PEDRO CAJONOS') echo 'selected'; ?> value="SAN PEDRO CAJONOS">SAN PEDRO CAJONOS</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA TEMAXCALAPA') echo 'selected'; ?> value="SANTA MARÍA TEMAXCALAPA">SANTA MARÍA TEMAXCALAPA</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA YALINA') echo 'selected'; ?> value="SANTA MARÍA YALINA">SANTA MARÍA YALINA</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO CAMOTLÁN') echo 'selected'; ?> value="SANTIAGO CAMOTLÁN">SANTIAGO CAMOTLÁN</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO LALOPA') echo 'selected'; ?> value="SANTIAGO LALOPA">SANTIAGO LALOPA</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO ZOOCHILA') echo 'selected'; ?> value="SANTIAGO ZOOCHILA">SANTIAGO ZOOCHILA</option>
        <option <?php if ($personal['Municipio'] == 'SANTO DOMINGO ROAYAGA') echo 'selected'; ?> value="SANTO DOMINGO ROAYAGA">SANTO DOMINGO ROAYAGA</option>
        <option <?php if ($personal['Municipio'] == 'SANTO DOMINGO XAGACIA') echo 'selected'; ?> value="SANTO DOMINGO XAGACIA">SANTO DOMINGO XAGACIA</option>
        <option <?php if ($personal['Municipio'] == 'TANETZE DE ZARAGOZA') echo 'selected'; ?> value="TANETZE DE ZARAGOZA">TANETZE DE ZARAGOZA</option>
        <option <?php if ($personal['Municipio'] == 'MIAHUATLAN DE PORFIRIO DÍAZ') echo 'selected'; ?> value="MIAHUATLAN DE PORFIRIO DÍAZ">MIAHUATLAN DE PORFIRIO DÍAZ</option>
        <option <?php if ($personal['Municipio'] == 'MONJAS') echo 'selected'; ?> value="MONJAS">MONJAS</option>
        <option <?php if ($personal['Municipio'] == 'SAN ANDRÉS PAXTLAN') echo 'selected'; ?> value="SAN ANDRÉS PAXTLAN">SAN ANDRÉS PAXTLAN</option>
        <option <?php if ($personal['Municipio'] == 'SAN CRISTÓBAL AMATLAN') echo 'selected'; ?> value="SAN CRISTÓBAL AMATLAN">SAN CRISTÓBAL AMATLAN</option>
        <option <?php if ($personal['Municipio'] == 'SAN FRANCISCO LOGUECHE') echo 'selected'; ?> value="SAN FRANCISCO LOGUECHE">SAN FRANCISCO LOGUECHE</option>
        <option <?php if ($personal['Municipio'] == 'SAN FRANCISCO OZOLOTEPEC') echo 'selected'; ?> value="SAN FRANCISCO OZOLOTEPEC">SAN FRANCISCO OZOLOTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN ILDENFONSO AMATLAN') echo 'selected'; ?> value="SAN ILDENFONSO AMATLAN">SAN ILDENFONSO AMATLAN</option>
        <option <?php if ($personal['Municipio'] == 'SAN JERÓNIMO COATLAN') echo 'selected'; ?> value="SAN JERÓNIMO COATLAN">SAN JERÓNIMO COATLAN</option>
        <option <?php if ($personal['Municipio'] == 'SAN JOSÉ DEL PEÑASCO') echo 'selected'; ?> value="SAN JOSÉ DEL PEÑASCO">SAN JOSÉ DEL PEÑASCO</option>
        <option <?php if ($personal['Municipio'] == 'SAN JOSE LACHIGUIRI') echo 'selected'; ?> value="SAN JOSE LACHIGUIRI">SAN JOSE LACHIGUIRI</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN MIXTEPEC') echo 'selected'; ?> value="SAN JUAN MIXTEPEC">SAN JUAN MIXTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN OZOLOTEPEC') echo 'selected'; ?> value="SAN JUAN OZOLOTEPEC">SAN JUAN OZOLOTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN LUIS AMATLAN') echo 'selected'; ?> value="SAN LUIS AMATLAN">SAN LUIS AMATLAN</option>
        <option <?php if ($personal['Municipio'] == 'SAN MARCIAL OZOLOTEPEC') echo 'selected'; ?> value="SAN MARCIAL OZOLOTEPEC">SAN MARCIAL OZOLOTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN MATEO RIO HONDO') echo 'selected'; ?> value="SAN MATEO RIO HONDO">SAN MATEO RIO HONDO</option>
        <option <?php if ($personal['Municipio'] == 'SAN MIGUEL COATLAN') echo 'selected'; ?> value="SAN MIGUEL COATLAN">SAN MIGUEL COATLAN</option>
        <option <?php if ($personal['Municipio'] == 'SAN MIGUEL SUCHIXTEPEC') echo 'selected'; ?> value="SAN MIGUEL SUCHIXTEPEC">SAN MIGUEL SUCHIXTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN NICOLÁS') echo 'selected'; ?> value="SAN NICOLÁS">SAN NICOLÁS</option>
        <option <?php if ($personal['Municipio'] == 'SAN PABLO COATLAN') echo 'selected'; ?> value="SAN PABLO COATLAN">SAN PABLO COATLAN</option>
        <option <?php if ($personal['Municipio'] == 'SAN PEDRO MIXTEPEC') echo 'selected'; ?> value="SAN PEDRO MIXTEPEC">SAN PEDRO MIXTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN SEBASTIÁN COATLAN') echo 'selected'; ?> value="SAN SEBASTIÁN COATLAN">SAN SEBASTIÁN COATLAN</option>
        <option <?php if ($personal['Municipio'] == 'SAN SEBASTIÁN RÍO HONDO') echo 'selected'; ?> value="SAN SEBASTIÁN RÍO HONDO">SAN SEBASTIÁN RÍO HONDO</option>
        <option <?php if ($personal['Municipio'] == 'SAN SIMÓN ALMOLONGAS') echo 'selected'; ?> value="SAN SIMÓN ALMOLONGAS">SAN SIMÓN ALMOLONGAS</option>
        <option <?php if ($personal['Municipio'] == 'SANTA ANA MIAHUATLAN') echo 'selected'; ?> value="SANTA ANA MIAHUATLAN">SANTA ANA MIAHUATLAN</option>
        <option <?php if ($personal['Municipio'] == 'SANTA CATARINA CUIXTL') echo 'selected'; ?> value="SANTA CATARINA CUIXTL">SANTA CATARINA CUIXTL</option>
        <option <?php if ($personal['Municipio'] == 'SANTA CRUZ XITLA') echo 'selected'; ?> value="SANTA CRUZ XITLA">SANTA CRUZ XITLA</option>
        <option <?php if ($personal['Municipio'] == 'SANTA LUCÍA MIAHUATLAN') echo 'selected'; ?> value="SANTA LUCÍA MIAHUATLAN">SANTA LUCÍA MIAHUATLAN</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA OZOLOTEPEC') echo 'selected'; ?> value="SANTA MARÍA OZOLOTEPEC">SANTA MARÍA OZOLOTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO XANICA') echo 'selected'; ?> value="SANTIAGO XANICA">SANTIAGO XANICA</option>
        <option <?php if ($personal['Municipio'] == 'SANTO DOMINGO OZOLOTEPEC') echo 'selected'; ?> value="SANTO DOMINGO OZOLOTEPEC">SANTO DOMINGO OZOLOTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SANTO TOMÁS TAMAZULAPAM') echo 'selected'; ?> value="SANTO TOMÁS TAMAZULAPAM">SANTO TOMÁS TAMAZULAPAM</option>
        <option <?php if ($personal['Municipio'] == 'SITIO DE XITLAPEHUA') echo 'selected'; ?> value="SITIO DE XITLAPEHUA">SITIO DE XITLAPEHUA</option>
        <option <?php if ($personal['Municipio'] == 'CONSTANCIA DEL ROSARIO') echo 'selected'; ?> value="CONSTANCIA DEL ROSARIO">CONSTANCIA DEL ROSARIO</option>
        <option <?php if ($personal['Municipio'] == 'MESONES HIDALGO') echo 'selected'; ?> value="MESONES HIDALGO">MESONES HIDALGO</option>
        <option <?php if ($personal['Municipio'] == 'PUTLA VILLA DE GUERRERO') echo 'selected'; ?> value="PUTLA VILLA DE GUERRERO">PUTLA VILLA DE GUERRERO</option>
        <option <?php if ($personal['Municipio'] == 'LA REFORMA') echo 'selected'; ?> value="LA REFORMA">LA REFORMA</option>
        <option <?php if ($personal['Municipio'] == 'SAN ANDRÉS CABECERA NUEVA') echo 'selected'; ?> value="SAN ANDRÉS CABECERA NUEVA">SAN ANDRÉS CABECERA NUEVA</option>
        <option <?php if ($personal['Municipio'] == 'SAN PEDRO AMUZGOS') echo 'selected'; ?> value="SAN PEDRO AMUZGOS">SAN PEDRO AMUZGOS</option>
        <option <?php if ($personal['Municipio'] == 'SANTA CRUZ ITUNDUJIA') echo 'selected'; ?> value="SANTA CRUZ ITUNDUJIA">SANTA CRUZ ITUNDUJIA</option>
        <option <?php if ($personal['Municipio'] == 'SANTA LUCÍA MONTEVERDE') echo 'selected'; ?> value="SANTA LUCÍA MONTEVERDE">SANTA LUCÍA MONTEVERDE</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA IPALAPA') echo 'selected'; ?> value="SANTA MARÍA IPALAPA">SANTA MARÍA IPALAPA</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA ZACATEPEC') echo 'selected'; ?> value="SANTA MARÍA ZACATEPEC">SANTA MARÍA ZACATEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN FRANCISCO CAHUACUA') echo 'selected'; ?> value="SAN FRANCISCO CAHUACUA">SAN FRANCISCO CAHUACUA</option>
        <option <?php if ($personal['Municipio'] == 'SAN FRANCISCO SOLA') echo 'selected'; ?> value="SAN FRANCISCO SOLA">SAN FRANCISCO SOLA</option>
        <option <?php if ($personal['Municipio'] == 'SAN ILDEFONSO SOLA') echo 'selected'; ?> value="SAN ILDEFONSO SOLA">SAN ILDEFONSO SOLA</option>
        <option <?php if ($personal['Municipio'] == 'SAN JACINTO TLACOTEPEC') echo 'selected'; ?> value="SAN JACINTO TLACOTEPEC">SAN JACINTO TLACOTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN LORENZO TEXMELUCAN') echo 'selected'; ?> value="SAN LORENZO TEXMELUCAN">SAN LORENZO TEXMELUCAN</option>
        <option <?php if ($personal['Municipio'] == 'VILLA SOLA DE VEGA') echo 'selected'; ?> value="VILLA SOLA DE VEGA">VILLA SOLA DE VEGA</option>
        <option <?php if ($personal['Municipio'] == 'SANTA CRUZ ZENZONTEPEC') echo 'selected'; ?> value="SANTA CRUZ ZENZONTEPEC">SANTA CRUZ ZENZONTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA LACHIXIO') echo 'selected'; ?> value="SANTA MARÍA LACHIXIO">SANTA MARÍA LACHIXIO</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA SOLA') echo 'selected'; ?> value="SANTA MARÍA SOLA">SANTA MARÍA SOLA</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA ZANIZA') echo 'selected'; ?> value="SANTA MARÍA ZANIZA">SANTA MARÍA ZANIZA</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO AMOLTEPEC') echo 'selected'; ?> value="SANTIAGO AMOLTEPEC">SANTIAGO AMOLTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO MINAS') echo 'selected'; ?> value="SANTIAGO MINAS">SANTIAGO MINAS</option>
        <option <?php if ($personal['Municipio'] == 'SANTIAGO TEXTITLAN') echo 'selected'; ?> value="SANTIAGO TEXTITLAN">SANTIAGO TEXTITLAN</option>
        <option <?php if ($personal['Municipio'] == 'SANTO DOMINGO TEOJOMULCO') echo 'selected'; ?> value="SANTO DOMINGO TEOJOMULCO">SANTO DOMINGO TEOJOMULCO</option>
        <option <?php if ($personal['Municipio'] == 'SAN VICENTE LACHIXIO') echo 'selected'; ?> value="SAN VICENTE LACHIXIO">SAN VICENTE LACHIXIO</option>
        <option <?php if ($personal['Municipio'] == 'ZAPOTITLÁN DEL RÍO') echo 'selected'; ?> value="ZAPOTITLÁN DEL RÍO">ZAPOTITLÁN DEL RÍO</option>
        <option <?php if ($personal['Municipio'] == 'ASUNCION TLACOLULITA') echo 'selected'; ?> value="ASUNCION TLACOLULITA">ASUNCION TLACOLULITA</option>
        <option <?php if ($personal['Municipio'] == 'NEJAPA DE MADERO') echo 'selected'; ?> value="NEJAPA DE MADERO">NEJAPA DE MADERO</option>
        <option <?php if ($personal['Municipio'] == 'SANTA CATARINA QUIOQUITANI') echo 'selected'; ?> value="SANTA CATARINA QUIOQUITANI">SANTA CATARINA QUIOQUITANI</option>
        <option <?php if ($personal['Municipio'] == 'SAN BARTOLO YAUTEPEC') echo 'selected'; ?> value="SAN BARTOLO YAUTEPEC">SAN BARTOLO YAUTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN CARLOS YAUTEPEC') echo 'selected'; ?> value="SAN CARLOS YAUTEPEC">SAN CARLOS YAUTEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN JUQUILA MIXES') echo 'selected'; ?> value="SAN JUAN JUQUILA MIXES">SAN JUAN JUQUILA MIXES</option>
        <option <?php if ($personal['Municipio'] == 'SAN JUAN LAJARCIA') echo 'selected'; ?> value="SAN JUAN LAJARCIA">SAN JUAN LAJARCIA</option>
        <option <?php if ($personal['Municipio'] == 'SAN PEDRO MARTIR QUIECHAPA') echo 'selected'; ?> value="SAN PEDRO MARTIR QUIECHAPA">SAN PEDRO MARTIR QUIECHAPA</option>
        <option <?php if ($personal['Municipio'] == 'SANTA ANA TAVELA') echo 'selected'; ?> value="SANTA ANA TAVELA">SANTA ANA TAVELA</option>
        <option <?php if ($personal['Municipio'] == 'SANTA CATARINA QUIERI') echo 'selected'; ?> value="SANTA CATARINA QUIERI">SANTA CATARINA QUIERI</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA ECATEPEC') echo 'selected'; ?> value="SANTA MARÍA ECATEPEC">SANTA MARÍA ECATEPEC</option>
        <option <?php if ($personal['Municipio'] == 'SANTA MARÍA QUIEGOLANI') echo 'selected'; ?> value="SANTA MARÍA QUIEGOLANI">SANTA MARÍA QUIEGOLANI</option>

    </select>
    <div class="invalid-feedback">Se requiere una selección válida.</div>
    </div>


    <div class="col-sm-6">
        <label for="colonia" class="form-label">Localidad/Colonia/Agencia</label>
        <input type="text" class="form-control" id="colonia" name="colonia" value="<?php echo $personal['Colonia']; ?>"><br>
        <div class="invalid-feedback">Se requiere una colonia válida.</div>
    </div>


    <div class="col-sm-6">
        <label for="estado" class="form-label">Estado</label>
        <input type="text" class="form-control" id="estado" name="estado" value="<?php echo $personal['Estado']; ?>"><br>
        <div class="invalid-feedback">Se requiere un estado válido.</div>
    </div>

    <div class="col-sm-6">
    <label for="region" class="form-label">Región</label>
    <input type="text" class="form-control" id="region"  name="region" readonly value="<?php echo $personal['Region']; ?>"><br>
    <div class="invalid-feedback">Se requiere una colonia válida.</div>
    </div>

    <div class="col-sm-6">
        <label for="pais_procedencia" class="form-label">País de Procedencia</label>
        <input type="text" class="form-control" id="pais_procedencia" name="pais_procedencia" value="<?php echo $personal['PaisProcedencia']; ?>">
    <div class="invalid-feedback">Se requiere un País de Procedencia válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="direccion_temporal" class="form-label">Dirección Temporal</label>
        <input type="text" class="form-control" id="direccion_temporala" name="direccion_temporal" value="<?php echo $personal['DireccionTemporal']; ?>"><br>
        <div class="invalid-feedback">Se requiere una Dirección Temporal válida.</div>
    </div>

    <h4>Datos de Contacto</h4>
            <hr class="my-4">

    <div class="col-sm-6">
        <label for="tel" class="form-label">Teléfono celular</label>
        <input type="text" class="form-control" id="tel" name="tel" value="<?php echo $personal['Tel']; ?>"><br>
        <div class="invalid-feedback">Se requiere un número de teléfono celular válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="email" class="form-label">Correo electrónico</label>
        <div class="input-group has-validation">
        <span class="input-group-text">@</span>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo $personal['Email']; ?>"><br>
        <div class="invalid-feedback">Se requiere una dirección de correo electrónico válida.</div>
        </div>
    </div>

    <div class="col-sm-6">
        <label for="nombre_contacto_emergencia" class="form-label">Nombre de Contacto de Emergencia</label>
        <input type="text" class="form-control" id="nombre_contacto_emergencia" name="nombre_contacto_emergencia" value="<?php echo $personal['NombreContactoEmergencia']; ?>"><br>
        <div class="invalid-feedback">Se requiere un Contacto de Emergencia válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="ttel_contacto_emergencia" class="form-label">Teléfono de Contacto de Emergencia</label>
        <input type="text" class="form-control" id="tel_contacto_emergencia" name="tel_contacto_emergencia" value="<?php echo $personal['TelContactoEmergencia']; ?>"><br>
        <div class="invalid-feedback">Se requiere un número de teléfono de confianza válido.</div>
    </div>

    <h4>Datos Laborales</h4>
        <hr class="my-4">

    <div class="col-sm-6">
        <label for="grado_academico" class="form-label">Grado Académico</label>
        <input type="text" class="form-control" id="grado_academico" name="grado_academico" value="<?php echo $personal['GradoAcademico']; ?>"><br>
        <div class="invalid-feedback">Se requiere un Grado Académico válido.</div>
    </div>

    <!-- <div class="col-sm-6">
        <label for="puesto" class="form-label">Puesto</label>
        <input type="text" class="form-control" id="puesto" name="puesto" placeholder="">
        <div class="invalid-feedback">Se requiere un Puesto válido.</div>
    </div> -->

    <div class="col-sm-6">
        <label for="institucion" class="form-label">Institución Proveniente</label>
        <input type="text" class="form-control" id="institucion" name="institucion" value="<?php echo $personal['Institucion']; ?>"><br>
        <div class="invalid-feedback">Se requiere una Institución válido.</div>
    </div>
    
    <!-- <div class="col-sm-6">
        <label for="area_asignada" class="form-label">Área Asignada</label>
        <input type="text" class="form-control" id="area_asignada" name="area_asignada" placeholder="">
        <div class="invalid-feedback">Se requiere una Área Asignada válido.</div>
    </div> -->

    <div class="col-sm-6">
    <label for="area_asignada" class="form-label">Área Asignada</label>
    <select class="form-select" id="area_asignada" name="area_asignada" aria-label="Selecciona una opción" required>
        <option <?php if ($personal['AreaAsignada'] == '') echo 'selected'; ?> disabled value="">Selecciona una opción...</option>
        <option <?php if ($personal['AreaAsignada'] == 'PSICOLÓGICA') echo 'selected'; ?> value="PSICOLÓGICA">PSICOLÓGICA</option>
        <option <?php if ($personal['AreaAsignada'] == 'JURÍDICA') echo 'selected'; ?> value="JURÍDICA">JURÍDICA</option>
        <option <?php if ($personal['AreaAsignada'] == 'MÉDICA') echo 'selected'; ?> value="MÉDICA">MÉDICA</option>
        <option <?php if ($personal['AreaAsignada'] == 'PROYECTOS') echo 'selected'; ?> value="PROYECTOS">PROYECTOS</option>
        <option <?php if ($personal['AreaAsignada'] == 'MOVIMIENTO SOCIAL') echo 'selected'; ?> value="MOVIMIENTO SOCIAL">MOVIMIENTO SOCIAL</option>
        <option <?php if ($personal['AreaAsignada'] == 'ENLACE ESTRATÉGICO') echo 'selected'; ?> value="ENLACE ESTRATÉGICO">ENLACE ESTRATÉGICO</option>
        <option <?php if ($personal['AreaAsignada'] == 'DIRECCIÓN') echo 'selected'; ?> value="DIRECCIÓN">DIRECCIÓN</option>
        <option <?php if ($personal['AreaAsignada'] == 'DIRECCIÓN COLEGIADA') echo 'selected'; ?> value="DIRECCIÓN COLEGIADA">DIRECCIÓN COLEGIADA</option>
        <option <?php if ($personal['AreaAsignada'] == 'MONITOREO Y EVALUACIÓN') echo 'selected'; ?> value="MONITOREO Y EVALUACIÓN">MONITOREO Y EVALUACIÓN</option>
        <option <?php if ($personal['AreaAsignada'] == 'FINANZAS') echo 'selected'; ?> value="FINANZAS">FINANZAS</option>
        <option <?php if ($personal['AreaAsignada'] == 'COORDINACIÓN') echo 'selected'; ?> value="COORDINACIÓN">COORDINACIÓN</option>
        <option <?php if ($personal['AreaAsignada'] == 'COMUNICACIÓN') echo 'selected'; ?> value="COMUNICACIÓN">COMUNICACIÓN</option>
        <option <?php if ($personal['AreaAsignada'] == 'TI') echo 'selected'; ?> value="TI">TI</option>
        <option <?php if ($personal['AreaAsignada'] == 'OTRO') echo 'selected'; ?> value="OTRO">Otro</option>
    </select>
    <div class="invalid-feedback">Se requiere una selección válida.</div>
</div>


    <!-- <div class="col-sm-6">
        <label for="estatus_personal" class="form-label">Estatus Personal</label>
        <input type="text" class="form-control" id="estatus_personal" name="estatus_personal" placeholder="">
        <div class="invalid-feedback">Se requiere un Estatus Personal válido.</div>
    </div> -->

    <div class="col-sm-6">
    <label for="clasificacion_personal" class="form-label">Clasificación Personal</label>
    <select class="form-select" id="clasificacion_personal" name="clasificacion_personal" aria-label="Selecciona una opción" required>
        <option <?php if ($personal['ClasificacionPersonal'] == '') echo 'selected'; ?> disabled value="">Selecciona una opción...</option>
        <option <?php if ($personal['ClasificacionPersonal'] == 'BASE') echo 'selected'; ?> value="BASE">BASE</option>
        <option <?php if ($personal['ClasificacionPersonal'] == 'JÓVENES CONSTRUYENDO EL FUTURO') echo 'selected'; ?> value="JÓVENES CONSTRUYENDO EL FUTURO">JÓVENES CONSTRUYENDO EL FUTURO (JCF)</option>
        <option <?php if ($personal['ClasificacionPersonal'] == 'MI PRIMERA CHAMBA') echo 'selected'; ?> value="MI PRIMERA CHAMBA">MI PRIMERA CHAMBA</option>
        <option <?php if ($personal['ClasificacionPersonal'] == 'VOLUNTARIADO') echo 'selected'; ?> value="VOLUNTARIADO">VOLUNTARIADO</option>
        <option <?php if ($personal['ClasificacionPersonal'] == 'SERVICIO SOCIAL') echo 'selected'; ?> value="SERVICIO SOCIAL">SERVICIO SOCIAL</option>
        <option <?php if ($personal['ClasificacionPersonal'] == 'PRÁCTICAS PROFESIONALES') echo 'selected'; ?> value="PRÁCTICAS PROFESIONALES">PRÁCTICAS PROFESIONALES</option>
        <option <?php if ($personal['ClasificacionPersonal'] == 'ESTADÍAS PROFESIONALES') echo 'selected'; ?> value="ESTADÍAS PROFESIONALES">ESTADÍAS PROFESIONALES</option>
        <option <?php if ($personal['ClasificacionPersonal'] == 'INTERCAMBIO') echo 'selected'; ?> value="INTERCAMBIO">INTERCAMBIO</option>
        <option <?php if ($personal['ClasificacionPersonal'] == 'PASANTÍAS') echo 'selected'; ?> value="PASANTÍAS">PASANTÍAS</option>
        <option <?php if ($personal['ClasificacionPersonal'] == 'INVESTIGACIÓN') echo 'selected'; ?> value="INVESTIGACIÓN">INVESTIGACIÓN</option>
        <option <?php if ($personal['ClasificacionPersonal'] == 'OTRO') echo 'selected'; ?> value="OTRO">Otro</option>
    </select>
    <div class="invalid-feedback">Se requiere una selección válida.</div>
</div>

    <div class="col-sm-6">
        <label for="becha_ingreso" class="form-label">Fecha de Ingreso</label>
        <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" value="<?php echo $personal['FechaIngreso']; ?>"><br>
        <div class="invalid-feedback">Se requiere una Fecha de Ingreso válida.</div>
    </div>

    <div class="col-sm-6">
        <label for="fecha_termino" class="form-label">Fecha de Término</label>
        <input type="date" class="form-control" id="fecha_termino" name="fecha_termino" value="<?php echo $personal['FechaTermino']; ?>"><br>
        <div class="invalid-feedback">Se requiere una Fecha de Término válida.</div>
    </div>

    <!-- <div class="col-sm-6">
        <label for="clasificacion_personal" class="form-label">Clasificación Personal</label>
        <input type="text" class="form-control" id="clasificacion_personal" name="clasificacion_personal" placeholder="">
        <div class="invalid-feedback">Se requiere una Clasificación Personal válido.</div>
    </div> -->

    <div class="col-sm-6">
    <label for="estatus_personal" class="form-label">Estatus del Personal</label>
    <select class="form-select" id="estatus_personal" name="estatus_personal" aria-label="Selecciona una opción" required>
        <option <?php if ($personal['EstatusPersonal'] == '') echo 'selected'; ?> disabled value="">Selecciona una opción...</option>
        <option <?php if ($personal['EstatusPersonal'] == 'ACTIVO') echo 'selected'; ?> value="ACTIVO">ACTIVO</option>
        <option <?php if ($personal['EstatusPersonal'] == 'INACTIVO') echo 'selected'; ?> value="INACTIVO">INACTIVO</option>
        <option <?php if ($personal['EstatusPersonal'] == 'BAJA') echo 'selected'; ?> value="BAJA">BAJA</option>
        <option <?php if ($personal['EstatusPersonal'] == 'CONCLUIDO') echo 'selected'; ?> value="CONCLUIDO">CONCLUIDO</option>
    </select>
    <div class="invalid-feedback">Se requiere una selección válida.</div>
</div>

    <h4>Datos Extras</h4>
        <hr class="my-4">

    <div class="col-sm-6">
        <label for="problemas_salud_considerables" class="form-label">Problemas de Salud Considerables</label>
        <input type="text" class="form-control" id="problemas_salud_considerables" name="problemas_salud_considerables" value="<?php echo $personal['ProblemasSaludConsiderables']; ?>"><br>
        <div class="invalid-feedback">Se requiere Problemas de Salud Considerables válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="problemas_movilidad" class="form-label">Problemas de Movilidad</label>
        <input type="text" class="form-control" id="problemas_movilidad" name="problemas_movilidad" value="<?php echo $personal['ProblemasMovilidad']; ?>"><br>
        <div class="invalid-feedback">Se requiere Problemas de Movilidad válido.</div>
    </div>
 
    <div class="col-sm-12">
    <div class="mb-3">
        <label for="observaciones" class="form-label">Observaciones</label>
        <input class="form-control" id="observaciones" name="observaciones" value="<?php echo $personal['Observaciones']; ?>"><br></input>
    </div>
    <div class="invalid-feedback">Por favor, proporcione una Observacion válida.</div>
    </div>

    <div class="col-sm-12">
    <label for="rol" class="form-label">Rol:</label>
    <select name="rol" class="form-select" id="rol">
        <?php
       require_once __DIR__ . '/../db/config.php';

        try {
            // Crear conexión a la base de datos
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            // Establecer el modo de error para lanzar excepciones en caso de errores
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Consulta para obtener los roles disponibles
            $sql_roles = "SELECT ID_Rol, Descripcion FROM Rol";
            $stmt_roles = $conn->prepare($sql_roles);
            $stmt_roles->execute();

            // Si hay resultados, mostrar opciones en el select
            if ($stmt_roles->rowCount() > 0) {
                while ($row_roles = $stmt_roles->fetch(PDO::FETCH_ASSOC)) {
                    // Verificar si hay un ID de personal en la URL
                    $personal_id = !empty($_GET['id']) ? $_GET['id'] : null;

                    // Si hay un ID de personal, obtener el rol del personal
                    $rol_personal = null;
                    if ($personal_id) {
                        $sql_personal = "SELECT ID_Rol FROM Personal WHERE ID_Personal = :personal_id";
                        $stmt_personal = $conn->prepare($sql_personal);
                        $stmt_personal->bindParam(':personal_id', $personal_id);
                        $stmt_personal->execute();
                        $rol_personal = $stmt_personal->fetchColumn();
                    }

                    // Mostrar las opciones, marcando como seleccionado el rol del personal que se está editando
                    if ($rol_personal == $row_roles['ID_Rol']) {
                        echo "<option value='" . $row_roles['ID_Rol'] . "' selected>" . $row_roles['Descripcion'] . "</option>";
                    } else {
                        echo "<option value='" . $row_roles['ID_Rol'] . "'>" . $row_roles['Descripcion'] . "</option>";
                    }
                }
            } else {
                echo "<option value=''>No hay roles disponibles</option>";
            }
        } catch (PDOException $e) {
            // Manejar errores de manera adecuada
            echo "<option value=''>Error al obtener los roles</option>";
            // Puedes mostrar el mensaje de error si necesitas depurar el problema
            // echo "Error: " . $e->getMessage();
        }
        ?>
    </select>
</div>

    
    <div class="col-sm-12">
    <div class="mb-3">
        <label for="password" class="col-form-label">Contraseña</label>
        <input type="password" id="password" class="form-control" name="password" aria-describedby="passwordHelpInline" required placeholder="Ingresa la nueva contraseña"><br>
        <div class="invalid-feedback">Se requiere Problemas de Movilidad válido.</div>
    </div>

    <div class="col-auto">
        <span id="passwordHelpInline" class="form-text">Contraseña con la cual ingresara el personal al sistema.</span>
    </div>
    </div>

            <hr class="my-4">

    <button class="w-100 btn btn-primary btn-lg" type="submit">Registrar</button>
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
    <script src="regiones.js"></script>
    <script src="vV-personal.js"></script>
   

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous">
      
    </script><script src="dashboard.js"></script>


        </html>
