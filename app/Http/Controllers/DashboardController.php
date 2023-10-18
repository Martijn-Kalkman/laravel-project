<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $users = User::all();
        return view('admin/user', ['users' => $users]);
    }
}