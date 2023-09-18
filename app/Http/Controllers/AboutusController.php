<?php

namespace App\Http\Controllers;

use Illuminate\Https\Request;

class AboutusController extends controller
{
    public function index()
    {
        return view('about-us');
    }
}
