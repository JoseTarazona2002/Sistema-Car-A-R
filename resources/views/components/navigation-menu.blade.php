<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="card">
                    <img src="{{ Storage::url('public/usuario/admin-user.jpg')}}" class="img-fluid" alt="...">
                    <div class="card-body">
                        <h6 class="card-title">Usuario/Administrador</h0>
                        <p class="card-text">{{ auth()->user()->name }}</p>
                    </div>
                </div>
                <div class="list-group">
                    <a href="{{ route('panel') }}" class="list-group-item list-group-item-action bg-dark text-white" aria-current="true">
                    Inicio
                    </a>

                    @can('ver-cliente')
                    <a class="list-group-item list-group-item-action bg-success bg-opacity-75" aria-current="true" href="{{ route('clientes.index') }}">
                        
                        Clientes
                    </a>
                    @endcan

                    @can('ver-proveedore')
                    <a class="list-group-item list-group-item-action bg-success bg-opacity-75" aria-current="true" href="{{ route('proveedores.index') }}">
                        Proveedores
                    </a>
                    @endcan

                    @can('ver-categoria')
                    <a class="list-group-item list-group-item-action bg-success bg-opacity-75" aria-current="true" href="{{ route('categorias.index') }}">
                        
                        Categorías
                    </a>
                    @endcan

                    @can('ver-marca')
                    <a class="list-group-item list-group-item-action bg-success bg-opacity-75" aria-current="true" href="{{ route('marcas.index') }}">
                        Marcas
                    </a>
                    @endcan

                    @can('ver-producto')
                    <a class="list-group-item list-group-item-action bg-success bg-opacity-75 text-white" aria-current="true" href="{{ route('productos.index') }}">
                        
                        Productos
                    </a>
                    @endcan

                    <!----Compras---->
                    @can('ver-compra')
                    <a class="list-group-item collapsed bg-info bg-opacity-75" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCompras" aria-expanded="false" aria-controls="collapseLayouts">
                        
                        <div class="sb-sidenav-collapse-arrow">Compras &nbsp; <i class="fas fa-angle-down"></i></div> 
                    </a>
                    <div class="collapse bg-info bg-opacity-25" id="collapseCompras" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            @can('ver-compra')
                            <a class="nav-link" href="{{ route('compras.index') }}">Ver</a>
                            @endcan
                            @can('crear-compra')
                            <a class="nav-link" href="{{ route('compras.create') }}">Crear</a>
                            @endcan
                        </nav>
                    </div>
                    @endcan

                    <!----Ventas---->
                    @can('ver-venta')
                    <a class="list-group-item collapsed bg-info bg-opacity-75"  href="#" data-bs-toggle="collapse" data-bs-target="#collapseVentas" aria-expanded="false" aria-controls="collapseLayouts">
            
                        <div class="sb-sidenav-collapse-arrow">Ventas &nbsp;<i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse bg-info bg-opacity-25" id="collapseVentas" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            @can('ver-venta')
                            <a class="nav-link" href="{{ route('ventas.index') }}">Ver</a>
                            @endcan
                            @can('crear-compra')
                            <a class="nav-link" href="{{ route('ventas.create') }}">Crear</a>
                            @endcan
                        </nav>
                    </div>
                    @endcan

                    
                    @hasrole('administrador')
                    @endhasrole

                    @can('ver-user')
                    <a class="list-group-item bg-primary bg-opacity-75 text-white" aria-current="true" href="{{ route('users.index') }}">
                        
                        Usuarios
                    </a>
                    @endcan

                    @can('ver-role')
                    <a class="list-group-item  bg-primary bg-opacity-75 text-white" aria-current="true" href="{{ route('roles.index') }}">
                        
                        Roles
                    </a>
                    @endcan

                </div>



            </div>
        </div>
        
    </nav>
</div>