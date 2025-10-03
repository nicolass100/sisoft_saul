<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Página principal
Route::get('/', function () {
    return view('home');
})->name('home');

// Catálogo público
Route::get('/productos', [ProductController::class, 'index'])->name('productos.index');
Route::get('/productos/{id}', [ProductController::class, 'show'])->name('productos.show');

// Nueva página de arquitectura
Route::get('/arquitectura', function () {
    return view('arquitectura');
})->name('arquitectura');

// Rutas protegidas (admin)
Route::middleware(['auth'])->group(function () {
    Route::resource('admin/productos', ProductController::class);
});
