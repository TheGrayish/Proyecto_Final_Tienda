<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ProvedorController;
use App\Models\Orden;
use Illuminate\Support\Facades\Route;


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

Route::resource('home', ClienteController::class);
Route::resource('facturas', FacturaController::class);
Route::resource('orden', OrdenController::class);

Route::middleware(['role:admin'])->group(function () {
    
    Route::resource('productos', ProductosController::class);
    Route::resource('categoria', CategoriaController::class);
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
