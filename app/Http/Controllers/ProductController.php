<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Mostrar todos los productos con búsqueda y filtros
    public function index(Request $request)
    {
        $query = Product::query();

        // Filtro por búsqueda de nombre o SKU
        if ($request->filled('buscar')) {
            $query->where('nombre', 'like', '%' . $request->buscar . '%')
                  ->orWhere('sku', 'like', '%' . $request->buscar . '%');
        }

        // Filtro por marca
        if ($request->filled('marca')) {
            $query->where('marca', $request->marca);
        }

        // Filtro por categoría
        if ($request->filled('categoria')) {
            $query->where('categoria', $request->categoria);
        }

        // Ver solo ofertas
        if ($request->has('ofertas')) {
            $query->where('oferta', true);
        }

        // Ordenar y paginar
        $productos = $query->orderBy('id', 'desc')->paginate(20);

        // Obtener marcas y categorías únicas para los select
        $marcas = Product::select('marca')->distinct()->pluck('marca');
        $categorias = Product::select('categoria')->distinct()->pluck('categoria');

        return view('productos.index', compact('productos', 'marcas', 'categorias'));
    }

    // Mostrar detalle de un producto
    public function show($id)
    {
        $producto = Product::findOrFail($id);
        return view('productos.show', compact('producto'));
    }
}
