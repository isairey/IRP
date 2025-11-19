
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



  <nav aria-label="Paginación">
    <ul class="pagination justify-content-center mt-3">
      <li class="page-item <?= $pagina <= 1 ? 'disabled' : '' ?>">
        <a class="page-link" href="?id_diplomado=<?= $idDiplomado ?>&pagina=<?= max($pagina - 1, 1) ?>">
          &laquo; Anterior
        </a>
      </li>

      <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
        <li class="page-item <?= $i == $pagina ? 'active' : '' ?>">
          <a class="page-link" href="?id_diplomado=<?= $idDiplomado ?>&pagina=<?= $i ?>"><?= $i ?></a>
        </li>
      <?php endfor; ?>

      <li class="page-item <?= $pagina >= $totalPaginas ? 'disabled' : '' ?>">
        <a class="page-link" href="?id_diplomado=<?= $idDiplomado ?>&pagina=<?= min($pagina + 1, $totalPaginas) ?>">
          Siguiente &raquo;
        </a>
      </li>
    </ul>
  </nav>