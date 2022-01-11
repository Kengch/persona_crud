<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personaModel extends Model
{
    use HasFactory;

    protected $table = 'personas';
    function __construct(){
        
    }

    //regresa la lista de personas 
    function lista_personas(){
        //0 no es borrado, el 1 si es borrado
        $personas = personaModel::join('provincia', 'personas.idProvincia', '=', 'provincia.id')
            ->where('personas.isDeleted', 0)
            ->get(array('personas.id as id', 
            'personas.nombre as nombre', 
            'personas.apellido as apellido', 
            'personas.cedula as cedula', 
            'personas.correo as correo', 
            'provincia.provincia as Provincia', 
            'personas.fecha_de_creacion as fecha_de_creacion'));
        
        return $personas;
    }

    //regresa una persona por id
    function obtenerPersona($id){
        $result = personaModel::where('id', $id)->get();
        return $result;
    }

    //insert de la persona
    function agregarPersona($persona){
        $personaResult = personaModel::insert($persona);
        if ($personaResult == true) {
            return true;
        }
        else {
            return false;
        }
    }

    //regresa una persona por cedula
    function obtenerPersonaCedula($cedula){
        $result = personaModel::where('cedula', $cedula)->get();
        return $result;
    }


    //actualiza a una persona
    function actualizar($persona, $id){
        $personaResult = personaModel::where('id', $id)->update($persona);
        if ($personaResult == true) {
            return true;
        }
        else {
            return false;
        }
    }

    //borra a una persona
    function borrar($id){
        //$result = personaModel::where('id', $id)->delete();
        $result = personaModel::where('id', $id)->update(array('isDeleted' => 1));
        if ($result == true) {
            return true;
        }
        else {
            return false;
        }
    }
}
