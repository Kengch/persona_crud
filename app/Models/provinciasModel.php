<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class provinciasModel extends Model
{
    use HasFactory;
    protected $table = 'provincia';
    function __construct(){
        
    }

    //devuelve la lista de provincias
    function lista_provincias(){
        $provincias = provinciasModel::all();
        //echo '<pre>',var_dump($personas);
        //die;
        return $provincias;
    }

    //Agrega la provincia
    function agregarProvincia($provincia){
        $provinciaResult = provinciasModel::insert($provincia);
        if ($provinciaResult == true) {
            return true;
        }
        else{
            return false;
        }
    }

    //regresa una provincia por nombre
    function obtenerProvincia($provincia){
        $result = provinciasModel::where('provincia', $provincia)->get();
        return $result;
    }

    //regresa una provincia por id
    function obtenerProvinciaId($id){
        $result = provinciasModel::where('id', $id)
        ->get(array(
            'provincia.id as id',
            'provincia.provincia as provincia'
        ));
        return $result;
    }

    //actualiza a una persona
    function actualizar($provincia, $id){
        $provinciaResult = provinciasModel::where('id', $id)->update($provincia);
        if ($provinciaResult == true) {
            return true;
        }
        else
        {
            return false;
        }
    }

    //borra una provincia
    function borrar($id){
        $result = provinciasModel::where('id', $id)->delete();
        if($result == true){
            return true;
        }
        else{
            return false;
        }
    }
}
