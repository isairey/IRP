<?php
require_once __DIR__ . '/../db/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $diplomadoID = $_POST["diplomado_id"];
    $nombres = $_POST["nombres_modulo"] ?? [];
    $descripciones = $_POST["descripciones_modulo"] ?? [];

    try {
        $conn->beginTransaction();

        $sql = "INSERT INTO modulos (DiplomadoID, NombreModulo, Descripcion) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);

        for ($i = 0; $i < count($nombres); $i++) {
            $stmt->execute([$diplomadoID, $nombres[$i], $descripciones[$i]]);
        }

        $conn->commit();
        header("Location: ../pages/ver-modulos.php?status=success");
        exit();
    } catch (Exception $e) {
        $conn->rollBack();
        header("Location: ../pages/ver-modulos.php?status=error&msg=" . urlencode($e->getMessage()));
        exit();
    }
}
?>
