<div class="clearfix">
           <button type="button" class="btn btn-primary float-left">1 &nbsp;Total : <strong>  Activos, segùn Balance. </strong>
                    &nbsp;&nbsp;&nbsp;Còdigo 122 del recuadro 3 del formulario22</button>
           <input class="text-right" type="text" onchange="sumartot();"
                 id="activo" name="activo" value="{{ old('activo', number_format($capital->activo,0,'','')) }}" required >
</div>