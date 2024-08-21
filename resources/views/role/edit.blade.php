@extends('layouts.app')

@section('title','Editar rol')

@push('css')

@endpush

@section('content')
<div class="container-fluid px-4">

    <ul class="pagination pt-3 pb-5">
        <li class="page-item"><a class="page-link" href="{{ route('panel') }}">Inicio</a></li>
        <li class="page-item"><a class="page-link" href="{{ route('roles.index')}}">Roles</a></li>
        <li class="page-item active" aria-current="page">
        <span class="page-link">Editar Rol</span>
        </li>
    </ul>

    <div class="card bg-warning p-2 text-dark bg-opacity-10">
    <h1 class="mt-4 text-center">Editar Permisos</h1>
        <div class="card-body">

            <form action="{{ route('roles.update',['role'=>$role]) }}" method="post">
                @method('PATCH')
                @csrf
                

                <!---Permisos---->
                <div class="col-12 bg-info p-5 bg-opacity-10 mx-auto">
                    <p class="text-muted">Permisos para el rol:</p>
                    @foreach ($permisos as $item)
                    @if ( in_array($item->id, $role->permissions->pluck('id')->toArray() ) )
                    <div class="form-switch form-check-inline m-2">
                        <input checked name="permission[]" id="{{$item->id}}" value="{{$item->id}}" class="form-check-input" type="checkbox" role="switch">&nbsp; &nbsp;
                        <label for="{{$item->id}}" class="form-check-label">{{$item->name}}</label>
                    </div>
                    <!-- <div class="form-check mb-2">
                        <input checked type="checkbox" name="permission[]" id="{{$item->id}}" class="form-check-input" value="{{$item->id}}">
                        <label for="{{$item->id}}" class="form-check-label">{{$item->name}}</label>
                    </div> -->
                    @else
                    <div class="form-switch form-check-inline m-2">
                        <input name="permission[]" id="{{$item->id}}" value="{{$item->id}}" class="form-check-input" type="checkbox" role="switch">&nbsp; &nbsp;
                        <label for="{{$item->id}}" class="form-check-label">{{$item->name}}</label>
                    </div>
                    @endif
                    @endforeach
                </div>
                @error('permission')
                <small class="text-danger">{{'*'.$message}}</small>
                @enderror

                <!---Nombre de rol---->
                <div class="row mx-auto mb-4 mt-2 bg-info p-5 bg-opacity-10">
                    <label for="name" class="col-md-auto col-form-label">Nombre del rol:</label>
                    <div class="col-md-4">
                        <input type="text" name="name" id="name" class="form-control" value="{{old('name',$role->name)}}">
                        @error('name')
                        <small class="text-danger">{{'*'.$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-outline-primary">Actualizar Permisos</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection

@push('js')

@endpush