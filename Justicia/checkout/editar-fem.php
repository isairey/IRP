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

        header("Location: ../pages/ver-feminicidio.php?status=updated");
        exit;
    } catch (PDOException $e) {
        header("Location: ../pages/ver-feminicidio.php?status=error&msg=" . urlencode($e->getMessage()));
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

                <div class="col-md-4">
                    <label class="form-label">Lugar de Origen</label>
                    <input type="text" class="form-control" name="LugarOrigen" value="<?= htmlspecialchars($fem['LugarOrigen']) ?>">
                </div>

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
                    <label class="form-label">Municipio</label>
                    <input type="text" class="form-control" name="Municipio" value="<?= htmlspecialchars($fem['Municipio']) ?>">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Región</label>
                    <input type="text" class="form-control" name="Region" value="<?= htmlspecialchars($fem['Region']) ?>">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Estado</label>
                    <input type="text" class="form-control" name="Estado" value="<?= htmlspecialchars($fem['Estado']) ?>">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Clave Municipio</label>
                    <input type="text" class="form-control" name="ClaveMunicipio" value="<?= htmlspecialchars($fem['ClaveMunicipio']) ?>">
                </div>

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
