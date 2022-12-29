<?php

use App\Http\Controllers\Admin\AdminClienteController;
use App\Http\Controllers\Admin\AdminProductoController;
use App\Http\Controllers\HomeAdminController;
use App\Http\Controllers\HomeVentaController;
use App\Http\Controllers\Venta\PanelVentaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/prueba', function(){
    return view('prueba');
}); */
Route::get('/prueba', [PanelVentaController::class,'venta'])->name('prueba');

Route::get('/add', [PanelVentaController::class,'pruebassold'])->name('add');

/* Route::get('/productos', function(){
    $prod = Producto::all();
    /* dd($prod); * /
    return view('admin.producto_v.index',['prod'=>$prod]);
}); */

//PANEL-VENTAS
Route::get('/venta',[HomeVentaController::class,'index'])->name('venta');

//VENTAS
Route::resource('venta/panel-venta', PanelVentaController::class)->names('venta.panelventa_c');

//PANEL-ADMIN
Route::get('/panel-admin',[HomeAdminController::class,'index'])->name('panel-admin');

//PRODUCTOS
/* Route::get('admin/producto', [AdminProductoController::class.'index']); */
Route::resource('admin/producto', AdminProductoController::class)->names('admin.producto_c');

//CLIENTES
/* Route::get('admin/producto', [AdminProductoController::class.'index']); */
Route::resource('admin/cliente', AdminClienteController::class)->names('admin.cliente_c');




//CANCELACIONES
Route::get('cancelar/{ruta}', function ($ruta) {
    return redirect()->route($ruta)->with('cancelar', '¡Cancelado correntamente!');
})->name('cancelar');

/* Route::get('/admin', function () {
    return view('template.admin');
}); */


Route::get('/', function () {
    return view('welcome');
});
