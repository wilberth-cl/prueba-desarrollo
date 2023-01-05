<style>
    .styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    width: 100%;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
.styled-table thead tr {
    background-color: navy;
    color: #ffffff;
    text-align: left;
}
.styled-table th,
.styled-table td {
    padding: 12px 15px;
}
.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}
.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}
.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid navy;
}
.styled-table tbody tr.active-row {
    font-weight: bold;
    color: navy;
}
.title{
    text-align: left;
    padding: 0%;
    margin: 0%;
}
.tiempo{
    text-align: right;
    padding: 0%;
    margin: 0%;
}
.header{
    font-family: sans-serif;
    background-color: black;
    color: white;
    padding: 12px 15px;
}
</style>
<div class="header">
    <h4 class="tiempo">{{ $fechahora }}</h4>
    <h3 class="title">{{ $tituloreporte }}</h3> 
</div>

<table class="styled-table">
    <thead>
        <tr>
            <th>IDMATERIAL</th>
            <th>DESCRIPCION</th>
            <th>TOTAL DE PIEZAS VENDIDAS</th>
            <th>SUBTOTAL</th>
         </tr>
    </thead>
    <tbody>
        @foreach ($collectproductos as $productos)
        @foreach ($productos as $producto)
        <tr>
            <td>{{ $producto->idmaterial }}</td>
            <td>{{ $producto->descripcion }}</td>
        
            @foreach ($grupos as $grupo)

                @if ($producto->idmaterial == $grupo->idmaterial)
                    <td>{{ $grupo->cantidad_prod }}</td>
                    <td>${{ $grupo->subtotal_prod }}</td>
                @endif
                
            @endforeach
            
        </tr>
        @endforeach
    @endforeach
    </tbody>
</table>
   
