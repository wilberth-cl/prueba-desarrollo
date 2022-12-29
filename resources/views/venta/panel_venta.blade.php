@extends('template.venta')
@section('titulopagina', 'Ventas')
{{-- @section('encabezado', 'Administración') --}}
@section('estilos')
    <style></style>
@endsection
@section('scripts')
    <script></script>
@endsection

@section('contenido')
    <div class="w-100">

        <div class="row bg-white pb-2 shadow showhiddeseccioncliente" hidden>
            @include('venta.secciones.addcliente')
        </div>
        {{-- Fin-Row-1 --}}


        <div class="row">
            <div id="productostodos" class="d-flex flex-wrap">                    
            </div>

            {{--  <button type="button" name="addproducto" class="btn addproducto" style="width: 100%;"><strong>Agregar
                        Prodcuto</strong></button> --}}
        </div>
        {{-- Fin-Row-2 --}}

    <div class="row">
        @include('venta.secciones.formventa')
    </div>
    {{-- Fin-Row-3 --}}




    </div>{{-- Fin-W --}}
@endsection
