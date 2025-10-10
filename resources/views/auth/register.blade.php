@extends('layouts.app')

@section('title', 'Crear Cuenta')

@section('content')
<div class="container col-md-6">
    <h2 class="mb-4">Crear Cuenta</h2>

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Registrarse</button>
    </form>
</div>
@endsection
