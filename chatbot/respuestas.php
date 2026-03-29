<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mensaje = strtolower(trim($_POST['mensaje'] ?? ''));

   $respuestas = [
    "hola" => "Hola! En qué puedo ayudarte?",
    "diplomado" => "Puedes ver los diplomados disponibles en el módulo 'Diplomados'. También puedes buscar por nombre o fecha.",
    "seminario" => "Los seminarios activos están en la sección 'Seminarios'. Puedes filtrar por fecha o ponente.",
    "taller" => "Los talleres se listan en 'Talleres', junto con su fecha y lugar. Puedes consultar detalles haciendo clic en ellos.",
    "horario" => "Puedes consultar los horarios dentro del módulo correspondiente o en la información de cada evento.",
    "registro" => "Para registrarte en un diplomado, seminario o taller, ve al módulo correspondiente y haz clic en 'Inscribirse'.",
    "informacion" => "Soy tu asistente virtual. Puedo ayudarte a encontrar diplomados, seminarios y talleres.",
    "adios" => "Hasta luego! Espero haberte ayudado.",
    "gracias" => "De nada! Estoy aquí para ayudarte cuando quieras.",

    // --- Información GESMUJER ---
    "direccion" => "La dirección de GESMUJER es: Calle 28 #404, Colonia Centro, Oaxaca de Juárez, Oaxaca.",
    "ubicacion" => "Nos encontramos en: Calle 28 #404, Colonia Centro, Oaxaca de Juárez, Oaxaca.",
    "telefono" => "Los números de contacto oficiales son: 951 501 2000 y 951 514 2006.",
    "contacto" => "Puedes comunicarte con GESMUJER al 951 501 2000 o acudir a Calle 28 #404, Centro, Oaxaca.",
    "correo" => "El correo de contacto es: contacto@gesmujer.org.mx",

    // --- Más respuestas útiles ---
    "ayuda" => "Claro, estoy aquí para ayudarte. Dime qué necesitas.",
    "requisitos" => "Los requisitos dependen del curso o diplomado. Generalmente necesitas identificación y datos básicos.",
    "costos" => "La mayoría de las actividades de GESMUJER son gratuitas. Depende del evento.",
    "apoyo" => "GESMUJER ofrece talleres, asesoría y actividades para el desarrollo y bienestar de las mujeres.",
    "servicios" => "Ofrecemos diplomados, talleres, seminarios y actividades orientadas al desarrollo integral de las mujeres.",
    "mapa" => "Puedes buscarnos en Google Maps como 'GESMUJER Oaxaca'.",
    "horarios" => "Los horarios dependen del evento. Consulta la sección correspondiente para más detalles.",
    "ayuda violencia" => "Si necesitas apoyo relacionado con violencia de género, comunícate al 951 501 2000 o acude directamente a nuestras instalaciones. No estás sola.",
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
