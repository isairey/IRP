document.addEventListener('DOMContentLoaded', function () {
  const firstNameInput = document.getElementById('firstName');

  // Agregar un listener para el evento de entrada
  firstNameInput.addEventListener('input', function () {
    // Convertir el valor a mayúsculas
    this.value = this.value.toUpperCase();

    // Verificar si el texto cumple con las restricciones
    let regex = /^[a-zA-ZáéíóúÁÉÍÓÚÑñ\s]{3,50}$/;
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
});T

document.addEventListener('DOMContentLoaded', function () {
  const firstNameInput = document.getElementById('lastName');

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
  const firstNameInput = document.getElementById('secondLastName');

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
  const firstNameInput = document.getElementById('lugarNacimiento');

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
  const firstNameInput = document.getElementById('lenguaIndigena');

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
  const lenguaMaternaInput = document.getElementById('lenguaMaterna');

  // Agregar un listener para el evento de entrada
  lenguaMaternaInput.addEventListener('input', function () {
    // Convertir el valor a mayúsculas
    let value = this.value.toUpperCase();

    // Verificar si el texto cumple con las restricciones
    let regex = /^[A-ZÁÉÍÓÚÑ\s]+$/; // Permitimos letras mayúsculas, acentuadas y la letra "Ñ"
    if (!regex.test(this.value)) {
      this.setCustomValidity('Se requiere "ESPAÑOL" como lengua materna.');
      this.classList.add('is-invalid');
      this.classList.remove('is-valid');
    } else {
      this.setCustomValidity('');
      this.classList.remove('is-invalid');
      this.classList.add('is-valid');
    }
  });
});








//DOMICILIO USUARIA 

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
  const numDecendenciaInput = document.getElementById('numInterior');

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
  const numDecendenciaInput = document.getElementById('numExterior');

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
  const firstNameInput = document.getElementById('colonia');

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
  const firstNameInput = document.getElementById('estado');

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


// document.addEventListener('DOMContentLoaded', function () {
//   const firstNameInput = document.getElementById('region');

//   // Agregar un listener para el evento de entrada
//   firstNameInput.addEventListener('input', function () {
//     // Convertir el valor a mayúsculas
//     this.value = this.value.toUpperCase();

//     // Verificar si el texto cumple con las restricciones
//     let regex = /^[a-zA-ZáéíóúÁÉÍÓÚ\s]{3,70}$/;
//     if (!regex.test(this.value)) {
//       this.setCustomValidity('Se requiere un nombre válido.');
//       this.classList.add('is-invalid');
//       this.classList.remove('is-valid');
//     } else {
//       this.setCustomValidity('');
//       this.classList.remove('is-invalid');
//       this.classList.add('is-valid');
//     }
//   });
// });


//   DOMICILIO PERSONA DE CONFIANZA

document.addEventListener('DOMContentLoaded', function () {
  const firstNameInput = document.getElementById('callePC');

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
  const numDecendenciaInput = document.getElementById('numInteriorPC');

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
  const numDecendenciaInput = document.getElementById('numExteriorPC');

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
  const numDecendenciaInput = document.getElementById('cppc');

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
  const firstNameInput = document.getElementById('municipioPC');

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
  const firstNameInput = document.getElementById('coloniaPC');

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
  const firstNameInput = document.getElementById('estadoPC');

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


// document.addEventListener('DOMContentLoaded', function () {
//   const firstNameInput = document.getElementById('regionPC');

//   // Agregar un listener para el evento de entrada
//   firstNameInput.addEventListener('input', function () {
//     // Convertir el valor a mayúsculas
//     this.value = this.value.toUpperCase();

//     // Verificar si el texto cumple con las restricciones
//     let regex = /^[a-zA-ZáéíóúÁÉÍÓÚ\s]{3,70}$/;
//     if (!regex.test(this.value)) {
//       this.setCustomValidity('Se requiere un nombre válido.');
//       this.classList.add('is-invalid');
//       this.classList.remove('is-valid');
//     } else {
//       this.setCustomValidity('');
//       this.classList.remove('is-invalid');
//       this.classList.add('is-valid');
//     }
//   });
// });

//DATOS DE CONTACTO

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

document.addEventListener('DOMContentLoaded', function () {
  const curpInput = document.getElementById('curp');

  curpInput.addEventListener('input', function () {
      let value = this.value.trim();
      let isValid = /^[A-Za-z0-9]{18}$/.test(value);

      if (!isValid) {
          this.setCustomValidity('Se requiere un nombre válido.');
          this.classList.add('is-invalid');
          this.classList.remove('is-valid');
      } else {
          this.setCustomValidity('');
          this.classList.remove('is-invalid');
          this.classList.add('is-valid');
      }
  });

  // Convertir automáticamente a mayúsculas
  curpInput.addEventListener('input', function () {
      this.value = this.value.toUpperCase();
  });
});

document.addEventListener('DOMContentLoaded', function () {
  const telCelularInput = document.getElementById('ine');

  telCelularInput.addEventListener('input', function () {
      let value = this.value.trim();
      let isValid = /^\d+$/.test(value) && value.length <= 1000000 && parseInt(value) > 0;

      if (!isValid) {
          this.classList.add('is-invalid');
      } else {
          this.classList.remove('is-invalid');
      }
  });
});

document.addEventListener('DOMContentLoaded', function () {
  const rutaCURPInput = document.getElementById('rutaCURP');
  const maxSizeInBytes = 5 * 1024 * 1024; // 5 MB (puedes ajustar este valor según tus necesidades)

  rutaCURPInput.addEventListener('change', function () {
      let fileSize = this.files[0].size;

      if (fileSize > maxSizeInBytes) {
          document.getElementById('fileSizeFeedback').style.display = 'block';
          this.classList.add('is-invalid');
          this.value = ''; // Limpiar el valor del input
      } else {
          document.getElementById('fileSizeFeedback').style.display = 'none';
          this.classList.remove('is-invalid');
      }
  });
});

document.addEventListener('DOMContentLoaded', function () {
  const rutaCURPInput = document.getElementById('rutaINE');
  const maxSizeInBytes = 5 * 1024 * 1024; // 5 MB (puedes ajustar este valor según tus necesidades)

  rutaCURPInput.addEventListener('change', function () {
      let fileSize = this.files[0].size;

      if (fileSize > maxSizeInBytes) {
          document.getElementById('fileSizeFeedback').style.display = 'block';
          this.classList.add('is-invalid');
          this.value = ''; // Limpiar el valor del input
      } else {
          document.getElementById('fileSizeFeedback').style.display = 'none';
          this.classList.remove('is-invalid');
      }
  });
});

document.addEventListener('DOMContentLoaded', function () {
  const rutaCURPInput = document.getElementById('rutaComDomicilio');
  const maxSizeInBytes = 5 * 1024 * 1024; // 5 MB (puedes ajustar este valor según tus necesidades)

  rutaCURPInput.addEventListener('change', function () {
      let fileSize = this.files[0].size;

      if (fileSize > maxSizeInBytes) {
          document.getElementById('fileSizeFeedback').style.display = 'block';
          this.classList.add('is-invalid');
          this.value = ''; // Limpiar el valor del input
      } else {
          document.getElementById('fileSizeFeedback').style.display = 'none';
          this.classList.remove('is-invalid');
      }
  });
});

// ESTUDIO SOCIOECONOMICO 

document.addEventListener('DOMContentLoaded', function () {
  const firstNameInput = document.getElementById('ocupacion');

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
  const firstNameInput = document.getElementById('fuenteIngresos');

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
  const numDecendenciaInput = document.getElementById('horasTrabajo');

  numDecendenciaInput.addEventListener('input', function () {
      let value = this.value.trim();
      let isValid = /^\d+$/.test(value); // Verifica si el valor contiene solo dígitos

      if (!isValid || value.length > 24) {
          this.classList.add('is-invalid');
      } else {
          this.classList.remove('is-invalid');
      }
  });
});

document.addEventListener('DOMContentLoaded', function () {
  const ingresosDiariosInput = document.getElementById('ingresosDiarios');

  ingresosDiariosInput.addEventListener('input', function () {
      let value = parseFloat(this.value);

      if (isNaN(value) || value < 0 || value > 100001) {
          this.classList.add('is-invalid');
          document.getElementById('ingresosDiariosFeedback').style.display = 'block';
      } else {
          this.classList.remove('is-invalid');
          document.getElementById('ingresosDiariosFeedback').style.display = 'none';
      }
  });
});

//DATOS DE VIVIENDA

document.addEventListener('DOMContentLoaded', function () {
const numDecendenciaInput = document.getElementById('personasCasa');

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
const numDecendenciaInput = document.getElementById('personasDormitorio');

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
  const firstNameInput = document.getElementById('dondeTrabajaPareja');

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

// Valoración de Violencia

document.addEventListener('DOMContentLoaded', function () {
  const firstNameInput = document.getElementById('situacionUsuaria');

  // Agregar un listener para el evento de entrada
  firstNameInput.addEventListener('input', function () {
    // Convertir el valor a mayúsculas
    this.value = this.value.toUpperCase();

    // Verificar si el texto cumple con las restricciones
    let regex = /^[a-zA-ZáéíóúÁÉÍÓÚ\s]{10,1000}$/;
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
  const firstNameInput = document.getElementById('tipoRelacion');

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
  const numDecendenciaInput = document.getElementById('tiempoViviendoPareja');

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
  const firstNameInput = document.getElementById('comochantajeado');

  // Agregar un listener para el evento de entrada
  firstNameInput.addEventListener('input', function () {
    // Convertir el valor a mayúsculas
    this.value = this.value.toUpperCase();

    // Verificar si el texto cumple con las restricciones
    let regex = /^[a-zA-ZáéíóúÁÉÍÓÚ\s]{3,100}$/;
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
    let regex = /^[a-zA-ZáéíóúÁÉÍÓÚÑñ\s]{10,1000}$/;
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
  const numDecendenciaInput = document.getElementById('numDecendencia');

  numDecendenciaInput.addEventListener('input', function () {
      let value = this.value.trim();
      let isValid = /^\d+$/.test(value); // Verifica si el valor contiene solo dígitos

      if (!isValid || value.length > 10000) {
          this.classList.add('is-invalid');
      } else {
          this.classList.remove('is-invalid');
      }
  });
});


