<?php
require_once __DIR__ . '/../TCPDF/tcpdf.php';
require_once __DIR__ . '/../db/config.php';

// --------------------------------------------------
// 1️⃣ Conexión UTF-8
// --------------------------------------------------
$conn->exec("SET NAMES 'utf8'");

// --------------------------------------------------
// 2️⃣ Validar parámetro
// --------------------------------------------------
if (!isset($_GET['id_diplomado'])) die('Falta el ID del diplomado.');
$idDiplomado = $_GET['id_diplomado'];

// --------------------------------------------------
// 3️⃣ Datos del diplomado
// --------------------------------------------------
// --------------------------------------------------
// 3️⃣ Datos del diplomado (ahora con descripción)
// --------------------------------------------------
$sqlDip = $conn->prepare("SELECT NombreDiplomado, Descripcion FROM diplomados WHERE ID_Diplomado = :id");
$sqlDip->execute([':id'=>$idDiplomado]);
$diplomado = $sqlDip->fetch(PDO::FETCH_ASSOC);
$nombreDiplomado = $diplomado ? $diplomado['NombreDiplomado'] : 'Diplomado desconocido';
$descDiplomado = $diplomado ? $diplomado['Descripcion'] : '';


// --------------------------------------------------
// 4️⃣ Módulos, secciones, ponentes y actividades
// --------------------------------------------------
$sql = $conn->prepare("
    SELECT m.ID_Modulo, m.NombreModulo, m.Descripcion AS ModuloDesc,
           s.ID AS ID_Seccion, s.NumSeccion, s.NombreSeccion, s.Descripcion AS SeccionDesc, s.Fecha,
           p.ID_Ponente, p.Nombre AS NombrePonente,
           a.ID AS ID_Actividad, a.Actividad, a.Materiales, a.HorarioInicio, a.HorarioFin
    FROM modulos m
    LEFT JOIN secciones s ON s.ModuloID = m.ID_Modulo
    LEFT JOIN seccion_ponentes ps ON ps.ID_seccion = s.ID
    LEFT JOIN ponentes p ON p.ID_Ponente = ps.ID_ponente
    LEFT JOIN ponente_actividad a ON a.ID_ponente = p.ID_Ponente AND a.ID_seccion = s.ID
    WHERE m.DiplomadoID = :id
    ORDER BY m.ID_Modulo, s.NumSeccion, p.ID_Ponente, a.ID
");
$sql->execute([':id'=>$idDiplomado]);
$dataRaw = $sql->fetchAll(PDO::FETCH_ASSOC);

// --------------------------------------------------
// 5️⃣ Estructura jerárquica
// --------------------------------------------------
$modulos = [];
foreach ($dataRaw as $r){
    $modID = $r['ID_Modulo']; 
    $secID = $r['ID_Seccion']; 
    $ponID = $r['ID_Ponente'];
    
    if(!isset($modulos[$modID])) 
        $modulos[$modID] = [
            'NombreModulo' => $r['NombreModulo'],
            'ModuloDesc' => $r['ModuloDesc'],
            'Secciones' => []
        ];
    
    if($secID && !isset($modulos[$modID]['Secciones'][$secID]))
        $modulos[$modID]['Secciones'][$secID] = [
            'NumSeccion' => $r['NumSeccion'],
            'NombreSeccion' => $r['NombreSeccion'],
            'SeccionDesc' => $r['SeccionDesc'],
            'Fecha' => $r['Fecha'],
            'Ponentes' => []
        ];
    
    if($ponID && !isset($modulos[$modID]['Secciones'][$secID]['Ponentes'][$ponID]))
        $modulos[$modID]['Secciones'][$secID]['Ponentes'][$ponID] = [
            'NombrePonente' => $r['NombrePonente'],
            'Actividades' => []
        ];
    
    if(!empty($r['Actividad']) || !empty($r['Materiales']) || !empty($r['HorarioInicio']) || !empty($r['HorarioFin'])){
        $modulos[$modID]['Secciones'][$secID]['Ponentes'][$ponID]['Actividades'][] = [
            'Actividad' => $r['Actividad'],
            'Materiales' => $r['Materiales'],
            'HorarioInicio' => $r['HorarioInicio'],
            'HorarioFin' => $r['HorarioFin']
        ];
    }
}

// --------------------------------------------------
// 6️⃣ Obtener asistentes que asistieron a TODAS las secciones del diplomado
// --------------------------------------------------

// 6.1 Contar cuántas secciones tiene el diplomado
$sqlTotalSecciones = $conn->prepare("
    SELECT COUNT(*) AS total 
    FROM secciones s
    INNER JOIN modulos m ON s.ModuloID = m.ID_Modulo
    WHERE m.DiplomadoID = :id
");
$sqlTotalSecciones->execute([':id' => $idDiplomado]);
$totalSecciones = (int)$sqlTotalSecciones->fetchColumn();

// 6.2 Obtener usuarios que asistieron a TODAS las secciones del diplomado
$sqlAsistencias = $conn->prepare("
    SELECT 
        a.id_usu,
        a.TipoUsuario,
        SUM(a.estado = 'asistio') AS total_asistencias
    FROM asistencias a
    WHERE a.ID_Diplomado = :id
    GROUP BY a.id_usu, a.TipoUsuario
    HAVING total_asistencias = :totalSecciones
");
$sqlAsistencias->execute([
    ':id' => $idDiplomado,
    ':totalSecciones' => $totalSecciones
]);

$registros = $sqlAsistencias->fetchAll(PDO::FETCH_ASSOC);

// 6.3 Obtener nombres y correos de los asistentes que completaron todas las secciones
$asistentes = [];
foreach ($registros as $r) {
    $nombre = 'Desconocido';
    $email  = '';

    switch ($r['TipoUsuario']) {
        case 'usuario':
            $q = $conn->prepare("SELECT Nombre, Email FROM usuario WHERE ID = ?");
            break;
        case 'personal':
            $q = $conn->prepare("SELECT Nombre, Email FROM personal WHERE ID_Personal = ?");
            break;
        case 'participante':
            $q = $conn->prepare("SELECT Nombre, Email FROM participante WHERE ID_Participante = ?");
            break;
        default:
            $q = null;
    }

    if ($q) {
        $q->execute([$r['id_usu']]);
        $info = $q->fetch(PDO::FETCH_ASSOC);
        if ($info) {
            $nombre = $info['Nombre'];
            $email  = $info['Email'];
        }
    }

    $asistentes[] = [
        'Nombre' => $nombre,
        'Email' => $email,
        'Tipo' => ucfirst($r['TipoUsuario']),
        'TotalAsistencias' => $r['total_asistencias']
    ];
}

// --------------------------------------------------
// 7️⃣ Crear PDF
// --------------------------------------------------
$pdf = new TCPDF('L','mm','LETTER',true,'UTF-8',false);
$pdf->SetCreator('ERP_IRP');
$pdf->SetAuthor('Sistema');
$pdf->SetTitle('Diplomado Actividades');
$pdf->SetMargins(15,20,15);
$pdf->SetAutoPageBreak(true,15);
$pdf->AddPage();

// Encabezado
$logo1 = __DIR__ . '/../assets/img/logo 1.png';
$logo2 = __DIR__ . '/../assets/img/IMG_0033.JPG';
if(file_exists($logo1)) $pdf->Image($logo1,15,10,25);
if(file_exists($logo2)) $pdf->Image($logo2,$pdf->getPageWidth()-40,10,25);

// Título
$pdf->SetFont('helvetica','B',16);
$pdf->Cell(0,10,$nombreDiplomado,0,1,'C');
$pdf->SetFont('helvetica','',12);
$pdf->Cell(0,8,'Listado de módulos, secciones, ponentes y actividades',0,1,'C');
$pdf->Ln(6);

if($descDiplomado){
    $pdf->SetFont('helvetica','',12);
    $pdf->SetFillColor(245,245,245);
    $pdf->MultiCell(0,8,utf8_decode($descDiplomado),1,'L',true,1);
    $pdf->Ln(4);
}
// Colores tablas
$fillHeader=[200,200,200];
$fillRow=[245,245,245];

// Imprimir módulos y secciones
$modCounter = 1;
foreach($modulos as $mod){
    $pdf->SetFont('helvetica','B',14);
    $pdf->Cell(0,8,"Módulo $modCounter: ".$mod['NombreModulo'],0,1,'L');
    $pdf->SetFont('helvetica','I',11);
    $pdf->MultiCell(0,6,"Descripción: ".$mod['ModuloDesc'],0,'L');
    $pdf->Ln(4);

    foreach($mod['Secciones'] as $sec){
        $pdf->SetFont('helvetica','B',11);
        $pdf->Cell(0,8,"Sección ".$sec['NumSeccion'].": ".$sec['NombreSeccion']." (Fecha: ".$sec['Fecha'].")",0,1,'L');
        $pdf->SetFont('helvetica','',10);
        $pdf->MultiCell(0,6,"Descripción: ".$sec['SeccionDesc'],0,'L'); 
        $pdf->Ln(1);

        // Tabla actividades
        $headers=['Ponente','Actividad','Materiales','Horario Inicio','Horario Fin'];
        $w=[80,60,50,30,30];
        $pdf->SetFillColor(...$fillHeader); 
        $pdf->SetFont('helvetica','B',10);
        foreach($headers as $i=>$head) $pdf->Cell($w[$i],7,$head,1,0,'C',true);
        $pdf->Ln(); $pdf->SetFont('helvetica','',9); $fill=false;

        if(empty($sec['Ponentes'])){
            $pdf->Cell(array_sum($w),7,'Sin ponentes ni actividades',1,1,'C');
        } else {
            foreach($sec['Ponentes'] as $pon){
                $nombrePon = $pon['NombrePonente'] ?: 'Sin ponente';
                $actividades = $pon['Actividades'];
                if(count($actividades)>0){
                    foreach($actividades as $act){
                        $pdf->SetFillColor(...$fillRow);
                        $pdf->Cell($w[0],6,$nombrePon,1,0,'L',$fill);
                        $pdf->Cell($w[1],6,$act['Actividad'],1,0,'L',$fill);
                        $pdf->Cell($w[2],6,$act['Materiales'],1,0,'L',$fill);
                        $pdf->Cell($w[3],6,$act['HorarioInicio'],1,0,'C',$fill);
                        $pdf->Cell($w[4],6,$act['HorarioFin'],1,1,'C',$fill);
                        $fill = !$fill;
                    }
                } else {
                    $pdf->SetFillColor(...$fillRow);
                    $pdf->Cell($w[0],6,$nombrePon,1,0,'L',$fill);
                    $pdf->Cell(array_sum(array_slice($w,1)),6,'Sin actividades',1,1,'C',$fill);
                }
            }
        }
        $pdf->Ln(2);
    }
    $modCounter++; $pdf->Ln(3);
}

// --------------------------------------------------
// Tabla de asistentes
// --------------------------------------------------
$pdf->AddPage();
$pdf->SetFont('helvetica','B',14);
$pdf->Cell(0,10,'Asistentes registrados en el diplomado',0,1,'C'); $pdf->Ln(3);

$headers=['#','Nombre','Email','Tipo']; 
$w=[15,80,76,70];
$pdf->SetFillColor(...$fillHeader); 
$pdf->SetFont('helvetica','B',10);
foreach($headers as $i=>$head) $pdf->Cell($w[$i],7,$head,1,0,'C',true);
$pdf->Ln(); $pdf->SetFont('helvetica','',9); $fill=false; $contador=1;

if(count($asistentes)>0){
    foreach($asistentes as $a){
        $pdf->SetFillColor(...$fillRow);
        $pdf->Cell($w[0],6,$contador++,1,0,'C',$fill);
        $pdf->Cell($w[1],6,$a['Nombre'],1,0,'L',$fill);
        $pdf->Cell($w[2],6,$a['Email'],1,0,'L',$fill);
        $pdf->Cell($w[3],6,$a['Tipo'],1,0,'C',$fill);
       
        $fill = !$fill;
    }
} else {
    $pdf->Cell(array_sum($w),6,'No hay asistentes registrados',1,1,'C');
}

$pdf->Output('diplomado_actividades.pdf','I');
?>
