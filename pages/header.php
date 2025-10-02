<?php
require_once __DIR__ . '/../db/config.php';


if (!isset($_SESSION['user_id']) || !isset($_SESSION['role_id'])) {
    header("Location: ../sign-in/index.php");
    exit();
}

$idUsuario = $_SESSION['user_id'];

// Consultar los datos del usuario con JOIN a rol
$sql = "
    SELECT p.Nombre, p.foto, r.Descripcion,p.ID_Personal
    FROM personal p
    LEFT JOIN rol r ON p.ID_Rol = r.ID_Rol
    WHERE p.ID_Personal = :id
    LIMIT 1
";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $idUsuario, PDO::PARAM_INT);
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

// Si no hay foto guardada, usar una por defecto


// Si no hay foto guardada, usar una por defecto
$foto = !empty($usuario['foto']) ? $usuario['foto'] : 'default.png';

// Verificar si la ruta ya incluye "uploads/"
if (strpos($foto, "uploads/") !== false) {
    $fotoFinal = "../" . htmlspecialchars($foto);
} else {
    $fotoFinal = "../uploads/personal/" . htmlspecialchars($foto);
}

?>











<!-- Menu de arriba -->

<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark" style="height:60px;">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">Ges Mujer</a>

  <!-- Menú de usuario -->
  <div class="ms-auto pe-3 position-relative">
    <!-- Avatar usuario -->
    <a class="nav-link d-flex align-items-center text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      <img src="<?= $fotoFinal ?>" alt="Usuario" class="rounded-circle me-2" width="35" height="35">
      <span class="d-none d-md-inline"><?= htmlspecialchars($usuario['Nombre']) ?></span>
      <i class="bi bi-caret-down-fill ms-1"></i>
    </a>

    <!-- Dropdown -->
    <ul class="dropdown-menu dropdown-menu-end shadow mt-2"
        style="position: absolute; top:100%; right:0; min-width: 220px;">
      
      <!-- Encabezado usuario -->
      <li class="px-3 py-2 border-bottom">
        <div class="d-flex align-items-center">
         <img src="<?= $fotoFinal ?>" alt="Usuario" class="rounded-circle me-2" width="35" height="35">
          <div>
            <strong><?= htmlspecialchars($usuario['Nombre']) ?></strong><br>
            <small class="text-muted"><?= htmlspecialchars($usuario['Descripcion']) ?></small>
          </div>
        </div>
      </li>

      <!-- Opciones -->
     <li>
    <a class="dropdown-item" href="../checkout/editar-personal.php?id=<?= htmlspecialchars($usuario['ID_Personal']) ?>">
        <i class="bi bi-person me-2"></i> Perfil
    </a>
</li>

     <!-- <li><a class="dropdown-item" href="./configuracion.php"><i class="bi bi-gear me-2"></i> Configuración</a></li> -->
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item text-danger" href="./sign-out.php"><i class="bi bi-box-arrow-right me-2"></i> Cerrar sesión</a></li>
    </ul>
  </div>
</header>