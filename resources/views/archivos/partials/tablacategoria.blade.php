<table class="table table-sm table-bordered table-striped" id="dataTable">
    <thead class="thead-dark">
    <tr>
        <th>#</th>
        <th>Empresa</th>
        <th>Año</th>
        <th>Nombre del directorio</th>
        <th>Fichero</th>
{{--        <th style="width: 100px;text-align: center">Año</th>--}}
        <th style="width: 200px;text-align: center">Acciones</th>
    </tr>
    </thead>
    @foreach ($categoris as $categori)
    <tr data-id="{{ $categori->id}}">
        <td>{{ $categori->id}}</td>
        <td>{{ $categori->empresas->name_corto}}</td>
        <td>{{ $categori->ano}}</td>
        <td>{{$categori->name}}</td>
        <td>{{ $categori->ficheros_count }}</td>
        <td style="width: 100px;text-align: right">
            @if ($view == 'index')
                <a href="{{ route('directedit',$categori)}}" class="btn btn-outline-success btn-sm"
                   data-toggle="tooltip"  title="Editar "><i class="fas fa-pencil-alt"></i></a>
                @if ($categori->ficheros_count == 0)
                    <a href="{{ route('direct/destroy', [$categori->id]) }}" class="btn btn-outline-danger btn-sm"
                       data-toggle="tooltip"  title="Elimina Directorio "><i class="fas fa-trash fa-sm"></i></a>
                @endif
             @endif
        </td>
        @endforeach
</table>
