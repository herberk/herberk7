
<table>
    <tr>
        <td></td>
        <td> <p Align="center"> <strong><u>Validacion del capital propio con datos finales ejercicio anterior.</u></strong> </p></td>
    </tr>
    <tr>
        <td style="width: 10px">-</td>
        <td style="width: 500px"><strong>Capital tributario Inicial.</strong></td>
        <td style="width: 80px">{{ number_format($valcapital->ano,0,"","") }}</td>
        <td style="width: 80px; text-align:right">{{ $valcapital->capitaltri}}</td>
        <td Align="right">+</td>
    </tr>
    <tr>
        <td style="width: 10px">-</td>
        <td style="width: 500px">Correccion anual, de capital inicial.</td>
        <td style="width: 80px; text-align:right">{{ number_format($valcapital->pranual,2,"","") }}</td>
        <td style="width: 80px;text-align:right">{{$valcapital->revaloriza}}</td>
        <td Align="right">+</td>
    </tr>
    <tr>
        <td style="width: 10px">-</td>
        <td style="width: 500px">Resultado de ejercicio. Positivo o negativo</td>
        <td style="width: 80px">{{ number_format($valcapital->ano+1,0,"","") }}</td>
        <td style="width: 80px;text-align:right">{{$valcapital->resultado}}</td>
        <td Align="right">+</td>
    </tr>
    <tr>
        <td style="width: 10px">-</td>
        <td style="width: 500px">Correccion Impto. Renta. Desde mes de pago</td>
        <td style="width: 80px; text-align:right">{{ number_format($valcapital->primpto,2,"","") }}</td>
        <td style="width: 80px;text-align:right">{{$valcapital->revalimpto}}</td>
        <td Align="right">+</td>
    </tr>
    <tr>
        <td style="width: 10px">-</td>
        <td style="width: 500px">Retiros o disminuciones del capital, corregidos.</td>
        <td style="width: 80px"></td>
        <td style="width: 80px;text-align:right">{{$valcapital->retiro}}</td>
        <td Align="right">+</td>
    </tr>
    <tr>
        <td style="width: 10px">-</td>
        <td style="width: 500px"><strong>Capital Propio Final.</strong></td>
        <td style="width: 80px"></td>
        <td style="width: 80px;text-align:right">{{$valcapital->capitalsgte}}</td>
        <td Align="right">+</td>
    </tr>
</table>

