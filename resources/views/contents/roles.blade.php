@extends('master')

@section('content')
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre del rol</th>
                    <th>Panel</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $rol)
                <tr>
                    <td>{{$rol->rol}}</td>
                    <td>
                        <a href="#" class="btn btn-primary">
                            Ir
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection