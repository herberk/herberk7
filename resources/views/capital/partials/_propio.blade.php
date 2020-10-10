{{--<div class="clearfix">
    <div class="btn btn-primary">6 &nbsp;Total: <strong> Capital Propio Tributario. </strong>
        &nbsp;&nbsp;&nbsp; Còdigo 645 o 6 del recuadro 4 del formulario 22</div>
    <input  class="text-right" id="propio" type="text"
            name="propio" value="{{ old('propio',number_format($capital->propio,0,'','')) }}" readonly>
</div>--}}
<div class="row  mt-2">
    <label for="input" class="col-4"><strong><h4>6 &nbsp;Total:  Capital Propio Tributario.</h4></strong></label>
    <div class="col-4 mt-2">
        <p>Còdigo 645 o 6 del recuadro 4 del formulario 22</p>
    </div>
    <div class="col-1">
    </div>
    <div class="col-3">
        <input id="propio" type="number" min="0" step="1" class="form-control text-right"
               name="propio"  value="{{ old('propio',number_format($capital->propio,0,'','')) }}" readonly>
    </div>
</div>