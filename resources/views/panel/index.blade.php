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
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-vcard" viewBox="0 0 16 16">
                        <path d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4m4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5M9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8m1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5"/>
                        <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96q.04-.245.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 1 1 12z"/>
                        </svg>
                            <span class="fs-5 m-1">Clientes</span>
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
                        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                        </svg>
                            <span class="fs-5 m-1">Proveedores</span>
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-bookmark-check" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
                        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z"/>
                        </svg>
                            <span class="fs-5 m-1">Categorías</span>
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-microsoft" viewBox="0 0 16 16">
                        <path d="M7.462 0H0v7.19h7.462zM16 0H8.538v7.19H16zM7.462 8.211H0V16h7.462zm8.538 0H8.538V16H16z"/>
                        </svg>
                            <span class="fs-5 m-1">Marcas</span>
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0m-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"/>
                        </svg>
                            <span class="fs-5 m-1">Productos</span>
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0M8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5z"/>
                        </svg>
                            <span class="fs-5 m-1">Compras</span>
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-bag-dash-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0M6 9.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1z"/>
                        </svg>
                            <span class="fs-5 m-1">Ventas</span>
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
                        <div class="col-8 ">

                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
                        <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                        <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.4 5.4 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2z"/>
                        </svg>
                            <span class="fs-5 m-1">Usuarios</span>
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