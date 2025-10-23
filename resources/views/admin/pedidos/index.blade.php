@extends('layouts.app')

@section('title', 'Pedidos Registrados')

@section('content')
<div class="container py-5">
  <h2 class="fw-bold mb-4">
    <i class="fa fa-list"></i> Pedidos Registrados
  </h2>

  {{-- Barra de búsqueda --}}
  <form method="GET" action="{{ route('admin.pedidos.index') }}" class="mb-4">
    <div class="input-group">
      <input type="text" name="buscar" value="{{ $busqueda }}" class="form-control" placeholder="Buscar por nombre, código o correo...">
      <button class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
    </div>
  </form>

  {{-- Tabla de pedidos --}}
  <div class="table-responsive">
    <table class="table table-hover align-middle shadow-sm">
      <thead class="table-dark">
        <tr>
          <th>Código</th>
          <th>Cliente</th>
          <th>Correo</th>
          <th>Teléfono</th>
          <th>Método de pago</th>
          <th>Total (S/)</th>
          <th>Fecha</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @forelse($pedidos as $pedido)
          <tr>
            <td class="fw-bold">{{ $pedido->codigo }}</td>
            <td>{{ $pedido->nombre }}</td>
            <td>{{ $pedido->correo }}</td>
            <td>{{ $pedido->telefono }}</td>
            <td>{{ ucfirst($pedido->metodo_pago) }}</td>
            <td class="fw-bold text-success">{{ number_format($pedido->total, 2) }}</td>
            <td>{{ $pedido->created_at->format('d/m/Y H:i') }}</td>
            <td>
              <a href="{{ route('admin.pedidos.show', $pedido->id) }}" class="btn btn-sm btn-outline-primary">
                <i class="fa fa-eye"></i> Ver
              </a>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="8" class="text-center text-muted">No hay pedidos registrados.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  {{-- Paginación --}}
  <div class="mt-3">
    {{ $pedidos->links() }}
  </div>
</div>
@endsection
