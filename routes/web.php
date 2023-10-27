<?php

use App\Http\Controllers\AboutusController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AnimelistController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
// Route::get('/about-us', [AboutusController::class, 'index']);

Route::get('/animelist', [AnimelistController::class, 'index']);

Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');
Route::post('/update-name', [ProfileController::class, 'updateName'])->name('update.name');
// Route::post('/update-password', [ProfileController::class, 'updatePassword'])->name('update.password');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Admin only
    Route::get('/admin-pannel', [DashboardController::class, 'index'])->middleware(['auth', 'isAdmin']);

    Route::get('/users', [DashboardController::class, 'userIndex'])->name('user.index')->middleware(['auth', 'isAdmin']);
    Route::delete('/users/{user}', [DashboardController::class, 'userDelete'])->name('userDelete')->middleware(['auth', 'isAdmin']);
    Route::put('/users', [DashboardController::class, 'userUpdate'])->name('userUpdate')->middleware(['auth', 'isAdmin']);

    Route::get('/animelist', [DashboardController::class, 'animeIndex'])->name('animeindex')->middleware(['auth', 'isAdmin']);
    Route::post('/admin-pannel', [DashboardController::class, 'animeCreate'])->name('animeCreate')->middleware(['auth', 'isAdmin']);
    
    Route::get('/animelist/{anime}', [DashboardController::class, 'animeDetail'])->name('animeDetail')->middleware(['auth', 'isAdmin']);


