<?php
require_once __DIR__ . '/../pages/seccion.php';

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

    $mensaje = "";
$tipoMensaje = "";
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
            return "" . $nombreArchivo; // Ruta relativa
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
        $password = $_POST["password"] ?? null;

// Si ingresaron una nueva contraseña, se hashea; si no, mantenemos la actual
if (!empty($password)) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
} else {
    $hashed_password = $personal['Password']; // Mantener la contraseña actual
}
    
  
    
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
            if ($stmt->execute()) {
            $mensaje = "Personal actualizado correctamente";
            $tipoMensaje = "success";
        } else {
            $mensaje = "Error al actualizar Personal";
            $tipoMensaje = "error";
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

    <?php
// Determinar la foto
// Determinar la foto del personal
$ruta_base = "../uploads/personal/";
$foto = "default.png"; // Imagen por defecto

if ($personal && !empty($personal['foto']) && strtoupper(trim($personal['foto'])) !== "SIN DATOS") {
    // Verifica si la ruta contiene "uploads/"
    if (strpos($personal['foto'], "uploads/") !== false) {
        $ruta_foto = "../" . $personal['foto'];
    } else {
        $ruta_foto = $ruta_base . $personal['foto'];
    }

    // Si el archivo existe, úsalo; si no, usa la imagen por defecto
    if (file_exists($ruta_foto)) {
        $foto = $ruta_foto;
    } else {
        $foto = $ruta_base . "default.png";
    }
} else {
    // Si no tiene foto o dice "SIN DATOS"
    $foto = $ruta_base . "default.png";
}

?>
    
        <div class="container">
        <main>
    <div class="py-5 text-center">
         <img class="d-block mx-auto mb-4" src="../assets/img/logo 1.png" alt="" width="100" height="100">
      
       
    </div>

    <div class="row g-5">
    <div class="col-xxl-12 col-xxl-12">
        
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

    <h2 class="mt-3">Editar Personal</h2>
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
        <label for="estado" class="form-label">Estado</label>
        <input type="text" class="form-control" id="estado" name="estado" value="<?php echo $personal['Estado']; ?>"><br>
        <div class="invalid-feedback">Se requiere un estado válido.</div>
    </div>






    <input type="hidden" id="selected_region_id">
        <input type="hidden" id="selected_distrito_id">
        <input type="hidden" id="selected_municipio_id">
        <input type="hidden" id="selected_localidad_id"> 


        <div class="col-sm-6">
  <label for="cp" class="form-label">Código Postal (CP)</label>
  <input type="number" max="100000" min="1" class="form-control" id="cp" name="cp" placeholder="" value="<?php echo $personal['CP']; ?>">
  <div class="invalid-feedback">Se requiere un código postal válido.</div>
</div>

        <div class="col-sm-6">

            <label for="input_region" class="form-label">Región:</label>
            <input type="text" class="form-control" id="input_region" name="region" value="<?php echo $personal['Region']; ?>" autocomplete="off">
            <div class="sugerencias" id="sug_region"></div>
        </div>

        <div class="col-sm-6">
            <label for="input_distrito" class="form-label">Distrito:</label>
            <input type="text" id="input_distrito" class="form-control" placeholder="Escribe para buscar distrito..." autocomplete="off">
            <div class="sugerencias" id="sug_distrito"></div>
        </div>

        <div class="col-sm-6">
            <label for="input_municipio" class="form-label">Municipio:</label>
            <input type="text" id="input_municipio" class="form-control" name="municipio" value="<?php echo $personal['Municipio']; ?>" autocomplete="off">
            <div class="sugerencias" id="sug_municipio"></div>
        </div>

        <div class="col-sm-6">
            <label for="input_localidad" class="form-label">Localidad:</label>
            <input type="text" id="input_localidad" class="form-control" name="colonia" value="<?php echo $personal['Colonia']; ?>" autocomplete="off">
            <div class="sugerencias" id="sug_localidad"></div>
        </div>

        <div id="detalles" style="display: none;">
           
            <p><strong>Localidad:</strong> <span id="res_localidad"></span></p>
            <p><strong>Municipio:</strong> <span id="res_municipio"></span></p>
            <p><strong>Distrito:</strong> <span id="res_distrito"></span></p>
            <p><strong>Región:</strong> <span id="res_region"></span></p>
        </div>











  <script>
        // --- Referencias a los elementos ---
        const inputs = {
            region: document.getElementById('input_region'),
            distrito: document.getElementById('input_distrito'),
            municipio: document.getElementById('input_municipio'),
            localidad: document.getElementById('input_localidad')
        };
        const suggestions = {
            region: document.getElementById('sug_region'),
            distrito: document.getElementById('sug_distrito'),
            municipio: document.getElementById('sug_municipio'),
            localidad: document.getElementById('sug_localidad')
        };
        const selectedIds = {
            region: document.getElementById('selected_region_id'),
            distrito: document.getElementById('selected_distrito_id'),
            municipio: document.getElementById('selected_municipio_id'),
            localidad: document.getElementById('selected_localidad_id') // Añadido
        };

        // --- LÓGICA DE BÚSQUEDA (keyup) ---

        inputs.region.addEventListener('keyup', e => handleSearch('region', e.target.value));
        inputs.distrito.addEventListener('keyup', e => handleSearch('distrito', e.target.value));
        inputs.municipio.addEventListener('keyup', e => handleSearch('municipio', e.target.value));
        inputs.localidad.addEventListener('keyup', e => handleSearch('localidad', e.target.value));

        async function handleSearch(type, query) {
            // Limpia sugerencias si la búsqueda es muy corta o vacía
            if (query.length < 2) {
                suggestions[type].innerHTML = '';
                // Si el campo se vació manualmente, también resetea su ID oculto y los hijos
                if (query.length === 0) {
                     if(selectedIds[type]) {
                        selectedIds[type].value = '';
                    }
                    resetChildren(type);
                }
                return;
            }

            // Construye parámetros base
            const params = new URLSearchParams({ type: type, q: query });

            // --- Lógica de filtrado en cascada ---
            // Añade IDs de niveles superiores a los parámetros si existen
            if (type === 'distrito' && selectedIds.region.value) {
                params.append('region_id', selectedIds.region.value);
            }
            if (type === 'municipio') {
                 if (selectedIds.distrito.value) params.append('distrito_id', selectedIds.distrito.value);
                 else if (selectedIds.region.value) params.append('region_id', selectedIds.region.value); // Filtro por región si no hay distrito
            }
            if (type === 'localidad') {
                if (selectedIds.municipio.value) params.append('municipio_id', selectedIds.municipio.value);
                else if (selectedIds.distrito.value) params.append('distrito_id', selectedIds.distrito.value);
                else if (selectedIds.region.value) params.append('region_id', selectedIds.region.value);
            }

            try {
                // Llama a la API
                const response = await fetch(`./api.php?${params.toString()}`);
                 if (!response.ok) { // Verifica si la respuesta HTTP fue exitosa
                    throw new Error(`Error ${response.status}: ${response.statusText}`);
                 }
                const data = await response.json();
                 // Verifica si la respuesta JSON contiene un error del backend
                 if (data.error) {
                    console.error("Error del backend:", data.error);
                    suggestions[type].innerHTML = `<div>Error: ${data.error}</div>`; // Muestra error en sugerencias
                 } else {
                    mostrarSugerencias(type, data); // Muestra sugerencias si todo ok
                 }
            } catch (error) {
                // Captura errores de red o de parseo JSON
                console.error("Error en fetch o procesando JSON:", error);
                suggestions[type].innerHTML = `<div>Error al buscar: ${error.message}</div>`; // Muestra error
            }
        }

        // --- FUNCIÓN genérica para mostrar sugerencias (ACTUALIZADA) ---
        function mostrarSugerencias(type, data) {
            const sugBox = suggestions[type];
            sugBox.innerHTML = ''; // Limpia sugerencias anteriores

            // Verifica si data es un array; si no, muestra mensaje o error
            if (!Array.isArray(data)) {
                 console.warn("La respuesta de la API no es un array:", data);
                 sugBox.innerHTML = '<div>No se recibieron sugerencias válidas.</div>';
                 return;
            }
            if (data.length === 0) {
                 sugBox.innerHTML = '<div>No hay coincidencias.</div>';
                 return;
            }


            data.forEach(item => {
                const div = document.createElement('div');
                // Determina el ID correcto a usar según el tipo y los nombres de columna de tu API
                let id_value = item.id_region || item.id_distrito || item.id_municipio_inegi || item.id_asentamiento;

                // Asegura que item.nombre exista antes de usarlo
                div.innerHTML = `<strong>${item.nombre || 'Nombre no disponible'}</strong>`;

                // Añadir info extra si es localidad (asentamiento)
                if (type === 'localidad' && item.tipo_asentamiento) {
                     div.innerHTML += `<small>${item.tipo_asentamiento} - CP: ${item.codigo_postal || 'N/A'}</small>`;
                }

                // Añade el listener SOLO si id_value es válido
                if (id_value !== undefined && id_value !== null) {
                    // Pasamos type, el objeto item completo y el id_value extraído
                    div.addEventListener('click', () => handleSuggestionClick(type, item, id_value));
                } else {
                    console.warn("Item sin ID válido encontrado:", item); // Advertencia si un item no tiene ID
                }
                sugBox.appendChild(div);
            });
        }

        // --- FUNCIÓN genérica para manejar clic en sugerencia (ACTUALIZADA) ---
        async function handleSuggestionClick(type, itemData, id) { // Recibe el ID extraído también
            console.log(`Clic en sugerencia - Tipo: ${type}, ID: ${id}, Nombre: ${itemData.nombre}`); // <-- DEBUG

            // 1. Limpiar todas las cajas de sugerencias
            Object.values(suggestions).forEach(sug => sug.innerHTML = '');

            // 2. Ocultar el panel de detalles (se mostrará después si aplica)
            document.getElementById('detalles').style.display = 'none';

            // *** 3. Rellenar el campo clickeado INMEDIATAMENTE ***
            inputs[type].value = itemData.nombre; // Usa el nombre del item clickeado
            // Guardar ID seleccionado en el campo oculto correspondiente
            if (selectedIds[type]) {
                selectedIds[type].value = id;
            }
             // Si se hizo clic en un nivel superior, limpiar los hijos AHORA para evitar búsquedas con filtros incorrectos
             resetChildren(type);


            // 4. Llamar a la API para obtener TODOS los detalles y rellenar campos
            console.log(`Fetching details for ${type} with ID: ${id}`); // <-- DEBUG
            await fetchFullDetails(type, id); // Llama siempre para asegurar consistencia y rellenar todo
        }

        // --- FUNCIÓN para obtener detalles y rellenar todo (SIN CAMBIOS RESPECTO A LA ANTERIOR) ---
        async function fetchFullDetails(type, id) {
            // Construye el nombre del parámetro esperado por api.php (ej: 'municipio_id')
            const paramName = (type === 'localidad') ? 'localidad_id' : `${type}_id`;

            try {
                const response = await fetch(`./api.php?type=get_full_details&${paramName}=${id}`);
                if (!response.ok) {
                    throw new Error(`Error ${response.status}: ${response.statusText}`);
                }
                const details = await response.json();
                if (details.error) {
                     console.error("Error del backend en get_full_details:", details.error);
                     // Podrías mostrar un mensaje al usuario aquí
                } else {
                    // 4. Rellenar todos los campos con la información obtenida
                    populateFields(details);
                }
            } catch (error) {
                 console.error("Error en fetchFullDetails:", error);
                 // Podrías mostrar un mensaje al usuario aquí
            }
        }


       // --- FUNCIÓN para rellenar los campos (ACTUALIZADA CON DEBUG) ---
       // --- FUNCIÓN para rellenar los campos (ACTUALIZADA CON CP) ---
function populateFields(details) {
    console.log("Datos recibidos para rellenar:", details); // DEBUG

    // Región
    if (details.region_id !== undefined && details.region_nombre !== undefined) {
        inputs.region.value = details.region_nombre || '';
        selectedIds.region.value = details.region_id || '';
    } else {
        inputs.region.value = '';
        selectedIds.region.value = '';
    }

    // Distrito
    if (details.distrito_id !== undefined && details.distrito_nombre !== undefined) {
        inputs.distrito.value = details.distrito_nombre || '';
        selectedIds.distrito.value = details.distrito_id || '';
    } else {
        inputs.distrito.value = '';
        selectedIds.distrito.value = '';
    }

    // Municipio
    if (details.municipio_id !== undefined && details.municipio_nombre !== undefined) {
        inputs.municipio.value = details.municipio_nombre || '';
        selectedIds.municipio.value = details.municipio_id || '';
    } else {
        inputs.municipio.value = '';
        selectedIds.municipio.value = '';
    }

    // Localidad
    if (details.localidad_id !== undefined && details.localidad_nombre !== undefined) {
        inputs.localidad.value = details.localidad_nombre || '';
        selectedIds.localidad.value = details.localidad_id || '';
    } else {
        inputs.localidad.value = '';
        selectedIds.localidad.value = '';
    }

    // --- NUEVO: Código Postal ---
    if (details.codigo_postal !== undefined && details.codigo_postal !== null) {
        document.getElementById('cp').value = details.codigo_postal;
    } else {
        document.getElementById('cp').value = '';
    }

    // Mostrar detalles
    if (details.localidad_id !== null && details.localidad_id !== undefined) {
        document.getElementById('res_localidad').textContent = details.localidad_nombre || 'N/A';
        document.getElementById('res_municipio').textContent = details.municipio_nombre || 'N/A';
        document.getElementById('res_distrito').textContent = details.distrito_nombre || 'N/A';
        document.getElementById('res_region').textContent = details.region_nombre || 'N/A';
        // Añadir info extra si existe
        let detallesExtra = '';
        if (details.tipo_asentamiento) detallesExtra += ` (${details.tipo_asentamiento})`;
        if (details.codigo_postal) detallesExtra += ` - CP: ${details.codigo_postal}`;
        document.getElementById('res_localidad').textContent += detallesExtra;

        document.getElementById('detalles').style.display = 'block';
    } else {
        document.getElementById('detalles').style.display = 'none';
    }
}


        // --- FUNCIÓN para resetear campos hijos ---
        function resetChildren(typeChanged) {
             console.log(`Reseteando hijos de ${typeChanged}`); // <-- DEBUG
             document.getElementById('detalles').style.display = 'none'; // Oculta detalles siempre
             // Define la jerarquía para saber qué limpiar
             const hierarchy = ['region', 'distrito', 'municipio', 'localidad'];
             const startIndex = hierarchy.indexOf(typeChanged);

             // Si se encontró el tipo y no es el último nivel
             if (startIndex > -1 && startIndex < hierarchy.length - 1) {
                // Itera sobre los niveles inferiores
                for (let i = startIndex + 1; i < hierarchy.length; i++) {
                    const childType = hierarchy[i];
                    if (inputs[childType]) {
                        inputs[childType].value = ''; // Limpia input visible
                        inputs[childType].placeholder = `Escribe para buscar ${childType}...`; // Restaura placeholder si es necesario
                    }
                    if (selectedIds[childType]) {
                        selectedIds[childType].value = ''; // Limpia ID oculto
                    }
                     if (suggestions[childType]) {
                        suggestions[childType].innerHTML = ''; // Limpia sugerencias hijas
                    }
                }
             }
             // Si se borra la localidad, solo ocultamos detalles (ya hecho arriba)
        }

       // --- ¡NUEVA! Función para limpiar todos los campos (se puede llamar si necesitas un botón "Limpiar todo") ---
         function resetFields() {
             Object.values(inputs).forEach(input => input.value = '');
             Object.values(selectedIds).forEach(hidden => hidden.value = '');
             Object.values(suggestions).forEach(sug => sug.innerHTML = ''); // Limpia todas las sugerencias
             document.getElementById('detalles').style.display = 'none';
             console.log("Todos los campos reseteados."); // <-- DEBUG
        }

    </script>
   












    <div class="col-sm-6">
        <label for="pais_procedencia" class="form-label">País de Procedencia</label>
        <input type="text" class="form-control" id="pais_procedencia" name="pais_procedencia" >
    <div class="invalid-feedback">Se requiere un País de Procedencia válido.</div>
    </div>

<div class="col-sm-6">
  <label for="pais_procedencia" class="form-label">PAÍS DE PROCEDENCIA</label>
  <select class="form-select" id="pais_procedencia" name="pais_procedencia" >
    <option value="<?php echo $personal['PaisProcedencia']; ?>"></option>
    <option value="MÉXICO" selected>MÉXICO</option>
    <option value="GUATEMALA">GUATEMALA</option>
    <option value="BELICE">BELICE</option>
    <option value="EL SALVADOR">EL SALVADOR</option>
    <option value="HONDURAS">HONDURAS</option>
    <option value="NICARAGUA">NICARAGUA</option>
    <option value="COSTA RICA">COSTA RICA</option>
    <option value="PANAMÁ">PANAMÁ</option>
    <option value="CUBA">CUBA</option>
    <option value="REPÚBLICA DOMINICANA">REPÚBLICA DOMINICANA</option>
    <option value="PUERTO RICO">PUERTO RICO</option>
    <option value="COLOMBIA">COLOMBIA</option>
    <option value="VENEZUELA">VENEZUELA</option>
    <option value="ECUADOR">ECUADOR</option>
    <option value="PERÚ">PERÚ</option>
    <option value="BOLIVIA">BOLIVIA</option>
    <option value="PARAGUAY">PARAGUAY</option>
    <option value="CHILE">CHILE</option>
    <option value="ARGENTINA">ARGENTINA</option>
    <option value="URUGUAY">URUGUAY</option>
    <option value="BRASIL">BRASIL</option>
    <option value="ESTADOS UNIDOS">ESTADOS UNIDOS</option>
    <option value="CANADÁ">CANADÁ</option>
    <option value="ESPAÑA">ESPAÑA</option>
    <option value="PORTUGAL">PORTUGAL</option>
    <option value="FRANCIA">FRANCIA</option>
    <option value="ITALIA">ITALIA</option>
    <option value="ALEMANIA">ALEMANIA</option>
    <option value="REINO UNIDO">REINO UNIDO</option>
    <option value="PAÍSES BAJOS">PAÍSES BAJOS</option>
    <option value="SUIZA">SUIZA</option>
    <option value="SUECIA">SUECIA</option>
    <option value="NORUEGA">NORUEGA</option>
    <option value="FINLANDIA">FINLANDIA</option>
    <option value="DINAMARCA">DINAMARCA</option>
    <option value="RUSIA">RUSIA</option>
    <option value="CHINA">CHINA</option>
    <option value="JAPÓN">JAPÓN</option>
    <option value="COREA DEL SUR">COREA DEL SUR</option>
    <option value="INDIA">INDIA</option>
    <option value="FILIPINAS">FILIPINAS</option>
    <option value="VIETNAM">VIETNAM</option>
    <option value="TAILANDIA">TAILANDIA</option>
    <option value="INDONESIA">INDONESIA</option>
    <option value="MALASIA">MALASIA</option>
    <option value="SINGAPUR">SINGAPUR</option>
    <option value="AUSTRALIA">AUSTRALIA</option>
    <option value="NUEVA ZELANDA">NUEVA ZELANDA</option>
    <option value="MARRUECOS">MARRUECOS</option>
    <option value="EGIPTO">EGIPTO</option>
    <option value="SUDÁFRICA">SUDÁFRICA</option>
    <option value="NIGERIA">NIGERIA</option>
    <option value="GHANA">GHANA</option>
    <option value="ETIOPÍA">ETIOPÍA</option>
    <option value="KENIA">KENIA</option>
    <option value="TURQUÍA">TURQUÍA</option>
    <option value="ISRAEL">ISRAEL</option>
    <option value="ARABIA SAUDITA">ARABIA SAUDITA</option>
    <option value="EMIRATOS ÁRABES UNIDOS">EMIRATOS ÁRABES UNIDOS</option>
    <option value="IRÁN">IRÁN</option>
    <option value="PAKISTÁN">PAKISTÁN</option>
    <option value="OTRO">OTRO</option>
  </select>
  <div class="invalid-feedback">SE REQUIERE UN PAÍS DE PROCEDENCIA VÁLIDO.</div>
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
        <input type="password" id="password" class="form-control" name="password" 
               placeholder="Deja vacío para mantener la actual">
        <div class="invalid-feedback">Se requiere una contraseña válida.</div>
    </div>

    <div class="col-auto">
        <span id="passwordHelpInline" class="form-text">
            Contraseña con la cual ingresará el personal al sistema.
        </span>
    </div>
</div>


            <hr class="my-4">

    <button class="w-100 btn btn-primary btn-lg" type="submit">Actualizar</button>
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



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php if (!empty($mensaje)): ?>
<script>
Swal.fire({
    icon: "<?= $tipoMensaje ?>",
    title: "<?= $mensaje ?>",
    showConfirmButton: false,
    timer: 3000
}).then(() => {
    window.location.href = "../pages/ver-personal.php";
});
</script>
<?php endif; ?>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="checkout.js"></script></body>
    <script src="regiones.js"></script>
    <script src="vV-personal.js"></script>
   

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous">
      
    </script><script src="dashboard.js"></script>


        </html>
