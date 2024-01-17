<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;


class AnimelistController extends Controller
{
    public function index()
    {
        $query = Anime::latest()->where('status', 1);

        if ($search = request('search')) {
            $query->filter($search);
        }
    
        if ($category = request('category')) {
            $query->where('category', $category);
        }
    
        $animes = $query->get();
    
        return view('animelist', [
            'animes' => $animes,
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
    
        return redirect('/profile')->with('success', 'Anime status toggled successfully.');
    }

    public function animeDelete(Anime $anime)
    {
        $name = $anime->name;
        $anime->delete();
        return redirect()->route('animeIndex')->with('success', 'Account ' . $name . ' is succesvol Verwijderd uit het systeem');
    }


    public function toggleStatus($id)
    {
        $anime = Anime::find($id);
    
        if ($anime) {
            $status = $anime->status == 1 ? 0 : 1;
    
            $values = ['status' => $status];
            Anime::where('id', $id)->update($values);
    
            return redirect('/anime')->with('success', 'Anime status toggled successfully.');
        } else {
            return redirect('/animeIndex')->with('error', 'Anime not found.');
        }
    }
    

}