@extends('layouts.app')

@section('title','Usuarios')

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
        <span class="page-link">Usuarios</span>
        </li>
    </ul>

    @can('crear-user')
    <div class="row g-3">
        <div class="col-auto">
        <h1 class="text-center">Usuarios</h1>
        </div>
    <div class="col-auto pt-2">
        <a href="{{route('users.create')}}">
            <button type="button" class="btn btn-primary">Añadir nuevo Usuario</button>
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
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>
                            {{$item->getRoleNames()->first()}}
                        </td>
                        <td>
                        <div class="btn-group" role="group" >
                            <a type="button" href="{{route('users.edit',['user'=>$item])}}"
                                    class="btn btn-outline-success">
                                Editar
                            </a>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#confirmModal-{{$item->id}}"
                                        class="btn btn-outline-danger">
                                        Eliminar
                            </button>
                        </div>
                        </td>
                        

                    <!-- Modal de confirmación-->
                    <div class="modal fade" id="confirmModal-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Mensaje de confirmación</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Seguro que quieres eliminar el usuario?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <form action="{{ route('users.destroy',['user'=>$item->id]) }}" method="post">
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