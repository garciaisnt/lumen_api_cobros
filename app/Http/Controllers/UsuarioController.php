<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{  

    public function getAll(){
        return Usuarios::all();
    }
    public function validarLogin(Request $req){

        $pass = sha1($req->clave);
        $user = $req->usuario;

        $usuario = Usuarios
                    ::where('clave', '=', $pass, 'and')
                    ->where('usuario', '=', $user)
                    ->first();

        if($usuario){
            return ["valido" => true];  /* , "pass" => $pass, "user" =>$user */
        }
        return ["valido" => false];    /* , "pass" => $pass, "user" =>$user, $req */

    }

    public function insertar(Request $req){

        $nombreCompleto = $req->nombre_completo;
        $user = $req->usuario;
        $pass = $req->clave; 
        
        if( empty($nombreCompleto) || empty($user) || empty($pass) ){
            return ["error" => "Completa los campos requeridos: nombre_completo, usuario, clave"];
        }

        $usuario = Usuarios::create([
            "nombre_completo"   => $nombreCompleto,
            "usuario"           => $user,
            "clave"             => sha1($pass)
        ]);

        return $usuario;
    }
}
