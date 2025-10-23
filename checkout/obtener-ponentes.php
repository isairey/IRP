<?php
require_once __DIR__ . '/../db/config.php';
$conn->exec("SET NAMES utf8");

$id_diplomado = $_GET['id_diplomado'] ?? null;

if (!$id_diplomado) {
    echo json_encode([]);
    exit;
}

try {
    $sql = "
    SELECT DISTINCT p.ID_Ponente, CONCAT(p.Nombre, ' ', p.ApellidoPaterno, ' ', p.ApellidoMaterno) AS NombrePonente
FROM ponentes p
INNER JOIN seccion_ponentes sp ON p.ID_Ponente = sp.ID_Ponente
INNER JOIN secciones s ON sp.ID_Seccion = s.ID
INNER JOIN modulos m ON s.ModuloID = m.ID_Modulo
WHERE m.DiplomadoID = :id_diplomado
ORDER BY p.Nombre ASC

";


    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_diplomado', $id_diplomado);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);

} catch (PDOException $e) {
    echo json_encode([]);
}
?>
