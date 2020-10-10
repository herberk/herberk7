<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Empresa</title>
</head>
<style>
    html {
        margin: 0;
    }
    body {
        font-family: "Times New Roman", serif;
        margin: 35mm 8mm 2mm 18mm;
    }
</style>
<p Align="right">Fecha del Informe: {{ $date }}</p>
<h3  Align="center"><strong>Nombre</strong> : {{ $empresas->name }}</h3>
<br>
<img class="rounded-circle" src="/storage/logos/{{ $empresas->logo }}" />

@include('empresas.partials._showfields')

@include('empresas.partials._fieldsocios')
@include('empresas.partials._contacto')

