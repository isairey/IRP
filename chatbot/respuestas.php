<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mensaje = strtolower(trim($_POST['mensaje'] ?? ''));

    $respuestas = [
        "hola" => "¡Hola! 😊 ¿En qué puedo ayudarte?",
        "diplomado" => "Puedes ver los diplomados disponibles en el módulo 'Diplomados'. También puedes buscar por nombre o fecha.",
        "seminario" => "Los seminarios activos están en la sección 'Seminarios'. Puedes filtrar por fecha o ponente.",
        "taller" => "Los talleres se listan en 'Talleres', junto con su fecha y lugar. Puedes consultar detalles haciendo clic en ellos.",
        "horario" => "Puedes consultar los horarios en la sección correspondiente de la plataforma.",
        "registro" => "Para registrarte en un diplomado, seminario o taller, debes ir al módulo correspondiente y hacer clic en 'Inscribirse'.",
        "contacto" => "Puedes contactarnos a través del módulo 'Contacto' o enviando un correo a soporte@tusitio.com",
        "información" => "Soy tu asistente virtual 🤖. Puedo ayudarte a encontrar diplomados, seminarios y talleres.",
        "adios" => "¡Hasta luego! 👋 Espero haberte ayudado.",
        "gracias" => "¡De nada! 😊 Estoy aquí para ayudarte cuando quieras."
    ];

    $respuesta = "No entendí tu mensaje 😅. Intenta con palabras como *diplomado*, *seminario*, *taller*, *horario* o *registro*.";

    foreach ($respuestas as $clave => $texto) {
        if (strpos($mensaje, $clave) !== false) {
            $respuesta = $texto;
            break;
        }
    }

    echo $respuesta;
}
?>
