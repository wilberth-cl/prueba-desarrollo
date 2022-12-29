<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeVentaController extends Controller
{
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect()->route('venta.panelventa_c.index');
    }
}
