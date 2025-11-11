<?php
require_once __DIR__ . '/../db/config.php';

// Solo aceptar POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo "Método no permitido";
    exit;
}

// Validar datos
$idPersona   = isset($_POST['id_persona']) ? (int) $_POST['id_persona'] : 0;
$idSeminario = isset($_POST['id_seminario']) ? (int) $_POST['id_seminario'] : 0;
$asistio     = isset($_POST['Asistio']) ? (int) $_POST['Asistio'] : 0;

if (!$idPersona || !$idSeminario) {
    http_response_code(400);
    echo "Datos incompletos";
    exit;
}

try {
    // 1) Intentar obtener el tipo desde la asignación (la fuente de la verdad)
    $stmtTipo = $conn->prepare("
        SELECT Tipo
        FROM asignaciones_seminario
        WHERE ID_Persona = :idPersona AND ID_Seminario = :idSeminario
        ORDER BY FechaAsignacion DESC
        LIMIT 1
    ");
    $stmtTipo->execute([
        ':idPersona'   => $idPersona,
        ':idSeminario' => $idSeminario
    ]);
    $tipoRow = $stmtTipo->fetch(PDO::FETCH_ASSOC);
    $tipoPersona = $tipoRow ? $tipoRow['Tipo'] : null;

    // 2) Si no hay asignación encontrada, intentar detectar en tablas fuente
    if (!$tipoPersona) {
        // Buscar en Participante
        $s = $conn->prepare("SELECT 1 FROM Participante WHERE ID_Participante = :id LIMIT 1");
        $s->execute([':id' => $idPersona]);
        if ($s->fetchColumn()) {
            $tipoPersona = 'participante';
        } else {
            // Buscar en Usuario
            $s = $conn->prepare("SELECT 1 FROM Usuario WHERE id = :id LIMIT 1");
            $s->execute([':id' => $idPersona]);
            if ($s->fetchColumn()) {
                $tipoPersona = 'usuario';
            } else {
                // Buscar en Personal
                $s = $conn->prepare("SELECT 1 FROM Personal WHERE ID_Personal = :id LIMIT 1");
                $s->execute([':id' => $idPersona]);
                if ($s->fetchColumn()) {
                    $tipoPersona = 'personal';
                } else {
                    $tipoPersona = 'desconocido';
                }
            }
        }
    }

    // 3) Verificar si ya existe registro de asistencia
    $stmtCheck = $conn->prepare("
        SELECT ID_Asistencia
        FROM asistencias_seminario
        WHERE ID_Persona = :idPersona AND ID_Seminario = :idSeminario
        LIMIT 1
    ");
    $stmtCheck->execute([
        ':idPersona'   => $idPersona,
        ':idSeminario' => $idSeminario
    ]);
    $existe = $stmtCheck->fetch(PDO::FETCH_ASSOC);

    if ($existe) {
        // Actualizar registro existente
        $stmtUpd = $conn->prepare("
            UPDATE asistencias_seminario
            SET Asistio = :asistio, TipoPersona = :tipoPersona, FechaRegistro = NOW()
            WHERE ID_Asistencia = :idAsis
        ");
        $stmtUpd->execute([
            ':asistio'     => $asistio,
            ':tipoPersona' => $tipoPersona,
            ':idAsis'      => $existe['ID_Asistencia']
        ]);
        echo "Asistencia actualizada";
    } else {
        // Insertar nuevo registro
        $stmtIns = $conn->prepare("
            INSERT INTO asistencias_seminario (ID_Seminario, ID_Persona, TipoPersona, Asistio, FechaRegistro)
            VALUES (:idSeminario, :idPersona, :tipoPersona, :asistio, NOW())
        ");
        $stmtIns->execute([
            ':idSeminario' => $idSeminario,
            ':idPersona'   => $idPersona,
            ':tipoPersona' => $tipoPersona,
            ':asistio'     => $asistio
        ]);
        echo "Asistencia registrada";
    }
} catch (PDOException $e) {
    http_response_code(500);
    echo "Error en la base de datos: " . $e->getMessage();
}
