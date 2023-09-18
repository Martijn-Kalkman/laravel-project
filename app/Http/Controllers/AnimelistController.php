<?php

namespace App\Http\Controllers;

use Illuminate\Https\Request;

class AnimelistController extends controller
{
    public function index()
    {
        return view('animelist');
    }
}