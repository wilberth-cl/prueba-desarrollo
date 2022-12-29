<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Documento;
use App\Models\Producto;
use Illuminate\Http\Request;

class AdminVentaController extends Controller
{
    public function reportePorProductos(){
        $productos = Documento::with('cliente','productos')->get();
        return view('admin.ventas_v.reporte_productos', compact('productos'));
    }
}
