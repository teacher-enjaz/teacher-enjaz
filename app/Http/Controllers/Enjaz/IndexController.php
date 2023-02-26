<?php

namespace App\Http\Controllers\Enjaz;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('enjaz.index');
    }
}
