@extends('layouts.app') <!-- Extiende la plantilla principal 'app' -->

@section('content') <!-- Comienza la sección de contenido -->

<div class="container"> <!-- Contenedor que organiza el contenido con una separación adecuada dentro de la página. -->
    <h1>Crear Departamento</h1> <!-- titulo -->
    <!-- Formulario para crear un nuevo departamento. El formulario envía los datos a la ruta 'departamentos.store' usando el método POST. -->
    <form action="{{ route('departamentos.store') }}" method="POST">
        @csrf <!-- funcion de Laravel para generar un token de seguridad CSRF, para prevenir ataques de falsificación de solicitudes entre sitios. -->

        <!-- Campo de entrada para el código del departamento. -->
        <div class="mb-3">
            <label for="codigo" class="form-label">Código</label> <!-- Etiqueta para el campo de código. -->
            <input type="text" name="codigo" id="codigo" class="form-control" required> <!-- Campo de texto para ingresar el código del departamento. 'required' hace que el campo sea obligatorio. -->
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="presupuesto" class="form-label">Presupuesto</label>
            <input type="number" step="0.01" name="presupuesto" id="presupuesto" class="form-control" required> <!-- Campo numérico para ingresar el presupuesto, con la opción de decimales (step="0.01"). 'required' hace que el campo sea obligatorio. -->
        </div>

        <!-- Botón de envío del formulario, que guarda el nuevo departamento. -->
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection <!-- Finaliza la sección de contenido -->
