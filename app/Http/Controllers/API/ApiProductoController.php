<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class ApiProductoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchProducto(Request $request)
    {
        $query = $request->get('query');
        $filterResult = Producto::where('idmaterial', 'LIKE', '%'. $query. '%')->get(['idmaterial','unidadmedida','descripcion','precio1']);
        return response()->json($filterResult);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listaProductos()
    {
        //para responder al compo & addInput.vue
        $listaProductos = Producto::orderBy('idmaterial','ASC')->get(['idmaterial','descripcion','unidadmedida','precio1']);
        return $listaProductos;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function existProducto($id)
    {
        $producto = Producto::where('idmaterial',$id)->get(['unidadmedida','precio1']);
        return $producto;

    }

}
