<?php
require_once __DIR__ . '/../db/config.php';

$idDiplomado = $_POST['id_diplomado'];
$idModulo = $_POST['id_modulo'];
$nombres = $_POST['titulo_seccion'];
$descripciones = $_POST['descripcion_seccion'];
$fechas = $_POST['fecha_seccion']; // ✅ Nueva variable para las fechas
$idSecciones = $_POST['id_seccion'];

// Actualizar módulo
$stmt = $conn->prepare("UPDATE modulos SET NombreModulo = ?, Descripcion = ? WHERE ID_Modulo = ?");
$stmt->execute([$_POST['nombre_modulo'], $_POST['descripcion_modulo'], $idModulo]);

// Reasignar numSeccion automáticamente
$num = 1;
foreach ($nombres as $i => $nombre) {
    $descripcion = $descripciones[$i];
    $fecha = !empty($fechas[$i]) ? $fechas[$i] : date('Y-m-d'); // ✅ Usa la fecha enviada o la actual si no hay

    if (empty($idSecciones[$i])) {
        // 🆕 Nueva sección
        $stmt = $conn->prepare("
            INSERT INTO secciones (DiplomadoID, ModuloID, NumSeccion, NombreSeccion, Descripcion, fecha) 
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([$idDiplomado, $idModulo, $num, $nombre, $descripcion, $fecha]);
    } else {
        // 🔁 Actualizar existente
        $stmt = $conn->prepare("
            UPDATE secciones 
            SET NumSeccion = ?, NombreSeccion = ?, Descripcion = ?, fecha = ? 
            WHERE ID = ?
        ");
        $stmt->execute([$num, $nombre, $descripcion, $fecha, $idSecciones[$i]]);
    }
    $num++;
}

header("Location: ../pages/ver-seciones.php?msg=ok");
exit;
?>
