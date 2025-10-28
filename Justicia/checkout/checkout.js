// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()

function confirmarEnvio() {
  // Mostrar un cuadro de diálogo de confirmación
  var respuesta = confirm("¿Estás seguro de enviar el formulario?");
  return respuesta; // Devuelve true si el usuario hace clic en "Aceptar" y false si hace clic en "Cancelar"
}
