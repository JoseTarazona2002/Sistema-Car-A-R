@extends('layouts.app')

@section('title','Editar cliente')

@push('css')

@endpush

@section('content')
<div class="container-fluid px-4">
    
    <ul class="pagination pt-3 pb-5">
        <li class="page-item"><a class="page-link" href="{{ route('panel') }}">Inicio</a></li>
        <li class="page-item"><a class="page-link" href="{{ route('clientes.index')}}">Clientes</a></li>
        <li class="page-item active" aria-current="page">
        <span class="page-link">Editar Cliente</span>
        </li>
    </ul>

    <div class="card text-light bg-success bg-opacity-50">
    <h1 class="mt-4 text-center">Editar Cliente</h1>
        <form action="{{ route('clientes.update',['cliente'=>$cliente]) }}" method="post">
            @method('PATCH')
            @csrf
            <div class="card-header d-grid col-6 mx-auto ">
                <p>Tipo de cliente: <span class="fw-bold">{{ strtoupper($cliente->persona->tipo_persona)}}</span></p>
            </div>
            <div class="row g-3 d-grid col-6 mx-auto">

                <div class="row g-3 mb-5">

                    <!-------Razón social------->
                    <div class="col-12">
                        @if ($cliente->persona->tipo_persona == 'natural')
                        <label id="label-natural" for="razon_social" class="form-label">Nombres y apellidos:</label>
                        @else
                        <label id="label-juridica" for="razon_social" class="form-label">Nombre de la empresa:</label>
                        @endif

                        <input required type="text" name="razon_social" id="razon_social" class="form-control" value="{{old('razon_social',$cliente->persona->razon_social)}}">

                        @error('razon_social')
                        <small class="text-danger">{{'*'.$message}}</small>
                        @enderror
                    </div>

                    <!------Dirección---->
                    <div class="col-12">
                        <label for="direccion" class="form-label">Dirección:</label>
                        <input required type="text" name="direccion" id="direccion" class="form-control" value="{{old('direccion',$cliente->persona->direccion)}}">
                        @error('direccion')
                        <small class="text-danger">{{'*'.$message}}</small>
                        @enderror
                    </div>

                    <!--------------Documento------->
                    <div class="col-md-6">
                        <label for="documento_id" class="form-label">Tipo de documento:</label>
                        <select class="form-select" name="documento_id" id="documento_id">
                            @foreach ($documentos as $item)
                            @if ($cliente->persona->documento_id == $item->id)
                            <option selected value="{{$item->id}}" {{ old('documento_id') == $item->id ? 'selected' : '' }}>{{$item->tipo_documento}}</option>
                            @else
                            <option value="{{$item->id}}" {{ old('documento_id') == $item->id ? 'selected' : '' }}>{{$item->tipo_documento}}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('documento_id')
                        <small class="text-danger">{{'*'.$message}}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="numero_documento" class="form-label">Numero de documento:</label>
                        <input required type="text" name="numero_documento" id="numero_documento" class="form-control" value="{{old('numero_documento',$cliente->persona->numero_documento)}}">
                        @error('numero_documento')
                        <small class="text-danger">{{'*'.$message}}</small>
                        @enderror
                    </div>

                </div>

            </div>
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-outline-primary">Actualizar Datos</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('js')

@endpush