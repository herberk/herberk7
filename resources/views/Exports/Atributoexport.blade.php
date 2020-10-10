<table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Codigo</th>
        <th>Tipo</th>
        <th>Fechao</th>

    </tr>
    </thead>
    <tbody>
    @foreach ($atributos as $atributo)
        <tr>
            <td>{{ $atributo->id }}</td>
            <td>{{ $atributo->name }}</td>
            <td>{{ $atributo->codigo }}</td>
            <td>{{ $atributo->tipos->name }}</td>
            <td>{{ $atributo->created_at->format('d/m/Y') }}</td>

        </tr>
    @endforeach
    </tbody>
</table>
