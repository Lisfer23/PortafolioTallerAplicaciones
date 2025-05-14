@extends('layouts.app') <!-- Extiende la plantilla principal 'app' -->

@section('content') <!-- Comienza la sección de contenido -->


<div class="container">
    <h1>Lista de Departamentos</h1> <!-- titulo -->

<!-- filtro de BUSQUEDA-->
<form action="{{ route('departamentos.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <!-- Para buscar por código o nombre -->
            <input type="text" name="search" class="form-control" placeholder="Buscar por código o nombre" value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Buscar</button>
            <!-- Si se realiza una búsqueda, muestra el botón para mostrar todos los departamentos -->
            @if(request('search'))
            <a href="{{ route('departamentos.index') }}" class="btn btn-info">Mostrar Todos</a>
            @endif
        </div>
</form>


    <a href="{{ route('departamentos.create') }}" class="btn btn-primary mb-3">Crear Departamento</a> <!-- Botón para crear un nuevo departamento -->
    <table class="table">
        <thead>
            <tr>
                <th>Código</th> <!-- Columna para el código del departamento -->
                <th>Nombre</th> <!-- Columna para el nombre del departamento -->
                <th>Presupuesto</th> <!-- Columna para el presupuesto del departamento -->
                <th>Acciones</th> <!-- Columna para las acciones para los botones (ver, editar, eliminar) -->
            </tr>
        </thead>
        <tbody>
            <!-- Itera sobre cada departamento y muestra sus datos -->
            @foreach ($departamentos as $departamento)
            <tr>
                <td>{{ $departamento->codigo }}</td> <!-- Muestra el código del departamento -->
                <td>{{ $departamento->nombre }}</td>
                <td>{{ $departamento->presupuesto }}</td>
                <td>
                    <a href="{{ route('departamentos.show', $departamento->codigo) }}" class="btn btn-info btn-sm">Ver</a> <!-- Botón para ver los detalles del departamento -->
                    <a href="{{ route('departamentos.edit', $departamento->codigo) }}" class="btn btn-warning btn-sm">Editar</a>   <!-- Botón para editar el departamento -->
                    <!-- Formulario para eliminar un departamento -->
                    <form action="{{ route('departamentos.destroy', $departamento->codigo) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
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
