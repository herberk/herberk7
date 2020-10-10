<div class="card-body">
    <table class="table table-sm table-bordered ">
        <tr>
            <td>2.1.</td>
            <td><strong>Valores Intangibles, Nominales, Transitorios y de orden, y otros valores que no representen inversiones efectivas.</strong></td>
            <td> </td>
            <td><input id="into21" type="number" class="form-control text-right"
                       name="into21" value="{{ old('into21', number_format($capital->into21,0,'','.')) }}"> </td>
            <td> = </td>
        </tr>
        <tr>
            <td>2.1.1</td>
            <td>Estimación de derechos de llaves, de marca, patentes, fórmulas.</td>
            <td> <input id="into1" type="number" class="form-control text-right" onchange="sumarinto();"
                        name="into1" value="{{ old('into1', number_format($capital->into1,0,'','.')) }}"></td>
            <td></td>
            <td>-</td>
        </tr>
        <tr>
            <td>2.1.2</td>
            <td>	Pérdidas de ejercicios anteriores.</td>
            <td> <input id="into2" type="number" class="form-control text-right" onchange="sumarinto();"
                        name="into2" value="{{ old('into2',number_format($capital->into2,0,'','.')) }}"></td>
            <td></td>
            <td>-</td>
        </tr>
        <tr>
            <td>2.1.3</td>
            <td>Saldo deudor cuenta Particular.</td>
            <td> <input id="into3" type="number" class="form-control text-right" onchange="sumarinto();"
                        name="into3" value="{{ old('into3',number_format($capital->into3,0,'','')) }}"></td>
            <td></td>
            <td>-</td>
        </tr>
        <tr>
            <td>2.1.4</td>
            <td>Cuenta obligada socio o aportes por enterar.</td>
            <td> <input id="into4" type="number" class="form-control text-right"  onchange="sumarinto();"
                        name="into4" value="{{ old('into4',number_format($capital->into4,0,'','')) }}"></td>
            <td></td>
            <td>-</td>
        </tr>
        <tr>
            <td>2.1.5</td>
            <td>Reserva por IFRS.</td>
            <td> <input id="into5" type="number" class="form-control text-right"  onchange="sumarinto();"
                        name="into5" value="{{ old('into5',number_format($capital->into5,0,'',''))}}"></td>
            <td></td>
            <td>-</td>
        </tr>
        <tr>
            <td>2.1.6</td>
            <td>	Dividendos Provisorios (sociedades anónimas y por acciones).</td>
            <td> <input id="into6" type="number" class="form-control text-right"  onchange="sumarinto();"
                        name="into6" value="{{ old('into6',number_format($capital->into6,0,'','')) }}"></td>
            <td></td>
            <td>-</td>
        </tr>
        <tr>
            <td>2.1.7</td>
            <td>	Acciones por Suscribir (sociedades anónimas y por acciones).</td>
            <td> <input id="into7" type="number" class="form-control text-right"  onchange="sumarinto();"
                        name="into7" value="{{ old('into7',number_format($capital->into7,0,'',''))}}"></td>
            <td></td><td>-</td>

        </tr>
        <tr>
            <td>2.1.8</td>
            <td>	Acciones Suscritas por Cobrar (sociedades anónimas y por acciones).</td>
            <td> <input id="into8" type="number" class="form-control text-right"  onchange="sumarinto();"
                        name="into8" value="{{ old('into8',number_format($capital->into8,0,'',''))}}"></td>
            <td></td><td>-</td>
        </tr>
        <tr>
            <td>2.1.9</td>
            <td>	Otras partidas.</td>
            <td> <input id="into9" type="number" class="form-control text-right"  onchange="sumarinto();"
                        name="into9" value="{{ old('into9',number_format($capital->into9,0,'',''))}}"></td>
            <td></td><td>-</td>
        </tr>


        <tr>
            <td>2.2</td>
            <td><strong>Cuentas complementarias de activo</strong></td>
            <td></td>
            <td> <input id="into22" type="number" class="form-control text-right"
                        name="into22" value="{{ old('into22', number_format($capital->into22,0,'','.')) }}"></td>
            <td>=</td>
        </tr>
        <tr>
            <td>2.2.1</td>
            <td>	Depreciación Acumulada (valor tributario)</td>
            <td> <input id="complementa1" type="number" class="form-control text-right" onchange="sumarcomp();"
                        name="complementa1" value="{{ old('complementa1',number_format($capital->complementa1,0,'',''))}}"></td>
            <td></td><td>-</td>
        </tr>
        <tr>
            <td>2.2.2</td>
            <td>	Amortización Acumulada (valor tributario)</td>
            <td> <input id="complementa2" type="number" class="form-control text-right" onchange="sumarcomp();"
                        name="complementa2" value="{{ old('complementa2', number_format($capital->complementa2,0,'','')) }}"></td>
            <td></td><td>-</td>
        </tr>
        <tr>
            <td>2.2.3</td>
            <td>	Otras partidas.</td>
            <td> <input id="complementa3" type="number" class="form-control text-right" onchange="sumarcomp();"
                        name="complementa3" value="{{ old('complementa3', number_format($capital->complementa3,0,'','')) }}"></td>
            <td></td><td>-</td>
        </tr>
    </table>
</div>