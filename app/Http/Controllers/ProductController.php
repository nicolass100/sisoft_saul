<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Mostrar todos los productos
    public function index()
    {
        // Traer productos de la BD con paginación
        $productos = Product::orderBy('id', 'desc')->paginate(9);

        return view('productos.index', compact('productos'));
    }

    // Mostrar detalle de un producto
    public function show($id)
    {
        $producto = Product::findOrFail($id);

        return view('productos.show', compact('producto'));
    }
}
