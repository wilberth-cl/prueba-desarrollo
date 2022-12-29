@extends('template.admin')
@section('titulopagina', 'Panel Control | Cliente')
{{-- @section('encabezado', 'Cliente') --}}
@section('estilos')
<style></style>
@endsection
@section('scripts')
<script></script>
@endsection

@section('contenido')
<div class="w-50">

    <!-- Default box -->

    <div class="card mt-2 shadow">

    <div class="card-header encabezado">
            <div class="card-title">Detalles del cliente</div>
        </div>
        <!-- /.card-header -->


        <div class="card-body">

            <form>

            <div class="mb-3">
              <label for="idcliente" class="col-form-label">IDCLIENTE:</label>
              <input type="text" name="idcliente" id="idcliente" class="form-control" value="{{ $cliente->idcliente }}" autocomplete="off" placeholder="código..." readonly> <!-- required -->
            </div>
            <div class="mb-3">
              <label for="razon_social">Razón Social:</label>
              <input type="text" name="razon_social" id="razon_social" class="form-control" value="{{ $cliente->idcliente }}" autocomplete="off" placeholder="código..." readonly> <!-- required -->
            </div>
            <div class="mb-3">
              <label for="rfc">RFC:</label>
              <input type="text" name="rfc" id="rfc" class="form-control" value="{{ $cliente->rfc }}" autocomplete="off" placeholder="unidad..." readonly>  <!-- required -->
            </div>
            <div class="mb-3">
                <label for="creadoen">Agregado el:</label>
                <input type="text" name="creadoen" id="creadoen" class="form-control" value="{{ $cliente->created_at }}" autocomplete="off" placeholder="unidad..." readonly>  <!-- required -->
            </div>
            <div class="mb-3">
                <label for="actualizadoen">Última Actulaización:</label>
                <input type="text" name="actualizadoen" id="actualizadoen" class="form-control" value="{{ $cliente->updated_at }}" autocomplete="off" placeholder="unidad..." readonly>  <!-- required -->
            </div>
        </form>

        </div>
        <!-- /.card-body -->


        <div class="card-footer d-flex justify-content-around">
                <a type="button" class="btn btn-success"  href="{{ route('admin.cliente_c.edit',$cliente->idcliente) }}">Editar</a>
                <a type="submit" class="btn btn-primary" href="{{ route('admin.cliente_c.index') }}">Regresar</a>
        </div>
        <!-- /.card-footer-->



    </div>
    <!-- /.card -->
</div>
@endsection
