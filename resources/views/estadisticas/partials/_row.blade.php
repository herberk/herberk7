
    @foreach($recuentos as $recuento)
        <tr>
{{--            <th scope="row">{{ $recuento->id }}</th>--}}
            <td style="width: 50px;text-align: center">{{$recuento->ano}}</td>
            <td style="width: 50px;text-align: center">{{ $recuento->meses->mes}}</td>
            <td style="text-align: right">{{ number_format($recuento->ventaRCV)}}</td>
            <td style="text-align: right">{{ number_format($recuento->otroing)}}</td>
            <td>-</td>
            <td style="text-align: right">{{ number_format($recuento->compraRCV)}}</td>
            <td style="text-align: right">{{ number_format($recuento->remuneraciones)}}</td>
            <td style="text-align: right">{{ number_format($recuento->honorarios)}}</td>
            <td style="text-align: right">{{ number_format($recuento->arriendos)}}</td>
            <td style="text-align: right">{{ number_format($recuento->otrogas)}}</td>
            <td style="text-align: right">{{ number_format($recuento->saldo)}}</td>

        <td style="width: 100px;text-align: right">
            @if ($view == 'index' )
              <a href="{{ route('estadisticaedit',$recuento)}}" class="btn btn-outline-success btn-sm"
                 data-toggle="tooltip"  title="Editar"><i class="fas fa-pencil-alt"></i></a>
              <a href="{{ route('estadistica/trash',$recuento)}}" class="btn btn-outline-danger btn-sm"
                 data-toggle="tooltip"  title="Borrar"><i class="fas fa-trash fa-sm"></i></a>
            @else
                <form action="{{ route('estadistica.destroy', $recuento) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('estadistica/restore', $recuento->id) }}" class="btn btn-outline-secondary btn-sm"
                       data-toggle="tooltip"  title="Restaurar datos mes"><i class="far fa-window-restore"></i></a>
                    <button type="submit" class="btn btn-outline-danger btn-sm"
                            data-toggle="tooltip"  title="Elimina datos del mes "><i class="fas fa-times-circle"></i></button>
                </form>
            @endif
       </td>
    @endforeach

