<nav class="sb-topnav navbar navbar-expand navbar-dark bg-warning">

    <img src="{{ asset('assets/img/file.png') }}" alt="Logo" height="80" class="d-inline-block align-text-top mt-3 mb-3 p-1">
    <a class="navbar-brand text-dark fst-italic fs-3" href="{{route('panel')}}">    
            Car: Accesorios & Repuestos
    </a>

    <div class="ms-5 ps-5">
        <button class="ms-4 btn btn-link btn-sm order-1 order-lg-0  me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    </div>

    <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"></div>

    <form class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4" action="{{route('logout')}}" method="get">
        <button class="btn btn-dark" type="submit">Cerrar sesión</button>
    </form>

</nav>