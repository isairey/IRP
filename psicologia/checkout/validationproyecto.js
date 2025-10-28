document.addEventListener('DOMContentLoaded', function () {
    const firstNameInput = document.getElementById('nombre_proyecto');
  
    // Agregar un listener para el evento de entrada
    firstNameInput.addEventListener('input', function () {
      // Convertir el valor a mayúsculas
      this.value = this.value.toUpperCase();
  
      // Verificar si el texto cumple con las restricciones
      let regex = /^[a-zA-ZáéíóúÁÉÍÓÚ\s]{3,100}$/;
      if (!regex.test(this.value)) {
        this.setCustomValidity('problemas_movilidad');
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
    const montoInput = document.getElementById('monto_financiamiento');

    montoInput.addEventListener('input', function () {
        let value = parseFloat(this.value);

        // Verificar si el valor es un número válido y está dentro del rango permitido
        if (isNaN(value) || value < 0 || value > 5000000) {
            this.setCustomValidity('El monto de financiamiento debe ser un número válido entre 0 y 5,000,000.');
            this.classList.add('is-invalid');
        } else {
            this.setCustomValidity('');
            this.classList.remove('is-invalid');
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const firstNameInput = document.getElementById('dependencia');
  
    // Agregar un listener para el evento de entrada
    firstNameInput.addEventListener('input', function () {
      // Convertir el valor a mayúsculas
      this.value = this.value.toUpperCase();
  
      // Verificar si el texto cumple con las restricciones
      let regex = /^[a-zA-ZáéíóúÁÉÍÓÚ\s]{3,100}$/;
      if (!regex.test(this.value)) {
        this.setCustomValidity('problemas_movilidad');
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
    const firstNameInput = document.getElementById('descripcion_proyecto');
  
    // Agregar un listener para el evento de entrada
    firstNameInput.addEventListener('input', function () {
      // Convertir el valor a mayúsculas
      this.value = this.value.toUpperCase();
  
      // Verificar si el texto cumple con las restricciones
      let regex = /^[a-zA-ZáéíóúÁÉÍÓÚ\s]{3,1000}$/;
      if (!regex.test(this.value)) {
        this.setCustomValidity('problemas_movilidad');
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
    const firstNameInput = document.getElementById('administrador');
  
    // Agregar un listener para el evento de entrada
    firstNameInput.addEventListener('input', function () {
      // Convertir el valor a mayúsculas
      this.value = this.value.toUpperCase();
  
      // Verificar si el texto cumple con las restricciones
      let regex = /^[a-zA-ZáéíóúÁÉÍÓÚ\s]{3,100}$/;
      if (!regex.test(this.value)) {
        this.setCustomValidity('problemas_movilidad');
        this.classList.add('is-invalid');
        this.classList.remove('is-valid');
      } else {
        this.setCustomValidity('');
        this.classList.remove('is-invalid');
        this.classList.add('is-valid');
      }
    });
  });

