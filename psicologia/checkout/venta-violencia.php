<?php
require_once __DIR__ . '/../pages/seccion.php';
?>
<?php
require_once __DIR__ . '/../db/config.php';
// Obtener el último ID de usuario registrado
$sql_last_user_id = "SELECT MAX(id) AS ultimo_id_usuario FROM Usuario";
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
            $query = "INSERT INTO Usuarios_Tipos_Violencia (ID_Usuario, ID_Tipo_Violencia) VALUES (?, ?)";
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
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Tipos de Violencia</title>
    <!-- Enlace a los estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .checkbox-container {
            display: inline-block;
            margin-right: 20px; /* Espacio entre los checkbox y los textos asociados */
        }
        .checkbox-container input[type="checkbox"] {
            margin-right: 10px; /* Espacio entre la casilla y el texto */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registrar Tipos de Violencia Detectada</h2>
        <div class="alert alert-info" role="alert">
        Selecciona las casillas con el tipo de violencia detectada!
        </div>


        <div class="alert alert-info" role="alert">
        Antes de Reguistrar El tipo de Violencia Verifica que se Reguistre El Usuario Correctamente 
        </div>
        <form method="post" action="venta-violencia.php" class="row g-3 needs-validation" novalidate>
            <label class="form-label">Tipos de Violencia:</label><br>
            <!-- Aquí deberías manejar la parte PHP que obtiene los tipos de violencia, lo dejo como comentario -->
            <?php
                try {
                    $sql = "SELECT ID_Tipo_Violencia, Nombre_tipo FROM Tipos_Violencia";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();

                    // Si hay resultados, mostrar casillas de verificación
                    if ($stmt->rowCount() > 0) {
                        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        $total_rows = count($rows);
                        $half_rows = ceil($total_rows / 2); // Dividir en dos filas

                        echo "<div class='row'>";
                        foreach ($rows as $key => $row) {
                            $checkbox_id = "tipo_violencia_" . $row['ID_Tipo_Violencia'];
                            echo "<div class='checkbox-container col-sm-6'>";
                            echo "<input type='checkbox' id='$checkbox_id' name='id_tipo_violencia[]' value='" . $row['ID_Tipo_Violencia'] . "' required>";
                            echo "<label class='form-check-label' for='$checkbox_id'>" . $row['Nombre_tipo'] . "</label>";
                            echo "</div>";
                            // Si se alcanza la mitad de los resultados, cerrar la fila actual y abrir una nueva
                            if ($key + 1 == $half_rows) {
                                echo "</div><div class='row'>";
                            }
                        }
                        echo "</div>";
                    } else {
                        echo "No hay tipos de violencia disponibles";
                    }
                } catch(PDOException $e) {
                    // Manejar errores de manera adecuada
                    echo "Error al obtener los tipos de violencia";
                }
            ?>
            <br><br>
            
            <button type="submit" class="btn btn-primary" >Guardar Tipos de Violencia</button>
        </form>
    </div>
</body>
</html>



