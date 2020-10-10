@extends('layouts.app')
@section('title', 'Lista de archivos')

@section('content')
    <div class="d-flex justify-content-between align-items-end">
            <h2 class="pb-1"> <i class="fas fa-archive" style=color:#80202b></i>&nbsp; Lista de archivos</h2>
        <p>
            @if ($view == 'index')
                <a href="{{ route('home') }}" class="btn btn-sm  btn-outline-success"><i class="fas fa-file-excel"></i> Exportar Xls </a>
                <a href="{{ route('filescreate') }}" class="btn btn-dark" >Subir Nuevo archivo</a>
            @else
                <a href="{{ route('listasocios') }}" class="btn btn-outline-dark">Regresar al listado de socios</a>
            @endif
        </p>
    </div>
    @if ($files->isNotEmpty())
        @include('archivos.partials.tablafiles')
    @else
        <strong>No hay archivos registrados.</strong>
    @endif
@endsection
@section('script')
    @include('archivos.partials.script_file')
@endsection