document.addEventListener('DOMContentLoaded', function () {
    const firstNameInput = document.getElementById('nombre');
  
    // Agregar un listener para el evento de entrada
    firstNameInput.addEventListener('input', function () {
      // Convertir el valor a mayúsculas
      this.value = this.value.toUpperCase();
  
      // Verificar si el texto cumple con las restricciones
      let regex = /^[a-zA-ZáéíóúÁÉÍÓÚ\s]{3,70}$/;
      if (!regex.test(this.value)) {
        this.setCustomValidity('Se requiere un nombre válido.');
        this.classList.add('is-invalid');
        this.classList.remove('is-valid');
      } else {
        this.setCustomValidity('');
        this.classList.remove('is-invalid');
        this.classList.add('is-valid');
      }
    });
  });

  document.addEventListener('DOMContentLoaded', function () {
    const firstNameInput = document.getElementById('apellido_paterno');
  
    // Agregar un listener para el evento de entrada
    firstNameInput.addEventListener('input', function () {
      // Convertir el valor a mayúsculas
      this.value = this.value.toUpperCase();
  
      // Verificar si el texto cumple con las restricciones
      let regex = /^[a-zA-ZáéíóúÁÉÍÓÚ\s]{3,70}$/;
      if (!regex.test(this.value)) {
        this.setCustomValidity('Se requiere un nombre válido.');
        this.classList.add('is-invalid');
        this.classList.remove('is-valid');
      } else {
        this.setCustomValidity('');
        this.classList.remove('is-invalid');
        this.classList.add('is-valid');
      }
    });
  });

  document.addEventListener('DOMContentLoaded', function () {
    const firstNameInput = document.getElementById('apellido_materno');
  
    // Agregar un listener para el evento de entrada
    firstNameInput.addEventListener('input', function () {
      // Convertir el valor a mayúsculas
      this.value = this.value.toUpperCase();
  
      // Verificar si el texto cumple con las restricciones
      let regex = /^[a-zA-ZáéíóúÁÉÍÓÚ\s]{3,70}$/;
      if (!regex.test(this.value)) {
        this.setCustomValidity('Se requiere un nombre válido.');
        this.classList.add('is-invalid');
        this.classList.remove('is-valid');
      } else {
        this.setCustomValidity('');
        this.classList.remove('is-invalid');
        this.classList.add('is-valid');
      }
    });
  });

  document.addEventListener('DOMContentLoaded', function () {
    const telCelularInput = document.getElementById('telefono');
  
    telCelularInput.addEventListener('input', function () {
        let value = this.value.trim();
        let isValid = /^\d{10}$/.test(value); // Verifica que haya exactamente 10 dígitos
  
        if (!isValid) {
            this.classList.add('is-invalid');
            document.getElementById('telCelularFeedback').style.display = 'block';
        } else {
            this.classList.remove('is-invalid');
            document.getElementById('telCelularFeedback').style.display = 'none';
        }
  
        if (value.length < 10) {
            this.classList.add('is-invalid');
            document.getElementById('telCelularFeedback').style.display = 'block';
        }
    });
  });


  document.addEventListener('DOMContentLoaded', function () {
    const emailInput = document.getElementById('email');
  
    emailInput.addEventListener('input', function () {
        let value = this.value.trim();
  
        // Verificar si el texto cumple con las restricciones
        let regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (!regex.test(value)) {
            this.setCustomValidity('Se requiere una dirección de correo electrónico válida.');
            this.classList.add('is-invalid');
        } else {
            this.setCustomValidity('');
            this.classList.remove('is-invalid');
        }
    });
  });

  document.addEventListener('DOMContentLoaded', function () {
    const montoInput = document.getElementById('monto_donacion');

    montoInput.addEventListener('input', function () {
        let value = parseFloat(this.value);

        // Verificar si el valor es un número válido y está dentro del rango permitido
        if (isNaN(value) || value < 0 || value > 100000000000) {
            this.setCustomValidity('El monto de financiamiento debe ser un número válido entre 0 y 5,000,000.');
            this.classList.add('is-invalid');
        } else {
            this.setCustomValidity('');
            this.classList.remove('is-invalid');
        }
    });
});