<?php
require_once __DIR__ . '/../pages/seccion.php';

?>
<?php
require_once __DIR__ . '/../db/config.php';

// Verificamos si se recibieron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibimos los datos del formulario
    $rol = !empty($_POST["rol"]) ? $_POST["rol"] : "SIN DATOS";
    $nombre = !empty($_POST["nombre"]) ? $_POST["nombre"] : "SIN DATOS";
    $apellido_paterno = !empty($_POST["apellido_paterno"]) ? $_POST["apellido_paterno"] : "SIN DATOS";
    $apellido_materno = !empty($_POST["apellido_materno"]) ? $_POST["apellido_materno"] : "SIN DATOS";
    $fecha_nacimiento = !empty($_POST["fecha_nacimiento"]) ? $_POST["fecha_nacimiento"] : "SIN DATOS";
    $calle = !empty($_POST["calle"]) ? $_POST["calle"] : "SIN DATOS";
    $num_interior = !empty($_POST["num_interior"]) ? $_POST["num_interior"] : "SIN DATOS";
    $num_exterior = !empty($_POST["num_exterior"]) ? $_POST["num_exterior"] : "SIN DATOS";
    $cp = !empty($_POST["cp"]) ? $_POST["cp"] : "SIN DATOS";
    $estado = !empty($_POST["estado"]) ? $_POST["estado"] : "SIN DATOS";
    $municipio = !empty($_POST["municipio"]) ? $_POST["municipio"] : "SIN DATOS";
    $colonia = !empty($_POST["colonia"]) ? $_POST["colonia"] : "SIN DATOS";
    $region = !empty($_POST["region"]) ? $_POST["region"] : "SIN DATOS";
    $pais_procedencia = !empty($_POST["pais_procedencia"]) ? $_POST["pais_procedencia"] : "SIN DATOS";
    $direccion_temporal = !empty($_POST["direccion_temporal"]) ? $_POST["direccion_temporal"] : "SIN DATOS";
    $sexo = !empty($_POST["sexo"]) ? $_POST["sexo"] : "SIN DATOS";
    $genero = !empty($_POST["genero"]) ? $_POST["genero"] : "SIN DATOS";
    $email = !empty($_POST["email"]) ? $_POST["email"] : "SIN DATOS";
    $tel = !empty($_POST["tel"]) ? $_POST["tel"] : "SIN DATOS";
    $nombre_contacto_emergencia = !empty($_POST["nombre_contacto_emergencia"]) ? $_POST["nombre_contacto_emergencia"] : "SIN DATOS";
    $tel_contacto_emergencia = !empty($_POST["tel_contacto_emergencia"]) ? $_POST["tel_contacto_emergencia"] : "SIN DATOS";
    $grado_academico = !empty($_POST["grado_academico"]) ? $_POST["grado_academico"] : "SIN DATOS";
    $institucion = !empty($_POST["institucion"]) ? $_POST["institucion"] : "SIN DATOS";
    $area_asignada = !empty($_POST["area_asignada"]) ? $_POST["area_asignada"] : "SIN DATOS";
    $estatus_personal = !empty($_POST["estatus_personal"]) ? $_POST["estatus_personal"] : "SIN DATOS";
    $fecha_ingreso = !empty($_POST["fecha_ingreso"]) ? $_POST["fecha_ingreso"] : "SIN DATOS";
    $fecha_termino = !empty($_POST["fecha_termino"]) ? $_POST["fecha_termino"] : "SIN DATOS";
    $clasificacion_personal = !empty($_POST["clasificacion_personal"]) ? $_POST["clasificacion_personal"] : "SIN DATOS";
    $problemas_salud_considerables = !empty($_POST["problemas_salud_considerables"]) ? $_POST["problemas_salud_considerables"] : "SIN DATOS";
    $problemas_movilidad = !empty($_POST["problemas_movilidad"]) ? $_POST["problemas_movilidad"] : "SIN DATOS";
    $observaciones = !empty($_POST["observaciones"]) ? $_POST["observaciones"] : "SIN DATOS";
    $password = !empty($_POST["password"]) ? $_POST["password"] : "SIN DATOS";

    // Encriptar la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);



// Manejo de la foto
    $foto = "SIN DATOS";
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        $carpetaDestino = "../uploads/personal/";
        if (!file_exists($carpetaDestino)) {
            mkdir($carpetaDestino, 0777, true);
        }
        $nombreArchivo = uniqid() . "_" . basename($_FILES["foto"]["name"]);
        $rutaArchivo = $carpetaDestino . $nombreArchivo;

        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $rutaArchivo)) {
            $foto = $nombreArchivo;
        }
    }


    try {
        // Preparamos la consulta SQL para insertar los datos
        $sql = "INSERT INTO Personal (ID_Rol, Nombre, ApellidoPaterno, ApellidoMaterno, FechaNacimiento, Calle, NumInterior, NumExterior, CP, Estado, Municipio, Colonia, Region, PaisProcedencia, DireccionTemporal, Sexo, Genero, Email, Tel, NombreContactoEmergencia, TelContactoEmergencia, GradoAcademico, Institucion, AreaAsignada, EstatusPersonal, FechaIngreso, FechaTermino, ClasificacionPersonal, ProblemasSaludConsiderables, ProblemasMovilidad, Observaciones,foto, Password) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        // Preparamos la sentencia
        $stmt = $conn->prepare($sql);
        
        // Vinculamos los parámetros
        $stmt->bindParam(1, $rol);
        $stmt->bindParam(2, $nombre);
        $stmt->bindParam(3, $apellido_paterno);
        $stmt->bindParam(4, $apellido_materno);
        $stmt->bindParam(5, $fecha_nacimiento);
        $stmt->bindParam(6, $calle);
        $stmt->bindParam(7, $num_interior);
        $stmt->bindParam(8, $num_exterior);
        $stmt->bindParam(9, $cp);
        $stmt->bindParam(10, $estado);
        $stmt->bindParam(11, $municipio);
        $stmt->bindParam(12, $colonia);
        $stmt->bindParam(13, $region);
        $stmt->bindParam(14, $pais_procedencia);
        $stmt->bindParam(15, $direccion_temporal);
        $stmt->bindParam(16, $sexo);
        $stmt->bindParam(17, $genero);
        $stmt->bindParam(18, $email);
        $stmt->bindParam(19, $tel);
        $stmt->bindParam(20, $nombre_contacto_emergencia);
        $stmt->bindParam(21, $tel_contacto_emergencia);
        $stmt->bindParam(22, $grado_academico);
        $stmt->bindParam(23, $institucion);
        $stmt->bindParam(24, $area_asignada);
        $stmt->bindParam(25, $estatus_personal);
        $stmt->bindParam(26, $fecha_ingreso);
        $stmt->bindParam(27, $fecha_termino);
        $stmt->bindParam(28, $clasificacion_personal);
        $stmt->bindParam(29, $problemas_salud_considerables);
        $stmt->bindParam(30, $problemas_movilidad);
        $stmt->bindParam(31, $observaciones);
        $stmt->bindParam(32, $foto);
        $stmt->bindParam(33, $hashed_password);

        // Ejecutamos la consulta
       $stmt->execute();
             header("Location: ../pages/ver-personal.php?status=success");
exit();
    } catch (PDOException $e) {
        // Manejar errores de manera adecuada
       header("Location: ../pages/ver-personal.php?status=error&msg=" . urlencode($e->getMessage()));
exit();
    }

    // Cerramos la conexión
    $conn = null;
}
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">
    <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Registro de Personal</title>
    <script src="register.js"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/checkout/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos del Formulario-->
    <link href="checkout.css" rel="stylesheet">
    </head>


    <body class="bg-body-tertiary">
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
      <symbol id="check2" viewBox="0 0 16 16">
        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
      </symbol>
      <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
      </symbol>
      <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
      </symbol>
      <symbol id="sun-fill" viewBox="0 0 16 16">
        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
      </symbol>
    </svg>




<?php
require_once __DIR__ . '/../pages/header.php';
?>




    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
      <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
              id="bd-theme"
              type="button"
              aria-expanded="false"
              data-bs-toggle="dropdown"
              aria-label="Toggle theme (auto)">
        <svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#circle-half"></use></svg>
        <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
      </button>
      <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
            <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#sun-fill"></use></svg>
            Light
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
            <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#moon-stars-fill"></use></svg>
            Dark
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
            <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#circle-half"></use></svg>
            Auto
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
      </ul>
    </div>

    
        <div class="container">
        <main>
    <div class="py-5 text-center">
    <img class="d-block mx-auto mb-4" src="../assets/img/logo 1.png" alt="" width="100" height="100">
        <h2>Registro de Personal </h2>
        <p class="lead"></p>
    </div>

    <div class="row g-5">
    <div class="col-xxl-12 col-xxl-12">
        <h4 class="mb-3">Datos Generales</h4>
        <form class="needs-validation" action="register-personal.php" method="POST" enctype="multipart/form-data"  novalidate>
    <div class="row g-3">

            
    <div class="col-sm-12">
        <label for="firstName" class="form-label">Nombre:</label>
        <input type="text" class="form-control" id="firstName" name="nombre" placeholder="" required>
    <div class="invalid-feedback">Se requiere un nombre válido.</div>
    </div>

<div class="mb-3">
  <label class="form-label">Foto</label><br>
  <?php if (!empty($ponente['Foto'])): ?>
    <img src="../uploads/ponentes/<?= htmlspecialchars($ponente['Foto']) ?>" 
         alt="Foto actual" width="100"><br><br>
  <?php endif; ?>
  <input type="file" name="foto" class="form-control">
</div>

    <div class="col-sm-6">
        <label for="lastName" class="form-label">Apellido Paterno:</label>
        <input type="text" class="form-control" id="lastName" name="apellido_paterno" placeholder="" >
        <div class="invalid-feedback">Se requiere un apellido paterno válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="secondLastName" class="form-label">Apellido Materno:</label>
        <input type="text" class="form-control" id="secondLastName" name="apellido_materno" placeholder="" >
        <div class="invalid-feedback">Se requiere un apellido materno válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="birthdate" class="form-label">Fecha de Nacimiento:</label>
        <input type="date" class="form-control" id="birthdate" name="fecha_nacimiento" placeholder="" >
        <div class="invalid-feedback">Se requiere una fecha de nacimiento válida.</div>
    </div>

    <div class="col-sm-6">
        <label for="sexo" class="form-label">Sexo</label>
        <select class="form-select" id="sexo" name="sexo" aria-label="Selecciona una opción" >
        <option selected disabled value="">Selecciona una opción...</option>
        <option value="MASCULINO">Masculino</option>
        <option value="FEMENINO">Femenino</option>
        <option value="OTRO">Otro</option>
        </select>
        <div class="invalid-feedback">Se requiere una selección válida.</div>
    </div>

    <div class="col-sm-6">
        <label for="genero" class="form-label">Género</label>
        <select class="form-select" id="genero" name="genero" aria-label="Selecciona una opción" >
        <option selected disabled value="">Selecciona una opción...</option>
        <option value="CISGÉNERO ">CISGÉNERO </option>
        <option value="TRANSGÉNERO">TRANSGÉNERO</option>
        <option value="TRANSGÉNERO">GÉNERO FLUIDO </option>
        <option value="TERCER GÉNERO">TERCER GÉNERO</option>
        <option value="OTRO">Otro</option>
        </select>
        <div class="invalid-feedback">Se requiere una selección válida.</div>
    </div>

    <h4>Datos de Domicilio</h4>
        <hr class="my-4">

    <div class="col-sm-6">
        <label for="calle" class="form-label">Calle</label>
        <input type="text" class="form-control" id="calle" name="calle" placeholder="">
        <div class="invalid-feedback">Se requiere una calle válida.</div>
    </div>

    <div class="col-sm-6">
        <label for="num_interior" class="form-label">Número interior</label>
        <input type="number" class="form-control" id="num_interior" name="num_interior" placeholder="">
        <div class="invalid-feedback">Se requiere un número interior válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="num_exterior" class="form-label">Número exterior</label>
        <input type="number" class="form-control" id="num_exterior" name="num_exterior" placeholder="">
        <div class="invalid-feedback">Se requiere un número exterior válido.</div>
    </div>







     <input type="hidden" id="selected_region_id">
        <input type="hidden" id="selected_distrito_id">
        <input type="hidden" id="selected_municipio_id">
        <input type="hidden" id="selected_localidad_id"> 


        <div class="col-sm-6">
  <label for="cp" class="form-label">Código Postal (CP)</label>
  <input type="number" max="100000" min="1" class="form-control" id="cp" name="cp" placeholder="">
  <div class="invalid-feedback">Se requiere un código postal válido.</div>
</div>

        <div class="col-sm-6">

            <label for="input_region" class="form-label">Región:</label>
            <input type="text" class="form-control" id="input_region" name="region" placeholder="Escribe para buscar región..." autocomplete="off">
            <div class="sugerencias" id="sug_region"></div>
        </div>

        <div class="col-sm-6">
            <label for="input_distrito" class="form-label">Distrito:</label>
            <input type="text" id="input_distrito" class="form-control" placeholder="Escribe para buscar distrito..." autocomplete="off">
            <div class="sugerencias" id="sug_distrito"></div>
        </div>

        <div class="col-sm-6">
            <label for="input_municipio" class="form-label">Municipio:</label>
            <input type="text" id="input_municipio" class="form-control" name="municipio" placeholder="Escribe para buscar municipio..." autocomplete="off">
            <div class="sugerencias" id="sug_municipio"></div>
        </div>

        <div class="col-sm-6">
            <label for="input_localidad" class="form-label">Localidad:</label>
            <input type="text" id="input_localidad" class="form-control" name="colonia" placeholder="Escribe el nombre de la localidad..." autocomplete="off">
            <div class="sugerencias" id="sug_localidad"></div>
        </div>

        <div id="detalles" style="display: none;">
           
            <p><strong>Localidad:</strong> <span id="res_localidad"></span></p>
            <p><strong>Municipio:</strong> <span id="res_municipio"></span></p>
            <p><strong>Distrito:</strong> <span id="res_distrito"></span></p>
            <p><strong>Región:</strong> <span id="res_region"></span></p>
        </div>











  <script>
        // --- Referencias a los elementos ---
        const inputs = {
            region: document.getElementById('input_region'),
            distrito: document.getElementById('input_distrito'),
            municipio: document.getElementById('input_municipio'),
            localidad: document.getElementById('input_localidad')
        };
        const suggestions = {
            region: document.getElementById('sug_region'),
            distrito: document.getElementById('sug_distrito'),
            municipio: document.getElementById('sug_municipio'),
            localidad: document.getElementById('sug_localidad')
        };
        const selectedIds = {
            region: document.getElementById('selected_region_id'),
            distrito: document.getElementById('selected_distrito_id'),
            municipio: document.getElementById('selected_municipio_id'),
            localidad: document.getElementById('selected_localidad_id') // Añadido
        };

        // --- LÓGICA DE BÚSQUEDA (keyup) ---

        inputs.region.addEventListener('keyup', e => handleSearch('region', e.target.value));
        inputs.distrito.addEventListener('keyup', e => handleSearch('distrito', e.target.value));
        inputs.municipio.addEventListener('keyup', e => handleSearch('municipio', e.target.value));
        inputs.localidad.addEventListener('keyup', e => handleSearch('localidad', e.target.value));

        async function handleSearch(type, query) {
            // Limpia sugerencias si la búsqueda es muy corta o vacía
            if (query.length < 2) {
                suggestions[type].innerHTML = '';
                // Si el campo se vació manualmente, también resetea su ID oculto y los hijos
                if (query.length === 0) {
                     if(selectedIds[type]) {
                        selectedIds[type].value = '';
                    }
                    resetChildren(type);
                }
                return;
            }

            // Construye parámetros base
            const params = new URLSearchParams({ type: type, q: query });

            // --- Lógica de filtrado en cascada ---
            // Añade IDs de niveles superiores a los parámetros si existen
            if (type === 'distrito' && selectedIds.region.value) {
                params.append('region_id', selectedIds.region.value);
            }
            if (type === 'municipio') {
                 if (selectedIds.distrito.value) params.append('distrito_id', selectedIds.distrito.value);
                 else if (selectedIds.region.value) params.append('region_id', selectedIds.region.value); // Filtro por región si no hay distrito
            }
            if (type === 'localidad') {
                if (selectedIds.municipio.value) params.append('municipio_id', selectedIds.municipio.value);
                else if (selectedIds.distrito.value) params.append('distrito_id', selectedIds.distrito.value);
                else if (selectedIds.region.value) params.append('region_id', selectedIds.region.value);
            }

            try {
                // Llama a la API
                const response = await fetch(`./api.php?${params.toString()}`);
                 if (!response.ok) { // Verifica si la respuesta HTTP fue exitosa
                    throw new Error(`Error ${response.status}: ${response.statusText}`);
                 }
                const data = await response.json();
                 // Verifica si la respuesta JSON contiene un error del backend
                 if (data.error) {
                    console.error("Error del backend:", data.error);
                    suggestions[type].innerHTML = `<div>Error: ${data.error}</div>`; // Muestra error en sugerencias
                 } else {
                    mostrarSugerencias(type, data); // Muestra sugerencias si todo ok
                 }
            } catch (error) {
                // Captura errores de red o de parseo JSON
                console.error("Error en fetch o procesando JSON:", error);
                suggestions[type].innerHTML = `<div>Error al buscar: ${error.message}</div>`; // Muestra error
            }
        }

        // --- FUNCIÓN genérica para mostrar sugerencias (ACTUALIZADA) ---
        function mostrarSugerencias(type, data) {
            const sugBox = suggestions[type];
            sugBox.innerHTML = ''; // Limpia sugerencias anteriores

            // Verifica si data es un array; si no, muestra mensaje o error
            if (!Array.isArray(data)) {
                 console.warn("La respuesta de la API no es un array:", data);
                 sugBox.innerHTML = '<div>No se recibieron sugerencias válidas.</div>';
                 return;
            }
            if (data.length === 0) {
                 sugBox.innerHTML = '<div>No hay coincidencias.</div>';
                 return;
            }


            data.forEach(item => {
                const div = document.createElement('div');
                // Determina el ID correcto a usar según el tipo y los nombres de columna de tu API
                let id_value = item.id_region || item.id_distrito || item.id_municipio_inegi || item.id_asentamiento;

                // Asegura que item.nombre exista antes de usarlo
                div.innerHTML = `<strong>${item.nombre || 'Nombre no disponible'}</strong>`;

                // Añadir info extra si es localidad (asentamiento)
                if (type === 'localidad' && item.tipo_asentamiento) {
                     div.innerHTML += `<small>${item.tipo_asentamiento} - CP: ${item.codigo_postal || 'N/A'}</small>`;
                }

                // Añade el listener SOLO si id_value es válido
                if (id_value !== undefined && id_value !== null) {
                    // Pasamos type, el objeto item completo y el id_value extraído
                    div.addEventListener('click', () => handleSuggestionClick(type, item, id_value));
                } else {
                    console.warn("Item sin ID válido encontrado:", item); // Advertencia si un item no tiene ID
                }
                sugBox.appendChild(div);
            });
        }

        // --- FUNCIÓN genérica para manejar clic en sugerencia (ACTUALIZADA) ---
        async function handleSuggestionClick(type, itemData, id) { // Recibe el ID extraído también
            console.log(`Clic en sugerencia - Tipo: ${type}, ID: ${id}, Nombre: ${itemData.nombre}`); // <-- DEBUG

            // 1. Limpiar todas las cajas de sugerencias
            Object.values(suggestions).forEach(sug => sug.innerHTML = '');

            // 2. Ocultar el panel de detalles (se mostrará después si aplica)
            document.getElementById('detalles').style.display = 'none';

            // *** 3. Rellenar el campo clickeado INMEDIATAMENTE ***
            inputs[type].value = itemData.nombre; // Usa el nombre del item clickeado
            // Guardar ID seleccionado en el campo oculto correspondiente
            if (selectedIds[type]) {
                selectedIds[type].value = id;
            }
             // Si se hizo clic en un nivel superior, limpiar los hijos AHORA para evitar búsquedas con filtros incorrectos
             resetChildren(type);


            // 4. Llamar a la API para obtener TODOS los detalles y rellenar campos
            console.log(`Fetching details for ${type} with ID: ${id}`); // <-- DEBUG
            await fetchFullDetails(type, id); // Llama siempre para asegurar consistencia y rellenar todo
        }

        // --- FUNCIÓN para obtener detalles y rellenar todo (SIN CAMBIOS RESPECTO A LA ANTERIOR) ---
        async function fetchFullDetails(type, id) {
            // Construye el nombre del parámetro esperado por api.php (ej: 'municipio_id')
            const paramName = (type === 'localidad') ? 'localidad_id' : `${type}_id`;

            try {
                const response = await fetch(`./api.php?type=get_full_details&${paramName}=${id}`);
                if (!response.ok) {
                    throw new Error(`Error ${response.status}: ${response.statusText}`);
                }
                const details = await response.json();
                if (details.error) {
                     console.error("Error del backend en get_full_details:", details.error);
                     // Podrías mostrar un mensaje al usuario aquí
                } else {
                    // 4. Rellenar todos los campos con la información obtenida
                    populateFields(details);
                }
            } catch (error) {
                 console.error("Error en fetchFullDetails:", error);
                 // Podrías mostrar un mensaje al usuario aquí
            }
        }


       // --- FUNCIÓN para rellenar los campos (ACTUALIZADA CON DEBUG) ---
       // --- FUNCIÓN para rellenar los campos (ACTUALIZADA CON CP) ---
function populateFields(details) {
    console.log("Datos recibidos para rellenar:", details); // DEBUG

    // Región
    if (details.region_id !== undefined && details.region_nombre !== undefined) {
        inputs.region.value = details.region_nombre || '';
        selectedIds.region.value = details.region_id || '';
    } else {
        inputs.region.value = '';
        selectedIds.region.value = '';
    }

    // Distrito
    if (details.distrito_id !== undefined && details.distrito_nombre !== undefined) {
        inputs.distrito.value = details.distrito_nombre || '';
        selectedIds.distrito.value = details.distrito_id || '';
    } else {
        inputs.distrito.value = '';
        selectedIds.distrito.value = '';
    }

    // Municipio
    if (details.municipio_id !== undefined && details.municipio_nombre !== undefined) {
        inputs.municipio.value = details.municipio_nombre || '';
        selectedIds.municipio.value = details.municipio_id || '';
    } else {
        inputs.municipio.value = '';
        selectedIds.municipio.value = '';
    }

    // Localidad
    if (details.localidad_id !== undefined && details.localidad_nombre !== undefined) {
        inputs.localidad.value = details.localidad_nombre || '';
        selectedIds.localidad.value = details.localidad_id || '';
    } else {
        inputs.localidad.value = '';
        selectedIds.localidad.value = '';
    }

    // --- NUEVO: Código Postal ---
    if (details.codigo_postal !== undefined && details.codigo_postal !== null) {
        document.getElementById('cp').value = details.codigo_postal;
    } else {
        document.getElementById('cp').value = '';
    }

    // Mostrar detalles
    if (details.localidad_id !== null && details.localidad_id !== undefined) {
        document.getElementById('res_localidad').textContent = details.localidad_nombre || 'N/A';
        document.getElementById('res_municipio').textContent = details.municipio_nombre || 'N/A';
        document.getElementById('res_distrito').textContent = details.distrito_nombre || 'N/A';
        document.getElementById('res_region').textContent = details.region_nombre || 'N/A';
        // Añadir info extra si existe
        let detallesExtra = '';
        if (details.tipo_asentamiento) detallesExtra += ` (${details.tipo_asentamiento})`;
        if (details.codigo_postal) detallesExtra += ` - CP: ${details.codigo_postal}`;
        document.getElementById('res_localidad').textContent += detallesExtra;

        document.getElementById('detalles').style.display = 'block';
    } else {
        document.getElementById('detalles').style.display = 'none';
    }
}


        // --- FUNCIÓN para resetear campos hijos ---
        function resetChildren(typeChanged) {
             console.log(`Reseteando hijos de ${typeChanged}`); // <-- DEBUG
             document.getElementById('detalles').style.display = 'none'; // Oculta detalles siempre
             // Define la jerarquía para saber qué limpiar
             const hierarchy = ['region', 'distrito', 'municipio', 'localidad'];
             const startIndex = hierarchy.indexOf(typeChanged);

             // Si se encontró el tipo y no es el último nivel
             if (startIndex > -1 && startIndex < hierarchy.length - 1) {
                // Itera sobre los niveles inferiores
                for (let i = startIndex + 1; i < hierarchy.length; i++) {
                    const childType = hierarchy[i];
                    if (inputs[childType]) {
                        inputs[childType].value = ''; // Limpia input visible
                        inputs[childType].placeholder = `Escribe para buscar ${childType}...`; // Restaura placeholder si es necesario
                    }
                    if (selectedIds[childType]) {
                        selectedIds[childType].value = ''; // Limpia ID oculto
                    }
                     if (suggestions[childType]) {
                        suggestions[childType].innerHTML = ''; // Limpia sugerencias hijas
                    }
                }
             }
             // Si se borra la localidad, solo ocultamos detalles (ya hecho arriba)
        }

       // --- ¡NUEVA! Función para limpiar todos los campos (se puede llamar si necesitas un botón "Limpiar todo") ---
         function resetFields() {
             Object.values(inputs).forEach(input => input.value = '');
             Object.values(selectedIds).forEach(hidden => hidden.value = '');
             Object.values(suggestions).forEach(sug => sug.innerHTML = ''); // Limpia todas las sugerencias
             document.getElementById('detalles').style.display = 'none';
             console.log("Todos los campos reseteados."); // <-- DEBUG
        }

    </script>
   



    <div class="col-sm-6">
        <label for="estado" class="form-label">Estado</label>
        <input type="text" class="form-control" id="estado" name="estado" placeholder="" value="OAXACA">
        <div class="invalid-feedback">Se requiere un estado válido.</div>
    </div>

    <div class="col-sm-6">
  <label for="pais_procedencia" class="form-label">PAÍS DE PROCEDENCIA</label>
  <select class="form-select" id="pais_procedencia" name="pais_procedencia" >
    <option value="">SELECCIONA UN PAÍS</option>
    <option value="MÉXICO" selected>MÉXICO</option>
    <option value="GUATEMALA">GUATEMALA</option>
    <option value="BELICE">BELICE</option>
    <option value="EL SALVADOR">EL SALVADOR</option>
    <option value="HONDURAS">HONDURAS</option>
    <option value="NICARAGUA">NICARAGUA</option>
    <option value="COSTA RICA">COSTA RICA</option>
    <option value="PANAMÁ">PANAMÁ</option>
    <option value="CUBA">CUBA</option>
    <option value="REPÚBLICA DOMINICANA">REPÚBLICA DOMINICANA</option>
    <option value="PUERTO RICO">PUERTO RICO</option>
    <option value="COLOMBIA">COLOMBIA</option>
    <option value="VENEZUELA">VENEZUELA</option>
    <option value="ECUADOR">ECUADOR</option>
    <option value="PERÚ">PERÚ</option>
    <option value="BOLIVIA">BOLIVIA</option>
    <option value="PARAGUAY">PARAGUAY</option>
    <option value="CHILE">CHILE</option>
    <option value="ARGENTINA">ARGENTINA</option>
    <option value="URUGUAY">URUGUAY</option>
    <option value="BRASIL">BRASIL</option>
    <option value="ESTADOS UNIDOS">ESTADOS UNIDOS</option>
    <option value="CANADÁ">CANADÁ</option>
    <option value="ESPAÑA">ESPAÑA</option>
    <option value="PORTUGAL">PORTUGAL</option>
    <option value="FRANCIA">FRANCIA</option>
    <option value="ITALIA">ITALIA</option>
    <option value="ALEMANIA">ALEMANIA</option>
    <option value="REINO UNIDO">REINO UNIDO</option>
    <option value="PAÍSES BAJOS">PAÍSES BAJOS</option>
    <option value="SUIZA">SUIZA</option>
    <option value="SUECIA">SUECIA</option>
    <option value="NORUEGA">NORUEGA</option>
    <option value="FINLANDIA">FINLANDIA</option>
    <option value="DINAMARCA">DINAMARCA</option>
    <option value="RUSIA">RUSIA</option>
    <option value="CHINA">CHINA</option>
    <option value="JAPÓN">JAPÓN</option>
    <option value="COREA DEL SUR">COREA DEL SUR</option>
    <option value="INDIA">INDIA</option>
    <option value="FILIPINAS">FILIPINAS</option>
    <option value="VIETNAM">VIETNAM</option>
    <option value="TAILANDIA">TAILANDIA</option>
    <option value="INDONESIA">INDONESIA</option>
    <option value="MALASIA">MALASIA</option>
    <option value="SINGAPUR">SINGAPUR</option>
    <option value="AUSTRALIA">AUSTRALIA</option>
    <option value="NUEVA ZELANDA">NUEVA ZELANDA</option>
    <option value="MARRUECOS">MARRUECOS</option>
    <option value="EGIPTO">EGIPTO</option>
    <option value="SUDÁFRICA">SUDÁFRICA</option>
    <option value="NIGERIA">NIGERIA</option>
    <option value="GHANA">GHANA</option>
    <option value="ETIOPÍA">ETIOPÍA</option>
    <option value="KENIA">KENIA</option>
    <option value="TURQUÍA">TURQUÍA</option>
    <option value="ISRAEL">ISRAEL</option>
    <option value="ARABIA SAUDITA">ARABIA SAUDITA</option>
    <option value="EMIRATOS ÁRABES UNIDOS">EMIRATOS ÁRABES UNIDOS</option>
    <option value="IRÁN">IRÁN</option>
    <option value="PAKISTÁN">PAKISTÁN</option>
    <option value="OTRO">OTRO</option>
  </select>
  <div class="invalid-feedback">SE REQUIERE UN PAÍS DE PROCEDENCIA VÁLIDO.</div>
</div>


    <div class="col-sm-6">
        <label for="direccion_temporal" class="form-label">Dirección Temporal</label>
        <input type="text" class="form-control" id="direccion_temporala" name="direccion_temporal" placeholder="" >
        <div class="invalid-feedback">Se requiere una Dirección Temporal válida.</div>
    </div>

    <h4>Datos de Contacto</h4>
            <hr class="my-4">

    <div class="col-sm-6">
        <label for="tel" class="form-label">Teléfono celular</label>
        <input type="text" class="form-control" id="tel" name="tel" placeholder="">
        <div class="invalid-feedback">Se requiere un número de teléfono celular válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="email" class="form-label">Correo electrónico</label>
        <div class="input-group has-validation">
        <span class="input-group-text">@</span>
        <input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico">
        <div class="invalid-feedback">Se requiere una dirección de correo electrónico válida.</div>
        </div>
    </div>

    <div class="col-sm-6">
        <label for="nombre_contacto_emergencia" class="form-label">Nombre de Contacto de Emergencia</label>
        <input type="text" class="form-control" id="nombre_contacto_emergencia" name="nombre_contacto_emergencia" placeholder="">
        <div class="invalid-feedback">Se requiere un Contacto de Emergencia válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="ttel_contacto_emergencia" class="form-label">Teléfono de Contacto de Emergencia</label>
        <input type="text" class="form-control" id="tel_contacto_emergencia" name="tel_contacto_emergencia" placeholder="">
        <div class="invalid-feedback">Se requiere un número de teléfono de confianza válido.</div>
    </div>

    <h4>Datos Laborales</h4>
        <hr class="my-4">

    <div class="col-sm-6">
  <label for="grado_academico" class="form-label">GRADO ACADÉMICO</label>
  <select class="form-select" id="grado_academico" name="grado_academico" >
    <option value="">SELECCIONA UN GRADO ACADÉMICO</option>
    <option value="SIN ESTUDIOS">SIN ESTUDIOS</option>
    <option value="PRIMARIA INCOMPLETA">PRIMARIA INCOMPLETA</option>
    <option value="PRIMARIA COMPLETA">PRIMARIA COMPLETA</option>
    <option value="SECUNDARIA INCOMPLETA">SECUNDARIA INCOMPLETA</option>
    <option value="SECUNDARIA COMPLETA">SECUNDARIA COMPLETA</option>
    <option value="PREPARATORIA O BACHILLERATO INCOMPLETO">PREPARATORIA O BACHILLERATO INCOMPLETO</option>
    <option value="PREPARATORIA O BACHILLERATO COMPLETO">PREPARATORIA O BACHILLERATO COMPLETO</option>
    <option value="TÉCNICO O TECNÓLOGO">TÉCNICO O TECNÓLOGO</option>
    <option value="LICENCIATURA INCOMPLETA">LICENCIATURA INCOMPLETA</option>
    <option value="LICENCIATURA COMPLETA">LICENCIATURA COMPLETA</option>
    <option value="POSGRADO (MAESTRÍA)">POSGRADO (MAESTRÍA)</option>
    <option value="POSGRADO (DOCTORADO)">POSGRADO (DOCTORADO)</option>
    <option value="OTRO">OTRO</option>
  </select>
  <div class="invalid-feedback">SE REQUIERE UN GRADO ACADÉMICO VÁLIDO.</div>
</div>

    <!-- <div class="col-sm-6">
        <label for="puesto" class="form-label">Puesto</label>
        <input type="text" class="form-control" id="puesto" name="puesto" placeholder="">
        <div class="invalid-feedback">Se requiere un Puesto válido.</div>
    </div> -->

 <div class="col-sm-6">
    <label for="institucion" class="form-label">INSTITUCIÓN PROVENIENTE</label>
    <select class="form-select" id="institucionn" name="institucion" >
        <option value="">SELECCIONA UNA INSTITUCIÓN</option>
        <?php
        require_once "../db/config.php"; // Ajusta la ruta
        $stmt = $conn->query("SELECT NombreInstitucion FROM instituciones ORDER BY NombreInstitucion ASC");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $nombre = htmlspecialchars($row['NombreInstitucion'], ENT_QUOTES, 'UTF-8');
            echo "<option value='$nombre'>$nombre</option>";
        }
        ?>
        <option value="OTRO">OTRO</option>
    </select>
    <div class="invalid-feedback">SE REQUIERE UNA INSTITUCIÓN VÁLIDA.</div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const institucionSelect = document.getElementById('institucionn');

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
</script>


    
    <!-- <div class="col-sm-6">
        <label for="area_asignada" class="form-label">Área Asignada</label>
        <input type="text" class="form-control" id="area_asignada" name="area_asignada" placeholder="">
        <div class="invalid-feedback">Se requiere una Área Asignada válido.</div>
    </div> -->

    <div class="col-sm-6">
        <label for="area_asignada" class="form-label">Área Asignada</label>
        <select class="form-select" id="area_asignada" name="area_asignada" aria-label="Selecciona una opción" >
        <option selected disabled value="">Selecciona una opción...</option>
        <option value="PSICOLÓGICA">PSICOLÓGICA</option>
        <option value="JURÍDICA">JURÍDICA</option>
        <option value="MÉDICA">MÉDICA</option>
        <option value="PROYECTOS">PROYECTOS </option>
        <option value="MOVIMIENTO SOCIAL">MOVIMIENTO SOCIAL</option>
        <option value="ENLACE ESTRATÉGICO">ENLACE ESTRATÉGICO</option>
        <option value="DIRECCIÓN">DIRECCIÓN</option>
        <option value="DIRECCIÓN COLEGIADA">DIRECCIÓN COLEGIADA</option>
        <option value="MONITOREO Y EVALUACIÓN">MONITOREO Y EVALUACIÓN</option>
        <option value="FINANZAS">FINANZAS</option>
        <option value="COORDINACIÓN">COORDINACIÓN</option>
        <option value="COMUNICACIÓN">COMUNICACIÓN</option>
        <option value="TI">TI</option>
        <option value="OTRO">Otro</option>
        </select>
        <div class="invalid-feedback">Se requiere una selección válida.</div>
    </div>

    <!-- <div class="col-sm-6">
        <label for="estatus_personal" class="form-label">Estatus Personal</label>
        <input type="text" class="form-control" id="estatus_personal" name="estatus_personal" placeholder="">
        <div class="invalid-feedback">Se requiere un Estatus Personal válido.</div>
    </div> -->

    <div class="col-sm-6">
        <label for="clasificacion_personal" class="form-label">Clasificación Personal</label>
        <select class="form-select" id="clasificacion_personal" name="clasificacion_personal" aria-label="Selecciona una opción" >
        <option selected disabled value="">Selecciona una opción...</option>
        <option value="BASE">BASE</option>
        <option value="JÓVENES CONSTRUYENDO EL FUTURO">JÓVENES CONSTRUYENDO EL FUTURO (JCF)</option>
        <option value="MI PRIMERA CHAMBA ">MI PRIMERA CHAMBA</option>
        <option value="VOLUNTARIADO">VOLUNTARIADO</option>
        <option value="SERVICIO SOCIAL">SERVICIO SOCIAL</option>
        <option value="PRÁCTICAS PROFESIONALES">PRÁCTICAS PROFESIONALES</option>
        <option value="ESTADÍAS PROFESIONALES">ESTADÍAS PROFESIONALES</option>
        <option value="INTERCAMBIO">INTERCAMBIO</option>
        <option value="PASANTÍAS">PASANTÍAS</option>
        <option value="INVESTIGACIÓN">INVESTIGACIÓN</option>
        <option value="OTRO">Otro</option>
        </select>
        <div class="invalid-feedback">Se requiere una selección válida.</div>
    </div>

    <div class="col-sm-6">
        <label for="becha_ingreso" class="form-label">Fecha de Ingreso</label>
        <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" placeholder="">
        <div class="invalid-feedback">Se requiere una Fecha de Ingreso válida.</div>
    </div>

    <div class="col-sm-6">
        <label for="fecha_termino" class="form-label">Fecha de Término</label>
        <input type="date" class="form-control" id="fecha_termino" name="fecha_termino" placeholder="">
        <div class="invalid-feedback">Se requiere una Fecha de Término válida.</div>
    </div>

    <!-- <div class="col-sm-6">
        <label for="clasificacion_personal" class="form-label">Clasificación Personal</label>
        <input type="text" class="form-control" id="clasificacion_personal" name="clasificacion_personal" placeholder="">
        <div class="invalid-feedback">Se requiere una Clasificación Personal válido.</div>
    </div> -->

    <div class="col-sm-6">
        <label for="estatus_personal" class="form-label">Estatus del Personal</label>
        <select class="form-select" id="estatus_personal" name="estatus_personal" aria-label="Selecciona una opción" >
        <option selected disabled value="">Selecciona una opción...</option>
        <option value="ACTIVO">ACTIVO</option>
        <option value="INACTIVO">INACTIVO</option>
        <option value="BAJA">BAJA</option>
        <option value="CONCLUIDO">CONCLUIDO</option>
        </select>
        <div class="invalid-feedback">Se requiere una selección válida.</div>
    </div>

    <h4>Datos Extras</h4>
        <hr class="my-4">

    <div class="col-sm-6">
        <label for="problemas_salud_considerables" class="form-label">Problemas de Salud Considerables</label>
        <input type="text" class="form-control" id="problemas_salud_considerables" name="problemas_salud_considerables" placeholder="En caso de no tener observaciones relevantes, por favor omítalo.">
        <div class="invalid-feedback">Se requiere Problemas de Salud Considerables válido.</div>
    </div>

    <div class="col-sm-6">
        <label for="problemas_movilidad" class="form-label">Problemas de Movilidad</label>
        <input type="text" class="form-control" id="problemas_movilidad" name="problemas_movilidad" placeholder="En caso de no tener observaciones relevantes, por favor omítalo.">
        <div class="invalid-feedback">Se requiere Problemas de Movilidad válido.</div>
    </div>
 
    <div class="col-sm-12">
    <div class="mb-3">
        <label for="observaciones" class="form-label">Observaciones</label>
        <textarea class="form-control" id="observaciones" name="observaciones" rows="3" placeholder="Si no tiene comentarios, puede omitir este campo."></textarea>
    </div>
    <div class="invalid-feedback">Por favor, proporcione una Observacion válida.</div>
    </div>

    <div class="col-sm-12">
    <label for="rol" class="form-label">Rol:</label>
        <select name="rol" class="form-select"  id="rol">
    <?php
      require_once __DIR__ . '/../db/config.php';
        
        try {
            // Crear conexión a la base de datos
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            // Establecer el modo de error para lanzar excepciones en caso de errores
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Consulta para obtener los roles disponibles
            $sql = "SELECT ID_Rol, Descripcion FROM Rol";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            // Si hay resultados, mostrar opciones en el select
            if ($stmt->rowCount() > 0) {
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . $row['ID_Rol'] . "'>" . $row['Descripcion'] . "</option>";
                }
            } else {
                echo "<option value=''>No hay roles disponibles</option>";
            }
        } catch(PDOException $e) {
            // Manejar errores de manera adecuada
            echo "<option value=''>Error al obtener los roles</option>";
            // Puedes mostrar el mensaje de error si necesitas depurar el problema
            // echo "Error: " . $e->getMessage();
        }
    ?>
</select>

    </div>
    <div class="col-sm-12">
    <div class="mb-3">
        <label for="password" class="col-form-label">Contraseña</label>
        <input type="password" id="password" class="form-control" name="password" aria-describedby="passwordHelpInline" >
        <div class="invalid-feedback">Se requiere Problemas de Movilidad válido.</div>
    </div>

    <div class="col-auto">
        <span id="passwordHelpInline" class="form-text">Contraseña con la cual ingresara el personal al sistema.</span>
    </div>
    </div>

            <hr class="my-4">

    <button class="w-100 btn btn-primary btn-lg" type="submit" >Registrar</button>
    </form>
    </div>
    </div>
    </main>

        <footer class="my-5 pt-5 text-body-secondary text-center text-small">
            <p class="mb-1">&copy;Copyright GESMujer © 2024 </p>
                <ul class="list-inline">
                </ul>
        </footer>
    </div>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="checkout.js"></script></body>
    <script src="regiones.js"></script>
    <script src="vV-personal.js"></script>


        </html>
