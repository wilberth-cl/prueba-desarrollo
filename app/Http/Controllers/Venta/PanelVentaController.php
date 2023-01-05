<?php

namespace App\Http\Controllers\Venta;

use App\Http\Controllers\Controller;
use App\Models\Documento;
use App\Models\Producto;
use Illuminate\Http\Request;

class PanelVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $productos = Producto::orderBy('idmaterial','ASC')->get(['idmaterial','descripcion','unidadmedida','precio1']);
        return view('venta.panel_venta',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'idcliente' => 'required',
            'razon_social' => 'required|string|max:60',
            'rfc' => 'required','uppercase','alpha_num','size:15',
            'productos.*' => 'required|alpha_num|max:20',
            'unidadmedida.*' => 'required|alpha_num|max:10',
            'precios.*'=> 'required|regex:/^\d{1,10}(\.\d{0,3})?$/',
            'cantidades.*' =>'required|numeric',
            'subtotalorden'=> 'required|regex:/^\d{1,10}(\.\d{0,3})?$/',
            'iva'=> 'required|regex:/^\d{1,10}(\.\d{0,3})?$/',
            'totalorden'=> 'required|regex:/^\d{1,10}(\.\d{0,3})?$/',
        ]);

        $productos = $request->productos;
        $unidadmedida = $request->unidadmedida;
        $precios = $request->precios;
        $cantidades = $request->cantidades;

        $documento = new Documento();
        $documento->idcliente = $request->input('idcliente');
        $documento->razon_social = $request->input('razon_social');
        $documento->rfc          = $request->input('rfc');
        $documento->subtotal = $request->input('subtotalorden');
        $documento->iva = $request->input('iva');
        $documento->total = $request->input('totalorden');
        $documento->save();
        
        $i=0;
        foreach ($productos as $key => $value) {
            $a = [$value => ['unidadmedida'=> $unidadmedida[$i],'cantidad'=> $cantidades[$i],'precio1'=>   $precios[$i]]];
            $documento->productos()->attach($a);
            $i++;
        }
        return redirect()->route('venta');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function pruebas(){
        return view('prueba');
    }


}
