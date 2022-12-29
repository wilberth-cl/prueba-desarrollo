<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Producto;
use Illuminate\Http\Request;

class HomeAdminController extends Controller
{
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $productos = Producto::count();
        $clientes = Cliente::count();

        return view('admin.panel_control',compact('productos','clientes'));
        // H A B I L I T A R
        //Route::get('/admin', 'HomeAdminController@index')->name('admin');
    }


}
