<?php
// Conexión a la base de datos
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "oaxaca"; // Cambia por el nombre de tu BD

$conn = new mysqli($host, $user, $pass, $dbname);
$conn->set_charset("utf8");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar el tipo de solicitud
if (isset($_GET['type']) && $_GET['type'] === 'get_full_details') {

    $localidad_id = intval($_GET['localidad_id']);

    // Verifica que el ID no esté vacío
    if ($localidad_id <= 0) {
        http_response_code(400);
        echo json_encode(["error" => "ID de localidad inválido"]);
        exit;
    }

    // Consulta para obtener datos completos de la localidad
    $sql = "
        SELECT 
            l.id AS localidad_id,
            l.nombre AS localidad_nombre,
            m.id AS municipio_id,
            m.nombre AS municipio_nombre,
            r.id AS region_id,
            r.nombre AS region_nombre,
            d.id AS distrito_id,
            d.nombre AS distrito_nombre
        FROM localidades l
        LEFT JOIN municipios m ON l.municipio_id = m.id
        LEFT JOIN distritos d ON m.distrito_id = d.id
        LEFT JOIN regiones r ON d.region_id = r.id
        WHERE l.id = ?
    ";

    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        http_response_code(500);
        echo json_encode(["error" => "Error al preparar la consulta: " . $conn->error]);
        exit;
    }

    $stmt->bind_param("i", $localidad_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $row = $result->fetch_assoc()) {
        echo json_encode($row);
    } else {
        http_response_code(404);
        echo json_encode(["error" => "Localidad no encontrada"]);
    }

    $stmt->close();
    $conn->close();
    exit;
}
?>
