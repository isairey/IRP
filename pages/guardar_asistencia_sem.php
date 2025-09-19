<?php
require_once __DIR__ . '/../db/config.php';

// Solo aceptar POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo "Método no permitido";
    exit;
}

// Validar datos
$idPersona = isset($_POST['id_persona']) ? (int) $_POST['id_persona'] : 0;
$idSeminario = isset($_POST['id_seminario']) ? (int) $_POST['id_seminario'] : 0;
$presente = isset($_POST['presente']) ? (int) $_POST['presente'] : 0;

if (!$idPersona || !$idSeminario) {
    http_response_code(400);
    echo "Datos incompletos";
    exit;
}

try {
    // Verificar si ya existe registro de asistencia
    $stmtCheck = $conn->prepare("
        SELECT * 
        FROM asistencias_seminario 
        WHERE ID_Persona = :idPersona AND ID_Seminario = :idSeminario
    ");
    $stmtCheck->execute([
        ':idPersona' => $idPersona,
        ':idSeminario' => $idSeminario
    ]);
    $existe = $stmtCheck->fetch(PDO::FETCH_ASSOC);

    if ($existe) {
        // Actualizar registro
        $stmtUpd = $conn->prepare("
            UPDATE asistencias_seminario
            SET presente = :presente
            WHERE ID_Persona = :idPersona AND ID_Seminario = :idSeminario
        ");
        $stmtUpd->execute([
            ':presente' => $presente,
            ':idPersona' => $idPersona,
            ':idSeminario' => $idSeminario
        ]);
        echo "Asistencia actualizada";
    } else {
        // Insertar nuevo registro
        $stmtIns = $conn->prepare("
            INSERT INTO asistencias_seminario (ID_Persona, ID_Seminario, presente)
            VALUES (:idPersona, :idSeminario, :presente)
        ");
        $stmtIns->execute([
            ':idPersona' => $idPersona,
            ':idSeminario' => $idSeminario,
            ':presente' => $presente
        ]);
        echo "Asistencia registrada";
    }
} catch (PDOException $e) {
    http_response_code(500);
    echo "Error en la base de datos: " . $e->getMessage();
}
