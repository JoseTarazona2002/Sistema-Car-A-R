@extends('layouts.app')

@section('title','clientes')

@push('css-datatable')
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
@endpush

@push('css')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush

@section('content')

@include('layouts.partials.alert')

<div class="container-fluid px-4">

    <ul class="pagination pt-3 pb-5">
        <li class="page-item"><a class="page-link" href="{{ route('panel') }}">Inicio</a></li>
        <li class="page-item active" aria-current="page">
        <span class="page-link">Clientes</span>
        </li>
    </ul>

    @can('crear-cliente')
    <div class="row g-3">
        <div class="col-auto">
        <h1 class="text-center">Clientes</h1>
        </div>
    <div class="col-auto pt-2">
    <a href="{{route('clientes.create')}}">
            <button type="button" class="btn btn-primary">Añadir nuevo registro</button>
        </a>
    </div>
    </div>
    @endcan

    <div class="card">
        <div class="card-body">
            <table id="datatablesSimple" class="table table-bordered border-primary table-success">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Documento</th>
                        <th>Tipo de persona</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $item)
                    <tr>
                        <td>
                            {{$item->persona->razon_social}}
                        </td>
                        <td>
                            {{$item->persona->direccion}}
                        </td>
                        <td>
                            <p class="fw-semibold mb-1">{{$item->persona->documento->tipo_documento}}</p>
                            <p class="text-muted mb-0">{{$item->persona->numero_documento}}</p>
                        </td>
                        <td>
                            {{$item->persona->tipo_persona}}
                        </td>
                        <td>
                            <a type="button" href="{{route('clientes.edit',['cliente'=>$item])}}"
                                    class="btn btn-lg btn-outline-success">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#confirmModal-{{$item->id}}"
                                        class="btn btn-lg btn-outline-danger">
                                        <i class="fa fa-trash"></i>
                            </button>
                        

                    <!-- Modal de confirmación-->
                    <div class="modal fade" id="confirmModal-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Mensaje de confirmación</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    {{ $item->persona->estado == 1 ? '¿Seguro que quieres eliminar el cliente?' : '¿Seguro que quieres restaurar el cliente?' }}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <form action="{{ route('clientes.destroy',['cliente'=>$item->persona->id]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Confirmar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>



</div>
@endsection

@push('js')
<script src="{{ asset('js/simple-datatables@latest.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
@endpush