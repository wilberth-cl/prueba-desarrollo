<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Documento;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminVentaController extends Controller
{
    public function reportePorProductos(){

        $id_materials = DB::table('documentorenglon')->select('idmaterial')->distinct()->get();

        $collectproductos = collect($id_materials)->map(function ($idmaterials){
            return Producto::where('idmaterial',$idmaterials->idmaterial)->get(['idmaterial','descripcion']); 
        });

        $grupos = DB::table('documentorenglon')
        ->select('idmaterial',DB::raw('SUM(cantidad) as cantidad_prod'),DB::raw('SUM(precio1) as subtotal_prod'))
        ->groupBy('idmaterial')
        ->get();

        return view('admin.ventas_v.reporte_productos', compact('grupos','collectproductos'));

    }

    public function reportePorCliente(){
        $productos = Documento::with('cliente')->get();
        return view('admin.ventas_v.reporte_clientes', compact('productos'));
    }
}
