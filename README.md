# GesMujer Oaxaca - Sistema ERP

## Descripción
**GesMujer Oaxaca** es un sistema ERP (Enterprise Resource Planning) diseñado para optimizar la gestión administrativa, financiera y operativa de instituciones y programas enfocados en la atención y empoderamiento de mujeres en el estado de Oaxaca. Este sistema centraliza la información, facilita la toma de decisiones y mejora la eficiencia de los procesos internos.

---

## Características principales
- Gestión de usuarios y roles con permisos diferenciados.
- Administración de proyectos, programas y actividades.
- Registro y seguimiento de beneficiarias.
- Gestión financiera: ingresos, egresos y reportes contables.
- Generación de reportes y estadísticas para la toma de decisiones.
- Integración con notificaciones y recordatorios.
- Interfaz amigable y adaptativa para dispositivos móviles y de escritorio.

---

## Tecnologías utilizadas
- **Frontend:** HTML5, CSS3, JavaScript, Bootstrap (o Vue.js si aplica)
- **Backend:** PHP / Laravel / Spring Boot (según implementación)
- **Base de datos:** MySQL
- **Control de versiones:** Git
- **Servidor:** Apache / Nginx (según implementación)

---

## Instalación

1. Clonar el repositorio:  
   ```bash
   git clone https://github.com/tu-usuario/gesmujer-oaxaca.git
2. Configurar la base de datos:

Crear la base de datos gesmujer_oaxaca.

Importar el archivo SQL incluido en /database/gesmujer_oaxaca.sql.

3. Configurar el archivo de conexión a la base de datos:

Editar config/database.php (o .env) con tus credenciales locales.

4.  Levantar el servidor:

    ```bash
    php artisan serve 

o, si es PHP puro, colocar el proyecto en htdocs y acceder vía navegador.

## Uso
1. Acceder al sistema mediante el navegador en http://localhost:8000 (o la URL configurada).

2. Iniciar sesión con las credenciales de administrador por defecto:
    ```bash
    Usuario: **********

    Contraseña: *********

3. Configurar los datos de la institución y agregar usuarios, beneficiarias, proyectos y actividades.

4. Generar reportes desde el panel principal según las necesidades.

## Contribuciones
Las contribuciones son bienvenidas. Para colaborar:

1. Hacer un fork del repositorio.

2. Crear una nueva rama:

    ```bash
    git checkout -b nombre-rama
3. Hacer los cambios y commitearlos:

    ```bash
    git commit -m "Descripción de los cambios"
Subir la rama y crear un Pull Request.

## Licencia
Este proyecto está bajo la licencia MIT. Ver LICENSE para más detalles.

## Contacto

Desarrollador / Equipo: Isai Reyes Peña, Irving Zarate Reyes

Correo: isaireyes2003@gmail.com

Sitio web: https://github.com/isairey
