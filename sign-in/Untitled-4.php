    
    
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

    // Mensaje de éxito
    echo '<script>alert("Formulario enviado correctamente");</script>';
    // Redirigir a otra página después de mostrar el mensaje de éxito
    echo '<script>window.location.href = "../checkout/formulario.php";</script>';
} catch (PDOException $e) {
    // Registro de errores en un archivo de registro
    $error_message = "Error al ejecutar la consulta SQL: " . $e->getMessage() . "\n";
    $file_path = '/xampp/htdocs/ERP/ERP_IRP/db/error_log.txt';


    // Mostrar un mensaje genérico al usuario
    echo '<script>alert("Se produjo un error en el servidor. Por favor, inténtalo de nuevo más tarde.");</script>';
}
}
?>








<h4>Documentos comprobables</h4>
<hr class="my-4">

<!-- CURP -->
<div class="col-sm-6">
    <label for="curp" class="form-label">CURP</label>
    <input type="text" class="form-control" id="curp" name="curp" value="<?php echo $usuario['CURP']; ?>" placeholder="">
    <div class="invalid-feedback">Se requiere una CURP válida.</div>
</div>

<div class="col-sm-6">
    <label for="rutaCURP">Documento CURP:</label><br>
    <?php if (!empty($usuario['RutaCURP'])): ?>
        <a href="../uploads/documents/<?php echo $usuario['RutaCURP']; ?>" target="_blank">
            <i class="bi bi-file-earmark-pdf"></i> Ver CURP
        </a><br><br>
    <?php else: ?>
        <span class="text-muted">Sin CURP</span><br><br>
    <?php endif; ?>
    <input type="file" class="form-control" name="rutaCURP" id="rutaCURP" accept=".pdf"><br>
    <div class="invalid-feedback" id="fileSizeFeedback">El archivo seleccionado excede el tamaño máximo permitido.</div>
</div>

<!-- INE -->
<div class="col-sm-6">
    <label for="ine" class="form-label">INE</label>
    <input type="text" class="form-control" id="ine" name="ine" value="<?php echo $usuario['INE']; ?>" placeholder="">
    <div class="invalid-feedback">Se requiere una INE válida.</div>
</div>

<div class="col-sm-6">
    <label for="rutaINE">Documento INE:</label><br>
    <?php if (!empty($usuario['RutaINE'])): ?>
        <a href="../uploads/documents/<?php echo $usuario['RutaINE']; ?>" target="_blank">
            <i class="bi bi-file-earmark-pdf"></i> Ver INE
        </a><br><br>
    <?php else: ?>
        <span class="text-muted">Sin INE</span><br><br>
    <?php endif; ?>
    <input type="file" class="form-control" name="rutaINE" id="rutaINE" accept=".pdf"><br>
    <div class="invalid-feedback">Se requiere un INE.</div>
</div>

<!-- Comprobante de Domicilio -->
<div class="col-sm-6">
    <label for="rutaComDomicilio">Comprobante de Domicilio:</label><br>
    <?php if (!empty($usuario['RutaComDomicilio'])): ?>
        <a href="../uploads/documents/<?php echo $usuario['RutaComDomicilio']; ?>" target="_blank">
            <i class="bi bi-file-earmark-pdf"></i> Ver Comprobante
        </a><br><br>
    <?php else: ?>
        <span class="text-muted">Sin Comprobante</span><br><br>
    <?php endif; ?>
    <input type="file" class="form-control" name="rutaComDomicilio" id="rutaComDomicilio" accept=".pdf"><br>
    <div class="invalid-feedback">Se requiere un Comprobante de Domicilio.</div>
</div>




require_once __DIR__ . '/../db/config.php';

try {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM Usuario WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$usuario) {
        echo "Usuario no encontrado.";
        exit;
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
}



// Carpeta donde guardar los archivos
$uploadDir = __DIR__ . '/../uploads/documents/';

// Inicializar variables de rutas
$rutaCURP = $usuario['RutaCURP'] ?? "SIN DATOS";
$rutaINE = $usuario['RutaINE'] ?? "SIN DATOS";
$rutaComDomicilio = $usuario['RutaComDomicilio'] ?? "SIN DATOS";

// FUNCION PARA SUBIR ARCHIVO
function subirArchivo($inputName, $uploadDir, $rutaActual) {
    if (isset($_FILES[$inputName]) && $_FILES[$inputName]['error'] === UPLOAD_ERR_OK) {
        $nombreArchivo = time() . "_" . basename($_FILES[$inputName]['name']);
        $rutaDestino = $uploadDir . $nombreArchivo;

        if (move_uploaded_file($_FILES[$inputName]['tmp_name'], $rutaDestino)) {
            return "uploads/documents/" . $nombreArchivo; // Ruta relativa
        }
    }
    // Si no se sube archivo, retorna la ruta actual (mantiene el archivo existente)
    return $rutaActual;
}


// Subir archivos y obtener rutas
$rutaCURP = subirArchivo('rutaCURP', $uploadDir, $rutaCURP);
$rutaINE = subirArchivo('rutaINE', $uploadDir, $rutaINE);
$rutaComDomicilio = subirArchivo('rutaComDomicilio', $uploadDir, $rutaComDomicilio);