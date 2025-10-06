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

// Verificar si se enviaron datos del formulario de hijos
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cantidad_hijos"])) {
    if(isset($_POST["hijos"]) && is_array($_POST["hijos"])) {
        // Consulta preparada para insertar un nuevo hijo asociado al último usuario registrado
        $sql_insert_hijo = "INSERT INTO Hijos_Usuario (ID_Usuario, Nombre, ApellidoPaterno, ApellidoMaterno, FechaNacimiento, Sexo, Escolaridad, Condicion)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        // Recorremos todos los hijos enviados desde el formulario
        foreach ($_POST["hijos"] as $hijo) {
            $nombre_hijo = $hijo["nombre"];
            $apellido_paterno_hijo = $hijo["apellido_paterno"];
            $apellido_materno_hijo = $hijo["apellido_materno"];
            $fecha_nacimiento_hijo = $hijo["fecha_nacimiento"];
            $sexo_hijo = $hijo["sexo"];
            $escolaridad_hijo = $hijo["escolaridad"];
            $condicion_hijo = $hijo["condicion"];

            // Ejecutamos la consulta preparada para cada hijo
            $stmt = $conn->prepare($sql_insert_hijo);
            $stmt->execute([$ultimo_id_usuario, $nombre_hijo, $apellido_paterno_hijo, $apellido_materno_hijo, $fecha_nacimiento_hijo, $sexo_hijo, $escolaridad_hijo, $condicion_hijo]);

            if ($stmt->rowCount() > 0) {
                //echo "Nuevo hijo registrado correctamente.<br>";
            } else {
                echo "Error al registrar el hijo.<br>";
            }

            // Cerramos el cursor
            $stmt->closeCursor();
        }
    } 
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
            
                header("Location: ../pages/u-decendencia.php?status=success");
exit();
        } catch(PDOException $e) {
            // Manejar errores de manera adecuada
              header("Location: ../pages/u-decendencia.php?status=error&msg=" . urlencode($e->getMessage()));
exit();
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
    <title>Registro de Hijos y Tipos de Violencia</title>
    <!-- Enlace a los estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
    function mostrarFormularios() {
        var cantidadHijos = document.getElementById("cantidad_hijos").value;
        var formularios = document.getElementById("formularios_hijos");

        // Limpiar formularios anteriores
        formularios.innerHTML = "";

        // Generar formularios para cada hijo
        for (var i = 0; i < cantidadHijos; i++) {
            var div = document.createElement("div");
            div.className = "formulario-hijo mb-3";
            div.innerHTML = "<h3>Hijo " + (i + 1) + "</h3>" +
                "<label for='nombre_hijo_" + i + "' class='form-label'>Nombre del hijo:</label>" +
                "<input type='text' id='nombre_hijo_" + i + "' name='hijos[" + i + "][nombre]' class='form-control' maxlength='70' oninput='this.value = this.value.toUpperCase()' required>" +
                "<div class='invalid-feedback'>Se requiere un nombre válido.</div><br>" +
                "<label for='apellido_paterno_hijo_" + i + "' class='form-label'>Apellido paterno del hijo:</label>" +
                "<input type='text' id='apellido_paterno_hijo_" + i + "' name='hijos[" + i + "][apellido_paterno]' class='form-control' maxlength='70' oninput='this.value = this.value.toUpperCase()' required>" +
                "<div class='invalid-feedback'>Se requiere un apellido paterno válido.</div><br>" +
                "<label for='apellido_materno_hijo_" + i + "' class='form-label'>Apellido materno del hijo:</label>" +
                "<input type='text' id='apellido_materno_hijo_" + i + "' name='hijos[" + i + "][apellido_materno]' class='form-control' maxlength='70' oninput='this.value = this.value.toUpperCase()' required>" +
                "<div class='invalid-feedback'>Se requiere un apellido materno válido.</div><br>" +
                "<label for='fecha_nacimiento_hijo_" + i + "' class='form-label'>Fecha de nacimiento del hijo:</label>" +
                "<input type='date' id='fecha_nacimiento_hijo_" + i + "' name='hijos[" + i + "][fecha_nacimiento]' class='form-control' required>" +
                "<div class='invalid-feedback'>Se requiere una fecha de nacimiento válida.</div><br>" +
                "<label for='sexo_hijo_" + i + "' class='form-label'>Sexo del hijo:</label>" +
                "<select id='sexo_hijo_" + i + "' name='hijos[" + i + "][sexo]' class='form-select' required>" +
                "<option value='Masculino'>Masculino</option>" +
                "<option value='Femenino'>Femenino</option>" +
                "</select>" +
                "<div class='invalid-feedback'>Se requiere seleccionar el sexo del hijo.</div><br>" +
                "<label for='escolaridad_hijo_" + i + "' class='form-label'>Escolaridad del hijo:</label>" +
                "<input type='text' id='escolaridad_hijo_" + i + "' name='hijos[" + i + "][escolaridad]' class='form-control' maxlength='70' oninput='this.value = this.value.toUpperCase()' required>" +
                "<div class='invalid-feedback'>Se requiere una escolaridad válida.</div><br>" +
                "<label for='condicion_hijo_" + i + "' class='form-label'>Condición del hijo:</label>" +
                "<input type='text' id='condicion_hijo_" + i + "' name='hijos[" + i + "][condicion]' class='form-control' maxlength='300' oninput='this.value = this.value.toUpperCase()' required>" +
                "<div class='invalid-feedback'>Se requiere una condición válida.</div><br>";

            formularios.appendChild(div);
        }
    }
</script>

</head>
<body>
    <div class="container">
        <h2>Registrar Hijos</h2>
        <form method="post" action="register-hijos.php" class="row g-3 needs-validation" novalidate>
            <div class="mb-3">
                <label for="cantidad_hijos" class="form-label">Cantidad de hijos:</label>
                <input type="number" id="cantidad_hijos" name="cantidad_hijos" min="1" max="15" onchange="mostrarFormularios()" class="form-control" required>
                <div class="invalid-feedback">Por favor ingresa un número válido.</div>
            </div>

            <!-- Contenedor para formularios de hijos -->
            <div id="formularios_hijos"></div>

            <br><br>

            <label class="form-label">Tipos de Violencia:</label><br>
            <!-- Aquí deberías manejar la parte PHP que obtiene los tipos de violencia, lo dejo como comentario -->
            <?php
                
                try {
                    $sql = "SELECT ID_Tipo_Violencia, Nombre_tipo FROM Tipos_Violencia";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
    
                     // Si hay resultados, mostrar casillas de verificación
                    if ($stmt->rowCount() > 0) {
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<input type='checkbox' name='id_tipo_violencia[]' value='" . $row['ID_Tipo_Violencia'] . "' required>";
                            echo "<label class='form-check-label'>" . $row['Nombre_tipo'] . "</label><br>";
                        }
                    } else {
                        echo "No hay tipos de violencia disponibles";
                    }
                } catch(PDOException $e) {
                    // Manejar errores de manera adecuada
                    echo "Error al obtener los tipos de violencia";
                }
            ?> 
            <br><br>
            
            <button type="submit" class="btn btn-primary" onclick="return confirmacion();">Guardar Hijos y Tipos de Violencia</button>
        </form>
    </div>
     <footer class="my-5 pt-5 text-body-secondary text-center text-small">
              <?php
          require_once __DIR__ . '/../checkout/CR.php';
          ?>
                <ul class="list-inline">
                </ul>
        </footer>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="validation.js"></script>
    <script>function confirmacion() {
        return confirm("¿Estás seguro de que deseas guardar los hijos y tipos de violencia?");}</script>

</body>
</html>
