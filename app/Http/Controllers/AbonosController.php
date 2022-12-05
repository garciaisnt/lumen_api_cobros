<?php

namespace App\Http\Controllers;

use App\Models\Abonos;
use App\Models\Creditos;
use Illuminate\Http\Request;

class AbonosController extends Controller
{ 

    public function getAll(){
        return Abonos::All();
    }

    public function getById(Int $id){
        return Abonos::find($id);
    }

    public function getByIdCredito(int $id){
        return Abonos::where('id_credito', '=', $id)->get();
    }


    public function insertar(Request $req){

        $tipo_pago      = $req->tipo_pago;
        $monto          = $req->monto;
        $fecha_abono    = $req->fecha_abono;
        $id_credito     = $req->id_credito;
        
        
        if( empty($tipo_pago)       || 
            empty($monto)           || 
            empty($fecha_abono)     || 
            empty($id_credito)                
            
        ){
            return ["error" => "Completa los campos requeridos: tipo_pago, monto, fecha_abono, id_credito"];
        }

        /*Ver si la suma excede el total de credito*/

        $credito = Creditos::find($id_credito);
        $total_credito = $credito->monto_credito;

        $total_abonos = Abonos::where('id_credito', '=', $id_credito)->get();

        $sumatoria = 0;
        foreach ($total_abonos as $abono) {
            $sumatoria += $abono->monto;
        }

        //sumar el monto entrante a los ya registrados
        $sumatoria += $monto;

        if($sumatoria > $total_credito){
            return ["error" => "La suma de los abonos excede el total del credito."];
        }


        $newAbono = Abonos::create([
            "tipo_pago"     => $tipo_pago, 
            "monto"         => $monto, 
            "fecha_abono"   => $fecha_abono,
            "id_credito"    => $id_credito
        ]);

        return $newAbono;
    }

    

}