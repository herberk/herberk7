<div class="modal-body">
    <div class="col-sm"> {{--el sm hace que se pongan uno sobre otro--}}
        <div class="card" type="hide">
            <input name="anot" type="hidden" value="{{ setting('ano') }}">
            <h5 class="ml-4"><strong>Seleccione 15 accesos directos para visualizar</strong></h5>
            <small id="fileHelp" class="form-text text-muted ml-5 my-2">Los quince directorios que Ud seleccione seran los que podra usar </small>
            {!! Form::model($accesdirs, ['route' => ['updatedir', $accesdirs], 'method' => 'PUT','class'=>"form-horizontal"]) !!}
            @foreach($accesdirs as $acces)
                <div class="form-check form-check-inline ml-5 mb-2">
                    <strong> <input name="acces[{{ $acces->id }}]"
                                    class="form-check-input"
                                    type="checkbox"
{{--                                    id="skill_{{ $acces->id }}"--}}
                                    value="{{ $acces->active }}"
                                {{ old('$acces', $acces->active) == $acces ? 'checked' : '' }}>
                        <label class="form-check-label" for="skill_{{ $acces->id }}">{{ $acces->name }}</label></strong>
                </div>
            @endforeach
            <div>
                {{ $accesdirs->links() }}
                {{--            <p>Viendo página {{ $accesdirs->currentPage() }} de {{ $accesdirs->lastPage() }}</p>--}}
            </div>
         </div>
    </div>
    <div class="modal-footer">
        <a href="{{ route('home') }}"
           class="btn btn-outline-dark btn-sm"><i class="fa fa-undo"></i> Regresar al Escritorio</a>
        <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-save"></i> Guardar direcciones seleccionadas</button>
    </div>
    {!! Form::close() !!}
</div>
