@extends('layouts.app')

@section('title','ventas')

@push('css-datatable')
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
@endpush
@push('css')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
    .row-not-space {
        width: 110px;
    }
</style>
@endpush

@section('content')

@include('layouts.partials.alert')

<div class="container-fluid px-4">

    <ul class="pagination pt-3 pb-5">
        <li class="page-item"><a class="page-link" href="{{ route('panel') }}">Inicio</a></li>
        <li class="page-item active" aria-current="page">
        <span class="page-link">Ventas</span>
        </li>
    </ul>

    @can('crear-venta')
    <div class="row g-3">
        <div class="col-auto">
        <h1 class="text-center">Ventas</h1>
        </div>
        <div class="col-auto pt-2">
        <a href="{{route('ventas.create')}}">
            <button type="button" class="btn btn-primary">Añadir nuevo registro</button>
        </a>
        </div>
    @endcan

    <div class="card mb-4">
        <div class="card-body">
            <table id="datatablesSimple" class="table table-bordered border-primary table-success">
                <thead>
                    <tr>
                        <th>Comprobante</th>
                        <th>Cliente</th>
                        <th>Fecha y hora</th>
                        <th>Vendedor</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ventas as $item)
                    <tr>
                        <td>
                            <p class="fw-semibold mb-1">{{$item->comprobante->tipo_comprobante}}</p>
                            <p class="text-muted mb-0">{{$item->numero_comprobante}}</p>
                        </td>
                        <td>
                            @if ($item->cliente->persona->tipo_persona!=null)
                                <p class="fw-semibold mb-1">{{ ucfirst($item->cliente->persona->tipo_persona) }}</p>
                            @else
                                <p class="fw-semibold mb-1">Dado de Baja</p>   
                            @endif
                            <p class="text-muted mb-0">{{$item->cliente->persona->razon_social}}</p>
                        </td>
                        <td>
                            <div class="row-not-space">
                                <p class="fw-semibold mb-1"><span class="m-1"><i class="fa-solid fa-calendar-days"></i></span>{{\Carbon\Carbon::parse($item->fecha_hora)->format('d-m-Y')}}</p>
                                <p class="fw-semibold mb-0"><span class="m-1"><i class="fa-solid fa-clock"></i></span>{{\Carbon\Carbon::parse($item->fecha_hora)->format('H:i')}}</p>
                            </div>
                        </td>
                        <td>
                            {{$item->user->name}}
                        </td>
                        <td>
                            {{$item->total}}
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">

                                @can('mostrar-venta')
                                <form action="{{route('ventas.show', ['venta'=>$item]) }}" method="get">
                                    <button type="submit" class="btn btn-success">
                                        Ver
                                    </button>
                                </form>
                                @endcan

                                @can('eliminar-venta')
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal-{{$item->id}}">Eliminar</button>
                                @endcan
                            </div>
                        </td>
                    </tr>

                    <!-- Modal de confirmación-->
                    <div class="modal fade" id="confirmModal-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Mensaje de confirmación</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Seguro que quieres eliminar el registro?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <form action="{{ route('ventas.destroy',['venta'=>$item->id]) }}" method="post">
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
<script>

    window.addEventListener('DOMContentLoaded', event => {
        const dataTable = new simpleDatatables.DataTable("#datatablesSimple", {})
    });
</script>
@endpush