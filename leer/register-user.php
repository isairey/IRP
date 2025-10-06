<?php
require_once __DIR__ . '/../db/config.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Procesar los archivos subidos
    $rutaCURP = $_FILES['rutaCURP']['name'];
    $rutaINE = $_FILES['rutaINE']['name'];
    $rutaComDomicilio = $_FILES['rutaComDomicilio']['name'];

    $carpeta_destino = '../../uploads/documents';  // Ruta donde guardar los archivos subidos
    move_uploaded_file($_FILES['rutaCURP']['tmp_name'], $carpeta_destino . $rutaCURP);
    move_uploaded_file($_FILES['rutaINE']['tmp_name'], $carpeta_destino . $rutaINE);
    move_uploaded_file($_FILES['rutaComDomicilio']['tmp_name'], $carpeta_destino . $rutaComDomicilio);

    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellidoPaterno = $_POST['apellidoPaterno'];
    $apellidoMaterno = $_POST['apellidoMaterno'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $sexo = $_POST['sexo'];
    $lugarNacimiento = $_POST['lugarNacimiento'];
    $indigena = $_POST['indigena'];
    $lenguaMaterna = $_POST['lenguaMaterna'];
    $hablaLenguaIndigena = $_POST['hablaLenguaIndigena'];
    $lenguaIndigena = $_POST['lenguaIndigena'];
    $escolaridad = $_POST['escolaridad'];
    $orientacionSexual = $_POST['orientacionSexual'];
    $discapacidad = $_POST['discapacidad'];
    $decendencia = $_POST['decendencia'];
    $numDecendencia = $_POST['numDecendencia'];
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
    $banioDentro = $_POST['banioDentro'];
    $TipoBano = $_POST['TipoBano'];
    $personasCasa = $_POST['personasCasa'];
    $personasDormitorio = $_POST['personasDormitorio'];
    $tipoVivienda = $_POST['tipoVivienda'];
    $comoSeEntero = $_POST['comoSeEntero'];
    $parejaTrabaja = $_POST['parejaTrabaja'];
    $dondeTrabajaPareja = $_POST['dondeTrabajaPareja'];
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
    $tipoDenuncia = $_POST['tipoDenuncia'];
    $ingresadoPrision = $_POST['ingresadoPrision'];
    $valoracionRiesgo = $_POST['valoracionRiesgo'];
    $canalizacion = $_POST['canalizacion'];
    $canalizacionExterna = $_POST['canalizacionExterna'];
    $canalizacionInterna = $_POST['canalizacionInterna'];
    $auxiliosPsicologicos = $_POST['auxiliosPsicologicos'];

    // Preparar la consulta SQL para insertar los datos en la tabla Usuario
    $sql = "INSERT INTO Usuario (Nombre, ApellidoPaterno, ApellidoMaterno, FechaNacimiento, Sexo, LugarNacimiento, Indigena, LenguaMaterna, HablaLenguaIndigena, LenguaIndigena, Escolaridad, OrientacionSexual, Discapacidad, Decendencia, NumDecendencia, Calle, NumInterior, NumExterior, CP, Estado, Municipio, Colonia, Region, CallePC, NumInteriorPC, NumExteriorPC, CPPC, EstadoPC, MunicipioPC, ColoniaPC, RegionPC, TelCelular, TelFijo, TelConfianza, Email, EmailRespaldo, CURP, INE, RutaCURP, RutaINE, RutaComDomicilio, Ocupacion, FuenteIngresos, SectorEconomico, HorasTrabajo, IngresosDiarios, TipoEnergia, Agua, MaterialPiso, TipoServicioAgua, MaterialVivienda, BanioDentro, TipoBano, PersonasCasa, PersonasDormitorio, TipoVivienda, ComoSeEntero, ParejaTrabaja, DondeTrabajaPareja, SituacionUsuaria, RelacionAgresora, TipoRelacion, ViveConPareja, TiempoViviendoPareja, chantajeado, comochantajeado, ParejaCelosa, UtilizaHijos, Consumidora, Agresion, IncrementoAgresiones, AtencionMedica, AmenazadaConArmas, IntentoAhorcar, SienteTemorVida, PoseeArmaFuego, Denuncia, TipoDenuncia, IngresadoPrision, ValoracionRiesgo, Canalizacion, CanalizacionExterna, CanalizacionInterna, AuxiliosPsicologicos) 
            VALUES ('$nombre', '$apellidoPaterno', '$apellidoMaterno', '$fechaNacimiento', '$sexo', '$lugarNacimiento', '$indigena', '$lenguaMaterna', '$hablaLenguaIndigena', '$lenguaIndigena', '$escolaridad', '$orientacionSexual', '$discapacidad', '$decendencia', '$numDecendencia', '$calle', $numInterior, $numExterior, $cp, '$estado', '$municipio', '$colonia', '$region', '$callePC', $numInteriorPC, $numExteriorPC, $cppc, '$estadoPC', '$municipioPC', '$coloniaPC', '$regionPC', $telCelular, $telFijo, $telConfianza, '$email', '$emailRespaldo', '$curp', '$ine', '$rutaCURP', '$rutaINE', '$rutaComDomicilio', '$ocupacion', '$fuenteIngresos', '$sectorEconomico', $horasTrabajo, $ingresosDiarios, '$tipoEnergia', '$agua', '$materialPiso', '$tipoServicioAgua', '$materialVivienda', '$banioDentro', '$TipoBano', $personasCasa, $personasDormitorio, '$tipoVivienda', '$comoSeEntero', '$parejaTrabaja', '$dondeTrabajaPareja', '$situacionUsuaria', '$relacionAgresora', '$tipoRelacion', '$viveConPareja', $tiempoViviendoPareja, '$chantajeado', '$comochantajeado', '$parejaCelosa', '$utilizaHijos', '$consumidora', '$agresion', '$incrementoAgresiones', '$atencionMedica', '$amenazadaConArmas', '$intentoAhorcar', '$sienteTemorVida', '$poseeArmaFuego', '$denuncia', '$tipoDenuncia', '$ingresadoPrision', '$valoracionRiesgo', '$canalizacion', '$canalizacionExterna', '$canalizacionInterna', '$auxiliosPsicologicos')";

// Preparar y ejecutar la consulta SQL
try {
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    echo "Datos insertados correctamente";
} catch (PDOException $e) {
    echo "Error al ejecutar la consulta: " . $e->getMessage();
}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Usuario</title>
</head>
<body>
    <form action="register-user.php" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="apellidoPaterno">Apellido Paterno:</label>
        <input type="text" id="apellidoPaterno" name="apellidoPaterno" required><br>

        <label for="apellidoMaterno">Apellido Materno:</label>
        <input type="text" id="apellidoMaterno" name="apellidoMaterno" required><br>

        <label for="fechaNacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fechaNacimiento" name="fechaNacimiento" required><br>

        <label for="sexo">Sexo:</label>
        <select id="sexo" name="sexo" required>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
            <option value="Otro">Otro</option>
        </select><br>

        <label for="lugarNacimiento">Lugar de Nacimiento:</label>
        <input type="text" id="lugarNacimiento" name="lugarNacimiento" required><br>

        <label for="indigena">Se considera Indígena:</label>
        <select id="indigena" name="indigena">
            <option value="SI">Si</option>
            <option value="NO">No</option>
        </select><br>

        <label for="lenguaMaterna">Lengua Materna:</label>
        <input type="text" id="lenguaMaterna" name="lenguaMaterna"><br>

    <label for="hablaLenguaIndigena">Habla Lengua Indígena:</label>
    <select id="hablaLenguaIndigena" name="hablaLenguaIndigena">
            <option value="SI">Si</option>
            <option value="NO">No</option>
        </select><br>

    <label for="lenguaIndigena">¿Cual?:</label>
    <input type="text" id="lenguaIndigena" name="lenguaIndigena"><br>

    <label for="escolaridad">Escolaridad:</label>
    <input type="text" id="escolaridad" name="escolaridad"><br>

    <label for="orientacionSexual">Orientación Sexual:</label>
    <input type="text" id="orientacionSexual" name="orientacionSexual"><br>

    <label for="discapacidad">Discapacidad:</label>
    <input type="text" id="discapacidad" name="discapacidad"><br>

    <label for="decendencia">Tiene Hijos:</label>
    <select id="decendencia" name="decendencia">
            <option value="SI">Si</option>
            <option value="NO">No</option>
        </select><br>

    <label for="numDecendencia">numero de decendencia:</label>
    <input type="text" id="numDecendencia" name="numDecendencia"><br>

    <h2>Datos de Ubicación</h2>

    <label for="calle">Calle:</label>
    <input type="text" id="calle" name="calle" required><br>

    <label for="numInterior">Número interior:</label>
    <input type="text" id="numInterior" name="numInterior"><br>

    <label for="numExterior">Número exterior:</label>
    <input type="text" id="numExterior" name="numExterior" required><br>

    <label for="cp">Código Postal (CP):</label>
    <input type="text" id="cp" name="cp" required><br>

    <label for="estado">Estado:</label>
    <input type="text" id="estado" name="estado" required><br>

    <label for="municipio">Municipio:</label>
    <input type="text" id="municipio" name="municipio" required><br>

    <label for="colonia">Colonia:</label>
    <input type="text" id="colonia" name="colonia" required><br>

    <label for="region">Región:</label>
    <input type="text" id="region" name="region"><br>

    <h2>Domicilio de persona de confianza</h2>
    <label for="callePC">calle:</label>
    <input type="text" id="callePC" name="callePC"><br>

    <label for="numInteriorPC">Numero de Interior:</label>
    <input type="text" id="numInteriorPC" name="numInteriorPC"><br>

    <label for="numExteriorPC">Numero de exterior:</label>
    <input type="text" id="numExteriorPC" name="numExteriorPC"><br>

    <label for="cppc">cp :</label>
    <input type="text" id="cppc" name="cppc"><br>

    <label for="estadoPC">estado:</label>
    <input type="text" id="estadoPC" name="estadoPC"><br>

    <label for="municipioPC">municipio :</label>
    <input type="text" id="municipioPC" name="municipioPC"><br>

    <label for="coloniaPC">colonia :</label>
    <input type="text" id="coloniaPC" name="coloniaPC"><br>

    <label for="regionPC">region:</label>
    <input type="text" id="regionPC" name="regionPC"><br>

    <h2>Datos de Contacto</h2>

    <label for="telCelular">Teléfono celular:</label>
    <input type="text" id="telCelular" name="telCelular" required><br>

    <label for="telFijo">Teléfono fijo:</label>
    <input type="text" id="telFijo" name="telFijo"><br>

    <label for="telConfianza">Teléfono de confianza:</label>
    <input type="text" id="telConfianza" name="telConfianza"><br>

    <label for="email">Correo electrónico:</label>
    <input type="email" id="email" name="email" required><br>

    <label for="emailRespaldo">Correo electrónico de respaldo:</label>
    <input type="email" id="emailRespaldo" name="emailRespaldo"><br>

    <h2>Documentación</h2>

    <label for="curp">CURP:</label>
    <input type="text" id="curp" name="curp" required><br>

    <label for="ine">INE:</label>
    <input type="text" id="ine" name="ine" required><br>

    <label for="rutaCURP">Documento CURP:</label><br>
    <input type="file" name="rutaCURP" id="rutaCURP"><br><br>

    <label for="rutaINE">Documento INE:</label><br>
    <input type="file" name="rutaINE" id="rutaINE"><br><br>

    <label for="rutaComDomicilio">Comprobante de Domicilio:</label><br>
    <input type="file" name="rutaComDomicilio" id="rutaComDomicilio"><br><br>

    <h2>Datos Socioeconómicos</h2>

    <label for="ocupacion">Ocupación:</label>
    <input type="text" id="ocupacion" name="ocupacion" required><br>

    <label for="fuenteIngresos">Fuente de ingresos:</label>
    <input type="text" id="fuenteIngresos" name="fuenteIngresos" required><br>

    <label for="sectorEconomico">Sector económico:</label>
    <input type="text" id="sectorEconomico" name="sectorEconomico" required><br>

    <label for="horasTrabajo">Horas de trabajo:</label>
    <input type="number" id="horasTrabajo" name="horasTrabajo" required><br>

    <label for="ingresosDiarios">Ingresos diarios:</label>
    <input type="number" id="ingresosDiarios" name="ingresosDiarios" required><br>

    <h2>Vivienda</h2>

    <label for="tipoEnergia">Tipo de energía:</label>
    <input type="text" id="tipoEnergia" name="tipoEnergia" required><br>

    <label for="agua">Agua:</label>
    <select id="agua" name="agua" required>
            <option value="SI">Si</option>
            <option value="NO">No</option>
        </select><br>

    <label for="materialPiso">Material del piso:</label>
    <input type="text" id="materialPiso" name="materialPiso" required><br>

    <label for="tipoServicioAgua">Tipo de servicio de agua:</label>
    <input type="text" id="tipoServicioAgua" name="tipoServicioAgua" required><br>

    <label for="materialVivienda">Material de la vivienda:</label>
    <input type="text" id="materialVivienda" name="materialVivienda" required><br>

    <label for="banioDentro">Baño dentro:</label>
    <select id="banioDentro" name="banioDentro">
            <option value="SI">Si</option>
            <option value="NO">No</option>
        </select><br>

    <label for="TipoBano">Tipo Baño:</label>
    <select id="TipoBano" name="TipoBano">
            <option value="SI">Drenaje</option>
            <option value="NO">Aire libre</option>
        </select><br>

    <label for="personasCasa">Personas en la casa:</label>
    <input type="number" id="personasCasa" name="personasCasa" required><br>

    <label for="personasDormitorio">Personas en el dormitorio:</label>
    <input type="number" id="personasDormitorio" name="personasDormitorio" required><br>

    <label for="tipoVivienda">Tipo de vivienda:</label>
    <input type="text" id="tipoVivienda" name="tipoVivienda" required><br>

    <h2>Violencia</h2>

    <label for="comoSeEntero">¿Cómo se enteró del programa?:</label>
    <input type="text" id="comoSeEntero" name="comoSeEntero" required><br>

    <label for="parejaTrabaja">¿Su pareja trabaja?:</label>
    <select id="parejaTrabaja" name="parejaTrabaja">
            <option value="SI">Si</option>
            <option value="NO">No</option>
        </select><br>

    <label for="dondeTrabajaPareja">¿Dónde trabaja su pareja?:</label>
    <input type="text" id="dondeTrabajaPareja" name="dondeTrabajaPareja"><br>

    <label for="situacionUsuaria">Situación de la usuaria:</label>
    <input type="text" id="situacionUsuaria" name="situacionUsuaria" required><br>

    <label for="relacionAgresora">¿La relación con el agresor es actual?:</label>
    <select id="relacionAgresora" name="relacionAgresora">
        <option value="SI">Si</option>
            <option value="NO">No</option>
        </select><br>

    <label for="tipoRelacion">Tipo de relación:</label>
    <input type="text" id="tipoRelacion" name="tipoRelacion" required><br>

    <label for="viveConPareja">¿Vive con la pareja?:</label>
    <select id="viveConPareja" name="viveConPareja">
            <option value="SI">Si</option>
            <option value="NO">No</option>
        </select><br>

    <label for="tiempoViviendoPareja">Tiempo viviendo con la pareja:</label>
    <input type="number" id="tiempoViviendoPareja" name="tiempoViviendoPareja" required><br>

    <label for="chantajeado">¿La persona agresora te ha amenazado o chantajeado?</label>
    <select id="chantajeado" name="chantajeado">
            <option value="SI">Si</option>
            <option value="NO">No</option>
        </select><br>

    <label for="comochantajeado">Indica como la ha amenazado o chantajeado</label>
    <input type="text" id="comochantajeado" name="comochantajeado" required><br>

    <label for="parejaCelosa">¿Su pareja es celosa?:</label>
    <select id="parejaCelosa" name="parejaCelosa">
            <option value="SI">Si</option>
            <option value="NO">No</option>
        </select><br>

    <label for="utilizaHijos">¿Utiliza a sus hijos para controlarla?:</label>
    <select id="utilizaHijos" name="utilizaHijos">
            <option value="SI">Si</option>
            <option value="NO">No</option>
        </select><br>

    <label for="consumidora">¿Es consumidora de sustancias?:</label>
    <select id="consumidora" name="consumidora">
            <option value="SI">Si</option>
            <option value="NO">No</option>
        </select><br>

    <label for="agresion">¿Ha sufrido algún tipo de agresión?:</label>
    <select id="agresion" name="agresion">
            <option value="SI">Si</option>
            <option value="NO">No</option>
        </select><br>

    <label for="incrementoAgresiones">¿Las agresiones han aumentado en frecuencia o intensidad?:</label>
    <select id="incrementoAgresiones" name="incrementoAgresiones">
            <option value="SI">Si</option>
            <option value="NO">No</option>
        </select><br>

    <label for="atencionMedica">¿Ha recibido atención médica por las agresiones?:</label>
    <select id="atencionMedica" name="atencionMedica">
            <option value="SI">Si</option>
            <option value="NO">No</option>
        </select><br>

    <label for="amenazadaConArmas">¿Ha sido amenazada con armas?:</label>
    <select id="amenazadaConArmas" name="amenazadaConArmas">
            <option value="SI">Si</option>
            <option value="NO">No</option>
        </select><br>

    <label for="intentoAhorcar">¿Ha intentado ahorcarla?:</label>
    <select id="intentoAhorcar" name="intentoAhorcar">
            <option value="SI">Si</option>
            <option value="NO">No</option>
        </select><br>

    <label for="sienteTemorVida">¿Siente temor por su vida?:</label>
    <select id="sienteTemorVida" name="sienteTemorVida">
            <option value="SI">Si</option>
            <option value="NO">No</option>
        </select><br>

    <label for="poseeArmaFuego">¿Su pareja posee armas de fuego?:</label>
    <select id="poseeArmaFuego" name="poseeArmaFuego">
            <option value="SI">Si</option>
            <option value="NO">No</option>
        </select><br>

    <label for="denuncia"">¿Ha presentado denuncia?:</label>
    <select id="denuncia"" name="denuncia"">
            <option value="SI">Si</option>
            <option value="NO">No</option>
        </select><br>

    <label for="tipoDenuncia">Tipo de denuncia:</label>
    <input type="text" id="tipoDenuncia" name="tipoDenuncia"><br>

    <label for="ingresadoPrision">¿Su pareja ha estado en prisión?:</label>
    <select id="ingresadoPrision" name="ingresadoPrision">
            <option value="SI">Si</option>
            <option value="NO">No</option>
        </select><br>

    <h2>Valoración y Canalización</h2>

    <label for="valoracionRiesgo">Valoración de riesgo:</label>
    <input type="text" id="valoracionRiesgo" name="valoracionRiesgo" required><br>

    <label for="canalizacion">Canalización:</label>
    <input type="text" id="canalizacion" name="canalizacion" required><br>

    <label for="canalizacionExterna">Canalización externa:</label>
    <input type="text" id="canalizacionExterna" name="canalizacionExterna"><br>

    <label for="canalizacionInterna">Canalización interna:</label>
    <input type="text" id="canalizacionInterna" name="canalizacionInterna"><br>

    <label for="auxiliosPsicologicos">Auxilios psicológicos:</label>
    <input type="text" id="auxiliosPsicologicos" name="auxiliosPsicologicos"><br>


        <!-- Agrega los demás campos según corresponda con la tabla Usuario -->

        <button type="submit">Enviar</button>
    </form>
</body>
</html>
