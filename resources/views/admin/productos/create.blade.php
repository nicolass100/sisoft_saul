@extends('layouts.app')

@section('title', 'Agregar Producto')

@section('content')
<div class="container py-4">
  <h3 class="fw-bold mb-4">Agregar Nuevo Producto</h3>

  <form action="{{ route('admin.productos.store') }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
    @csrf

    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label fw-bold">Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control" required>
      </div>

      <div class="col-md-6">
        <label class="form-label fw-bold">SKU</label>
        <input type="text" name="sku" value="{{ old('sku') }}" class="form-control" required>
      </div>

      <div class="col-md-4">
        <label class="form-label fw-bold">Precio (S/)</label>
        <input type="number" step="0.01" name="precio" value="{{ old('precio') }}" class="form-control" required>
      </div>

      <div class="col-md-4">
        <label class="form-label fw-bold">Stock</label>
        <input type="number" name="stock" value="{{ old('stock') }}" class="form-control" required>
      </div>

      <div class="col-md-4">
        <label class="form-label fw-bold">Descripción</label>
        <textarea name="descripcion" rows="3" class="form-control">{{ old('descripcion') }}</textarea>
      </div>

      <hr class="my-4">

      <h5 class="fw-bold">Imágenes del Producto</h5>

      @for ($i = 1; $i <= 4; $i++)
        <div class="col-md-3 text-center">
          <label class="form-label fw-bold">Imagen {{ $i }}</label>
          <input type="file" name="imagen{{ $i == 1 ? '' : "_$i" }}" class="form-control mb-2 img-input" data-preview="#preview{{ $i }}">
          <img id="preview{{ $i }}" src="{{ asset('images/no-image.png') }}" class="img-thumbnail" width="150" alt="Vista previa">
        </div>
      @endfor
    </div>

    <div class="mt-4 text-end">
      <a href="{{ route('admin.productos.index') }}" class="btn btn-outline-dark me-2">
        <i class="fa fa-arrow-left"></i> Cancelar
      </a>
      <button type="submit" class="btn btn-primary fw-bold">
        <i class="fa fa-save"></i> Guardar Producto
      </button>
    </div>
  </form>
</div>
@endsection

@push('scripts')
<script>
// Vista previa instantánea de imágenes
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
