<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Empleado;
use App\Models\Departamento;
use Iluminate\Support\Facades\DB;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $empleados = Empleado::with('departamento')->get(); // Cargar datos del departamento relacionado
        return view('empleados.index', compact('empleados'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $departamentos = Departamento::all(); // Obtener todos los departamentos para el dropdown
        return view('empleados.create', compact('departamentos'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'run' => 'required|string|unique:empleados,run',
            'nombre' => 'required|string|max:255',
            'codigo_departamento' => 'required|exists:departamentos,codigo', // Validar que el departamento exista
        ]);

        Empleado::create($request->all());

        return redirect()->route('empleados.index')->with('success', 'Empleado creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado) // funcion para mostrar la vista
    {
        //
        return view('empleados.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado) //funcion para editar vista de actualizar
    {
        //
        $departamentos = Departamento::all(); // Obtener todos los departamentos para el dropdown
        return view('empleados.edit', compact('empleado', 'departamentos'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado) //funcion para actualizar
    {
        //
        $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo_departamento' => 'required|exists:departamentos,codigo', // Validar que el departamento exista
        ]);

        $empleado->update($request->all());

        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado exitosamente.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado) //funcion para eliminar
    {
        //
        $empleado->delete();

        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado exitosamente.');

    }

    public function empleadosConPresupuesto()
    {
        // Subconsulta para obtener los códigos de departamentos con presupuesto mayor a 50000
        $departamentosConPresupuesto = Departamento::where('presupuesto', '>', 50000)
            ->pluck('codigo'); // Obtiene solo los códigos de los departamentos

        // Consulta principal para obtener empleados que pertenecen a esos departamentos
        $empleados = Empleado::whereIn('codigo_departamento', $departamentosConPresupuesto)
            ->get();

        return view('empleados.empleados_con_presupuesto', compact('empleados'));
    }

}
