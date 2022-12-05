<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Creditos extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "descripcion",
        "monto_credito",
        "fecha_inicial",
        "fecha_final",
        "id_cliente"
    ];
}
