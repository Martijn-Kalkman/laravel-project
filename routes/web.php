<?php

use App\Http\Controllers\AboutusController;
use App\Http\Controllers\AnimelistController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('/about-us', [AboutusController::class, 'index']);
Route::get('/animelist', [AnimelistController::class, 'index'])->middleware('auth');
Route::post('/update-name', [AnimelistController::class, 'updateName'])->name('update.name');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
