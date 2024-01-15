<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Anime;
use Illuminate\Http\Request;

class DashboardController extends controller
{
    public function index()
    {
        return view('admin/admin-pannel');
    }

    public function animeIndex()
    {
        $animes = Anime::all();
        return view('admin/anime', ['animes' => $animes]);
    }

    public function animeDelete(Anime $anime)
    {
        $name = $anime->name;
        $anime->delete();
        return redirect()->route('animeIndex')->with('success', 'Account ' . $name . ' is succesvol Verwijderd uit het systeem');
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
    public function userUpdate(Request $request, $userId)
    {
        $user = User::find($userId);
    
        $user->update([
            'name' => $request->input('name'),
        ]);
    
        return redirect()->route('user.index')->with('success', 'User ' . $user->name . ' updated successfully');
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

            return redirect('/admin-pannel')->with('success', 'Anime added successfully');
        }
    }

    public function animeDetail(Anime $anime)
    {
        return view('detail', compact('anime'));
    }

}
