@extends('layouts.app')

@section('title', 'Editar Producto')

@section('content')
<div class="container py-4">
  <h3 class="fw-bold mb-4">Editar Producto</h3>

  <form action="{{ route('admin.productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
    @csrf
    @method('PUT')

    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label fw-bold">Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre', $producto->nombre) }}" class="form-control" required>
      </div>

      <div class="col-md-6">
        <label class="form-label fw-bold">SKU</label>
        <input type="text" name="sku" value="{{ old('sku', $producto->sku) }}" class="form-control" required>
      </div>

      <div class="col-md-4">
        <label class="form-label fw-bold">Precio (S/)</label>
        <input type="number" step="0.01" name="precio" value="{{ old('precio', $producto->precio) }}" class="form-control" required>
      </div>

      <div class="col-md-4">
        <label class="form-label fw-bold">Stock</label>
        <input type="number" name="stock" value="{{ old('stock', $producto->stock) }}" class="form-control" required>
      </div>

      <div class="col-md-4">
        <label class="form-label fw-bold">Descripción</label>
        <textarea name="descripcion" rows="3" class="form-control">{{ old('descripcion', $producto->descripcion) }}</textarea>
      </div>

      <hr class="my-4">

      <h5 class="fw-bold">Actualizar Imágenes</h5>

      @php
        $imagenes = [
          'imagen' => $producto->imagen,
          'imagen_2' => $producto->imagen_2,
          'imagen_3' => $producto->imagen_3,
          'imagen_4' => $producto->imagen_4,
        ];
      @endphp

      @foreach ($imagenes as $key => $img)
        <div class="col-md-3 text-center">
          <label class="form-label fw-bold">{{ ucfirst(str_replace('_', ' ', $key)) }}</label>
          <input type="file" name="{{ $key }}" class="form-control mb-2 img-input" data-preview="#preview_{{ $key }}">
          <img id="preview_{{ $key }}" 
               src="{{ $img ? asset('storage/'.$img) : asset('images/no-image.png') }}" 
               class="img-thumbnail" width="150" alt="Vista previa">
        </div>
      @endforeach
    </div>

    <div class="mt-4 text-end">
      <a href="{{ route('admin.productos.index') }}" class="btn btn-outline-dark me-2">
        <i class="fa fa-arrow-left"></i> Volver
      </a>
      <button type="submit" class="btn btn-success fw-bold">
        <i class="fa fa-save"></i> Guardar Cambios
      </button>
    </div>
  </form>
</div>
@endsection

@push('scripts')
<script>
// Vista previa instantánea al cambiar imagen
document.querySelectorAll('.img-input').forEach(input => {
  input.addEventListener('change', e => {
    const file = e.target.files[0];
    const preview = document.querySelector(e.target.dataset.preview);
    if (file) {
      const reader = new FileReader();
      reader.onload = event => preview.src = event.target.result;
      reader.readAsDataURL(file);
    }
  });
});
</script>
@endpush
