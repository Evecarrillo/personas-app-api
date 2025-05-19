<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ComunaController;
use App\Http\Controllers\api\DepartamentoController;
use App\Http\Controllers\api\MunicipioController;
use App\Http\Controllers\api\PaisesController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// comunas
Route::post('/comunas', [ComunaController::class, 'store']);
Route::get('/comunas', [ComunaController::class, 'index'])->name('comunas');
Route::delete('/comunas/{comuna}', [ComunaController::class, 'destroy'])->name('comunas.destroy');
Route::get('/comunas/{comuna}', [ComunaController::class, 'show'])->name('comunas.show');
Route::put('/comunas/{comuna}', [ComunaController::class, 'update'])->name('comunas.update');

// departamentos
Route::post('/departamentos', [DepartamentoController::class, 'store']);
Route::get('/departamentos', [DepartamentoController::class, 'index'])->name('departamentos');
Route::get('/departamentos/{id}', [DepartamentoController::class, 'show'])->name('departamentos.show');
Route::put('/departamentos/{id}', [DepartamentoController::class, 'update'])->name('departamentos.update');
Route::delete('/departamentos/{id}', [DepartamentoController::class, 'destroy'])->name('departamentos.destroy');

// municipios
Route::post('/municipios', [MunicipioController::class, 'store']);
Route::get('/municipios', [MunicipioController::class, 'index'])->name('municipios');
Route::get('/municipios/{municipio}', [MunicipioController::class, 'show'])->name('municipios.show');
Route::put('/municipios/{municipio}', [MunicipioController::class, 'update'])->name('municipios.update');
Route::delete('/municipios/{municipio}', [MunicipioController::class, 'destroy'])->name('municipios.destroy');

// paises
Route::post('/paises', [PaisesController::class, 'store']);
Route::get('/paises', [PaisesController::class, 'index'])->name('paises');
Route::get('/paises/{id}', [PaisesController::class, 'show'])->name('paises.show');
Route::put('/paises/{id}', [PaisesController::class, 'update'])->name('paises.update');
Route::delete('/paises/{id}', [PaisesController::class, 'destroy'])->name('paises.destroy');
