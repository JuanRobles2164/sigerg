@extends('Templates/Administrador/LayoutAdmin')
@section('Contenido')
    <br>
    <h3>Lista de usuarios</h3>
    <div class="container">
        <br>
            <a href="#" class="btn btn-primary">Crear usuario</a>
        <br>
    </div>
    <br>
    <div class="container">
        <input type="text" id="criterio" class="form-control" placeholder="Buscar por cualquier atributo...">
    </div>
    <br>
    <table id="tabla" class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nombre completo</th>
                <th scope="col">Correo</th>
                <th scope="col">Cargo</th>
                <th scope="col">Area</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $u)
                <tr>
                    <td>{{$u->nombres.' '.$u->apellidos}}</td>
                    <td>{{$u->correo}}</td>
                    <td>{{$u->cargo}}</td>
                    <td>{{$u->id_area}}</td>
                    <td>
                        <a href="#" class="btn btn-primary">Ver</a>
                        <a href="#" class="btn btn-warning">Editar</a>
                        <a href="#" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection