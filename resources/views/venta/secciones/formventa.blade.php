<div class="offcanvas offcanvas-end p-0 m-0" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasRightLabel">Carrito</h5>
    <button type="button" class="btn-close p-0 m-0" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    
    <form action="{{ route('venta.panelventa_c.store') }}" method="POST">
      @csrf
        {{-- DATOS DEL CLIENTE --}}
        <hr>
        <div class="row pb-0">
            <label for="idcliente" class="col-sm-4 col-form-label pb-0" hidden>Cliente:</label>
            <div class="col-sm-8">
              <input type="hidden" class="form-control form-control-sm border border-0 idcliente" name="idcliente" id="idcliente" placeholder="cliente...">
            </div>
        </div>
        <div class="row pb-0">
            <label for="razon_social" class="col-sm-4 col-form-label pb-0">Razón Soc:</label>
            <div class="col-sm-8">
              <input type="text" class="form-control form-control-sm border border-0 razon_social" name="razon_social" id="razon_social" placeholder="sociedad..." readonly onfocus="blur()">
            </div>
        </div>
        <div class="row pb-0">
            <label for="rfc" class="col-sm-4 col-form-label pb-0">RFC:</label>
            <div class="col-sm-8">
              <input type="text" class="form-control form-control-sm border border-0 rfc" name="rfc" id="rfc" placeholder="RFC" readonly onfocus="blur()">
            </div>
        </div>
        <hr>
        {{-- DATOS DEL PRODUCTO --}}
        <div class="row pb-0">
          <div class="col-sm-12">
            @include('venta.secciones.addproductos')
          </div>
        </div>
       
        <hr>
        {{-- DATOS DE LA COMPRA --}}
        <div class="row mb-1">
          <label for="subtotalorden" class="col-sm-3 col-form-label pb-0">Sub Total:</label>
          <div class="col-sm-9">
            <div class="input-group input-group-sm">
              <span class="input-group-text text-bg-light">$</span>
              <input class="form-control" type="number" step="0.0001" name="subtotalorden" id="subtotalorden" value="0" onfocus="blur()">
            </div>
          </div>
        </div>
        <div class="row mb-1">
          <label for="iva" class="col-sm-3 col-form-label pb-0">Iva:</label>
          <div class="col-sm-9">
            <div class="input-group input-group-sm">
              <span class="input-group-text text-bg-light">$</span>
              <input title="iva del 16% de la compra" class="form-control form-control-sm" type="number" step="0.0001" name="iva" id="iva" value="0" onfocus="blur()">
              </div>
            </div>
        </div>
        <div class="row mb-1">
          <label for="totalorden" class="col-sm-3 col-form-label pb-0">Total:</label>
          <div class="col-sm-9">
            <div class="input-group input-group-sm">
              <span class="input-group-text text-bg-light">$</span>
              <input class="form-control form-control-sm" type="number" step="0.0001" name="totalorden" id="totalorden" value="0" onfocus="blur()">
            </div>
          </div>
        </div>
        {{-- OTROS DATOS --}}
        <div class="row mt-4">
          <div class="col-12">
            <button class="btn btn-primary ordenarcartshopping w-100" type="submit">Comprar</button>
          </div>
        </div>   
    </form>

  </div>
</div>