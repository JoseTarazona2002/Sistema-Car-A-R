@extends('layouts.app')

@section('title','marcas')

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
        <span class="page-link">Marcas</span>
        </li>
    </ul>

    @can('crear-marca')
    <div class="row g-3">
        <div class="col-auto">
        <h1 class="text-center">Marcas</h1>
        </div>
    <div class="col-auto pt-2">
        <a href="{{route('marcas.create')}}">
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
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($marcas as $item)
                    <tr>
                        <td>
                            {{$item->caracteristica->nombre}}
                        </td>
                        <td>
                            {{$item->caracteristica->descripcion}}
                        </td>

                        <td>
                        <a type="button" href="{{route('marcas.edit',['marca'=>$item])}}"
                                class="btn btn-lg btn-outline-success">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#confirmModal-{{$item->id}}"
                                    class="btn btn-lg btn-outline-danger">
                                    <i class="fa fa-trash"></i>
                        </button>
                        
                    <!-- Modal -->
                    <div class="modal fade" id="confirmModal-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Mensaje de confirmación</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    {{ $item->caracteristica->estado == 1 ? '¿Seguro que quieres eliminar la marca?' : '' }}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <form action="{{ route('marcas.destroy',['marca'=>$item->id]) }}" method="post">
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