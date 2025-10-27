<?php
require_once __DIR__ . '/../pages/seccion.php';
require_once __DIR__ . '/../db/config.php';

// Validar ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID de feminicidio inválido");
}

$id = (int) $_GET['id'];

// Si se envía el formulario (actualización)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $sql = "UPDATE Feminicidios SET 
            FechaHecho = :FechaHecho,
            NombreVictima = :NombreVictima,
            ApellidoPaterno = :ApellidoPaterno,
            ApellidoMaterno = :ApellidoMaterno,
            Edad = :Edad,
            Ocupacion = :Ocupacion,
            LugarOrigen = :LugarOrigen,
            Calle = :Calle,
            Numero = :Numero,
            Municipio = :Municipio,
            ClaveMunicipio = :ClaveMunicipio,
            Region = :Region,
            Estado = :Estado,
            AlertaGenero = :AlertaGenero,
            Desaparecida = :Desaparecida,
            FechaDesaparicion = :FechaDesaparicion,
            LugarEncontradoCuerpo = :LugarEncontradoCuerpo,
            DescripcionCuerpo = :DescripcionCuerpo,
            FormaMuerte = :FormaMuerte,
            TipoArma = :TipoArma,
            Causas = :Causas,
            Descendencia = :Descendencia,
            NumDescendencia = :NumDescendencia,
            NombreAgresor = :NombreAgresor,
            ParentescoAgresor = :ParentescoAgresor,
            FuentePeriodistica = :FuentePeriodistica,
            AutorNota = :AutorNota,
            LinkNota = :LinkNota,
            IDCasoAnual = :IDCasoAnual,
            NumAveriguacion = :NumAveriguacion,
            SituacionJuridica = :SituacionJuridica,
            Latitud = :Latitud,
            Longitud = :Longitud,
            Sexenio = :Sexenio,
            Numa = :Numa
        WHERE ID = :id";

        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':FechaHecho' => $_POST['FechaHecho'],
            ':NombreVictima' => $_POST['NombreVictima'],
            ':ApellidoPaterno' => $_POST['ApellidoPaterno'],
            ':ApellidoMaterno' => $_POST['ApellidoMaterno'],
            ':Edad' => $_POST['Edad'],
            ':Ocupacion' => $_POST['Ocupacion'],
            ':LugarOrigen' => $_POST['LugarOrigen'],
            ':Calle' => $_POST['Calle'],
            ':Numero' => $_POST['Numero'],
            ':Municipio' => $_POST['Municipio'],
            ':ClaveMunicipio' => $_POST['ClaveMunicipio'],
            ':Region' => $_POST['Region'],
            ':Estado' => $_POST['Estado'],
            ':AlertaGenero' => $_POST['AlertaGenero'],
            ':Desaparecida' => $_POST['Desaparecida'],
            ':FechaDesaparicion' => $_POST['FechaDesaparicion'],
            ':LugarEncontradoCuerpo' => $_POST['LugarEncontradoCuerpo'],
            ':DescripcionCuerpo' => $_POST['DescripcionCuerpo'],
            ':FormaMuerte' => $_POST['FormaMuerte'],
            ':TipoArma' => $_POST['TipoArma'],
            ':Causas' => $_POST['Causas'],
            ':Descendencia' => $_POST['Descendencia'],
            ':NumDescendencia' => $_POST['NumDescendencia'],
            ':NombreAgresor' => $_POST['NombreAgresor'],
            ':ParentescoAgresor' => $_POST['ParentescoAgresor'],
            ':FuentePeriodistica' => $_POST['FuentePeriodistica'],
            ':AutorNota' => $_POST['AutorNota'],
            ':LinkNota' => $_POST['LinkNota'],
            ':IDCasoAnual' => $_POST['IDCasoAnual'],
            ':NumAveriguacion' => $_POST['NumAveriguacion'],
            ':SituacionJuridica' => $_POST['SituacionJuridica'],
            ':Latitud' => $_POST['Latitud'],
            ':Longitud' => $_POST['Longitud'],
            ':Sexenio' => $_POST['Sexenio'],
            ':Numa' => $_POST['Numa'],
            ':id' => $id
        ]);

        header("Location: ../pages/ver-feminicidio.php?statuss=updated");
        exit;
    } catch (PDOException $e) {
        header("Location: ../pages/ver-feminicidio.php?statuss=error&msg=" . urlencode($e->getMessage()));
        exit();
    }
}

// Obtener los datos actuales
$stmt = $conn->prepare("SELECT * FROM Feminicidios WHERE ID = :id");
$stmt->execute([':id' => $id]);
$fem = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$fem) die("Registro no encontrado");
?>
 

<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
    <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Registro de Feminicidio</title>
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

    
     <div class="container py-4">
    <main>
        <h2 class="mb-4 text-center">Editar Registro de Feminicidio</h2>

        <form method="POST">
            <div class="row g-3">
                <!-- Campos existentes -->
                <div class="col-md-4">
                    <label class="form-label">Fecha del Hecho</label>
                    <input type="date" class="form-control" name="FechaHecho" value="<?= htmlspecialchars($fem['FechaHecho']) ?>" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="NombreVictima" value="<?= htmlspecialchars($fem['NombreVictima']) ?>" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Apellido Paterno</label>
                    <input type="text" class="form-control" name="ApellidoPaterno" value="<?= htmlspecialchars($fem['ApellidoPaterno']) ?>">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Apellido Materno</label>
                    <input type="text" class="form-control" name="ApellidoMaterno" value="<?= htmlspecialchars($fem['ApellidoMaterno']) ?>">
                </div>

                <div class="col-md-2">
                    <label class="form-label">Edad</label>
                    <input type="number" class="form-control" name="Edad" value="<?= htmlspecialchars($fem['Edad']) ?>">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Ocupación</label>
                    <input type="text" class="form-control" name="Ocupacion" value="<?= htmlspecialchars($fem['Ocupacion']) ?>">
                </div>




 <div class="col-sm-6 position-relative">
    <label for="lugar_origen" class="form-label">Lugar de Origen</label>
    <input type="text" class="form-control" id="lugar_origen" name="LugarOrigen"
          value="<?= htmlspecialchars($fem['LugarOrigen'] ?? 'SIN DATOS') ?>" autocomplete="off" >
    <div class="sugerencias" id="sug_lugar_origen" 
         style="border:1px solid #ccc; max-height:150px; overflow-y:auto; position:absolute; background:#fff; width:95%; z-index:1000;">
    </div>
    <input type="hidden" id="selected_origen_id" name="selected_origen_id">
    <div class="invalid-feedback">Se requiere un municipio válido.</div>
</div>


<?php
$host = 'localhost';
$db   = 'oaxacaa';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    $stmt = $pdo->query("SELECT id_municipio_inegi, nombre FROM municipios ORDER BY nombre ASC");
    $municipios = $stmt->fetchAll();

    $municipios_json = json_encode($municipios, JSON_UNESCAPED_UNICODE);
} catch (PDOException $e) {
    $municipios_json = json_encode([]);
    echo "<script>console.error('Error al cargar municipios: " . $e->getMessage() . "');</script>";
}
?>


<script>
const inputOrigen = document.getElementById('lugar_origen');
const sugOrigen = document.getElementById('sug_lugar_origen');
const hiddenOrigenId = document.getElementById('selected_origen_id');

// Municipios cargados desde PHP
const municipios = <?php echo $municipios_json; ?>;

// Mostrar sugerencias mientras se escribe
inputOrigen.addEventListener('input', function() {
    const val = this.value.toLowerCase().trim();
    sugOrigen.innerHTML = '';

    if (!val) {
        hiddenOrigenId.value = '';
        return;
    }

    const filtered = municipios.filter(m => m.nombre.toLowerCase().includes(val));

    if (filtered.length === 0) {
        sugOrigen.innerHTML = '<div style="padding:5px;">No hay coincidencias</div>';
        hiddenOrigenId.value = '';
        return;
    }

    filtered.forEach(m => {
        const div = document.createElement('div');
        div.textContent = m.nombre;
        div.style.padding = '5px';
        div.style.cursor = 'pointer';
        div.addEventListener('click', () => {
            inputOrigen.value = m.nombre;
            hiddenOrigenId.value = m.id_municipio_inegi;
            sugOrigen.innerHTML = '';
        });
        div.addEventListener('mouseover', () => div.style.background = '#f1f1f1');
        div.addEventListener('mouseout', () => div.style.background = '#fff');
        sugOrigen.appendChild(div);
    });
});

// Ocultar sugerencias al perder el foco
inputOrigen.addEventListener('blur', () => {
    setTimeout(() => { sugOrigen.innerHTML = ''; }, 150);
});
</script>







                <!-- NUEVOS CAMPOS AÑADIDOS -->
                <div class="col-md-4">
                    <label class="form-label">Calle</label>
                    <input type="text" class="form-control" name="Calle" value="<?= htmlspecialchars($fem['Calle']) ?>">
                </div>

                <div class="col-md-2">
                    <label class="form-label">Número</label>
                    <input type="text" class="form-control" name="Numero" value="<?= htmlspecialchars($fem['Numero']) ?>">
                </div>

                <div class="col-md-4">
                    <label class="form-label">ID Caso Anual</label>
                    <input type="text" class="form-control" name="IDCasoAnual" value="<?= htmlspecialchars($fem['IDCasoAnual']) ?>">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Número de Averiguación</label>
                    <input type="text" class="form-control" name="NumAveriguacion" value="<?= htmlspecialchars($fem['NumAveriguacion']) ?>">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Situación Jurídica</label>
                    <input type="text" class="form-control" name="SituacionJuridica" value="<?= htmlspecialchars($fem['SituacionJuridica']) ?>">
                </div>







                <!-- Resto de los campos existentes -->
              

                <div class="col-md-3">
                    <label class="form-label">Estado</label>
                    <input type="text" class="form-control" name="Estado" value="<?= htmlspecialchars($fem['Estado']) ?>">
                </div>

             






     <input type="hidden" id="selected_region_id">
        <input type="hidden" id="selected_distrito_id">
        <input type="hidden" id="selected_municipio_id">
        <input type="hidden" id="selected_localidad_id"> 


        <div class="col-sm-6">
  <label for="cp" class="form-label">Código Postal (CP)</label>
  <input type="number" max="100000" min="1" class="form-control" id="cp"  placeholder="">
  <div class="invalid-feedback">Se requiere un código postal válido.</div>
</div>

        <div class="col-sm-6">

            <label for="input_region" class="form-label">Región:</label>
            <input type="text" class="form-control" id="input_region" name="Region"  value="<?= htmlspecialchars($fem['Region']) ?>" autocomplete="off">
            <div class="sugerencias" id="sug_region"></div>
        </div>

        <div class="col-sm-6">
            <label for="input_distrito" class="form-label">Distrito:</label>
            <input type="text" id="input_distrito" class="form-control" placeholder="Escribe para buscar distrito..." autocomplete="off">
            <div class="sugerencias" id="sug_distrito"></div>
        </div>

        <div class="col-sm-6">
            <label for="input_municipio" class="form-label">Municipio:</label>
            <input type="text" id="input_municipio" class="form-control" name="Municipio" value="<?= htmlspecialchars($fem['Municipio']) ?>" autocomplete="off">
            <div class="sugerencias" id="sug_municipio"></div>
        </div>

        <div class="col-sm-6">
            <label for="input_localidad" class="form-label">Localidad:</label>
            <input type="text" id="input_localidad" class="form-control"  placeholder="Escribe el nombre de la localidad..." autocomplete="off">
            <div class="sugerencias" id="sug_localidad"></div>
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
  // Municipio
if (details.municipio_id !== undefined && details.municipio_nombre !== undefined) {
    inputs.municipio.value = details.municipio_nombre || '';
    selectedIds.municipio.value = details.municipio_id || '';

    // ¡AQUI! Llenar el input de clave_municipio
    document.getElementById('clave_municipio').value = details.municipio_id || '';
} else {
    inputs.municipio.value = '';
    selectedIds.municipio.value = '';
    document.getElementById('clave_municipio').value = '';
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
    <label for="clave_municipio" class="form-label">Clave Municipio</label>
    <input type="text" class="form-control" id="clave_municipio" name="ClaveMunicipio" placeholder="" value="<?= htmlspecialchars($fem['ClaveMunicipio']) ?>" readonly>
    <div class="invalid-feedback">Se requiere un municipio válido.</div>
</div>



<script>
// Supongamos que `datos` ya contiene el objeto completo de la localidad
// Por ejemplo: datos = { municipio_id: 107, municipio_nombre: "San Antonio de la Cal", ... }

function rellenarClaveMunicipio(datos) {
    const inputClave = document.getElementById('clave_municipio');
    if (datos && datos.municipio_id) {
        inputClave.value = datos.municipio_id; // ¡Asignamos directamente el value!
        console.log(`Clave de municipio asignada: ${datos.municipio_id} → ${datos.municipio_nombre}`);
    } else {
        inputClave.value = '';
        console.warn('No hay municipio asociado a esta localidad');
    }
}

// Ejemplo: cuando se selecciona una localidad y ya tienes los datos
// datosLocalidad es el objeto que recibiste de tu API
rellenarClaveMunicipio(datosLocalidad);
</script>










                <div class="col-md-3">
                    <label class="form-label">Alerta de Género</label>
                    <input type="text" class="form-control" name="AlertaGenero" value="<?= htmlspecialchars($fem['AlertaGenero']) ?>">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Desaparecida</label>
                    <select name="Desaparecida" class="form-select">
                        <option value="Sí" <?= $fem['Desaparecida'] === 'Sí' ? 'selected' : '' ?>>Sí</option>
                        <option value="No" <?= $fem['Desaparecida'] === 'No' ? 'selected' : '' ?>>No</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Fecha de Desaparición</label>
                    <input type="date" class="form-control" name="FechaDesaparicion" value="<?= htmlspecialchars($fem['FechaDesaparicion']) ?>">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Lugar donde fue encontrado el cuerpo</label>
                    <input type="text" class="form-control" name="LugarEncontradoCuerpo" value="<?= htmlspecialchars($fem['LugarEncontradoCuerpo']) ?>">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Descripción del cuerpo</label>
                    <textarea class="form-control" name="DescripcionCuerpo" rows="2"><?= htmlspecialchars($fem['DescripcionCuerpo']) ?></textarea>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Forma de Muerte</label>
                    <input type="text" class="form-control" name="FormaMuerte" value="<?= htmlspecialchars($fem['FormaMuerte']) ?>">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Tipo de Arma</label>
                    <input type="text" class="form-control" name="TipoArma" value="<?= htmlspecialchars($fem['TipoArma']) ?>">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Causas</label>
                    <input type="text" class="form-control" name="Causas" value="<?= htmlspecialchars($fem['Causas']) ?>">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Descendencia</label>
                    <select name="Descendencia" class="form-select">
                        <option value="Sí" <?= $fem['Descendencia'] === 'Sí' ? 'selected' : '' ?>>Sí</option>
                        <option value="No" <?= $fem['Descendencia'] === 'No' ? 'selected' : '' ?>>No</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Número de Descendencia</label>
                    <input type="number" class="form-control" name="NumDescendencia" value="<?= htmlspecialchars($fem['NumDescendencia']) ?>">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Nombre del Agresor</label>
                    <input type="text" class="form-control" name="NombreAgresor" value="<?= htmlspecialchars($fem['NombreAgresor']) ?>">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Parentesco del Agresor</label>
                    <input type="text" class="form-control" name="ParentescoAgresor" value="<?= htmlspecialchars($fem['ParentescoAgresor']) ?>">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Fuente Periodística</label>
                    <input type="text" class="form-control" name="FuentePeriodistica" value="<?= htmlspecialchars($fem['FuentePeriodistica']) ?>">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Autor de la Nota</label>
                    <input type="text" class="form-control" name="AutorNota" value="<?= htmlspecialchars($fem['AutorNota']) ?>">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Link de la Nota</label>
                    <input type="url" class="form-control" name="LinkNota" value="<?= htmlspecialchars($fem['LinkNota']) ?>">
                </div>

                <div class="col-md-2">
                    <label class="form-label">Latitud</label>
                    <input type="text" class="form-control" name="Latitud" value="<?= htmlspecialchars($fem['Latitud']) ?>">
                </div>

                <div class="col-md-2">
                    <label class="form-label">Longitud</label>
                    <input type="text" class="form-control" name="Longitud" value="<?= htmlspecialchars($fem['Longitud']) ?>">
                </div>

                <div class="col-md-2">
                    <label class="form-label">Sexenio</label>
                    <input type="text" class="form-control" name="Sexenio" value="<?= htmlspecialchars($fem['Sexenio']) ?>">
                </div>

                <div class="col-md-2">
                    <label class="form-label">Número (Numa)</label>
                    <input type="text" class="form-control" name="Numa" value="<?= htmlspecialchars($fem['Numa']) ?>">
                </div>

                <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Actualizar Registro</button>
                </div>
            </div>
        </form>
    </main>


        <footer class="my-5 pt-5 text-body-secondary text-center text-small">
              <?php
          require_once __DIR__ . '/../checkout/CR.php';
          ?>
                <ul class="list-inline">
                </ul>
        </footer>
    </div>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="checkout.js"></script></body>
    <script src="validationfeminicidios.js"></script>
        </html>
