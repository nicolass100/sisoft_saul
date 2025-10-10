<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController; // Catálogo público
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\CartController;

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

// Login & Registro manual
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas de carrito
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

// Rutas protegidas (solo autenticados)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('productos', AdminProductController::class);
});
