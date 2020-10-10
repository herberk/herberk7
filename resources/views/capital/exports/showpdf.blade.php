<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Capital propio</title>

</head>
<style>
    html {
        margin: 0;
    }
    body {
        font-family: "Times New Roman", serif;
        font-size: 12px;
        margin: 23mm 8mm 2mm 18mm;
    }
</style>

 <p Align="right">Fecha del Informe: {{ $date }}</p>
<h3 Align="center"><strong>DETERMINACIÓN DEL CAPITAL PROPIO TRIBUTARIO </strong></h3>
<h3 Align="center"><strong>Empresa: {{setting('company') }} &nbsp; {{ number_format(  $capital->ano,0,"","") }} </strong></h3>


<table>
    <tr>
        <td></td>
        <td> <p Align="center" ><strong><u> Mètodo, activos menos pasivos a valor Tributario.</u></strong> </p></td>
    </tr>
    <tr>
        <td style="width: 10px">1</td>
        <td style="width: 500px"><strong>Total de Activos.</strong>según Balance. Código 122 del Recuadro N° 3 del Form. 22:</td>
        <td style="width: 80px">{{ number_format($capital->ano,0,"","") }}</td>
        <td style="width: 80px;text-align:right">{{ $capital->activo}}</td>
        <td Align="right">+</td>
    </tr>
{{--    Valores INTO--}}
    <tr>
        <td style="width: 10px">2.1</td>
        <td style="width: 500px"><strong>Menos:Total Valores INTO,</strong> y otras complementarias que no representen inversiones efectivas.</td>
        <td style="width: 80px"></td>
        <td style="width: 80px;text-align:right">{{$capital->into21}}</td>
        <td Align="right">=</td>
    </tr>
    @if ($capital->into1<>0)
    <tr>
        <td style="width: 10px">2.1.1</td>
        <td style="width: 500px">Estimación de derechos de llaves, de marca, patentes, fórmulas</td>
        <td style="width: 80px;text-align:right">{{$capital->into1}}</td>
        <td style="width: 80px;text-align:right"></td>
        <td Align="right">-</td>

    </tr>
    @endif
    @if ($capital->into2<>0)
    <tr>
        <td style="width: 10px">2.1.2</td>
        <td style="width: 500px">Pérdidas de ejercicios anteriores</td>
        <td style="width: 80px;text-align:right">{{$capital->into2}}</td>
        <td style="width: 80px;text-align:right"></td>
        <td Align="right">-</td>
    </tr>
    @endif
    @if ($capital->into3<>0)
    <tr>
        <td style="width: 10px">2.1.3</td>
        <td style="width: 500px">Saldo deudor cuenta Particular</td>
        <td style="width: 80px;text-align:right">{{$capital->into3}}</td>
        <td style="width: 80px;text-align:right"></td>
        <td Align="right">-</td>
    </tr>
    @endif
   @if ($capital->into4>0)
    <tr>
        <td style="width: 10px">2.1.4</td>
        <td style="width: 500px">Cuenta obligada socio o aportes por enterar</td>
        <td style="width: 80px;text-align:right">{{$capital->into4}}</td>
        <td style="width: 80px;text-align:right"></td>
        <td Align="right">-</td>
    </tr>
    @endif
    @if ($capital->into5>0)
        <tr>
            <td style="width: 10px">2.1.5</td>
            <td style="width: 500px">Reserva por IFRS.</td>
            <td style="width: 80px;text-align:right">{{$capital->into5}}</td>
            <td style="width: 80px;text-align:right"></td>
            <td Align="right">-</td>
        </tr>
    @endif
    @if ($capital->into6>0)
        <tr>
            <td style="width: 10px">2.1.6</td>
            <td style="width: 500px">Dividendos Provisorios (sociedades anónimas y por acciones)</td>
            <td style="width: 80px;text-align:right">{{$capital->into6}}</td>
            <td style="width: 80px;text-align:right"></td>
            <td Align="right">-</td>
        </tr>
    @endif
    @if ($capital->into7>0)
        <tr>
            <td style="width: 10px">2.1.7</td>
            <td style="width: 500px">Acciones por Suscribir (sociedades anónimas y por acciones)</td>
            <td style="width: 80px;text-align:right">{{$capital->into7}}</td>
            <td style="width: 80px;text-align:right"></td>
            <td Align="right">-</td>
        </tr>
    @endif
    @if ($capital->into8>0)
        <tr>
            <td style="width: 10px">2.1.8</td>
            <td style="width: 500px">Acciones Suscritas por Cobrar (sociedades anónimas y por acciones)</td>
            <td style="width: 80px;text-align:right">{{$capital->into8}}</td>
            <td style="width: 80px;text-align:right"></td>
            <td Align="right">-</td>
        </tr>
    @endif
    @if ($capital->into9>0)
        <tr>
            <td style="width: 10px">2.1.9</td>
            <td style="width: 500px">Otras partidas.</td>
            <td style="width: 80px;text-align:right">{{$capital->into9}}</td>
            <td style="width: 80px;text-align:right"></td>
            <td Align="right">-</td>
        </tr>
    @endif
{{--Complementarias--}}
    <tr>
        <td style="width: 10px">2.2</td>
        <td style="width: 500px"><strong>Cuentas complementarias de activo</strong></td>
        <td style="width: 80px"></td>
        <td style="width: 80px;text-align:right">{{ $capital->into22}}</td>
        <td Align="right">=</td>
    </tr>
    @if ($capital->complementa1>0)
        <tr>
            <td style="width: 10px">2.2.1</td>
            <td style="width: 500px">Depreciación Acumulada (valor tributario)</td>
            <td style="width: 80px;text-align:right">{{$capital->complementa1}}</td>
            <td style="width: 80px;text-align:right"></td>
            <td Align="right">-</td>
        </tr>
    @endif
    @if ($capital->complementa2>0)
        <tr>
            <td style="width: 10px">2.2.2</td>
            <td style="width: 500px">Amortización Acumulada (valor tributario)</td>
            <td style="width: 80px;text-align:right">{{$capital->complementa2}}</td>
            <td style="width: 80px;text-align:right"></td>
            <td Align="right">-</td>
        </tr>
    @endif
    @if ($capital->complementa3>0)
        <tr>
            <td style="width: 10px">2.2.3</td>
            <td style="width: 500px">Otras partidas</td>
            <td style="width: 80px;text-align:right">{{$capital->complementa3}}</td>
            <td style="width: 80px;text-align:right"></td>
            <td Align="right">-</td>
        </tr>
    @endif
{{--Valores financiero y tributarios--}}
    <tr>
        <td style="width: 10px">3.1</td>
        <td style="width: 500px"><strong>Menos Partidas a valores Financieros</strong></td>
        <td style="width: 80px"></td>
        <td style="width: 80px;text-align:right">{{$capital->valfinanciero31}}</td>
        <td Align="right">=</td>
    </tr>
    @if ($capital->valfinanciero1>0)
        <tr>
            <td style="width: 10px">3.1.1</td>
            <td style="width: 500px">Inversiones en Fondos Mutuos, Acciones y otros valores negociables (a valor financiero)</td>
            <td style="width: 80px;text-align:right">{{$capital->valfinanciero}}</td>
            <td style="width: 80px;text-align:right"></td>
            <td Align="right">-</td>
        </tr>
    @endif
    @if ($capital->valfinanciero2>0)
        <tr>
            <td style="width: 10px">3.1.2</td>
            <td style="width: 500px">Inversiones en otras sociedades (a valor financiero)</td>
            <td style="width: 80px;text-align:right">{{$capital->valfinanciero2}}</td>
            <td style="width: 80px;text-align:right"></td>
            <td Align="right">-</td>
        </tr>
    @endif
    @if ($capital->valfinanciero3>0)
        <tr>
            <td style="width: 10px">3.1.3</td>
            <td style="width: 500px">Clientes (a valor financiero)</td>
            <td style="width: 80px;text-align:right">{{$capital->valfinanciero3}}</td>
            <td style="width: 80px;text-align:right"></td>
            <td Align="right">-</td>
        </tr>
    @endif
    @if ($capital->valfinanciero4>0)
        <tr>
            <td style="width: 10px">3.1.4</td>
            <td style="width: 500px">Existencias (a valor financiero)</td>
            <td style="width: 80px;text-align:right">{{$capital->valfinanciero4}}</td>
            <td style="width: 80px;text-align:right"></td>
            <td Align="right">-</td>
        </tr>
    @endif
    @if ($capital->valfinanciero5>0)
        <tr>
            <td style="width: 10px">3.1.5</td>
            <td style="width: 500px">Activo Fijo Bruto (a valor financiero)</td>
            <td style="width: 80px;text-align:right">{{$capital->valfinanciero5}}</td>
            <td style="width: 80px;text-align:right"></td>
            <td Align="right">-</td>
        </tr>
    @endif
    @if ($capital->valfinanciero6>0)
        <tr>
            <td style="width: 10px">3.1.6</td>
            <td style="width: 500px">Intangibles que representen inversión efectiva (a valor financiero)</td>
            <td style="width: 80px;text-align:right">{{$capital->valfinanciero6}}</td>
            <td style="width: 80px;text-align:right"></td>
            <td Align="right">-</td>
        </tr>
    @endif
    @if ($capital->valfinanciero7>0)
        <tr>
            <td style="width: 10px">3.1.7</td>
            <td style="width: 500px">Inversión en Empresa Relacionada (a valor financiero)</td>
            <td style="width: 80px;text-align:right">{{$capital->valfinanciero7}}</td>
            <td style="width: 80px;text-align:right"></td>
            <td Align="right">-</td>
        </tr>
    @endif
    @if ($capital->valfinanciero8>0)
        <tr>
            <td style="width: 10px">3.1.8</td>
            <td style="width: 500px">Activos en Leasing</td>
            <td style="width: 80px;text-align:right">{{$capital->valfinanciero8}}</td>
            <td style="width: 80px;text-align:right"></td>
            <td Align="right">-</td>
        </tr>
    @endif
    @if ($capital->valfinanciero9>0)
        <tr>
            <td style="width: 10px">3.1.9</td>
            <td style="width: 500px">Otras partidas (a valor financiero)</td>
            <td style="width: 80px;text-align:right">{{$capital->valfinanciero9}}</td>
            <td style="width: 80px;text-align:right"></td>
            <td Align="right">-</td>
        </tr>
    @endif

    <tr>
        <td style="width: 10px">3.2</td>
        <td style="width: 500px"><strong>Más Partidas a valores Tributarios.</strong></td>
        <td style="width: 80px"></td>
        <td style="width: 80px;text-align:right">{{$capital->valtributario32}}</td>
        <td Align="right">=</td>
    </tr>
    @if ($capital->valtributario1>0)
        <tr>
            <td style="width: 10px">3.2.1</td>
            <td style="width: 500px">Inversiones en Fondos Mutuos, Acciones y otros valores negociables (a valor tributario)</td>
            <td style="width: 80px;text-align:right">{{$capital->valtributario1}}</td>
            <td style="width: 80px;text-align:right"></td>
            <td Align="right">+</td>
        </tr>
    @endif
    @if ($capital->valtributario2>0)
        <tr>
            <td style="width: 10px">3.2.2</td>
            <td style="width: 500px">Inversiones en otras sociedades (a valor tributario)</td>
            <td style="width: 80px;text-align:right">{{$capital->valtributario2}}</td>
            <td style="width: 80px;text-align:right"></td>
            <td Align="right">+</td>
        </tr>
    @endif
    @if ($capital->valtributario3>0)
        <tr>
            <td style="width: 10px">3.2.3</td>
            <td style="width: 500px">Clientes (a valor tributario)</td>
            <td style="width: 80px;text-align:right">{{$capital->valtributario3}}</td>
            <td style="width: 80px;text-align:right"></td>
            <td Align="right">+</td>
        </tr>
    @endif
    @if ($capital->valtributario4>0)
        <tr>
            <td style="width: 10px">3.2.4</td>
            <td style="width: 500px">Existencias (a valor tributario)</td>
            <td style="width: 80px;text-align:right">{{$capital->valtributario4}}</td>
            <td style="width: 80px;text-align:right"></td>
            <td Align="right">+</td>
        </tr>
    @endif
    @if ($capital->valtributario5>0)
        <tr>
            <td style="width: 10px">3.2.5</td>
            <td style="width: 500px">Activo Fijo Bruto (a valor tributario)</td>
            <td style="width: 80px;text-align:right">{{$capital->valtributario5}}</td>
            <td style="width: 80px;text-align:right"></td>
            <td Align="right">+</td>
        </tr>
    @endif
    @if ($capital->valtributario6>0)
        <tr>
            <td style="width: 10px">3.2.6</td>
            <td style="width: 500px">Intangibles que representen inversión efectiva (a valor tributario)</td>
            <td style="width: 80px;text-align:right">{{$capital->valtributario6}}</td>
            <td style="width: 80px;text-align:right"></td>
            <td Align="right">+</td>
        </tr>
    @endif
    @if ($capital->valtributario7>0)
        <tr>
            <td style="width: 10px">3.2.7</td>
            <td style="width: 500px">Inversión en Empresa Relacionada (a valor tributario)</td>
            <td style="width: 80px;text-align:right">{{$capital->valtributario7}}</td>
            <td style="width: 80px;text-align:right"></td>
            <td Align="right">+</td>
        </tr>
    @endif
    @if ($capital->valtributario8>0)
        <tr>
            <td style="width: 10px">3.2.8</td>
            <td style="width: 500px">Otras partidas (a valor tributario)</td>
            <td style="width: 80px;text-align:right">{{$capital->valtributario8}}</td>
            <td style="width: 80px;text-align:right"></td>
            <td Align="right">+</td>
        </tr>
    @endif
<br>
{{--    Capital Efectivo--}}
    <tr>
        <td style="width: 10px">4</td>
        <td style="width: 500px"><strong>Sub Total: Captal Efectivo</strong>Código 102 del Recuadro N° 4 del Form. 22:</td>
        <td style="width: 80px;text-align:right"></td>
        <td style="width: 80px;text-align:right">{{$capital->activo+$capital->into21+$capital->into22+$capital->valfinanciero31+$capital->valtributario32}}</td>
        <td Align="right">=</td>
    </tr>

{{--Pasivo exigible--}}
    <tr>
        <td style="width: 10px">5.1</td>
        <td style="width: 500px"><strong>Menos: Total Pasivos Exigibles</strong></td>
        <td style="width: 80px"></td>
        <td style="width: 80px;text-align:right">{{$capital->pasivo51}}</td>
        <td Align="right">=</td>
    </tr>
    @if ($capital->pasivoexigi1<>0)
    <tr>
        <td style="width: 10px">5.1.1</td>
        <td style="width: 500px">Proveedores Nacionales</td>
        <td style="width: 80px;text-align:right">{{$capital->pasivoexigi1}}</td>
        <td style="width: 80px;text-align:right"></td>
        <td Align="right">-</td>
    </tr>
    @endif
    @if ($capital->pasivoexigi2<>0)
    <tr>
        <td style="width: 10px">5.1.2</td>
        <td style="width: 500px">Proveedores Extranjeros</td>
        <td style="width: 80px;text-align:right">{{$capital->pasivoexigi2}}</td>
        <td style="width: 80px;text-align:right"></td>
        <td Align="right">-</td>
    </tr>
    @endif
     @if ($capital->pasivoexigi3<>0)
    <tr>
        <td style="width: 10px">5.1.3</td>
        <td style="width: 500px">Acreedores Nacionales</td>
        <td style="width: 80px;text-align:right">{{$capital->pasivoexigi3}}</td>
        <td style="width: 80px;text-align:right"></td>
        <td Align="right">-</td>
    </tr>
    @endif
     @if ($capital->pasivoexigi4<>0)
    <tr>
        <td style="width: 10px">5.1.4</td>
        <td style="width: 500px">Acreedores Extranjeros</td>
        <td style="width: 80px;text-align:right">{{$capital->pasivoexigi4}}</td>
        <td style="width: 80px;text-align:right"></td>
        <td Align="right">-</td>
    </tr>
    @endif
    @if ($capital->pasivoexigi5<>0)
    <tr>
        <td style="width: 10px">5.1.5</td>
        <td style="width: 500px">Cuentas por Pagar</td>
        <td style="width: 80px;text-align:right">{{$capital->pasivoexigi5}}</td>
        <td style="width: 80px;text-align:right"></td>
        <td Align="right">-</td>
    </tr>
    @endif
    @if ($capital->pasivoexigi6<>0)
    <tr>
        <td style="width: 10px">5.1.6</td>
        <td style="width: 500px">Documentos por Pagar</td>
        <td style="width: 80px;text-align:right">{{$capital->pasivoexigi6}}</td>
        <td style="width: 80px;text-align:right"></td>
        <td Align="right">-</td>
    </tr>
    @endif
     @if ($capital->pasivoexigi7<>0)
    <tr>
        <td style="width: 10px">5.1.7</td>
        <td style="width: 500px">Préstamos por Pagar</td>
        <td style="width: 80px;text-align:right">{{$capital->pasivoexigi7}}</td>
        <td style="width: 80px;text-align:right"></td>
        <td Align="right">-</td>
    </tr>
    @endif
     @if ($capital->pasivoexigi8<>0)
    <tr>
        <td style="width: 10px">5.1.8</td>
        <td style="width: 500px">Remuneraciones y Honorarios por Pagar</td>
        <td style="width: 80px;text-align:right">{{$capital->pasivoexigi8}}</td>
        <td style="width: 80px;text-align:right"></td>
        <td Align="right">-</td>
    </tr>
    @endif
    @if ($capital->pasivoexigi9<>0)
    <tr>
        <td style="width: 10px">5.1.9</td>
        <td style="width: 500px">Leyes Sociales por Pagar</td>
        <td style="width: 80px;text-align:right">{{$capital->pasivoexigi9}}</td>
        <td style="width: 80px;text-align:right"></td>
        <td Align="right">-</td>
    </tr>
    @endif
     @if ($capital->pasivoexigi10<>0)
    <tr>
        <td style="width: 10px">5.1.10</td>
        <td style="width: 500px">IVA por Pagar</td>
        <td style="width: 80px;text-align:right">{{$capital->pasivoexigi10}}</td>
        <td style="width: 80px;text-align:right"></td>
        <td Align="right">-</td>
    </tr>
    @endif
    @if ($capital->pasivoexigi11<>0)
    <tr>
        <td style="width: 10px">5.1.11</td>
        <td style="width: 500px">PPM por Pagar</td>
        <td style="width: 80px;text-align:right">{{$capital->pasivoexigi11}}</td>
        <td style="width: 80px;text-align:right"></td>
        <td Align="right">-</td>
    </tr>
    @endif
    @if ($capital->pasivoexigi12<>0)
   <tr>
        <td style="width: 10px">5.1.12</td>
        <td style="width: 500px">Retenciones por pagar</td>
        <td style="width: 80px;text-align:right">{{$capital->pasivoexigi12}}</td>
        <td style="width: 80px;text-align:right"></td>
        <td Align="right">-</td>
    </tr>
    @endif
    @if ($capital->pasivoexigi13<>0)
    <tr>
        <td style="width: 10px">5.1.13</td>
        <td style="width: 500px">	Otras partidas</td>
        <td style="width: 80px;text-align:right">{{$capital->pasivoexigi13}}</td>
        <td style="width: 80px;text-align:right"></td>
        <td Align="right">-</td>
    </tr>
    @endif
    <br>
{{-- Capital propio tributario--}}
    <tr>
        <td style="width: 10px">6</td>
        <td style="width: 500px"><strong>Capital Propio Tributario.</strong>  Código 645 del Recuadro N°4 del Form. 22:</td>
        <td style="width: 80px"></td>
        <td style="width: 80px;text-align:right">{{$capital->capitaltri}}</td>
        <td Align="right">=</td>
    </tr>

</table>
@if ($valcapital)
    @include('capital.exports.showvalidpdf')
@endif
@if ($capital->notas !== '')
    @include('capital.exports.shownota')
@endif
