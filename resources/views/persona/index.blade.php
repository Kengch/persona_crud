@extends('layouts.layout')
    @section('content')
    <a href="{{url('crear')}}">
                  <input type="button" class="btn btn-success mb-2" value='Crear'>
                </a>
      <table class="table" id='tabla_personas'>
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Cedula</th>
            <th scope="col">Correo</th>
            <th scope="col">Provincia</th>
            <th scope="col">Fecha de creacion</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach($lista_persona as $persona)
              <tr>
              <td>{{$persona->id}}</td>
              <td>{{$persona->nombre}}</td>
              <td>{{$persona->apellido}}</td>
              <td>{{$persona->cedula}}</td>
              <td>{{$persona->correo}}</td>
              <td>{{$persona->Provincia}}</td>
              <td>{{$persona->fecha_de_creacion}}</td>
              <td>
                <a href="{{url('editar', $persona)}}">
                  <input type="button" class="btn btn-warning" value='Editar'>
                </a>
                <a href="{{url('borrar',$persona)}}">
                  <input type="button" class="btn btn-danger" value='Borrar'>
                </a>
                
                
              </td>
              </tr>
            @endforeach
        </tbody>
      </table>

        <script>
          $(document).ready( function () {
            $('#tabla_personas').DataTable();
          } );
        </script>
    @stop
