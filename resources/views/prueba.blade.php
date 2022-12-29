{{-- MULTIPLE SELECT --}}
<div class="row">
    <select id="myselect" name="sweets" multiple>
        <option>Chocolate</option>
        <option>Candy</option>
        <option>Taffy</option>
        <option>Caramel</option>
        <option>Fudge</option>
        <option>Cookie</option>
      </select>
    <div class="mostraropciones"></div>
</div>
<script>
    $( '#myselect' )
.change(function () {
    var str = "";
    $( "select option:selected" ).each(function() {
    str += $( this ).text() + " ";
    });
    $( "div .mostraropciones" ).text( str );
})
.change();
</script>
{{-- OTRA FUNCION buscar --}}
    <div class="col-md">
      <div class="form-floating">
        <input type="text" class="form-control" id="searchcliente" name="searchcliente" placeholder="Buscar" autocomplete="off">
        <label for="floatingInputGrid">Buscar:</label>
      </div> 
      <div id="searchresult" class="dropdown"></div>
    </div>
<script>

</script>


@foreach ($productos as $producto)
    <div class="col mx-3 my-3">
        <div class="card m-1 h-100 shadow" style="width: 13rem;">
        <div class="card-body text-center">
            <h5 class="card-title">{{ $producto->idmaterial }}</h5>
            <p class="card-text ">{{ $producto->unidadmedida }}</p>
            <p class="card-text">{{ $producto->descripcion }}</p>
        </div>
        <div class="align-content-end text-center">
            <p class="card-tex">${{ $producto->precio1 }}</p>
        </div>
        <div class="card-footer">

            <div class="d-grid gap-2" aria-label="Basic radio toggle button group">
                {{--    <div class="btn-group btn-group-sm" role="group">
                    <button name="more" id="{{ $producto->idmaterial }}" type="button" class="cantidadmore btn btn-outline-primary"><strong class="fs-6">+</strong></button>
                    <input type="number" class="text-center fs-6" id="cantidad-{{ $producto->idmaterial }}" name="cantidad-{{ $producto->idmaterial }}" placeholder="0" value="0">
                    <button name="less" id="{{ $producto->idmaterial }}" type="button" class="cantidadless btn btn-outline-primary"><strong class="fs-6">-</strong></button>
                </div> --}}
                <button type="button" class="btn btn-outline-primary soldproducto btn{{ $producto->idmaterial }} sold{{ $producto->idmaterial }} " name="{{ $producto->idmaterial }}" id="{{ $producto->idmaterial }}">comprar</button>      
                <button type="button" class="btn btn-outline-primary addproducto btn{{ $producto->idmaterial }} add{{ $producto->idmaterial }} " name="{{ $producto->idmaterial }}" id="{{ $producto->idmaterial }}">agregar</button>
            </div>

        </div>
        </div>
    </div>
@endforeach