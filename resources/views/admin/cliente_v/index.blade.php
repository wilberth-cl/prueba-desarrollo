@extends('template.admin')
@section('titulopagina', 'Panel Control | Clientes')
{{-- @section('encabezado', 'cliente') --}}
@section('estilos')
    <style></style>
@endsection

@section('scripts')
    <script type="module">
$(document).ready(function(){
    window.data = {
      datos:{
          //nombres que se mandan a apiproducto que ya se han ligado a sus nombres en base de datos
          "url_eliminar":"{{ route('admin.cliente_c.index') }}"
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

                            @if ($clientes->count() > 0)
                                @foreach ($clientes as $cliente)
                                    <tr>
                                        <td style="vertical-align:middle;">{{ $cliente->idcliente }}</td>
                                        <td style="vertical-align:middle;">{{ $cliente->razon_social }}</td>
                                        <td style="vertical-align:middle;">{{ $cliente->rfc }}</td>
                                        <td style="vertical-align:middle;">
                                            <a title="Ver" class="btn btn-primary btnver"
                                                href="{{ route('admin.cliente_c.show', $cliente->idcliente) }}">Ver</a>
                                            <a title="Editar" class="btn btn-success mx-2 btnedit"
                                                href="{{ route('admin.cliente_c.edit', $cliente->idcliente) }}">Editar
                                                <a title="Eliminar" id="{{ $cliente->idcliente }}"
                                                    class="btn btn-danger btndelete" data-bs-toggle="modal"
                                                    data-bs-target="#peticion_eliminar" href="#">Eliminar</a>
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
