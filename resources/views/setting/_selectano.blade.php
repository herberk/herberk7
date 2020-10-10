<form method="post" action="{{ route('settings.store') }}" class="form-horizontal" role="form" >
    {!! csrf_field() !!}
    <div class="btn-group">
        @foreach(config('setting_fields') as $section => $fields)
            @foreach($fields['elements'] as $field)
                {{--Esta ahregado para las validaciones del resto de campos que se actualizan--}}
                <input hidden="{{ $field['type'] }}"
                       name="{{ $field['name'] }}"
                       value="{{ old($field['name'], \setting($field['name'])) }}"
                       class="form-control  {{ Arr::get( $field, 'class') }}"
                       id="{{ $field['name'] }}"
                       placeholder="{{ $field['label'] }}">
                {{--Fin--}}

                @if($field['name']=='ano')
                    &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<select name="{{ $field['name'] }}" class="form-control {{ Arr::get( $field, 'class') }} py-1" id="{{ $field['name'] }}">
                        @foreach(Arr::get($field, 'options', []) as $val => $label)
                            <option @if( old($field['name'], \setting($field['name'])) == $val ) selected  @endif value="{{ $val }}">{{ $label }}</option>
                        @endforeach
                    </select>
                @endif
            @endforeach
        @endforeach
    </div>

    <button type="submit" class="btn btn-sm btn-success">Cambiar</button>

</form>
