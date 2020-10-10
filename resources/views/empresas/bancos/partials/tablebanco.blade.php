<table class="table table-sm table-bordered table-striped" id="dataTable">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Empresa</th>
        <th scope="col">Nombre Banco</th>
        <th style="width: 50px;text-align: center">Ruta</th>
        <th scope="col">N# Cta. Cte.</th>
        <th scope="col">Personas que firman</th>
        <th scope="col">Monto linea.</th>
        <th style="text-align: center">Acciones</th>
    </tr>
    </thead>
    @foreach($bancos as $banco)
            <tr>
                <th scope="row">{{ $banco->id }}</th>
                <td>{{ $banco->empresas->name_corto }}</td>
                <td><a href="#" class="xedit" data-pk="{{ $banco->id }}" data-name="name" data-emptytext="Sin dato">{{$banco->name}}</a></td>
                @if ($banco->ruta !== null)
                    <td style="width: 50px;text-align: center"><a href="{{$banco->ruta}}" target="_blank"><i class="fab fa-internet-explorer"></i></a></td>
                @else
                    <td style="width: 50px;text-align: center">Sin</td>
                @endif
                <td><a href="#" class="xedit" data-pk="{{ $banco->id }}" data-name="ctacte" data-emptytext="Sin dato">{{ $banco->ctacte }}</a></td>
                <td><a href="#" class="xedit" data-pk="{{ $banco->id }}" data-name="firman" data-emptytext="Sin dato">{{ $banco->firman }}</a></td>
                <td style="text-align: right">{{ number_format($banco->montoLin)}}</td>
            <td style="width: 150px;text-align: right">
               @if ($banco->trashed())
                    <form action="{{ route('empresa.destroy', $banco) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('banco/restore', $banco->id) }}" class="btn btn-outline-secondary btn-sm"
                           data-toggle="tooltip"  title="Restaurar"><i class="far fa-window-restore"></i></a>
                        @slot('mensa', 'Elimina socio NO operativo')
                           <button type="submit" class="btn btn-outline-danger btn-sm"
                                data-toggle="tooltip"  title="Eliminar - No operativo"><i class="fas fa-times-circle"></i></button>
                    </form>
                @else
                    @if ($banco->notas !== null)
                        <a href="{{ route('bancoshownotas', [$banco->id])}}" class="btn btn-outline-secondary btn-sm"
                           data-toggle="tooltip"  title="Ver Notas con datos">  <i class="fas fa-tasks" style=color:blue></i></a>
                    @else
                        <a href="{{ route('bancoshownotas', [$banco->id])}}" class="btn btn-outline-primary btn-sm"
                           data-toggle="tooltip"  title="Ver Notas sin datos">  <i class="fas fa-tasks" style=color:grey></i></a>
                    @endif
                    <a href="{{ route('bancoedit',$banco->id)}}" class="btn btn-outline-success btn-sm"
                       data-toggle="tooltip"  title="Editar"><i class="fas fa-pencil-alt"></i></a>
                    <a href="{{ route('banco/trash', [$banco->id]) }}" class="btn btn-outline-danger btn-sm"
                       data-toggle="tooltip"  title="Borrar"><i class="fas fa-trash fa-sm"></i></a>
               @endif
            </td>
    @endforeach
</table>
{{ $bancos->links() }}
<p>Viendo página {{ $bancos->currentPage() }} de {{ $bancos->lastPage() }}</p>
@section('script')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            });
            $('.xedit').editable({
                url: '{{url("banco/update")}}',
                title: 'Update',
                success: function (response, newValue) {
                    console.log('Updated', response)
                }
            });
        })
    </script>
@endsection
