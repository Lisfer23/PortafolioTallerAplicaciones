<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//definir relación empleado con departamento
class Empleado extends Model
{
    protected $primaryKey = 'run'; // Clave primaria personalizada
    public $incrementing = false; // Indica que la clave no es autoincremental
    protected $keyType = 'string'; // Tipo de clave

    protected $fillable = [
        'run',
        'nombre',
        'codigo_departamento',
    ];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'codigo_departamento', 'codigo');
    }

}
