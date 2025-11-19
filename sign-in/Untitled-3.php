<?php
session_start();

// Verificar si el usuario ha iniciado sesión y tiene el rol adecuado
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role_id']) || $_SESSION['role_id'] != 1) {
    // Si el usuario no ha iniciado sesión o no tiene el rol adecuado, redirigirlo a otra página
    header("Location: ../sign-in/index.php"); // O a una página de acceso denegado
    exit();
}

?>

<?php
require_once __DIR__ . '/../db/config.php';
$conn->exec("SET NAMES utf8");
// Verificar si se recibieron datos del formulario



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_participante = $_POST['id_usuario'] ?? null;
    $id_diplomado = $_POST['id_diplomado'] ?? null;
    $id_ponente = $_POST['id_ponente'] ?? null;

    if (!$id_participante || !$id_diplomado || !$id_ponente) {
        die("Todos los campos son obligatorios.");
    }

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO AsignacionesDiplomado (ID_Usuario, ID_Diplomado, ID_Ponente)
                VALUES (:id_participante, :id_diplomado, :id_ponente)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_participante', $id_participante);
        $stmt->bindParam(':id_diplomado', $id_diplomado);
        $stmt->bindParam(':id_ponente', $id_ponente);

      if ($stmt->execute()) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            ¡Asignación registrada correctamente!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
          </div>';
}        else {
    echo '<div class="alert alert-danger">Error al registrar la asignación.</div>';
}
    } catch (PDOException $e) {
        echo "Error en la base de datos: " . $e->getMessage();
    }
} else {
   // echo "Método no permitido.";
}
?>


 <div class="container">
    <main>
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="../assets/img/logo 1.png" alt="" width="100" height="100">
            <h2>Asignaciones Diplomado</h2>
        </div>
      <form class="needs-validation" action="asignar-diplomado.php" method="POST" enctype="multipart/form-data" novalidate>
            

<div class="col-sm-12">
    <label for="buscar_usuario" class="form-label">Buscar Participante</label>
    <div class="input-group mb-3">
        <input type="text" id="buscar_usuario" class="form-control" placeholder="Ingresa el nombre">
        <button class="btn btn-outline-secondary" type="button" id="btnBuscarUsuario">Buscar</button>
        <button class="btn btn-outline-secondary" type="button" id="btnRefreshUsuario">Refresh</button>
    </div>

    <label for="id_usuario" class="form-label">Participante</label>
    <select name="id_usuario" class="form-select" id="id_usuario" onchange="mostrarModalSiOtro(this.value)">
        <option value="">-- Selecciona una Participante --</option>
        <?php
        require_once __DIR__ . '/../db/config.php';
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $conn->exec("SET NAMES utf8");

        try {
            $sql = "
                SELECT ID_Participante AS id, CONCAT(Nombre, ' ', ApellidoPaterno, ' ', ApellidoMaterno) AS NombreCompleto
                FROM Participante
                UNION
                SELECT ID_Personal AS id, CONCAT(Nombre, ' ', ApellidoPaterno, ' ', ApellidoMaterno) AS NombreCompleto
                FROM Personal
                UNION
                SELECT id AS id, CONCAT(Nombre, ' ', ApellidoPaterno, ' ', ApellidoMaterno) AS NombreCompleto
                FROM Usuario
                ORDER BY NombreCompleto
            ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . $row['id'] . "'>" . $row['NombreCompleto'] . "</option>";
                }
            }
        } catch(PDOException $e) {
            echo "<option value=''>Error al obtener los usuarios</option>";
        }
        ?>
        <option value="_otro_">Otro...</option>
    </select>
</div>

<script>
// Filtrar opciones del select según el input
document.getElementById('btnBuscarUsuario').addEventListener('click', function() {
    const filtro = document.getElementById('buscar_usuario').value.toLowerCase();
    const select = document.getElementById('id_usuario');
    for (let i = 0; i < select.options.length; i++) {
        const texto = select.options[i].text.toLowerCase();
        select.options[i].style.display = texto.includes(filtro) ? '' : 'none';
    }
});

// Botón de refresh: limpia el input y muestra todas las opciones
document.getElementById('btnRefreshUsuario').addEventListener('click', function() {
    document.getElementById('buscar_usuario').value = '';
    const select = document.getElementById('id_usuario');
    for (let i = 0; i < select.options.length; i++) {
        select.options[i].style.display = '';
    }
});
</script>


                        <!-- Seleccionar Diplomado -->
                        <div class="col-sm-12">
                            <label for="id_diplomado" class="form-label">Diplomado</label>
                            <select name="id_diplomado" class="form-select" id="id_diplomado">
                                <?php
                                try {
                                    $sql = "SELECT ID_Diplomado, NombreDiplomado FROM Diplomados";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute();
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<option value='{$row['ID_Diplomado']}'>{$row['NombreDiplomado']}</option>";
                                    }
                                } catch(PDOException $e) {
                                    echo "<option value=''>Error al obtener diplomados</option>";
                                }
                                ?>
                            </select>
                        </div>

                      <!-- Seleccionar Ponente -->
<div class="col-sm-12">
    <label for="id_ponente" class="form-label">Ponente</label>
    <select name="id_ponente" class="form-select" id="id_ponente">
        <?php
        try {
            $sql = "SELECT ID_Ponente, CONCAT(Nombre, ' ', ApellidoPaterno, ' ', ApellidoMaterno) AS NombrePonente FROM Ponentes";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='{$row['ID_Ponente']}'>{$row['NombrePonente']}</option>";
            }
            $conn = null;
        } catch(PDOException $e) {
            echo "<option value=''>Error al obtener ponentes</option>";
        }
        ?>
    </select>
</div>


                    </div>

                    <hr class="my-4">
                    <button class="w-100 btn btn-primary btn-lg" type="submit">Registrar Asignación</button>
                </form>
            </div>
    </main>
</div>

<div id="alert-container" style="position: fixed; top: 20px; right: 20px; z-index: 1055;"></div>


<!-- Modal para nueva usuaria -->
<div class="modal fade" id="modalOtro" tabindex="-1" aria-labelledby="modalOtroLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="formNuevoParticipante" method="POST" action="registrar_participante.php">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalOtroLabel">Registrar Nueva Usuaria</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" required>
          </div>
          <div class="mb-3">
            <label for="apellido_paterno" class="form-label">Apellido Paterno</label>
            <input type="text" class="form-control" name="apellido_paterno" required>
          </div>
          <div class="mb-3">
            <label for="apellido_materno" class="form-label">Apellido Materno</label>
            <input type="text" class="form-control" name="apellido_materno" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email">
          </div>
          <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" name="telefono">
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
      </div>
    </form>
  </div>
</div>



        <footer class="my-5 pt-5 text-body-secondary text-center text-small">
          <?php
          require_once __DIR__ . '/../checkout/CR.php';
          ?>
            
                <ul class="list-inline">
                </ul>
        </footer>
    </div>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="checkout.js"></script>
   <script>
let valorAnterior = null; // Guardará el valor previo del select

function mostrarModalSiOtro(valor) {
    const select = document.getElementById('id_usuario');
    if(valor === "_otro_") {
        // Guardar el valor actual antes de abrir modal
        valorAnterior = select.value;

        // Mostrar el modal
        var modal = new bootstrap.Modal(document.getElementById('modalOtro'));
        modal.show();

        // Escuchar cuando el modal se oculta
        var modalEl = document.getElementById('modalOtro');
        modalEl.addEventListener('hidden.bs.modal', function () {
            // Si no se agregó nueva usuaria, restaurar el valor anterior
            if (select.value === "_otro_") {
                select.value = valorAnterior;
            }
        }, { once: true }); // solo una vez
    }
}

// Enviar el formulario de nueva usuaria vía AJAX
document.getElementById('formNuevoParticipante').addEventListener('submit', function(e){
    e.preventDefault();
    var formData = new FormData(this);

    fetch('../checkout/registrar_participante.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if(data.success){
            // Agregar la nueva usuaria al select
            var select = document.getElementById('id_usuario');
            var option = document.createElement("option");
            option.value = data.id;
            option.text = data.nombreCompleto;
            option.selected = true;
            select.add(option);
// Mostrar alerta simple
            alert("¡Participante registrado correctamente!");

            // Cerrar modal
            var modalEl = document.getElementById('modalOtro');
            var modal = bootstrap.Modal.getInstance(modalEl);
            modal.hide();
        } else {
            alert("Error: " + data.message);
        }
    })
    .catch(error => {
        console.error("Error al registrar la usuaria:", error);
    });
});
</script>


</body>
        </html>




