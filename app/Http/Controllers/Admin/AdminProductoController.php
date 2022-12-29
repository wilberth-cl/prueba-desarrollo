<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class AdminProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        /* return view('admin.producto_v.index', ['prod' => $prod]); */
        return view('admin.producto_v.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.producto_v.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validamos el request
        $request->validate([
            'idmaterial' => 'required|alpha_num|max:20|unique:productos,idmaterial',
            'descripcion' => 'required|string|max:60',
            'unidadmedida' => 'required|alpha_num|max:10',
            'precio1'=> 'required|regex:/^\d{1,10}(\.\d{0,3})?$/',
        ]);

        $prod = new Producto;
        $prod->idmaterial = $request->input('idmaterial');
        $prod->descripcion = $request->input('descripcion');
        $prod->unidadmedida = $request->input('unidadmedida');
        $prod->precio1 = $request->input('precio1');
        $prod->save();

        return to_route('admin.producto_c.index')->with('datos','¡Agregado Correntamente!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idmaterial)
    {
        //Consulta condicionada para buscar el producto o no devuelve nada
        $producto = Producto::where('idmaterial',$idmaterial)->firstOrFail();

        //Redirige a la vista edit con su request obtenido en la consulta
        return view('admin.producto_v.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idmaterial)
    {
        //Consulta condicionada para buscar el producto o no devuelve nada
        $producto = Producto::where('idmaterial',$idmaterial)->firstOrFail();

        //Redirige a la vista edit con su request obtenido en la consulta
        return view('admin.producto_v.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idmaterial)
    {
        //Validamos el request
        $request->validate([
            'descripcion' => 'required|string|max:60',
            'unidadmedida' => 'required|alpha_num|max:10',
            'precio1'=> 'required|regex:/^\d{1,10}(\.\d{0,3})?$/',
        ]);

        $prod = Producto::findOrFail($idmaterial);

        $prod->descripcion = $request->input('descripcion');
        $prod->unidadmedida = $request->input('unidadmedida');
        $prod->precio1 = $request->input('precio1');
        $prod->save();

        return redirect()->route('admin.producto_c.index')->with('datos','¡Actualizado Correntamente!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Consulta para buscar el producto o no devuelve nada
        $prod = Producto::findOrFail($id);
        $prod->delete();

        return redirect()->route('admin.producto_c.index')->with('datos','¡Registro eliminado correctamente!');
    }

}
