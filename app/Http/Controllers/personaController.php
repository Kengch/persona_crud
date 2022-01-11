<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\personaModel;
use App\Models\provinciasModel;

class personaController extends Controller
{
    protected $personaModel;
    protected $provinciasModel;

    function __construct(personaModel $personaModel, provinciasModel $provinciasModel){
        $this->personaModel = $personaModel;
        $this->provinciasModel = $provinciasModel;
    }

    // regresa a la vista la lista de personas
    function index(){
        $lista_personas = $this->personaModel->lista_personas();
        //echo var_dump($lista_personas); die;
        return view('persona.index', array('lista_persona' => $lista_personas));
    }

   //devuelve la vista para crear
    function crear(){
        $lista_provincias = $this->provinciasModel->lista_provincias();
        return view ('persona.crear', array('lista_provincias' => $lista_provincias));
    }

    //Recibe la informacion de la vista de crear, crea y envia al modelo
    function crearPersona(Request $Request){
        $persona = array(
            'nombre'=>$Request->nombre,
            'apellido'=>$Request->apellido,
            'cedula'=>$Request->cedula,
            'correo'=>$Request->correo,
            'idProvincia'=>$Request->provincia
        );

        $obtenerPersonaCedula = $this->personaModel->obtenerPersonaCedula($Request->cedula);
        if (count($obtenerPersonaCedula) >= 1) {
            return back();
        }

        $agregarPersona = $this->personaModel->agregarPersona($persona);
        if ($agregarPersona == true) {
            return redirect('index');
        }
        else {
            return back();
        }
    }

    //devuelve la vista para editar
    function editar($id){
        $lista_provincias = $this->provinciasModel->lista_provincias();
        //echo '<pre>',var_dump($lista_provincias); die; 
        
        $obtenerPersona = $this->personaModel->obtenerPersona($id);
        return view('persona.editar', array('lista_provincias' => $lista_provincias, 'listaPersona' => $obtenerPersona));
    }

    //Recibe la informacion de la vista de editar, editar y envia al modelo
    function editarPersona(Request $Request){
        $persona = array(
            'nombre'=>$Request->nombre,
            'apellido'=>$Request->apellido,
            'cedula'=>$Request->cedula,
            'correo'=>$Request->correo,
            'idProvincia'=>$Request->provincia
        );
        $id=$Request->id;

        //echo '<pre>',var_dump($persona);
        //die; 

        $result = $this->personaModel->actualizar($persona, $id);

        if ($result == true){
            return redirect('index');
        }
        else {
            return back();
        }
               
    }

    function borrar($id){
        $result = $this->personaModel->borrar($id);
        return back();
    }
}
