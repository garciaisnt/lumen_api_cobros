<?php

namespace App\Http\Controllers;

use App\Models\Abonos;
use App\Models\Creditos;


use Illuminate\Http\Request;

class CreditosController extends Controller
{ 

    public function getAll(){
        return Creditos::All();
    }

    public function getById(Int $id){
        return Creditos::find($id);
    }

    public function getByClienteId(Int $idCliente){
        return Creditos::where('id_cliente', '=', $idCliente)->get();
    }

    public function insertar(Request $req){

        $descripcion    = $req->descripcion;
        $monto_credito  = $req->monto_credito;
        $fecha_inicial  = $req->fecha_inicial;
        $fecha_final    = $req->fecha_final;
        $id_cliente     = $req->id_cliente;
        
        if( empty($descripcion)     || 
            empty($monto_credito)   || 
            empty($fecha_inicial)   || 
            empty($fecha_final)     || 
            empty($id_cliente)  
            
        ){
            return ["error" => "Completa los campos requeridos: descripcion, monto_credito, fecha_inicial, fecha_final,id_cliente"];
        }

        $newCredito = Creditos::create([
            "descripcion"   => $descripcion,   
            "monto_credito" => $monto_credito, 
            "fecha_inicial" => $fecha_inicial,  
            "fecha_final"   => $fecha_final,  
            "id_cliente"    => $id_cliente
        ]);

        return $newCredito;
    }

    public function estadoCredito(Int $id_credito){
       
        if( empty($id_credito)){
            return ["error" => "Completa los campos requeridos: id_credito"];
        }
        /*Ver si la suma excede el total de credito*/
        $credito = Creditos::find($id_credito);

        if(!$credito){
            return ["estado" => "No existe"];
        }

        $total_credito = $credito->monto_credito;

        $total_abonos = Abonos::where('id_credito', '=', $id_credito)->get();

        $sumatoria = 0;
        foreach ($total_abonos as $abono) {
            $sumatoria += $abono->monto;
        } 

        if(($sumatoria == $total_credito)){
            return ["estado" => "Completado"];
        }        
        
        return ["estado" => "Incompleto"];
    }


}