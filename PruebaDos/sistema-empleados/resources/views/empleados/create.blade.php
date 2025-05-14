@extends('layouts.app') <!-- Extiende la plantilla principal 'app' -->

@section('content') <!-- Comienza la sección de contenido -->

<!-- Contenedor que organiza el contenido con una separación adecuada dentro de la página. con Bootstrap -->
<div class="container">
    <h1>Crear Empleado</h1> <!-- titulo -->
    <!-- Formulario que envía los datos mediante el método POST usando la ruta 'empleados.store' -->
    <form action="{{ route('empleados.store') }}" method="POST">
        @csrf <!-- funcion de Laravel para generar un token de seguridad CSRF, para prevenir ataques de falsificación de solicitudes entre sitios. -->
        <!-- Grupo de entrada para llenar los datos requeridos -->
        <div class="mb-3">
            <label for="run" class="form-label">RUN</label>
            <input type="text" name="run" id="run" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
        <div class="mb-3"> <!-- Selector desplegable para elegir el Departamento -->
            <label for="codigo_departamento" class="form-label">Departamento</label>
            <select name="codigo_departamento" id="codigo_departamento" class="form-select" required>
                <option value="">Selecciona un departamento</option>
                @foreach ($departamentos as $departamento) <!-- Recorre la lista de departamentos y crea una opción por cada uno -->
                <option value="{{ $departamento->codigo }}">{{ $departamento->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection <!-- Finaliza la sección de contenido -->
