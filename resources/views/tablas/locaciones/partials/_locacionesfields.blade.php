<div class="modal fade " id="LocaModal" tabindex="-1" role="dialog" aria-labelledby="NoteModalLongTitle"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
                  @if ($view == 'edit')
                    <div class="modal-header">
                        <h4 class="modal-title mt-3 ml-5" >Modifica Ciudad</h4>
                    </div>
                        <div class="modal-body">

                            <div class="input-group mb-3">
                                <div class="input-group-prepend{{ $errors->has('name') ? ' has-error' : '' }}"></div>
                                <input type="text" name="name" class="form-control" value="{{ old('ciudades',$ciudades->name) }}" placeholder="Ciudad"  required>
                            </div>
                            @if ($errors->has('name'))
                                <span class="form-text text-danger">{{ $errors->first('name') }}</span>
                            @endif

                            <div class="input-group ">
                                <div class="input-group-prepend{{ $errors->has('codigo') ? ' has-error' : '' }}"></div>
                                <input type="text" name="codigo" class="form-control"  value="{{ old('ciudades',$ciudades->codigo) }}" placeholder="Codigo max. 5 Car.">
                            </div>
                            @if ($errors->has('codigo'))
                                <span class="form-text text-danger">{{ $errors->first('codigo') }}</span>
                            @endif

                        </div>


                <div class="modal-footer">
                        <a href="{{ route('locaciones') }}"  class="btn btn-outline-dark btn-sm"><i class="fa fa-undo"></i> Regresar</a>
                        <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-save"></i> Modifica  Ciudad</button>
                    </div>
               @endif

                @if ($view == 'elimina')
                <div class="modal-header">
                    <h4 class="modal-title mt-3 ml-5" >Elimina Ciudad</h4>
                </div>
                     <div class="modal-body">
                        <div class="alert alert-danger" role="alert">
                           <strong>{{$ciudades->name}}</strong>
                        </div>
                      </div>
                <div class="modal-footer">
                    <a href="{{ route('locaciones') }}"  class="btn btn-outline-dark btn-sm"><i class="fa fa-undo"></i> Regresar</a>
                    <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-save"></i> Eliminar  Ciudad</button>
                </div>
                @endif
                @if ($view == 'create')
               <div class="modal-header">
                    <h4 class="modal-title mt-3 ml-5" >Nueva Ciudad</h4>
               </div>
                  <div class="modal-body">

                            <div class="input-group mb-3">
                                <div class="input-group-prepend{{ $errors->has('name') ? ' has-error' : '' }}"></div>
                                   <input type="text" name="name" class="form-control"  placeholder="Ciudad"  required>
                                </div>
                                @if ($errors->has('name'))
                                       <span class="form-text text-danger">{{ $errors->first('name') }}</span>
                                 @endif


                              <div class="input-group ">
                                  <div class="input-group-prepend{{ $errors->has('codigo') ? ' has-error' : '' }}"></div>
                                 <input type="text" name="codigo" class="form-control" placeholder="Codigo max. 5 Car.">
                                 </div>
                                @if ($errors->has('codigo'))
                                    <span class="form-text text-danger">{{ $errors->first('codigo') }}</span>
                                @endif

                   </div>

                        <div class="modal-footer">
                            <a href="{{ route('locaciones') }}"  class="btn btn-outline-dark btn-sm"><i class="fa fa-undo"></i> Regresar</a>
                            <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-save"></i> Guardar  Ciudad</button>
                        </div>
                @endif
               @if ($view == 'lista')
                          <div class="modal-header">
                              <h4 class="modal-title mt-3 ml-5" >Lista de Comunas de:{{$region}}</h4>
                          </div>
                          <div class="modal-body">

                              @foreach($comunas as $comuna)
                                  <ul class="list-inline">
                                      <li class="list-inline-item">{{ $comuna->name }}</li>
                                  </ul>
                              @endforeach
                          </div>
                          <div class="modal-footer">
                              <a href="{{ route('locaciones') }}"  class="btn btn-outline-dark btn-sm"><i class="fa fa-undo"></i> Regresar</a>
                          </div>
                @endif
        </div>
    </div>
</div>
