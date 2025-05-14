<?php //define ruta hacia el controller empleado

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DepartamentoController; //ruta a departamentoController

use App\Http\Controllers\EmpleadoController; //ruta a empleadoController

use App\Http\Controllers\HomeController; //ruta a HomeController


Route::get('/', function () {
    return view('welcome');
});

Route::resource('departamentos', DepartamentoController::class);

Route::resource('empleados', EmpleadoController::class);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/departamentos-con-empleados', [DepartamentoController::class, 'joinDepartamentoEmpleados'])->name('departamentos.con_empleados'); // ruta html para departamentoController

Route::get('/empleados-con-presupuesto', [EmpleadoController::class, 'empleadosConPresupuesto'])->name('empleados.con_presupuesto');

