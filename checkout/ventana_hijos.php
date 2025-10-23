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

// Procesar el formulario cuando se envíe
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["hijos"]) && is_array($_POST["hijos"])) {
    $sql_insert_hijo = "INSERT INTO Hijos_Usuario 
        (ID_Usuario, Nombre, ApellidoPaterno, ApellidoMaterno, FechaNacimiento, Sexo, Escolaridad, Condicion)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    foreach ($_POST["hijos"] as $hijo) {
        $stmt = $conn->prepare($sql_insert_hijo);
        $stmt->execute([
            $ultimo_id_usuario,
            $hijo["nombre"],
            $hijo["apellido_paterno"],
            $hijo["apellido_materno"],
            $hijo["fecha_nacimiento"],
            $hijo["sexo"],
            $hijo["escolaridad"],
            $hijo["condicion"]
        ]);
    }

    echo '<script>alert("Hijos registrados correctamente"); window.close();</script>';
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registro de Hijos</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Registrar Hijos</h2>
    <form method="post" class="row g-3 needs-validation" novalidate>
        <input type="hidden" id="cantidad_hijos" name="cantidad_hijos" value="0">
        <div id="formularios_hijos"></div>
        <button type="submit" class="btn btn-primary mt-3">Guardar Hijos</button>
    </form>
</div>

<script>
function mostrarFormularios(cantidadHijos) {
    var formularios = document.getElementById("formularios_hijos");
    formularios.innerHTML = "";

    for (var i = 0; i < cantidadHijos; i++) {
        var div = document.createElement("div");
        div.className = "formulario-hijo mb-3";
        div.innerHTML = `
            <h4>Hijo ${i+1}</h4>
            <label class="form-label">Nombre:</label>
            <input type="text" name="hijos[${i}][nombre]" class="form-control" maxlength="70" oninput="this.value=this.value.toUpperCase()" required>
            
            <label class="form-label">Apellido paterno:</label>
            <input type="text" name="hijos[${i}][apellido_paterno]" class="form-control" maxlength="70" oninput="this.value=this.value.toUpperCase()" required>
            
            <label class="form-label">Apellido materno:</label>
            <input type="text" name="hijos[${i}][apellido_materno]" class="form-control" maxlength="70" oninput="this.value=this.value.toUpperCase()" required>
            
            <label class="form-label">Fecha de nacimiento:</label>
            <input type="date" name="hijos[${i}][fecha_nacimiento]" class="form-control" required>
            
            <label class="form-label">Sexo:</label>
            <select name="hijos[${i}][sexo]" class="form-select" required>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
            </select>
            
            <label class="form-label">Escolaridad:</label>
            <input type="text" name="hijos[${i}][escolaridad]" class="form-control" maxlength="70" oninput="this.value=this.value.toUpperCase()" required>
            
            <label class="form-label">Condición:</label>
            <input type="text" name="hijos[${i}][condicion]" class="form-control" maxlength="300" oninput="this.value=this.value.toUpperCase()" required>
            <hr>
        `;
        formularios.appendChild(div);
    }

    document.getElementById('cantidad_hijos').value = cantidadHijos;
}

// Leer parámetro numDecendencia de la URL
window.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    const numDecendencia = parseInt(urlParams.get('numDecendencia')) || 0;
    if(numDecendencia > 0) mostrarFormularios(numDecendencia);
});
</script>
</body>
</html>
