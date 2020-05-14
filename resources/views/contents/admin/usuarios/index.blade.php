@extends('templates/admin/LayoutAdmin')


@section('contents')
    <h3>Usuarios</h3>
    <br>
    <a href="" class="btn btn-info" data-target="#create" data-toggle="modal">Crear usuario</a>
    <br>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>Nombres</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>
                    <a href="#" class="btn btn-danger" onclick="eliminarUsuario({{$user->id}})">
                        Eliminar
                    </a>
                </td>
                <td>{{$user->nombres.' '.$user->apellidos}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->telefono}}</td>
                <td>
                    <a href="#" class="btn btn-primary">Detalles</a>
                    <a href="#" class="btn btn-warning">Editar</a>
                    <a href="#" class="btn btn-dark">Resetear</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
              {{ $users->links() }}
            </ul>
        </nav>
    </div>
@endsection


@section('modals')
<!-- Modal Crear Usuarios -->
<div class="modal" tabindex="-1" role="dialog" id="create">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Crear usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="container">
                <form method="POST" action="{{ route('admin.users_create') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Nombres') }}</label>
    
                        <div class="col-md-8">
                            <input id="nombres" type="text" class="form-control @error('nombres') is-invalid @enderror" name="nombres" value="{{ old('nombres') }}" required autocomplete="nombres" autofocus>
    
                            @error('nombres')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Nombres no válidos</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="apellidos" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>
    
                        <div class="col-md-8">
                            <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" value="{{ old('apellidos') }}" required autocomplete="apellidos" autofocus>
    
                            @error('apellidos')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Apellidos no válidos</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cargo" class="col-md-4 col-form-label text-md-right">{{ __('Cargo') }}</label>
    
                        <div class="col-md-8">
                            <input id="cargo" type="text" class="form-control @error('cargo') is-invalid @enderror" name="cargo" value="{{ old('cargo') }}" required autocomplete="cargo" autofocus>
    
                            @error('cargo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Cargo inválido</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>
    
                        <div class="col-md-8">
                            <input id="telefono" type="number" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>
                            @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Teléfono inválido</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
    
                    <div class="from-group row">
                        <label for="id_rol" class="col-md-4 col-form-label text-md-right">{{__('Rol')}}</label>
                        <div class="col-md-8">
                            <select name="id_rol" id="id_rol" class="custom-select">
                                <option hidden>Roles</option>
                                @foreach($roles as $rol)
                                    <option value="{{$rol->id_rol}}">{{$rol->rol}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo electrónico') }}</label>
                        <div class="col-md-8">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Correo inválido</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Registrar') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>

<input type="hidden" id="url_delete" value="{{route('admin.users_delete')}}">
@endsection

@section('scripts')
    <script src="{{URL::asset('js/ajax/admin/users/users_ajax.js')}}"></script>
@endsection