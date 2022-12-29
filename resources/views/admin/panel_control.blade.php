@extends('template.admin')
@section('titulopagina','Panel Control')
{{-- @section('encabezado','Administración') --}}
@section('estilos')
    <style></style>
@endsection
@section('scripts')
    <script></script>
@endsection

@section('contenido')

<div class="card mt-2 text-center" style="border-radius: 0px;">

    <div class="card-header encabezado">
      Administración
    </div>

    <div class="card-body">


        <div class="row">
            <div class="col-sm-6">
              <div class="card my-2 py-2 text-bg-warning">
                <div class="card-body">
                  <h5 class="card-title">Productos</h5>
                  <p class="card-text"> Actualmente se encuentran registrados: &nbsp; {{ $productos ?? '0' }} &nbsp; Productos. </p>
                  <a href="{{ route('admin.producto_c.index') }}" class="btn btn-primary">Administrar Productos</a>
                </div>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="card my-2 py-2 text-bg-warning">
                <div class="card-body">
                  <h5 class="card-title">Clientes</h5>
                  <p class="card-text">Actualmente se encuentran registrados: &nbsp; {{ $clientes ?? '0'  }} &nbsp; Clientes.</p>
                  <a href="#" class="btn btn-primary">Administrar Clientes</a>
                </div>
              </div>
            </div>
          </div>


    </div>

</div>

@endsection
