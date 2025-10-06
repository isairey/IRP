<?php
// Definir las credenciales de la base de datos
$host = 'localhost';
$dbname = 'sysges';
$username = 'root';
$password = '';

try {
    // Crear una nueva instancia de PDO para conectar a la base de datos
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    
    // Establecer el modo de error para lanzar excepciones en caso de errores
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

    // Opcional: reforzar el charset
    $conn->exec("SET NAMES utf8");
    // Si necesitas establecer otro conjunto de caracteres, puedes hacerlo aquí
    // $conn->exec("SET NAMES utf8");
} catch (PDOException $e) {
    // Manejar errores de conexión de manera adecuada
    die("Error de conexión: " . $e->getMessage());
}

// A partir de aquí, puedes utilizar la variable $conn para realizar consultas a la base de datos
?>
