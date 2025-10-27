<?php
// --- 1. CONFIGURACIÓN DE LA BASE DE DATOS ---
$host = 'localhost';
// *** ¡Nombre de BD correcto! ***
$db   = 'oaxacaa';
$user = 'root';
$pass = ''; // Ajusta si tu MySQL tiene contraseña
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     http_response_code(500); // Error interno del servidor
     // Devuelve JSON con el error para depuración
     echo json_encode(['error' => 'Error de conexión a la BD: ' . $e->getMessage()]);
     exit; // Detiene ejecución
}

// Establece tipo de contenido ANTES de cualquier salida
header('Content-Type: application/json');

// --- 2. EL "ROUTER" INTELIGENTE ---
$type = $_GET['type'] ?? '';
$query = $_GET['q'] ?? '';
// Parámetro base para el LIKE (permite buscar palabras intermedias)
$params = !empty($query) ? ['%' . str_replace(' ', '%', $query) . '%'] : [];

switch ($type) {
    // --- BÚSQUEDA DE REGIONES ---
    case 'region':
        if (empty($params)) { echo json_encode([]); break; }
        try {
            $stmt = $pdo->prepare("SELECT id_region, nombre FROM regiones WHERE nombre LIKE ? ORDER BY nombre LIMIT 5");
            $stmt->execute($params);
            echo json_encode($stmt->fetchAll());
        } catch (\PDOException $e) {
             http_response_code(500);
             echo json_encode(['error' => 'Error consulta región: ' . $e->getMessage()]);
        }
        break;

    // --- BÚSQUEDA DE DISTRITOS (Filtro corregido) ---
    case 'distrito':
        if (empty($params)) { echo json_encode([]); break; }
        $sql = "SELECT dis.id_distrito, dis.nombre
                FROM distritos AS dis";
        $joins = "";
        $whereClause = " WHERE dis.nombre LIKE ?";
        $queryParams = $params; // Copia params iniciales (el query LIKE)

        // Filtro por ID de región
        if (!empty($_GET['region_id'])) {
             if (!ctype_digit((string)$_GET['region_id'])) {
                 http_response_code(400); echo json_encode(['error' => 'region_id inválido']); break;
             }
             // El JOIN es necesario SOLO si filtramos por región
             $joins .= " JOIN regiones AS reg ON dis.id_region_fk = reg.id_region";
             $whereClause .= " AND reg.id_region = ?";
             $queryParams[] = $_GET['region_id']; // Añade region_id a los parámetros
        }
        $sql .= $joins . $whereClause . " ORDER BY dis.nombre LIMIT 5";

        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute($queryParams); // Usa los parámetros construidos
            echo json_encode($stmt->fetchAll());
        } catch (\PDOException $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Error en consulta de distrito: ' . $e->getMessage(), 'sql' => $sql, 'params' => $queryParams]);
        }
        break;

    // --- BÚSQUEDA DE MUNICIPIOS (Filtro corregido y DISTINCT) ---
   // --- BÚSQUEDA DE MUNICIPIOS (Filtro seguro y compatible con JS) ---
case 'municipio':
    if (empty($params)) { echo json_encode([]); break; }

    $sql = "SELECT DISTINCT mun.id_municipio_inegi, mun.nombre
            FROM municipios AS mun";
    $joins = "";
    $whereClause = " WHERE mun.nombre LIKE ?";
    $queryParams = $params;

    // 🟢 Si se recibe un distrito_id (opcional)
    if (!empty($_GET['distrito_id'])) {
        if (!ctype_digit((string)$_GET['distrito_id'])) {
            http_response_code(400);
            echo json_encode(['error' => 'distrito_id inválido']);
            break;
        }
        $joins .= " JOIN distritos AS dis ON mun.id_distrito_fk = dis.id_distrito";
        $whereClause .= " AND dis.id_distrito = ?";
        $queryParams[] = $_GET['distrito_id'];
    }

    // 🟢 Si se recibe un region_id (opcional)
    else if (!empty($_GET['region_id'])) {
        if (!ctype_digit((string)$_GET['region_id'])) {
            http_response_code(400);
            echo json_encode(['error' => 'region_id inválido para municipio']);
            break;
        }
        $joins .= " JOIN distritos AS dis ON mun.id_distrito_fk = dis.id_distrito";
        $joins .= " JOIN regiones AS reg ON dis.id_region_fk = reg.id_region";
        $whereClause .= " AND reg.id_region = ?";
        $queryParams[] = $_GET['region_id'];
    }

    $sql .= $joins . $whereClause . " ORDER BY mun.nombre ASC LIMIT 10";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute($queryParams);
        $municipios = $stmt->fetchAll();

        // 🔹 Enviamos el resultado en formato JSON
        echo json_encode($municipios);
    } catch (\PDOException $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Error en consulta de municipio: ' . $e->getMessage()]);
    }
    break;


    // --- BÚSQUEDA DE LOCALIDADES (Asentamientos - Filtro corregido) ---
    case 'localidad':
        if (empty($params)) { echo json_encode([]); break; }
        $sql = "SELECT asen.id_asentamiento, asen.nombre, asen.tipo_asentamiento, asen.codigo_postal
                FROM asentamientos AS asen";
        $joins = "";
        $whereClause = " WHERE asen.nombre LIKE ?";
        $queryParams = $params;

        // Filtro por ID de municipio
        if (!empty($_GET['municipio_id'])) {
             if (!ctype_digit((string)$_GET['municipio_id'])) {
                 http_response_code(400); echo json_encode(['error' => 'municipio_id inválido']); break;
             }
             $whereClause .= " AND asen.id_municipio_fk = ?";
             $queryParams[] = $_GET['municipio_id'];
        }
         // Filtros adicionales (si se busca localidad sin saber municipio)
        else if (!empty($_GET['distrito_id'])) {
            // ... (código igual que en la versión anterior para joins y params) ...
            if (!ctype_digit((string)$_GET['distrito_id'])) { http_response_code(400); echo json_encode(['error'=>'distrito_id inválido']); break; }
            $joins .= " JOIN municipios AS mun ON asen.id_municipio_fk = mun.id_municipio_inegi JOIN distritos AS dis ON mun.id_distrito_fk = dis.id_distrito";
            $whereClause .= " AND dis.id_distrito = ?";
            $queryParams[] = $_GET['distrito_id'];
        }
        else if (!empty($_GET['region_id'])) {
            // ... (código igual que en la versión anterior para joins y params) ...
             if (!ctype_digit((string)$_GET['region_id'])) { http_response_code(400); echo json_encode(['error'=>'region_id inválido']); break; }
            $joins .= " JOIN municipios AS mun ON asen.id_municipio_fk = mun.id_municipio_inegi JOIN distritos AS dis ON mun.id_distrito_fk = dis.id_distrito JOIN regiones AS reg ON dis.id_region_fk = reg.id_region";
            $whereClause .= " AND reg.id_region = ?";
            $queryParams[] = $_GET['region_id'];
        }

        $sql .= $joins . $whereClause . " ORDER BY asen.nombre LIMIT 10";

        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute($queryParams);
            echo json_encode($stmt->fetchAll());
        } catch (\PDOException $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Error en consulta de localidad: ' . $e->getMessage(), 'sql' => $sql, 'params' => $queryParams]);
        }
        break;

    // --- OBTENER DETALLES COMPLETOS (Más robusto) ---
   case 'get_full_details':
    $provided_id = null;
    $params_details = [];

    $selectReg = "reg.id_region, reg.nombre AS region_nombre";
    $selectDis = "dis.id_distrito, dis.nombre AS distrito_nombre";
    $selectMun = "mun.id_municipio_inegi AS municipio_id, mun.nombre AS municipio_nombre";
    $selectLoc = "asen.id_asentamiento AS localidad_id, asen.nombre AS localidad_nombre, asen.tipo_asentamiento, asen.codigo_postal";

    if (!empty($_GET['localidad_id'])) {
        $provided_id = $_GET['localidad_id'];
        $sql = "
            SELECT $selectReg, $selectDis, $selectMun, $selectLoc
            FROM asentamientos AS asen
            LEFT JOIN municipios AS mun 
                ON asen.id_municipio_fk = mun.id_municipio_inegi
            LEFT JOIN distritos AS dis 
                ON mun.id_distrito_fk = dis.id_distrito
            LEFT JOIN regiones AS reg 
                ON dis.id_region_fk = reg.id_region
            WHERE asen.id_asentamiento = ?
            UNION
            SELECT $selectReg, $selectDis, $selectMun, $selectLoc
            FROM asentamientos AS asen
            LEFT JOIN municipios AS mun 
                ON asen.id_municipio_fk = mun.id_municipio
            LEFT JOIN distritos AS dis 
                ON mun.id_distrito_fk = dis.id_distrito
            LEFT JOIN regiones AS reg 
                ON dis.id_region_fk = reg.id_region
            WHERE asen.id_asentamiento = ?
            LIMIT 1";
        $params_details = [$provided_id, $provided_id];
    }
    else if (!empty($_GET['municipio_id'])) {
        $provided_id = $_GET['municipio_id'];
        $sql = "
            SELECT $selectReg, $selectDis, $selectMun
            FROM municipios AS mun
            LEFT JOIN distritos AS dis ON mun.id_distrito_fk = dis.id_distrito
            LEFT JOIN regiones AS reg ON dis.id_region_fk = reg.id_region
            WHERE mun.id_municipio_inegi = ? OR mun.id_municipio = ?
            LIMIT 1";
        $params_details = [$provided_id, $provided_id];
    }
    else if (!empty($_GET['distrito_id'])) {
        $provided_id = $_GET['distrito_id'];
        $sql = "
            SELECT $selectReg, $selectDis
            FROM distritos AS dis
            LEFT JOIN regiones AS reg ON dis.id_region_fk = reg.id_region
            WHERE dis.id_distrito = ?
            LIMIT 1";
        $params_details = [$provided_id];
    }
    else if (!empty($_GET['region_id'])) {
        $provided_id = $_GET['region_id'];
        $sql = "SELECT $selectReg FROM regiones AS reg WHERE reg.id_region = ? LIMIT 1";
        $params_details = [$provided_id];
    }

    if ($provided_id === null || !ctype_digit((string)$provided_id)) {
        http_response_code(400);
        echo json_encode(['error' => 'ID no proporcionado o inválido para get_full_details.']);
        break;
    }

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params_details);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            echo json_encode($result);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'No se encontraron detalles para el ID: ' . htmlspecialchars($provided_id)]);
        }
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Error en consulta get_full_details: ' . $e->getMessage(), 'sql' => $sql, 'params' => $params_details]);
    }
    break;

    // --- RESPUESTA POR DEFECTO ---
    default:
        http_response_code(400); // Bad Request
        echo json_encode(['error' => 'Tipo de solicitud no válida. Tipo recibido: ' . htmlspecialchars($type)]);
        break;
}
?>