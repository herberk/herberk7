
<div class="modal fade " id="NoteModalLong" tabindex="-1" role="dialog" aria-labelledby="NoteModalLongTitle"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            @if ($view == 'create')
                <h4 class="modal-title mt-3 ml-5" >Nuevo Socio</h4>
            @else
                <h4 class="modal-title mt-3 ml-5" >Edita Socio: {{$socios->name}} </h4>
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
                                    <option value="{{ $empresa->id}}"{{ old('empresa_id', $socios->empresas_id) == $empresa->id ? ' selected' : '' }}> {{ $empresa->name_corto}}</option>
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
                                   placeholder="Sin: .  - " value="{{ old('rut',$socios->rut) }}">
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
                            <input type="text" class="form-control" placeholder="Nombre completo del socio"
                                   name="name" value="{{ old('name',$socios->name) }}" required>
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
                                   name="email" value="{{ old('email',$socios->email) }}" required>
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
                           {{ old('fono',isset($socios->fono) ? $socios->fono : null) }}" >
                        </div>
                    </div>

                </div>
{{--               Tercera linea--}}
                <div class="form-row mt-2 ">
                    <div class="col-sm-4">
                        <div class="input-group">
                            <div class="input-group-prepend{{ $errors->has('apopago') ? ' has-error' : '' }}">
                                <div class="input-group-text">Pago $</div>
                            </div>
                            <input id="apopago" type="text" onchange="sumar();" class="form-control text-right"
                                   name="apopago" value="{{ old('apopago', number_format($socios->apopago,0,'',''))}}">
                        </div>
                        @if ($errors->has('apopago'))
                            <span class="form-text text-danger">{{ $errors->first('apopago') }}</span>
                        @endif
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <div class="input-group-prepend{{ $errors->has('apopend') ? ' has-error' : '' }}">
                                <div class="input-group-text">Pendiente $</div>
                            </div>
                            <input id="apopend" type="text" onchange="sumar();" class="form-control text-right"
                                   name="apopend" value="{{ old('apopend', number_format($socios->apopend,0,'','')) }}">
                        </div>
                        @if ($errors->has('apopend'))
                            <span class="form-text text-danger">{{ $errors->first('apopend') }}</span>
                        @endif
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <div class="input-group-text">Total $ </div>
                            <input id="aporte" type="text" class="form-control text-right"
                                   name="aporte" value="{{ old('aporte', number_format( $socios->aporte,0,'','')) }}">
                        </div>
                    </div>
                </div>
         {{--cuarta linea--}}
                <div class="form-row mt-2 ">
                    <div class="col-sm-2">
                        <div class="input-group">
                            <div class="input-group-prepend{{ $errors->has('porcen') ? ' has-error' : '' }}">
                                <div class="input-group-text">%.</div>
                            </div>
                            <input id="porcen" type="text" class="form-control text-right"
                                   name="porcen" value="{{ old('porcen',$socios->porcen) }}">
                        </div>
                        @if ($errors->has('porcen'))
                            <span class="form-text text-danger">{{ $errors->first('porcen') }}</span>
                        @endif
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group">
                            <div class="input-group-prepend{{ $errors->has('rep_legal') ? ' has-error' : '' }}">
                                <div class="input-group-text">Rep.</div>
                            </div>
                            <select class="custom-select" id="rep_legal" name="rep_legal">
                                <option>SI</option>
                                <option>No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Es accionista</div>
                            </div>
                            <select class="custom-select" id="acc" name="acc" onchange="myFunction(this.value)">
                                <option>No</option>
                                <option>SI</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <div class="input-group-text">N° Acciones </div>
                            <input id="acciones" type="text" class="form-control text-right"
                                   name="acciones" value="{{ old('acciones', number_format( $socios->acciones,0,'','')) }}">
                        </div>
                    </div>
                </div>
              </div>
                <div class="modal-footer">
                    <a href="{{ route('listasocios') }}"
                       class="btn btn-outline-dark btn-sm"><i class="fa fa-undo"></i> Regresar a lista de socios</a>
                    @if ($view == 'create')
                        <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-save"></i> Guardar  Socio</button>
                    @else
                        <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-save"></i> Modifica  Socio</button>
                    @endif

                </div>
        </div>

    </div>
</div>
<script>
document.getElementById('acciones').readOnly = true;
</script>