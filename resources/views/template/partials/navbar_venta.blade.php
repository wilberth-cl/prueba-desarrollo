{{-- navbar --}}
<nav class="navbar navbar-white py-3 fs-4 bg-light navbar-expand-lg">
    <!-- <nav class="navbar navbar-expand-lg" style="background-color: #fdb424;"> -->
    <div class="container-fluid">
        <a class="navbar-brand fs-4 mx-3" href="#">Ventas</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link link-search-cliente" role="button">Seleccionar Cliente</a>
                </li>

            </ul>


            <div class="d-flex" role="search">
                <label for="search">Productos:&nbsp;</label><input id="searchqueryproducto" class="form-control me-2"
                    type="search" placeholder="Buscar" aria-label="Search">
                <button id="searchproducto" class="btn btn-outline-success" type="button">Buscar</button>
            </div>


            <div class="px-5">
                <button id="formoffcanvass" class="btn btn-light formoffcanvas position-relative" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <i class="fas fa-shopping-cart h-auto w-5 text-primary"></i>
                </button>
            </div>
        </div>
    </div>
</nav>
{{-- /navbar --}}
