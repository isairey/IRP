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
// Verificar si se recibieron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $fecha_hecho = $_POST["fecha_hecho"];
    $nombre_victima = $_POST["nombre_victima"];
    $apellido_paterno = $_POST["apellido_paterno"];
    $apellido_materno = $_POST["apellido_materno"];
    $lugar_origen = $_POST["lugar_origen"];
    $edad = $_POST["edad"];
    $ocupacion = $_POST["ocupacion"];
    $calle = $_POST["calle"];
    $numero = $_POST["numero"];
    $municipio = $_POST["municipio"];
    $region = $_POST["region"];
    $estado = $_POST["estado"];
    $clave_municipio = $_POST["clave_municipio"];
    $alerta_genero = $_POST["alerta_genero"];
    $id_caso_anual = $_POST["id_caso_anual"];
    $num_averiguacion = $_POST["num_averiguacion"];
    $situacion_juridica = $_POST["situacion_juridica"];
    $desaparecida = $_POST["desaparecida"];
    $fecha_desaparicion = $_POST["fecha_desaparicion"];
    $lugar_cuerpo = $_POST["lugar_cuerpo"];
    $descripcion_cuerpo = $_POST["descripcion_cuerpo"];
    $forma_muerte = $_POST["forma_muerte"];
    $tipo_arma = $_POST["tipo_arma"];
    $causas = $_POST["causas"];
    $descendencia = $_POST["descendencia"];
    $num_descendencia = $_POST["num_descendencia"];
    $nombre_agresor = $_POST["nombre_agresor"];
    $parentesco_agresor = $_POST["parentesco_agresor"];
    $fuente_periodistica = $_POST["fuente_periodistica"];
    $autor_nota = $_POST["autor_nota"];
    $link_nota = $_POST["link_nota"];
    $latitud = $_POST["latitud"];
    $longitud = $_POST["longitud"];
    $sexenio = $_POST["sexenio"];
    $numa = $_POST["numa"];

    // Incluir el archivo de configuración de la base de datos
    require_once __DIR__ . '/../db/config.php';

    try {
        
        // Consulta SQL para insertar los datos en la tabla Feminicidios
        $sql = "INSERT INTO Feminicidios (FechaHecho, NombreVictima, ApellidoPaterno, ApellidoMaterno, LugarOrigen, edad, Ocupacion, Calle, Numero, Municipio, Region, Estado, ClaveMunicipio, AlertaGenero, IDCasoAnual, NumAveriguacion, SituacionJuridica, Desaparecida, FechaDesaparicion, LugarEncontradoCuerpo, DescripcionCuerpo, FormaMuerte, TipoArma, Causas, Descendencia, NumDescendencia, NombreAgresor, ParentescoAgresor, FuentePeriodistica, AutorNota, LinkNota, Latitud, Longitud, Sexenio, Numa) 
                VALUES (:fecha_hecho, :nombre_victima, :apellido_paterno, :apellido_materno, :lugar_origen, :edad, :ocupacion, :calle, :numero, :municipio, :region, :estado, :clave_municipio, :alerta_genero, :id_caso_anual, :num_averiguacion, :situacion_juridica, :desaparecida, :fecha_desaparicion, :lugar_cuerpo, :descripcion_cuerpo, :forma_muerte, :tipo_arma, :causas, :descendencia, :num_descendencia, :nombre_agresor, :parentesco_agresor, :fuente_periodistica, :autor_nota, :link_nota, :latitud, :longitud, :sexenio, :numa)";
        
        // Preparar la consulta
        $stmt = $conn->prepare($sql);
        
        // Vincular parámetros
        $stmt->bindParam(':fecha_hecho', $fecha_hecho);
        $stmt->bindParam(':nombre_victima', $nombre_victima);
        $stmt->bindParam(':apellido_paterno', $apellido_paterno);
        $stmt->bindParam(':apellido_materno', $apellido_materno);
        $stmt->bindParam(':lugar_origen', $lugar_origen);
        $stmt->bindParam(':edad', $edad);
        $stmt->bindParam(':ocupacion', $ocupacion);
        $stmt->bindParam(':calle', $calle);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':municipio', $municipio);
        $stmt->bindParam(':region', $region);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':clave_municipio', $clave_municipio);
        $stmt->bindParam(':alerta_genero', $alerta_genero);
        $stmt->bindParam(':id_caso_anual', $id_caso_anual);
        $stmt->bindParam(':num_averiguacion', $num_averiguacion);
        $stmt->bindParam(':situacion_juridica', $situacion_juridica);
        $stmt->bindParam(':desaparecida', $desaparecida);
        $stmt->bindParam(':fecha_desaparicion', $fecha_desaparicion);
        $stmt->bindParam(':lugar_cuerpo', $lugar_cuerpo);
        $stmt->bindParam(':descripcion_cuerpo', $descripcion_cuerpo);
        $stmt->bindParam(':forma_muerte', $forma_muerte);
        $stmt->bindParam(':tipo_arma', $tipo_arma);
        $stmt->bindParam(':causas', $causas);
        $stmt->bindParam(':descendencia', $descendencia);
        $stmt->bindParam(':num_descendencia', $num_descendencia);
        $stmt->bindParam(':nombre_agresor', $nombre_agresor);
        $stmt->bindParam(':parentesco_agresor', $parentesco_agresor);
        $stmt->bindParam(':fuente_periodistica', $fuente_periodistica);
        $stmt->bindParam(':autor_nota', $autor_nota);
        $stmt->bindParam(':link_nota', $link_nota);
        $stmt->bindParam(':latitud', $latitud);
        $stmt->bindParam(':longitud', $longitud);
        $stmt->bindParam(':sexenio', $sexenio);
        $stmt->bindParam(':numa', $numa);

        
        // Ejecutar la consulta
        $stmt->execute();
          header("Location: ../pages/ver-feminicidio.php?status=success");
exit();
    } catch(PDOException $e) {
        // Manejar errores de manera adecuada
         header("Location: ../pages/ver-feminicidio.php?status=error&msg=" . urlencode($e->getMessage()));
exit();
    }

    // Cerrar la conexión a la base de datos
    $conn = null;
}
?>
 

<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
    <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Registro de Feminicidio</title>
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
        <h2>Registro de Feminicidio</h2>
        <p class="lead"></p>
    </div>

    <div class="row g-5">
    <div class="col-xxl-12 col-xxl-12">
        <h4 class="mb-3">Datos Generales</h4>
        <form class="needs-validation" action="register-f.php" method="POST" enctype="multipart/form-data"  novalidate>
    <div class="row g-3">
        
    <div class="col-sm-12">
        <label for="fecha_hecho" class="form-label">Fecha del Hecho</label>
        <input type="date" class="form-control" id="fecha_hecho" name="fecha_hecho" placeholder="" required>
        <div class="invalid-feedback">Se requiere una Fecha de Inicio válida.</div>
    </div>

    <div class="col-sm-12">
        <label for="nombre_victima" class="form-label">Nombre de la Víctima</label>
        <input type="text" class="form-control" id="nombre_victima" name="nombre_victima" placeholder="" required>
    <div class="invalid-feedback">Se requiere un nombre válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="apellido_paterno" class="form-label">Apellido Paterno:</label>
        <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" placeholder="" required>
        <div class="invalid-feedback">Se requiere un apellido paterno válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="apellido_materno" class="form-label">Apellido Materno:</label>
        <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" placeholder="" required>
        <div class="invalid-feedback">Se requiere un apellido materno válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="lugar_origen" class="form-label">Lugar de Origen</label>
        <input type="text" class="form-control" id="lugar_origen" name="lugar_origen" placeholder="" required>
        <div class="invalid-feedback">Se requiere un apellido materno válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="ocupacion" class="form-label">Ocupación</label>
        <input type="text" class="form-control" id="ocupacion" name="ocupacion" placeholder="" required>
        <div class="invalid-feedback">Se requiere un apellido materno válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="edad" class="form-label">Edad</label>
        <input type="number" min="0" class="form-control" id="edad" name="edad" placeholder="" required>
        <div class="invalid-feedback">Se requiere un apellido materno válido.</div>
    </div>

        <hr class="my-4">

    <div class="col-sm-6">
        <label for="calle" class="form-label">(Lugar de los hechos) Calle</label>
        <input type="text" class="form-control" id="calle" name="calle" placeholder="" required>
        <div class="invalid-feedback">Se requiere una calle válida.</div>
    </div>

    <div class="col-sm-6">
        <label for="numero" class="form-label">(Lugar de los hechos) Número</label>
        <input type="number" class="form-control" id="numero" name="numero" placeholder="" required>
        <div class="invalid-feedback">Se requiere un número interior válido.</div>
    </div>


    <div class="col-sm-6">
        <label for="municipio" class="form-label">(Lugar de los hechos) Municipio</label>
        <input type="text" class="form-control" id="municipio" name="municipio" placeholder="" required>
        <div class="invalid-feedback">Se requiere un municipio válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="region" class="form-label">(Lugar de los hechos) Región</label>
        <input type="text" class="form-control" id="region" name="region" placeholder="" required>
        <div class="invalid-feedback">Se requiere una región válida.</div>
    </div>

    <div class="col-sm-6">
        <label for="estado" class="form-label">(Lugar de los hechos) Estado</label>
        <input type="text" class="form-control" id="estado" name="estado" placeholder="" required>
        <div class="invalid-feedback">Se requiere un estado válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="clave_municipio" class="form-label">Clave Municipio</label>
        <input type="text" class="form-control" id="clave_municipio" name="clave_municipio" placeholder="" required>
        <div class="invalid-feedback">Se requiere un apellido materno válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="alerta_genero" class="form-label">Alerta de Género</label>
        <input type="text" class="form-control" id="alerta_genero" name="alerta_genero" placeholder="" required>
        <div class="invalid-feedback">Se requiere un estado válido.</div>
    </div>
    <hr class="my-4">

    <div class="col-sm-6">
        <label for="id_caso_anual" class="form-label">ID Caso Anual</label>
        <input type="text" class="form-control" id="id_caso_anual" name="id_caso_anual" placeholder="" required>
        <div class="invalid-feedback">Se requiere un estado válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="num_averiguacion" class="form-label">Número de Averiguación</label>
        <input type="text" class="form-control" id="num_averiguacion" name="num_averiguacion" placeholder="" required>
        <div class="invalid-feedback">Se requiere un estado válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="num_averiguacion" class="form-label">Num de Año</label>
        <input type="text" class="form-control" id="num_averiguacion" name="numa" placeholder="" required>
        <div class="invalid-feedback">Se requiere un estado válido.</div>
    </div>
 
    <hr class="my-4">

    <div class="col-sm-6">
        <label for="situacion_juridica" class="form-label">Situación Jurídica</label>
        <input type="text" class="form-control" id="situacion_juridica" name="situacion_juridica" placeholder="" required>
        <div class="invalid-feedback">Se requiere un estado válido.</div>
    </div>

    <div class="col-sm-6">
        <label class="form-label">¿Desaparecida?</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="desaparecida" id="desaparecidaSI" value="SI" required onclick="showDesaparecidaInput()">
            <label class="form-check-label" for="desaparecidaSI">SI</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="desaparecida" id="desaparecidaNO" value="NO" onclick="hideDesaparecidaInput()">
            <label class="form-check-label" for="desaparecidaNO">NO</label>
        </div>
    </div>
        
    <div class="col-sm-6" id="DesaparecidaInput" style="display: none;">
        <label for="fecha_desaparicion" class="form-label">Fecha de Desaparición</label>
        <input type="date" class="form-control" id="fecha_desaparicion" name="fecha_desaparicion" placeholder="">
        <div class="invalid-feedback">Se requiere una Fecha de Inicio válida.</div>
    </div>

    <div class="col-sm-6">
        <label for="lugar_cuerpo" class="form-label">Lugar donde se Encontró el Cuerpo</label>
        <input type="text" class="form-control" id="lugar_cuerpo" name="lugar_cuerpo" placeholder="" required>
        <div class="invalid-feedback">Se requiere un estado válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="descripcion_cuerpo" class="form-label">Descripción del Cuerpo</label>
        <input type="text" class="form-control" id="descripcion_cuerpo" name="descripcion_cuerpo" placeholder="" required>
        <div class="invalid-feedback">Se requiere un estado válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="forma_muerte" class="form-label">Forma de Muerte</label>
        <input type="text" class="form-control" id="forma_muerte" name="forma_muerte" placeholder="" required>
        <div class="invalid-feedback">Se requiere un estado válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="tipo_arma" class="form-label">Tipo de Arma</label>
        <select class="form-select" id="tipo_arma" name="tipo_arma" placeholde="Selecciona una opción" required>
        <option selected disabled value="">Selecciona una opción...</option>
            <option value="ARMA DE FUEGO ">ARMA DE FUEGO </option>
            <option value="FUERZA FÍSICA">FUERZA FÍSICA</option>
            <option value="ARMA PUNZOCORTANTE">ARMA PUNZOCORTANTE</option>
            <option value="NO ESPECÍFICA">NO ESPECÍFICA </option>
            <option value="OTRO">OTRO</option>
        </select>
    <div class="invalid-feedback">Se requiere una selección válida.</div>
    </div>

    <div class="col-sm-6">
        <label for="causas" class="form-label">Causas</label>
        <input type="text" class="form-control" id="causas" name="causas" placeholder="" required>
        <div class="invalid-feedback">Se requiere un estado válido.</div>
    </div>

    <div class="col-sm-6">
        <label class="form-label">¿Tiene Hijos e Hijas?</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="descendencia" id="hijos2" value="SI" required onclick="showHijosInput()">
        <label class="form-check-label" for="exampleRadios1">SI</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="descendencia" id="hijos2" value="NO" onclick="hideHijosInput()">
        <label class="form-check-label" for="exampleRadios2">NO</label>
    </div>
    </div>

    <div class="col-sm-6" id="HijosInput" style="display: none;">
        <label for="num_descendencia" class="form-label">¿Cuantos?</label>
        <input type="number" min="1" max="25" class="form-control" id="num_descendencia" name="num_descendencia" placeholder="Ingrese un numero">
    <div class="invalid-feedback">Se requiere un número válido.</div>
    </div>

    <hr class="my-4">

    <div class="col-sm-6">
        <label for="nombre_agresor" class="form-label">Nombre del Agresor</label>
        <input type="text" class="form-control" id="nombre_agresor" name="nombre_agresor" placeholder="" required>
        <div class="invalid-feedback">Se requiere un estado válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="parentesco_agresor" class="form-label">Parentesco con el Agresor</label>
        <input type="text" class="form-control" id="parentesco_agresor" name="parentesco_agresor" placeholder="" required>
        <div class="invalid-feedback">Se requiere un estado válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="fuente_periodistica" class="form-label">Fuente Periodística</label>
        <input type="text" class="form-control" id="fuente_periodistica" name="fuente_periodistica" placeholder="" required>
        <div class="invalid-feedback">Se requiere un estado válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="autor_nota" class="form-label">Autor de la Nota</label>
        <input type="text" class="form-control" id="autor_nota" name="autor_nota" placeholder="" required>
        <div class="invalid-feedback">Se requiere un estado válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="link_nota" class="form-label">Enlace de la Nota</label>
        <input type="text" maxlength="100" class="form-control" id="link_nota" name="link_nota" placeholder="" required>
        <div class="invalid-feedback">Se requiere un estado válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="latitud" class="form-label">Latitud</label>
        <input type="number" class="form-control" id="latitud" name="latitud" step="0.000001" required>
        <div class="invalid-feedback">Se requiere un estado válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="longitud" class="form-label">Longitud</label>
        <input type="number" class="form-control" id="longitud" name="longitud" step="0.000001" required>
        <div class="invalid-feedback">Se requiere un estado válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="sexenio" class="form-label">Sexenio</label>
        <select class="form-select" id="sexenio" name="sexenio" placeholde="Selecciona una opción" required>
        <option selected disabled value="">Selecciona una opción...</option>
            <option value="SALOMÓN JARA CRUZ">Ing.Salomón Jara Cruz</option>
            <option value="ALEJANDRO ISMAEL MURAT HINOJOSA">Mtro.Alejandro Ismael Murat Hinojosa</option>
            <option value="GABINO CUÉ MONTEAGUDO">Lic.Gabino Cué Monteagudo</option>
            <option value="OTRO">OTRO</option>
        </select>
    <div class="invalid-feedback">Se requiere una selección válida.</div>
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
    <script src="validationfeminicidios.js"></script>
        </html>
