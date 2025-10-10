@extends('layouts.app')

@section('title', 'Mi Carrito')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center"><i class="fa fa-shopping-cart"></i> Mi Carrito</h2>

    @if(count($cart) > 0)
        <table class="table table-bordered align-middle shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>Imagen</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $id => $item)
                    <tr>
                        <td width="120">
                            @if($item['imagen'])
                                <img src="{{ asset('storage/'.$item['imagen']) }}" 
                                     class="img-fluid rounded" 
                                     alt="{{ $item['nombre'] }}">
                            @else
                                <img src="https://via.placeholder.com/120x100?text=Sin+Imagen" 
                                     class="img-fluid rounded" 
                                     alt="Sin imagen">
                            @endif
                        </td>
                        <td>{{ $item['nombre'] }}</td>
                        <td>S/ {{ number_format($item['precio'], 2) }}</td>
                        <td>
                            <form action="{{ route('cart.update', $id) }}" method="POST" class="d-flex">
                                @csrf
                                <input type="number" name="cantidad" value="{{ $item['cantidad'] }}" min="1" class="form-control me-2" style="width:80px;">
                                <button type="submit" class="btn btn-sm btn-warning">
                                    <i class="fa fa-sync"></i>
                                </button>
                            </form>
                        </td>
                        <td>S/ {{ number_format($item['precio'] * $item['cantidad'], 2) }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Total general --}}
        <div class="d-flex justify-content-end">
            <h4 class="fw-bold">Total: 
                S/ {{ number_format(collect($cart)->sum(fn($item) => $item['precio'] * $item['cantidad']), 2) }}
            </h4>
        </div>

        {{-- Botones --}}
        <div class="d-flex justify-content-between mt-3">
            <a href="{{ route('productos.index') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left"></i> Seguir comprando
            </a>
            <button class="btn btn-success">
                <i class="fa fa-credit-card"></i> Proceder al pago
            </button>
        </div>
    @else
        <div class="alert alert-info text-center">
            <i class="fa fa-info-circle"></i> Tu carrito está vacío.
        </div>
        <div class="text-center mt-3">
            <a href="{{ route('productos.index') }}" class="btn btn-primary">
                <i class="fa fa-shopping-bag"></i> Ir al catálogo
            </a>
        </div>
    @endif
</div>
@endsection
