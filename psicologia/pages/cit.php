
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


require_once __DIR__ . '/../db/config.php';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta para obtener los datos de citas por usuario
    $query = "SELECT TipoAtencion, SUM(Num_citas) AS total 
              FROM citas 
              WHERE ID_Usuario = :usuario_id
              GROUP BY TipoAtencion";

    $statement = $conn->prepare($query);
    $usuario_id = 1; // 👉 cámbialo dinámicamente según el usuario en sesión
    $statement->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
    $statement->execute();

    $datos = array();
    while ($fila = $statement->fetch(PDO::FETCH_ASSOC)) {
        $datos[$fila['TipoAtencion']] = $fila['total'];
    }

    echo json_encode($datos);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>