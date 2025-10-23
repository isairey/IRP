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
// 6️⃣ Obtener asistentes
// --------------------------------------------------
$sqlAsistentes = $conn->prepare("
    SELECT ad.ID_Usuario, ad.TipoUsuario, ad.FechaAsignacion
    FROM asignacionesdiplomado ad
    WHERE ad.ID_Diplomado = :id
");
$sqlAsistentes->execute([':id'=>$idDiplomado]);
$registros = $sqlAsistentes->fetchAll(PDO::FETCH_ASSOC);
$asistentes = [];
foreach($registros as $r){
    $nombre='Desconocido'; $email='';
    switch($r['TipoUsuario']){
        case 'usuario': $q=$conn->prepare("SELECT Nombre, Email FROM usuario WHERE ID=?"); break;
        case 'personal': $q=$conn->prepare("SELECT Nombre, Email FROM personal WHERE ID_Personal=?"); break;
        case 'participante': $q=$conn->prepare("SELECT Nombre, Email FROM participante WHERE ID_Participante=?"); break;
        default: $q=null;
    }
    if($q){ 
        $q->execute([$r['ID_Usuario']]); 
        $info=$q->fetch(PDO::FETCH_ASSOC); 
        if($info){ $nombre=$info['Nombre']; $email=$info['Email']; } 
    }
    $asistentes[]=['Nombre'=>$nombre,'Email'=>$email,'Tipo'=>$r['TipoUsuario'],'Fecha'=>$r['FechaAsignacion']];
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

$headers=['#','Nombre','Email','Tipo','Fecha']; 
$w=[15,80,76,50,30];
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
        $pdf->Cell($w[4],6,$a['Fecha'],1,1,'C',$fill);
        $fill = !$fill;
    }
} else {
    $pdf->Cell(array_sum($w),6,'No hay asistentes registrados',1,1,'C');
}

$pdf->Output('diplomado_actividades.pdf','I');
?>






<?php
/*

<?php
require_once __DIR__ . '/../TCPDF/tcpdf.php';
require_once __DIR__ . '/../db/config.php';

// --------------------------------------------------
// 1️⃣ Validar parámetro
// --------------------------------------------------
if (!isset($_GET['id_diplomado'])) {
    die('Falta el ID del diplomado.');
}

$idDiplomado = $_GET['id_diplomado'];

// --------------------------------------------------
// 2️⃣ Obtener datos del diplomado
// --------------------------------------------------
$sqlDip = $conn->prepare("SELECT NombreDiplomado FROM diplomados WHERE ID_Diplomado = :id");
$sqlDip->execute([':id' => $idDiplomado]);
$diplomado = $sqlDip->fetch(PDO::FETCH_ASSOC);
$nombreDiplomado = $diplomado ? $diplomado['NombreDiplomado'] : 'Diplomado desconocido';

// --------------------------------------------------
// 3️⃣ Obtener módulos, secciones, ponentes y actividades
// --------------------------------------------------
$sql = $conn->prepare("
    SELECT 
        m.ID_Modulo,
        m.NombreModulo,
        m.Descripcion AS ModuloDesc,
        s.ID AS ID_Seccion,
        s.NumSeccion,
        s.NombreSeccion,
        s.Descripcion AS SeccionDesc,
        s.Fecha,
        p.ID_Ponente,
        p.Nombre AS NombrePonente,
        a.ID AS ID_Actividad,
        a.Actividad,
        a.Materiales,
        a.HorarioInicio,
        a.HorarioFin
    FROM modulos m
    LEFT JOIN secciones s ON s.ModuloID = m.ID_Modulo
    LEFT JOIN seccion_ponentes ps ON ps.ID_seccion = s.ID
    LEFT JOIN ponentes p ON p.ID_Ponente = ps.ID_ponente
    LEFT JOIN ponente_actividad a ON a.ID_ponente = p.ID_Ponente AND a.ID_seccion = s.ID
    WHERE m.DiplomadoID = :id
    ORDER BY m.ID_Modulo, s.NumSeccion, p.ID_Ponente, a.ID
");

$sql->execute([':id' => $idDiplomado]);
$dataRaw = $sql->fetchAll(PDO::FETCH_ASSOC);

// --------------------------------------------------
// 4️⃣ Estructurar jerárquicamente (módulo → sección → ponente → actividades)
// --------------------------------------------------
$modulos = [];
foreach ($dataRaw as $r) {
    $modID = $r['ID_Modulo'];
    $secID = $r['ID_Seccion'];
    $ponID = $r['ID_Ponente'];

    if (!isset($modulos[$modID])) {
        $modulos[$modID] = [
            'NombreModulo' => $r['NombreModulo'],
            'ModuloDesc' => $r['ModuloDesc'],
            'Secciones' => []
        ];
    }

    if ($secID && !isset($modulos[$modID]['Secciones'][$secID])) {
        $modulos[$modID]['Secciones'][$secID] = [
            'NumSeccion' => $r['NumSeccion'],
            'NombreSeccion' => $r['NombreSeccion'],
            'SeccionDesc' => $r['SeccionDesc'],
            'Fecha' => $r['Fecha'],
            'Ponentes' => []
        ];
    }

    if ($ponID && !isset($modulos[$modID]['Secciones'][$secID]['Ponentes'][$ponID])) {
        $modulos[$modID]['Secciones'][$secID]['Ponentes'][$ponID] = [
            'NombrePonente' => $r['NombrePonente'],
            'Actividades' => []
        ];
    }

    if (!empty($r['Actividad']) || !empty($r['Materiales']) || !empty($r['HorarioInicio']) || !empty($r['HorarioFin'])) {
        $modulos[$modID]['Secciones'][$secID]['Ponentes'][$ponID]['Actividades'][] = [
            'Actividad' => $r['Actividad'],
            'Materiales' => $r['Materiales'],
            'HorarioInicio' => $r['HorarioInicio'],
            'HorarioFin' => $r['HorarioFin']
        ];
    }
}

// --------------------------------------------------
// 5️⃣ Crear PDF
// --------------------------------------------------
$pdf = new TCPDF('L', 'mm', 'LETTER', true, 'UTF-8', false);
$pdf->SetCreator('Sistema ERP_IRP');
$pdf->SetAuthor('Tu sistema');
$pdf->SetTitle('Diplomado - Actividades de Ponentes');
$pdf->SetMargins(15, 20, 15);
$pdf->AddPage();

// Encabezado
$logo1 = __DIR__ . '/../assets/img/logo 1.png';
$logo2 = __DIR__ . '/../assets/img/tecnmx.png';

if (file_exists($logo1)) $pdf->Image($logo1, 15, 10, 25);
if (file_exists($logo2)) $pdf->Image($logo2, 250, 10, 25);

$pdf->SetFont('helvetica', 'B', 16);
$pdf->Cell(0, 10, utf8_decode($nombreDiplomado), 0, 1, 'C');
$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(0, 8, 'Listado de módulos, secciones, ponentes y actividades', 0, 1, 'C');
$pdf->Ln(8);

// --------------------------------------------------
// 6️⃣ Imprimir estructura jerárquica
// --------------------------------------------------
$pdf->SetFont('helvetica', '', 10);
$modCounter = 1;

foreach ($modulos as $mod) {
    $pdf->SetFillColor(220, 230, 255);
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(0, 8, "Módulo $modCounter: " . utf8_decode($mod['NombreModulo']), 0, 1, 'L', true);
    $pdf->SetFont('helvetica', '', 10);
    $pdf->MultiCell(0, 6, "Descripción: " . utf8_decode($mod['ModuloDesc']), 0, 'L');
    $pdf->Ln(2);

    foreach ($mod['Secciones'] as $sec) {
        $pdf->SetFont('helvetica', 'B', 11);
        $pdf->SetFillColor(240, 240, 240);
        $pdf->Cell(0, 8, "Sección " . $sec['NumSeccion'] . ": " . utf8_decode($sec['NombreSeccion']) . " (Fecha: " . $sec['Fecha'] . ")", 0, 1, 'L', true);
        $pdf->SetFont('helvetica', '', 10);
        $pdf->MultiCell(0, 6, "Descripción: " . utf8_decode($sec['SeccionDesc']), 0, 'L');
        $pdf->Ln(2);

        // Encabezado de tabla de actividades
        $headers = ['Ponente', 'Actividad', 'Materiales', 'Horario Inicio', 'Horario Fin'];
        $w = [50, 80, 70, 40, 40];
        $pdf->SetFillColor(200, 200, 200);
        $pdf->SetFont('helvetica', 'B', 10);
        foreach ($headers as $i => $head) {
            $pdf->Cell($w[$i], 8, utf8_decode($head), 1, 0, 'C', true);
        }
        $pdf->Ln();

        $pdf->SetFont('helvetica', '', 9);
        $pdf->SetFillColor(255, 255, 255);
        $fill = false;

        $tieneActividades = false;

        foreach ($sec['Ponentes'] as $pon) {
            $nombrePon = $pon['NombrePonente'] ?: 'Sin ponente';
            $actividades = $pon['Actividades'];

            if (count($actividades) > 0) {
                $tieneActividades = true;
                foreach ($actividades as $act) {
                    $pdf->Cell($w[0], 8, utf8_decode($nombrePon), 1, 0, 'L', $fill);
                    $pdf->Cell($w[1], 8, utf8_decode($act['Actividad']), 1, 0, 'L', $fill);
                    $pdf->Cell($w[2], 8, utf8_decode($act['Materiales']), 1, 0, 'L', $fill);
                    $pdf->Cell($w[3], 8, $act['HorarioInicio'], 1, 0, 'C', $fill);
                    $pdf->Cell($w[4], 8, $act['HorarioFin'], 1, 1, 'C', $fill);
                    $fill = !$fill;
                }
            } else {
                // Ponente sin actividades
                $pdf->Cell($w[0], 8, utf8_decode($nombrePon), 1, 0, 'L');
                $pdf->Cell($w[1] + $w[2] + $w[3] + $w[4], 8, 'Sin actividades', 1, 1, 'C');
            }
        }

        if (empty($sec['Ponentes'])) {
            // Sección sin ponentes
            $pdf->Cell(array_sum($w), 8, 'Sin ponentes ni actividades', 1, 1, 'C');
        }

        $pdf->Ln(4);
    }

    $modCounter++;
    $pdf->Ln(5);
}

// --------------------------------------------------
// 7️⃣ Salida final
// --------------------------------------------------
$pdf->Output('diplomado_actividades.pdf', 'I');
?>






2323232323232323232323232323232323
require_once('../tcpdf/tcpdf.php');
require_once __DIR__ . '/../db/config.php';

// Validar ID del diplomado
if (!isset($_GET['id_diplomado'])) {
    die('Falta el ID del diplomado.');
}

$idDiplomado = $_GET['id_diplomado'];

// 🔹 Obtener módulos y secciones
$sqlModulos = $conn->prepare("
    SELECT m.ID_Modulo, m.NombreModulo, m.Descripcion AS ModuloDesc,
           s.NumSeccion, s.NombreSeccion, s.Descripcion AS SeccionDesc
    FROM modulos m
    LEFT JOIN secciones s ON s.ModuloID = m.ID_Modulo
    WHERE m.DiplomadoID = :id
    ORDER BY m.ID_Modulo ASC, s.NumSeccion ASC
");
$sqlModulos->execute([':id' => $idDiplomado]);
$modulosRaw = $sqlModulos->fetchAll(PDO::FETCH_ASSOC);

// 🔹 Agrupar módulos y secciones
$modulos = [];
foreach ($modulosRaw as $m) {
    $modulos[$m['ID_Modulo']]['NombreModulo'] = $m['NombreModulo'];
    $modulos[$m['ID_Modulo']]['ModuloDesc'] = $m['ModuloDesc'];
    if ($m['NumSeccion']) {
        $modulos[$m['ID_Modulo']]['Secciones'][] = [
            'NumSeccion' => $m['NumSeccion'],
            'NombreSeccion' => $m['NombreSeccion'],
            'SeccionDesc' => $m['SeccionDesc']
        ];
    }
}

// 🔹 Crear PDF con TCPDF
$pdf = new TCPDF();
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Sistema');
$pdf->SetTitle('Módulos y Secciones del Diplomado');
$pdf->SetMargins(15, 20, 15);
$pdf->AddPage();

// Fuente que soporte UTF-8
$pdf->SetFont('dejavusans', 'B', 14);
$pdf->Cell(0, 10, 'Módulos y Secciones del Diplomado', 0, 1, 'C');
$pdf->Ln(5);

// 🔹 Tabla única
$pdf->SetFont('dejavusans', 'B', 11);
$pdf->Cell(15, 10, 'N° Mod', 1, 0, 'C');
$pdf->Cell(50, 10, 'Nombre Módulo', 1, 0, 'C');
$pdf->Cell(60, 10, 'Descripción Módulo', 1, 0, 'C');
$pdf->Cell(15, 10, 'N° Sec', 1, 0, 'C');
$pdf->Cell(50, 10, 'Nombre Sección', 1, 0, 'C');
$pdf->Cell(60, 10, 'Descripción Sección', 1, 1, 'C');

$pdf->SetFont('dejavusans', '', 10);
$modCounter = 1;

foreach ($modulos as $mod) {
    $secciones = $mod['Secciones'] ?? [];

    if (count($secciones) > 0) {
        foreach ($secciones as $i => $sec) {
            // Datos del módulo solo en la primera fila de cada módulo
            if ($i == 0) {
                $pdf->Cell(15, 8, $modCounter, 1, 0, 'C');
                $pdf->Cell(50, 8, $mod['NombreModulo'], 1, 0, 'L');
                $pdf->Cell(60, 8, $mod['ModuloDesc'], 1, 0, 'L');
            } else {
                $pdf->Cell(15, 8, '', 1);
                $pdf->Cell(50, 8, '', 1);
                $pdf->Cell(60, 8, '', 1);
            }

            $pdf->Cell(15, 8, $sec['NumSeccion'], 1, 0, 'C');
            $pdf->Cell(50, 8, $sec['NombreSeccion'], 1, 0, 'L');
            $pdf->Cell(60, 8, $sec['SeccionDesc'], 1, 1, 'L');
        }
    } else {
        // Módulo sin secciones
        $pdf->Cell(15, 8, $modCounter, 1, 0, 'C');
        $pdf->Cell(50, 8, $mod['NombreModulo'], 1, 0, 'L');
        $pdf->Cell(60, 8, $mod['ModuloDesc'], 1, 0, 'L');
        $pdf->Cell(15, 8, '-', 1, 0, 'C');
        $pdf->Cell(50, 8, '-', 1, 0, 'L');
        $pdf->Cell(60, 8, '-', 1, 1, 'L');
    }

    $modCounter++;
}

$pdf->Output('I', 'modulos_secciones.pdf');
*/
?>
