<style>
/* -
.sidebar {
  background: linear-gradient(180deg, #e9f2ef, #d4e9e2, #c8e0d8) !important;  
  color: #111 !important;
  height: 100vh;
  border-right: 1px solid #c0d2c9;
  display: flex;
  flex-direction: column;
}

/* ---------- QUITAR FONDOS POR DEFECTO --------
.bg-body-tertiary, .bg-light {
  background: transparent !important;
}

/* ---------- ELEMENTOS DE USUARIO (FOTO, NOMBRE, ETC.) ---------
.sidebar .user-info {
  background-color: rgba(0, 0, 0, 0.05);
  border-radius: 10px;
  padding: 10px;
  margin: 10px 15px;
  transition: background 0.3s ease;
}

.sidebar .user-info:hover {
  background-color: rgba(0, 0, 0, 0.08);
}

.sidebar .user-info strong {
  color: #000;
}

.sidebar .user-info small {
  color: #333;
}

/* ---------- LINKS ----------
.nav-link {
  color: #111 !important;
  font-weight: 500;
  padding: 10px 20px;
  border-radius: 8px;
  margin: 3px 10px;
  display: flex;
  align-items: center;
  gap: 8px;
  transition: all 0.25s ease;
  background-color: rgba(0, 0, 0, 0.05); /* FONDO UNIFORME EN MODO CLAR
}

.nav-link:hover {
  background-color: rgba(76, 175, 80, 0.2) !important;
  color: #000 !important;
  transform: translateX(4px);
}

.nav-link.active {
  background-color: #4CAF50 !important;
  color: white !important;
  font-weight: 600;
}

/* ---------- SEPARADORES --------
hr {
  border-color: rgba(0, 0, 0, 0.15);
  margin: 10px 15px;
}

/* ---------- MODO OSCURO ---------
@media (prefers-color-scheme: dark) {
  .sidebar {
    background: linear-gradient(180deg, #1a2524, #1f2f2e, #223836) !important;
    color: #cfd8dc !important;
  }

  .sidebar .user-info {
    background-color: rgba(255, 255, 255, 0.05);
  }

  .sidebar .user-info strong {
    color: #fff !important;
  }

  .sidebar .user-info small {
    color: #bbb !important;
  }

  .nav-link {
    background-color: rgba(255, 255, 255, 0.05);
    color: #cfd8dc !important;
  }

  .nav-link:hover {
    background-color: rgba(76, 175, 80, 0.25) !important;
    color: #fff !important;
  }

  .nav-link.active {
    background-color: #2e7d32 !important;
    color: #fff !important;
  }

  hr {
    border-color: rgba(255, 255, 255, 0.1);
  }
}


*/
</style>





<div class="container-fluid">
  <div class="row">
    <!-- Empieza -->
    <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
      <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>

        
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto bg-body-tertiary">
          <ul class="nav flex-column .bg-body-tertiary">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 " aria-current="page" href="../pages/home.php">
                <svg class="bi"><use xlink:href="#house-fill"/></svg>
                INICIO
              </a>
            </li>

            <hr class="my-3">

            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="../checkout/register-usuaria.php">
                <svg class="bi"><use xlink:href="#personita"/></svg>
                Registrar Nueva Usuaria
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="../pages/ver-usuaria.php">
                <svg class="bi"><use xlink:href="#people"/></svg>
                Lista de Usuarias
              </a>
            </li>

            <hr class="my-3">

            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="../checkout/register-personal.php">
                <svg class="bi"><use xlink:href="#personita"/></svg>
                Registrar Personal 
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="../pages/ver-personal.php">
              <i class="bi bi-person-lines-fill"></i>
                Lista personal
              </a>
            </li>
        

          <hr class="my-3">

          <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="../checkout/register-cita.php">
              <i class="bi bi-calendar-check-fill"></i>
                Registrar Cita
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="../checkout/register-atencion.php">
              <i class="bi bi-clipboard2-fill"></i>
                Registrar Atención
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="../pages/ver-citas.php">
              <i class="bi bi-calendar3"></i>
                Ver Citas
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="../pages/ver-atenciones.php">
              <i class="bi bi-journal-bookmark-fill"></i>
                Historial de atenciones
              </a>
            </li>

            <hr class="my-3">

          <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="../checkout/register-f.php">
              <i class="bi bi-journal-bookmark-fill"></i>
                Registrar Feminicidio
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="../pages/ver-feminicidio.php">
              <i class="bi bi-person-lines-fill"></i>
                Lista de Femenicidios
              </a>
            </li>

            <hr class="my-3">

          <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="../checkout/register-proyecto.php">
              <i class="bi bi-patch-plus-fill"></i>
                Registrar Nuevo Proyecto
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="../checkout/asignacion-proyecto.php">
                <svg class="bi"><use xlink:href="#puzzle"/></svg>
                Asignar proyecto 
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="../pages/ver-proyectos.php">
              <i class="bi bi-journal-plus"></i>
                Ver proyectos
              </a>
            </li>

            <hr class="my-3">

          <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="../checkout/register-donante.php">
              <i class="bi bi-person-vcard"></i>
                Registrar Donante 
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="../pages/ver-donantes.php">
              <i class="bi bi-person-lines-fill"></i>
                Lista de Donantes 
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="../checkout/register-donativo.php">
              <i class="bi bi-piggy-bank-fill"></i>
                Registrar Donativo
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="../pages/ver-donaciones.php">
              <i class="bi bi-card-checklist"></i>
                Ver Donaciones
              </a>
            </li>




            <hr class="my-3">

<li class="nav-item">
    <a class="nav-link d-flex align-items-center gap-2" href="../checkout/regiter-ponentes.php">
    <i class="bi bi-person-vcard"></i>
      Registrar Ponente 
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link d-flex align-items-center gap-2" href="../pages/ver-ponentes.php">
    <i class="bi bi-person-lines-fill"></i>
      Lista de Ponentes 
    </a>
  </li>

  <hr class="my-3">

<li class="nav-item">
    <a class="nav-link d-flex align-items-center gap-2" href="../checkout/register-diplomado.php">
    <i class="bi bi-person-vcard"></i>
      Registrar Diplomado
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link d-flex align-items-center gap-2" href="../pages/ver-diplomado.php">
    <i class="bi bi-person-lines-fill"></i>
      Lista de Diplomados
    </a>
  </li>

<li class="nav-item">
    <a class="nav-link d-flex align-items-center gap-2" href="../checkout/asignar-modulo-diplomado.php">
    <i class="bi bi-person-vcard"></i>
      Registrar Modulos
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link d-flex align-items-center gap-2" href="../pages/ver-modulos.php">
    <i class="bi bi-person-lines-fill"></i>
      Lista de Modulos
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link d-flex align-items-center gap-2" href="../checkout/asignar-secciones.php">
    <i class="bi bi-person-vcard"></i>
      Registrar Seciones
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link d-flex align-items-center gap-2" href="../pages/ver-seciones.php">
    <i class="bi bi-person-lines-fill"></i>
      Lista de Seciones
    </a>
  </li>


  <li class="nav-item">
    <a class="nav-link d-flex align-items-center gap-2" href="../checkout/asignar-diplomado-ponente.php">
    <i class="bi bi-piggy-bank-fill"></i>
      Asignar Ponentes
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link d-flex align-items-center gap-2" href="../pages/ver-ponentes-diplomado.php">
    <i class="bi bi-card-checklist"></i>
      Ver Ponentes
    </a>
  </li>

   <li class="nav-item">
    <a class="nav-link d-flex align-items-center gap-2" href="../checkout/asignar-actividad.php">
    <i class="bi bi-piggy-bank-fill"></i>
      Asignar Actividad
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link d-flex align-items-center gap-2" href="../pages/ver-actividades.php">
    <i class="bi bi-card-checklist"></i>
      Ver Actividades
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link d-flex align-items-center gap-2" href="../checkout/asignar-diplomado.php">
    <i class="bi bi-card-checklist"></i>
      Registrar Asistentes
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link d-flex align-items-center gap-2" href="../pages/ver-asistentes.php">
    <i class="bi bi-card-checklist"></i>
      Ver Asistentes
    </a>
  </li>






  <hr class="my-3">

<li class="nav-item">
    <a class="nav-link d-flex align-items-center gap-2" href="../checkout/register-seminario.php">
    <i class="bi bi-person-vcard"></i>
      Registrar Seminario
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link d-flex align-items-center gap-2" href="../pages/ver-seminario.php">
    <i class="bi bi-person-lines-fill"></i>
      Lista de Seminarios
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link d-flex align-items-center gap-2" href="../checkout/asignar-seminario-ponente.php">
    <i class="bi bi-piggy-bank-fill"></i>
      Asignar Seminario
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link d-flex align-items-center gap-2" href="../pages/ver-seminario-ponente.php">
    <i class="bi bi-card-checklist"></i>
      Ver Seminarios Impartidos
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link d-flex align-items-center gap-2" href="../checkout/asignar-seminario.php">
    <i class="bi bi-card-checklist"></i>
      Registrar Asistentes
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link d-flex align-items-center gap-2" href="../pages/ver-asistentes_seminario.php">
    <i class="bi bi-card-checklist"></i>
      Ver Asistentes
    </a>
  </li>







   <hr class="my-3">

<li class="nav-item">
    <a class="nav-link d-flex align-items-center gap-2" href="../checkout/register-taller.php">
    <i class="bi bi-person-vcard"></i>
      Registrar Taller
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link d-flex align-items-center gap-2" href="../pages/ver-taller.php">
    <i class="bi bi-person-lines-fill"></i>
      Lista de Talleres
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link d-flex align-items-center gap-2" href="../checkout/asignar-taller-ponente.php">
    <i class="bi bi-piggy-bank-fill"></i>
      Asignar Taller
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link d-flex align-items-center gap-2" href="../pages/ver-taller-ponente.php">
    <i class="bi bi-card-checklist"></i>
      Ver Talleres Impartidos
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link d-flex align-items-center gap-2" href="../checkout/asignar-taller.php">
    <i class="bi bi-card-checklist"></i>
      Registrar Asistentes
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link d-flex align-items-center gap-2" href="../pages/ver-asistentes_taller.php">
    <i class="bi bi-card-checklist"></i>
      Ver Asistentes
    </a>
  </li>




<!--

  <hr class="my-3">

<li class="nav-item">
    <a class="nav-link d-flex align-items-center gap-2" href="../pages/citas.php">
    <i class="bi bi-person-vcard"></i>
      Ver Plan de Empoderamiento
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link d-flex align-items-center gap-2" href="../pages/ver-donantes.php">
    <i class="bi bi-person-lines-fill"></i>
      Ver Record de Citas
    </a>
  </li>
 
-->
<hr class="my-3">

        
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="../checkout/soporte.php">
                    <svg class="bi"><use xlink:href="#door-closed"/></svg>
                    Soporte
                </a>
            </li>
          

          <hr class="my-3">

        
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="../pages/sign-out.php">
                    <svg class="bi"><use xlink:href="#door-closed"/></svg>
                    Sign out
                </a>
            </li>
        </ul>
        
        </div>
      </div>
    </div>