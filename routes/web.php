<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/acercade', function () {
    return view('acercade');
});


Route::resource('/productos', ProductoController::class);

Route::resource('/clientes', ClienteController::class);
