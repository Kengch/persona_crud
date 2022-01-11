@extends('layouts.layout')
    @section('content')
        <h1>Editar persona</h1>

        <div>
            <form action="{{route('editar.editarPersona')}}" method="POST">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="InputNombre">Digite su nombre</label>
                    <input type="text" name="nombre" class="form-control" id="InputNombre" placeholder="Ej: Keng" value='{{$listaPersona[0]->nombre}}'>
                </div>

                <div class="form-group">
                    <label for="InputApellido">Digite su apellido</label>
                    <input type="text" name="apellido" class="form-control" id="InputApellido" placeholder="Ej: Chang Salas" value='{{$listaPersona[0]->apellido}}'>
                </div>

                <div class="form-group">
                    <label for="InputCedula">Digite su numero de cedula</label>
                    <input type="number" name="cedula" class="form-control" id="InputCedula" placeholder="Ej: 1-1733-0481" value='{{$listaPersona[0]->cedula}}'>
                </div>

                <div class="form-group">
                    <label for="InputCorreo">Email address</label>
                    <input type="email" name="correo" class="form-control" id="InputCorreo" placeholder="Ej: ejemplo@gmail.com" value='{{$listaPersona[0]->correo}}'>
                </div>
                <div class="form-group">
                <label for="SelectProvincia">Provincia</label>
                    <select class="custom-select" id="SelectProvincia" name="provincia">
                        <option >Choose...</option>
                        @foreach($lista_provincias as $provincia)
                            <option {{ ($provincia->id==$listaPersona[0]->idProvincia) ? 'selected':''}} value="{{$listaPersona[0]->idProvincia}}">{{$provincia->provincia}}</option>
                        @endforeach
                    </select>
                </div>
                <input type="text" name='id' value='{{$listaPersona[0]->id}}' hidden>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    @stop