<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;


class AnimelistController extends Controller
{
    public function index()
    {
        return view('animelist', [
            'animes' => Anime::latest()->filter(request('search'))->get()
        ]);
    }

    public function update(Request $request, Anime $anime)
    {
        if ($anime->user_id !== auth()->user()->id) {
            return redirect()->back()->with('error', 'You are not authorized to update this anime.');
        }
    
        $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Update image validation rules
            'description' => 'required',
        ]);
    
        $anime->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);
    
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            
            $request->image->storeAs('images', $imageName);
            $request->image->move(public_path('images'), $imageName);

            $anime->image = 'images/' . $imageName;
            $anime->save();
        }
    
        return redirect()->back()->with('success', 'Anime updated successfully');
    }

    public function animeDelete(Anime $anime)
    {
        $name = $anime->name;
        $anime->delete();
        return redirect()->route('animeIndex')->with('success', 'Account ' . $name . ' is succesvol Verwijderd uit het systeem');
    }
}