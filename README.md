# Shopping Cart.

## It is required to have:

+ IDE (Sublime Text or other)
+ [Is required Git](https://git-scm.com/download/win)
+ [Is required Node.js](https://nodejs.org/en/)
+ [Is required Composer](https://getcomposer.org/doc/00-intro.md#installation-windows)
+ [Is required xampp (v3.2.4)](https://www.apachefriends.org/es/index.html)

## Check installation-versions commands:
~~~~
git -v
php -v
node -v
composer -v
~~~~
## Php version[^1]:
> [PHP ^8.0.2](https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/)
#
#
# **_On going:_**
### Access server folder:
~~~~
cd xampp/htdocs
~~~~
## Clone the repository[^2]:
~~~~
git clone <url>
~~~~
    
## Access the cloned folder and run the commands:
~~~~
composer install
npm install
~~~~
## Check Laravel version:
~~~~
php artisan --version
~~~~
> Laravel Framework 9.43.0

## *optional:*
~~~~
composer require barryvdh/laravel-debugbar --dev
composer require yajra/laravel-datatables-oracle
~~~~
## Generate the following file[^3]:
~~~~
copy .env.example .env
~~~~
### Generate Key:
~~~~
php artisan key:generate
~~~~
#
#
# **_Performance:_**
### The project contains two seeders to start.
> ProductoSeeder y ClienteSeeder
### which can be configured with:
* The first time:
~~~~
php artisan migrate --seed
~~~~
* other times:
~~~~
php artisan migrate:fresh --seed
~~~~
#
#
# ready!
~~~~
npm run dev ó npm run build
~~~~
~~~~
php artisan serve
~~~~


[^1]: It is extremely important to check the version of php.
[^2]: If you use Git Bash -> to activate "Copy/Paste" Right click in the window -Git Bash -> Options -> Keys -> Ctrl+Shift+Letter
[^3]: Important! complete the configuration to the database.
