  
  <?php

require_once __DIR__ . '/../db/config.php';

// --- Aquí va todo tu código de consulta de asistentes y secciones ---
if (!isset($_GET['id_diplomado']) || !is_numeric($_GET['id_diplomado'])) {
    die("ID de diplomado inválido.");
}
$idDiplomado = (int) $_GET['id_diplomado'];
// --- Consulta principal con búsqueda ---
$sql = "
    SELECT u.ID, u.Nombre, u.Email, aa.FechaAsignacion, 'Usuario' AS Tipo
    FROM asignacionesdiplomado aa
    INNER JOIN usuario u ON aa.ID_Usuario = u.ID
    WHERE aa.ID_Diplomado = :idDiplomado

    UNION ALL

    SELECT p.ID, CONCAT(p.Nombre, ' ', p.ApellidoPaterno, ' ', p.ApellidoMaterno) AS Nombre, p.Email, aa.FechaAsignacion, 'Participante' AS Tipo
    FROM asignacionesdiplomado aa
    INNER JOIN participante p ON aa.ID_Usuario = p.ID
    WHERE aa.ID_Diplomado = :idDiplomado

    UNION ALL

    SELECT per.ID, CONCAT(per.Nombre, ' ', per.ApellidoPaterno, ' ', per.ApellidoMaterno) AS Nombre, per.Email, aa.FechaAsignacion, 'Personal' AS Tipo
    FROM asignacionesdiplomado aa
    INNER JOIN personal per ON aa.ID_Usuario = per.ID
    WHERE aa.ID_Diplomado = :idDiplomado
";


$registrosPorPagina = 8;
$pagina = isset($_GET['pagina']) && is_numeric($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
$offset = ($pagina - 1) * $registrosPorPagina;

// 1️⃣ Consulta de asistentes
$stmt = $conn->prepare("
    SELECT u.ID, u.Nombre, u.Email, aa.FechaAsignacion
    FROM asignacionesdiplomado aa
    INNER JOIN usuario u ON aa.ID_Usuario = u.ID
    WHERE aa.ID_Diplomado = :idDiplomado
    ORDER BY aa.FechaAsignacion DESC
    LIMIT :limit OFFSET :offset
");
$stmt->bindValue(':idDiplomado', $idDiplomado, PDO::PARAM_INT);
$stmt->bindValue(':limit', $registrosPorPagina, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$asistentes = $stmt->fetchAll(PDO::FETCH_ASSOC);

// 2️⃣ Traer fechas de secciones de cada participante
// 2️⃣ Traer fechas de secciones para este diplomado
foreach ($asistentes as &$asistente) {
    $stmt2 = $conn->prepare("
        SELECT fecha 
        FROM secciones 
        WHERE DiplomadoID = :idDiplomado
        ORDER BY fecha ASC
    ");
    $stmt2->execute([
        ':idDiplomado' => $idDiplomado
    ]);
    $asistente['fechas_secciones'] = $stmt2->fetchAll(PDO::FETCH_COLUMN);
}


// Conteo total para paginación
$stmtCount = $conn->prepare("SELECT COUNT(*) FROM asignacionesdiplomado WHERE ID_Diplomado = :idDiplomado");
$stmtCount->bindValue(':idDiplomado', $idDiplomado, PDO::PARAM_INT);
$stmtCount->execute();
$totalRegistros = $stmtCount->fetchColumn();
$totalPaginas = ceil($totalRegistros / $registrosPorPagina);




// 🟩 Consulta para obtener el nombre del diplomado
$stmtNombre = $conn->prepare("
    SELECT NombreDiplomado 
    FROM diplomados 
    WHERE ID_Diplomado = :idDiplomado
");
$stmtNombre->bindValue(':idDiplomado', $idDiplomado, PDO::PARAM_INT);
$stmtNombre->execute();
$diplomado = $stmtNombre->fetch(PDO::FETCH_ASSOC);

$nombreDiplomado = $diplomado ? $diplomado['NombreDiplomado'] : 'Diplomado no encontrado';

?>


  
  
  
  <div class="d-flex justify-content-center py-4">
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="text" placeholder="Buscar nombre o correo" name="search"
             value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
      <button class="btn btn-outline-success" type="submit">Buscar</button>
    </form>
  </div>
