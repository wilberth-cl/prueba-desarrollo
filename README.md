# prueba-desarrollo -> proyecto carrito
- [x] Preparar
### Previamente contar con:

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

## - [X] _En marcha_

# Seguido la clonación:
# cd xampp/htdocs
# git clone <url>
    *para activar Copiar/Pegar Clic Derecho en la ventana -Git Bash -> Options -> Keys -> Ctrl+Shift+Letter
# Ahora acceder a la carpeta clonada y ejercutar los comandos:
# composer install
# npm install
opcionales:
# composer require barryvdh/laravel-debugbar --dev
# composer require yajra/laravel-datatables-oracle

# crear archivo___ .env  __basado en__  .env.example
# php artisan key:generate

#ready!
#npm run dev or npm run build
#php artisan serve

[^1]: Es extremadamente importante que sea la misma version.
