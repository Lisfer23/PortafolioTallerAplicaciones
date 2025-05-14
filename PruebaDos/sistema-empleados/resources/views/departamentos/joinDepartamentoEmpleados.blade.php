@extends('layouts.app') <!-- Extiende la plantilla principal 'app' -->

@section('content') <!-- Sección de contenido -->

<!-- Sección de contenido para mostrar departamentos con empleados -->
<div class="container">
    <h1>Departamentos con Empleados</h1> <!-- Titulo de la pagina -->

    <!-- Tabla de departamentos con empleados -->
    <table class="table">
        <thead>
            <tr>
                <th>Código</th> <!-- Encabezado de la tabla -->
                <th>Nombre</th> <!-- Encabezado de la tabla -->
                <th>Presupuesto</th> <!-- Encabezado de la tabla -->
                <th>Total de Empleados</th>       <!-- Encabezado de la tabla -->
                <th>Acciones</th> <!-- Encabezado de la tabla -->
            </tr>
        </thead>
        <tbody>
            @foreach ($departamentos as $departamento) <!-- Itera sobre cada departamento pasado desde el controlador -->
            <tr>
                <td>{{ $departamento->codigo }}</td> <!-- Muestra el código del departamento -->
                <td>{{ $departamento->nombre }}</td> <!-- Muestra el nombre del departamento -->
                <td>{{ $departamento->presupuesto }}</td> <!-- Muestra el presupuesto del departamento -->
                <td>{{ $departamento->total_empleados }}</td> <!-- Muestra el total de empleados en el departamento -->
                <td>
                    <a href="{{ route('departamentos.show', $departamento->codigo) }}" class="btn btn-info btn-sm">Ver</a>  <!-- Botón para ver los detalles del departamento -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

        <!-- Botón para regresar al Home -->
        <div class="mb-3">
        <a href="{{ route('home') }}" class="btn btn-secondary">Regresar al Home</a>
    </div>
</div>
@endsection <!-- Finaliza la sección de contenido -->
