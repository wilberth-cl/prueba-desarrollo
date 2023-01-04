<div class="modal fade staticBackdrop" id="peticion_eliminar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog  text-center">
      <div class="modal-content">
        <div class="modal-header text-bg-warning">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">¿Deseas eliminar este registro?</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            El registro: <span id="itemeliminar"></span> <br>
            Se eliminará permanente.
        </div>
        <div class="modal-footer text-bg-warning">
        <!-- Eliminamos solo atravez de un form -->
        <form id="form_eliminar" method="POST">
            @csrf
            @method('DELETE')

            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" id="confireliminar" style="padding: 7px;" class="btn btn-dark" data-bs-dismiss="modal">Confirmar</button>
        </form>

        </div>
      </div>
    </div>
</div>
