{{-- navbar --}}
<nav class="navbar navbar-dark bg-dark navbar-expand-lg">
    <!-- <nav class="navbar navbar-expand-lg" style="background-color: #fdb424;"> -->
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('panel-admin') }}">Empresa</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Productos
                    </a>

                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('admin.producto_c.index') }}" class="dropdown-item">
                                Lista de Productos
                            </a>
                        </li>
                        <li><a href="{{ route('admin.producto_c.create') }}" class="dropdown-item">
                                Nuevo Producto
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Clientes
                    </a>

                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('admin.cliente_c.index') }}" class="dropdown-item">
                                Lista de Clientes
                            </a>
                        </li>
                        <li><a href="{{ route('admin.cliente_c.create') }}" class="dropdown-item">
                                Nuevo Cliente
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search"
                    aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
{{-- /navbar --}}
