@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="container col-md-6">
    <h2 class="mb-4">Iniciar Sesión</h2>

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-check mb-3">
            <input type="checkbox" name="remember" class="form-check-input">
            <label class="form-check-label">Recordarme</label>
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
</div>
@endsection
