document.addEventListener('DOMContentLoaded', function () {
    const firstNameInput = document.getElementById('persona_atendera');
  
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
    const firstNameInput = document.getElementById('persona_atendio');
  
    // Agregar un listener para el evento de entrada
    firstNameInput.addEventListener('input', function () {
      // Convertir el valor a mayúsculas
      this.value = this.value.toUpperCase();
  
      // Verificar si el texto cumple con las restricciones
      let regex = /^[a-zA-ZáéíóúÁÉÍÓÚÑ\s]{7,70}$/;
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
    const firstNameInput = document.getElementById('motivo_atencion');
  
    // Agregar un listener para el evento de entrada
    firstNameInput.addEventListener('input', function () {
      // Convertir el valor a mayúsculas
      this.value = this.value.toUpperCase();
  
      // Verificar si el texto cumple con las restricciones
      let regex = /^[a-zA-ZáéíóúÁÉÍÓÚ\s]{3,1000000}$/;
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
    const firstNameInput = document.getElementById('descripcion');
  
    // Agregar un listener para el evento de entrada
    firstNameInput.addEventListener('input', function () {
      // Convertir el valor a mayúsculas
      this.value = this.value.toUpperCase();
  
      // Verificar si el texto cumple con las restricciones
      let regex = /^[a-zA-ZáéíóúÁÉÍÓÚÑ\s]{5,1000000}$/;
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


  