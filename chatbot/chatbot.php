<!-- Chatbot flotante -->
<link rel="stylesheet" href="./../chatbot/chatbot.css">
<div id="chatbot-boton">💬</div>

<div id="chatbot-contenedor" class="oculto">
  <div id="chatbot-header">
    <h5>Asistente Virtual</h5>
    <button id="chatbot-cerrar">&times;</button>
  </div>

  <div id="chatbot-mensajes"></div>

  <div id="chatbot-input">
    <input type="text" id="mensaje" placeholder="Escribe tu mensaje..." autocomplete="off">
    <button id="enviar">Enviar</button>
  </div>
</div>

<script src="./../chatbot/chatbot.js"></script>

<script>
document.addEventListener("DOMContentLoaded", () => {
  // Detectar si el sistema está en modo oscuro
  const darkMode = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;

  // Agregar clase al <body>
  if (darkMode) {
    document.body.classList.add("modo-oscuro");
  }

  // Escuchar si el usuario cambia el tema del sistema en tiempo real
  if (window.matchMedia) {
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
      if (e.matches) {
        document.body.classList.add("modo-oscuro");
      } else {
        document.body.classList.remove("modo-oscuro");
      }
    });
  }
});
</script>

