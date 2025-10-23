<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mensaje = strtolower(trim($_POST['mensaje'] ?? ''));

    $respuestas = [
        "hola" => "¡Hola! 😊 ¿En qué puedo ayudarte?",
        "diplomado" => "Puedes ver los diplomados disponibles en el módulo 'Diplomados'.",
        "seminario" => "Los seminarios activos están en la sección 'Seminarios'.",
        "taller" => "Los talleres se listan en 'Talleres', junto con su fecha y lugar.",
        "adios" => "¡Hasta luego! 👋 Espero haberte ayudado.",
    ];

    $respuesta = "No entendí tu mensaje 😅. Intenta con palabras como *diplomado*, *seminario* o *taller*.";

    foreach ($respuestas as $clave => $texto) {
        if (strpos($mensaje, $clave) !== false) {
            $respuesta = $texto;
            break;
        }
    }

    echo $respuesta;
}
?>
