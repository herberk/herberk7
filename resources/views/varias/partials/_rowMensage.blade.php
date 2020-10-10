<tr>
    <td>{{ $messages->id }}</td>
    <th scope="row">
        <span class="status st-{{ $messages->state }}"></span>
        {{ $messages->status }} {{ $messages->name }}
    </th>

    <td>
        <span class="note">Recibido : {{ $messages->created_at->format('d/m/Y') }}</span>
        <span class="note">Respoesta: -</span>
    </td>
    <th><a href="mailto:{{ $messages->email }}">{{ $messages->email }}</a></th>
    <td>{{ $messages->message }}</td>
    <td class="text-right">

        {{-- @if ($messages->trashed())
             <form action="{{ route('users.destroy', $messages) }}" method="POST">
                 @csrf
                 @method('DELETE')
                 @tooltip
                 @slot('mensa', 'Restaurar usuario')
                 <a href="{{ route('users/restore', $messages) }}" class="btn btn-outline-secondary btn-sm"><i class="far fa-window-restore"></i></a>
                 @endtooltip
                 @tooltip
                 @slot('mensa', 'Elimina usuario')
                 <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fas fa-times-circle"></i></button>
                 @endtooltip
             </form>
         @else--}}
        {{--  <form action="{{ route('users.trash', $messages) }}" method="POST">
              @csrf
              @method('PATCH')
             @tooltip
             @slot('mensa', 'Ver usuario')
                 <a href="{{ route('users.show', $messages) }}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-eye"></i></a>
            @endtooltip
              --}}{{--</span>--}}{{--
              @tooltip
              @slot('mensa', 'Edita usuario')
                 <a href="{{ route('users.edit', $messages) }}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-pencil-alt"></i></a>
              @endtooltip
              @tooltip
              @slot('mensa', 'Enviar a papelera usuario')
                 <button type="submit" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i></button>
               @endtooltip
          </form>
      @endif--}}
    </td>
</tr>
<tr class="skills">
    <td>&nbsp;</td>
    <td colspan="1">
        {{--<span class="note">{{ $messages->profile->profession->title }}</span>--}}
    </td>
    {{--<td colspan="4"><span class="note">{{ $messages->skills->implode('name', ', ') }}</span></td>--}}
</tr>
