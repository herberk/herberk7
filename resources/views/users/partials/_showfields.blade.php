    <div class="col-sm-5">  {{--el sm hace que se pongan uno sobre otro--}}
        <div class="card pt-2 px-2">
            <p><strong>Nombre Corto</strong>: {{ $user->nickname }}</p>
            <p><strong>Correo electrónico</strong>: {{ $user->email }}</p>
            <p><strong>Rol o Tipo</strong>: {{ $user->role }}</p>
            <p><strong>Fecha de registro</strong>: {{ \Carbon\Carbon::parse($user->created_at)->format('d-m-y') }}</p>
            <p><strong>Biografìa</strong>: {{ $user->profile->bio ?:'sin Biografía :('}}</p>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="card pt-2 px-2">
            <p><strong>Profesión</strong>: {{ $user->profile->profession_id ?:'sin Profesion :(' }}</p>
            <p><strong>Twitter</strong>: {{  $user->profile->twitter ?:'sin Twitter :('}}</p>
            <p><strong>habilidades</strong>: {{ $user->skills->implode('name', ', ')?:'sin habilidades :(' }}</p>
            <p><strong>Activo</strong>: {{ ($user->active)?'Si':'No'}}<span class="status st-{{ $user->state }}"></span></p>

        </div>
    </div>


