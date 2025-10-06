<?php
session_start();

// Verificar si el usuario ha iniciado sesión y tiene el rol adecuado
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role_id']) || $_SESSION['role_id'] != 1) {
    // Si el usuario no ha iniciado sesión o no tiene el rol adecuado, redirigirlo a otra página
    header("Location: ../sign-in/index.php"); // O a una página de acceso denegado
    exit();
}

?>