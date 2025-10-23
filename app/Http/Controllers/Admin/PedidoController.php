<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidoController extends Controller
{
    /**
     * Mostrar la lista de pedidos
     */
    public function index(Request $request)
    {
        $busqueda = $request->get('buscar');

        $pedidos = Pedido::when($busqueda, function ($query) use ($busqueda) {
            $query->where('nombre', 'like', "%$busqueda%")
                  ->orWhere('codigo', 'like', "%$busqueda%")
                  ->orWhere('correo', 'like', "%$busqueda%");
        })
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        return view('admin.pedidos.index', compact('pedidos', 'busqueda'));
    }

    /**
     * Mostrar un pedido en detalle
     */
    public function show($id)
    {
        $pedido = Pedido::findOrFail($id);
        return view('admin.pedidos.show', compact('pedido'));
    }
}
