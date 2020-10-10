@extends('layouts.app')

@section('title', 'Directorios de archivos')

@section('content')
<div class="d-flex justify-content-between align-items-end">
    <h2 class="pb-1"> <i class="fas fa-archive" style=color:#80202b></i>&nbsp; Lista de empresas y sus directorios</h2>
    <p>
        @if ($view == 'index')
            <a href="{{ route('home') }}" class="btn btn-sm  btn-outline-success"><i class="fas fa-file-excel"></i> Exportar Xls </a>
            <a href="{{ route('directcreate') }}" class="btn btn-dark" >Nuevo Directorio</a>
        @else
{{--        <a href="{{ route('listasocios') }}" class="btn btn-outline-dark">Regresar al listado de socios</a>--}}
        @endif
    </p>
</div>
@if ($categoris->isNotEmpty())
@include('archivos.partials.tablacategoria')
@else
<strong>No hay directorios registrados.</strong>
@endif

@endsection


