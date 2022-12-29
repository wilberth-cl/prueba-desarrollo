<?php

namespace App\Http\Controllers;

class HomeAdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect()->route('admin.paneladmin_c.index');
    }


}
