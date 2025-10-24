<?php
require_once __DIR__ . '/../pages/seccion.php';
require_once __DIR__ . '/../db/config.php';

// Solo aceptar POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo "Método no permitido";
    exit;
}

// Validar datos
$idUsuario   = isset($_POST['id_usu']) ? (int) $_POST['id_usu'] : 0;
$idSeccion   = isset($_POST['id_seccion']) ? (int) $_POST['id_seccion'] : 0;
$idDiplomado = isset($_POST['id_diplomado']) ? (int) $_POST['id_diplomado'] : 0;
$estado      = isset($_POST['estado']) ? $_POST['estado'] : '';

if (!$idUsuario || !$idSeccion || !$idDiplomado || !in_array($estado, ['asistio','falta','permiso'])) {
    http_response_code(400);
    echo "Datos incompletos o inválidos";
    exit;
}

try {
    // 1️⃣ Buscar el tipo de usuario desde asignacionesdiplomado
    $stmtTipo = $conn->prepare("
        SELECT TipoUsuario
        FROM asignacionesdiplomado
        WHERE ID_Usuario = :idUsuario AND ID_Diplomado = :idDiplomado
        ORDER BY FechaAsignacion DESC
        LIMIT 1
    ");
    $stmtTipo->execute([
        ':idUsuario'   => $idUsuario,
        ':idDiplomado' => $idDiplomado
    ]);
    $row = $stmtTipo->fetch(PDO::FETCH_ASSOC);
    $tipoUsuario = $row ? $row['TipoUsuario'] : 'desconocido';

    // 2️⃣ Verificar si ya existe la asistencia
    $stmtCheck = $conn->prepare("
        SELECT ID
        FROM asistencias
        WHERE id_usu = :idUsuario AND ID_Seccion = :idSeccion AND ID_Diplomado = :idDiplomado
        LIMIT 1
    ");
    $stmtCheck->execute([
        ':idUsuario'   => $idUsuario,
        ':idSeccion'   => $idSeccion,
        ':idDiplomado' => $idDiplomado
    ]);
    $existe = $stmtCheck->fetch(PDO::FETCH_ASSOC);

    if ($existe) {
        // 3️⃣ Actualizar si ya existe
        $stmtUpd = $conn->prepare("
            UPDATE asistencias
            SET estado = :estado, TipoUsuario = :tipoUsuario
            WHERE ID = :idAsistencia
        ");
        $stmtUpd->execute([
            ':estado'       => $estado,
            ':tipoUsuario'  => $tipoUsuario,
            ':idAsistencia' => $existe['ID']
        ]);
        echo "Asistencia actualizada";
    } else {
        // 4️⃣ Insertar si no existe
        $stmtIns = $conn->prepare("
            INSERT INTO asistencias (ID_Diplomado, id_usu, ID_Seccion, estado, TipoUsuario)
            VALUES (:idDiplomado, :idUsuario, :idSeccion, :estado, :tipoUsuario)
        ");
        $stmtIns->execute([
            ':idDiplomado' => $idDiplomado,
            ':idUsuario'   => $idUsuario,
            ':idSeccion'   => $idSeccion,
            ':estado'      => $estado,
            ':tipoUsuario' => $tipoUsuario
        ]);
        echo "Asistencia registrada";
    }

} catch (PDOException $e) {
    http_response_code(500);
    echo "Error en la base de datos: " . $e->getMessage();
}
