# Symfony 1.4 Library Management System

## Requisitos previos

### Instalación de PHP 5.6 en Linux

1. **Añadir el repositorio de PHP**:

   ```bash
   sudo add-apt-repository ppa:ondrej/php
   sudo apt update
   ```

2. **Instalar PHP 5.6 y las extensiones necesarias**:

   ```bash
   sudo apt install php5.6 php5.6-cli php5.6-mysql php5.6-xml php5.6-fpm
   sudo apt-get install php-pear # Necesario para Doctrine
   ```

3. **Configurar PHP 5.6 como la versión predeterminada**:

   ```bash
   sudo update-alternatives --config php # Selecciona la versión 5.6
   ```

### Instalación de Symfony 1.4

1. **Descargar Symfony 1.4**: Dado que Symfony 1.4 es una versión antigua, no se puede instalar con Composer. Descárgalo desde [Symfony 1.x legacy website](https://symfony.com/legacy) y descomprime el archivo `tar.gz` en la carpeta que utilizarás para tu proyecto.

### Creación del Proyecto Symfony 1.4

1. **Generar el proyecto Symfony**:

   ```bash
   php data/bin/symfony generate:project SMProject --orm=Doctrine
   ```

2. **Crear una aplicación dentro del proyecto**:

   ```bash
   php symfony generate:app systemProject
   ```

3. **Configurar el servidor web**: En tu caso, configura Nginx para que apunte a la carpeta `web` del proyecto.

## Configuración del Proyecto

### Definición de Tablas y Relaciones

1. **Crear el archivo `schema.yml`**: El archivo `schema.yml` se utiliza para definir las tablas y relaciones necesarias en tu base de datos. Este archivo se encuentra generalmente en el directorio `config/` de tu proyecto Symfony.
2. **Definir las tablas y campos**: Dentro del archivo `schema.yml`, define tus tablas y campos. Aquí tienes una estructura básica:

   - **TableName**: Nombre de la tabla.
   - **columns**: Define los campos de la tabla.
   - **relations**: Define las relaciones entre tablas.

3. **Ejemplo**: Supongamos que tienes una tabla `Libro` y otra `Prestamo`. Aquí tienes un ejemplo de cómo podría verse:

   ```yaml
   Libro:
     columns:
       id:
         type: integer
         primary: true
         autoincrement: true
       titulo:
         type: string
         length: 255
         notnull: true
       autor:
         type: string
         length: 255
         notnull: true
   Prestamo:
     columns:
       id:
         type: integer
         primary: true
         autoincrement: true
       libro_id:
         type: integer
         notnull: true
       estudiante_id:
         type: integer
         notnull: true
       fecha_prestamo:
         type: date
         notnull: true
       fecha_devolucion:
         type: date
         notnull: true
     relations:
       Libro:
         class: Libro
         local: libro_id
         foreign: id
         type: many
   ```

4. **Generar el modelo**: Una vez definido el esquema, ejecuta el siguiente comando para construir el modelo:

   ```bash
   php symfony doctrine:build --all --no-confirmation
   ```

### Configuración de la Base de Datos

1. **Crear la base de datos (DB)**: Crea la base de datos, usuario y contraseña en MariaDB.
2. **Actualizar el archivo de configuración**: Actualiza `config/databases.yml` con los detalles de tu base de datos (nombre de la base de datos, usuario y contraseña).

### Creación del Modelo y Migración a la Base de Datos

1. **Construir el modelo**:

   ```bash
   php symfony doctrine:build --all --no-confirmation
   ```

2. **Migrar las tablas a la base de datos**: Ejecuta el comando para migrar las tablas definidas en el modelo a la base de datos.

## Creación de Módulos

1. **Generar los módulos necesarios para la aplicación**:

   ```bash
   php symfony doctrine:generate-module systemProject prestamo Prestamo
   php symfony doctrine:generate-module systemProject libro Libro
   php symfony doctrine:generate-module systemProject estudiante Estudiante
   ```

2. **Corregir fallos de obsolescencia**: Revisa y corrige cualquier fallo de obsolescencia debido a la versión antigua de Symfony.
3. **Crear las rutas**: Actualiza el archivo `routing.yml` con las rutas necesarias para cada una de las funciones CRUD de los módulos.

## Configuración y creación de las acciones en el controlador

En Symfony 1.4, las acciones del controlador se definen en los archivos de controlador dentro de la carpeta `actions` de tu módulo. Aquí te explicamos cómo configurar y crear estas acciones.

1. **Ubicación del archivo**: Los archivos de controlador se encuentran en la carpeta `actions` de cada módulo, por ejemplo, `apps/systemProject/modules/prestamo/actions/actions.class.php`.

2. **Definir una acción**: Una acción en Symfony 1.4 es un método dentro de la clase de acciones. Cada método corresponde a una acción específica que puede ser llamada desde una URL.

3. **Ejemplo de controlador**: Supongamos que deseas crear una acción para listar todos los préstamos y otra para mostrar un formulario de creación de préstamo.

   - **executeIndex**: Método para listar todos los préstamos.
   - **executeNew**: Método para mostrar el formulario de creación de préstamo.
   - **executeCreate**: Método para procesar el formulario y crear un nuevo préstamo.

   ```php
   class prestamoActions extends sfActions
   {
       public function executeIndex(sfWebRequest $request)
       {
           $this->prestamos = Doctrine_Core::getTable('Prestamo')
               ->createQuery('a')
               ->execute();
       }

       public function executeNew(sfWebRequest $request)
       {
           $this->form = new PrestamoForm();
       }

       public function executeCreate(sfWebRequest $request)
       {
           $this->form = new PrestamoForm();
           $this->processForm($request, $this->form);
           $this->setTemplate('new');
       }

       protected function processForm(sfWebRequest $request, sfForm $form)
       {
           $form->bind($request->getParameter($form->getName()));
           if ($form->isValid())
           {
               $prestamo = $form->save();
               $this->redirect('prestamo/edit?id='.$prestamo->getId());
           }
       }
   }
   ```

4. **Configurar las rutas**: Las rutas para estas acciones deben estar definidas en el archivo `routing.yml` del módulo. Aquí hay un ejemplo de cómo hacerlo:

   ```yaml
   prestamo:
     url: /prestamo
     param: { module: prestamo, action: index }

   prestamo_new:
     url: /prestamo/new
     param: { module: prestamo, action: new }

   prestamo_create:
     url: /prestamo/create
     param: { module: prestamo, action: create }
   ```

### Mejoras en la Visualización

### Instalación de Bootstrap

1. **Instalar Bootstrap**: Incluye Bootstrap en tu proyecto para mejorar la visualización.
2. **Modificar los formularios**: Ajusta los formularios según las necesidades, incluyendo botones para navegar entre formularios y vistas.

### Encabezado y Barra de Navegación

1. **Configurar el encabezado**: Configura el encabezado en el archivo `layout.php`.
2. **Crear una barra de navegación**: Añade una barra de navegación para facilitar la navegación entre las diferentes secciones de la aplicación.

### Configuración de Modelos para Mostrar Nombres

1. **Configurar las clases GET**: Configura las clases GET en los modelos para que muestren nombres en lugar de IDs en los formularios y vistas.

### Configuración del Formulario de Préstamo

1. **Configurar `PrestamoForm`**: Configura `PrestamoForm` para mostrar el nombre del estudiante y el título del libro en los selectores desplegables, mejorando la usabilidad del formulario de préstamos.

## Cómo Funciona el Sistema

El sistema de gestión bibliotecaria permite gestionar libros, estudiantes y préstamos. Los módulos principales son:

- **Libros**: Permite agregar, editar y eliminar libros.
- **Estudiantes**: Permite agregar, editar y eliminar estudiantes.
- **Préstamos**: Permite registrar préstamos de libros a estudiantes, incluyendo la fecha de devolución.

Cada módulo cuenta con formularios y vistas configuradas para facilitar la administración de los datos. La interfaz está mejorada con Bootstrap para una mejor experiencia de usuario.

## Instalación en Otro Equipo o Servidor

1. **Clonar el Repositorio**: Clona el repositorio en el nuevo equipo o servidor.

   ```bash
   git clone https://github.com/alexmargomez/symfony-library-management.git
   cd symfony-library-management
   ```

2. **Configurar el Entorno**: Asegúrate de tener PHP y un servidor web configurados.

3. **Configurar la Base de Datos**: Crea la base de datos y actualiza `config/databases.yml` con los detalles de la base de datos.

4. **Crear las Tablas y Datos Iniciales**:

   ```bash
   php symfony doctrine:build --all --no-confirmation
   php symfony doctrine:data-load
   ```

5. **Configurar el Servidor Web**: Configura tu servidor web para apuntar al directorio `web` del proyecto.

6. **Limpiar la Caché**:

   ```bash
   php symfony cc
   ```

Accede a la URL de tu proyecto en el navegador para verificar que todo funciona correctamente.

---

Si tienes alguna pregunta o necesitas más ayuda, no dudes en contactar.
