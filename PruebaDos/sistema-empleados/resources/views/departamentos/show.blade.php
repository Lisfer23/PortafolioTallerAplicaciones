@extends('layouts.app') <!-- Extiende la plantilla principal 'app' -->

@section('content') <!-- Comienza la sección de contenido -->

<div class="container">
    <h1>Detalles del Departamento</h1>
    <p><strong>Código:</strong> {{ $departamento->codigo }}</p> <!-- muestra el codigo de departamento -->
    <p><strong>Nombre:</strong> {{ $departamento->nombre }}</p>
    <p><strong>Presupuesto:</strong> {{ $departamento->presupuesto }}</p>
    <a href="{{ route('departamentos.index') }}" class="btn btn-secondary">Volver</a> <!-- Boton que direcciona a listado de departamentos -->

</div>
@endsection <!-- Finaliza la sección de contenido -->
