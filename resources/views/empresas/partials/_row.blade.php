<tr>
    {{--<td>{{ $empresas->id }}</td>--}}
    <td>  <img src="/storage/logos/{{ $empresas->logo }}" width="30" height="30" class="img-circle" /></td>

    <th scope="row">
        <span class="status st-{{ $empresas->state }}"></span>
      {{ $empresas->rut }}
    </th>

    <th scope="row">
         {{ $empresas->name_corto }}
        <span> - {{ $empresas->name }}</span>
        <span class="note">{{ $empresas->tipo_empresa }}</span>
    </th>
    <td>
        <span>Direccion :  {{ $empresas->direccion }}</span>
        <span class="note"> {{ $empresas->ciudad.' '. $empresas->comuna.' '.$empresas->region }}</span>
    </td>
    <td>{{ $empresas->email }}</td>
    <td>
        <span class="note">Registro: {{ $empresas->created_at->format('d/m/Y') }}</span>
        <span class="note">Inicio Actividad: {{ $empresas->updated_at->format('d/m/Y') }}</span>
    </td>
    <td class="text-right">
        @if ($empresas->trashed())
            <form action="{{ route('empresa.destroy', $empresas) }}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{ route('empresa/restore', $empresas->id) }}" class="btn btn-outline-secondary btn-sm"
                   data-toggle="tooltip"  title="Restaurar "><i class="far fa-window-restore"></i></a>
                <button type="submit" class="btn btn-outline-danger btn-sm"
                        data-toggle="tooltip"  title="Eliminar"><i class="fas fa-times-circle"></i></button>
            </form>
        @else
            <form action="{{ route('empresa.trash', $empresas) }}" method="POST">
                @csrf
                @method('PATCH')
                <a  href="{{ url('/empresa/juradas', [$empresas->id]) }}" class="btn btn-outline-primary btn-sm"
                    data-toggle="tooltip"  title="Seleccionar D.Juradas "> <i class="far fa-check-square"></i></a>
                @if ($empresas->notas !== "")
                 <a href="{{ route('empresashownotas', [$empresas->id]) }}" class="btn btn-outline-secondary btn-sm"
                    data-toggle="tooltip"  title="Ver Notas con datos ">  <i class="fas fa-tasks" style=color:blue></i></a>
                @else
                     <a href="{{ route('empresashownotas', [$empresas->id])}}" class="btn btn-outline-primary btn-sm"
                        data-toggle="tooltip"  title="Ver notas sin datos">  <i class="fas fa-tasks" style=color:grey></i></a>
                @endif
                 <a href="{{ route('empresa.show', $empresas)}}" class="btn btn-outline-secondary btn-sm"
                    data-toggle="tooltip"  title="Ver datos de empresa"><i class="fas fa-eye"></i></a>
                 <a href="{{ route('empresaedit', $empresas->id) }}" class="btn btn-outline-success btn-sm"
                data-toggle="tooltip"  title="Editar "><i class="fas fa-pencil-alt"></i></a>
                <button type="submit" class="btn btn-outline-danger btn-sm"
                        data-toggle="tooltip"  title="Borrar "><i class="fas fa-trash fa-sm"></i></button>
            </form>
        @endif
    </td>
</tr>
<tr class="skills">
    <td>&nbsp;</td>
    <td colspan="1">
        {{--<span class="note">{{ $user->profile->profession->title }}</span>--}}
    </td>
    {{--<td colspan="4"><span class="note">{{ $user->skills->implode('name', ', ') }}</span></td>--}}
</tr>
