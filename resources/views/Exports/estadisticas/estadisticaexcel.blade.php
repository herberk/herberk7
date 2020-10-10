<h2>Empresa:{{setting('company') }} </h2>

<table class="table table-sm table-bordered table-striped" >

    <tr>
        <th>Año</th>
        <th>Mes</th>
        <th>Ventas </th>
        <th>Otros Ing.</th>
        <th>-</th>
        <th>Compras</th>
        <th >Remuneraciones</th>
        <th>Honorarios</th>
        <th>Arriendos</th>
        <th>Otros Gts.</th>
        <th>Saldo</th>
        <th>UTM de Mes</th>
    </tr>

    @foreach($recuentos as $recuento)
        <tr>
            {{--            <th scope="row">{{ $recuento->id }}</th>--}}
            <td style="text-align: center">{{$recuento->ano}}</td>
            <td >{{ $recuento->meses->mes}}</td>
            <td>{{ $recuento->ventaRCV}}</td>
            <td>{{ $recuento->otroing}}</td>
            <td>-</td>
            <td >{{$recuento->compraRCV}}</td>
            <td>{{ $recuento->remuneraciones}}</td>
            <td>{{ $recuento->honorarios}}</td>
            <td>{{ $recuento->arriendos}}</td>
            <td >{{$recuento->otrogas}}</td>
            <td>{{ $recuento->saldo}}</td>
            <td>{{ $recuento->utmes}}</td>
    @endforeach
</table>
