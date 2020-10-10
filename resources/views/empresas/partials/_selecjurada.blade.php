<div class="modal fade bd-example-modal-lg" id="NoteModalLong" tabindex="-1" role="dialog" aria-labelledby="NoteModalLongTitle" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <h4 class="modal-title mt-3 ml-5" id="NoteModalLongTitle">Declaraciones para : {{$empresas->name}} Año Tributario {{ setting('ano') }}</h4>
            <div class="modal-body">
                <div class="col-sm"> {{--el sm hace que se pongan uno sobre otro--}}
                    <div class="card" type="hide">
                        <input name="anot" type="hidden" value="{{ setting('ano') }}">
                        <h5 class="ml-4"><strong>Seleccione declaraciones juradas</strong></h5>
                        @foreach($juradas as $jurada)
                            <div class="form-check form-check-inline ml-5 mb-1">
                                <strong> <input name="juradas[{{ $jurada->id }}]"
                                                class="form-check-input"
                                                type="checkbox"
                                                id="skill_{{ $jurada->id }}"
                                                value="{{ $jurada->id }}"
                                    {{ $errors->any() ? old("juradas.{$jurada->id}") :  $empresas->juradas->contains($jurada) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="skill_{{ $jurada->id }}">{{ $jurada->desc_corta }}</label></strong>
                            </div>
                        @endforeach
                    </div>
                </div>
            <div class="modal-footer">
                <a href="{{ route('empresaindex') }}"
                   class="btn btn-outline-dark btn-sm"><i class="fa fa-undo"></i> Regresar a lista de empresas</a>
                <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-save"></i> Guardar declaraciones seleccionadas</button>
            </div>
        </div>
    </div>
</div>

