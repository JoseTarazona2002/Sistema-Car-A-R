@extends('layouts.app')

@section('title','Crear categoría')

@push('css')
<style>
    #descripcion {
        resize: none;
    }
</style>
@endpush

@section('content')
<div class="container-fluid px-4">
    
    <ul class="pagination pt-3 pb-5">
        <li class="page-item"><a class="page-link" href="{{ route('panel') }}">Inicio</a></li>
        <li class="page-item"><a class="page-link" href="{{ route('categorias.index')}}">Categorías</a></li>
        <li class="page-item active" aria-current="page">
        <span class="page-link">Crear categoría</span>
        </li>
    </ul>

    <div class="card bg-success p-2 text-dark bg-opacity-10">
    <h1 class="mt-4 text-center">Añadir Categoría</h1>
        <form action="{{ route('categorias.store') }}" method="post">
            @csrf
            <div class="card-body text-bg-light bg-success p-2 text-dark bg-opacity-50">
                <div class="row g-4 d-grid col-6 mx-auto">

                    <div class="col-md-12">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre')}}">
                        @error('nombre')
                        <small class="text-danger">{{'*'.$message}}</small>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="descripcion" class="form-label">Descripción:</label>
                        <textarea name="descripcion" id="descripcion" rows="3" class="form-control">{{old('descripcion')}}</textarea>
                        @error('descripcion')
                        <small class="text-danger">{{'*'.$message}}</small>
                        @enderror
                    </div>
                </div>

            </div>
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-outline-success">Guardar Registro</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('js')

@endpush