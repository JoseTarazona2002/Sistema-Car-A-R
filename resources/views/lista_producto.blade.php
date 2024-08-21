<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Car: Accesorios & Repuestos</title>
    <style>
        body {
            background-image: url("{{ asset('assets/img/background.jpeg') }}");
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body class="bg-light">

    <!--Barra de navegación--->
    <nav class="navbar navbar-expand-md bg-warning">
        <div class="container-fluid">
            <!---Marca navegación-->
            <img src="{{ asset('assets/img/file.png') }}" alt="Logo" height="80" class="d-inline-block align-text-top">
            <a class="navbar-brand text-dark fst-italic fs-2" href="{{route('panel')}}">
                
            Car: Accesorios & Repuestos
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!----Lista de opciones del menú-->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
                <ul class="nav nav-underline me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('panel')}}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('lista')}}">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contacto')}}">Contacto</a>
                    </li>
                </ul>

                <form class="d-flex" action="{{route('login')}}" method="get">
                    <button class="btn btn-primary" type="submit">Iniciar sesión</button>
                </form>

            </div>
        </div>
    </nav>

    <!---------------------------------------------->
    <div class="container-md mt-5 mb-5 border border-success p-2 mb-2" style="width: 80em; ">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col ">
            <div class="card bg-primary-subtle">
            <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="{{Storage::url('public/lista_productos/ftimon1.png')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="{{Storage::url('public/lista_productos/ftimon2.jpg')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="{{Storage::url('public/lista_productos/ftimon3.png')}}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
            <div class="card-body">
                <h5 class="card-title">Forros / Fundas </h5>
                <p class="card-text">
                <ul>
                    <li>Fundas para asientos</li>
                    <li>Organizador de maletero</li>
                    <li>Protectores de volante</li>
                    <li>Cortinas para ventanas</li>
                </ul>
            </div>
            </div>
            
        </div>

        <div class="col">
            <div class="card bg-primary-subtle">
            <div id="carouselExample1" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="{{Storage::url('public/lista_productos/gfangos1.png')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="{{Storage::url('public/lista_productos/parachoque.jpg')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="{{Storage::url('public/lista_productos/gfangos3.jpg')}}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample1" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample1" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
            <div class="card-body">
                <h5 class="card-title">Accesorios para el exterior:</h5>
                <p class="card-text">
                    <ul>
                        <li>Guardafangos</li>
                        <li>Luces LED y faros auxiliares</li>
                        <li> Rejillas de ventilación</li>
                        <li>Protectores de parachoques</li>
                        <li>Barras de techo y portaequipajes</li>
                    </ul>
                    
                    
                   
                    
                    
                </p>
            </div>
            </div>
            
        </div>

        <div class="col">
            <div class="card bg-primary-subtle">
            <div id="carouselExample2" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="{{Storage::url('public/lista_productos/tapete1.jpg')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="{{Storage::url('public/lista_productos/tapete2.png')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="{{Storage::url('public/lista_productos/tapete3.jpeg')}}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample2" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample2" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
            <div class="card-body">
                <h5 class="card-title">Accesorios para el interior:
                </h5>
                <p class="card-text">
                <ul>
                    <li>Alfombras y tapetes</li>
                    <li>Espejos retrovisores</li>
                    <li>Soportes para teléfonos móviles</li>
                    <li>Cargadores de coche</li>
                    <li>Ambientadores</li>
                </ul>
                </p>
            </div>
            </div>
            
        </div>

        <div class="col">
            <div class="card bg-primary-subtle">
            <div id="carouselExample4" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="{{Storage::url('public/lista_productos/material1.jpg')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="{{Storage::url('public/lista_productos/material2.jpg')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="{{Storage::url('public/lista_productos/material3.jpg')}}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample4" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample4" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
            <div class="card-body">
                <h5 class="card-title">Accesorios de seguridad:</h5>
                <p class="card-text">
                    <ul>
                        <li>Cámaras de reversa</li>
                        <li>Sensores de estacionamiento</li>
                        <li>Alarmas y sistemas de seguridad</li>
                        <li>Cadenas para neumáticos</li>
                    </ul>
                </p>
            </div>
            </div>
            
        </div>

        <div class="col">
            <div class="card bg-primary-subtle">
            <div id="carouselExample5" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="{{Storage::url('public/lista_productos/engranaje1.jpg')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="{{Storage::url('public/lista_productos/engranaje2.jpg')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="{{Storage::url('public/lista_productos/engranaje3.jpg')}}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample5" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample5" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
            <div class="card-body">
                <img src="" alt="">
                <h5 class="card-title">Accesorios de rendimiento:</h5>
                <p class="card-text">
                    <ul>
                        <li>Filtros de aire y sistemas de escape</li>
                        <li>Amortiguadores y suspensiones</li>
                        <li>Kits de frenos</li>
                        <li>Chips de rendimiento y reprogramaciones</li>
                        <li>Sistemas de navegación GPS</li>
                    </ul>
                </p>
            </div>
            </div>
            
        </div>

        <div class="col">
            <div class="card bg-primary-subtle">
            <div id="carouselExample6" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="{{Storage::url('public/lista_productos/liquidos1.jpg')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="{{Storage::url('public/lista_productos/liquidos2.jpg')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="{{Storage::url('public/lista_productos/liquidos3.jpg')}}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample6" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample6" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
            <div class="card-body">
                <h5 class="card-title">Productos de mantenimiento:</h5>
                <p class="card-text">
                    <ul>
                        <li>Productos de limpieza y cuidado del auto (ceras, limpiadores, abrillantadores)</li>
                        <li>Aceites y líquidos (aceite de motor, anticongelante)</li>
                        <li>Herramientas y kits de reparación</li>
                    </ul>
                </p>
            </div>
            </div>
            
        </div>
    </div>
    </div>
    

    <!---Footer--->
    <div class="card-footer">
    <div class="text-center p-3 bg-warning">
            ©2024 Car: Accesorios & Repuestos
        </div>
  </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>