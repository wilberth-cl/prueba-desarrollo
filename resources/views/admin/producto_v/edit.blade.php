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

<!--CRAER PRODUCTO-->
<form  id="formeditproducto" action="{{ route('admin.producto_c.update',$producto->idmaterial) }}" method="POST">
    @csrf
    @method('PUT')

        <div class="card-header encabezado">
            <div class="card-title">Realiza los cambios al producto</div>
        </div>
        <!-- /.card-header -->


        <div class="card-body">


            <div class="mb-3">
              <label for="idmaterial" class="col-form-label">IDMATERIAL:</label>
              <input type="text" name="idmaterial" id="idmaterial" class="form-control" value="{{ $producto->idmaterial }}" autocomplete="off" placeholder="código..." readonly> <!-- required -->
            </div>
            <div class="mb-3">
              <label for="descripcion">DESCRIPCION:</label>
              <div class="form-floating">
                <textarea class="form-control" name="descripcion" id="descripcion" autocomplete="off" style="height: 100px">{{ $producto->descripcion }}</textarea>
                <label for="floatingTextarea2">descripción...</label>
              </div>
            </div>
            <div class="mb-3">
              <label for="unidadmedida">UNIDADMEDIDA:</label>
              <input type="text" name="unidadmedida" id="unidadmedida" class="form-control" value="{{ $producto->unidadmedida }}" autocomplete="off" placeholder="unidad...">  <!-- required -->
            </div>
            <label for="precio1">PRECIO:</label>
            <input type="hidden" name="precio1" id="precio1" value="{{ $producto->precio1 }}">
            <div class="input-group mb-3">
              <span class="input-group-text">$</span>
              <input type="number" name="precio" id="precio" step="0.001" class="form-control" value="{{ $producto->precio1 }}" autocomplete="off" placeholder="0.0">  <!-- required -->
            </div>




        </div>
        <!-- /.card-body -->


        <div class="card-footer d-flex justify-content-around">
                <a type="button" class="btn btn-danger" href="{{ route('cancelar','admin.producto_c.index') }}">Cancelar</a>
                <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
        <!-- /.card-footer-->

    </form>

    <!--FIN CRAER PRODUCTO-->

    </div>
    <!-- /.card -->

</div>
@endsection
