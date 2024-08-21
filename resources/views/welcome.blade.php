<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Car: Accesorios & Repuestos</title>
    
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
                        <a class="nav-link active" aria-current="page" href="{{route('panel')}}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('lista')}}">Productos</a>
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

    <div class="container-md mt-5 mb-5 border border-success p-2 mb-2" style="width: 80em; ">
    <div class="card mb-3" >
        <div class="row g-0">
            <div class="col-md-4">
            <img src="{{ asset('assets/img/img03.jpeg') }}" class="img-fluid" alt="...">
            <img src="{{ asset('assets/img/img05.jpeg') }}" class="img-fluid" alt="...">
            </div>
            <div class="col-md-8 mt-5">
            <div class="card-body mt-5 ms-5">
            <h1 class="card-title fst-italic">Car: Accesorios & Repuestos</h1>
                    <h3 class="text-primary mt-5">Visión:</h3>
                    <p class="fs-5">
                    Nuestra visión es ser la empresa líder en accesorios y repuestos automotrices, reconocida por nuestra calidad, innovación y compromiso con la satisfacción del cliente. Aspiramos a expandirnos regional y nacionalmente, ofreciendo soluciones confiables que faciliten el mantenimiento y mejora de vehículos, y ser la primera opción para conductores y entusiastas del automóvil.
                    </p>

                    <h3 class="text-success mt-5">Misión:</h3>
                    <p class="fs-5">
                    En Car Accesorios & Repuestos, ofrecemos productos automotrices de alta calidad con atención personalizada e innovadora. Nos comprometemos a mantener la integridad y rendimiento de los vehículos de nuestros clientes, buscando ser su socio confiable a largo plazo.
                    </p>
            </div>
            </div>
        </div>
    </div>
    </div>

    <!---Footer--->
    <footer class="text-center text-dark">
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3 bg-warning">
            ©2024 Car: Accesorios & Repuestos
        </div>
        <!-- Copyright -->
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>