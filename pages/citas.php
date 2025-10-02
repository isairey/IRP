<?php
// Iniciar sesión si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$usuario_id = $_SESSION['user_id'];
// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    
    // Si no ha iniciado sesión, redirigir al usuario a la página de inicio de sesión
    header("Location: ../sign-in/index.php");
    exit();
}

// Si el usuario ha iniciado sesión y ha presionado el botón de "Cerrar Sesión", eliminar solo las credenciales de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['logout'])) {
    // Eliminar solo las credenciales de sesión
    unset($_SESSION['user_id']);
    unset($_SESSION['role_id']);
    
    // Redirigir al usuario a la página de inicio de sesión
    header("Location: ../sign-in/index.php");
    exit();
}
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>
<!-- AOS CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Home SySGES</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">

    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS con Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
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

    
    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body >
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




       

<?php
 
require_once __DIR__ . '/../pages/footer.php';
?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
   <?php
require_once __DIR__ . '/../db/config.php';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Obtener ID de usuario desde GET (plan de empoderamiento)
    $usuario_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    if ($usuario_id <= 0) {
        throw new Exception("ID de usuario no válido");
    }

    // Consulta resumen del usuario
    $query = "SELECT Nombre, ApellidoPaterno, ApellidoMaterno, FechaNacimiento, Edad, Sexo, 
                     OrientacionSexual, Estadocivil, LugarNacimiento, LenguaMaterna, LenguaIndigena, FechaRegistro
              FROM usuario 
              WHERE id = :usuario_id
              LIMIT 1";

    $statement = $conn->prepare($query);
    $statement->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
    $statement->execute();

    $usuario = $statement->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        echo "<div style='max-width:600px; margin:20px auto;'>";
        echo "<h2 class='text-center'> Resumen del Usuario</h2>";

        echo "<table class='table table-striped table-hover theme-table text-center'>";
        echo "<thead class='table-header'><tr><th>Campo</th><th>Valor</th></tr></thead>";
        echo "<tbody>";

        foreach ($usuario as $campo => $valor) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($campo) . "</td>";
            echo "<td>" . htmlspecialchars($valor) . "</td>";
            echo "</tr>";
        }

        echo "</tbody></table>";
        echo "</div>";
    } else {
        echo "<p class='text-center text-danger'>Usuario no encontrado</p>";
    }

} catch (PDOException $e) {
    echo "Error de conexión o consulta: " . $e->getMessage();
} catch (Exception $e) {
    echo "<p class='text-center text-danger'>" . $e->getMessage() . "</p>";
}
?>



    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
   

<!--
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div style="max-width: 800px; margin: 40px auto; padding: 20px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); background: #fff;">
  
  <h2 style="text-align:center; margin-bottom:25px; font-family: Arial, sans-serif; color:#333;">
    📊 Citas por tipo de atención
  </h2>

  <canvas id="graficaCitas" style="display:block; width:100%; height:400px;"></canvas>
</div>

<script>
  // Llamar a tu PHP para obtener los datos
  fetch("cit.php") // 👈 tu archivo PHP
    .then(response => response.json())
    .then(data => {
      // Extraer etiquetas (tipos de atención) y valores (totales)
      const labels = Object.keys(data);
      const valores = Object.values(data);

      // Crear la gráfica
      const ctx = document.getElementById('graficaCitas').getContext('2d');
      const myChart21 = new Chart(ctx, {
        type: 'bar', // Puedes cambiar a 'line', 'pie', 'doughnut'
        data: {
          labels: labels,
          datasets: [{
            label: 'Número de citas',
            data: valores,
            backgroundColor: [
              'rgba(54, 162, 235, 0.6)',
              'rgba(122, 99, 255, 0.6)',
              'rgba(255, 206, 86, 0.6)',
              'rgba(75, 192, 192, 0.6)'
            ],
            borderColor: [
              'rgba(54, 162, 235, 1)',
              'rgb(99, 122, 255)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              display: true,
              position: 'top'
            }
          },
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    });
</script>
  -->


 

  <?php
require_once __DIR__ . '/../db/config.php';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $usuario_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    $query = "SELECT c.TipoAtencion, c.Num_citas, c.Fecha, p.Nombre AS Personal 
              FROM citas c
              INNER JOIN personal p ON c.ID_Personal = p.ID_Personal
              WHERE c.ID_Usuario = :usuario_id 
              ORDER BY c.ID_Cita ASC 
              LIMIT 10";

    $stmt = $conn->prepare($query);
    $stmt->execute(['usuario_id' => $usuario_id]);

    $citas = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
    $citas = [];
}
?>

<style>
.timeline-container {
    max-width: 700px;
    margin: 40px auto;
    font-family: 'Segoe UI', sans-serif;
}

.timeline-step {
    display: flex;
    align-items: flex-start;
    position: relative;
    margin-bottom: 30px;
    transition: all 0.3s ease;
}

.timeline-circle {
    width: 50px;
    height: 50px;
    background: #6c63ff;
    color: white;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    font-weight: bold;
    flex-shrink: 0;
    box-shadow: 0px 4px 8px rgba(0,0,0,0.2);
    transition: all 0.3s ease;
}

.timeline-circle.completed {
    background: #28a745;
}

.timeline-line {
    position: absolute;
    left: 25px;
    width: 4px;
    height: 100%;
    background: #ddd;
    top: 0;
}

.timeline-text {
    margin-left: 25px;
    background: white;
    padding: 15px 20px;
    border-radius: 8px;
    box-shadow: 0px 2px 8px rgba(0,0,0,0.1);
}

.timeline-text strong {
    display: block;
    font-size: 18px;
    color: #333;
}

.timeline-text .fecha {
    font-size: 14px;
    color: #555;
}

.timeline-text .personal {
    font-size: 14px;
    color: #777;
}

.no-citas {
    text-align: center;
    font-size: 18px;
    padding: 20px;
    background: #f0f4ff;
    border-radius: 8px;
    box-shadow: 0px 2px 8px rgba(0,0,0,0.1);
}


.modal-timeline {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background: rgba(0,0,0,0.6);
}

.modal-content-timeline {
    background-color: #fff;
    margin: 10% auto;
    padding: 20px;
    border-radius: 10px;
    max-width: 400px;
    animation: slideIn 0.4s ease;
}



.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover {
    color: black;
}

@keyframes slideIn {
    from {transform: translateY(-50px); opacity: 0;}
    to {transform: translateY(0); opacity: 1;}
}

.modal-timeline {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.4);
    backdrop-filter: blur(2px);
}

.modal-content-timeline {
    background: white;
    border-radius: 12px;
    margin: 5% auto;
    max-width: 450px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.3);
    animation: slideIn 0.3s ease;
    font-family: 'Segoe UI', sans-serif;
    text-align: center;
    overflow: hidden;
}

.modal-header {
    background: #4CAF50; /* Verde tipo círculo */
    padding: 15px 20px;
    color: white;
    text-align: center;
}

.modal-title {
    margin: 0;
    font-size: 20px;
    font-weight: bold;
}

.close {
    position: absolute;
    right: 15px;
    top: 15px;
    color: white;
    font-size: 24px;
    font-weight: bold;
    cursor: pointer;
    transition: color 0.3s;
}

.close:hover {
    color: #ff1744;
}

.modal-body {
    padding: 20px;
    color: #333;
    font-size: 15px;
}

.modal-body p {
    margin: 10px 0;
    font-size: 16px;
}

.modal-footer {
    padding: 10px 20px;
    border-top: 1px solid #eee;
}

.btn-close-modal {
    background: #4CAF50;
    border: none;
    padding: 10px 20px;
    color: white;
    border-radius: 6px;
    font-weight: bold;
    cursor: pointer;
    transition: background 0.3s ease;
}

.btn-close-modal:hover {
    background: #45a049;
}

@keyframes slideIn {
    from {transform: translateY(-50px); opacity: 0;}
    to {transform: translateY(0); opacity: 1;}
}

.timeline-step:hover {
    transform: translateX(5px);
    box-shadow: 0px 4px 12px rgba(0,0,0,0.2);
}
.modal-header {
    background: #4CAF50; /* verde del modal */
    padding: 15px 20px;
    color: white;
    text-align: center; /* centra el contenido */
    position: relative; /* para el botón cerrar */
}

.modal-title {
    margin: 0 auto; /* centra el título */
    font-size: 22px; /* tamaño más visible */
    font-weight: 600;
    letter-spacing: 0.5px;
    text-align: center; /* asegura que el texto esté centrado */
}



</style>

<div class="timeline-container">
    <h2 class="text-center mb-4" data-aos="fade-down">Avance de Citas</h2>

    <?php if (empty($citas)): ?>
        <div class="no-citas" data-aos="fade-up"> No hay citas registradas para este usuario.</div>
    <?php else: ?>
        <div class="position-relative">
            <div class="timeline-line"></div>

            <?php foreach ($citas as $i => $cita): 
                $texto = $cita['TipoAtencion'];
                $fecha = date("d M Y", strtotime($cita['Fecha']));
                $personal = $cita['Personal'];
                $numCitas = $cita['Num_citas'];
                $completada = $numCitas > 0;
            ?>
                <div class="timeline-step" data-aos="fade-right" data-aos-delay="<?php echo $i * 100; ?>">
                    <div class="timeline-circle <?php echo $completada ? 'completed' : ''; ?>">
                        <?php echo $i+1; ?>
                    </div>
                    <div class="timeline-text" style="cursor:pointer;"
                         onclick="abrirModal('<?php echo addslashes($texto); ?>', '<?php echo $fecha; ?>', '<?php echo addslashes($personal); ?>', '<?php echo $numCitas; ?>')">
                        <strong><?php echo htmlspecialchars($texto); ?></strong>
                        <div class="fecha"><?php echo $fecha; ?></div>
                        <div class="personal">👤 <?php echo htmlspecialchars($personal); ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>



<script>
const totalCitas = 10;
for(let i=1; i<=totalCitas; i++){
  const step = document.getElementById('step'+i);
  step.addEventListener('click', () => {
    const fecha = step.dataset.fecha || "Sin fecha registrada";
    const tipo = step.dataset.tipo || "Sin tipo de atención";
    const personal = step.dataset.personal || "Sin personal asignado";

    document.getElementById('modalContent').innerHTML = `
      <strong>Tipo de Atención:</strong> ${tipo}<br>
      <strong>Personal:</strong> ${personal}<br>
      <strong>Fecha:</strong> ${fecha}
    `;
    document.getElementById('modal').style.display = 'flex';
  });
}

function cerrarModal(){
  document.getElementById('modal').style.display = 'none';
}
</script>





<script>
function abrirModal(titulo, fecha, personal, numCitas) {
    document.getElementById("modalTitulo").textContent = titulo;
    document.getElementById("modalFecha").textContent = fecha;
    document.getElementById("modalPersonal").textContent = personal;
    document.getElementById("modalNumCitas").textContent = numCitas;
    document.getElementById("modalCita").style.display = "block";
}

function cerrarModal() {
    document.getElementById("modalCita").style.display = "none";
}

window.onclick = function(event) {
    if (event.target == document.getElementById("modalCita")) {
        cerrarModal();
    }
}
</script>


<!-- AOS JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
  AOS.init({
    duration: 800,
    easing: 'ease-in-out',
    once: true
  });
</script>


<!-- Modal -->
<!-- Modal Mejorado -->
<!-- Modal Mejorado -->
<div id="modalCita" class="modal-timeline">
    <div class="modal-content-timeline">
        <div class="modal-header">
            <h3 id="modalTitulo" class="modal-title">Título</h3>
            <span class="close" onclick="cerrarModal()">&times;</span>
        </div>
        <div class="modal-body">
            <p><strong> Fecha:</strong> <span id="modalFecha"></span></p>
            <p><strong> Personal:</strong> <span id="modalPersonal"></span></p>
            <p><strong> Número de Citas:</strong> <span id="modalNumCitas"></span></p>
        </div>
        <div class="modal-footer">
            <button class="btn-close-modal" onclick="cerrarModal()">Cerrar</button>
        </div>
    </div>
</div>



</body>
</html>
