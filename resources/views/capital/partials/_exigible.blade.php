<div class="card-body">
    <table class="table table-sm table-bordered ">
        <tr>
            <td>5.1.</td>
            <td><strong>Pasivos Exigibles.</strong></td>
            <td> </td>
            <td><input id="pasivo51" type="text" class="form-control text-right"
                       name="pasivo51" value="{{ old('pasivo51',number_format($capital->pasivo51,0,'','')) }}"> </td>
            <td> = </td>
        </tr>
        <tr>
            <td>5.1.1</td>
            <td>	Proveedores Nacionales.</td>
            <td> <input id="pasivoexigi1" type="number" class="form-control text-right"  onchange="sumarpasivo();"
                        name="pasivoexigi1" value="{{ old('pasivoexigi1',number_format($capital->pasivoexigi1,0,'','')) }}"></td>
            <td> </td>  <td> - </td>
        </tr>
        <tr>
            <td>5.1.2</td>
            <td>	Proveedores Extranjeros.</td>
            <td> <input id="pasivoexigi2" type="number" class="form-control text-right" onchange="sumarpasivo();"
                        name="pasivoexigi2" value="{{ old('pasivoexigi2',number_format($capital->pasivoexigi2,0,'','')) }}"></td>
            <td> </td>  <td> - </td>
        </tr>
        <tr>
            <td>5.1.3</td>
            <td>Acreedores Nacionales</td>
            <td> <input id="pasivoexigi3" type="number" class="form-control text-right" onchange="sumarpasivo();"
                        name="pasivoexigi3" value="{{ old('pasivoexigi3',number_format($capital->pasivoexigi3,0,'','')) }}"></td>
            <td> </td>  <td> - </td>
        </tr>
        <tr>
            <td>5.1.4</td>
            <td>Acreedores Extranjeros</td>
            <td> <input id="pasivoexigi4" type="number" class="form-control text-right" onchange="sumarpasivo();"
                        name="pasivoexigi4" value="{{ old('pasivoexigi4',number_format($capital->pasivoexigi4,0,'','')) }}"></td>
            <td> </td>  <td> - </td>
        </tr>
        <tr>
            <td>5.1.5</td>
            <td>Cuentas por Pagar</td>
            <td> <input id="pasivoexigi5" type="number" class="form-control text-right" onchange="sumarpasivo();"
                        name="pasivoexigi5" value="{{ old('pasivoexigi5',number_format($capital->pasivoexigi5,0,'','')) }}"></td>
            <td> </td>  <td> - </td>
        </tr>
        <tr>
            <td>5.1.6</td>
            <td>Documentos por Pagar</td>
            <td> <input id="pasivoexigi6" type="number" class="form-control text-right" onchange="sumarpasivo();"
                        name="pasivoexigi6" value="{{ old('pasivoexigi6',number_format($capital->pasivoexigi6,0,'','')) }}"></td>
            <td> </td>  <td> - </td>
        </tr>
        <tr>
            <td>5.1.7</td>
            <td>Préstamos por Pagar </td>
            <td> <input id="pasivoexigi7" type="number" class="form-control text-right" onchange="sumarpasivo();"
                        name="pasivoexigi7" value="{{ old('pasivoexigi7',number_format($capital->pasivoexigi7,0,'','')) }}"></td>
            <td> </td>  <td> - </td>
        </tr>

        <tr>
            <td>5.1.8</td>
            <td>Remuneraciones y Honorarios por Pagar</td>
            <td> <input id="pasivoexigi8" type="number" class="form-control text-right" onchange="sumarpasivo();"
                        name="pasivoexigi8" value="{{ old('pasivoexigi8',number_format($capital->pasivoexigi8,0,'','')) }}"></td>
            <td> </td>  <td> - </td>
        </tr>


        <tr>
            <td>5.1.9</td>
            <td>Leyes Sociales por Pagar</td>
            <td> <input id="pasivoexigi9" type="number" class="form-control text-right" onchange="sumarpasivo();"
                        name="pasivoexigi9" value="{{ old('pasivoexigi9',number_format($capital->pasivoexigi9,0,'','')) }}"></td>
            <td> </td>  <td> - </td>
        </tr>
        <tr>
            <td>5.1.10</td>
            <td>IVA por Pagar</td>
            <td> <input id="pasivoexigi10" type="number" class="form-control text-right" onchange="sumarpasivo();"
                        name="pasivoexigi10" value="{{ old('pasivoexigi10',number_format($capital->pasivoexigi10,0,'','')) }}"></td>
            <td> </td>  <td> - </td>
        </tr>
        <tr>
            <td>5.1.11</td>
            <td>PPM por Pagar</td>
            <td> <input id="pasivoexigi11" type="number" class="form-control text-right" onchange="sumarpasivo();"
                        name="pasivoexigi11" value="{{ old('pasivoexigi11',number_format($capital->pasivoexigi11,0,'','')) }}"></td>
            <td> </td>  <td> - </td>
        </tr>
        <tr>
            <td>5.1.12</td>
            <td>Retenciones por pagar</td>
            <td> <input id="pasivoexigi12" type="number" class="form-control text-right" onchange="sumarpasivo();"
                        name="pasivoexigi12" value="{{ old('pasivoexigi12',number_format($capital->pasivoexigi12,0,'','')) }}"></td>
            <td> </td>  <td> - </td>
        </tr>
        <tr>
            <td>5.1.13</td>
            <td>	Otras partidas.</td>
            <td> <input id="pasivoexigi13" type="number" class="form-control text-right" onchange="sumarpasivo();"
                        name="pasivoexigi13" value="{{ old('pasivoexigi13',number_format($capital->pasivoexigi13,0,'','')) }}"></td>
            <td> </td>  <td> - </td>
        </tr>
    </table>
</div>
