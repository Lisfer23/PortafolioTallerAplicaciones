@extends('layouts.app') <!-- Extiende la plantilla principal 'app' -->

@section('content') <!-- Comienza la sección de contenido -->

<div class="container"> <!-- Contenedor principal -->
    <h1>Lista de Empleados</h1> <!-- Titulo -->
    <a href="{{ route('empleados.create') }}" class="btn btn-primary mb-3">Crear Empleado</a> <!-- Botón para llevarte al formulario de creación de nuevo empleado -->

    <!-- Tabla para mostrar la lista de empleados -->
    <table class="table">
        <thead>
            <tr>
                <th>RUN</th>
                <th>Nombre</th>
                <th>Departamento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empleados as $empleado)  <!-- Itera sobre cada empleado pasado desde el controlador -->
            <tr>
                <td>{{ $empleado->run }}</td> <!-- Muestra el RUN del empleado -->
                <td>{{ $empleado->nombre }}</td> <!-- Muestra el nombre del empleado -->
                <td>{{ $empleado->departamento->nombre ?? 'Sin departamento' }}</td> <!-- Muestra el nombre del departamento del empleado o un mensaje por defecto si no tiene -->

                <!-- Botones de acción: Ver, Editar, Eliminar -->
                <td>
                    <a href="{{ route('empleados.show', $empleado->run) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('empleados.edit', $empleado->run) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('empleados.destroy', $empleado->run) }}" method="POST" style="display:inline;">
                        @csrf <!-- funcion de Laravel para generar un token de seguridad CSRF, para prevenir ataques de falsificación de solicitudes entre sitios. -->
                        @method('DELETE') <!-- método HTTP DELETE -->
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- boton para regresar al INICIO -->
    <div class="mb-3">
        <a href="{{ route('home') }}" class="btn btn-secondary">Regresar al Home</a>
    </div>

</div>
@endsection <!-- Finaliza la sección de contenido -->
