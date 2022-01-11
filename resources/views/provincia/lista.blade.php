@extends('Layouts.layout')
    @section('content')
        <a href="{{url('crearProvincia')}}">
            <input type="button" value='Crear' class="btn btn-success mb-2">
        </a>

        <table class="table" id='tablaProvincia'>
            <thead>
                <tr>
                    <th scope='col'>ID</th>
                    <th scope='col'>Nombre de la provincia</th>
                    <th scope='col'>Fecha de creacion</th>
                    <th scope='col'>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach($listaProvincias as $provincia)
                    <tr>
                        <td>{{$provincia->id}}</td>
                        <td>{{$provincia->provincia}}</td>
                        <td>{{$provincia->fecha_de_creacion}}</td>
                        <td>
                            <a href="{{url('editarProvincia', $provincia)}}">
                                <input type="button" class='btn btn-warning' value='Editar'>
                            </a>

                            <a href="{{url('borrarProvincia', $provincia)}}">
                                <input type="button" class='btn btn-danger' value='Borrar'>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <script>
            $(document).ready(function(){
                $('#tablaProvincia').DataTable();
            });
        </script>
    @stop