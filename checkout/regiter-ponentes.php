<?php
require_once __DIR__ . '/../pages/seccion.php';


require_once __DIR__ . '/../db/config.php';
/*
$especialidades = [
    "Psicología Clínica",
    "Psicología Social",
    "Psicología de la Mujer",
    "Estudios de Género",
    "Feminismo y Sociedad",
    "Derechos Humanos",
    "Igualdad de Género",
    "Sexualidad Humana",
    "Educación y Perspectiva de Género",
    "Sociología del Género",
    "Violencia de Género y Prevención",
    "Psicoterapia con Perspectiva de Género",
    "Trabajo Social con Enfoque de Género",
    "Políticas Públicas de Igualdad",
    "Comunicación y Feminismo"
];

$titulos = [
    "Licenciatura en Psicología",
    "Licenciatura en Sociología",
    "Licenciatura en Trabajo Social",
    "Licenciatura en Derecho",
    "Licenciatura en Pedagogía",
    "Licenciatura en Ciencias Políticas",
    "Maestría en Psicología Clínica",
    "Maestría en Psicología Social",
    "Maestría en Estudios de Género",
    "Maestría en Derechos Humanos",
    "Maestría en Educación con Perspectiva de Género",
    "Doctorado en Psicología",
    "Doctorado en Ciencias Sociales",
    "Doctorado en Estudios de Género",
    "Doctorado en Derechos Humanos"
];


$instituciones = [
    "Universidad Nacional Autónoma de México (UNAM)",
    "Instituto Politécnico Nacional (IPN)",
    "Universidad Autónoma Metropolitana (UAM)",
    "Universidad Autónoma de Nuevo León (UANL)",
    "Universidad de Guadalajara (UDG)",
    "Benemérita Universidad Autónoma de Puebla (BUAP)",
    "Universidad Autónoma de Yucatán (UADY)",
    "Universidad Autónoma del Estado de México (UAEMex)",
    "Universidad Autónoma de Baja California (UABC)",
    "Universidad Autónoma de San Luis Potosí (UASLP)",
    "Universidad Autónoma de Sinaloa (UAS)",
    "Universidad Autónoma de Zacatecas (UAZ)",
    "Universidad Autónoma de Chiapas (UNACH)",
    "Universidad Autónoma de Coahuila (UAdeC)",
    "Universidad Autónoma de Querétaro (UAQ)",
    "Universidad Autónoma de Campeche (UAC)",
    "Universidad Autónoma de Tlaxcala (UATx)",
    "Universidad Autónoma de Nayarit (UAN)",
    "Universidad Autónoma de Aguascalientes (UAA)",
    "Universidad Autónoma de Durango (UAD)",
    "Universidad Autónoma de Morelos (UAEM)",
    "Universidad Autónoma de Hidalgo (UAEH)",
    "Universidad Autónoma de Guerrero (UAGro)",
    "Universidad Autónoma de Oaxaca (UABJO)",
    "Universidad Autónoma de Ciudad Juárez (UACJ)",
    "Universidad Autónoma de Baja California Sur (UABCS)",
    "Universidad Autónoma de Tamaulipas (UAT)",
    "Universidad Autónoma de Tabasco (UATab)",
    "Universidad Autónoma de Quintana Roo (UAQROO)",
    "Universidad Veracruzana (UV)",
    "Universidad Autónoma de Chiapas (UNACH)",
    "Universidad Autónoma del Estado de Hidalgo (UAEH)",
    "Universidad Autónoma de Zacatecas (UAZ)",
    "Universidad Autónoma de San Luis Potosí (UASLP)",
    "Universidad Autónoma de Sinaloa (UAS)",
    "Universidad Autónoma Metropolitana (UAM)",
    "Instituto Tecnológico y de Estudios Superiores de Monterrey (ITESM)",
    "Universidad Iberoamericana (IBERO)",
    "Universidad Anáhuac",
    "Universidad Panamericana (UP)",
    "Universidad de las Américas Puebla (UDLAP)",
    "Universidad Autónoma de Nuevo León (UANL)",
    "Universidad Autónoma de Baja California (UABC)",
    "Universidad Autónoma de Querétaro (UAQ)",
    "Universidad Autónoma de Morelos (UAEM)",
    "Universidad Autónoma de Tamaulipas (UAT)",
    "Universidad Autónoma de Chihuahua (UACH)",
    "Universidad Autónoma de Nayarit (UAN)",
    "Universidad Autónoma de Aguascalientes (UAA)",
    "Universidad Autónoma de Durango (UAD)",
    "Universidad Autónoma de Tlaxcala (UATx)",
    "Universidad Autónoma de Campeche (UAC)",
    "Universidad Autónoma de Tabasco (UATab)",
    "Universidad Autónoma de Quintana Roo (UAQROO)",
    "Universidad Veracruzana (UV)",
    "Universidad Autónoma de Chiapas (UNACH)",
    "Universidad Autónoma del Estado de Hidalgo (UAEH)",
    "Universidad Autónoma de Zacatecas (UAZ)",
    "Universidad Autónoma de San Luis Potosí (UASLP)",
    "Universidad Autónoma de Sinaloa (UAS)",
    "Universidad Autónoma Metropolitana (UAM)",
    "Instituto Tecnológico y de Estudios Superiores de Monterrey (ITESM)",
    "Universidad Iberoamericana (IBERO)",
    "Universidad Anáhuac",
    "Universidad Panamericana (UP)",
    "Universidad de las Américas Puebla (UDLAP)",
    "Universidad Autónoma de Nuevo León (UANL)",
    "Universidad Autónoma de Baja California (UABC)",
    "Universidad Autónoma de Querétaro (UAQ)",
    "Universidad Autónoma de Morelos (UAEM)",
    "Universidad Autónoma de Tamaulipas (UAT)",
    "Universidad Autónoma de Chihuahua (UACH)",
    "Universidad Autónoma de Nayarit (UAN)",
    "Universidad Autónoma de Aguascalientes (UAA)",
    "Universidad Autónoma de Durango (UAD)",
    "Universidad Autónoma de Tlaxcala (UATx)",
    "Universidad Autónoma de Campeche (UAC)",
    "Universidad Autónoma de Tabasco (UATab)",
    "Universidad Autónoma de Quintana Roo (UAQROO)",
    "Universidad Veracruzana (UV)",
    "Universidad Autónoma de Chiapas (UNACH)",
    "Universidad Autónoma del Estado de Hidalgo (UAEH)",
    "Universidad Autónoma de Zacatecas (UAZ)",
    "Universidad Autónoma de San Luis Potosí (UASLP)",
    "Universidad Autónoma de Sinaloa (UAS)",
    "Universidad Autónoma Metropolitana (UAM)",
    "Instituto Tecnológico y de Estudios Superiores de Monterrey (ITESM)",
    "Universidad Iberoamericana (IBERO)",
    "Universidad Anáhuac",
    "Universidad Panamericana (UP)",
    "Universidad de las Américas Puebla (UDLAP)",
    "Universidad Autónoma de Nuevo León (UANL)",
    "Universidad Autónoma de Baja California (UABC)",
    "Universidad Autónoma de Querétaro (UAQ)",
    "Universidad Autónoma de Morelos (UAEM)",
    "Universidad Autónoma de Tamaulipas (UAT)",
    "Universidad Autónoma de Chihuahua (UACH)",
    "Universidad Autónoma de Nayarit (UAN)",
    "Universidad Autónoma de Aguascalientes (UAA)",
    "Universidad Autónoma de Durango (UAD)",
    "Universidad Autónoma de Tlaxcala (UATx)",
    "Universidad Autónoma de Campeche (UAC)",
    "Universidad Autónoma de Tabasco (UATab)",
    "Universidad Autónoma de Quintana Roo (UAQROO)",
    "Universidad Veracruzana (UV)"
];
*/


try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Traer especialidades
    $especialidades = $conn->query("SELECT ID_Especialidad, NombreEspecialidad FROM Especialidades ORDER BY NombreEspecialidad ASC")->fetchAll(PDO::FETCH_ASSOC);

    // Traer títulos profesionales
    $titulos = $conn->query("SELECT ID_Titulo, NombreTitulo FROM TitulosProfesionales ORDER BY NombreTitulo ASC")->fetchAll(PDO::FETCH_ASSOC);

    // Traer instituciones
    $instituciones = $conn->query("SELECT ID_Institucion, NombreInstitucion FROM Instituciones ORDER BY NombreInstitucion ASC")->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Error al conectar con la base de datos: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellido_paterno = $_POST["apellido_paterno"];
    $apellido_materno = $_POST["apellido_materno"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $id_especialidad = $_POST["especialidad"];  // Aquí recibes el ID
    $id_titulo = $_POST["titulo_profesional"];  // Aquí recibes el ID
    $id_institucion = $_POST["institucion"];    // Aquí recibes el ID
    $biografia = $_POST["biografia"];
    $redes = $_POST["redes_sociales"];

    // Manejo de la foto
    $foto = null;
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        $carpetaDestino = "../uploads/ponentes/";
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
        $sql = "INSERT INTO Ponentes 
                (Nombre, ApellidoPaterno, ApellidoMaterno, Correo, Telefono, ID_Especialidad, 
                 ID_Titulo, ID_Institucion, Biografia, Foto, RedesSociales) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $nombre);
        $stmt->bindParam(2, $apellido_paterno);
        $stmt->bindParam(3, $apellido_materno);
        $stmt->bindParam(4, $email);
        $stmt->bindParam(5, $telefono);
        $stmt->bindParam(6, $id_especialidad, PDO::PARAM_INT);
        $stmt->bindParam(7, $id_titulo, PDO::PARAM_INT);
        $stmt->bindParam(8, $id_institucion, PDO::PARAM_INT);
        $stmt->bindParam(9, $biografia);
        $stmt->bindParam(10, $foto);
        $stmt->bindParam(11, $redes);

        if ($stmt->execute()) {
            echo '<script>alert("Ponente registrado correctamente.");</script>';
            echo '<script>window.location.href = "../pages/ver-ponentes.php";</script>';
            exit;
        } else {
            echo "Error al registrar ponente: " . $stmt->errorInfo()[2];
        }

    } catch (PDOException $e) {
        echo '<script>alert("Error al registrar el ponente: ' . $e->getMessage() . '");</script>';
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
    <title>Registro de Donantes</title>
    <script src="register.js"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/checkout/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos del Formulario-->
    <link href="checkout.css" rel="stylesheet">

     <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
      h4 {
  text-align: center;
}
    </style>
     <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">

    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS con Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
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


    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
  <symbol id="calendar3" viewBox="0 0 16 16">
    <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
    <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
  </symbol>
  <symbol id="cart" viewBox="0 0 16 16">
    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
  <symbol id="chevron-right" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
  </symbol>
  <symbol id="door-closed" viewBox="0 0 16 16">
    <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z"/>
    <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z"/>
  </symbol>
  <symbol id="file-earmark" viewBox="0 0 16 16">
    <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
  </symbol>
  <symbol id="file-earmark-text" viewBox="0 0 16 16">
    <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
    <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
  </symbol>
  <symbol id="gear-wide-connected" viewBox="0 0 16 16">
    <path d="M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434l.071-.286zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5zm0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78h4.723zM5.048 3.967c-.03.021-.058.043-.087.065l.087-.065zm-.431.355A4.984 4.984 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8 4.617 4.322zm.344 7.646.087.065-.087-.065z"/>
  </symbol>
  <symbol id="graph-up" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm14.817 3.113a.5.5 0 0 1 .07.704l-4.5 5.5a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61 4.15-5.073a.5.5 0 0 1 .704-.07Z"/>
  </symbol>

  <symbol  id=personita viewBox="0 0 16 16">
  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
  <path d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
</symbol>

  <symbol id="house-fill" viewBox="0 0 16 16">
    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/>
    <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
  </symbol>
  <symbol id="list" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
  </symbol>
  <symbol id="people" viewBox="0 0 16 16">
    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"/>
  </symbol>
  <symbol id="plus-circle" viewBox="0 0 16 16">
    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
  </symbol>
  <symbol id="puzzle" viewBox="0 0 16 16">
    <path d="M3.112 3.645A1.5 1.5 0 0 1 4.605 2H7a.5.5 0 0 1 .5.5v.382c0 .696-.497 1.182-.872 1.469a.459.459 0 0 0-.115.118.113.113 0 0 0-.012.025L6.5 4.5v.003l.003.01c.004.01.014.028.036.053a.86.86 0 0 0 .27.194C7.09 4.9 7.51 5 8 5c.492 0 .912-.1 1.19-.24a.86.86 0 0 0 .271-.194.213.213 0 0 0 .039-.063v-.009a.112.112 0 0 0-.012-.025.459.459 0 0 0-.115-.118c-.375-.287-.872-.773-.872-1.469V2.5A.5.5 0 0 1 9 2h2.395a1.5 1.5 0 0 1 1.493 1.645L12.645 6.5h.237c.195 0 .42-.147.675-.48.21-.274.528-.52.943-.52.568 0 .947.447 1.154.862C15.877 6.807 16 7.387 16 8s-.123 1.193-.346 1.638c-.207.415-.586.862-1.154.862-.415 0-.733-.246-.943-.52-.255-.333-.48-.48-.675-.48h-.237l.243 2.855A1.5 1.5 0 0 1 11.395 14H9a.5.5 0 0 1-.5-.5v-.382c0-.696.497-1.182.872-1.469a.459.459 0 0 0 .115-.118.113.113 0 0 0 .012-.025L9.5 11.5v-.003a.214.214 0 0 0-.039-.064.859.859 0 0 0-.27-.193C8.91 11.1 8.49 11 8 11c-.491 0-.912.1-1.19.24a.859.859 0 0 0-.271.194.214.214 0 0 0-.039.063v.003l.001.006a.113.113 0 0 0 .012.025c.016.027.05.068.115.118.375.287.872.773.872 1.469v.382a.5.5 0 0 1-.5.5H4.605a1.5 1.5 0 0 1-1.493-1.645L3.356 9.5h-.238c-.195 0-.42.147-.675.48-.21.274-.528.52-.943.52-.568 0-.947-.447-1.154-.862C.123 9.193 0 8.613 0 8s.123-1.193.346-1.638C.553 5.947.932 5.5 1.5 5.5c.415 0 .733.246.943.52.255.333.48.48.675.48h.238l-.244-2.855zM4.605 3a.5.5 0 0 0-.498.55l.001.007.29 3.4A.5.5 0 0 1 3.9 7.5h-.782c-.696 0-1.182-.497-1.469-.872a.459.459 0 0 0-.118-.115.112.112 0 0 0-.025-.012L1.5 6.5h-.003a.213.213 0 0 0-.064.039.86.86 0 0 0-.193.27C1.1 7.09 1 7.51 1 8c0 .491.1.912.24 1.19.07.14.14.225.194.271a.213.213 0 0 0 .063.039H1.5l.006-.001a.112.112 0 0 0 .025-.012.459.459 0 0 0 .118-.115c.287-.375.773-.872 1.469-.872H3.9a.5.5 0 0 1 .498.542l-.29 3.408a.5.5 0 0 0 .497.55h1.878c-.048-.166-.195-.352-.463-.557-.274-.21-.52-.528-.52-.943 0-.568.447-.947.862-1.154C6.807 10.123 7.387 10 8 10s1.193.123 1.638.346c.415.207.862.586.862 1.154 0 .415-.246.733-.52.943-.268.205-.415.39-.463.557h1.878a.5.5 0 0 0 .498-.55l-.001-.007-.29-3.4A.5.5 0 0 1 12.1 8.5h.782c.696 0 1.182.497 1.469.872.05.065.091.099.118.115.013.008.021.01.025.012a.02.02 0 0 0 .006.001h.003a.214.214 0 0 0 .064-.039.86.86 0 0 0 .193-.27c.14-.28.24-.7.24-1.191 0-.492-.1-.912-.24-1.19a.86.86 0 0 0-.194-.271.215.215 0 0 0-.063-.039H14.5l-.006.001a.113.113 0 0 0-.025.012.459.459 0 0 0-.118.115c-.287.375-.773.872-1.469.872H12.1a.5.5 0 0 1-.498-.543l.29-3.407a.5.5 0 0 0-.497-.55H9.517c.048.166.195.352.463.557.274.21.52.528.52.943 0 .568-.447.947-.862 1.154C9.193 5.877 8.613 6 8 6s-1.193-.123-1.638-.346C5.947 5.447 5.5 5.068 5.5 4.5c0-.415.246-.733.52-.943.268-.205.415-.39.463-.557H4.605z"/>
  </symbol>
  <symbol id="search" viewBox="0 0 16 16">
    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
  </symbol>
</svg>


    
      <div class="container">
        <main>

    <div class="py-5 text-center">
    <img class="d-block mx-auto mb-4" src="../assets/img/logo 1.png" alt="" width="100" height="100">
    <h2>Registro de Ponentes</h2>

    <form class="needs-validation" action="regiter-ponentes.php" method="POST" enctype="multipart/form-data" novalidate>
    <div class="row g-3">

        <div class="col-sm-12">
            <label class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombre" required>
        </div>

        <div class="col-sm-6">
            <label class="form-label">Apellido Paterno:</label>
            <input type="text" class="form-control" name="apellido_paterno" required>
        </div>

        <div class="col-sm-6">
            <label class="form-label">Apellido Materno:</label>
            <input type="text" class="form-control" name="apellido_materno">
        </div>

        <div class="col-sm-6">
            <label class="form-label">Correo electrónico:</label>
            <input type="email" class="form-control" name="email" required>
        </div>

        <div class="col-sm-6">
            <label class="form-label">Teléfono:</label>
            <input type="text" class="form-control" name="telefono">
        </div>

          <!-- SELECT de especialidad -->
           <!-- Especialidad -->
    <div class="mb-3">
      <label class="form-label">Especialidad</label>
      <select name="especialidad" id="especialidad" class="form-select" required>
        <option value="">-- Selecciona una especialidad --</option>
        <?php foreach ($especialidades as $esp): ?>
          <option value="<?= htmlspecialchars($esp['ID_Especialidad']) ?>">
            <?= htmlspecialchars($esp['NombreEspecialidad']) ?>
          </option>
        <?php endforeach; ?>
        <option value="__otro__">➕ Otro…</option>
      </select>
      <div class="invalid-feedback">Selecciona una especialidad.</div>
    </div>

<!-- Título Profesional -->
<div class="mb-3">
  <label class="form-label">Título Profesional</label>
  <select name="titulo_profesional" id="titulo_profesional" class="form-select" required>
    <option value="">-- Selecciona un título profesional --</option>
    <?php foreach ($titulos as $tit): ?>
      <option value="<?= htmlspecialchars($tit['ID_Titulo']) ?>">
        <?= htmlspecialchars($tit['NombreTitulo']) ?>
      </option>
    <?php endforeach; ?>
    <option value="__otro__">➕ Otro…</option>
  </select>
  <div class="invalid-feedback">Selecciona un título profesional.</div>
</div>


<!-- Institución -->
<div class="mb-3">
  <label class="form-label">Institución</label>
  <select name="institucion" id="institucion" class="form-select" required>
    <option value="">-- Selecciona una institución --</option>
    <?php foreach($instituciones as $inst): ?>
      <option value="<?= htmlspecialchars($inst['ID_Institucion']) ?>">
        <?= htmlspecialchars($inst['NombreInstitucion']) ?>
      </option>
    <?php endforeach; ?>
    <option value="__otro__">➕ Otro…</option>
  </select>
  <div class="invalid-feedback">Selecciona una institución.</div>
    </div>

        <div class="col-sm-12">
            <label class="form-label">Biografía:</label>
            <textarea class="form-control" name="biografia" rows="3"></textarea>
        </div>

        <div class="col-sm-12">
            <label class="form-label">Redes Sociales:</label>
            <textarea class="form-control" name="redes_sociales" rows="2"></textarea>
        </div>

      <div class="mb-3">
  <label class="form-label">Foto</label><br>
  <?php if (!empty($ponente['Foto'])): ?>
    <img src="../uploads/ponentes/<?= htmlspecialchars($ponente['Foto']) ?>" 
         alt="Foto actual" width="100"><br><br>
  <?php endif; ?>
  <input type="file" name="foto" class="form-control">
</div>

      <hr class="my-4">

    <button class="w-100 btn btn-primary btn-lg" type="submit"  >Registrar</button>
        
    </div>




      
    </form>
    </div>
    </div>
    </main>



<!-- Modal para nueva especialidad -->
<!-- MODAL: Agregar Especialidad (FUERA del form principal) -->
<div class="modal fade" id="modalEspecialidad" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="formEspecialidad" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Agregar nueva especialidad</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <div id="espAlert" class="alert alert-danger d-none"></div>
        <label class="form-label">Nombre de la especialidad</label>
        <input type="text" name="nueva_especialidad" class="form-control" required>
      </div>
      <div class="modal-body">
        <div id="espAlert" class="alert alert-danger d-none"></div>
        <label class="form-label">Descripcion de la especialidad</label>
        <input type="text" name="descripcion" class="form-control" required>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button id="btnGuardarEsp" type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </form>
  </div>
</div>


<!-- Modal para nueva especialidad -->
<!-- MODAL: Agregar Especialidad (FUERA del form principal) -->
<div class="modal fade" id="modalTitulo" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="formTitulo" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Agregar nuevo título profesional</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <div id="tituloAlert" class="alert alert-danger d-none"></div>
        <label class="form-label">Nombre del título</label>
        <input type="text" name="nuevo_titulo" class="form-control" required>
      </div>
      <div class="modal-body">
        <label class="form-label">Descripción del título</label>
        <input type="text" name="descripcion" class="form-control" required>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button id="btnGuardarTitulo" type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </form>
  </div>
</div>





<!-- Modal de Institución -->
<div class="modal fade" id="modalInstitucion" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="formInstitucion" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Agregar Institución</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div id="instAlert" class="alert alert-danger d-none"></div>
        <div class="mb-3">
          <label>Nombre de la Institución</label>
          <input type="text" name="nueva_institucion" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Descripción</label>
          <textarea name="descripcion" class="form-control"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" id="btnGuardarInst" class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </form>
  </div>
</div>








       
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

    <script src="checkout.js"></script></body>
    <script src="validation-donante.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
  const selInst = document.getElementById('institucion');
  const modalInstEl = document.getElementById('modalInstitucion');
  const modalInst = new bootstrap.Modal(modalInstEl);
  let lastValidInstValue = "";

  // Guardar valor anterior al abrir
  selInst.addEventListener('focus', () => { lastValidInstValue = selInst.value; });

  // Abrir modal al elegir "Otro"
  selInst.addEventListener('change', () => {
    if (selInst.value === '__otro__') {
      document.getElementById('instAlert').classList.add('d-none');
      document.getElementById('formInstitucion').reset();
      modalInst.show();
      selInst.value = ''; // limpiar select
    }
  });








  

  // AJAX para agregar institución
  document.getElementById('formInstitucion').addEventListener('submit', async (e) => {
    e.preventDefault();
    const btn = document.getElementById('btnGuardarInst');
    btn.disabled = true;

    const fd = new FormData(e.target);
    try {
      const resp = await fetch('ajax_add_institucion.php', { method: 'POST', body: fd });
      const data = await resp.json();

      if (!data.ok) {
        const alert = document.getElementById('instAlert');
        alert.textContent = data.error || 'Error desconocido';
        alert.classList.remove('d-none');
        btn.disabled = false;
        return;
      }

      // Agregar nueva opción al select y seleccionarla
      const opt = document.createElement('option');
      opt.value = data.id;
      opt.textContent = data.NombreInstitucion; // igual que en PHP
      const otro = selInst.querySelector('option[value="__otro__"]');
      selInst.insertBefore(opt, otro);
      selInst.value = data.id;

      modalInst.hide();
    } catch (err) {
      const alert = document.getElementById('instAlert');
      alert.textContent = 'No se pudo guardar. Intenta de nuevo.';
      alert.classList.remove('d-none');
    } finally {
      btn.disabled = false;
    }
  });

  // Restaurar valor si cierran modal sin guardar
  modalInstEl.addEventListener('hidden.bs.modal', () => {
    if (selInst.value === '') {
      selInst.value = lastValidInstValue || '';
    }
  });
</script>


<script>
  const selEsp = document.getElementById('especialidad');
  const modalEspEl = document.getElementById('modalEspecialidad');
  const modalEsp = new bootstrap.Modal(modalEspEl);
  let lastValidEspValue = ""; // para restaurar si cancelan

  // Abrir modal al elegir "Otro"
  selEsp.addEventListener('focus', () => { lastValidEspValue = selEsp.value; });
  selEsp.addEventListener('change', () => {
    if (selEsp.value === '__otro__') {
      document.getElementById('espAlert').classList.add('d-none');
      document.getElementById('formEspecialidad').reset();
      modalEsp.show();
    }
  });



  // Guardar por AJAX sin recargar
  document.getElementById('formEspecialidad').addEventListener('submit', async (e) => {
    e.preventDefault();
    const btn = document.getElementById('btnGuardarEsp');
    btn.disabled = true;

    const fd = new FormData(e.target);
    try {
      const resp = await fetch('ajax_add_especialidad.php', { method: 'POST', body: fd });
      const data = await resp.json();

      if (!data.ok) {
        // Mostrar error en el modal
        const alert = document.getElementById('espAlert');
        alert.textContent = data.error || 'Error desconocido';
        alert.classList.remove('d-none');
        btn.disabled = false;
        return;
      }

      // Crear opción nueva en el select y seleccionarla
      const opt = document.createElement('option');
      opt.value = data.id;
      opt.textContent = data.NombreEspecialidad;

      // Insertarla antes de "Otro…"
      const otro = selEsp.querySelector('option[value="__otro__"]');
      selEsp.insertBefore(opt, otro);
      selEsp.value = data.id;

      modalEsp.hide();
    } catch (err) {
      const alert = document.getElementById('espAlert');
      alert.textContent = 'No se pudo guardar. Intenta de nuevo.';
      alert.classList.remove('d-none');
    } finally {
      btn.disabled = false;
    }
  });

  // Si cierran el modal sin guardar, restaurar el valor anterior del select
  modalEspEl.addEventListener('hidden.bs.modal', () => {
    if (selEsp.value === '__otro__') {
      selEsp.value = lastValidEspValue || '';
    }
  });


















/*
  document.getElementById('titulo_profesional').addEventListener('change', function() {
  if (this.value === '__otro__') {
    var modal = new bootstrap.Modal(document.getElementById('modalTitulo'));
    modal.show();
    this.value = ''; // Reset select
  }
});

document.getElementById('formNuevoTitulo').addEventListener('submit', function(e) {
  e.preventDefault();
  const nombre = document.getElementById('nuevo_titulo').value.trim();
  const descripcion = document.getElementById('descripcion_titulo').value.trim(); // NUEVO
  if (!nombre) return;

  fetch('ajax_add_titulo.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: 'nuevo_titulo=' + encodeURIComponent(nombre) +
          '&descripcion=' + encodeURIComponent(descripcion) // NUEVO
  })
  .then(res => res.json())
  .then(data => {
    if (data.ok) {
      // Agregar al select
      const select = document.getElementById('titulo_profesional');
      const option = document.createElement('option');
      option.value = data.id;
      option.textContent = data.NombreTitulo;
      option.selected = true;
      select.appendChild(option);

      // Cerrar modal
      const modalEl = document.getElementById('modalTitulo');
      const modal = bootstrap.Modal.getInstance(modalEl);
      modal.hide();

      // Limpiar formulario
      document.getElementById('nuevo_titulo').value = '';
      document.getElementById('descripcion_titulo').value = '';
    } else {
      alert(data.error || 'Error al agregar el título');
    }
  });
});  */

</script>


<script>

const selTitulo = document.getElementById('titulo_profesional');
  const modalTituloEl = document.getElementById('modalTitulo');
  const modalTitulo = new bootstrap.Modal(modalTituloEl);
  let lastValidTituloValue = ""; // para restaurar si cancelan

  // Guardar valor previo
  selTitulo.addEventListener('focus', () => { 
    lastValidTituloValue = selTitulo.value; 
  });

  // Abrir modal al elegir "Otro"
  selTitulo.addEventListener('change', () => {
    if (selTitulo.value === '__otro__') {
      document.getElementById('tituloAlert').classList.add('d-none');
      document.getElementById('formTitulo').reset();
      modalTitulo.show();
    }
  });

  // Guardar por AJAX sin recargar
  document.getElementById('formTitulo').addEventListener('submit', async (e) => {
    e.preventDefault();
    const btn = document.getElementById('btnGuardarTitulo');
    btn.disabled = true;

    const fd = new FormData(e.target);
    try {
      const resp = await fetch('ajax_add_titulo.php', { method: 'POST', body: fd });
      const data = await resp.json();

      if (!data.ok) {
        // Mostrar error en el modal
        const alert = document.getElementById('tituloAlert');
        alert.textContent = data.error || 'Error desconocido';
        alert.classList.remove('d-none');
        btn.disabled = false;
        return;
      }

      // Crear opción nueva en el select y seleccionarla
      const opt = document.createElement('option');
      opt.value = data.id;
      opt.textContent = data.NombreTitulo;

      // Insertar antes de "Otro…"
      const otro = selTitulo.querySelector('option[value="__otro__"]');
      selTitulo.insertBefore(opt, otro);
      selTitulo.value = data.id;

      modalTitulo.hide();
    } catch (err) {
      const alert = document.getElementById('tituloAlert');
      alert.textContent = 'No se pudo guardar. Intenta de nuevo.';
      alert.classList.remove('d-none');
    } finally {
      btn.disabled = false;
    }
  });

  // Si cierran el modal sin guardar, restaurar el valor anterior
  modalTituloEl.addEventListener('hidden.bs.modal', () => {
    if (selTitulo.value === '__otro__') {
      selTitulo.value = lastValidTituloValue || '';
    }
  });


  /*
  const selTitulo = document.getElementById('titulo_profesional');
  const modalTituloEl = document.getElementById('modalTitulo');
  const modalTitulo = new bootstrap.Modal(modalTituloEl);
  let lastValidTituloValue = ""; // para restaurar si cancelan

  // Guardar último valor antes de cambiar
  selTitulo.addEventListener('focus', () => { 
    lastValidTituloValue = selTitulo.value; 
  });

  // Abrir modal si eligen "Otro"
  selTitulo.addEventListener('change', () => {
    if (selTitulo.value === '__otro__') {
      document.getElementById('tituloAlert').classList.add('d-none');
      document.getElementById('formTitulo').reset();
      modalTitulo.show();
    }
  });

  // Guardar por AJAX sin recargar
  document.getElementById('formTitulo').addEventListener('submit', async (e) => {
    e.preventDefault();
    const btn = document.getElementById('btnGuardarTitulo');
    btn.disabled = true;

    const fd = new FormData(e.target);
    try {
      const resp = await fetch('ajax_add_titulo.php', { method: 'POST', body: fd });
      const data = await resp.json();

      if (!data.ok) {
        // Mostrar error en el modal
        const alert = document.getElementById('tituloAlert');
        alert.textContent = data.error || 'Error desconocido';
        alert.classList.remove('d-none');
        btn.disabled = false;
        return;
      }

      // Crear opción nueva en el select y seleccionarla
      const opt = document.createElement('option');
      opt.value = data.id;
      opt.textContent = data.NombreTitulo;

      // Insertarla antes de "Otro…"
      const otro = selTitulo.querySelector('option[value="__otro__"]');
      selTitulo.insertBefore(opt, otro);
      selTitulo.value = data.id;

      modalTitulo.hide();
    } catch (err) {
      const alert = document.getElementById('tituloAlert');
      alert.textContent = 'No se pudo guardar. Intenta de nuevo.';
      alert.classList.remove('d-none');
    } finally {
      btn.disabled = false;
    }
  });

  // Si cierran el modal sin guardar, restaurar el valor anterior del select
  modalTituloEl.addEventListener('hidden.bs.modal', () => {
    if (selTitulo.value === '__otro__') {
      selTitulo.value = lastValidTituloValue || '';
    }
  });
  */
</script>



<?php
/*
require_once __DIR__ . '/../db/config.php';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Si se seleccionó "Otro", primero insertamos el nuevo valor en su tabla
function guardarOpcion($conn, $tabla, $campo, $valor) {
    $stmt = $conn->prepare("INSERT IGNORE INTO $tabla ($campo) VALUES (:valor)");
    $stmt->bindParam(":valor", $valor);
    $stmt->execute();

    // obtener ID (nuevo o existente si ya estaba)
    $stmt = $conn->prepare("SELECT ID_$tabla FROM $tabla WHERE $campo = :valor");
    $stmt->bindParam(":valor", $valor);
    $stmt->execute();
    return $stmt->fetchColumn();
}

$especialidad = $_POST['especialidad'];
if ($especialidad === "otro" && !empty($_POST['nueva_especialidad'])) {
    $especialidad = guardarOpcion($conn, "Especialidad", "Nombre", $_POST['nueva_especialidad']);
}

$titulo = $_POST['titulo'];
if ($titulo === "otro" && !empty($_POST['nuevo_titulo'])) {
    $titulo = guardarOpcion($conn, "TituloProfesional", "Nombre", $_POST['nuevo_titulo']);
}

$institucion = $_POST['institucion'];
if ($institucion === "otro" && !empty($_POST['nueva_institucion'])) {
    $institucion = guardarOpcion($conn, "Institucion", "Nombre", $_POST['nueva_institucion']);
}

// Guardar ponente
$stmt = $conn->prepare("INSERT INTO Ponentes (Nombre, ApellidoPaterno, ID_Especialidad, ID_Titulo, ID_Institucion) 
                        VALUES ('Ejemplo', 'Apellido', :esp, :tit, :inst)");
$stmt->bindParam(":esp", $especialidad);
$stmt->bindParam(":tit", $titulo);
$stmt->bindParam(":inst", $institucion);
$stmt->execute();

echo "✅ Ponente guardado correctamente";
*/
?>
<?php
require_once __DIR__ . '/../db/config.php';

// Procesar el envío del formulario para nueva especialidad
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nueva_especialidad'])) {
    $nueva_especialidad = trim($_POST['nueva_especialidad']);
    if (!empty($nueva_especialidad)) {
        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("INSERT INTO Especialidades (NombreEspecialidad) VALUES (:nombre)");
            $stmt->bindParam(':nombre', $nueva_especialidad, PDO::PARAM_STR);
            $stmt->execute();

            echo "<script>alert('✅ Nueva especialidad registrada correctamente');</script>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

// Obtener lista de especialidades
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $especialidades = $conn->query("SELECT ID_Especialidad, NombreEspecialidad FROM Especialidades ORDER BY NombreEspecialidad")->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>

        </html>




