@extends('Templates/master')
@section('Contenido')
<br>
<h3>Cambie su contraseña</h3>
<br>
@isset($mensaje)
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{$mensaje}}</strong> inténtalo nuevamente.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endisset
    <form action="" method="POST" class="container">
        @csrf
        <div class="form-group">
            <label for="">Nueva contraseña</label>
            <input type="password" name="contrasenia" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Confirmar contraseña</label>
            <input type="password" name="contrasenia_confirm" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Cambiar</button>
    </form>
@endsection