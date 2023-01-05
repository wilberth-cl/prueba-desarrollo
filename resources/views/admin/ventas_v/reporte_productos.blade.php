@extends('template.admin')
@section('titulopagina', 'Reporte | Productos')
@section('estilos')
@endsection
@section('scripts')
@endsection

@section('contenido')
<div class="w-100">


    <!-- Default box -->

    <div class="card mt-2 text-center shadow-sm" style="border-radius: 0px;">

        <div class="card-header d-flex justify-content-center">
            <div class="card-title  encabezado mx-auto">Reporte por Productos</div>
            <a class="btn btn-primary m-1" href="{{ route('descargar-pdf-reporteporproductos') }}">Exportar PDF</a>
        </div>
        <!-- /.card-header -->

        <div class="card-body">

            <div class="col-md-12">
                <!-- TABLA-PRODUCTO -->
                <table class="table table-sm table-hover">
                    
                    <thead class="table-dark">
                        <tr>
                           <th>IDMATERIAL</th>
                           <th>DESCRIPCION</th>
                           <th>TOTAL DE PIEZAS VENDIDAS</th>
                           <th>SUBTOTAL</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($collectproductos as $productos)
                            @foreach ($productos as $producto)
                            <tr>
                                <td>{{ $producto->idmaterial }}</td>
                                <td>{{ $producto->descripcion }}</td>
                            
                                @foreach ($grupos as $grupo)

                                    @if ($producto->idmaterial == $grupo->idmaterial)
                                        <td>{{ $grupo->cantidad_prod }}</td>
                                        <td>${{ $grupo->subtotal_prod }}</td>
                                    @endif
                                    
                                @endforeach
                                
                            </tr>
                            @endforeach
                        @endforeach
                      
                    </tbody>
                    
                </table>
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
