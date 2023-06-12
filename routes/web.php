<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RhkController;
use App\Http\Controllers\UserController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('sb-admin.main');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout')->middleware('auth');

Route::resource('rhk', RhkController::class);
// Route::get('rhk/{id}', [RhkController::class, 'index']);

// Route::get('rhk/{id}/index', [RhkController::class, 'index']);
Route::get('rhk/{id}/show', [RhkController::class, 'show'])->middleware('auth');
Route::resource('users', UserController::class);