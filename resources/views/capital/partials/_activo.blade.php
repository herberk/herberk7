<div class="row  mt-2">
  <label for="input" class="col-4"><strong><h4>1 Activos, segun Balance</h4></strong></label>
  <div class="col-4 mt-2">
    <p>Còdigo 122 del recuadro 3 del formulario22</p>
   <input type="hidden" class="form-control text-right" name="id_empresa" value="{{setting('id_empresa')}}">
  </div>
    <div class="col-1">
      <input type="hidden" class="form-control text-right" name="id_empresa" value="{{setting('id_empresa')}}">
      <input type="hidden" class="form-control text-right" name="ano" value="{{setting('ano')}}">
    </div>
    <div class="col-3">
        <input id="activo" type="number" min="0" step="1" class="form-control text-right" onchange="sumartot();"
               name="activo" value="{{ old('activo', number_format($capital->activo,0,'','')) }}" required >
    </div>
</div>