<?php
session_start();

// Verificar si el usuario ha iniciado sesión y tiene el rol adecuado
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role_id']) || $_SESSION['role_id'] != 1) {
    header("Location: ../sign-in/index.php");
    exit();
}

require_once __DIR__ . '/../db/config.php';

try {
    $registrosPorPagina = 8;
    $pagina = isset($_GET['pagina']) && is_numeric($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
    $offset = ($pagina - 1) * $registrosPorPagina;

    // Consulta principal: asistentes a talleres
    $query = "
        SELECT apt.ID, t.ID_Taller, t.Nombre, p.Nombre AS NombreParticipante, apt.FechaRegistro
        FROM asistentes_taller apt
        LEFT JOIN Talleres t ON apt.ID_Taller = t.ID_Taller
        LEFT JOIN Participante p ON apt.ID_Persona = p.ID_Participante
    ";

    // Consulta para contar registros
    $countQuery = "
        SELECT COUNT(*)
        FROM asistentes_taller apt
        LEFT JOIN Talleres t ON apt.ID_Taller = t.ID_Taller
        LEFT JOIN Participante p ON apt.ID_Persona = p.ID_Participante
    ";

    $condiciones = [];
    $params = [];

    // Filtro de búsqueda
    if (!empty($_GET['search'])) {
        $condiciones[] = "(t.NombreTaller LIKE :search OR p.Nombre LIKE :search)";
        $params[':search'] = "%" . $_GET['search'] . "%";
    }

    // Aplicar condiciones
    if ($condiciones) {
        $where = " WHERE " . implode(" AND ", $condiciones);
        $query .= $where;
        $countQuery .= $where;
    }

    // Ejecutar consulta de conteo
    $stmtCount = $conn->prepare($countQuery);
    foreach ($params as $k => $v) {
        $stmtCount->bindValue($k, $v);
    }
    $stmtCount->execute();
    $totalRegistros = $stmtCount->fetchColumn();
    $totalPaginas = ceil($totalRegistros / $registrosPorPagina);

    // Orden y paginación
    $query .= " ORDER BY apt.FechaRegistro DESC LIMIT :limit OFFSET :offset";
    $stmt = $conn->prepare($query);
    foreach ($params as $k => $v) {
        $stmt->bindValue($k, $v);
    }
    $stmt->bindValue(':limit', $registrosPorPagina, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

    $asistentes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
}
?>





<?php
require_once __DIR__ . '/../pages/footer.php';
?>
<!-- ACA EMPIEZA EL CONTENIDO DE LA PAGINA -->

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between border-bottom">
    <h1 class="h2">Talleres Impartidos</h1>
  </div>

  <div class="d-flex justify-content-center py-4">
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="text" placeholder="Buscar taller o ponente" name="search"
             value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
      <button class="btn btn-outline-success" type="submit">Buscar</button>
      <button class="btn btn-outline-secondary" type="button" onclick="window.location.href='vista-talleres.php'">
        <i class="bi bi-arrow-repeat"></i>
      </button>
    </form>
  </div>

  <div class="table-responsive small">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>#</th>
          <th>Taller</th>
          <th>Ponente</th>
          <th>Fecha Asignación</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($asignaciones as $a): ?>
          <tr>
            <td><?= htmlspecialchars($a['ID']) ?></td>
            <td><?= htmlspecialchars($a['NombreTaller'] ?: '—') ?></td>
            <td><?= htmlspecialchars($a['NombrePonente'] ?: '—') ?></td>
            <td><?= htmlspecialchars($a['FechaAsignacion']) ?></td>
            <td>
              <!-- Botón Asistentes que pasa el ID del taller -->
              <form method="GET" action="ver-asistentes-taller.php" style="display:inline;">
                <input type="hidden" name="id_taller" value="<?= $a['ID_Taller'] ?>">
                <button type="submit" class="btn btn-sm btn-info">Asistentes</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
        <?php if (!$asignaciones): ?>
          <tr><td colspan="5" class="text-center">No se encontraron registros.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <nav aria-label="Paginación">
    <ul class="pagination justify-content-center mt-3">
      <!-- Botón Anterior -->
      <li class="page-item <?= $pagina <= 1 ? 'disabled' : '' ?>">
        <a class="page-link" href="?pagina=<?= max($pagina - 1, 1) ?>&search=<?= urlencode($_GET['search'] ?? '') ?>">
          &laquo; Anterior
        </a>
      </li>

      <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
        <li class="page-item <?= $i == $pagina ? 'active' : '' ?>">
          <a class="page-link" href="?pagina=<?= $i ?>&search=<?= urlencode($_GET['search'] ?? '') ?>">
            <?= $i ?>
          </a>
        </li>
      <?php endfor; ?>

      <!-- Botón Siguiente -->
      <li class="page-item <?= $pagina >= $totalPaginas ? 'disabled' : '' ?>">
        <a class="page-link" href="?pagina=<?= min($pagina + 1, $totalPaginas) ?>&search=<?= urlencode($_GET['search'] ?? '') ?>">
          Siguiente &raquo;
        </a>
      </li>
    </ul>
  </nav>
</main>

<script>
  document.querySelectorAll('.eliminar-asignacion').forEach(btn => {
    btn.addEventListener('click', () => {
      if (confirm('¿Eliminar esta asignación?')) {
        location.href = `eliminar_asignacion_taller.php?id=${btn.dataset.id}`;
      }
    });
  });
</script>

<!-- Scripts Bootstrap -->
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" crossorigin="anonymous"></script>
<script src="dashboard.js"></script>
</body>
</html>
