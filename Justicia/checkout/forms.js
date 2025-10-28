document.addEventListener('DOMContentLoaded', function () {
    const firstNameInput = document.getElementById('firstName');
    const lastNameInput = document.getElementById('lastName');
    const secondLastName = document.getElementById('secondLastName');
    const lugarNacimientoInput = document.getElementById('lugarNacimiento');
    const lenguaMaternaInput = document.getElementById('lenguaMaterna');
    const lenguaIndigenaInput = document.getElementById('lenguaIndigena');
    const calleInput = document.getElementById('calle');
    const coloniaInput = document.getElementById('colonia');
    const estadoInput = document.getElementById('estado');
    const callePCInput = document.getElementById('callePC');
    const coloniaPCInput = document.getElementById('coloniaPC');
    const estadoPCInput = document.getElementById('estadoPC');
    const ocupacionInput = document.getElementById('ocupacion');
    const fuenteIngresosInput = document.getElementById('fuenteIngresos');
    const AgresorInput = document.getElementById('Agresor');
    const TrabajaInput = document.getElementById('Trabaja');
    const ExternaInput = document.getElementById('Externa');

    firstNameInput.addEventListener('input', function () {
        validateInput(this);
    });

    lastNameInput.addEventListener('input', function () {
        validateInput(this);
    });

    secondLastName.addEventListener('input', function () {
        validateInput(this);
    });

    lugarNacimientoInput.addEventListener('input', function () {
        validateInputNacimiento(this);
    });

    lenguaMaternaInput.addEventListener('input', function () {
        validateInput(this);
    });

    lenguaIndigenaInput.addEventListener('input', function () {
        validateInput(this);
    });

    calleInput.addEventListener('input', function () {
        validateInput(this);
    });

    coloniaInput.addEventListener('input', function () {
        validateInput(this);
    });

    estadoInput.addEventListener('input', function () {
        validateInput(this);
    });

    callePCInput.addEventListener('input', function () {
        validateInput(this);
    });

    coloniaPCInput.addEventListener('input', function () {
        validateInput(this);
    });

    estadoPCInput.addEventListener('input', function () {
        validateInput(this);
    });

    ocupacionInput.addEventListener('input', function () {
        validateInput(this);
    });

    fuenteIngresosInput.addEventListener('input', function () {
        validateInput(this);
    });

    AgresorInput.addEventListener('input', function () {
        validateInput(this);
    });

    TrabajaInput.addEventListener('input', function () {
        validateInput(this);
    });

    ExternaInput.addEventListener('input', function () {
        validateInput(this);
    });

    /*function validateInput(input) {
        // Convertir el valor a mayúsculas
        input.value = input.value.toUpperCase();

        // Verificar si el texto cumple con las restricciones
        let regex = /^[a-zA-ZáéíóúÁÉÍÓÚÑñ\s]{3,70}$/;
        if (!regex.test(input.value)) {
            input.setCustomValidity('Se requiere un nombre válido.');
            input.classList.add('is-invalid');
            input.classList.remove('is-valid');
        } else {
            input.setCustomValidity('');
            input.classList.remove('is-invalid');
            input.classList.add('is-valid');
        }
    }

    */




function validateInputNacimiento(input) {
    // Convertir el valor a mayúsculas
    input.value = input.value.toUpperCase();

    // ✅ Ahora acepta letras, acentos, Ñ, espacios y números
let regex = /^[a-zA-ZáéíóúÁÉÍÓÚÑñ0-9\s]{3,}$/;


    if (!regex.test(input.value)) {
        input.setCustomValidity('Se requiere un nombre o valor válido (letras y números).');
        input.classList.add('is-invalid');
        input.classList.remove('is-valid');
    } else {
        input.setCustomValidity('');
        input.classList.remove('is-invalid');
        input.classList.add('is-valid');
    }
}





    function validateInput(input) {
    // Convertir el valor a mayúsculas
    input.value = input.value.toUpperCase();

    // ✅ Ahora acepta letras, acentos, Ñ, espacios y números
let regex = /^[a-zA-ZáéíóúÁÉÍÓÚÑñ0-9\s]{3,}$/;


    if (!regex.test(input.value)) {
        input.setCustomValidity('Se requiere un nombre o valor válido (letras y números).');
        input.classList.add('is-invalid');
        input.classList.remove('is-valid');
    } else {
        input.setCustomValidity('');
        input.classList.remove('is-invalid');
        input.classList.add('is-valid');
    }
}

});


document.addEventListener('DOMContentLoaded', function () {
    const telCelularInput = document.getElementById('telCelular');
    
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
        const telCelularInput = document.getElementById('telFijo');
        
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
        const telCelularInput = document.getElementById('telConfianza');
        
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
        
        
        //DOCUMENTOS COMPROBABLES
        
      
  // --- DOCUMENTOS COMPROBABLES ---
  document.addEventListener('DOMContentLoaded', function () {
    const curpInput = document.getElementById('curp');
    const ineInput = document.getElementById('ine');

    // --- Validación CURP ---
    curpInput.addEventListener('input', function () {
      let value = this.value.trim();

      // Permite vacío o formato válido (18 caracteres alfanuméricos)
      let isValid = value === '' || /^[A-Za-z0-9]{18}$/.test(value);

      if (!isValid) {
        this.classList.add('is-invalid');
      } else {
        this.classList.remove('is-invalid');
      }
    });

    // Convierte a mayúsculas automáticamente
    curpInput.addEventListener('input', function () {
      this.value = this.value.toUpperCase();
    });

    // --- Validación INE ---
    ineInput.addEventListener('input', function () {
      let value = this.value.trim();

      // Permite vacío o números válidos (sin límite artificial)
      let isValid = value === '' || (/^\d+$/.test(value) && parseInt(value) > 0);

      if (!isValid) {
        this.classList.add('is-invalid');
      } else {
        this.classList.remove('is-invalid');
      }
    });
  });


        
        
        document.addEventListener('DOMContentLoaded', function () {
            const firstNameInput = document.getElementById('situacionUsuaria');
          
            // Agregar un listener para el evento de entrada
            firstNameInput.addEventListener('input', function () {
              // Convertir el valor a mayúsculas
              this.value = this.value.toUpperCase();
          
              // Verificar si el texto cumple con las restricciones
              let regex = /^[a-zA-ZáéíóúÁÉÍÓÚÑñ,.\s]{10,1000}$/;
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
            const firstNameInput = document.getElementById('auxiliosPsicologicos');
          
            // Agregar un listener para el evento de entrada
            firstNameInput.addEventListener('input', function () {
              // Convertir el valor a mayúsculas
              this.value = this.value.toUpperCase();
          
              // Verificar si el texto cumple con las restricciones
              let regex = /^[a-zA-ZáéíóúÁÉÍÓÚÑñ,.\s]{10,1000}$/;
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