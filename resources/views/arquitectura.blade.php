@extends('layouts.app')

@section('title', 'Arquitectura del Sistema')

@section('content')
<div class="container text-center">
    <h2>Arquitectura del Sistema</h2>
    <p>Este es el diseño en capas de nuestro sistema SISOFT_SAUL.</p>
    <img src="{{ asset('images/arquitectura.png') }}" alt="Diagrama de arquitectura" class="img-fluid">
</div>
@endsection
