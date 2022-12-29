<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ApiClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocompleteSearchCliente(Request $request)
    {
        $query = $request->get('query');
        $filterResult = Cliente::where('razon_social', 'LIKE', '%'. $query. '%')->get();
        $razones = array();
            foreach ($filterResult as $razon) {
                array_push($razones, $razon['razon_social']);
            }
            //echo json_encode($razones);
            return response()->json($razones);
        
        /* if($request->get('query')){
            $query = $request->get('query');
            $filterResult = Cliente::where('razon_social', 'LIKE', '%'. $query. '%')
                                    ->take(2)
                                    ->get(['idcliente','razon_social']);
            $output = '<ul class="dropdown-menu" style="display:block;position: absolute;width: 100%;">';
            foreach ($filterResult as $value) {
                $output .= '<li><input type="button" class="dropdown-item addselectcliente" id="'.$value->idcliente.'" value="'.$value->razon_social.'"></li>';
            }
            $output .= '</ul>';
            echo $output;
        } */
        //$query = $request->get('query');
        //$filterResult = Cliente::where('razon_social', 'LIKE', '%'. $query. '%')->get(['idcliente',razon_social]);
        //return response()->json($filterResult);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function existCliente($razon_social)
    {   //Para apicustomer - verifica si existe - razon_social
        if( Cliente::where('razon_social','=',$razon_social)->first()){
            $res = Cliente::where('razon_social','=',$razon_social)->get(['idcliente','rfc']);
            return response()->json($res);
        }else{
            return "¡huy, no existe!";
        }

        //Para apicustomer - verifica si existe - id
        /* if( Cliente::where('idcliente','=',$id)->first()){
            $res = Cliente::where('idcliente','=',$id)->get(['razon_social','rfc']);
            return response()->json($res);
        }else{
            return false;
        } */
    }
    
}
