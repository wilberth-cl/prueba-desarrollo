<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Documento;
use App\Models\Producto;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\DB;

class PDFController extends Controller
{
    public function generarPDFProductos()
    {
        $productos = Producto::all();
        $tituloreporte = 'Reporte: Productos.';
        $fechahora = 'Fecha y hora: '.now();

        PDF::setOption(['dpi' => 150]);
        $pdf = PDF::loadView('reportes.generar_pdf_productos', compact('productos','tituloreporte','fechahora'));
       
        return $pdf->download('productos.pdf');
    }

    public function generarPDFClientes()
    {
        $clientes = Cliente::all();
        $tituloreporte = 'Reporte: Clientes.';
        $fechahora = 'Fecha y hora: '.now();

        PDF::setOption(['dpi' => 150]);
        $pdf = PDF::loadView('reportes.generar_pdf_clientes', compact('clientes','tituloreporte','fechahora'));
       
        return $pdf->download('clientes.pdf');
    }

    public function generarPDFReportePorClientes(){
        $tituloreporte = 'Reporte Ventas por: Clientes.';
        $fechahora = 'Fecha y hora: '.now();

        $clientes = Documento::with('cliente:idcliente,rfc,razon_social')->select('idcliente')->distinct()->get();
        $gruposclientes = DB::table('documentos')
        ->select('idcliente',DB::raw('SUM(subtotal) as subtotal_cliente'),DB::raw('SUM(iva) as iva_cliente'),DB::raw('SUM(total) as total_cliente'))
        ->groupBy('idcliente')
        ->get();

        PDF::setOption(['dpi' => 150]);
        $pdf = PDF::loadView('reportes.generar_pdf_reporteporclientes',compact('gruposclientes','clientes','tituloreporte','fechahora'));
        return $pdf->download('reporte_por_clientes.pdf');
    }

     public function generarPDFReportePorProductos(){
        $tituloreporte = 'Reporte Ventas por: Productos.';
        $fechahora = 'Fecha y hora: '.now();

        
        $id_materials = DB::table('documentorenglon')->select('idmaterial')->distinct()->get();
        $collectproductos = collect($id_materials)->map(function ($idmaterials){
            return Producto::where('idmaterial',$idmaterials->idmaterial)->get(['idmaterial','descripcion']); 
        });
        $grupos = DB::table('documentorenglon')
        ->select('idmaterial',DB::raw('SUM(cantidad) as cantidad_prod'),DB::raw('SUM(precio1) as subtotal_prod'))
        ->groupBy('idmaterial')
        ->get();

        PDF::setOption(['dpi' => 150]);
        $pdf = PDF::loadView('reportes.generar_pdf_reporteporproductos',compact('grupos','collectproductos','tituloreporte','fechahora'));
        return $pdf->download('reporte_por_productos.pdf');
    }
}
