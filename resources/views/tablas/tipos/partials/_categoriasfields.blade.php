<div class="modal fade " id="LocaModal" tabindex="-1" role="dialog" aria-labelledby="NoteModalLongTitle"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @if ($view == 'lista')
                     <h4 class="modal-title mt-3 ml-5" >lISTA no se usa</h4>
                @endif
                @if ($view == 'create')
                    <h4 class="modal-title mt-3 ml-5" >Agregar una Categoria</h4>
                @endif
                @if ($view == 'elimina')
                    <h4 class="modal-title mt-3 ml-5" >Elimina  Categoria</h4>
                @endif
                @if ($view == 'edit')
                    <h4 class="modal-title mt-3 ml-5" >Modifica  Categoria</h4>
                @endif
            </div>
            @if ($view == 'edit')
                  <div class="modal-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend{{ $errors->has('name') ? ' has-error' : '' }}"></div>
                            <input type="text" name="name" class="form-control" value="{{ old('categorias',$categorias->name) }}" placeholder="Ciudad"  required>
                        </div>
                        @if ($errors->has('name'))
                            <span class="form-text text-danger">{{ $errors->first('name') }}</span>
                        @endif
                   </div>
               @endif
                    @if ($view == 'elimina')
                   <div class="modal-body">
                       <div class="alert alert-danger" role="alert">
                           <strong>{{$categorias->name}}</strong>
                       </div>
                        @if ($items==null)

                        @else
                           <p>Esta categoria tiene items, por lo que no se puede eliminar</p>
                        @endif
                   </div>

                @endif
                @if ($view == 'create')
                     <div class="modal-body">
                         <div class="input-group mb-3">
                            <div class="input-group-prepend{{ $errors->has('name') ? ' has-error' : '' }}"></div>
                               <input type="text" name="name" class="form-control"  placeholder="Categoria"  required>
                            </div>
                            @if ($errors->has('name'))
                                   <span class="form-text text-danger">{{ $errors->first('name') }}</span>
                             @endif
                     </div>
                @endif
               @if ($view == 'lista')

                @endif
              <div class="modal-footer">
                  @if ($view == 'lista')
                     <a href="{{ route('categorias') }}"  class="btn btn-outline-dark btn-sm"><i class="fa fa-undo"></i> Regresar</a>
                  @endif
                  @if ($view == 'create')
                      <a href="{{ route('categorias') }}"  class="btn btn-outline-dark btn-sm"><i class="fa fa-undo"></i> Regresar</a>
                      <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-save"></i> Guardar  Categoria</button>
                 @endif
                  @if ($view == 'elimina' and $items ===null)
                      <a href="{{ route('categorias') }}"  class="btn btn-outline-dark btn-sm"><i class="fa fa-undo"></i> Regresar</a>
                      <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-save"></i> Eliminar  Categoria</button>

                 @else
                     @if (isset($items) and $items !==null)
                             <a href="{{ route('categorias') }}"  class="btn btn-outline-dark btn-sm"><i class="fa fa-undo"></i> Regresar</a>
                      @endif

                  @endif
                 @if ($view == 'edit')
                      <a href="{{ route('categorias') }}"  class="btn btn-outline-dark btn-sm"><i class="fa fa-undo"></i> Regresar</a>
                      <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-save"></i> Modifica  Categoria</button>
                @endif
              </div>
        </div>
    </div>
</div>
