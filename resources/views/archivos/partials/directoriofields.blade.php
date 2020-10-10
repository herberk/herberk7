<div class="modal fade " id="NoteModalLong" tabindex="-1" role="dialog" aria-labelledby="NoteModalLongTitle"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            @if ($view == 'create')
                <h4 class="modal-title mt-3 ml-5" >Nuevo directorio</h4>
            @else
                <h4 class="modal-title mt-3 ml-5" >Edita directorio: {{$categori->name}} </h4>
            @endif
            <div class="modal-body">

                <div class="form-row ">
                    <div class="col-sm-3">
                        <div class="input-group mb-1">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Empresa</div>
                            </div>
                            <select  class="custom-select" name="empresa_id" >
                                @foreach ($empresas as $empresa)
                                    <option value="{{ $empresa->id}}"{{ old('empresa_id', $categori->empresas_id) == $empresa->id ? ' selected' : '' }}> {{ $empresa->name_corto}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                       <div class="input-group mb-1">
                            <div class="input-group-prepend{{ $errors->has('ano') ? ' has-error' : '' }}">
                                <div class="input-group-text">Año</div>
                            </div>
                            <input type="text" class="form-control" name="ano" required
                                   placeholder="Año" value="{{ old('ano',$categori->ano) }}">
                            @if ($errors->has('ano'))
                                <span class="form-text text-danger">{{ $errors->first('ano') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="input-group mb-1">
                            <div class="input-group-prepend{{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="input-group-text">Nombre del directorio</div>
                            </div>
                            <input type="text" class="form-control" placeholder="Nombre del directorio"
                                   name="name" value="{{ old('name',$categori->name) }}" required>
                        </div>
                        <small id="fileHelp" class="form-text text-muted mt-2">Al Nombre se le antepondrà el año en forma automatica</small>
                        @if ($errors->has('name'))
                            <span class="form-text text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
              </div>
                <div class="modal-footer">
                    <a href="{{ route('listacategori') }}"
                       class="btn btn-outline-dark btn-sm"><i class="fa fa-undo"></i> Regresar a lista de directorios</a>
                    @if ($view == 'create')
                        <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-save"></i> Guardar  Directorio</button>
                    @else
                        <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-save"></i> Modifica  Directorio</button>
                    @endif
                </div>
        </div>
    </div>
</div>

