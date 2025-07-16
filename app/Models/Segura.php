<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Segura extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'tipo_seguridad',
        'radio',
        'latitud',
        'longitud',
    ];
}
