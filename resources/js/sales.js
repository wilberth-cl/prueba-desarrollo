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
    ---------------------------------------------*/
    window.load = productosTodos();
    let productosagregados = [];



    /*-----------------------------------------------------------------------------------
     * 
     *  CONFIGURACION => INICIAL => DISABLED ALL PRODUCTS BUTTON    (5)
     *                           => DISABLED BUTTON SHOPPING CART
     * 
     -----------------------------------------------------------------------------------*/
    function configuracionInicial() {
        $('.soldproducto').attr("disabled", true);
        $('.addproducto').attr("disabled", true);
        enableDesabledCartShopping();
    }


    /**---------------------------------------------------
     * 
     * CLIENTE => SEARCH-Cliente        (1)  Junto con (Confirmar Vaciar Carrito)
     * 
     *---------------------------------------------------*/
    $('input#searchcliente[type=search]').typeahead({
        items: 3,
        minLength: 2,
        source: function (query, process) {
            return $.get("/api/autocomplete-search", {
                query: query
            }, function (data) {
                return process(data);
            });
        },
        scrollHeight: 0,
        updater: function (item) {
            var razon_social = item;
            confirmarExistenciaDelCliente(razon_social);
        },
        delay: 0,
        fitToElement: true,
        selectOnBlur: false,
        //showCategoryHeader:true,
        //appendTo: '<div>nuevo</div>',
    });



    /**----------------------------------------------------------
     * 
     * CLIENTE => CONFIRMAR EXISTECIA => LLENA CAMPOS       (2)
     * 
     *----------------------------------------------------------*/
    function confirmarExistenciaDelCliente(razon) {
        //let razon_social = $('input#searchcliente[type=text]').text();
        let razon_social = razon;
        axios.get('/api/existcliente/' + razon_social)
            .then(function (response) {
                var idcliente = response.data[0].idcliente;
                var rfccli = response.data[0].rfc;
                $('input.idcliente').val(idcliente);
                $('input.razon_social').val(razon_social);
                $('input.rfc').val(rfccli);
                $('ul.typeahead.dropdown-menu').fadeOut();
                $('#searchcliente').trigger('blur');
            })
            .catch(function (error) {
                console.log(error);
            }).then(function () {
                procedimientoClienteSeleccionado();
            });
    }




    /**--------------------------------------------------------------------
     * 
     * PRODUCTOS => TRAER ALL PRODUCTS          (1)
     * 
     *-------------------------------------------------------------------*/
    function productosTodos() {
        var html = '';
        axios({
            method: 'get',
            url: '/api/lista-productos'
        })
            .then(function (response) {
                $('div#productostodos').empty();
                response.data.forEach(producto => {
                    html += '<div class="col mx-3 my-3">';
                    html += '<div class="card m-1 h-100 shadow" style="width: 13rem;">';
                    html += '<div class="card-body text-center">';
                    html += '<h5 class="card-title">' + producto.idmaterial + '</h5>';
                    html += '<p class="card-text ">' + producto.unidadmedida + '</p>';
                    html += '<p class="card-text">' + producto.descripcion + '</p>';
                    html += '</div>';
                    html += '<div class="align-content-end text-center">';
                    html += '<p class="card-tex">$' + producto.precio1 + '</p>';
                    html += '</div>';
                    html += '<div class="card-footer">';
                    html += '<div class="d-grid gap-2" aria-label="Basic radio toggle button group">';
                    html += '<button type="button" class="btn btn-outline-primary soldproducto btn' + producto.idmaterial + ' sold' + producto.idmaterial + ' " name="' + producto.idmaterial + '" id="' + producto.idmaterial + '">comprar</button>';
                    html += '<button type="button" class="btn btn-outline-primary addproducto btn' + producto.idmaterial + ' add' + producto.idmaterial + ' " name="' + producto.idmaterial + '" id="' + producto.idmaterial + '">agregar</button>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                });
                $('div#productostodos').append(html);
                configuracionInicial();
                $('#loader').remove();
            }).catch(function (error) {
                if (error.response) {
                    console.log(error.response.data);
                    console.log(error.response.status);
                    console.log(error.response.headers);
                } else if (error.request) {
                    console.log(error.request);
                } else {
                    console.log('Error', error.message);
                }
                console.log(error.config);
            });
    }



    /**--------------------------------------------------------------------
     * 
     * PRODUCTOS => TRAER ALL PRODUCTS          (1)
     * 
     *-------------------------------------------------------------------*/
    $('button#searchproducto[type=button]').click(function () {
        var query = $('input#searchqueryproducto[type=search]').val();
        if (query === '' || query.length >= 5) {
            $('div#productostodos').empty();
            var url = "/api/search-producto?query=" + query;
            var html = "";

            axios({
                method: 'get',
                url: url
            })
                .then(function (response) {
                     response.data.forEach(producto => {
                         html +=  '<div class="col mx-3 my-3">';
                         html += '<div class="card m-1 h-100 shadow" style="width: 13rem;">';
                         html += '<div class="card-body text-center">';
                         html += '<h5 class="card-title">'+producto.idmaterial+'</h5>';
                         html += '<p class="card-text ">'+producto.unidadmedida+'</p>';
                         html += '<p class="card-text">'+producto.descripcion+'</p>';
                         html += '</div>';
                         html += '<div class="align-content-end text-center">';
                         html += '<p class="card-tex">$'+producto.precio1+'</p>';
                         html += '</div>';
                         html += '<div class="card-footer">';
                         html += '<div class="d-grid gap-2" aria-label="Basic radio toggle button group">';
                         html += '<button type="button" class="btn btn-outline-primary soldproducto btn'+producto.idmaterial+' sold'+producto.idmaterial+' " name="'+producto.idmaterial+'" id="'+producto.idmaterial+'">comprar</button>';      
                         html += '<button type="button" class="btn btn-outline-primary addproducto btn'+producto.idmaterial+' add'+producto.idmaterial+' " name="'+producto.idmaterial+'" id="'+producto.idmaterial+'">agregar</button>';
                         html += '</div>';
                         html += '</div>';
                         html += '</div>';
                         html += '</div>';
                     });
                    $('div#productostodos').append(html);
                    prodcutosyaagregados();
                }).catch(function (error) {
                    if (error.response) {
                        console.log(error.response.data);
                        console.log(error.response.status);
                        console.log(error.response.headers);
                    } else if (error.request) {
                        console.log(error.request);
                    } else {
                        console.log('Error', error.message);
                    }
                    console.log(error.config);
                });

        }
    });




    /**---------------------------------------------------
     * 
     * SHOPPING CART => Confirmar Vaciar Carrito (1)
     * 
     *---------------------------------------------------*/
    $('input#searchcliente[type=search]').click(function (event) {
        event.preventDefault();
        let cartslleno = $('input#totalorden[type=number]').val();
        if (cartslleno > 0) {
            confirm("¡Se vaciara el carrito actual!");
        }
    });



    /**---------------------------------------------------
     * 
     * SHOPPING CART => Confirmar Enviar Carrito(1.1)
     * 
     *---------------------------------------------------*/
    $('button.ordenarcartshopping[type=submit]').click(function (event) {
        let confirmsubmit = confirm("¡Confirmar Compra!");
        if(confirmsubmit){
            return true;
        }else{
            return false;
        }
    });




    /**-------------------------------------------------------
     * 
     *  SHOPPING CART => ADD PRODUCT SELECTED (1)
     * 
     *------------------------------------------------------*/
    function addProductoCar(id) {
        var html = "";
        var cantdefault = 1;
        let idmaterial = id;
        axios.get("/api/dataproducto/" + idmaterial)
            .then(function (response) {
                /* console.log(response); */
                html = '<tr class="trproducto">';
                html += '<td class="tdformattable"><input id="producto-' + idmaterial + '" type="text" class="border border-0" style="width:100%;" name="productos[]" value="' + idmaterial + '" readonly onfocus="blur()"></td>';
                html += '<td class="tdformattable"><input id="medida-' + idmaterial + '" type="text" class="border border-0" style="width:100%;" name="unidadmedida[]" value="' + response.data[0].unidadmedida + '" readonly onfocus="blur()"></td>';
                html += '<td class="tdformattable"><input id="precio-' + idmaterial + '" type="number" class="border border-0" style="width:100%;" name="precios[]" value="' + response.data[0].precio1 + '" readonly onfocus="blur()"></td>';
                html += '<td class="tdformattable"><input id="cantidad-' + idmaterial + '" class="modificarcantidad border border-0 text-bg-light text-center" type="number" style="width:100%;" min="0" step="1" name="cantidades[]" value="' + cantdefault + '" autocomplete="off"></td>';
                html += '<td class="tdformattable"><input id="subtotal-' + idmaterial + '" class="modificarsubtotal border border-0 text-center" type="number" value="' + (cantdefault * response.data[0].precio1) + '" readonly onfocus="blur()"></td>';
                html += '<td class="tdformattable"><input type="button" id="remove-' + idmaterial + '" class="btn btn-danger removerproductodelalista" style="width:100%;" value="x"></td>';
                html += '</tr>';
                $('tbody#tbodyaddproducto').append(html); 
                
                calculadoraOrden();
                enableDesabledCartShopping();
                productosagregados.push(idmaterial);
                console.log(productosagregados);
            })
            .catch(function (error) {
                console.log(error);
            });
    }



    /**--------------------------------------------------------------------
    * 
    * SHOPPING CART => DISABLED BUTTON PRODUCTS SELECTED
    *               => REPLACE TEXT FOR - AGRAGADO -           (2)
    *               => Habilita El Shopping Cart
    *               => DESABLED LOS PRODUCTOS YA AGREGADOS
    * 
    *---------------------------------------------------------------------*/
    $(document).on('click','.soldproducto',function (event) {
        //console.log(event.target.id);
        $('button.formoffcanvas[type=button]').attr("disabled", false);
        let id = event.target.id;
        $('.btn' + id).attr("disabled", true);
        $('.btn' + id).text("en el carrito");
        addProductoCar(id);
        $('button.formoffcanvas[type=button]').trigger('click');
    });

    $(document).on('click', '.addproducto', function (event) {
        //console.log(event.target.id);
        let id = event.target.id;
        $('.btn' + id).attr("disabled", true);
        $('.btn' + id).text("en el carrito");
        addProductoCar(id);
    });

    function prodcutosyaagregados(){
        productosagregados.forEach(idmaterial => {
            $('.btn' + idmaterial).attr("disabled", true);
            $('.btn' + idmaterial).text("en el carrito");
        });
    }




    /*---------------------------------------------------------------------
    * 
    * SHOPPING CART => Quitar Producto         (3)
    *                             
    *---------------------------------------------------------------------*/
    $(document).on('click', 'input.removerproductodelalista[type=button]', function (event) {
        let idtarget = event.target.id;
        let id = idtarget.substring(idtarget.indexOf('-') + 1, idtarget.length);
        $(event.target).closest("tr").remove();
        productosagregados = productosagregados.filter((item)=> item !== id);
        console.log(productosagregados);
        $('button.sold' + id).attr('disabled', false);
        $('button.sold' + id).text('comprar');
        $('button.add' + id).attr("disabled", false);
        $('button.add' + id).text("agregar");
        enableDesabledCartShopping();
        calculadoraOrden();
    });




    /*---------------------------------------------------------------------
    * 
    * SHOPPING CART => REMOVE ALL PRODUCTS         (3)
    *                             
    *---------------------------------------------------------------------*/
    $(document).on('click', 'button.btnvaciarcarrito[type=button]', function (event) {
        $('tbody#tbodyaddproducto').empty();
        $('button.soldproducto').attr('disabled', false);
        $('button.soldproducto').text('comprar');
        $('button.addproducto').attr("disabled", false);
        $('button.addproducto').text("agregar");
        enableDesabledCartShopping();
        calculadoraOrden();
    });




    /**-----------------------------------------------------------
     | 
     | SHOPPING CART => CATIDAD => SUBTOTAL POR PRODUCTO    (4)
     | 
     |-----------------------------------------------------------*/
    $(document).on('keyup', 'input.modificarcantidad', function (event) {
        /*  console.log(event.target); */
        let idtarget = event.target.id;
        let id = idtarget.substring(idtarget.indexOf('-') + 1, idtarget.length);
        let candtarget = event.target.value;
        let passed = /^\d+$/.test(candtarget);
        //let passed = candtarget.match(regex);
        //if (passed === null || passed[0] === " " || cantida) {
        if (!passed || candtarget < 0) {
            $('input#cantidad-' + id).val('');
            $('input#subtotal-' + id).val(0);
            calculadoraOrden();
        } else {
            let precioprod = $('input#precio-' + id).val();
            let subtot = (precioprod * candtarget);
            $('input#subtotal-' + id).val(Number(parseFloat(subtot).toFixed(3)));;
            calculadoraOrden();
        }
    });



    /**-------------------------------------------------------------
     * 
     * SHOPPING CART => CALCULA => SUBTOTAL ALL => IVA => TOTAL  (5)
     *  
     *-------------------------------------------------------------*/
    function calculadoraOrden() {
        var subtotales = 0;
        $('.modificarsubtotal').each(function (i, e) {
            var importe = $(this).val();
            subtotales += parseFloat(importe);
        });
        $('#subtotalorden').val(Number(parseFloat(subtotales).toFixed(3)));
        $('#iva').val(Number(parseFloat(subtotales * .16).toFixed(3)));
        $('#totalorden').val(Number(((parseFloat(subtotales) * .16) + parseFloat(subtotales)).toFixed(3)));
    }




    /**-------------------------------------------------------------
     * 
     * SHOPPING CART => Verifica => Cart Shopping Vacio     (6)
     *  
     *-------------------------------------------------------------*/
    function enableDesabledCartShopping() {
        let rows = $('#tbodyaddproducto tr').length;
        (rows > 0) ? (
            $('span.numerodearticulosseleccionados').remove(),
            $('button.formoffcanvas[type=button]').append('<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger numerodearticulosseleccionados">' + rows + '</span>'),
            $('button.formoffcanvas[type=button]').attr("disabled", false),
            $('button.ordenarcartshopping[type=submit]').attr("disabled",false)
        ) : (
            $('span.numerodearticulosseleccionados').remove(),
            $('button.formoffcanvas[type=button]').append('<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger numerodearticulosseleccionados">vacío</span>'),
            $('button.formoffcanvas[type=button]').attr("disabled", true),
            $('button.ordenarcartshopping[type=submit]').attr("disabled",true)
        )
    };




    /*----------------------------------------------------------------------------------
     * 
     *  ORDEN => NUEVA => RESET ALL    => LIMPIA SHEARCH-CLIENTE                 (1)
     *                                 => VACIA SHOPPING CART
     *                                 => ENABLE ALL PRODUCTS BUTTONS
     *                                 => REPLACE BUTTON TEXT FOR ORIGINAL
     *                                 => enabled Shopping Cart Button
     *                                 => Reset Calculadora Shopping Cart
     ---------------------------------------------------------------------------------*/
    function procedimientoClienteSeleccionado() {
        $('input#searchcliente[type=search]').val('');
        $('#tbodyaddproducto').empty();
        $('.soldproducto').attr("disabled", false);
        $('.addproducto').attr("disabled", false);
        $('.soldproducto').text("comprar");
        $('.addproducto').text("agregar");
        enableDesabledCartShopping();
        calculadoraOrden();
    };



    /**
     * 
     * EVENTO MOSTAR-OCULTAR LISTA
     * 
     */
    $('a.link-search-cliente').on('click', function () {
        ($('.showhiddeseccioncliente').attr('hidden') === 'hidden') ? (
            $('.showhiddeseccioncliente').attr('hidden', false)
        ) : (
            $('.showhiddeseccioncliente').attr('hidden', true)
        )

    });




    /**
      * 
      * OTRAS FUNCIONES => Ver Eventos => ver targets
      * 
      */
    $(document).click(function (event) {
        //console.log(event.target);
    });



    /**------------------------------------------------------------
     * 
     *  ************( DESUSO ) CANTIDAD DEL PRODUCTO************
     * 
     *--------------------------------------------------------------*/


    /*  $(document).on('click', 'li', function(){  
        $('input#searchcliente[type=text]').val($(this).text());  
        $('#searchresult').fadeOut();  
    }); */
    /*     $('input#searchcliente[type=text]').keyup( function (event) {
            event.stopPropagation();
            let query = $(this).val();
            $('.quitarresultados').remove();
             console.log(query.length); 
            if (query != '') {
                var url = "/api/autocompletar/?query=" + query;
                var html = "";
                
                 $.ajax(url)
                    .done(function (data) {
                        if (data.length > 0) {
                            html = '<ul class="quitarresultados dropdown-menu dropdown-menu-end dropdown-menu-lg-end" style="display: block;">';
                            for (let index = 0; index < data.length; index++) {
                                html += '<li><input type="button" class="dropdown-item selectcliente" id="' + data[index].idcliente + '" value="' + data[index].razon_social + '"></li>';
                            }
                            html += '</ul>';
                            $('#searchresult').append(html);
                        }
                    })
                    .fail(function (data) {})
                    .always(function (data) {}); 
            }
        }); */


    //Añadir-Specialty
    /*  $('.addproducto').on('click', function(event) {
         getProductos();
     }); */

    // Want to use async/await? Add the `async` keyword to your outer function/method.
    /*     async function getProductos() {
            try {
                const response = await axios.get('/api/lista-productos');
                console.log(response);
            } catch (error) {
                console.error(error);
            }
        } */


});/**ready */


