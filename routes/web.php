<?php

use App\Http\Controllers\AboutusController;
use App\Http\Controllers\AnimelistController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::get('/animelist', [AnimelistController::class, 'index']);

Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');
// Route::post('/update-name', [ProfileController::class, 'updateName'])->name('update.name');
// Route::post('/update-password', [ProfileController::class, 'updatePassword'])->name('update.password');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Admin only
// Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function() {
    Route::get('/admin-pannel', [ProfileController::class, 'index'])->middleware(['auth', 'isAdmin']);
// });