<?php
require_once __DIR__ . '/../pages/seccion.php';

?>


<?php
require_once __DIR__ . '/../db/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se han enviado los datos del formulario
    if (isset($_POST['nombre']) 
        && isset($_POST['apellidoPaterno']) 
        && isset($_POST['apellidoMaterno']) 
        && isset($_POST['fecha_nacimiento']) 
        && isset($_POST['sexo']) 
        && isset($_POST['lugar_nacimiento']) 
        && isset($_POST['indigena']) 
        && isset($_POST['hablaLenguaIndigena']) 
        && isset($_POST['lenguaIndigena']) 
        && isset($_POST['lenguaMaterna']) 
        && isset($_POST['escolaridad']) 
        && isset($_POST['estadocivil']) 
        && isset($_POST['orientacionSexual']) 
        && isset($_POST['discapacidad']) 
        && isset($_POST['decendencia'])
        && isset($_POST['numDecendencia']) 
        && isset($_POST['calle']) 
        && isset($_POST['numInterior']) 
        && isset($_POST['numExterior']) 
        && isset($_POST['cp']) 
        && isset($_POST['estado'])
        && isset($_POST['municipio']) 
        && isset($_POST['colonia']) 
        && isset($_POST['region']) 
        && isset($_POST['callePC']) 
        && isset($_POST['numInteriorPC']) 
        && isset($_POST['numExteriorPC']) 
        && isset($_POST['cppc']) 
        && isset($_POST['estadoPC']) 
        && isset($_POST['municipioPC']) 
        && isset($_POST['coloniaPC']) 
        && isset($_POST['regionPC'])  
        && isset($_POST['telCelular']) 
        && isset($_POST['telFijo']) 
        && isset($_POST['telConfianza']) 
        && isset($_POST['email']) 
        && isset($_POST['emailRespaldo'])
        && isset($_POST['curp']) 
        && isset($_POST['ine']) 
        && isset($_POST['ocupacion']) 
        && isset($_POST['fuenteIngresos']) 
        && isset($_POST['sectorEconomico'])
        && isset($_POST['horasTrabajo']) 
        && isset($_POST['ingresosDiarios']) 
        && isset($_POST['tipoEnergia']) 
        && isset($_POST['agua']) 
        && isset($_POST['materialPiso']) 
        && isset($_POST['tipoServicioAgua']) 
        && isset($_POST['materialVivienda']) 
        && isset($_POST['banioDentro']) 
        && isset($_POST['tipoBano']) 
        && isset($_POST['personasCasa']) 
        && isset($_POST['personasDormitorio'])
        && isset($_POST['tipoVivienda']) 
        && isset($_POST['comoSeEntero'])
        && isset($_POST['parejaTrabaja']) 
        && isset($_POST['nombreAgresor']) 
        && isset($_POST['dondeTrabaja'])
        && isset($_POST['situacionUsuaria'])  
        && isset($_POST['relacionAgresora']) 
        && isset($_POST['tipoRelacion']) 
        && isset($_POST['viveConPareja']) 
        && isset($_POST['tiempoViviendoPareja']) 
        && isset($_POST['chantajeado']) 
        && isset($_POST['comochantajeado'])
        && isset($_POST['parejaCelosa']) 
        && isset($_POST['utilizaHijos']) 
        && isset($_POST['consumidora']) 
        && isset($_POST['agresion']) 
        && isset($_POST['incrementoAgresiones']) 
        && isset($_POST['atencionMedica']) 
        && isset($_POST['amenazadaConArmas']) 
        && isset($_POST['intentoAhorcar']) 
        && isset($_POST['sienteTemorVida']) 
        && isset($_POST['poseeArmaFuego']) 
        && isset($_POST['denuncia']) 
        && isset($_POST['ingresadoPrision'])
        && isset($_POST['valoracionRiesgo']) 
        && isset($_POST['canalizacion']) 
        && isset($_POST['canalizacionExterna']) 
        && isset($_POST['canalizacionInterna']) 
        && isset($_POST['auxiliosPsicologicos'])
        && isset($_POST['tipoDenuncia'])) {
        
        // Recuperar los datos del formulario
        $nombre = $_POST['nombre'];
        $apellidoPaterno = $_POST['apellidoPaterno'];
        $apellidoMaterno = $_POST['apellidoMaterno'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $sexo = $_POST['sexo'];
        $lugar_nacimiento = $_POST['lugar_nacimiento'];
        $indigena= $_POST['indigena'];
        $lenguaMaterna = $_POST['lenguaMaterna'];
        $hablaLenguaIndigena = $_POST['hablaLenguaIndigena'];
        $lenguaIndigena = $_POST['lenguaIndigena'];
        $escolaridad = $_POST['escolaridad'];
        $estadocivil = $_POST['estadocivil'];
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
        

        try {
            // Obtener el último ID registrado
            $stmt = $conn->query("SELECT MAX(id) AS max_id FROM Usuario");
            $max_id_row = $stmt->fetch(PDO::FETCH_ASSOC);
            $id = $max_id_row['max_id'];

            // Preparar la consulta SQL de actualización
            $query = "UPDATE Usuario SET Nombre = :nombre, 
            ApellidoPaterno = :apellidoPaterno, 
            ApellidoMaterno = :apellidoMaterno, 
            FechaNacimiento = :fecha_nacimiento, 
            Sexo = :sexo, 
            LugarNacimiento = :lugar_nacimiento, 
            Indigena = :indigena, 
            HablaLenguaIndigena = :hablaLenguaIndigena, 
            LenguaIndigena = :lenguaIndigena, 
            LenguaMaterna = :lenguaMaterna, 
            Escolaridad = :escolaridad, 
            Estadocivil = :estadocivil,
            OrientacionSexual = :orientacionSexual,
            Discapacidad = :discapacidad,
            Decendencia = :decendencia, 
            NumDecendencia = :numDecendencia, 
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
            BanioDentro = :banioDentro, 
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
            TipoDenuncia = :tipoDenuncia WHERE id = :id";

            // Preparar y ejecutar la consulta SQL
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellidoPaterno', $apellidoPaterno);
            $stmt->bindParam(':apellidoMaterno', $apellidoMaterno);
            $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
            $stmt->bindParam(':sexo', $sexo);
            $stmt->bindParam(':lugar_nacimiento', $lugar_nacimiento);
            $stmt->bindParam(':indigena', $indigena);
            $stmt->bindParam(':lenguaMaterna', $lenguaMaterna);
            $stmt->bindParam(':hablaLenguaIndigena', $hablaLenguaIndigena);
            $stmt->bindParam(':lenguaIndigena', $lenguaIndigena);
            $stmt->bindParam(':escolaridad', $escolaridad);
            $stmt->bindParam(':estadocivil', $estadocivil);
            $stmt->bindParam(':estadocivil', $estadocivil);
            $stmt->bindParam(':orientacionSexual', $orientacionSexual);
            $stmt->bindParam(':discapacidad', $discapacidad);
            $stmt->bindParam(':decendencia', $decendencia);
            $stmt->bindParam(':numDecendencia', $numDecendencia);
            $stmt->bindParam(':calle', $calle);
            $stmt->bindParam(':numInterior', $numInterior);
            $stmt->bindParam(':numExterior', $numExterior);
            $stmt->bindParam(':cp', $cp);
            $stmt->bindParam(':estado', $estado);
            $stmt->bindParam(':municipio', $municipio);
            $stmt->bindParam(':colonia', $colonia);
            $stmt->bindParam(':region', $region);
            $stmt->bindParam(':callePC', $callePC);
            $stmt->bindParam(':numInteriorPC', $numInteriorPC);
            $stmt->bindParam(':numExteriorPC', $numExteriorPC);
            $stmt->bindParam(':cppc', $cppc);
            $stmt->bindParam(':estadoPC', $estadoPC);
            $stmt->bindParam(':municipioPC', $municipioPC);
            $stmt->bindParam(':coloniaPC', $coloniaPC);
            $stmt->bindParam(':regionPC', $regionPC);
            $stmt->bindParam(':telCelular', $telCelular);
            $stmt->bindParam(':telFijo', $telFijo);
            $stmt->bindParam(':telConfianza', $telConfianza);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':emailRespaldo', $emailRespaldo);
            $stmt->bindParam(':curp', $curp);
            $stmt->bindParam(':ine', $ine);
            $stmt->bindParam(':ocupacion', $ocupacion);
            $stmt->bindParam(':fuenteIngresos', $fuenteIngresos);
            $stmt->bindParam(':sectorEconomico', $sectorEconomico);
            $stmt->bindParam(':horasTrabajo', $horasTrabajo);
            $stmt->bindParam(':ingresosDiarios', $ingresosDiarios);
            $stmt->bindParam(':tipoEnergia', $tipoEnergia);
            $stmt->bindParam(':agua', $agua);
            $stmt->bindParam(':materialPiso', $materialPiso);
            $stmt->bindParam(':tipoServicioAgua', $tipoServicioAgua);
            $stmt->bindParam(':materialVivienda', $materialVivienda);
            $stmt->bindParam(':banioDentro', $banioDentro);
            $stmt->bindParam(':tipoBano', $tipoBano);
            $stmt->bindParam(':personasCasa', $personasCasa);
            $stmt->bindParam(':personasDormitorio', $personasDormitorio);
            $stmt->bindParam(':tipoVivienda', $tipoVivienda);
            $stmt->bindParam(':comoSeEntero', $comoSeEntero);
            $stmt->bindParam(':parejaTrabaja', $parejaTrabaja);
            $stmt->bindParam(':nombreAgresor', $nombreAgresor);
            $stmt->bindParam(':dondeTrabaja', $dondeTrabaja);
            $stmt->bindParam(':situacionUsuaria', $situacionUsuaria);
            $stmt->bindParam(':relacionAgresora', $relacionAgresora);
            $stmt->bindParam(':tipoRelacion', $tipoRelacion);
            $stmt->bindParam(':viveConPareja', $viveConPareja);
            $stmt->bindParam(':tiempoViviendoPareja', $tiempoViviendoPareja);
            $stmt->bindParam(':chantajeado', $chantajeado);
            $stmt->bindParam(':comochantajeado', $comochantajeado);
            $stmt->bindParam(':parejaCelosa', $parejaCelosa);
            $stmt->bindParam(':utilizaHijos', $utilizaHijos);
            $stmt->bindParam(':consumidora', $consumidora);
            $stmt->bindParam(':agresion', $agresion);
            $stmt->bindParam(':incrementoAgresiones', $incrementoAgresiones);
            $stmt->bindParam(':atencionMedica', $atencionMedica);
            $stmt->bindParam(':amenazadaConArmas', $amenazadaConArmas);
            $stmt->bindParam(':intentoAhorcar', $intentoAhorcar);
            $stmt->bindParam(':sienteTemorVida', $sienteTemorVida);
            $stmt->bindParam(':poseeArmaFuego', $poseeArmaFuego);
            $stmt->bindParam(':denuncia', $denuncia);
            $stmt->bindParam(':ingresadoPrision', $ingresadoPrision);
            $stmt->bindParam(':valoracionRiesgo', $valoracionRiesgo);
            $stmt->bindParam(':canalizacion', $canalizacion);
            $stmt->bindParam(':canalizacionExterna', $canalizacionExterna);
            $stmt->bindParam(':canalizacionInterna', $canalizacionInterna);
            $stmt->bindParam(':auxiliosPsicologicos', $auxiliosPsicologicos);
            $stmt->bindParam(':tipoDenuncia', $tipoDenuncia);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            // Redirigir al usuario a la página de inicio o a donde sea apropiado
            echo '<script>window.location.href = "../pages/ver-usuaria.php";</script>';
            exit();
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
} else {
    // Si no es una solicitud POST, mostrar el formulario con los datos del usuario
    try {
        // Obtener el último ID registrado
        $stmt = $conn->query("SELECT MAX(id) AS max_id FROM Usuario");
        $max_id_row = $stmt->fetch(PDO::FETCH_ASSOC);
        $id = $max_id_row['max_id'];

        // Preparar y ejecutar la consulta SQL para obtener los datos del usuario
        $stmt = $conn->prepare("SELECT * FROM Usuario WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar si se encontró un usuario con el ID especificado
        if ($usuario) {
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
        <img class="d-block mx-auto mb-4" src="../assets/img/logo 1.png" alt="" width="72" height="57">
        <h2>Registro de nueva usuaria</h2>
        <p class="lead">Texto descriptivo.</p>
    </div>

    <div class="row g-5">
    <div class="col-xxl-12 col-xxl-12">
        <h4 class="mb-3">Datos Generales</h4>
        <!-- <form class="needs-validation" action="register-usuario.php" method="POST" enctype="multipart/form-data"  novalidate> -->
        <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
    <div class="row g-3">
            
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
    <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento:</label>
    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $usuario['FechaNacimiento']; ?>">
    <div class="invalid-feedback">Se requiere una fecha de nacimiento válida.</div>
    </div>

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

<div class="col-sm-12">
    <label class="form-label" for="lugar_nacimiento">Lugar de Nacimiento:</label><br>
    <input class="form-control" type="text" id="lugar_nacimiento" name="lugar_nacimiento" value="<?php echo $usuario['LugarNacimiento']; ?>"><br>
    <div class="invalid-feedback">Se requiere un nombre válido.</div>
    <div class="valid-feedback">Looks good!</div>
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
        <input class="form-check-input" type="radio" name="hablaLenguaIndigena" id="exampleRadios1" value="SI"onclick="showLanguageInput()" <?php if($usuario['HablaLenguaIndigena'] == 'SI') echo 'checked'; ?>>
        <label class="form-check-label" for="exampleRadios1">SI</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="hablaLenguaIndigena" id="exampleRadios2" value="NO" onclick="hideLanguageInput()" <?php if($usuario['HablaLenguaIndigena'] == 'NO') echo 'checked'; ?>>
        <label class="form-check-label" for="exampleRadios2">NO</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="hablaLenguaIndigena" id="indigenaopcion3" value="SIN DATOS" onclick="hideLanguageInput()" <?php if($usuario['HablaLenguaIndigena'] == 'SIN DATOS') echo 'checked'; ?>>
        <label class="form-check-label" for="indigenaopcion3">SIN DATOS</label>
    </div>
    </div>

    <div class="col-sm-6" id="languageInput" style="display: none;">
        <label for="lenguaIndigena" class="form-label">¿Cuál?</label>
        <input type="text" class="form-control" id="lenguaIndigena" name="lenguaIndigena" value="<?php echo $usuario['LenguaIndigena']; ?>"><br>
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

<div class="col-sm-6">
    <label for="orientacionSexual" class="form-label">Orientación Sexual</label>
    <select class="form-select" id="orientacionSexual" name="orientacionSexual" aria-label="Selecciona una opción">
        <option <?php if ($usuario['OrientacionSexual'] == '') echo 'selected'; ?> disabled value="">Selecciona una opción...</option>
        <option <?php if ($usuario['OrientacionSexual'] == 'HETEROSEXUAL') echo 'selected'; ?> value="HETEROSEXUAL">HETEROSEXUAL</option>
        <option <?php if ($usuario['OrientacionSexual'] == 'LESBIANA') echo 'selected'; ?> value="LESBIANA">LESBIANA</option>
        <option <?php if ($usuario['OrientacionSexual'] == 'BISEXUAL') echo 'selected'; ?> value="BISEXUAL">BISEXUAL</option>
        <option <?php if ($usuario['OrientacionSexual'] == 'OTRA') echo 'selected'; ?> value="OTRA">OTRA</option>
        <option <?php if ($usuario['OrientacionSexual'] == 'SIN DATOS') echo 'selected'; ?> value="SIN DATOS">SIN DATOS</option>
    </select>
    <div class="invalid-feedback">Se requiere una selección válida.</div>
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
        <label class="form-label">¿Tiene Hijos e Hijas?</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="decendencia" id="hijos1" value="SI" <?php if($usuario['Decendencia'] == "SI") echo 'checked="checked"'; ?>  onclick="showHijosInput()">
        <label class="form-check-label" for="exampleRadios1">SI</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="decendencia" id="hijos2" value="NO" <?php if($usuario['Decendencia'] == "NO") echo 'checked="checked"'; ?> onclick="hideHijosInput()">
        <label class="form-check-label" for="exampleRadios2">NO</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="decendencia" id="indigenaopcion3" value="SIN DATOS" <?php if($usuario['Decendencia'] == 'SIN DATOS') echo 'checked'; ?> onclick="hideHijosInput()">
        <label class="form-check-label" for="indigenaopcion3">SIN DATOS</label>
    </div>
    </div>

    <div class="col-sm-6" id="HijosInput" style="display: none;">
        <label for="numDecendencia" class="form-label">¿Cuantos?</label>
        <input type="number" min="0" max="15" class="form-control" id="numDecendencia" name="numDecendencia" value="<?php echo $usuario['NumDecendencia']; ?>"><br>
        <div class="invalid-feedback">Se requiere un número válido.</div>
        <div>
        <button class="w-100 btn btn-primary btn-lg" type="button"  onclick="openPopup()">Registrar</button>
        </div>
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

    <div class="col-sm-6">
        <label for="cp" class="form-label">Código Postal (CP)</label>
        <input type="number" max="100000" min="0"  class="form-control" id="cp" name="cp" value="<?php echo $usuario['CP']; ?>"><br>
    <div class="invalid-feedback">Se requiere un código postal válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="estado" class="form-label">Estado</label>
        <input type="text" class="form-control" id="estado" name="estado" value="<?php echo $usuario['Estado']; ?>"><br>
        <div class="invalid-feedback">Se requiere un estado válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="municipio" class="form-label">Municipio</label>
        <select class="form-select" id="municipioss" name="municipio" aria-label="Selecciona una opción" onchange="mostrarRegionn()">
        <option selected disabled value="">Seleccionar municipio...</option>
        <option <?php if ($usuario['Municipio'] == 'SIN DATOS') echo 'selected'; ?> value="SIN DATOS">SIN DATOS</option>
        <option <?php if ($usuario['Municipio'] == 'CUILAPAM DE GUERRERO') echo 'selected'; ?> value="CUILAPAM DE GUERRERO">CUILAPAM DE GUERRERO</option>
        <option <?php if ($usuario['Municipio'] == 'OAXACA DE JUÁREZ') echo 'selected'; ?> value="OAXACA DE JUÁREZ">OAXACA DE JUÁREZ</option>
        <option <?php if ($usuario['Municipio'] == 'SAN AGUSTIN DE LAS JUNTAS') echo 'selected'; ?> value="SAN AGUSTIN DE LAS JUNTAS">SAN AGUSTIN DE LAS JUNTAS</option>
        <option <?php if ($usuario['Municipio'] == 'SAN AGUSTIN YATARENI') echo 'selected'; ?> value="SAN AGUSTIN YATARENI">SAN AGUSTIN YATARENI</option>
        <option <?php if ($usuario['Municipio'] == 'SAN ANDRÉS HUAYAPAM') echo 'selected'; ?> value="SAN ANDRÉS HUAYAPAM">SAN ANDRÉS HUAYAPAM</option>
        <option <?php if ($usuario['Municipio'] == 'SAN ANDRÉS IXTLAHUACA') echo 'selected'; ?> value="SAN ANDRÉS IXTLAHUACA">SAN ANDRÉS IXTLAHUACA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN ANTONIO DE LA CAL') echo 'selected'; ?> value="SAN ANTONIO DE LA CAL">SAN ANTONIO DE LA CAL</option>
        <option <?php if ($usuario['Municipio'] == 'SAN BARTOLO COYOTEPEC') echo 'selected'; ?> value="SAN BARTOLO COYOTEPEC">SAN BARTOLO COYOTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JACINTO AMILPAS') echo 'selected'; ?> value="SAN JACINTO AMILPAS">SAN JACINTO AMILPAS</option>
        <option <?php if ($usuario['Municipio'] == 'ANIMAS TRUJANO') echo 'selected'; ?> value="ANIMAS TRUJANO">ANIMAS TRUJANO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PEDRO IXTLAHUACA') echo 'selected'; ?> value="SAN PEDRO IXTLAHUACA">SAN PEDRO IXTLAHUACA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN RAYMUNDO JALPAN') echo 'selected'; ?> value="SAN RAYMUNDO JALPAN">SAN RAYMUNDO JALPAN</option>
        <option <?php if ($usuario['Municipio'] == 'SAN SEBASTIÁN TUTLA') echo 'selected'; ?> value="SAN SEBASTIÁN TUTLA">SAN SEBASTIÁN TUTLA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA CRUZ AMILPAS') echo 'selected'; ?> value="SANTA CRUZ AMILPAS">SANTA CRUZ AMILPAS</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA CRUZ XOXOCOTLAN') echo 'selected'; ?> value="SANTA CRUZ XOXOCOTLAN">SANTA CRUZ XOXOCOTLAN</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA LUCIA DEL CAMINO') echo 'selected'; ?> value="SANTA LUCIA DEL CAMINO">SANTA LUCIA DEL CAMINO</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA ATZOMPA') echo 'selected'; ?> value="SANTA MARÍA ATZOMPA">SANTA MARÍA ATZOMPA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA COYOTEPEC') echo 'selected'; ?> value="SANTA MARÍA COYOTEPEC">SANTA MARÍA COYOTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA EL TULE') echo 'selected'; ?> value="SANTA MARÍA EL TULE">SANTA MARÍA EL TULE</option>
        <option <?php if ($usuario['Municipio'] == 'SANTO DOMINGO TOMALTEPEC') echo 'selected'; ?> value="SANTO DOMINGO TOMALTEPEC">SANTO DOMINGO TOMALTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'TLALIXTAC DE CABRERA') echo 'selected'; ?> value="TLALIXTAC DE CABRERA">TLALIXTAC DE CABRERA</option>
        <option <?php if ($usuario['Municipio'] == 'COATECAS ALTAS') echo 'selected'; ?> value="COATECAS ALTAS">COATECAS ALTAS</option>
        <option <?php if ($usuario['Municipio'] == 'LA COMPAÑÍA') echo 'selected'; ?> value="LA COMPAÑÍA">LA COMPAÑÍA</option>
        <option <?php if ($usuario['Municipio'] == 'HEROICA CD. DE EJUTLA DE CRESPO') echo 'selected'; ?> value="HEROICA CD. DE EJUTLA DE CRESPO">HEROICA CD. DE EJUTLA DE CRESPO</option>
        <option <?php if ($usuario['Municipio'] == 'LA PE') echo 'selected'; ?> value="LA PE">LA PE</option>
        <option <?php if ($usuario['Municipio'] == 'SAN AGUSTIN AMATENGO') echo 'selected'; ?> value="SAN AGUSTIN AMATENGO">SAN AGUSTIN AMATENGO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN ANDRÉS ZABACHE') echo 'selected'; ?> value="SAN ANDRÉS ZABACHE">SAN ANDRÉS ZABACHE</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN LACHIGALLA') echo 'selected'; ?> value="SAN JUAN LACHIGALLA">SAN JUAN LACHIGALLA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MARTIN DE LOS CANSECOS') echo 'selected'; ?> value="SAN MARTIN DE LOS CANSECOS">SAN MARTIN DE LOS CANSECOS</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MARTIN LACHILA') echo 'selected'; ?> value="SAN MARTIN LACHILA">SAN MARTIN LACHILA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MIGUEL EJUTLA') echo 'selected'; ?> value="SAN MIGUEL EJUTLA">SAN MIGUEL EJUTLA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN VICENTE COATLAN') echo 'selected'; ?> value="SAN VICENTE COATLAN">SAN VICENTE COATLAN</option>
        <option <?php if ($usuario['Municipio'] == 'TANICHE') echo 'selected'; ?> value="TANICHE">TANICHE</option>
        <option <?php if ($usuario['Municipio'] == 'YOGANA') echo 'selected'; ?> value="YOGANA">YOGANA</option>
        <option <?php if ($usuario['Municipio'] == 'GUADALUPE ETLA') echo 'selected'; ?> value="GUADALUPE ETLA">GUADALUPE ETLA</option>
        <option <?php if ($usuario['Municipio'] == 'MAGDALENA APASCO') echo 'selected'; ?> value="MAGDALENA APASCO">MAGDALENA APASCO</option>
        <option <?php if ($usuario['Municipio'] == 'NAZARENO ETLA') echo 'selected'; ?> value="NAZARENO ETLA">NAZARENO ETLA</option>
        <option <?php if ($usuario['Municipio'] == 'REYES ETLA') echo 'selected'; ?> value="REYES ETLA">REYES ETLA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN AGUSTÍN ETLA') echo 'selected'; ?> value="SAN AGUSTÍN ETLA">SAN AGUSTÍN ETLA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN ANDRÉS ZAUTLA') echo 'selected'; ?> value="SAN ANDRÉS ZAUTLA">SAN ANDRÉS ZAUTLA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN FELIPE TEJALAPAM') echo 'selected'; ?> value="SAN FELIPE TEJALAPAM">SAN FELIPE TEJALAPAM</option>
        <option <?php if ($usuario['Municipio'] == 'SAN FRANCISCO TELIXTLAHUACA') echo 'selected'; ?> value="SAN FRANCISCO TELIXTLAHUACA">SAN FRANCISCO TELIXTLAHUACA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JERÓNIMO SOSOLA') echo 'selected'; ?> value="SAN JERÓNIMO SOSOLA">SAN JERÓNIMO SOSOLA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN BAUTISTA ATATLAUCA') echo 'selected'; ?> value="SAN JUAN BAUTISTA ATATLAUCA">SAN JUAN BAUTISTA ATATLAUCA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN BAUTISTA GUELACHE') echo 'selected'; ?> value="SAN JUAN BAUTISTA GUELACHE">SAN JUAN BAUTISTA GUELACHE</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN BAUTISTA JAYACATLAN') echo 'selected'; ?> value="SAN JUAN BAUTISTA JAYACATLAN">SAN JUAN BAUTISTA JAYACATLAN</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN DEL ESTADO') echo 'selected'; ?> value="SAN JUAN DEL ESTADO">SAN JUAN DEL ESTADO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN LORENZO CACAOTEPEC') echo 'selected'; ?> value="SAN LORENZO CACAOTEPEC">SAN LORENZO CACAOTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PABLO ETLA') echo 'selected'; ?> value="SAN PABLO ETLA">SAN PABLO ETLA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PABLO HUITZO') echo 'selected'; ?> value="SAN PABLO HUITZO">SAN PABLO HUITZO</option>
        <option <?php if ($usuario['Municipio'] == 'VILLA DE ETLA') echo 'selected'; ?> value="VILLA DE ETLA">VILLA DE ETLA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA PEÑOLES') echo 'selected'; ?> value="SANTA MARÍA PEÑOLES">SANTA MARÍA PEÑOLES</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO SUCHILQUITONGO') echo 'selected'; ?> value="SANTIAGO SUCHILQUITONGO">SANTIAGO SUCHILQUITONGO</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO TENANGO') echo 'selected'; ?> value="SANTIAGO TENANGO">SANTIAGO TENANGO</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO TLASOYALTEPEC') echo 'selected'; ?> value="SANTIAGO TLASOYALTEPEC">SANTIAGO TLASOYALTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SANTO TOMÁS MAZALTEPEC') echo 'selected'; ?> value="SANTO TOMÁS MAZALTEPEC">SANTO TOMÁS MAZALTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SOLEDAD ETLA') echo 'selected'; ?> value="SOLEDAD ETLA">SOLEDAD ETLA</option>
        <option <?php if ($usuario['Municipio'] == 'ASUNCIÓN OCOTLÁN') echo 'selected'; ?> value="ASUNCIÓN OCOTLÁN">ASUNCIÓN OCOTLÁN</option>
        <option <?php if ($usuario['Municipio'] == 'MAGDALENA OCOTLAN') echo 'selected'; ?> value="MAGDALENA OCOTLAN">MAGDALENA OCOTLAN</option>
        <option <?php if ($usuario['Municipio'] == 'OCOTLAN DE MORELOS') echo 'selected'; ?> value="OCOTLAN DE MORELOS">OCOTLAN DE MORELOS</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JOSÉ DEL PROGRESO') echo 'selected'; ?> value="SAN JOSÉ DEL PROGRESO">SAN JOSÉ DEL PROGRESO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN ANTONINO CASTILLO VELASCO') echo 'selected'; ?> value="SAN ANTONINO CASTILLO VELASCO">SAN ANTONINO CASTILLO VELASCO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN BALTAZAR CHICHICAPAM') echo 'selected'; ?> value="SAN BALTAZAR CHICHICAPAM">SAN BALTAZAR CHICHICAPAM</option>
        <option <?php if ($usuario['Municipio'] == 'SAN DIONISIO OCOTLAN') echo 'selected'; ?> value="SAN DIONISIO OCOTLAN">SAN DIONISIO OCOTLAN</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JERÓNIMO TAVICHE') echo 'selected'; ?> value="SAN JERÓNIMO TAVICHE">SAN JERÓNIMO TAVICHE</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN CHILATECA') echo 'selected'; ?> value="SAN JUAN CHILATECA">SAN JUAN CHILATECA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MARTÍN TILCAJETE') echo 'selected'; ?> value="SAN MARTÍN TILCAJETE">SAN MARTÍN TILCAJETE</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MIGUEL TILQUIAPAM') echo 'selected'; ?> value="SAN MIGUEL TILQUIAPAM">SAN MIGUEL TILQUIAPAM</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PEDRO APÓSTOL') echo 'selected'; ?> value="SAN PEDRO APÓSTOL">SAN PEDRO APÓSTOL</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PEDRO MARTIR') echo 'selected'; ?> value="SAN PEDRO MARTIR">SAN PEDRO MARTIR</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PEDRO TAVICHE') echo 'selected'; ?> value="SAN PEDRO TAVICHE">SAN PEDRO TAVICHE</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA ANA ZEGACHE') echo 'selected'; ?> value="SANTA ANA ZEGACHE">SANTA ANA ZEGACHE</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA CATARINA MINAS') echo 'selected'; ?> value="SANTA CATARINA MINAS">SANTA CATARINA MINAS</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA LUCIA OCOTLAN') echo 'selected'; ?> value="SANTA LUCIA OCOTLAN">SANTA LUCIA OCOTLAN</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO APÓSTOL') echo 'selected'; ?> value="SANTIAGO APÓSTOL">SANTIAGO APÓSTOL</option>
        <option <?php if ($usuario['Municipio'] == 'SANTO TOMÁS JALIEZA') echo 'selected'; ?> value="SANTO TOMÁS JALIEZA">SANTO TOMÁS JALIEZA</option>
        <option <?php if ($usuario['Municipio'] == 'YAXE') echo 'selected'; ?> value="YAXE">YAXE</option>
        <option <?php if ($usuario['Municipio'] == 'MAGDALENA TEITIPAC') echo 'selected'; ?> value="MAGDALENA TEITIPAC">MAGDALENA TEITIPAC</option>
        <option <?php if ($usuario['Municipio'] == 'ROJAS DE CUAHUTEMOC') echo 'selected'; ?> value="ROJAS DE CUAHUTEMOC">ROJAS DE CUAHUTEMOC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN BARTOLOMÉ QUIALANA') echo 'selected'; ?> value="SAN BARTOLOMÉ QUIALANA">SAN BARTOLOMÉ QUIALANA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN DIONISIO OCOTEPEC') echo 'selected'; ?> value="SAN DIONISIO OCOTEPEC">SAN DIONISIO OCOTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN FRANCISCO LACHIGOLO') echo 'selected'; ?> value="SAN FRANCISCO LACHIGOLO">SAN FRANCISCO LACHIGOLO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN DEL RIO') echo 'selected'; ?> value="SAN JUAN DEL RIO">SAN JUAN DEL RIO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN GUELAVIA') echo 'selected'; ?> value="SAN JUAN GUELAVIA">SAN JUAN GUELAVIA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN TEITIPAC') echo 'selected'; ?> value="SAN JUAN TEITIPAC">SAN JUAN TEITIPAC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN LORENZO ALBARRADAS') echo 'selected'; ?> value="SAN LORENZO ALBARRADAS">SAN LORENZO ALBARRADAS</option>
        <option <?php if ($usuario['Municipio'] == 'SAN LUCAS QUIAVINI') echo 'selected'; ?> value="SAN LUCAS QUIAVINI">SAN LUCAS QUIAVINI</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PABLO VILLA DE MITLA') echo 'selected'; ?> value="SAN PABLO VILLA DE MITLA">SAN PABLO VILLA DE MITLA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PEDRO QUIATONI') echo 'selected'; ?> value="SAN PEDRO QUIATONI">SAN PEDRO QUIATONI</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PEDRO TOTOLAPAN') echo 'selected'; ?> value="SAN PEDRO TOTOLAPAN">SAN PEDRO TOTOLAPAN</option>
        <option <?php if ($usuario['Municipio'] == 'SAN SEBASTIÁN ABASOLO') echo 'selected'; ?> value="SAN SEBASTIÁN ABASOLO">SAN SEBASTIÁN ABASOLO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN SEBASTIÁN TEITIPAC') echo 'selected'; ?> value="SAN SEBASTIÁN TEITIPAC">SAN SEBASTIÁN TEITIPAC</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA ANA DEL VALLE') echo 'selected'; ?> value="SANTA ANA DEL VALLE">SANTA ANA DEL VALLE</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA CRUZ PAPALUTLA') echo 'selected'; ?> value="SANTA CRUZ PAPALUTLA">SANTA CRUZ PAPALUTLA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA GUELACE') echo 'selected'; ?> value="SANTA MARÍA GUELACE">SANTA MARÍA GUELACE</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA ZOQUITLAN') echo 'selected'; ?> value="SANTA MARÍA ZOQUITLAN">SANTA MARÍA ZOQUITLAN</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO MATATLAN') echo 'selected'; ?> value="SANTIAGO MATATLAN">SANTIAGO MATATLAN</option>
        <option <?php if ($usuario['Municipio'] == 'SANTO DOMINGO ALBARRADAS') echo 'selected'; ?> value="SANTO DOMINGO ALBARRADAS">SANTO DOMINGO ALBARRADAS</option>
        <option <?php if ($usuario['Municipio'] == 'TEOTITLAN DEL VALLE') echo 'selected'; ?> value="TEOTITLAN DEL VALLE">TEOTITLAN DEL VALLE</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JERONIMO TLACOCHAHUAYA') echo 'selected'; ?> value="SAN JERONIMO TLACOCHAHUAYA">SAN JERONIMO TLACOCHAHUAYA</option>
        <option <?php if ($usuario['Municipio'] == 'TLACOLULA DE MATAMOROS') echo 'selected'; ?> value="TLACOLULA DE MATAMOROS">TLACOLULA DE MATAMOROS</option>
        <option <?php if ($usuario['Municipio'] == 'VILLA DE DIAZ ORDAZ') echo 'selected'; ?> value="VILLA DE DIAZ ORDAZ">VILLA DE DIAZ ORDAZ</option>
        <option <?php if ($usuario['Municipio'] == 'SAN ANTONIO HUITEPEC') echo 'selected'; ?> value="SAN ANTONIO HUITEPEC">SAN ANTONIO HUITEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MIGUEL PERAS') echo 'selected'; ?> value="SAN MIGUEL PERAS">SAN MIGUEL PERAS</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PABLO CUATRO VENADOS') echo 'selected'; ?> value="SAN PABLO CUATRO VENADOS">SAN PABLO CUATRO VENADOS</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA INES DEL MONTE') echo 'selected'; ?> value="SANTA INES DEL MONTE">SANTA INES DEL MONTE</option>
        <option <?php if ($usuario['Municipio'] == 'TRINIDAD ZAACHILA') echo 'selected'; ?> value="TRINIDAD ZAACHILA">TRINIDAD ZAACHILA</option>
        <option <?php if ($usuario['Municipio'] == 'VILLA DE ZAACHILA') echo 'selected'; ?> value="VILLA DE ZAACHILA">VILLA DE ZAACHILA</option>
        <option <?php if ($usuario['Municipio'] == 'CIÉNEGA DE ZIMATLAN') echo 'selected'; ?> value="CIÉNEGA DE ZIMATLAN">CIÉNEGA DE ZIMATLAN</option>
        <option <?php if ($usuario['Municipio'] == 'MAGDALENA MIXTEPEC') echo 'selected'; ?> value="MAGDALENA MIXTEPEC">MAGDALENA MIXTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN ANTONIO EL ALTO') echo 'selected'; ?> value="SAN ANTONIO EL ALTO">SAN ANTONIO EL ALTO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN BERNARDO MIXTEPEC') echo 'selected'; ?> value="SAN BERNARDO MIXTEPEC">SAN BERNARDO MIXTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MIGUEL MIXTEPEC') echo 'selected'; ?> value="SAN MIGUEL MIXTEPEC">SAN MIGUEL MIXTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PABLO HUIXTEPEC') echo 'selected'; ?> value="SAN PABLO HUIXTEPEC">SAN PABLO HUIXTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA ANA TLAPACOYAN') echo 'selected'; ?> value="SANTA ANA TLAPACOYAN">SANTA ANA TLAPACOYAN</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA CATARINA QUIANE') echo 'selected'; ?> value="SANTA CATARINA QUIANE">SANTA CATARINA QUIANE</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA CRUZ MIXTEPEC') echo 'selected'; ?> value="SANTA CRUZ MIXTEPEC">SANTA CRUZ MIXTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA GERTRUDIS') echo 'selected'; ?> value="SANTA GERTRUDIS">SANTA GERTRUDIS</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA INES YATZECHE') echo 'selected'; ?> value="SANTA INES YATZECHE">SANTA INES YATZECHE</option>
        <option <?php if ($usuario['Municipio'] == 'AYOQUEZCO DE ALDAMA') echo 'selected'; ?> value="AYOQUEZCO DE ALDAMA">AYOQUEZCO DE ALDAMA</option>
        <option <?php if ($usuario['Municipio'] == 'ZIMATLÁN DE ALVAREZ') echo 'selected'; ?> value="ZIMATLÁN DE ALVAREZ">ZIMATLÁN DE ALVAREZ</option>
        <option <?php if ($usuario['Municipio'] == 'MARTIRES DE TACUBAYA') echo 'selected'; ?> value="MARTIRES DE TACUBAYA">MARTIRES DE TACUBAYA</option>
        <option <?php if ($usuario['Municipio'] == 'PINOTEPA DE DON LUIS') echo 'selected'; ?> value="PINOTEPA DE DON LUIS">PINOTEPA DE DON LUIS</option>
        <option <?php if ($usuario['Municipio'] == 'SAN AGUSTIN CHAYUCO') echo 'selected'; ?> value="SAN AGUSTIN CHAYUCO">SAN AGUSTIN CHAYUCO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN ANDRÉS HUAXPALTEPEC') echo 'selected'; ?> value="SAN ANDRÉS HUAXPALTEPEC">SAN ANDRÉS HUAXPALTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN ANTONIO TEPETLAPA') echo 'selected'; ?> value="SAN ANTONIO TEPETLAPA">SAN ANTONIO TEPETLAPA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JOSE ESTANCIA GRANDE') echo 'selected'; ?> value="SAN JOSE ESTANCIA GRANDE">SAN JOSE ESTANCIA GRANDE</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN BAUTISTA LO DE SOTO') echo 'selected'; ?> value="SAN JUAN BAUTISTA LO DE SOTO">SAN JUAN BAUTISTA LO DE SOTO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN CACAHUATEPEC') echo 'selected'; ?> value="SAN JUAN CACAHUATEPEC">SAN JUAN CACAHUATEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN COLORADO') echo 'selected'; ?> value="SAN JUAN COLORADO">SAN JUAN COLORADO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN LORENZO') echo 'selected'; ?> value="SAN LORENZO">SAN LORENZO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MIGUEL TLACAMAMA') echo 'selected'; ?> value="SAN MIGUEL TLACAMAMA">SAN MIGUEL TLACAMAMA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PEDRO ATOYAC') echo 'selected'; ?> value="SAN PEDRO ATOYAC">SAN PEDRO ATOYAC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PEDRO JICAYAN') echo 'selected'; ?> value="SAN PEDRO JICAYAN">SAN PEDRO JICAYAN</option>
        <option <?php if ($usuario['Municipio'] == 'SAN SEBASTIÁN IXCAPAC') echo 'selected'; ?> value="SAN SEBASTIÁN IXCAPAC">SAN SEBASTIÁN IXCAPAC</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA CATARINA MECHOACAN') echo 'selected'; ?> value="SANTA CATARINA MECHOACAN">SANTA CATARINA MECHOACAN</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA CORTIJO') echo 'selected'; ?> value="SANTA MARÍA CORTIJO">SANTA MARÍA CORTIJO</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA HUAZOLOTITLAN') echo 'selected'; ?> value="SANTA MARÍA HUAZOLOTITLAN">SANTA MARÍA HUAZOLOTITLAN</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO IXTAYUTLA') echo 'selected'; ?> value="SANTIAGO IXTAYUTLA">SANTIAGO IXTAYUTLA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO JAMILTEPEC') echo 'selected'; ?> value="SANTIAGO JAMILTEPEC">SANTIAGO JAMILTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO LLANO GRANDE') echo 'selected'; ?> value="SANTIAGO LLANO GRANDE">SANTIAGO LLANO GRANDE</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO PINOTEPA NACIONAL') echo 'selected'; ?> value="SANTIAGO PINOTEPA NACIONAL">SANTIAGO PINOTEPA NACIONAL</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO TEPEXTLA') echo 'selected'; ?> value="SANTIAGO TEPEXTLA">SANTIAGO TEPEXTLA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO TETEPEC') echo 'selected'; ?> value="SANTIAGO TETEPEC">SANTIAGO TETEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SANTO DOMINGO ARMENTA') echo 'selected'; ?> value="SANTO DOMINGO ARMENTA">SANTO DOMINGO ARMENTA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN GABRIEL MIXTEPEC') echo 'selected'; ?> value="SAN GABRIEL MIXTEPEC">SAN GABRIEL MIXTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN LACHAO') echo 'selected'; ?> value="SAN JUAN LACHAO">SAN JUAN LACHAO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN QUIAHIJE') echo 'selected'; ?> value="SAN JUAN QUIAHIJE">SAN JUAN QUIAHIJE</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MIGUEL PANIXTLAHUACA') echo 'selected'; ?> value="SAN MIGUEL PANIXTLAHUACA">SAN MIGUEL PANIXTLAHUACA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PEDRO JUCHATENGO') echo 'selected'; ?> value="SAN PEDRO JUCHATENGO">SAN PEDRO JUCHATENGO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PEDRO MIXTEPEC') echo 'selected'; ?> value="SAN PEDRO MIXTEPEC">SAN PEDRO MIXTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'VILLA DE TUTUTEPEC DE MELCHOR OCAMPO') echo 'selected'; ?> value="VILLA DE TUTUTEPEC DE MELCHOR OCAMPO">VILLA DE TUTUTEPEC DE MELCHOR OCAMPO</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA CATARINA JUQUILA') echo 'selected'; ?> value="SANTA CATARINA JUQUILA">SANTA CATARINA JUQUILA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA TEMAXCALTEPEC') echo 'selected'; ?> value="SANTA MARÍA TEMAXCALTEPEC">SANTA MARÍA TEMAXCALTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO YAITEPEC') echo 'selected'; ?> value="SANTIAGO YAITEPEC">SANTIAGO YAITEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SANTOS REYES NOPALA') echo 'selected'; ?> value="SANTOS REYES NOPALA">SANTOS REYES NOPALA</option>
        <option <?php if ($usuario['Municipio'] == 'TATALTEPEC DE VALDES') echo 'selected'; ?> value="TATALTEPEC DE VALDES">TATALTEPEC DE VALDES</option>
        <option <?php if ($usuario['Municipio'] == 'CANDELARIA LOXICHA') echo 'selected'; ?> value="CANDELARIA LOXICHA">CANDELARIA LOXICHA</option>
        <option <?php if ($usuario['Municipio'] == 'PLUMA HIDALGO') echo 'selected'; ?> value="PLUMA HIDALGO">PLUMA HIDALGO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN AGUSTIN LOXICHA') echo 'selected'; ?> value="SAN AGUSTIN LOXICHA">SAN AGUSTIN LOXICHA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN BALTAZAR LOXICHA') echo 'selected'; ?> value="SAN BALTAZAR LOXICHA">SAN BALTAZAR LOXICHA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN BARTOLOMÉ LOXICHA') echo 'selected'; ?> value="SAN BARTOLOMÉ LOXICHA">SAN BARTOLOMÉ LOXICHA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MATEO PIÑAS') echo 'selected'; ?> value="SAN MATEO PIÑAS">SAN MATEO PIÑAS</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MIGUEL DEL PUERO') echo 'selected'; ?> value="SAN MIGUEL DEL PUERO">SAN MIGUEL DEL PUERO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PEDRO EL ALTO') echo 'selected'; ?> value="SAN PEDRO EL ALTO">SAN PEDRO EL ALTO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PEDRO POCHUTLA') echo 'selected'; ?> value="SAN PEDRO POCHUTLA">SAN PEDRO POCHUTLA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA CATARINA LOXICHA') echo 'selected'; ?> value="SANTA CATARINA LOXICHA">SANTA CATARINA LOXICHA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA COLOTEPEC') echo 'selected'; ?> value="SANTA MARÍA COLOTEPEC">SANTA MARÍA COLOTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA HUATULCO') echo 'selected'; ?> value="SANTA MARÍA HUATULCO">SANTA MARÍA HUATULCO</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA TONAMECA') echo 'selected'; ?> value="SANTA MARÍA TONAMECA">SANTA MARÍA TONAMECA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTO DOMINGO DE MORELOS') echo 'selected'; ?> value="SANTO DOMINGO DE MORELOS">SANTO DOMINGO DE MORELOS</option>
        <option <?php if ($usuario['Municipio'] == 'CONCEPCIÓN PÁPALO') echo 'selected'; ?> value="CONCEPCIÓN PÁPALO">CONCEPCIÓN PÁPALO</option>
        <option <?php if ($usuario['Municipio'] == 'CUYAMECALCO VILLA DE ZARAGOZA') echo 'selected'; ?> value="CUYAMECALCO VILLA DE ZARAGOZA">CUYAMECALCO VILLA DE ZARAGOZA</option>
        <option <?php if ($usuario['Municipio'] == 'CHIQUIHUITLAN DE BENITO JUÁREZ') echo 'selected'; ?> value="CHIQUIHUITLAN DE BENITO JUÁREZ">CHIQUIHUITLAN DE BENITO JUÁREZ</option>
        <option <?php if ($usuario['Municipio'] == 'SAN ANDRÉS TEOTILÁPAM') echo 'selected'; ?> value="SAN ANDRÉS TEOTILÁPAM">SAN ANDRÉS TEOTILÁPAM</option>
        <option <?php if ($usuario['Municipio'] == 'SAN FRANCISCO CHAPULAPA') echo 'selected'; ?> value="SAN FRANCISCO CHAPULAPA">SAN FRANCISCO CHAPULAPA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN BAUTISTA CUICATLÁN') echo 'selected'; ?> value="SAN JUAN BAUTISTA CUICATLÁN">SAN JUAN BAUTISTA CUICATLÁN</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN BAUTISTA TLACOATZINTEPEC') echo 'selected'; ?> value="SAN JUAN BAUTISTA TLACOATZINTEPEC">SAN JUAN BAUTISTA TLACOATZINTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN TEPEUXILA') echo 'selected'; ?> value="SAN JUAN TEPEUXILA">SAN JUAN TEPEUXILA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MIGUEL SANTA FLOR') echo 'selected'; ?> value="SAN MIGUEL SANTA FLOR">SAN MIGUEL SANTA FLOR</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PEDRO JALTEPETONGO') echo 'selected'; ?> value="SAN PEDRO JALTEPETONGO">SAN PEDRO JALTEPETONGO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PEDRO JOCOTIPAC') echo 'selected'; ?> value="SAN PEDRO JOCOTIPAC">SAN PEDRO JOCOTIPAC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PEDRO SOCHIAPAM') echo 'selected'; ?> value="SAN PEDRO SOCHIAPAM">SAN PEDRO SOCHIAPAM</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PEDRO TEUTILA') echo 'selected'; ?> value="SAN PEDRO TEUTILA">SAN PEDRO TEUTILA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA ANA CUAUHTÉMOC') echo 'selected'; ?> value="SANTA ANA CUAUHTÉMOC">SANTA ANA CUAUHTÉMOC</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA PÁPALO') echo 'selected'; ?> value="SANTA MARÍA PÁPALO">SANTA MARÍA PÁPALO</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA TEXCATITLÁN') echo 'selected'; ?> value="SANTA MARÍA TEXCATITLÁN">SANTA MARÍA TEXCATITLÁN</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA TLALIXTAC') echo 'selected'; ?> value="SANTA MARÍA TLALIXTAC">SANTA MARÍA TLALIXTAC</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO NACALTEPEC') echo 'selected'; ?> value="SANTIAGO NACALTEPEC">SANTIAGO NACALTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SANTOS REYES PÁPALO') echo 'selected'; ?> value="SANTOS REYES PÁPALO">SANTOS REYES PÁPALO</option>
        <option <?php if ($usuario['Municipio'] == 'VALERIO TRUJANO') echo 'selected'; ?> value="VALERIO TRUJANO">VALERIO TRUJANO</option>
        <option <?php if ($usuario['Municipio'] == 'ELOXOCHITLÁN DE FLORES MAGÓN') echo 'selected'; ?> value="ELOXOCHITLÁN DE FLORES MAGÓN">ELOXOCHITLÁN DE FLORES MAGÓN</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MIGUEL HUAUTEPEC') echo 'selected'; ?> value="SAN MIGUEL HUAUTEPEC">SAN MIGUEL HUAUTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'HUAUTLA DE JIMÉNEZ') echo 'selected'; ?> value="HUAUTLA DE JIMÉNEZ">HUAUTLA DE JIMÉNEZ</option>
        <option <?php if ($usuario['Municipio'] == 'MAZATLÁN VILLA DE FLORES') echo 'selected'; ?> value="MAZATLÁN VILLA DE FLORES">MAZATLÁN VILLA DE FLORES</option>
        <option <?php if ($usuario['Municipio'] == 'SAN ANTONIO NANAHUATIPAM') echo 'selected'; ?> value="SAN ANTONIO NANAHUATIPAM">SAN ANTONIO NANAHUATIPAM</option>
        <option <?php if ($usuario['Municipio'] == 'SAN BARTOLOMÉ AYAUTLA') echo 'selected'; ?> value="SAN BARTOLOMÉ AYAUTLA">SAN BARTOLOMÉ AYAUTLA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN FRANCISCO HUEHUETLÁN') echo 'selected'; ?> value="SAN FRANCISCO HUEHUETLÁN">SAN FRANCISCO HUEHUETLÁN</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JERÓNIMO TECOATL') echo 'selected'; ?> value="SAN JERÓNIMO TECOATL">SAN JERÓNIMO TECOATL</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JOSÉ TENANGO') echo 'selected'; ?> value="SAN JOSÉ TENANGO">SAN JOSÉ TENANGO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN COATZOSPAM') echo 'selected'; ?> value="SAN JUAN COATZOSPAM">SAN JUAN COATZOSPAM</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN DE LOS CUES') echo 'selected'; ?> value="SAN JUAN DE LOS CUES">SAN JUAN DE LOS CUES</option>
        <option <?php if ($usuario['Municipio'] == 'SAN LORENZO CUANECUILTITLA') echo 'selected'; ?> value="SAN LORENZO CUANECUILTITLA">SAN LORENZO CUANECUILTITLA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN LUCAS ZOQUIAPAM') echo 'selected'; ?> value="SAN LUCAS ZOQUIAPAM">SAN LUCAS ZOQUIAPAM</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MARTÍN TOXPALAN') echo 'selected'; ?> value="SAN MARTÍN TOXPALAN">SAN MARTÍN TOXPALAN</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MATEO YOLOXCHITLAN') echo 'selected'; ?> value="SAN MATEO YOLOXCHITLAN">SAN MATEO YOLOXCHITLAN</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PEDRO OCOPETATILLO') echo 'selected'; ?> value="SAN PEDRO OCOPETATILLO">SAN PEDRO OCOPETATILLO</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA ANA ATEIXTLAHUACA') echo 'selected'; ?> value="SANTA ANA ATEIXTLAHUACA">SANTA ANA ATEIXTLAHUACA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA CRUZ ACATEPEC') echo 'selected'; ?> value="SANTA CRUZ ACATEPEC">SANTA CRUZ ACATEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA LA ASUNCIÓN') echo 'selected'; ?> value="SANTA MARÍA LA ASUNCIÓN">SANTA MARÍA LA ASUNCIÓN</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA CHILCHOTLA') echo 'selected'; ?> value="SANTA MARÍA CHILCHOTLA">SANTA MARÍA CHILCHOTLA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA IXCATLÁN') echo 'selected'; ?> value="SANTA MARÍA IXCATLÁN">SANTA MARÍA IXCATLÁN</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA TECOMAVACA') echo 'selected'; ?> value="SANTA MARÍA TECOMAVACA">SANTA MARÍA TECOMAVACA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA TEOPOXCO') echo 'selected'; ?> value="SANTA MARÍA TEOPOXCO">SANTA MARÍA TEOPOXCO</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO TEXCALCINGO') echo 'selected'; ?> value="SANTIAGO TEXCALCINGO">SANTIAGO TEXCALCINGO</option>
        <option <?php if ($usuario['Municipio'] == 'TEOTITLAN DE FLORES MAGÓN') echo 'selected'; ?> value="TEOTITLAN DE FLORES MAGÓN">TEOTITLAN DE FLORES MAGÓN</option>
        <option <?php if ($usuario['Municipio'] == 'ASUNCIÓN IXTALTEPEC') echo 'selected'; ?> value="ASUNCIÓN IXTALTEPEC">ASUNCIÓN IXTALTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'BARRIO DE LA SOLEDAD') echo 'selected'; ?> value="BARRIO DE LA SOLEDAD">BARRIO DE LA SOLEDAD</option>
        <option <?php if ($usuario['Municipio'] == 'CIUDAD IXTEPEC') echo 'selected'; ?> value="CIUDAD IXTEPEC">CIUDAD IXTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'CHAHUITES') echo 'selected'; ?> value="CHAHUITES">CHAHUITES</option>
        <option <?php if ($usuario['Municipio'] == 'EL ESPINAL') echo 'selected'; ?> value="EL ESPINAL">EL ESPINAL</option>
        <option <?php if ($usuario['Municipio'] == 'JUCHITAN DE ZARAGOZA') echo 'selected'; ?> value="JUCHITAN DE ZARAGOZA">JUCHITAN DE ZARAGOZA</option>
        <option <?php if ($usuario['Municipio'] == 'MATIAS ROMERO') echo 'selected'; ?> value="MATIAS ROMERO">MATIAS ROMERO</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO NILTEPEC') echo 'selected'; ?> value="SANTIAGO NILTEPEC">SANTIAGO NILTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'REFORMA DE PINEDA') echo 'selected'; ?> value="REFORMA DE PINEDA">REFORMA DE PINEDA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN DIONISIO DEL MAR') echo 'selected'; ?> value="SAN DIONISIO DEL MAR">SAN DIONISIO DEL MAR</option>
        <option <?php if ($usuario['Municipio'] == 'SAN FRANCISCO DEL MAR') echo 'selected'; ?> value="SAN FRANCISCO DEL MAR">SAN FRANCISCO DEL MAR</option>
        <option <?php if ($usuario['Municipio'] == 'SAN FRANCISCO IXHUATAN') echo 'selected'; ?> value="SAN FRANCISCO IXHUATAN">SAN FRANCISCO IXHUATAN</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN GUICHICOVI') echo 'selected'; ?> value="SAN JUAN GUICHICOVI">SAN JUAN GUICHICOVI</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MIGUEL CHIMALAPA') echo 'selected'; ?> value="SAN MIGUEL CHIMALAPA">SAN MIGUEL CHIMALAPA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PEDRO TAPANATEPEC') echo 'selected'; ?> value="SAN PEDRO TAPANATEPEC">SAN PEDRO TAPANATEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA CHIMALAPA') echo 'selected'; ?> value="SANTA MARÍA CHIMALAPA">SANTA MARÍA CHIMALAPA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA PETAPA') echo 'selected'; ?> value="SANTA MARÍA PETAPA">SANTA MARÍA PETAPA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA XADANI') echo 'selected'; ?> value="SANTA MARÍA XADANI">SANTA MARÍA XADANI</option>
        <option <?php if ($usuario['Municipio'] == 'SANTO DOMINGO INGENIO') echo 'selected'; ?> value="SANTO DOMINGO INGENIO">SANTO DOMINGO INGENIO</option>
        <option <?php if ($usuario['Municipio'] == 'SANTO DOMINGO PETAPA') echo 'selected'; ?> value="SANTO DOMINGO PETAPA">SANTO DOMINGO PETAPA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTO DOMINGO ZANATEPEC') echo 'selected'; ?> value="SANTO DOMINGO ZANATEPEC">SANTO DOMINGO ZANATEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'UNIÓN HIDALGO') echo 'selected'; ?> value="UNIÓN HIDALGO">UNIÓN HIDALGO</option>
        <option <?php if ($usuario['Municipio'] == 'GUEVEA DE HUMBOLT') echo 'selected'; ?> value="GUEVEA DE HUMBOLT">GUEVEA DE HUMBOLT</option>
        <option <?php if ($usuario['Municipio'] == 'MAGDALENA TEQUISISTLAN') echo 'selected'; ?> value="MAGDALENA TEQUISISTLAN">MAGDALENA TEQUISISTLAN</option>
        <option <?php if ($usuario['Municipio'] == 'MAGDALENA TLACOTEPEC') echo 'selected'; ?> value="MAGDALENA TLACOTEPEC">MAGDALENA TLACOTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SALINA CRUZ') echo 'selected'; ?> value="SALINA CRUZ">SALINA CRUZ</option>
        <option <?php if ($usuario['Municipio'] == 'SAN BLAS ATEMPA') echo 'selected'; ?> value="SAN BLAS ATEMPA">SAN BLAS ATEMPA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MATEO DEL MAR') echo 'selected'; ?> value="SAN MATEO DEL MAR">SAN MATEO DEL MAR</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MIGUEL TENANGO') echo 'selected'; ?> value="SAN MIGUEL TENANGO">SAN MIGUEL TENANGO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PEDRO COMITANCILLO') echo 'selected'; ?> value="SAN PEDRO COMITANCILLO">SAN PEDRO COMITANCILLO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PEDRO HUAMELULA') echo 'selected'; ?> value="SAN PEDRO HUAMELULA">SAN PEDRO HUAMELULA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PEDRO HUILOTEPEC') echo 'selected'; ?> value="SAN PEDRO HUILOTEPEC">SAN PEDRO HUILOTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA GUIENAGATI') echo 'selected'; ?> value="SANTA MARÍA GUIENAGATI">SANTA MARÍA GUIENAGATI</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA JALAPA DEL MARQUEZ') echo 'selected'; ?> value="SANTA MARÍA JALAPA DEL MARQUEZ">SANTA MARÍA JALAPA DEL MARQUEZ</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA MIXTEQUILLA') echo 'selected'; ?> value="SANTA MARÍA MIXTEQUILLA">SANTA MARÍA MIXTEQUILLA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA TOTOLAPILLA') echo 'selected'; ?> value="SANTA MARÍA TOTOLAPILLA">SANTA MARÍA TOTOLAPILLA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO ASTATA') echo 'selected'; ?> value="SANTIAGO ASTATA">SANTIAGO ASTATA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO LACHIGUIRI') echo 'selected'; ?> value="SANTIAGO LACHIGUIRI">SANTIAGO LACHIGUIRI</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO LAOLLAGA') echo 'selected'; ?> value="SANTIAGO LAOLLAGA">SANTIAGO LAOLLAGA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTO DOMINGO CHIHUITAN') echo 'selected'; ?> value="SANTO DOMINGO CHIHUITAN">SANTO DOMINGO CHIHUITAN</option>
        <option <?php if ($usuario['Municipio'] == 'SANTO DOMINGO TEHUANTEPEC') echo 'selected'; ?> value="SANTO DOMINGO TEHUANTEPEC">SANTO DOMINGO TEHUANTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'CONCEPCIÓN BUENAVISTA') echo 'selected'; ?> value="CONCEPCIÓN BUENAVISTA">CONCEPCIÓN BUENAVISTA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MAGDALENA JICOTLÁN') echo 'selected'; ?> value="SANTA MAGDALENA JICOTLÁN">SANTA MAGDALENA JICOTLÁN</option>
        <option <?php if ($usuario['Municipio'] == 'SAN CRISTÓBAL SUCHIXTLAHUACA') echo 'selected'; ?> value="SAN CRISTÓBAL SUCHIXTLAHUACA">SAN CRISTÓBAL SUCHIXTLAHUACA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN FRANCISCO TEOPAN') echo 'selected'; ?> value="SAN FRANCISCO TEOPAN">SAN FRANCISCO TEOPAN</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN BAUTISTA COIXTLAHUACA') echo 'selected'; ?> value="SAN JUAN BAUTISTA COIXTLAHUACA">SAN JUAN BAUTISTA COIXTLAHUACA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MATEO TLAPILTEPEC') echo 'selected'; ?> value="SAN MATEO TLAPILTEPEC">SAN MATEO TLAPILTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MIGUEL TEQUIXTEPEC') echo 'selected'; ?> value="SAN MIGUEL TEQUIXTEPEC">SAN MIGUEL TEQUIXTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MIGUEL TULANCINGO') echo 'selected'; ?> value="SAN MIGUEL TULANCINGO">SAN MIGUEL TULANCINGO</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA NATIVITAS') echo 'selected'; ?> value="SANTA MARÍA NATIVITAS">SANTA MARÍA NATIVITAS</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO IHUITLÁN PLUMAS') echo 'selected'; ?> value="SANTIAGO IHUITLÁN PLUMAS">SANTIAGO IHUITLÁN PLUMAS</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO TEPETLAPA') echo 'selected'; ?> value="SANTIAGO TEPETLAPA">SANTIAGO TEPETLAPA</option>
        <option <?php if ($usuario['Municipio'] == 'TEPELMEME VILLA DE MORELOS') echo 'selected'; ?> value="TEPELMEME VILLA DE MORELOS">TEPELMEME VILLA DE MORELOS</option>
        <option <?php if ($usuario['Municipio'] == 'TLACOTEPEC PLUMAS') echo 'selected'; ?> value="TLACOTEPEC PLUMAS">TLACOTEPEC PLUMAS</option>
        <option <?php if ($usuario['Municipio'] == 'ASUNCIÓN CUYOTEPEJI') echo 'selected'; ?> value="ASUNCIÓN CUYOTEPEJI">ASUNCIÓN CUYOTEPEJI</option>
        <option <?php if ($usuario['Municipio'] == 'COSOLTEPEC') echo 'selected'; ?> value="COSOLTEPEC">COSOLTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'FRESNILLO DE TRUJANO') echo 'selected'; ?> value="FRESNILLO DE TRUJANO">FRESNILLO DE TRUJANO</option>
        <option <?php if ($usuario['Municipio'] == 'HUAJUAPAM DE LEÓN') echo 'selected'; ?> value="HUAJUAPAM DE LEÓN">HUAJUAPAM DE LEÓN</option>
        <option <?php if ($usuario['Municipio'] == 'MARISCALA DE JUÁREZ') echo 'selected'; ?> value="MARISCALA DE JUÁREZ">MARISCALA DE JUÁREZ</option>
        <option <?php if ($usuario['Municipio'] == 'SAN ANDRÉS DINICUITI') echo 'selected'; ?> value="SAN ANDRÉS DINICUITI">SAN ANDRÉS DINICUITI</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JERÓNIMO SILACOYOAPILLA') echo 'selected'; ?> value="SAN JERÓNIMO SILACOYOAPILLA">SAN JERÓNIMO SILACOYOAPILLA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JORGE NUCHITA') echo 'selected'; ?> value="SAN JORGE NUCHITA">SAN JORGE NUCHITA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JOSÉ AYUQUILILLA') echo 'selected'; ?> value="SAN JOSÉ AYUQUILILLA">SAN JOSÉ AYUQUILILLA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN BAUTISTA SUCHIXTEPEC') echo 'selected'; ?> value="SAN JUAN BAUTISTA SUCHIXTEPEC">SAN JUAN BAUTISTA SUCHIXTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MARCOS ARTEAGA') echo 'selected'; ?> value="SAN MARCOS ARTEAGA">SAN MARCOS ARTEAGA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MARTÍN ZACATEPEC') echo 'selected'; ?> value="SAN MARTÍN ZACATEPEC">SAN MARTÍN ZACATEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MIGUEL AMATITLÁN') echo 'selected'; ?> value="SAN MIGUEL AMATITLÁN">SAN MIGUEL AMATITLÁN</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PEDRO Y SAN PABLO TEQUIXTEPEC') echo 'selected'; ?> value="SAN PEDRO Y SAN PABLO TEQUIXTEPEC">SAN PEDRO Y SAN PABLO TEQUIXTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN SIMÓN ZAHUATLÁN') echo 'selected'; ?> value="SAN SIMÓN ZAHUATLÁN">SAN SIMÓN ZAHUATLÁN</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA CATARINA ZAPOQUILLA') echo 'selected'; ?> value="SANTA CATARINA ZAPOQUILLA">SANTA CATARINA ZAPOQUILLA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA CRUZ TACACHE DE MINA') echo 'selected'; ?> value="SANTA CRUZ TACACHE DE MINA">SANTA CRUZ TACACHE DE MINA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA CAMOTLÁN') echo 'selected'; ?> value="SANTA MARÍA CAMOTLÁN">SANTA MARÍA CAMOTLÁN</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO AYUQUILLA') echo 'selected'; ?> value="SANTIAGO AYUQUILLA">SANTIAGO AYUQUILLA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO CACALOXTEPEC') echo 'selected'; ?> value="SANTIAGO CACALOXTEPEC">SANTIAGO CACALOXTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO CHAZUMBA') echo 'selected'; ?> value="SANTIAGO CHAZUMBA">SANTIAGO CHAZUMBA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO HUAJOLOTITLÁN') echo 'selected'; ?> value="SANTIAGO HUAJOLOTITLÁN">SANTIAGO HUAJOLOTITLÁN</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO MILTEPEC') echo 'selected'; ?> value="SANTIAGO MILTEPEC">SANTIAGO MILTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SANTO DOMINGO TONALÁ') echo 'selected'; ?> value="SANTO DOMINGO TONALÁ">SANTO DOMINGO TONALÁ</option>
        <option <?php if ($usuario['Municipio'] == 'SANTO DOMINGO YODOHINO') echo 'selected'; ?> value="SANTO DOMINGO YODOHINO">SANTO DOMINGO YODOHINO</option>
        <option <?php if ($usuario['Municipio'] == 'SANTOS REYES YUCUNA') echo 'selected'; ?> value="SANTOS REYES YUCUNA">SANTOS REYES YUCUNA</option>
        <option <?php if ($usuario['Municipio'] == 'TEZOATLÁN DE SEGURA Y LUNA') echo 'selected'; ?> value="TEZOATLÁN DE SEGURA Y LUNA">TEZOATLÁN DE SEGURA Y LUNA</option>
        <option <?php if ($usuario['Municipio'] == 'ZAPOTITLÁN PALMAS') echo 'selected'; ?> value="ZAPOTITLÁN PALMAS">ZAPOTITLÁN PALMAS</option>
        <option <?php if ($usuario['Municipio'] == 'COICOYÁN DE LAS FLORES') echo 'selected'; ?> value="COICOYÁN DE LAS FLORES">COICOYÁN DE LAS FLORES</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN MIXTEPEC') echo 'selected'; ?> value="SAN JUAN MIXTEPEC">SAN JUAN MIXTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MARTÍN PERAS') echo 'selected'; ?> value="SAN MARTÍN PERAS">SAN MARTÍN PERAS</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MIGUEL TLACOTEPEC') echo 'selected'; ?> value="SAN MIGUEL TLACOTEPEC">SAN MIGUEL TLACOTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN SEBASTIÁN TECOMAXTLAHUACA') echo 'selected'; ?> value="SAN SEBASTIÁN TECOMAXTLAHUACA">SAN SEBASTIÁN TECOMAXTLAHUACA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO JUXTLAHUACA') echo 'selected'; ?> value="SANTIAGO JUXTLAHUACA">SANTIAGO JUXTLAHUACA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTOS REYES TEPEJILLO') echo 'selected'; ?> value="SANTOS REYES TEPEJILLO">SANTOS REYES TEPEJILLO</option>
        <option <?php if ($usuario['Municipio'] == 'ASUNCIÓN NOCHIXTLÁN') echo 'selected'; ?> value="ASUNCIÓN NOCHIXTLÁN">ASUNCIÓN NOCHIXTLÁN</option>
        <option <?php if ($usuario['Municipio'] == 'MAGDALENA JALTEPEC') echo 'selected'; ?> value="MAGDALENA JALTEPEC">MAGDALENA JALTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'MAGDALENA ZAHUATLÁN') echo 'selected'; ?> value="MAGDALENA ZAHUATLÁN">MAGDALENA ZAHUATLÁN</option>
        <option <?php if ($usuario['Municipio'] == 'SAN ANDRÉS NUXIÑO') echo 'selected'; ?> value="SAN ANDRÉS NUXIÑO">SAN ANDRÉS NUXIÑO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN ANDRÉS SINAXTLA') echo 'selected'; ?> value="SAN ANDRÉS SINAXTLA">SAN ANDRÉS SINAXTLA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN FRANCISCO CHINDÚA') echo 'selected'; ?> value="SAN FRANCISCO CHINDÚA">SAN FRANCISCO CHINDÚA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN FRANCISCO JALTEPETONGO') echo 'selected'; ?> value="SAN FRANCISCO JALTEPETONGO">SAN FRANCISCO JALTEPETONGO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN FRANCISCO NUXAÑO') echo 'selected'; ?> value="SAN FRANCISCO NUXAÑO">SAN FRANCISCO NUXAÑO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN DIUXI') echo 'selected'; ?> value="SAN JUAN DIUXI">SAN JUAN DIUXI</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN SAYULTEPEC') echo 'selected'; ?> value="SAN JUAN SAYULTEPEC">SAN JUAN SAYULTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN TAMAZOLA') echo 'selected'; ?> value="SAN JUAN TAMAZOLA">SAN JUAN TAMAZOLA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN YUCUITA') echo 'selected'; ?> value="SAN JUAN YUCUITA">SAN JUAN YUCUITA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MATEO ETLATONGO') echo 'selected'; ?> value="SAN MATEO ETLATONGO">SAN MATEO ETLATONGO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MATEO SINDIHUI') echo 'selected'; ?> value="SAN MATEO SINDIHUI">SAN MATEO SINDIHUI</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MIGUEL CHICAHUA') echo 'selected'; ?> value="SAN MIGUEL CHICAHUA">SAN MIGUEL CHICAHUA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MIGUEL HUATLA') echo 'selected'; ?> value="SAN MIGUEL HUATLA">SAN MIGUEL HUATLA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MIGUEL PIEDRAS') echo 'selected'; ?> value="SAN MIGUEL PIEDRAS">SAN MIGUEL PIEDRAS</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MIGUEL TECOMATLÁN') echo 'selected'; ?> value="SAN MIGUEL TECOMATLÁN">SAN MIGUEL TECOMATLÁN</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PEDRO COXCALTEPEC CÁNTAROS') echo 'selected'; ?> value="SAN PEDRO COXCALTEPEC CÁNTAROS">SAN PEDRO COXCALTEPEC CÁNTAROS</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PEDRO TEOZACOALCO') echo 'selected'; ?> value="SAN PEDRO TEOZACOALCO">SAN PEDRO TEOZACOALCO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PEDRO TIDAÁ') echo 'selected'; ?> value="SAN PEDRO TIDAÁ">SAN PEDRO TIDAÁ</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA APAZCO') echo 'selected'; ?> value="SANTA MARÍA APAZCO">SANTA MARÍA APAZCO</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA CHACHOAPAM') echo 'selected'; ?> value="SANTA MARÍA CHACHOAPAM">SANTA MARÍA CHACHOAPAM</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO APOALA') echo 'selected'; ?> value="SANTIAGO APOALA">SANTIAGO APOALA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO HUAUCLILLA') echo 'selected'; ?> value="SANTIAGO HUAUCLILLA">SANTIAGO HUAUCLILLA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO TILALTONGO') echo 'selected'; ?> value="SANTIAGO TILALTONGO">SANTIAGO TILALTONGO</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO TILLO') echo 'selected'; ?> value="SANTIAGO TILLO">SANTIAGO TILLO</option>
        <option <?php if ($usuario['Municipio'] == 'SANTO DOMINGO NUXAÁ') echo 'selected'; ?> value="SANTO DOMINGO NUXAÁ">SANTO DOMINGO NUXAÁ</option>
        <option <?php if ($usuario['Municipio'] == 'SANTO DOMINGO YANHUITLÁN') echo 'selected'; ?> value="SANTO DOMINGO YANHUITLÁN">SANTO DOMINGO YANHUITLÁN</option>
        <option <?php if ($usuario['Municipio'] == 'MAGDALENA YODOCONO DE PORFIRIO DÍAZ') echo 'selected'; ?> value="MAGDALENA YODOCONO DE PORFIRIO DÍAZ">MAGDALENA YODOCONO DE PORFIRIO DÍAZ</option>
        <option <?php if ($usuario['Municipio'] == 'YUTANDUCHI DE GUERRERO') echo 'selected'; ?> value="YUTANDUCHI DE GUERRERO">YUTANDUCHI DE GUERRERO</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA INÉS DE ZARAGOZA') echo 'selected'; ?> value="SANTA INÉS DE ZARAGOZA">SANTA INÉS DE ZARAGOZA</option>
        <option <?php if ($usuario['Municipio'] == 'CALIHUALA') echo 'selected'; ?> value="CALIHUALA">CALIHUALA</option>
        <option <?php if ($usuario['Municipio'] == 'GUADALUPE DE RAMÍREZ') echo 'selected'; ?> value="GUADALUPE DE RAMÍREZ">GUADALUPE DE RAMÍREZ</option>
        <option <?php if ($usuario['Municipio'] == 'IXPANTEPEC NIEVES') echo 'selected'; ?> value="IXPANTEPEC NIEVES">IXPANTEPEC NIEVES</option>
        <option <?php if ($usuario['Municipio'] == 'SAN AGUSTÍN ATENANGO') echo 'selected'; ?> value="SAN AGUSTÍN ATENANGO">SAN AGUSTÍN ATENANGO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN ANDRÉS TEPETLAPA') echo 'selected'; ?> value="SAN ANDRÉS TEPETLAPA">SAN ANDRÉS TEPETLAPA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN FRANCISCO TLAPANCINGO') echo 'selected'; ?> value="SAN FRANCISCO TLAPANCINGO">SAN FRANCISCO TLAPANCINGO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN BAUTISTA TLACHICHILCO') echo 'selected'; ?> value="SAN JUAN BAUTISTA TLACHICHILCO">SAN JUAN BAUTISTA TLACHICHILCO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN CIENEGUILLA') echo 'selected'; ?> value="SAN JUAN CIENEGUILLA">SAN JUAN CIENEGUILLA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN IHUALTEPEC') echo 'selected'; ?> value="SAN JUAN IHUALTEPEC">SAN JUAN IHUALTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN LORENZO VICTORIA') echo 'selected'; ?> value="SAN LORENZO VICTORIA">SAN LORENZO VICTORIA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MATEO NEJAPAM') echo 'selected'; ?> value="SAN MATEO NEJAPAM">SAN MATEO NEJAPAM</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MIGUEL AHUEHUETITLAN') echo 'selected'; ?> value="SAN MIGUEL AHUEHUETITLAN">SAN MIGUEL AHUEHUETITLAN</option>
        <option <?php if ($usuario['Municipio'] == 'SAN NICOLÁS HIDALGO') echo 'selected'; ?> value="SAN NICOLÁS HIDALGO">SAN NICOLÁS HIDALGO</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA CRUZ DE BRAVO') echo 'selected'; ?> value="SANTA CRUZ DE BRAVO">SANTA CRUZ DE BRAVO</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO DEL RÍO') echo 'selected'; ?> value="SANTIAGO DEL RÍO">SANTIAGO DEL RÍO</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO TAMAZOLA') echo 'selected'; ?> value="SANTIAGO TAMAZOLA">SANTIAGO TAMAZOLA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO YUCUYACHI') echo 'selected'; ?> value="SANTIAGO YUCUYACHI">SANTIAGO YUCUYACHI</option>
        <option <?php if ($usuario['Municipio'] == 'SILACAYOAPAM') echo 'selected'; ?> value="SILACAYOAPAM">SILACAYOAPAM</option>
        <option <?php if ($usuario['Municipio'] == 'ZAPOTITLAN LAGUNAS') echo 'selected'; ?> value="ZAPOTITLAN LAGUNAS">ZAPOTITLAN LAGUNAS</option>
        <option <?php if ($usuario['Municipio'] == 'SAN ANDRÉS LAGUNAS') echo 'selected'; ?> value="SAN ANDRÉS LAGUNAS">SAN ANDRÉS LAGUNAS</option>
        <option <?php if ($usuario['Municipio'] == 'SAN ANTONIO MONTE VERDE') echo 'selected'; ?> value="SAN ANTONIO MONTE VERDE">SAN ANTONIO MONTE VERDE</option>
        <option <?php if ($usuario['Municipio'] == 'SAN ANTONIO ACUTLA') echo 'selected'; ?> value="SAN ANTONIO ACUTLA">SAN ANTONIO ACUTLA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN BARTOLO SOYALTEPEC') echo 'selected'; ?> value="SAN BARTOLO SOYALTEPEC">SAN BARTOLO SOYALTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN TEPOSCOLULA') echo 'selected'; ?> value="SAN JUAN TEPOSCOLULA">SAN JUAN TEPOSCOLULA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PEDRO NOPALA') echo 'selected'; ?> value="SAN PEDRO NOPALA">SAN PEDRO NOPALA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PEDRO TOPILTEPEC') echo 'selected'; ?> value="SAN PEDRO TOPILTEPEC">SAN PEDRO TOPILTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PEDRO Y SAN PABLO TEPOSCOLULA') echo 'selected'; ?> value="SAN PEDRO Y SAN PABLO TEPOSCOLULA">SAN PEDRO Y SAN PABLO TEPOSCOLULA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PEDRO YUCUNAMA') echo 'selected'; ?> value="SAN PEDRO YUCUNAMA">SAN PEDRO YUCUNAMA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN SEBASTIÁN NICANANDUTA') echo 'selected'; ?> value="SAN SEBASTIÁN NICANANDUTA">SAN SEBASTIÁN NICANANDUTA</option>
        <option <?php if ($usuario['Municipio'] == 'VILLA CHILAPA DE DÍAZ') echo 'selected'; ?> value="VILLA CHILAPA DE DÍAZ">VILLA CHILAPA DE DÍAZ</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA NDUAYACO') echo 'selected'; ?> value="SANTA MARÍA NDUAYACO">SANTA MARÍA NDUAYACO</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO NEJAPILLA') echo 'selected'; ?> value="SANTIAGO NEJAPILLA">SANTIAGO NEJAPILLA</option>
        <option <?php if ($usuario['Municipio'] == 'VILLA TEJUPAM DE LA UNIÓN') echo 'selected'; ?> value="VILLA TEJUPAM DE LA UNIÓN">VILLA TEJUPAM DE LA UNIÓN</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO YOLOMÉCATL') echo 'selected'; ?> value="SANTIAGO YOLOMÉCATL">SANTIAGO YOLOMÉCATL</option>
        <option <?php if ($usuario['Municipio'] == 'SANTO DOMINGO TLATAYAPAM') echo 'selected'; ?> value="SANTO DOMINGO TLATAYAPAM">SANTO DOMINGO TLATAYAPAM</option>
        <option <?php if ($usuario['Municipio'] == 'SANTO DOMINGO TONALTEPEC') echo 'selected'; ?> value="SANTO DOMINGO TONALTEPEC">SANTO DOMINGO TONALTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN VICENTE NUYU') echo 'selected'; ?> value="SAN VICENTE NUYU">SAN VICENTE NUYU</option>
        <option <?php if ($usuario['Municipio'] == 'VILLA DE TAMAZULAPAM DEL PROGRESO') echo 'selected'; ?> value="VILLA DE TAMAZULAPAM DEL PROGRESO">VILLA DE TAMAZULAPAM DEL PROGRESO</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO TEOTONGO') echo 'selected'; ?> value="SANTIAGO TEOTONGO">SANTIAGO TEOTONGO</option>
        <option <?php if ($usuario['Municipio'] == 'LA TRINIDAD VISTA HERMOSA') echo 'selected'; ?> value="LA TRINIDAD VISTA HERMOSA">LA TRINIDAD VISTA HERMOSA</option>
        <option <?php if ($usuario['Municipio'] == 'CHALCATONGO DE HIDALGO') echo 'selected'; ?> value="CHALCATONGO DE HIDALGO">CHALCATONGO DE HIDALGO</option>
        <option <?php if ($usuario['Municipio'] == 'MAGDALENA PEÑASCO') echo 'selected'; ?> value="MAGDALENA PEÑASCO">MAGDALENA PEÑASCO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN AGUSTÍN TLACOTEPEC') echo 'selected'; ?> value="SAN AGUSTÍN TLACOTEPEC">SAN AGUSTÍN TLACOTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN ANTONIO SINACAHUA') echo 'selected'; ?> value="SAN ANTONIO SINACAHUA">SAN ANTONIO SINACAHUA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN BARTOLOMÉ YUCUAÑE') echo 'selected'; ?> value="SAN BARTOLOMÉ YUCUAÑE">SAN BARTOLOMÉ YUCUAÑE</option>
        <option <?php if ($usuario['Municipio'] == 'SAN CRISTÓBAL AMOLTEPEC') echo 'selected'; ?> value="SAN CRISTÓBAL AMOLTEPEC">SAN CRISTÓBAL AMOLTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN ESTEBAN ATATLAHUACA') echo 'selected'; ?> value="SAN ESTEBAN ATATLAHUACA">SAN ESTEBAN ATATLAHUACA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN ACHIUTLA') echo 'selected'; ?> value="SAN JUAN ACHIUTLA">SAN JUAN ACHIUTLA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN ÑUMI') echo 'selected'; ?> value="SAN JUAN ÑUMI">SAN JUAN ÑUMI</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN TEITA') echo 'selected'; ?> value="SAN JUAN TEITA">SAN JUAN TEITA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MARTÍN HUAMELULPAM') echo 'selected'; ?> value="SAN MARTÍN HUAMELULPAM">SAN MARTÍN HUAMELULPAM</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MARTÍN ITUNYOSO') echo 'selected'; ?> value="SAN MARTÍN ITUNYOSO">SAN MARTÍN ITUNYOSO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MATEO PEÑASCO') echo 'selected'; ?> value="SAN MATEO PEÑASCO">SAN MATEO PEÑASCO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MIGUEL ACHIUTLA') echo 'selected'; ?> value="SAN MIGUEL ACHIUTLA">SAN MIGUEL ACHIUTLA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MIGUEL EL GRANDE') echo 'selected'; ?> value="SAN MIGUEL EL GRANDE">SAN MIGUEL EL GRANDE</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PABLO TIJALTEPEC') echo 'selected'; ?> value="SAN PABLO TIJALTEPEC">SAN PABLO TIJALTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PEDRO MARTIR YUCOXACO') echo 'selected'; ?> value="SAN PEDRO MARTIR YUCOXACO">SAN PEDRO MARTIR YUCOXACO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PEDRO MOLINOS') echo 'selected'; ?> value="SAN PEDRO MOLINOS">SAN PEDRO MOLINOS</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA CATARINA TAYATA') echo 'selected'; ?> value="SANTA CATARINA TAYATA">SANTA CATARINA TAYATA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA CATARINA TICUA') echo 'selected'; ?> value="SANTA CATARINA TICUA">SANTA CATARINA TICUA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA CATARINA YOSONOTU') echo 'selected'; ?> value="SANTA CATARINA YOSONOTU">SANTA CATARINA YOSONOTU</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA CRUZ NUNDACO') echo 'selected'; ?> value="SANTA CRUZ NUNDACO">SANTA CRUZ NUNDACO</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA CRUZ TACAHUA') echo 'selected'; ?> value="SANTA CRUZ TACAHUA">SANTA CRUZ TACAHUA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA CRUZ TAYATA') echo 'selected'; ?> value="SANTA CRUZ TAYATA">SANTA CRUZ TAYATA</option>
        <option <?php if ($usuario['Municipio'] == 'HEROICA CIUDAD DE TLAXIACO') echo 'selected'; ?> value="HEROICA CIUDAD DE TLAXIACO">HEROICA CIUDAD DE TLAXIACO</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA DEL ROSARIO') echo 'selected'; ?> value="SANTA MARÍA DEL ROSARIO">SANTA MARÍA DEL ROSARIO</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA TATALTEPEC') echo 'selected'; ?> value="SANTA MARÍA TATALTEPEC">SANTA MARÍA TATALTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA YOLOTEPEC') echo 'selected'; ?> value="SANTA MARÍA YOLOTEPEC">SANTA MARÍA YOLOTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA YOSOYUA') echo 'selected'; ?> value="SANTA MARÍA YOSOYUA">SANTA MARÍA YOSOYUA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA YUCUITI') echo 'selected'; ?> value="SANTA MARÍA YUCUITI">SANTA MARÍA YUCUITI</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO NUNDICHI') echo 'selected'; ?> value="SANTIAGO NUNDICHI">SANTIAGO NUNDICHI</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO NOYOO') echo 'selected'; ?> value="SANTIAGO NOYOO">SANTIAGO NOYOO</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO YOSONDUA') echo 'selected'; ?> value="SANTIAGO YOSONDUA">SANTIAGO YOSONDUA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTO DOMINGO IXCATLAN') echo 'selected'; ?> value="SANTO DOMINGO IXCATLAN">SANTO DOMINGO IXCATLAN</option>
        <option <?php if ($usuario['Municipio'] == 'SANTO TOMÁS OCOTEPEC') echo 'selected'; ?> value="SANTO TOMÁS OCOTEPEC">SANTO TOMÁS OCOTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN COMALTEPEC') echo 'selected'; ?> value="SAN JUAN COMALTEPEC">SAN JUAN COMALTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN LALANA') echo 'selected'; ?> value="SAN JUAN LALANA">SAN JUAN LALANA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN PETLAPA') echo 'selected'; ?> value="SAN JUAN PETLAPA">SAN JUAN PETLAPA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO CHOAPAM') echo 'selected'; ?> value="SANTIAGO CHOAPAM">SANTIAGO CHOAPAM</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO JOCOTEPEC') echo 'selected'; ?> value="SANTIAGO JOCOTEPEC">SANTIAGO JOCOTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO YAVEO') echo 'selected'; ?> value="SANTIAGO YAVEO">SANTIAGO YAVEO</option>
        <option <?php if ($usuario['Municipio'] == 'ACATLÁN DE PÉREZ FIGUEROA') echo 'selected'; ?> value="ACATLÁN DE PÉREZ FIGUEROA">ACATLÁN DE PÉREZ FIGUEROA</option>
        <option <?php if ($usuario['Municipio'] == 'AYOTZINTEPEC') echo 'selected'; ?> value="AYOTZINTEPEC">AYOTZINTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'COSOAPA') echo 'selected'; ?> value="COSOAPA">COSOAPA</option>
        <option <?php if ($usuario['Municipio'] == 'LOMA BONITA') echo 'selected'; ?> value="LOMA BONITA">LOMA BONITA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN FELIPE JALAPA DE DÍAZ') echo 'selected'; ?> value="SAN FELIPE JALAPA DE DÍAZ">SAN FELIPE JALAPA DE DÍAZ</option>
        <option <?php if ($usuario['Municipio'] == 'SAN FELIPE USILA') echo 'selected'; ?> value="SAN FELIPE USILA">SAN FELIPE USILA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JOSÉ CHILTEPEC') echo 'selected'; ?> value="SAN JOSÉ CHILTEPEC">SAN JOSÉ CHILTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JOSÉ INDEPENDENCIA') echo 'selected'; ?> value="SAN JOSÉ INDEPENDENCIA">SAN JOSÉ INDEPENDENCIA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN BAUTISTA TUXTEPEC') echo 'selected'; ?> value="SAN JUAN BAUTISTA TUXTEPEC">SAN JUAN BAUTISTA TUXTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN LUCAS OJITLÁN') echo 'selected'; ?> value="SAN LUCAS OJITLÁN">SAN LUCAS OJITLÁN</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MIGUEL SOYALTEPEC') echo 'selected'; ?> value="SAN MIGUEL SOYALTEPEC">SAN MIGUEL SOYALTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PEDRO IXCATLÁN') echo 'selected'; ?> value="SAN PEDRO IXCATLÁN">SAN PEDRO IXCATLÁN</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MRÍA JACATEPEC') echo 'selected'; ?> value="SANTA MRÍA JACATEPEC">SANTA MRÍA JACATEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN BAUTISTA VALLE NACIONAL') echo 'selected'; ?> value="SAN JUAN BAUTISTA VALLE NACIONAL">SAN JUAN BAUTISTA VALLE NACIONAL</option>
        <option <?php if ($usuario['Municipio'] == 'ABEJONES') echo 'selected'; ?> value="ABEJONES">ABEJONES</option>
        <option <?php if ($usuario['Municipio'] == 'GUELATAO DE JUÁREZ') echo 'selected'; ?> value="GUELATAO DE JUÁREZ">GUELATAO DE JUÁREZ</option>
        <option <?php if ($usuario['Municipio'] == 'IXTLÁN DE JUÁREZ') echo 'selected'; ?> value="IXTLÁN DE JUÁREZ">IXTLÁN DE JUÁREZ</option>
        <option <?php if ($usuario['Municipio'] == 'NATIVIDAD') echo 'selected'; ?> value="NATIVIDAD">NATIVIDAD</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN ATEPEC') echo 'selected'; ?> value="SAN JUAN ATEPEC">SAN JUAN ATEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN CHICOMEZÚCHIL') echo 'selected'; ?> value="SAN JUAN CHICOMEZÚCHIL">SAN JUAN CHICOMEZÚCHIL</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN EVANGELISTA ANALCO') echo 'selected'; ?> value="SAN JUAN EVANGELISTA ANALCO">SAN JUAN EVANGELISTA ANALCO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN QUIOTEPEC') echo 'selected'; ?> value="SAN JUAN QUIOTEPEC">SAN JUAN QUIOTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'CAPULALPAM DE MÉNDEZ') echo 'selected'; ?> value="CAPULALPAM DE MÉNDEZ">CAPULALPAM DE MÉNDEZ</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MIGUEL ALOÁPAM') echo 'selected'; ?> value="SAN MIGUEL ALOÁPAM">SAN MIGUEL ALOÁPAM</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MIGUEL AMATLÁN') echo 'selected'; ?> value="SAN MIGUEL AMATLÁN">SAN MIGUEL AMATLÁN</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MIGUEL DEL RÍO') echo 'selected'; ?> value="SAN MIGUEL DEL RÍO">SAN MIGUEL DEL RÍO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MIGUEL YOTAO') echo 'selected'; ?> value="SAN MIGUEL YOTAO">SAN MIGUEL YOTAO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PABLO MACUILTIANGUIS') echo 'selected'; ?> value="SAN PABLO MACUILTIANGUIS">SAN PABLO MACUILTIANGUIS</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PEDRO YANERI') echo 'selected'; ?> value="SAN PEDRO YANERI">SAN PEDRO YANERI</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PEDRO YOLOX') echo 'selected'; ?> value="SAN PEDRO YOLOX">SAN PEDRO YOLOX</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA ANA YANERI') echo 'selected'; ?> value="SANTA ANA YANERI">SANTA ANA YANERI</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA CATARINA IXTEPEJI') echo 'selected'; ?> value="SANTA CATARINA IXTEPEJI">SANTA CATARINA IXTEPEJI</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA CATARINA LACHATAO') echo 'selected'; ?> value="SANTA CATARINA LACHATAO">SANTA CATARINA LACHATAO</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA JALTIANGUIS') echo 'selected'; ?> value="SANTA MARÍA JALTIANGUIS">SANTA MARÍA JALTIANGUIS</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA YAVESÍA') echo 'selected'; ?> value="SANTA MARÍA YAVESÍA">SANTA MARÍA YAVESÍA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO COMALTEPEC') echo 'selected'; ?> value="SANTIAGO COMALTEPEC">SANTIAGO COMALTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO LAXOPA') echo 'selected'; ?> value="SANTIAGO LAXOPA">SANTIAGO LAXOPA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO XIACUÍ') echo 'selected'; ?> value="SANTIAGO XIACUÍ">SANTIAGO XIACUÍ</option>
        <option <?php if ($usuario['Municipio'] == 'NUEVO ZOQUIAPAM') echo 'selected'; ?> value="NUEVO ZOQUIAPAM">NUEVO ZOQUIAPAM</option>
        <option <?php if ($usuario['Municipio'] == 'TEOCOCUILCO DE MARCOS PÉREZ') echo 'selected'; ?> value="TEOCOCUILCO DE MARCOS PÉREZ">TEOCOCUILCO DE MARCOS PÉREZ</option>
        <option <?php if ($usuario['Municipio'] == 'ASUNCIÓN CACALOTEPEC') echo 'selected'; ?> value="ASUNCIÓN CACALOTEPEC">ASUNCIÓN CACALOTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'TAMAZALUPAM DEL ESPÍRITU SANTO') echo 'selected'; ?> value="TAMAZALUPAM DEL ESPÍRITU SANTO">TAMAZALUPAM DEL ESPÍRITU SANTO</option>
        <option <?php if ($usuario['Municipio'] == 'MIXISTLÁN DE LA REFORMA') echo 'selected'; ?> value="MIXISTLÁN DE LA REFORMA">MIXISTLÁN DE LA REFORMA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN COTZOCON') echo 'selected'; ?> value="SAN JUAN COTZOCON">SAN JUAN COTZOCON</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN MAZATLÁN') echo 'selected'; ?> value="SAN JUAN MAZATLÁN">SAN JUAN MAZATLÁN</option>
        <option <?php if ($usuario['Municipio'] == 'SAN LUCAS CAMOTLÁN') echo 'selected'; ?> value="SAN LUCAS CAMOTLÁN">SAN LUCAS CAMOTLÁN</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MIGUEL QUETZALTEPEC') echo 'selected'; ?> value="SAN MIGUEL QUETZALTEPEC">SAN MIGUEL QUETZALTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PEDRO OCOTEPEC') echo 'selected'; ?> value="SAN PEDRO OCOTEPEC">SAN PEDRO OCOTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PEDRO Y SAN PABLO AYUTLA') echo 'selected'; ?> value="SAN PEDRO Y SAN PABLO AYUTLA">SAN PEDRO Y SAN PABLO AYUTLA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA ALOTEPEC') echo 'selected'; ?> value="SANTA MARÍA ALOTEPEC">SANTA MARÍA ALOTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA TEPANTLALI') echo 'selected'; ?> value="SANTA MARÍA TEPANTLALI">SANTA MARÍA TEPANTLALI</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA TLAHUILTOLTEPEC') echo 'selected'; ?> value="SANTA MARÍA TLAHUILTOLTEPEC">SANTA MARÍA TLAHUILTOLTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO ATITLÁN') echo 'selected'; ?> value="SANTIAGO ATITLÁN">SANTIAGO ATITLÁN</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO IXCUINTEPEC') echo 'selected'; ?> value="SANTIAGO IXCUINTEPEC">SANTIAGO IXCUINTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO ZACATEPEC') echo 'selected'; ?> value="SANTIAGO ZACATEPEC">SANTIAGO ZACATEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SANTO DOMINGO TEPUXTEPEC') echo 'selected'; ?> value="SANTO DOMINGO TEPUXTEPEC">SANTO DOMINGO TEPUXTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'TOTONTEPEC VILLA DE MORELOS') echo 'selected'; ?> value="TOTONTEPEC VILLA DE MORELOS">TOTONTEPEC VILLA DE MORELOS</option>
        <option <?php if ($usuario['Municipio'] == 'VILLA HIDALGO') echo 'selected'; ?> value="VILLA HIDALGO">VILLA HIDALGO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN ANDRÉS SOLAGA') echo 'selected'; ?> value="SAN ANDRÉS SOLAGA">SAN ANDRÉS SOLAGA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN ANDRÉS YAA') echo 'selected'; ?> value="SAN ANDRÉS YAA">SAN ANDRÉS YAA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN BALTAZAR YATZACHI EL BAJO') echo 'selected'; ?> value="SAN BALTAZAR YATZACHI EL BAJO">SAN BALTAZAR YATZACHI EL BAJO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN BARTOLOMÉ ZOOGOCHO') echo 'selected'; ?> value="SAN BARTOLOMÉ ZOOGOCHO">SAN BARTOLOMÉ ZOOGOCHO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN CRISTÓBAL LACHIRIOAG') echo 'selected'; ?> value="SAN CRISTÓBAL LACHIRIOAG">SAN CRISTÓBAL LACHIRIOAG</option>
        <option <?php if ($usuario['Municipio'] == 'SAN FRANCISCO CAJONOS') echo 'selected'; ?> value="SAN FRANCISCO CAJONOS">SAN FRANCISCO CAJONOS</option>
        <option <?php if ($usuario['Municipio'] == 'SAN ILDEFONSO VILLA ALTA') echo 'selected'; ?> value="SAN ILDEFONSO VILLA ALTA">SAN ILDEFONSO VILLA ALTA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN JUQUILA VIJANOS') echo 'selected'; ?> value="SAN JUAN JUQUILA VIJANOS">SAN JUAN JUQUILA VIJANOS</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN TABAA') echo 'selected'; ?> value="SAN JUAN TABAA">SAN JUAN TABAA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN YAEE') echo 'selected'; ?> value="SAN JUAN YAEE">SAN JUAN YAEE</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN YATZONA') echo 'selected'; ?> value="SAN JUAN YATZONA">SAN JUAN YATZONA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MATEO CAJONOS') echo 'selected'; ?> value="SAN MATEO CAJONOS">SAN MATEO CAJONOS</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MELCHOR BETAZA') echo 'selected'; ?> value="SAN MELCHOR BETAZA">SAN MELCHOR BETAZA</option>
        <option <?php if ($usuario['Municipio'] == 'VILLA TALEA DE CASTRO') echo 'selected'; ?> value="VILLA TALEA DE CASTRO">VILLA TALEA DE CASTRO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PABLO YAGANIZA') echo 'selected'; ?> value="SAN PABLO YAGANIZA">SAN PABLO YAGANIZA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PEDRO CAJONOS') echo 'selected'; ?> value="SAN PEDRO CAJONOS">SAN PEDRO CAJONOS</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA TEMAXCALAPA') echo 'selected'; ?> value="SANTA MARÍA TEMAXCALAPA">SANTA MARÍA TEMAXCALAPA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA YALINA') echo 'selected'; ?> value="SANTA MARÍA YALINA">SANTA MARÍA YALINA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO CAMOTLÁN') echo 'selected'; ?> value="SANTIAGO CAMOTLÁN">SANTIAGO CAMOTLÁN</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO LALOPA') echo 'selected'; ?> value="SANTIAGO LALOPA">SANTIAGO LALOPA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO ZOOCHILA') echo 'selected'; ?> value="SANTIAGO ZOOCHILA">SANTIAGO ZOOCHILA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTO DOMINGO ROAYAGA') echo 'selected'; ?> value="SANTO DOMINGO ROAYAGA">SANTO DOMINGO ROAYAGA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTO DOMINGO XAGACIA') echo 'selected'; ?> value="SANTO DOMINGO XAGACIA">SANTO DOMINGO XAGACIA</option>
        <option <?php if ($usuario['Municipio'] == 'TANETZE DE ZARAGOZA') echo 'selected'; ?> value="TANETZE DE ZARAGOZA">TANETZE DE ZARAGOZA</option>
        <option <?php if ($usuario['Municipio'] == 'MIAHUATLAN DE PORFIRIO DÍAZ') echo 'selected'; ?> value="MIAHUATLAN DE PORFIRIO DÍAZ">MIAHUATLAN DE PORFIRIO DÍAZ</option>
        <option <?php if ($usuario['Municipio'] == 'MONJAS') echo 'selected'; ?> value="MONJAS">MONJAS</option>
        <option <?php if ($usuario['Municipio'] == 'SAN ANDRÉS PAXTLAN') echo 'selected'; ?> value="SAN ANDRÉS PAXTLAN">SAN ANDRÉS PAXTLAN</option>
        <option <?php if ($usuario['Municipio'] == 'SAN CRISTÓBAL AMATLAN') echo 'selected'; ?> value="SAN CRISTÓBAL AMATLAN">SAN CRISTÓBAL AMATLAN</option>
        <option <?php if ($usuario['Municipio'] == 'SAN FRANCISCO LOGUECHE') echo 'selected'; ?> value="SAN FRANCISCO LOGUECHE">SAN FRANCISCO LOGUECHE</option>
        <option <?php if ($usuario['Municipio'] == 'SAN FRANCISCO OZOLOTEPEC') echo 'selected'; ?> value="SAN FRANCISCO OZOLOTEPEC">SAN FRANCISCO OZOLOTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN ILDENFONSO AMATLAN') echo 'selected'; ?> value="SAN ILDENFONSO AMATLAN">SAN ILDENFONSO AMATLAN</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JERÓNIMO COATLAN') echo 'selected'; ?> value="SAN JERÓNIMO COATLAN">SAN JERÓNIMO COATLAN</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JOSÉ DEL PEÑASCO') echo 'selected'; ?> value="SAN JOSÉ DEL PEÑASCO">SAN JOSÉ DEL PEÑASCO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JOSE LACHIGUIRI') echo 'selected'; ?> value="SAN JOSE LACHIGUIRI">SAN JOSE LACHIGUIRI</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN MIXTEPEC') echo 'selected'; ?> value="SAN JUAN MIXTEPEC">SAN JUAN MIXTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN OZOLOTEPEC') echo 'selected'; ?> value="SAN JUAN OZOLOTEPEC">SAN JUAN OZOLOTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN LUIS AMATLAN') echo 'selected'; ?> value="SAN LUIS AMATLAN">SAN LUIS AMATLAN</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MARCIAL OZOLOTEPEC') echo 'selected'; ?> value="SAN MARCIAL OZOLOTEPEC">SAN MARCIAL OZOLOTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MATEO RIO HONDO') echo 'selected'; ?> value="SAN MATEO RIO HONDO">SAN MATEO RIO HONDO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MIGUEL COATLAN') echo 'selected'; ?> value="SAN MIGUEL COATLAN">SAN MIGUEL COATLAN</option>
        <option <?php if ($usuario['Municipio'] == 'SAN MIGUEL SUCHIXTEPEC') echo 'selected'; ?> value="SAN MIGUEL SUCHIXTEPEC">SAN MIGUEL SUCHIXTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN NICOLÁS') echo 'selected'; ?> value="SAN NICOLÁS">SAN NICOLÁS</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PABLO COATLAN') echo 'selected'; ?> value="SAN PABLO COATLAN">SAN PABLO COATLAN</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PEDRO MIXTEPEC') echo 'selected'; ?> value="SAN PEDRO MIXTEPEC">SAN PEDRO MIXTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN SEBASTIÁN COATLAN') echo 'selected'; ?> value="SAN SEBASTIÁN COATLAN">SAN SEBASTIÁN COATLAN</option>
        <option <?php if ($usuario['Municipio'] == 'SAN SEBASTIÁN RÍO HONDO') echo 'selected'; ?> value="SAN SEBASTIÁN RÍO HONDO">SAN SEBASTIÁN RÍO HONDO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN SIMÓN ALMOLONGAS') echo 'selected'; ?> value="SAN SIMÓN ALMOLONGAS">SAN SIMÓN ALMOLONGAS</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA ANA MIAHUATLAN') echo 'selected'; ?> value="SANTA ANA MIAHUATLAN">SANTA ANA MIAHUATLAN</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA CATARINA CUIXTL') echo 'selected'; ?> value="SANTA CATARINA CUIXTL">SANTA CATARINA CUIXTL</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA CRUZ XITLA') echo 'selected'; ?> value="SANTA CRUZ XITLA">SANTA CRUZ XITLA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA LUCÍA MIAHUATLAN') echo 'selected'; ?> value="SANTA LUCÍA MIAHUATLAN">SANTA LUCÍA MIAHUATLAN</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA OZOLOTEPEC') echo 'selected'; ?> value="SANTA MARÍA OZOLOTEPEC">SANTA MARÍA OZOLOTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO XANICA') echo 'selected'; ?> value="SANTIAGO XANICA">SANTIAGO XANICA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTO DOMINGO OZOLOTEPEC') echo 'selected'; ?> value="SANTO DOMINGO OZOLOTEPEC">SANTO DOMINGO OZOLOTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SANTO TOMÁS TAMAZULAPAM') echo 'selected'; ?> value="SANTO TOMÁS TAMAZULAPAM">SANTO TOMÁS TAMAZULAPAM</option>
        <option <?php if ($usuario['Municipio'] == 'SITIO DE XITLAPEHUA') echo 'selected'; ?> value="SITIO DE XITLAPEHUA">SITIO DE XITLAPEHUA</option>
        <option <?php if ($usuario['Municipio'] == 'CONSTANCIA DEL ROSARIO') echo 'selected'; ?> value="CONSTANCIA DEL ROSARIO">CONSTANCIA DEL ROSARIO</option>
        <option <?php if ($usuario['Municipio'] == 'MESONES HIDALGO') echo 'selected'; ?> value="MESONES HIDALGO">MESONES HIDALGO</option>
        <option <?php if ($usuario['Municipio'] == 'PUTLA VILLA DE GUERRERO') echo 'selected'; ?> value="PUTLA VILLA DE GUERRERO">PUTLA VILLA DE GUERRERO</option>
        <option <?php if ($usuario['Municipio'] == 'LA REFORMA') echo 'selected'; ?> value="LA REFORMA">LA REFORMA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN ANDRÉS CABECERA NUEVA') echo 'selected'; ?> value="SAN ANDRÉS CABECERA NUEVA">SAN ANDRÉS CABECERA NUEVA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PEDRO AMUZGOS') echo 'selected'; ?> value="SAN PEDRO AMUZGOS">SAN PEDRO AMUZGOS</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA CRUZ ITUNDUJIA') echo 'selected'; ?> value="SANTA CRUZ ITUNDUJIA">SANTA CRUZ ITUNDUJIA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA LUCÍA MONTEVERDE') echo 'selected'; ?> value="SANTA LUCÍA MONTEVERDE">SANTA LUCÍA MONTEVERDE</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA IPALAPA') echo 'selected'; ?> value="SANTA MARÍA IPALAPA">SANTA MARÍA IPALAPA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA ZACATEPEC') echo 'selected'; ?> value="SANTA MARÍA ZACATEPEC">SANTA MARÍA ZACATEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN FRANCISCO CAHUACUA') echo 'selected'; ?> value="SAN FRANCISCO CAHUACUA">SAN FRANCISCO CAHUACUA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN FRANCISCO SOLA') echo 'selected'; ?> value="SAN FRANCISCO SOLA">SAN FRANCISCO SOLA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN ILDEFONSO SOLA') echo 'selected'; ?> value="SAN ILDEFONSO SOLA">SAN ILDEFONSO SOLA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JACINTO TLACOTEPEC') echo 'selected'; ?> value="SAN JACINTO TLACOTEPEC">SAN JACINTO TLACOTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN LORENZO TEXMELUCAN') echo 'selected'; ?> value="SAN LORENZO TEXMELUCAN">SAN LORENZO TEXMELUCAN</option>
        <option <?php if ($usuario['Municipio'] == 'VILLA SOLA DE VEGA') echo 'selected'; ?> value="VILLA SOLA DE VEGA">VILLA SOLA DE VEGA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA CRUZ ZENZONTEPEC') echo 'selected'; ?> value="SANTA CRUZ ZENZONTEPEC">SANTA CRUZ ZENZONTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA LACHIXIO') echo 'selected'; ?> value="SANTA MARÍA LACHIXIO">SANTA MARÍA LACHIXIO</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA SOLA') echo 'selected'; ?> value="SANTA MARÍA SOLA">SANTA MARÍA SOLA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA ZANIZA') echo 'selected'; ?> value="SANTA MARÍA ZANIZA">SANTA MARÍA ZANIZA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO AMOLTEPEC') echo 'selected'; ?> value="SANTIAGO AMOLTEPEC">SANTIAGO AMOLTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO MINAS') echo 'selected'; ?> value="SANTIAGO MINAS">SANTIAGO MINAS</option>
        <option <?php if ($usuario['Municipio'] == 'SANTIAGO TEXTITLAN') echo 'selected'; ?> value="SANTIAGO TEXTITLAN">SANTIAGO TEXTITLAN</option>
        <option <?php if ($usuario['Municipio'] == 'SANTO DOMINGO TEOJOMULCO') echo 'selected'; ?> value="SANTO DOMINGO TEOJOMULCO">SANTO DOMINGO TEOJOMULCO</option>
        <option <?php if ($usuario['Municipio'] == 'SAN VICENTE LACHIXIO') echo 'selected'; ?> value="SAN VICENTE LACHIXIO">SAN VICENTE LACHIXIO</option>
        <option <?php if ($usuario['Municipio'] == 'ZAPOTITLÁN DEL RÍO') echo 'selected'; ?> value="ZAPOTITLÁN DEL RÍO">ZAPOTITLÁN DEL RÍO</option>
        <option <?php if ($usuario['Municipio'] == 'ASUNCION TLACOLULITA') echo 'selected'; ?> value="ASUNCION TLACOLULITA">ASUNCION TLACOLULITA</option>
        <option <?php if ($usuario['Municipio'] == 'NEJAPA DE MADERO') echo 'selected'; ?> value="NEJAPA DE MADERO">NEJAPA DE MADERO</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA CATARINA QUIOQUITANI') echo 'selected'; ?> value="SANTA CATARINA QUIOQUITANI">SANTA CATARINA QUIOQUITANI</option>
        <option <?php if ($usuario['Municipio'] == 'SAN BARTOLO YAUTEPEC') echo 'selected'; ?> value="SAN BARTOLO YAUTEPEC">SAN BARTOLO YAUTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN CARLOS YAUTEPEC') echo 'selected'; ?> value="SAN CARLOS YAUTEPEC">SAN CARLOS YAUTEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN JUQUILA MIXES') echo 'selected'; ?> value="SAN JUAN JUQUILA MIXES">SAN JUAN JUQUILA MIXES</option>
        <option <?php if ($usuario['Municipio'] == 'SAN JUAN LAJARCIA') echo 'selected'; ?> value="SAN JUAN LAJARCIA">SAN JUAN LAJARCIA</option>
        <option <?php if ($usuario['Municipio'] == 'SAN PEDRO MARTIR QUIECHAPA') echo 'selected'; ?> value="SAN PEDRO MARTIR QUIECHAPA">SAN PEDRO MARTIR QUIECHAPA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA ANA TAVELA') echo 'selected'; ?> value="SANTA ANA TAVELA">SANTA ANA TAVELA</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA CATARINA QUIERI') echo 'selected'; ?> value="SANTA CATARINA QUIERI">SANTA CATARINA QUIERI</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA ECATEPEC') echo 'selected'; ?> value="SANTA MARÍA ECATEPEC">SANTA MARÍA ECATEPEC</option>
        <option <?php if ($usuario['Municipio'] == 'SANTA MARÍA QUIEGOLANI') echo 'selected'; ?> value="SANTA MARÍA QUIEGOLANI">SANTA MARÍA QUIEGOLANI</option>

    </select>
    <div class="invalid-feedback">Se requiere una selección válida.</div>
    </div>

    <div class="col-sm-6">
        <label for="colonia" class="form-label">Localidad/Colonia/Agencia</label>
        <input type="text" class="form-control" id="colonia" name="colonia" value="<?php echo $usuario['Colonia']; ?>"><br>
        <div class="invalid-feedback">Se requiere una colonia válida.</div>
    </div>

    <div class="col-sm-6">
    <label for="region" class="form-label">Región</label>
    <input type="text" class="form-control" id="region"  name="region" readonly value="<?php echo $usuario['Region']; ?>"><br>
    <div class="invalid-feedback">Se requiere una colonia válida.</div>
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

    <div class="col-sm-6">
        <label for="cppc" class="form-label">Código Postal (CP)</label>
        <input type="number" max="100000" min="0" class="form-control" id="cppc" name="cppc" value="<?php echo $usuario['CPPC']; ?>"><br>
        <div class="invalid-feedback">Se requiere un código postal válido.</div>
    </div>

    <div class="col-sm-6">
    <label for="estadoPC" class="form-label">Estado</label>
    <input type="text" class="form-control" id="estadoPC" name="estadoPC" value="<?php echo $usuario['EstadoPC']; ?>"><br>
    <div class="invalid-feedback">Se requiere un estado válido.</div>
</div>

<div class="col-sm-6">
        <label for="municipio" class="form-label">Municipio</label>
        <select class="form-select" id="municipios" name="municipioPC" aria-label="Selecciona una opción" onchange="mostrarRegion()">
        <option selected disabled value="">Seleccionar municipio...</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SIN DATOS') echo 'selected'; ?> value="SIN DATOS">SIN DATOS</option>
        <option <?php if ($usuario['MunicipioPC'] == 'CUILAPAM DE GUERRERO') echo 'selected'; ?> value="CUILAPAM DE GUERRERO">CUILAPAM DE GUERRERO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'OAXACA DE JUÁREZ') echo 'selected'; ?> value="OAXACA DE JUÁREZ">OAXACA DE JUÁREZ</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN AGUSTIN DE LAS JUNTAS') echo 'selected'; ?> value="SAN AGUSTIN DE LAS JUNTAS">SAN AGUSTIN DE LAS JUNTAS</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN AGUSTIN YATARENI') echo 'selected'; ?> value="SAN AGUSTIN YATARENI">SAN AGUSTIN YATARENI</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN ANDRÉS HUAYAPAM') echo 'selected'; ?> value="SAN ANDRÉS HUAYAPAM">SAN ANDRÉS HUAYAPAM</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN ANDRÉS IXTLAHUACA') echo 'selected'; ?> value="SAN ANDRÉS IXTLAHUACA">SAN ANDRÉS IXTLAHUACA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN ANTONIO DE LA CAL') echo 'selected'; ?> value="SAN ANTONIO DE LA CAL">SAN ANTONIO DE LA CAL</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN BARTOLO COYOTEPEC') echo 'selected'; ?> value="SAN BARTOLO COYOTEPEC">SAN BARTOLO COYOTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JACINTO AMILPAS') echo 'selected'; ?> value="SAN JACINTO AMILPAS">SAN JACINTO AMILPAS</option>
        <option <?php if ($usuario['MunicipioPC'] == 'ANIMAS TRUJANO') echo 'selected'; ?> value="ANIMAS TRUJANO">ANIMAS TRUJANO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PEDRO IXTLAHUACA') echo 'selected'; ?> value="SAN PEDRO IXTLAHUACA">SAN PEDRO IXTLAHUACA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN RAYMUNDO JALPAN') echo 'selected'; ?> value="SAN RAYMUNDO JALPAN">SAN RAYMUNDO JALPAN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN SEBASTIÁN TUTLA') echo 'selected'; ?> value="SAN SEBASTIÁN TUTLA">SAN SEBASTIÁN TUTLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA CRUZ AMILPAS') echo 'selected'; ?> value="SANTA CRUZ AMILPAS">SANTA CRUZ AMILPAS</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA CRUZ XOXOCOTLAN') echo 'selected'; ?> value="SANTA CRUZ XOXOCOTLAN">SANTA CRUZ XOXOCOTLAN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA LUCIA DEL CAMINO') echo 'selected'; ?> value="SANTA LUCIA DEL CAMINO">SANTA LUCIA DEL CAMINO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA ATZOMPA') echo 'selected'; ?> value="SANTA MARÍA ATZOMPA">SANTA MARÍA ATZOMPA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA COYOTEPEC') echo 'selected'; ?> value="SANTA MARÍA COYOTEPEC">SANTA MARÍA COYOTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA EL TULE') echo 'selected'; ?> value="SANTA MARÍA EL TULE">SANTA MARÍA EL TULE</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTO DOMINGO TOMALTEPEC') echo 'selected'; ?> value="SANTO DOMINGO TOMALTEPEC">SANTO DOMINGO TOMALTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'TLALIXTAC DE CABRERA') echo 'selected'; ?> value="TLALIXTAC DE CABRERA">TLALIXTAC DE CABRERA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'COATECAS ALTAS') echo 'selected'; ?> value="COATECAS ALTAS">COATECAS ALTAS</option>
        <option <?php if ($usuario['MunicipioPC'] == 'LA COMPAÑÍA') echo 'selected'; ?> value="LA COMPAÑÍA">LA COMPAÑÍA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'HEROICA CD. DE EJUTLA DE CRESPO') echo 'selected'; ?> value="HEROICA CD. DE EJUTLA DE CRESPO">HEROICA CD. DE EJUTLA DE CRESPO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'LA PE') echo 'selected'; ?> value="LA PE">LA PE</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN AGUSTIN AMATENGO') echo 'selected'; ?> value="SAN AGUSTIN AMATENGO">SAN AGUSTIN AMATENGO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN ANDRÉS ZABACHE') echo 'selected'; ?> value="SAN ANDRÉS ZABACHE">SAN ANDRÉS ZABACHE</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN LACHIGALLA') echo 'selected'; ?> value="SAN JUAN LACHIGALLA">SAN JUAN LACHIGALLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MARTIN DE LOS CANSECOS') echo 'selected'; ?> value="SAN MARTIN DE LOS CANSECOS">SAN MARTIN DE LOS CANSECOS</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MARTIN LACHILA') echo 'selected'; ?> value="SAN MARTIN LACHILA">SAN MARTIN LACHILA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MIGUEL EJUTLA') echo 'selected'; ?> value="SAN MIGUEL EJUTLA">SAN MIGUEL EJUTLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN VICENTE COATLAN') echo 'selected'; ?> value="SAN VICENTE COATLAN">SAN VICENTE COATLAN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'TANICHE') echo 'selected'; ?> value="TANICHE">TANICHE</option>
        <option <?php if ($usuario['MunicipioPC'] == 'YOGANA') echo 'selected'; ?> value="YOGANA">YOGANA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'GUADALUPE ETLA') echo 'selected'; ?> value="GUADALUPE ETLA">GUADALUPE ETLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'MAGDALENA APASCO') echo 'selected'; ?> value="MAGDALENA APASCO">MAGDALENA APASCO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'NAZARENO ETLA') echo 'selected'; ?> value="NAZARENO ETLA">NAZARENO ETLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'REYES ETLA') echo 'selected'; ?> value="REYES ETLA">REYES ETLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN AGUSTÍN ETLA') echo 'selected'; ?> value="SAN AGUSTÍN ETLA">SAN AGUSTÍN ETLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN ANDRÉS ZAUTLA') echo 'selected'; ?> value="SAN ANDRÉS ZAUTLA">SAN ANDRÉS ZAUTLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN FELIPE TEJALAPAM') echo 'selected'; ?> value="SAN FELIPE TEJALAPAM">SAN FELIPE TEJALAPAM</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN FRANCISCO TELIXTLAHUACA') echo 'selected'; ?> value="SAN FRANCISCO TELIXTLAHUACA">SAN FRANCISCO TELIXTLAHUACA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JERÓNIMO SOSOLA') echo 'selected'; ?> value="SAN JERÓNIMO SOSOLA">SAN JERÓNIMO SOSOLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN BAUTISTA ATATLAUCA') echo 'selected'; ?> value="SAN JUAN BAUTISTA ATATLAUCA">SAN JUAN BAUTISTA ATATLAUCA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN BAUTISTA GUELACHE') echo 'selected'; ?> value="SAN JUAN BAUTISTA GUELACHE">SAN JUAN BAUTISTA GUELACHE</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN BAUTISTA JAYACATLAN') echo 'selected'; ?> value="SAN JUAN BAUTISTA JAYACATLAN">SAN JUAN BAUTISTA JAYACATLAN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN DEL ESTADO') echo 'selected'; ?> value="SAN JUAN DEL ESTADO">SAN JUAN DEL ESTADO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN LORENZO CACAOTEPEC') echo 'selected'; ?> value="SAN LORENZO CACAOTEPEC">SAN LORENZO CACAOTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PABLO ETLA') echo 'selected'; ?> value="SAN PABLO ETLA">SAN PABLO ETLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PABLO HUITZO') echo 'selected'; ?> value="SAN PABLO HUITZO">SAN PABLO HUITZO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'VILLA DE ETLA') echo 'selected'; ?> value="VILLA DE ETLA">VILLA DE ETLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA PEÑOLES') echo 'selected'; ?> value="SANTA MARÍA PEÑOLES">SANTA MARÍA PEÑOLES</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO SUCHILQUITONGO') echo 'selected'; ?> value="SANTIAGO SUCHILQUITONGO">SANTIAGO SUCHILQUITONGO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO TENANGO') echo 'selected'; ?> value="SANTIAGO TENANGO">SANTIAGO TENANGO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO TLASOYALTEPEC') echo 'selected'; ?> value="SANTIAGO TLASOYALTEPEC">SANTIAGO TLASOYALTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTO TOMÁS MAZALTEPEC') echo 'selected'; ?> value="SANTO TOMÁS MAZALTEPEC">SANTO TOMÁS MAZALTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SOLEDAD ETLA') echo 'selected'; ?> value="SOLEDAD ETLA">SOLEDAD ETLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'ASUNCIÓN OCOTLÁN') echo 'selected'; ?> value="ASUNCIÓN OCOTLÁN">ASUNCIÓN OCOTLÁN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'MAGDALENA OCOTLAN') echo 'selected'; ?> value="MAGDALENA OCOTLAN">MAGDALENA OCOTLAN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'OCOTLAN DE MORELOS') echo 'selected'; ?> value="OCOTLAN DE MORELOS">OCOTLAN DE MORELOS</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JOSÉ DEL PROGRESO') echo 'selected'; ?> value="SAN JOSÉ DEL PROGRESO">SAN JOSÉ DEL PROGRESO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN ANTONINO CASTILLO VELASCO') echo 'selected'; ?> value="SAN ANTONINO CASTILLO VELASCO">SAN ANTONINO CASTILLO VELASCO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN BALTAZAR CHICHICAPAM') echo 'selected'; ?> value="SAN BALTAZAR CHICHICAPAM">SAN BALTAZAR CHICHICAPAM</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN DIONISIO OCOTLAN') echo 'selected'; ?> value="SAN DIONISIO OCOTLAN">SAN DIONISIO OCOTLAN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JERÓNIMO TAVICHE') echo 'selected'; ?> value="SAN JERÓNIMO TAVICHE">SAN JERÓNIMO TAVICHE</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN CHILATECA') echo 'selected'; ?> value="SAN JUAN CHILATECA">SAN JUAN CHILATECA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MARTÍN TILCAJETE') echo 'selected'; ?> value="SAN MARTÍN TILCAJETE">SAN MARTÍN TILCAJETE</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MIGUEL TILQUIAPAM') echo 'selected'; ?> value="SAN MIGUEL TILQUIAPAM">SAN MIGUEL TILQUIAPAM</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PEDRO APÓSTOL') echo 'selected'; ?> value="SAN PEDRO APÓSTOL">SAN PEDRO APÓSTOL</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PEDRO MARTIR') echo 'selected'; ?> value="SAN PEDRO MARTIR">SAN PEDRO MARTIR</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PEDRO TAVICHE') echo 'selected'; ?> value="SAN PEDRO TAVICHE">SAN PEDRO TAVICHE</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA ANA ZEGACHE') echo 'selected'; ?> value="SANTA ANA ZEGACHE">SANTA ANA ZEGACHE</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA CATARINA MINAS') echo 'selected'; ?> value="SANTA CATARINA MINAS">SANTA CATARINA MINAS</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA LUCIA OCOTLAN') echo 'selected'; ?> value="SANTA LUCIA OCOTLAN">SANTA LUCIA OCOTLAN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO APÓSTOL') echo 'selected'; ?> value="SANTIAGO APÓSTOL">SANTIAGO APÓSTOL</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTO TOMÁS JALIEZA') echo 'selected'; ?> value="SANTO TOMÁS JALIEZA">SANTO TOMÁS JALIEZA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'YAXE') echo 'selected'; ?> value="YAXE">YAXE</option>
        <option <?php if ($usuario['MunicipioPC'] == 'MAGDALENA TEITIPAC') echo 'selected'; ?> value="MAGDALENA TEITIPAC">MAGDALENA TEITIPAC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'ROJAS DE CUAHUTEMOC') echo 'selected'; ?> value="ROJAS DE CUAHUTEMOC">ROJAS DE CUAHUTEMOC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN BARTOLOMÉ QUIALANA') echo 'selected'; ?> value="SAN BARTOLOMÉ QUIALANA">SAN BARTOLOMÉ QUIALANA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN DIONISIO OCOTEPEC') echo 'selected'; ?> value="SAN DIONISIO OCOTEPEC">SAN DIONISIO OCOTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN FRANCISCO LACHIGOLO') echo 'selected'; ?> value="SAN FRANCISCO LACHIGOLO">SAN FRANCISCO LACHIGOLO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN DEL RIO') echo 'selected'; ?> value="SAN JUAN DEL RIO">SAN JUAN DEL RIO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN GUELAVIA') echo 'selected'; ?> value="SAN JUAN GUELAVIA">SAN JUAN GUELAVIA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN TEITIPAC') echo 'selected'; ?> value="SAN JUAN TEITIPAC">SAN JUAN TEITIPAC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN LORENZO ALBARRADAS') echo 'selected'; ?> value="SAN LORENZO ALBARRADAS">SAN LORENZO ALBARRADAS</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN LUCAS QUIAVINI') echo 'selected'; ?> value="SAN LUCAS QUIAVINI">SAN LUCAS QUIAVINI</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PABLO VILLA DE MITLA') echo 'selected'; ?> value="SAN PABLO VILLA DE MITLA">SAN PABLO VILLA DE MITLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PEDRO QUIATONI') echo 'selected'; ?> value="SAN PEDRO QUIATONI">SAN PEDRO QUIATONI</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PEDRO TOTOLAPAN') echo 'selected'; ?> value="SAN PEDRO TOTOLAPAN">SAN PEDRO TOTOLAPAN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN SEBASTIÁN ABASOLO') echo 'selected'; ?> value="SAN SEBASTIÁN ABASOLO">SAN SEBASTIÁN ABASOLO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN SEBASTIÁN TEITIPAC') echo 'selected'; ?> value="SAN SEBASTIÁN TEITIPAC">SAN SEBASTIÁN TEITIPAC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA ANA DEL VALLE') echo 'selected'; ?> value="SANTA ANA DEL VALLE">SANTA ANA DEL VALLE</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA CRUZ PAPALUTLA') echo 'selected'; ?> value="SANTA CRUZ PAPALUTLA">SANTA CRUZ PAPALUTLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA GUELACE') echo 'selected'; ?> value="SANTA MARÍA GUELACE">SANTA MARÍA GUELACE</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA ZOQUITLAN') echo 'selected'; ?> value="SANTA MARÍA ZOQUITLAN">SANTA MARÍA ZOQUITLAN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO MATATLAN') echo 'selected'; ?> value="SANTIAGO MATATLAN">SANTIAGO MATATLAN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTO DOMINGO ALBARRADAS') echo 'selected'; ?> value="SANTO DOMINGO ALBARRADAS">SANTO DOMINGO ALBARRADAS</option>
        <option <?php if ($usuario['MunicipioPC'] == 'TEOTITLAN DEL VALLE') echo 'selected'; ?> value="TEOTITLAN DEL VALLE">TEOTITLAN DEL VALLE</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JERONIMO TLACOCHAHUAYA') echo 'selected'; ?> value="SAN JERONIMO TLACOCHAHUAYA">SAN JERONIMO TLACOCHAHUAYA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'TLACOLULA DE MATAMOROS') echo 'selected'; ?> value="TLACOLULA DE MATAMOROS">TLACOLULA DE MATAMOROS</option>
        <option <?php if ($usuario['MunicipioPC'] == 'VILLA DE DIAZ ORDAZ') echo 'selected'; ?> value="VILLA DE DIAZ ORDAZ">VILLA DE DIAZ ORDAZ</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN ANTONIO HUITEPEC') echo 'selected'; ?> value="SAN ANTONIO HUITEPEC">SAN ANTONIO HUITEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MIGUEL PERAS') echo 'selected'; ?> value="SAN MIGUEL PERAS">SAN MIGUEL PERAS</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PABLO CUATRO VENADOS') echo 'selected'; ?> value="SAN PABLO CUATRO VENADOS">SAN PABLO CUATRO VENADOS</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA INES DEL MONTE') echo 'selected'; ?> value="SANTA INES DEL MONTE">SANTA INES DEL MONTE</option>
        <option <?php if ($usuario['MunicipioPC'] == 'TRINIDAD ZAACHILA') echo 'selected'; ?> value="TRINIDAD ZAACHILA">TRINIDAD ZAACHILA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'VILLA DE ZAACHILA') echo 'selected'; ?> value="VILLA DE ZAACHILA">VILLA DE ZAACHILA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'CIÉNEGA DE ZIMATLAN') echo 'selected'; ?> value="CIÉNEGA DE ZIMATLAN">CIÉNEGA DE ZIMATLAN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'MAGDALENA MIXTEPEC') echo 'selected'; ?> value="MAGDALENA MIXTEPEC">MAGDALENA MIXTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN ANTONIO EL ALTO') echo 'selected'; ?> value="SAN ANTONIO EL ALTO">SAN ANTONIO EL ALTO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN BERNARDO MIXTEPEC') echo 'selected'; ?> value="SAN BERNARDO MIXTEPEC">SAN BERNARDO MIXTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MIGUEL MIXTEPEC') echo 'selected'; ?> value="SAN MIGUEL MIXTEPEC">SAN MIGUEL MIXTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PABLO HUIXTEPEC') echo 'selected'; ?> value="SAN PABLO HUIXTEPEC">SAN PABLO HUIXTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA ANA TLAPACOYAN') echo 'selected'; ?> value="SANTA ANA TLAPACOYAN">SANTA ANA TLAPACOYAN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA CATARINA QUIANE') echo 'selected'; ?> value="SANTA CATARINA QUIANE">SANTA CATARINA QUIANE</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA CRUZ MIXTEPEC') echo 'selected'; ?> value="SANTA CRUZ MIXTEPEC">SANTA CRUZ MIXTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA GERTRUDIS') echo 'selected'; ?> value="SANTA GERTRUDIS">SANTA GERTRUDIS</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA INES YATZECHE') echo 'selected'; ?> value="SANTA INES YATZECHE">SANTA INES YATZECHE</option>
        <option <?php if ($usuario['MunicipioPC'] == 'AYOQUEZCO DE ALDAMA') echo 'selected'; ?> value="AYOQUEZCO DE ALDAMA">AYOQUEZCO DE ALDAMA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'ZIMATLÁN DE ALVAREZ') echo 'selected'; ?> value="ZIMATLÁN DE ALVAREZ">ZIMATLÁN DE ALVAREZ</option>
        <option <?php if ($usuario['MunicipioPC'] == 'MARTIRES DE TACUBAYA') echo 'selected'; ?> value="MARTIRES DE TACUBAYA">MARTIRES DE TACUBAYA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'PINOTEPA DE DON LUIS') echo 'selected'; ?> value="PINOTEPA DE DON LUIS">PINOTEPA DE DON LUIS</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN AGUSTIN CHAYUCO') echo 'selected'; ?> value="SAN AGUSTIN CHAYUCO">SAN AGUSTIN CHAYUCO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN ANDRÉS HUAXPALTEPEC') echo 'selected'; ?> value="SAN ANDRÉS HUAXPALTEPEC">SAN ANDRÉS HUAXPALTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN ANTONIO TEPETLAPA') echo 'selected'; ?> value="SAN ANTONIO TEPETLAPA">SAN ANTONIO TEPETLAPA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JOSE ESTANCIA GRANDE') echo 'selected'; ?> value="SAN JOSE ESTANCIA GRANDE">SAN JOSE ESTANCIA GRANDE</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN BAUTISTA LO DE SOTO') echo 'selected'; ?> value="SAN JUAN BAUTISTA LO DE SOTO">SAN JUAN BAUTISTA LO DE SOTO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN CACAHUATEPEC') echo 'selected'; ?> value="SAN JUAN CACAHUATEPEC">SAN JUAN CACAHUATEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN COLORADO') echo 'selected'; ?> value="SAN JUAN COLORADO">SAN JUAN COLORADO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN LORENZO') echo 'selected'; ?> value="SAN LORENZO">SAN LORENZO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MIGUEL TLACAMAMA') echo 'selected'; ?> value="SAN MIGUEL TLACAMAMA">SAN MIGUEL TLACAMAMA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PEDRO ATOYAC') echo 'selected'; ?> value="SAN PEDRO ATOYAC">SAN PEDRO ATOYAC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PEDRO JICAYAN') echo 'selected'; ?> value="SAN PEDRO JICAYAN">SAN PEDRO JICAYAN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN SEBASTIÁN IXCAPAC') echo 'selected'; ?> value="SAN SEBASTIÁN IXCAPAC">SAN SEBASTIÁN IXCAPAC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA CATARINA MECHOACAN') echo 'selected'; ?> value="SANTA CATARINA MECHOACAN">SANTA CATARINA MECHOACAN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA CORTIJO') echo 'selected'; ?> value="SANTA MARÍA CORTIJO">SANTA MARÍA CORTIJO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA HUAZOLOTITLAN') echo 'selected'; ?> value="SANTA MARÍA HUAZOLOTITLAN">SANTA MARÍA HUAZOLOTITLAN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO IXTAYUTLA') echo 'selected'; ?> value="SANTIAGO IXTAYUTLA">SANTIAGO IXTAYUTLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO JAMILTEPEC') echo 'selected'; ?> value="SANTIAGO JAMILTEPEC">SANTIAGO JAMILTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO LLANO GRANDE') echo 'selected'; ?> value="SANTIAGO LLANO GRANDE">SANTIAGO LLANO GRANDE</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO PINOTEPA NACIONAL') echo 'selected'; ?> value="SANTIAGO PINOTEPA NACIONAL">SANTIAGO PINOTEPA NACIONAL</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO TEPEXTLA') echo 'selected'; ?> value="SANTIAGO TEPEXTLA">SANTIAGO TEPEXTLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO TETEPEC') echo 'selected'; ?> value="SANTIAGO TETEPEC">SANTIAGO TETEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTO DOMINGO ARMENTA') echo 'selected'; ?> value="SANTO DOMINGO ARMENTA">SANTO DOMINGO ARMENTA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN GABRIEL MIXTEPEC') echo 'selected'; ?> value="SAN GABRIEL MIXTEPEC">SAN GABRIEL MIXTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN LACHAO') echo 'selected'; ?> value="SAN JUAN LACHAO">SAN JUAN LACHAO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN QUIAHIJE') echo 'selected'; ?> value="SAN JUAN QUIAHIJE">SAN JUAN QUIAHIJE</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MIGUEL PANIXTLAHUACA') echo 'selected'; ?> value="SAN MIGUEL PANIXTLAHUACA">SAN MIGUEL PANIXTLAHUACA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PEDRO JUCHATENGO') echo 'selected'; ?> value="SAN PEDRO JUCHATENGO">SAN PEDRO JUCHATENGO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PEDRO MIXTEPEC') echo 'selected'; ?> value="SAN PEDRO MIXTEPEC">SAN PEDRO MIXTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'VILLA DE TUTUTEPEC DE MELCHOR OCAMPO') echo 'selected'; ?> value="VILLA DE TUTUTEPEC DE MELCHOR OCAMPO">VILLA DE TUTUTEPEC DE MELCHOR OCAMPO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA CATARINA JUQUILA') echo 'selected'; ?> value="SANTA CATARINA JUQUILA">SANTA CATARINA JUQUILA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA TEMAXCALTEPEC') echo 'selected'; ?> value="SANTA MARÍA TEMAXCALTEPEC">SANTA MARÍA TEMAXCALTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO YAITEPEC') echo 'selected'; ?> value="SANTIAGO YAITEPEC">SANTIAGO YAITEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTOS REYES NOPALA') echo 'selected'; ?> value="SANTOS REYES NOPALA">SANTOS REYES NOPALA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'TATALTEPEC DE VALDES') echo 'selected'; ?> value="TATALTEPEC DE VALDES">TATALTEPEC DE VALDES</option>
        <option <?php if ($usuario['MunicipioPC'] == 'CANDELARIA LOXICHA') echo 'selected'; ?> value="CANDELARIA LOXICHA">CANDELARIA LOXICHA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'PLUMA HIDALGO') echo 'selected'; ?> value="PLUMA HIDALGO">PLUMA HIDALGO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN AGUSTIN LOXICHA') echo 'selected'; ?> value="SAN AGUSTIN LOXICHA">SAN AGUSTIN LOXICHA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN BALTAZAR LOXICHA') echo 'selected'; ?> value="SAN BALTAZAR LOXICHA">SAN BALTAZAR LOXICHA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN BARTOLOMÉ LOXICHA') echo 'selected'; ?> value="SAN BARTOLOMÉ LOXICHA">SAN BARTOLOMÉ LOXICHA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MATEO PIÑAS') echo 'selected'; ?> value="SAN MATEO PIÑAS">SAN MATEO PIÑAS</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MIGUEL DEL PUERO') echo 'selected'; ?> value="SAN MIGUEL DEL PUERO">SAN MIGUEL DEL PUERO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PEDRO EL ALTO') echo 'selected'; ?> value="SAN PEDRO EL ALTO">SAN PEDRO EL ALTO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PEDRO POCHUTLA') echo 'selected'; ?> value="SAN PEDRO POCHUTLA">SAN PEDRO POCHUTLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA CATARINA LOXICHA') echo 'selected'; ?> value="SANTA CATARINA LOXICHA">SANTA CATARINA LOXICHA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA COLOTEPEC') echo 'selected'; ?> value="SANTA MARÍA COLOTEPEC">SANTA MARÍA COLOTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA HUATULCO') echo 'selected'; ?> value="SANTA MARÍA HUATULCO">SANTA MARÍA HUATULCO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA TONAMECA') echo 'selected'; ?> value="SANTA MARÍA TONAMECA">SANTA MARÍA TONAMECA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTO DOMINGO DE MORELOS') echo 'selected'; ?> value="SANTO DOMINGO DE MORELOS">SANTO DOMINGO DE MORELOS</option>
        <option <?php if ($usuario['MunicipioPC'] == 'CONCEPCIÓN PÁPALO') echo 'selected'; ?> value="CONCEPCIÓN PÁPALO">CONCEPCIÓN PÁPALO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'CUYAMECALCO VILLA DE ZARAGOZA') echo 'selected'; ?> value="CUYAMECALCO VILLA DE ZARAGOZA">CUYAMECALCO VILLA DE ZARAGOZA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'CHIQUIHUITLAN DE BENITO JUÁREZ') echo 'selected'; ?> value="CHIQUIHUITLAN DE BENITO JUÁREZ">CHIQUIHUITLAN DE BENITO JUÁREZ</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN ANDRÉS TEOTILÁPAM') echo 'selected'; ?> value="SAN ANDRÉS TEOTILÁPAM">SAN ANDRÉS TEOTILÁPAM</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN FRANCISCO CHAPULAPA') echo 'selected'; ?> value="SAN FRANCISCO CHAPULAPA">SAN FRANCISCO CHAPULAPA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN BAUTISTA CUICATLÁN') echo 'selected'; ?> value="SAN JUAN BAUTISTA CUICATLÁN">SAN JUAN BAUTISTA CUICATLÁN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN BAUTISTA TLACOATZINTEPEC') echo 'selected'; ?> value="SAN JUAN BAUTISTA TLACOATZINTEPEC">SAN JUAN BAUTISTA TLACOATZINTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN TEPEUXILA') echo 'selected'; ?> value="SAN JUAN TEPEUXILA">SAN JUAN TEPEUXILA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MIGUEL SANTA FLOR') echo 'selected'; ?> value="SAN MIGUEL SANTA FLOR">SAN MIGUEL SANTA FLOR</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PEDRO JALTEPETONGO') echo 'selected'; ?> value="SAN PEDRO JALTEPETONGO">SAN PEDRO JALTEPETONGO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PEDRO JOCOTIPAC') echo 'selected'; ?> value="SAN PEDRO JOCOTIPAC">SAN PEDRO JOCOTIPAC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PEDRO SOCHIAPAM') echo 'selected'; ?> value="SAN PEDRO SOCHIAPAM">SAN PEDRO SOCHIAPAM</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PEDRO TEUTILA') echo 'selected'; ?> value="SAN PEDRO TEUTILA">SAN PEDRO TEUTILA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA ANA CUAUHTÉMOC') echo 'selected'; ?> value="SANTA ANA CUAUHTÉMOC">SANTA ANA CUAUHTÉMOC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA PÁPALO') echo 'selected'; ?> value="SANTA MARÍA PÁPALO">SANTA MARÍA PÁPALO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA TEXCATITLÁN') echo 'selected'; ?> value="SANTA MARÍA TEXCATITLÁN">SANTA MARÍA TEXCATITLÁN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA TLALIXTAC') echo 'selected'; ?> value="SANTA MARÍA TLALIXTAC">SANTA MARÍA TLALIXTAC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO NACALTEPEC') echo 'selected'; ?> value="SANTIAGO NACALTEPEC">SANTIAGO NACALTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTOS REYES PÁPALO') echo 'selected'; ?> value="SANTOS REYES PÁPALO">SANTOS REYES PÁPALO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'VALERIO TRUJANO') echo 'selected'; ?> value="VALERIO TRUJANO">VALERIO TRUJANO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'ELOXOCHITLÁN DE FLORES MAGÓN') echo 'selected'; ?> value="ELOXOCHITLÁN DE FLORES MAGÓN">ELOXOCHITLÁN DE FLORES MAGÓN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MIGUEL HUAUTEPEC') echo 'selected'; ?> value="SAN MIGUEL HUAUTEPEC">SAN MIGUEL HUAUTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'HUAUTLA DE JIMÉNEZ') echo 'selected'; ?> value="HUAUTLA DE JIMÉNEZ">HUAUTLA DE JIMÉNEZ</option>
        <option <?php if ($usuario['MunicipioPC'] == 'MAZATLÁN VILLA DE FLORES') echo 'selected'; ?> value="MAZATLÁN VILLA DE FLORES">MAZATLÁN VILLA DE FLORES</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN ANTONIO NANAHUATIPAM') echo 'selected'; ?> value="SAN ANTONIO NANAHUATIPAM">SAN ANTONIO NANAHUATIPAM</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN BARTOLOMÉ AYAUTLA') echo 'selected'; ?> value="SAN BARTOLOMÉ AYAUTLA">SAN BARTOLOMÉ AYAUTLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN FRANCISCO HUEHUETLÁN') echo 'selected'; ?> value="SAN FRANCISCO HUEHUETLÁN">SAN FRANCISCO HUEHUETLÁN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JERÓNIMO TECOATL') echo 'selected'; ?> value="SAN JERÓNIMO TECOATL">SAN JERÓNIMO TECOATL</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JOSÉ TENANGO') echo 'selected'; ?> value="SAN JOSÉ TENANGO">SAN JOSÉ TENANGO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN COATZOSPAM') echo 'selected'; ?> value="SAN JUAN COATZOSPAM">SAN JUAN COATZOSPAM</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN DE LOS CUES') echo 'selected'; ?> value="SAN JUAN DE LOS CUES">SAN JUAN DE LOS CUES</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN LORENZO CUANECUILTITLA') echo 'selected'; ?> value="SAN LORENZO CUANECUILTITLA">SAN LORENZO CUANECUILTITLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN LUCAS ZOQUIAPAM') echo 'selected'; ?> value="SAN LUCAS ZOQUIAPAM">SAN LUCAS ZOQUIAPAM</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MARTÍN TOXPALAN') echo 'selected'; ?> value="SAN MARTÍN TOXPALAN">SAN MARTÍN TOXPALAN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MATEO YOLOXCHITLAN') echo 'selected'; ?> value="SAN MATEO YOLOXCHITLAN">SAN MATEO YOLOXCHITLAN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PEDRO OCOPETATILLO') echo 'selected'; ?> value="SAN PEDRO OCOPETATILLO">SAN PEDRO OCOPETATILLO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA ANA ATEIXTLAHUACA') echo 'selected'; ?> value="SANTA ANA ATEIXTLAHUACA">SANTA ANA ATEIXTLAHUACA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA CRUZ ACATEPEC') echo 'selected'; ?> value="SANTA CRUZ ACATEPEC">SANTA CRUZ ACATEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA LA ASUNCIÓN') echo 'selected'; ?> value="SANTA MARÍA LA ASUNCIÓN">SANTA MARÍA LA ASUNCIÓN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA CHILCHOTLA') echo 'selected'; ?> value="SANTA MARÍA CHILCHOTLA">SANTA MARÍA CHILCHOTLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA IXCATLÁN') echo 'selected'; ?> value="SANTA MARÍA IXCATLÁN">SANTA MARÍA IXCATLÁN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA TECOMAVACA') echo 'selected'; ?> value="SANTA MARÍA TECOMAVACA">SANTA MARÍA TECOMAVACA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA TEOPOXCO') echo 'selected'; ?> value="SANTA MARÍA TEOPOXCO">SANTA MARÍA TEOPOXCO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO TEXCALCINGO') echo 'selected'; ?> value="SANTIAGO TEXCALCINGO">SANTIAGO TEXCALCINGO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'TEOTITLAN DE FLORES MAGÓN') echo 'selected'; ?> value="TEOTITLAN DE FLORES MAGÓN">TEOTITLAN DE FLORES MAGÓN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'ASUNCIÓN IXTALTEPEC') echo 'selected'; ?> value="ASUNCIÓN IXTALTEPEC">ASUNCIÓN IXTALTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'BARRIO DE LA SOLEDAD') echo 'selected'; ?> value="BARRIO DE LA SOLEDAD">BARRIO DE LA SOLEDAD</option>
        <option <?php if ($usuario['MunicipioPC'] == 'CIUDAD IXTEPEC') echo 'selected'; ?> value="CIUDAD IXTEPEC">CIUDAD IXTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'CHAHUITES') echo 'selected'; ?> value="CHAHUITES">CHAHUITES</option>
        <option <?php if ($usuario['MunicipioPC'] == 'EL ESPINAL') echo 'selected'; ?> value="EL ESPINAL">EL ESPINAL</option>
        <option <?php if ($usuario['MunicipioPC'] == 'JUCHITAN DE ZARAGOZA') echo 'selected'; ?> value="JUCHITAN DE ZARAGOZA">JUCHITAN DE ZARAGOZA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'MATIAS ROMERO') echo 'selected'; ?> value="MATIAS ROMERO">MATIAS ROMERO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO NILTEPEC') echo 'selected'; ?> value="SANTIAGO NILTEPEC">SANTIAGO NILTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'REFORMA DE PINEDA') echo 'selected'; ?> value="REFORMA DE PINEDA">REFORMA DE PINEDA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN DIONISIO DEL MAR') echo 'selected'; ?> value="SAN DIONISIO DEL MAR">SAN DIONISIO DEL MAR</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN FRANCISCO DEL MAR') echo 'selected'; ?> value="SAN FRANCISCO DEL MAR">SAN FRANCISCO DEL MAR</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN FRANCISCO IXHUATAN') echo 'selected'; ?> value="SAN FRANCISCO IXHUATAN">SAN FRANCISCO IXHUATAN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN GUICHICOVI') echo 'selected'; ?> value="SAN JUAN GUICHICOVI">SAN JUAN GUICHICOVI</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MIGUEL CHIMALAPA') echo 'selected'; ?> value="SAN MIGUEL CHIMALAPA">SAN MIGUEL CHIMALAPA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PEDRO TAPANATEPEC') echo 'selected'; ?> value="SAN PEDRO TAPANATEPEC">SAN PEDRO TAPANATEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA CHIMALAPA') echo 'selected'; ?> value="SANTA MARÍA CHIMALAPA">SANTA MARÍA CHIMALAPA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA PETAPA') echo 'selected'; ?> value="SANTA MARÍA PETAPA">SANTA MARÍA PETAPA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA XADANI') echo 'selected'; ?> value="SANTA MARÍA XADANI">SANTA MARÍA XADANI</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTO DOMINGO INGENIO') echo 'selected'; ?> value="SANTO DOMINGO INGENIO">SANTO DOMINGO INGENIO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTO DOMINGO PETAPA') echo 'selected'; ?> value="SANTO DOMINGO PETAPA">SANTO DOMINGO PETAPA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTO DOMINGO ZANATEPEC') echo 'selected'; ?> value="SANTO DOMINGO ZANATEPEC">SANTO DOMINGO ZANATEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'UNIÓN HIDALGO') echo 'selected'; ?> value="UNIÓN HIDALGO">UNIÓN HIDALGO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'GUEVEA DE HUMBOLT') echo 'selected'; ?> value="GUEVEA DE HUMBOLT">GUEVEA DE HUMBOLT</option>
        <option <?php if ($usuario['MunicipioPC'] == 'MAGDALENA TEQUISISTLAN') echo 'selected'; ?> value="MAGDALENA TEQUISISTLAN">MAGDALENA TEQUISISTLAN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'MAGDALENA TLACOTEPEC') echo 'selected'; ?> value="MAGDALENA TLACOTEPEC">MAGDALENA TLACOTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SALINA CRUZ') echo 'selected'; ?> value="SALINA CRUZ">SALINA CRUZ</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN BLAS ATEMPA') echo 'selected'; ?> value="SAN BLAS ATEMPA">SAN BLAS ATEMPA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MATEO DEL MAR') echo 'selected'; ?> value="SAN MATEO DEL MAR">SAN MATEO DEL MAR</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MIGUEL TENANGO') echo 'selected'; ?> value="SAN MIGUEL TENANGO">SAN MIGUEL TENANGO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PEDRO COMITANCILLO') echo 'selected'; ?> value="SAN PEDRO COMITANCILLO">SAN PEDRO COMITANCILLO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PEDRO HUAMELULA') echo 'selected'; ?> value="SAN PEDRO HUAMELULA">SAN PEDRO HUAMELULA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PEDRO HUILOTEPEC') echo 'selected'; ?> value="SAN PEDRO HUILOTEPEC">SAN PEDRO HUILOTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA GUIENAGATI') echo 'selected'; ?> value="SANTA MARÍA GUIENAGATI">SANTA MARÍA GUIENAGATI</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA JALAPA DEL MARQUEZ') echo 'selected'; ?> value="SANTA MARÍA JALAPA DEL MARQUEZ">SANTA MARÍA JALAPA DEL MARQUEZ</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA MIXTEQUILLA') echo 'selected'; ?> value="SANTA MARÍA MIXTEQUILLA">SANTA MARÍA MIXTEQUILLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA TOTOLAPILLA') echo 'selected'; ?> value="SANTA MARÍA TOTOLAPILLA">SANTA MARÍA TOTOLAPILLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO ASTATA') echo 'selected'; ?> value="SANTIAGO ASTATA">SANTIAGO ASTATA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO LACHIGUIRI') echo 'selected'; ?> value="SANTIAGO LACHIGUIRI">SANTIAGO LACHIGUIRI</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO LAOLLAGA') echo 'selected'; ?> value="SANTIAGO LAOLLAGA">SANTIAGO LAOLLAGA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTO DOMINGO CHIHUITAN') echo 'selected'; ?> value="SANTO DOMINGO CHIHUITAN">SANTO DOMINGO CHIHUITAN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTO DOMINGO TEHUANTEPEC') echo 'selected'; ?> value="SANTO DOMINGO TEHUANTEPEC">SANTO DOMINGO TEHUANTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'CONCEPCIÓN BUENAVISTA') echo 'selected'; ?> value="CONCEPCIÓN BUENAVISTA">CONCEPCIÓN BUENAVISTA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MAGDALENA JICOTLÁN') echo 'selected'; ?> value="SANTA MAGDALENA JICOTLÁN">SANTA MAGDALENA JICOTLÁN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN CRISTÓBAL SUCHIXTLAHUACA') echo 'selected'; ?> value="SAN CRISTÓBAL SUCHIXTLAHUACA">SAN CRISTÓBAL SUCHIXTLAHUACA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN FRANCISCO TEOPAN') echo 'selected'; ?> value="SAN FRANCISCO TEOPAN">SAN FRANCISCO TEOPAN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN BAUTISTA COIXTLAHUACA') echo 'selected'; ?> value="SAN JUAN BAUTISTA COIXTLAHUACA">SAN JUAN BAUTISTA COIXTLAHUACA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MATEO TLAPILTEPEC') echo 'selected'; ?> value="SAN MATEO TLAPILTEPEC">SAN MATEO TLAPILTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MIGUEL TEQUIXTEPEC') echo 'selected'; ?> value="SAN MIGUEL TEQUIXTEPEC">SAN MIGUEL TEQUIXTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MIGUEL TULANCINGO') echo 'selected'; ?> value="SAN MIGUEL TULANCINGO">SAN MIGUEL TULANCINGO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA NATIVITAS') echo 'selected'; ?> value="SANTA MARÍA NATIVITAS">SANTA MARÍA NATIVITAS</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO IHUITLÁN PLUMAS') echo 'selected'; ?> value="SANTIAGO IHUITLÁN PLUMAS">SANTIAGO IHUITLÁN PLUMAS</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO TEPETLAPA') echo 'selected'; ?> value="SANTIAGO TEPETLAPA">SANTIAGO TEPETLAPA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'TEPELMEME VILLA DE MORELOS') echo 'selected'; ?> value="TEPELMEME VILLA DE MORELOS">TEPELMEME VILLA DE MORELOS</option>
        <option <?php if ($usuario['MunicipioPC'] == 'TLACOTEPEC PLUMAS') echo 'selected'; ?> value="TLACOTEPEC PLUMAS">TLACOTEPEC PLUMAS</option>
        <option <?php if ($usuario['MunicipioPC'] == 'ASUNCIÓN CUYOTEPEJI') echo 'selected'; ?> value="ASUNCIÓN CUYOTEPEJI">ASUNCIÓN CUYOTEPEJI</option>
        <option <?php if ($usuario['MunicipioPC'] == 'COSOLTEPEC') echo 'selected'; ?> value="COSOLTEPEC">COSOLTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'FRESNILLO DE TRUJANO') echo 'selected'; ?> value="FRESNILLO DE TRUJANO">FRESNILLO DE TRUJANO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'HUAJUAPAM DE LEÓN') echo 'selected'; ?> value="HUAJUAPAM DE LEÓN">HUAJUAPAM DE LEÓN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'MARISCALA DE JUÁREZ') echo 'selected'; ?> value="MARISCALA DE JUÁREZ">MARISCALA DE JUÁREZ</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN ANDRÉS DINICUITI') echo 'selected'; ?> value="SAN ANDRÉS DINICUITI">SAN ANDRÉS DINICUITI</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JERÓNIMO SILACOYOAPILLA') echo 'selected'; ?> value="SAN JERÓNIMO SILACOYOAPILLA">SAN JERÓNIMO SILACOYOAPILLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JORGE NUCHITA') echo 'selected'; ?> value="SAN JORGE NUCHITA">SAN JORGE NUCHITA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JOSÉ AYUQUILILLA') echo 'selected'; ?> value="SAN JOSÉ AYUQUILILLA">SAN JOSÉ AYUQUILILLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN BAUTISTA SUCHIXTEPEC') echo 'selected'; ?> value="SAN JUAN BAUTISTA SUCHIXTEPEC">SAN JUAN BAUTISTA SUCHIXTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MARCOS ARTEAGA') echo 'selected'; ?> value="SAN MARCOS ARTEAGA">SAN MARCOS ARTEAGA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MARTÍN ZACATEPEC') echo 'selected'; ?> value="SAN MARTÍN ZACATEPEC">SAN MARTÍN ZACATEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MIGUEL AMATITLÁN') echo 'selected'; ?> value="SAN MIGUEL AMATITLÁN">SAN MIGUEL AMATITLÁN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PEDRO Y SAN PABLO TEQUIXTEPEC') echo 'selected'; ?> value="SAN PEDRO Y SAN PABLO TEQUIXTEPEC">SAN PEDRO Y SAN PABLO TEQUIXTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN SIMÓN ZAHUATLÁN') echo 'selected'; ?> value="SAN SIMÓN ZAHUATLÁN">SAN SIMÓN ZAHUATLÁN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA CATARINA ZAPOQUILLA') echo 'selected'; ?> value="SANTA CATARINA ZAPOQUILLA">SANTA CATARINA ZAPOQUILLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA CRUZ TACACHE DE MINA') echo 'selected'; ?> value="SANTA CRUZ TACACHE DE MINA">SANTA CRUZ TACACHE DE MINA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA CAMOTLÁN') echo 'selected'; ?> value="SANTA MARÍA CAMOTLÁN">SANTA MARÍA CAMOTLÁN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO AYUQUILLA') echo 'selected'; ?> value="SANTIAGO AYUQUILLA">SANTIAGO AYUQUILLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO CACALOXTEPEC') echo 'selected'; ?> value="SANTIAGO CACALOXTEPEC">SANTIAGO CACALOXTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO CHAZUMBA') echo 'selected'; ?> value="SANTIAGO CHAZUMBA">SANTIAGO CHAZUMBA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO HUAJOLOTITLÁN') echo 'selected'; ?> value="SANTIAGO HUAJOLOTITLÁN">SANTIAGO HUAJOLOTITLÁN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO MILTEPEC') echo 'selected'; ?> value="SANTIAGO MILTEPEC">SANTIAGO MILTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTO DOMINGO TONALÁ') echo 'selected'; ?> value="SANTO DOMINGO TONALÁ">SANTO DOMINGO TONALÁ</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTO DOMINGO YODOHINO') echo 'selected'; ?> value="SANTO DOMINGO YODOHINO">SANTO DOMINGO YODOHINO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTOS REYES YUCUNA') echo 'selected'; ?> value="SANTOS REYES YUCUNA">SANTOS REYES YUCUNA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'TEZOATLÁN DE SEGURA Y LUNA') echo 'selected'; ?> value="TEZOATLÁN DE SEGURA Y LUNA">TEZOATLÁN DE SEGURA Y LUNA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'ZAPOTITLÁN PALMAS') echo 'selected'; ?> value="ZAPOTITLÁN PALMAS">ZAPOTITLÁN PALMAS</option>
        <option <?php if ($usuario['MunicipioPC'] == 'COICOYÁN DE LAS FLORES') echo 'selected'; ?> value="COICOYÁN DE LAS FLORES">COICOYÁN DE LAS FLORES</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN MIXTEPEC') echo 'selected'; ?> value="SAN JUAN MIXTEPEC">SAN JUAN MIXTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MARTÍN PERAS') echo 'selected'; ?> value="SAN MARTÍN PERAS">SAN MARTÍN PERAS</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MIGUEL TLACOTEPEC') echo 'selected'; ?> value="SAN MIGUEL TLACOTEPEC">SAN MIGUEL TLACOTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN SEBASTIÁN TECOMAXTLAHUACA') echo 'selected'; ?> value="SAN SEBASTIÁN TECOMAXTLAHUACA">SAN SEBASTIÁN TECOMAXTLAHUACA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO JUXTLAHUACA') echo 'selected'; ?> value="SANTIAGO JUXTLAHUACA">SANTIAGO JUXTLAHUACA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTOS REYES TEPEJILLO') echo 'selected'; ?> value="SANTOS REYES TEPEJILLO">SANTOS REYES TEPEJILLO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'ASUNCIÓN NOCHIXTLÁN') echo 'selected'; ?> value="ASUNCIÓN NOCHIXTLÁN">ASUNCIÓN NOCHIXTLÁN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'MAGDALENA JALTEPEC') echo 'selected'; ?> value="MAGDALENA JALTEPEC">MAGDALENA JALTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'MAGDALENA ZAHUATLÁN') echo 'selected'; ?> value="MAGDALENA ZAHUATLÁN">MAGDALENA ZAHUATLÁN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN ANDRÉS NUXIÑO') echo 'selected'; ?> value="SAN ANDRÉS NUXIÑO">SAN ANDRÉS NUXIÑO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN ANDRÉS SINAXTLA') echo 'selected'; ?> value="SAN ANDRÉS SINAXTLA">SAN ANDRÉS SINAXTLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN FRANCISCO CHINDÚA') echo 'selected'; ?> value="SAN FRANCISCO CHINDÚA">SAN FRANCISCO CHINDÚA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN FRANCISCO JALTEPETONGO') echo 'selected'; ?> value="SAN FRANCISCO JALTEPETONGO">SAN FRANCISCO JALTEPETONGO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN FRANCISCO NUXAÑO') echo 'selected'; ?> value="SAN FRANCISCO NUXAÑO">SAN FRANCISCO NUXAÑO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN DIUXI') echo 'selected'; ?> value="SAN JUAN DIUXI">SAN JUAN DIUXI</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN SAYULTEPEC') echo 'selected'; ?> value="SAN JUAN SAYULTEPEC">SAN JUAN SAYULTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN TAMAZOLA') echo 'selected'; ?> value="SAN JUAN TAMAZOLA">SAN JUAN TAMAZOLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN YUCUITA') echo 'selected'; ?> value="SAN JUAN YUCUITA">SAN JUAN YUCUITA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MATEO ETLATONGO') echo 'selected'; ?> value="SAN MATEO ETLATONGO">SAN MATEO ETLATONGO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MATEO SINDIHUI') echo 'selected'; ?> value="SAN MATEO SINDIHUI">SAN MATEO SINDIHUI</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MIGUEL CHICAHUA') echo 'selected'; ?> value="SAN MIGUEL CHICAHUA">SAN MIGUEL CHICAHUA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MIGUEL HUATLA') echo 'selected'; ?> value="SAN MIGUEL HUATLA">SAN MIGUEL HUATLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MIGUEL PIEDRAS') echo 'selected'; ?> value="SAN MIGUEL PIEDRAS">SAN MIGUEL PIEDRAS</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MIGUEL TECOMATLÁN') echo 'selected'; ?> value="SAN MIGUEL TECOMATLÁN">SAN MIGUEL TECOMATLÁN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PEDRO COXCALTEPEC CÁNTAROS') echo 'selected'; ?> value="SAN PEDRO COXCALTEPEC CÁNTAROS">SAN PEDRO COXCALTEPEC CÁNTAROS</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PEDRO TEOZACOALCO') echo 'selected'; ?> value="SAN PEDRO TEOZACOALCO">SAN PEDRO TEOZACOALCO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PEDRO TIDAÁ') echo 'selected'; ?> value="SAN PEDRO TIDAÁ">SAN PEDRO TIDAÁ</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA APAZCO') echo 'selected'; ?> value="SANTA MARÍA APAZCO">SANTA MARÍA APAZCO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA CHACHOAPAM') echo 'selected'; ?> value="SANTA MARÍA CHACHOAPAM">SANTA MARÍA CHACHOAPAM</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO APOALA') echo 'selected'; ?> value="SANTIAGO APOALA">SANTIAGO APOALA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO HUAUCLILLA') echo 'selected'; ?> value="SANTIAGO HUAUCLILLA">SANTIAGO HUAUCLILLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO TILALTONGO') echo 'selected'; ?> value="SANTIAGO TILALTONGO">SANTIAGO TILALTONGO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO TILLO') echo 'selected'; ?> value="SANTIAGO TILLO">SANTIAGO TILLO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTO DOMINGO NUXAÁ') echo 'selected'; ?> value="SANTO DOMINGO NUXAÁ">SANTO DOMINGO NUXAÁ</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTO DOMINGO YANHUITLÁN') echo 'selected'; ?> value="SANTO DOMINGO YANHUITLÁN">SANTO DOMINGO YANHUITLÁN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'MAGDALENA YODOCONO DE PORFIRIO DÍAZ') echo 'selected'; ?> value="MAGDALENA YODOCONO DE PORFIRIO DÍAZ">MAGDALENA YODOCONO DE PORFIRIO DÍAZ</option>
        <option <?php if ($usuario['MunicipioPC'] == 'YUTANDUCHI DE GUERRERO') echo 'selected'; ?> value="YUTANDUCHI DE GUERRERO">YUTANDUCHI DE GUERRERO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA INÉS DE ZARAGOZA') echo 'selected'; ?> value="SANTA INÉS DE ZARAGOZA">SANTA INÉS DE ZARAGOZA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'CALIHUALA') echo 'selected'; ?> value="CALIHUALA">CALIHUALA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'GUADALUPE DE RAMÍREZ') echo 'selected'; ?> value="GUADALUPE DE RAMÍREZ">GUADALUPE DE RAMÍREZ</option>
        <option <?php if ($usuario['MunicipioPC'] == 'IXPANTEPEC NIEVES') echo 'selected'; ?> value="IXPANTEPEC NIEVES">IXPANTEPEC NIEVES</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN AGUSTÍN ATENANGO') echo 'selected'; ?> value="SAN AGUSTÍN ATENANGO">SAN AGUSTÍN ATENANGO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN ANDRÉS TEPETLAPA') echo 'selected'; ?> value="SAN ANDRÉS TEPETLAPA">SAN ANDRÉS TEPETLAPA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN FRANCISCO TLAPANCINGO') echo 'selected'; ?> value="SAN FRANCISCO TLAPANCINGO">SAN FRANCISCO TLAPANCINGO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN BAUTISTA TLACHICHILCO') echo 'selected'; ?> value="SAN JUAN BAUTISTA TLACHICHILCO">SAN JUAN BAUTISTA TLACHICHILCO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN CIENEGUILLA') echo 'selected'; ?> value="SAN JUAN CIENEGUILLA">SAN JUAN CIENEGUILLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN IHUALTEPEC') echo 'selected'; ?> value="SAN JUAN IHUALTEPEC">SAN JUAN IHUALTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN LORENZO VICTORIA') echo 'selected'; ?> value="SAN LORENZO VICTORIA">SAN LORENZO VICTORIA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MATEO NEJAPAM') echo 'selected'; ?> value="SAN MATEO NEJAPAM">SAN MATEO NEJAPAM</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MIGUEL AHUEHUETITLAN') echo 'selected'; ?> value="SAN MIGUEL AHUEHUETITLAN">SAN MIGUEL AHUEHUETITLAN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN NICOLÁS HIDALGO') echo 'selected'; ?> value="SAN NICOLÁS HIDALGO">SAN NICOLÁS HIDALGO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA CRUZ DE BRAVO') echo 'selected'; ?> value="SANTA CRUZ DE BRAVO">SANTA CRUZ DE BRAVO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO DEL RÍO') echo 'selected'; ?> value="SANTIAGO DEL RÍO">SANTIAGO DEL RÍO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO TAMAZOLA') echo 'selected'; ?> value="SANTIAGO TAMAZOLA">SANTIAGO TAMAZOLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO YUCUYACHI') echo 'selected'; ?> value="SANTIAGO YUCUYACHI">SANTIAGO YUCUYACHI</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SILACAYOAPAM') echo 'selected'; ?> value="SILACAYOAPAM">SILACAYOAPAM</option>
        <option <?php if ($usuario['MunicipioPC'] == 'ZAPOTITLAN LAGUNAS') echo 'selected'; ?> value="ZAPOTITLAN LAGUNAS">ZAPOTITLAN LAGUNAS</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN ANDRÉS LAGUNAS') echo 'selected'; ?> value="SAN ANDRÉS LAGUNAS">SAN ANDRÉS LAGUNAS</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN ANTONIO MONTE VERDE') echo 'selected'; ?> value="SAN ANTONIO MONTE VERDE">SAN ANTONIO MONTE VERDE</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN ANTONIO ACUTLA') echo 'selected'; ?> value="SAN ANTONIO ACUTLA">SAN ANTONIO ACUTLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN BARTOLO SOYALTEPEC') echo 'selected'; ?> value="SAN BARTOLO SOYALTEPEC">SAN BARTOLO SOYALTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN TEPOSCOLULA') echo 'selected'; ?> value="SAN JUAN TEPOSCOLULA">SAN JUAN TEPOSCOLULA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PEDRO NOPALA') echo 'selected'; ?> value="SAN PEDRO NOPALA">SAN PEDRO NOPALA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PEDRO TOPILTEPEC') echo 'selected'; ?> value="SAN PEDRO TOPILTEPEC">SAN PEDRO TOPILTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PEDRO Y SAN PABLO TEPOSCOLULA') echo 'selected'; ?> value="SAN PEDRO Y SAN PABLO TEPOSCOLULA">SAN PEDRO Y SAN PABLO TEPOSCOLULA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PEDRO YUCUNAMA') echo 'selected'; ?> value="SAN PEDRO YUCUNAMA">SAN PEDRO YUCUNAMA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN SEBASTIÁN NICANANDUTA') echo 'selected'; ?> value="SAN SEBASTIÁN NICANANDUTA">SAN SEBASTIÁN NICANANDUTA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'VILLA CHILAPA DE DÍAZ') echo 'selected'; ?> value="VILLA CHILAPA DE DÍAZ">VILLA CHILAPA DE DÍAZ</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA NDUAYACO') echo 'selected'; ?> value="SANTA MARÍA NDUAYACO">SANTA MARÍA NDUAYACO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO NEJAPILLA') echo 'selected'; ?> value="SANTIAGO NEJAPILLA">SANTIAGO NEJAPILLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'VILLA TEJUPAM DE LA UNIÓN') echo 'selected'; ?> value="VILLA TEJUPAM DE LA UNIÓN">VILLA TEJUPAM DE LA UNIÓN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO YOLOMÉCATL') echo 'selected'; ?> value="SANTIAGO YOLOMÉCATL">SANTIAGO YOLOMÉCATL</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTO DOMINGO TLATAYAPAM') echo 'selected'; ?> value="SANTO DOMINGO TLATAYAPAM">SANTO DOMINGO TLATAYAPAM</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTO DOMINGO TONALTEPEC') echo 'selected'; ?> value="SANTO DOMINGO TONALTEPEC">SANTO DOMINGO TONALTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN VICENTE NUYU') echo 'selected'; ?> value="SAN VICENTE NUYU">SAN VICENTE NUYU</option>
        <option <?php if ($usuario['MunicipioPC'] == 'VILLA DE TAMAZULAPAM DEL PROGRESO') echo 'selected'; ?> value="VILLA DE TAMAZULAPAM DEL PROGRESO">VILLA DE TAMAZULAPAM DEL PROGRESO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO TEOTONGO') echo 'selected'; ?> value="SANTIAGO TEOTONGO">SANTIAGO TEOTONGO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'LA TRINIDAD VISTA HERMOSA') echo 'selected'; ?> value="LA TRINIDAD VISTA HERMOSA">LA TRINIDAD VISTA HERMOSA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'CHALCATONGO DE HIDALGO') echo 'selected'; ?> value="CHALCATONGO DE HIDALGO">CHALCATONGO DE HIDALGO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'MAGDALENA PEÑASCO') echo 'selected'; ?> value="MAGDALENA PEÑASCO">MAGDALENA PEÑASCO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN AGUSTÍN TLACOTEPEC') echo 'selected'; ?> value="SAN AGUSTÍN TLACOTEPEC">SAN AGUSTÍN TLACOTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN ANTONIO SINACAHUA') echo 'selected'; ?> value="SAN ANTONIO SINACAHUA">SAN ANTONIO SINACAHUA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN BARTOLOMÉ YUCUAÑE') echo 'selected'; ?> value="SAN BARTOLOMÉ YUCUAÑE">SAN BARTOLOMÉ YUCUAÑE</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN CRISTÓBAL AMOLTEPEC') echo 'selected'; ?> value="SAN CRISTÓBAL AMOLTEPEC">SAN CRISTÓBAL AMOLTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN ESTEBAN ATATLAHUACA') echo 'selected'; ?> value="SAN ESTEBAN ATATLAHUACA">SAN ESTEBAN ATATLAHUACA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN ACHIUTLA') echo 'selected'; ?> value="SAN JUAN ACHIUTLA">SAN JUAN ACHIUTLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN ÑUMI') echo 'selected'; ?> value="SAN JUAN ÑUMI">SAN JUAN ÑUMI</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN TEITA') echo 'selected'; ?> value="SAN JUAN TEITA">SAN JUAN TEITA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MARTÍN HUAMELULPAM') echo 'selected'; ?> value="SAN MARTÍN HUAMELULPAM">SAN MARTÍN HUAMELULPAM</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MARTÍN ITUNYOSO') echo 'selected'; ?> value="SAN MARTÍN ITUNYOSO">SAN MARTÍN ITUNYOSO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MATEO PEÑASCO') echo 'selected'; ?> value="SAN MATEO PEÑASCO">SAN MATEO PEÑASCO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MIGUEL ACHIUTLA') echo 'selected'; ?> value="SAN MIGUEL ACHIUTLA">SAN MIGUEL ACHIUTLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MIGUEL EL GRANDE') echo 'selected'; ?> value="SAN MIGUEL EL GRANDE">SAN MIGUEL EL GRANDE</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PABLO TIJALTEPEC') echo 'selected'; ?> value="SAN PABLO TIJALTEPEC">SAN PABLO TIJALTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PEDRO MARTIR YUCOXACO') echo 'selected'; ?> value="SAN PEDRO MARTIR YUCOXACO">SAN PEDRO MARTIR YUCOXACO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PEDRO MOLINOS') echo 'selected'; ?> value="SAN PEDRO MOLINOS">SAN PEDRO MOLINOS</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA CATARINA TAYATA') echo 'selected'; ?> value="SANTA CATARINA TAYATA">SANTA CATARINA TAYATA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA CATARINA TICUA') echo 'selected'; ?> value="SANTA CATARINA TICUA">SANTA CATARINA TICUA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA CATARINA YOSONOTU') echo 'selected'; ?> value="SANTA CATARINA YOSONOTU">SANTA CATARINA YOSONOTU</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA CRUZ NUNDACO') echo 'selected'; ?> value="SANTA CRUZ NUNDACO">SANTA CRUZ NUNDACO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA CRUZ TACAHUA') echo 'selected'; ?> value="SANTA CRUZ TACAHUA">SANTA CRUZ TACAHUA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA CRUZ TAYATA') echo 'selected'; ?> value="SANTA CRUZ TAYATA">SANTA CRUZ TAYATA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'HEROICA CIUDAD DE TLAXIACO') echo 'selected'; ?> value="HEROICA CIUDAD DE TLAXIACO">HEROICA CIUDAD DE TLAXIACO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA DEL ROSARIO') echo 'selected'; ?> value="SANTA MARÍA DEL ROSARIO">SANTA MARÍA DEL ROSARIO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA TATALTEPEC') echo 'selected'; ?> value="SANTA MARÍA TATALTEPEC">SANTA MARÍA TATALTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA YOLOTEPEC') echo 'selected'; ?> value="SANTA MARÍA YOLOTEPEC">SANTA MARÍA YOLOTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA YOSOYUA') echo 'selected'; ?> value="SANTA MARÍA YOSOYUA">SANTA MARÍA YOSOYUA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA YUCUITI') echo 'selected'; ?> value="SANTA MARÍA YUCUITI">SANTA MARÍA YUCUITI</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO NUNDICHI') echo 'selected'; ?> value="SANTIAGO NUNDICHI">SANTIAGO NUNDICHI</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO NOYOO') echo 'selected'; ?> value="SANTIAGO NOYOO">SANTIAGO NOYOO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO YOSONDUA') echo 'selected'; ?> value="SANTIAGO YOSONDUA">SANTIAGO YOSONDUA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTO DOMINGO IXCATLAN') echo 'selected'; ?> value="SANTO DOMINGO IXCATLAN">SANTO DOMINGO IXCATLAN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTO TOMÁS OCOTEPEC') echo 'selected'; ?> value="SANTO TOMÁS OCOTEPEC">SANTO TOMÁS OCOTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN COMALTEPEC') echo 'selected'; ?> value="SAN JUAN COMALTEPEC">SAN JUAN COMALTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN LALANA') echo 'selected'; ?> value="SAN JUAN LALANA">SAN JUAN LALANA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN PETLAPA') echo 'selected'; ?> value="SAN JUAN PETLAPA">SAN JUAN PETLAPA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO CHOAPAM') echo 'selected'; ?> value="SANTIAGO CHOAPAM">SANTIAGO CHOAPAM</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO JOCOTEPEC') echo 'selected'; ?> value="SANTIAGO JOCOTEPEC">SANTIAGO JOCOTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO YAVEO') echo 'selected'; ?> value="SANTIAGO YAVEO">SANTIAGO YAVEO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'ACATLÁN DE PÉREZ FIGUEROA') echo 'selected'; ?> value="ACATLÁN DE PÉREZ FIGUEROA">ACATLÁN DE PÉREZ FIGUEROA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'AYOTZINTEPEC') echo 'selected'; ?> value="AYOTZINTEPEC">AYOTZINTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'COSOAPA') echo 'selected'; ?> value="COSOAPA">COSOAPA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'LOMA BONITA') echo 'selected'; ?> value="LOMA BONITA">LOMA BONITA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN FELIPE JALAPA DE DÍAZ') echo 'selected'; ?> value="SAN FELIPE JALAPA DE DÍAZ">SAN FELIPE JALAPA DE DÍAZ</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN FELIPE USILA') echo 'selected'; ?> value="SAN FELIPE USILA">SAN FELIPE USILA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JOSÉ CHILTEPEC') echo 'selected'; ?> value="SAN JOSÉ CHILTEPEC">SAN JOSÉ CHILTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JOSÉ INDEPENDENCIA') echo 'selected'; ?> value="SAN JOSÉ INDEPENDENCIA">SAN JOSÉ INDEPENDENCIA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN BAUTISTA TUXTEPEC') echo 'selected'; ?> value="SAN JUAN BAUTISTA TUXTEPEC">SAN JUAN BAUTISTA TUXTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN LUCAS OJITLÁN') echo 'selected'; ?> value="SAN LUCAS OJITLÁN">SAN LUCAS OJITLÁN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MIGUEL SOYALTEPEC') echo 'selected'; ?> value="SAN MIGUEL SOYALTEPEC">SAN MIGUEL SOYALTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PEDRO IXCATLÁN') echo 'selected'; ?> value="SAN PEDRO IXCATLÁN">SAN PEDRO IXCATLÁN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MRÍA JACATEPEC') echo 'selected'; ?> value="SANTA MRÍA JACATEPEC">SANTA MRÍA JACATEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN BAUTISTA VALLE NACIONAL') echo 'selected'; ?> value="SAN JUAN BAUTISTA VALLE NACIONAL">SAN JUAN BAUTISTA VALLE NACIONAL</option>
        <option <?php if ($usuario['MunicipioPC'] == 'ABEJONES') echo 'selected'; ?> value="ABEJONES">ABEJONES</option>
        <option <?php if ($usuario['MunicipioPC'] == 'GUELATAO DE JUÁREZ') echo 'selected'; ?> value="GUELATAO DE JUÁREZ">GUELATAO DE JUÁREZ</option>
        <option <?php if ($usuario['MunicipioPC'] == 'IXTLÁN DE JUÁREZ') echo 'selected'; ?> value="IXTLÁN DE JUÁREZ">IXTLÁN DE JUÁREZ</option>
        <option <?php if ($usuario['MunicipioPC'] == 'NATIVIDAD') echo 'selected'; ?> value="NATIVIDAD">NATIVIDAD</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN ATEPEC') echo 'selected'; ?> value="SAN JUAN ATEPEC">SAN JUAN ATEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN CHICOMEZÚCHIL') echo 'selected'; ?> value="SAN JUAN CHICOMEZÚCHIL">SAN JUAN CHICOMEZÚCHIL</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN EVANGELISTA ANALCO') echo 'selected'; ?> value="SAN JUAN EVANGELISTA ANALCO">SAN JUAN EVANGELISTA ANALCO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN QUIOTEPEC') echo 'selected'; ?> value="SAN JUAN QUIOTEPEC">SAN JUAN QUIOTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'CAPULALPAM DE MÉNDEZ') echo 'selected'; ?> value="CAPULALPAM DE MÉNDEZ">CAPULALPAM DE MÉNDEZ</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MIGUEL ALOÁPAM') echo 'selected'; ?> value="SAN MIGUEL ALOÁPAM">SAN MIGUEL ALOÁPAM</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MIGUEL AMATLÁN') echo 'selected'; ?> value="SAN MIGUEL AMATLÁN">SAN MIGUEL AMATLÁN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MIGUEL DEL RÍO') echo 'selected'; ?> value="SAN MIGUEL DEL RÍO">SAN MIGUEL DEL RÍO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MIGUEL YOTAO') echo 'selected'; ?> value="SAN MIGUEL YOTAO">SAN MIGUEL YOTAO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PABLO MACUILTIANGUIS') echo 'selected'; ?> value="SAN PABLO MACUILTIANGUIS">SAN PABLO MACUILTIANGUIS</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PEDRO YANERI') echo 'selected'; ?> value="SAN PEDRO YANERI">SAN PEDRO YANERI</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PEDRO YOLOX') echo 'selected'; ?> value="SAN PEDRO YOLOX">SAN PEDRO YOLOX</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA ANA YANERI') echo 'selected'; ?> value="SANTA ANA YANERI">SANTA ANA YANERI</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA CATARINA IXTEPEJI') echo 'selected'; ?> value="SANTA CATARINA IXTEPEJI">SANTA CATARINA IXTEPEJI</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA CATARINA LACHATAO') echo 'selected'; ?> value="SANTA CATARINA LACHATAO">SANTA CATARINA LACHATAO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA JALTIANGUIS') echo 'selected'; ?> value="SANTA MARÍA JALTIANGUIS">SANTA MARÍA JALTIANGUIS</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA YAVESÍA') echo 'selected'; ?> value="SANTA MARÍA YAVESÍA">SANTA MARÍA YAVESÍA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO COMALTEPEC') echo 'selected'; ?> value="SANTIAGO COMALTEPEC">SANTIAGO COMALTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO LAXOPA') echo 'selected'; ?> value="SANTIAGO LAXOPA">SANTIAGO LAXOPA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO XIACUÍ') echo 'selected'; ?> value="SANTIAGO XIACUÍ">SANTIAGO XIACUÍ</option>
        <option <?php if ($usuario['MunicipioPC'] == 'NUEVO ZOQUIAPAM') echo 'selected'; ?> value="NUEVO ZOQUIAPAM">NUEVO ZOQUIAPAM</option>
        <option <?php if ($usuario['MunicipioPC'] == 'TEOCOCUILCO DE MARCOS PÉREZ') echo 'selected'; ?> value="TEOCOCUILCO DE MARCOS PÉREZ">TEOCOCUILCO DE MARCOS PÉREZ</option>
        <option <?php if ($usuario['MunicipioPC'] == 'ASUNCIÓN CACALOTEPEC') echo 'selected'; ?> value="ASUNCIÓN CACALOTEPEC">ASUNCIÓN CACALOTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'TAMAZALUPAM DEL ESPÍRITU SANTO') echo 'selected'; ?> value="TAMAZALUPAM DEL ESPÍRITU SANTO">TAMAZALUPAM DEL ESPÍRITU SANTO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'MIXISTLÁN DE LA REFORMA') echo 'selected'; ?> value="MIXISTLÁN DE LA REFORMA">MIXISTLÁN DE LA REFORMA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN COTZOCON') echo 'selected'; ?> value="SAN JUAN COTZOCON">SAN JUAN COTZOCON</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN MAZATLÁN') echo 'selected'; ?> value="SAN JUAN MAZATLÁN">SAN JUAN MAZATLÁN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN LUCAS CAMOTLÁN') echo 'selected'; ?> value="SAN LUCAS CAMOTLÁN">SAN LUCAS CAMOTLÁN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MIGUEL QUETZALTEPEC') echo 'selected'; ?> value="SAN MIGUEL QUETZALTEPEC">SAN MIGUEL QUETZALTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PEDRO OCOTEPEC') echo 'selected'; ?> value="SAN PEDRO OCOTEPEC">SAN PEDRO OCOTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PEDRO Y SAN PABLO AYUTLA') echo 'selected'; ?> value="SAN PEDRO Y SAN PABLO AYUTLA">SAN PEDRO Y SAN PABLO AYUTLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA ALOTEPEC') echo 'selected'; ?> value="SANTA MARÍA ALOTEPEC">SANTA MARÍA ALOTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA TEPANTLALI') echo 'selected'; ?> value="SANTA MARÍA TEPANTLALI">SANTA MARÍA TEPANTLALI</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA TLAHUILTOLTEPEC') echo 'selected'; ?> value="SANTA MARÍA TLAHUILTOLTEPEC">SANTA MARÍA TLAHUILTOLTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO ATITLÁN') echo 'selected'; ?> value="SANTIAGO ATITLÁN">SANTIAGO ATITLÁN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO IXCUINTEPEC') echo 'selected'; ?> value="SANTIAGO IXCUINTEPEC">SANTIAGO IXCUINTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO ZACATEPEC') echo 'selected'; ?> value="SANTIAGO ZACATEPEC">SANTIAGO ZACATEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTO DOMINGO TEPUXTEPEC') echo 'selected'; ?> value="SANTO DOMINGO TEPUXTEPEC">SANTO DOMINGO TEPUXTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'TOTONTEPEC VILLA DE MORELOS') echo 'selected'; ?> value="TOTONTEPEC VILLA DE MORELOS">TOTONTEPEC VILLA DE MORELOS</option>
        <option <?php if ($usuario['MunicipioPC'] == 'VILLA HIDALGO') echo 'selected'; ?> value="VILLA HIDALGO">VILLA HIDALGO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN ANDRÉS SOLAGA') echo 'selected'; ?> value="SAN ANDRÉS SOLAGA">SAN ANDRÉS SOLAGA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN ANDRÉS YAA') echo 'selected'; ?> value="SAN ANDRÉS YAA">SAN ANDRÉS YAA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN BALTAZAR YATZACHI EL BAJO') echo 'selected'; ?> value="SAN BALTAZAR YATZACHI EL BAJO">SAN BALTAZAR YATZACHI EL BAJO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN BARTOLOMÉ ZOOGOCHO') echo 'selected'; ?> value="SAN BARTOLOMÉ ZOOGOCHO">SAN BARTOLOMÉ ZOOGOCHO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN CRISTÓBAL LACHIRIOAG') echo 'selected'; ?> value="SAN CRISTÓBAL LACHIRIOAG">SAN CRISTÓBAL LACHIRIOAG</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN FRANCISCO CAJONOS') echo 'selected'; ?> value="SAN FRANCISCO CAJONOS">SAN FRANCISCO CAJONOS</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN ILDEFONSO VILLA ALTA') echo 'selected'; ?> value="SAN ILDEFONSO VILLA ALTA">SAN ILDEFONSO VILLA ALTA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN JUQUILA VIJANOS') echo 'selected'; ?> value="SAN JUAN JUQUILA VIJANOS">SAN JUAN JUQUILA VIJANOS</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN TABAA') echo 'selected'; ?> value="SAN JUAN TABAA">SAN JUAN TABAA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN YAEE') echo 'selected'; ?> value="SAN JUAN YAEE">SAN JUAN YAEE</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN YATZONA') echo 'selected'; ?> value="SAN JUAN YATZONA">SAN JUAN YATZONA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MATEO CAJONOS') echo 'selected'; ?> value="SAN MATEO CAJONOS">SAN MATEO CAJONOS</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MELCHOR BETAZA') echo 'selected'; ?> value="SAN MELCHOR BETAZA">SAN MELCHOR BETAZA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'VILLA TALEA DE CASTRO') echo 'selected'; ?> value="VILLA TALEA DE CASTRO">VILLA TALEA DE CASTRO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PABLO YAGANIZA') echo 'selected'; ?> value="SAN PABLO YAGANIZA">SAN PABLO YAGANIZA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PEDRO CAJONOS') echo 'selected'; ?> value="SAN PEDRO CAJONOS">SAN PEDRO CAJONOS</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA TEMAXCALAPA') echo 'selected'; ?> value="SANTA MARÍA TEMAXCALAPA">SANTA MARÍA TEMAXCALAPA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA YALINA') echo 'selected'; ?> value="SANTA MARÍA YALINA">SANTA MARÍA YALINA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO CAMOTLÁN') echo 'selected'; ?> value="SANTIAGO CAMOTLÁN">SANTIAGO CAMOTLÁN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO LALOPA') echo 'selected'; ?> value="SANTIAGO LALOPA">SANTIAGO LALOPA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO ZOOCHILA') echo 'selected'; ?> value="SANTIAGO ZOOCHILA">SANTIAGO ZOOCHILA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTO DOMINGO ROAYAGA') echo 'selected'; ?> value="SANTO DOMINGO ROAYAGA">SANTO DOMINGO ROAYAGA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTO DOMINGO XAGACIA') echo 'selected'; ?> value="SANTO DOMINGO XAGACIA">SANTO DOMINGO XAGACIA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'TANETZE DE ZARAGOZA') echo 'selected'; ?> value="TANETZE DE ZARAGOZA">TANETZE DE ZARAGOZA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'MIAHUATLAN DE PORFIRIO DÍAZ') echo 'selected'; ?> value="MIAHUATLAN DE PORFIRIO DÍAZ">MIAHUATLAN DE PORFIRIO DÍAZ</option>
        <option <?php if ($usuario['MunicipioPC'] == 'MONJAS') echo 'selected'; ?> value="MONJAS">MONJAS</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN ANDRÉS PAXTLAN') echo 'selected'; ?> value="SAN ANDRÉS PAXTLAN">SAN ANDRÉS PAXTLAN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN CRISTÓBAL AMATLAN') echo 'selected'; ?> value="SAN CRISTÓBAL AMATLAN">SAN CRISTÓBAL AMATLAN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN FRANCISCO LOGUECHE') echo 'selected'; ?> value="SAN FRANCISCO LOGUECHE">SAN FRANCISCO LOGUECHE</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN FRANCISCO OZOLOTEPEC') echo 'selected'; ?> value="SAN FRANCISCO OZOLOTEPEC">SAN FRANCISCO OZOLOTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN ILDENFONSO AMATLAN') echo 'selected'; ?> value="SAN ILDENFONSO AMATLAN">SAN ILDENFONSO AMATLAN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JERÓNIMO COATLAN') echo 'selected'; ?> value="SAN JERÓNIMO COATLAN">SAN JERÓNIMO COATLAN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JOSÉ DEL PEÑASCO') echo 'selected'; ?> value="SAN JOSÉ DEL PEÑASCO">SAN JOSÉ DEL PEÑASCO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JOSE LACHIGUIRI') echo 'selected'; ?> value="SAN JOSE LACHIGUIRI">SAN JOSE LACHIGUIRI</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN MIXTEPEC') echo 'selected'; ?> value="SAN JUAN MIXTEPEC">SAN JUAN MIXTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN OZOLOTEPEC') echo 'selected'; ?> value="SAN JUAN OZOLOTEPEC">SAN JUAN OZOLOTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN LUIS AMATLAN') echo 'selected'; ?> value="SAN LUIS AMATLAN">SAN LUIS AMATLAN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MARCIAL OZOLOTEPEC') echo 'selected'; ?> value="SAN MARCIAL OZOLOTEPEC">SAN MARCIAL OZOLOTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MATEO RIO HONDO') echo 'selected'; ?> value="SAN MATEO RIO HONDO">SAN MATEO RIO HONDO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MIGUEL COATLAN') echo 'selected'; ?> value="SAN MIGUEL COATLAN">SAN MIGUEL COATLAN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN MIGUEL SUCHIXTEPEC') echo 'selected'; ?> value="SAN MIGUEL SUCHIXTEPEC">SAN MIGUEL SUCHIXTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN NICOLÁS') echo 'selected'; ?> value="SAN NICOLÁS">SAN NICOLÁS</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PABLO COATLAN') echo 'selected'; ?> value="SAN PABLO COATLAN">SAN PABLO COATLAN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PEDRO MIXTEPEC') echo 'selected'; ?> value="SAN PEDRO MIXTEPEC">SAN PEDRO MIXTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN SEBASTIÁN COATLAN') echo 'selected'; ?> value="SAN SEBASTIÁN COATLAN">SAN SEBASTIÁN COATLAN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN SEBASTIÁN RÍO HONDO') echo 'selected'; ?> value="SAN SEBASTIÁN RÍO HONDO">SAN SEBASTIÁN RÍO HONDO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN SIMÓN ALMOLONGAS') echo 'selected'; ?> value="SAN SIMÓN ALMOLONGAS">SAN SIMÓN ALMOLONGAS</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA ANA MIAHUATLAN') echo 'selected'; ?> value="SANTA ANA MIAHUATLAN">SANTA ANA MIAHUATLAN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA CATARINA CUIXTL') echo 'selected'; ?> value="SANTA CATARINA CUIXTL">SANTA CATARINA CUIXTL</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA CRUZ XITLA') echo 'selected'; ?> value="SANTA CRUZ XITLA">SANTA CRUZ XITLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA LUCÍA MIAHUATLAN') echo 'selected'; ?> value="SANTA LUCÍA MIAHUATLAN">SANTA LUCÍA MIAHUATLAN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA OZOLOTEPEC') echo 'selected'; ?> value="SANTA MARÍA OZOLOTEPEC">SANTA MARÍA OZOLOTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO XANICA') echo 'selected'; ?> value="SANTIAGO XANICA">SANTIAGO XANICA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTO DOMINGO OZOLOTEPEC') echo 'selected'; ?> value="SANTO DOMINGO OZOLOTEPEC">SANTO DOMINGO OZOLOTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTO TOMÁS TAMAZULAPAM') echo 'selected'; ?> value="SANTO TOMÁS TAMAZULAPAM">SANTO TOMÁS TAMAZULAPAM</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SITIO DE XITLAPEHUA') echo 'selected'; ?> value="SITIO DE XITLAPEHUA">SITIO DE XITLAPEHUA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'CONSTANCIA DEL ROSARIO') echo 'selected'; ?> value="CONSTANCIA DEL ROSARIO">CONSTANCIA DEL ROSARIO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'MESONES HIDALGO') echo 'selected'; ?> value="MESONES HIDALGO">MESONES HIDALGO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'PUTLA VILLA DE GUERRERO') echo 'selected'; ?> value="PUTLA VILLA DE GUERRERO">PUTLA VILLA DE GUERRERO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'LA REFORMA') echo 'selected'; ?> value="LA REFORMA">LA REFORMA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN ANDRÉS CABECERA NUEVA') echo 'selected'; ?> value="SAN ANDRÉS CABECERA NUEVA">SAN ANDRÉS CABECERA NUEVA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PEDRO AMUZGOS') echo 'selected'; ?> value="SAN PEDRO AMUZGOS">SAN PEDRO AMUZGOS</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA CRUZ ITUNDUJIA') echo 'selected'; ?> value="SANTA CRUZ ITUNDUJIA">SANTA CRUZ ITUNDUJIA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA LUCÍA MONTEVERDE') echo 'selected'; ?> value="SANTA LUCÍA MONTEVERDE">SANTA LUCÍA MONTEVERDE</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA IPALAPA') echo 'selected'; ?> value="SANTA MARÍA IPALAPA">SANTA MARÍA IPALAPA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA ZACATEPEC') echo 'selected'; ?> value="SANTA MARÍA ZACATEPEC">SANTA MARÍA ZACATEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN FRANCISCO CAHUACUA') echo 'selected'; ?> value="SAN FRANCISCO CAHUACUA">SAN FRANCISCO CAHUACUA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN FRANCISCO SOLA') echo 'selected'; ?> value="SAN FRANCISCO SOLA">SAN FRANCISCO SOLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN ILDEFONSO SOLA') echo 'selected'; ?> value="SAN ILDEFONSO SOLA">SAN ILDEFONSO SOLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JACINTO TLACOTEPEC') echo 'selected'; ?> value="SAN JACINTO TLACOTEPEC">SAN JACINTO TLACOTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN LORENZO TEXMELUCAN') echo 'selected'; ?> value="SAN LORENZO TEXMELUCAN">SAN LORENZO TEXMELUCAN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'VILLA SOLA DE VEGA') echo 'selected'; ?> value="VILLA SOLA DE VEGA">VILLA SOLA DE VEGA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA CRUZ ZENZONTEPEC') echo 'selected'; ?> value="SANTA CRUZ ZENZONTEPEC">SANTA CRUZ ZENZONTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA LACHIXIO') echo 'selected'; ?> value="SANTA MARÍA LACHIXIO">SANTA MARÍA LACHIXIO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA SOLA') echo 'selected'; ?> value="SANTA MARÍA SOLA">SANTA MARÍA SOLA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA ZANIZA') echo 'selected'; ?> value="SANTA MARÍA ZANIZA">SANTA MARÍA ZANIZA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO AMOLTEPEC') echo 'selected'; ?> value="SANTIAGO AMOLTEPEC">SANTIAGO AMOLTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO MINAS') echo 'selected'; ?> value="SANTIAGO MINAS">SANTIAGO MINAS</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTIAGO TEXTITLAN') echo 'selected'; ?> value="SANTIAGO TEXTITLAN">SANTIAGO TEXTITLAN</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTO DOMINGO TEOJOMULCO') echo 'selected'; ?> value="SANTO DOMINGO TEOJOMULCO">SANTO DOMINGO TEOJOMULCO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN VICENTE LACHIXIO') echo 'selected'; ?> value="SAN VICENTE LACHIXIO">SAN VICENTE LACHIXIO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'ZAPOTITLÁN DEL RÍO') echo 'selected'; ?> value="ZAPOTITLÁN DEL RÍO">ZAPOTITLÁN DEL RÍO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'ASUNCION TLACOLULITA') echo 'selected'; ?> value="ASUNCION TLACOLULITA">ASUNCION TLACOLULITA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'NEJAPA DE MADERO') echo 'selected'; ?> value="NEJAPA DE MADERO">NEJAPA DE MADERO</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA CATARINA QUIOQUITANI') echo 'selected'; ?> value="SANTA CATARINA QUIOQUITANI">SANTA CATARINA QUIOQUITANI</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN BARTOLO YAUTEPEC') echo 'selected'; ?> value="SAN BARTOLO YAUTEPEC">SAN BARTOLO YAUTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN CARLOS YAUTEPEC') echo 'selected'; ?> value="SAN CARLOS YAUTEPEC">SAN CARLOS YAUTEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN JUQUILA MIXES') echo 'selected'; ?> value="SAN JUAN JUQUILA MIXES">SAN JUAN JUQUILA MIXES</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN JUAN LAJARCIA') echo 'selected'; ?> value="SAN JUAN LAJARCIA">SAN JUAN LAJARCIA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SAN PEDRO MARTIR QUIECHAPA') echo 'selected'; ?> value="SAN PEDRO MARTIR QUIECHAPA">SAN PEDRO MARTIR QUIECHAPA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA ANA TAVELA') echo 'selected'; ?> value="SANTA ANA TAVELA">SANTA ANA TAVELA</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA CATARINA QUIERI') echo 'selected'; ?> value="SANTA CATARINA QUIERI">SANTA CATARINA QUIERI</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA ECATEPEC') echo 'selected'; ?> value="SANTA MARÍA ECATEPEC">SANTA MARÍA ECATEPEC</option>
        <option <?php if ($usuario['MunicipioPC'] == 'SANTA MARÍA QUIEGOLANI') echo 'selected'; ?> value="SANTA MARÍA QUIEGOLANI">SANTA MARÍA QUIEGOLANI</option>

    </select>
    <div class="invalid-feedback">Se requiere una selección válida.</div>
    </div>



 
<!-- gggg -->

<div class="col-sm-6">
        <label for="coloniaPC" class="form-label">Localidad/Colonia/Agencia</label>
        <input type="text" class="form-control" id="coloniaPC" name="coloniaPC" value="<?php echo $usuario['ColoniaPC']; ?>"><br>
        <div class="invalid-feedback">Se requiere una colonia válida.</div>
    </div>

    <div class="col-sm-6">
    <label for="coloniaPC" class="form-label">Región</label>
    <input type="text" class="form-control" id="regionpc"  name="regionPC" readonly value="<?php echo $usuario['RegionPC']; ?>"><br>
    <div class="invalid-feedback">Se requiere una colonia válida.</div>
    </div>


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
        <label for="telConfianza" class="form-label">Teléfono de confianza</label>
        <input type="number" class="form-control" id="telConfianza" name="telConfianza" value="<?php echo $usuario['TelConfianza']; ?>"><br>
        <div class="invalid-feedback">Se requiere un número de teléfono de confianza válido.</div>
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
        <input type="text" class="form-control" maxlength="50" id="emailRespaldo" name="emailRespaldo" placeholder="you@example.com" value="<?php echo $usuario['EmailRespaldo']; ?>"><br>
    </div>

            <h4>Documentos comprobables</h4>
            <hr class="my-4">

            <div class="col-sm-6">
        <label for="curp" class="form-label">CURP</label>
        <input type="text" class="form-control" id="curp" name="curp" value="<?php echo $usuario['CURP']; ?>"><br>
        <div class="invalid-feedback">Se requiere una CURP válida.</div>
    </div>

    <div class="col-sm-6">
        <label for="ine" class="form-label">INE</label>
        <input type="text" class="form-control" id="ine" name="ine" value="<?php echo $usuario['INE']; ?>"><br>
        <div class="invalid-feedback">Se requiere una INE válida.</div>
    </div>

    <h3>Estudio socioeconómico</h3>
            <hr class="my-4">

    <div class="col-sm-6">
        <label for="ocupacion" class="form-label">Ocupación</label>
        <input type="text" class="form-control" id="ocupacion" name="ocupacion" value="<?php echo $usuario['Ocupacion']; ?>"><br>
        <div class="invalid-feedback">Se requiere una ocupación válida.</div>
    </div>
    
    <div class="col-sm-6">
        <label for="fuenteIngresos" class="form-label">Fuente de ingresos</label>
        <input type="text" class="form-control" id="fuenteIngresos" name="fuenteIngresos" value="<?php echo $usuario['FuenteIngresos']; ?>"><br>
        <div class="invalid-feedback">Se requiere una fuente de ingresos válida.</div>
    </div>

    <div class="col-sm-6">
    <label for="sectorEconomico" class="form-label">Sector económico</label>
    <select class="form-select" id="sectorEconomico" name="sectorEconomico" aria-label="Default select example">
        <option selected disabled value="">Selecciona una opción...</option>
        <option <?php if ($usuario['SectorEconomico'] == 'SERVICIOS SOCIALES') echo 'selected'; ?> value="SERVICIOS SOCIALES">SERVICIOS SOCIALES</option>
        <option <?php if ($usuario['SectorEconomico'] == 'INDUSTRIA MANUFACTURERA') echo 'selected'; ?> value="INDUSTRIA MANUFACTURERA">INDUSTRIA MANUFACTURERA</option>
        <option <?php if ($usuario['SectorEconomico'] == 'COMERCIO') echo 'selected'; ?> value="COMERCIO">COMERCIO</option>
        <option <?php if ($usuario['SectorEconomico'] == 'SERVICIOS DIVERSOS') echo 'selected'; ?> value="SERVICIOS DIVERSOS">SERVICIOS DIVERSOS</option>
        <option <?php if ($usuario['SectorEconomico'] == 'SERVICIOS PROFESIONALES, FINANCIEROS Y CORPORATIVOS') echo 'selected'; ?> value="SERVICIOS PROFESIONALES, FINANCIEROS Y CORPORATIVOS">SERVICIOS PROFESIONALES, FINANCIEROS Y CORPORATIVOS</option>
        <option <?php if ($usuario['SectorEconomico'] == 'RESTAURANTES Y SERVICIOS DE ALOJAMIENTO') echo 'selected'; ?> value="RESTAURANTES Y SERVICIOS DE ALOJAMIENTO">RESTAURANTES Y SERVICIOS DE ALOJAMIENTO</option>
        <option <?php if ($usuario['SectorEconomico'] == 'GOBIERNO Y ORGANISMOS INTERNACIONALES') echo 'selected'; ?> value="GOBIERNO Y ORGANISMOS INTERNACIONALES">GOBIERNO Y ORGANISMOS INTERNACIONALES</option>
        <option <?php if ($usuario['SectorEconomico'] == 'AGRICULTURA, GANADERÍA, SILVICULTURA Y PESCA') echo 'selected'; ?> value="AGRICULTURA, GANADERÍA, SILVICULTURA Y PESCA">AGRICULTURA, GANADERÍA, SILVICULTURA Y PESCA</option>
        <option <?php if ($usuario['SectorEconomico'] == 'TRANSPORTES Y ALMACENAMIENTO') echo 'selected'; ?> value="TRANSPORTES Y ALMACENAMIENTO">TRANSPORTES Y ALMACENAMIENTO</option>
        <option <?php if ($usuario['SectorEconomico'] == 'CONSTRUCCIÓN') echo 'selected'; ?> value="CONSTRUCCIÓN">CONSTRUCCIÓN</option>
        <option <?php if ($usuario['SectorEconomico'] == 'INDUSTRIA EXTRACTIVA Y ELECTRICIDAD') echo 'selected'; ?> value="INDUSTRIA EXTRACTIVA Y ELECTRICIDAD">INDUSTRIA EXTRACTIVA Y ELECTRICIDAD</option>
        <option <?php if ($usuario['SectorEconomico'] == 'OTRO') echo 'selected'; ?> value="OTRO">OTRO</option>
        <option <?php if ($usuario['SectorEconomico'] == 'SIN DATOS') echo 'selected'; ?> value="SIN DATOS">SIN DATOS</option>
    </select>
    <div class="invalid-feedback">Se requiere seleccionar un sector económico.</div>
</div>

<div class="col-sm-6">
        <label for="horasTrabajo" class="form-label">Horas de trabajo al Día</label>
        <input type="number" min="0" max="24" class="form-control" id="horasTrabajo" name="horasTrabajo" value="<?php echo $usuario['HorasTrabajo']; ?>"><br>
        <div class="invalid-feedback">Se requiere un número válido de horas de trabajo.</div>
    </div>
    
    <div class="col-sm-6">
        <label for="ingresosDiarios" class="form-label">Ingresos Diarios</label>
        <input type="number" min="0" max="1000000" class="form-control" id="ingresosDiarios" name="ingresosDiarios" value="<?php echo $usuario['IngresosDiarios']; ?>"><br>
        <div class="invalid-feedback">Se requiere un número válido de ingresos diarios.</div>
    </div>

            <h4>Datos de vivienda </h4>
            <hr class="my-4">

            <div class="col-sm-6">
    <label for="tipoEnergia" class="form-label">Tipo de energía</label>
    <select class="form-select" id="tipoEnergia" name="tipoEnergia" aria-label="Default select example">
        <option selected disabled value="">Selecciona una opción...</option>
        <option <?php if ($usuario['TipoEnergia'] == 'ELECTRICA') echo 'selected'; ?> value="ELECTRICA">Eléctrica</option>
        <option <?php if ($usuario['TipoEnergia'] == 'SOLAR') echo 'selected'; ?> value="SOLAR">Solar</option>
        <option <?php if ($usuario['TipoEnergia'] == 'NINGUNA') echo 'selected'; ?> value="NINGUNA">Ninguna</option>
        <option <?php if ($usuario['TipoEnergia'] == 'SIN DATOS') echo 'selected'; ?> value="SIN DATOS">SIN DATOS</option>
    </select>
    <div class="invalid-feedback">Se requiere seleccionar el tipo de energía.</div>
</div>


<div class="col-sm-6">
    <label class="form-label">¿La vivienda cuenta con servicios de agua?</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="agua" id="aguaSI" value="SI" <?php if($usuario['Agua'] == "SI") echo 'checked="checked"'; ?> >
        <label class="form-check-label" for="aguaSI">Sí</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="agua" id="aguaNO" value="NO" <?php if($usuario['Agua'] == "NO") echo 'checked="checked"'; ?> >
        <label class="form-check-label" for="aguaNO">No</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="agua" id="aguaNODATOS" value="SIN DATOS" <?php if($usuario['Agua'] == "SIN DATOS") echo 'checked="checked"'; ?>>
        <label class="form-check-label" for="aguaNODATOS">SIN DATOS</label>
    </div>
    <div class="invalid-feedback">Se requiere seleccionar una opción para los servicios de agua.</div>
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


    <div class="col-sm-6">
    <label for="tipoServicioAgua" class="form-label">Tipo de servicio de agua</label>
    <select class="form-select" id="tipoServicioAgua" name="tipoServicioAgua" aria-label="Default select example">
        <option selected disabled value="">Selecciona una opción...</option>
        <option <?php if ($usuario['TipoServicioAgua'] == 'AGUA POTABLE') echo 'selected'; ?> value="AGUA POTABLE">Agua potable</option>
        <option <?php if ($usuario['TipoServicioAgua'] == 'RECOLECCIÓN DE LLUVIA') echo 'selected'; ?> value="RECOLECCIÓN DE LLUVIA">Recolección de lluvia</option>
        <option <?php if ($usuario['TipoServicioAgua'] == 'POZO') echo 'selected'; ?> value="POZO">Pozo</option>
        <option <?php if ($usuario['TipoServicioAgua'] == 'AGUA POR PIPA') echo 'selected'; ?> value="AGUA POR PIPA">Agua por pipa</option>
        <option <?php if ($usuario['TipoServicioAgua'] == 'AGUA POR ACARREO') echo 'selected'; ?> value="AGUA POR ACARREO">Agua por acarreo</option>
        <option <?php if ($usuario['TipoServicioAgua'] == 'OTRO') echo 'selected'; ?> value="OTRO">Otro</option>
        <option <?php if ($usuario['TipoServicioAgua'] == 'SIN DATOS') echo 'selected'; ?> value="SIN DATOS">SIN DATOS</option>
    </select>
    <div class="invalid-feedback">Se requiere seleccionar el tipo de servicio de agua.</div>
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
    <label class="form-label">¿Cuenta con Baño dentro de la casa?</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="banioDentro" id="banioDentroSI" value="SI" <?php if($usuario['BanioDentro'] == "SI") echo 'checked="checked"'; ?> >
        <label class="form-check-label" for="banioDentroSI">Sí</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="banioDentro" id="banioDentroNO" value="NO" <?php if($usuario['BanioDentro'] == "NO") echo 'checked="checked"'; ?> >
        <label class="form-check-label" for="banioDentroNO">No</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="banioDentro" id="banioDentroSinDatos" value="SIN DATOS" <?php if($usuario['BanioDentro'] == "SIN DATOS") echo 'checked="checked"'; ?> >
        <label class="form-check-label" for="banioDentroSinDatos">SIN DATOS</label>
    </div>
    <div class="invalid-feedback">Se requiere seleccionar si cuenta con baño dentro de la casa.</div>
</div>


    <div class="col-sm-6">
    <label for="TipoBano" class="form-label">¿Tipo de instalación sanitaria?</label>
    <select class="form-select" id="TipoBano" name="tipoBano" aria-label="Default select example">
        <option selected disabled value="">Selecciona una opción...</option>
        <option <?php if ($usuario['TipoBano'] == 'DRENAJE') echo 'selected'; ?> value="DRENAJE">Drenaje</option>
        <option <?php if ($usuario['TipoBano'] == 'BAÑO SECO') echo 'selected'; ?> value="BAÑO SECO">Baño seco</option>
        <option <?php if ($usuario['TipoBano'] == 'LETRINA') echo 'selected'; ?> value="LETRINA">Letrina</option>
        <option <?php if ($usuario['TipoBano'] == 'AL AIRE LIBRE') echo 'selected'; ?> value="AL AIRE LIBRE">Al aire libre</option>
        <option <?php if ($usuario['TipoBano'] == 'OTRO') echo 'selected'; ?> value="OTRO">Otro</option>
        <option <?php if ($usuario['TipoBano'] == 'SIN DATOS') echo 'selected'; ?> value="SIN DATOS">SIN DATOS</option>
    </select>
    <div class="invalid-feedback">Se requiere seleccionar el tipo de instalación sanitaria.</div>
</div>


    <div class="col-sm-6">
        <label for="personasCasa" class="form-label">¿Cuántas personas viven en la misma casa, incluyendo a niñas y niños?</label>
        <input type="number" max="20" class="form-control" id="personasCasa" name="personasCasa" value="<?php echo $usuario['PersonasCasa']; ?>"><br>
        <div class="invalid-feedback">Se requiere ingresar el número de personas que viven en la misma casa.</div>
    </div>

    <div class="col-sm-6">
        <label for="personasDormitorio" class="form-label">¿Cuántas personas duermen en un mismo cuarto, incluyendo a niñas y niños?</label>
        <input type="number" max="20" class="form-control" id="personasDormitorio" name="personasDormitorio" value="<?php echo $usuario['PersonasDormitorio']; ?>"><br>
        <div class="invalid-feedback">Se requiere ingresar el número de personas que duermen en un mismo cuarto.</div>
    </div>

    

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


<div class="col-sm-12">
    <label for="comoSeEntero" class="form-label">¿Cómo se enteró de GESMujer?</label>
    <select class="form-select" id="comoSeEntero" name="comoSeEntero" aria-label="Default select example">
        <option selected disabled value="">Selecciona una opción...</option>
        <option <?php if ($usuario['ComoSeEntero'] == 'MEDIOS DE COMUNICACIÓN TRADICIONALES') echo 'selected'; ?> value="MEDIOS DE COMUNICACIÓN TRADICIONALES">Medios de comunicación tradicionales</option>
        <option <?php if ($usuario['ComoSeEntero'] == 'REDES SOCIALES') echo 'selected'; ?> value="REDES SOCIALES">Redes sociales</option>
        <option <?php if ($usuario['ComoSeEntero'] == 'PÁGINA WEB') echo 'selected'; ?> value="PÁGINA WEB">Página web</option>
        <option <?php if ($usuario['ComoSeEntero'] == 'RECOMENDACIÓN DE ALGUNA PERSONA') echo 'selected'; ?> value="RECOMENDACIÓN DE ALGUNA PERSONA">Recomendación de alguna persona</option>
        <option <?php if ($usuario['ComoSeEntero'] == 'FOLLETOS, CARTELES, ETC.') echo 'selected'; ?> value="FOLLETOS, CARTELES, ETC.">Folletos, carteles, etc.</option>
        <option <?php if ($usuario['ComoSeEntero'] == 'OTRO') echo 'selected'; ?> value="OTRO">Otro</option>
        <option <?php if ($usuario['ComoSeEntero'] == 'SIN DATOS') echo 'selected'; ?> value="SIN DATOS">SIN DATOS</option>
    </select>
    <div class="invalid-feedback">Se requiere seleccionar cómo se enteró del programa.</div>
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

    <div class="col-sm-6" id="DondeTrabaja">
        <label for="DondeTrabaja" class="form-label">¿Dónde trabaja?</label>
        <input type="text" class="form-control" id="Trabaja" name="dondeTrabaja" value="<?php echo $usuario['DondeTrabaja']; ?>"><br>
        <div class="invalid-feedback">Se requiere un apellido válido.</div>
    </div>


            <h4>Valoración de Violencia</h4>
            <hr class="my-4">

    <div class="col-sm-12">
    <label for="situacionUsuaria" class="form-label">Situación de usuaria</label>
        <input type="text" class="form-control" id="situacionUsuaria" name="situacionUsuaria" value="<?php echo $usuario['SituacionUsuaria']; ?>"><br>
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
    <!-- style="display: none;" -->
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
    <button class="w-100 btn btn-success btn-lg" type="button" onclick="openPopupp()">Registrar Tipo de Violencia</button>
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

<script src="regiones.js"></script>
<script src="register.js"></script>
    
    </body>
        </html> 

<?php
        } else { 
            echo "Usuario no encontrado.";
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>









