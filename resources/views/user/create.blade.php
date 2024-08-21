@extends('layouts.app')

@section('title','Crear usuario')

@push('css')

@endpush

@section('content')
<div class="container-fluid px-4">
    
    <ul class="pagination pt-3 pb-5">
        <li class="page-item"><a class="page-link" href="{{ route('panel') }}">Inicio</a></li>
        <li class="page-item"><a class="page-link" href="{{ route('users.index') }}">Usuarios</a></li>
        <li class="page-item active" aria-current="page">
        <span class="page-link">Crear Usuario</span>
        </li>
    </ul>

    <div class="card bg-success p-2 text-dark bg-opacity-10">
    <h1 class="mt-4 text-center">Crear Cuenta Usuario</h1>
        <form action="{{ route('users.store') }}" method="post">
            @csrf
            <div class="row text-bg-light bg-success p-5 text-dark bg-opacity-25">

                <!---Nombre---->
                <div class="row col-6 mb-2">
                    <label for="name" class="col-lg-4 col-form-label">Nombres:</label>
                    <div class="col-lg-8">
                        <input autocomplete="off" type="text" name="name" id="name" class="form-control" value="{{old('name')}}" aria-labelledby="nameHelpBlock">
                    </div>
                    @error('name')
                        <small class="text-danger">{{'*'.$message}}</small>
                    @enderror
                </div>

                <!---Email---->
                <div class="row col-6 mb-2">
                    <label for="email" class="col-lg-4 col-form-label">Email:</label>
                    <div class="col-lg-8">
                        <input autocomplete="off" type="email" name="email" id="email" class="form-control" value="{{old('email')}}" aria-labelledby="emailHelpBlock">
                    </div>
                    @error('email')
                        <small class="text-danger">{{'*'.$message}}</small>
                    @enderror
                </div>

                <!---Password---->
                <div class="row col-6 mb-2">
                    <label for="password" class="col-lg-4 col-form-label">Contraseña:</label>
                    <div class="col-lg-8">
                        <input type="password" name="password" id="password" class="form-control" aria-labelledby="passwordHelpBlock">
                    </div>
                        @error('password')
                        <small class="text-danger">{{'*'.$message}}</small>
                        @enderror
                </div>

                <!---Confirm_Password---->
                <div class="row col-6 mb-2">
                    <label for="password_confirm" class="col-lg-4 col-form-label">Confirmar:</label>
                    <div class="col-lg-8">
                        <input type="password" name="password_confirm" id="password_confirm" class="form-control" aria-labelledby="passwordConfirmHelpBlock">
                    </div>
                    @error('password_confirm')
                        <small class="text-danger">{{'*'.$message}}</small>
                    @enderror
                </div>

                <!---Roles---->
                <div class="row col-6">
                    <label for="role" class="col-lg-4 col-form-label">Rol:</label>
                    <div class="col-lg-8">
                        <select name="role" id="role" class="form-select" aria-labelledby="rolHelpBlock">
                            <option value="" selected disabled>Seleccione:</option>
                            @foreach ($roles as $item)
                            <option value="{{$item->name}}" @selected(old('role')==$item->name)>{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('role')
                        <small class="text-danger">{{'*'.$message}}</small>
                    @enderror
                </div>

            </div>
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-outline-primary">Registrar Usuario</button>
            </div>
        </form>
    </div>


</div>
@endsection

@push('js')

@endpush