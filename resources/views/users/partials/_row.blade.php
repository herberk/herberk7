<tr>
    <td>{{ $user->id }}</td>
    {{--<td>{{ $user->nickname }}</td>--}}
    <th scope="row">
       <span class="status st-{{ $user->state }}"></span>
      {{ $user->status }}  {{ $user->name }}        @if ($user->role != 'user')
            ({{ $user->role }})
        @endif
           <span> - {{ $user->nickname }}</span>
        <span class="note">{{ $user->team->name }}</span>
    </th>
    <td>{{ $user->email }}</td>
    <td>
        <span class="note">Registro: {{ $user->created_at->format('d/m/Y') }}</span>
        <span class="note">Último login: -</span>
    </td>
    <td class="text-right">
        @if ($user->trashed())
            <form action="{{ route('users.destroy', $user) }}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{ route('users/restore', $user) }}" class="btn btn-outline-secondary btn-sm"
                   data-toggle="tooltip"  title="Restaurar"><i class="far fa-window-restore"></i></a>
                @slot('mensa', 'Elimina usuario')
                <button type="submit" class="btn btn-outline-danger btn-sm"
                        data-toggle="tooltip"  title="Elimina permanente"><i class="fas fa-times-circle"></i></button>
            </form>
        @else
            <form action="{{ route('users.trash', $user) }}" method="POST">
                @csrf
                @method('PATCH')
                   <a href="{{ route('users.show', $user) }}" class="btn btn-outline-secondary btn-sm"
                      data-toggle="tooltip"  title="Ver usuario"><i class="fas fa-eye"></i></a>
                   <a href="{{ route('users.edit', $user) }}" class="btn btn-outline-secondary btn-sm"
                      data-toggle="tooltip"  title="Editar Usuario"><i class="fas fa-pencil-alt"></i></a>
                   <button type="submit" class="btn btn-outline-danger btn-sm"
                           data-toggle="tooltip"  title="Enviar a la Papelera"><i class="far fa-trash-alt"></i></button>
            </form>
        @endif
    </td>
</tr>
<tr class="skills">
    <td>&nbsp;</td>
    <td colspan="1">
        <span class="note">{{ $user->profile->profession->title }}</span>
    </td>
    <td colspan="4"><span class="note">{{ $user->skills->implode('name', ', ') }}</span></td>
</tr>
