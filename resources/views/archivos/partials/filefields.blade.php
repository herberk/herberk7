<div class="modal fade " id="NoteModalLong" tabindex="-1" role="dialog" aria-labelledby="NoteModalLongTitle"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
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
            @if ($view == 'createfile')
                <h4 class="modal-title mt-3 ml-5" >Subir nuevo archivo</h4>
            @else
                <h4 class="modal-title mt-3 ml-5" >Edita Ubicacion archivo: {{$file->name}} </h4>
            @endif
            <div class="modal-body">
                <div class="form-row ">
                    <div class="col-sm-3">
                        <div class="input-group mb-1">
                            {!! Field::select('empre_id', $emp_com, null, ['class' => 'form-control py-1', 'style'=>"width: 120px"]) !!}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group mb-1">
                            {!! Field::select('dir_id', $dir_com, null, ['class' => 'form-control py-1', 'style'=>"width: 160px"]) !!}
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="custom-file">
                            <input type="file" name="file" class="custom-file-input" id="file"/>
                            <label class="custom-file-label" for="file">Seleccione</label>
                            <small id="fileHelp" class="form-text text-muted mt-2">Por favor, cargue un archivo de PDF o XLS válido. El tamaño del archivo no debe ser superior a 2MB..</small>
                        </div>
                    </div>
               </div>
                <div class="modal-footer">
                    <a href="{{ route('fileslista') }}"
                       class="btn btn-outline-dark btn-sm"><i class="fa fa-undo"></i> Regresar a lista de archivos</a>
                    @if ($view == 'createfile')
                        <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-save"></i> Subir archivo</button>
                    @else
                        <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-save"></i> Modifica ubicacion</button>
                    @endif
                </div>
        </div>
    </div>
</div>

