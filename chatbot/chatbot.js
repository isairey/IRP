document.addEventListener("DOMContentLoaded", () => {
  const boton = document.getElementById("chatbot-boton");
  const contenedor = document.getElementById("chatbot-contenedor");
  const cerrar = document.getElementById("chatbot-cerrar");
  const enviar = document.getElementById("enviar");
  const input = document.getElementById("mensaje");
  const mensajes = document.getElementById("chatbot-mensajes");

  boton.addEventListener("click", () => contenedor.classList.toggle("oculto"));
  cerrar.addEventListener("click", () => contenedor.classList.add("oculto"));

  const agregarMensaje = (texto, tipo) => {
    const div = document.createElement("div");
    div.classList.add("mensaje", tipo);
    div.textContent = texto;
    mensajes.appendChild(div);
    mensajes.scrollTop = mensajes.scrollHeight;
  };

  const enviarMensaje = () => {
    const texto = input.value.trim();
    if (!texto) return;
    agregarMensaje(texto, "usuario");
    input.value = "";

    fetch("./../chatbot/respuestas.php", {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      body: "mensaje=" + encodeURIComponent(texto)
    })
    .then(res => res.text())
    .then(resp => agregarMensaje(resp, "bot"))
    .catch(() => agregarMensaje("Error al conectar con el asistente.", "bot"));
  };

  enviar.addEventListener("click", enviarMensaje);
  input.addEventListener("keypress", e => {
    if (e.key === "Enter") enviarMensaje();
  });

  agregarMensaje("¡Hola! 👋 Soy tu asistente. ¿En qué puedo ayudarte hoy?", "bot");
});
