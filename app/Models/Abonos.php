<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Abonos extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [        
        "tipo_pago", 
        "monto", 
        "fecha_abono",
        "id_credito"
    ];
}
