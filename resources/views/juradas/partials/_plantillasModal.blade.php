<div class="modal fade bd-example-modal-lg" id="NoteModalLong" tabindex="-1" role="dialog" aria-labelledby="NoteModalLongTitle" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <h4 class="modal-title mt-3 ml-5" id="NoteModalLongTitle">Plantilla para :{{$juradas->desc_corta}} </h4>
         <embed src="/biblio/Formularios/{{ $juradas->formulario }}#toolbar=0" height="600" >--}}
{{--            <embed src="http://www.sii.cl/ayudas/renta/ayuda_corregir_obs/2019/B01.pdf"  height="600" >--}}
{{--            <a href= "/storage/Instruccions/{{ $juradas->Instruccion }}" target="_blank" class="btn btn-outline-secondary btn-sm"><i class="fas fa-info-circle">Informativo</i></a>--}}
            <div class="modal-footer">
                <a href="{{ route('juradas.index') }}"
                   class="btn btn-outline-dark btn-sm"><i class="fa fa-undo"></i> Regresar a lista de declaraciones juradas</a>
            </div>
        </div>
    </div>
