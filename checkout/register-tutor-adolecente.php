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
   
    
    
    $discapacidads = !empty($_POST['discapacidads']) ? $_POST['discapacidads'] : '-';
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

    $nombreconfianza = !empty($_POST['nombreconfianza']) ? $_POST['nombreconfianza'] : '-';
    $parentesco = !empty($_POST['parentesco']) ? $_POST['parentesco'] : '-';

    $tipoLgbt = !empty($_POST['tipoLgbt']) ? $_POST['tipoLgbt'] : '-';
    $comunidadLGBT = !empty($_POST['comunidadLGBT']) ? $_POST['comunidadLGBT'] : '-';

    $grupoEtnico = !empty($_POST['grupoEtnico']) ? $_POST['grupoEtnico'] : '-';
    $perteneceEtnico = !empty($_POST['perteneceEtnico']) ? $_POST['perteneceEtnico'] : '-';

    $padresLengua = !empty($_POST['padresLengua']) ? $_POST['padresLengua'] : '-';
    $lenguaPadres = !empty($_POST['lenguaPadres']) ? $_POST['lenguaPadres'] : '-';

    $aniosOaxaca = !empty($_POST['aniosOaxaca']) ? $_POST['aniosOaxacas'] : '-';

    $observacionesAdicionales = !empty($_POST['observacionesAdicionales']) ? $_POST['observacionesAdicionales'] : '-';



    $email = !empty($_POST['email']) ? $_POST['email'] : '-';
    $emailRespaldo = !empty($_POST['emailRespaldo']) ? $_POST['emailRespaldo'] : '-';
    $curp = !empty($_POST['curp']) ? $_POST['curp'] : '-';
    $ine = !empty($_POST['ine']) ? $_POST['ine'] : '-';
    $ocupacion = !empty($_POST['ocupacion']) ? $_POST['ocupacion'] : '-';

    $tipoEmpleo = !empty($_POST['tipoEmpleo']) ? $_POST['tipoEmpleo'] : '-';

    $fuenteIngresos = !empty($_POST['fuenteIngresos']) ? $_POST['fuenteIngresos'] : '-';

    $ingresoMensual = !empty($_POST['ingresoMensual']) ? $_POST['ingresoMensual'] : '-';
    $apoyosSociales = !empty($_POST['apoyosSociales']) ? $_POST['apoyosSociales'] : '-';
    $recibeApoyo = !empty($_POST['recibeApoyo']) ? $_POST['recibeApoyo'] : '-';
    $apoyoDetalle = !empty($_POST['apoyoDetalle']) ? $_POST['apoyoDetalle'] : '-';


    $totalIngresosFamiliares = !empty($_POST['totalIngresosFamiliares']) ? $_POST['totalIngresosFamiliares'] : '-';
    $gastoAlimentacion = !empty($_POST['gastoAlimentacion']) ? $_POST['gastoAlimentacion'] : '-';
    $gastoVivienda = !empty($_POST['gastoVivienda']) ? $_POST['gastoVivienda'] : '-';
    $gastoServicios = !empty($_POST['gastoServicios']) ? $_POST['gastoServicios'] : '-';
    $gastoTransporte = !empty($_POST['gastoTransporte']) ? $_POST['gastoTransporte'] : '-';
    $gastoEducacion = !empty($_POST['gastoEducacion']) ? $_POST['gastoEducacion'] : '-';
    $gastoSalud = !empty($_POST['gastoSalud']) ? $_POST['gastoSalud'] : '-';
    $gastoDeudas = !empty($_POST['gastoDeudas']) ? $_POST['gastoDeudas'] : '-';
    $gastoOtros = !empty($_POST['gastoOtros']) ? $_POST['gastoOtros'] : '-';




    $sectorEconomico = !empty($_POST['sectorEconomico']) ? $_POST['sectorEconomico'] : '-';
    $horasTrabajo = !empty($_POST['horasTrabajo']) ? $_POST['horasTrabajo'] : '-';
    $ingresosDiarios = !empty($_POST['ingresosDiarios']) ? $_POST['ingresosDiarios'] : '-';
    $tipoEnergia = !empty($_POST['tipoEnergia']) ? $_POST['tipoEnergia'] : '-';
    $agua = !empty($_POST['agua']) ? $_POST['agua'] : '-';
    $materialPiso = !empty($_POST['materialPiso']) ? $_POST['materialPiso'] : '-';

    $numCuartos = !empty($_POST['numCuartos']) ? $_POST['numCuartos'] : '-';
    $numHabitacionesDormir = !empty($_POST['numHabitacionesDormir']) ? $_POST['numHabitacionesDormir'] : '-';
    $numPersonasHogar = !empty($_POST['numPersonasHogar']) ? $_POST['numPersonasHogar'] : '-';

    $enteroGESMUJER = !empty($_POST['enteroGESMUJER']) ? $_POST['enteroGESMUJER'] : '-';
    $electricidad = !empty($_POST['electricidad']) ? $_POST['electricidad'] : '-';
    $internet = !empty($_POST['internet']) ? $_POST['internet'] : '-';
    $gas = !empty($_POST['gas']) ? $_POST['gas'] : '-';
    $television = !empty($_POST['television']) ? $_POST['television'] : '-';
    $telefono = !empty($_POST['telefono']) ? $_POST['telefono'] : '-';
    $bano = !empty($_POST['bano']) ? $_POST['bano'] : '-';



    $tipoServicioAgua = !empty($_POST['tipoServicioAgua']) ? $_POST['tipoServicioAgua'] : '-';
    $materialVivienda = !empty($_POST['materialVivienda']) ? $_POST['materialVivienda'] : '-';

    $TipoBano = !empty($_POST['TipoBano']) ? $_POST['TipoBano'] : '-';
    $personasCasa = !empty($_POST['personasCasa']) ? $_POST['personasCasa'] : '-';
    $personasDormitorio = !empty($_POST['personasDormitorio']) ? $_POST['personasDormitorio'] : '-';
    $tipoVivienda = !empty($_POST['tipoVivienda']) ? $_POST['tipoVivienda'] : '-';
    //$comoSeEntero = !empty($_POST['comoSeEntero']) ? $_POST['comoSeEntero'] : '-';

    $descripcionSolicitud = !empty($_POST['descripcionSolicitud']) ? $_POST['descripcionSolicitud'] : '-';

    $vpsConducta = !empty($_POST['vpsConducta']) ? $_POST['vpsConducta'] : '-';
    $vpsDetalles = !empty($_POST['vpsDetalles']) ? $_POST['vpsDetalles'] : '-';


    $vfConducta = !empty($_POST['vfConducta']) ? $_POST['vfConducta'] : '-';
    $vfDetalles = !empty($_POST['vfDetalles']) ? $_POST['vfDetalles'] : '-';



    $vsConducta = !empty($_POST['vsConducta']) ? $_POST['vsConducta'] : '-';
    $vsDetalles = !empty($_POST['vsDetalles']) ? $_POST['vsDetalles'] : '-';
    $acosoConducta = !empty($_POST['acosoConducta']) ? $_POST['acosoConducta'] : '-';
    $acosoDetalles = !empty($_POST['acosoDetalles']) ? $_POST['acosoDetalles'] : '-';
    $veConducta = !empty($_POST['veConducta']) ? $_POST['veConducta'] : '-';
    $veDetalles = !empty($_POST['veDetalles']) ? $_POST['veDetalles'] : '-';
    $vvConducta = !empty($_POST['vvConducta']) ? $_POST['vvConducta'] : '-';
    $vvDetalles = !empty($_POST['vvDetalles']) ? $_POST['vvDetalles'] : '-';
    $voConducta = isset($_POST['voConducta']) ? $_POST['voConducta'] : '';
    $voDetalles = isset($_POST['voDetalles']) ? $_POST['voDetalles'] : '-';
    $vpConducta = isset($_POST['vpConducta']) ? $_POST['vpConducta'] : '-';
    $vpDetalles = isset($_POST['vpDetalles']) ? $_POST['vpDetalles'] : '-';
    $vcConducta = isset($_POST['vcConducta']) ? $_POST['vcConducta'] : '-';
    $vcDetalles = isset($_POST['vcDetalles']) ? $_POST['vcDetalles'] : '-';
    $vlConducta = isset($_POST['vlConducta']) ? $_POST['vlConducta'] : '-';
    $vlDetalles = isset($_POST['vlDetalles']) ? $_POST['vlDetalles'] : '-';


    $riesgoConducta = !empty($_POST['riesgoConducta']) ? $_POST['riesgoConducta'] : '-';
    $riesgoDetalles = !empty($_POST['riesgoDetalles']) ? $_POST['riesgoDetalles'] : '-';
    $riesgoSituacion = !empty($_POST['riesgoSituacion']) ? $_POST['riesgoSituacion'] : '-';
    $riesgoDetalless = !empty($_POST['riesgoDetalless']) ? $_POST['riesgoDetalless'] : '-';
    $vulnerabilidad = isset($_POST['vulnerabilidad']) ? $_POST['vulnerabilidad'] : '';
    $vulnerabilidadDetalles = isset($_POST['vulnerabilidadDetalles']) ? $_POST['vulnerabilidadDetalles'] : '-';
    $factores_contextuales = isset($_POST['factores_contextuales']) ? $_POST['factores_contextuales'] : '-';
    $factores_contextuales_detalle = isset($_POST['factores_contextuales_detalle']) ? $_POST['factores_contextuales_detalle'] : '-';
    $escala_riesgo = isset($_POST['escala_riesgo']) ? $_POST['escala_riesgo'] : '-';
    $escala_riesgo_detalle = isset($_POST['escala_riesgo_detalle']) ? $_POST['escala_riesgo_detalle'] : '-';

     $observacionesEntrevistadora = isset($_POST['observacionesEntrevistadora']) ? $_POST['observacionesEntrevistadora'] : '-';



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

    $observacionesInstitucion = isset($_POST['observacionesInstitucion']) ? $_POST['observacionesInstitucion'] : '-';
    $primerosAuxiliosPsicologicos = isset($_POST['primerosAuxiliosPsicologicos']) ? $_POST['primerosAuxiliosPsicologicos'] : '-';
    //$auxiliosPsicologicos = isset($_POST['auxiliosPsicologicos']) ? $_POST['auxiliosPsicologicos'] : '-';

    $id_personal = isset($_POST['personal_input']) ? $_POST['personal_input'] : '-';









     $id_personal2 = isset($_POST['personal_input2']) ? $_POST['personal_input2'] : '-';
$nombre2 = isset($_POST['nombre2']) ? $_POST['nombre2'] : '';
$apellidoPaterno2 = isset($_POST['apellidoPaterno2']) ? $_POST['apellidoPaterno2'] : '';
$apellidoMaterno2 = isset($_POST['apellidoMaterno2']) ? $_POST['apellidoMaterno2'] : '';
$fechaNacimiento2 = isset($_POST['fechaNacimiento2']) ? $_POST['fechaNacimiento2'] : '';
$edad2 = isset($_POST['edad2']) ? $_POST['edad2'] : '';
$fecharegistro2 = isset($_POST['fecharegistro2']) ? $_POST['fecharegistro2'] : '';
$lugarNacimiento2 = isset($_POST['lugarNacimiento2']) ? $_POST['lugarNacimiento2'] : '';
$sexo2 = isset($_POST['sexo2']) ? $_POST['sexo2'] : '';
$indigena2 = isset($_POST['indigena2']) ? $_POST['indigena2'] : '';
$lenguaMaterna2 = isset($_POST['lenguaMaterna2']) ? $_POST['lenguaMaterna2'] : '';
$hablaLenguaIndigena2 = isset($_POST['hablaLenguaIndigena2']) ? $_POST['hablaLenguaIndigena2'] : '';
$lenguaIndigena2 = isset($_POST['lenguaIndigena2']) ? $_POST['lenguaIndigena2'] : '';
$telFijo2 = isset($_POST['telFijo2']) ? $_POST['telFijo2'] : '';
$telCelular2 = isset($_POST['telCelular2']) ? $_POST['telCelular2'] : '';
$email2 = isset($_POST['email2']) ? $_POST['email2'] : '';
$emailRespaldo2 = isset($_POST['emailRespaldo2']) ? $_POST['emailRespaldo2'] : '';
$telConfianza2 = isset($_POST['telConfianza2']) ? $_POST['telConfianza2'] : '';
$nombreconfianza2 = isset($_POST['nombreconfianza2']) ? $_POST['nombreconfianza2'] : '';
$parentesco2 = isset($_POST['parentesco2']) ? $_POST['parentesco2'] : '';
$comunidadLGBT2 = isset($_POST['comunidadLGBT2']) ? $_POST['comunidadLGBT2'] : '';
$tipoLgbt2 = isset($_POST['tipoLgbt2']) ? $_POST['tipoLgbt2'] : '';
$estadocivil2 = isset($_POST['estadocivil2']) ? $_POST['estadocivil2'] : '';
$calle2 = isset($_POST['calle2']) ? $_POST['calle2'] : '';
$numInterior2 = isset($_POST['numInterior2']) ? $_POST['numInterior2'] : '';
$numExterior2 = isset($_POST['numExterior2']) ? $_POST['numExterior2'] : '';
$estado2 = isset($_POST['estado2']) ? $_POST['estado2'] : '';
$cp2 = isset($_POST['cp2']) ? $_POST['cp2'] : '';
$region2 = isset($_POST['region2']) ? $_POST['region2'] : '';
$municipio2 = isset($_POST['municipio2']) ? $_POST['municipio2'] : '';
$colonia2 = isset($_POST['colonia2']) ? $_POST['colonia2'] : '';
$perteneceEtnico2 = isset($_POST['perteneceEtnico2']) ? $_POST['perteneceEtnico2'] : '';
$grupoEtnico2 = isset($_POST['grupoEtnico2']) ? $_POST['grupoEtnico2'] : '';
$padresLengua2 = isset($_POST['padresLengua2']) ? $_POST['padresLengua2'] : '';
$lenguaPadres2 = isset($_POST['lenguaPadres2']) ? $_POST['lenguaPadres2'] : '';
$aniosOaxaca2 = isset($_POST['aniosOaxaca2']) ? $_POST['aniosOaxaca2'] : '';
$asiste_escuela2 = isset($_POST['asiste_escuela2']) ? $_POST['asiste_escuela2'] : '';
$escolaridad2 = isset($_POST['escolaridad2']) ? $_POST['escolaridad2'] : '';
$escuela_actual2 = isset($_POST['escuela_actual2']) ? $_POST['escuela_actual2'] : '';
$grado_escolar2 = isset($_POST['grado_escolar2']) ? $_POST['grado_escolar2'] : '';
$sentimiento_escuela2 = isset($_POST['sentimiento_escuela2']) ? $_POST['sentimiento_escuela2'] : '';
$materias_gustan2 = isset($_POST['materias_gustan2']) ? $_POST['materias_gustan2'] : '';
$dificultades2 = isset($_POST['dificultades2']) ? $_POST['dificultades2'] : '';
$descripcion_dificultad2 = isset($_POST['descripcion_dificultad2']) ? $_POST['descripcion_dificultad2'] : '';
$relaciones_escolares2 = isset($_POST['relaciones_escolares2']) ? $_POST['relaciones_escolares2'] : '';
$decendencia2 = isset($_POST['decendencia2']) ? $_POST['decendencia2'] : '';
$numDecendencia2 = isset($_POST['numDecendencia2']) ? $_POST['numDecendencia2'] : '';
$observacionesAdicionales2 = isset($_POST['observacionesAdicionales2']) ? $_POST['observacionesAdicionales2'] : '';
$convivencia2 = isset($_POST['convivencia2']) ? $_POST['convivencia2'] : '';
$num_personas_casa2 = isset($_POST['num_personas_casa2']) ? $_POST['num_personas_casa2'] : '';
$personas_significativas2 = isset($_POST['personas_significativas2']) ? $_POST['personas_significativas2'] : '';
$sentir_casa2 = isset($_POST['sentir_casa2']) ? $_POST['sentir_casa2'] : '';
$expresion_familiar2 = isset($_POST['expresion_familiar2']) ? $_POST['expresion_familiar2'] : '';
$motivoExpresion2 = isset($_POST['motivoExpresion2']) ? $_POST['motivoExpresion2'] : '';
$amistades_cercanas2 = isset($_POST['amistades_cercanas2']) ? $_POST['amistades_cercanas2'] : '';
$descripcion_amistades2 = isset($_POST['descripcion_amistades2']) ? $_POST['descripcion_amistades2'] : '';
$actividades_libre2 = isset($_POST['actividades_libre2']) ? $_POST['actividades_libre2'] : '';
$uso_redes2 = isset($_POST['uso_redes2']) ? $_POST['uso_redes2'] : '';
$redes_cuales2 = isset($_POST['redes_cuales2']) ? $_POST['redes_cuales2'] : '';
$redes_tiempo2 = isset($_POST['redes_tiempo2']) ? $_POST['redes_tiempo2'] : '';
$seguridad_comunidad2 = isset($_POST['seguridad_comunidad2']) ? $_POST['seguridad_comunidad2'] : '';
$motivo_inseguridad2 = isset($_POST['motivo_inseguridad2']) ? $_POST['motivo_inseguridad2'] : '';
$discapacidads2 = isset($_POST['discapacidads2']) ? $_POST['discapacidads2'] : '';
$discapacidad2 = isset($_POST['discapacidad2']) ? $_POST['discapacidad2'] : '';
$apoyo_psicologico2 = isset($_POST['apoyo_psicologico2']) ? $_POST['apoyo_psicologico2'] : '';
$detalle_apoyo2 = isset($_POST['detalle_apoyo2']) ? $_POST['detalle_apoyo2'] : '';
$estado_animo2 = isset($_POST['estado_animo2']) ? $_POST['estado_animo2'] : '';
$motivo_visita2 = isset($_POST['motivo_visita2']) ? $_POST['motivo_visita2'] : '';
$descripcion_evento2 = isset($_POST['descripcion_evento2']) ? $_POST['descripcion_evento2'] : '';
$controlan_actividad2 = isset($_POST['controlan_actividad2']) ? $_POST['controlan_actividad2'] : '';
$violencia_verbal2 = isset($_POST['violencia_verbal2']) ? $_POST['violencia_verbal2'] : '';
$violencia_fisica2 = isset($_POST['violencia_fisica2']) ? $_POST['violencia_fisica2'] : '';
$violencia_sexual2 = isset($_POST['violencia_sexual2']) ? $_POST['violencia_sexual2'] : '';
$impiden_estudiar2 = isset($_POST['impiden_estudiar2']) ? $_POST['impiden_estudiar2'] : '';
$difusion_sin_permiso2 = isset($_POST['difusion_sin_permiso2']) ? $_POST['difusion_sin_permiso2'] : '';
$observacionesvi2 = isset($_POST['observacionesvi2']) ? $_POST['observacionesvi2'] : '';
$ocupacion2 = isset($_POST['ocupacion2']) ? $_POST['ocupacion2'] : '';
$tipoEmpleo2 = isset($_POST['tipoEmpleo2']) ? $_POST['tipoEmpleo2'] : '';
$DondeTrabaja2 = isset($_POST['DondeTrabaja2']) ? $_POST['DondeTrabaja2'] : '';
$fuenteIngresos2 = isset($_POST['fuenteIngresos2']) ? $_POST['fuenteIngresos2'] : '';
$sectorEconomico2 = isset($_POST['sectorEconomico2']) ? $_POST['sectorEconomico2'] : '';
$horasTrabajo2 = isset($_POST['horasTrabajo2']) ? $_POST['horasTrabajo2'] : '';
$ingresosDiarios2 = isset($_POST['ingresosDiarios2']) ? $_POST['ingresosDiarios2'] : '';
$ingresoMensual2 = isset($_POST['ingresoMensual2']) ? $_POST['ingresoMensual2'] : '';
$apoyosSociales2 = isset($_POST['apoyosSociales2']) ? $_POST['apoyosSociales2'] : '';
$recibeApoyo2 = isset($_POST['recibeApoyo2']) ? $_POST['recibeApoyo2'] : '';
$apoyoDetalle2 = isset($_POST['apoyoDetalle2']) ? $_POST['apoyoDetalle2'] : '';
$enteroGESMUJER2 = isset($_POST['enteroGESMUJER2']) ? $_POST['enteroGESMUJER2'] : '';
$descripcionSolicitud2 = isset($_POST['descripcionSolicitud2']) ? $_POST['descripcionSolicitud2'] : '';

//id_personal2, nombre2, apellidoPaterno2, apellidoMaterno2, fechaNacimiento2, edad2, fecharegistro2, lugarNacimiento2, sexo2, indigena2, lenguaMaterna2, hablaLenguaIndigena2, lenguaIndigena2, telFijo2, telCelular2, email2, emailRespaldo2, telConfianza2, nombreconfianza2, parentesco2, comunidadLGBT2, tipoLgbt2, estadocivil2, calle2, numInterior2, numExterior2, estado2, cp2, region2, municipio2, colonia2, perteneceEtnico2, grupoEtnico2, padresLengua2, lenguaPadres2, aniosOaxaca2, asiste_escuela2, escolaridad2, escuela_actual2, grado_escolar2, sentimiento_escuela2, materias_gustan2, dificultades2, descripcion_dificultad2, relaciones_escolares2, decendencia2, numDecendencia2, observacionesAdicionales2, convivencia2, num_personas_casa2, personas_significativas2, sentir_casa2, expresion_familiar2, motivoExpresion2, amistades_cercanas2, descripcion_amistades2, actividades_libre2, uso_redes2, redes_cuales2, redes_tiempo2, seguridad_comunidad2, motivo_inseguridad2, discapacidads2, discapacidad2, apoyo_psicologico2, detalle_apoyo2, estado_animo2, motivo_visita2, descripcion_evento2, controlan_actividad2, violencia_verbal2, violencia_fisica2, violencia_sexual2, impiden_estudiar2, difusion_sin_permiso2, observacionesvi2, ocupacion2, tipoEmpleo2, DondeTrabaja2, fuenteIngresos2, sectorEconomico2, horasTrabajo2, ingresosDiarios2, ingresoMensual2, apoyosSociales2, recibeApoyo2, apoyoDetalle2, enteroGESMUJER2, descripcionSolicitud2

    // Preparar la consulta SQL para insertar los datos en la tabla Usuario
    $sql = "INSERT INTO tutor (id_personal,Nombre, ApellidoPaterno, ApellidoMaterno, FechaNacimiento, Edad, FechaRegistro, Sexo, LugarNacimiento, Indigena, LenguaMaterna, HablaLenguaIndigena, LenguaIndigena, Escolaridad, estadocivil, Discapacidad,discapacidads, Decendencia, NumDecendencia, Calle, NumInterior, NumExterior, CP, Estado, Municipio, Colonia, Region, CallePC, NumInteriorPC, NumExteriorPC, CPPC, EstadoPC, MunicipioPC, ColoniaPC, RegionPC, TelCelular, TelFijo, TelConfianza,nombreconfianza,perentesco,tipoLgbt, comunidadLGBT, perteneceEtnico, grupoEtnico,padresLengua, lenguaPadres,aniosOaxaca,observacionesAdicionales, Email, EmailRespaldo, CURP, INE, RutaCURP, RutaINE, RutaComDomicilio, Ocupacion,tipoEmpleo, FuenteIngresos,  ingresoMensual, apoyosSociales, recibeApoyo, apoyoDetalle,  totalIngresosFamiliares, gastoAlimentacion, gastoVivienda, gastoServicios, gastoTransporte, gastoEducacion, gastoSalud, gastoDeudas, gastoOtros,           SectorEconomico, HorasTrabajo, IngresosDiarios, TipoEnergia, Agua, MaterialPiso, numCuartos, numHabitacionesDormir, numPersonasHogar,enteroGESMUJER, electricidad, internet, gas, television, telefono,bano,  TipoServicioAgua, MaterialVivienda,  TipoBano, PersonasCasa, PersonasDormitorio, TipoVivienda, descripcionSolicitud, vpsConducta, vpsDetalles,          vfConducta, vfDetalles, vsConducta, vsDetalles, acosoConducta, acosoDetalles, veConducta, veDetalles, vvConducta, vvDetalles, voConducta, voDetalles, vpConducta, vpDetalles, vcConducta, vcDetalles, vlConducta, vlDetalles,         riesgoConducta, riesgoDetalles, riesgoSituacion, riesgoDetalless, vulnerabilidad, vulnerabilidadDetalles, factores_contextuales, factores_contextuales_detalle, escala_riesgo, escala_riesgo_detalle, observacionesEntrevistadora    , ParejaTrabaja, DondeTrabaja, NombreAgresor, SituacionUsuaria, RelacionAgresora, TipoRelacion, ViveConPareja, TiempoViviendoPareja, chantajeado, comochantajeado, ParejaCelosa, UtilizaHijos, Consumidora, Agresion, IncrementoAgresiones, AtencionMedica, AmenazadaConArmas, IntentoAhorcar, SienteTemorVida, PoseeArmaFuego, Denuncia, TipoDenuncia, IngresadoPrision, ValoracionRiesgo, Canalizacion, CanalizacionExterna, CanalizacionInterna, AuxiliosPsicologicos, observacionesInstitucion, primerosAuxiliosPsicologicos, id_personal2, nombre2, apellidoPaterno2, apellidoMaterno2, fechaNacimiento2, edad2, fecharegistro2, lugarNacimiento2, sexo2, indigena2, lenguaMaterna2, hablaLenguaIndigena2, lenguaIndigena2, telFijo2, telCelular2, email2, emailRespaldo2, telConfianza2, nombreconfianza2, parentesco2, comunidadLGBT2, tipoLgbt2, estadocivil2, calle2, numInterior2, numExterior2, estado2, cp2, region2, municipio2, colonia2, perteneceEtnico2, grupoEtnico2, padresLengua2, lenguaPadres2, aniosOaxaca2, asiste_escuela2, escolaridad2, escuela_actual2, grado_escolar2, sentimiento_escuela2, materias_gustan2, dificultades2, descripcion_dificultad2, relaciones_escolares2, decendencia2, numDecendencia2, observacionesAdicionales2, convivencia2, num_personas_casa2, personas_significativas2, sentir_casa2, expresion_familiar2, motivoExpresion2, amistades_cercanas2, descripcion_amistades2, actividades_libre2, uso_redes2, redes_cuales2, redes_tiempo2, seguridad_comunidad2, motivo_inseguridad2, discapacidads2, discapacidad2, apoyo_psicologico2, detalle_apoyo2, estado_animo2, motivo_visita2, descripcion_evento2, controlan_actividad2, violencia_verbal2, violencia_fisica2, violencia_sexual2, impiden_estudiar2, difusion_sin_permiso2, observacionesvi2, ocupacion2, tipoEmpleo2, DondeTrabaja2, fuenteIngresos2, sectorEconomico2, horasTrabajo2, ingresosDiarios2, ingresoMensual2, apoyosSociales2, recibeApoyo2, apoyoDetalle2, enteroGESMUJER2, descripcionSolicitud2) 
            VALUES ('$id_personal','$nombre', '$apellidoPaterno', '$apellidoMaterno', '$fechaNacimiento', '$edad', '$fecharegistro', '$sexo', '$lugarNacimiento', '$indigena', '$lenguaMaterna', '$hablaLenguaIndigena', '$lenguaIndigena', '$escolaridad', '$estadocivil', '$discapacidad', '$discapacidads', '$decendencia', '$numDecendencia', '$calle', '$numInterior','$numExterior','$cp', '$estado', '$municipio', '$colonia', '$region', '$callePC', '$numInteriorPC', '$numExteriorPC', '$cppc', '$estadoPC', '$municipioPC', '$coloniaPC', '$regionPC', '$telCelular', '$telFijo', '$telConfianza','$nombreconfianza', '$parentesco', '$tipoLgbt',  '$comunidadLGBT', '$grupoEtnico', '$perteneceEtnico', '$padresLengua', '$lenguaPadres', '$aniosOaxaca', '$observacionesAdicionales', '$email', '$emailRespaldo', '$curp', '$ine', '$rutaCURP', '$rutaINE', '$rutaComDomicilio', '$ocupacion', '$tipoEmpleo', '$fuenteIngresos', '$ingresoMensual' , '$apoyosSociales', '$recibeApoyo', '$apoyoDetalle', '$totalIngresosFamiliares', '$gastoAlimentacion', '$gastoVivienda', '$gastoServicios', '$gastoTransporte', '$gastoEducacion', '$gastoSalud', '$gastoDeudas', '$gastoOtros', '$sectorEconomico', '$horasTrabajo', '$ingresosDiarios', '$tipoEnergia', '$agua', '$materialPiso', '$numCuartos', '$numHabitacionesDormir', '$numPersonasHogar', '$enteroGESMUJER', '$electricidad', '$internet', '$gas', '$television', '$telefono', '$bano', '$tipoServicioAgua', '$materialVivienda', '$TipoBano', '$personasCasa', '$personasDormitorio', '$tipoVivienda', '$descripcionSolicitud', '$vpsConducta', '$vpsDetalles', '$vsConducta', '$vsDetalles', '$acosoConducta', '$acosoDetalles', '$veConducta', '$veDetalles', '$vvConducta', '$vvDetalles', '$voConducta', '$voDetalles', '$vpConducta', '$vpDetalles', '$vcConducta', '$vcDetalles', '$vlConducta', '$vlDetalles',  '$riesgoConducta', '$riesgoDetalles', '$riesgoSituacion', '$riesgoDetalless', '$vulnerabilidad', '$vulnerabilidadDetalles', '$factores_contextuales', '$factores_contextuales_detalle', '$escala_riesgo', '$escala_riesgo_detalle', '$observacionesEntrevistadora', '$vfConducta', '$vfDetalles', '$parejaTrabaja', '$DondeTrabaja', '$NombreAgresor', '$situacionUsuaria', '$relacionAgresora', '$tipoRelacion', '$viveConPareja', '$tiempoViviendoPareja', '$chantajeado', '$comochantajeado', '$parejaCelosa', '$utilizaHijos', '$consumidora', '$agresion', '$incrementoAgresiones', '$atencionMedica', '$amenazadaConArmas', '$intentoAhorcar', '$sienteTemorVida', '$poseeArmaFuego', '$denuncia', '$tipoDenuncia', '$ingresadoPrision', '$valoracionRiesgo', '$canalizacion', '$canalizacionExterna', '$canalizacionInterna', '$auxiliosPsicologicos', '$observacionesInstitucion', '$primerosAuxiliosPsicologicos', '$id_personal2', '$nombre2', '$apellidoPaterno2', '$apellidoMaterno2', '$fechaNacimiento2', '$edad2', '$fecharegistro2', '$lugarNacimiento2', '$sexo2', '$indigena2', '$lenguaMaterna2', '$hablaLenguaIndigena2', '$lenguaIndigena2', '$telFijo2', '$telCelular2', '$email2', '$emailRespaldo2', '$telConfianza2', '$nombreconfianza2', '$parentesco2', '$comunidadLGBT2', '$tipoLgbt2', '$estadocivil2', '$calle2', '$numInterior2', '$numExterior2', '$estado2', '$cp2', '$region2', '$municipio2', '$colonia2', '$perteneceEtnico2', '$grupoEtnico2', '$padresLengua2', '$lenguaPadres2', '$aniosOaxaca2', '$asiste_escuela2', '$escolaridad2', '$escuela_actual2', '$grado_escolar2', '$sentimiento_escuela2', '$materias_gustan2', '$dificultades2', '$descripcion_dificultad2', '$relaciones_escolares2', '$decendencia2', '$numDecendencia2', '$observacionesAdicionales2', '$convivencia2', '$num_personas_casa2', '$personas_significativas2', '$sentir_casa2', '$expresion_familiar2', '$motivoExpresion2', '$amistades_cercanas2', '$descripcion_amistades2', '$actividades_libre2', '$uso_redes2', '$redes_cuales2', '$redes_tiempo2', '$seguridad_comunidad2', '$motivo_inseguridad2', '$discapacidads2', '$discapacidad2', '$apoyo_psicologico2', '$detalle_apoyo2', '$estado_animo2', '$motivo_visita2', '$descripcion_evento2', '$controlan_actividad2', '$violencia_verbal2', '$violencia_fisica2', '$violencia_sexual2', '$impiden_estudiar2', '$difusion_sin_permiso2', '$observacionesvi2', '$ocupacion2', '$tipoEmpleo2', '$DondeTrabaja2', '$fuenteIngresos2', '$sectorEconomico2', '$horasTrabajo2', '$ingresosDiarios2', '$ingresoMensual2', '$apoyosSociales2', '$recibeApoyo2', '$apoyoDetalle2', '$enteroGESMUJER2', '$descripcionSolicitud2')";

// Preparar y ejecutar la consulta SQL
try {
    $stmt = $conn->prepare($sql);
    $stmt->execute();



$userId = $conn->lastInsertId();

$sql_last_user_id = "SELECT MAX(id) AS ultimo_id_usuario FROM tutor";
$result_last_user_id = $conn->query($sql_last_user_id);

if ($result_last_user_id) {
    $row = $result_last_user_id->fetch(PDO::FETCH_ASSOC);
    $ultimo_id_usuario = $row["ultimo_id_usuario"];
} else {
    echo "Error al obtener el último ID de usuario: " . $conn->errorInfo()[2];
    exit();
}

// Verificar si se han enviado datos del formulario de tipos de violencia
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id_tipo_violencia"])) {
    // Verificar si se han seleccionado tipos de violencia
    $id_tipos_violencia = $_POST["id_tipo_violencia"];
    
    if (empty($id_tipos_violencia)) {
        // Si no se seleccionó ningún tipo de violencia, mostrar un mensaje de error
        echo "Debes seleccionar al menos un tipo de violencia.";
    } else {
        // Procesar el formulario
        try {
            // Preparar la consulta para insertar cada tipo de violencia seleccionado
            $query = "INSERT INTO tutor_Tipos_Violencia (ID_tutor, ID_Tipo_Violencia) VALUES (?, ?)";
            $stmt = $conn->prepare($query);
            
            // Iterar sobre cada tipo de violencia seleccionado y ejecutar la consulta
            foreach ($id_tipos_violencia as $id_tipo_violencia) {
                $stmt->execute([$ultimo_id_usuario, $id_tipo_violencia]);
            }
            
            // echo '<script>alert("Formulario enviado correctamente");</script>';
            echo '<script>window.close();</script>';
        } catch(PDOException $e) {
            // Manejar errores de manera adecuada
            echo "Error al insertar el registro: " . $e->getMessage();
        }
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Si se envió el formulario pero no se recibieron datos de tipos de violencia, mostrar una alerta
    echo "<script>alert('No se han recibido datos de tipos de violencia.');</script>";
}


// Insertar hijos si hay alguno
if(isset($_POST['hijos']) && is_array($_POST['hijos'])) {
    $sqlHijos = "INSERT INTO hijos_tutor 
        (ID_tutor, Nombre, ApellidoPaterno, ApellidoMaterno, FechaNacimiento, Sexo, Escolaridad, Condicion)
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



// Insertar hijos si hay alguno
if(isset($_POST['hijos2']) && is_array($_POST['hijos2'])) {
    $sqlHijos = "INSERT INTO hijos_adolecente
        (ID_tutor, Nombre, ApellidoPaterno, ApellidoMaterno, FechaNacimiento, Sexo, Escolaridad, Condicion)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmtHijo = $conn->prepare($sqlHijos);

    foreach($_POST['hijos2'] as $hijo) {
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






// Datos a insertar (puedes recibirlos de un formulario POST)
$id_tutor   = $conn->lastInsertId();
$id_personal  = $_POST['id_personal'];
$observaciones = "SIN DATOS";

try {
    $sql = "INSERT INTO atencionestus (id_tutor, id_personal, observaciones) 
            VALUES (:id_tutor, :id_personal, :observaciones)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':id_tutor', $id_usuario, PDO::PARAM_INT);
    $stmt->bindParam(':id_personal', $id_personal2, PDO::PARAM_INT);
    $stmt->bindParam(':observaciones', $observaciones, PDO::PARAM_STR);

    $stmt->execute();

    echo "Registro de atención creado correctamente. ID: " . $conn->lastInsertId();
} catch(PDOException $e) {
    echo "Error al registrar atención: " . $e->getMessage();
}

   


// Datos a insertar (puedes recibirlos de un formulario POST)
$id_tutor   = $conn->lastInsertId();
$id_personal2  = $_POST['id_personal2'];
$observaciones = "SIN DATOS";

try {
    $sql = "INSERT INTO atencionestusadol (id_tutor, id_personal, observaciones) 
            VALUES (:id_tutor, :id_personal2, :observaciones)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':id_tutor', $id_usuario, PDO::PARAM_INT);
    $stmt->bindParam(':id_personal2', $id_personal2, PDO::PARAM_INT);
    $stmt->bindParam(':observaciones', $observaciones, PDO::PARAM_STR);

    $stmt->execute();

    echo "Registro de atención creado correctamente. ID: " . $conn->lastInsertId();
} catch(PDOException $e) {
    echo "Error al registrar atención: " . $e->getMessage();
}






     header("Location: ../pages/ver-usuario-adolecente.php?status=success");
exit();
} catch (PDOException $e) {
    // Registro de errores en un archivo de registro
    
        header("Location: ../pages/ver-usuario-adolecente.php?status=error&msg=" . urlencode($e->getMessage()));
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
        <h2>Registro de Usuaria </h2>
        <p class="lead"></p>
    </div>







    
    <div class="row g-5">
    <div class="col-xxl-12 col-xxl-12">
        <h4 class="mb-3">Datos Generales del Tutor</h4>
        <form id="miFormulario" class="needs-validation" action="register-tutor-adolecente.php" method="POST" enctype="multipart/form-data"  novalidate >
    <div class="row g-3">
            


<div class="col-sm-12 position-relative">
    <label for="id_personal" class="form-label">Especialista</label>
    <input type="text" id="personal_input" name="personal_input" class="form-control" placeholder="Escribe el nombre del especialista...">
    <input type="hidden" id="id_personal" name="id_personal">
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
        <input type="text" class="form-control" id="firstName" name="nombre" placeholder="" required  oninput="validateInput(this)">
    <div class="invalid-feedback">Se requiere un nombre válido.</div>
    <div class="valid-feedback">Looks good!</div>
    </div>

    <div class="col-sm-6">
        <label for="lastName" class="form-label">Apellido Paterno:</label>
        <input type="text" class="form-control" id="lastNames" name="apellidoPaterno" placeholder="" required>
        <div class="invalid-feedback">Se requiere un apellido paterno válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="secondLastName" class="form-label">Apellido Materno:</label>
        <input type="text" class="form-control" id="secondLastNames" name="apellidoMaterno" placeholder="" required>
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
    <label for="lugarNacimiento" class="form-label">Lugar de Nacimiento</label>
    <input type="text" class="form-control" id="lugarNacimiento" name="lugarNacimiento" placeholder="Escribe o selecciona un Municipio ..." autocomplete="off">
    <div class="sugerencias" id="sug_lugarNacimiento" style="border:1px solid #ccc; max-height:150px; overflow-y:auto;"></div>
    <input type="hidden" id="selected_lugar_id" name="selected_lugar_id">
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
        <option selected disabled value="">Selecciona una opción...</option>
        <option value="MASCULINO">MASCULINO</option>
        <option value="FEMENINO">FEMENINO</option>
        <option value="OTRO">OTRO</option>
        </select>
        <div class="invalid-feedback">Se requiere una selección válida.</div>
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





 <h4>Datos de Contacto</h4>
            <hr class="my-4">

             <div class="col-sm-6">
        <label for="telFijo" class="form-label">Teléfono fijo</label>
        <input type="number" class="form-control" id="telFijo" name="telFijo" placeholder="" >
        <div class="invalid-feedback">Se requiere un número de teléfono fijo válido.</div>
    </div>
    

    <div class="col-sm-6">
        <label for="telCelular" class="form-label">Teléfono celular</label>
        <input type="number" class="form-control" id="telCelular" name="telCelular" placeholder="">
        <div class="invalid-feedback">Se requiere un número de teléfono celular válido.</div>
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


   
    <div class="col-sm-6">
        <label for="telConfianza" class="form-label">Teléfono de confianza</label>
        <input type="number" class="form-control" id="telConfianza" name="telConfianza" placeholder="">
        <div class="invalid-feedback">Se requiere un número de teléfono de confianza válido.</div>
    </div>

   

<div class="col-sm-6">
        <label for="telConfianza" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="firstname" name="nombreconfianza" placeholder="">
        <div class="invalid-feedback">Se requiere un número de teléfono de confianza válido.</div>
    </div>

    
<div class="col-sm-6">
    <label for="parentesco" class="form-label">Parentesco</label>
    <select class="form-select" id="parentesco" name="parentesco" >
        <option value="">-- Selecciona un parentesco --</option>
        <option value="padre">Padre</option>
        <option value="madre">Madre</option>
        <option value="hermano">Hermano</option>
        <option value="hermana">Hermana</option>
        <option value="tio">Tío</option>
        <option value="tia">Tía</option>
        <option value="abuelo">Abuelo</option>
        <option value="abuela">Abuela</option>
        <option value="amigo">Amigo/a</option>
        <option value="otro">Otro</option>
    </select>
    <div class="invalid-feedback">
        Se requiere seleccionar un parentesco válido.
    </div>
</div>


 <h4>Datos de Orientacion Social</h4>
            <hr class="my-4">

           <div class="col-sm-6">
  <label class="form-label">¿Pertenece a una comunidad LGBT+?</label>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="comunidadLGBT" id="lgbtSi" value="SI" onclick="showLgbtSelect()">
    <label class="form-check-label" for="lgbtSi">Sí</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="comunidadLGBT" id="lgbtNo" value="NO" onclick="hideLgbtSelect()">
    <label class="form-check-label" for="lgbtNo">No</label>
  </div>
</div>

<div class="col-sm-6" id="lgbtSelectContainer" style="display: none;">
  <label for="tipoLgbt" class="form-label">¿A cuál?</label>
  <select class="form-select" id="tipoLgbt" name="tipoLgbt">
    <option selected disabled value="">Seleccionar opción...</option>
    <option value="Lesbiana">Lesbiana</option>
    <option value="Gay">Gay</option>
    <option value="Bisexual">Bisexual</option>
    <option value="Transgénero">Transgénero</option>
    <option value="Queer">Queer</option>
    <option value="Intersex">Intersex</option>
    <option value="Asexual">Asexual</option>
    <option value="Otro">Otro</option>
  </select>
</div>

<script>
  function showLgbtSelect() {
    document.getElementById('lgbtSelectContainer').style.display = 'block';
  }

  function hideLgbtSelect() {
    document.getElementById('lgbtSelectContainer').style.display = 'none';
    document.getElementById('tipoLgbt').value = ''; // Limpia selección
  }
</script>




<h4>Estado Civil</h4>
            <hr class="my-4">

   <div class="col-sm-6">
  <label for="estadoCivil" class="form-label">ESTADO CIVIL</label>
  <select class="form-select" id="estadoCivil" name="estadocivil" >
    <option selected disabled value="">SELECCIONAR ESTADO CIVIL...</option>
    <option value="SOLTERO">SOLTERO/A</option>
    <option value="CASADO">CASADO/A</option>
    <option value="DIVORCIADO">DIVORCIADO/A</option>
    <option value="VIUDO">VIUDO/A</option>
    <option value="UNION_LIBRE">UNIÓN LIBRE</option>
    <option value="SEPARADO">SEPARADO/A</option>
    <option value="COMPROMETIDO">COMPROMETIDO/A</option>
    <option value="CONCUBINATO">CONCUBINATO</option>
    <option value="PAREJA_DE_HECHO">PAREJA DE HECHO</option>
    <option value="ANULADO">MATRIMONIO ANULADO</option>
    <option value="OTRO">OTRO</option>
  </select>
  <div class="invalid-feedback">
    SE REQUIERE SELECCIONAR UN ESTADO CIVIL.
  </div>
</div>






        <h4>Residencia y Origen</h4>
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
   


<div class="col-sm-6">
  <label class="form-label">¿PERTENECE A UN GRUPO ÉTNICO?</label>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="perteneceEtnico" id="etnicoSi" value="SI" onclick="showEtnicoSelect()">
    <label class="form-check-label" for="etnicoSi">SÍ</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="perteneceEtnico" id="etnicoNo" value="NO" onclick="hideEtnicoSelect()">
    <label class="form-check-label" for="etnicoNo">NO</label>
  </div>
</div>

<div class="col-sm-6" id="etnicoSelectContainer" style="display: none;">
  <label for="grupoEtnico" class="form-label">¿A CUÁL?</label>
  <select class="form-select" id="grupoEtnico" name="grupoEtnico">
    <option selected disabled value="">SELECCIONAR GRUPO ÉTNICO...</option>
    <option value="ZAPOTECO">ZAPOTECO</option>
    <option value="MIXTECO">MIXTECO</option>
    <option value="MAZATECO">MAZATECO</option>
    <option value="CHINANTECO">CHINANTECO</option>
    <option value="MIXE">MIXE</option>
    <option value="TRIQUI">TRIQUI</option>
    <option value="CHATINO">CHATINO</option>
    <option value="AMUZGO">AMUZGO</option>
    <option value="CUICATECO">CUICATECO</option>
    <option value="HUAVE">HUAVE</option>
    <option value="CHONTAL">CHONTAL</option>
    <option value="IXCATECO">IXCATECO</option>
    <option value="ZOQUE">ZOQUE</option>
    <option value="NÁHUATL">NÁHUATL</option>
    <option value="OTRO">OTRO</option>
  </select>
</div>

<script>
  function showEtnicoSelect() {
    document.getElementById('etnicoSelectContainer').style.display = 'block';
  }

  function hideEtnicoSelect() {
    document.getElementById('etnicoSelectContainer').style.display = 'none';
    document.getElementById('grupoEtnico').value = ''; // Limpia la selección
  }
</script>


<div class="col-sm-6">
  <label class="form-label">¿SU PADRE O MADRE HABLA ALGUNA LENGUA INDÍGENA?</label>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="padresLengua" id="padresLenguaSi" value="SI" onclick="showPadresLenguaSelect()">
    <label class="form-check-label" for="padresLenguaSi">SÍ</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="padresLengua" id="padresLenguaNo" value="NO" onclick="hidePadresLenguaSelect()">
    <label class="form-check-label" for="padresLenguaNo">NO</label>
  </div>
</div>

<div class="col-sm-6" id="padresLenguaSelectContainer" style="display: none;">
  <label for="lenguaPadres" class="form-label">¿CUÁL?</label>
  <select class="form-select" id="lenguaPadres" name="lenguaPadres">
    <option selected disabled value="">SELECCIONAR LENGUA...</option>
    <option value="ZAPOTECO">ZAPOTECO</option>
    <option value="MIXTECO">MIXTECO</option>
    <option value="MAZATECO">MAZATECO</option>
    <option value="CHINANTECO">CHINANTECO</option>
    <option value="MIXE">MIXE</option>
    <option value="TRIQUI">TRIQUI</option>
    <option value="CHATINO">CHATINO</option>
    <option value="AMUZGO">AMUZGO</option>
    <option value="CUICATECO">CUICATECO</option>
    <option value="HUAVE">HUAVE</option>
    <option value="CHONTAL">CHONTAL</option>
    <option value="IXCATECO">IXCATECO</option>
    <option value="ZOQUE">ZOQUE</option>
    <option value="NÁHUATL">NÁHUATL</option>
    <option value="OTRO">OTRO</option>
  </select>
</div>

<script>
  function showPadresLenguaSelect() {
    document.getElementById('padresLenguaSelectContainer').style.display = 'block';
  }

  function hidePadresLenguaSelect() {
    document.getElementById('padresLenguaSelectContainer').style.display = 'none';
    document.getElementById('lenguaPadres').value = ''; // Limpia la selección
  }
</script>


<div class="col-sm-6">
  <label for="aniosOaxaca" class="form-label">AÑOS DE VIVIR EN OAXACA</label>
  <input type="number" class="form-control" id="aniosOaxaca" name="aniosOaxaca" min="0" placeholder="Ingrese el número de años" >
  <div class="invalid-feedback">Por favor, ingrese un número válido de años.</div>
</div>


 <div class="col-sm-6">
    <label class="form-label">¿TIENE HIJOS E HIJAS?</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="decendencia" id="hijos1" value="SI" onclick="showHijosInput()">
        <label class="form-check-label" for="hijos1">SI</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="decendencia" id="hijos2" value="NO" onclick="hideHijosInput()">
        <label class="form-check-label" for="hijos2">NO</label>
    </div>
</div>

<div class="col-sm-6" id="HijosInput" style="display: none;">
    <label for="numDecendencia" class="form-label">¿CUANTOS?</label>
    <input type="number" min="1" max="15" class="form-control mb-3" id="numDecendencia" name="numDecendencia" placeholder="Ingrese un número" oninput="generarCamposHijos()">
    <div class="invalid-feedback">Se requiere un número válido.</div>

    
</div>
<!-- SAQUE ESTE DIVE QUE CONTIENE EL FORMULARIO DEL OTRO VIV AVER SI SI FUNCIONA CAPTANDO LOS DATOS O NO -->
<div id="formularios_hijos"></div>
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

 <div class="col-sm-6">
        <label for="escolaridad" class="form-label">NIVEL DE ESTUDIOS</label>
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
  <label class="form-label">¿PRESENTA ALGUNA DISCAPACIDAD?</label>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="discapacidads" id="discapacidadSi" value="SI" onclick="showDiscapacidadSelect()">
    <label class="form-check-label" for="discapacidadSi">SÍ</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="discapacidads" id="discapacidadNo" value="NO" onclick="hideDiscapacidadSelect()">
    <label class="form-check-label" for="discapacidadNo">NO</label>
  </div>
</div>

<div class="col-sm-6" id="discapacidadSelectContainer" style="display: none;">
  <label for="tipoDiscapacidad" class="form-label">¿CUÁL?</label>
  <select class="form-select" id="tipoDiscapacidad" name="discapacidad">
    <option selected disabled value="">SELECCIONAR TIPO...</option>
    <option value="MOTRIZ">MOTRIZ</option>
    <option value="VISUAL">VISUAL</option>
    <option value="AUDITIVA">AUDITIVA</option>
    <option value="INTELECTUAL">INTELECTUAL</option>
    <option value="DEL LENGUAJE">DEL LENGUAJE</option>
    <option value="PSICOSOCIAL">PSICOSOCIAL</option>
    <option value="MULTIPLE">MÚLTIPLE</option>
    <option value="OTRA">OTRA</option>
  </select>
</div>

<script>
  function showDiscapacidadSelect() {
    document.getElementById('discapacidadSelectContainer').style.display = 'block';
  }

  function hideDiscapacidadSelect() {
    document.getElementById('discapacidadSelectContainer').style.display = 'none';
    document.getElementById('tipoDiscapacidad').value = ''; // Limpia selección
  }
</script>


    
<div class="col-sm-12 mt-3">
  <label for="observacionesAdicionales" class="form-label">OBSERVACIONES ADICIONALES</label>
  <textarea class="form-control" id="observacionesAdicionales" name="observacionesAdicionales" rows="3" placeholder="Escriba cualquier observación adicional..."></textarea>
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

<div class="col-sm-6 mt-3">
  <label for="tipoEmpleo" class="form-label">Tipo de Empleo</label>
  <select class="form-select" id="tipoEmpleo" name="tipoEmpleo" >
    <option value="">Selecciona una opcion</option>
    <option value="FORMAL">FORMAL</option>
    <option value="INFORMAL">INFORMAL</option>
    <option value="DESEMPLEADA">DESEMPLEADA</option>
  </select>
  <div class="invalid-feedback">Por favor, selecciona el tipo de empleo.</div>
</div>

<div class="col-sm-6" id="DondeTrabaja">
        <label for="DondeTrabaja" class="form-label">¿Dónde trabaja?</label>
        <input type="text" class="form-control" id="Trabaja" name="DondeTrabaja">
        <div class="invalid-feedback">Se requiere un apellido válido.</div>
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
    >
  <div class="invalid-feedback">Por favor, ingresa un monto válido.</div>
</div>




<div class="col-sm-6 mt-3">
  <label for="apoyosSociales" class="form-label">Otros Ingresos</label>
  <select class="form-select" id="apoyosSociales" name="apoyosSociales">
    <option value="">Selecciona una Opcion</option>
    <option value="PROSPERA">PROSPERA</option>
    <option value="PENSION_ADULTO_MAYOR">PENSIÓN ADULTO MAYOR</option>
    <option value="PENSION_DISCAPACIDAD">PENSIÓN DISCAPACIDAD</option>
     <option value="SUBSIDIO">SUBSIDIO</option>
    <option value="REMESAS">REMESAS</option>
    <option value="NEGOCIO_PROPIO">NEGOCIO PROPIO</option>
    <option value="OTRO">OTRO</option>
  </select>
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
    <option value="">Selecciona una Opcion</option>
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
</script>



<div class="col-sm-6 mt-3">
  <label for="totalIngresosFamiliares" class="form-label">Total de ingresos familiares mensuales (MXN)</label>
  <input type="number" class="form-control" id="totalIngresosFamiliares" name="totalIngresosFamiliares" placeholder="0" min="0" step="100">
  <div class="invalid-feedback">Por favor ingresa un monto válido.</div>
</div>






<div class="col-6 mt-3">
  <label class="form-label">Gastos fijos mensuales aproximados (MXN)</label>
</div>

<div class="col-sm-6 mt-2">
  <label for="gastoAlimentacion" class="form-label">Alimentación</label>
  <input type="number" class="form-control" id="gastoAlimentacion" name="gastoAlimentacion" placeholder="0" min="0" step="50">
</div>

<div class="col-sm-6 mt-2">
  <label for="gastoVivienda" class="form-label">Vivienda</label>
  <input type="number" class="form-control" id="gastoVivienda" name="gastoVivienda" placeholder="0" min="0" step="50">
</div>

<div class="col-sm-6 mt-2">
  <label for="gastoServicios" class="form-label">Servicios (agua, luz, internet, etc.)</label>
  <input type="number" class="form-control" id="gastoServicios" name="gastoServicios" placeholder="0" min="0" step="50">
</div>

<div class="col-sm-6 mt-2">
  <label for="gastoTransporte" class="form-label">Transporte</label>
  <input type="number" class="form-control" id="gastoTransporte" name="gastoTransporte" placeholder="0" min="0" step="50">
</div>

<div class="col-sm-6 mt-2">
  <label for="gastoEducacion" class="form-label">Educación</label>
  <input type="number" class="form-control" id="gastoEducacion" name="gastoEducacion" placeholder="0" min="0" step="50">
</div>

<div class="col-sm-6 mt-2">
  <label for="gastoSalud" class="form-label">Salud</label>
  <input type="number" class="form-control" id="gastoSalud" name="gastoSalud" placeholder="0" min="0" step="50">
</div>

<div class="col-sm-6 mt-2">
  <label for="gastoDeudas" class="form-label">Deudas</label>
  <input type="number" class="form-control" id="gastoDeudas" name="gastoDeudas" placeholder="0" min="0" step="50">
</div>

<div class="col-sm-6 mt-2">
  <label for="gastoOtros" class="form-label">Otros</label>
  <input type="number" class="form-control" id="gastoOtros" name="gastoOtros" placeholder="0" min="0" step="50">
</div>














    

            <h4>Datos de vivienda </h4>
            <hr class="my-4">



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

<div class="col-sm-6 mt-2">
  <label for="numCuartos" class="form-label">Número total de cuartos</label>
  <input type="number" class="form-control" id="numCuartos" name="numCuartos" placeholder="0" min="0" step="1">
</div>

<div class="col-sm-6 mt-2">
  <label for="numHabitacionesDormir" class="form-label">Número de habitaciones para dormir</label>
  <input type="number" class="form-control" id="numHabitacionesDormir" name="numHabitacionesDormir" placeholder="0" min="0" step="1">
</div>

<div class="col-sm-6 mt-2">
  <label for="numPersonasHogar" class="form-label">Número de personas que viven en el hogar</label>
  <input type="number" class="form-control" id="numPersonasHogar" name="numPersonasHogar" placeholder="0" min="0" step="1">
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




<div class="row mt-3">
  <label class="form-label">Servicios con los que cuenta la vivienda:</label>

  <div class="col-sm-6 mt-2">
    <label class="form-label">Agua:</label>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="agua" id="aguaSi" value="SI">
      <label class="form-check-label" for="aguaSi">Sí</label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="agua" id="aguaNo" value="NO">
      <label class="form-check-label" for="aguaNo">No</label>
    </div>
  </div>

  <div class="col-sm-6 mt-2">
    <label class="form-label">Electricidad:</label>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="electricidad" id="electricidadSi" value="SI">
      <label class="form-check-label" for="electricidadSi">Sí</label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="electricidad" id="electricidadNo" value="NO">
      <label class="form-check-label" for="electricidadNo">No</label>
    </div>
  </div>

  <div class="col-sm-6 mt-2">
    <label class="form-label">Internet:</label>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="internet" id="internetSi" value="SI">
      <label class="form-check-label" for="internetSi">Sí</label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="internet" id="internetNo" value="NO">
      <label class="form-check-label" for="internetNo">No</label>
    </div>
  </div>

  <div class="col-sm-6 mt-2">
    <label class="form-label">Gas:</label>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="gas" id="gasSi" value="SI">
      <label class="form-check-label" for="gasSi">Sí</label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="gas" id="gasNo" value="NO">
      <label class="form-check-label" for="gasNo">No</label>
    </div>
  </div>

  <div class="col-sm-6 mt-2">
    <label class="form-label">Televisión por cable o satélite:</label>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="television" id="televisionSi" value="SI">
      <label class="form-check-label" for="televisionSi">Sí</label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="television" id="televisionNo" value="NO">
      <label class="form-check-label" for="televisionNo">No</label>
    </div>
  </div>

  <div class="col-sm-6 mt-2">
    <label class="form-label">Teléfono fijo:</label>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="telefono" id="telefonoSi" value="SI">
      <label class="form-check-label" for="telefonoSi">Sí</label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="telefono" id="telefonoNo" value="NO">
      <label class="form-check-label" for="telefonoNo">No</label>
    </div>
  </div>

  <div class="col-sm-6 mt-2">
    <label class="form-label">Baño:</label>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="bano" id="banoSi" value="SI">
      <label class="form-check-label" for="banoSi">Sí</label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="bano" id="banoNo" value="NO">
      <label class="form-check-label" for="banoNo">No</label>
    </div>
  </div>
</div>

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
        <label for="TipoBano" class="form-label">Tipo de instalación sanitaria</label>
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
</div>














   
    




   

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
  <textarea class="form-control" id="descripcionSolicitud" name="descripcionSolicitud" rows="4" placeholder="Describa brevemente el motivo de su solicitud..."></textarea>
</div>










 <h4>Formulario Integral de Identificacion de Nivel de Riesgo</h4>
        <hr class="my-4">



<!-- Violencia psicológica -->
<div class="col-12 mt-3">
 

  
  <h5>Violencia Psicológica</h5>

  <!-- Opciones (solo una puede seleccionarse) -->
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

  <!-- Opción 'Otra' -->
  
  <div class="mt-3">
    <label for="vpsDetalles" class="form-label">Detalles adicionales</label>
    <textarea class="form-control" id="vpsDetalles" name="vpsDetalles" rows="3" placeholder="Describa más (fechas, frecuencia, contexto...)"></textarea>
  </div>



  <!-- Nota de seguridad (opcional) -->
  <div class="mt-2 text-muted small">
    Si la persona está en peligro inmediato, contactar a las autoridades locales o servicios de emergencia. 
  </div>
</div>




<h5>Violencia Fisica</h5>
            


            

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

  <div class="mt-3">
    <label for="vfDetalles" class="form-label">Detalles adicionales</label>
    <textarea class="form-control" id="vfDetalles" name="vfDetalles" rows="3" placeholder="Describa más (frecuencia, tipo de lesiones, fechas...)"></textarea>
  </div>




<h5>Violencia Sexual</h5>
           

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

  <div class="mt-3">
    <label for="vsDetalles" class="form-label">Detalles adicionales</label>
    <textarea class="form-control" id="vsDetalles" name="vsDetalles" rows="3" placeholder="Describa más (frecuencia, contexto, amenazas, etc.)"></textarea>
  </div>

 



  <h5>Acoso y/o Hostigamiento Sexual</h5>

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

  <div class="mt-3">
    <label for="acosoDetalles" class="form-label">Detalles adicionales</label>
    <textarea class="form-control" id="acosoDetalles" name="acosoDetalles" rows="3" placeholder="Describa más (frecuencia, lugares, personas involucradas, etc.)"></textarea>
  </div>


            
  <h5>Violencia Económica y Patrimonial</h5>

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

  <div class="mt-3">
    <label for="veDetalles" class="form-label">Detalles adicionales</label>
    <textarea class="form-control" id="veDetalles" name="veDetalles" rows="3" placeholder="Describa más (frecuencia, consecuencias, bienes afectados, etc.)"></textarea>
  </div>



        
  <h5>Violencia Vicaria</h5>

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

  <div class="mt-3">
    <label for="vvDetalles" class="form-label">Detalles adicionales</label>
    <textarea class="form-control" id="vvDetalles" name="vvDetalles" rows="3" placeholder="Describa más (situaciones, fechas, consecuencias, etc.)"></textarea>
  </div>


            
  <h5>Violencia Obstétrica</h5>

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

  <div class="mt-3">
    <label for="voDetalles" class="form-label">Detalles adicionales</label>
    <textarea class="form-control" id="voDetalles" name="voDetalles" rows="3" placeholder="Describa más (hospital, fechas, personal involucrado, consecuencias, etc.)"></textarea>
  </div>




  <h5>Violencia Política</h5>

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

  <div class="mt-3">
    <label for="vpDetalles" class="form-label">Detalles adicionales</label>
    <textarea class="form-control" id="vpDetalles" name="vpDetalles" rows="3" placeholder="Describa más (institución, cargo, fecha, tipo de agresión, consecuencias, etc.)"></textarea>
  </div>




  <h5>Violencia Cibernética</h5>

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

  <div class="mt-3">
    <label for="vcDetalles" class="form-label">Detalles adicionales</label>
    <textarea class="form-control" id="vcDetalles" name="vcDetalles" rows="3" placeholder="Describa más (plataforma, tipo de agresión, fecha, consecuencias, etc.)"></textarea>
  </div>



  <h5>Violencia Laboral</h5>  

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

  <div class="mt-3">
    <label for="vlDetalles" class="form-label">Detalles adicionales</label>
    <textarea class="form-control" id="vlDetalles" name="vlDetalles" rows="3" placeholder="Describa más (puesto, lugar de trabajo, fechas, contexto, responsables, etc.)"></textarea>
  </div>




<h4>Identificacion Detallada del Nivel de Riesgo</h4>
            <hr class="my-4">






  <h5>Riesgos por conductas del agresor</h5>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="riesgoConducta" id="amenazaMatar" value="Ha amenazado con matarla o matarse">
    <label class="form-check-label" for="amenazaMatar">
      Ha amenazado con matarla o matarse
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="riesgoConducta" id="armas" value="Posee o ha usado armas de fuego, cuchillos u otros objetos peligrosos">
    <label class="form-check-label" for="armas">
      Posee o ha usado armas de fuego, cuchillos u otros objetos peligrosos
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="riesgoConducta" id="acoso" value="La sigue, acosa o vigila constantemente">
    <label class="form-check-label" for="acoso">
      La sigue, acosa o vigila constantemente
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="riesgoConducta" id="aumentoViolencia" value="La violencia ha aumentado en frecuencia o gravedad">
    <label class="form-check-label" for="aumentoViolencia">
      La violencia ha aumentado en frecuencia o gravedad
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="riesgoConducta" id="celos" value="Muestra celos excesivos o control obsesivo sobre ella">
    <label class="form-check-label" for="celos">
      Muestra celos excesivos o control obsesivo sobre ella
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="riesgoConducta" id="drogas" value="Consume alcohol o drogas y se vuelve violento">
    <label class="form-check-label" for="drogas">
      Consume alcohol o drogas y se vuelve violento
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="riesgoConducta" id="controlEconomico" value="Controla totalmente el dinero o impide que ella trabaje">
    <label class="form-check-label" for="controlEconomico">
      Controla totalmente el dinero o impide que ella trabaje
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="riesgoConducta" id="amenazaFamilia" value="Amenaza o agrede a sus hijas, hijos o familiares">
    <label class="form-check-label" for="amenazaFamilia">
      Amenaza o agrede a sus hijas, hijos o familiares
    </label>
  </div>

  <div class="mt-3">
    <label for="riesgoDetalles" class="form-label">Detalles adicionales</label>
    <textarea class="form-control" id="riesgoDetalles" name="riesgoDetalles" rows="3" placeholder="Describa más sobre las conductas de riesgo del agresor..."></textarea>
  </div>




  <h5>Riesgos por situación de violencia</h5>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="riesgoSituacion" id="viveConAgresor" value="Actualmente vive con el agresor">
    <label class="form-check-label" for="viveConAgresor">
      Actualmente vive con el agresor
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="riesgoSituacion" id="dependeEconomicamente" value="Depende económicamente del agresor">
    <label class="form-check-label" for="dependeEconomicamente">
      Depende económicamente del agresor
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="riesgoSituacion" id="sinRedApoyo" value="No cuenta con red de apoyo (familiares, amistades, comunidad)">
    <label class="form-check-label" for="sinRedApoyo">
      No cuenta con red de apoyo (familiares, amistades, comunidad)
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="riesgoSituacion" id="temorDenunciar" value="Tiene miedo de denunciar o de dejar al agresor">
    <label class="form-check-label" for="temorDenunciar">
      Tiene miedo de denunciar o de dejar al agresor
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="riesgoSituacion" id="embarazoDependencia" value="Está embarazada o tiene hijas/hijos pequeños que dependen del agresor">
    <label class="form-check-label" for="embarazoDependencia">
      Está embarazada o tiene hijas/hijos pequeños que dependen del agresor
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="riesgoSituacion" id="agresorBusca" value="El agresor la busca, la amenaza o intenta acercarse a pesar de medidas previas">
    <label class="form-check-label" for="agresorBusca">
      El agresor la busca, la amenaza o intenta acercarse a pesar de medidas previas
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="riesgoSituacion" id="desalojo" value="Ha sido expulsada o desalojada de su hogar por el agresor">
    <label class="form-check-label" for="desalojo">
      Ha sido expulsada o desalojada de su hogar por el agresor
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="riesgoSituacion" id="agresorNoCumple" value="El agresor no cumple medidas de protección o acuerdos legales">
    <label class="form-check-label" for="agresorNoCumple">
      El agresor no cumple medidas de protección o acuerdos legales
    </label>
  </div>

  <div class="mt-3">
    <label for="riesgoDetalles" class="form-label">Detalles adicionales</label>
    <textarea class="form-control" id="riesgoDetalles" name="riesgoDetalless" rows="3" placeholder="Describa más sobre la situación de violencia o contexto actual..."></textarea>
  </div>


  <h5>Factores de vulnerabilidad de la mujer</h5>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="vulnerabilidad" id="embarazo" value="Embarazo o maternidad reciente">
    <label class="form-check-label" for="embarazo">
      Embarazo o maternidad reciente
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="vulnerabilidad" id="discapacidad" value="Tiene alguna discapacidad física, mental o sensorial">
    <label class="form-check-label" for="discapacidad">
      Tiene alguna discapacidad física, mental o sensorial
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="vulnerabilidad" id="edadAvanzada" value="Es adulta mayor">
    <label class="form-check-label" for="edadAvanzada">
      Es adulta mayor
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="vulnerabilidad" id="menorEdad" value="Es menor de edad">
    <label class="form-check-label" for="menorEdad">
      Es menor de edad
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="vulnerabilidad" id="indigena" value="Pertenece a un pueblo o comunidad indígena">
    <label class="form-check-label" for="indigena">
      Pertenece a un pueblo o comunidad indígena
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="vulnerabilidad" id="migrante" value="Es migrante o desplazada">
    <label class="form-check-label" for="migrante">
      Es migrante o desplazada
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="vulnerabilidad" id="sinRecursos" value="Carece de recursos económicos o vivienda">
    <label class="form-check-label" for="sinRecursos">
      Carece de recursos económicos o vivienda
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="vulnerabilidad" id="sinEducacion" value="Tiene bajo nivel educativo o no sabe leer/escribir">
    <label class="form-check-label" for="sinEducacion">
      Tiene bajo nivel educativo o no sabe leer/escribir
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="vulnerabilidad" id="aislamiento" value="Vive en una zona rural o aislada">
    <label class="form-check-label" for="aislamiento">
      Vive en una zona rural o aislada
    </label>
  </div>

  <div class="mt-3">
    <label for="vulnerabilidadDetalles" class="form-label">Detalles adicionales</label>
    <textarea class="form-control" id="vulnerabilidadDetalles" name="vulnerabilidadDetalles" rows="3" placeholder="Describa más sobre la situación de vulnerabilidad (contexto, condiciones, apoyo recibido, etc.)"></textarea>
  </div>

<h5>Factores Contextuales</h5>

<div class="col-sm-12 mt-3">
 

  <div class="form-check">
    <input class="form-check-input" type="radio" name="factores_contextuales" value="Vive en zona rural o aislada">
    <label class="form-check-label">Vive en zona rural o aislada</label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="factores_contextuales" value="No cuenta con red de apoyo cercana">
    <label class="form-check-label">No cuenta con red de apoyo cercana</label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="factores_contextuales" value="Dependencia económica del agresor">
    <label class="form-check-label">Dependencia económica del agresor</label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="factores_contextuales" value="Barreras para acceder a servicios o transporte">
    <label class="form-check-label">Barreras para acceder a servicios o transporte</label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="factores_contextuales" value="Discriminación por origen, condición o idioma">
    <label class="form-check-label">Discriminación por origen, condición o idioma</label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="factores_contextuales" value="Falta de instituciones o apoyo institucional en su comunidad">
    <label class="form-check-label">Falta de instituciones o apoyo institucional en su comunidad</label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="factores_contextuales" value="Otro">
    <label class="form-check-label">Otro</label>
  </div>
    <div class="mt-3">
  <label for="vulnerabilidadDetalles" class="form-label">Detalles adicionales</label>
  <textarea class="form-control mt-2" name="factores_contextuales_detalle" placeholder="Especifique detalles..."></textarea>
</div>
</div>


<h5>Escala orientativa de riesgo</h5>    
<div class="col-sm-12 mt-3">
  

  <div class="form-check">
    <input class="form-check-input" type="radio" name="escala_riesgo" value="Riesgo bajo">
    <label class="form-check-label">Riesgo bajo</label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="escala_riesgo" value="Riesgo medio">
    <label class="form-check-label">Riesgo medio</label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="escala_riesgo" value="Riesgo alto">
    <label class="form-check-label">Riesgo alto</label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="escala_riesgo" value="Riesgo crítico">
    <label class="form-check-label">Riesgo crítico</label>
  </div>

    <div class="mt-3">
  <label for="Escala" class="form-label">Detalles adicionales</label>
  <textarea class="form-control mt-2" name="escala_riesgo_detalle" placeholder="Especifique detalles o justificación..."></textarea>
</div>
</div>



<div class="col-sm-12 mt-3">
  <label class="form-label">Registrar Tipos de Violencia Detectada</label>

  <div class="alert alert-info" role="alert">
    Selecciona las casillas con el tipo de violencia detectada.
  </div>

 
    <label class="form-label">Tipos de Violencia:</label><br>

    <?php
      try {
          $sql = "SELECT ID_Tipo_Violencia, Nombre_tipo FROM Tipos_Violencia";
          $stmt = $conn->prepare($sql);
          $stmt->execute();

          if ($stmt->rowCount() > 0) {
              $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
              $total_rows = count($rows);
              $half_rows = ceil($total_rows / 2); // Dividir en dos columnas

              echo "<div class='row'>";
              foreach ($rows as $key => $row) {
                  $checkbox_id = "tipo_violencia_" . $row['ID_Tipo_Violencia'];
                  echo "<div class='form-check col-sm-6'>";
                  echo "<input class='form-check-input' type='checkbox' id='$checkbox_id' name='id_tipo_violencia[]' value='" . $row['ID_Tipo_Violencia'] . "' >";
                  echo "<label class='form-check-label' for='$checkbox_id'>" . htmlspecialchars($row['Nombre_tipo']) . "</label>";
                  echo "</div>";

                  if ($key + 1 == $half_rows) {
                      echo "</div><div class='row mt-2'>";
                  }
              }
              echo "</div>";
          } else {
              echo "<div class='alert alert-warning'>No hay tipos de violencia disponibles.</div>";
          }
      } catch(PDOException $e) {
          echo "<div class='alert alert-danger'>Error al obtener los tipos de violencia.</div>";
      }
    ?>

 
</div>


<!-- Observaciones y firma de la entrevistadora -->
<div class="col-sm-12 mt-3">


  <div class="mb-3">
    <label for="observacionesEntrevistadora" class="form-label">Observaciones</label>
    <textarea class="form-control" id="observacionesEntrevistadora" name="observacionesEntrevistadora" rows="4" placeholder="Anote observaciones relevantes sobre la entrevista..."></textarea>
  </div>

 
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

    <!-- Observaciones de la institución o servicio -->



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




<div class="col-sm-12 mt-3">
  <label for="observacionesInstitucion" class="form-label">Observaciones de la institución o servicio</label>
  <textarea class="form-control" id="observacionesInstitucion" name="observacionesInstitucion" rows="4" placeholder="Anote observaciones relevantes por parte de la institución o servicio..."></textarea>
</div>


<!-- Primeros auxilios psicológicos -->
<div class="col-sm-12 mt-3">
  <label for="primerosAuxiliosPsicologicos" class="form-label ">
    Primeros auxilios psicológicos (contención emocional, apoyo inmediato e intervención inicial)
  </label>
  <textarea class="form-control" id="primerosAuxiliosPsicologicos" name="primerosAuxiliosPsicologicos" rows="4" placeholder="Describa la contención emocional, apoyo inmediato e intervención inicial brindados a la persona..."></textarea>
</div>



    <div class="col-sm-12">
    <div class="mb-3">
        <label for="auxiliosPsicologicos" class="form-label">Primeros auxilios psicológicos</label>
        <textarea class="form-control" id="auxiliosPsicologicos" name="auxiliosPsicologicos"  placeholder="Breve descripción del motivo de la solicitud de atención. (Circunstancias de modo, tiempo y lugar)"></textarea>
    </div>
    <div class="invalid-feedback">Por favor, proporcione una descripción válida.</div>
    </div>






<!--

///Falta Por poner Campos en la tabla de tutor y en el insert


    id_personal2
nombre2 
apellidoPaterno2 
apellidoMaterno2 
fechaNacimiento2 
edad2 
fecharegistro2 
lugarNacimiento2 

sexo2 
indigena2 
lenguaMaterna2 
hablaLenguaIndigena2 
lenguaIndigena2
telFijo2 
telCelular2 
email2 
emailRespaldo2 
telConfianza2 
nombreconfianza2 
parentesco2 
comunidadLGBT2 
tipoLgbt2 
estadocivil2 
calle2 
numInterior2 
numExterior2 
estado2 
cp2 
region2 
municipio2 
colonia2 
perteneceEtnico2 
grupoEtnico2 
padresLengua2 
lenguaPadres2 
aniosOaxaca2 
asiste_escuela2 
escolaridad2 
escuela_actual2 
grado_escolar2 
sentimiento_escuela2 
materias_gustan2 
dificultades2 
descripcion_dificultad2 
relaciones_escolares2 
decendencia2 
numDecendencia2 
hijos2 
observacionesAdicionales2 
convivencia2 
num_personas_casa2 
personas_significativas2 
sentir_casa2 
expresion_familiar2 
motivoExpresion2 
amistades_cercanas2 
descripcion_amistades2 
actividades_libre2 
uso_redes2 
redes_cuales2 
redes_tiempo2 
seguridad_comunidad2 
motivo_inseguridad2 
discapacidads2 
discapacidad2 
apoyo_psicologico2 
detalle_apoyo2 
estado_animo2 
motivo_visita2 
descripcion_evento2 
controlan_actividad2 
violencia_verbal2 
violencia_fisica2 
violencia_sexual2 
impiden_estudiar2 
difusion_sin_permiso2 
observacionesvi2 
ocupacion2 
tipoEmpleo2 
DondeTrabaja2 
fuenteIngresos2 
sectorEconomico2 
horasTrabajo2 
ingresosDiarios2 
ingresoMensual2 
apoyosSociales2 
recibeApoyo2 
apoyoDetalle2 
enteroGESMUJER2 
descripcionSolicitud2 






    -->











 <div class="py-5 text-center">
      
        <h2>Registro de Adolecente </h2>
        <p class="lead"></p>
    </div>

<h4>Datos Generales</h4>
            <hr class="my-4">





    <div class="col-sm-12 position-relative">
    <label for="id_personal2" class="form-label">Especialista</label>
    <input type="text" id="personal_input2" name="personal_input2" class="form-control" placeholder="Escribe el nombre del especialista...">
    <input type="hidden" id="id_personal2" name="id_personal2">
    <div id="sugerencias_personal2" class="list-group" style="position:absolute; z-index:1000; width:100%;"></div>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const input = document.getElementById("personal_input2");
    const sugerencias = document.getElementById("sugerencias_personal2");
    const idPersonal = document.getElementById("id_personal2");

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
        <input type="text" class="form-control" id="firstName" name="nombre2" placeholder="" required  oninput="validateInput(this)">
    <div class="invalid-feedback">Se requiere un nombre válido.</div>
    <div class="valid-feedback">Looks good!</div>
    </div>

    <div class="col-sm-6">
        <label for="lastName" class="form-label">Apellido Paterno:</label>
        <input type="text" class="form-control" id="lastNames" name="apellidoPaterno2" placeholder="" required>
        <div class="invalid-feedback">Se requiere un apellido paterno válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="secondLastName" class="form-label">Apellido Materno:</label>
        <input type="text" class="form-control" id="secondLastNames" name="apellidoMaterno2" placeholder="" required>
        <div class="invalid-feedback">Se requiere un apellido materno válido.</div>
    </div>

    <div class="col-sm-6">
    <label for="birthdate" class="form-label">Fecha de Nacimiento:</label>
    <input type="date" class="form-control" id="birthdate" name="fechaNacimiento2" placeholder="">
    <div class="invalid-feedback">Se requiere una fecha de nacimiento válida.</div>
</div>

<div class="col-sm-6">
    <label for="age" class="form-label">Edad:</label>
    <input type="number" class="form-control" id="age" name="edad2" placeholder="La edad aparecerá aquí">
</div>
    
    <div class="col-sm-6">
        <label for="fecharegistro" class="form-label">Fecha de registro</label>
        <input type="date" class="form-control" id="fecharegistro" name="fecharegistro2" placeholder="" value="<?php echo date('Y-m-d'); ?>">
        <div class="invalid-feedback">Se requiere una Fecha de Inicio válida.</div>
    </div>


    <div class="col-sm-6">
    <label for="lugarNacimiento" class="form-label">Lugar de Nacimiento</label>
    <input type="text" class="form-control" id="lugarNacimiento" name="lugarNacimiento2" placeholder="Escribe o selecciona un Municipio ..." autocomplete="off">
    <div class="sugerencias" id="sug_lugarNacimiento" style="border:1px solid #ccc; max-height:150px; overflow-y:auto;"></div>
    <input type="hidden" id="selected_lugar_id" name="selected_lugar_id">
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
        <select class="form-select" id="sexo" name="sexo2" aria-label="Selecciona una opción">
        <option selected disabled value="">Selecciona una opción...</option>
        <option value="MASCULINO">MASCULINO</option>
        <option value="FEMENINO">FEMENINO</option>
        <option value="OTRO">OTRO</option>
        </select>
        <div class="invalid-feedback">Se requiere una selección válida.</div>
    </div>
    



    <div class="col-sm-6">
        <label class="form-label">¿Se considera Indígena?</label>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="indigena2" id="indigenaopcion1" value="SI">
        <label class="form-check-label" for="indigenaopcion1">SI</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="indigena2" id="indigenaopcion2" value="NO" >
        <label class="form-check-label" for="indigenaopcion2">NO</label>
    </div>
    </div>

    <div class="col-sm-6">
  <label for="lenguaMaterna" class="form-label">Lengua Materna</label>
  <select class="form-select" id="firstName" name="lenguaMaterna2" required>
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
    <input class="form-check-input" type="radio" name="hablaLenguaIndigena2" id="exampleRadios1" value="SI" onclick="showLanguageSelect()">
    <label class="form-check-label" for="exampleRadios1">Sí</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="hablaLenguaIndigena2" id="exampleRadios2" value="NO" onclick="hideLanguageSelect()">
    <label class="form-check-label" for="exampleRadios2">No</label>
  </div>
</div>

<div class="col-sm-6" id="languageSelectContainer" style="display: none;">
  <label for="lenguaIndigena" class="form-label">¿Cuál?</label>
  <select class="form-select" id="lenguaIndigena" name="lenguaIndigena2">
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





 <h4>Datos de Contacto</h4>
            <hr class="my-4">

             <div class="col-sm-6">
        <label for="telFijo" class="form-label">Teléfono fijo</label>
        <input type="number" class="form-control" id="telFijo" name="telFijo2" placeholder="" >
        <div class="invalid-feedback">Se requiere un número de teléfono fijo válido.</div>
    </div>
    

    <div class="col-sm-6">
        <label for="telCelular" class="form-label">Teléfono celular</label>
        <input type="number" class="form-control" id="telCelular" name="telCelular2" placeholder="">
        <div class="invalid-feedback">Se requiere un número de teléfono celular válido.</div>
    </div>

     <div class="col-sm-6">
        <label for="email" class="form-label">Correo electrónico</label>
        <div class="input-group has-validation">
        <span class="input-group-text">@</span>
        <input type="email" class="form-control" maxlength="50" id="email" name="email2" placeholder="Correo electrónico">
        <div class="invalid-feedback">Se requiere una dirección de correo electrónico válida.</div>
        </div>
    </div>

    <div class="col-sm-6">
        <label for="emailRespaldo" class="form-label">Correo electrónico de respaldo<span class="text-body-secondary">(Opcional)</span></label>
        <div class="input-group has-validation">
        <span class="input-group-text">@</span>
        <input type="email" class="form-control" maxlength="50" id="emailRespaldo" name="emailRespaldo2" placeholder="Correo electrónico">
    </div>
</DIV>


   
    <div class="col-sm-6">
        <label for="telConfianza" class="form-label">Teléfono de confianza</label>
        <input type="number" class="form-control" id="telConfianza" name="telConfianza2" placeholder="">
        <div class="invalid-feedback">Se requiere un número de teléfono de confianza válido.</div>
    </div>

   

<div class="col-sm-6">
        <label for="telConfianza" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="firstname" name="nombreconfianza2" placeholder="">
        <div class="invalid-feedback">Se requiere un número de teléfono de confianza válido.</div>
    </div>

    
<div class="col-sm-6">
    <label for="parentesco" class="form-label">Parentesco</label>
    <select class="form-select" id="parentesco" name="parentesco2" >
        <option value="">-- Selecciona un parentesco --</option>
        <option value="padre">Padre</option>
        <option value="madre">Madre</option>
        <option value="hermano">Hermano</option>
        <option value="hermana">Hermana</option>
        <option value="tio">Tío</option>
        <option value="tia">Tía</option>
        <option value="abuelo">Abuelo</option>
        <option value="abuela">Abuela</option>
        <option value="amigo">Amigo/a</option>
        <option value="otro">Otro</option>
    </select>
    <div class="invalid-feedback">
        Se requiere seleccionar un parentesco válido.
    </div>
</div>


 <h4>Datos de Orientacion Social</h4>
            <hr class="my-4">

           <div class="col-sm-6">
  <label class="form-label">¿Pertenece a una comunidad LGBT+?</label>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="comunidadLGBT2" id="lgbtSi" value="SI" onclick="showLgbtSelect()">
    <label class="form-check-label" for="lgbtSi">Sí</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="comunidadLGBT2" id="lgbtNo" value="NO" onclick="hideLgbtSelect()">
    <label class="form-check-label" for="lgbtNo">No</label>
  </div>
</div>

<div class="col-sm-6" id="lgbtSelectContainer" style="display: none;">
  <label for="tipoLgbt" class="form-label">¿A cuál?</label>
  <select class="form-select" id="tipoLgbt" name="tipoLgbt2">
    <option selected disabled value="">Seleccionar opción...</option>
    <option value="Lesbiana">Lesbiana</option>
    <option value="Gay">Gay</option>
    <option value="Bisexual">Bisexual</option>
    <option value="Transgénero">Transgénero</option>
    <option value="Queer">Queer</option>
    <option value="Intersex">Intersex</option>
    <option value="Asexual">Asexual</option>
    <option value="Otro">Otro</option>
  </select>
</div>

<script>
  function showLgbtSelect() {
    document.getElementById('lgbtSelectContainer').style.display = 'block';
  }

  function hideLgbtSelect() {
    document.getElementById('lgbtSelectContainer').style.display = 'none';
    document.getElementById('tipoLgbt').value = ''; // Limpia selección
  }
</script>




<h4>Estado Civil</h4>
            <hr class="my-4">

   <div class="col-sm-6">
  <label for="estadoCivil" class="form-label">ESTADO CIVIL</label>
  <select class="form-select" id="estadoCivil" name="estadocivil2" >
    <option selected disabled value="">SELECCIONAR ESTADO CIVIL...</option>
    <option value="SOLTERO">SOLTERO/A</option>
    <option value="CASADO">CASADO/A</option>
    <option value="DIVORCIADO">DIVORCIADO/A</option>
    <option value="VIUDO">VIUDO/A</option>
    <option value="UNION_LIBRE">UNIÓN LIBRE</option>
    <option value="SEPARADO">SEPARADO/A</option>
    <option value="COMPROMETIDO">COMPROMETIDO/A</option>
    <option value="CONCUBINATO">CONCUBINATO</option>
    <option value="PAREJA_DE_HECHO">PAREJA DE HECHO</option>
    <option value="ANULADO">MATRIMONIO ANULADO</option>
    <option value="OTRO">OTRO</option>
  </select>
  <div class="invalid-feedback">
    SE REQUIERE SELECCIONAR UN ESTADO CIVIL.
  </div>
</div>






        <h4>Residencia y Origen</h4>
        <hr class="my-4">

    <div class="col-sm-6">
        <label for="calle" class="form-label">Calle</label>
        <input type="text" class="form-control" id="calle" name="calle2" placeholder="">
    <div class="invalid-feedback">Se requiere una calle válida.</div>
    </div>

    <div class="col-sm-6">
        <label for="numInterior" class="form-label">Número interior</label>
        <input type="number" max="100000" min="1" class="form-control" id="numInterior" name="numInterior2" placeholder="">
        <div class="invalid-feedback">Se requiere un número interior válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="numExterior" class="form-label">Número exterior</label>
        <input type="number" max="100000" min="1"  class="form-control" id="numInterior" name="numExterior2" placeholder="">
    <div class="invalid-feedback">Se requiere un número exterior válido.</div>
    </div>

   

    <!-- <div class="col-sm-6">
        <label for="municipio" class="form-label">Municipio</label>
        <input type="text" class="form-control" id="municipio" name="municipio" placeholder="" required>
        <div class="invalid-feedback">Se requiere un municipio válido.</div>
    </div> -->

    <div class="col-sm-6">
        <label for="estado" class="form-label">Estado</label>
        <input type="text" class="form-control" id="estado" name="estado2" value="OAXACA">
        <div class="invalid-feedback">Se requiere un estado válido.</div>
    </div>

  













        <input type="hidden" id="selected_region_id">
        <input type="hidden" id="selected_distrito_id">
        <input type="hidden" id="selected_municipio_id">
        <input type="hidden" id="selected_localidad_id"> 


        <div class="col-sm-6">
  <label for="cp" class="form-label">Código Postal (CP)</label>
  <input type="number" max="100000" min="1" class="form-control" id="cp" name="cp2" placeholder="">
  <div class="invalid-feedback">Se requiere un código postal válido.</div>
</div>

        <div class="col-sm-6">

            <label for="input_region" class="form-label">Región:</label>
            <input type="text" class="form-control" id="input_region" name="region2" placeholder="Escribe para buscar región..." autocomplete="off">
            <div class="sugerencias" id="sug_region"></div>
        </div>

        <div class="col-sm-6">
            <label for="input_distrito" class="form-label">Distrito:</label>
            <input type="text" id="input_distrito" class="form-control" placeholder="Escribe para buscar distrito..." autocomplete="off">
            <div class="sugerencias" id="sug_distrito"></div>
        </div>

        <div class="col-sm-6">
            <label for="input_municipio" class="form-label">Municipio:</label>
            <input type="text" id="input_municipio" class="form-control" name="municipio2" placeholder="Escribe para buscar municipio..." autocomplete="off">
            <div class="sugerencias" id="sug_municipio"></div>
        </div>

        <div class="col-sm-6">
            <label for="input_localidad" class="form-label">Localidad:</label>
            <input type="text" id="input_localidad" class="form-control" name="colonia2" placeholder="Escribe el nombre de la localidad..." autocomplete="off">
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
    <input class="form-check-input" type="radio" name="perteneceEtnico2" id="etnicoSi" value="SI" onclick="showEtnicoSelect()">
    <label class="form-check-label" for="etnicoSi">SÍ</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="perteneceEtnico2" id="etnicoNo" value="NO" onclick="hideEtnicoSelect()">
    <label class="form-check-label" for="etnicoNo">NO</label>
  </div>
</div>

<div class="col-sm-6" id="etnicoSelectContainer" style="display: none;">
  <label for="grupoEtnico" class="form-label">¿A CUÁL?</label>
  <select class="form-select" id="grupoEtnico" name="grupoEtnico2">
    <option selected disabled value="">SELECCIONAR GRUPO ÉTNICO...</option>
    <option value="ZAPOTECO">ZAPOTECO</option>
    <option value="MIXTECO">MIXTECO</option>
    <option value="MAZATECO">MAZATECO</option>
    <option value="CHINANTECO">CHINANTECO</option>
    <option value="MIXE">MIXE</option>
    <option value="TRIQUI">TRIQUI</option>
    <option value="CHATINO">CHATINO</option>
    <option value="AMUZGO">AMUZGO</option>
    <option value="CUICATECO">CUICATECO</option>
    <option value="HUAVE">HUAVE</option>
    <option value="CHONTAL">CHONTAL</option>
    <option value="IXCATECO">IXCATECO</option>
    <option value="ZOQUE">ZOQUE</option>
    <option value="NÁHUATL">NÁHUATL</option>
    <option value="OTRO">OTRO</option>
  </select>
</div>

<script>
  function showEtnicoSelect() {
    document.getElementById('etnicoSelectContainer').style.display = 'block';
  }

  function hideEtnicoSelect() {
    document.getElementById('etnicoSelectContainer').style.display = 'none';
    document.getElementById('grupoEtnico').value = ''; // Limpia la selección
  }
</script>


<div class="col-sm-6">
  <label class="form-label">¿SU PADRE O MADRE HABLA ALGUNA LENGUA INDÍGENA?</label>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="padresLengua2" id="padresLenguaSi" value="SI" onclick="showPadresLenguaSelect()">
    <label class="form-check-label" for="padresLenguaSi">SÍ</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="padresLengua2" id="padresLenguaNo" value="NO" onclick="hidePadresLenguaSelect()">
    <label class="form-check-label" for="padresLenguaNo">NO</label>
  </div>
</div>

<div class="col-sm-6" id="padresLenguaSelectContainer" style="display: none;">
  <label for="lenguaPadres" class="form-label">¿CUÁL?</label>
  <select class="form-select" id="lenguaPadres" name="lenguaPadres2">
    <option selected disabled value="">SELECCIONAR LENGUA...</option>
    <option value="ZAPOTECO">ZAPOTECO</option>
    <option value="MIXTECO">MIXTECO</option>
    <option value="MAZATECO">MAZATECO</option>
    <option value="CHINANTECO">CHINANTECO</option>
    <option value="MIXE">MIXE</option>
    <option value="TRIQUI">TRIQUI</option>
    <option value="CHATINO">CHATINO</option>
    <option value="AMUZGO">AMUZGO</option>
    <option value="CUICATECO">CUICATECO</option>
    <option value="HUAVE">HUAVE</option>
    <option value="CHONTAL">CHONTAL</option>
    <option value="IXCATECO">IXCATECO</option>
    <option value="ZOQUE">ZOQUE</option>
    <option value="NÁHUATL">NÁHUATL</option>
    <option value="OTRO">OTRO</option>
  </select>
</div>

<script>
  function showPadresLenguaSelect() {
    document.getElementById('padresLenguaSelectContainer').style.display = 'block';
  }

  function hidePadresLenguaSelect() {
    document.getElementById('padresLenguaSelectContainer').style.display = 'none';
    document.getElementById('lenguaPadres').value = ''; // Limpia la selección
  }
</script>


<div class="col-sm-6">
  <label for="aniosOaxaca" class="form-label">AÑOS DE VIVIR EN OAXACA</label>
  <input type="number" class="form-control" id="aniosOaxaca" name="aniosOaxaca2" min="0" placeholder="Ingrese el número de años" >
  <div class="invalid-feedback">Por favor, ingrese un número válido de años.</div>
</div>






 <h4>Contexto Escolar</h4>
        <hr class="my-4">

<div class="col-sm-6" class="row mt-2">
  <label class="form-label">¿Actualmente asistes a la escuela?</label>
  <div class="form-check ">
    <input class="form-check-input" type="radio" name="asiste_escuela2" id="escuelaSi" value="SI" onclick="mostrarCamposEscuela(true)">
    <label class="form-check-label" for="escuelaSi">Sí</label>
  </div>
  <div class="form-check ">
    <input class="form-check-input" type="radio" name="asiste_escuela2" id="escuelaNo" value="NO" onclick="mostrarCamposEscuela(false)">
    <label class="form-check-label" for="escuelaNo">No</label>
  </div>
</div>

<div id="camposEscuela" class="row mt-2" style="display:none;">

 <div class="col-sm-6">
        <label for="escolaridad" class="form-label">NIVEL DE ESTUDIOS</label>
        <select class="form-select" id="escolaridad" name="escolaridad2" aria-label="Selecciona una opción">
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
    <label class="form-label">Escuela actual</label>
    <input type="text" class="form-control" name="escuela_actual2" placeholder="Nombre de la escuela">
  </div>
  <div class="col-sm-6">
    <label class="form-label">Grado escolar</label>
    <input type="text" class="form-control" name="grado_escolar2" placeholder="Ej. 3° de secundaria">
  </div>

  <div class="col-sm-6 mt-3">
  <label class="form-label">¿Cómo te sientes en la escuela?</label>
  <input type="text" class="form-control" name="sentimiento_escuela2" placeholder="Ej. Me siento bien con mis compañeros">
</div>

<div class="col-sm-6 mt-3">
  <label class="form-label">¿Qué materias te gustan más?</label>
  <input type="text" class="form-control" name="materias_gustan2" placeholder="Ej. Matemáticas, Arte, Informática">
</div>

<div class="col-sm-6 mt-3">
  <label class="form-label">¿Tienes dificultades escolares?</label>
  <div class="form-check ">
    <input class="form-check-input" type="radio" name="dificultades2" id="dificultadesSi" value="SI" onclick="mostrarDescripcionDificultad(true)">
    <label class="form-check-label" for="dificultadesSi">Sí</label>
  </div>
  <div class="form-check ">
    <input class="form-check-input" type="radio" name="dificultades2" id="dificultadesNo" value="NO" onclick="mostrarDescripcionDificultad(false)">
    <label class="form-check-label" for="dificultadesNo">No</label>
  </div>
</div>

<div id="descripcionDificultad" class="col-sm-12 mt-2" style="display:none;">
  <label class="form-label">¿Qué tipo de dificultades tienes?</label>
  <textarea class="form-control" name="descripcion_dificultad2" rows="2" placeholder="Ej. Dificultad en matemáticas o problemas de atención"></textarea>
</div>

<script>
function mostrarDescripcionDificultad(mostrar) {
  document.getElementById('descripcionDificultad').style.display = mostrar ? 'block' : 'none';
}
</script>

<div class="col-sm-6 mt-3">
  <label class="form-label">¿Cómo son tus relaciones con docentes y compañeros?</label>
  <textarea class="form-control" name="relaciones_escolares2" rows="2" placeholder="Ej. Me llevo bien con mis compañeros, pero tengo dificultades con algunos docentes"></textarea>
</div>



</div>

<script>
function mostrarCamposEscuela(mostrar) {
  document.getElementById('camposEscuela').style.display = mostrar ? 'flex' : 'none';
}
</script>






<h4>Contexto Familiar</h4>
        <hr class="my-4">









 <div class="col-sm-6">
    <label class="form-label">¿TIENE HIJOS E HIJAS?</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="decendencia2" id="hijosA1" value="SI" onclick="mostrarHijosInput2()">
        <label class="form-check-label" for="hijosA1">SI</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="decendencia2" id="hijosA2" value="NO" onclick="ocultarHijosInput2()">
        <label class="form-check-label" for="hijosA2">NO</label>
    </div>
</div>

<div class="col-sm-6" id="HijosInput2" style="display: none;">
    <label for="numDecendencia2" class="form-label">¿CUÁNTOS?</label>
    <input type="number" min="1" max="15" class="form-control mb-3" id="numDecendencia2" name="numDecendencia2" placeholder="Ingrese un número" oninput="generarCamposHijos2()">
    <div class="invalid-feedback">Se requiere un número válido.</div>
</div>

<div id="formularios_hijos2"></div>

<script>
function mostrarHijosInput2() {
    document.getElementById('HijosInput2').style.display = 'block';
}

function ocultarHijosInput2() {
    document.getElementById('HijosInput2').style.display = 'none';
    document.getElementById('formularios_hijos2').innerHTML = '';
}

function generarCamposHijos2() {
    const cantidad = parseInt(document.getElementById('numDecendencia2').value) || 0;
    const contenedor = document.getElementById('formularios_hijos2');
    contenedor.innerHTML = '';

    for (let i = 0; i < cantidad; i++) {
        const div = document.createElement('div');
        div.classList.add('mb-3');
        div.innerHTML = `
            <h5>Hijo ${i + 1}</h5>
            <div class="row">
                <div class="col-sm-6">
                    <label class="form-label">Nombre:</label>
                    <input type="text" name="hijos2[${i}][nombre]" class="form-control" required>
                </div>
                <div class="col-sm-6">
                    <label class="form-label">Apellido Paterno:</label>
                    <input type="text" name="hijos2[${i}][apellido_paterno]" class="form-control">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-6">
                    <label class="form-label">Apellido Materno:</label>
                    <input type="text" name="hijos2[${i}][apellido_materno]" class="form-control">
                </div>
                <div class="col-sm-6">
                    <label class="form-label">Fecha de Nacimiento:</label>
                    <input type="date" name="hijos2[${i}][fecha_nacimiento]" class="form-control">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-6">
                    <label class="form-label">Sexo:</label>
                    <select name="hijos2[${i}][sexo]" class="form-select">
                        <option value="">Selecciona</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label class="form-label">Escolaridad:</label>
                    <input type="text" name="hijos2[${i}][escolaridad]" class="form-control">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-6">
                    <label class="form-label">Condición:</label>
                    <input type="text" name="hijos2[${i}][condicion]" class="form-control">
                </div>
            </div>
            <hr>
        `;
        contenedor.appendChild(div);
    }
}
</script>


    
    
<div class="col-sm-12 mt-3">
  <label for="observacionesAdicionales" class="form-label">OBSERVACIONES ADICIONALES</label>
  <textarea class="form-control" id="observacionesAdicionales" name="observacionesAdicionales2" rows="3" placeholder="Escriba cualquier observación adicional..."></textarea>
</div>

  

<div class="col-sm-6">
  <label for="convivencia" class="form-label">¿Con quién vives?</label>
  <select class="form-select" id="convivencia" name="convivencia2">
    <option value="">Seleccione una opción</option>
    <option value="Padres">Con mis padres</option>
    <option value="Madre">Solo con mi madre</option>
    <option value="Padre">Solo con mi padre</option>
    <option value="Abuelos">Con mis abuelos</option>
    <option value="Tíos">Con mis tíos</option>
    <option value="Pareja">Con mi pareja</option>
    <option value="Amigos">Con amigos o compañeros</option>
    <option value="Solo(a)">Vivo solo(a)</option>
    <option value="Otro">Otro</option>
  </select>
</div>


<div class="col-sm-6">
  <label for="num_personas_casa" class="form-label">Número de personas en casa</label>
  <input type="number" 
         class="form-control" 
         id="num_personas_casa" 
         name="num_personas_casa2" 
         min="1" 
         max="20" 
         placeholder="Ejemplo: 4" 
         >
  <div class="invalid-feedback">Por favor, ingresa un número válido (entre 1 y 20).</div>
</div>


    
<div class="col-sm-12">
  <label for="personas_significativas" class="form-label">
    Personas significativas para ti en tu familia
  </label>
  <textarea class="form-control" 
            id="personas_significativas" 
            name="personas_significativas2" 
            rows="2" 
            placeholder="Ejemplo: mi mamá porque siempre me apoya, mi abuelo por sus consejos..."></textarea>
</div>


<div class="col-sm-6">
  <label for="sentir_casa" class="form-label">¿Cómo te sientes en tu casa?</label>
  <select class="form-select" id="sentir_casa" name="sentir_casa2" >
    <option value="">Seleccione una opción</option>
    <option value="Muy bien">Muy bien</option>
    <option value="Bien">Bien</option>
    <option value="Regular">Regular</option>
    <option value="Mal">Mal</option>
    <option value="Muy mal">Muy mal</option>
  </select>
</div>


<div class="col-sm-6">
  <label class="form-label">¿Sientes que puedes expresar lo que piensas o sientes en tu familia?</label>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="expresion_familiar2" id="expresionSi" value="SI" onclick="mostrarMotivoExpresion(false)">
    <label class="form-check-label" for="expresionSi">Sí</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="expresion_familiar2" id="expresionNo" value="NO" onclick="mostrarMotivoExpresion(true)">
    <label class="form-check-label" for="expresionNo">No</label>
  </div>
</div>

<div class="col-sm-6" id="motivoExpresionDiv" style="display:none;">
  <label for="motivoExpresion" class="form-label">¿Por qué?</label>
  <input type="text" class="form-control" id="motivoExpresion" name="motivoExpresion2" placeholder="Explica brevemente el motivo">
</div>

<script>
function mostrarMotivoExpresion(mostrar) {
  document.getElementById('motivoExpresionDiv').style.display = mostrar ? 'block' : 'none';
}
</script>



<h4>Contexto Social y Comunitario</h4>
        <hr class="my-4">

        <div class="col-sm-6">
  <label class="form-label">¿Tienes amistades cercanas?</label>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="amistades_cercanas2" id="amistadesSi" value="SI" onclick="mostrarAmistades(true)">
    <label class="form-check-label" for="amistadesSi">Sí</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="amistades_cercanas2" id="amistadesNo" value="NO" onclick="mostrarAmistades(false)">
    <label class="form-check-label" for="amistadesNo">No</label>
  </div>
</div>

<div class="col-sm-6" id="detalleAmistades" style="display:none;">
  <label for="descripcion_amistades" class="form-label">¿Quiénes son o por qué son importantes?</label>
  <input type="text" class="form-control" id="descripcion_amistades" name="descripcion_amistades2" placeholder="Ejemplo: mis compañeros de escuela, vecinos, amigos de infancia...">
</div>

<script>
function mostrarAmistades(mostrar) {
  document.getElementById('detalleAmistades').style.display = mostrar ? 'block' : 'none';
}
</script>



<div class="col-sm-6">
  <label for="actividades_libre" class="form-label">Actividades que disfrutas hacer en tu tiempo libre</label>
  <textarea class="form-control" id="actividades_libre" name="actividades_libre2" rows="3" placeholder="Ejemplo: leer, ver series, hacer ejercicio, escuchar música, salir con amigos..."></textarea>
</div>



<div class="col-sm-6">
  <label class="form-label">¿Usas redes sociales o internet?</label>
  <div class="form-check ">
    <input class="form-check-input" type="radio" name="uso_redes2" id="usoRedesSi" value="SI" onclick="mostrarCamposRedes(true)">
    <label class="form-check-label" for="usoRedesSi">Sí</label>
  </div>
  <div class="form-check ">
    <input class="form-check-input" type="radio" name="uso_redes2" id="usoRedesNo" value="NO" onclick="mostrarCamposRedes(false)">
    <label class="form-check-label" for="usoRedesNo">No</label>
  </div>
</div>

<!-- Campos que aparecen solo si elige "Sí" -->
<div id="camposRedes" style="display:none;" class="row mt-2">
  <div class="col-sm-6">
    <label class="form-label">¿Cuáles redes usas?</label>
    <input type="text" class="form-control" name="redes_cuales2" placeholder="Ej. Facebook, Instagram, TikTok...">
  </div>
  <div class="col-sm-6">
    <label class="form-label">¿Cuánto tiempo al día?</label>
    <input type="text" class="form-control" name="redes_tiempo2" placeholder="Ej. 2 horas, 30 minutos, etc.">
  </div>
</div>

<script>
function mostrarCamposRedes(mostrar) {
  document.getElementById('camposRedes').style.display = mostrar ? 'flex' : 'none';
}
</script>



<div class="col-sm-6">
  <label class="form-label">¿Te sientes seguro en tu comunidad o colonia?</label>
  <div class="form-check ">
    <input class="form-check-input" type="radio" name="seguridad_comunidad2" id="seguridadSi" value="SI" onclick="mostrarCampoSeguridad(false)">
    <label class="form-check-label" for="seguridadSi">Sí</label>
  </div>
  <div class="form-check ">
    <input class="form-check-input" type="radio" name="seguridad_comunidad2" id="seguridadNo" value="NO" onclick="mostrarCampoSeguridad(true)">
    <label class="form-check-label" for="seguridadNo">No</label>
  </div>
</div>

<!-- Campo adicional solo si elige "No" -->
<div id="campoInseguridad" style="display:none;" class="col-sm-6 mt-2">
  <label class="form-label">¿Por qué?</label>
  <textarea class="form-control" name="motivo_inseguridad2" rows="2" placeholder="Explica brevemente por qué no te sientes seguro..."></textarea>
</div>

<script>
function mostrarCampoSeguridad(mostrar) {
  document.getElementById('campoInseguridad').style.display = mostrar ? 'block' : 'none';
}
</script>



<h4>Salud y Bienestar</h4>
        <hr class="my-4">


          <div class="col-sm-6">
  <label class="form-label">¿PRESENTA ALGUNA DISCAPACIDAD?</label>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="discapacidads2" id="discapacidadSi" value="SI" onclick="showDiscapacidadSelect()">
    <label class="form-check-label" for="discapacidadSi">SÍ</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="discapacidads2" id="discapacidadNo" value="NO" onclick="hideDiscapacidadSelect()">
    <label class="form-check-label" for="discapacidadNo">NO</label>
  </div>
</div>

<div class="col-sm-6" id="discapacidadSelectContainer" style="display: none;">
  <label for="tipoDiscapacidad" class="form-label">¿CUÁL?</label>
  <select class="form-select" id="tipoDiscapacidad" name="discapacidad2">
    <option selected disabled value="">SELECCIONAR TIPO...</option>
    <option value="MOTRIZ">MOTRIZ</option>
    <option value="VISUAL">VISUAL</option>
    <option value="AUDITIVA">AUDITIVA</option>
    <option value="INTELECTUAL">INTELECTUAL</option>
    <option value="DEL LENGUAJE">DEL LENGUAJE</option>
    <option value="PSICOSOCIAL">PSICOSOCIAL</option>
    <option value="MULTIPLE">MÚLTIPLE</option>
    <option value="OTRA">OTRA</option>
  </select>
</div>

<script>
  function showDiscapacidadSelect() {
    document.getElementById('discapacidadSelectContainer').style.display = 'block';
  }

  function hideDiscapacidadSelect() {
    document.getElementById('discapacidadSelectContainer').style.display = 'none';
    document.getElementById('tipoDiscapacidad').value = ''; // Limpia selección
  }
</script>



<div class="col-sm-6">
  <label class="form-label">¿Has recibido apoyo psicológico antes?</label>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="apoyo_psicologico2" id="apoyoSi" value="SI" onclick="mostrarCampoApoyo(true)">
    <label class="form-check-label" for="apoyoSi">Sí</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="apoyo_psicologico2" id="apoyoNo" value="NO" onclick="mostrarCampoApoyo(false)">
    <label class="form-check-label" for="apoyoNo">No</label>
  </div>
</div>

<!-- Campo adicional solo si elige "Sí" -->
<div id="campoApoyo" style="display:none;" class="col-sm-6 mt-2">
  <label class="form-label">¿Dónde o con quién recibiste el apoyo?</label>
  <input type="text" class="form-control" name="detalle_apoyo2" placeholder="Ejemplo: en la escuela, centro de salud, particular, etc.">
</div>

<script>
function mostrarCampoApoyo(mostrar) {
  document.getElementById('campoApoyo').style.display = mostrar ? 'block' : 'none';
}
</script>


<div class="col-sm-6">
  <label class="form-label">¿Cómo describirías tu estado de ánimo la mayor parte del tiempo?</label>
  <input type="text" class="form-control" name="estado_animo2" placeholder="Escribe tu respuesta aquí">
</div>




<h4>Motivo de la Solicitud de Apoyo</h4>
        <hr class="my-4">

        

        <div class="col-sm-6">
  <label class="form-label">¿Qué te hizo venir hoy?</label>
  <textarea class="form-control" name="motivo_visita2" rows="3" placeholder="Describe brevemente qué te motivó a venir hoy..."></textarea>
</div>


<div class="col-sm-6">
  <label class="form-label">¿Qué ocurrió, en qué momento y en qué lugar?</label>
  <textarea class="form-control" name="descripcion_evento2" rows="3" placeholder="Describe brevemente qué pasó, cuándo y dónde..."></textarea>
</div>



<h4>Deteccion de Violencias</h4>
        <hr class="my-4">

        <div class="col-sm-6">
  <label class="form-label">¿Te controlan lo que haces, con quién sales o hablas?</label>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="controlan_actividad2" id="controlSi" value="SI">
    <label class="form-check-label" for="controlSi">Sí</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="controlan_actividad2" id="controlNo" value="NO">
    <label class="form-check-label" for="controlNo">No</label>
  </div>
</div>

<div class="col-sm-6">
  <label class="form-label">¿Te insultan, te humillan o te hacen sentir menos?</label>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="violencia_verbal2" id="insultosSi" value="SI">
    <label class="form-check-label" for="insultosSi">Sí</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="violencia_verbal2" id="insultosNo" value="NO">
    <label class="form-check-label" for="insultosNo">No</label>
  </div>
</div>


<div class="col-sm-6">
  <label class="form-label">¿Te han golpeado, empujado o lastimado?</label>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="violencia_fisica2" id="golpesSi" value="SI">
    <label class="form-check-label" for="golpesSi">Sí</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="violencia_fisica2" id="golpesNo" value="NO">
    <label class="form-check-label" for="golpesNo">No</label>
  </div>
</div>


<div class="col-sm-6">
  <label class="form-label">¿Te han tocado sin tu consentimiento?</label>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="violencia_sexual2" id="tocadoSi" value="SI">
    <label class="form-check-label" for="tocadoSi">Sí</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="violencia_sexual2" id="tocadoNo" value="NO">
    <label class="form-check-label" for="tocadoNo">No</label>
  </div>
</div>


<div class="col-sm-6">
  <label class="form-label">¿Te impiden estudiar o seguir en la escuela?</label>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="impiden_estudiar2" id="impidenSi" value="SI">
    <label class="form-check-label" for="impidenSi">Sí</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="impiden_estudiar2" id="impidenNo" value="NO">
    <label class="form-check-label" for="impidenNo">No</label>
  </div>
</div>


<div class="col-sm-6">
  <label class="form-label">¿Han difundido fotos, videos o mensajes tuyos sin tu permiso?</label>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="difusion_sin_permiso2" id="difusionSi" value="SI">
    <label class="form-check-label" for="difusionSi">Sí</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="difusion_sin_permiso2" id="difusionNo" value="NO">
    <label class="form-check-label" for="difusionNo">No</label>
  </div>
</div>


<div class="col-sm-12">
  <label class="form-label">Observaciones</label>
  <textarea class="form-control" name="observacionesvi2" rows="3" placeholder="Escribe aquí cualquier observación o comentario adicional..."></textarea>
</div>




<h4>Estudio Socioeconomico</h4>
        <hr class="my-4">




<div class="col-sm-6">
    <label for="ocupacion" class="form-label">Ocupación</label>
    <select class="form-select" id="ocupacion" name="ocupacion2" >
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

<div class="col-sm-6 mt-3">
  <label for="tipoEmpleo" class="form-label">Tipo de Empleo</label>
  <select class="form-select" id="tipoEmpleo" name="tipoEmpleo2" >
    <option value="">Selecciona una opcion</option>
    <option value="FORMAL">FORMAL</option>
    <option value="INFORMAL">INFORMAL</option>
    <option value="DESEMPLEADA">DESEMPLEADA</option>
  </select>
  <div class="invalid-feedback">Por favor, selecciona el tipo de empleo.</div>
</div>

<div class="col-sm-6" id="DondeTrabaja">
        <label for="DondeTrabaja" class="form-label">¿Dónde trabaja?</label>
        <input type="text" class="form-control" id="Trabaja" name="DondeTrabaja2">
        <div class="invalid-feedback">Se requiere un apellido válido.</div>
    </div>

    
 <div class="col-sm-6">
    <label for="fuenteIngresos" class="form-label">Fuente de ingresos</label>
    <select class="form-select" id="fuenteIngresos" name="fuenteIngresos2" >
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
        <select class="form-select" id="sectorEconomico" name="sectorEconomico2" aria-label="Default select example">
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
        <input type="number" min="1" max="24" class="form-control" id="horasTrabajo" name="horasTrabajo2" placeholder="">
        <div class="invalid-feedback">Se requiere un número válido de horas de trabajo.</div>
    </div>
    
    <div class="col-sm-6">
        <label for="ingresosDiarios" class="form-label">Ingresos Diarios</label>
        <input type="number" min="1" max="1000000" class="form-control" id="ingresosDiarios" name="ingresosDiarios2" placeholder="">
        <div class="invalid-feedback">Se requiere un número válido de ingresos diarios.</div>
    </div>


<div class="col-sm-6 mt-3">
  <label for="ingresoMensual" class="form-label">Ingreso Mensual Aproximado</label>
  <input 
    type="number" 
    class="form-control" 
    id="ingresoMensual" 
    name="ingresoMensual2" 
    placeholder="Ejemplo: 5000" 
    min="0" 
    step="100" 
    >
  <div class="invalid-feedback">Por favor, ingresa un monto válido.</div>
</div>




<div class="col-sm-6 mt-3">
  <label for="apoyosSociales" class="form-label">Otros Ingresos</label>
  <select class="form-select" id="apoyosSociales" name="apoyosSociales2">
    <option value="">Selecciona una Opcion</option>
    <option value="PROSPERA">PROSPERA</option>
    <option value="PENSION_ADULTO_MAYOR">PENSIÓN ADULTO MAYOR</option>
    <option value="PENSION_DISCAPACIDAD">PENSIÓN DISCAPACIDAD</option>
     <option value="SUBSIDIO">SUBSIDIO</option>
    <option value="REMESAS">REMESAS</option>
    <option value="NEGOCIO_PROPIO">NEGOCIO PROPIO</option>
    <option value="OTRO">OTRO</option>
  </select>
</div>





<div class="col-sm-6 mt-3">
  <label class="form-label">¿Recibe apoyo económico de otras personas?</label>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="recibeApoyo2" id="recibeApoyoSi" value="SI" onclick="showApoyoDetalle()">
    <label class="form-check-label" for="recibeApoyoSi">Sí</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="recibeApoyo2" id="recibeApoyoNo" value="NO" onclick="hideApoyoDetalle()">
    <label class="form-check-label" for="recibeApoyoNo">No</label>
  </div>
</div>

<div class="col-sm-6 mt-2" id="apoyoDetalleContainer" style="display: none;">
  <label for="apoyoDetalle" class="form-label">¿De quién?</label>
  <select class="form-select" id="apoyoDetalle" name="apoyoDetalle2">
    <option value="">Selecciona una Opcion</option>
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
</script>




<h4>Informacion de Referencia</h4>
        <hr class="my-4">




<div class="col-sm-6">
  <label class="form-label">¿Cómo se enteró de GESMUJER?</label>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="enteroGESMUJER2" id="iniciativa" value="Acudió por iniciativa propia">
    <label class="form-check-label" for="iniciativa">Acudió por iniciativa propia</label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="enteroGESMUJER2" id="recomendacion" value="Recomendación de familiar o amistad">
    <label class="form-check-label" for="recomendacion">Recomendación de familiar o amistad</label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="enteroGESMUJER2" id="canalizada" value="Canalizada por institución">
    <label class="form-check-label" for="canalizada">Canalizada por institución</label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="enteroGESMUJER2" id="redes" value="Redes sociales">
    <label class="form-check-label" for="redes">Redes sociales</label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="enteroGESMUJER2" id="otro" value="Otro">
    <label class="form-check-label" for="otro">Otro</label>
  </div>
</div>














   
    




   

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
  <textarea class="form-control" id="descripcionSolicitud" name="descripcionSolicitud2" rows="4" placeholder="Describa brevemente el motivo de su solicitud..."></textarea>
</div>




    <div class="alert alert-info mt-3" role="alert">
    Recuerde explicar a la usuaria los pasos a seguir para su intervención, sus derechos y la importancia de su colaboración durante todo el proceso.
  </div>
    <div class="col-sm-12">
    <div>
    <button class="w-100 btn btn-primary btn-lg" type="submit"  >Registrar Usuario</button>
    </div>
    </div>

    </div>

            <hr class="my-4">

    
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
        

// Esta función se llama desde la ventana emergente para cerrarla después de enviar el formulario


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
        
        
        