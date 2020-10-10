@extends('layouts.app')
@section('title', 'Bancos')
@section('content')
    <div class="d-flex justify-content-between align-items-end">

        <h2 class="pb-1"> <i class="fas fa-building" style=color:#e4c40a></i>  {{ trans("trans.titleban.{$view}") }}</h2>
        <p>
            @if ($view == 'index')
                <a href="{{ route('bancoexcel') }}" class="btn btn-sm  btn-outline-success"><i class="fas fa-file-excel"></i> Exportar Xls </a>
                <a href="{{ route('bancos.trashed') }}" class="btn btn-outline-dark">Ver papelera</a>
                <a href="{{ route('bancoscreate') }}" class="btn btn-dark" >Nuevo Banco</a>
            @else
                <a href="{{ route('bancosindex') }}" class="btn btn-outline-dark">Regresar al listado de Bancos</a>
            @endif
        </p>
    </div>
    @if ($bancos->isNotEmpty())
        @include('empresas.bancos.partials.tablebanco')
    @else
        <p>No hay bancos registrados.</p>
    @endif
    {{--    <div class="card-footer small text-muted">Actualizado el: {{ $date }}</div>--}}
@endsection
