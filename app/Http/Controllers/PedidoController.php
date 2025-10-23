<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\Pedido; // Importar el modelo Pedido

class PedidoController extends Controller
{
    /**
     * Mostrar el formulario de pedido (checkout)
     */
    public function index()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Tu carrito está vacío.');
        }

        return view('pedido.index', compact('cart'));
    }

    /**
     * Guardar el pedido enviado desde el formulario
     */
    public function store(Request $request)
    {
        // Validar datos del cliente
        $validated = $request->validate([
            'nombre'        => 'required|string|max:100',
            'correo'        => 'required|email',
            'telefono'      => 'required|string|max:20',
            'direccion'     => 'nullable|string|max:200',
            'metodo_envio'  => 'required|string',
            'metodo_pago'   => 'required|string',
        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Tu carrito está vacío.');
        }

        // Calcular totales
        $subtotal = collect($cart)->sum(fn($item) => $item['precio'] * $item['cantidad']);
        $igv = $subtotal * 0.18;
        $total = $subtotal + $igv;

        // Crear código único de pedido
        $codigo = strtoupper(Str::random(8));

        // Guardar el pedido en base de datos
        $pedido = Pedido::create([
            'codigo'        => $codigo,
            'nombre'        => $validated['nombre'],
            'correo'        => $validated['correo'],
            'telefono'      => $validated['telefono'],
            'direccion'     => $validated['direccion'] ?? null,
            'metodo_envio'  => $validated['metodo_envio'],
            'metodo_pago'   => $validated['metodo_pago'],
            'total'         => $total,
        ]);

        // Vaciar carrito tras registrar pedido
        Session::forget('cart');

        // Preparar datos para pantalla de confirmación
        $pedidoResumen = [
            'cliente' => $validated,
            'codigo' => $codigo,
            'total' => $total,
            'metodo_envio' => $validated['metodo_envio'],
            'metodo_pago' => $validated['metodo_pago'],
            'fecha' => now()->format('d/m/Y H:i:s'),
        ];

        // Redirigir a pantalla de confirmación
        return redirect()->route('pedido.confirmacion')->with('pedido', $pedidoResumen);
    }

    /**
     * Mostrar confirmación del pedido
     */
    public function confirmacion()
    {
        if (!session()->has('pedido')) {
            return redirect()->route('home');
        }

        $pedido = session('pedido');
        return view('pedido.confirmacion', compact('pedido'));
    }
}
