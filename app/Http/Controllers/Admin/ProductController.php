<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Mostrar listado de productos (admin)
    public function index()
    {
        $productos = Product::all();
        return view('admin.productos.index', compact('productos'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('admin.productos.create');
    }

    // Guardar producto
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'sku' => 'required|string|max:50|unique:products,sku',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagenPath = null;
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('productos', 'public');
        }

        Product::create([
            'nombre' => $request->nombre,
            'sku' => $request->sku,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'descripcion' => $request->descripcion,
            'imagen' => $imagenPath,
        ]);

        return redirect()->route('admin.productos.index')
            ->with('success', '✅ Producto creado correctamente.');
    }

    // Mostrar formulario de edición
    public function edit($id)
    {
        $producto = Product::findOrFail($id);
        return view('admin.productos.edit', compact('producto'));
    }

    // Actualizar producto
    public function update(Request $request, $id)
    {
        $producto = Product::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'sku' => 'required|string|max:50|unique:products,sku,' . $producto->id,
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagenPath = $producto->imagen;
        if ($request->hasFile('imagen')) {
            if ($producto->imagen && Storage::disk('public')->exists($producto->imagen)) {
                Storage::disk('public')->delete($producto->imagen);
            }
            $imagenPath = $request->file('imagen')->store('productos', 'public');
        }

        $producto->update([
            'nombre' => $request->nombre,
            'sku' => $request->sku,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'descripcion' => $request->descripcion,
            'imagen' => $imagenPath,
        ]);

        return redirect()->route('admin.productos.index')
            ->with('success', '✏️ Producto actualizado correctamente.');
    }

    // Eliminar producto
    public function destroy($id)
    {
        $producto = Product::findOrFail($id);

        if ($producto->imagen && Storage::disk('public')->exists($producto->imagen)) {
            Storage::disk('public')->delete($producto->imagen);
        }

        $producto->delete();

        return redirect()->route('admin.productos.index')
            ->with('success', '🗑️ Producto eliminado correctamente.');
    }
}
