<div class="row mt-2">
    <div class="row  mt-2">
        <label for="input" class="col-6"><strong><h4>Total:  Capital Propio Tributario.</h4></strong></label>
            <div class="col-sm-3">
                <input id="capitaltri" type="number" min="0" step="1" class="form-control text-right"
                       name="capitaltri"  value="{{ old('capitaltri',number_format($valcapital->capitaltri,0,'','')) }}" readonly>
            </div>
            <div class="col-3">
                {{--<input id="cmanual" type="number" min="0.00" max="99.00" step="0.01" class="form-control text-right" onchange=""--}}
            </div>
        <label for="input" class="col-sm-7 col-form-label"><strong><h4>Correccion monetaria anual de Capital</h4></strong></label>
            <div class="col-sm-2">
                <input id="pranual" type="number" min="0.00" max="99.00" step="0.01" class="form-control text-right" onchange="multiplicacapi();"
                       name="pranual" value="{{ old('pranual', $valcapital->pranual) }}">
            </div>
            <div class="col-sm-3">
                <input id="revaloriza" type="number"  min="0.00" class="form-control text-right"
                       name="revaloriza" value="{{ old('revaloriza', $valcapital->revaloriza)}}">
            </div>
        <label for="input" class="col-sm-7 col-form-label"><strong><h4>Resultado del ejercicio {{$anomas}}</h4></strong></label>
            <div class="col-sm-2">
                {{--<input id="cmanual" type="number" min="0.00" max="99.00" step="0.01" class="form-control text-right" onchange=""--}}
            </div>
            <div class="col-sm-3">
                <input id="resultado" type="number" class="form-control text-right" onchange="sumaform();"
                       name="resultado" value="{{ old('resultado', $valcapital->resultado)}}">
            </div>
        <label for="input" class="col-sm-6 col-form-label"><strong><h4>Impto Renta pagado en: {{$anomas}}</h4></strong></label>
            <div class="col-sm-3">
                <input id="impto" type="number" class="form-control text-right"
                       name="impto" value="{{ old('impto', $valcapital->impto)}}">
            </div>
            <div class="col-sm-3">   </div>
        <label for="prinput" class="col-sm-7 col-form-label"><strong><h4>Correccion Monetaria del Impto Renta </h4></strong></label>
            <div class="col-sm-2">
               <input id="primpto" type="number" min="0.00" max="99.00" step="0.01" class="form-control text-right" onchange="multiplicaimpto();"
                       name="primpto" value="{{ old('primpto', $valcapital->primpto) }}">
            </div>
            <div class="col-sm-3">
                <input id="revalimpto" type="number" class="form-control text-right"
                       name="revalimpto" value="{{ old('revalimpto', $valcapital->revalimpto)}}">
            </div>
        <label for="input" class="col-sm-7 col-form-label"><strong><h4>Retiros reajustados </h4></strong></label>
            <div class="col-sm-2">
            </div>
            <div class="col-sm-3">
                <input id="retiro" type="number" class="form-control text-right" onchange="sumaform();"
                       name="retiro" value="{{ old('retiro', $valcapital->retiro)}}">
            </div>
        <label for="input" class="col-sm-7 col-form-label"><strong><h4>Capital propio año siguiente </h4></strong></label>
            <div class="col-sm-2"></div>
            <div class="col-sm-3">
                <input id="capitalsgte" type="number" min="0.00" class="form-control text-right"
                       name="capitalsgte" value="{{ old('capitalsgte', $valcapital->capitalsgte)}}" readonly>
            </div>
    </div>
</div>
