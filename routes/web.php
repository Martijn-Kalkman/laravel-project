<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AnimelistController;
use App\Http\Controllers\CreateController;
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

Route::get('/', function () { return view('home'); });
Route::get('/animelist', [AnimelistController::class, 'index']);
Route::get('/animelist/search', [AnimelistController::class, 'index'])->name('animeSearch');
Route::post('/update-name', [ProfileController::class, 'updateName'])->name('update.name');
Route::patch('/animelist/{anime}', [AnimelistController::class, 'update'])->name('anime.update');
Route::patch('/animelist/{anime}', [AnimelistController::class, 'update'])->name('anime.update');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// voor users met een account
Auth::routes();
Route::group(['middleware' => ['auth']], function () {
Route::get('/profile', [ProfileController::class, 'index']);
Route::delete('/profile/{anime}', [AnimelistController::class, 'animeDelete'])->name('userAnimedelete');
Route::post('/create', [CreateController::class, 'animeCreate'])->name('animelist.store');
Route::get('/animelist/{anime}', [DashboardController::class, 'animeDetail'])->name('animeDetail');
Route::get('/create', [CreateController::class, 'index'])->name('createIndex');
Route::post('/animelist/{anime}/toggle', [AnimelistController::class, 'toggleStatus'])->name('animeToggle');

});

// Voor admin
Route::group(['middleware' => ['auth', 'isAdmin']], function () {
    Route::get('/admin-pannel', [DashboardController::class, 'index']);
    Route::get('/users', [DashboardController::class, 'userIndex'])->name('user.index');
    Route::get('/anime', [DashboardController::class, 'animeIndex'])->name('animeIndex');
    Route::delete('/animes/{anime}', [DashboardController::class, 'animeDelete'])->name('animeDelete');
    Route::delete('/users/{user}', [DashboardController::class, 'userDelete'])->name('userDelete');
    Route::put('/users/{user}', [DashboardController::class, 'userUpdate'])->name('userUpdate');
    Route::post('/admin-pannel', [DashboardController::class, 'animeCreate'])->name('animeCreate');
});
