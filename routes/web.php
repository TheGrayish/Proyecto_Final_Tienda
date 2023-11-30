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

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

Route::resource('home', ClienteController::class);
Route::resource('orden', OrdenController::class);
Route::post('/orden/{orden}/restore', [OrdenController::class, 'restore'])->name('orden.restore');
Route::delete('/orden/{orden}/forceDelete', [OrdenController::class, 'forceDelete'])->name('orden.forceDelete');

Route::middleware(['role:admin'])->group(function () {
    
    Route::resource('productos', ProductosController::class);

});

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
