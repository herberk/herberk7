<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Ver Usuario</title>

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
<h3  Align="center"><strong>Nombre</strong> : {{ $user->name }}</h3>
<br>
<img class="rounded-circle" src="/storage/logos/{{ $user->avatar }}" width="150" height="150" />
@include('users.partials._showfields')

