@extends('layouts.app') <!-- Extiende la plantilla principal 'app' -->

@section('content') <!-- Comienza la sección de contenido -->

<!-- Sección de contenido para crear un nuevo empleado -->
<div class="container">
    <h1>Detalles del Empleado</h1> <!-- Titulo -->
    <!-- Muestra los detalles del empleado -->
    <p><strong>RUN:</strong> {{ $empleado->run }}</p> <!-- muestra el RUN del empleado -->
    <p><strong>Nombre:</strong> {{ $empleado->nombre }}</p> <!-- muestra el nombre del empleado -->
    <p><strong>Departamento:</strong> {{ $empleado->departamento->nombre ?? 'Sin departamento' }}</p> <!-- muestra el nombre del departamento al que pertenece el empleado, o un mensaje por defecto si no tiene -->
    <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Volver</a> <!-- Boton que direcciona a listado de empleados -->
</div>
@endsection <!-- Finaliza la sección de contenido -->
