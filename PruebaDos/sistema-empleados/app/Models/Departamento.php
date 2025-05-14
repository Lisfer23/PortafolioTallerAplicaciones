<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//definir relación departamento con empleado
class Departamento extends Model
{
    protected $primaryKey = 'codigo'; // Clave primaria personalizada
    public $incrementing = false; // Indica que la clave no es autoincremental
    protected $keyType = 'string'; // Tipo de clave

    protected $fillable = [
        'codigo',
        'nombre',
        'presupuesto',
    ];

    public function empleados()
    {
        return $this->hasMany(Empleado::class, 'codigo_departamento', 'codigo');
    }

}
