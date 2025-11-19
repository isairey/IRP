<?php
require_once __DIR__ . '/../pages/seccion.php';

?>

<?php
require_once __DIR__ . '/../db/config.php';


if (!isset($_SESSION['user_id']) || !isset($_SESSION['role_id'])) {
    header("Location: ../sign-in/index.php");
    exit();
}

$idUsuario = $_SESSION['user_id'];

// Consultar los datos del usuario con JOIN a rol
$sqls = "
    SELECT p.Nombre, p.foto, r.Descripcion,p.ID_Personal
    FROM personal p
    LEFT JOIN rol r ON p.ID_Rol = r.ID_Rol
    WHERE p.ID_Personal = :id
    LIMIT 1
";
$stmt2 = $conn->prepare($sqls);
$stmt2->bindParam(':id', $idUsuario, PDO::PARAM_INT);
$stmt2->execute();
$usuarios3 = $stmt2->fetch(PDO::FETCH_ASSOC);

// Si no hay foto guardada, usar una por defecto


// Si no hay foto guardada, usar una por defecto
// Obtener foto desde BD
$fotoBD = trim($usuarios3['foto'] ?? '');

// Si no hay foto o dice "Sin datos", usar una por defecto
if ($fotoBD === '' || strcasecmp($fotoBD, 'SIN DATOS') === 0) {
    $foto = 'default.png';
} else {
    $foto = $fotoBD;
}

// Verificar si la ruta ya incluye "uploads/"
if (strpos($foto, "uploads/") !== false) {
    $fotoFinal = "../" . htmlspecialchars($foto);
} else {
    $fotoFinal = "../uploads/personal/" . htmlspecialchars($foto);
}


?>






<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">


<!-- Menú superior con diseño verde estilo Microsoft Edge -->
<header class="navbar sticky-top shadow-sm " 
  style="
    height: 65px;
    background: #721896;
    color: #fff;
  ">
  <div class="container-fluid px-3 d-flex align-items-center justify-content-between">
    <!-- Logo o nombre -->
 <a class="navbar-brand d-flex align-items-center text-white fw-semibold fs-5" 
   href="./../pages/home.php" 
   style="letter-spacing: 0.8px; background:none; box-shadow:none; border:none; padding:0;">
  <img src="../assets/img/logo 1.png" alt="Logo" width="48" height="48" class="me-2 rounded-circle" style="object-fit:cover;">
  <span style="font-weight:600;">Ges<span class="text-light">Mujer</span></span>
</a>





    <!-- Menú de usuario -->
    <div class="dropdown">
      <a class="nav-link dropdown-toggle d-flex align-items-center text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="<?= $fotoFinal ?>" alt="Usuario" class="rounded-circle me-2 border border-light shadow-sm" width="40" height="40">
        <span class="d-none d-md-inline fw-semibold"><?= htmlspecialchars($usuarios3['Nombre']) ?></span>
      </a>

      <ul class="dropdown-menu dropdown-menu-end mt-2 shadow border-0 rounded-3 animate-dropdown">
        <li class="px-3 py-2 border-bottom bg-body-tertiary">
  <div class="d-flex align-items-center">
    <img src="<?= $fotoFinal ?>" alt="Usuario" 
         class="rounded-circle me-2 border border-success-subtle" 
         width="35" height="35">
    <div>
      <strong><?= htmlspecialchars($usuarios3['Nombre']) ?></strong><br>
      <small class="text-muted"><?= htmlspecialchars($usuarios3['Descripcion']) ?></small>
    </div>
  </div>
</li>

        <li>
          <a class="dropdown-item py-2" href="../checkout/editar-personal.php?id=<?= htmlspecialchars($usuarios3['ID_Personal']) ?>">
            <i class="bi bi-person me-2 text-success"></i> Perfil
          </a>
        </li>
        <li><hr class="dropdown-divider"></li>
        <li>
          <a class="dropdown-item py-2 text-danger fw-semibold" href="./../pages/sign-out.php">
            <i class="bi bi-box-arrow-right me-2"></i> Cerrar sesión
          </a>
        </li>
      </ul>
    </div>
  </div>
</header>

<style>

/* 🌙 Modo oscuro */
/*
@media (prefers-color-scheme: dark) {
  header.navbar {
    background: linear-gradient(90deg, #4c1d95 0%, #6d28d9 50%, #a21caf 100%) !important;
    color: #fff !important;
  }

  header.navbar a,
  header.navbar span {
    color: #fff !important;
  }
}

/* ☀️ Modo claro */
/*
@media (prefers-color-scheme: light) {
  header.navbar {
    height: 65px;
    background: linear-gradient(90deg, #b83290 0%, #8e3ec0 50%, #721895 100%) !important;
    color: #fff !important;
  }

  header.navbar a,
  header.navbar span {
    color: #fff !important;
  }
}



  console.log(window.matchMedia('(prefers-color-scheme: dark)').matches ? '🌙 Dark mode detectado' : '☀️ Light mode detectado');

*/
 


    header.navbar {
  backdrop-filter: blur(4px);
  -webkit-backdrop-filter: blur(4px);
  transition: all 0.3s ease;
}

.navbar-brand {
  background: none !important;
  box-shadow: none !important;
  border: none !important;
  padding: 0 !important;
}


.dropdown-menu {
  animation: fadeIn 0.2s ease-in-out;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(-5px); }
  to { opacity: 1; transform: translateY(0); }
}


    header.navbar {
  backdrop-filter: blur(6px);
  -webkit-backdrop-filter: blur(6px);
  transition: all 0.3s ease;
}


.dropdown-menu {
  animation: fadeIn 0.2s ease-in-out;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(-5px); }
  to { opacity: 1; transform: translateY(0); }
}

/* Animación de aparición */
.animate-dropdown {
  animation: fadeInDown 0.25s ease-in-out;
}

@keyframes fadeInDown {
  from { opacity: 0; transform: translateY(-5px); }
  to { opacity: 1; transform: translateY(0); }
}

/* Estilo del navbar */
.navbar {
  box-shadow: 0 2px 10px rgba(243, 234, 234, 1);
}

/* Hover de opciones */
.dropdown-item:hover {
  background-color: #e8f5ef;
  color: #007b5e !important;
}

/* Dropdown con bordes redondeados */
.dropdown-menu {
  transition: all 0.25s ease;
  border-radius: 12px;
  overflow: hidden;
}

/* Efecto en hover sobre el nombre del usuario */
.nav-link:hover {
  opacity: 0.9;
  text-shadow: 0 0 6px rgba(255, 255, 255, 0.4);
}
</style>



<style>
/* 
@media (prefers-color-scheme: dark) {
  header.navbar {
    background: linear-gradient(90deg, #4c1d95 0%, #6d28d9 50%, #a21caf 100%) !important;
    color: #fff !important;
  }

  header.navbar a,
  header.navbar span {
    color: #fff !important;
  }
}

/* 
@media (prefers-color-scheme: light) {
  header.navbar {
    background: linear-gradient(90deg, #b83290 0%, #8e3ec0 50%, #721895 100%) !important;
    color: #fff !important;
  }

  header.navbar a,
  header.navbar span {
    color: #fff !important;
  }
}

/* 
header.navbar {
  height: 65px;
  backdrop-filter: blur(6px);
  -webkit-backdrop-filter: blur(6px);
  transition: background 0.4s ease, color 0.4s ease;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.navbar-brand {
  background: none !important;
  box-shadow: none !important;
  border: none !important;
  padding: 0 !important;
}

.dropdown-menu {
  animation: fadeIn 0.2s ease-in-out;
  border-radius: 12px;
  overflow: hidden;
  transition: all 0.25s ease;
}

.dropdown-item:hover {
  background-color: rgba(255, 255, 255, 0.1);
  color: #fff !important;
}

.nav-link:hover {
  opacity: 0.9;
  text-shadow: 0 0 6px rgba(255, 255, 255, 0.4);
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(-5px); }
  to { opacity: 1; transform: translateY(0); }
}

.animate-dropdown {
  animation: fadeInDown 0.25s ease-in-out;
}

@keyframes fadeInDown {
  from { opacity: 0; transform: translateY(-5px); }
  to { opacity: 1; transform: translateY(0); }
}
  */
</style>
