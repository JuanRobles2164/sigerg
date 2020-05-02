@extends('Templates/master')
@section('Contenido')
<br>
<h3>Inicie sesión</h3>
<br>
    @isset($mensaje)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>¡Datos erróneos!</strong> inténtalo nuevamente.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
      <br>
    @endisset
    <form action="{{route('postLogin')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="usuario">Correo o usuario</label>
            <input type="text" class="form-control" name="usuario" id="usuario">
        </div>
        <div class="form-group">
            <label for="contrasenia">Contraseña</label>
            <input type="password" class="form-control" name="contrasenia" id="contrasenia">
        </div>
        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>
    <br>
@endsection