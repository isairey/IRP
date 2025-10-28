function showDesaparecidaInput() {
    document.getElementById("DesaparecidaInput").style.display = "block";
}

function hideDesaparecidaInput() {
    document.getElementById("DesaparecidaInput").style.display = "none";
}

function showHijosInput() {
  document.getElementById("HijosInput").style.display = "block";
}

function hideHijosInput() {
  document.getElementById("HijosInput").style.display = "none";
}

document.addEventListener('DOMContentLoaded', function () {
  const numDecendenciaInput = document.getElementById('num_descendencia');

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
    const firstNameInput = document.getElementById('nombre_victima');
  
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
    const firstNameInput = document.getElementById('apellido_paterno');
  
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
    const firstNameInput = document.getElementById('apellido_materno');
  
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
    const firstNameInput = document.getElementById('lugar_origen');
  
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
    const firstNameInput = document.getElementById('ocupacion');
  
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
    const firstNameInput = document.getElementById('calle');
  
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
    const firstNameInput = document.getElementById('calle');
  
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
    const numDecendenciaInput = document.getElementById('numero');

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
    const firstNameInput = document.getElementById('region');
  
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
    const firstNameInput = document.getElementById('estado');
  
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
    const numDecendenciaInput = document.getElementById('clave_municipio');

    numDecendenciaInput.addEventListener('input', function () {
        let value = this.value.trim();
        let isValid = /^\d+$/.test(value); // Verifica si el valor contiene solo dígitos

        if (!isValid || value.length > 5) {
            this.classList.add('is-invalid');
        } else {
            this.classList.remove('is-invalid');
        }
    });
});

  document.addEventListener('DOMContentLoaded', function () {
    const firstNameInput = document.getElementById('alerta_genero');
  
    // Agregar un listener para el evento de entrada
    firstNameInput.addEventListener('input', function () {
      // Convertir el valor a mayúsculas
      this.value = this.value.toUpperCase();
  
      // Verificar si el texto cumple con las restricciones
      let regex = /^[a-zA-ZáéíóúÁÉÍÓÚ\s]{3,20}$/;
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
    const numDecendenciaInput = document.getElementById('id_caso_anual');

    numDecendenciaInput.addEventListener('input', function () {
        let value = this.value.trim();
        let isValid = /^\d+$/.test(value); // Verifica si el valor contiene solo dígitos

        if (!isValid || value.length > 1000) {
            this.classList.add('is-invalid');
        } else {
            this.classList.remove('is-invalid');
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const numDecendenciaInput = document.getElementById('num_averiguacion');

    numDecendenciaInput.addEventListener('input', function () {
        let value = this.value.trim();
        let isValid = /^\d+$/.test(value); // Verifica si el valor contiene solo dígitos

        if (!isValid || value.length > 1000) {
            this.classList.add('is-invalid');
        } else {
            this.classList.remove('is-invalid');
        }
    });
});


document.addEventListener('DOMContentLoaded', function () {
    const firstNameInput = document.getElementById('situacion_juridica');
  
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
    const firstNameInput = document.getElementById('lugar_cuerpo');
  
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
    const firstNameInput = document.getElementById('descripcion_cuerpo');
  
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
    const firstNameInput = document.getElementById('forma_muerte');
  
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
    const firstNameInput = document.getElementById('causas');
  
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
    const firstNameInput = document.getElementById('nombre_agresor');
  
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
    const firstNameInput = document.getElementById('parentesco_agresor');
  
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
    const firstNameInput = document.getElementById('fuente_periodistica');
  
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
    const firstNameInput = document.getElementById('autor_nota');
  
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
    const numDecendenciaInput = document.getElementById('edad');

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