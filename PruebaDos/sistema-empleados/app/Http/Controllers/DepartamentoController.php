<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Departamento; //implementa ruta para departamento

use Illuminate\Support\Facades\DB;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        //$departamentos = Departamento::all();
        //return view('departamentos.index', compact('departamentos'));

        //Obtener el término de búsqueda (si existe)
        $search = $request->input('search');

       // Consulta para filtrar departamentos
       $departamentos = Departamento::query()
           ->when($search, function ($query, $search) {
               // Buscar por código o nombre
               $query->where('codigo', 'like', "%{$search}%")
                     ->orWhere('nombre', 'like', "%{$search}%");
           })
           ->get();

       return view('departamentos.index', compact('departamentos'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('departamentos.create');
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
            'codigo' => 'required|string|unique:departamentos,codigo',
            'nombre' => 'required|string|max:255',
            'presupuesto' => 'required|numeric|min:0',
        ]);

        Departamento::create($request->all());

        return redirect()->route('departamentos.index')->with('success', 'Departamento creado exitosamente.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Departamento $departamento)
    {
        //
        return view('departamentos.show', compact('departamento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Departamento $departamento)
    {
        //
        return view('departamentos.edit', compact('departamento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departamento $departamento)
    {
        //
        $request->validate([
            'nombre' => 'required|string|max:255',
            'presupuesto' => 'required|numeric|min:0',
        ]);

        $departamento->update($request->all());

        return redirect()->route('departamentos.index')->with('success', 'Departamento actualizado exitosamente.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departamento $departamento)
    {
        //
        $departamento->delete();

        return redirect()->route('departamentos.index')->with('success', 'Departamento eliminado exitosamente.');

    }

    public function joinDepartamentoEmpleados()
    {
        // Consulta con JOIN para obtener departamentos y la cantidad de empleados
        $departamentos = Departamento::leftJoin('empleados', 'departamentos.codigo', '=', 'empleados.codigo_departamento')
        ->select(
            'departamentos.codigo',
            'departamentos.nombre',
            'departamentos.presupuesto',
            DB::raw('COUNT(empleados.run) as total_empleados') // Contar empleados
        )
        ->groupBy('departamentos.codigo', 'departamentos.nombre', 'departamentos.presupuesto')
        ->get();

    return view('departamentos.joinDepartamentoEmpleados', compact('departamentos'));
    }

}
