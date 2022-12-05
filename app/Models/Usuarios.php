<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuarios extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "nombre_completo",
        "usuario",
        "clave"
    ];
}
