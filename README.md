# prueba-desarrollo -> proyecto carrito
# **_Preparar:_**
### Se requiere contar con:

+ Instalar un IDE (Sublime Text or other)
+ [Instalar Git](https://git-scm.com/download/win)
+ [Intalar Node.js](https://nodejs.org/en/)
+ [Instalar Composer](https://getcomposer.org/doc/00-intro.md#installation-windows)
+ [instalar xampp (v3.2.4)](https://www.apachefriends.org/es/index.html)

### Comprobar versiones comandos:
````
git -v
php -v
node -v
composer -v
````
### Php version[^1]:
> [PHP ^8.0.2](https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/)

# **_En marcha:_**
### Acceder a la carpeta del servidor:
````
cd xampp/htdocs
````
### Clonar el repositorio[^2]:
````
git clone <url>
````
    
### Ahora acceder a la carpeta clonada y ejercutar los comandos:
````
composer install
npm install
````
### Verificar la version de Laravel:
````
php artisan --version
````
> Laravel Framework 9.43.0

### *Opcionales:*
````
composer require barryvdh/laravel-debugbar --dev
composer require yajra/laravel-datatables-oracle
````
### Generar el siguiente archivo[^3]:
````
cp .envexample .env
````
### Generar Key:
````
php artisan key:generate
````

#ready!
````
npm run dev or npm run build
````
````
php artisan serve
````


[^1]: Es extremadamente importante que sea la misma version.
[^2]: Si usas Git Bash -> para activar "Copiar/Pegar" clic Derecho en la ventana -Git Bash -> Options -> Keys -> Ctrl+Shift+Letter
[^3]: Importante completa la configuracion a la base de datos.
