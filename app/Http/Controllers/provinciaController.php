<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\provinciasModel;

class provinciaController extends Controller
{
    protected $provinciasModel;

    function __construct(provinciasModel $provinciasModel){
        $this->provinciasModel = $provinciasModel;
    }

    //devuelve una vista con la lista de provincias
    function provincia(){
        $listaProvincias = $this->provinciasModel->lista_provincias();
        return view('provincia.lista', array('listaProvincias' => $listaProvincias));
    }

    //devuelve la vista para crear
    function crearProvincia(){
        return view('provincia.crearProvincia');
    }

    //recibe la informacion, crea una provincia
    function crear(Request $Request){
        $obtenerProvincia = $this->provinciasModel->obtenerProvincia($Request->provincia);
        if (count($obtenerProvincia) >= 1) {
            return back();
        }

        $provincia = array(
            'provincia' => $Request->provincia
        );

        $agregarProvincia = $this->provinciasModel->agregarProvincia($provincia);
        if ($agregarProvincia == true) {
            return redirect('provincias');
        }
        else{
            return back();
        }
        //echo var_dump($Request); die;
    }

    //Devuelve la vista para editar
    function editar($id){
        //llama al metodo 'obtener provincia' del modelo 'provinciasModel'
        $obtenerProvincia = $this->provinciasModel->obtenerProvinciaId($id);
        return view('provincia.editarProvincia', array('lista_provincias' => $obtenerProvincia));
    }

        //recibe la informacion, edita una provincia
    function editarProvincia(Request $Request){
        $provincia = array(
            'provincia' => $Request->provincia
        );

        $id=$Request->id;
        //$result = $this->provinciasModel->actualizar($provincia, $id);
        $result = true;
        if ($result == true) {
            return redirect('index');
        }
        else{
            return back();
        }
    }

    function borrarProvincia($id){
        $result = $this->provinciasModel->borrar($id);
        return back();
    }
}
