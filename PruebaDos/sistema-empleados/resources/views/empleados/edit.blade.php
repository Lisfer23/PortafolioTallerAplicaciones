@extends('layouts.app') <!-- Extiende la plantilla principal 'app' -->
@section('content') <!-- Comienza la sección de contenido -->

<!-- Contenedor principal -->
<div class="container"> <!-- Contenedor principal -->
    <h1>Editar Empleado</h1>

    <!-- Formulario para actualizar un empleado existente -->
    <form action="{{ route('empleados.update', $empleado->run) }}" method="POST">
        @csrf <!-- funcion de Laravel para generar un token de seguridad CSRF, para prevenir ataques de falsificación de solicitudes entre sitios. -->
        @method('PUT') <!-- Avisar que utilizatas el metodo PUT, para actualizar recursos en laravel -->
        <div class="mb-3"> <!-- Campo de entrada para el RUN del empleado -->
            <label for="run" class="form-label">RUN</label>
            <!-- Campo de texto para el RUN del empleado, solo lectura ya que no debe cambiar -->
            <input type="text" name="run" id="run" class="form-control" value="{{ $empleado->run }}" readonly>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $empleado->nombre }}" required> <!-- Campo para editar el nombre del empleado, requerido -->
        </div>
        <div class="mb-3">
            <!-- Selector desplegable para elegir el Departamento -->
            <label for="codigo_departamento" class="form-label">Departamento</label>
            <select name="codigo_departamento" id="codigo_departamento" class="form-select" required>
                <option value="">Selecciona un departamento</option> <!-- Opción por defecto para seleccionar un departamento -->
                @foreach ($departamentos as $departamento) <!-- Recorre la lista de departamentos y crea una opción por cada uno -->
                <option value="{{ $departamento->codigo }}" {{ $empleado->codigo_departamento == $departamento->codigo ? 'selected' : '' }}> <!-- Compara el departamento actual del empleado con el departamento de la iteración -->
                    {{ $departamento->codigo }} -   <!-- Muestra el código del departamento -->
                    {{ $departamento->nombre }} <!-- Muestra el nombre del departamento -->
                </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button> <!-- Botón para enviar el formulario y actualizar los datos del empleado -->
    </form>
</div>
@endsection <!-- Finaliza la sección de contenido -->
