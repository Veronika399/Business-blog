<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;

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
// Rute za autentifikaciju
Auth::routes();

// Rute za blogove
Route::get('/', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create')->middleware('auth');
Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store')->middleware('auth');
Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');
Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit')->middleware('auth');
Route::put('/blogs/{id}', [BlogController::class, 'update'])->name('blogs.update')->middleware('auth');
Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy')->middleware('auth');

Route::get('/home', [HomeController::class, 'index'])->name('home');
