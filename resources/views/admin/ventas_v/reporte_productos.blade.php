@extends('template.admin')
@section('titulopagina', 'Reporte | Producto')
@section('estilos')
@endsection
@section('scripts')
@endsection

@section('contenido')
<div class="w-100">


    <!-- Default box -->

    <div class="card mt-2 text-center shadow-sm" style="border-radius: 0px;">

        <div class="card-header encabezado">
            <div class="card-title">Reporte por Productos</div>
        </div>
        <!-- /.card-header -->

        <div class="card-body">

            <div class="col-md-12">
                <!-- TABLA-PRODUCTO -->
                {{ $productos }}
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
