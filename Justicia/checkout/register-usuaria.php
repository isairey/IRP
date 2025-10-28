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

    $userId = $conn->lastInsertId();

// Insertar hijos si hay alguno
if(isset($_POST['hijos']) && is_array($_POST['hijos'])) {
    $sqlHijos = "INSERT INTO Hijos_Usuario 
        (ID_Usuario, Nombre, ApellidoPaterno, ApellidoMaterno, FechaNacimiento, Sexo, Escolaridad, Condicion)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmtHijo = $conn->prepare($sqlHijos);

    foreach($_POST['hijos'] as $hijo) {
        $stmtHijo->execute([
            $userId,
            $hijo['nombre']?? '-',
            $hijo['apellido_paterno']?? '-',
            $hijo['apellido_materno'] ?? '-',
            $hijo['fecha_nacimiento'],
            $hijo['sexo']?? '-',
            $hijo['escolaridad'] ?? '-',
            $hijo['condicion'] ?? '-'
        ]);
    }
}


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
        <form id="miFormulario" class="needs-validation" action="register-usuaria.php" method="POST" enctype="multipart/form-data"  novalidate onsubmit="closePopup();">
    <div class="row g-3">
            
    <div class="col-sm-12">
        <label for="firstName" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="firstName" name="nombre" placeholder="" required  oninput="validateInput(this)">
    <div class="invalid-feedback">Se requiere un nombre válido.</div>
    <div class="valid-feedback">Looks good!</div>
    </div>

    <div class="col-sm-6">
        <label for="lastName" class="form-label">Apellido Paterno:</label>
        <input type="text" class="form-control" id="lastName" name="apellidoPaterno" placeholder="">
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
        <input type="date" class="form-control" id="fecharegistro" name="fecharegistro" placeholder="" value="<?php echo date('Y-m-d'); ?>">
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
    <input type="text" class="form-control" id="lugarNacimiento" name="lugarNacimiento" placeholder="Escribe o selecciona un distrito..." autocomplete="off">
    <div class="sugerencias" id="sug_lugarNacimiento" style="border:1px solid #ccc; max-height:150px; overflow-y:auto;"></div>
    <input type="hidden" id="selected_lugar_id" name="selected_lugar_id">
    <div class="invalid-feedback">Se requiere un distrito válido.</div>
</div>

<?php
// --- PHP: obtener todos los distritos/municipios ---
$host = 'localhost';
$db   = 'oaxacaa';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    $stmt = $pdo->query("SELECT id_municipio_inegi, nombre FROM municipios ORDER BY nombre ASC");
    $municipios = $stmt->fetchAll();

    // Pasar los datos a JS como array
    $municipios_json = json_encode($municipios);

} catch (PDOException $e) {
    $municipios_json = json_encode([]);
    echo "<script>console.error('Error al cargar municipios: ".$e->getMessage()."');</script>";
}
?>

<script>
const input = document.getElementById('lugarNacimiento');
const sugBox = document.getElementById('sug_lugarNacimiento');
const hiddenId = document.getElementById('selected_lugar_id');

// Municipios cargados desde PHP
const municipios = <?php echo $municipios_json; ?>;

// Función para filtrar y mostrar sugerencias
input.addEventListener('input', function() {
    const val = this.value.toLowerCase();
    sugBox.innerHTML = '';

    if (val.length === 0) {
        hiddenId.value = '';
        return;
    }

    const filtered = municipios.filter(m => m.nombre.toLowerCase().includes(val));

    if (filtered.length === 0) {
        sugBox.innerHTML = '<div style="padding:5px;">No hay coincidencias</div>';
        hiddenId.value = '';
        return;
    }

    filtered.forEach(m => {
        const div = document.createElement('div');
        div.textContent = m.nombre;
        div.style.padding = '5px';
        div.style.cursor = 'pointer';
        div.addEventListener('click', () => {
            input.value = m.nombre;
            hiddenId.value = m.id_municipio_inegi;
            sugBox.innerHTML = '';
        });
        sugBox.appendChild(div);
    });
});

// Ocultar sugerencias al perder foco
input.addEventListener('blur', () => {
    setTimeout(() => { sugBox.innerHTML = ''; }, 150);
});
</script>



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
  <select class="form-select" id="firstName" name="lenguaMaterna" required>
    <option value="">Selecciona una lengua materna</option>
    <option value="Español" selected>Español</option>
    <option value="Zapoteco">Zapoteco</option>
    <option value="Mixteco">Mixteco</option>
    <option value="Mazateco">Mazateco</option>
    <option value="Triqui">Triqui</option>
    <option value="Cuicateco">Cuicateco</option>
    <option value="Chontal de Oaxaca">Chontal de Oaxaca</option>
    <option value="Chinanteco">Chinanteco</option>
    <option value="Ixcateco">Ixcateco</option>
    <option value="Huave">Huave</option>
    <option value="Mixe">Mixe</option>
    <option value="Trique">Trique</option>
    <option value="Zoque de Oaxaca">Zoque de Oaxaca</option>
    <option value="Amuzgo">Amuzgo</option>
    <option value="Otros">Otros</option>
  </select>
  <div class="invalid-feedback">Se requiere una lengua materna válida.</div>
</div>




    <div class="col-sm-6">
  <label class="form-label">¿Habla alguna lengua indígena?</label>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="hablaLenguaIndigena" id="exampleRadios1" value="SI" onclick="showLanguageSelect()">
    <label class="form-check-label" for="exampleRadios1">Sí</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="hablaLenguaIndigena" id="exampleRadios2" value="NO" onclick="hideLanguageSelect()">
    <label class="form-check-label" for="exampleRadios2">No</label>
  </div>
</div>

<div class="col-sm-6" id="languageSelectContainer" style="display: none;">
  <label for="lenguaIndigena" class="form-label">¿Cuál?</label>
  <select class="form-select" id="lenguaIndigena" name="lenguaIndigena">
    <option selected disabled value="">Seleccionar lengua...</option>
    <option value="Zapoteco">Zapoteco</option>
    <option value="Mixteco">Mixteco</option>
    <option value="Mazateco">Mazateco</option>
    <option value="Chinanteco">Chinanteco</option>
    <option value="Mixe">Mixe</option>
    <option value="Triqui">Triqui</option>
    <option value="Chatino">Chatino</option>
    <option value="Amuzgo">Amuzgo</option>
    <option value="Cuicateco">Cuicateco</option>
    <option value="Trique">Trique</option>
    <option value="Huave">Huave</option>
    <option value="Chontal">Chontal</option>
    <option value="Ixcateco">Ixcateco</option>
    <option value="Zoque">Zoque</option>
    <option value="Náhuatl">Náhuatl</option>
    <option value="Otros">Otros</option>
  </select>
</div>

<script>
  function showLanguageSelect() {
    document.getElementById('languageSelectContainer').style.display = 'block';
  }

  function hideLanguageSelect() {
    document.getElementById('languageSelectContainer').style.display = 'none';
    document.getElementById('lenguaIndigena').value = ''; // Limpia selección
  }
</script>

 
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
        <label class="form-check-label" for="hijos1">SI</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="decendencia" id="hijos2" value="NO" onclick="hideHijosInput()">
        <label class="form-check-label" for="hijos2">NO</label>
    </div>
</div>

<div class="col-sm-12" id="HijosInput" style="display: none;">
    <label for="numDecendencia" class="form-label">¿Cuántos?</label>
    <input type="number" min="1" max="15" class="form-control mb-3" id="numDecendencia" name="numDecendencia" placeholder="Ingrese un número" oninput="generarCamposHijos()">
    <div class="invalid-feedback">Se requiere un número válido.</div>

    <div id="formularios_hijos"></div>
</div>

<script>
function showHijosInput() {
    document.getElementById('HijosInput').style.display = 'block';
}

function hideHijosInput() {
    document.getElementById('HijosInput').style.display = 'none';
    document.getElementById('formularios_hijos').innerHTML = ''; // Limpiar campos si el usuario cambia a NO
}

function generarCamposHijos() {
    const cantidad = parseInt(document.getElementById('numDecendencia').value) || 0;
    const contenedor = document.getElementById('formularios_hijos');
    contenedor.innerHTML = ''; // Limpiar antes de generar

    for (let i = 0; i < cantidad; i++) {
        const div = document.createElement('div');
        div.classList.add('mb-3');
        div.innerHTML = `
            <h5>Hijo ${i + 1}</h5>
            <div class="row">

                <div class="col-sm-6">
                    <label class="form-label">Nombre:</label>
                    <input type="text" name="hijos[${i}][nombre]" id="firstName" class="form-control" required  oninput="validateInput(this)">
                <div class="invalid-feedback">Se requiere un nombre válido.</div>
    <div class="valid-feedback">Looks good!</div>
                    </div>
                <div class="col-sm-6">
                    <label class="form-label">Apellido Paterno:</label>
                    <input type="text" name="hijos[${i}][apellido_paterno]" class="form-control" >
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-6">
                    <label class="form-label">Apellido Materno:</label>
                    <input type="text" name="hijos[${i}][apellido_materno]" class="form-control">
                </div>
                <div class="col-sm-6">
                    <label class="form-label">Fecha de Nacimiento:</label>
                    <input type="date" name="hijos[${i}][fecha_nacimiento]" class="form-control" >
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-6">
                    <label class="form-label">Sexo:</label>
                    <select name="hijos[${i}][sexo]" class="form-select" >
                        <option value="">Selecciona</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label class="form-label">Escolaridad:</label>
                    <input type="text" name="hijos[${i}][escolaridad]" class="form-control">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-6">
                    <label class="form-label">Condición:</label>
                    <input type="text" name="hijos[${i}][condicion]" class="form-control">
                </div>
            </div>
            <hr>
        `;
        contenedor.appendChild(div);
    }
}
</script>



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

  













        <input type="hidden" id="selected_region_id">
        <input type="hidden" id="selected_distrito_id">
        <input type="hidden" id="selected_municipio_id">
        <input type="hidden" id="selected_localidad_id"> 


        <div class="col-sm-6">
  <label for="cp" class="form-label">Código Postal (CP)</label>
  <input type="number" max="100000" min="1" class="form-control" id="cp" name="cp" placeholder="">
  <div class="invalid-feedback">Se requiere un código postal válido.</div>
</div>

        <div class="col-sm-6">

            <label for="input_region" class="form-label">Región:</label>
            <input type="text" class="form-control" id="input_region" name="region" placeholder="Escribe para buscar región..." autocomplete="off">
            <div class="sugerencias" id="sug_region"></div>
        </div>

        <div class="col-sm-6">
            <label for="input_distrito" class="form-label">Distrito:</label>
            <input type="text" id="input_distrito" class="form-control" placeholder="Escribe para buscar distrito..." autocomplete="off">
            <div class="sugerencias" id="sug_distrito"></div>
        </div>

        <div class="col-sm-6">
            <label for="input_municipio" class="form-label">Municipio:</label>
            <input type="text" id="input_municipio" class="form-control" name="municipio" placeholder="Escribe para buscar municipio..." autocomplete="off">
            <div class="sugerencias" id="sug_municipio"></div>
        </div>

        <div class="col-sm-6">
            <label for="input_localidad" class="form-label">Localidad:</label>
            <input type="text" id="input_localidad" class="form-control" name="colonia" placeholder="Escribe el nombre de la localidad..." autocomplete="off">
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

       <!-- Campos ocultos con IDs -->
<input type="hidden" id="selected_region_idPC" name="selected_region_idPC">
<input type="hidden" id="selected_distrito_idPC" name="selected_distrito_idPC">
<input type="hidden" id="selected_municipio_idPC" name="selected_municipio_idPC">
<input type="hidden" id="selected_localidad_idPC" name="selected_localidad_idPC">

<div class="col-sm-6">
  <label for="cpPC" class="form-label">Código Postal (CP)</label>
  <input type="number" max="100000" min="1" class="form-control" id="cpPC" name="cppc" placeholder="">
  <div class="invalid-feedback">Se requiere un código postal válido.</div>
</div>

<div class="col-sm-6">
  <label for="input_regionPC" class="form-label">Región:</label>
  <input type="text" class="form-control" name="regionPC" id="input_regionPC" placeholder="Escribe para buscar región..." autocomplete="off">
  <div class="sugerencias" id="sug_regionPC"></div>
</div>

<div class="col-sm-6">
  <label for="input_distritoPC" class="form-label">Distrito:</label>
  <input type="text" id="input_distritoPC" class="form-control" placeholder="Escribe para buscar distrito..." autocomplete="off">
  <div class="sugerencias" id="sug_distritoPC"></div>
</div>

<div class="col-sm-6">
  <label for="input_municipioPC" class="form-label">Municipio:</label>
  <input type="text" id="input_municipioPC" class="form-control" name="municipioPC" placeholder="Escribe para buscar municipio..." autocomplete="off">
  <div class="sugerencias" id="sug_municipioPC"></div>
</div>

<div class="col-sm-6">
  <label for="input_localidadPC" class="form-label">Localidad:</label>
  <input type="text" id="input_localidadPC" class="form-control" name="coloniaPC" placeholder="Escribe el nombre de la localidad..." autocomplete="off">
  <div class="sugerencias" id="sug_localidadPC"></div>
</div>
 <div id="detallesPC" style="display: none;">
 
  <p><strong>Localidad:</strong> <span id="res_localidadPC"></span></p>
  <p><strong>Municipio:</strong> <span id="res_municipioPC"></span></p>
  <p><strong>Distrito:</strong> <span id="res_distritoPC"></span></p>
  <p><strong>Región:</strong> <span id="res_regionPC"></span></p>
</div>

    

<script>
    // --- Referencias a los elementos (PC) ---
    const inputsPC = {
        region: document.getElementById('input_regionPC'),
        distrito: document.getElementById('input_distritoPC'),
        municipio: document.getElementById('input_municipioPC'),
        localidad: document.getElementById('input_localidadPC')
    };
    const suggestionsPC = {
        region: document.getElementById('sug_regionPC'),
        distrito: document.getElementById('sug_distritoPC'),
        municipio: document.getElementById('sug_municipioPC'),
        localidad: document.getElementById('sug_localidadPC')
    };
    const selectedIdsPC = {
        region: document.getElementById('selected_region_idPC'),
        distrito: document.getElementById('selected_distrito_idPC'),
        municipio: document.getElementById('selected_municipio_idPC'),
        localidad: document.getElementById('selected_localidad_idPC')
    };

    // --- LÓGICA DE BÚSQUEDA (keyup) ---
    inputsPC.region.addEventListener('keyup', e => handleSearchPC('region', e.target.value));
    inputsPC.distrito.addEventListener('keyup', e => handleSearchPC('distrito', e.target.value));
    inputsPC.municipio.addEventListener('keyup', e => handleSearchPC('municipio', e.target.value));
    inputsPC.localidad.addEventListener('keyup', e => handleSearchPC('localidad', e.target.value));

    async function handleSearchPC(type, query) {
        if (query.length < 2) {
            suggestionsPC[type].innerHTML = '';
            if (query.length === 0) {
                if (selectedIdsPC[type]) selectedIdsPC[type].value = '';
                resetChildrenPC(type);
            }
            return;
        }

        const params = new URLSearchParams({ type: type, q: query });

        // --- Filtros jerárquicos ---
        if (type === 'distrito' && selectedIdsPC.region.value)
            params.append('region_id', selectedIdsPC.region.value);
        if (type === 'municipio') {
            if (selectedIdsPC.distrito.value) params.append('distrito_id', selectedIdsPC.distrito.value);
            else if (selectedIdsPC.region.value) params.append('region_id', selectedIdsPC.region.value);
        }
        if (type === 'localidad') {
            if (selectedIdsPC.municipio.value) params.append('municipio_id', selectedIdsPC.municipio.value);
            else if (selectedIdsPC.distrito.value) params.append('distrito_id', selectedIdsPC.distrito.value);
            else if (selectedIdsPC.region.value) params.append('region_id', selectedIdsPC.region.value);
        }

        try {
            const response = await fetch(`./api.php?${params.toString()}`);
            if (!response.ok) throw new Error(`Error ${response.status}: ${response.statusText}`);
            const data = await response.json();

            if (data.error) {
                console.error("Error del backend:", data.error);
                suggestionsPC[type].innerHTML = `<div>Error: ${data.error}</div>`;
            } else {
                mostrarSugerenciasPC(type, data);
            }
        } catch (error) {
            console.error("Error en fetch o procesando JSON:", error);
            suggestionsPC[type].innerHTML = `<div>Error al buscar: ${error.message}</div>`;
        }
    }

    // --- Mostrar sugerencias (PC) ---
    function mostrarSugerenciasPC(type, data) {
        const sugBox = suggestionsPC[type];
        sugBox.innerHTML = '';

        if (!Array.isArray(data)) {
            sugBox.innerHTML = '<div>No se recibieron sugerencias válidas.</div>';
            return;
        }
        if (data.length === 0) {
            sugBox.innerHTML = '<div>No hay coincidencias.</div>';
            return;
        }

        data.forEach(item => {
            const div = document.createElement('div');
            let id_value = item.id_region || item.id_distrito || item.id_municipio_inegi || item.id_asentamiento;
            div.innerHTML = `<strong>${item.nombre || 'Nombre no disponible'}</strong>`;
            if (type === 'localidad' && item.tipo_asentamiento)
                div.innerHTML += `<small>${item.tipo_asentamiento} - CP: ${item.codigo_postal || 'N/A'}</small>`;
            if (id_value !== undefined && id_value !== null)
                div.addEventListener('click', () => handleSuggestionClickPC(type, item, id_value));
            sugBox.appendChild(div);
        });
    }

    // --- Click en sugerencia (PC) ---
    async function handleSuggestionClickPC(type, itemData, id) {
        Object.values(suggestionsPC).forEach(sug => sug.innerHTML = '');
        document.getElementById('detallesPC').style.display = 'none';

        inputsPC[type].value = itemData.nombre;
        if (selectedIdsPC[type]) selectedIdsPC[type].value = id;
        resetChildrenPC(type);
        await fetchFullDetailsPC(type, id);
    }

    // --- Obtener detalles y rellenar (PC) ---
    async function fetchFullDetailsPC(type, id) {
        const paramName = (type === 'localidad') ? 'localidad_id' : `${type}_id`;

        try {
            const response = await fetch(`./api.php?type=get_full_details&${paramName}=${id}`);
            if (!response.ok) throw new Error(`Error ${response.status}: ${response.statusText}`);
            const details = await response.json();

            if (!details.error) populateFieldsPC(details);
        } catch (error) {
            console.error("Error en fetchFullDetailsPC:", error);
        }
    }

    // --- Rellenar los campos (PC) ---
    function populateFieldsPC(details) {
        console.log("Datos recibidos (PC):", details);

        // Región
        if (details.region_id !== undefined) {
            inputsPC.region.value = details.region_nombre || '';
            selectedIdsPC.region.value = details.region_id || '';
        }

        // Distrito
        if (details.distrito_id !== undefined) {
            inputsPC.distrito.value = details.distrito_nombre || '';
            selectedIdsPC.distrito.value = details.distrito_id || '';
        }

        // Municipio
        if (details.municipio_id !== undefined) {
            inputsPC.municipio.value = details.municipio_nombre || '';
            selectedIdsPC.municipio.value = details.municipio_id || '';
        }

        // Localidad
        if (details.localidad_id !== undefined) {
            inputsPC.localidad.value = details.localidad_nombre || '';
            selectedIdsPC.localidad.value = details.localidad_id || '';
        }

        // Código Postal
        if (details.codigo_postal)
            document.getElementById('cpPC').value = details.codigo_postal;
        else
            document.getElementById('cpPC').value = '';

        // Mostrar detalles
        if (details.localidad_id !== null && details.localidad_id !== undefined) {
            document.getElementById('res_localidadPC').textContent = details.localidad_nombre || 'N/A';
            document.getElementById('res_municipioPC').textContent = details.municipio_nombre || 'N/A';
            document.getElementById('res_distritoPC').textContent = details.distrito_nombre || 'N/A';
            document.getElementById('res_regionPC').textContent = details.region_nombre || 'N/A';

            let extra = '';
            if (details.tipo_asentamiento) extra += ` (${details.tipo_asentamiento})`;
            if (details.codigo_postal) extra += ` - CP: ${details.codigo_postal}`;
            document.getElementById('res_localidadPC').textContent += extra;

            document.getElementById('detallesPC').style.display = 'block';
        } else {
            document.getElementById('detallesPC').style.display = 'none';
        }
    }

    // --- Reset hijos (PC) ---
    function resetChildrenPC(typeChanged) {
        document.getElementById('detallesPC').style.display = 'none';
        const hierarchy = ['region', 'distrito', 'municipio', 'localidad'];
        const startIndex = hierarchy.indexOf(typeChanged);
        if (startIndex > -1 && startIndex < hierarchy.length - 1) {
            for (let i = startIndex + 1; i < hierarchy.length; i++) {
                const childType = hierarchy[i];
                if (inputsPC[childType]) inputsPC[childType].value = '';
                if (selectedIdsPC[childType]) selectedIdsPC[childType].value = '';
                if (suggestionsPC[childType]) suggestionsPC[childType].innerHTML = '';
            }
        }
    }

    // --- Reset completo (PC) ---
    function resetFieldsPC() {
        Object.values(inputsPC).forEach(input => input.value = '');
        Object.values(selectedIdsPC).forEach(hidden => hidden.value = '');
        Object.values(suggestionsPC).forEach(sug => sug.innerHTML = '');
        document.getElementById('detallesPC').style.display = 'none';
        console.log("Todos los campos (PC) reseteados.");
    }
</script>













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
        <div class="input-group has-validation">
        <span class="input-group-text">@</span>
        <input type="email" class="form-control" maxlength="50" id="emailRespaldo" name="emailRespaldo" placeholder="Correo electrónico">
    </div>
</DIV>

            <h4>Documentos comprobables</h4>
            <hr class="my-4">

    <div class="col-sm-6">
        <label for="curp" class="form-label">CURP</label>
        <input type="text" class="form-control" id="ine" name="curp" placeholder="">
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
    <select class="form-select" id="ocupacion" name="ocupacion" >
        <option value="">Selecciona una ocupación</option>
        <option value="Ama de casa">Ama de casa</option>
        <option value="Campesino/a">Campesino/a</option>
        <option value="Artesano/a">Artesano/a</option>
        <option value="Comerciante">Comerciante</option>
        <option value="Empleado/a">Empleado/a</option>
        <option value="Estudiante">Estudiante</option>
        <option value="Maestro/a">Maestro/a</option>
        <option value="Profesional independiente">Profesional independiente</option>
        <option value="Servidor público">Servidor público</option>
        <option value="Desempleado/a">Desempleado/a</option>
        <option value="Otro">Otro</option>
    </select>
    <div class="invalid-feedback">Se requiere una ocupación válida.</div>
</div>

    
 <div class="col-sm-6">
    <label for="fuenteIngresos" class="form-label">Fuente de ingresos</label>
    <select class="form-select" id="fuenteIngresos" name="fuenteIngresos" >
        <option value="">Selecciona una fuente de ingresos</option>
        <option value="Trabajo propio">Trabajo propio</option>
        <option value="Trabajo asalariado">Trabajo asalariado</option>
        <option value="Comercio informal">Comercio informal</option>
        <option value="Agricultura o ganadería">Agricultura o ganadería</option>
        <option value="Artesanías">Artesanías</option>
        <option value="Apoyo gubernamental">Apoyo gubernamental</option>
        <option value="Remesas">Remesas</option>
        <option value="Pensión o jubilación">Pensión o jubilación</option>
        <option value="No tiene ingresos">No tiene ingresos</option>
        <option value="Otro">Otro</option>
    </select>
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
            <option value="NUTRICIONAL">NUTRICIONAL</option>
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
    <button class="w-100 btn btn-primary btn-lg" type="submit"  onclick="openPopupp()">Registrar Usuario</button>
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
    var num = document.getElementById('numDecendencia').value || 0;
    // Abrimos el popup y enviamos el valor como parámetro
    var popup = window.open('ventana_hijos.php?numDecendencia=' + encodeURIComponent(num), '_blank', 'width=700,height=700');
}
// Esta función se llama desde la ventana emergente para cerrarla después de enviar el formulario
function closePopup() {
    window.close();
}


  // --- Popup Functions ---
  function openPopupp() {
    var popup = window.open('venta-violencia.php', '_blank', 'width=700,height=700');
  }

  function closePopupp() {
    window.close();
  }

  // --- Validación del formulario antes de abrir popup ---
  document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('miFormulario');

    form.addEventListener('submit', function (event) {
      // Evita el envío automático
      event.preventDefault();
      event.stopPropagation();

      // Valida el formulario con las reglas HTML5 (required, pattern, etc.)
      if (form.checkValidity()) {
        // Si es válido, mostrar popup
        openPopupp();

        // Opcional: enviar el formulario si lo deseas
        form.submit();
      } else {
        // Si no es válido, muestra los errores de Bootstrap
        form.classList.add('was-validated');
      }
    });
  });

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
        
        
        





