@extends('template.admin')
@section('titulopagina', 'Panel Control | Productos')
{{-- @section('encabezado', 'Productos') --}}
@section('estilos')
    <style>

    </style>
@endsection
@section('scripts')
    <script type="module">
$(document).ready(function(){
    window.data = {
      datos:{
          //nombres que se mandan a apiproducto que ya se han ligado a sus nombres en base de datos
          "url_eliminar":"{{ route('admin.producto_c.index') }}"    
      }
  } 
});

    </script>
@endsection

@section('contenido')
<div class="w-100">


    <!-- Default box -->

    <div class="card mt-2 text-center shadow-sm" style="border-radius: 0px;">

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
                        <a title="Eliminar" id="{{ $producto->idmaterial }}" class="btn btn-danger btndelete" data-bs-toggle="modal" data-bs-target="#peticion_eliminar" href="#"
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
