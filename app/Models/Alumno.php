<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    // 1º Nombre de la tabla
    protected $table = "alumnos";

    // 2º Atributos que me van a venir de las querys o que puedo insertar/actualizar
    protected $fillable = [
        'nombre',
        'apellidos',
        'telefono',
        'correo',
        'fecha_nacimiento',
        'nota_media',
        'experiencia',
        'formacion',
        'habilidades',
        'fotografia',
        'pdf'
    ];

    // 3º Relaciones (por ahora no hay)
}
