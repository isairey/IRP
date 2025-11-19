<?php
require_once __DIR__ . '/../pages/seccion.php';
require_once __DIR__ . '/../db/config.php';

// ---------------- PAGINACIÓN ----------------
$registrosPorPagina = 10;
$paginaActual = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($paginaActual - 1) * $registrosPorPagina;

// Capturar búsqueda si existe
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

try {
    // Contar total de registros
    $sqlCount = "
        SELECT COUNT(DISTINCT s.ID) AS total
        FROM diplomados d
        LEFT JOIN modulos m ON m.DiplomadoID = d.ID_Diplomado
        LEFT JOIN secciones s ON s.ModuloID = m.ID_Modulo
        WHERE (:search = '' OR d.NombreDiplomado LIKE :searchLike)
    ";
    $stmtCount = $conn->prepare($sqlCount);
    $stmtCount->bindValue(':search', $search, PDO::PARAM_STR);
    $stmtCount->bindValue(':searchLike', "%$search%", PDO::PARAM_STR);
    $stmtCount->execute();
    $totalRegistros = (int)$stmtCount->fetchColumn();
    $totalPaginas = ceil($totalRegistros / $registrosPorPagina);

    // Consulta principal con límite
    $sql = "
        SELECT d.ID_Diplomado, d.NombreDiplomado,
               m.ID_Modulo, m.NombreModulo,
               s.ID AS ID_Seccion, s.NumSeccion, s.NombreSeccion, s.Descripcion, s.Fecha
        FROM diplomados d
        LEFT JOIN modulos m ON m.DiplomadoID = d.ID_Diplomado
        LEFT JOIN secciones s ON s.ModuloID = m.ID_Modulo
        WHERE (:search = '' OR d.NombreDiplomado LIKE :searchLike)
        ORDER BY d.NombreDiplomado, m.ID_Modulo, s.NumSeccion
        LIMIT :offset, :limit
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':search', $search, PDO::PARAM_STR);
    $stmt->bindValue(':searchLike', "%$search%", PDO::PARAM_STR);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindValue(':limit', $registrosPorPagina, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Organizar datos jerárquicamente
    $datos = [];
    foreach ($result as $row) {
        $idDipl = $row['ID_Diplomado'];
        $idMod  = $row['ID_Modulo'];

        if (!isset($datos[$idDipl])) {
            $datos[$idDipl] = [
                'NombreDiplomado' => $row['NombreDiplomado'],
                'Modulos' => []
            ];
        }

        if ($idMod && !isset($datos[$idDipl]['Modulos'][$idMod])) {
            $datos[$idDipl]['Modulos'][$idMod] = [
                'ID_Diplomado' => $row['ID_Diplomado'],
                'ID_Modulo' => $row['ID_Modulo'],
                'NombreModulo' => $row['NombreModulo'],
                'Secciones' => []
            ];
        }

        if ($row['ID_Seccion']) {
            $datos[$idDipl]['Modulos'][$idMod]['Secciones'][] = [
                'ID_Seccion' => $row['ID_Seccion'],
                'NumSeccion' => $row['NumSeccion'],
                'NombreSeccion' => $row['NombreSeccion'],
                'Descripcion' => $row['Descripcion'],
                'Fecha' => $row['Fecha']
            ];
        }
    }

} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

require_once __DIR__ . '/../pages/header.php';
?>


<?php
require_once __DIR__ . '/../pages/header.php';
?>







<?php
 
require_once __DIR__ . '/../pages/footer.php';
?>
    <!-- Temina -->
    <!-- ACA EMPIEZA EL CONTENIDO DE LA PAGINA LO DE ARRIBA ES EL MENU -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Secciones de Diplomados</h1>
    </div>

    <!-- Barra de búsqueda -->
    <div class="d-flex justify-content-center py-3">
        <form method="GET" class="d-flex mb-3" role="search">
            <input class="form-control me-2" type="text" placeholder="Buscar diplomado..." name="search" value="<?= htmlspecialchars($search) ?>">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
            <button class="btn btn-outline-secondary" type="button" onclick="window.location.href='./ver-seciones.php'">
                <i class="bi bi-arrow-repeat"></i>
            </button>
        </form>
    </div>

    <div class="container mt-4">
        <?php if (empty($datos)): ?>
            <div class="alert alert-warning text-center">No se encontraron resultados</div>
        <?php else: ?>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Diplomado</th>
                        <th style="width:50px"># Módulo</th>
                        <th>Módulo</th>
                        <th># Sección</th>
                        <th>Nombre Sección</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datos as $dipl): ?>
                        <?php 
                        $totalRowsDipl = 0;
                        foreach ($dipl['Modulos'] as $mod) {
                            $totalRowsDipl += max(count($mod['Secciones']), 1);
                        }
                        $diplPrinted = false;
                        $moduloIndex = 1;
                        ?>
                        <?php foreach ($dipl['Modulos'] as $mod): 
                            $secciones = $mod['Secciones'];
                            $rowspanMod = max(count($secciones), 1);
                        ?>
                            <?php if ($secciones): ?>
                                <?php foreach ($secciones as $i => $sec): ?>
                                    <tr>
                                        <?php if (!$diplPrinted): ?>
                                            <td rowspan="<?= $totalRowsDipl ?>"><?= htmlspecialchars($dipl['NombreDiplomado']) ?></td>
                                            <?php $diplPrinted = true; ?>
                                        <?php endif; ?>

                                        <?php if ($i === 0): ?>
                                            <td rowspan="<?= $rowspanMod ?>"><?= $moduloIndex ?></td>
                                            <td rowspan="<?= $rowspanMod ?>"><?= htmlspecialchars($mod['NombreModulo']) ?></td>
                                        <?php endif; ?>

                                        <td><?= $sec['NumSeccion'] ?></td>
                                        <td><?= htmlspecialchars($sec['NombreSeccion']) ?></td>
                                        <td><?= htmlspecialchars($sec['Descripcion']) ?></td>
                                        <td><?= htmlspecialchars($sec['Fecha']) ?></td>
                                        <td>
                                            <a href="./../checkout/editar-secciones.php?id=<?= $sec['ID_Seccion'] ?>&idmod=<?= $mod['ID_Modulo'] ?>&iddiplo=<?= $mod['ID_Diplomado'] ?>" class="btn btn-sm btn-warning">Editar</a>
                                            <button class="btn btn-sm btn-danger eliminar-asignacion" data-id="<?= $sec['ID_Seccion'] ?>">Eliminar</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <?php if (!$diplPrinted): ?>
                                        <td rowspan="<?= $totalRowsDipl ?>"><?= htmlspecialchars($dipl['NombreDiplomado']) ?></td>
                                        <?php $diplPrinted = true; ?>
                                    <?php endif; ?>
                                    <td><?= $moduloIndex ?></td>
                                    <td><?= htmlspecialchars($mod['NombreModulo']) ?></td>
                                    <td colspan="3" class="text-center text-muted">Sin secciones</td>
                                    <td>
                                        <a href="./../checkout/editar-modulos-seccion.php?id=<?= $mod['ID_Diplomado'] ?>&idmod=<?= $mod['ID_Modulo'] ?>" class="btn btn-sm btn-warning">Editar Módulo</a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php $moduloIndex++; endforeach; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- 🔹 PAGINACIÓN -->
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item <?= ($paginaActual <= 1) ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $paginaActual - 1 ?>&search=<?= urlencode($search) ?>">Anterior</a>
                    </li>

                    <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                        <li class="page-item <?= ($i == $paginaActual) ? 'active' : '' ?>">
                            <a class="page-link" href="?page=<?= $i ?>&search=<?= urlencode($search) ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>

                    <li class="page-item <?= ($paginaActual >= $totalPaginas) ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $paginaActual + 1 ?>&search=<?= urlencode($search) ?>">Siguiente</a>
                    </li>
                </ul>
            </nav>
        <?php endif; ?>
    </div>
</main>

    <footer class="my-5 pt-5 text-body-secondary text-center text-small">
              <?php
          require_once __DIR__ . '/../checkout/CR.php';
          ?>
                <ul class="list-inline">
                    <!-- <li class="list-inline-item"><a href="#">Privacy</a></li> -->
                </ul>
        </footer>
</main>


<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll('.eliminar-asignacion').forEach(button => {
        button.addEventListener('click', () => {
            Swal.fire({
                title: '¿Estás seguro?',
                html: `
                    <div id="emoji" style="font-size:80px; transition: all 0.3s;">😃</div>
                    <p>Elige una opción:</p>
                `,
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'No, cancelar',
                didOpen: () => {
                    const emoji = document.getElementById('emoji');
                    const confirmBtn = Swal.getConfirmButton();
                    const cancelBtn = Swal.getCancelButton();

                    // Si el mouse pasa sobre "Sí, eliminar" → carita triste
                    confirmBtn.addEventListener("mouseenter", () => {
                        emoji.textContent = "😢";
                    });
                    confirmBtn.addEventListener("mouseleave", () => {
                        emoji.textContent = "😃";
                    });

                    // Si el mouse pasa sobre "No, cancelar" → carita feliz
                    cancelBtn.addEventListener("mouseenter", () => {
                        emoji.textContent = "😁";
                    });
                    cancelBtn.addEventListener("mouseleave", () => {
                        emoji.textContent = "😃";
                    });
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const donacionId = button.getAttribute('data-id');
        window.location.href = `./eliminar-seciones.php?id=${donacionId}`;
                    Swal.fire({
                        icon: 'success',
                        title: '¡Eliminado!',
                        text: 'La Secion fue eliminada correctamente.',
                        timer: 2000,
                        showConfirmButton: false
                    
                      
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire({
                        icon: 'info',
                        title: 'Cancelado',
                        text: 'La Seccion no fue eliminada 🙂',
                        timer: 2000,
                        showConfirmButton: false
                    });
                }
            });
        });
    });
});
</script>


        


<?php if (isset($_GET['statuss'])): ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            icon: "<?= $_GET['statuss'] === 'updated' ? 'success' : 'error' ?>",
            title: "<?= $_GET['statuss'] === 'updated' ? 'Modulos Actualizados correctamente' : 'Error al registrar' ?>",
            text: "<?= $_GET['statuss'] === 'error' ? urldecode($_GET['msg']) : '' ?>",
            showConfirmButton: false,
            timer: 2000, // ⏱️ 2 segundos
            timerProgressBar: true
        });
    </script>
<?php endif; ?>




<?php if (isset($_GET['mensaje'])): ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            icon: "<?= $_GET['mensaje'] === 'success' ? 'success' : 'error' ?>",
            title: "<?= $_GET['mensaje'] === 'success' ? 'Seciones Actualizadas correctamente' : 'Error al registrar' ?>",
            text: "<?= $_GET['mensaje'] === 'error' ? urldecode($_GET['msg']) : '' ?>",
            showConfirmButton: false,
            timer: 2000, // ⏱️ 2 segundos
            timerProgressBar: true
        });
    </script>
<?php endif; ?>


<?php if (isset($_GET['msg'])): ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            icon: "<?= $_GET['msg'] === 'ok' ? 'success' : 'error' ?>",
            title: "<?= $_GET['msg'] === 'ok' ? 'Seciones Actualizadas correctamente' : 'Error al registrar' ?>",
            text: "<?= $_GET['msg'] === 'error' ? urldecode($_GET['msg']) : '' ?>",
            showConfirmButton: false,
            timer: 2000, // ⏱️ 2 segundos
            timerProgressBar: true
        });
    </script>
<?php endif; ?>


<?php if (isset($_GET['msgg'])): ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            icon: "<?= $_GET['msgg'] === 'deleted' ? 'success' : 'error' ?>",
            title: "<?= $_GET['msgg'] === 'deleted' ? 'Secion Eliminada correctamente' : 'Error al registrar' ?>",
            text: "<?= $_GET['msgg'] === 'error' ? urldecode($_GET['msg']) : '' ?>",
            showConfirmButton: false,
            timer: 2000, // ⏱️ 2 segundos
            timerProgressBar: true
        });
    </script>
<?php endif; ?>
