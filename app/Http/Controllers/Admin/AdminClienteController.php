<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();

        return view('admin.cliente_v.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cliente_v.create');
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
            'razon_social' => 'required|string|max:60',
            'rfc' => 'required|uppercase|alpha_num|unique:clientes,rfc|size:15',
        ]);

        $client = new Cliente;
        $client->razon_social = $request->input('razon_social');
        $client->rfc          = $request->input('rfc');
        $client->save();

        return to_route('admin.cliente_c.index')->with('datos','¡Agregado Correntamente!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idcliente)
    {
        //Consulta condicionada para buscar el producto o no devuelve nada
        $cliente = Cliente::where('idcliente',$idcliente)->firstOrFail();

        //Redirige a la vista edit con su request obtenido en la consulta
        return view('admin.cliente_v.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idcliente)
    {
        //Consulta condicionada para buscar el producto o no devuelve nada
        $cliente = Cliente::where('idcliente',$idcliente)->firstOrFail();

        //Redirige a la vista edit con su request obtenido en la consulta
        return view('admin.cliente_v.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idcliente)
    {
        $client = Cliente::findOrFail($idcliente);

        //Validamos el request
        $request->validate([
            'razon_social' => 'required|string|max:60',
            'rfc' => ['required','uppercase','alpha_num','size:15',
                        Rule::unique('clientes')->ignore($client->idcliente,'idcliente')],
        ]);

        $client->razon_social = $request->input('razon_social');
        $client->rfc = $request->input('rfc');
        $client->save();

        return redirect()->route('admin.cliente_c.index')->with('datos','¡Actualizado Correntamente!');

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
        $client = Cliente::findOrFail($id);
        $client->delete();

        return redirect()->route('admin.cliente_c.index')->with('datos','¡Registro eliminado correctamente!');
    }
}
