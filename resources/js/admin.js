/*---------------------------------------------------------
|
| DOCUMENT READY JQUERY
|
|------------------------------------------------------- */
$(document).ready(function () {


  /**--------------------------------------------
   * 
   *  LO INMEDIATO => CONFIGURACION INICIAL DEL FRONT
   *  window.load = configuracionInicial();
   * 
  ---------------------------------------------*/
  /*   window.load = productosTodos();
    let productosagregados = [];

 */


  /*-----------------------------------------------------------------------------------
   * 
   *  CLIENTES => VALIDAR CAMPO (RAZON_SOCIAL) => CREATE-EDIT
   * 
   -----------------------------------------------------------------------------------*/
  $(document).on('keyup', 'input#razon_social[type=text]', function (event) {
    var razon_social = $(this).val();
    //console.log(razon_social);
    /* let regex = /^\d{1,13}(\.\d{0,3})?$/;
    let passed = razon_social.match(regex); */
    var regex = /^([a-zA-Z\&ñÑäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚàèìòùÀÈÌÒÙ\s\.\']([a-zA-Z\&ñÑäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚàèìòùÀÈÌÒÙ\s\.\']){1,59})?$/.test(razon_social);
    //console.log(passed);
    if (!regex) {
      $(this).css("border", "1px solid red");
    } else {
      $(this).val(razon_social);
      $(this).css("border", "1px solid lightsteelblue");
    }
  });



  /*-----------------------------------------------------------------------------------
   * 
   *  CLIENTES => VALIDAR CAMPO (RFC) => CREATE-EDIT
   * 
   -----------------------------------------------------------------------------------*/
  $(document).on('keyup', 'input#rfc[type=text]', function () {
    var nombre = $(this).val();
    var nombreproces = nombre
      .toUpperCase()
      .trim()
      .replace(/["']/g, "")
      //.replace(/ /g, '-')  //remplazar por guiones
      //.replace(/&/g, '-and-') //remplazar & con and
      .normalize("NFD")       // sin acetos
      .replace(/[\s\W_-]+/g, "") // Replace spaces, non-word characters and dashes with a single dash (-)
      .replace(/-$/, ''); // Remove last floating dash if exists
    document.getElementById("rfc").value = nombreproces;
    if (nombre.length === 15) {
      $(this).css("border", "1px solid lightsteelblue");
    } else {
      $(this).css("border", "1px solid red");
    }
  });



  /*-----------------------------------------------------------------------------------
   * 
   *  PRODUCTOS => VALIDAR CAMPO (idmaterial) => CREATE-EDIT
   * 
   -----------------------------------------------------------------------------------*/
  $("input#idmaterial[type=text]").on("keyup", function(){
    var nombre = $(this).val();
    var nombreproces = nombre
                .toUpperCase()
                .trim()
                .replace(/["']/g, "")
                //.replace(/ /g, '-')  //remplazar por guiones
                //.replace(/&/g, '-and-') //remplazar & con and
                .normalize("NFD")       // sin acetos
                .replace(/[\s\W_-]+/g, "") // Replace spaces, non-word characters and dashes with a single dash (-)
                .replace(/-$/, ''); // Remove last floating dash if exists
    document.getElementById("idmaterial").value=nombreproces;
  });



  /*-----------------------------------------------------------------------------------
   * 
   *  PRODUCTOS => VALIDAR CAMPO (descripcion) => CREATE-EDIT
   * 
   -----------------------------------------------------------------------------------*/
  $("textarea#descripcion").on("keyup", function () {
    var nombre = $(this).val();
    var nombreproces = nombre
      .toUpperCase()
      .replace(/["']/g, "")
      .replace(/[\s\W_-]+/g, " ")
    document.getElementById("descripcion").value = nombreproces;
  });



  /*-----------------------------------------------------------------------------------
   * 
   *  PRODUCTOS => VALIDAR CAMPO (unidadmedida) => CREATE-EDIT
   * 
   -----------------------------------------------------------------------------------*/
  $("input#unidadmedida[type=text]").on("keyup", function(){
    var nombre = $(this).val();
    var nombreproces = nombre
                .toUpperCase()
                .trim()
                .replace(/["']/g, "")
                //.replace(/ /g, '-')  //remplazar por guiones
                //.replace(/&/g, '-and-') //remplazar & con and
                .normalize("NFD")       // sin acetos
                .replace(/[\s\W_-]+/g, "") // Replace spaces, non-word characters and dashes with a single dash (-)
                .replace(/-$/, ''); // Remove last floating dash if exists
    document.getElementById("unidadmedida").value=nombreproces;
  });



 /*-----------------------------------------------------------------------------------
   * 
   *  PRODUCTOS => VALIDAR CAMPO (precio) => CREATE-EDIT
   * 
   -----------------------------------------------------------------------------------*/
  $("input#precio[type=number]").on("keyup", function(){
    var precio =  $(this).val();
    /* console.log("entrado: "+typeof(precio)); */
    /* let regex = /^\d{1,13}(\.\d{0,3})?$/;
    let passed = precio.match(regex); */
    var regex = /^\d{1,10}(\.\d{0,3})?$/.test(precio);
    //console.log(passed);
    if(!regex){
      $(this).val('');
      $("#precio1").val('');
    }else{
      $("#precio1").val(precio);
    }

  });



  /*-----------------------------------------------------------------------------------
   * 
   *  PETICION ELIMINAR => (CLIENTES-PRODUCTO) 
   * 
   -----------------------------------------------------------------------------------*/
   $(document).on('click', '.btndelete', function (event) {
    let id = event.target.id;
    let url_eliminar = data.datos.url_eliminar + '/' + id;
    //console.log(url_eliminar);
    //$('#peticion_eliminar').modal('show');
    //$('div#peticion_eliminar').attr('hidden',false);
    //Crear Etiqueta HTML (Nodo-hijo)
    var span_id = document.createElement("span");
    var node_id = document.createTextNode(id);
    span_id.appendChild(node_id);
    /* console.log(span_id); */
    //Añadirlo al DOM (Nod-hijo)
    $('#itemeliminar').empty();
    var element = document.getElementById("itemeliminar");
    var final = element.appendChild(span_id);
    /* console.log(final); */
    //Añadir action URL al form
    document.querySelector('form#form_eliminar').setAttribute('action', url_eliminar);
  });



  /**
    * 
    * OTRAS FUNCIONES => Ver Eventos => ver targets
    * 
    */
  $(document).click(function (event) {
    //console.log(event.target);
  });



});/**ready */


