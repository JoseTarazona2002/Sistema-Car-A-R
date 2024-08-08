@extends('layouts.app')

@section('title','Panel')

@push('css')
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endpush

@section('content')

@if (session('success'))
<script>
    document.addEventListener("DOMContentLoaded", function() {

        let message = "{{ session('success') }}";
        Swal.fire(message);

    });
</script>
@endif

<div class="container-fluid px-4">
    <h1 class="mt-4">Control de Registros</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Registros</li>
    </ol>
    <div class="row">
    <div class="p-4">
    <div class="row gy-4">

        <div class="col-6">
            <div class="alert alert-primary" role="alert">
            <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <i class="fa-solid fa-people-group fa-lg"></i><span class="m-1">Clientes</span>
                        </div>
                        <div class="col-4">
                            <?php

                            use App\Models\Cliente;

                            $clientes = count(Cliente::all());
                            ?>
                            <a href="{{ route('clientes.index') }}" type="button" class="btn btn-outline-success text-center fw-bold">{{$clientes}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="alert alert-primary" role="alert">
            <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <i class="fa-solid fa-user-group fa-lg"></i><span class="m-1">Proveedores</span>
                        </div>
                        <div class="col-4">
                            <?php

                            use App\Models\Proveedore;

                            $proveedores = count(Proveedore::all());
                            ?>
                            <a href="{{ route('proveedores.index') }}" class="btn btn-outline-primary text-center fw-bold">{{$proveedores}}</a>
                        </div>
                    </div>
                </div>
            

            </div>
        </div>

        <div class="col-6">
            <div class="alert alert-info" role="alert">
            <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <i class="fa-solid fa-tag fa-lg"></i><span class="m-1">Categorías</span>
                        </div>
                        <div class="col-4">
                            <?php

                            use App\Models\Categoria;

                            $categorias = count(Categoria::all());
                            ?>
                            <a href="{{ route('categorias.index') }}" class="btn btn-outline-primary text-center fw-bold">{{$categorias}}</a>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
        <div class="col-6">
            <div class="alert alert-info" role="alert">
            <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <i class="fa-solid fa-bullhorn fa-lg"></i><span class="m-1">Marcas</span>
                        </div>
                        <div class="col-4">
                            <?php

                            use App\Models\Marca;

                            $marcas = count(Marca::all());
                            ?>
                            <a href="{{ route('marcas.index') }}" class="btn btn-outline-success text-center fw-bold">{{$marcas}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="alert alert-danger" role="alert">
            <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <i class="fa-brands fa-shopify fa-lg"></i><span class="m-1">Productos</span>
                        </div>
                        <div class="col-4">
                            <?php

                            use App\Models\Producto;

                            $productos = count(Producto::all());
                            ?>
                            <a href="{{ route('productos.index') }}" class="btn btn-outline-success text-center fw-bold">{{$productos}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="alert alert-success" role="alert">
            <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <i class="fa-solid fa-store fa-lg"></i><span class="m-1">Compras</span>
                        </div>
                        <div class="col-4">
                            <?php

                            use App\Models\Compra;

                            $compras = count(Compra::all());
                            ?>
                            <a href="{{ route('compras.index') }}" class="btn btn-outline-primary text-center fw-bold">{{$compras}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="alert alert-success" role="alert">
            <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <i class="fa-solid fa-store fa-lg"></i><span class="m-1">Ventas</span>
                        </div>
                        <div class="col-4">
                            <?php

                            use App\Models\Venta;

                            $ventas = count(Venta::all());
                            ?>
                            <a href="{{ route('ventas.index') }}" class="btn btn-outline-primary text-center fw-bold">{{$ventas}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="alert alert-warning" role="alert">
            <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <i class="fa-solid fa-user fa-lg"></i><span class="m-1">Usuarios</span>
                        </div>
                        <div class="col-4">
                            <?php

                            use App\Models\User;

                            $users = count(User::all());
                            ?>
                            <a href="{{ route('users.index') }}" class="btn btn-outline-success text-center fw-bold">{{$users}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>      
    </div>
    </div> 

</div>
@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<!---script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script--->
<!---script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script--->
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
@endpush