<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\TipoDocumentoController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/acercade', function () {
    return view('acercade');
});

Route::resource('/productos', ProductoController::class);

Route::resource('/clientes', ClienteController::class);
Route::get('/cliente/pdf', [ClienteController::class, 'pdf'])->name('clientes.pdf');

Route::resource('/tiposdocumento', TipoDocumentoController::class);


