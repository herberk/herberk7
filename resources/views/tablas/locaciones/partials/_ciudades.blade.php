<div class="col-4">
    <div class="card border-success">

            <table class="table table-sm table-striped">
                <thead class="thead-dark">
                <th style= "width: 20px;">#</th>

                <th>Nombre</th>
                <th style= "width: 30px;">Codigo</th>
                <th style= "width: 30px;">Editar</th>
                <th style= "width: 30px;">Borrar</th>
                </thead>
                <tbody>
                @foreach($ciudades as $ciudad)
                    <tr >
                        <td>{{ $ciudad->id }}</td>
                       <td>{{ $ciudad->name }}</td>
                        <td>{{ $ciudad->codigo }}</td>
                        <td>
                            <a href="{{ route('editar', [$ciudad->id]) }}"
                               data-toggle="tooltip"  title="Modifica ciudad"><i class="fas fa-pencil-alt" style=color:#15be0e></i></a>
                        </td>
                        <td>

                          <a href="{{ route('eliminar', [$ciudad->id]) }}"
                               data-toggle="tooltip"  title="Eliminar ciudad"><i class="fas fa-trash" style=color:Tomato></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        {{ $ciudades->links() }}
        <p>Viendo página {{ $ciudades->currentPage() }} de {{ $ciudades->lastPage() }}</p>
        <a href="{{ route('ciudadescreate') }}" class="btn btn-dark" >Nuevo Ciudad</a>
    </div>
</div>
