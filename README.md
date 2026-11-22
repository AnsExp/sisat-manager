# SISAT Manager

> Sistema propietario de **SIGSA S.A.S.** El uso, copia, modificación, distribución o acceso no autorizado de este software y su documentación están prohibidos.

## Introducción

SISAT Manager es la plataforma interna desarrollada por **SIGSA S.A.S.** para administrar el Sistema Integrado de Seguridad y Salud en el Trabajo en empresas clientes.

El sistema permite organizar la información empresarial y orientar el cumplimiento de las actividades SISAT según el nivel de riesgo, el tamaño de la organización y la normativa aplicable.

### Funcionamiento general

1. **Autenticación y perfiles**
   - Acceso mediante autenticación, verificación de correo y autenticación de dos factores.
   - Administración de perfil, apariencia y opciones de seguridad.

2. **Empresas y estructura organizacional**
   - Registro de empresas y datos CIIU.
   - Gestión de áreas de trabajo, cargos y empleados.
   - Asociación de cada trabajador con su empresa, área y cargo.

3. **Actividades SISAT**
   - Clasificación de las actividades en los diez módulos del sistema, por ejemplo:
     - Orientación y planificación.
     - Análisis y recopilación de información.
     - Comunicación y capacitación.
     - Acciones preventivas.
     - Accidentes de trabajo.
     - Preparación y respuesta ante emergencias.
     - Enfermedades profesionales y relacionadas con el trabajo.
     - Cuidado de la salud general.
     - Mantenimiento de registros.
     - Seguimiento y evaluación.
   - Selección de actividades aplicables según el nivel de riesgo y el número de trabajadores.
   - Asignación de responsables y personal de apoyo.

4. **Gestión de evidencias**
   - Registro de procedimientos, diagnósticos generales, físicos y mentales.
   - Revisión de información y elementos asociados al listado OIT.
   - Carga y consulta de documentos por empresa, actividad y empleado.
   - Asociación de certificados y acciones ocupacionales a cada trabajador.

5. **Seguimiento y resultados**
   - Registro de resultados por empresa y actividad.
   - Cálculo de indicadores, diagnósticos y avances.
   - Centralización de información para procesos de seguimiento y evaluación.

## Tecnologías

- PHP 8.3 o superior
- Laravel 13
- Livewire 4
- Flux UI
- Tailwind CSS 4
- Vite / Vite Plus
- SQLite por defecto, con soporte para MySQL, MariaDB, PostgreSQL o SQL Server
- Dompdf para generación de documentos PDF
- Laravel Fortify para autenticación

## Requisitos

- PHP 8.3 o superior con las extensiones requeridas por Laravel
- Composer 2
- Node.js 22 o superior y npm
- Extensión PDO correspondiente a la base de datos seleccionada
- Un servidor web como Apache o Nginx para entornos de producción
- Git

Para SQLite se requiere la extensión `pdo_sqlite`.

## Instalación local

### 1. Obtener el proyecto

```powershell
git clone <URL_AUTORIZADA_DEL_REPOSITORIO> sisat-manager
cd sisat-manager
```

El acceso al repositorio requiere autorización de SIGSA S.A.S.

### 2. Instalar dependencias

```powershell
composer install
npm install
```

### 3. Configurar el entorno

En PowerShell:

```powershell
Copy-Item .env.example .env
php artisan key:generate
```

Edite el archivo `.env` y configure al menos:

```dotenv
APP_NAME="SISAT Manager"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=sqlite
```

### 4. Preparar SQLite

Configure y cree el archivo de base de datos:

```powershell
New-Item -ItemType File database/database.sqlite -Force
```

La instalación predeterminada puede usar la ruta `database/database.sqlite` sin valores adicionales de usuario o contraseña.

Para una base MySQL, MariaDB, PostgreSQL o SQL Server, configure `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME` y `DB_PASSWORD` en `.env`; luego cree la base de datos en el servidor seleccionado antes de migrar.

### 5. Migrar y cargar datos iniciales

```powershell
php artisan migrate
php artisan db:seed
```

Las migraciones crean la estructura del sistema y las semillas cargan catálogos CIIU, elementos OIT, actividades SISAT y datos demostrativos.

> Los datos demostrativos pueden crear empresas, trabajadores y usuarios de prueba. El seed debe revisarse y no ejecutarse en producción sin autorización. Antes de desplegar en un ambiente real, sustituya o desactive las credenciales y datos de demostración.

Para reinicializar completamente una base de datos local:

```powershell
php artisan migrate:fresh --seed
```

### 6. Compilar recursos

Para desarrollo:

```powershell
npm run dev
```

En otra terminal, iniciar Laravel:

```powershell
composer run dev
```

También puede iniciar el servidor directamente:

```powershell
php artisan serve
```

El sistema estará disponible en `http://localhost:8000`.

Para producción, genere los recursos optimizados:

```powershell
npm run build
php artisan optimize
```

## Script rápido de instalación

El proyecto incluye `composer run setup`, que ejecuta la instalación de Composer, crea `.env` si no existe, genera la clave, migraciones e instalación y compilación de recursos.

```powershell
composer run setup
```

Cuando se utilice SQLite, cree `database/database.sqlite` antes de ejecutar el script.

## Puesta en producción

Configure al menos las siguientes opciones para producción:

```dotenv
APP_ENV=production
APP_DEBUG=false
APP_URL=https://dominio-autorizado

SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database
MAIL_MAILER=smtp
```

Antes del despliegue:

- Configure almacenamiento persistente y respaldos cifrados de la base de datos.
- Proteja `storage/` y asegure permisos de lectura/escritura únicamente para los procesos necesarios.
- Configure HTTPS y certificados válidos.
- Defina una cola y proceso de worker si se habilitan tareas asíncronas.
- Configure correos reales y desactive el envío basado en `MAIL_MAILER=log`.
- Ajuste la zona horaria y la política de retención de registros.
- Cambie todas las credenciales de demostración.
- Use secretos independientes para cada ambiente.

Ejemplo de compilación y caché:

```powershell
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan storage:link
```

## Ejecución de pruebas

Ejecute la suite mediante:

```powershell
php artisan test
```

Las validaciones completas de estilo y tipos incluyen:

```powershell
composer run lint:check
composer run types:check
```

## Comandos útiles

```powershell
php artisan route:list
php artisan migrate
php artisan migrate:status
php artisan db:seed
php artisan optimize:clear
php artisan about
```

## Seguridad y datos sensibles

SISAT Manager administra datos de empresas y trabajadores, incluida información de salud ocupacional. Su operación debe cumplir las políticas internas de SIGSA S.A.S., las leyes de protección de datos y los controles de acceso aplicables.

- Restrinja el acceso por usuario y red.
- No publique archivos de almacenamiento en directorios públicos.
- Mantenga respaldos y registros de auditoría.
- No incluya datos reales en archivos de ejemplo o commits.
- Revise la política de correo y autenticación antes de habilitar nuevos usuarios.

## Propiedad

Este sistema es un producto propietario de **SIGSA S.A.S.** Todos los derechos sobre el software, sus diseños, módulos, catálogos y documentación pertenecen a SIGSA S.A.S., salvo derechos expresamente otorgados por contrato o autorización escrita.
