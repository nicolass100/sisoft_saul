<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController; // Controlador público (catálogo)
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\PedidoController; // Controlador del checkout (pedido)
use App\Http\Controllers\Admin\PedidoController as AdminPedidoController; // Nuevo: controlador admin de pedidos

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Aquí se definen todas las rutas del sitio:
| - Catálogo público (productos visibles al cliente)
| - Autenticación (login/registro)
| - Carrito de compras
| - Proceso de pedido (checkout)
| - Panel de administración protegido por middleware "auth"
|--------------------------------------------------------------------------
*/

// Página principal
Route::get('/', function () {
    return view('home');
})->name('home');

// Página estática: Arquitectura
Route::get('/arquitectura', function () {
    return view('arquitectura');
})->name('arquitectura');


// CATÁLOGO PÚBLICO
Route::get('/productos', [ProductController::class, 'index'])->name('productos.index');
Route::get('/productos/{id}', [ProductController::class, 'show'])->name('productos.show');


// AUTENTICACIÓN (Login / Registro / Logout)
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// CARRITO DE COMPRAS
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');


// CHECKOUT / PEDIDO (flujo después del carrito)
Route::get('/pedido', [PedidoController::class, 'index'])->name('pedido.index');
Route::post('/pedido', [PedidoController::class, 'store'])->name('pedido.store');
Route::get('/pedido/confirmacion', [PedidoController::class, 'confirmacion'])->name('pedido.confirmacion'); // ✅ Confirmación del pedido


// PANEL ADMINISTRATIVO (solo para usuarios autenticados)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Productos
    Route::resource('productos', AdminProductController::class);

    // Pedidos
    Route::resource('pedidos', AdminPedidoController::class)->only(['index', 'show']); // ✅ Nuevo agregado
});
