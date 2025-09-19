<?php
session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['role_id']) || $_SESSION['role_id'] != 1) {
    header("Location: ../sign-in/index.php"); 
    exit();
}

require_once __DIR__ . '/../db/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id_diplomado"];
    $nombreDiplomado = $_POST["nombre_diplomado"];
    $descripcion = $_POST["descripcion"];
    $fechaInicio = $_POST["fecha_inicio"];
    $fechaFin = $_POST["fecha_fin"];
    $numSecciones = $_POST["num_secciones"];

    try {
        $conn->beginTransaction();

        // 1) Actualizar diplomado
        $sql = "UPDATE diplomados 
                SET NombreDiplomado = ?, Descripcion = ?, Num = ?, FechaInicio = ?, FechaFin = ?
                WHERE ID_Diplomado = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nombreDiplomado, $descripcion, $numSecciones, $fechaInicio, $fechaFin, $id]);

        // 2) Eliminar secciones anteriores
        $sqlDel = "DELETE FROM secciones WHERE DiplomadoID = ?";
        $stmtDel = $conn->prepare($sqlDel);
        $stmtDel->execute([$id]);

        // 3) Volver a generar secciones según fechas nuevas
        $inicio = new DateTime($fechaInicio);
        $fin = new DateTime($fechaFin);
        $diferencia = $inicio->diff($fin)->days;
        $intervalo = ($numSecciones > 1) ? floor($diferencia / ($numSecciones - 1)) : 0;

        for ($i = 0; $i < $numSecciones; $i++) {
            $fechaSeccion = clone $inicio;
            $fechaSeccion->modify("+" . ($i * $intervalo) . " days");
            if ($i === $numSecciones - 1) $fechaSeccion = $fin; // última sección = fecha fin

            $sqlSec = "INSERT INTO secciones (DiplomadoID, NumSeccion, Fecha) VALUES (?, ?, ?)";
            $stmtSec = $conn->prepare($sqlSec);
            $stmtSec->execute([$id, $i + 1, $fechaSeccion->format("Y-m-d")]);
        }

        $conn->commit();

        echo '<script>alert("✅ Diplomado y secciones actualizados correctamente.");</script>';
        echo '<script>window.location.href = "/ERP/ERP_IRP/pages/home.php";</script>';

    } catch (PDOException $e) {
        $conn->rollBack();
        echo '<script>alert("Error: ' . $e->getMessage() . '");</script>';
    }
}
?>
