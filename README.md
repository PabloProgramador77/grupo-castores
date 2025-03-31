<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Prueba Técnica de Inventario de Almacen

Fue realizada bajo las especificaciones indicadas en el documento PDF de la prueba técnica. Se usaron las siguientes herramientas, librerias y tecnologias para su desarrollo:

- [Laravel 12](https://laravel.com/docs/).
- [Visual Studio Code](https://code.visualstudio.com/).
- PHP [Backend](https://www.php.net/manual/es/intro-whatis.php).
- AdminLTE [Frontedn](https://jeroennoten.github.io/Laravel-AdminLTE/).
- MySQLite [Database & Migrations](https://laravel.com/docs/migrations) y (https://www.sqlite.org/).
- Composer [Mannager Libraries](https://getcomposer.org/).
- Laragon [Paquete de entorno de desarrollo para PHP](https://laragon.org/download/index.html).
- MySQL Workbench [Para la creación del Diagrama Relacional DB] (https://www.mysql.com/products/workbench/).
- DB Browser SQLite [Manejador de base de datos] (https://sqlitebrowser.org/).
- Bootstrap [Estilos CSS] (https://getbootstrap.com/).
- JQuery [Javascript] (https://jquery.com/).
- SweetAlert2 [Alertas de usuarios JS] (https://sweetalert2.github.io/).
- Git [Control de versiones] (https://github.com/).
- Spatie [Manejador de Roles y Permisos de usuarios] (https://spatie.be/).

## Pasos de ejecución

Para realizar el correcto despligue y ejecucion de la aplicacion se necesita lo siguiente:

- Descargar e instalar Composer
- Descargar e instalar Laragon
- Descargar e instalar git
- Entrar al directorio C:\laragon\www\
- Ejecutar el comando en la terminal en el directori anterior: git clone https://github.com/PabloProgramador77/grupo-castores.git
- Entrar el repositorio creado por el comando anterior y ejecutar el comando: cd nombre_carpete
- Instalar todas las dependencias requeridas por el proyecto, con el comando: composer install
- Copiar y configurar el archivo .ENV con el comando: cp .env.example .env
- Generar la llave de la aplicación con el comando: php artisan key:generate
- Configurar la base de datos en el archivo .ENV colocando la linea DB_DATABASE=database/database.sqlite
- Ejecutar las migraciones para crear las tablas con el comando: php artisan migrate
- Por último levantar el servidor de la aplicación con el comando: php artisan serve
- Entrar por el enlace retornado en la terminal que por lo general es: http://127.0.0.1:8000
