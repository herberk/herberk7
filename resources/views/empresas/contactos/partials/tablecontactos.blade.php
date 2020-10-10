<table class="table table-sm table-bordered table-striped" id="dataTable">
    <thead class="thead-dark">
        <tr>
           <th>#</th>
           <th style="width: 100px;text-align: center">RUT</th>
           <th>Nombre</th>
           <th style="width: 50px; text-align: center">Empresa</th>
           <th>Correo.</th>
           <th>Telefonos</th>
            <th style="width: 200px;text-align: center">Acciones</th>
      </tr>
    </thead>
    @foreach ($contactos as $contacto)
       <tr data-id="{{ $contacto->id}}">
       <td>{{ $contacto->id}}</td>
       <td style="text-align: right">{{ $contacto->rut}}</td>
       <td><a href="#" class="xedit" data-pk="{{$contacto->id}}" data-name="name">{{$contacto->name}}</a></td>
       <td>{{ $contacto->empresas->name_corto}}</td>
       <td><a href="mailto:{{$contacto->email}}">{{$contacto->email}}</a></td>
       <td><a href="#" class="xedit" data-pk="{{$contacto->id}}"   data-name="fono" data-emptytext="Sin dato">  {{$contacto->fono}}</a></td>
{{--    <a href="mailto:cuenta@deemail.com">Clicka para enviar email a un destinatario</a>--}}
       <td style="width: 200px;text-align: right">
           @if ($contacto->trashed())
                <form action="{{ route('contacto.destroy', $contactos) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('contacto/restore', $contacto->id) }}" class="btn btn-outline-secondary btn-sm"
                       data-toggle="tooltip"  title="Restaurar contacto"><i class="far fa-window-restore"></i></a>
                    <button type="submit" class="btn btn-outline-danger btn-sm"
                            data-toggle="tooltip"  title="Elimina contacto "><i class="fas fa-times-circle"></i></button>
                </form>
            @else

                    @if ($contacto->notas !== null)
                      <a href="{{ route('contactoshownotas', [$contacto->id])}}" class="btn btn-outline-secondary btn-sm"
                         data-toggle="tooltip"  title="Ver notas con datos">  <i class="fas fa-tasks" style=color:blue></i></a>
                   @else
                      <a href="{{ route('contactoshownotas', [$contacto->id])}}" class="btn btn-outline-primary btn-sm"
                         data-toggle="tooltip"  title="Ver notas sin datos">  <i class="fas fa-tasks" style=color:grey></i></a>
                   @endif

                <a href="{{ route('contactoedit',$contacto)}}" class="btn btn-outline-success btn-sm"
                   data-toggle="tooltip"  title="Editar notas de contacto"><i class="fas fa-pencil-alt"></i></a>
                <a href="{{ route('contacto/trash', [$contacto->id]) }}" class="btn btn-outline-danger btn-sm"
                   data-toggle="tooltip"  title="Borrar contacto"><i class="fas fa-trash fa-sm"></i></a>

            @endif
        </td>
       </tr>
    @endforeach
</table>
@section('script')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            });

            $('.xedit').editable({
                url: '{{url("contacts/update")}}',
                title: 'Update',
                success: function (response, newValue) {
                    console.log('Updated', response)
                }
            });
        })
    </script>

@endsection
