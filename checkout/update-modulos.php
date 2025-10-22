<?php
require_once __DIR__ . '/../db/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $diplomado_id = $_POST['diplomado_id'];
    $nombres = $_POST['nombres_modulo'] ?? [];
    $descripciones = $_POST['descripciones_modulo'] ?? [];
    $modulo_ids = $_POST['modulo_id'] ?? [];

    // 🔹 Limpiar módulos eliminados
    $stmt = $conn->prepare("SELECT ID_Modulo FROM modulos WHERE DiplomadoID = ?");
    $stmt->execute([$diplomado_id]);
    $existentes = $stmt->fetchAll(PDO::FETCH_COLUMN);

    $idsRecibidos = array_filter($modulo_ids); // IDs que vienen desde el formulario
    $idsEliminar = array_diff($existentes, $idsRecibidos);

    if (!empty($idsEliminar)) {
        $in = str_repeat('?,', count($idsEliminar) - 1) . '?';
        $stmt = $conn->prepare("DELETE FROM modulos WHERE ID_Modulo IN ($in)");
        $stmt->execute(array_values($idsEliminar)); // 🔹 array_values asegura indices correctos
    }

    // 🔹 Actualizar o insertar módulos
    foreach ($nombres as $index => $nombre) {
        $nombre = trim($nombre);
        $descripcion = trim($descripciones[$index] ?? '');
        $modulo_id = $modulo_ids[$index] ?? null;

        if ($nombre === '') continue; // Evitar módulos vacíos

        if (!empty($modulo_id)) {
            // Actualizar módulo existente
            $stmt = $conn->prepare("UPDATE modulos SET NombreModulo = ?, Descripcion = ? WHERE ID_Modulo = ?");
            $stmt->execute([$nombre, $descripcion, $modulo_id]);
        } else {
            // Insertar nuevo módulo
            $stmt = $conn->prepare("INSERT INTO modulos (DiplomadoID, NombreModulo, Descripcion) VALUES (?, ?, ?)");
            $stmt->execute([$diplomado_id, $nombre, $descripcion]);
        }
    }

    // 🔹 Actualizar número de módulos en diplomados
    $stmt = $conn->prepare("SELECT COUNT(*) FROM modulos WHERE DiplomadoID = ?");
    $stmt->execute([$diplomado_id]);
    $numModulos = $stmt->fetchColumn();

    $stmt = $conn->prepare("UPDATE diplomados SET Num = ? WHERE ID_Diplomado = ?");
    $stmt->execute([$numModulos, $diplomado_id]);

    header("Location: ./../pages/ver-modulos.php?id={$diplomado_id}&statuss=updated");
    exit;
}else{

      header("Location: ./../pages/ver-modulos.php?id={$diplomado_id}&statuss=error");
    exit;
}
