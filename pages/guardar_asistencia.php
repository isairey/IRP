<?php
require_once __DIR__ . '/../db/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idUsuario = $_POST['id_usu'] ?? null;
    $idSeccion = $_POST['id_seccion'] ?? null;
    $idDiplomado = $_POST['id_diplomado'] ?? null;
    $presente = $_POST['presente'] ?? 0;

    if (!$idUsuario || !$idSeccion || !$idDiplomado) {
        die("Faltan datos necesarios");
    }

    // Insertar o actualizar según si ya existe
    $stmt = $conn->prepare("
        INSERT INTO asistencias (id_usu, id_seccion, ID_Diplomado, presente)
        VALUES (:idUsuario, :idSeccion, :idDiplomado, :presente)
        ON DUPLICATE KEY UPDATE presente = :presente
    ");
    $stmt->bindValue(':idUsuario', $idUsuario, PDO::PARAM_INT);
    $stmt->bindValue(':idSeccion', $idSeccion, PDO::PARAM_INT);
    $stmt->bindValue(':idDiplomado', $idDiplomado, PDO::PARAM_INT);
    $stmt->bindValue(':presente', $presente, PDO::PARAM_INT);

    try {
        $stmt->execute();
        echo "Asistencia guardada correctamente";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
