<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Mostrar listado de productos
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

    // Guardar producto nuevo
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'sku' => 'required|string|max:50|unique:products,sku',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'imagen_2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'imagen_3' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'imagen_4' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Guardar las rutas de imágenes
        $paths = [];
        foreach (['imagen', 'imagen_2', 'imagen_3', 'imagen_4'] as $campo) {
            if ($request->hasFile($campo)) {
                $paths[$campo] = $request->file($campo)->store('productos', 'public');
            } else {
                $paths[$campo] = null;
            }
        }

        Product::create([
            'nombre' => $request->nombre,
            'sku' => $request->sku,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'descripcion' => $request->descripcion,
            'imagen' => $paths['imagen'],
            'imagen_2' => $paths['imagen_2'],
            'imagen_3' => $paths['imagen_3'],
            'imagen_4' => $paths['imagen_4'],
        ]);

        return redirect()->route('admin.productos.index')->with('success', '✅ Producto creado correctamente.');
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
            'imagen_2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'imagen_3' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'imagen_4' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = [
            'nombre' => $request->nombre,
            'sku' => $request->sku,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'descripcion' => $request->descripcion,
        ];

        foreach (['imagen', 'imagen_2', 'imagen_3', 'imagen_4'] as $campo) {
            if ($request->hasFile($campo)) {
                // Eliminar imagen anterior si existía
                if ($producto->$campo && Storage::disk('public')->exists($producto->$campo)) {
                    Storage::disk('public')->delete($producto->$campo);
                }
                // Guardar nueva imagen
                $data[$campo] = $request->file($campo)->store('productos', 'public');
            }
        }

        $producto->update($data);

        return redirect()->route('admin.productos.index')->with('success', '✏️ Producto actualizado correctamente.');
    }

    // Eliminar producto
    public function destroy($id)
    {
        $producto = Product::findOrFail($id);

        foreach (['imagen', 'imagen_2', 'imagen_3', 'imagen_4'] as $campo) {
            if ($producto->$campo && Storage::disk('public')->exists($producto->$campo)) {
                Storage::disk('public')->delete($producto->$campo);
            }
        }

        $producto->delete();

        return redirect()->route('admin.productos.index')->with('success', '🗑️ Producto eliminado correctamente.');
    }
}
