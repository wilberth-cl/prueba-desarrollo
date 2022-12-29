var _c = document.getElementById("formnuevoproducto");

if(_c){

    // L L A M A R   A   L A   F U N C I O N
    window.data = {
        editar:'No'
    };


    /**
   *
   * FORMATEAR TEXTOS-EXTENSOS
   *
   */
    function formatoDeTextoExtenso(id){
    var idtxt = '#'+id;
    $(idtxt).on("keyup", function(){
      var nombre = document.getElementById(id).value;
      var nombreproces = nombre
                  .toUpperCase()
                  .replace(/["']/g, "")
                  .replace(/[\s\W_-]+/g, " ")
      document.getElementById(id).value=nombreproces;
    });
  }

  /**
   *
   * FORMATEAR TEXTOS
   *
   */
  function formatoDeTexto(id){
    $("#"+id).on("keyup", function(){
      var nombre = document.getElementById(id).value;
      var nombreproces = nombre
                  .toUpperCase()
                  .trim()
                  .replace(/["']/g, "")
                  //.replace(/ /g, '-')  //remplazar por guiones
                  //.replace(/&/g, '-and-') //remplazar & con and
                  .normalize("NFD")       // sin acetos
                  .replace(/[\s\W_-]+/g, "") // Replace spaces, non-word characters and dashes with a single dash (-)
                  .replace(/-$/, ''); // Remove last floating dash if exists
      document.getElementById(id).value=nombreproces;
    });
  }

  /**
   *
   * EVENTO VERIFICAR PRECIO
   *
   */
   function formatoDePrecio(id){
    var idinput = '#'+id;
    $(idinput).on("keyup", function(){
      var precio =  $(this).val();
      /* console.log("entrado: "+typeof(precio)); */
      /* let regex = /^\d{1,13}(\.\d{0,3})?$/;
      let passed = precio.match(regex); */
      var regex = /^\d{1,10}(\.\d{0,3})?$/.test(precio);
      //console.log(passed);
      if(!regex){
        $(this).val('');
        $(idinput+"prod").val('');
      }else{
        $(idinput+"prod").val(precio);
  /*       (Number.isInteger(Number.parseFloat(precio)))?
        $(idinput+"prod").val(precio+".0"):
        $(idinput+"prod").val(precio); */
      }

    });
  }

}
