<div class="modal fade " id="LocaModal" tabindex="-1" role="dialog" aria-labelledby="NoteModalLongTitle"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @if ($view == 'createitem')
                        <h4 class="modal-title mt-3 ml-5" >Agregar un Item a:<br>
                      {{$lacate->name}}</h4>
                @endif
                    @if ($view == 'edititem')
                        <h4 class="modal-title mt-3 ml-5" >Modifica  Item de:<br>
                           {{$lacate->name}}</h4>
                    @endif
                    @if ($view == 'eliminaitem')
                        <h4 class="modal-title mt-3 ml-5" >Elimina Item de:<br>
                            {{$lacate->name}}</h4>
                    @endif
            </div>
           @if ($view == 'edititem')
                  <div class="modal-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend{{ $errors->has('name') ? ' has-error' : '' }}"></div>
                            <input type="text" name="name" class="form-control" value="{{ old('items',$items->name) }}" required>
                        </div>
                        @if ($errors->has('name'))
                            <span class="form-text text-danger">{{ $errors->first('name') }}</span>
                        @endif
                      <div class="input-group mb-3">
                          <div class="input-group-prepend{{ $errors->has('codigo') ? ' has-error' : '' }}"></div>
                          <input type="text" name="codigo" class="form-control" value="{{ old('items',$items->codigo) }}">
                      </div>
                      @if ($errors->has('codigo'))
                          <span class="form-text text-danger">{{ $errors->first('codigo') }}</span>
                      @endif
                      <input type="hidden" name="categoria_id" value="{{$lacate->id}}">
                   </div>
            @endif
           @if ($view == 'eliminaitem')
               <div class="modal-body">
                    <div class="alert alert-danger" role="alert">
                       <strong>{{$items->name}}</strong>
                    </div>
               </div>
            @endif
                @if ($view == 'createitem')
                     <div class="modal-body">
                         <div class="input-group mb-3">
                            <div class="input-group-prepend{{ $errors->has('name') ? ' has-error' : '' }}"></div>
                               <input type="text" name="name" class="form-control"  placeholder="Categoria"  required>
                            </div>
                            @if ($errors->has('name'))
                                   <span class="form-text text-danger">{{ $errors->first('name') }}</span>
                             @endif
                         <div class="input-group ">
                             <div class="input-group-prepend{{ $errors->has('codigo') ? ' has-error' : '' }}"></div>
                             <input type="text" name="codigo" class="form-control" placeholder="Codigo max. 10 Car.">
                         </div>
                         @if ($errors->has('codigo'))
                             <span class="form-text text-danger">{{ $errors->first('codigo') }}</span>
                         @endif
                         <input type="hidden" name="categoria_id" value="{{$lacate->id}}">
                     </div>
                @endif
              <div class="modal-footer">
                  @if ($view == 'createitem')
                      <a href="{{ route('categorias') }}"  class="btn btn-outline-dark btn-sm"><i class="fa fa-undo"></i> Regresar</a>
                      <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-save"></i> Guardar  Item</button>
                 @endif
              @if ($view == 'eliminaitem')
                      <a href="{{ route('categorias') }}"  class="btn btn-outline-dark btn-sm"><i class="fa fa-undo"></i> Regresar</a>
                      <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-save"></i> Eliminar  Item</button>
                  @endif
                 @if ($view == 'edititem')
                      <a href="{{ route('categorias') }}"  class="btn btn-outline-dark btn-sm"><i class="fa fa-undo"></i> Regresar</a>
                      <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-save"></i> Modifica  Item</button>
                @endif
              </div>
        </div>
    </div>
</div>
