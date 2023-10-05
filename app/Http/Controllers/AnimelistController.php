<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimelistController extends controller
{
    public function index()
    {
        return view('animelist');
    }
}