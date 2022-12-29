@extends('template.admin')
@section('titulopagina', 'Panel Control | Productos')
{{-- @section('encabezado', 'Productos') --}}
@section('estilos')
    <style>

    </style>
@endsection
@section('scripts')
    <script>
$(document).ready(function(){
    $(".btndelet").click(function(event){
        id = event.target.id

        url_eliminar = "{{ route('admin.producto_c.index') }}"+'/'+id;
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
            <div class="card-title">Productos</div>
        </div>
        <!-- /.card-header -->

        <div class="card-body">

            <div class="col-md-12" id="listatablaproductos">
                <!-- TABLA-PRODUCTO -->
                <table class="table table-hover" id="verproductostabla">
                  <thead>
                    <tr>
                      <th>CÓDIGO</th>
                      <th>DESCRIPCION</th>
                      <th>UNIDAD</th>
                      <th>PRECIO</th>
                      <th class="text-center">ACCIONES</th>
                    </tr>
                  </thead>
                  <tbody>

                    @if ($productos->count()>0)
                    @foreach ($productos as $producto)
                    <tr>
                        <td style="vertical-align:middle;">{{ $producto->idmaterial }}</td>
                        <td style="vertical-align:middle;">{{ $producto->descripcion }}</td>
                        <td style="vertical-align:middle;">{{ $producto->unidadmedida }}</td>
                        <td style="vertical-align:middle;">{{ $producto->precio1 }}</td>
                        <td style="vertical-align:middle;">
                        <a title="Ver" class="btn btn-primary btnver"
                                href="{{ route('admin.producto_c.show',$producto->idmaterial) }}">Ver</a>
                        <a title="Editar" class="btn btn-success mx-2 btnedit"
                                href="{{ route('admin.producto_c.edit',$producto->idmaterial) }}">Editar
                        <a title="Eliminar" id="{{ $producto->idmaterial }}" class="btn btn-danger btndelet" href="#"
                            >Eliminar</a>
                    </tr>
                    @endforeach
                    @endif

                  <tbody>
                </table>
                <!--FIN-TABLA-PRODUCTO -->
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
