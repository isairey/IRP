document.addEventListener('DOMContentLoaded', function () {
    const firstNameInput = document.getElementById('firstName');
  
    // Agregar un listener para el evento de entrada
    firstNameInput.addEventListener('input', function () {
      // Convertir el valor a mayúsculas
      this.value = this.value.toUpperCase();
  
      // Verificar si el texto cumple con las restricciones
      let regex = /^[a-zA-ZáéíóúÁÉÍÓÚÑñ\s]{3,70}$/;
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
    const firstNameInput = document.getElementById('lastName');
  
    // Agregar un listener para el evento de entrada
    firstNameInput.addEventListener('input', function () {
      // Convertir el valor a mayúsculas
      this.value = this.value.toUpperCase();
  
      // Verificar si el texto cumple con las restricciones
      let regex = /^[a-zA-ZáéíóúÁÉÍÓÚÑñ\s]{3,70}$/;
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
    const firstNameInput = document.getElementById('secondLastName');
  
    // Agregar un listener para el evento de entrada
    firstNameInput.addEventListener('input', function () {
      // Convertir el valor a mayúsculas
      this.value = this.value.toUpperCase();
  
      // Verificar si el texto cumple con las restricciones
      let regex = /^[a-zA-ZáéíóúÁÉÍÓÚÑñ\s]{3,70}$/;
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
  
 // DATOS DE DOMICILIO 


 document.addEventListener('DOMContentLoaded', function () {
    const firstNameInput = document.getElementById('calle');
  
    // Agregar un listener para el evento de entrada
    firstNameInput.addEventListener('input', function () {
      // Convertir el valor a mayúsculas
      this.value = this.value.toUpperCase();
  
      // Verificar si el texto cumple con las restricciones
      let regex = /^[a-zA-ZáéíóúÁÉÍÓÚÑñ\s]{3,70}$/;
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
    const numDecendenciaInput = document.getElementById('num_interior');

    numDecendenciaInput.addEventListener('input', function () {
        let value = this.value.trim();
        let isValid = /^\d+$/.test(value); // Verifica si el valor contiene solo dígitos

        if (!isValid || value.length > 15) {
            this.classList.add('is-invalid');
        } else {
            this.classList.remove('is-invalid');
        }
    });
});

  document.addEventListener('DOMContentLoaded', function () {
    const numDecendenciaInput = document.getElementById('num_exterior');

    numDecendenciaInput.addEventListener('input', function () {
        let value = this.value.trim();
        let isValid = /^\d+$/.test(value); // Verifica si el valor contiene solo dígitos

        if (!isValid || value.length > 15) {
            this.classList.add('is-invalid');
        } else {
            this.classList.remove('is-invalid');
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const numDecendenciaInput = document.getElementById('cp');

    numDecendenciaInput.addEventListener('input', function () {
        let value = this.value.trim();
        let isValid = /^\d+$/.test(value); // Verifica si el valor contiene solo dígitos

        if (!isValid || value.length > 15) {
            this.classList.add('is-invalid');
        } else {
            this.classList.remove('is-invalid');
        }
    });
});

  document.addEventListener('DOMContentLoaded', function () {
    const firstNameInput = document.getElementById('municipio');
  
    // Agregar un listener para el evento de entrada
    firstNameInput.addEventListener('input', function () {
      // Convertir el valor a mayúsculas
      this.value = this.value.toUpperCase();
  
      // Verificar si el texto cumple con las restricciones
      let regex = /^[a-zA-ZáéíóúÁÉÍÓÚÑñ\s]{3,70}$/;
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
    const firstNameInput = document.getElementById('colonia');
  
    // Agregar un listener para el evento de entrada
    firstNameInput.addEventListener('input', function () {
      // Convertir el valor a mayúsculas
      this.value = this.value.toUpperCase();
  
      // Verificar si el texto cumple con las restricciones
      let regex = /^[a-zA-ZáéíóúÁÉÍÓÚÑñ\s]{3,70}$/;
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
    const firstNameInput = document.getElementById('estado');
  
    // Agregar un listener para el evento de entrada
    firstNameInput.addEventListener('input', function () {
      // Convertir el valor a mayúsculas
      this.value = this.value.toUpperCase();
  
      // Verificar si el texto cumple con las restricciones
      let regex = /^[a-zA-ZáéíóúÁÉÍÓÚÑñ\s]{3,70}$/;
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
    const firstNameInput = document.getElementById('region');
  
    // Agregar un listener para el evento de entrada
    firstNameInput.addEventListener('input', function () {
      // Convertir el valor a mayúsculas
      this.value = this.value.toUpperCase();
  
      // Verificar si el texto cumple con las restricciones
      let regex = /^[a-zA-ZáéíóúÁÉÍÓÚÑñ\s]{3,70}$/;
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
    const firstNameInput = document.getElementById('pais_procedencia');
  
    // Agregar un listener para el evento de entrada
    firstNameInput.addEventListener('input', function () {
      // Convertir el valor a mayúsculas
      this.value = this.value.toUpperCase();
  
      // Verificar si el texto cumple con las restricciones
      let regex = /^[a-zA-ZáéíóúÁÉÍÓÚÑñ\s]{3,70}$/;
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
    const firstNameInput = document.getElementById('direccion_temporala');
  
    // Agregar un listener para el evento de entrada
    firstNameInput.addEventListener('input', function () {
      // Convertir el valor a mayúsculas
      this.value = this.value.toUpperCase();
  
      // Verificar si el texto cumple con las restricciones
      let regex = /^[a-zA-ZáéíóúÁÉÍÓÚÑñ\s]{3,70}$/;
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


  //DATOS DE CONTACTO

  document.addEventListener('DOMContentLoaded', function () {
    const telCelularInput = document.getElementById('tel');
  
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
    const telCelularInput = document.getElementById('tel_contacto_emergencia');
  
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
    const firstNameInput = document.getElementById('nombre_contacto_emergencia');
  
    // Agregar un listener para el evento de entrada
    firstNameInput.addEventListener('input', function () {
      // Convertir el valor a mayúsculas
      this.value = this.value.toUpperCase();
  
      // Verificar si el texto cumple con las restricciones
      let regex = /^[a-zA-ZáéíóúÁÉÍÓÚÑñ\s]{3,100}$/;
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

// DATOS LABORALES

  document.addEventListener('DOMContentLoaded', function () {
    const firstNameInput = document.getElementById('grado_academico');
  
    // Agregar un listener para el evento de entrada
    firstNameInput.addEventListener('input', function () {
      // Convertir el valor a mayúsculas
      this.value = this.value.toUpperCase();
  
      // Verificar si el texto cumple con las restricciones
      let regex = /^[a-zA-ZáéíóúÁÉÍÓÚÑñ\s]{3,70}$/;
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
    const firstNameInput = document.getElementById('puesto');
  
    // Agregar un listener para el evento de entrada
    firstNameInput.addEventListener('input', function () {
      // Convertir el valor a mayúsculas
      this.value = this.value.toUpperCase();
  
      // Verificar si el texto cumple con las restricciones
      let regex = /^[a-zA-ZáéíóúÁÉÍÓÚÑñ\s]{3,70}$/;
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

/*document.addEventListener('DOMContentLoaded', function () {
    const institucionSelect = document.getElementById('institucion');

    institucionSelect.addEventListener('change', function () {
        if (this.value === "") {
            this.setCustomValidity('Se requiere una institución válida.');
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
        } else {
            this.setCustomValidity('');
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
        }
    });
});
*/

  document.addEventListener('DOMContentLoaded', function () {
    const firstNameInput = document.getElementById('area_asignada');
  
    // Agregar un listener para el evento de entrada
    firstNameInput.addEventListener('input', function () {
      // Convertir el valor a mayúsculas
      this.value = this.value.toUpperCase();
  
      // Verificar si el texto cumple con las restricciones
      let regex = /^[a-zA-ZáéíóúÁÉÍÓÚÑñ\s]{1,70}$/;
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
    const firstNameInput = document.getElementById('estatus_personal');
  
    // Agregar un listener para el evento de entrada
    firstNameInput.addEventListener('input', function () {
      // Convertir el valor a mayúsculas
      this.value = this.value.toUpperCase();
  
      // Verificar si el texto cumple con las restricciones
      let regex = /^[a-zA-ZáéíóúÁÉÍÓÚÑñ\s]{3,70}$/;
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
    const firstNameInput = document.getElementById('clasificacion_personal');
  
    // Agregar un listener para el evento de entrada
    firstNameInput.addEventListener('input', function () {
      // Convertir el valor a mayúsculas
      this.value = this.value.toUpperCase();
  
      // Verificar si el texto cumple con las restricciones
      let regex = /^[a-zA-ZáéíóúÁÉÍÓÚÑñ\s]{3,70}$/;
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
    const firstNameInput = document.getElementById('problemas_salud_considerables');
  
    // Agregar un listener para el evento de entrada
    firstNameInput.addEventListener('input', function () {
      // Convertir el valor a mayúsculas
      this.value = this.value.toUpperCase();
  
      // Verificar si el texto cumple con las restricciones
      let regex = /^[a-zA-ZáéíóúÁÉÍÓÚÑñ\s]{3,150}$/;
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
    const firstNameInput = document.getElementById('problemas_movilidad');
  
    // Agregar un listener para el evento de entrada
    firstNameInput.addEventListener('input', function () {
      // Convertir el valor a mayúsculas
      this.value = this.value.toUpperCase();
  
      // Verificar si el texto cumple con las restricciones
      let regex = /^[a-zA-ZáéíóúÁÉÍÓÚÑñ\s]{3,150}$/;
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
    const firstNameInput = document.getElementById('observaciones');
  
    // Agregar un listener para el evento de entrada
    firstNameInput.addEventListener('input', function () {
      // Convertir el valor a mayúsculas
      this.value = this.value.toUpperCase();
  
      // Verificar si el texto cumple con las restricciones
      let regex = /^[a-zA-ZáéíóúÁÉÍÓÚÑñ\s]{3,1000}$/;
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
