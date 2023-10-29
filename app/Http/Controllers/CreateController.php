<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\anime;
use Illuminate\Support\Facades\Auth;

class CreateController extends controller
{
    public function index()
    {
        return view('create');
    }
    public function animeCreate(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
        ]);
    
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            
            $request->image->storeAs('images', $imageName);
            $request->image->move(public_path('images'), $imageName);
    
            $anime = new Anime;
            $anime->name = $request->name;
            $anime->description = $request->description;
            $anime->user_id = $request->user_id;
            $anime->image = 'images/' . $imageName;

            
    
            $anime->save();
    
            return redirect('/animelist')->with('success', 'Anime toegevoegd');
        }
    }
}