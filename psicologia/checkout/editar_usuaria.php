<?php
require_once __DIR__ . '/../pages/seccion.php';

?>
<?php
require_once __DIR__ . '/../db/config.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


try {
    $id = $_GET['id'];

     $mensaje = "";
$tipoMensaje = "";
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





ini_set('display_errors', 0); // No mostrar los errores
error_reporting(0); // No reportar los errores
require_once __DIR__ . '/../db/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se han enviado los datos del formulario y si el ID del usuario es válido
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    if ($id === null || !filter_var($id, FILTER_VALIDATE_INT)) {
        echo "Datos incorrectos, intente de nuevo.";
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
            return "" . $nombreArchivo; // Ruta relativa
        }
    }
    // Si no se sube archivo, retorna la ruta actual (mantiene el archivo existente)
    return $rutaActual;
}






/*

nombreconfianza
parentesco


comunidadLGBT
tipoLgbt


perteneceEtnico
grupoEtnico
padresLengua
lenguaPadres
aniosOaxaca




discapacidads 

observacionesAdicionales


enteroGESMUJER
descripcionSolicitud


tipoEmpleo
ingresoMensual
apoyosSociales
recibeApoyo
apoyoDetalle
totalIngresosFamiliares
gastoAlimentacion
gastoVivienda
gastoServicios
gastoTransporte
gastoEducacion
gastoSalud
gastoDeudas
gastoOtros


numCuartos
numHabitacionesDormir
numPersonasHogar
electricidad
internet
gas
television
telefono
bano


vpsConducta
vpsDetalles
vfConducta
vfDetalles
vsConducta
vsDetalles
acosoConducta
acosoDetalles
veConducta
veDetalles
vvConducta
vvDetalles
voConducta
voDetalles
vpConducta
vpDetalles
vcConducta
vcDetalles
vlConducta
vlDetalles

*/


// Subir archivos y obtener rutas
$rutaCURP = subirArchivo('rutaCURP', $uploadDir, $rutaCURP);
$rutaINE = subirArchivo('rutaINE', $uploadDir, $rutaINE);
$rutaComDomicilio = subirArchivo('rutaComDomicilio', $uploadDir, $rutaComDomicilio);

        // Recuperar los datos del formulario
        $nombreconfianza         = $_POST['nombreconfianza'];
$parentesco            =  $_POST['parentesco'];

$comunidadLGBT           = $_POST['comunidadLGBT'];
$tipoLgbt                = $_POST['tipoLgbt'];

$perteneceEtnico         = $_POST['perteneceEtnico'];
$grupoEtnico             = $_POST['grupoEtnico'];
$padresLengua            = $_POST['padresLengua'];
$lenguaPadres            = $_POST['lenguaPadres'];
$aniosOaxaca             = $_POST['aniosOaxaca'];

$discapacidads           = $_POST['discapacidads'];

$observacionesAdicionales = $_POST['observacionesAdicionales'];

$enteroGESMUJER          = $_POST['enteroGESMUJER'];
$descripcionSolicitud    = $_POST['descripcionSolicitud'];

$tipoEmpleo              = $_POST['tipoEmpleo'];
$ingresoMensual          = $_POST['ingresoMensual'];
$apoyosSociales          = $_POST['apoyosSociales'];
$recibeApoyo             = $_POST['recibeApoyo'];
$apoyoDetalle            = $_POST['apoyoDetalle'];
$totalIngresosFamiliares = $_POST['totalIngresosFamiliares'];
$gastoAlimentacion       = $_POST['gastoAlimentacion'];
$gastoVivienda           = $_POST['gastoVivienda'];
$gastoServicios          = $_POST['gastoServicios'];
$gastoTransporte         = $_POST['gastoTransporte'];
$gastoEducacion          = $_POST['gastoEducacion'];
$gastoSalud              = $_POST['gastoSalud'];
$gastoDeudas             = $_POST['gastoDeudas'];
$gastoOtros              = $_POST['gastoOtros'];

$numCuartos              = $_POST['numCuartos'];
$numHabitacionesDormir   = $_POST['numHabitacionesDormir'];
$numPersonasHogar        = $_POST['numPersonasHogar'];
$electricidad            = $_POST['electricidad'];
$internet                = $_POST['internet'];
$gas                     = $_POST['gas'];
$television              = $_POST['television'];
$telefono                = $_POST['telefono'];
$bano                    = $_POST['bano'];

$vpsConducta             = $_POST['vpsConducta'];
$vpsDetalles             = $_POST['vpsDetalles'];
$vfConducta              = $_POST['vfConducta'];
$vfDetalles              = $_POST['vfDetalles'];
$vsConducta              = $_POST['vsConducta'];
$vsDetalles              = $_POST['vsDetalles'];
$acosoConducta           = $_POST['acosoConducta'];
$acosoDetalles           = $_POST['acosoDetalles'];
$veConducta              = $_POST['veConducta'];
$veDetalles              = $_POST['veDetalles'];
$vvConducta              = $_POST['vvConducta'];
$vvDetalles              = $_POST['vvDetalles'];
$voConducta              = $_POST['voConducta'];
$voDetalles              = $_POST['voDetalles'];
$vpConducta              = $_POST['vpConducta'];
$vpDetalles              = $_POST['vpDetalles'];
$vcConducta              = $_POST['vcConducta'];
$vcDetalles              = $_POST['vcDetalles'];
$vlConducta              = $_POST['vlConducta'];
$vlDetalles              = $_POST['vlDetalles'];


        $nombre = $_POST['nombre'];
        $apellidoPaterno = $_POST['apellidoPaterno'];
        $apellidoMaterno = $_POST['apellidoMaterno'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $edad = $_POST['edad'];
        $sexo = $_POST['sexo'];
       
        $indigena= $_POST['indigena'];
        $lenguaMaterna = $_POST['lenguaMaterna'];
        $hablaLenguaIndigena = $_POST['hablaLenguaIndigena'];
        $lenguaIndigena = $_POST['lenguaIndigena'];
        $escolaridad = $_POST['escolaridad'];
        $estadocivil = $_POST['estadocivil'];
        $orientacionSexual = $_POST['orientacionSexual'];
        $discapacidad = $_POST['discapacidad'];
        
        $calle = $_POST['calle'];
        $numInterior = $_POST['numInterior'];
        $numExterior = $_POST['numExterior'];
        $cp = $_POST['cp'];
        $estado = $_POST['estado'];
        $municipio = $_POST['municipio'];
        $colonia = $_POST['colonia'];
        $region = $_POST['region'];
        $callePC = $_POST['callePC'];
        $numInteriorPC = $_POST['numInteriorPC'];
        $numExteriorPC = $_POST['numExteriorPC'];
        $cppc = $_POST['cppc'];
        $estadoPC = $_POST['estadoPC'];
        $municipioPC = $_POST['municipioPC'];
        $coloniaPC = $_POST['coloniaPC'];
        $regionPC = $_POST['regionPC'];
        $telCelular = $_POST['telCelular'];
        $telFijo = $_POST['telFijo'];
        $telConfianza = $_POST['telConfianza'];
        $email = $_POST['email'];
        $emailRespaldo = $_POST['emailRespaldo'];
        $curp = $_POST['curp'];
        $ine = $_POST['ine'];
        $ocupacion = $_POST['ocupacion'];
        $fuenteIngresos = $_POST['fuenteIngresos'];
        $sectorEconomico = $_POST['sectorEconomico'];
        $horasTrabajo = $_POST['horasTrabajo'];
        $ingresosDiarios = $_POST['ingresosDiarios'];
        $tipoEnergia = $_POST['tipoEnergia'];
        $agua = $_POST['agua'];
        $materialPiso = $_POST['materialPiso'];
        $tipoServicioAgua = $_POST['tipoServicioAgua'];
        $materialVivienda = $_POST['materialVivienda'];
       // $banioDentro = $_POST['banioDentro'];
        $personasCasa = $_POST['personasCasa'];
        $personasDormitorio = $_POST['personasDormitorio'];
        $tipoBano = $_POST['tipoBano'];
        $tipoVivienda = $_POST['tipoVivienda'];
        $comoSeEntero = $_POST['comoSeEntero'];
        $parejaTrabaja = $_POST['parejaTrabaja'];
        $nombreAgresor = $_POST['nombreAgresor'];
        $dondeTrabaja = $_POST['dondeTrabaja'];
        $situacionUsuaria = $_POST['situacionUsuaria'];
        $relacionAgresora = $_POST['relacionAgresora'];
        $tipoRelacion = $_POST['tipoRelacion'];
        $viveConPareja = $_POST['viveConPareja'];
        $tiempoViviendoPareja = $_POST['tiempoViviendoPareja'];
        $chantajeado = $_POST['chantajeado'];
        $comochantajeado = $_POST['comochantajeado'];
        $parejaCelosa = $_POST['parejaCelosa'];
        $utilizaHijos = $_POST['utilizaHijos'];
        $consumidora = $_POST['consumidora'];
        $agresion = $_POST['agresion'];
        $incrementoAgresiones = $_POST['incrementoAgresiones'];
        $atencionMedica = $_POST['atencionMedica'];
        $amenazadaConArmas = $_POST['amenazadaConArmas'];
        $intentoAhorcar = $_POST['intentoAhorcar'];
        $sienteTemorVida = $_POST['sienteTemorVida'];
        $poseeArmaFuego = $_POST['poseeArmaFuego'];
        $denuncia = $_POST['denuncia'];
        $ingresadoPrision = $_POST['ingresadoPrision'];
        $valoracionRiesgo = $_POST['valoracionRiesgo'];
        $canalizacion = $_POST['canalizacion'];
        $canalizacionExterna = $_POST['canalizacionExterna'];
        $canalizacionInterna = $_POST['canalizacionInterna'];
        $auxiliosPsicologicos = $_POST['auxiliosPsicologicos'];
        $tipoDenuncia = $_POST['tipoDenuncia'];


        $id_personal = $_POST['personal_input'];
        $lugarNacimiento = $_POST['lugarNacimiento'];
   









        
        try {
            // Obtener el ID del usuario de la URL
            $id = $_GET['id'];

            // Preparar la consulta SQL de actualización
            $query = "UPDATE Usuario SET
            id_personal = :id_personal,
            Nombre = :nombre, 
            ApellidoPaterno = :apellidoPaterno, 
            ApellidoMaterno = :apellidoMaterno, 
            FechaNacimiento = :fecha_nacimiento, 
            Edad = :edad, 
            Sexo = :sexo, 
            lugarNacimiento = :lugarNacimiento, 
            Indigena = :indigena, 
            HablaLenguaIndigena = :hablaLenguaIndigena, 
            LenguaIndigena = :lenguaIndigena, 
            LenguaMaterna = :lenguaMaterna, 
            Escolaridad = :escolaridad, 
            Estadocivil = :estadocivil,
            Discapacidad = :discapacidad,
            nombreconfianza=:nombreconfianza,
            perentesco=:parentesco,
    comunidadLGBT=:comunidadLGBT,
    tipoLgbt=:tipoLgbt,
    perteneceEtnico=:perteneceEtnico,
    grupoEtnico=:grupoEtnico,
    padresLengua=:padresLengua,
    lenguaPadres=:lenguaPadres,
    aniosOaxaca=:aniosOaxaca,
    discapacidads=:discapacidads,
    observacionesAdicionales=:observacionesAdicionales,
    enteroGESMUJER=:enteroGESMUJER,
    descripcionSolicitud=:descripcionSolicitud,
    tipoEmpleo=:tipoEmpleo,
    ingresoMensual=:ingresoMensual,
    apoyosSociales=:apoyosSociales,
    recibeApoyo=:recibeApoyo,
    apoyoDetalle=:apoyoDetalle,
    totalIngresosFamiliares=:totalIngresosFamiliares,
    gastoAlimentacion=:gastoAlimentacion,
    gastoVivienda=:gastoVivienda,
    gastoServicios=:gastoServicios,
    gastoTransporte=:gastoTransporte,
    gastoEducacion=:gastoEducacion,
    gastoSalud=:gastoSalud,
    gastoDeudas=:gastoDeudas,
    gastoOtros=:gastoOtros,
    numCuartos=:numCuartos,
    numHabitacionesDormir=:numHabitacionesDormir,
    numPersonasHogar=:numPersonasHogar,
    electricidad=:electricidad,
    internet=:internet,
    gas=:gas,
    television=:television,
    telefono=:telefono,
    bano=:bano,
    vpsConducta=:vpsConducta,
    vpsDetalles=:vpsDetalles,
    vfConducta=:vfConducta,
    vfDetalles=:vfDetalles,
    vsConducta=:vsConducta,
    vsDetalles=:vsDetalles,
    acosoConducta=:acosoConducta,
    acosoDetalles=:acosoDetalles,
    veConducta=:veConducta,
    veDetalles=:veDetalles,
    vvConducta=:vvConducta,
    vvDetalles=:vvDetalles,
    voConducta=:voConducta,
    voDetalles=:voDetalles,
    vpConducta=:vpConducta,
    vpDetalles=:vpDetalles,
    vcConducta=:vcConducta,
    vcDetalles=:vcDetalles,
    vlConducta=:vlConducta,
    vlDetalles=:vlDetalles,
            Calle = :calle, 
            NumInterior = :numInterior,
            NumExterior = :numExterior, 
            CP = :cp, 
            Estado = :estado,  
            Municipio = :municipio,  
            Colonia = :colonia, 
            Region = :region, 
            CallePC = :callePC, 
            NumInteriorPC = :numInteriorPC, 
            NumExteriorPC = :numExteriorPC, 
            CPPC = :cppc, 
            EstadoPC = :estadoPC, 
            MunicipioPC = :municipioPC, 
            ColoniaPC = :coloniaPC, 
            RegionPC = :regionPC, 
            TelCelular = :telCelular, 
            TelFijo = :telFijo, 
            TelConfianza = :telConfianza, 
            Email = :email, 
            EmailRespaldo = :emailRespaldo,
            CURP = :curp, 
            INE = :ine, 
            RutaCURP = :rutaCURP, 
            RutaINE = :rutaINE, 
            RutaComDomicilio = :rutaComDomicilio,
            Ocupacion = :ocupacion, 
            FuenteIngresos = :fuenteIngresos, 
            SectorEconomico = :sectorEconomico, 
            HorasTrabajo = :horasTrabajo, 
            IngresosDiarios = :ingresosDiarios, 
            TipoEnergia = :tipoEnergia, 
            Agua = :agua, 
            MaterialPiso = :materialPiso, 
            TipoServicioAgua = :tipoServicioAgua, 
            MaterialVivienda = :materialVivienda, 
            TipoBano = :tipoBano,
            PersonasCasa = :personasCasa, 
            PersonasDormitorio = :personasDormitorio,
            TipoVivienda = :tipoVivienda, 
            ComoSeEntero = :comoSeEntero,
            ParejaTrabaja = :parejaTrabaja,  
            NombreAgresor = :nombreAgresor, 
            DondeTrabaja = :dondeTrabaja, 
            SituacionUsuaria = :situacionUsuaria, 
            TipoRelacion = :tipoRelacion, 
            ViveConPareja = :viveConPareja, 
            TiempoViviendoPareja = :tiempoViviendoPareja, 
            RelacionAgresora = :relacionAgresora,
            Chantajeado = :chantajeado, 
            ComoChantajeado = :comochantajeado, 
            ParejaCelosa = :parejaCelosa, 
            UtilizaHijos = :utilizaHijos, 
            Consumidora = :consumidora, 
            Agresion = :agresion, 
            IncrementoAgresiones = :incrementoAgresiones, 
            AtencionMedica = :atencionMedica, 
            AmenazadaConArmas = :amenazadaConArmas, 
            IntentoAhorcar = :intentoAhorcar, 
            SienteTemorVida = :sienteTemorVida, 
            PoseeArmaFuego = :poseeArmaFuego,
            Denuncia = :denuncia, 
            IngresadoPrision = :ingresadoPrision, 
            ValoracionRiesgo = :valoracionRiesgo, 
            Canalizacion = :canalizacion, 
            CanalizacionExterna = :canalizacionExterna, 
            CanalizacionInterna = :canalizacionInterna, 
            AuxiliosPsicologicos = :auxiliosPsicologicos,
            TipoDenuncia = :tipoDenuncia
             WHERE id = :id";


        ///    preg_match_all('/:\w+/', $query, $matches);
//echo 'Placeholders encontrados: ' . count($matches[0]) . "\n\n\n\n\n";
//print_r(array_unique($matches[0]));

          $stmt = $conn->prepare($query);

$params = [
    ':id_personal' => $id_personal,
    ':nombre' => $nombre,
    ':apellidoPaterno' => $apellidoPaterno,
    ':apellidoMaterno' => $apellidoMaterno,
    ':fecha_nacimiento' => $fecha_nacimiento,
    ':edad' => $edad,
    ':sexo' => $sexo,
    ':lugarNacimiento' => $lugarNacimiento,
    ':indigena' => $indigena,
    ':lenguaMaterna' => $lenguaMaterna,
    ':hablaLenguaIndigena' => $hablaLenguaIndigena,
    ':lenguaIndigena' => $lenguaIndigena,
    ':escolaridad' => $escolaridad,
    ':estadocivil' => $estadocivil,
    
    ':discapacidad' => $discapacidad,
    ':nombreconfianza' => $nombreconfianza,
    ':parentesco' => $parentesco,
    ':comunidadLGBT' => $comunidadLGBT,
    ':tipoLgbt' => $tipoLgbt,
    ':perteneceEtnico' => $perteneceEtnico,
    ':grupoEtnico' => $grupoEtnico,
    ':padresLengua' => $padresLengua,
    ':lenguaPadres' => $lenguaPadres,
    ':aniosOaxaca' => $aniosOaxaca,
    ':discapacidads' => $discapacidads,
    ':observacionesAdicionales' => $observacionesAdicionales,
    ':enteroGESMUJER' => $enteroGESMUJER,
    ':descripcionSolicitud' => $descripcionSolicitud,
    ':tipoEmpleo' => $tipoEmpleo,
    ':ingresoMensual' => $ingresoMensual,
    ':apoyosSociales' => $apoyosSociales,
    ':recibeApoyo' => $recibeApoyo,
    ':apoyoDetalle' => $apoyoDetalle,
    ':totalIngresosFamiliares' => $totalIngresosFamiliares,
    ':gastoAlimentacion' => $gastoAlimentacion,
    ':gastoVivienda' => $gastoVivienda,
    ':gastoServicios' => $gastoServicios,
    ':gastoTransporte' => $gastoTransporte,
    ':gastoEducacion' => $gastoEducacion,
    ':gastoSalud' => $gastoSalud,
    ':gastoDeudas' => $gastoDeudas,
    ':gastoOtros' => $gastoOtros,
    ':numCuartos' => $numCuartos,
    ':numHabitacionesDormir' => $numHabitacionesDormir,
    ':numPersonasHogar' => $numPersonasHogar,
    ':electricidad' => $electricidad,
    ':internet' => $internet,
    ':gas' => $gas,
    ':television' => $television,
    ':telefono' => $telefono,
    ':bano' => $bano,
    ':vpsConducta' => $vpsConducta,
    ':vpsDetalles' => $vpsDetalles,
    ':vfConducta' => $vfConducta,
    ':vfDetalles' => $vfDetalles,
    ':vsConducta' => $vsConducta,
    ':vsDetalles' => $vsDetalles,
    ':acosoConducta' => $acosoConducta,
    ':acosoDetalles' => $acosoDetalles,
    ':veConducta' => $veConducta,
    ':veDetalles' => $veDetalles,
    ':vvConducta' => $vvConducta,
    ':vvDetalles' => $vvDetalles,
    ':voConducta' => $voConducta,
    ':voDetalles' => $voDetalles,
    ':vpConducta' => $vpConducta,
    ':vpDetalles' => $vpDetalles,
    ':vcConducta' => $vcConducta,
    ':vcDetalles' => $vcDetalles,
    ':vlConducta' => $vlConducta,
    ':vlDetalles' => $vlDetalles,
    ':calle' => $calle,
    ':numInterior' => $numInterior,
    ':numExterior' => $numExterior,
    ':cp' => $cp,
    ':estado' => $estado,
    ':municipio' => $municipio,
    ':colonia' => $colonia,
    ':region' => $region,
    ':callePC' => $callePC,
    ':numInteriorPC' => $numInteriorPC,
    ':numExteriorPC' => $numExteriorPC,
    ':cppc' => $cppc,
    ':estadoPC' => $estadoPC,
    ':municipioPC' => $municipioPC,
    ':coloniaPC' => $coloniaPC,
    ':regionPC' => $regionPC,
    ':telCelular' => $telCelular,
    ':telFijo' => $telFijo,
    ':telConfianza' => $telConfianza,
    ':email' => $email,
    ':emailRespaldo' => $emailRespaldo,
    ':curp' => $curp,
    ':ine' => $ine,
    ':rutaCURP' => $rutaCURP,
    ':rutaINE' => $rutaINE,
    ':rutaComDomicilio' => $rutaComDomicilio,
    ':ocupacion' => $ocupacion,
    ':fuenteIngresos' => $fuenteIngresos,
    ':sectorEconomico' => $sectorEconomico,
    ':horasTrabajo' => $horasTrabajo,
    ':ingresosDiarios' => $ingresosDiarios,
    ':tipoEnergia' => $tipoEnergia,
    ':agua' => $agua,
    ':materialPiso' => $materialPiso,
    ':tipoServicioAgua' => $tipoServicioAgua,
    ':materialVivienda' => $materialVivienda,
   // ':banioDentro' => $banioDentro,
    ':tipoBano' => $tipoBano,
    ':personasCasa' => $personasCasa,
    ':personasDormitorio' => $personasDormitorio,
    ':tipoVivienda' => $tipoVivienda,
    ':comoSeEntero' => $comoSeEntero,
    ':parejaTrabaja' => $parejaTrabaja,
    ':nombreAgresor' => $nombreAgresor,
    ':dondeTrabaja' => $dondeTrabaja,
    ':situacionUsuaria' => $situacionUsuaria,
    ':relacionAgresora' => $relacionAgresora,
    ':tipoRelacion' => $tipoRelacion,
    ':viveConPareja' => $viveConPareja,
    ':tiempoViviendoPareja' => $tiempoViviendoPareja,
    ':chantajeado' => $chantajeado,
    ':comochantajeado' => $comochantajeado,
    ':parejaCelosa' => $parejaCelosa,
    ':utilizaHijos' => $utilizaHijos,
    ':consumidora' => $consumidora,
    ':agresion' => $agresion,
    ':incrementoAgresiones' => $incrementoAgresiones,
    ':atencionMedica' => $atencionMedica,
    ':amenazadaConArmas' => $amenazadaConArmas,
    ':intentoAhorcar' => $intentoAhorcar,
    ':sienteTemorVida' => $sienteTemorVida,
    ':poseeArmaFuego' => $poseeArmaFuego,
    ':denuncia' => $denuncia,
    ':ingresadoPrision' => $ingresadoPrision,
    ':valoracionRiesgo' => $valoracionRiesgo,
    ':canalizacion' => $canalizacion,
    ':canalizacionExterna' => $canalizacionExterna,
    ':canalizacionInterna' => $canalizacionInterna,
    ':auxiliosPsicologicos' => $auxiliosPsicologicos,
    ':tipoDenuncia' => $tipoDenuncia,
    ':id' => $id
];

//echo 'Claves de parámetros: ' . count($params) . "\n";
//print_r(array_keys($params));


$stmt->execute($params);


      /*      $placeholders = [];
preg_match_all('/:([a-zA-Z0-9_]+)/', $query, $placeholders);
echo 'Placeholders en SQL: ' . count($placeholders[0]) . '<br>';
echo 'Variables bindParam: ' . count(get_object_vars($stmt)) . '<br>';
*/
            
if ($stmt->execute($params)) {
            $mensaje = "Usuario actualizado correctamente";
            $tipoMensaje = "success";
        } else {
            $mensaje = "Error al actualizar Usuario";
            $tipoMensaje = "error";
        }
        } catch(PDOException $e) {

             echo "Error de PDO: " . $e->getMessage();
            // En un entorno de producción, considera registrar este error en un archivo de log
            echo "Error al procesar su solicitud, por favor intente de nuevo más tarde.";
        }
   
} else {
    // Si no es una solicitud POST, mostrar el formulario con los datos del usuario
    try {
        // Obtener el ID del usuario de la URL
        $id = $_GET['id'];

        // Preparar y ejecutar la consulta SQL para obtener los datos del usuario
        $stmt = $conn->prepare("SELECT * FROM Usuario WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar si se encontró un usuario con el ID especificado
        if ($usuario) {
            // Aquí va tu código para mostrar el formulario de edición con los datos del usuario
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
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
    <title>Edicion de nueva usuaria</title>
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
        <img class="d-block mx-auto mb-4" src="../assets/img/logo 1.png" alt="" width="72" height="57">
        <h2>Editar Usuaria</h2>
       
    </div>

    <div class="row g-5">
    <div class="col-xxl-12 col-xxl-12">
        <h4 class="mb-3">Datos Generales</h4>
        <!-- <form class="needs-validation" action="register-usuario.php" method="POST" enctype="multipart/form-data"  novalidate> -->
        <form method="POST" action="" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
    <div class="row g-3">

   <div class="col-sm-12 position-relative">
    <label for="id_personal" class="form-label">Especialista</label>
    <?php 
        $valorPersonal = !empty($usuario['id_personal']) ? $usuario['id_personal'] : 'SIN DATOS';
    ?>
    <input 
        type="text" 
        id="personal_input" 
        name="personal_input" 
        class="form-control" 
        value="<?php echo htmlspecialchars($valorPersonal); ?>"
    >
    <input 
        type="hidden" 
        id="id_personal" 
        name="id_personal" 
        value="<?php echo htmlspecialchars($valorPersonal); ?>"
    >
    <div id="sugerencias_personal" class="list-group" style="position:absolute; z-index:1000; width:100%;"></div>
</div>




<script>
document.addEventListener("DOMContentLoaded", () => {
    const input = document.getElementById("personal_input");
    const sugerencias = document.getElementById("sugerencias_personal");
    const idPersonal = document.getElementById("id_personal");

    input.addEventListener("keyup", () => {
        const texto = input.value.trim();

        if (texto.length < 2) {
            sugerencias.innerHTML = "";
            return;
        }

        // 🔹 Ajusta la ruta según tu estructura de carpetas
        fetch("./ajax/buscar_personal.php?q=" + encodeURIComponent(texto))
            .then(res => res.json())
            .then(data => {
                sugerencias.innerHTML = "";
                if (data.length > 0) {
                    data.forEach(item => {
                        const div = document.createElement("div");
                        div.classList.add("list-group-item", "list-group-item-action");
                        div.textContent = item.NombreCompleto;
                        div.dataset.id = item.ID_Personal;

                        div.addEventListener("click", () => {
                            input.value = item.NombreCompleto;
                            idPersonal.value = item.ID_Personal;
                            sugerencias.innerHTML = "";
                        });

                        sugerencias.appendChild(div);
                    });
                } else {
                    sugerencias.innerHTML = "<div class='list-group-item disabled'>Sin coincidencias</div>";
                }
            })
            .catch(() => {
                sugerencias.innerHTML = "<div class='list-group-item disabled'>Error de conexión</div>";
            });
    });
});
</script>

            
    <div class="col-sm-12">
        <label for="firstName" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $usuario['Nombre']; ?>"><br>
    <div class="invalid-feedback">Se requiere un nombre válido.</div>
    <div class="valid-feedback">Looks good!</div>
    </div>

    <div class="col-sm-12">
        <label for="firstName" class="form-label">Apellido Parterno</label>
        <input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno" value="<?php echo $usuario['ApellidoPaterno']; ?>"><br>
    <div class="invalid-feedback">Se requiere un nombre válido.</div>
    <div class="valid-feedback">Looks good!</div>
    </div>

    <div class="col-sm-12">
        <label for="firstName" class="form-label">Apellido Materno</label>
        <input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno" value="<?php echo $usuario['ApellidoMaterno']; ?>"><br>
    <div class="invalid-feedback">Se requiere un nombre válido.</div>
    <div class="valid-feedback">Looks good!</div>
    </div>

    <div class="col-sm-6">
    <label for="birthdate" class="form-label">Fecha de Nacimiento:</label>
    <input type="date" class="form-control" id="birthdate" name="fecha_nacimiento" value="<?php echo $usuario['FechaNacimiento']; ?>">
    <div class="invalid-feedback">Se requiere una fecha de nacimiento válida.</div>
    </div>

    <div class="col-sm-6">
    <label for="age" class="form-label">edad:</label>
    <input type="number" class="form-control" id="age" name="edad" value="<?php echo $usuario['Edad']; ?>">
    <div class="invalid-feedback">Se requiere una edad válida.</div>
    </div>

    <div class="col-sm-12">
    <label for="discapacidad" class="form-label">Tiene alguna Discapacidad</label>
    <select class="form-select" id="discapacidad" name="discapacidad" aria-label="Selecciona una opción">
        <option <?php if ($usuario['Discapacidad'] == '') echo 'selected'; ?> disabled value="">Selecciona una opción...</option>
        <option <?php if ($usuario['Discapacidad'] == 'MUDA') echo 'selected'; ?> value="MUDA">MUDA</option>
        <option <?php if ($usuario['Discapacidad'] == 'SORDA-CIEGA') echo 'selected'; ?> value="SORDA-CIEGA">SORDA-CIEGA</option>
        <option <?php if ($usuario['Discapacidad'] == 'INTELECTUAL') echo 'selected'; ?> value="INTELECTUAL">INTELECTUAL</option>
        <option <?php if ($usuario['Discapacidad'] == 'PSICOSOCIAL') echo 'selected'; ?> value="PSICOSOCIAL">PSICOSOCIAL</option>
        <option <?php if ($usuario['Discapacidad'] == 'AUDITIVA') echo 'selected'; ?> value="AUDITIVA">AUDITIVA</option>
        <option <?php if ($usuario['Discapacidad'] == 'VISUAL') echo 'selected'; ?> value="VISUAL">VISUAL</option>
        <option <?php if ($usuario['Discapacidad'] == 'FISICA') echo 'selected'; ?> value="FISICA">FISICA</option>
        <option <?php if ($usuario['Discapacidad'] == 'NINGUNA') echo 'selected'; ?> value="NINGUNA">NINGUNA</option>
        <option <?php if ($usuario['Discapacidad'] == 'OTRA') echo 'selected'; ?> value="OTRA">OTRA</option>
        <option <?php if ($usuario['Discapacidad'] == 'SIN DATOS') echo 'selected'; ?> value="SIN DATOS">SIN DATOS</option>
    </select>
    <div class="invalid-feedback">Se requiere una selección válida.</div>
</div>



 <div class="col-sm-6">
    <label for="lugarNacimiento" class="form-label">Lugar de Nacimiento</label>
    <input type="text" class="form-control" id="lugarNacimiento" name="lugarNacimiento" 
           value="<?php echo !empty($usuario['LugarNacimiento']) ? $usuario['LugarNacimiento'] : 'SIN DATOS'; ?>"  
           autocomplete="off">
    <div class="sugerencias" id="sug_lugarNacimiento" style="border:1px solid #ccc; max-height:150px; overflow-y:auto;"></div>
    <input type="hidden" id="selected_lugar_id" name="selected_lugar_id" 
           value="<?php echo !empty($usuario['selected_lugar_id']) ? $usuario['selected_lugar_id'] : ''; ?>">
    <div class="invalid-feedback">Se requiere un Municipio Valido.</div>
</div>



<?php
require_once __DIR__ . '/../db/configoaxaca.php';// o la ruta correcta si está en otra carpeta

$stmt = $pdo->query("SELECT id_municipio_inegi, nombre FROM municipios ORDER BY nombre ASC");
$municipios = $stmt->fetchAll();

$municipios_json = json_encode($municipios);
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
    <label for="sexo" class="form-label">Sexo</label>
    <select class="form-select" id="sexo" name="sexo" aria-label="Selecciona una opción">
        <option <?php if ($usuario['Sexo'] == '') echo 'selected'; ?> disabled value="">Selecciona una opción...</option>
        <option <?php if ($usuario['Sexo'] == 'MASCULINO') echo 'selected'; ?> value="MASCULINO">MASCULINO</option>
        <option <?php if ($usuario['Sexo'] == 'FEMENINO') echo 'selected'; ?> value="FEMENINO">FEMENINO</option>
        <option <?php if ($usuario['Sexo'] == 'OTRO') echo 'selected'; ?> value="OTRO">OTRO</option>
        <option <?php if ($usuario['Sexo'] == 'SIN DATOS') echo 'selected'; ?> value="SIN DATOS">SIN DATOS</option>
    </select>
    <div class="invalid-feedback">Se requiere una selección válida.</div>
</div>

 


    <div class="col-sm-6">
    <label class="form-label">¿Se considera Indígena?</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="indigena" id="indigenaopcion1" value="SI" <?php if($usuario['Indigena'] == 'SI') echo 'checked'; ?>>
        <label class="form-check-label" for="indigenaopcion1">SI</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="indigena" id="indigenaopcion2" value="NO" <?php if($usuario['Indigena'] == 'NO') echo 'checked'; ?>>
        <label class="form-check-label" for="indigenaopcion2">NO</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="indigena" id="indigenaopcion3" value="SIN DATOS" <?php if($usuario['Indigena'] == 'SIN DATOS') echo 'checked'; ?>>
        <label class="form-check-label" for="indigenaopcion3">SIN DATOS</label>
    </div>
</div>


<div class="col-sm-6">
        <label for="lenguaMaterna" class="form-label">Lengua Materna</label>
        <input type="text" class="form-control" id="lenguaMaterna" name="lenguaMaterna" value="<?php echo $usuario['LenguaMaterna']; ?>">
        <div class="invalid-feedback">Se requiere una lengua materna válida.</div>
    </div>

 <div class="col-sm-6">
  <label class="form-label">¿Habla alguna lengua Indígena?</label>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="hablaLenguaIndigena" id="radioSi" 
      value="SI" onclick="showLanguageSelect()" 
      <?php if ($usuario['HablaLenguaIndigena'] == 'SI') echo 'checked'; ?>>
    <label class="form-check-label" for="radioSi">SI</label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="hablaLenguaIndigena" id="radioNo" 
      value="NO" onclick="hideLanguageSelect()" 
      <?php if ($usuario['HablaLenguaIndigena'] == 'NO') echo 'checked'; ?>>
    <label class="form-check-label" for="radioNo">NO</label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="hablaLenguaIndigena" id="radioSinDatos" 
      value="SIN DATOS" onclick="hideLanguageSelect()" 
      <?php if ($usuario['HablaLenguaIndigena'] == 'SIN DATOS') echo 'checked'; ?>>
    <label class="form-check-label" for="radioSinDatos">SIN DATOS</label>
  </div>
</div>

<div class="col-sm-6" id="languageSelectContainer" 
  style="display: <?php echo (isset($usuario['HablaLenguaIndigena']) && strtoupper($usuario['HablaLenguaIndigena']) == 'SI') ? 'block' : 'none'; ?>;">
  <label for="lenguaIndigena" class="form-label">¿Cuál?</label>
  <select class="form-select" id="lenguaIndigena" name="lenguaIndigena">
    <?php
    // --- Lista de lenguas ---
    $lenguas = [
      'SIN DATOS', 'Zapoteco', 'Mixteco', 'Mazateco', 'Chinanteco', 'Mixe', 'Triqui', 
      'Chatino', 'Amuzgo', 'Cuicateco', 'Trique', 'Huave', 'Chontal', 
      'Ixcateco', 'Zoque', 'Náhuatl', 'Otros'
    ];

    // --- Lengua registrada por el usuario ---
    $lenguaUsuario = isset($usuario['LenguaIndigena']) && trim($usuario['LenguaIndigena']) != '' 
      ? $usuario['LenguaIndigena']
      : 'SIN DATOS';

    // --- Mostrar opción del usuario primero (tal cual en BD) ---
    echo "<option value='{$lenguaUsuario}' selected>{$lenguaUsuario}</option>";

    // --- Mostrar todas las demás opciones ---
    foreach ($lenguas as $lengua) {
      if (strcasecmp($lenguaUsuario, $lengua) != 0) { // compara sin importar mayúsculas/minúsculas
        echo "<option value='$lengua'>$lengua</option>";
      }
    }
    ?>
  </select>
</div>

<script>
  function showLanguageSelect() {
    document.getElementById('languageSelectContainer').style.display = 'block';
  }

  function hideLanguageSelect() {
    document.getElementById('languageSelectContainer').style.display = 'none';
    document.getElementById('lenguaIndigena').value = 'SIN DATOS'; // Reinicia el valor
  }

  // Mostrar automáticamente el select si el usuario tiene "SI"
  document.addEventListener('DOMContentLoaded', function() {
    const hablaLengua = document.querySelector('input[name="hablaLenguaIndigena"]:checked');
    if (hablaLengua && hablaLengua.value.toUpperCase() === 'SI') {
      showLanguageSelect();
    }
  });
</script>



<h4>Datos de Contacto</h4>
            <hr class="my-4">


            <div class="col-sm-6">
        <label for="telCelular" class="form-label">Teléfono celular</label>
        <input type="number" class="form-control" id="telCelular" name="telCelular" value="<?php echo $usuario['TelCelular']; ?>"><br>
        <div class="invalid-feedback">Se requiere un número de teléfono celular válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="telFijo" class="form-label">Teléfono fijo</label>
        <input type="number" class="form-control" id="telFijo" name="telFijo" value="<?php echo $usuario['TelFijo']; ?>"><br>
        <div class="invalid-feedback">Se requiere un número de teléfono fijo válido.</div>
    </div>
    
    
    <div class="col-sm-6">
        <label for="email" class="form-label">Correo electrónico</label>
        <div class="input-group has-validation">
        <span class="input-group-text">@</span>
        <input type="text" class="form-control" maxlength="50" id="email" name="email" placeholder="Correo electrónico" value="<?php echo $usuario['Email']; ?>"><br>
        <div class="invalid-feedback">Se requiere una dirección de correo electrónico válida.</div>
        </div>
    </div>

    <div class="col-sm-6">
        <label for="emailRespaldo" class="form-label">Correo electrónico de respaldo<span class="text-body-secondary">(Opcional)</span></label>
         <div class="input-group has-validation">
        <span class="input-group-text">@</span>
        <input type="text" class="form-control" maxlength="50" id="emailRespaldo" name="emailRespaldo" placeholder="you@example.com" value="<?php echo $usuario['EmailRespaldo']; ?>"><br>
    </div>
</div>

<div class="col-sm-6">
        <label for="telConfianza" class="form-label">Teléfono de confianza</label>
        <input type="number" class="form-control" id="telConfianza" name="telConfianza" value="<?php echo $usuario['TelConfianza']; ?>"><br>
        <div class="invalid-feedback">Se requiere un número de teléfono de confianza válido.</div>
    </div>



<div class="col-sm-6">
        <label for="telConfianza" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="firstname" name="nombreconfianza" placeholder="" value="<?php echo !empty($usuario['nombreconfianza']) ? $usuario['nombreconfianza'] : 'SIN DATOS'; ?>">
        <div class="invalid-feedback">Se requiere un número de teléfono de confianza válido.</div>
    </div>

    
<div class="col-sm-6">
  <label for="parentesco" class="form-label">Parentesco</label>
  <select class="form-select" id="parentesco" name="parentesco">
    <?php 
      $parentesco = !empty($usuario['perentesco']) ? $usuario['perentesco'] : 'SIN DATOS';
    ?>
    <option value="<?php echo $parentesco; ?>" selected><?php echo ucfirst($parentesco); ?></option>
    <option value="Padre">Padre</option>
    <option value="Madre">Madre</option>
    <option value="Hermano">Hermano</option>
    <option value="Hermana">Hermana</option>
    <option value="Tío">Tío</option>
    <option value="Tía">Tía</option>
    <option value="Abuelo">Abuelo</option>
    <option value="Abuela">Abuela</option>
    <option value="Primo">Primo</option>
    <option value="Prima">Prima</option>
    <option value="Otro">Otro</option>
  </select>
</div>






 <h4>Datos de Orientacion Social</h4>
            <hr class="my-4">


           




<div class="col-sm-6">
  <label class="form-label">¿Pertenece a una comunidad LGBT+?</label>

  <?php 
    // Obtener los datos del usuario
    $comunidadLGBT = isset($usuario['comunidadLGBT']) ? strtoupper($usuario['comunidadLGBT']) : 'SIN DATOS';
    $tipoLgbt = isset($usuario['tipoLgbt']) ? $usuario['tipoLgbt'] : '';
  ?>

  <div class="form-check">
    <input class="form-check-input" 
           type="radio" 
           name="comunidadLGBT" 
           id="lgbtSi" 
           value="SI"
           onclick="showLgbtSelect()" 
           <?php echo ($comunidadLGBT === 'SI') ? 'checked' : ''; ?>>
    <label class="form-check-label" for="lgbtSi">Sí</label>
  </div>

  <div class="form-check">
    <input class="form-check-input" 
           type="radio" 
           name="comunidadLGBT" 
           id="lgbtNo" 
           value="NO"
           onclick="hideLgbtSelect()" 
           <?php echo ($comunidadLGBT === 'NO') ? 'checked' : ''; ?>>
    <label class="form-check-label" for="lgbtNo">No</label>
  </div>

  <?php if ($comunidadLGBT === 'SIN DATOS'): ?>
    <p class="text-muted" style="font-size: 0.9em;">Sin datos</p>
  <?php endif; ?>
</div>

<div class="col-sm-6" id="lgbtSelectContainer" style="display: <?php echo ($comunidadLGBT === 'SI') ? 'block' : 'none'; ?>;">
  <label for="tipoLgbt" class="form-label">¿A cuál?</label>
  <select class="form-select" id="tipoLgbt" name="<?php echo ($comunidadLGBT === 'SI') ? 'tipoLgbt' : ''; ?>">
    <option disabled value="">Seleccionar opción...</option>
    <option value="Lesbiana" <?php echo ($tipoLgbt == 'Lesbiana') ? 'selected' : ''; ?>>Lesbiana</option>
    <option value="Gay" <?php echo ($tipoLgbt == 'Gay') ? 'selected' : ''; ?>>Gay</option>
    <option value="Bisexual" <?php echo ($tipoLgbt == 'Bisexual') ? 'selected' : ''; ?>>Bisexual</option>
    <option value="Transgénero" <?php echo ($tipoLgbt == 'Transgénero') ? 'selected' : ''; ?>>Transgénero</option>
    <option value="Queer" <?php echo ($tipoLgbt == 'Queer') ? 'selected' : ''; ?>>Queer</option>
    <option value="Intersex" <?php echo ($tipoLgbt == 'Intersex') ? 'selected' : ''; ?>>Intersex</option>
    <option value="Asexual" <?php echo ($tipoLgbt == 'Asexual') ? 'selected' : ''; ?>>Asexual</option>
    <option value="Otro" <?php echo ($tipoLgbt == 'Otro') ? 'selected' : ''; ?>>Otro</option>
  </select>
</div>

<script>
  function showLgbtSelect() {
    const select = document.getElementById('tipoLgbt');
    document.getElementById('lgbtSelectContainer').style.display = 'block';
    select.name = 'tipoLgbt'; // Ahora se envía al servidor
  }

  function hideLgbtSelect() {
    const select = document.getElementById('tipoLgbt');
    document.getElementById('lgbtSelectContainer').style.display = 'none';
    select.name = ''; // No se envía al servidor
    select.value = ''; // Limpia la selección
  }
</script>





<h4>Estado Civil</h4>
            <hr class="my-4">

 <div class="col-sm-6">
    <label for="estadocivil" class="form-label">Estado civil</label>
    <select class="form-select" id="estadocivil" name="estadocivil" aria-label="Selecciona una opción">
        <option <?php if ($usuario['Estadocivil'] == '') echo 'selected'; ?> disabled value="">Selecciona una opción...</option>
        <option <?php if ($usuario['Estadocivil'] == 'SOLTERA') echo 'selected'; ?> value="SOLTERA">SOLTERA</option>
        <option <?php if ($usuario['Estadocivil'] == 'CASADA') echo 'selected'; ?> value="CASADA">CASADA</option>
        <option <?php if ($usuario['Estadocivil'] == 'DIVORCIADA') echo 'selected'; ?> value="DIVORCIADA">DIVORCIADA</option>
        <option <?php if ($usuario['Estadocivil'] == 'SEPARADA') echo 'selected'; ?> value="SEPARADA">SEPARADA</option>
        <option <?php if ($usuario['Estadocivil'] == 'VIUDA') echo 'selected'; ?> value="VIUDA">VIUDA</option>
        <option <?php if ($usuario['Estadocivil'] == 'CONCUBINATO') echo 'selected'; ?> value="CONCUBINATO">CONCUBINATO</option>
        <option <?php if ($usuario['Estadocivil'] == 'OTRA') echo 'selected'; ?> value="OTRA">OTRA</option>
        <option <?php if ($usuario['Estadocivil'] == 'SIN DATOS') echo 'selected'; ?> value="SIN DATOS">SIN DATOS</option>
    </select>
    <div class="invalid-feedback">Se requiere una selección válida.</div>
</div>



<h4>Datos de Domicilio</h4>
        <hr class="my-4">


        <div class="col-sm-6">
        <label for="calle" class="form-label">Calle</label>
        <input type="text" class="form-control" id="calle" name="calle" value="<?php echo $usuario['Calle']; ?>"><br>
    <div class="invalid-feedback">Se requiere una calle válida.</div>
    </div>

    <div class="col-sm-6">
        <label for="numInterior" class="form-label">Número interior</label>
        <input type="number" max="100000" min="0" class="form-control" id="numInterior" name="numInterior" value="<?php echo $usuario['NumInterior']; ?>"><br>
        <div class="invalid-feedback">Se requiere un número interior válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="numExterior" class="form-label">Número exterior</label>
        <input type="number" max="100000" min="0"  class="form-control" id="numExterior" name="numExterior" value="<?php echo $usuario['NumExterior']; ?>"><br>
    <div class="invalid-feedback">Se requiere un número exterior válido.</div>
    </div>
















    
        <input type="hidden" id="selected_region_id">
        <input type="hidden" id="selected_distrito_id">
        <input type="hidden" id="selected_municipio_id">
        <input type="hidden" id="selected_localidad_id"> 

   <div class="col-sm-6">
        <label for="estado" class="form-label">Estado</label>
        <input type="text" class="form-control" id="estado" name="estado" value="<?php echo $usuario['Estado']; ?>"><br>
        <div class="invalid-feedback">Se requiere un estado válido.</div>
    </div>

        <div class="col-sm-6">
  <label for="cp" class="form-label">Código Postal (CP)</label>
  <input type="number" max="100000" min="0" class="form-control" id="cp" name="cp" placeholder="" value="<?php echo $usuario['CP']; ?>">
  <div class="invalid-feedback">Se requiere un código postal válido.</div>
</div>

        <div class="col-sm-6">

            <label for="input_region" class="form-label">Región:</label>
            <input type="text" class="form-control" id="input_region" name="region" value="<?php echo $usuario['Region']; ?>"  autocomplete="off">
            <div class="sugerencias" id="sug_region"></div>
        </div>

        <div class="col-sm-6">
            <label for="input_distrito" class="form-label">Distrito:</label>
            <input type="text" id="input_distrito" class="form-control"  autocomplete="off">
            <div class="sugerencias" id="sug_distrito"></div>
        </div>

        <div class="col-sm-6">
            <label for="input_municipio" class="form-label">Municipio:</label>
            <input type="text" id="input_municipio" class="form-control" name="municipio" value="<?php echo $usuario['Municipio']; ?>"  autocomplete="off">
            <div class="sugerencias" id="sug_municipio"></div>
        </div>

        <div class="col-sm-6">
            <label for="input_localidad" class="form-label">Localidad:</label>
            <input type="text" id="input_localidad" class="form-control" name="colonia" value="<?php echo $usuario['Colonia']; ?>" placeholder="Escribe el nombre de la localidad..." autocomplete="off">
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
  <label class="form-label">¿PERTENECE A UN GRUPO ÉTNICO?</label>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="perteneceEtnico" id="etnicoSi" 
           value="SI" <?php echo ($usuario['perteneceEtnico'] ?? '') == 'SI' ? 'checked' : ''; ?> 
           onclick="showEtnicoSelect()">
    <label class="form-check-label" for="etnicoSi">SÍ</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="perteneceEtnico" id="etnicoNo" 
           value="NO" <?php echo ($usuario['perteneceEtnico'] ?? '') == 'NO' ? 'checked' : ''; ?> 
           onclick="hideEtnicoSelect()">
    <label class="form-check-label" for="etnicoNo">NO</label>
  </div>
</div>

<div class="col-sm-6" id="etnicoSelectContainer"
  style="display: <?php echo ($usuario['perteneceEtnico'] ?? '') == 'SI' ? 'block' : 'none'; ?>;">
  <label for="grupoEtnico" class="form-label">¿A CUÁL?</label>
  <select class="form-select" id="grupoEtnico" name="grupoEtnico">
    <?php
      // --- Lista de grupos étnicos ---
      $grupos = [
        'SIN DATOS', 'ZAPOTECO', 'MIXTECO', 'MAZATECO', 'CHINANTECO', 'MIXE',
        'TRIQUI', 'CHATINO', 'AMUZGO', 'CUICATECO', 'HUAVE', 'CHONTAL',
        'IXCATECO', 'ZOQUE', 'NÁHUATL', 'OTRO'
      ];

      // --- Grupo del usuario ---
      $grupoUsuario = isset($usuario['grupoEtnico']) && $usuario['grupoEtnico'] != '' 
        ? strtoupper($usuario['grupoEtnico']) 
        : 'SIN DATOS';

      foreach ($grupos as $grupo) {
        $selected = ($grupoUsuario == strtoupper($grupo)) ? 'selected' : '';
        echo "<option value='$grupo' $selected>$grupo</option>";
      }
    ?>
  </select>
</div>

<script>
  function showEtnicoSelect() {
    document.getElementById('etnicoSelectContainer').style.display = 'block';
  }

  function hideEtnicoSelect() {
    document.getElementById('etnicoSelectContainer').style.display = 'none';
    document.getElementById('grupoEtnico').value = 'SIN DATOS'; // Reinicia el valor
  }

  // Mostrar automáticamente si el usuario pertenece a un grupo étnico
  document.addEventListener('DOMContentLoaded', function() {
    const pertenece = document.querySelector('input[name="perteneceEtnico"]:checked');
    if (pertenece && pertenece.value === 'SI') {
      showEtnicoSelect();
    }
  });
</script>



<div class="col-sm-6">
  <label class="form-label">¿SU PADRE O MADRE HABLA ALGUNA LENGUA INDÍGENA?</label>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="padresLengua" id="padresLenguaSi" 
           value="SI" <?php echo (strtoupper($usuario['padresLengua'] ?? '') == 'SI') ? 'checked' : ''; ?> 
           onclick="showPadresLenguaSelect()">
    <label class="form-check-label" for="padresLenguaSi">SÍ</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="padresLengua" id="padresLenguaNo" 
           value="NO" <?php echo (strtoupper($usuario['padresLengua'] ?? '') == 'NO') ? 'checked' : ''; ?> 
           onclick="hidePadresLenguaSelect()">
    <label class="form-check-label" for="padresLenguaNo">NO</label>
  </div>
</div>

<div class="col-sm-6" id="padresLenguaSelectContainer"
  style="display: <?php echo (strtoupper($usuario['padresLengua'] ?? '') == 'SI') ? 'block' : 'none'; ?>;">
  <label for="lenguaPadres" class="form-label">¿Cuál?</label>
  <select class="form-select" id="lenguaPadres" name="lenguaPadres">
    <?php
      // --- Lista de lenguas en minúsculas ---
      $lenguas = [
        'SIN DATOS', 'zapoteco', 'mixteco', 'mazateco', 'chinanteco', 'mixe',
        'triqui', 'chatino', 'amuzgo', 'cuicateco', 'huave', 'chontal',
        'ixcateco', 'zoque', 'náhuatl', 'otro'
      ];

      // --- Lengua del usuario ---
      $lenguaPadresUsuario = isset($usuario['lenguaPadres']) && $usuario['lenguaPadres'] != ''
        ? strtolower($usuario['lenguaPadres'])
        : 'SIN DATOS';

      foreach ($lenguas as $lengua) {
        $selected = ($lenguaPadresUsuario == strtolower($lengua)) ? 'selected' : '';
        echo "<option value='$lengua' $selected>$lengua</option>";
      }
    ?>
  </select>
</div>

<script>
  function showPadresLenguaSelect() {
    document.getElementById('padresLenguaSelectContainer').style.display = 'block';
  }

  function hidePadresLenguaSelect() {
    document.getElementById('padresLenguaSelectContainer').style.display = 'none';
    document.getElementById('lenguaPadres').value = 'sin datos'; // Reinicia el valor
  }

  // Mostrar automáticamente si el usuario tiene "SI" seleccionado
  document.addEventListener('DOMContentLoaded', function() {
    const padresLengua = document.querySelector('input[name="padresLengua"]:checked');
    if (padresLengua && padresLengua.value === 'SI') {
      showPadresLenguaSelect();
    }
  });
</script>



<div class="col-sm-6">
  <label for="aniosOaxaca" class="form-label">AÑOS DE VIVIR EN OAXACA</label>
  <input type="number" class="form-control" id="aniosOaxaca" name="aniosOaxaca" min="0" value="<?php echo !empty($usuario['aniosOaxaca']) ? $usuario['aniosOaxaca'] : '0'; ?>" >
  <div class="invalid-feedback">Por favor, ingrese un número válido de años.</div>
</div>






 


    <div class="col-sm-6">
    <label for="escolaridad" class="form-label">Escolaridad</label>
    <select class="form-select" id="escolaridad" name="escolaridad" aria-label="Selecciona una opción">
        <option <?php if ($usuario['Escolaridad'] == '') echo 'selected'; ?> disabled value="">Selecciona una opción...</option>
        <option <?php if ($usuario['Escolaridad'] == 'NINGUNA') echo 'selected'; ?> value="NINGUNA">NINGUNA</option>
        <option <?php if ($usuario['Escolaridad'] == 'PRIMARIA TERMINADA') echo 'selected'; ?> value="PRIMARIA TERMINADA">PRIMARIA TERMINADA</option>
        <option <?php if ($usuario['Escolaridad'] == 'PRIMARIA TRUNCA') echo 'selected'; ?> value="PRIMARIA TRUNCA">PRIMARIA TRUNCA</option>
        <option <?php if ($usuario['Escolaridad'] == 'SECUNDARIA TERMINADA') echo 'selected'; ?> value="SECUNDARIA TERMINADA">SECUNDARIA TERMINADA</option>
        <option <?php if ($usuario['Escolaridad'] == 'SECUNDARIA TRUNCA') echo 'selected'; ?> value="SECUNDARIA TRUNCA">SECUNDARIA TRUNCA</option>
        <option <?php if ($usuario['Escolaridad'] == 'PREPARATORIA TERMINADA') echo 'selected'; ?> value="PREPARATORIA TERMINADA">PREPARATORIA TERMINADA</option>
        <option <?php if ($usuario['Escolaridad'] == 'PREPARATORIA TRUNCA') echo 'selected'; ?> value="PREPARATORIA TRUNCA">PREPARATORIA TRUNCA</option>
        <option <?php if ($usuario['Escolaridad'] == 'UNIVERSIDAD TERMINADA') echo 'selected'; ?> value="UNIVERSIDAD TERMINADA">UNIVERSIDAD TERMINADA</option>
        <option <?php if ($usuario['Escolaridad'] == 'UNIVERSIDAD TRUNCA') echo 'selected'; ?> value="UNIVERSIDAD TRUNCA">UNIVERSIDAD TRUNCA</option>
        <option <?php if ($usuario['Escolaridad'] == 'POSTGRADO') echo 'selected'; ?> value="POSTGRADO">POSTGRADO</option>
        <option <?php if ($usuario['Escolaridad'] == 'SIN DATOS') echo 'selected'; ?> value="SIN DATOS">SIN DATOS</option>
    </select>
    <div class="invalid-feedback">Se requiere una selección válida.</div>
</div>



 <div class="col-sm-6">
  <label class="form-label">¿Presenta alguna discapacidad?</label>
  
  <div class="form-check">
    <input class="form-check-input" 
           type="radio" 
           name="discapacidads" 
           id="discapacidadSi" 
           value="SI" 
           onclick="showDiscapacidadSelect()"
           <?php echo (isset($usuario['discapacidads']) && strtoupper($usuario['discapacidads']) == 'SI') ? 'checked' : ''; ?>>
    <label class="form-check-label" for="discapacidadSi">Sí</label>
  </div>

  <div class="form-check">
    <input class="form-check-input" 
           type="radio" 
           name="discapacidads" 
           id="discapacidadNo" 
           value="NO" 
           onclick="hideDiscapacidadSelect()"
           <?php echo (isset($usuario['discapacidads']) && strtoupper($usuario['discapacidads']) == 'NO') ? 'checked' : ''; ?>>
    <label class="form-check-label" for="discapacidadNo">No</label>
  </div>

  <?php if (!isset($usuario['discapacidad'])): ?>
    <p class="text-muted mt-1">Sin datos</p>
  <?php endif; ?>
</div>

<div class="col-sm-6" id="discapacidadSelectContainer" style="display: none;">
  <label for="discapacidad" class="form-label">¿Cuál?</label>
  <select class="form-select" id="discapacidad" name="discapacidad">
    <option disabled value="">Seleccionar tipo...</option>
    <option value="MOTRIZ"      <?php echo (isset($usuario['discapacidad']) && strtoupper($usuario['discapacidad']) == 'MOTRIZ') ? 'selected' : ''; ?>>Motriz</option>
    <option value="VISUAL"      <?php echo (isset($usuario['discapacidad']) && strtoupper($usuario['discapacidad']) == 'VISUAL') ? 'selected' : ''; ?>>Visual</option>
    <option value="AUDITIVA"    <?php echo (isset($usuario['discapacidad']) && strtoupper($usuario['discapacidad']) == 'AUDITIVA') ? 'selected' : ''; ?>>Auditiva</option>
    <option value="INTELECTUAL" <?php echo (isset($usuario['discapacidad']) && strtoupper($usuario['discapacidad']) == 'INTELECTUAL') ? 'selected' : ''; ?>>Intelectual</option>
    <option value="DEL LENGUAJE" <?php echo (isset($usuario['discapacidad']) && strtoupper($usuario['discapacidad']) == 'DEL LENGUAJE') ? 'selected' : ''; ?>>Del lenguaje</option>
    <option value="PSICOSOCIAL" <?php echo (isset($usuario['discapacidad']) && strtoupper($usuario['discapacidad']) == 'PSICOSOCIAL') ? 'selected' : ''; ?>>Psicosocial</option>
    <option value="MULTIPLE"    <?php echo (isset($usuario['discapacidad']) && strtoupper($usuario['discapacidad']) == 'MULTIPLE') ? 'selected' : ''; ?>>Múltiple</option>
    <option value="OTRA"        <?php echo (isset($usuario['discapacidad']) && strtoupper($usuario['discapacidad']) == 'OTRA') ? 'selected' : ''; ?>>Otra</option>
  </select>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const tieneDiscapacidad = "<?php echo isset($usuario['discapacidads']) ? strtoupper($usuario['discapacidads']) : ''; ?>";
    if (tieneDiscapacidad === 'SI') {
      showDiscapacidadSelect();
    } else {
      hideDiscapacidadSelect();
    }
  });

  function showDiscapacidadSelect() {
    document.getElementById('discapacidadSelectContainer').style.display = 'block';
  }

  function hideDiscapacidadSelect() {
    document.getElementById('discapacidadSelectContainer').style.display = 'none';
    document.getElementById('discapacidad').value = '';
  }
</script>



    
<div class="col-sm-12 mt-3">
  <label for="observacionesAdicionales" class="form-label">OBSERVACIONES ADICIONALES</label>
  <textarea class="form-control" 
            id="observacionesAdicionales" 
            name="observacionesAdicionales" 
            rows="3"><?php echo !empty($usuario['observacionesAdicionales']) ? htmlspecialchars($usuario['observacionesAdicionales']) : 'SIN DATOS'; ?></textarea>
</div>







<h4>Domicilio Persona de Confianza</h4>
        <hr class="my-4">

    <div class="col-sm-6">
        <label for="callePC" class="form-label">Calle</label>
        <input type="text" class="form-control" id="callePC" name="callePC" value="<?php echo $usuario['CallePC']; ?>"><br>
        <div class="invalid-feedback">Se requiere una calle válida.</div>
    </div>

    <div class="col-sm-6">
        <label for="numInteriorPC" class="form-label">Número interior</label>
        <input type="number" max="100000" min="0" class="form-control" id="numInteriorPC" name="numInteriorPC" value="<?php echo $usuario['NumInteriorPC']; ?>"><br>
        <div class="invalid-feedback">Se requiere un número interior válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="numExteriorPC" class="form-label">Número exterior</label>
        <input type="number" max="100000" min="0" class="form-control" id="numExteriorPC" name="numExteriorPC" value="<?php echo $usuario['NumExteriorPC']; ?>"><br>
        <div class="invalid-feedback">Se requiere un número exterior válido.</div>
    </div>












     <!-- Campos ocultos con IDs -->
<input type="hidden" id="selected_region_idPC" name="selected_region_idPC">
<input type="hidden" id="selected_distrito_idPC" name="selected_distrito_idPC">
<input type="hidden" id="selected_municipio_idPC" name="selected_municipio_idPC">
<input type="hidden" id="selected_localidad_idPC" name="selected_localidad_idPC">

<div class="col-sm-6">
  <label for="cpPC" class="form-label">Código Postal (CP)</label>
  <input type="number" max="100000" min="1" class="form-control" id="cpPC" name="cppc" placeholder="" value="<?php echo $usuario['CPPC']; ?>">
  <div class="invalid-feedback">Se requiere un código postal válido.</div>
</div>

<div class="col-sm-6">
  <label for="input_regionPC" class="form-label">Región:</label>
  <input type="text" class="form-control" name="regionPC" id="input_regionPC" " autocomplete="off" value="<?php echo $usuario['RegionPC']; ?>">
  <div class="sugerencias" id="sug_regionPC"></div>
</div>

<div class="col-sm-6">
  <label for="input_distritoPC" class="form-label">Distrito:</label>
  <input type="text" id="input_distritoPC" class="form-control"  autocomplete="off">
  <div class="sugerencias" id="sug_distritoPC"></div>
</div>

<div class="col-sm-6">
  <label for="input_municipioPC" class="form-label">Municipio:</label>
  <input type="text" id="input_municipioPC" class="form-control" name="municipioPC"  autocomplete="off" value="<?php echo $usuario['Municipio']; ?>">
  <div class="sugerencias" id="sug_municipioPC"></div>
</div>

<div class="col-sm-6">
  <label for="input_localidadPC" class="form-label">Localidad:</label>
  <input type="text" id="input_localidadPC" class="form-control" name="coloniaPC"  autocomplete="off" value="<?php echo $usuario['ColoniaPC']; ?>">
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
    <?php if (!empty($usuario['RutaCURP']) && strtoupper($usuario['RutaCURP']) !== "SIN DATOS"): ?>
        <a href="../uploads/documents/<?php echo $usuario['RutaCURP']; ?>" target="_blank">
            <i class="bi bi-file-earmark-pdf"></i> Ver CURP
        </a><br><br>
    <?php else: ?>
        <span class="text-muted">SIN CURP</span><br><br>
    <?php endif; ?>
    <input type="file" class="form-control" name="rutaCURP" id="rutaCURP" accept=".pdf"><br>
</div>

<!-- INE -->
<div class="col-sm-6">
    <label for="ine" class="form-label">INE</label>
    <input type="text" class="form-control" id="ine" name="ine" value="<?php echo $usuario['INE']; ?>" placeholder="">
    <div class="invalid-feedback">Se requiere una INE válida.</div>
</div>

<div class="col-sm-6">
    <label for="rutaINE">Documento INE:</label><br>
    <?php if (!empty($usuario['RutaINE']) && strtoupper($usuario['RutaINE']) !== "SIN DATOS"): ?>
        <a href="../uploads/documents/<?php echo $usuario['RutaINE']; ?>" target="_blank">
            <i class="bi bi-file-earmark-pdf"></i> Ver INE
        </a><br><br>
    <?php else: ?>
        <span class="text-muted">SIN INE</span><br><br>
    <?php endif; ?>
    <input type="file" class="form-control" name="rutaINE" id="rutaINE" accept=".pdf"><br>
</div>

<!-- Comprobante de Domicilio -->
<div class="col-sm-6">
    <label for="rutaComDomicilio">Comprobante de Domicilio:</label><br>
    <?php if (!empty($usuario['RutaComDomicilio']) && strtoupper($usuario['RutaComDomicilio']) !== "SIN DATOS"): ?>
        <a href="../uploads/documents/<?php echo $usuario['RutaComDomicilio']; ?>" target="_blank">
            <i class="bi bi-file-earmark-pdf"></i> Ver Comprobante
        </a><br><br>
    <?php else: ?>
        <span class="text-muted">SIN COMPROBANTE</span><br><br>
    <?php endif; ?>
    <input type="file" class="form-control" name="rutaComDomicilio" id="rutaComDomicilio" accept=".pdf"><br>
</div>








 <h3>Estudio socioeconómico</h3>
            <hr class="my-4">

<div class="col-sm-6">
  <label for="ocupacion" class="form-label">Ocupación</label>
  <select class="form-select" id="ocupacion" name="ocupacion">
      <?php 
          $ocupacion = !empty($usuario['Ocupacion']) ? $usuario['Ocupacion'] : 'SIN DATOS';
      ?>
      <option value="<?php echo $ocupacion; ?>" selected><?php echo $ocupacion; ?></option>
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



<div class="col-sm-6 mt-3">
  <label for="tipoEmpleo" class="form-label">Tipo de Empleo</label>
  <select class="form-select" id="tipoEmpleo" name="tipoEmpleo">
    <?php 
        $tipoEmpleo = !empty($usuario['tipoEmpleo']) ? $usuario['tipoEmpleo'] : 'SIN DATOS';
    ?>
    <option value="<?php echo $tipoEmpleo; ?>" selected><?php echo $tipoEmpleo; ?></option>
    <option value="FORMAL">FORMAL</option>
    <option value="INFORMAL">INFORMAL</option>
    <option value="DESEMPLEADA">DESEMPLEADA</option>
  </select>
  <div class="invalid-feedback">Por favor, selecciona el tipo de empleo.</div>
</div>






<div class="col-sm-6" id="DondeTrabaja">
  <label for="DondeTrabaja" class="form-label">¿Dónde trabaja?</label>
  <input 
    type="text" 
    class="form-control" 
    id="Trabaja" 
    name="dondeTrabaja" 
    value="<?php echo !empty($usuario['DondeTrabaja']) ? htmlspecialchars($usuario['DondeTrabaja']) : 'SIN DATOS'; ?>">
  <div class="invalid-feedback">Se requiere un lugar de trabajo válido.</div>
</div>


<div class="col-sm-6">
  <label for="fuenteIngresos" class="form-label">Fuente de ingresos</label>
  <select class="form-select" id="fuenteIngresos" name="fuenteIngresos">
    <?php
      $fuente = !empty($usuario['fuenteIngresos']) ? $usuario['fuenteIngresos'] : 'SIN DATOS';
    ?>
    <option value="" disabled <?php echo ($fuente == 'SIN DATOS') ? 'selected' : ''; ?>>SIN DATOS</option>
    <option value="Trabajo propio" <?php echo ($fuente == 'Trabajo propio') ? 'selected' : ''; ?>>Trabajo propio</option>
    <option value="Trabajo asalariado" <?php echo ($fuente == 'Trabajo asalariado') ? 'selected' : ''; ?>>Trabajo asalariado</option>
    <option value="Comercio informal" <?php echo ($fuente == 'Comercio informal') ? 'selected' : ''; ?>>Comercio informal</option>
    <option value="Agricultura o ganadería" <?php echo ($fuente == 'Agricultura o ganadería') ? 'selected' : ''; ?>>Agricultura o ganadería</option>
    <option value="Artesanías" <?php echo ($fuente == 'Artesanías') ? 'selected' : ''; ?>>Artesanías</option>
    <option value="Apoyo gubernamental" <?php echo ($fuente == 'Apoyo gubernamental') ? 'selected' : ''; ?>>Apoyo gubernamental</option>
    <option value="Remesas" <?php echo ($fuente == 'Remesas') ? 'selected' : ''; ?>>Remesas</option>
    <option value="Pensión o jubilación" <?php echo ($fuente == 'Pensión o jubilación') ? 'selected' : ''; ?>>Pensión o jubilación</option>
    <option value="No tiene ingresos" <?php echo ($fuente == 'No tiene ingresos') ? 'selected' : ''; ?>>No tiene ingresos</option>
    <option value="Otro" <?php echo ($fuente == 'Otro') ? 'selected' : ''; ?>>Otro</option>
  </select>
  <div class="invalid-feedback">Se requiere una fuente de ingresos válida.</div>
</div>



<div class="col-sm-6">
  <label for="sectorEconomico" class="form-label">Sector económico</label>
  <select class="form-select" id="sectorEconomico" name="sectorEconomico" aria-label="Default select example">
    <?php
      $sector = !empty($usuario['sectorEconomico']) ? $usuario['sectorEconomico'] : 'SIN DATOS';
    ?>
    <option value="" disabled <?php echo ($sector == 'SIN DATOS') ? 'selected' : ''; ?>>SIN DATOS</option>
    <option value="SERVICIOS SOCIALES" <?php echo ($sector == 'SERVICIOS SOCIALES') ? 'selected' : ''; ?>>SERVICIOS SOCIALES</option>
    <option value="INDUSTRIA MANUFACTURERA" <?php echo ($sector == 'INDUSTRIA MANUFACTURERA') ? 'selected' : ''; ?>>INDUSTRIA MANUFACTURERA</option>
    <option value="COMERCIO" <?php echo ($sector == 'COMERCIO') ? 'selected' : ''; ?>>COMERCIO</option>
    <option value="SERVICIOS DIVERSOS" <?php echo ($sector == 'SERVICIOS DIVERSOS') ? 'selected' : ''; ?>>SERVICIOS DIVERSOS</option>
    <option value="SERVICIOS PROFESIONALES, FINANCIEROS Y CORPORATIVOS" <?php echo ($sector == 'SERVICIOS PROFESIONALES, FINANCIEROS Y CORPORATIVOS') ? 'selected' : ''; ?>>SERVICIOS PROFESIONALES, FINANCIEROS Y CORPORATIVOS</option>
    <option value="RESTAURANTES Y SERVICIOS DE ALOJAMIENTO" <?php echo ($sector == 'RESTAURANTES Y SERVICIOS DE ALOJAMIENTO') ? 'selected' : ''; ?>>RESTAURANTES Y SERVICIOS DE ALOJAMIENTO</option>
    <option value="GOBIERNO Y ORGANISMOS INTERNACIONALES" <?php echo ($sector == 'GOBIERNO Y ORGANISMOS INTERNACIONALES') ? 'selected' : ''; ?>>GOBIERNO Y ORGANISMOS INTERNACIONALES</option>
    <option value="AGRICULTURA, GANADERÍA, SILVICULTURA Y PESCA" <?php echo ($sector == 'AGRICULTURA, GANADERÍA, SILVICULTURA Y PESCA') ? 'selected' : ''; ?>>AGRICULTURA, GANADERÍA, SILVICULTURA Y PESCA</option>
    <option value="TRANSPORTES Y ALMACENAMIENTO" <?php echo ($sector == 'TRANSPORTES Y ALMACENAMIENTO') ? 'selected' : ''; ?>>TRANSPORTES Y ALMACENAMIENTO</option>
    <option value="CONSTRUCCIÓN" <?php echo ($sector == 'CONSTRUCCIÓN') ? 'selected' : ''; ?>>CONSTRUCCIÓN</option>
    <option value="INDUSTRIA EXTRACTIVA Y ELECTRICIDAD" <?php echo ($sector == 'INDUSTRIA EXTRACTIVA Y ELECTRICIDAD') ? 'selected' : ''; ?>>INDUSTRIA EXTRACTIVA Y ELECTRICIDAD</option>
    <option value="OTRO" <?php echo ($sector == 'OTRO') ? 'selected' : ''; ?>>OTRO</option>
  </select>
  <div class="invalid-feedback">Se requiere seleccionar un sector económico.</div>
</div>


    <div class="col-sm-6">
  <label for="horasTrabajo" class="form-label">Horas de trabajo al Día</label>
  <input 
    type="number" 
    min="0" 
    max="24" 
    class="form-control" 
    id="horasTrabajo" 
    name="horasTrabajo" 
    
    value="<?php echo !empty($usuario['horasTrabajo']) ? $usuario['horasTrabajo'] : '0'; ?>">
     <?php if (empty($usuario['horasTrabajo'])): ?>
    <small class="text-muted">SIN DATOS</small>
  <?php endif; ?>
  <div class="invalid-feedback">Se requiere un número válido de horas de trabajo.</div>
</div>

   <div class="col-sm-6">
  <label for="ingresosDiarios" class="form-label">Ingresos Diarios</label>
  <input 
    type="number" 
    min="0" 
    max="1000000" 
    class="form-control" 
    id="ingresosDiarios" 
    name="ingresosDiarios" 
    placeholder="Ingrese el monto"
    value="<?php echo !empty($usuario['ingresosDiarios']) ? $usuario['ingresosDiarios'] : '0'; ?>">
  
  <?php if (empty($usuario['ingresosDiarios'])): ?>
    <small class="text-muted">SIN DATOS</small>
  <?php endif; ?>

  <div class="invalid-feedback">Se requiere un número válido de ingresos diarios.</div>
</div>


<div class="col-sm-6 mt-3">
  <label for="ingresoMensual" class="form-label">Ingreso Mensual Aproximado</label>
  <input 
    type="number" 
    class="form-control" 
    id="ingresoMensual" 
    name="ingresoMensual" 
    placeholder="Ejemplo: 5000" 
    min="0" 
    step="100"
    value="<?php echo !empty($usuario['ingresoMensual']) ? $usuario['ingresoMensual'] : '0'; ?>">
  
  <?php if (empty($usuario['ingresoMensual'])): ?>
    <small class="text-muted">SIN DATOS</small>
  <?php endif; ?>

  <div class="invalid-feedback">Por favor, ingresa un monto válido.</div>
</div>




<div class="col-sm-6 mt-3">
  <label for="apoyosSociales" class="form-label">Otros Ingresos</label>
  <select class="form-select" id="apoyosSociales" name="apoyosSociales">
    <option value="" disabled <?php echo empty($usuario['apoyosSociales']) ? 'selected' : 'SIN DATOS'; ?>>Selecciona una opción</option>
    <option value="PROSPERA" <?php echo (isset($usuario['apoyosSociales']) && strtoupper($usuario['apoyosSociales']) == 'PROSPERA') ? 'selected' : ''; ?>>PROSPERA</option>
    <option value="PENSION_ADULTO_MAYOR" <?php echo (isset($usuario['apoyosSociales']) && strtoupper($usuario['apoyosSociales']) == 'PENSION_ADULTO_MAYOR') ? 'selected' : ''; ?>>PENSIÓN ADULTO MAYOR</option>
    <option value="PENSION_DISCAPACIDAD" <?php echo (isset($usuario['apoyosSociales']) && strtoupper($usuario['apoyosSociales']) == 'PENSION_DISCAPACIDAD') ? 'selected' : ''; ?>>PENSIÓN DISCAPACIDAD</option>
    <option value="SUBSIDIO" <?php echo (isset($usuario['apoyosSociales']) && strtoupper($usuario['apoyosSociales']) == 'SUBSIDIO') ? 'selected' : ''; ?>>SUBSIDIO</option>
    <option value="REMESAS" <?php echo (isset($usuario['apoyosSociales']) && strtoupper($usuario['apoyosSociales']) == 'REMESAS') ? 'selected' : ''; ?>>REMESAS</option>
    <option value="NEGOCIO_PROPIO" <?php echo (isset($usuario['apoyosSociales']) && strtoupper($usuario['apoyosSociales']) == 'NEGOCIO_PROPIO') ? 'selected' : ''; ?>>NEGOCIO PROPIO</option>
    <option value="OTRO" <?php echo (isset($usuario['apoyosSociales']) && strtoupper($usuario['apoyosSociales']) == 'OTRO') ? 'selected' : ''; ?>>OTRO</option>
  </select>

  <?php if (empty($usuario['apoyosSociales'])): ?>
    <small class="text-muted">SIN DATOS</small>
  <?php endif; ?>
</div>





<div class="col-sm-6 mt-3">
  <label class="form-label">¿Recibe apoyo económico de otras personas?</label>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="recibeApoyo" id="recibeApoyoSi" value="SI" onclick="showApoyoDetalle()">
    <label class="form-check-label" for="recibeApoyoSi">Sí</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="recibeApoyo" id="recibeApoyoNo" value="NO" onclick="hideApoyoDetalle()">
    <label class="form-check-label" for="recibeApoyoNo">No</label>
  </div>
</div>

<div class="col-sm-6 mt-2" id="apoyoDetalleContainer" style="display: none;">
  <label for="apoyoDetalle" class="form-label">¿De quién?</label>
  <select class="form-select" id="apoyoDetalle" name="apoyoDetalle">
    <option value="">Selecciona una opción</option>
    <option value="PADRE">PADRE</option>
    <option value="MADRE">MADRE</option>
    <option value="HERMANO_HERMANA">HERMANO / HERMANA</option>
    <option value="ABUELO_ABUELA">ABUELO / ABUELA</option>
    <option value="TIO_TIA">TÍO / TÍA</option>
    <option value="PRIMO_PRIMA">PRIMO / PRIMA</option>
    <option value="OTRO">OTRO</option>
  </select>
</div>

<script>
  function showApoyoDetalle() {
    document.getElementById('apoyoDetalleContainer').style.display = 'block';
  }

  function hideApoyoDetalle() {
    document.getElementById('apoyoDetalleContainer').style.display = 'none';
    document.getElementById('apoyoDetalle').value = '';
  }

  // --- Antes de enviar el formulario ---
  document.querySelector('form').addEventListener('submit', function (event) {
    const recibeApoyo = document.querySelector('input[name="recibeApoyo"]:checked');
    const apoyoDetalle = document.getElementById('apoyoDetalle');

    // Si no se seleccionó SI/NO → poner “Sin datos”
    if (!recibeApoyo) {
      const hiddenInput = document.createElement('input');
      hiddenInput.type = 'hidden';
      hiddenInput.name = 'recibeApoyo';
      hiddenInput.value = 'Sin datos';
      this.appendChild(hiddenInput);
    }

    // Si no se eligió detalle del apoyo → poner “Sin datos”
    if (apoyoDetalle.value === '') {
      const hiddenInput2 = document.createElement('input');
      hiddenInput2.type = 'hidden';
      hiddenInput2.name = 'apoyoDetalle';
      hiddenInput2.value = 'Sin datos';
      this.appendChild(hiddenInput2);
    }
  });
</script>

<div class="col-sm-6 mt-3"> 
  <label for="totalIngresosFamiliares" class="form-label">
    Total de ingresos familiares mensuales (MXN)
  </label>

  <input 
    type="number" 
    class="form-control" 
    id="totalIngresosFamiliares" 
    name="totalIngresosFamiliares" 
    placeholder="0" 
    min="0" 
    step="100"
    value="<?php echo !empty($usuario['totalIngresosFamiliares']) ? $usuario['totalIngresosFamiliares'] : ''; ?>">
  
  <?php if (empty($usuario['totalIngresosFamiliares'])): ?>
    <small class="text-muted">SIN DATOS</small>
  <?php endif; ?>

  <div class="invalid-feedback">Por favor ingresa un monto válido.</div>
</div>







<div class="col-6 mt-3">
  <label class="form-label">Gastos fijos mensuales aproximados (MXN)</label>
</div>

<div class="col-sm-6 mt-2">
  <label for="gastoAlimentacion" class="form-label">Alimentación</label>
  <input 
    type="number" 
    class="form-control" 
    id="gastoAlimentacion" 
    name="gastoAlimentacion" 
    placeholder="0" 
    min="0" 
    step="50"
    value="<?php echo !empty($usuario['gastoAlimentacion']) ? $usuario['gastoAlimentacion'] : ''; ?>">
  <?php if (empty($usuario['gastoAlimentacion'])): ?>
    <small class="text-muted">SIN DATOS</small>
  <?php endif; ?>
</div>

<div class="col-sm-6 mt-2">
  <label for="gastoVivienda" class="form-label">Vivienda</label>
  <input 
    type="number" 
    class="form-control" 
    id="gastoVivienda" 
    name="gastoVivienda" 
    placeholder="0" 
    min="0" 
    step="50"
    value="<?php echo !empty($usuario['gastoVivienda']) ? $usuario['gastoVivienda'] : ''; ?>">
  <?php if (empty($usuario['gastoVivienda'])): ?>
    <small class="text-muted">SIN DATOS</small>
  <?php endif; ?>
</div>

<div class="col-sm-6 mt-2">
  <label for="gastoServicios" class="form-label">Servicios (agua, luz, internet, etc.)</label>
  <input 
    type="number" 
    class="form-control" 
    id="gastoServicios" 
    name="gastoServicios" 
    placeholder="0" 
    min="0" 
    step="50"
    value="<?php echo !empty($usuario['gastoServicios']) ? $usuario['gastoServicios'] : ''; ?>">
  <?php if (empty($usuario['gastoServicios'])): ?>
    <small class="text-muted">SIN DATOS</small>
  <?php endif; ?>
</div>

<div class="col-sm-6 mt-2">
  <label for="gastoTransporte" class="form-label">Transporte</label>
  <input 
    type="number" 
    class="form-control" 
    id="gastoTransporte" 
    name="gastoTransporte" 
    placeholder="0" 
    min="0" 
    step="50"
    value="<?php echo !empty($usuario['gastoTransporte']) ? $usuario['gastoTransporte'] : ''; ?>">
  <?php if (empty($usuario['gastoTransporte'])): ?>
    <small class="text-muted">SIN DATOS</small>
  <?php endif; ?>
</div>

<div class="col-sm-6 mt-2">
  <label for="gastoEducacion" class="form-label">Educación</label>
  <input 
    type="number" 
    class="form-control" 
    id="gastoEducacion" 
    name="gastoEducacion" 
    placeholder="0" 
    min="0" 
    step="50"
    value="<?php echo !empty($usuario['gastoEducacion']) ? $usuario['gastoEducacion'] : ''; ?>">
  <?php if (empty($usuario['gastoEducacion'])): ?>
    <small class="text-muted">SIN DATOS</small>
  <?php endif; ?>
</div>

<div class="col-sm-6 mt-2">
  <label for="gastoSalud" class="form-label">Salud</label>
  <input 
    type="number" 
    class="form-control" 
    id="gastoSalud" 
    name="gastoSalud" 
    placeholder="0" 
    min="0" 
    step="50"
    value="<?php echo !empty($usuario['gastoSalud']) ? $usuario['gastoSalud'] : ''; ?>">
  <?php if (empty($usuario['gastoSalud'])): ?>
    <small class="text-muted">SIN DATOS</small>
  <?php endif; ?>
</div>

<div class="col-sm-6 mt-2">
  <label for="gastoDeudas" class="form-label">Deudas</label>
  <input 
    type="number" 
    class="form-control" 
    id="gastoDeudas" 
    name="gastoDeudas" 
    placeholder="0" 
    min="0" 
    step="50"
    value="<?php echo !empty($usuario['gastoDeudas']) ? $usuario['gastoDeudas'] : ''; ?>">
  <?php if (empty($usuario['gastoDeudas'])): ?>
    <small class="text-muted">SIN DATOS</small>
  <?php endif; ?>
</div>

<div class="col-sm-6 mt-2">
  <label for="gastoOtros" class="form-label">Otros</label>
  <input 
    type="number" 
    class="form-control" 
    id="gastoOtros" 
    name="gastoOtros" 
    placeholder="0" 
    min="0" 
    step="50"
    value="<?php echo !empty($usuario['gastoOtros']) ? $usuario['gastoOtros'] : ''; ?>">
  <?php if (empty($usuario['gastoOtros'])): ?>
    <small class="text-muted">SIN DATOS</small>
  <?php endif; ?>
</div>




            <h4>Datos de vivienda </h4>
            <hr class="my-4">


             <div class="col-sm-6">
    <label for="tipoVivienda" class="form-label">Tipo de vivienda</label>
    <select class="form-select" id="tipoVivienda" name="tipoVivienda" aria-label="Default select example">
        <option selected disabled value="">Selecciona una opción...</option>
        <option <?php if ($usuario['TipoVivienda'] == 'PRESTADA') echo 'selected'; ?> value="PRESTADA">Prestada</option>
        <option <?php if ($usuario['TipoVivienda'] == 'RENTADA') echo 'selected'; ?> value="RENTADA">Rentada</option>
        <option <?php if ($usuario['TipoVivienda'] == 'PROPIA') echo 'selected'; ?> value="PROPIA">Propia</option>
        <option <?php if ($usuario['TipoVivienda'] == 'FINANCIADA') echo 'selected'; ?> value="FINANCIADA">Financiada</option>
        <option <?php if ($usuario['TipoVivienda'] == 'DE FAMILIARES') echo 'selected'; ?> value="DE FAMILIARES">De familiares</option>
        <option <?php if ($usuario['TipoVivienda'] == 'OTRO') echo 'selected'; ?> value="OTRO">Otro</option>
        <option <?php if ($usuario['TipoVivienda'] == 'SIN DATOS') echo 'selected'; ?> value="SIN DATOS">SIN DATOS</option>
    </select>
    <div class="invalid-feedback">Se requiere seleccionar el tipo de vivienda.</div>
</div>

<div class="col-sm-6">
    <label for="materialVivienda" class="form-label">Material de la vivienda</label>
    <select class="form-select" id="materialVivienda" name="materialVivienda" aria-label="Default select example">
        <option selected disabled value="">Selecciona una opción...</option>
        <option <?php if ($usuario['MaterialVivienda'] == 'LÁMINA') echo 'selected'; ?> value="LÁMINA">Lámina</option>
        <option <?php if ($usuario['MaterialVivienda'] == 'MATERIAL') echo 'selected'; ?> value="MATERIAL">Material</option>
        <option <?php if ($usuario['MaterialVivienda'] == 'MADERA') echo 'selected'; ?> value="MADERA">Madera</option>
        <option <?php if ($usuario['MaterialVivienda'] == 'OTRO') echo 'selected'; ?> value="OTRO">Otro</option>
        <option <?php if ($usuario['MaterialVivienda'] == 'SIN DATOS') echo 'selected'; ?> value="SIN DATOS">SIN DATOS</option>
    </select>
    <div class="invalid-feedback">Se requiere seleccionar el material de la vivienda.</div>
</div>


<div class="col-sm-6">
    <label class="form-label">¿De qué material es la mayor parte del piso de la vivienda?</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="materialPiso" id="pisoCemento" value="CEMENTO O FIRME" <?php if($usuario['MaterialPiso'] == "CEMENTO O FIRME") echo 'checked="checked"'; ?> >
        <label class="form-check-label" for="pisoCemento">Cemento o firme</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="materialPiso" id="pisoTierra" value="TIERRA" <?php if($usuario['MaterialPiso'] == "TIERRA") echo 'checked="checked"'; ?> >
        <label class="form-check-label" for="pisoTierra">Tierra</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="materialPiso" id="pisoSinDatos" value="SIN DATOS" <?php if($usuario['MaterialPiso'] == "SIN DATOS") echo 'checked="checked"'; ?> >
        <label class="form-check-label" for="pisoSinDatos">SIN DATOS</label>
    </div>
    <div class="invalid-feedback">Se requiere seleccionar el material del piso.</div>
</div>



<div class="col-sm-6 mt-2">
  <label for="numCuartos" class="form-label">Número total de cuartos</label>
  <input 
    type="number" 
    class="form-control" 
    id="numCuartos" 
    name="numCuartos" 
    placeholder="0" 
    min="0" 
    step="1"
    value="<?php echo !empty($usuario['numCuartos']) ? $usuario['numCuartos'] : ''; ?>">
  <?php if (empty($usuario['numCuartos'])): ?>
    <small class="text-muted">SIN DATOS</small>
  <?php endif; ?>
</div>

<div class="col-sm-6 mt-2">
  <label for="numHabitacionesDormir" class="form-label">Número de habitaciones para dormir</label>
  <input 
    type="number" 
    class="form-control" 
    id="numHabitacionesDormir" 
    name="numHabitacionesDormir" 
    placeholder="0" 
    min="0" 
    step="1"
    value="<?php echo !empty($usuario['numHabitacionesDormir']) ? $usuario['numHabitacionesDormir'] : ''; ?>">
  <?php if (empty($usuario['numHabitacionesDormir'])): ?>
    <small class="text-muted">SIN DATOS</small>
  <?php endif; ?>
</div>

<div class="col-sm-6 mt-2">
  <label for="numPersonasHogar" class="form-label">Número de personas que viven en el hogar</label>
  <input 
    type="number" 
    class="form-control" 
    id="numPersonasHogar" 
    name="numPersonasHogar" 
    placeholder="0" 
    min="0" 
    step="1"
    value="<?php echo !empty($usuario['numPersonasHogar']) ? $usuario['numPersonasHogar'] : ''; ?>">
  <?php if (empty($usuario['numPersonasHogar'])): ?>
    <small class="text-muted">SIN DATOS</small>
  <?php endif; ?>
</div>

<div class="col-sm-6 mt-2">
  <label for="personasCasa" class="form-label">¿Cuántas personas viven en la misma casa, incluyendo a niñas y niños?</label>
  <input 
    type="number" 
    max="20" 
    class="form-control" 
    id="personasCasa" 
    name="personasCasa" 
     placeholder="0" 
    placeholder=""
    value="<?php echo !empty($usuario['personasCasa']) ? $usuario['personasCasa'] : ''; ?>">
  <?php if (empty($usuario['personasCasa'])): ?>
    <small class="text-muted">SIN DATOS</small>
  <?php endif; ?>
  <div class="invalid-feedback">Se requiere ingresar el número de personas que viven en la misma casa.</div>
</div>

<div class="col-sm-6 mt-2">
  <label for="personasDormitorio" class="form-label">¿Cuántas personas duermen en un mismo cuarto, incluyendo a niñas y niños?</label>
  <input 
    type="number" 
    max="20" 
    class="form-control" 
    id="personasDormitorio" 
     placeholder="0" 
    name="personasDormitorio" 
    placeholder=""
    value="<?php echo !empty($usuario['personasDormitorio']) ? $usuario['personasDormitorio'] : ''; ?>">
  <?php if (empty($usuario['personasDormitorio'])): ?>
    <small class="text-muted">SIN DATOS</small>
  <?php endif; ?>
  <div class="invalid-feedback">Se requiere ingresar el número de personas que duermen en un mismo cuarto.</div>
</div>



<div class="row mt-3">
  <label class="form-label">Servicios con los que cuenta la vivienda:</label>

  <!-- AGUA -->
  <div class="col-sm-6 mt-2">
    <label class="form-label">Agua:</label>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="agua" id="aguaSi" value="SI" 
        <?php echo isset($usuario['agua']) && $usuario['agua'] === 'SI' ? 'checked' : ''; ?>>
      <label class="form-check-label" for="aguaSi">Sí</label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="agua" id="aguaNo" value="NO" 
        <?php echo isset($usuario['agua']) && $usuario['agua'] === 'NO' ? 'checked' : ''; ?>>
      <label class="form-check-label" for="aguaNo">No</label>
    </div>
    <?php if (empty($usuario['agua'])): ?>
      <small class="text-muted">SIN DATOS</small>
    <?php endif; ?>
  </div>

  <!-- ELECTRICIDAD -->
  <div class="col-sm-6 mt-2">
    <label class="form-label">Electricidad:</label>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="electricidad" id="electricidadSi" value="SI"
        <?php echo isset($usuario['electricidad']) && $usuario['electricidad'] === 'SI' ? 'checked' : ''; ?>>
      <label class="form-check-label" for="electricidadSi">Sí</label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="electricidad" id="electricidadNo" value="NO"
        <?php echo isset($usuario['electricidad']) && $usuario['electricidad'] === 'NO' ? 'checked' : ''; ?>>
      <label class="form-check-label" for="electricidadNo">No</label>
    </div>
    <?php if (empty($usuario['electricidad'])): ?>
      <small class="text-muted">SIN DATOS</small>
    <?php endif; ?>
  </div>

  <!-- INTERNET -->
  <div class="col-sm-6 mt-2">
    <label class="form-label">Internet:</label>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="internet" id="internetSi" value="SI"
        <?php echo isset($usuario['internet']) && $usuario['internet'] === 'SI' ? 'checked' : ''; ?>>
      <label class="form-check-label" for="internetSi">Sí</label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="internet" id="internetNo" value="NO"
        <?php echo isset($usuario['internet']) && $usuario['internet'] === 'NO' ? 'checked' : ''; ?>>
      <label class="form-check-label" for="internetNo">No</label>
    </div>
    <?php if (empty($usuario['internet'])): ?>
      <small class="text-muted">SIN DATOS</small>
    <?php endif; ?>
  </div>

  <!-- GAS -->
  <div class="col-sm-6 mt-2">
    <label class="form-label">Gas:</label>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="gas" id="gasSi" value="SI"
        <?php echo isset($usuario['gas']) && $usuario['gas'] === 'SI' ? 'checked' : ''; ?>>
      <label class="form-check-label" for="gasSi">Sí</label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="gas" id="gasNo" value="NO"
        <?php echo isset($usuario['gas']) && $usuario['gas'] === 'NO' ? 'checked' : ''; ?>>
      <label class="form-check-label" for="gasNo">No</label>
    </div>
    <?php if (empty($usuario['gas'])): ?>
      <small class="text-muted">SIN DATOS</small>
    <?php endif; ?>
  </div>

  <!-- TELEVISIÓN -->
  <div class="col-sm-6 mt-2">
    <label class="form-label">Televisión por cable o satélite:</label>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="television" id="televisionSi" value="SI"
        <?php echo isset($usuario['television']) && $usuario['television'] === 'SI' ? 'checked' : ''; ?>>
      <label class="form-check-label" for="televisionSi">Sí</label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="television" id="televisionNo" value="NO"
        <?php echo isset($usuario['television']) && $usuario['television'] === 'NO' ? 'checked' : ''; ?>>
      <label class="form-check-label" for="televisionNo">No</label>
    </div>
    <?php if (empty($usuario['television'])): ?>
      <small class="text-muted">SIN DATOS</small>
    <?php endif; ?>
  </div>

  <!-- TELÉFONO -->
  <div class="col-sm-6 mt-2">
    <label class="form-label">Teléfono fijo:</label>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="telefono" id="telefonoSi" value="SI"
        <?php echo isset($usuario['telefono']) && $usuario['telefono'] === 'SI' ? 'checked' : ''; ?>>
      <label class="form-check-label" for="telefonoSi">Sí</label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="telefono" id="telefonoNo" value="NO"
        <?php echo isset($usuario['telefono']) && $usuario['telefono'] === 'NO' ? 'checked' : ''; ?>>
      <label class="form-check-label" for="telefonoNo">No</label>
    </div>
    <?php if (empty($usuario['telefono'])): ?>
      <small class="text-muted">SIN DATOS</small>
    <?php endif; ?>
  </div>

  <!-- BAÑO -->
  <div class="col-sm-6 mt-2">
    <label class="form-label">Baño:</label>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="bano" id="banoSi" value="SI"
        <?php echo isset($usuario['bano']) && $usuario['bano'] === 'SI' ? 'checked' : ''; ?>>
      <label class="form-check-label" for="banoSi">Sí</label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="bano" id="banoNo" value="NO"
        <?php echo isset($usuario['bano']) && $usuario['bano'] === 'NO' ? 'checked' : ''; ?>>
      <label class="form-check-label" for="banoNo">No</label>
    </div>
    <?php if (empty($usuario['bano'])): ?>
      <small class="text-muted">SIN DATOS</small>
    <?php endif; ?>
  </div>
</div>


<div class="col-sm-6">
  <label for="tipoEnergia" class="form-label">Tipo de energía</label>
  <select class="form-select" id="tipoEnergia" name="tipoEnergia" aria-label="Default select example">
    <option disabled value="">Selecciona una opción...</option>

    <?php 
      // Si no tiene valor guardado, mostrar SIN DATOS
      $tipoEnergia = !empty($usuario['tipoEnergia']) ? $usuario['tipoEnergia'] : 'SIN_DATOS';
    ?>

    <option value="SIN_DATOS" <?php echo ($tipoEnergia === 'SIN_DATOS') ? 'selected' : ''; ?>>SIN DATOS</option>
    <option value="ELECTRICA" <?php echo ($tipoEnergia === 'ELECTRICA') ? 'selected' : ''; ?>>Eléctrica</option>
    <option value="SOLAR" <?php echo ($tipoEnergia === 'SOLAR') ? 'selected' : ''; ?>>Solar</option>
    <option value="NINGUNA" <?php echo ($tipoEnergia === 'NINGUNA') ? 'selected' : ''; ?>>Ninguna</option>
  </select>

  <div class="invalid-feedback">Se requiere seleccionar el tipo de energía.</div>
</div>


<div class="col-sm-6">
  <label for="tipoServicioAgua" class="form-label">Tipo de servicio de agua</label>
  <select class="form-select" id="tipoServicioAgua" name="tipoServicioAgua" aria-label="Default select example">
    <option disabled value="">Selecciona una opción...</option>

    <?php 
      // Si no tiene valor guardado, se muestra SIN DATOS
      $tipoServicioAgua = !empty($usuario['tipoServicioAgua']) ? $usuario['tipoServicioAgua'] : 'SIN_DATOS';
    ?>

    <option value="SIN_DATOS" <?php echo ($tipoServicioAgua === 'SIN_DATOS') ? 'selected' : ''; ?>>SIN DATOS</option>
    <option value="AGUA POTABLE" <?php echo ($tipoServicioAgua === 'AGUA POTABLE') ? 'selected' : ''; ?>>Agua potable</option>
    <option value="RECOLECCIÓN DE LLUVIA" <?php echo ($tipoServicioAgua === 'RECOLECCIÓN DE LLUVIA') ? 'selected' : ''; ?>>Recolección de lluvia</option>
    <option value="POZO" <?php echo ($tipoServicioAgua === 'POZO') ? 'selected' : ''; ?>>Pozo</option>
    <option value="AGUA POR PIPA" <?php echo ($tipoServicioAgua === 'AGUA POR PIPA') ? 'selected' : ''; ?>>Agua por pipa</option>
    <option value="AGUA POR ACARREO" <?php echo ($tipoServicioAgua === 'AGUA POR ACARREO') ? 'selected' : ''; ?>>Agua por acarreo</option>
    <option value="OTRO" <?php echo ($tipoServicioAgua === 'OTRO') ? 'selected' : ''; ?>>Otro</option>
  </select>

  <div class="invalid-feedback">Se requiere seleccionar el tipo de servicio de agua.</div>
</div>


<div class="col-sm-6">
  <label for="TipoBano" class="form-label">Tipo de instalación sanitaria</label>
  <select class="form-select" id="TipoBano" name="TipoBano" aria-label="Default select example">
    <option disabled value="">Selecciona una opción...</option>

    <?php 
      // Si no hay valor registrado, se muestra SIN DATOS
      $TipoBano = !empty($usuario['TipoBano']) ? $usuario['TipoBano'] : 'SIN_DATOS';
    ?>

    <option value="SIN_DATOS" <?php echo ($TipoBano === 'SIN_DATOS') ? 'selected' : ''; ?>>SIN DATOS</option>
    <option value="DRENAJE" <?php echo ($TipoBano === 'DRENAJE') ? 'selected' : ''; ?>>Drenaje</option>
    <option value="BAÑO SECO" <?php echo ($TipoBano === 'BAÑO SECO') ? 'selected' : ''; ?>>Baño seco</option>
    <option value="LETRINA" <?php echo ($TipoBano === 'LETRINA') ? 'selected' : ''; ?>>Letrina</option>
    <option value="AL AIRE LIBRE" <?php echo ($TipoBano === 'AL AIRE LIBRE') ? 'selected' : ''; ?>>Al aire libre</option>
    <option value="OTRO" <?php echo ($TipoBano === 'OTRO') ? 'selected' : ''; ?>>Otro</option>
  </select>

  <div class="invalid-feedback">Se requiere seleccionar el tipo de instalación sanitaria.</div>
</div>





 <h4>Informacion de Referencia</h4>
        <hr class="my-4">




<div class="col-sm-6">
  <label class="form-label">¿Cómo se enteró de GESMUJER?</label>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="enteroGESMUJER" id="iniciativa" value="Acudió por iniciativa propia">
    <label class="form-check-label" for="iniciativa">Acudió por iniciativa propia</label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="enteroGESMUJER" id="recomendacion" value="Recomendación de familiar o amistad">
    <label class="form-check-label" for="recomendacion">Recomendación de familiar o amistad</label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="enteroGESMUJER" id="canalizada" value="Canalizada por institución">
    <label class="form-check-label" for="canalizada">Canalizada por institución</label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="enteroGESMUJER" id="redes" value="Redes sociales">
    <label class="form-check-label" for="redes">Redes sociales</label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="enteroGESMUJER" id="otro" value="Otro">
    <label class="form-check-label" for="otro">Otro</label>
  </div>

  <!-- Etiqueta "SIN DATOS" -->
  <div id="sinDatosLabelEntero" class="text-muted " style="display: none;">
    SIN DATOS
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const radios = document.querySelectorAll('input[name="enteroGESMUJER"]');
    const sinDatosLabel = document.getElementById("sinDatosLabelEntero");

    // Función para mostrar u ocultar el texto "SIN DATOS"
    function actualizarSinDatos() {
      const algunoSeleccionado = Array.from(radios).some(r => r.checked);
      sinDatosLabel.style.display = algunoSeleccionado ? "none" : "block";
    }

    // Actualizar al cargar la página
    actualizarSinDatos();

    // Detectar cambios en los radios
    radios.forEach(radio => {
      radio.addEventListener("change", actualizarSinDatos);
    });
  });
</script>



   <!-- <div class="col-sm-6">
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

-->

<div class="col-sm-12">
  <label for="descripcionSolicitud" class="form-label">Descripción y motivo de la solicitud</label>
  <textarea 
    class="form-control" 
    id="descripcionSolicitud" 
    name="descripcionSolicitud" 
    rows="4" 
    placeholder="Describa brevemente el motivo de su solicitud..."
    onfocus="if(this.value === 'SIN DATOS') this.value='';"
    onblur="if(this.value.trim() === '') this.value='SIN DATOS';"
  ></textarea>
</div>

<script>
  // Al cargar la página, si está vacío, se coloca "SIN DATOS"
  window.addEventListener('DOMContentLoaded', () => {
    const textarea = document.getElementById('descripcionSolicitud');
    if (textarea.value.trim() === '') {
      textarea.value = 'SIN DATOS';
    }
  });
</script>





<h4>Formulario Integral de Identificacion de Nivel de Riesgo</h4>
        <hr class="my-4">



<!-- Violencia psicológica -->
<div class="col-12 mt-3">
 

  
 <div class="col-sm-12 mt-3">
  <h5>Violencia Psicológica</h5>

  <!-- Opciones de conducta -->
  <div class="form-check">
    <input class="form-check-input" type="radio" name="vpsConducta" id="vpsControla" value="La controla">
    <label class="form-check-label" for="vpsControla">
      La controla (control económico, de movimientos, amistades)
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="vpsConducta" id="vpsHumilla" value="La humilla, ridiculiza o insulta constantemente">
    <label class="form-check-label" for="vpsHumilla">
      La humilla, ridiculiza o insulta constantemente
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="vpsConducta" id="vpsAmenaza" value="La amenaza con hacerle daño a usted, sus hijas o familiares">
    <label class="form-check-label" for="vpsAmenaza">
      La amenaza con hacerle daño a usted, sus hijas o familiares
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="vpsConducta" id="vpsAisla" value="La aísla de su familia o amistades">
    <label class="form-check-label" for="vpsAisla">
      La aísla de su familia o amistades
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="vpsConducta" id="vpsControlaTelefonos" value="Revisa o controla sus mensajes y llamadas">
    <label class="form-check-label" for="vpsControlaTelefonos">
      Revisa o controla sus mensajes y llamadas
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="vpsConducta" id="vpsMinimiza" value="Minimiza o niega sus sentimientos">
    <label class="form-check-label" for="vpsMinimiza">
      Minimiza o niega sus sentimientos
    </label>
  </div>

  <!-- Etiqueta "SIN DATOS" -->
  <div id="sinDatosLabelVps" class="text-muted fst-italic mt-2" style="display: none;">
    SIN DATOS
  </div>

  <!-- Detalles adicionales -->
  <div class="mt-3">
    <label for="vpsDetalles" class="form-label">Detalles adicionales</label>
    <textarea class="form-control" id="vpsDetalles" name="vpsDetalles" rows="3"
      placeholder="Describa más (fechas, frecuencia, contexto...)"></textarea>
  </div>

  <!-- Nota de seguridad -->
  <div class="mt-2 text-muted small">
    Si la persona está en peligro inmediato, contactar a las autoridades locales o servicios de emergencia.
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    // Valores cargados del backend (puedes reemplazarlos por variables PHP)
    const valorConducta = "<?php echo isset($fila['vpsConducta']) ? $fila['vpsConducta'] : ''; ?>";
    const valorDetalles = "<?php echo isset($fila['vpsDetalles']) ? $fila['vpsDetalles'] : ''; ?>";

    const radios = document.querySelectorAll('input[name="vpsConducta"]');
    const sinDatosLabel = document.getElementById("sinDatosLabelVps");
    const detalles = document.getElementById("vpsDetalles");

    // --- Selección del radio correspondiente o mostrar SIN DATOS ---
    let seleccionEncontrada = false;
    radios.forEach(radio => {
      if (radio.value === valorConducta) {
        radio.checked = true;
        seleccionEncontrada = true;
      }
    });
    sinDatosLabel.style.display = seleccionEncontrada ? "none" : "block";

    // --- Escucha de cambios ---
    radios.forEach(radio => {
      radio.addEventListener("change", function () {
        sinDatosLabel.style.display = "none";
      });
    });

    // --- Textarea (mostrar SIN DATOS dentro si está vacío) ---
    if (valorDetalles.trim() === "" || valorDetalles === "SIN_DATOS") {
      detalles.value = "SIN DATOS";
    } else {
      detalles.value = valorDetalles;
    }

    // Si el usuario borra el texto completamente, vuelve a poner "SIN DATOS"
    detalles.addEventListener("blur", function () {
      if (this.value.trim() === "") {
        this.value = "SIN DATOS";
      }
    });
  });
</script>





<div class="col-sm-12 mt-3">
  <h5>Violencia Física</h5>

  <!-- Opciones de conducta -->
  <div class="form-check">
    <input class="form-check-input" type="radio" name="vfConducta" id="vfGolpes" value="La ha golpeado">
    <label class="form-check-label" for="vfGolpes">
      La ha golpeado (puñetazos, patadas, empujones)
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="vfConducta" id="vfObjetos" value="Le ha aventado objetos o utilizado armas">
    <label class="form-check-label" for="vfObjetos">
      Le ha aventado objetos o utilizado armas
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="vfConducta" id="vfEstrangula" value="La ha intentado ahorcar o estrangular">
    <label class="form-check-label" for="vfEstrangula">
      La ha intentado ahorcar o estrangular
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="vfConducta" id="vfQuema" value="Le ha causado quemaduras o lesiones visibles">
    <label class="form-check-label" for="vfQuema">
      Le ha causado quemaduras o lesiones visibles
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="vfConducta" id="vfEmpuja" value="La empuja, jala o inmoviliza con fuerza">
    <label class="form-check-label" for="vfEmpuja">
      La empuja, jala o inmoviliza con fuerza
    </label>
  </div>

  <!-- Etiqueta SIN DATOS -->
  <div id="sinDatosLabelVf" class="text-muted fst-italic mt-2" style="display: none;">
    SIN DATOS
  </div>

  <!-- Detalles adicionales -->
  <div class="mt-3">
    <label for="vfDetalles" class="form-label">Detalles adicionales</label>
    <textarea class="form-control" id="vfDetalles" name="vfDetalles" rows="3"
      placeholder="Describa más (frecuencia, tipo de lesiones, fechas...)"></textarea>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    // Valores cargados desde PHP
    const valorConducta = "<?php echo isset($fila['vfConducta']) ? $fila['vfConducta'] : ''; ?>";
    const valorDetalles = "<?php echo isset($fila['vfDetalles']) ? $fila['vfDetalles'] : ''; ?>";

    const radios = document.querySelectorAll('input[name="vfConducta"]');
    const sinDatosLabel = document.getElementById("sinDatosLabelVf");
    const detalles = document.getElementById("vfDetalles");

    // --- Seleccionar radio o mostrar SIN DATOS ---
    let seleccionEncontrada = false;
    radios.forEach(radio => {
      if (radio.value === valorConducta) {
        radio.checked = true;
        seleccionEncontrada = true;
      }
    });
    sinDatosLabel.style.display = seleccionEncontrada ? "none" : "block";

    // --- Ocultar "SIN DATOS" al seleccionar una opción ---
    radios.forEach(radio => {
      radio.addEventListener("change", function () {
        sinDatosLabel.style.display = "none";
      });
    });

    // --- Textarea: mostrar "SIN DATOS" si está vacío ---
    if (valorDetalles.trim() === "" || valorDetalles === "SIN_DATOS") {
      detalles.value = "SIN DATOS";
    } else {
      detalles.value = valorDetalles;
    }

    // Si se borra el texto, volver a mostrar "SIN DATOS"
    detalles.addEventListener("blur", function () {
      if (this.value.trim() === "") {
        this.value = "SIN DATOS";
      }
    });
  });
</script>





<div class="col-sm-12 mt-3">
  <h5>Violencia Sexual</h5>

  <!-- Opciones de conducta -->
  <div class="form-check">
    <input class="form-check-input" type="radio" name="vsConducta" id="vsObliga" value="La ha obligado a tener relaciones sexuales sin su consentimiento">
    <label class="form-check-label" for="vsObliga">
      La ha obligado a tener relaciones sexuales sin su consentimiento
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="vsConducta" id="vsToca" value="La ha tocado sin su consentimiento">
    <label class="form-check-label" for="vsToca">
      La ha tocado sin su consentimiento
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="vsConducta" id="vsAmenaza" value="La ha amenazado para tener actos sexuales">
    <label class="form-check-label" for="vsAmenaza">
      La ha amenazado para tener actos sexuales
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="vsConducta" id="vsControla" value="Le impide usar métodos anticonceptivos">
    <label class="form-check-label" for="vsControla">
      Le impide usar métodos anticonceptivos
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="vsConducta" id="vsHumilla" value="La humilla o la fuerza a realizar actos sexuales degradantes">
    <label class="form-check-label" for="vsHumilla">
      La humilla o la fuerza a realizar actos sexuales degradantes
    </label>
  </div>

  <!-- Etiqueta SIN DATOS -->
  <div id="sinDatosLabelVs" class="text-muted fst-italic mt-2" style="display: none;">
    SIN DATOS
  </div>

  <!-- Detalles adicionales -->
  <div class="mt-3">
    <label for="vsDetalles" class="form-label">Detalles adicionales</label>
    <textarea class="form-control" id="vsDetalles" name="vsDetalles" rows="3" placeholder="Describa más (frecuencia, contexto, amenazas, etc.)"></textarea>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const valorConducta = "<?php echo isset($fila['vsConducta']) ? $fila['vsConducta'] : ''; ?>";
    const valorDetalles = "<?php echo isset($fila['vsDetalles']) ? $fila['vsDetalles'] : ''; ?>";

    const radios = document.querySelectorAll('input[name="vsConducta"]');
    const sinDatosLabel = document.getElementById("sinDatosLabelVs");
    const detalles = document.getElementById("vsDetalles");

    // --- Seleccionar radio o mostrar SIN DATOS ---
    let seleccionEncontrada = false;
    radios.forEach(radio => {
      if (radio.value === valorConducta) {
        radio.checked = true;
        seleccionEncontrada = true;
      }
    });
    sinDatosLabel.style.display = seleccionEncontrada ? "none" : "block";

    // --- Ocultar "SIN DATOS" al seleccionar una opción ---
    radios.forEach(radio => {
      radio.addEventListener("change", function () {
        sinDatosLabel.style.display = "none";
      });
    });

    // --- Textarea: mostrar "SIN DATOS" si está vacío ---
    if (valorDetalles.trim() === "" || valorDetalles === "SIN_DATOS") {
      detalles.value = "SIN DATOS";
    } else {
      detalles.value = valorDetalles;
    }

    // Si se borra el texto, volver a mostrar "SIN DATOS"
    detalles.addEventListener("blur", function () {
      if (this.value.trim() === "") {
        this.value = "SIN DATOS";
      }
    });
  });
</script>

 


<div class="col-sm-12 mt-3">
  <h5>Acoso y/o Hostigamiento Sexual</h5>

  <!-- Opciones de conducta -->
  <div class="form-check">
    <input class="form-check-input" type="radio" name="acosoConducta" id="acosoComentarios" value="Le hace comentarios sexuales no deseados">
    <label class="form-check-label" for="acosoComentarios">
      Le hace comentarios sexuales no deseados
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="acosoConducta" id="acosoContacto" value="La toca sin su consentimiento en espacios públicos o laborales">
    <label class="form-check-label" for="acosoContacto">
      La toca sin su consentimiento en espacios públicos o laborales
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="acosoConducta" id="acosoMensajes" value="Le envía mensajes, fotos o insinuaciones sexuales sin su consentimiento">
    <label class="form-check-label" for="acosoMensajes">
      Le envía mensajes, fotos o insinuaciones sexuales sin su consentimiento
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="acosoConducta" id="acosoPresion" value="La presiona o condiciona favores sexuales a cambio de beneficios">
    <label class="form-check-label" for="acosoPresion">
      La presiona o condiciona favores sexuales a cambio de beneficios
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="acosoConducta" id="acosoPersecucion" value="La sigue o vigila con intenciones sexuales">
    <label class="form-check-label" for="acosoPersecucion">
      La sigue o vigila con intenciones sexuales
    </label>
  </div>

  <!-- Etiqueta SIN DATOS -->
  <div id="sinDatosLabelAcoso" class="text-muted fst-italic mt-2" style="display: none;">
    SIN DATOS
  </div>

  <!-- Detalles adicionales -->
  <div class="mt-3">
    <label for="acosoDetalles" class="form-label">Detalles adicionales</label>
    <textarea class="form-control" id="acosoDetalles" name="acosoDetalles" rows="3"
      placeholder="Describa más (frecuencia, lugares, personas involucradas, etc.)"></textarea>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const valorConducta = "<?php echo isset($fila['acosoConducta']) ? $fila['acosoConducta'] : ''; ?>";
    const valorDetalles = "<?php echo isset($fila['acosoDetalles']) ? $fila['acosoDetalles'] : ''; ?>";

    const radios = document.querySelectorAll('input[name="acosoConducta"]');
    const sinDatosLabel = document.getElementById("sinDatosLabelAcoso");
    const detalles = document.getElementById("acosoDetalles");

    // --- Seleccionar radio o mostrar SIN DATOS ---
    let seleccionEncontrada = false;
    radios.forEach(radio => {
      if (radio.value === valorConducta) {
        radio.checked = true;
        seleccionEncontrada = true;
      }
    });
    sinDatosLabel.style.display = seleccionEncontrada ? "none" : "block";

    // --- Ocultar "SIN DATOS" al seleccionar una opción ---
    radios.forEach(radio => {
      radio.addEventListener("change", function () {
        sinDatosLabel.style.display = "none";
      });
    });

    // --- Textarea: mostrar "SIN DATOS" si está vacío ---
    if (valorDetalles.trim() === "" || valorDetalles === "SIN_DATOS") {
      detalles.value = "SIN DATOS";
    } else {
      detalles.value = valorDetalles;
    }

    // Si se borra el texto, volver a mostrar "SIN DATOS"
    detalles.addEventListener("blur", function () {
      if (this.value.trim() === "") {
        this.value = "SIN_DATOS";
      }
    });
  });
</script>


            
 <div class="col-sm-12 mt-3">
  <h5>Violencia Económica y Patrimonial</h5>

  <!-- Opciones de conducta -->
  <div class="form-check">
    <input class="form-check-input" type="radio" name="veConducta" id="veControlaDinero" value="Le controla o quita su dinero o bienes">
    <label class="form-check-label" for="veControlaDinero">
      Le controla o quita su dinero o bienes
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="veConducta" id="veImpideTrabajar" value="Le impide trabajar o estudiar">
    <label class="form-check-label" for="veImpideTrabajar">
      Le impide trabajar o estudiar
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="veConducta" id="veNoAporta" value="No aporta recursos para el hogar o hijas/os">
    <label class="form-check-label" for="veNoAporta">
      No aporta recursos para el hogar o hijas/os
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="veConducta" id="veDestruye" value="Destruye o retiene documentos personales o bienes">
    <label class="form-check-label" for="veDestruye">
      Destruye o retiene documentos personales o bienes
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="veConducta" id="veControlaGastos" value="Le obliga a justificar o pedir permiso para gastar dinero">
    <label class="form-check-label" for="veControlaGastos">
      Le obliga a justificar o pedir permiso para gastar dinero
    </label>
  </div>

  <!-- Etiqueta SIN DATOS -->
  <div id="sinDatosLabelVe" class="text-muted fst-italic mt-2" style="display: none;">
    SIN DATOS
  </div>

  <!-- Detalles adicionales -->
  <div class="mt-3">
    <label for="veDetalles" class="form-label">Detalles adicionales</label>
    <textarea class="form-control" id="veDetalles" name="veDetalles" rows="3"
      placeholder="Describa más (frecuencia, consecuencias, bienes afectados, etc.)"></textarea>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const valorConducta = "<?php echo isset($fila['veConducta']) ? $fila['veConducta'] : ''; ?>";
    const valorDetalles = "<?php echo isset($fila['veDetalles']) ? $fila['veDetalles'] : ''; ?>";

    const radios = document.querySelectorAll('input[name="veConducta"]');
    const sinDatosLabel = document.getElementById("sinDatosLabelVe");
    const detalles = document.getElementById("veDetalles");

    // --- Seleccionar radio o mostrar SIN DATOS ---
    let seleccionEncontrada = false;
    radios.forEach(radio => {
      if (radio.value === valorConducta) {
        radio.checked = true;
        seleccionEncontrada = true;
      }
    });
    sinDatosLabel.style.display = seleccionEncontrada ? "none" : "block";

    // --- Ocultar "SIN DATOS" al seleccionar una opción ---
    radios.forEach(radio => {
      radio.addEventListener("change", function () {
        sinDatosLabel.style.display = "none";
      });
    });

    // --- Textarea: mostrar "SIN DATOS" si está vacío ---
    if (valorDetalles.trim() === "" || valorDetalles === "SIN_DATOS") {
      detalles.value = "SIN DATOS";
    } else {
      detalles.value = valorDetalles;
    }

    // Si se borra el texto, volver a mostrar "SIN DATOS"
    detalles.addEventListener("blur", function () {
      if (this.value.trim() === "") {
        this.value = "SIN_DATOS";
      }
    });
  });
</script>




 <div class="col-sm-12 mt-3">
  <h5>Violencia Vicaria</h5>

  <!-- Opciones de conducta -->
  <div class="form-check">
    <input class="form-check-input" type="radio" name="vvConducta" id="vvAmenazaHijos" value="Amenaza con dañar o quitarle a sus hijas o hijos">
    <label class="form-check-label" for="vvAmenazaHijos">
      Amenaza con dañar o quitarle a sus hijas o hijos
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="vvConducta" id="vvUsaHijos" value="Utiliza a sus hijas o hijos para causarle daño o manipularla">
    <label class="form-check-label" for="vvUsaHijos">
      Utiliza a sus hijas o hijos para causarle daño o manipularla
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="vvConducta" id="vvImpideVer" value="Le impide o dificulta el contacto con sus hijas o hijos">
    <label class="form-check-label" for="vvImpideVer">
      Le impide o dificulta el contacto con sus hijas o hijos
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="vvConducta" id="vvManipula" value="Manipula a sus hijas o hijos en su contra">
    <label class="form-check-label" for="vvManipula">
      Manipula a sus hijas o hijos en su contra
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="vvConducta" id="vvNiegaApoyo" value="Niega apoyo económico o cuidados a hijas/os para castigarla">
    <label class="form-check-label" for="vvNiegaApoyo">
      Niega apoyo económico o cuidados a hijas/os para castigarla
    </label>
  </div>

  <!-- Etiqueta SIN DATOS -->
  <div id="sinDatosLabelVv" class="text-muted fst-italic mt-2" style="display: none;">
    SIN DATOS
  </div>

  <!-- Detalles adicionales -->
  <div class="mt-3">
    <label for="vvDetalles" class="form-label">Detalles adicionales</label>
    <textarea class="form-control" id="vvDetalles" name="vvDetalles" rows="3"
      placeholder="Describa más (situaciones, fechas, consecuencias, etc.)"></textarea>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const valorConducta = "<?php echo isset($fila['vvConducta']) ? $fila['vvConducta'] : ''; ?>";
    const valorDetalles = "<?php echo isset($fila['vvDetalles']) ? $fila['vvDetalles'] : ''; ?>";

    const radios = document.querySelectorAll('input[name="vvConducta"]');
    const sinDatosLabel = document.getElementById("sinDatosLabelVv");
    const detalles = document.getElementById("vvDetalles");

    // --- Seleccionar radio o mostrar SIN DATOS ---
    let seleccionEncontrada = false;
    radios.forEach(radio => {
      if (radio.value === valorConducta) {
        radio.checked = true;
        seleccionEncontrada = true;
      }
    });
    sinDatosLabel.style.display = seleccionEncontrada ? "none" : "block";

    // --- Ocultar "SIN DATOS" al seleccionar una opción ---
    radios.forEach(radio => {
      radio.addEventListener("change", function () {
        sinDatosLabel.style.display = "none";
      });
    });

    // --- Textarea: mostrar "SIN DATOS" si está vacío ---
    if (valorDetalles.trim() === "" || valorDetalles === "SIN_DATOS") {
      detalles.value = "SIN DATOS";
    } else {
      detalles.value = valorDetalles;
    }

    // Si se borra el texto, volver a mostrar "SIN DATOS"
    detalles.addEventListener("blur", function () {
      if (this.value.trim() === "") {
        this.value = "SIN DATOS";
      }
    });
  });
</script>



 <div class="col-sm-12 mt-3">
  <h5>Violencia Obstétrica</h5>

  <!-- Opciones de conducta -->
  <div class="form-check">
    <input class="form-check-input" type="radio" name="voConducta" id="voMaltrato" value="Fue maltratada verbal o físicamente durante el parto o atención médica">
    <label class="form-check-label" for="voMaltrato">
      Fue maltratada verbal o físicamente durante el parto o atención médica
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="voConducta" id="voSinConsentimiento" value="Le realizaron procedimientos sin su consentimiento (cesárea, episiotomía, etc.)">
    <label class="form-check-label" for="voSinConsentimiento">
      Le realizaron procedimientos sin su consentimiento (cesárea, episiotomía, etc.)
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="voConducta" id="voNegaronAtencion" value="Le negaron o retrasaron la atención médica durante el embarazo o parto">
    <label class="form-check-label" for="voNegaronAtencion">
      Le negaron o retrasaron la atención médica durante el embarazo o parto
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="voConducta" id="voDiscriminacion" value="Fue discriminada o humillada por su origen, edad o condición social durante la atención">
    <label class="form-check-label" for="voDiscriminacion">
      Fue discriminada o humillada por su origen, edad o condición social durante la atención
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="voConducta" id="voEsterilizacion" value="Fue esterilizada sin su consentimiento informado">
    <label class="form-check-label" for="voEsterilizacion">
      Fue esterilizada sin su consentimiento informado
    </label>
  </div>

  <!-- Etiqueta SIN DATOS -->
  <div id="sinDatosLabelVo" class="text-muted fst-italic mt-2" style="display: none;">
    SIN DATOS
  </div>

  <!-- Detalles adicionales -->
  <div class="mt-3">
    <label for="voDetalles" class="form-label">Detalles adicionales</label>
    <textarea class="form-control" id="voDetalles" name="voDetalles" rows="3"
      placeholder="Describa más (hospital, fechas, personal involucrado, consecuencias, etc.)"></textarea>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const valorConducta = "<?php echo isset($fila['voConducta']) ? $fila['voConducta'] : ''; ?>";
    const valorDetalles = "<?php echo isset($fila['voDetalles']) ? $fila['voDetalles'] : ''; ?>";

    const radios = document.querySelectorAll('input[name="voConducta"]');
    const sinDatosLabel = document.getElementById("sinDatosLabelVo");
    const detalles = document.getElementById("voDetalles");

    // --- Seleccionar radio o mostrar SIN DATOS ---
    let seleccionEncontrada = false;
    radios.forEach(radio => {
      if (radio.value === valorConducta) {
        radio.checked = true;
        seleccionEncontrada = true;
      }
    });
    sinDatosLabel.style.display = seleccionEncontrada ? "none" : "block";

    // --- Ocultar "SIN DATOS" al seleccionar una opción ---
    radios.forEach(radio => {
      radio.addEventListener("change", function () {
        sinDatosLabel.style.display = "none";
      });
    });

    // --- Textarea: mostrar "SIN DATOS" si está vacío ---
    if (valorDetalles.trim() === "" || valorDetalles === "SIN_DATOS") {
      detalles.value = "SIN DATOS";
    } else {
      detalles.value = valorDetalles;
    }

    // Si se borra el texto, volver a mostrar "SIN DATOS"
    detalles.addEventListener("blur", function () {
      if (this.value.trim() === "") {
        this.value = "SIN DATOS";
      }
    });
  });
</script>




<div class="col-sm-12 mt-3">
  <h5>Violencia Política</h5>

  <!-- Opciones de conducta -->
  <div class="form-check">
    <input class="form-check-input" type="radio" name="vpConducta" id="vpImpedirParticipacion" value="Le impidieron participar en actividades políticas o comunitarias por su género">
    <label class="form-check-label" for="vpImpedirParticipacion">
      Le impidieron participar en actividades políticas o comunitarias por su género
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="vpConducta" id="vpDesprestigio" value="Fue objeto de difamación, burlas o ataques en medios o redes por razones de género">
    <label class="form-check-label" for="vpDesprestigio">
      Fue objeto de difamación, burlas o ataques en medios o redes por razones de género
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="vpConducta" id="vpObstaculizacion" value="Le obstaculizaron el ejercicio de un cargo o funciones públicas por ser mujer">
    <label class="form-check-label" for="vpObstaculizacion">
      Le obstaculizaron el ejercicio de un cargo o funciones públicas por ser mujer
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="vpConducta" id="vpPresion" value="Recibió amenazas, presión o intimidación para renunciar a un cargo o candidatura">
    <label class="form-check-label" for="vpPresion">
      Recibió amenazas, presión o intimidación para renunciar a un cargo o candidatura
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="vpConducta" id="vpViolenciaSimbolica" value="Sufrió violencia simbólica o verbal por ejercer liderazgo político">
    <label class="form-check-label" for="vpViolenciaSimbolica">
      Sufrió violencia simbólica o verbal por ejercer liderazgo político
    </label>
  </div>

  <!-- Etiqueta SIN DATOS -->
  <div id="sinDatosLabelVp" class="text-muted fst-italic mt-2" style="display: none;">
    SIN DATOS
  </div>

  <!-- Detalles adicionales -->
  <div class="mt-3">
    <label for="vpDetalles" class="form-label">Detalles adicionales</label>
    <textarea class="form-control" id="vpDetalles" name="vpDetalles" rows="3"
      placeholder="Describa más (institución, cargo, fecha, tipo de agresión, consecuencias, etc.)"></textarea>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const valorConducta = "<?php echo isset($fila['vpConducta']) ? $fila['vpConducta'] : ''; ?>";
    const valorDetalles = "<?php echo isset($fila['vpDetalles']) ? $fila['vpDetalles'] : ''; ?>";

    const radios = document.querySelectorAll('input[name="vpConducta"]');
    const sinDatosLabel = document.getElementById("sinDatosLabelVp");
    const detalles = document.getElementById("vpDetalles");

    // --- Seleccionar radio o mostrar SIN DATOS ---
    let seleccionEncontrada = false;
    radios.forEach(radio => {
      if (radio.value === valorConducta) {
        radio.checked = true;
        seleccionEncontrada = true;
      }
    });
    sinDatosLabel.style.display = seleccionEncontrada ? "none" : "block";

    // --- Ocultar "SIN DATOS" al seleccionar una opción ---
    radios.forEach(radio => {
      radio.addEventListener("change", function () {
        sinDatosLabel.style.display = "none";
      });
    });

    // --- Textarea: mostrar "SIN DATOS" si está vacío ---
    if (valorDetalles.trim() === "" || valorDetalles === "SIN_DATOS") {
      detalles.value = "SIN DATOS";
    } else {
      detalles.value = valorDetalles;
    }

    // Si se borra el texto, volver a mostrar "SIN DATOS"
    detalles.addEventListener("blur", function () {
      if (this.value.trim() === "") {
        this.value = "SIN DATOS";
      }
    });
  });
</script>


  <div class="col-sm-12 mt-3">
  <h5>Violencia Cibernética</h5>

  <!-- Opciones de conducta -->
  <div class="form-check">
    <input class="form-check-input" type="radio" name="vcConducta" id="vcDifusion" value="Difundieron fotos, videos o información íntima sin su consentimiento">
    <label class="form-check-label" for="vcDifusion">
      Difundieron fotos, videos o información íntima sin su consentimiento
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="vcConducta" id="vcAmenazas" value="Recibió amenazas o acoso por redes sociales, mensajes o correo electrónico">
    <label class="form-check-label" for="vcAmenazas">
      Recibió amenazas o acoso por redes sociales, mensajes o correo electrónico
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="vcConducta" id="vcSuplantacion" value="Alguien creó perfiles falsos o suplantó su identidad en línea">
    <label class="form-check-label" for="vcSuplantacion">
      Alguien creó perfiles falsos o suplantó su identidad en línea
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="vcConducta" id="vcEspionaje" value="Fue vigilada o espiada mediante dispositivos, cámaras o software">
    <label class="form-check-label" for="vcEspionaje">
      Fue vigilada o espiada mediante dispositivos, cámaras o software
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="vcConducta" id="vcPublicacion" value="Publicaron información personal o falsa para dañarla públicamente">
    <label class="form-check-label" for="vcPublicacion">
      Publicaron información personal o falsa para dañarla públicamente
    </label>
  </div>

  <!-- Etiqueta SIN DATOS -->
  <div id="sinDatosLabelVc" class="text-muted fst-italic mt-2" style="display: none;">
    SIN DATOS
  </div>

  <!-- Detalles adicionales -->
  <div class="mt-3">
    <label for="vcDetalles" class="form-label">Detalles adicionales</label>
    <textarea class="form-control" id="vcDetalles" name="vcDetalles" rows="3"
      placeholder="Describa más (plataforma, tipo de agresión, fecha, consecuencias, etc.)"></textarea>
  </div>
</div>

<script>
 document.addEventListener("DOMContentLoaded", function () {
    let valorConducta = "<?php echo isset($fila['vcConducta']) ? $fila['vcConducta'] : ''; ?>";
    let valorDetalles = "<?php echo isset($fila['vcDetalles']) ? $fila['vcDetalles'] : ''; ?>";

    let radios = document.querySelectorAll('input[name="vcConducta"]');
    let sinDatosLabell = document.getElementById("sinDatosLabelVc");
    let detalles = document.getElementById("vcDetalles");

    // --- Seleccionar radio o mostrar SIN DATOS ---
    let seleccionEncontrada = false;
    radios.forEach(radio => {
      if (radio.value === valorConducta) {
        radio.checked = true;
        seleccionEncontrada = true;
      }
    });
    sinDatosLabell.style.display = seleccionEncontrada ? "none" : "block";

    // --- Ocultar "SIN DATOS" al seleccionar una opción ---
    radios.forEach(radio => {
      radio.addEventListener("change", function () {
        sinDatosLabell.style.display = "none";
      });
    });

    // --- Textarea: mostrar "SIN DATOS" si está vacío ---
    if (valorDetalles.trim() === "" || valorDetalles === "SIN_DATOS") {
      detalles.value = "SIN DATOS";
    } else {
      detalles.value = valorDetalles;
    }

    // Si se borra el texto, volver a mostrar "SIN DATOS"
    detalles.addEventListener("blur", function () {
      if (this.value.trim() === "") {
        this.value = "SIN DATOS";
      }
    });
});

</script>


  <div class="col-sm-12 mt-3">
  <h5>Violencia Laboral</h5>

  <!-- Opciones de conducta -->
  <div class="form-check">
    <input class="form-check-input" type="radio" name="vlConducta" id="vlDiscriminacion" value="Ha sufrido discriminación en el trabajo por razones de género, embarazo o maternidad">
    <label class="form-check-label" for="vlDiscriminacion">
      Ha sufrido discriminación en el trabajo por razones de género, embarazo o maternidad
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="vlConducta" id="vlDespido" value="Fue despedida o sancionada injustamente por razones personales o de género">
    <label class="form-check-label" for="vlDespido">
      Fue despedida o sancionada injustamente por razones personales o de género
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="vlConducta" id="vlNegacionDerechos" value="Le negaron derechos laborales (salario, prestaciones, descansos, permisos)">
    <label class="form-check-label" for="vlNegacionDerechos">
      Le negaron derechos laborales (salario, prestaciones, descansos, permisos)
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="vlConducta" id="vlAmenazas" value="Recibió amenazas, burlas, humillaciones o aislamiento en su lugar de trabajo">
    <label class="form-check-label" for="vlAmenazas">
      Recibió amenazas, burlas, humillaciones o aislamiento en su lugar de trabajo
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="vlConducta" id="vlCambioFunciones" value="La cambiaron de funciones o le redujeron responsabilidades como forma de castigo o represalia">
    <label class="form-check-label" for="vlCambioFunciones">
      La cambiaron de funciones o le redujeron responsabilidades como forma de castigo o represalia
    </label>
  </div>

  <!-- Etiqueta SIN DATOS -->
  <div id="sinDatosLabelVl" class="text-muted fst-italic mt-2" style="display: none;">
    SIN DATOS
  </div>

  <!-- Detalles adicionales -->
  <div class="mt-3">
    <label for="vlDetalles" class="form-label">Detalles adicionales</label>
    <textarea class="form-control" id="vlDetalles" name="vlDetalles" rows="3"
      placeholder="Describa más (puesto, lugar de trabajo, fechas, contexto, responsables, etc.)"></textarea>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const valorConducta = "<?php echo isset($fila['vlConducta']) ? $fila['vlConducta'] : ''; ?>";
    const valorDetalles = "<?php echo isset($fila['vlDetalles']) ? $fila['vlDetalles'] : ''; ?>";

    const radios = document.querySelectorAll('input[name="vlConducta"]');
    const sinDatosLabel = document.getElementById("sinDatosLabelVl");
    const detalles = document.getElementById("vlDetalles");

    // --- Seleccionar radio o mostrar SIN DATOS ---
    let seleccionEncontrada = false;
    radios.forEach(radio => {
      if (radio.value === valorConducta) {
        radio.checked = true;
        seleccionEncontrada = true;
      }
    });
    sinDatosLabel.style.display = seleccionEncontrada ? "none" : "block";

    // --- Ocultar "SIN DATOS" al seleccionar una opción ---
    radios.forEach(radio => {
      radio.addEventListener("change", function () {
        sinDatosLabel.style.display = "none";
      });
    });

    // --- Textarea: mostrar "SIN DATOS" si está vacío ---
    if (valorDetalles.trim() === "" || valorDetalles === "SIN_DATOS") {
      detalles.value = "SIN DATOS";
    } else {
      detalles.value = valorDetalles;
    }

    // Si se borra el texto, volver a mostrar "SIN DATOS"
    detalles.addEventListener("blur", function () {
      if (this.value.trim() === "") {
        this.value = "SIN DATOS";
      }
    });
  });
</script>
















    


   

   





  




 

    














   

    









  



   


            <h4>Valoración de Violencia</h4>
            <hr class="my-4">

    <div class="col-sm-12">
    <label for="situacionUsuaria" class="form-label">Situación de usuaria</label>
        <input type="text" class="form-control" id="situacionUsuaria" name="situacionUsuaria" value="<?php echo $usuario['SituacionUsuaria']; ?>"><br>
        <div class="invalid-feedback">Se requiere un apellido válido.</div>
    </div>



    <div class="col-sm-6">
    <label class="form-label">¿La pareja es el agresor?</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="parejaTrabaja" id="parejaTrabaja1" value="SI" <?php if($usuario['ParejaTrabaja'] == "SI") echo 'checked="checked"'; ?> >
        <!-- onclick="showParejaInput()" -->
        <label class="form-check-label" for="parejaTrabaja1">SI</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="parejaTrabaja" id="parejaTrabaja2" value="NO" <?php if($usuario['ParejaTrabaja'] == "NO") echo 'checked="checked"'; ?> >
        <!-- onclick="hideParejaInput()" -->
        <label class="form-check-label" for="parejaTrabaja2">NO</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="parejaTrabaja" id="parejaTrabaja3" value="SIN DATOS" <?php if($usuario['ParejaTrabaja'] == "SIN DATOS") echo 'checked="checked"'; ?> >
        <label class="form-check-label" for="parejaTrabaja3">SIN DATOS</label>
    </div>
</div>


    <div class="col-sm-6" id="NombreAgresor">
        <label for="NombreAgresor" class="form-label">¿Nombre del agresor?</label>
        <input type="text" class="form-control" id="Agresor" name="nombreAgresor" value="<?php echo $usuario['NombreAgresor']; ?>"><br>
        <div class="invalid-feedback">Se requiere un apellido válido.</div>
    </div>

    <div class="col-sm-6">
    <label class="form-label">¿Tiene o tuvo una relación con la persona agresora?</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="relacionAgresora" id="relacionAgresoraSI" value="SI" <?php if($usuario['RelacionAgresora'] == "SI") echo 'checked="checked"'; ?> onclick="showRelacionInput()">
        <label class="form-check-label" for="relacionAgresoraSI">SI</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="relacionAgresora" id="relacionAgresoraNO" value="NO" <?php if($usuario['RelacionAgresora'] == "NO") echo 'checked="checked"'; ?> onclick="hideRelacionInput()">
        <label class="form-check-label" for="relacionAgresoraNO">NO</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="relacionAgresora" id="relacionAgresoraSinDatos" value="SIN DATOS" <?php if($usuario['RelacionAgresora'] == "SIN DATOS") echo 'checked="checked"'; ?> onclick="hideRelacionInput()">
        <label class="form-check-label" for="relacionAgresoraSinDatos">SIN DATOS</label>
    </div>
</div>




<div class="col-sm-6" id="RelacionInput" style="display: none;">
        <label for="tipoRelacion" class="form-label">Indique el tipo de relación</label>
        <input type="text" class="form-control" id="tipoRelacion" name="tipoRelacion" value="<?php echo $usuario['TipoRelacion']; ?>">
        <div class="invalid-feedback">Se requiere un tipo de relación válido.</div>
    </div>
        
    <div class="col-sm-6">
    <label class="form-label">¿Actualmente vives con tu pareja?</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="viveConPareja" id="viveConParejaSI" value="SI" <?php if($usuario['ViveConPareja'] == "SI") echo 'checked="checked"'; ?> onclick="showVivesInput()">
        <label class="form-check-label" for="viveConParejaSI">SI</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="viveConPareja" id="viveConParejaNO" value="NO" <?php if($usuario['ViveConPareja'] == "NO") echo 'checked="checked"'; ?> onclick="hideVivesInput()">
        <label class="form-check-label" for="viveConParejaNO">NO</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="viveConPareja" id="viveConParejaSinDatos" value="SIN DATOS" <?php if($usuario['ViveConPareja'] == "SIN DATOS") echo 'checked="checked"'; ?> onclick="hideVivesInput()">
        <label class="form-check-label" for="viveConParejaSinDatos">SIN DATOS</label>
    </div>
</div>


<div class="col-sm-6" id="VivesInput" style="display: none;">
        <label for="tiempoViviendoPareja" class="form-label">Tiempo que lleva viviendo la pareja (Meses)</label>
        <input type="number" max="1000" class="form-control" id="tiempoViviendoPareja" name="tiempoViviendoPareja" value="<?php echo $usuario['TiempoViviendoPareja']; ?>">
        <div class="invalid-feedback">Se requiere un tiempo de convivencia válido.</div>
    </div>

    <div class="col-sm-6">
    <label class="form-label">¿La persona agresora te ha amenazado o chantajeado?</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="chantajeado" id="chantajeadoSI" value="SI" <?php if($usuario['chantajeado'] == "SI") echo 'checked="checked"'; ?> onclick="showAgresoraInput()">
        <label class="form-check-label" for="chantajeadoSI">SI</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="chantajeado" id="chantajeadoNO" value="NO" <?php if($usuario['chantajeado'] == "NO") echo 'checked="checked"'; ?> onclick="hideAgresoraInput()">
        <label class="form-check-label" for="chantajeadoNO">NO</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="chantajeado" id="chantajeadoSinDatos" value="SIN DATOS" <?php if($usuario['chantajeado'] == "SIN DATOS") echo 'checked="checked"'; ?> onclick="hideAgresoraInput()">
        <label class="form-check-label" for="chantajeadoSinDatos">SIN DATOS</label>
    </div>
</div>

        
<div class="col-sm-6" id="AgresoraInput" style="display: none;">
        <label for="comochantajeado" class="form-label">Indica cómo te ha amenazado o chantajeado</label>
        <input type="text" class="form-control" id="comochantajeado" name="comochantajeado" value="<?php echo $usuario['comochantajeado']; ?>">
        <div class="invalid-feedback">Se requiere una descripción válida de la amenaza o chantaje.</div>
    </div>

    <div class="col-sm-6">
    <label class="form-label">¿Considera que su pareja o expareja es celosa?</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="parejaCelosa" id="celosaSI" value="SI" <?php if($usuario['ParejaCelosa'] == "SI") echo 'checked="checked"'; ?> >
        <label class="form-check-label" for="celosaSI">SI</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="parejaCelosa" id="celosaNO" value="NO" <?php if($usuario['ParejaCelosa'] == "NO") echo 'checked="checked"'; ?> >
        <label class="form-check-label" for="celosaNO">NO</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="parejaCelosa" id="celosaSinDatos" value="SIN DATOS" <?php if($usuario['ParejaCelosa'] == "SIN DATOS") echo 'checked="checked"'; ?>>
        <label class="form-check-label" for="celosaSinDatos">SIN DATOS</label>
    </div>
</div>


<div class="col-sm-6">
    <label class="form-label">¿Su pareja o expareja utiliza a sus hijos/as para mantenerla a usted bajo control?</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="utilizaHijos" id="utilizaHijosSI" value="SI" <?php if($usuario['UtilizaHijos'] == "SI") echo 'checked="checked"'; ?> >
        <label class="form-check-label" for="utilizaHijosSI">SI</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="utilizaHijos" id="utilizaHijosNO" value="NO" <?php if($usuario['UtilizaHijos'] == "NO") echo 'checked="checked"'; ?> >
        <label class="form-check-label" for="utilizaHijosNO">NO</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="utilizaHijos" id="utilizaHijosSinDatos" value="SIN DATOS" <?php if($usuario['UtilizaHijos'] == "SIN DATOS") echo 'checked="checked"'; ?>>
        <label class="form-check-label" for="utilizaHijosSinDatos">SIN DATOS</label>
    </div>
</div>


<div class="col-sm-6">
    <label class="form-label">¿Su pareja es consumidor habitual de alcohol o drogas?</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="consumidora" id="consumidoraSI" value="SI" <?php if($usuario['Consumidora'] == "SI") echo 'checked="checked"'; ?> >
        <label class="form-check-label" for="consumidoraSI">SI</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="consumidora" id="consumidoraNO" value="NO" <?php if($usuario['Consumidora'] == "NO") echo 'checked="checked"'; ?> >
        <label class="form-check-label" for="consumidoraNO">NO</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="consumidora" id="consumidoraNOSE" value="NO SE" <?php if($usuario['Consumidora'] == "NO SE") echo 'checked="checked"'; ?> >
        <label class="form-check-label" for="consumidoraNOSE">NO SÉ</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="consumidora" id="consumidoraSINDATOS" value="SIN DATOS" <?php if($usuario['Consumidora'] == "SIN DATOS") echo 'checked="checked"'; ?> >
        <label class="form-check-label" for="consumidoraSINDATOS">SIN DATOS</label>
    </div>
</div>


<div class="col-sm-6">
    <label class="form-label">¿Su pareja o expareja le agredió de manera física, menos de cinco veces en el último mes?</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="agresion" id="agresionSI" value="SI" <?php if($usuario['Agresion'] == "SI") echo 'checked="checked"'; ?> >
        <label class="form-check-label" for="agresionSI">SI</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="agresion" id="agresionNO" value="NO" <?php if($usuario['Agresion'] == "NO") echo 'checked="checked"'; ?> >
        <label class="form-check-label" for="agresionNO">NO</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="agresion" id="agresionSINDATOS" value="SIN DATOS" <?php if($usuario['Agresion'] == "SIN DATOS") echo 'checked="checked"'; ?> >
        <label class="form-check-label" for="agresionSINDATOS">SIN DATOS</label>
    </div>
</div>


<div class="col-sm-6">
    <label class="form-label">En el último año, ¿las agresiones se han incrementado?</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="incrementoAgresiones" id="incrementoAgresionesSI" value="SI" <?php if($usuario['IncrementoAgresiones'] == "SI") echo 'checked="checked"'; ?> >
        <label class="form-check-label" for="incrementoAgresionesSI">SI</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="incrementoAgresiones" id="incrementoAgresionesNO" value="NO" <?php if($usuario['IncrementoAgresiones'] == "NO") echo 'checked="checked"'; ?> >
        <label class="form-check-label" for="incrementoAgresionesNO">NO</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="incrementoAgresiones" id="incrementoAgresionesSINDATOS" value="SIN DATOS" <?php if($usuario['IncrementoAgresiones'] == "SIN DATOS") echo 'checked="checked"'; ?> >
        <label class="form-check-label" for="incrementoAgresionesSINDATOS">SIN DATOS</label>
    </div>
</div>

    
<div class="col-sm-6">
    <label class="form-label">¿De las agresiones sufridas ha requerido atención médica u hospitalaria?</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="atencionMedica" id="atencionMedicaSI" value="SI" <?php if($usuario['AtencionMedica'] == "SI") echo 'checked="checked"'; ?> >
        <label class="form-check-label" for="atencionMedicaSI">SI</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="atencionMedica" id="atencionMedicaNO" value="NO" <?php if($usuario['AtencionMedica'] == "NO") echo 'checked="checked"'; ?> >
        <label class="form-check-label" for="atencionMedicaNO">NO</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="atencionMedica" id="atencionMedicaSINDATOS" value="SIN DATOS" <?php if($usuario['AtencionMedica'] == "SIN DATOS") echo 'checked="checked"'; ?> >
        <label class="form-check-label" for="atencionMedicaSINDATOS">SIN DATOS</label>
    </div>
</div>

<div class="col-sm-6">
    <label class="form-label">¿Ha sido amenazada con armas como machete, cuchillo, pistola, u otra, o incluso ha sido herida con alguna?</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="amenazadaConArmas" id="amenazadaConArmasSI" value="SI" <?php if($usuario['AmenazadaConArmas'] == "SI") echo 'checked="checked"'; ?> >
        <label class="form-check-label" for="amenazadaConArmasSI">SI</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="amenazadaConArmas" id="amenazadaConArmasNO" value="NO" <?php if($usuario['AmenazadaConArmas'] == "NO") echo 'checked="checked"'; ?> >
        <label class="form-check-label" for="amenazadaConArmasNO">NO</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="amenazadaConArmas" id="amenazadaConArmasSINDATOS" value="SIN DATOS" <?php if($usuario['AmenazadaConArmas'] == "SIN DATOS") echo 'checked="checked"'; ?> >
        <label class="form-check-label" for="amenazadaConArmasSINDATOS">SIN DATOS</label>
    </div>
</div>

    
<div class="col-sm-6">
    <label class="form-label">¿Ha intentado ahorcarla?</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="intentoAhorcar" id="intentoAhorcarSI" value="SI" <?php if($usuario['IntentoAhorcar'] == "SI") echo 'checked="checked"'; ?> >
        <label class="form-check-label" for="intentoAhorcarSI">SI</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="intentoAhorcar" id="intentoAhorcarNO" value="NO" <?php if($usuario['IntentoAhorcar'] == "NO") echo 'checked="checked"'; ?> >
        <label class="form-check-label" for="intentoAhorcarNO">NO</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="intentoAhorcar" id="intentoAhorcarSINDATOS" value="SIN DATOS" <?php if($usuario['IntentoAhorcar'] == "SIN DATOS") echo 'checked="checked"'; ?> >
        <label class="form-check-label" for="intentoAhorcarSINDATOS">SIN DATOS</label>
    </div>
</div>

<div class="col-sm-6">
    <label class="form-label">¿Siente temor por su vida?</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="sienteTemorVida" id="sienteTemorVidaSI" value="SI" <?php if($usuario['SienteTemorVida'] == "SI") echo 'checked="checked"'; ?> >
        <label class="form-check-label" for="sienteTemorVidaSI">SI</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="sienteTemorVida" id="sienteTemorVidaNO" value="NO" <?php if($usuario['SienteTemorVida'] == "NO") echo 'checked="checked"'; ?> >
        <label class="form-check-label" for="sienteTemorVidaNO">NO</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="sienteTemorVida" id="sienteTemorVidaSINDATOS" value="SIN DATOS" <?php if($usuario['SienteTemorVida'] == "SIN DATOS") echo 'checked="checked"'; ?> >
        <label class="form-check-label" for="sienteTemorVidaSINDATOS">SIN DATOS</label>
    </div>
</div>


<div class="col-sm-6">
    <label class="form-label">¿La persona agresora posee o tiene acceso a un arma de fuego?</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="poseeArmaFuego" id="poseeArmaFuegoSI" value="SI" <?php if($usuario['PoseeArmaFuego'] == "SI") echo 'checked="checked"'; ?> >
        <label class="form-check-label" for="poseeArmaFuegoSI">SI</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="poseeArmaFuego" id="poseeArmaFuegoNO" value="NO" <?php if($usuario['PoseeArmaFuego'] == "NO") echo 'checked="checked"'; ?> >
        <label class="form-check-label" for="poseeArmaFuegoNO">NO</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="poseeArmaFuego" id="poseeArmaFuegoSINDATOS" value="SIN DATOS" <?php if($usuario['PoseeArmaFuego'] == "SIN DATOS") echo 'checked="checked"'; ?> >
        <label class="form-check-label" for="poseeArmaFuegoSINDATOS">SIN DATOS</label>
    </div>
</div>

<div class="col-sm-6">
    <label for="denunciaSI">¿Ha interpuesto denuncia en contra de la persona agresora por anteriores hechos de violencia?</label><br>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="denuncia" id="denunciaSI" value="SI" <?php if($usuario['Denuncia'] == "SI") echo 'checked="checked"'; ?>  onclick="showDenunciaInput()">
        <label class="form-check-label" for="denunciaSI">SI</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="denuncia" id="denunciaNO" value="NO" <?php if($usuario['Denuncia'] == "NO") echo 'checked="checked"'; ?> onclick="hideDenunciaInput()">
        <label class="form-check-label" for="denunciaNO">NO</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="denuncia" id="denunciaSINDATOS" value="SIN DATOS" <?php if($usuario['Denuncia'] == "SIN DATOS") echo 'checked="checked"'; ?> onclick="hideDenunciaInput()">
        <label class="form-check-label" for="denunciaSINDATOS">SIN DATOS</label>
    </div>
</div>


<div class="col-sm-6" id="DenunciaInput"style="display: none;">
    <label for="tipoDenuncia">Tipo de Denuncia:</label><br>
        <select class="form-select" id="tipoDenuncia" name="tipoDenuncia" placeholder="Especifique el tipo de denuncia">
            <option value="ABUSO" <?php if($usuario['TipoDenuncia'] == "ABUSO") echo 'selected="selected"'; ?>>Abuso</option>
            <option value="VIOLACIÓN" <?php if($usuario['TipoDenuncia'] == "VIOLACIÓN") echo 'selected="selected"'; ?>>Violación</option>
            <option value="ROBO" <?php if($usuario['TipoDenuncia'] == "ROBO") echo 'selected="selected"'; ?>>Robo</option>
            <option value="VIOLENCIA FAMILIAR" <?php if($usuario['TipoDenuncia'] == "VIOLENCIA FAMILIAR") echo 'selected="selected"'; ?>>Violencia familiar</option>
            <option value="NARCO MENUDEO" <?php if($usuario['TipoDenuncia'] == "NARCO MENUDEO") echo 'selected="selected"'; ?>>Narco menudeo</option>
            <option <?php if ($usuario['TipoDenuncia'] == 'SIN DATOS') echo 'selected'; ?> value="SIN DATOS">SIN DATOS</option>
        </select>
        <div class="invalid-feedback">Selecciona una opción Válida.</div>
    </div> 

    <div class="col-sm-6">
    <label class="form-label">¿La persona agresora está o ha sido ingresada a prisión?</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="ingresadoPrision" id="ingresadoPrisionSI" value="SI" <?php if($usuario['IngresadoPrision'] == "SI") echo 'checked="checked"'; ?> >
        <label class="form-check-label" for="ingresadoPrisionSI">SI</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="ingresadoPrision" id="ingresadoPrisionNO" value="NO" <?php if($usuario['IngresadoPrision'] == "NO") echo 'checked="checked"'; ?>>
        <label class="form-check-label" for="ingresadoPrisionNO">NO</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="ingresadoPrision" id="ingresadoPrisionSINDATOS" value="SIN DATOS" <?php if($usuario['IngresadoPrision'] == "SIN DATOS") echo 'checked="checked"'; ?>>
        <label class="form-check-label" for="ingresadoPrisionSINDATOS">SIN DATOS</label>
    </div>
</div>


    <h4>Valoración de Violencia</h4>
            <hr class="my-4">

<div class="col-sm-12">
    <label for="valoracionRiesgo" class="form-label">Valoración de riesgo</label>
    <select class="form-select" id="valoracionRiesgo" name="valoracionRiesgo">
        <option selected disabled value="">Selecciona una opción...</option>
        <option <?php if ($usuario['ValoracionRiesgo'] == 'RIESGO BAJO') echo 'selected'; ?> value="RIESGO BAJO">Riesgo Bajo</option>
        <option <?php if ($usuario['ValoracionRiesgo'] == 'RIESGO MODERADO') echo 'selected'; ?> value="RIESGO MODERADO">Riesgo Moderado</option>
        <option <?php if ($usuario['ValoracionRiesgo'] == 'RIESGO ALTO') echo 'selected'; ?> value="RIESGO ALTO">Riesgo Alto</option>
        <option <?php if ($usuario['ValoracionRiesgo'] == 'RIESGO SEVERO') echo 'selected'; ?> value="RIESGO SEVERO">Riesgo Severo</option>
        <option <?php if ($usuario['ValoracionRiesgo'] == 'SIN DATOS') echo 'selected'; ?> value="SIN DATOS">SIN DATOS</option>
    </select>
    <div class="invalid-feedback">Selecciona una opción válida.</div>
</div>


<div class="col-sm-6">
    <label class="form-label">¿Canalización?</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="canalizacion" id="canalizacionExterna" value="EXTERNA" <?php if($usuario['Canalizacion'] == "EXTERNA") echo 'checked="checked"'; ?> onclick="showCanaInput()">
        <label class="form-check-label" for="canalizacionExterna">Externa</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="canalizacion" id="canalizacionInterna" value="INTERNA" <?php if($usuario['Canalizacion'] == "INTERNA") echo 'checked="checked"'; ?> onclick="hideCanaInput()">
        <label class="form-check-label" for="canalizacionInterna">Interna</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="canalizacion" id="canalizacionSINDATOS" value="SIN DATOS" <?php if($usuario['Canalizacion'] == "SIN DATOS") echo 'checked="checked"'; ?> >
        <label class="form-check-label" for="canalizacionSINDATOS">SIN DATOS</label>
    </div>
</div>


<div class="col-sm-6" id="CanaInput" style="display: none;">
        <label for="canalizacionExterna" class="form-label">Externa</label>
        <input type="text" class="form-control" id="Externa" name="canalizacionExterna" value="<?php echo $usuario['CanalizacionExterna']; ?>">
    </div>

    <div class="col-sm-6" id="CanadosInput" style="display: none;">
    <label for="canalizacionInterna" class="form-label">Interna</label>
    <select class="form-select" id="canalizacionInterna" name="canalizacionInterna">
        <option selected disabled value="">Selecciona una opción...</option>
        <option <?php if ($usuario['CanalizacionInterna'] == 'JURÍDICA') echo 'selected'; ?> value="JURÍDICA">JURÍDICA</option>
        <option <?php if ($usuario['CanalizacionInterna'] == 'PSICOLÓGICA') echo 'selected'; ?> value="PSICOLÓGICA">PSICOLÓGICA</option>
        <option <?php if ($usuario['CanalizacionInterna'] == 'MÉDICA') echo 'selected'; ?> value="MÉDICA">MÉDICA</option>
        <option <?php if ($usuario['CanalizacionInterna'] == 'NUTRICIONAL') echo 'selected'; ?> value="NUTRICIONAL">NUTRICIONA</option>
        <option <?php if ($usuario['CanalizacionInterna'] == 'ACOMPAÑAMIENTO A LA INTERRUPCIÓN DEL EMBARAZO') echo 'selected'; ?> value="ACOMPAÑAMIENTO A LA INTERRUPCIÓN DEL EMBARAZO">ACOMPAÑAMIENTO A LA INTERRUPCIÓN DEL EMBARAZO</option>
        <option <?php if ($usuario['CanalizacionInterna'] == 'SIN DATOS') echo 'selected'; ?> value="SIN DATOS">SIN DATOS</option>
    </select>
</div>

<div class="col-sm-12">
    <div>
    <!-- <button class="w-100 btn btn-success btn-lg" type="button" onclick="openPopupp()">Registrar Tipo de Violencia</button> -->
    </div>
    </div>


    <div class="col-sm-12">
    <div class="mb-3">
        <label for="auxiliosPsicologicos" class="form-label">Primeros auxilios psicológicos</label>
        <input class="form-control" id="auxiliosPsicologicos" name="auxiliosPsicologicos"  value="<?php echo $usuario['AuxiliosPsicologicos']; ?>"></input>
    </div>
    <div class="invalid-feedback">Por favor, proporcione una descripción válida.</div>
    </div>
    </div>

            <hr class="my-4">

    <!-- <button class="w-100 btn btn-primary btn-lg" type="submit"  onclick="openPopup()">Registrar</button>
    <button class="w-100 btn btn-primary btn-lg" type="submit">Registrar</button> -->
    <input class="w-100 btn btn-primary btn-lg" type="submit" value="Guardar Cambios">
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
    <script>
                // Obtener todos los inputs en la página
        const inputs = document.querySelectorAll('input');

        // Función para convertir texto a mayúsculas
        function convertirAMayusculas(e) {
        // Obtener el valor del input y convertirlo a mayúsculas
        const textoEnMayusculas = e.target.value.toUpperCase();
        // Actualizar el valor del input con el texto en mayúsculas
        e.target.value = textoEnMayusculas;
        }

        // Agregar un event listener a cada input
        inputs.forEach(input => {
        input.addEventListener('input', convertirAMayusculas);
        });

            </script>

<script>
function openPopup() {
    var popup = window.open('ventana_hijos.php', '_blank', 'width=700,height=700');
}

// Esta función se llama desde la ventana emergente para cerrarla después de enviar el formulario
function closePopup() {
    window.close();
}

function openPopupp() {
    var popup = window.open('venta-violencia.php', '_blank', 'width=700,height=500');
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if (!empty($mensaje)): ?>
<script>
Swal.fire({
    icon: "<?= $tipoMensaje ?>",
    title: "<?= $mensaje ?>",
    showConfirmButton: false,
    timer: 3000
}).then(() => {
    window.location.href = "../pages/ver-usuaria.php";
});
</script>
<?php endif; ?>



<script src="regiones.js"></script>
<script src="register.js"></script>
    
    </body>
        </html>






