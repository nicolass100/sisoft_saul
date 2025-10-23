@extends('layouts.app')

@section('title', 'Listado de Productos')

@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold">Productos Registrados</h3>
    <a href="{{ route('admin.productos.create') }}" class="btn btn-primary fw-bold">
      <i class="fa fa-plus"></i> Nuevo Producto
    </a>
  </div>

  @if(session('success'))
    <div class="alert alert-success fw-bold">{{ session('success') }}</div>
  @endif

  <div class="card shadow-sm p-3">
    <div class="table-responsive">
      <table class="table table-striped align-middle text-center">
        <thead class="table-dark">
          <tr>
            <th>#</th>
            <th>Imágenes</th>
            <th>Nombre</th>
            <th>SKU</th>
            <th>Precio (S/)</th>
            <th>Stock</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($productos as $producto)
            @php
              $imgs = collect([
                $producto->imagen,
                $producto->imagen_2,
                $producto->imagen_3,
                $producto->imagen_4
              ])->filter();
            @endphp

<!-- Galería en miniatura -->
<td>
  <div class="d-flex justify-content-center align-items-center gap-2 flex-wrap">
    @if ($imgs->isNotEmpty())
      @foreach ($imgs->take(3) as $img)
        <img 
          src="{{ asset($img) }}" 
          alt="{{ $producto->nombre }}" 
          class="rounded border" 
          width="55" 
          height="55" 
          style="object-fit: cover;"
        >
      @endforeach
    @else
      <img src="{{ asset('images/no-image.png') }}" width="55" class="rounded border" alt="sin imagen">
    @endif
  </div>
</td>

              <td class="fw-bold">{{ $producto->nombre }}</td>
              <td><span class="badge bg-secondary">{{ $producto->sku }}</span></td>
              <td>S/ {{ number_format($producto->precio, 2) }}</td>
              <td>
                @if($producto->stock > 10)
                  <span class="badge bg-success">{{ $producto->stock }}</span>
                @elseif($producto->stock > 0)
                  <span class="badge bg-warning text-dark">{{ $producto->stock }}</span>
                @else
                  <span class="badge bg-danger">Agotado</span>
                @endif
              </td>

              <td>
                <a href="{{ route('admin.productos.edit', $producto->id) }}" class="btn btn-sm btn-warning me-1">
                  <i class="fa fa-edit"></i>
                </a>
                <form action="{{ route('admin.productos.destroy', $producto->id) }}" method="POST" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este producto?')">
                    <i class="fa fa-trash"></i>
                  </button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

@push('styles')
<style>
.table th {
  white-space: nowrap;
}
img.rounded.border {
  transition: transform 0.2s ease;
  cursor: pointer;
}
img.rounded.border:hover {
  transform: scale(1.3);
  z-index: 10;
}
</style>
@endpush
