<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Anime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends controller
{
    public function index()
    {
        return view('admin/admin-pannel');
    }   
    // Users
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
    public function userUpdate(Request $request, User $user)
    {
        $user->update([
            'name' => $request->input('name'),
        ]);
    
        return redirect()->route('user.index')->with('success', 'User ' . $user->name . ' updated successfully');
    }
    
    // Anime post 
    public function animeIndex()
    {
        $anime = anime::all();
        return view('animelist', ['animes' => $anime]);
    }   

    public function animeCreate(Request $request)
    {
    
        $anime = new Anime;
        $anime->name = $request->input('name');
        $anime->description = $request->input('description');
        $anime->user_id = auth()->user()->id; // Set the user ID of the creator
        $anime->save();
        
        return redirect('/admin-pannel')->with('success', 'Anime added successfully');
    }

    public function animeDetail(Anime $anime)
{
    return view('detail', compact('anime'));
}

}

