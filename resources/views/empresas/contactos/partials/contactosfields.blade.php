
<div class="modal fade " id="NoteModalLong" tabindex="-1" role="dialog" aria-labelledby="NoteModalLongTitle"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            @if ($view == 'create')
                <h4 class="modal-title mt-3 ml-5" >Nuevo Contacto</h4>
            @else
                <h4 class="modal-title mt-3 ml-5" >Edita Contacto: {{$contactos->name}} </h4>
            @endif

            <div class="modal-body">
           {{--   primera linea--}}
                <div class="form-row ">
                    <div class="col-sm-3">
                        <div class="input-group mb-1">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Empresa</div>
                            </div>
                            <select  class="custom-select" name="empresa_id" >

                                @foreach ($empresas as $empresa)
                                    <option value="{{ $empresa->id}}"{{ old('empresa_id', $contactos->empresas_id) == $empresa->id ? ' selected' : '' }}> {{ $empresa->name_corto}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group mb-1">
                            <div class="input-group-prepend{{ $errors->has('rut') ? ' has-error' : '' }}">
                                <div class="input-group-text">Rut</div>
                            </div>
                            <input type="text" class="form-control" id="rut" name="rut" required oninput="checkRut(this)"
                                   placeholder="Sin: .  - " value="{{ old('rut',$contactos->rut) }}">
                            @if ($errors->has('rut'))
                                <span class="form-text text-danger">{{ $errors->first('rut') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="input-group mb-1">
                            <div class="input-group-prepend{{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="input-group-text">Nombre</div>
                            </div>
                            <input type="text" class="form-control" placeholder="Nombre completo del Contacto"
                                   name="name" value="{{ old('name',$contactos->name) }}" required>
                        </div>
                        @if ($errors->has('name'))
                            <span class="form-text text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
{{--      Segunda linea--}}
                <div class="form-row mt-2">
                    <div class="col-sm-6">
                        <div class="input-group">
                            <div class="input-group-prepend{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="input-group-text">@</div>
                            </div>
                            <input id="email" type="email" class="form-control" placeholder="Correo electronica"
                                   name="email" value="{{ old('email',$contactos->email) }}">
                            @if ($errors->has('email'))
                                <span class="form-text text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="input-group mb-1">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Fonos</div>
                            </div>
                            <input id="fono" type="text" class="form-control" name="fono" value="
                           {{ old('fono',isset($contactos->fono) ? $contactos->fono : null) }}" >
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <a href="{{ route('listacontactos') }}"
                       class="btn btn-outline-dark btn-sm"><i class="fa fa-undo"></i> Regresar a lista de contactos</a>
                    @if ($view == 'create')
                        <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-save"></i> Guardar  Contacto</button>
                    @else
                        <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-save"></i> Modifica  Contacto</button>
                    @endif

                </div>
        </div>

    </div>
</div>

