<?php
//controladores de las rutas
use App\Http\Controllers\ComunaController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\MunicpioController;
use App\Http\Controllers\PaisesController;
//==============================================
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//RUTAS COMUNAS
Route::middleware('auth')->group(function (){
    Route::get('/comunas', [ComunaController::class, 'index'])->name('comunas.index');
    Route::get('/comunas/create', [ComunaController::class, 'create'])->name('comunas.create');
    Route::post('/comunas', [ComunaController::class, 'store'])->name('comunas.store');
    Route::get('/comunas/{comuna}', [ComunaController::class, 'show'])->name('comunas.show');
    Route::get('/comunas/{comuna}/edit', [ComunaController::class, 'edit'])->name('comunas.edit');
    Route::put('/comunas/{comuna}', [ComunaController::class, 'update'])->name('comunas.update');
    Route::delete('/comunas/{comuna}', [ComunaController::class, 'destroy'])->name('comunas.destroy');
    
});

//RUTAS DEPARTAMENTOS 
Route::middleware('auth')->group(function (){
    Route::get('/departamentos', [DepartamentoController::class, 'index'])->name('departamentos.index');
    Route::get('/departamentos/create', [DepartamentoController::class, 'create'])->name('departamentos.create');
    Route::post('/departamentos', [DepartamentoController::class, 'store'])->name('departamentos.store');
    Route::get('/departamentos/{departamento}', [DepartamentoController::class, 'show'])->name('departamentos.show');
    Route::get('/departamentos/{departamento}/edit', [DepartamentoController::class, 'edit'])->name('departamentos.edit');
    Route::put('/departamentos/{departamento}', [DepartamentoController::class, 'update'])->name('departamentos.update');
    Route::delete('/departamentos/{departamento}', [DepartamentoController::class, 'destroy'])->name('departamentos.destroy');
});

//RUTAS MUNICIPIOS
Route::middleware('auth')->group(function(){
    Route::get('/municipios', [MunicpioController::class, 'index'])->name('municipios.index');
    Route::get('/municipios/create', [MunicpioController::class, 'create'])->name('municipios.create');
    Route::post('/municipios', [MunicpioController::class, 'store'])->name('municipios.store');
    Route::get('/municipios/{municipio}', [MunicpioController::class, 'show'])->name('municipios.show');
    Route::get('/municipios/{municipio}/edit', [MunicpioController::class, 'edit'])->name('municipios.edit');
    Route::put('/municipios/{municipio}', [MunicpioController::class, 'update'])->name('municipios.update');
    Route::delete('/municipios/{municipio}', [MunicpioController::class, 'destroy'])->name('municipios.destroy');
});

//RUTAS DE PAISES
Route::middleware('auth')->group(function(){
    Route::get('/paises', [PaisesController::class, 'index'])->name('paises.index');
    Route::get('/paises/create', [PaisesController::class, 'create'])->name('paises.create');
    Route::post('/paises', [PaisesController::class, 'store'])->name('paises.store');
    Route::get('/paises/{pais}', [PaisesController::class, 'show'])->name('paises.show');
    Route::get('/paises/{pais}/edit', [PaisesController::class, 'edit'])->name('paises.edit');
    Route::put('/paises/{pais}', [PaisesController::class, 'update'])->name('paises.update');
    Route::delete('/paises/{pais}', [PaisesController::class, 'destroy'])->name('paises.destroy');
});

require __DIR__.'/auth.php';
