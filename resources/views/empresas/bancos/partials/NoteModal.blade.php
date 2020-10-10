<div class="modal fade bd-example-modal-lg" id="NoteModalLong" tabindex="-1" role="dialog" aria-labelledby="NoteModalLongTitle"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <h4 class="modal-title mt-3 ml-5" id="NoteModalLongTitle">Notas para : {{$bancos->name}}</h4>
            <div class="modal-body">
                 <textarea class="ckeditor" name="editor1" id="editor1" rows="10">
                     {{$bancos->notas}}
                 </textarea>
            </div>
            <div class="modal-footer">
                <a href="{{ route('bancosindex') }}"
                   class="btn btn-outline-dark btn-sm"><i class="fa fa-undo"></i> Regresar a lista de Bancos</a>
                <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-save"></i> Guardar Notas de Bancos</button>
            </div>
        </div>
    </div>
</div>

