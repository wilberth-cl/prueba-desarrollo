@extends('template.admin')
@section('titulopagina', 'Panel Control | Productos')
{{-- @section('encabezado', 'Productos') --}}
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
            <div class="card-title">Detalles del producto</div>
        </div>
        <!-- /.card-header -->


        <div class="card-body">

            <form>

            <div class="mb-3">
              <label for="idmaterial" class="col-form-label">IDMATERIAL:</label>
              <input type="text" name="idmaterial" id="idmaterial" class="form-control" value="{{ $producto->idmaterial }}" autocomplete="off" placeholder="código..." readonly> <!-- required -->
            </div>
            <div class="mb-3">
              <label for="descripcion">DESCRIPCION:</label>
              <div class="form-floating">
                <textarea class="form-control" name="descripcion" id="descripcion" autocomplete="off" style="height: 100px" readonly>{{ $producto->descripcion }}</textarea>
                <label for="floatingTextarea2">descripción...</label>
              </div>
            </div>
            <div class="mb-3">
              <label for="unidadmedida">UNIDADMEDIDA:</label>
              <input type="text" name="unidadmedida" id="unidadmedida" class="form-control" value="{{ $producto->unidadmedida }}" autocomplete="off" placeholder="unidad..." readonly>  <!-- required -->
            </div>
            <label for="precio1">PRECIO:</label>
            <input type="hidden" name="precio1" id="precio1" value="{{ $producto->precio1 }}" readonly>
            <div class="input-group mb-3">
              <span class="input-group-text">$</span>
              <input type="number" name="precio" id="precio" step="0.001" class="form-control" value="{{ $producto->precio1 }}" autocomplete="off" placeholder="0.0" readonly>  <!-- required -->
            </div>
            <div class="mb-3">
                <label for="creadoen">Agregado el:</label>
                <input type="text" name="creadoen" id="creadoen" class="form-control" value="{{ $producto->created_at }}" autocomplete="off" placeholder="unidad..." readonly>  <!-- required -->
            </div>
            <div class="mb-3">
                <label for="actualizadoen">Última Actulaización:</label>
                <input type="text" name="actualizadoen" id="actualizadoen" class="form-control" value="{{ $producto->updated_at }}" autocomplete="off" placeholder="unidad..." readonly>  <!-- required -->
            </div>
        </form>

        </div>
        <!-- /.card-body -->


        <div class="card-footer d-flex justify-content-around">
                <a type="button" class="btn btn-success"  href="{{ route('admin.producto_c.edit',$producto->idmaterial) }}">Editar</a>
                <a type="submit" class="btn btn-primary" href="{{ route('admin.producto_c.index') }}">Regresar</a>
        </div>
        <!-- /.card-footer-->



    </div>
    <!-- /.card -->
</div>
@endsection
