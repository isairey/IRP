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
$idTaller  = isset($_POST['id_taller']) ? (int) $_POST['id_taller'] : 0;
$asistio   = isset($_POST['Asistio']) ? (int) $_POST['Asistio'] : 0;

if (!$idPersona || !$idTaller) {
    http_response_code(400);
    echo "Datos incompletos";
    exit;
}

try {
    // 1) Intentar obtener el tipo desde la asignación
    $stmtTipo = $conn->prepare("
        SELECT TipoPersona
        FROM asistentes_taller
        WHERE ID_Persona = :idPersona AND ID_Taller = :idTaller
        ORDER BY FechaRegistro DESC
        LIMIT 1
    ");
    $stmtTipo->execute([
        ':idPersona' => $idPersona,
        ':idTaller'  => $idTaller
    ]);
    $tipoRow = $stmtTipo->fetch(PDO::FETCH_ASSOC);
    $tipoPersona = $tipoRow ? $tipoRow['TipoPersona'] : null;

    // 2) Si no hay asignación encontrada, buscar en tablas fuente
    if (!$tipoPersona) {
        // Participante
        $s = $conn->prepare("SELECT 1 FROM Participante WHERE ID_Participante = :id LIMIT 1");
        $s->execute([':id' => $idPersona]);
        if ($s->fetchColumn()) {
            $tipoPersona = 'participante';
        } else {
            // Usuario
            $s = $conn->prepare("SELECT 1 FROM Usuario WHERE id = :id LIMIT 1");
            $s->execute([':id' => $idPersona]);
            if ($s->fetchColumn()) {
                $tipoPersona = 'usuario';
            } else {
                // Personal
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
        FROM asistencias_taller
        WHERE ID_Persona = :idPersona AND ID_Taller = :idTaller
        LIMIT 1
    ");
    $stmtCheck->execute([
        ':idPersona' => $idPersona,
        ':idTaller'  => $idTaller
    ]);
    $existe = $stmtCheck->fetch(PDO::FETCH_ASSOC);

    if ($existe) {
        // Actualizar registro existente
        $stmtUpd = $conn->prepare("
            UPDATE asistencias_taller
            SET Asistio = :asistio, Tipo = :tipoPersona, FechaRegistro = NOW()
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
            INSERT INTO asistencias_taller (ID_Taller, ID_Persona, Tipo, Asistio, FechaRegistro)
            VALUES (:idTaller, :idPersona, :tipoPersona, :asistio, NOW())
        ");
        $stmtIns->execute([
            ':idTaller'    => $idTaller,
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
