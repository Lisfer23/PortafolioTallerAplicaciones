@extends('layouts.app')<!-- Extiende el layout principal de la aplicación -->

@section('content') <!-- Inicia la sección de contenido principal -->
<div class="container text-center mt-5">
    <h1>Bienvenido al Sistema de Gestión</h1> <!-- titulo de la pagina -->
    <p>Selecciona una opción para continuar:</p> <!-- elegir una opción -->

    <div class="row mt-4">  <!-- Fila de elementos con margen superior -->
        <div class="col-md-6"> <!-- Columna que ocupa la mitad del ancho en pantallas medianas o mayores -->
            <div class="card"> <!-- Card o tarjeta de información -->
                <div class="card-body"> <!-- cuerpo de card -->
                    <h3 class="card-title">Departamentos</h3> <!-- Título  -->
                    <p>Gestiona los departamentos de la organización.</p> <!-- subtitulo -->
                    <a href="{{ route('departamentos.index') }}" class="btn btn-primary">Ir a Departamentos</a> <!--  boton a dirección a departamentos -->
                    <a href="{{ route('departamentos.con_empleados') }}" class="btn btn-info mt-2">Departamentos con Empleados</a> <!-- boton a dirección a departamentos con empleados -->
                </div>
            </div>
        </div>

        <div class="col-md-6"> <!-- Otra columna que ocupa la mitad del ancho -->
            <div class="card"> <!-- Otra tarjeta -->
                <div class="card-body">
                    <h3 class="card-title">Empleados</h3>
                    <p>Gestiona los empleados de la organización.</p>
                    <a href="{{ route('empleados.index') }}" class="btn btn-success">Ir a Empleados</a> <!-- Botón para ir a la lista de empleados -->
                    <a href="{{ route('empleados.con_presupuesto') }}" class="btn btn-warning mt-2">Empleados con Presupuesto</a> <!-- Botón para ir a la lista de empleados con presupuesto -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
