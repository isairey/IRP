<?php
require_once __DIR__ . '/../pages/seccion.php';

?>
<?php
require_once __DIR__ . '/../db/config.php';

// Verificamos si se recibieron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibimos los datos del formulario
    $rol = !empty($_POST["rol"]) ? $_POST["rol"] : "SIN DATOS";
    $nombre = !empty($_POST["nombre"]) ? $_POST["nombre"] : "SIN DATOS";
    $apellido_paterno = !empty($_POST["apellido_paterno"]) ? $_POST["apellido_paterno"] : "SIN DATOS";
    $apellido_materno = !empty($_POST["apellido_materno"]) ? $_POST["apellido_materno"] : "SIN DATOS";
    $fecha_nacimiento = !empty($_POST["fecha_nacimiento"]) ? $_POST["fecha_nacimiento"] : "SIN DATOS";
    $calle = !empty($_POST["calle"]) ? $_POST["calle"] : "SIN DATOS";
    $num_interior = !empty($_POST["num_interior"]) ? $_POST["num_interior"] : "SIN DATOS";
    $num_exterior = !empty($_POST["num_exterior"]) ? $_POST["num_exterior"] : "SIN DATOS";
    $cp = !empty($_POST["cp"]) ? $_POST["cp"] : "SIN DATOS";
    $estado = !empty($_POST["estado"]) ? $_POST["estado"] : "SIN DATOS";
    $municipio = !empty($_POST["municipio"]) ? $_POST["municipio"] : "SIN DATOS";
    $colonia = !empty($_POST["colonia"]) ? $_POST["colonia"] : "SIN DATOS";
    $region = !empty($_POST["region"]) ? $_POST["region"] : "SIN DATOS";
    $pais_procedencia = !empty($_POST["pais_procedencia"]) ? $_POST["pais_procedencia"] : "SIN DATOS";
    $direccion_temporal = !empty($_POST["direccion_temporal"]) ? $_POST["direccion_temporal"] : "SIN DATOS";
    $sexo = !empty($_POST["sexo"]) ? $_POST["sexo"] : "SIN DATOS";
    $genero = !empty($_POST["genero"]) ? $_POST["genero"] : "SIN DATOS";
    $email = !empty($_POST["email"]) ? $_POST["email"] : "SIN DATOS";
    $tel = !empty($_POST["tel"]) ? $_POST["tel"] : "SIN DATOS";
    $nombre_contacto_emergencia = !empty($_POST["nombre_contacto_emergencia"]) ? $_POST["nombre_contacto_emergencia"] : "SIN DATOS";
    $tel_contacto_emergencia = !empty($_POST["tel_contacto_emergencia"]) ? $_POST["tel_contacto_emergencia"] : "SIN DATOS";
    $grado_academico = !empty($_POST["grado_academico"]) ? $_POST["grado_academico"] : "SIN DATOS";
    $institucion = !empty($_POST["institucion"]) ? $_POST["institucion"] : "SIN DATOS";
    $area_asignada = !empty($_POST["area_asignada"]) ? $_POST["area_asignada"] : "SIN DATOS";
    $estatus_personal = !empty($_POST["estatus_personal"]) ? $_POST["estatus_personal"] : "SIN DATOS";
    $fecha_ingreso = !empty($_POST["fecha_ingreso"]) ? $_POST["fecha_ingreso"] : "SIN DATOS";
    $fecha_termino = !empty($_POST["fecha_termino"]) ? $_POST["fecha_termino"] : "SIN DATOS";
    $clasificacion_personal = !empty($_POST["clasificacion_personal"]) ? $_POST["clasificacion_personal"] : "SIN DATOS";
    $problemas_salud_considerables = !empty($_POST["problemas_salud_considerables"]) ? $_POST["problemas_salud_considerables"] : "SIN DATOS";
    $problemas_movilidad = !empty($_POST["problemas_movilidad"]) ? $_POST["problemas_movilidad"] : "SIN DATOS";
    $observaciones = !empty($_POST["observaciones"]) ? $_POST["observaciones"] : "SIN DATOS";
    $password = !empty($_POST["password"]) ? $_POST["password"] : "SIN DATOS";

    // Encriptar la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);



// Manejo de la foto
    $foto = null;
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        $carpetaDestino = "../uploads/personal/";
        if (!file_exists($carpetaDestino)) {
            mkdir($carpetaDestino, 0777, true);
        }
        $nombreArchivo = uniqid() . "_" . basename($_FILES["foto"]["name"]);
        $rutaArchivo = $carpetaDestino . $nombreArchivo;

        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $rutaArchivo)) {
            $foto = $nombreArchivo;
        }
    }


    try {
        // Preparamos la consulta SQL para insertar los datos
        $sql = "INSERT INTO Personal (ID_Rol, Nombre, ApellidoPaterno, ApellidoMaterno, FechaNacimiento, Calle, NumInterior, NumExterior, CP, Estado, Municipio, Colonia, Region, PaisProcedencia, DireccionTemporal, Sexo, Genero, Email, Tel, NombreContactoEmergencia, TelContactoEmergencia, GradoAcademico, Institucion, AreaAsignada, EstatusPersonal, FechaIngreso, FechaTermino, ClasificacionPersonal, ProblemasSaludConsiderables, ProblemasMovilidad, Observaciones,foto, Password) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        // Preparamos la sentencia
        $stmt = $conn->prepare($sql);
        
        // Vinculamos los parámetros
        $stmt->bindParam(1, $rol);
        $stmt->bindParam(2, $nombre);
        $stmt->bindParam(3, $apellido_paterno);
        $stmt->bindParam(4, $apellido_materno);
        $stmt->bindParam(5, $fecha_nacimiento);
        $stmt->bindParam(6, $calle);
        $stmt->bindParam(7, $num_interior);
        $stmt->bindParam(8, $num_exterior);
        $stmt->bindParam(9, $cp);
        $stmt->bindParam(10, $estado);
        $stmt->bindParam(11, $municipio);
        $stmt->bindParam(12, $colonia);
        $stmt->bindParam(13, $region);
        $stmt->bindParam(14, $pais_procedencia);
        $stmt->bindParam(15, $direccion_temporal);
        $stmt->bindParam(16, $sexo);
        $stmt->bindParam(17, $genero);
        $stmt->bindParam(18, $email);
        $stmt->bindParam(19, $tel);
        $stmt->bindParam(20, $nombre_contacto_emergencia);
        $stmt->bindParam(21, $tel_contacto_emergencia);
        $stmt->bindParam(22, $grado_academico);
        $stmt->bindParam(23, $institucion);
        $stmt->bindParam(24, $area_asignada);
        $stmt->bindParam(25, $estatus_personal);
        $stmt->bindParam(26, $fecha_ingreso);
        $stmt->bindParam(27, $fecha_termino);
        $stmt->bindParam(28, $clasificacion_personal);
        $stmt->bindParam(29, $problemas_salud_considerables);
        $stmt->bindParam(30, $problemas_movilidad);
        $stmt->bindParam(31, $observaciones);
        $stmt->bindParam(32, $foto);
        $stmt->bindParam(33, $hashed_password);

        // Ejecutamos la consulta
       $stmt->execute();
             header("Location: ../pages/ver-personal.php?status=success");
exit();
    } catch (PDOException $e) {
        // Manejar errores de manera adecuada
       header("Location: ../pages/ver-personal.php?status=error&msg=" . urlencode($e->getMessage()));
exit();
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

    
        <div class="container">
        <main>
    <div class="py-5 text-center">
    <img class="d-block mx-auto mb-4" src="../assets/img/logo 1.png" alt="" width="100" height="100">
        <h2>Registro de Personal </h2>
        <p class="lead"></p>
    </div>

    <div class="row g-5">
    <div class="col-xxl-12 col-xxl-12">
        <h4 class="mb-3">Datos Generales</h4>
        <form class="needs-validation" action="register-personal.php" method="POST" enctype="multipart/form-data"  novalidate>
    <div class="row g-3">

            
    <div class="col-sm-12">
        <label for="firstName" class="form-label">Nombre:</label>
        <input type="text" class="form-control" id="firstName" name="nombre" placeholder="" required>
    <div class="invalid-feedback">Se requiere un nombre válido.</div>
    </div>

<div class="mb-3">
  <label class="form-label">Foto</label><br>
  <?php if (!empty($ponente['Foto'])): ?>
    <img src="../uploads/ponentes/<?= htmlspecialchars($ponente['Foto']) ?>" 
         alt="Foto actual" width="100"><br><br>
  <?php endif; ?>
  <input type="file" name="foto" class="form-control">
</div>

    <div class="col-sm-6">
        <label for="lastName" class="form-label">Apellido Paterno:</label>
        <input type="text" class="form-control" id="lastName" name="apellido_paterno" placeholder="" required>
        <div class="invalid-feedback">Se requiere un apellido paterno válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="secondLastName" class="form-label">Apellido Materno:</label>
        <input type="text" class="form-control" id="secondLastName" name="apellido_materno" placeholder="" required>
        <div class="invalid-feedback">Se requiere un apellido materno válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="birthdate" class="form-label">Fecha de Nacimiento:</label>
        <input type="date" class="form-control" id="birthdate" name="fecha_nacimiento" placeholder="" required>
        <div class="invalid-feedback">Se requiere una fecha de nacimiento válida.</div>
    </div>

    <div class="col-sm-6">
        <label for="sexo" class="form-label">Sexo</label>
        <select class="form-select" id="sexo" name="sexo" aria-label="Selecciona una opción" required>
        <option selected disabled value="">Selecciona una opción...</option>
        <option value="MASCULINO">Masculino</option>
        <option value="FEMENINO">Femenino</option>
        <option value="OTRO">Otro</option>
        </select>
        <div class="invalid-feedback">Se requiere una selección válida.</div>
    </div>

    <div class="col-sm-6">
        <label for="genero" class="form-label">Género</label>
        <select class="form-select" id="genero" name="genero" aria-label="Selecciona una opción" required>
        <option selected disabled value="">Selecciona una opción...</option>
        <option value="CISGÉNERO ">CISGÉNERO </option>
        <option value="TRANSGÉNERO">TRANSGÉNERO</option>
        <option value="TRANSGÉNERO">GÉNERO FLUIDO </option>
        <option value="TERCER GÉNERO">TERCER GÉNERO</option>
        <option value="OTRO">Otro</option>
        </select>
        <div class="invalid-feedback">Se requiere una selección válida.</div>
    </div>

    <h4>Datos de Domicilio</h4>
        <hr class="my-4">

    <div class="col-sm-6">
        <label for="calle" class="form-label">Calle</label>
        <input type="text" class="form-control" id="calle" name="calle" placeholder="">
        <div class="invalid-feedback">Se requiere una calle válida.</div>
    </div>

    <div class="col-sm-6">
        <label for="num_interior" class="form-label">Número interior</label>
        <input type="number" class="form-control" id="num_interior" name="num_interior" placeholder="">
        <div class="invalid-feedback">Se requiere un número interior válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="num_exterior" class="form-label">Número exterior</label>
        <input type="number" class="form-control" id="num_exterior" name="num_exterior" placeholder="">
        <div class="invalid-feedback">Se requiere un número exterior válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="cp" class="form-label">Código Postal (CP)</label>
        <input type="text" class="form-control" id="cp" name="cp" placeholder="">
        <div class="invalid-feedback">Se requiere un código postal válido.</div>
    </div>

    <div class="col-sm-6"> 
        <label for="municipio" class="form-label">Municipio</label>
        <select class="form-select" id="municipioss" name="municipio" aria-label="Selecciona una opción" onchange="mostrarRegionn()">
        <option selected disabled value="">Seleccionar municipio...</option>
        <option value="CUILAPAM DE GUERRERO">CUILAPAM DE GUERRERO</option>
        <option value="OAXACA DE JUÁREZ">OAXACA DE JUÁREZ</option>
        <option value="SAN AGUSTIN DE LAS JUNTAS">SAN AGUSTIN DE LAS JUNTAS</option>
        <option value="SAN AGUSTIN YATARENI">SAN AGUSTIN YATARENI</option>
        <option value="SAN ANDRÉS HUAYAPAM">SAN ANDRÉS HUAYAPAM</option>
        <option value="SAN ANDRÉS IXTLAHUACA">SAN ANDRÉS IXTLAHUACA</option>
        <option value="SAN ANTONIO DE LA CAL">SAN ANTONIO DE LA CAL</option>
        <option value="SAN BARTOLO COYOTEPEC">SAN BARTOLO COYOTEPEC</option>
        <option value="SAN JACINTO AMILPAS">SAN JACINTO AMILPAS</option>
        <option value="ANIMAS TRUJANO">ANIMAS TRUJANO</option>
        <option value="SAN PEDRO IXTLAHUACA">SAN PEDRO IXTLAHUACA</option>
        <option value="SAN RAYMUNDO JALPAN">SAN RAYMUNDO JALPAN</option>
        <option value="SAN SEBASTIÁN TUTLA">SAN SEBASTIÁN TUTLA</option>
        <option value="SANTA CRUZ AMILPAS">SANTA CRUZ AMILPAS</option>
        <option value="SANTA CRUZ XOXOCOTLAN">SANTA CRUZ XOXOCOTLAN</option>
        <option value="SANTA LUCIA DEL CAMINO">SANTA LUCIA DEL CAMINO</option>
        <option value="SANTA MARÍA ATZOMPA">SANTA MARÍA ATZOMPA</option>
        <option value="SANTA MARÍA COYOTEPEC">SANTA MARÍA COYOTEPEC</option>
        <option value="SANTA MARÍA EL TULE">SANTA MARÍA EL TULE</option>
        <option value="SANTO DOMINGO TOMALTEPEC">SANTO DOMINGO TOMALTEPEC</option>
        <option value="TLALIXTAC DE CABRERA">TLALIXTAC DE CABRERA</option>
        <option value="COATECAS ALTAS">COATECAS ALTAS</option>
        <option value="LA COMPAÑÍA">LA COMPAÑÍA</option>
        <option value="HEROICA CD. DE EJUTLA DE CRESPO">HEROICA CD. DE EJUTLA DE CRESPO</option>
        <option value="LA PE">LA PE</option>
        <option value="SAN AGUSTIN AMATENGO">SAN AGUSTIN AMATENGO</option>
        <option value="SAN ANDRÉS ZABACHE">SAN ANDRÉS ZABACHE</option>
        <option value="SAN JUAN LACHIGALLA">SAN JUAN LACHIGALLA</option>
        <option value="SAN MARTIN DE LOS CANSECOS">SAN MARTIN DE LOS CANSECOS</option>
        <option value="SAN MARTIN LACHILA">SAN MARTIN LACHILA</option>
        <option value="SAN MIGUEL EJUTLA">SAN MIGUEL EJUTLA</option>
        <option value="SAN VICENTE COATLAN">SAN VICENTE COATLAN</option>
        <option value="TANICHE">TANICHE</option>
        <option value="YOGANA">YOGANA</option>
        <option value="GUADALUPE ETLA">GUADALUPE ETLA</option>
        <option value="MAGDALENA APASCO">MAGDALENA APASCO</option>
        <option value="NAZARENO ETLA">NAZARENO ETLA</option>
        <option value="REYES ETLA">REYES ETLA</option>
        <option value="SAN AGUSTÍN ETLA">SAN AGUSTÍN ETLA</option>
        <option value="SAN ANDRÉS ZAUTLA">SAN ANDRÉS ZAUTLA</option>
        <option value="SAN FELIPE TEJALAPAM">SAN FELIPE TEJALAPAM</option>
        <option value="SAN FRANCISCO TELIXTLAHUACA">SAN FRANCISCO TELIXTLAHUACA</option>
        <option value="SAN JERÓNIMO SOSOLA">SAN JERÓNIMO SOSOLA</option>
        <option value="SAN JUAN BAUTISTA ATATLAUCA">SAN JUAN BAUTISTA ATATLAUCA</option>
        <option value="SAN JUAN BAUTISTA GUELACHE">SAN JUAN BAUTISTA GUELACHE</option>
        <option value="SAN JUAN BAUTISTA JAYACATLAN">SAN JUAN BAUTISTA JAYACATLAN</option>
        <option value="SAN JUAN DEL ESTADO">SAN JUAN DEL ESTADO</option>
        <option value="SAN LORENZO CACAOTEPEC">SAN LORENZO CACAOTEPEC</option>
        <option value="SAN PABLO ETLA">SAN PABLO ETLA</option>
        <option value="SAN PABLO HUITZO">SAN PABLO HUITZO</option>
        <option value="VILLA DE ETLA">VILLA DE ETLA</option>
        <option value="SANTA MARÍA PEÑOLES">SANTA MARÍA PEÑOLES</option>
        <option value="SANTIAGO SUCHILQUITONGO">SANTIAGO SUCHILQUITONGO</option>
        <option value="SANTIAGO TENANGO">SANTIAGO TENANGO</option>
        <option value="SANTIAGO TLASOYALTEPEC">SANTIAGO TLASOYALTEPEC</option>
        <option value="SANTO TOMÁS MAZALTEPEC">SANTO TOMÁS MAZALTEPEC</option>
        <option value="SOLEDAD ETLA">SOLEDAD ETLA</option>
        <option value="ASUNCIÓN OCOTLÁN">ASUNCIÓN OCOTLÁN</option>
        <option value="MAGDALENA OCOTLAN">MAGDALENA OCOTLAN</option>
        <option value="OCOTLAN DE MORELOS">OCOTLAN DE MORELOS</option>
        <option value="SAN JOSÉ DEL PROGRESO">SAN JOSÉ DEL PROGRESO</option>
        <option value="SAN ANTONINO CASTILLO VELASCO">SAN ANTONINO CASTILLO VELASCO</option>
        <option value="SAN BALTAZAR CHICHICAPAM">SAN BALTAZAR CHICHICAPAM</option>
        <option value="SAN DIONISIO OCOTLAN">SAN DIONISIO OCOTLAN</option>
        <option value="SAN JERÓNIMO TAVICHE">SAN JERÓNIMO TAVICHE</option>
        <option value="SAN JUAN CHILATECA">SAN JUAN CHILATECA</option>
        <option value="SAN MARTÍN TILCAJETE">SAN MARTÍN TILCAJETE</option>
        <option value="SAN MIGUEL TILQUIAPAM">SAN MIGUEL TILQUIAPAM</option>
        <option value="SAN PEDRO APÓSTOL">SAN PEDRO APÓSTOL</option>
        <option value="SAN PEDRO MARTIR">SAN PEDRO MARTIR</option>
        <option value="SAN PEDRO TAVICHE">SAN PEDRO TAVICHE</option>
        <option value="SANTA ANA ZEGACHE">SANTA ANA ZEGACHE</option>
        <option value="SANTA CATARINA MINAS">SANTA CATARINA MINAS</option>
        <option value="SANTA LUCIA OCOTLAN">SANTA LUCIA OCOTLAN</option>
        <option value="SANTIAGO APÓSTOL">SANTIAGO APÓSTOL</option>
        <option value="SANTO TOMÁS JALIEZA">SANTO TOMÁS JALIEZA</option>
        <option value="YAXE">YAXE</option>
        <option value="MAGDALENA TEITIPAC">MAGDALENA TEITIPAC</option>
        <option value="ROJAS DE CUAHUTEMOC">ROJAS DE CUAHUTEMOC</option>
        <option value="SAN BARTOLOMÉ QUIALANA">SAN BARTOLOMÉ QUIALANA</option>
        <option value="SAN DIONISIO OCOTEPEC">SAN DIONISIO OCOTEPEC</option>
        <option value="SAN FRANCISCO LACHIGOLO">SAN FRANCISCO LACHIGOLO</option>
        <option value="SAN JUAN DEL RIO">SAN JUAN DEL RIO</option>
        <option value="SAN JUAN GUELAVIA">SAN JUAN GUELAVIA</option>
        <option value="SAN JUAN TEITIPAC">SAN JUAN TEITIPAC</option>
        <option value="SAN LORENZO ALBARRADAS">SAN LORENZO ALBARRADAS</option>
        <option value="SAN LUCAS QUIAVINI">SAN LUCAS QUIAVINI</option>
        <option value="SAN PABLO VILLA DE MITLA">SAN PABLO VILLA DE MITLA</option>
        <option value="SAN PEDRO QUIATONI">SAN PEDRO QUIATONI</option>
        <option value="SAN PEDRO TOTOLAPAN">SAN PEDRO TOTOLAPAN</option>
        <option value="SAN SEBASTIÁN ABASOLO">SAN SEBASTIÁN ABASOLO</option>
        <option value="SAN SEBASTIÁN TEITIPAC">SAN SEBASTIÁN TEITIPAC</option>
        <option value="SANTA ANA DEL VALLE">SANTA ANA DEL VALLE</option>
        <option value="SANTA CRUZ PAPALUTLA">SANTA CRUZ PAPALUTLA</option>
        <option value="SANTA MARÍA GUELACE">SANTA MARÍA GUELACE</option>
        <option value="SANTA MARÍA ZOQUITLAN">SANTA MARÍA ZOQUITLAN</option>
        <option value="SANTIAGO MATATLAN">SANTIAGO MATATLAN</option>
        <option value="SANTO DOMINGO ALBARRADAS">SANTO DOMINGO ALBARRADAS</option>
        <option value="TEOTITLAN DEL VALLE">TEOTITLAN DEL VALLE</option>
        <option value="SAN JERONIMO TLACOCHAHUAYA">SAN JERONIMO TLACOCHAHUAYA</option>
        <option value="TLACOLULA DE MATAMOROS">TLACOLULA DE MATAMOROS</option>
        <option value="VILLA DE DIAZ ORDAZ">VILLA DE DIAZ ORDAZ</option>
        <option value="SAN ANTONIO HUITEPEC">SAN ANTONIO HUITEPEC</option>
        <option value="SAN MIGUEL PERAS">SAN MIGUEL PERAS</option>
        <option value="SAN PABLO CUATRO VENADOS">SAN PABLO CUATRO VENADOS</option>
        <option value="SANTA INES DEL MONTE">SANTA INES DEL MONTE</option>
        <option value="TRINIDAD ZAACHILA">TRINIDAD ZAACHILA</option>
        <option value="VILLA DE ZAACHILA">VILLA DE ZAACHILA</option>
        <option value="CIÉNEGA DE ZIMATLAN">CIÉNEGA DE ZIMATLAN</option>
        <option value="MAGDALENA MIXTEPEC">MAGDALENA MIXTEPEC</option>
        <option value="SAN ANTONIO EL ALTO">SAN ANTONIO EL ALTO</option>
        <option value="SAN BERNARDO MIXTEPEC">SAN BERNARDO MIXTEPEC</option>
        <option value="SAN MIGUEL MIXTEPEC">SAN MIGUEL MIXTEPEC</option>
        <option value="SAN PABLO HUIXTEPEC">SAN PABLO HUIXTEPEC</option>
        <option value="SANTA ANA TLAPACOYAN">SANTA ANA TLAPACOYAN</option>
        <option value="SANTA CATARINA QUIANE">SANTA CATARINA QUIANE</option>
        <option value="SANTA CRUZ MIXTEPEC">SANTA CRUZ MIXTEPEC</option>
        <option value="SANTA GERTRUDIS">SANTA GERTRUDIS</option>
        <option value="SANTA INES YATZECHE">SANTA INES YATZECHE</option>
        <option value="AYOQUEZCO DE ALDAMA">AYOQUEZCO DE ALDAMA</option>
        <option value="ZIMATLÁN DE ALVAREZ">ZIMATLÁN DE ALVAREZ</option>
        <option value="MARTIRES DE TACUBAYA">MARTIRES DE TACUBAYA</option>
        <option value="PINOTEPA DE DON LUIS">PINOTEPA DE DON LUIS</option>
        <option value="SAN AGUSTIN CHAYUCO">SAN AGUSTIN CHAYUCO</option>
        <option value="SAN ANDRÉS HUAXPALTEPEC">SAN ANDRÉS HUAXPALTEPEC</option>
        <option value="SAN ANTONIO TEPETLAPA">SAN ANTONIO TEPETLAPA</option>
        <option value="SAN JOSE ESTANCIA GRANDE">SAN JOSE ESTANCIA GRANDE</option>
        <option value="SAN JUAN BAUTISTA LO DE SOTO">SAN JUAN BAUTISTA LO DE SOTO</option>
        <option value="SAN JUAN CACAHUATEPEC">SAN JUAN CACAHUATEPEC</option>
        <option value="SAN JUAN COLORADO">SAN JUAN COLORADO</option>
        <option value="SAN LORENZO">SAN LORENZO</option>
        <option value="SAN MIGUEL TLACAMAMA">SAN MIGUEL TLACAMAMA</option>
        <option value="SAN PEDRO ATOYAC">SAN PEDRO ATOYAC</option>
        <option value="SAN PEDRO JICAYAN">SAN PEDRO JICAYAN</option>
        <option value="SAN SEBASTIÁN IXCAPAC">SAN SEBASTIÁN IXCAPAC</option>
        <option value="SANTA CATARINA MECHOACAN">SANTA CATARINA MECHOACAN</option>
        <option value="SANTA MARÍA CORTIJO">SANTA MARÍA CORTIJO</option>
        <option value="SANTA MARÍA HUAZOLOTITLAN">SANTA MARÍA HUAZOLOTITLAN</option>
        <option value="SANTIAGO IXTAYUTLA">SANTIAGO IXTAYUTLA</option>
        <option value="SANTIAGO JAMILTEPEC">SANTIAGO JAMILTEPEC</option>
        <option value="SANTIAGO LLANO GRANDE">SANTIAGO LLANO GRANDE</option>
        <option value="SANTIAGO PINOTEPA NACIONAL">SANTIAGO PINOTEPA NACIONAL</option>
        <option value="SANTIAGO TEPEXTLA">SANTIAGO TEPEXTLA</option>
        <option value="SANTIAGO TETEPEC">SANTIAGO TETEPEC</option>
        <option value="SANTO DOMINGO ARMENTA">SANTO DOMINGO ARMENTA</option>
        <option value="SAN GABRIEL MIXTEPEC">SAN GABRIEL MIXTEPEC</option>
        <option value="SAN JUAN LACHAO">SAN JUAN LACHAO</option>
        <option value="SAN JUAN QUIAHIJE">SAN JUAN QUIAHIJE</option>
        <option value="SAN MIGUEL PANIXTLAHUACA">SAN MIGUEL PANIXTLAHUACA</option>
        <option value="SAN PEDRO JUCHATENGO">SAN PEDRO JUCHATENGO</option>
        <option value="SAN PEDRO MIXTEPEC">SAN PEDRO MIXTEPEC</option>
        <option value="VILLA DE TUTUTEPEC DE MELCHOR OCAMPO">VILLA DE TUTUTEPEC DE MELCHOR OCAMPO</option>
        <option value="SANTA CATARINA JUQUILA">SANTA CATARINA JUQUILA</option>
        <option value="SANTA MARÍA TEMAXCALTEPEC">SANTA MARÍA TEMAXCALTEPEC</option>
        <option value="SANTIAGO YAITEPEC">SANTIAGO YAITEPEC</option>
        <option value="SANTOS REYES NOPALA">SANTOS REYES NOPALA</option>
        <option value="TATALTEPEC DE VALDES">TATALTEPEC DE VALDES</option>
        <option value="CANDELARIA LOXICHA">CANDELARIA LOXICHA</option>
        <option value="PLUMA HIDALGO">PLUMA HIDALGO</option>
        <option value="SAN AGUSTIN LOXICHA">SAN AGUSTIN LOXICHA</option>
        <option value="SAN BALTAZAR LOXICHA">SAN BALTAZAR LOXICHA</option>
        <option value="SAN BARTOLOMÉ LOXICHA">SAN BARTOLOMÉ LOXICHA</option>
        <option value="SAN MATEO PIÑAS">SAN MATEO PIÑAS</option>
        <option value="SAN MIGUEL DEL PUERO">SAN MIGUEL DEL PUERO</option>
        <option value="SAN PEDRO EL ALTO">SAN PEDRO EL ALTO</option>
        <option value="SAN PEDRO POCHUTLA">SAN PEDRO POCHUTLA</option>
        <option value="SANTA CATARINA LOXICHA">SANTA CATARINA LOXICHA</option>
        <option value="SANTA MARÍA COLOTEPEC">SANTA MARÍA COLOTEPEC</option>
        <option value="SANTA MARÍA HUATULCO">SANTA MARÍA HUATULCO</option>
        <option value="SANTA MARÍA TONAMECA">SANTA MARÍA TONAMECA</option>
        <option value="SANTO DOMINGO DE MORELOS">SANTO DOMINGO DE MORELOS</option>
        <option value="CONCEPCIÓN PÁPALO">CONCEPCIÓN PÁPALO</option>
        <option value="CUYAMECALCO VILLA DE ZARAGOZA">CUYAMECALCO VILLA DE ZARAGOZA</option>
        <option value="CHIQUIHUITLAN DE BENITO JUÁREZ">CHIQUIHUITLAN DE BENITO JUÁREZ</option>
        <option value="SAN ANDRÉS TEOTILÁPAM">SAN ANDRÉS TEOTILÁPAM</option>
        <option value="SAN FRANCISCO CHAPULAPA">SAN FRANCISCO CHAPULAPA</option>
        <option value="SAN JUAN BAUTISTA CUICATLÁN">SAN JUAN BAUTISTA CUICATLÁN</option>
        <option value="SAN JUAN BAUTISTA TLACOATZINTEPEC">SAN JUAN BAUTISTA TLACOATZINTEPEC</option>
        <option value="SAN JUAN TEPEUXILA">SAN JUAN TEPEUXILA</option>
        <option value="SAN MIGUEL SANTA FLOR">SAN MIGUEL SANTA FLOR</option>
        <option value="SAN PEDRO JALTEPETONGO">SAN PEDRO JALTEPETONGO</option>
        <option value="SAN PEDRO JOCOTIPAC">SAN PEDRO JOCOTIPAC</option>
        <option value="SAN PEDRO SOCHIAPAM">SAN PEDRO SOCHIAPAM</option>
        <option value="SAN PEDRO TEUTILA">SAN PEDRO TEUTILA</option>
        <option value="SANTA ANA CUAUHTÉMOC">SANTA ANA CUAUHTÉMOC</option>
        <option value="SANTA MARÍA PÁPALO">SANTA MARÍA PÁPALO</option>
        <option value="SANTA MARÍA TEXCATITLÁN">SANTA MARÍA TEXCATITLÁN</option>
        <option value="SANTA MARÍA TLALIXTAC">SANTA MARÍA TLALIXTAC</option>
        <option value="SANTIAGO NACALTEPEC">SANTIAGO NACALTEPEC</option>
        <option value="SANTOS REYES PÁPALO">SANTOS REYES PÁPALO</option>
        <option value="VALERIO TRUJANO">VALERIO TRUJANO</option>
        <option value="ELOXOCHITLÁN DE FLORES MAGÓN">ELOXOCHITLÁN DE FLORES MAGÓN</option>
        <option value="SAN MIGUEL HUAUTEPEC">SAN MIGUEL HUAUTEPEC</option>
        <option value="HUAUTLA DE JIMÉNEZ">HUAUTLA DE JIMÉNEZ</option>
        <option value="MAZATLÁN VILLA DE FLORES">MAZATLÁN VILLA DE FLORES</option>
        <option value="SAN ANTONIO NANAHUATIPAM">SAN ANTONIO NANAHUATIPAM</option>
        <option value="SAN BARTOLOMÉ AYAUTLA">SAN BARTOLOMÉ AYAUTLA</option>
        <option value="SAN FRANCISCO HUEHUETLÁN">SAN FRANCISCO HUEHUETLÁN</option>
        <option value="SAN JERÓNIMO TECOATL">SAN JERÓNIMO TECOATL</option>
        <option value="SAN JOSÉ TENANGO">SAN JOSÉ TENANGO</option>
        <option value="SAN JUAN COATZOSPAM">SAN JUAN COATZOSPAM</option>
        <option value="SAN JUAN DE LOS CUES">SAN JUAN DE LOS CUES</option>
        <option value="SAN LORENZO CUANECUILTITLA">SAN LORENZO CUANECUILTITLA</option>
        <option value="SAN LUCAS ZOQUIAPAM">SAN LUCAS ZOQUIAPAM</option>
        <option value="SAN MARTÍN TOXPALAN">SAN MARTÍN TOXPALAN</option>
        <option value="SAN MATEO YOLOXCHITLAN">SAN MATEO YOLOXCHITLAN</option>
        <option value="SAN PEDRO OCOPETATILLO">SAN PEDRO OCOPETATILLO</option>
        <option value="SANTA ANA ATEIXTLAHUACA">SANTA ANA ATEIXTLAHUACA</option>
        <option value="SANTA CRUZ ACATEPEC">SANTA CRUZ ACATEPEC</option>
        <option value="SANTA MARÍA LA ASUNCIÓN">SANTA MARÍA LA ASUNCIÓN</option>
        <option value="SANTA MARÍA CHILCHOTLA">SANTA MARÍA CHILCHOTLA</option>
        <option value="SANTA MARÍA IXCATLÁN">SANTA MARÍA IXCATLÁN</option>
        <option value="SANTA MARÍA TECOMAVACA">SANTA MARÍA TECOMAVACA</option>
        <option value="SANTA MARÍA TEOPOXCO">SANTA MARÍA TEOPOXCO</option>
        <option value="SANTIAGO TEXCALCINGO">SANTIAGO TEXCALCINGO</option>
        <option value="TEOTITLAN DE FLORES MAGÓN">TEOTITLAN DE FLORES MAGÓN</option>
        <option value="ASUNCIÓN IXTALTEPEC">ASUNCIÓN IXTALTEPEC</option>
        <option value="BARRIO DE LA SOLEDAD">BARRIO DE LA SOLEDAD</option>
        <option value="CIUDAD IXTEPEC">CIUDAD IXTEPEC</option>
        <option value="CHAHUITES">CHAHUITES</option>
        <option value="EL ESPINAL">EL ESPINAL</option>
        <option value="JUCHITAN DE ZARAGOZA">JUCHITAN DE ZARAGOZA</option>
        <option value="MATIAS ROMERO">MATIAS ROMERO</option>
        <option value="SANTIAGO NILTEPEC">SANTIAGO NILTEPEC</option>
        <option value="REFORMA DE PINEDA">REFORMA DE PINEDA</option>
        <option value="SAN DIONISIO DEL MAR">SAN DIONISIO DEL MAR</option>
        <option value="SAN FRANCISCO DEL MAR">SAN FRANCISCO DEL MAR</option>
        <option value="SAN FRANCISCO IXHUATAN">SAN FRANCISCO IXHUATAN</option>
        <option value="SAN JUAN GUICHICOVI">SAN JUAN GUICHICOVI</option>
        <option value="SAN MIGUEL CHIMALAPA">SAN MIGUEL CHIMALAPA</option>
        <option value="SAN PEDRO TAPANATEPEC">SAN PEDRO TAPANATEPEC</option>
        <option value="SANTA MARÍA CHIMALAPA">SANTA MARÍA CHIMALAPA</option>
        <option value="SANTA MARÍA PETAPA">SANTA MARÍA PETAPA</option>
        <option value="SANTA MARÍA XADANI">SANTA MARÍA XADANI</option>
        <option value="SANTO DOMINGO INGENIO">SANTO DOMINGO INGENIO</option>
        <option value="SANTO DOMINGO PETAPA">SANTO DOMINGO PETAPA</option>
        <option value="SANTO DOMINGO ZANATEPEC">SANTO DOMINGO ZANATEPEC</option>
        <option value="UNIÓN HIDALGO">UNIÓN HIDALGO</option>
        <option value="GUEVEA DE HUMBOLT">GUEVEA DE HUMBOLT</option>
        <option value="MAGDALENA TEQUISISTLAN">MAGDALENA TEQUISISTLAN</option>
        <option value="MAGDALENA TLACOTEPEC">MAGDALENA TLACOTEPEC</option>
        <option value="SALINA CRUZ">SALINA CRUZ</option>
        <option value="SAN BLAS ATEMPA">SAN BLAS ATEMPA</option>
        <option value="SAN MATEO DEL MAR">SAN MATEO DEL MAR</option>
        <option value="SAN MIGUEL TENANGO">SAN MIGUEL TENANGO</option>
        <option value="SAN PEDRO COMITANCILLO">SAN PEDRO COMITANCILLO</option>
        <option value="SAN PEDRO HUAMELULA">SAN PEDRO HUAMELULA</option>
        <option value="SAN PEDRO HUILOTEPEC">SAN PEDRO HUILOTEPEC</option>
        <option value="SANTA MARÍA GUIENAGATI">SANTA MARÍA GUIENAGATI</option>
        <option value="SANTA MARÍA JALAPA DEL MARQUEZ">SANTA MARÍA JALAPA DEL MARQUEZ</option>
        <option value="SANTA MARÍA MIXTEQUILLA">SANTA MARÍA MIXTEQUILLA</option>
        <option value="SANTA MARÍA TOTOLAPILLA">SANTA MARÍA TOTOLAPILLA</option>
        <option value="SANTIAGO ASTATA">SANTIAGO ASTATA</option>
        <option value="SANTIAGO LACHIGUIRI">SANTIAGO LACHIGUIRI</option>
        <option value="SANTIAGO LAOLLAGA">SANTIAGO LAOLLAGA</option>
        <option value="SANTO DOMINGO CHIHUITAN">SANTO DOMINGO CHIHUITAN</option>
        <option value="SANTO DOMINGO TEHUANTEPEC">SANTO DOMINGO TEHUANTEPEC</option>
        <option value="CONCEPCIÓN BUENAVISTA">CONCEPCIÓN BUENAVISTA</option>
        <option value="SANTA MAGDALENA JICOTLÁN">SANTA MAGDALENA JICOTLÁN</option>
        <option value="SAN CRISTÓBAL SUCHIXTLAHUACA">SAN CRISTÓBAL SUCHIXTLAHUACA</option>
        <option value="SAN FRANCISCO TEOPAN">SAN FRANCISCO TEOPAN</option>
        <option value="SAN JUAN BAUTISTA COIXTLAHUACA">SAN JUAN BAUTISTA COIXTLAHUACA</option>
        <option value="SAN MATEO TLAPILTEPEC">SAN MATEO TLAPILTEPEC</option>
        <option value="SAN MIGUEL TEQUIXTEPEC">SAN MIGUEL TEQUIXTEPEC</option>
        <option value="SAN MIGUEL TULANCINGO">SAN MIGUEL TULANCINGO</option>
        <option value="SANTA MARÍA NATIVITAS">SANTA MARÍA NATIVITAS</option>
        <option value="SANTIAGO IHUITLÁN PLUMAS">SANTIAGO IHUITLÁN PLUMAS</option>
        <option value="SANTIAGO TEPETLAPA">SANTIAGO TEPETLAPA</option>
        <option value="TEPELMEME VILLA DE MORELOS">TEPELMEME VILLA DE MORELOS</option>
        <option value="TLACOTEPEC PLUMAS">TLACOTEPEC PLUMAS</option>
        <option value="ASUNCIÓN CUYOTEPEJI">ASUNCIÓN CUYOTEPEJI</option>
        <option value="COSOLTEPEC">COSOLTEPEC</option>
        <option value="FRESNILLO DE TRUJANO">FRESNILLO DE TRUJANO</option>
        <option value="HUAJUAPAM DE LEÓN">HUAJUAPAM DE LEÓN</option>
        <option value="MARISCALA DE JUÁREZ">MARISCALA DE JUÁREZ</option>
        <option value="SAN ANDRÉS DINICUITI">SAN ANDRÉS DINICUITI</option>
        <option value="SAN JERÓNIMO SILACOYOAPILLA">SAN JERÓNIMO SILACOYOAPILLA</option>
        <option value="SAN JORGE NUCHITA">SAN JORGE NUCHITA</option>
        <option value="SAN JOSÉ AYUQUILILLA">SAN JOSÉ AYUQUILILLA</option>
        <option value="SAN JUAN BAUTISTA SUCHIXTEPEC">SAN JUAN BAUTISTA SUCHIXTEPEC</option>
        <option value="SAN MARCOS ARTEAGA">SAN MARCOS ARTEAGA</option>
        <option value="SAN MARTÍN ZACATEPEC">SAN MARTÍN ZACATEPEC</option>
        <option value="SAN MIGUEL AMATITLÁN">SAN MIGUEL AMATITLÁN</option>
        <option value="SAN PEDRO Y SAN PABLO TEQUIXTEPEC">SAN PEDRO Y SAN PABLO TEQUIXTEPEC</option>
        <option value="SAN SIMÓN ZAHUATLÁN">SAN SIMÓN ZAHUATLÁN</option>
        <option value="SANTA CATARINA ZAPOQUILLA">SANTA CATARINA ZAPOQUILLA</option>
        <option value="SANTA CRUZ TACACHE DE MINA">SANTA CRUZ TACACHE DE MINA</option>
        <option value="SANTA MARÍA CAMOTLÁN">SANTA MARÍA CAMOTLÁN</option>
        <option value="SANTIAGO AYUQUILLA">SANTIAGO AYUQUILLA</option>
        <option value="SANTIAGO CACALOXTEPEC">SANTIAGO CACALOXTEPEC</option>
        <option value="SANTIAGO CHAZUMBA">SANTIAGO CHAZUMBA</option>
        <option value="SANTIAGO HUAJOLOTITLÁN">SANTIAGO HUAJOLOTITLÁN</option>
        <option value="SANTIAGO MILTEPEC">SANTIAGO MILTEPEC</option>
        <option value="SANTO DOMINGO TONALÁ">SANTO DOMINGO TONALÁ</option>
        <option value="SANTO DOMINGO YODOHINO">SANTO DOMINGO YODOHINO</option>
        <option value="SANTOS REYES YUCUNA">SANTOS REYES YUCUNA</option>
        <option value="TEZOATLÁN DE SEGURA Y LUNA">TEZOATLÁN DE SEGURA Y LUNA</option>
        <option value="ZAPOTITLÁN PALMAS">ZAPOTITLÁN PALMAS</option>
        <option value="COICOYÁN DE LAS FLORES">COICOYÁN DE LAS FLORES</option>
        <option value="SAN JUAN MIXTEPEC">SAN JUAN MIXTEPEC</option>
        <option value="SAN MARTÍN PERAS">SAN MARTÍN PERAS</option>
        <option value="SAN MIGUEL TLACOTEPEC">SAN MIGUEL TLACOTEPEC</option>
        <option value="SAN SEBASTIÁN TECOMAXTLAHUACA">SAN SEBASTIÁN TECOMAXTLAHUACA</option>
        <option value="SANTIAGO JUXTLAHUACA">SANTIAGO JUXTLAHUACA</option>
        <option value="SANTOS REYES TEPEJILLO">SANTOS REYES TEPEJILLO</option>
        <option value="ASUNCIÓN NOCHIXTLÁN">ASUNCIÓN NOCHIXTLÁN</option>
        <option value="MAGDALENA JALTEPEC">MAGDALENA JALTEPEC</option>
        <option value="MAGDALENA ZAHUATLÁN">MAGDALENA ZAHUATLÁN</option>
        <option value="SAN ANDRÉS NUXIÑO">SAN ANDRÉS NUXIÑO</option>
        <option value="SAN ANDRÉS SINAXTLA">SAN ANDRÉS SINAXTLA</option>
        <option value="SAN FRANCISCO CHINDÚA">SAN FRANCISCO CHINDÚA</option>
        <option value="SAN FRANCISCO JALTEPETONGO">SAN FRANCISCO JALTEPETONGO</option>
        <option value="SAN FRANCISCO NUXAÑO">SAN FRANCISCO NUXAÑO</option>
        <option value="SAN JUAN DIUXI">SAN JUAN DIUXI</option>
        <option value="SAN JUAN SAYULTEPEC">SAN JUAN SAYULTEPEC</option>
        <option value="SAN JUAN TAMAZOLA">SAN JUAN TAMAZOLA</option>
        <option value="SAN JUAN YUCUITA">SAN JUAN YUCUITA</option>
        <option value="SAN MATEO ETLATONGO">SAN MATEO ETLATONGO</option>
        <option value="SAN MATEO SINDIHUI">SAN MATEO SINDIHUI</option>
        <option value="SAN MIGUEL CHICAHUA">SAN MIGUEL CHICAHUA</option>
        <option value="SAN MIGUEL HUATLA">SAN MIGUEL HUATLA</option>
        <option value="SAN MIGUEL PIEDRAS">SAN MIGUEL PIEDRAS</option>
        <option value="SAN MIGUEL TECOMATLÁN">SAN MIGUEL TECOMATLÁN</option>
        <option value="SAN PEDRO COXCALTEPEC CÁNTAROS">SAN PEDRO COXCALTEPEC CÁNTAROS</option>
        <option value="SAN PEDRO TEOZACOALCO">SAN PEDRO TEOZACOALCO</option>
        <option value="SAN PEDRO TIDAÁ">SAN PEDRO TIDAÁ</option>
        <option value="SANTA MARÍA APAZCO">SANTA MARÍA APAZCO</option>
        <option value="SANTA MARÍA CHACHOAPAM">SANTA MARÍA CHACHOAPAM</option>
        <option value="SANTIAGO APOALA">SANTIAGO APOALA</option>
        <option value="SANTIAGO HUAUCLILLA">SANTIAGO HUAUCLILLA</option>
        <option value="SANTIAGO TILALTONGO">SANTIAGO TILALTONGO</option>
        <option value="SANTIAGO TILLO">SANTIAGO TILLO</option>
        <option value="SANTO DOMINGO NUXAÁ">SANTO DOMINGO NUXAÁ</option>
        <option value="SANTO DOMINGO YANHUITLÁN">SANTO DOMINGO YANHUITLÁN</option>
        <option value="MAGDALENA YODOCONO DE PORFIRIO DÍAZ">MAGDALENA YODOCONO DE PORFIRIO DÍAZ</option>
        <option value="YUTANDUCHI DE GUERRERO">YUTANDUCHI DE GUERRERO</option>
        <option value="SANTA INÉS DE ZARAGOZA">SANTA INÉS DE ZARAGOZA</option>
        <option value="CALIHUALA">CALIHUALA</option>
        <option value="GUADALUPE DE RAMÍREZ">GUADALUPE DE RAMÍREZ</option>
        <option value="IXPANTEPEC NIEVES">IXPANTEPEC NIEVES</option>
        <option value="SAN AGUSTÍN ATENANGO">SAN AGUSTÍN ATENANGO</option>
        <option value="SAN ANDRÉS TEPETLAPA">SAN ANDRÉS TEPETLAPA</option>
        <option value="SAN FRANCISCO TLAPANCINGO">SAN FRANCISCO TLAPANCINGO</option>
        <option value="SAN JUAN BAUTISTA TLACHICHILCO">SAN JUAN BAUTISTA TLACHICHILCO</option>
        <option value="SAN JUAN CIENEGUILLA">SAN JUAN CIENEGUILLA</option>
        <option value="SAN JUAN IHUALTEPEC">SAN JUAN IHUALTEPEC</option>
        <option value="SAN LORENZO VICTORIA">SAN LORENZO VICTORIA</option>
        <option value="SAN MATEO NEJAPAM">SAN MATEO NEJAPAM</option>
        <option value="SAN MIGUEL AHUEHUETITLAN">SAN MIGUEL AHUEHUETITLAN</option>
        <option value="SAN NICOLÁS HIDALGO">SAN NICOLÁS HIDALGO</option>
        <option value="SANTA CRUZ DE BRAVO">SANTA CRUZ DE BRAVO</option>
        <option value="SANTIAGO DEL RÍO">SANTIAGO DEL RÍO</option>
        <option value="SANTIAGO TAMAZOLA">SANTIAGO TAMAZOLA</option>
        <option value="SANTIAGO YUCUYACHI">SANTIAGO YUCUYACHI</option>
        <option value="SILACAYOAPAM">SILACAYOAPAM</option>
        <option value="ZAPOTITLAN LAGUNAS">ZAPOTITLAN LAGUNAS</option>
        <option value="SAN ANDRÉS LAGUNAS">SAN ANDRÉS LAGUNAS</option>
        <option value="SAN ANTONIO MONTE VERDE">SAN ANTONIO MONTE VERDE</option>
        <option value="SAN ANTONIO ACUTLA">SAN ANTONIO ACUTLA</option>
        <option value="SAN BARTOLO SOYALTEPEC">SAN BARTOLO SOYALTEPEC</option>
        <option value="SAN JUAN TEPOSCOLULA">SAN JUAN TEPOSCOLULA</option>
        <option value="SAN PEDRO NOPALA">SAN PEDRO NOPALA</option>
        <option value="SAN PEDRO TOPILTEPEC">SAN PEDRO TOPILTEPEC</option>
        <option value="SAN PEDRO Y SAN PABLO TEPOSCOLULA">SAN PEDRO Y SAN PABLO TEPOSCOLULA</option>
        <option value="SAN PEDRO YUCUNAMA">SAN PEDRO YUCUNAMA</option>
        <option value="SAN SEBASTIÁN NICANANDUTA">SAN SEBASTIÁN NICANANDUTA</option>
        <option value="VILLA CHILAPA DE DÍAZ">VILLA CHILAPA DE DÍAZ</option>
        <option value="SANTA MARÍA NDUAYACO">SANTA MARÍA NDUAYACO</option>
        <option value="SANTIAGO NEJAPILLA">SANTIAGO NEJAPILLA</option>
        <option value="VILLA TEJUPAM DE LA UNIÓN">VILLA TEJUPAM DE LA UNIÓN</option>
        <option value="SANTIAGO YOLOMÉCATL">SANTIAGO YOLOMÉCATL</option>
        <option value="SANTO DOMINGO TLATAYAPAM">SANTO DOMINGO TLATAYAPAM</option>
        <option value="SANTO DOMINGO TONALTEPEC">SANTO DOMINGO TONALTEPEC</option>
        <option value="SAN VICENTE NUYU">SAN VICENTE NUYU</option>
        <option value="VILLA DE TAMAZULAPAM DEL PROGRESO">VILLA DE TAMAZULAPAM DEL PROGRESO</option>
        <option value="SANTIAGO TEOTONGO">SANTIAGO TEOTONGO</option>
        <option value="LA TRINIDAD VISTA HERMOSA">LA TRINIDAD VISTA HERMOSA</option>
        <option value="CHALCATONGO DE HIDALGO">CHALCATONGO DE HIDALGO</option>
        <option value="MAGDALENA PEÑASCO">MAGDALENA PEÑASCO</option>
        <option value="SAN AGUSTÍN TLACOTEPEC">SAN AGUSTÍN TLACOTEPEC</option>
        <option value="SAN ANTONIO SINACAHUA">SAN ANTONIO SINACAHUA</option>
        <option value="SAN BARTOLOMÉ YUCUAÑE">SAN BARTOLOMÉ YUCUAÑE</option>
        <option value="SAN CRISTÓBAL AMOLTEPEC">SAN CRISTÓBAL AMOLTEPEC</option>
        <option value="SAN ESTEBAN ATATLAHUACA">SAN ESTEBAN ATATLAHUACA</option>
        <option value="SAN JUAN ACHIUTLA">SAN JUAN ACHIUTLA</option>
        <option value="SAN JUAN ÑUMI">SAN JUAN ÑUMI</option>
        <option value="SAN JUAN TEITA">SAN JUAN TEITA</option>
        <option value="SAN MARTÍN HUAMELULPAM">SAN MARTÍN HUAMELULPAM</option>
        <option value="SAN MARTÍN ITUNYOSO">SAN MARTÍN ITUNYOSO</option>
        <option value="SAN MATEO PEÑASCO">SAN MATEO PEÑASCO</option>
        <option value="SAN MIGUEL ACHIUTLA">SAN MIGUEL ACHIUTLA</option>
        <option value="SAN MIGUEL EL GRANDE">SAN MIGUEL EL GRANDE</option>
        <option value="SAN PABLO TIJALTEPEC">SAN PABLO TIJALTEPEC</option>
        <option value="SAN PEDRO MARTIR YUCOXACO">SAN PEDRO MARTIR YUCOXACO</option>
        <option value="SAN PEDRO MOLINOS">SAN PEDRO MOLINOS</option>
        <option value="SANTA CATARINA TAYATA">SANTA CATARINA TAYATA</option>
        <option value="SANTA CATARINA TICUA">SANTA CATARINA TICUA</option>
        <option value="SANTA CATARINA YOSONOTU">SANTA CATARINA YOSONOTU</option>
        <option value="SANTA CRUZ NUNDACO">SANTA CRUZ NUNDACO</option>
        <option value="SANTA CRUZ TACAHUA">SANTA CRUZ TACAHUA</option>
        <option value="SANTA CRUZ TAYATA">SANTA CRUZ TAYATA</option>
        <option value="HEROICA CIUDAD DE TLAXIACO">HEROICA CIUDAD DE TLAXIACO</option>
        <option value="SANTA MARÍA DEL ROSARIO">SANTA MARÍA DEL ROSARIO</option>
        <option value="SANTA MARÍA TATALTEPEC">SANTA MARÍA TATALTEPEC</option>
        <option value="SANTA MARÍA YOLOTEPEC">SANTA MARÍA YOLOTEPEC</option>
        <option value="SANTA MARÍA YOSOYUA">SANTA MARÍA YOSOYUA</option>
        <option value="SANTA MARÍA YUCUITI">SANTA MARÍA YUCUITI</option>
        <option value="SANTIAGO NUNDICHI">SANTIAGO NUNDICHI</option>
        <option value="SANTIAGO NOYOO">SANTIAGO NOYOO</option>
        <option value="SANTIAGO YOSONDUA">SANTIAGO YOSONDUA</option>
        <option value="SANTO DOMINGO IXCATLAN">SANTO DOMINGO IXCATLAN</option>
        <option value="SANTO TOMÁS OCOTEPEC">SANTO TOMÁS OCOTEPEC</option>
        <option value="SAN JUAN COMALTEPEC">SAN JUAN COMALTEPEC</option>
        <option value="SAN JUAN LALANA">SAN JUAN LALANA</option>
        <option value="SAN JUAN PETLAPA">SAN JUAN PETLAPA</option>
        <option value="SANTIAGO CHOAPAM">SANTIAGO CHOAPAM</option>
        <option value="SANTIAGO JOCOTEPEC">SANTIAGO JOCOTEPEC</option>
        <option value="SANTIAGO YAVEO">SANTIAGO YAVEO</option>
        <option value="ACATLÁN DE PÉREZ FIGUEROA">ACATLÁN DE PÉREZ FIGUEROA</option>
        <option value="AYOTZINTEPEC">AYOTZINTEPEC</option>
        <option value="COSOAPA">COSOAPA</option>
        <option value="LOMA BONITA">LOMA BONITA</option>
        <option value="SAN FELIPE JALAPA DE DÍAZ">SAN FELIPE JALAPA DE DÍAZ</option>
        <option value="SAN FELIPE USILA">SAN FELIPE USILA</option>
        <option value="SAN JOSÉ CHILTEPEC">SAN JOSÉ CHILTEPEC</option>
        <option value="SAN JOSÉ INDEPENDENCIA">SAN JOSÉ INDEPENDENCIA</option>
        <option value="SAN JUAN BAUTISTA TUXTEPEC">SAN JUAN BAUTISTA TUXTEPEC</option>
        <option value="SAN LUCAS OJITLÁN">SAN LUCAS OJITLÁN</option>
        <option value="SAN MIGUEL SOYALTEPEC">SAN MIGUEL SOYALTEPEC</option>
        <option value="SAN PEDRO IXCATLÁN">SAN PEDRO IXCATLÁN</option>
        <option value="SANTA MRÍA JACATEPEC">SANTA MRÍA JACATEPEC</option>
        <option value="SAN JUAN BAUTISTA VALLE NACIONAL">SAN JUAN BAUTISTA VALLE NACIONAL</option>
        <option value="ABEJONES">ABEJONES</option>
        <option value="GUELATAO DE JUÁREZ">GUELATAO DE JUÁREZ</option>
        <option value="IXTLÁN DE JUÁREZ">IXTLÁN DE JUÁREZ</option>
        <option value="NATIVIDAD">NATIVIDAD</option>
        <option value="SAN JUAN ATEPEC">SAN JUAN ATEPEC</option>
        <option value="SAN JUAN CHICOMEZÚCHIL">SAN JUAN CHICOMEZÚCHIL</option>
        <option value="SAN JUAN EVANGELISTA ANALCO">SAN JUAN EVANGELISTA ANALCO</option>
        <option value="SAN JUAN QUIOTEPEC">SAN JUAN QUIOTEPEC</option>
        <option value="CAPULALPAM DE MÉNDEZ">CAPULALPAM DE MÉNDEZ</option>
        <option value="SAN MIGUEL ALOÁPAM">SAN MIGUEL ALOÁPAM</option>
        <option value="SAN MIGUEL AMATLÁN">SAN MIGUEL AMATLÁN</option>
        <option value="SAN MIGUEL DEL RÍO">SAN MIGUEL DEL RÍO</option>
        <option value="SAN MIGUEL YOTAO">SAN MIGUEL YOTAO</option>
        <option value="SAN PABLO MACUILTIANGUIS">SAN PABLO MACUILTIANGUIS</option>
        <option value="SAN PEDRO YANERI">SAN PEDRO YANERI</option>
        <option value="SAN PEDRO YOLOX">SAN PEDRO YOLOX</option>
        <option value="SANTA ANA YANERI">SANTA ANA YANERI</option>
        <option value="SANTA CATARINA IXTEPEJI">SANTA CATARINA IXTEPEJI</option>
        <option value="SANTA CATARINA LACHATAO">SANTA CATARINA LACHATAO</option>
        <option value="SANTA MARÍA JALTIANGUIS">SANTA MARÍA JALTIANGUIS</option>
        <option value="SANTA MARÍA YAVESÍA">SANTA MARÍA YAVESÍA</option>
        <option value="SANTIAGO COMALTEPEC">SANTIAGO COMALTEPEC</option>
        <option value="SANTIAGO LAXOPA">SANTIAGO LAXOPA</option>
        <option value="SANTIAGO XIACUÍ">SANTIAGO XIACUÍ</option>
        <option value="NUEVO ZOQUIAPAM">NUEVO ZOQUIAPAM</option>
        <option value="TEOCOCUILCO DE MARCOS PÉREZ">TEOCOCUILCO DE MARCOS PÉREZ</option>
        <option value="ASUNCIÓN CACALOTEPEC">ASUNCIÓN CACALOTEPEC</option>
        <option value="TAMAZALUPAM DEL ESPÍRITU SANTO">TAMAZALUPAM DEL ESPÍRITU SANTO</option>
        <option value="MIXISTLÁN DE LA REFORMA">MIXISTLÁN DE LA REFORMA</option>
        <option value="SAN JUAN COTZOCON">SAN JUAN COTZOCON</option>
        <option value="SAN JUAN MAZATLÁN">SAN JUAN MAZATLÁN</option>
        <option value="SAN LUCAS CAMOTLÁN">SAN LUCAS CAMOTLÁN</option>
        <option value="SAN MIGUEL QUETZALTEPEC">SAN MIGUEL QUETZALTEPEC</option>
        <option value="SAN PEDRO OCOTEPEC">SAN PEDRO OCOTEPEC</option>
        <option value="SAN PEDRO Y SAN PABLO AYUTLA">SAN PEDRO Y SAN PABLO AYUTLA</option>
        <option value="SANTA MARÍA ALOTEPEC">SANTA MARÍA ALOTEPEC</option>
        <option value="SANTA MARÍA TEPANTLALI">SANTA MARÍA TEPANTLALI</option>
        <option value="SANTA MARÍA TLAHUILTOLTEPEC">SANTA MARÍA TLAHUILTOLTEPEC</option>
        <option value="SANTIAGO ATITLÁN">SANTIAGO ATITLÁN</option>
        <option value="SANTIAGO IXCUINTEPEC">SANTIAGO IXCUINTEPEC</option>
        <option value="SANTIAGO ZACATEPEC">SANTIAGO ZACATEPEC</option>
        <option value="SANTO DOMINGO TEPUXTEPEC">SANTO DOMINGO TEPUXTEPEC</option>
        <option value="TOTONTEPEC VILLA DE MORELOS">TOTONTEPEC VILLA DE MORELOS</option>
        <option value="VILLA HIDALGO">VILLA HIDALGO</option>
        <option value="SAN ANDRÉS SOLAGA">SAN ANDRÉS SOLAGA</option>
        <option value="SAN ANDRÉS YAA">SAN ANDRÉS YAA</option>
        <option value="SAN BALTAZAR YATZACHI EL BAJO">SAN BALTAZAR YATZACHI EL BAJO</option>
        <option value="SAN BARTOLOMÉ ZOOGOCHO">SAN BARTOLOMÉ ZOOGOCHO</option>
        <option value="SAN CRISTÓBAL LACHIRIOAG">SAN CRISTÓBAL LACHIRIOAG</option>
        <option value="SAN FRANCISCO CAJONOS">SAN FRANCISCO CAJONOS</option>
        <option value="SAN ILDEFONSO VILLA ALTA">SAN ILDEFONSO VILLA ALTA</option>
        <option value="SAN JUAN JUQUILA VIJANOS">SAN JUAN JUQUILA VIJANOS</option>
        <option value="SAN JUAN TABAA">SAN JUAN TABAA</option>
        <option value="SAN JUAN YAEE">SAN JUAN YAEE</option>
        <option value="SAN JUAN YATZONA">SAN JUAN YATZONA</option>
        <option value="SAN MATEO CAJONOS">SAN MATEO CAJONOS</option>
        <option value="SAN MELCHOR BETAZA">SAN MELCHOR BETAZA</option>
        <option value="VILLA TALEA DE CASTRO">VILLA TALEA DE CASTRO</option>
        <option value="SAN PABLO YAGANIZA">SAN PABLO YAGANIZA</option>
        <option value="SAN PEDRO CAJONOS">SAN PEDRO CAJONOS</option>
        <option value="SANTA MARÍA TEMAXCALAPA">SANTA MARÍA TEMAXCALAPA</option>
        <option value="SANTA MARÍA YALINA">SANTA MARÍA YALINA</option>
        <option value="SANTIAGO CAMOTLÁN">SANTIAGO CAMOTLÁN</option>
        <option value="SANTIAGO LALOPA">SANTIAGO LALOPA</option>
        <option value="SANTIAGO ZOOCHILA">SANTIAGO ZOOCHILA</option>
        <option value="SANTO DOMINGO ROAYAGA">SANTO DOMINGO ROAYAGA</option>
        <option value="SANTO DOMINGO XAGACIA">SANTO DOMINGO XAGACIA</option>
        <option value="TANETZE DE ZARAGOZA">TANETZE DE ZARAGOZA</option>
        <option value="MIAHUATLAN DE PORFIRIO DÍAZ">MIAHUATLAN DE PORFIRIO DÍAZ</option>
        <option value="MONJAS">MONJAS</option>
        <option value="SAN ANDRÉS PAXTLAN">SAN ANDRÉS PAXTLAN</option>
        <option value="SAN CRISTÓBAL AMATLAN">SAN CRISTÓBAL AMATLAN</option>
        <option value="SAN FRANCISCO LOGUECHE">SAN FRANCISCO LOGUECHE</option>
        <option value="SAN FRANCISCO OZOLOTEPEC">SAN FRANCISCO OZOLOTEPEC</option>
        <option value="SAN ILDENFONSO AMATLAN">SAN ILDENFONSO AMATLAN</option>
        <option value="SAN JERÓNIMO COATLAN">SAN JERÓNIMO COATLAN</option>
        <option value="SAN JOSÉ DEL PEÑASCO">SAN JOSÉ DEL PEÑASCO</option>
        <option value="SAN JOSE LACHIGUIRI">SAN JOSE LACHIGUIRI</option>
        <option value="SAN JUAN MIXTEPEC">SAN JUAN MIXTEPEC</option>
        <option value="SAN JUAN OZOLOTEPEC">SAN JUAN OZOLOTEPEC</option>
        <option value="SAN LUIS AMATLAN">SAN LUIS AMATLAN</option>
        <option value="SAN MARCIAL OZOLOTEPEC">SAN MARCIAL OZOLOTEPEC</option>
        <option value="SAN MATEO RIO HONDO">SAN MATEO RIO HONDO</option>
        <option value="SAN MIGUEL COATLAN">SAN MIGUEL COATLAN</option>
        <option value="SAN MIGUEL SUCHIXTEPEC">SAN MIGUEL SUCHIXTEPEC</option>
        <option value="SAN NICOLÁS">SAN NICOLÁS</option>
        <option value="SAN PABLO COATLAN">SAN PABLO COATLAN</option>
        <option value="SAN PEDRO MIXTEPEC">SAN PEDRO MIXTEPEC</option>
        <option value="SAN SEBASTIÁN COATLAN">SAN SEBASTIÁN COATLAN</option>
        <option value="SAN SEBASTIÁN RÍO HONDO">SAN SEBASTIÁN RÍO HONDO</option>
        <option value="SAN SIMÓN ALMOLONGAS">SAN SIMÓN ALMOLONGAS</option>
        <option value="SANTA ANA MIAHUATLAN">SANTA ANA MIAHUATLAN</option>
        <option value="SANTA CATARINA CUIXTL">SANTA CATARINA CUIXTL</option>
        <option value="SANTA CRUZ XITLA">SANTA CRUZ XITLA</option>
        <option value="SANTA LUCÍA MIAHUATLAN">SANTA LUCÍA MIAHUATLAN</option>
        <option value="SANTA MARÍA OZOLOTEPEC">SANTA MARÍA OZOLOTEPEC</option>
        <option value="SANTIAGO XANICA">SANTIAGO XANICA</option>
        <option value="SANTO DOMINGO OZOLOTEPEC">SANTO DOMINGO OZOLOTEPEC</option>
        <option value="SANTO TOMÁS TAMAZULAPAM">SANTO TOMÁS TAMAZULAPAM</option>
        <option value="SITIO DE XITLAPEHUA">SITIO DE XITLAPEHUA</option>
        <option value="CONSTANCIA DEL ROSARIO">CONSTANCIA DEL ROSARIO</option>
        <option value="MESONES HIDALGO">MESONES HIDALGO</option>
        <option value="PUTLA VILLA DE GUERRERO">PUTLA VILLA DE GUERRERO</option>
        <option value="LA REFORMA">LA REFORMA</option>
        <option value="SAN ANDRÉS CABECERA NUEVA">SAN ANDRÉS CABECERA NUEVA</option>
        <option value="SAN PEDRO AMUZGOS">SAN PEDRO AMUZGOS</option>
        <option value="SANTA CRUZ ITUNDUJIA">SANTA CRUZ ITUNDUJIA</option>
        <option value="SANTA LUCÍA MONTEVERDE">SANTA LUCÍA MONTEVERDE</option>
        <option value="SANTA MARÍA IPALAPA">SANTA MARÍA IPALAPA</option>
        <option value="SANTA MARÍA ZACATEPEC">SANTA MARÍA ZACATEPEC</option>
        <option value="SAN FRANCISCO CAHUACUA">SAN FRANCISCO CAHUACUA</option>
        <option value="SAN FRANCISCO SOLA">SAN FRANCISCO SOLA</option>
        <option value="SAN ILDEFONSO SOLA">SAN ILDEFONSO SOLA</option>
        <option value="SAN JACINTO TLACOTEPEC">SAN JACINTO TLACOTEPEC</option>
        <option value="SAN LORENZO TEXMELUCAN">SAN LORENZO TEXMELUCAN</option>
        <option value="VILLA SOLA DE VEGA">VILLA SOLA DE VEGA</option>
        <option value="SANTA CRUZ ZENZONTEPEC">SANTA CRUZ ZENZONTEPEC</option>
        <option value="SANTA MARÍA LACHIXIO">SANTA MARÍA LACHIXIO</option>
        <option value="SANTA MARÍA SOLA">SANTA MARÍA SOLA</option>
        <option value="SANTA MARÍA ZANIZA">SANTA MARÍA ZANIZA</option>
        <option value="SANTIAGO AMOLTEPEC">SANTIAGO AMOLTEPEC</option>
        <option value="SANTIAGO MINAS">SANTIAGO MINAS</option>
        <option value="SANTIAGO TEXTITLAN">SANTIAGO TEXTITLAN</option>
        <option value="SANTO DOMINGO TEOJOMULCO">SANTO DOMINGO TEOJOMULCO</option>
        <option value="SAN VICENTE LACHIXIO">SAN VICENTE LACHIXIO</option>
        <option value="ZAPOTITLÁN DEL RÍO">ZAPOTITLÁN DEL RÍO</option>
        <option value="ASUNCION TLACOLULITA">ASUNCION TLACOLULITA</option>
        <option value="NEJAPA DE MADERO">NEJAPA DE MADERO</option>
        <option value="SANTA CATARINA QUIOQUITANI">SANTA CATARINA QUIOQUITANI</option>
        <option value="SAN BARTOLO YAUTEPEC">SAN BARTOLO YAUTEPEC</option>
        <option value="SAN CARLOS YAUTEPEC">SAN CARLOS YAUTEPEC</option>
        <option value="SAN JUAN JUQUILA MIXES">SAN JUAN JUQUILA MIXES</option>
        <option value="SAN JUAN LAJARCIA">SAN JUAN LAJARCIA</option>
        <option value="SAN PEDRO MARTIR QUIECHAPA">SAN PEDRO MARTIR QUIECHAPA</option>
        <option value="SANTA ANA TAVELA">SANTA ANA TAVELA</option>
        <option value="SANTA CATARINA QUIERI">SANTA CATARINA QUIERI</option>
        <option value="SANTA MARÍA ECATEPEC">SANTA MARÍA ECATEPEC</option>
        <option value="SANTA MARÍA QUIEGOLANI">SANTA MARÍA QUIEGOLANI</option>

        

    </select>
    <div class="invalid-feedback">Se requiere una selección válida.</div>
    </div>

    <div class="col-sm-6">
        <label for="colonia" class="form-label">Colonia</label>
        <input type="text" class="form-control" id="colonia" name="colonia" placeholder="">
        <div class="invalid-feedback">Se requiere una colonia válida.</div>
    </div>

    <div class="col-sm-6">
        <label for="estado" class="form-label">Estado</label>
        <input type="text" class="form-control" id="estado" name="estado" placeholder="" value="OAXACA">
        <div class="invalid-feedback">Se requiere un estado válido.</div>
    </div>

    <div class="col-sm-6">
    <label for="region" class="form-label">Región</label>
    <select class="form-select" id="region" name="region" >
        <option value="">Selecciona una región</option>
        <option value="Valles Centrales">Valles Centrales</option>
        <option value="Istmo">Istmo</option>
        <option value="Costa">Costa</option>
        <option value="Sierra Norte">Sierra Norte</option>
        <option value="Sierra Sur">Sierra Sur</option>
        <option value="Mixteca">Mixteca</option>
    </select>
    <div class="invalid-feedback">Se requiere una región válida.</div>
</div>

    <div class="col-sm-6">
  <label for="pais_procedencia" class="form-label">PAÍS DE PROCEDENCIA</label>
  <select class="form-select" id="pais_procedencia" name="pais_procedencia" required>
    <option value="">SELECCIONA UN PAÍS</option>
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
        <input type="text" class="form-control" id="direccion_temporala" name="direccion_temporal" placeholder="" >
        <div class="invalid-feedback">Se requiere una Dirección Temporal válida.</div>
    </div>

    <h4>Datos de Contacto</h4>
            <hr class="my-4">

    <div class="col-sm-6">
        <label for="tel" class="form-label">Teléfono celular</label>
        <input type="text" class="form-control" id="tel" name="tel" placeholder="">
        <div class="invalid-feedback">Se requiere un número de teléfono celular válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="email" class="form-label">Correo electrónico</label>
        <div class="input-group has-validation">
        <span class="input-group-text">@</span>
        <input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico">
        <div class="invalid-feedback">Se requiere una dirección de correo electrónico válida.</div>
        </div>
    </div>

    <div class="col-sm-6">
        <label for="nombre_contacto_emergencia" class="form-label">Nombre de Contacto de Emergencia</label>
        <input type="text" class="form-control" id="nombre_contacto_emergencia" name="nombre_contacto_emergencia" placeholder="">
        <div class="invalid-feedback">Se requiere un Contacto de Emergencia válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="ttel_contacto_emergencia" class="form-label">Teléfono de Contacto de Emergencia</label>
        <input type="text" class="form-control" id="tel_contacto_emergencia" name="tel_contacto_emergencia" placeholder="">
        <div class="invalid-feedback">Se requiere un número de teléfono de confianza válido.</div>
    </div>

    <h4>Datos Laborales</h4>
        <hr class="my-4">

    <div class="col-sm-6">
  <label for="grado_academico" class="form-label">GRADO ACADÉMICO</label>
  <select class="form-select" id="grado_academico" name="grado_academico" required>
    <option value="">SELECCIONA UN GRADO ACADÉMICO</option>
    <option value="SIN ESTUDIOS">SIN ESTUDIOS</option>
    <option value="PRIMARIA INCOMPLETA">PRIMARIA INCOMPLETA</option>
    <option value="PRIMARIA COMPLETA">PRIMARIA COMPLETA</option>
    <option value="SECUNDARIA INCOMPLETA">SECUNDARIA INCOMPLETA</option>
    <option value="SECUNDARIA COMPLETA">SECUNDARIA COMPLETA</option>
    <option value="PREPARATORIA O BACHILLERATO INCOMPLETO">PREPARATORIA O BACHILLERATO INCOMPLETO</option>
    <option value="PREPARATORIA O BACHILLERATO COMPLETO">PREPARATORIA O BACHILLERATO COMPLETO</option>
    <option value="TÉCNICO O TECNÓLOGO">TÉCNICO O TECNÓLOGO</option>
    <option value="LICENCIATURA INCOMPLETA">LICENCIATURA INCOMPLETA</option>
    <option value="LICENCIATURA COMPLETA">LICENCIATURA COMPLETA</option>
    <option value="POSGRADO (MAESTRÍA)">POSGRADO (MAESTRÍA)</option>
    <option value="POSGRADO (DOCTORADO)">POSGRADO (DOCTORADO)</option>
    <option value="OTRO">OTRO</option>
  </select>
  <div class="invalid-feedback">SE REQUIERE UN GRADO ACADÉMICO VÁLIDO.</div>
</div>

    <!-- <div class="col-sm-6">
        <label for="puesto" class="form-label">Puesto</label>
        <input type="text" class="form-control" id="puesto" name="puesto" placeholder="">
        <div class="invalid-feedback">Se requiere un Puesto válido.</div>
    </div> -->

 <div class="col-sm-6">
    <label for="institucion" class="form-label">INSTITUCIÓN PROVENIENTE</label>
    <select class="form-select" id="institucionn" name="institucion" required>
        <option value="">SELECCIONA UNA INSTITUCIÓN</option>
        <?php
        require_once "../db/config.php"; // Ajusta la ruta
        $stmt = $conn->query("SELECT NombreInstitucion FROM instituciones ORDER BY NombreInstitucion ASC");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $nombre = htmlspecialchars($row['NombreInstitucion'], ENT_QUOTES, 'UTF-8');
            echo "<option value='$nombre'>$nombre</option>";
        }
        ?>
        <option value="OTRO">OTRO</option>
    </select>
    <div class="invalid-feedback">SE REQUIERE UNA INSTITUCIÓN VÁLIDA.</div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const institucionSelect = document.getElementById('institucionn');

    institucionSelect.addEventListener('change', function () {
        if (this.value === "") {
            this.setCustomValidity('Se requiere una institución válida.');
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
        } else {
            this.setCustomValidity('');
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
        }
    });
});
</script>


    
    <!-- <div class="col-sm-6">
        <label for="area_asignada" class="form-label">Área Asignada</label>
        <input type="text" class="form-control" id="area_asignada" name="area_asignada" placeholder="">
        <div class="invalid-feedback">Se requiere una Área Asignada válido.</div>
    </div> -->

    <div class="col-sm-6">
        <label for="area_asignada" class="form-label">Área Asignada</label>
        <select class="form-select" id="area_asignada" name="area_asignada" aria-label="Selecciona una opción" required>
        <option selected disabled value="">Selecciona una opción...</option>
        <option value="PSICOLÓGICA">PSICOLÓGICA</option>
        <option value="JURÍDICA">JURÍDICA</option>
        <option value="MÉDICA">MÉDICA</option>
        <option value="PROYECTOS">PROYECTOS </option>
        <option value="MOVIMIENTO SOCIAL">MOVIMIENTO SOCIAL</option>
        <option value="ENLACE ESTRATÉGICO">ENLACE ESTRATÉGICO</option>
        <option value="DIRECCIÓN">DIRECCIÓN</option>
        <option value="DIRECCIÓN COLEGIADA">DIRECCIÓN COLEGIADA</option>
        <option value="MONITOREO Y EVALUACIÓN">MONITOREO Y EVALUACIÓN</option>
        <option value="FINANZAS">FINANZAS</option>
        <option value="COORDINACIÓN">COORDINACIÓN</option>
        <option value="COMUNICACIÓN">COMUNICACIÓN</option>
        <option value="TI">TI</option>
        <option value="OTRO">Otro</option>
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
        <option selected disabled value="">Selecciona una opción...</option>
        <option value="BASE">BASE</option>
        <option value="JÓVENES CONSTRUYENDO EL FUTURO">JÓVENES CONSTRUYENDO EL FUTURO (JCF)</option>
        <option value="MI PRIMERA CHAMBA ">MI PRIMERA CHAMBA</option>
        <option value="VOLUNTARIADO">VOLUNTARIADO</option>
        <option value="SERVICIO SOCIAL">SERVICIO SOCIAL</option>
        <option value="PRÁCTICAS PROFESIONALES">PRÁCTICAS PROFESIONALES</option>
        <option value="ESTADÍAS PROFESIONALES">ESTADÍAS PROFESIONALES</option>
        <option value="INTERCAMBIO">INTERCAMBIO</option>
        <option value="PASANTÍAS">PASANTÍAS</option>
        <option value="INVESTIGACIÓN">INVESTIGACIÓN</option>
        <option value="OTRO">Otro</option>
        </select>
        <div class="invalid-feedback">Se requiere una selección válida.</div>
    </div>

    <div class="col-sm-6">
        <label for="becha_ingreso" class="form-label">Fecha de Ingreso</label>
        <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" placeholder="">
        <div class="invalid-feedback">Se requiere una Fecha de Ingreso válida.</div>
    </div>

    <div class="col-sm-6">
        <label for="fecha_termino" class="form-label">Fecha de Término</label>
        <input type="date" class="form-control" id="fecha_termino" name="fecha_termino" placeholder="">
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
        <option selected disabled value="">Selecciona una opción...</option>
        <option value="ACTIVO">ACTIVO</option>
        <option value="INACTIVO">INACTIVO</option>
        <option value="BAJA">BAJA</option>
        <option value="CONCLUIDO">CONCLUIDO</option>
        </select>
        <div class="invalid-feedback">Se requiere una selección válida.</div>
    </div>

    <h4>Datos Extras</h4>
        <hr class="my-4">

    <div class="col-sm-6">
        <label for="problemas_salud_considerables" class="form-label">Problemas de Salud Considerables</label>
        <input type="text" class="form-control" id="problemas_salud_considerables" name="problemas_salud_considerables" placeholder="En caso de no tener observaciones relevantes, por favor omítalo.">
        <div class="invalid-feedback">Se requiere Problemas de Salud Considerables válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="problemas_movilidad" class="form-label">Problemas de Movilidad</label>
        <input type="text" class="form-control" id="problemas_movilidad" name="problemas_movilidad" placeholder="En caso de no tener observaciones relevantes, por favor omítalo.">
        <div class="invalid-feedback">Se requiere Problemas de Movilidad válido.</div>
    </div>
 
    <div class="col-sm-12">
    <div class="mb-3">
        <label for="observaciones" class="form-label">Observaciones</label>
        <textarea class="form-control" id="observaciones" name="observaciones" rows="3" placeholder="Si no tiene comentarios, puede omitir este campo."></textarea>
    </div>
    <div class="invalid-feedback">Por favor, proporcione una Observacion válida.</div>
    </div>

    <div class="col-sm-12">
    <label for="rol" class="form-label">Rol:</label>
        <select name="rol" class="form-select"  id="rol">
    <?php
      require_once __DIR__ . '/../db/config.php';
        
        try {
            // Crear conexión a la base de datos
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            // Establecer el modo de error para lanzar excepciones en caso de errores
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Consulta para obtener los roles disponibles
            $sql = "SELECT ID_Rol, Descripcion FROM Rol";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            // Si hay resultados, mostrar opciones en el select
            if ($stmt->rowCount() > 0) {
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . $row['ID_Rol'] . "'>" . $row['Descripcion'] . "</option>";
                }
            } else {
                echo "<option value=''>No hay roles disponibles</option>";
            }
        } catch(PDOException $e) {
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
        <input type="password" id="password" class="form-control" name="password" aria-describedby="passwordHelpInline" required>
        <div class="invalid-feedback">Se requiere Problemas de Movilidad válido.</div>
    </div>

    <div class="col-auto">
        <span id="passwordHelpInline" class="form-text">Contraseña con la cual ingresara el personal al sistema.</span>
    </div>
    </div>

            <hr class="my-4">

    <button class="w-100 btn btn-primary btn-lg" type="submit"  onclick="return confirmarEnvio();">Registrar</button>
    </form>
    </div>
    </div>
    </main>

        <footer class="my-5 pt-5 text-body-secondary text-center text-small">
            <p class="mb-1">&copy;Copyright GESMujer © 2024 </p>
                <ul class="list-inline">
                </ul>
        </footer>
    </div>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="checkout.js"></script></body>
    <script src="regiones.js"></script>
    <script src="vV-personal.js"></script>


        </html>
