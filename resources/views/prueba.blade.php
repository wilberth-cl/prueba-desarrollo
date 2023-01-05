<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
</head>

<body>

    <div class="container-fluid py-2">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">

                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>IDMATERIAL</th>
                                    <th>DESCRIPCION</th>
                                    <th>UNIDADMEDIDA</th>
                                    <th>PRECIO1</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.colVis.min.js"></script>


    <script type="module">
    $(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        paging: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: false,
        responsive: true,
        serverSide: false,
        ajax: {
            url: "{{ route('api.lista-productos') }}",
            type: 'GET',
            dataSrc: ''            
        },
        columns: [
            {data: "idmaterial"},
            {data: "descripcion"},
            {data: "unidadmedida"},
            {data: "precio1",
            "render": function ( data, type, row ) { return '$'+ data; } },
            {data: null}
        ],
        columnDefs: [ {
            "targets": 4,
             "data": "idmaterial",
            "render": function ( data, type, row, meta ) {
                return '<a class="btn btn-danger" id="'+data["idmaterial"]+'" onclick="actualizarValor(this.id);">Hola</a>';
            }
        } ],
        dom: 'lBfrtip<"actions">',
        buttons: [
        {
            extend: 'copy',
            text: 'Copiar',
            exportOptions: {
                columns: ':visible'
            }
        },
        {
            extend: 'csv',
            text: 'CSV',
            exportOptions: {
                columns: ':visible'
            }
        },
        {
            extend: 'excel',
            text: 'Excel',
            exportOptions: {
                columns: ':visible'
            }
        },
        {
            extend: 'pdf',
            text: 'PDF',
            exportOptions: {
                columns: ':visible'
            }
        },
        {
            extend: 'print',
            text: 'Print',
            exportOptions: {
                columns: ':visible'
            }
        },
        {
            extend: 'colvis',
            text: 'Seleccionar Columna',
            exportOptions: {
                columns: ':visible'
            }
        },
    ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
});
</script>


</body>

</html>
