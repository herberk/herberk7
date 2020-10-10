@extends('layouts.app')

@section('title', 'Socios')

@section('content')
    <div class="d-flex justify-content-between align-items-end">
        <h2 class="pb-1"> <i class="fas fa-building" style=color:#e4c40a></i>  {{ trans("trans.titlesoc.{$view}") }}</h2>
        <p>
            @if ($view == 'index')
                <a href="{{ route('socioexcel') }}" class="btn btn-sm  btn-outline-success"><i class="fas fa-file-excel"></i> Exportar Xls </a>
                <a href="{{ route('socios.trashed') }}" class="btn btn-outline-dark">Ver papelera</a>
                <a href="{{ route('socioscreate') }}" class="btn btn-dark" >Nuevo Socio</a>
            @else
                <a href="{{ route('listasocios') }}" class="btn btn-outline-dark">Regresar al listado de socios</a>
            @endif
        </p>
   </div>
  @if ($socios->isNotEmpty())
    @include('empresas.socios.partials.tablesocio')
  @else
      <p>No hay socios registrados.</p>
  @endif
{{--    <div class="card-footer small text-muted">Actualizado el: {{ $date }}</div>--}}
@endsection

