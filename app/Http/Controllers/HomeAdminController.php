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
        return to_route('admin.paneladmin_c.index');
    }


}
