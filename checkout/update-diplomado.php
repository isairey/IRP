<?php
session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['role_id']) || $_SESSION['role_id'] != 1) {
    header("Location: ../sign-in/index.php"); 
    exit();
}

require_once __DIR__ . '/../db/config.php';

$mensaje = "";
$tipoMensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id_diplomado"];
    $nombreDiplomado = $_POST["nombre_diplomado"];
    $descripcion = $_POST["descripcion"];
    $fechaInicio = $_POST["fecha_inicio"];
    $fechaFin = $_POST["fecha_fin"];
    $numSecciones = $_POST["num_secciones"];
    $idPonente = $_POST["id_ponente"] ?? null;

    try {
        $conn->beginTransaction();

        // 1) Actualizar diplomado
        $sql = "UPDATE diplomados 
                SET NombreDiplomado = ?, Descripcion = ?, Num = ?, FechaInicio = ?, FechaFin = ?
                WHERE ID_Diplomado = ?";
        $stmt = $conn->prepare($sql);
        $resultado = $stmt->execute([$nombreDiplomado, $descripcion, $numSecciones, $fechaInicio, $fechaFin, $id]);

        if ($resultado) {
            $mensaje = "Diplomado actualizado correctamente";
            $tipoMensaje = "success";
        } else {
            $mensaje = "Error al actualizar Diplomado";
            $tipoMensaje = "error";
        }

        // 2) Volver a generar secciones según fechas nuevas
        $inicio = new DateTime($fechaInicio);
        $fin = new DateTime($fechaFin);
        $diferencia = $inicio->diff($fin)->days;
        $intervalo = ($numSecciones > 1) ? floor($diferencia / ($numSecciones - 1)) : 0;

        for ($i = 0; $i < $numSecciones; $i++) {
            $fechaSeccion = clone $inicio;
            $fechaSeccion->modify("+" . ($i * $intervalo) . " days");
            if ($i === $numSecciones - 1) $fechaSeccion = $fin;

            $sqlSec = "INSERT INTO secciones (DiplomadoID, NumSeccion, Fecha) VALUES (?, ?, ?)";
            $stmtSec = $conn->prepare($sqlSec);
            $stmtSec->execute([$id, $i + 1, $fechaSeccion->format("Y-m-d")]);
        }

        // 3) Actualizar ponente asignado
        if ($idPonente) {
            $sqlCheck = "SELECT COUNT(*) FROM asignacionesdiplomado WHERE ID_Diplomado = ?";
            $stmtCheck = $conn->prepare($sqlCheck);
            $stmtCheck->execute([$id]);
            $existe = $stmtCheck->fetchColumn();

            if ($existe) {
                $sqlUpdatePonente = "UPDATE asignacionesdiplomado 
                                     SET ID_Ponente = ? 
                                     WHERE ID_Diplomado = ?";
                $stmtUpdate = $conn->prepare($sqlUpdatePonente);
                $stmtUpdate->execute([$idPonente, $id]);
            } else {
                $sqlInsertPonente = "INSERT INTO asignacionesdiplomado (ID_Diplomado, ID_Ponente) 
                                     VALUES (?, ?)";
                $stmtInsert = $conn->prepare($sqlInsertPonente);
                $stmtInsert->execute([$id, $idPonente]);
            }
        }

        $conn->commit();

    } catch (PDOException $e) {
        $conn->rollBack();
        $mensaje = "Error: " . $e->getMessage();
        $tipoMensaje = "error";
    }
}
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if (!empty($mensaje)): ?>
<script>
Swal.fire({
    icon: "<?= $tipoMensaje ?>",
    title: "<?= $mensaje ?>",
    showConfirmButton: false,
    timer: 3000
}).then(() => {
    window.location.href = "../pages/ver-donaciones.php";
});
</script>
<?php endif; ?>
