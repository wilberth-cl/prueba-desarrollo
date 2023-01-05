<?php

use App\Http\Controllers\Admin\AdminClienteController;
use App\Http\Controllers\Admin\AdminProductoController;
use App\Http\Controllers\Admin\AdminVentaController;
use App\Http\Controllers\Admin\PanelAdminController;
use App\Http\Controllers\Venta\PanelVentaController;
use App\Http\Controllers\HomeAdminController;
use App\Http\Controllers\HomeVentaController;
use App\Http\Controllers\PDFController;
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

//Route::get('/prueba', [PanelVentaController::class,'pruebas'])->name('prueba');

/* Route::get('/productos', function(){
    $prod = Producto::all();
    /* dd($prod); * /
    return view('admin.producto_v.index',['prod'=>$prod]);
}); */

//VENTAS
Route::get('/venta',[HomeVentaController::class,'index'])->name('venta');
//PANEL-VENTAS
Route::resource('venta/panel-venta',PanelVentaController::class)->names('venta.panelventa_c');

//ADMIN
Route::get('/admin',[HomeAdminController::class,'index'])->name('admin');
//PANEL-ADMIN
Route::resource('admin/panel-admin',PanelAdminController::class)->names('admin.paneladmin_c');

//REPORTE POR PRODCUTO
Route::get('admin/reporte-por-productos',[AdminVentaController::class,'reportePorProductos'])->name('admin.reporte-productos_c');
//REPORTE POR CLIENTE
Route::get('admin/reporte-por-clientes',[AdminVentaController::class,'reportePorCliente'])->name('admin.reporte-clientes_c');

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

//GENERAR PDF
Route::get('generate-pdf-clientes', [PDFController::class, 'generarPDFClientes'])->name('descargar-pdf-clientes');
Route::get('generate-pdf-reporteporclientes', [PDFController::class, 'generarPDFReportePorClientes'])->name('descargar-pdf-reporteporclientes');
Route::get('generate-pdf-reporteporproductos', [PDFController::class, 'generarPDFReportePorProductos'])->name('descargar-pdf-reporteporproductos');

//ENTRADA
Route::get('/', function () {
    return view('welcome');
});
