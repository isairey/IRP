<?php
require_once __DIR__ . '/../db/config.php';
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id_seccion = $_POST['id_seccion'];
$ponentes = $_POST['id_ponente'];
$actividades = $_POST['actividad'];
$horarios = $_POST['horario'];
$materiales = $_POST['materiales'];

for($i=0; $i<count($ponentes); $i++){
    // Si ya existe, actualizar
    $stmt = $conn->prepare("SELECT COUNT(*) FROM ponente_actividad WHERE ID_Seccion=? AND ID_Ponente=?");
    $stmt->execute([$id_seccion, $ponentes[$i]]);
    if($stmt->fetchColumn() > 0){
        $upd = $conn->prepare("UPDATE ponente_actividad SET Actividad=?, Horario=?, Materiales=? WHERE ID_Seccion=? AND ID_Ponente=?");
        $upd->execute([$actividades[$i], $horarios[$i], $materiales[$i], $id_seccion, $ponentes[$i]]);
    } else {
        $ins = $conn->prepare("INSERT INTO ponente_actividad (ID_Seccion, ID_Ponente, Actividad, Horario, Materiales) VALUES (?,?,?,?,?)");
        $ins->execute([$id_seccion, $ponentes[$i], $actividades[$i], $horarios[$i], $materiales[$i]]);
    }
}

header("Location: ver-seccion.php?status=success");
exit;
