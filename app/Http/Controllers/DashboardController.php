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
    public function userDelete(User $user)
    {
    $name = $user->name;
    $user->delete();
    return redirect()->route('user.index')->with('success', 'Account ' . $name . ' is succesvol Verwijderd uit het systeem');
    }
}