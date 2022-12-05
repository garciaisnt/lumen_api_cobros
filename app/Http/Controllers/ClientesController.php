<?php

namespace App\Http\Controllers;

use App\Models\Clientes;


use Illuminate\Http\Request;

class ClientesController extends Controller
{ 

    public function getAll(){
        return ["lista" => Clientes::All()];
    }

    public function getById(Int $id){
        return Clientes::find($id);
    }

    public function getByName(String $nombre){
        return Clientes::where('nombre_completo', 'like', '%'. $nombre .'%')->get();
    }

}