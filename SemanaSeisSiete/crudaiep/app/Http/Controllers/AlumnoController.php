<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Alumno;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //mostar listas todos
    {
        //
        //return view('alumnos.index');
        $alumnos=Alumno::all();
        return view('alumnos.index',['alumnos'=>$alumnos]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //mostrar el formulario para crear nuevo recurso
    {
        //
        return view('alumnos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //almacenar (insert) un recurso recién creado en el almacenamiento
    {
        //
        $request->validate([
            'run'=>'required|max:12',
            'nombre'=>'required|max:30',
            'fono'=>'required'
      ]);

       $alumno = new Alumno();
       $alumno->run          =$request->input('run');
       $alumno->nombre       =$request->input('nombre');
       $alumno->fono         =$request->input('fono');

       $alumno->save();

       return view('alumnos.message', ['msg'=> "Registro Guardado"]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) // mostrar el recurso especificado Unico
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) //mostrar el fomrulario para editar el recurso especificado
    {
        //
        $alumnos=Alumno::find($id);

        return view('alumnos.edit',['alumnos'=>$alumnos]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) // actualizar el recurso especificado en el almacenamiento
    {
        //
        $request->validate([
            'run'=>'required|max:12',
            'nombre'=>'required|max:30',
            'fono'=>'required'
        ]);

       $alumno = Alumno::find($id);
       $alumno->run          =$request->input('run');
       $alumno->nombre       =$request->input('nombre');
       $alumno->fono         =$request->input('fono');

       $alumno->save();

       return view('alumnos.message', ['msg'=> "Registro Actualizado"]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) //borrar el recurso especificado del almacenamiento
    {
        //
        $alumno=Alumno::find($id);
        $alumno->delete();

        return redirect("alumnos");

    }
}
