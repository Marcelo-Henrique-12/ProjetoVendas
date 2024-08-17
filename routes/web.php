<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('home');
    });

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resource('categoria', CategoriaController::class);
});


Auth::routes();
