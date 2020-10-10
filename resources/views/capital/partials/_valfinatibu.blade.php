<div class="card-body">
    <table class="table table-sm table-bordered ">
        <tr>
            <td>3.1.</td>
            <td><strong>Menos Partidas a valores Financieros.</strong></td>
            <td> </td>
            <td><input id="valfinanciero31" type="number" class="form-control text-right"
                       name="valfinanciero31" value="{{ old('valfinanciero31',number_format($capital->valfinanciero31,0,'','')) }}"> </td>
            <td> = </td>
        </tr>
        <tr>
            <td>3.1.1</td>
            <td>Inversiones en Fondos Mutuos, Acciones y otros valores negociables (a valor financiero)</td>
            <td> <input id="valfinanciero1" type="number" class="form-control text-right" onchange="sumarvalor();"
                        name="valfinanciero1" value="{{ old('valfinanciero1',number_format($capital->valfinanciero1,0,'','')) }}"></td>
            <td> </td>  <td> - </td>
        </tr>
        <tr>
            <td>3.1.2</td>
            <td>Inversiones en otras sociedades (a valor financiero)</td>
            <td> <input id="valfinanciero2" type="number" class="form-control text-right" onchange="sumarvalor();"
                        name="valfinanciero2" value="{{ old('valfinanciero2',number_format($capital->valfinanciero2,0,'','')) }}"></td>
            <td> </td>  <td> - </td>
        </tr>
        <tr>
            <td>3.1.3</td>
            <td>Clientes (a valor financiero)</td>
            <td> <input id="valfinanciero3" type="number" class="form-control text-right" onchange="sumarvalor();"
                        name="valfinanciero3" value="{{ old('valfinanciero3',number_format($capital->valfinanciero3,0,'','')) }}"></td>
            <td> </td>  <td> - </td>
        </tr>
        <tr>
            <td>3.1.4</td>
            <td>Existencias (a valor financiero)</td>
            <td> <input id="valfinanciero4" type="number" class="form-control text-right" onchange="sumarvalor();"
                        name="valfinanciero4" value="{{ old('valfinanciero4',number_format($capital->valfinanciero4,0,'','')) }}"></td>
            <td> </td>  <td> - </td>
        </tr>
        <tr>
            <td>3.1.5</td>
            <td>Activo Fijo Bruto (a valor financiero)</td>
            <td> <input id="valfinanciero5" type="number" class="form-control text-right" onchange="sumarvalor();"
                        name="valfinanciero5" value="{{ old('valfinanciero5',number_format($capital->valfinanciero5,0,'','')) }}"></td>
            <td> </td>  <td> - </td>
        </tr>
        <tr>
            <td>3.1.6</td>
            <td>Intangibles que representen inversión efectiva (a valor financiero)</td>
            <td> <input id="valfinanciero6" type="number" class="form-control text-right" onchange="sumarvalor();"
                        name="valfinanciero6" value="{{ old('valfinanciero6',number_format($capital->valfinanciero6,0,'','')) }}"></td>
            <td> </td>  <td> - </td>
        </tr>
        <tr>
            <td>3.1.7</td>
            <td>Inversión en Empresa Relacionada (a valor financiero)</td>
            <td> <input id="valfinanciero7" type="number" class="form-control text-right" onchange="sumarvalor();"
                        name="valfinanciero7" value="{{ old('valfinanciero7',number_format($capital->valfinanciero7,0,'','')) }}"></td>
            <td> </td>  <td> - </td>
        </tr>
        <tr>
            <td>3.1.8</td>
            <td>Activos en Leasing</td>
            <td> <input id="valfinanciero8" type="number" class="form-control text-right" onchange="sumarvalor();"
                        name="valfinanciero8" value="{{ old('valfinanciero8',number_format($capital->valfinanciero8,0,'','')) }}"></td>
            <td> </td>  <td> - </td>
        </tr>
        <tr>
            <td>3.1.9</td>
            <td>Otras partidas (a valor financiero)</td>
            <td> <input id="valfinanciero9" type="number" class="form-control text-right" onchange="sumarvalor();"
                        name="valfinanciero9" value="{{ old('valfinanciero9',number_format($capital->valfinanciero9,0,'','')) }}"></td>
            <td> </td>  <td> - </td>
        </tr>

        <tr>
            <td>3.2.</td>
            <td><strong>Más Partidas a valores Tributarios.</strong></td>
            <td> </td>
            <td><input id="valtributario32" type="number" class="form-control text-right"
                       name="valtributario32" value="{{ old('valtributario32',number_format($capital->valtributario32,0,'','')) }}"> </td>
            <td> = </td>
        </tr>
        <tr>
            <td>3.2.1</td>
            <td>Inversiones en Fondos Mutuos, Acciones y otros valores negociables (a valor tributario)</td>
            <td> <input id="valtributario1" type="number" class="form-control text-right" onchange="sumarvalor();"
                        name="valtributario1" value="{{ old('valtributario1',number_format($capital->valtributario1,0,'','')) }}"></td>
            <td> </td>  <td> + </td>
        </tr>
        <tr>
            <td>3.2.2</td>
            <td>Inversiones en otras sociedades (a valor tributario)</td>
            <td> <input id="valtributario2" type="number" class="form-control text-right" onchange="sumarvalor();"
                        name="valtributario2" value="{{ old('valtributario2',number_format($capital->valtributario2,0,'','')) }}"></td>
            <td> </td>  <td> + </td>
        </tr>
        <tr>
            <td>3.2.3</td>
            <td>Clientes (a valor tributario)</td>
            <td> <input id="valtributario3" type="number" class="form-control text-right" onchange="sumarvalor();"
                        name="valtributario3" value="{{ old('valtributario3',number_format($capital->valtributario3,0,'','')) }}"></td>
            <td> </td>  <td> + </td>
        </tr>
        <tr>
            <td>3.2.4</td>
            <td>Existencias (a valor tributario)</td>
            <td> <input id="valtributario4" type="number" class="form-control text-right" onchange="sumarvalor();"
                        name="valtributario4" value="{{ old('valtributario4',number_format($capital->valtributario4,0,'','')) }}"></td>
            <td> </td>  <td> + </td>
        </tr>
        <tr>
            <td>3.2.5</td>
            <td>Activo Fijo Bruto (a valor tributario)</td>
            <td> <input id="valtributario5" type="number" class="form-control text-right" onchange="sumarvalor();"
                        name="valtributario5" value="{{ old('valtributario5',number_format($capital->valtributario5,0,'','')) }}"></td>
            <td> </td>  <td> + </td>
        </tr>
        <tr>
            <td>3.2.6</td>
            <td>Intangibles que representen inversión efectiva (a valor tributario)</td>
            <td> <input id="valtributario6" type="number" class="form-control text-right" onchange="sumarvalor();"
                        name="valtributario6" value="{{ old('valtributario6',number_format($capital->valtributario6,0,'','')) }}"></td>
            <td> </td>  <td> + </td>
        </tr>
        <tr>
            <td>3.2.7</td>
            <td>Inversión en Empresa Relacionada (a valor tributario)</td>
            <td> <input id="valtributario7" type="number" class="form-control text-right" onchange="sumarvalor();"
                        name="valtributario7" value="{{ old('valtributario7',number_format($capital->valtributario7,0,'','')) }}"></td>
            <td> </td>  <td> + </td>
        </tr>
        <tr>
            <td>3.2.8</td>
            <td>Otras partidas (a valor tributario)</td>
            <td> <input id="valtributario8" type="number" class="form-control text-right" onchange="sumarvalor();"
                        name="valtributario8" value="{{ old('valtributario8',number_format($capital->valtributario8,0,'','')) }}"></td>
            <td> </td>  <td> + </td>
        </tr>
    </table>
</div>
