
  function showLanguageInput() {
    document.getElementById("languageInput").style.display = "block";
  }

  function hideLanguageInput() {
    document.getElementById("languageInput").style.display = "none";
  }

  function showHijosInput() {
    document.getElementById("HijosInput").style.display = "block";
  }

  function hideHijosInput() {
    document.getElementById("HijosInput").style.display = "none";
  }

  function showParejaInput() {
    document.getElementById("ParejaInput").style.display = "block";
  }

  function hideParejaInput() {
    document.getElementById("ParejaInput").style.display = "none";
  }
  function showRelacionInput() {
    document.getElementById("RelacionInput").style.display = "block";
  }

  function hideRelacionInput() {
    document.getElementById("RelacionInput").style.display = "none";
  }


  function showVivesInput() {
    document.getElementById("VivesInput").style.display = "block";
  }

  function hideVivesInput() {
    document.getElementById("VivesInput").style.display = "none";
  }
  function showAgresoraInput() {
    document.getElementById("AgresoraInput").style.display = "block";
  }

  function hideAgresoraInput() {
    document.getElementById("AgresoraInput").style.display = "none";
  }
  function showDenunciaInput() {
    document.getElementById("DenunciaInput").style.display = "block";
  }

  function hideDenunciaInput() {
    document.getElementById("DenunciaInput").style.display = "none";
  }
  function showCanaInput() {
    document.getElementById("CanaInput").style.display = "block";
    document.getElementById("CanadosInput").style.display = "none";
  }

  function hideCanaInput() {
    document.getElementById("CanadosInput").style.display = "block";
    document.getElementById("CanaInput").style.display = "none";
    
  }


        function confirmarEnvio() {
            // Mostrar un cuadro de diálogo de confirmación
            var respuesta = confirm("¿Estás seguro de enviar el formulario?");
            return respuesta; // Devuelve true si el usuario hace clic en "Aceptar" y false si hace clic en "Cancelar"
        }




        

document.addEventListener('DOMContentLoaded', function () {
     // Función genérica de validación
   function validateInput(input, regex) {
     // Convertir el valor a mayúsculas
    input.value = input.value.toUpperCase();

    // Verificar si el texto cumple con las restricciones
    if (!regex.test(input.value)) {
      document.getElementById(input.id + 'Feedback').innerText = 'Se requiere un valor válido.';
       input.classList.add('is-invalid');
      input.classList.remove('is-valid');
    } else {
      document.getElementById(input.id + 'Feedback').innerText = '';
      input.classList.remove('is-invalid');
      input.classList.add('is-valid');
    }
  }

  // Obtener los inputs y asociar la validación
  const firstNameInput = document.getElementById('firstName');
  const lastNameInput = document.getElementById('lastName');

  firstNameInput.addEventListener('input', function () {
    let regex = /^[a-zA-ZáéíóúÁÉÍÓÚÑñ0-9\s]{3,70}$/;
    validateInput(this, regex);
  });

   lastNameInput.addEventListener('input', function () {
    let regex = /^[a-zA-ZáéíóúÁÉÍÓÚ\s]{3,70}$/;
    validateInput(this, regex);
  });
 });
