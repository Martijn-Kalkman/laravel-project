<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends controller
{
    public function index()
    {
        return view('profile');
    }

    public function updateName(Request $request)
{
    $user = Auth::user();
    $user->name = $request->input('name');
    
    return view('profile');
}
}