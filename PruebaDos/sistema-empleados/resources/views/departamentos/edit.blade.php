@extends('layouts.app') <!-- Extiende la plantilla principal 'app' -->
@section('content') <!-- Comienza la sección de contenido -->


<div class="container">
    <h1>Editar Departamento</h1> <!-- Titulo -->

    <!-- Formulario para actualizar un departamento que ya existe -->
    <form action="{{ route('departamentos.update', $departamento->codigo) }}" method="POST">
        @csrf <!-- funcion de Laravel para generar un token de seguridad CSRF, para prevenir ataques de falsificación de solicitudes entre sitios. -->
        @method('PUT') <!-- Avisar que utilizatas el metodo PUT, para actualizar recursos en laravel -->
        <div class="mb-3">
            <label for="codigo" class="form-label">Código</label>
            <!-- código del departamento, solo lectura ya que no debe cambiar REANDONLY -->
            <input type="text" name="codigo" id="codigo" class="form-control" value="{{ $departamento->codigo }}" readonly>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <!-- Campo para editar el nombre del departamento, requerido -->
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $departamento->nombre }}" required>
        </div>
        <div class="mb-3">
            <label for="presupuesto" class="form-label">Presupuesto</label>
            <!-- Campo para editar el presupuesto, requerido -->
            <input type="number" step="0.01" name="presupuesto" id="presupuesto" class="form-control" value="{{ $departamento->presupuesto }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button> <!-- Botón para enviar el formulario y actualizar los datos del departamento -->
    </form>
</div>
@endsection <!-- Finaliza la sección de contenido -->
