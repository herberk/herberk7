<div class="modal fade " id="NoteModalLong" tabindex="-1" role="dialog" aria-labelledby="NoteModalLongTitle"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            @if ($view == 'create')
                <h4 class="modal-title mt-3 ml-5" >Nuevo Banco</h4>
            @else
                <h4 class="modal-title mt-3 ml-5" >Edita Banco: {{$bancos->name}} </h4>
            @endif

            <div class="modal-body">
           {{--   primera linea--}}
                <div class="form-row ">
                    <div class="col-sm-5">
                        <div class="input-group mb-1">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Empresa</div>
                            </div>
                                <select  class="custom-select" name="empresa_id" >
                                    @foreach ($empresas as $empresa)
                                        <option value="{{ $empresa->id}}"{{ old('empresa_id', $bancos->empresas_id) == $empresa->id ? ' selected' : '' }}> {{ $empresa->name_corto}}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="input-group mb-1">
                            <div class="input-group-prepend{{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="input-group-text">Nombre del banco</div>
                            </div>
                            <input type="text" class="form-control" placeholder="Nombre del banco"
                                   name="name" value="{{ old('name',$bancos->name) }}" required>
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
                            <div class="input-group-prepend{{ $errors->has('ctacte') ? ' has-error' : '' }}">
                                <div class="input-group-text">Nª de Cuenta Corriente</div>
                            </div>
                            <input id="ctacte" type="text" class="form-control" placeholder="Nª de Cuenta Corriente"
                                   name="ctacte" value="{{ old('ctacte',$bancos->ctacte) }}" required>
                            @if ($errors->has('ctacte'))
                                <span class="form-text text-danger">{{ $errors->first('ctacte') }}</span>
                            @endif
                        </div>
                    </div>
                     <div class="col-sm-6">
                           <div class="input-group mb-1">
                               <div class="input-group-prepend">
                                   <div class="input-group-text">Linea de crèdito</div>
                               </div>
                               <input id="montoLin" type="text" class="form-control text-right" name="montoLin"
                                      value="{{ old('montoLin', number_format($bancos->montoLin,0,'','')) }}">
                            </div>
                     </div>
                </div>
{{--           Tercera linea--}}
                <div class="form-row mt-2 ">

                    <div class="col-sm-12">
                        <div class="input-group">
                            <div class="input-group-prepend{{ $errors->has('firman') ? ' has-error' : '' }}">
                                <div class="input-group-text">Personas que firman</div>
                            </div>
                            <input id="firman" type="text" class="form-control"
                                   name="firman" value="{{ old('firman',$bancos->firman) }}">
                        </div>
                        @if ($errors->has('firman'))
                            <span class="form-text text-danger">{{ $errors->first('firman') }}</span>
                        @endif
                    </div>

                 </div>
          {{--cuarta linea--}}
                <div class="form-row mt-2 ">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <div class="input-group-prepend{{ $errors->has('ruta') ? ' has-error' : '' }}">
                                <div class="input-group-text">Ruta www del banco</div>
                            </div>
                            <input id="ruta" type="text" class="form-control"
                                   name="ruta" value="{{ old('ruta',$bancos->ruta) }}">
                        </div>
                        @if ($errors->has('ruta'))
                            <span class="form-text text-danger">{{ $errors->first('ruta') }}</span>
                        @endif
                    </div>
                </div>
              </div>
                <div class="modal-footer">
                    <a href="{{ route('bancosindex') }}"
                       class="btn btn-outline-dark btn-sm"><i class="fa fa-undo"></i> Regresar a lista de Bancos</a>
                    @if ($view == 'create')
                        <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-save"></i> Guardar  BancO</button>
                    @else
                        <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-save"></i> Modifica  Banco</button>
                    @endif

                </div>
        </div>

    </div>
</div>
<script>
// document.getElementById('acciones').readOnly = true;
</script>