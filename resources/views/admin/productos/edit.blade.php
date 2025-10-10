@extends('layouts.app')

@section('title', 'Editar Producto')

@section('content')
<div class="container">
    <h2 class="mb-4">Editar Producto</h2>

    {{-- Mensajes de error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" 
                   class="form-control" 
                   value="{{ old('nombre', $producto->nombre) }}" required>
        </div>

        <div class="mb-3">
            <label for="sku" class="form-label">SKU</label>
            <input type="text" name="sku" id="sku" 
                   class="form-control" 
                   value="{{ old('sku', $producto->sku) }}" required>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio (S/.)</label>
            <input type="number" step="0.01" name="precio" id="precio" 
                   class="form-control" 
                   value="{{ old('precio', $producto->precio) }}" required>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" name="stock" id="stock" 
                   class="form-control" 
                   value="{{ old('stock', $producto->stock) }}" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" rows="4" class="form-control">{{ old('descripcion', $producto->descripcion) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label><br>
            @if($producto->imagen)
                <img src="{{ asset('storage/'.$producto->imagen) }}" alt="Imagen actual" class="mb-2" style="max-height: 80px;"><br>
            @endif
            <input type="file" name="imagen" id="imagen" class="form-control">
            <small class="text-muted">Si subes una nueva, reemplazará la actual.</small>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fa fa-save"></i> Actualizar
        </button>
        <a href="{{ route('admin.productos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
