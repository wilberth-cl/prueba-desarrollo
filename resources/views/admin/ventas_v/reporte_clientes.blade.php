@extends('template.admin')
@section('titulopagina', 'Reporte | Clientes')
@section('estilos')
@endsection
@section('scripts')
@endsection

@section('contenido')
<div class="w-100">


    <!-- Default box -->

    <div class="card mt-2 text-center shadow-sm" style="border-radius: 0px;">

        <div class="card-header d-flex justify-content-center">
            <div class="card-title encabezado mx-auto">Reporte por Clientes</div>
            <a class="btn btn-primary m-1" href="{{ route('descargar-pdf-reporteporclientes') }}">Exportar PDF</a>
        </div>
        <!-- /.card-header -->

        <div class="card-body">

            <div class="col-md-12">
                <!-- TABLA-PRODUCTO -->
                <table class="table table-sm table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>IDCLIENTE</th>
                            <th>RFC</th>
                            <th>RAZÓN SOCIAL</th>
                            <th>SUBTOTAL</th>
                            <th>IVA</th>
                            <th>TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->idcliente }}</td>
                                <td>{{ $cliente->cliente->rfc }}</td>
                                <td>{{ $cliente->cliente->razon_social }}</td>

                                @foreach ($gruposclientes as $grupocliente)
                                    @if ($cliente->idcliente == $grupocliente->idcliente)
                                        <td>${{ $grupocliente->subtotal_cliente }}</td>
                                        <td>${{ $grupocliente->iva_cliente }}</td>
                                        <td>${{ $grupocliente->total_cliente }}</td>
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $gruposclientes }}
                <hr>
                {{ $clientes }} --}}
                <!-- Fin TABLA-PRODUCTO -->
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
