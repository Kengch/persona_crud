@extends('layouts.layout')
    @section('content')
        <h1>Crear nueva persona</h1>

        <div>
            <form action="{{route('crear.crearPersona')}}" method="POST">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="InputNombre">Digite su nombre</label>
                    <input type="text" name="nombre" class="form-control" id="InputNombre" placeholder="Ej: Keng">
                </div>

                <div class="form-group">
                    <label for="InputApellido">Digite su apellido</label>
                    <input type="text" name="apellido" class="form-control" id="InputApellido" placeholder="Ej: Chang Salas">
                </div>

                <div class="form-group">
                    <label for="InputCedula">Digite su numero de cedula</label>
                    <input type="number" name="cedula" class="form-control" id="InputCedula" placeholder="Ej: 1-1733-0481">
                </div>

                <div class="form-group">
                    <label for="InputCorreo">Email address</label>
                    <input type="email" name="correo" class="form-control" id="InputCorreo" placeholder="Ej: ejemplo@gmail.com">
                </div>
                <div class="form-group">
                <label for="SelectProvincia">Provincia</label>
                    <select class="custom-select" id="SelectProvincia" name="provincia">
                        <option selected>Choose...</option>
                        @foreach($lista_provincias as $provincia)
                            <option value="{{$provincia->id}}">{{$provincia->provincia}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    @stop