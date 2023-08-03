<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('titulopagina')</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
     --}}<!-- Include: Typeahaed --->

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Styles -->
    <style>
        .encabezado {
            font-size: 1.6rem;
            font-weight: 400;
            /* text-transform: uppercase; */
            text-align: center;
        }
    </style>

    @yield('estilos')
</head>

<body>

    <x-loading />

    <div class="container-fluid">

        {{-- contenido --}}
        <div class="row">

            @include('template.partials.navbar')

        </div>


        <div class="row">

        @include('custom.peticion_eliminar')
  
        </div>



        <div class="row justify-content-md-center">

            <!-- Para Mostrar Mensajes de Con la llave With 'datos'  -->
            <!-- Estilos de botones estan al Inicio -->
            @if (session('datos'))
                <div class="row justify-content-center">
                    <div class="col-8">
                        <div id="datosb" class="alert text-bg-success alert-dismissible fade show shadow p-3 my-2 rounded" role="alert">
                            {{ session('datos') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            @endif
            @if (session('cancelar'))
                <div class="row justify-content-center">
                    <div class="col-8">
                        <div id="cancelarb" class="alert text-bg-warning alert-dismissible fade show shadow p-3 my-2 rounded" role="alert">
                            {{ session('cancelar') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                        </div>
                    </div>
                </div>
            @endif
            <!-- Para Mostrar Mensajes de errores de las Validaciones en Laravel en los controladores  -->

            @if ($errors->any())
                <div class="row justify-content-center">
                    <div class="col-8">
                        <div id="cancelarb" class="alert text-bg-danger alert-dismissible fade show shadow p-3 my-2 rounded" role="alert">
                            <h4 class="alert-heading">Verifique lo siguiente:</h4>
                            <ul>
                                @foreach ($errors->all() as $error )
                                        {{ $error }}
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                        </div>
                    </div>
                </div>
            @endif



                @yield('contenido')
                {{-- /contenido --}}

        </div>
        {{-- /contenido --}}

    </div>





     <script type="module">
        $(document).ready(function () {
            window.setTimeout(function() {
                $(".alert").fadeOut(1500).slideUp(1000, function(){
                    $(this).remove();
                });
            },10000);

            $("#loader").remove();
           /*  document.querySelector('#loader').setAttribute('hidden',true); */

        });
    </script>
     @yield('scripts')
</body>

</html>
