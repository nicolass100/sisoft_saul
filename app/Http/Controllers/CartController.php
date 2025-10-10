<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // Mostrar el carrito
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    // Agregar producto al carrito
    public function add(Request $request, $id)
    {
        $producto = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            // Si ya existe, aumentar cantidad
            $cart[$id]['cantidad']++;
        } else {
            // Si no existe, agregarlo
            $cart[$id] = [
                'nombre' => $producto->nombre,
                'precio' => $producto->precio,
                'cantidad' => 1,
                'imagen' => $producto->imagen
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Producto agregado al carrito');
    }

    // Actualizar cantidad de un producto
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['cantidad'] = (int) $request->cantidad;
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Carrito actualizado');
    }

    // Eliminar producto del carrito
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Producto eliminado del carrito');
    }
}
