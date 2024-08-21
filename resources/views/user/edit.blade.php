@extends('layouts.app')

@section('title','Editar usuario')

@push('css')

@endpush

@section('content')
<div class="container-fluid px-4">

    <ul class="pagination pt-3 pb-5">
        <li class="page-item"><a class="page-link" href="{{ route('panel') }}">Inicio</a></li>
        <li class="page-item"><a class="page-link" href="{{ route('users.index') }}">Usuarios</a></li>
        <li class="page-item active" aria-current="page">
        <span class="page-link">Editar Usuario</span>
        </li>
    </ul>

    <div class="card bg-primary p-2 text-dark bg-opacity-25">
    <h1 class="mt-4 text-center">Actualizar Datos de Usuario</h1>
        <form action="{{ route('users.update',['user' => $user]) }}" method="post">
            @method('PATCH')
            @csrf
            <div class="row p-5 text-dark">
                <!---Nombre---->
                <div class="row col-6 mb-2">
                    <label for="name" class="col-lg-4 col-form-label">Nombres:</label>
                    <div class="col-lg-8">
                        <input type="text" name="name" id="name" class="form-control" value="{{old('name',$user->name)}}">
                    </div>
                    @error('name')
                        <small class="text-danger">{{'*'.$message}}</small>
                    @enderror
                </div>

                <!---Email---->
                <div class="row col-6 mb-2">
                    <label for="email" class="col-lg-4 col-form-label">Email:</label>
                    <div class="col-lg-8">
                        <input type="email" name="email" id="email" class="form-control" value="{{old('email',$user->email)}}">
                    </div>
                    @error('email')
                        <small class="text-danger">{{'*'.$message}}</small>
                    @enderror
                </div>

                <!---Password---->
                <div class="row col-6 mb-2">
                    <label for="password" class="col-lg-4 col-form-label">Contraseña:</label>
                    <div class="col-lg-8">
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    @error('password')
                        <small class="text-danger">{{'*'.$message}}</small>
                    @enderror
                </div>

                <!---Confirm_Password---->
                <div class="row col-6 mb-2">
                    <label for="password_confirm" class="col-lg-4 col-form-label">Confirmar:</label>
                    <div class="col-lg-8">
                        <input type="password" name="password_confirm" id="password_confirm" class="form-control">
                    </div>
                    @error('password_confirm')
                        <small class="text-danger">{{'*'.$message}}</small>
                    @enderror
                </div>

                <!---Roles---->
                <div class="row col-6 mb-2">
                    <label for="role" class="col-lg-4 col-form-label">Seleccionar rol:</label>
                    <div class="col-lg-8">
                        <select name="role" id="role" class="form-select">
                            @foreach ($roles as $item)
                            @if ( in_array($item->name,$user->roles->pluck('name')->toArray()) )
                            <option selected value="{{$item->name}}" @selected(old('role')==$item->name)>{{$item->name}}</option>
                            @else
                            <option value="{{$item->name}}" @selected(old('role')==$item->name)>{{$item->name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    @error('role')
                        <small class="text-danger">{{'*'.$message}}</small>
                    @enderror
                </div>

            </div>
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-outline-success">Actualizar Datos</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('js')

@endpush