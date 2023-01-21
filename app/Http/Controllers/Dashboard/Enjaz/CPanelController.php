<?php

namespace App\Http\Controllers\Dashboard\Enjaz;

use App\Http\Controllers\Controller;

class CPanelController extends Controller
{

    /**
     * Show the application dashboard
     */
    public function index()
    {
        return view('dashboard.Enjaz.cpanel');
    }
}
