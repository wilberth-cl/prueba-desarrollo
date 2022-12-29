<?php

use App\Http\Controllers\Api\ApiClienteController;
use App\Http\Controllers\API\ApiProductoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//PRODCUTOS => TRAE TODOS
Route::get('lista-productos', [ApiProductoController::class,'listaProductos'])->name('api.lista-productos');

//PRODUCTOS => FILTRA
Route::get('search-producto', [ApiProductoController::class,'searchProducto'])->name('api.search-producto');


//PRODUCTOS => TRAE UNO PARA ORDEN
Route::get('dataproducto/{id}', [ApiProductoController::class,'existProducto'])->name('api.dataproducto');

//CLIENTES => FILTRA
Route::get('/autocomplete-search', [ApiClienteController::class,'autocompleteSearchCliente'])->name('api.autocomplete-search');

//CLIENTES => TRAE UNO PARA ORDEN
Route::get('/existcliente/{id}', [ApiClienteController::class,'existCliente'])->name('api.existcliente');

//COMPRAs
//Route::apiResource('productos', ApiProductoController::class)->names('api.productos');
