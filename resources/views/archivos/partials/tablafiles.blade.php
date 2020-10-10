<table class="table table-sm table-bordered table-striped" id="dataTable">
    <thead class="thead-dark">
    <tr>
        <th>ID</th>
        <th>Empresa</th>
        <th>Nombre del directorio</th>
        <th>Nombre del archivo</th>
        <th>Tamaño</th>
        <th>Fecha de subida</th>
        <th>Extensión</th>
        <th style="width: 200px;text-align: center">Acciones</th>
    </tr>
    </thead>
    @foreach ($files as $file)
        <tr data-id="{{ $file->id}}">
            <td>{{ $file->id }}</td>
            <td>{{ $file->empresa }}</td>
            <td>{{ $file->directorio }}</td>
            <td>{{ $file->name }}</td>
            <td>{{ $file->sizeInKb }} KB</td>
            <td style="text-align: center">{{ $file->created_at }}</td>
            <td> . {{ $file->extension }}</td>
            <td style="width: 100px;text-align: right">
                @if ($view == 'index')
                    <form action="{{ route('files.destroy', $file) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <a href="{{ "/storage/".$file->public_url }}" target="_blank" class="btn btn-outline-secondary btn-sm"
                           data-toggle="tooltip"  title="Descargar, Ver "><i class="fas fa-download"></i></a>
                        <button type="submit" class="btn btn-outline-danger btn-sm"
                                data-toggle="tooltip"  title="Eliminar"><i class="fas fa-trash fa-sm"></i></button>
                    </form>
{{--                {{ asset($file->public_url) }}"{{ "/storage/".$file->public_url }}--}}
                @endif
            </td>
    @endforeach
</table>
{{ $files->links() }}
<p>Viendo página {{ $files->currentPage() }} de {{ $files->lastPage() }}</p>

