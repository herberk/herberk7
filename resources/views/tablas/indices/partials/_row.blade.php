<table class="table table-sm table-bordered table-striped" id="dataTable">
    <thead class="thead-dark">
    <tr>
        <td>Año</td>
        <td>Mes</td>
        <td>UTM</td>
        <td>UTMA</td>
        <td>IPC</td>
        <td>IPCA</td>
    </tr>
    </thead>
  @foreach($valores as $row)
        <tr data-id="{{ $row->id}}">
            <td>{{ $row->ano}}</td>
            <td>{{ $row->meses->mes }}</td>
            <td><a href="#" class="xedit" data-pk="{{$row->id}}" data-name="utm"> {{$row->utm}}</a></td>
            <td>
                <a href="#" class="xedit"
                   data-pk="{{$row->id}}"
                   data-name="ipc"
                   data-placement="left">
                    {{$row->utma}}</a>
            </td>
            <td>
                <a href="#" class="xedit"
                   data-pk="{{$row->id}}"
                   data-name="ipc"
                   data-placement="left">
                    {{$row->ipc}}</a>
            </td>
            <td>
                <a href="#" class="xedit"
                   data-pk="{{$row->id}}"
                   data-name="ipca"
                   data-emptytext="Vacio">
                    {{$row->ipca}}</a>
            </td>
         </tr>
    @endforeach
</table>
