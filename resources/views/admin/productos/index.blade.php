@extends('layouts.app')

@section('title', 'Gestión de Productos')

@section('content')
<div class="container">
    <h2 class="mb-4">Gestión de Productos</h2>

    {{-- Botón para crear nuevo producto --}}
    <a href="{{ route('admin.productos.create') }}" class="btn btn-success mb-3">
        <i class="fa fa-plus"></i> Nuevo Producto
    </a>

    {{-- Mensajes de éxito --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Tabla de productos --}}
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>SKU</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->sku }}</td>
                    <td>S/ {{ number_format($producto->precio, 2) }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>
                        @if($producto->imagen)
                            <img src="{{ asset('storage/'.$producto->imagen) }}" 
                                 alt="{{ $producto->nombre }}" 
                                 style="max-height: 60px;">
                        @else
                            <span class="text-muted">Sin imagen</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.productos.edit', $producto->id) }}" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i> Editar
                        </a>

                        <form action="{{ route('admin.productos.destroy', $producto->id) }}" 
                              method="POST" 
                              style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Estás seguro de eliminar este producto?')">
                                <i class="fa fa-trash"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">No hay productos registrados</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
