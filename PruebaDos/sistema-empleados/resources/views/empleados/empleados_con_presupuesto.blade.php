@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Empleados en Departamentos con Presupuesto Mayor a 50000</h1>

    <!-- Tabla de empleados -->
    <table class="table">
        <thead>
            <tr>
                <th>RUN</th>
                <th>Nombre</th>
                <th>Departamento</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empleados as $empleado)
            <tr>
                <td>{{ $empleado->run }}</td>
                <td>{{ $empleado->nombre }}</td>
                <td>{{ $empleado->departamento->nombre ?? 'Sin departamento' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

        <!-- Botón para regresar al Home -->
        <div class="mb-3">
        <a href="{{ route('home') }}" class="btn btn-secondary">Regresar al Home</a>
    </div>

</div>
@endsection
