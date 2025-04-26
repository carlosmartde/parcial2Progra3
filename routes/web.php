<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('peliculas', PeliculaController::class)->only(['index', 'destroy']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
