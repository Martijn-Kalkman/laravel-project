<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends controller
{
    public function index()
    {
        return view('admin/admin-pannel');
    }
    public function userIndex()
    {
        return view('admin/user');
    }

//     public function updateName(Request $request)
// {
//     $user = Auth::user();
//     $user->name = $request->input('name');
//     $user->save();

//     return view('admin/admin-dashboard');
// }
}