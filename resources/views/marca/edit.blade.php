@extends('layouts.app')

@section('title','Editar marca')

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
        <li class="page-item"><a class="page-link" href="{{ route('marcas.index')}}">Marcas</a></li>
        <li class="page-item active" aria-current="page">
        <span class="page-link">Editar Marca</span>
        </li>
    </ul>

    <div class="card text-light bg-success bg-opacity-50">
    <h1 class="mt-4 text-center">Editar Marca</h1>
        <form action="{{ route('marcas.update',['marca'=>$marca]) }}" method="post">
            @method('PATCH')
            @csrf
            <div class="card-body g-3 d-grid col-6 mx-auto">

                <div class="row g-4">

                    <div class="col-md-12">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre',$marca->caracteristica->nombre)}}">
                        @error('nombre')
                        <small class="text-danger">{{'*'.$message}}</small>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="descripcion" class="form-label">Descripción:</label>
                        <textarea name="descripcion" id="descripcion" rows="3" class="form-control">{{old('descripcion',$marca->caracteristica->descripcion)}}</textarea>
                        @error('descripcion')
                        <small class="text-danger">{{'*'.$message}}</small>
                        @enderror
                    </div>
                </div>

            </div>
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-outline-primary">Actualizar Marca</button>
                <!-- <button type="reset" class="btn btn-secondary">Reiniciar</button> -->
            </div>
        </form>
    </div>

</div>
@endsection

@push('js')

@endpush