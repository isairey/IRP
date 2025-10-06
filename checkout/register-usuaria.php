<?php
require_once __DIR__ . '/../pages/seccion.php';

?>
<?php
require_once __DIR__ . '/../db/config.php';
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Procesar los archivos subidos
    $rutaCURP = $_FILES['rutaCURP']['name'];
    $rutaINE = $_FILES['rutaINE']['name'];
    $rutaComDomicilio = $_FILES['rutaComDomicilio']['name'];

    $carpeta_destino = '/xampp/htdocs/ERP/ERP_IRP/uploads/documents/';   // Ruta donde guardar los archivos subidos
    move_uploaded_file($_FILES['rutaCURP']['tmp_name'], $carpeta_destino . $rutaCURP);
    move_uploaded_file($_FILES['rutaINE']['tmp_name'], $carpeta_destino . $rutaINE);
    move_uploaded_file($_FILES['rutaComDomicilio']['tmp_name'], $carpeta_destino . $rutaComDomicilio);

    // Obtener los datos del formulario
    $nombre = !empty($_POST['nombre']) ? $_POST['nombre'] : '-';
    $apellidoPaterno = !empty($_POST['apellidoPaterno']) ? $_POST['apellidoPaterno'] : '-';
    $apellidoMaterno = !empty($_POST['apellidoMaterno']) ? $_POST['apellidoMaterno'] : '-';
    $fechaNacimiento = !empty($_POST['fechaNacimiento']) ? $_POST['fechaNacimiento'] : '-';
    $edad = !empty($_POST['edad']) ? $_POST['edad'] : '-';
    $fecharegistro = !empty($_POST["fecharegistro"]) ? $_POST["fecharegistro"] : '-';
    $sexo = !empty($_POST['sexo']) ? $_POST['sexo'] : '-';
    $lugarNacimiento = !empty($_POST['lugarNacimiento']) ? $_POST['lugarNacimiento'] : '-';
    $indigena = !empty($_POST['indigena']) ? $_POST['indigena'] : '-';
    $lenguaMaterna = !empty($_POST['lenguaMaterna']) ? $_POST['lenguaMaterna'] : '-';
    $hablaLenguaIndigena = !empty($_POST['hablaLenguaIndigena']) ? $_POST['hablaLenguaIndigena'] : '-';
    $lenguaIndigena = !empty($_POST['lenguaIndigena']) ? $_POST['lenguaIndigena'] : '-';
    $escolaridad = !empty($_POST['escolaridad']) ? $_POST['escolaridad'] : '-';
    $estadocivil = !empty($_POST['estadocivil']) ? $_POST['estadocivil'] : '-';
    $orientacionSexual = !empty($_POST['orientacionSexual']) ? $_POST['orientacionSexual'] : '-';
    $discapacidad = !empty($_POST['discapacidad']) ? $_POST['discapacidad'] : '-';
    $decendencia = !empty($_POST['decendencia']) ? $_POST['decendencia'] : '-';
    $numDecendencia = !empty($_POST['numDecendencia']) ? $_POST['numDecendencia'] : '-';
    $calle = !empty($_POST['calle']) ? $_POST['calle'] : '-';
    $numInterior = !empty($_POST['numInterior']) ? $_POST['numInterior'] : '-';
    $numExterior = !empty($_POST['numExterior']) ? $_POST['numExterior'] : '-';
    $cp = !empty($_POST['cp']) ? $_POST['cp'] : '-';
    $estado = !empty($_POST['estado']) ? $_POST['estado'] : '-';
    $municipio = !empty($_POST['municipio']) ? $_POST['municipio'] : '-';
    $colonia = !empty($_POST['colonia']) ? $_POST['colonia'] : '-';
    $region = !empty($_POST['region']) ? $_POST['region'] : '-';
    $callePC = !empty($_POST['callePC']) ? $_POST['callePC'] : '-';
    $numInteriorPC = !empty($_POST['numInteriorPC']) ? $_POST['numInteriorPC'] : '-';
    $numExteriorPC = !empty($_POST['numExteriorPC']) ? $_POST['numExteriorPC'] : '-';
    $cppc = !empty($_POST['cppc']) ? $_POST['cppc'] : '-';
    $estadoPC = !empty($_POST['estadoPC']) ? $_POST['estadoPC'] : '-';
    $municipioPC = !empty($_POST['municipioPC']) ? $_POST['municipioPC'] : '-';
    $coloniaPC = !empty($_POST['coloniaPC']) ? $_POST['coloniaPC'] : '-';
    $regionPC = !empty($_POST['regionPC']) ? $_POST['regionPC'] : '-';
    $telCelular = !empty($_POST['telCelular']) ? $_POST['telCelular'] : '-';
    $telFijo = !empty($_POST['telFijo']) ? $_POST['telFijo'] : '-';
    $telConfianza = !empty($_POST['telConfianza']) ? $_POST['telConfianza'] : '-';
    $email = !empty($_POST['email']) ? $_POST['email'] : '-';
    $emailRespaldo = !empty($_POST['emailRespaldo']) ? $_POST['emailRespaldo'] : '-';
    $curp = !empty($_POST['curp']) ? $_POST['curp'] : '-';
    $ine = !empty($_POST['ine']) ? $_POST['ine'] : '-';
    $ocupacion = !empty($_POST['ocupacion']) ? $_POST['ocupacion'] : '-';
    $fuenteIngresos = !empty($_POST['fuenteIngresos']) ? $_POST['fuenteIngresos'] : '-';
    $sectorEconomico = !empty($_POST['sectorEconomico']) ? $_POST['sectorEconomico'] : '-';
    $horasTrabajo = !empty($_POST['horasTrabajo']) ? $_POST['horasTrabajo'] : '-';
    $ingresosDiarios = !empty($_POST['ingresosDiarios']) ? $_POST['ingresosDiarios'] : '-';
    $tipoEnergia = !empty($_POST['tipoEnergia']) ? $_POST['tipoEnergia'] : '-';
    $agua = !empty($_POST['agua']) ? $_POST['agua'] : '-';
    $materialPiso = !empty($_POST['materialPiso']) ? $_POST['materialPiso'] : '-';
    $tipoServicioAgua = !empty($_POST['tipoServicioAgua']) ? $_POST['tipoServicioAgua'] : '-';
    $materialVivienda = !empty($_POST['materialVivienda']) ? $_POST['materialVivienda'] : '-';
    $banioDentro = !empty($_POST['banioDentro']) ? $_POST['banioDentro'] : '-';
    $TipoBano = !empty($_POST['TipoBano']) ? $_POST['TipoBano'] : '-';
    $personasCasa = !empty($_POST['personasCasa']) ? $_POST['personasCasa'] : '-';
    $personasDormitorio = !empty($_POST['personasDormitorio']) ? $_POST['personasDormitorio'] : '-';
    $tipoVivienda = !empty($_POST['tipoVivienda']) ? $_POST['tipoVivienda'] : '-';
    $comoSeEntero = !empty($_POST['comoSeEntero']) ? $_POST['comoSeEntero'] : '-';
    $parejaTrabaja = !empty($_POST['parejaTrabaja']) ? $_POST['parejaTrabaja'] : '-';
    $NombreAgresor = !empty($_POST['NombreAgresor']) ? $_POST['NombreAgresor'] : '-';
    $DondeTrabaja = !empty($_POST['DondeTrabaja']) ? $_POST['DondeTrabaja'] : '-';
    $situacionUsuaria = !empty($_POST['situacionUsuaria']) ? $_POST['situacionUsuaria'] : '-';
    $relacionAgresora = !empty($_POST['relacionAgresora']) ? $_POST['relacionAgresora'] : '-';
    $tipoRelacion = !empty($_POST['tipoRelacion']) ? $_POST['tipoRelacion'] : '-';
    $viveConPareja = !empty($_POST['viveConPareja']) ? $_POST['viveConPareja'] : '-';
    $tiempoViviendoPareja = !empty($_POST['tiempoViviendoPareja']) ? $_POST['tiempoViviendoPareja'] : '-';
    $chantajeado = isset($_POST['chantajeado']) ? $_POST['chantajeado'] : '';
    $comochantajeado = isset($_POST['comochantajeado']) ? $_POST['comochantajeado'] : '-';
    $parejaCelosa = isset($_POST['parejaCelosa']) ? $_POST['parejaCelosa'] : '-';
    $utilizaHijos = isset($_POST['utilizaHijos']) ? $_POST['utilizaHijos'] : '-';
    $consumidora = isset($_POST['consumidora']) ? $_POST['consumidora'] : '-';
    $agresion = isset($_POST['agresion']) ? $_POST['agresion'] : '-';
    $incrementoAgresiones = isset($_POST['incrementoAgresiones']) ? $_POST['incrementoAgresiones'] : '-';
    $atencionMedica = isset($_POST['atencionMedica']) ? $_POST['atencionMedica'] : '-';
    $amenazadaConArmas = isset($_POST['amenazadaConArmas']) ? $_POST['amenazadaConArmas'] : '-';
    $intentoAhorcar = isset($_POST['intentoAhorcar']) ? $_POST['intentoAhorcar'] : '-';
    $sienteTemorVida = isset($_POST['sienteTemorVida']) ? $_POST['sienteTemorVida'] : '-';
    $poseeArmaFuego = isset($_POST['poseeArmaFuego']) ? $_POST['poseeArmaFuego'] : '-';
    $denuncia = isset($_POST['denuncia']) ? $_POST['denuncia'] : '-';
    $tipoDenuncia = isset($_POST['tipoDenuncia']) ? $_POST['tipoDenuncia'] : '-';
    $ingresadoPrision = isset($_POST['ingresadoPrision']) ? $_POST['ingresadoPrision'] : '-';
    $valoracionRiesgo = isset($_POST['valoracionRiesgo']) ? $_POST['valoracionRiesgo'] : '-';
    $canalizacion = isset($_POST['canalizacion']) ? $_POST['canalizacion'] : '-';
    $canalizacionExterna = isset($_POST['canalizacionExterna']) ? $_POST['canalizacionExterna'] : '-';
    $canalizacionInterna = isset($_POST['canalizacionInterna']) ? $_POST['canalizacionInterna'] : '-';
    $auxiliosPsicologicos = isset($_POST['auxiliosPsicologicos']) ? $_POST['auxiliosPsicologicos'] : '-';

    // Preparar la consulta SQL para insertar los datos en la tabla Usuario
    $sql = "INSERT INTO Usuario (Nombre, ApellidoPaterno, ApellidoMaterno, FechaNacimiento, Edad, FechaRegistro, Sexo, LugarNacimiento, Indigena, LenguaMaterna, HablaLenguaIndigena, LenguaIndigena, Escolaridad, estadocivil, OrientacionSexual, Discapacidad, Decendencia, NumDecendencia, Calle, NumInterior, NumExterior, CP, Estado, Municipio, Colonia, Region, CallePC, NumInteriorPC, NumExteriorPC, CPPC, EstadoPC, MunicipioPC, ColoniaPC, RegionPC, TelCelular, TelFijo, TelConfianza, Email, EmailRespaldo, CURP, INE, RutaCURP, RutaINE, RutaComDomicilio, Ocupacion, FuenteIngresos, SectorEconomico, HorasTrabajo, IngresosDiarios, TipoEnergia, Agua, MaterialPiso, TipoServicioAgua, MaterialVivienda, BanioDentro, TipoBano, PersonasCasa, PersonasDormitorio, TipoVivienda, ComoSeEntero, ParejaTrabaja, DondeTrabaja, NombreAgresor, SituacionUsuaria, RelacionAgresora, TipoRelacion, ViveConPareja, TiempoViviendoPareja, chantajeado, comochantajeado, ParejaCelosa, UtilizaHijos, Consumidora, Agresion, IncrementoAgresiones, AtencionMedica, AmenazadaConArmas, IntentoAhorcar, SienteTemorVida, PoseeArmaFuego, Denuncia, TipoDenuncia, IngresadoPrision, ValoracionRiesgo, Canalizacion, CanalizacionExterna, CanalizacionInterna, AuxiliosPsicologicos) 
            VALUES ('$nombre', '$apellidoPaterno', '$apellidoMaterno', '$fechaNacimiento', '$edad', '$fecharegistro', '$sexo', '$lugarNacimiento', '$indigena', '$lenguaMaterna', '$hablaLenguaIndigena', '$lenguaIndigena', '$escolaridad', '$estadocivil', '$orientacionSexual', '$discapacidad', '$decendencia', '$numDecendencia', '$calle', '$numInterior','$numExterior','$cp', '$estado', '$municipio', '$colonia', '$region', '$callePC', '$numInteriorPC', '$numExteriorPC', '$cppc', '$estadoPC', '$municipioPC', '$coloniaPC', '$regionPC', '$telCelular', '$telFijo', '$telConfianza', '$email', '$emailRespaldo', '$curp', '$ine', '$rutaCURP', '$rutaINE', '$rutaComDomicilio', '$ocupacion', '$fuenteIngresos', '$sectorEconomico', '$horasTrabajo', '$ingresosDiarios', '$tipoEnergia', '$agua', '$materialPiso', '$tipoServicioAgua', '$materialVivienda', '$banioDentro', '$TipoBano', '$personasCasa', '$personasDormitorio', '$tipoVivienda', '$comoSeEntero', '$parejaTrabaja', '$DondeTrabaja', '$NombreAgresor', '$situacionUsuaria', '$relacionAgresora', '$tipoRelacion', '$viveConPareja', '$tiempoViviendoPareja', '$chantajeado', '$comochantajeado', '$parejaCelosa', '$utilizaHijos', '$consumidora', '$agresion', '$incrementoAgresiones', '$atencionMedica', '$amenazadaConArmas', '$intentoAhorcar', '$sienteTemorVida', '$poseeArmaFuego', '$denuncia', '$tipoDenuncia', '$ingresadoPrision', '$valoracionRiesgo', '$canalizacion', '$canalizacionExterna', '$canalizacionInterna', '$auxiliosPsicologicos')";

// Preparar y ejecutar la consulta SQL
try {
    $stmt = $conn->prepare($sql);
    $stmt->execute();

     header("Location: ../pages/ver-usuaria.php?status=success");
exit();
} catch (PDOException $e) {
    // Registro de errores en un archivo de registro
    $conn->rollBack();
        header("Location: ../pages/ver-usuaria.php?status=error&msg=" . urlencode($e->getMessage()));
exit();
  $file_path = '/xampp/htdocs/ERP/ERP_IRP/db/error_log.txt';


   
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
    <title>Registro de nueva usuaria</title>
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
        <h2>Registro de nueva usuaria</h2>
        <p class="lead"></p>
    </div>

    <div class="row g-5">
    <div class="col-xxl-12 col-xxl-12">
        <h4 class="mb-3">Datos Generales</h4>
        <form class="needs-validation" action="register-usuaria.php" method="POST" enctype="multipart/form-data"  novalidate>
    <div class="row g-3">
            
    <div class="col-sm-12">
        <label for="firstName" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="firstName" name="nombre" placeholder="" required>
    <div class="invalid-feedback">Se requiere un nombre válido.</div>
    <div class="valid-feedback">Looks good!</div>
    </div>

    <div class="col-sm-6">
        <label for="lastName" class="form-label">Apellido Paterno:</label>
        <input type="text" class="form-control" id="lastName" name="apellidoPaterno" placeholder="" required>
        <div class="invalid-feedback">Se requiere un apellido paterno válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="secondLastName" class="form-label">Apellido Materno:</label>
        <input type="text" class="form-control" id="secondLastName" name="apellidoMaterno" placeholder="">
        <div class="invalid-feedback">Se requiere un apellido materno válido.</div>
    </div>

    <div class="col-sm-6">
    <label for="birthdate" class="form-label">Fecha de Nacimiento:</label>
    <input type="date" class="form-control" id="birthdate" name="fechaNacimiento" placeholder="">
    <div class="invalid-feedback">Se requiere una fecha de nacimiento válida.</div>
</div>

<div class="col-sm-6">
    <label for="age" class="form-label">Edad:</label>
    <input type="number" class="form-control" id="age" name="edad" placeholder="La edad aparecerá aquí">
</div>
    
    <div class="col-sm-6">
        <label for="fecharegistro" class="form-label">Fecha de registro</label>
        <input type="date" class="form-control" id="fecharegistro" name="fecharegistro" placeholder="" required>
        <div class="invalid-feedback">Se requiere una Fecha de Inicio válida.</div>
    </div>

    <div class="col-sm-6">
        <label for="sexo" class="form-label">Sexo</label>
        <select class="form-select" id="sexo" name="sexo" aria-label="Selecciona una opción">
        <option selected disabled value="">Selecciona una opción...</option>
        <option value="MASCULINO">MASCULINO</option>
        <option value="FEMENINO">FEMENINO</option>
        <option value="OTRO">OTRO</option>
        </select>
        <div class="invalid-feedback">Se requiere una selección válida.</div>
    </div>
    
    <div class="col-sm-12">
        <label for="lugarNacimiento" class="form-label">Lugar de Nacimiento</label>
        <input type="text" class="form-control" id="lugarNacimiento" name="lugarNacimiento" placeholder="">
        <div class="invalid-feedback">Se requiere un lugar de nacimiento válido.</div>
    </div>

    <div class="col-sm-6">
        <label class="form-label">¿Se considera Indígena?</label>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="indigena" id="indigenaopcion1" value="SI">
        <label class="form-check-label" for="indigenaopcion1">SI</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="indigena" id="indigenaopcion2" value="NO" >
        <label class="form-check-label" for="indigenaopcion2">NO</label>
    </div>
    </div>

    <div class="col-sm-6">
        <label for="lenguaMaterna" class="form-label">Lengua Materna</label>
        <input type="text" class="form-control" id="lenguaMaterna" name="lenguaMaterna">
        <div class="invalid-feedback">Se requiere una lengua materna válida.</div>
    </div>


    <div class="col-sm-6">
        <label class="form-label">¿Habla alguna lengua Indígena?</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="hablaLenguaIndigena" id="exampleRadios1" value="SI" onclick="showLanguageInput()">
        <label class="form-check-label" for="exampleRadios1">SI</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="hablaLenguaIndigena" id="exampleRadios2" value="NO" onclick="hideLanguageInput()">
        <label class="form-check-label" for="exampleRadios2">NO</label>
    </div>
    </div>
    
    <div class="col-sm-6" id="languageInput" style="display: none;">
        <label for="lenguaIndigena" class="form-label">¿Cuál?</label>
        <input type="text" class="form-control" id="lenguaIndigena" name="lenguaIndigena" placeholder="">
    </div>
 
    <div class="col-sm-6">
        <label for="escolaridad" class="form-label">Escolaridad</label>
        <select class="form-select" id="escolaridad" name="escolaridad" aria-label="Selecciona una opción">
            <option selected disabled value="">Selecciona una opción...</option>
            <option value="NINGUNA">NINGUNA</option>
            <option value="PRIMARIA TERMINADA">PRIMARIA TERMINADA</option>
            <option value="PRIMARIA TRUNCA">PRIMARIA TRUNCA</option>
            <option value="SECUNDARIA TERMINADA">SECUNDARIA TERMINADA</option>
            <option value="SECUNDARIA TRUNCA">SECUNDARIA TRUNCA</option>
            <option value="PREPARATORIA TERMINADA">PREPARATORIA TERMINADA</option>
            <option value="PREPARATORIA TRUNCA">PREPARATORIA TRUNCA</option>
            <option value="UNIVERSIDAD TERMINADA">UNIVERSIDAD TERMINADA</option>
            <option value="UNIVERSIDAD TRUNCA">UNIVERSIDAD TRUNCA</option>
            <option value="POSTGRADO">POSTGRADO</option>
            
        </select>
    <div class="invalid-feedback"> Se requiere una selección válida.</div>
    </div>

    <div class="col-sm-6">
        <label for="estadocivil" class="form-label">Estado civil</label>
        <select class="form-select" id="estadocivil" name="estadocivil" aria-label="Selecciona una opción">
            <option selected disabled value="">Selecciona una opción...</option>
            <option value="SOLTERA">SOLTERA</option>
            <option value="CASADA">CASADA</option>
            <option value="DIVORCIADA">DIVORCIADA</option>
            <option value="SEPARADA">SEPARADA</option>
            <option value="VIUDA">VIUDA</option>
            <option value="CONCUBINATO">CONCUBINATO</option>
            <option value="OTRA">OTRA</option>
        </select>
    <div class="invalid-feedback"> Se requiere una selección válida.</div>
    </div>


    <div class="col-sm-6">
        <label for="orientacionSexual" class="form-label">Orientación Sexual</label>
        <select class="form-select" id="orientacionSexual" name="orientacionSexual" aria-label="Selecciona una opción">
        <option selected disabled value="">Selecciona una opción...</option>
            <option value="HETEROSEXUAL">HETEROSEXUAL</option>
            <option value="LESBIANA">LESBIANA</option>
            <option value="BISEXUAL">BISEXUAL</option>
            <option value="OTRA">OTRA</option>
        </select>
    <div class="invalid-feedback">Se requiere una selección válida.</div>
    </div>
    
    <div class="col-sm-12">
        <label for="discapacidad" class="form-label">Tiene alguna Discapacidad</label>
        <select class="form-select" id="discapacidad" name="discapacidad" aria-label="Selecciona una opción">
        <option selected disabled value="">Selecciona una opción...</option>
            <option value="MUDA">MUDA</option>
            <option value="SORDA-CIEGA">SORDA-CIEGA</option>
            <option value="INTELECTUAL">INTELECTUAL</option>
            <option value="PSICOSOCIAL">PSICOSOCIAL</option>
            <option value="AUDITIVA">AUDITIVA</option>
            <option value="VISUAL">VISUAL</option>
            <option value="FISICA">FISICA</option>
            <option value="NINGUNA">NINGUNA</option>
            <option value="OTRA">OTRA</option>
        </select>
    <div class="invalid-feedback">Se requiere una selección válida.</div>
    </div>

    <div class="col-sm-6">
        <label class="form-label">¿Tiene Hijos e Hijas?</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="decendencia" id="hijos1" value="SI" onclick="showHijosInput()">
        <label class="form-check-label" for="exampleRadios1">SI</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="decendencia" id="hijos2" value="NO" onclick="hideHijosInput()">
        <label class="form-check-label" for="exampleRadios2">NO</label>
    </div>
    </div>

    <div class="col-sm-6" id="HijosInput" style="display: none;">
        <label for="numDecendencia" class="form-label">¿Cuántos?</label>
        <input type="number" min="1" max="15" class="form-control" id="numDecendencia" name="numDecendencia" placeholder="Ingrese un número">
        <div class="invalid-feedback">Se requiere un número válido.</div>

        <div>
        <button class="w-100 btn btn-primary btn-lg" type="submit"  onclick="openPopup()">Registrar</button>
        </div>
    </div>


        <h4>Datos de Domicilio</h4>
        <hr class="my-4">

    <div class="col-sm-6">
        <label for="calle" class="form-label">Calle</label>
        <input type="text" class="form-control" id="calle" name="calle" placeholder="">
    <div class="invalid-feedback">Se requiere una calle válida.</div>
    </div>

    <div class="col-sm-6">
        <label for="numInterior" class="form-label">Número interior</label>
        <input type="number" max="100000" min="1" class="form-control" id="numInterior" name="numInterior" placeholder="">
        <div class="invalid-feedback">Se requiere un número interior válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="numExterior" class="form-label">Número exterior</label>
        <input type="number" max="100000" min="1"  class="form-control" id="numInterior" name="numExterior" placeholder="">
    <div class="invalid-feedback">Se requiere un número exterior válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="cp" class="form-label">Código Postal (CP)</label>
        <input type="number" max="100000" min="1"  class="form-control" id="cp" name="cp" placeholder="" >
    <div class="invalid-feedback">Se requiere un código postal válido.</div>
    </div>

    <!-- <div class="col-sm-6">
        <label for="municipio" class="form-label">Municipio</label>
        <input type="text" class="form-control" id="municipio" name="municipio" placeholder="" required>
        <div class="invalid-feedback">Se requiere un municipio válido.</div>
    </div> -->

    <div class="col-sm-6">
        <label for="estado" class="form-label">Estado</label>
        <input type="text" class="form-control" id="estado" name="estado" value="OAXACA">
        <div class="invalid-feedback">Se requiere un estado válido.</div>
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
        <label for="colonia" class="form-label">Localidad/Colonia/Agencia</label>
        <input type="text" class="form-control" id="colonia" name="colonia" placeholder="">
        <div class="invalid-feedback">Se requiere una colonia válida.</div>
    </div>


    <!-- <div class="col-sm-6">
        <label for="region" class="form-label">Región</label>
        <input type="text" class="form-control" id="region" name="region" placeholder="" required>
        <div class="invalid-feedback">Se requiere una región válida.</div>
    </div> -->

    <div class="col-sm-6">
    <label for="region" class="form-label">Región</label>
    <input type="text" class="form-control" id="region"  name="region" readonly>
    <div class="invalid-feedback">Se requiere una colonia válida.</div>
    </div>

        <h4>Domicilio Persona de Confianza</h4>
        <hr class="my-4">

    <div class="col-sm-6">
        <label for="callePC" class="form-label">Calle</label>
        <input type="text" class="form-control" id="callePC" name="callePC" placeholder="">
        <div class="invalid-feedback">Se requiere una calle válida.</div>
    </div>

    <div class="col-sm-6">
        <label for="numInteriorPC" class="form-label">Número interior</label>
        <input type="number" max="100000" min="1" class="form-control" id="numInteriorPC" name="numInteriorPC" placeholder="">
        <div class="invalid-feedback">Se requiere un número interior válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="numExteriorPC" class="form-label">Número exterior</label>
        <input type="number" max="100000" min="1" class="form-control" id="numExteriorPC" name="numExteriorPC" placeholder="">
        <div class="invalid-feedback">Se requiere un número exterior válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="cppc" class="form-label">Código Postal (CP)</label>
        <input type="number" max="100000" min="1" class="form-control" id="cppc" name="cppc" placeholder="">
        <div class="invalid-feedback">Se requiere un código postal válido.</div>
    </div>

    <!-- <div class="col-sm-6">
        <label for="municipioPC" class="form-label">Municipio</label>
        <input type="text" class="form-control" id="municipioPC" name="municipioPC" placeholder="" required>
        <div class="invalid-feedback">Se requiere un municipio válido.</div>
    </div> -->

    <div class="col-sm-6">
        <label for="coloniaPC" class="form-label">Localidad/Colonia/Agencia</label>
        <input type="text" class="form-control" id="coloniaPC" name="coloniaPC" placeholder="">
        <div class="invalid-feedback">Se requiere una colonia válida.</div>
    </div>

    <div class="col-sm-6">
    <label for="estadoPC" class="form-label">Estado</label>
    <input type="text" class="form-control" id="estadoPC" name="estadoPC" value="OAXACA">
    <div class="invalid-feedback">Se requiere un estado válido.</div>
</div>


    <div class="col-sm-6">
        <label for="municipioPC" class="form-label">Municipio</label>
        <select class="form-select" id="municipios" name="municipioPC" aria-label="Selecciona una opción" onchange="mostrarRegion()">
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
    <label for="coloniaPC" class="form-label">Región</label>
    <input type="text" class="form-control" id="regionpc"  name="regionPC" readonly>
    <div class="invalid-feedback">Se requiere una colonia válida.</div>
    </div>


    <!-- <div class="col-sm-6">
        <label for="regionPC" class="form-label">Región</label>
        <input type="text" class="form-control" id="regionPC" name="regionPC" placeholder="" required>
        <div class="invalid-feedback">Se requiere una región válida.</div>
    </div> -->

    <!-- <div class="col-sm-6">
        <label for="regionPC" class="form-label">Región</label>
        <select class="form-select" id="regionPC" name="regionPC" aria-label="Selecciona una opción" required>
        <option selected disabled value="">Selecciona una opción...</option>
            <option value="VALLES CENTRALES">VALLES CENTRALES</option>
            <option value="COSTA">COSTA</option>
            <option value="SIERRA NORTE">SIERRA NORTE</option>
            <option value="SIERRA SUR">SIERRA SUR</option>
            <option value="CAÑADA">CAÑADA</option>
            <option value="MIXTECA">MIXTECA</option>
            <option value="ISTMO">ISTMO</option>
            <option value="PAPALOAPAN">PAPALOAPAN</option>
        </select>
    <div class="invalid-feedback">Se requiere una selección válida.</div>
    </div> -->

            <h4>Datos de Contacto</h4>
            <hr class="my-4">

    <div class="col-sm-6">
        <label for="telCelular" class="form-label">Teléfono celular</label>
        <input type="number" class="form-control" id="telCelular" name="telCelular" placeholder="">
        <div class="invalid-feedback">Se requiere un número de teléfono celular válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="telFijo" class="form-label">Teléfono fijo</label>
        <input type="number" class="form-control" id="telFijo" name="telFijo" placeholder="" >
        <div class="invalid-feedback">Se requiere un número de teléfono fijo válido.</div>
    </div>
    
    <div class="col-sm-6">
        <label for="telConfianza" class="form-label">Teléfono de confianza</label>
        <input type="number" class="form-control" id="telConfianza" name="telConfianza" placeholder="">
        <div class="invalid-feedback">Se requiere un número de teléfono de confianza válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="email" class="form-label">Correo electrónico</label>
        <div class="input-group has-validation">
        <span class="input-group-text">@</span>
        <input type="email" class="form-control" maxlength="50" id="email" name="email" placeholder="Correo electrónico">
        <div class="invalid-feedback">Se requiere una dirección de correo electrónico válida.</div>
        </div>
    </div>

    <div class="col-sm-6">
        <label for="emailRespaldo" class="form-label">Correo electrónico de respaldo<span class="text-body-secondary">(Opcional)</span></label>
        <input type="email" class="form-control" maxlength="50" id="emailRespaldo" name="emailRespaldo" placeholder="you@example.com">
    </div>

            <h4>Documentos comprobables</h4>
            <hr class="my-4">

    <div class="col-sm-6">
        <label for="curp" class="form-label">CURP</label>
        <input type="text" class="form-control" id="curp" name="curp" placeholder="">
        <div class="invalid-feedback">Se requiere una CURP válida.</div>
    </div>

    <div class="col-sm-6">
        <label for="ine" class="form-label">INE</label>
        <input type="text" class="form-control" id="ine" name="ine" placeholder="">
        <div class="invalid-feedback">Se requiere una INE válida.</div>
    </div>

    <div class="col-sm-6">
    <label for="rutaCURP">Documento CURP:</label><br>
    <input type="file" class="form-control" aria-label="file example" name="rutaCURP" id="rutaCURP" accept=".pdf" ><br><br>
    <div class="invalid-feedback" id="fileSizeFeedback">El archivo seleccionado excede el tamaño máximo permitido.</div>
    </div>

    <div class="col-sm-6">
        <label for="rutaINE">Documento INE:</label><br>
        <input type="file" class="form-control" aria-label="file example" name="rutaINE" id="rutaINE" accept=".pdf" ><br><br>
        <div class="invalid-feedback">Se requiere un INE.</div>
    </div>

    <div class="col-sm-6">
        <label for="rutaComDomicilio">Comprobante de Domicilio:</label><br>
        <input type="file" class="form-control" aria-label="file example" name="rutaComDomicilio" id="rutaComDomicilio" accept=".pdf" ><br><br>
        <div class="invalid-feedback">Se requiere una Comprobante de Domicilio.</div>
    </div>

            <h3>Estudio socioeconómico</h3>
            <hr class="my-4">

    <div class="col-sm-6">
        <label for="ocupacion" class="form-label">Ocupación</label>
        <input type="text" class="form-control" id="ocupacion" name="ocupacion" placeholder="">
        <div class="invalid-feedback">Se requiere una ocupación válida.</div>
    </div>
    
    <div class="col-sm-6">
        <label for="fuenteIngresos" class="form-label">Fuente de ingresos</label>
        <input type="text" class="form-control" id="fuenteIngresos" name="fuenteIngresos" placeholder="">
        <div class="invalid-feedback">Se requiere una fuente de ingresos válida.</div>
    </div>

    <div class="col-sm-6">
        <label for="sectorEconomico" class="form-label">Sector económico</label>
        <select class="form-select" id="sectorEconomico" name="sectorEconomico" aria-label="Default select example">
        <option selected disabled value="">Selecciona una opción...</option>
            <option value="SERVICIOS SOCIALES">SERVICIOS SOCIALES</option>
            <option value="INDUSTRIA MANUFACTURERA">INDUSTRIA MANUFACTURERA</option>
            <option value="COMERCIO">COMERCIO</option>
            <option value="SERVICIOS DIVERSOS">SERVICIOS DIVERSOS</option>
            <option value="SERVICIOS PROFESIONALES, FINANCIEROS Y CORPORATIVOS">SERVICIOS PROFESIONALES, FINANCIEROS Y CORPORATIVOS</option>
            <option value="RESTAURANTES Y SERVICIOS DE ALOJAMIENTO">RESTAURANTES Y SERVICIOS DE ALOJAMIENTO</option>
            <option value="GOBIERNO Y ORGANISMOS INTERNACIONALES">GOBIERNO Y ORGANISMOS INTERNACIONALES</option>
            <option value="AGRICULTURA, GANADERÍA, SILVICULTURA Y PESCA">AGRICULTURA, GANADERÍA, SILVICULTURA Y PESCA</option>
            <option value="TRANSPORTES Y ALMACENAMIENTO">TRANSPORTES Y ALMACENAMIENTO</option>
            <option value="CONSTRUCCIÓN">CONSTRUCCIÓN</option>
            <option value="INDUSTRIA EXTRACTIVA Y ELECTRICIDAD">INDUSTRIA EXTRACTIVA Y ELECTRICIDAD</option>
            <option value="OTRO">OTRO</option>
        </select>
        <div class="invalid-feedback">Se requiere seleccionar un sector económico.</div>
    </div>

    <div class="col-sm-6">
        <label for="horasTrabajo" class="form-label">Horas de trabajo al Día</label>
        <input type="number" min="1" max="24" class="form-control" id="horasTrabajo" name="horasTrabajo" placeholder="">
        <div class="invalid-feedback">Se requiere un número válido de horas de trabajo.</div>
    </div>
    
    <div class="col-sm-6">
        <label for="ingresosDiarios" class="form-label">Ingresos Diarios</label>
        <input type="number" min="1" max="1000000" class="form-control" id="ingresosDiarios" name="ingresosDiarios" placeholder="">
        <div class="invalid-feedback">Se requiere un número válido de ingresos diarios.</div>
    </div>

            <h4>Datos de vivienda </h4>
            <hr class="my-4">

    <div class="col-sm-6">
        <label for="tipoEnergia" class="form-label">Tipo de energía</label>
        <select class="form-select" id="tipoEnergia" name="tipoEnergia" aria-label="Default select example">
        <option selected disabled value="">Selecciona una opción...</option>
            <option value="ELECTRICA">Eléctrica</option>
            <option value="SOLAR">Solar</option>
            <option value="NINGUNA">Ninguna</option>
        </select>
    <div class="invalid-feedback">Se requiere seleccionar el tipo de energía.</div>
    </div>

    <div class="col-sm-6">
        <label class="form-label">¿La vivienda cuenta con servicios de agua?</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="agua" id="aguaSI" value="SI">
            <label class="form-check-label" for="aguaSI">Sí</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="agua" id="aguaNO" value="NO">
            <label class="form-check-label" for="aguaNO">No</label>
        </div>
        <div class="invalid-feedback">Se requiere seleccionar una opción para los servicios de agua.</div>
    </div>

    <div class="col-sm-6">
        <label class="form-label">¿De qué material es la mayor parte del piso de la vivienda?</label>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="materialPiso" id="pisoCemento" value="CEMENTO O FIRME">
            <label class="form-check-label" for="pisoCemento">Cemento o firme</label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="materialPiso" id="pisoTierra" value="TIERRA">
            <label class="form-check-label" for="pisoTierra">Tierra</label>
        </div>
        <div class="invalid-feedback">Se requiere seleccionar el material del piso.</div>
    </div>

    <div class="col-sm-6">
        <label for="tipoServicioAgua" class="form-label">Tipo de servicio de agua</label>
        <select class="form-select" id="tipoServicioAgua" name="tipoServicioAgua" aria-label="Default select example">
        <option selected disabled value="">Selecciona una opción...</option>
            <option value="AGUA POTABLE">Agua potable</option>
            <option value="RECOLECCIÓN DE LLUVIA">Recolección de lluvia</option>
            <option value="POZO">Pozo</option>
            <option value="AGUA POR PIPA">Agua por pipa</option>
            <option value="AGUA POR ACARREO">Agua por acarreo</option>
            <option value="OTRO">Otro</option>
        </select>
        <div class="invalid-feedback">Se requiere seleccionar el tipo de servicio de agua.</div>
    </div>

    <div class="col-sm-6">
        <label for="materialVivienda" class="form-label">Material de la vivienda</label>
        <select class="form-select" id="materialVivienda" name="materialVivienda" aria-label="Default select example">
        <option selected disabled value="">Selecciona una opción...</option>
            <option value="LÁMINA">Lámina</option>
            <option value="MATERIAL">Material</option>
            <option value="MADERA">Madera</option>
            <option value="OTRO">Otro</option>
        </select>
        <div class="invalid-feedback">Se requiere seleccionar el material de la vivienda.</div>
    </div>

    <div class="col-sm-6">
        <label class="form-label">¿Cuenta con Baño dentro de la casa?</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="banioDentro" id="banioDentroSI" value="SI">
            <label class="form-check-label" for="banioDentroSI">Sí</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="banioDentro" id="banioDentroNO" value="NO">
            <label class="form-check-label" for="banioDentroNO">No</label>
        </div>
        <div class="invalid-feedback">Se requiere seleccionar si cuenta con baño dentro de la casa.</div>
    </div>

    <div class="col-sm-6">
        <label for="TipoBano" class="form-label">¿Tipo de instalación sanitaria?</label>
        <select class="form-select" id="TipoBano" name="TipoBano" aria-label="Default select example">
        <option selected disabled value="">Selecciona una opción...</option>
            <option value="DRENAJE">Drenaje</option>
            <option value="BAÑO SECO">Baño seco</option>
            <option value="LETRINA">Letrina</option>
            <option value="AL AIRE LIBRE">Al aire libre</option>
            <option value="OTRO">Otro</option>
        </select>
    <div class="invalid-feedback">Se requiere seleccionar el tipo de instalación sanitaria.</div>
    </div>

    <div class="col-sm-6">
        <label for="personasCasa" class="form-label">¿Cuántas personas viven en la misma casa, incluyendo a niñas y niños?</label>
        <input type="number" max="20" class="form-control" id="personasCasa" name="personasCasa" placeholder="" >
        <div class="invalid-feedback">Se requiere ingresar el número de personas que viven en la misma casa.</div>
    </div>

    <div class="col-sm-6">
        <label for="personasDormitorio" class="form-label">¿Cuántas personas duermen en un mismo cuarto, incluyendo a niñas y niños?</label>
        <input type="number" max="20" class="form-control" id="personasDormitorio" name="personasDormitorio" placeholder="">
        <div class="invalid-feedback">Se requiere ingresar el número de personas que duermen en un mismo cuarto.</div>
    </div>

    <div class="col-sm-6">
        <label for="tipoVivienda" class="form-label">Tipo de vivienda</label>
        <select class="form-select" id="tipoVivienda" name="tipoVivienda" aria-label="Default select example">
        <option selected disabled value="">Selecciona una opción...</option>
            <option value="PRESTADA">Prestada</option>
            <option value="RENTADA">Rentada</option>
            <option value="PROPIA">Propia</option>
            <option value="FINANCIADA">Financiada</option>
            <option value="DE FAMILIARES">De familiares</option>
            <option value="OTRO">Otro</option>
        </select>
        <div class="invalid-feedback">Se requiere seleccionar el tipo de vivienda.</div>
    </div>

    <div class="col-sm-12">
        <label for="comoSeEntero" class="form-label">¿Cómo se enteró de GESMujer?</label>
        <select class="form-select" id="comoSeEntero" name="comoSeEntero" aria-label="Default select example">
        <option selected disabled value="">Selecciona una opción...</option>
            <option value="MEDIOS DE COMUNICACIÓN TRADICIONALES">Medios de comunicación tradicionales</option>
            <option value="REDES SOCIALES">Redes sociales</option>
            <option value="PÁGINA WEB">Página web</option>
            <option value="RECOMENDACIÓN DE ALGUNA PERSONA">Recomendación de alguna persona</option>
            <option value="FOLLETOS, CARTELES, ETC.">Folletos, carteles, etc.</option>
            <option value="OTRO">Otro</option>
        </select>
        <div class="invalid-feedback">Se requiere seleccionar cómo se enteró del programa.</div>
    </div>

    <div class="col-sm-6">
        <label class="form-label">¿La pareja es el agresor?</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="parejaTrabaja" id="parejaTrabaja1" value="SI">
            <!-- onclick="showParejaInput()" -->
            <label class="form-check-label" for="parejaTrabaja1">SI</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="parejaTrabaja" id="parejaTrabaja2" value="NO" >
            <!-- onclick="hideParejaInput()" -->
            <label class="form-check-label" for="parejaTrabaja2">NO</label>
        </div>
    </div>

    <div class="col-sm-6" id="NombreAgresor">
        <label for="NombreAgresor" class="form-label">¿Nombre del agresor?</label>
        <input type="text" class="form-control" id="Agresor" name="NombreAgresor">
        <div class="invalid-feedback">Se requiere un apellido válido.</div>
    </div>

    <div class="col-sm-6" id="DondeTrabaja">
        <label for="DondeTrabaja" class="form-label">¿Dónde trabaja?</label>
        <input type="text" class="form-control" id="Trabaja" name="DondeTrabaja">
        <div class="invalid-feedback">Se requiere un apellido válido.</div>
    </div>


            <h4>Valoración de Violencia</h4>
            <hr class="my-4">

    <div class="col-sm-12">
        <div class="mb-3">
        <label for="situacionUsuaria" class="form-label">Situación de usuaria</label>
        <textarea class="form-control" id="situacionUsuaria" name="situacionUsuaria" rows="3" placeholder="Breve descripción del motivo de la solicitud de atención. (Circunstancias de modo, tiempo y lugar)"></textarea>
        <div class="invalid-feedback">La situación de la usuaria es requerida.</div>
        </div>
    </div>

    <div class="col-sm-6">
        <label class="form-label">¿Tiene o tuvo una relación con la persona agresora?</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="relacionAgresora" id="relacionAgresoraSI" value="SI" onclick="showRelacionInput()">
            <label class="form-check-label" for="relacionAgresoraSI">SI</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="relacionAgresora" id="relacionAgresoraNO" value="NO" onclick="hideRelacionInput()">
            <label class="form-check-label" for="relacionAgresoraNO">NO</label>
        </div>
    </div>

    <div class="col-sm-6" id="RelacionInput" style="display: none;">
        <label for="tipoRelacion" class="form-label">Indique el tipo de relación</label>
        <input type="text" class="form-control" id="tipoRelacion" name="tipoRelacion" placeholder="" >
        <div class="invalid-feedback">Se requiere un tipo de relación válido.</div>
    </div>
        
    <div class="col-sm-6">
        <label class="form-label">¿Actualmente vives con tu pareja?</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="viveConPareja" id="viveConParejaSI" value="SI" onclick="showVivesInput()">
            <label class="form-check-label" for="viveConParejaSI">SI</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="viveConPareja" id="viveConParejaNO" value="NO" onclick="hideVivesInput()">
            <label class="form-check-label" for="viveConParejaNO">NO</label>
        </div>
    </div>

    <div class="col-sm-6" id="VivesInput" style="display: none;">
        <label for="tiempoViviendoPareja" class="form-label">Tiempo que lleva viviendo la pareja (Meses)</label>
        <input type="number" max="1000" class="form-control" id="tiempoViviendoPareja" name="tiempoViviendoPareja" placeholder="" >
        <div class="invalid-feedback">Se requiere un tiempo de convivencia válido.</div>
    </div>

    <div class="col-sm-6">
        <label class="form-label">¿La persona agresora te ha amenazado o chantajeado?</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="chantajeado" id="chantajeadoSI" value="SI" onclick="showAgresoraInput()">
            <label class="form-check-label" for="chantajeadoSI">SI</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="chantajeado" id="chantajeadoNO" value="NO" onclick="hideAgresoraInput()">
            <label class="form-check-label" for="chantajeadoNO">NO</label>
        </div>
    </div>
        
    <div class="col-sm-6" id="AgresoraInput" style="display: none;">
        <label for="comochantajeado" class="form-label">Indica cómo te ha amenazado o chantajeado</label>
        <input type="text" class="form-control" id="comochantajeado" name="comochantajeado" placeholder="" value="">
        <div class="invalid-feedback">Se requiere una descripción válida de la amenaza o chantaje.</div>
    </div>

    <div class="col-sm-6">
        <label class="form-label">¿Considera que su pareja o expareja es celosa?</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="parejaCelosa" id="celosaSI" value="SI" >
            <label class="form-check-label" for="celosaSI">SI</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="parejaCelosa" id="celosaNO" value="NO">
            <label class="form-check-label" for="celosaNO">NO</label>
        </div>
    </div>

    <div class="col-sm-6">
        <label class="form-label">¿Su pareja o expareja utiliza a sus hijos/as para mantenerla a usted bajo control?</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="utilizaHijos" id="utilizaHijosSI" value="SI">
            <label class="form-check-label" for="utilizaHijosSI">SI</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="utilizaHijos" id="utilizaHijosNO" value="NO">
            <label class="form-check-label" for="utilizaHijosNO">NO</label>
        </div>
    </div>

    <div class="col-sm-6">
        <label class="form-label">¿Su pareja es consumidor habitual de alcohol o drogas?</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="consumidora" id="consumidoraSI" value="SI">
            <label class="form-check-label" for="consumidoraSI">SI</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="consumidora" id="consumidoraNO" value="NO">
            <label class="form-check-label" for="consumidoraNO">NO</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="consumidora" id="consumidoraNOSE" value="NO SE">
            <label class="form-check-label" for="consumidoraNO">NO SÉ</label>
        </div>
    </div>

    <div class="col-sm-6">
        <label class="form-label">¿Su pareja o expareja le agredió de manera física, menos de cinco veces en el último mes?</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="agresion" id="agresionSI" value="SI">
            <label class="form-check-label" for="agresionSI">SI</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="agresion" id="agresionNO" value="NO">
            <label class="form-check-label" for="agresionNO">NO</label>
          </div>
      </div>

      <div class="col-sm-6">
        <label class="form-label">En el último año, ¿las agresiones se han incrementado?</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="incrementoAgresiones" id="incrementoAgresionesSI" value="SI">
            <label class="form-check-label" for="incrementoAgresionesSI">SI</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="incrementoAgresiones" id="incrementoAgresionesNO" value="NO">
            <label class="form-check-label" for="incrementoAgresionesNO">NO</label>
        </div>
    </div>
    
    <div class="col-sm-6">
        <label class="form-label">¿De las agresiones sufridas ha requerido atención médica u hospitalaria?</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="atencionMedica" id="atencionMedicaSI" value="SI">
            <label class="form-check-label" for="atencionMedicaSI">SI</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="atencionMedica" id="atencionMedicaNO" value="NO">
            <label class="form-check-label" for="atencionMedicaNO">NO</label>
        </div>
    </div>
    
    <div class="col-sm-6">
        <label class="form-label">¿Ha sido amenazada con armas como machete, cuchillo, pistola, u otra, o incluso ha sido herida con alguna?</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="amenazadaConArmas" id="amenazadaConArmasSI" value="SI">
            <label class="form-check-label" for="amenazadaConArmasSI">SI</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="amenazadaConArmas" id="amenazadaConArmasNO" value="NO">
            <label class="form-check-label" for="amenazadaConArmasNO">NO</label>
        </div>
    </div>
    
    <div class="col-sm-6">
        <label class="form-label">¿Ha intentado ahorcarla?</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="intentoAhorcar" id="intentoAhorcarSI" value="SI">
            <label class="form-check-label" for="intentoAhorcarSI">SI</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="intentoAhorcar" id="intentoAhorcarNO" value="NO">
            <label class="form-check-label" for="intentoAhorcarNO">NO</label>
        </div>
    </div>

    <div class="col-sm-6">
        <label class="form-label">¿Siente temor por su vida?</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="sienteTemorVida" id="sienteTemorVidaSI" value="SI">
            <label class="form-check-label" for="sienteTemorVidaSI">SI</label>
    </div>
    <div class="form-check">
            <input class="form-check-input" type="radio" name="sienteTemorVida" id="sienteTemorVidaNO" value="NO">
            <label class="form-check-label" for="sienteTemorVidaNO">NO</label>
    </div>
    </div>

    <div class="col-sm-6">
        <label class="form-label">¿La persona agresora posee o tiene acceso a un arma de fuego?</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="poseeArmaFuego" id="poseeArmaFuegoSI" value="SI">
            <label class="form-check-label" for="poseeArmaFuegoSI">SI</label>
    </div>
    <div class="form-check">
            <input class="form-check-input" type="radio" name="poseeArmaFuego" id="poseeArmaFuegoNO" value="NO">
            <label class="form-check-label" for="poseeArmaFuegoNO">NO</label>
    </div>
    </div>

    <div class="col-sm-6">
        <label class="form-label">¿Ha interpuesto denuncia en contra de la persona agresora por anteriores hechos de violencia?</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="denuncia" id="denunciaSI" value="SI" onclick="showDenunciaInput()">
            <label class="form-check-label" for="denunciaSI">SI</label>
    </div>
    <div class="form-check">
            <input class="form-check-input" type="radio" name="denuncia" id="denunciaNO" value="NO" onclick="hideDenunciaInput()">
            <label class="form-check-label" for="denunciaNO">NO</label>
    </div>
    </div>

    <div class="col-sm-6" id="DenunciaInput"style="display: none;">
        <label for="state" class="form-label">Tipo de Denuncia</label>
        <select class="form-select" id="tipoDenuncia" name="tipoDenuncia" placeholder="Especifique el tipo de denuncia">
            <option value="ABUSO">Abuso</option>
            <option value="VIOLACIÓN">Violación</option>
            <option value="ROBO">Robo</option>
            <option value="VIOLENCIA FAMILIAR">violencia familiar </option>
            <option value="NARCO MENUDEO">Narco menudeo</option>
        </select>
        <div class="invalid-feedback">Selecciona una opción Válida.</div>
    </div> 

    <div class="col-sm-6">
        <label class="form-label">¿La persona agresora está o ha sido ingresada a prisión?</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="ingresadoPrision" id="ingresadoPrisionSI" value="SI">
        <label class="form-check-label" for="ingresadoPrisionSI">SI</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="ingresadoPrision" id="ingresadoPrisionNO" value="NO">
        <label class="form-check-label" for="ingresadoPrisionNO">NO</label>
    </div>
    </div>

            <h4>Valoración de Violencia</h4>
            <hr class="my-4">
    <div class="col-sm-12">
        <label for="valoracionRiesgo" class="form-label" id="valoracionRiesgo"  placeholder="Especifique el tipo de Violencia">Valoración de riesgo</label>
        <select class="form-select" id="valoracionRiesgo" name="valoracionRiesgo">
        <option selected disabled value="">Selecciona una opción...</option>
        <option value="RIESGO BAJO ">Riesgo Bajo </option>
        <option value="RIESGO MODERADO">Riesgo Moderado</option>
        <option value="RIESGO ALTO">Riesgo Alto</option>
        <option value="RIESGO SEVERO">Riesgo Severo</option>
        </select>
    <div class="invalid-feedback">Selecciona una opción Válida.</div>
    </div> 

    <div class="col-sm-6">
        <label class="form-label">¿Canalización?</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="canalizacion" id="canalizacionExterna" value="EXTERNA" onclick="showCanaInput()">
            <label class="form-check-label" for="canalizacionExterna">Externa</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="canalizacion" id="canalizacionInterna" value="INTERNA" onclick="hideCanaInput()">
            <label class="form-check-label" for="canalizacionInterna">Interna</label>
        </div>
    </div>

    <div class="col-sm-6" id="CanaInput" style="display: none;">
        <label for="canalizacionExterna" class="form-label">Externa</label>
        <input type="text" class="form-control" id="Externa" name="canalizacionExterna" placeholder="">
    </div>

    <div class="col-sm-6" id="CanadosInput" style="display: none;">
        <label for="canalizacionInterna" class="form-label">Interna</label>
        <select class="form-select" id="canalizacionInterna" name="canalizacionInterna">
        <option selected disabled value="">Selecciona una opción...</option>
            <option value="JURÍDICA">JURÍDICA</option>
            <option value="PSICOLÓGICA">PSICOLÓGICA</option>
            <option value="MÉDICA">MÉDICA</option>
            <option value="NUTRICIONAL">NUTRICIONA</option>
            <option value="ACOMPAÑAMIENTO A LA INTERRUPCIÓN DEL EMBARAZO">ACOMPAÑAMIENTO A LA INTERRUPCIÓN DEL EMBARAZO</option>
        </select> 
    </div>

    <div class="col-sm-12">
    <div class="mb-3">
        <label for="auxiliosPsicologicos" class="form-label">Primeros auxilios psicológicos</label>
        <textarea class="form-control" id="auxiliosPsicologicos" name="auxiliosPsicologicos"  placeholder="Breve descripción del motivo de la solicitud de atención. (Circunstancias de modo, tiempo y lugar)"></textarea>
    </div>
    <div class="invalid-feedback">Por favor, proporcione una descripción válida.</div>
    </div>

    <div class="col-sm-12">
    <div>
    <button class="w-100 btn btn-primary btn-lg" type="submit"  onclick="openPopupp()">Registrar Tipo de Violencia</button>
    </div>
    </div>

    </div>

            <hr class="my-4">

    <!-- <button class="w-100 btn btn-primary btn-lg" type="submit"  onclick="openPopup()">Registrar</button> -->
    <!-- <button class="w-100 btn btn-primary btn-lg" type="submit">Registrar</button> -->
    </form>
    </div>
    </div>
    </main>

        <footer class="my-5 pt-5 text-body-secondary text-center text-small">
              <?php
          require_once __DIR__ . '/../checkout/CR.php';
          ?>
                <ul class="list-inline">
                    <!-- <li class="list-inline-item"><a href="#">Privacy</a></li> -->
                </ul>
        </footer>
    </div>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="forms.js"></script>
    <script src="checkout.js"></script>
    <script src="regiones.js"></script>
    <script src="register.js"></script>

    <script>
function openPopup() {
    var popup = window.open('ventana_hijos.php', '_blank', 'width=700,height=700');
}

// Esta función se llama desde la ventana emergente para cerrarla después de enviar el formulario
function closePopup() {
    window.close();
}

function openPopupp() {
    var popup = window.open('venta-violencia.php', '_blank', 'width=700,height=700');
}

// Esta función se llama desde la ventana emergente para cerrarla después de enviar el formulario
function closePopupp() {
    window.close();
}
</script>

<script>
    document.getElementById('birthdate').addEventListener('change', function () {
    var birthdate = new Date(this.value);
    var today = new Date();
    var age = today.getFullYear() - birthdate.getFullYear();
    var m = today.getMonth() - birthdate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthdate.getDate())) {
        age--;
    }
    document.getElementById('age').value = age;
});

</script>
    </body>
        </html>
        
        
        

