@extends('template.admin')
@section('titulopagina', 'Panel Control | Clientes')
{{-- @section('encabezado', 'Clientes') --}}
@section('estilos')
<style>
.f{
    color:lightcyan
}
</style>
@endsection
@section('scripts')
<script></script>
@endsection

@section('contenido')
<div class="w-50">

    <!-- Default box -->

    <div class="card mt-2 shadow">

<!--CRAER PRODUCTO-->
<form  id="formeditcliente" action="{{ route('admin.cliente_c.store') }}" method="POST">
    @csrf

        <div class="card-header encabezado">
            <div class="card-title">Agregar nuevo al cliente</div>
        </div>
        <!-- /.card-header -->


        <div class="card-body">


           {{--  <div class="mb-3">
              <label for="idcliente" class="col-form-label">IDCLIENTE:</label>
              <input type="text" name="idcliente" id="idcliente" class="form-control" autocomplete="off" readonly> <!-- required -->
            </div> --}}

            <div class="mb-3">
                <label for="razon_social" class="col-form-label">RAZÓN SOCIAL:</label>
                <input type="text" name="razon_social" id="razon_social" class="form-control" autocomplete="off" placeholder="México S.A. de C.V."> <!-- required -->
            </div>

            <div class="mb-3">
                <label for="rfc" class="col-form-label">RFC:</label>
                <input type="text" name="rfc" id="rfc" class="form-control"  autocomplete="off" placeholder="RFC"> <!-- required -->
            </div>

        </div>
        <!-- /.card-body -->


        <div class="card-footer d-flex justify-content-around">
                <a type="button" class="btn btn-danger" href="{{ route('cancelar','admin.cliente_c.index') }}">Cancelar</a>
                <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
        <!-- /.card-footer-->

    </form>

    <!--FIN CRAER PRODUCTO-->

    </div>
    <!-- /.card -->

</div>
@endsection
