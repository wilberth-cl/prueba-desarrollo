@extends('template.admin')
@section('titulopagina', 'Panel Control | Clientes')
{{-- @section('encabezado', 'cliente') --}}
@section('estilos')
    <style>

    </style>
@endsection
@section('scripts')
    <script>
$(document).ready(function(){
    $(".btndelet").click(function(event){
        id = event.target.id

        url_eliminar = "{{ route('admin.cliente_c.index') }}"+'/'+id;
       /*  console.log(url_eliminar); */

        $('#peticion_eliminar').modal('show');

        //Crear Etiqueta HTML (Nodo-hijo)
        var span_id = document.createElement("span");
        var node_id = document.createTextNode(id);
        span_id.appendChild(node_id);
        /* console.log(span_id); */
        //Añadirlo al DOM (Nod-hijo)
        $('#itemeliminar').empty();
        var element = document.getElementById("itemeliminar");
        var final = element.appendChild(span_id);
        /* console.log(final); */
        //Añadir action URL al form
       document.querySelector('form#form_eliminar').setAttribute('action',url_eliminar);
    });

   /*  $("#confireliminar").click(function(event){
        $('#peticion_eliminar').modal('show');
    }); */

});

    </script>
@endsection

@section('contenido')
<div class="w-100">


    <!-- Default box -->

    <div class="card mt-2 text-center shadow-sm" style="border-radius: 0px;">

        @include('custom.peticion_eliminar')

        <div class="card-header encabezado">
            <div class="card-title">Clientes</div>
        </div>
        <!-- /.card-header -->

        <div class="card-body">

            <div class="col-md-12" id="listatablacliente">
                <!-- TABLA-CLIENTE -->
                <table class="table table-hover" id="verclientetabla">
                  <thead>
                    <tr>
                      <th>IDCLIENTE</th>
                      <th>RAZÓN SOCIAL</th>
                      <th>RFC</th>
                      <th class="text-center">ACCIONES</th>
                    </tr>
                  </thead>
                  <tbody>

                    @if ($clientes->count()>0)
                    @foreach ($clientes as $cliente)
                    <tr>
                        <td style="vertical-align:middle;">{{ $cliente->idcliente }}</td>
                        <td style="vertical-align:middle;">{{ $cliente->razon_social }}</td>
                        <td style="vertical-align:middle;">{{ $cliente->rfc }}</td>
                        <td style="vertical-align:middle;">
                        <a title="Ver" class="btn btn-primary btnver"
                                href="{{ route('admin.cliente_c.show',$cliente->idcliente) }}">Ver</a>
                        <a title="Editar" class="btn btn-success mx-2 btnedit"
                                href="{{ route('admin.cliente_c.edit',$cliente->idcliente) }}">Editar
                        <a title="Eliminar" id="{{ $cliente->idcliente }}" class="btn btn-danger btndelet" href="#"
                            >Eliminar</a>
                    </tr>
                    @endforeach
                    @endif

                  <tbody>
                </table>
                <!--FIN-TABLA-CLIENTE -->
              </div>

        </div>
        <!-- /.card-body -->


        <div class="card-footer">

        </div>
        <!-- /.card-footer-->


    </div>
    <!-- /.card -->

</div>
@endsection
