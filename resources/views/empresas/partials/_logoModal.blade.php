<div class="modal fade bd-example-modal-sm" id="NoteModalLong" tabindex="-1" role="dialog" aria-labelledby="NoteModalLongTitle" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h4 class="modal-title mt-3 ml-5" id="NoteModalLongTitle">Logo para : {{$empresas->name}}</h4>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <img class="rounded-circle" src="/storage/logos/{{ $empresas->logo }}" width="150" height="150" />

                    <div class="form-group mt-2">
                        <input type="file" class="form-control-file" name="logo" id="logoFile" aria-describedby="fileHelp">
                        <small id="fileHelp" class="form-text text-muted mt-2">Por favor, cargue un archivo de imagen válido. El tamaño del logo no debe ser superior a 1MB..</small>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('empresaindex') }}" class="btn btn-outline-dark btn-sm"><i class="fa fa-undo"></i> Regresar a lista de empresas</a>
                <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-save"></i> Guardar Logo Empresa</button>
            </div>
        </div>
    </div>
</div>

