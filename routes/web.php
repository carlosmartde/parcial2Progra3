<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('peliculas', PeliculaController::class)->only(['index', 'destroy']);
