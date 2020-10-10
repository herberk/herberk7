@extends('layouts.app')

@section('title', 'Contactos')

@section('content')
    <div class="d-flex justify-content-between align-items-end">
        <h2 class="pb-1">  <i class="fas fa-building" style=color:#e4c40a></i> {{ trans("trans.titlecon.{$view}") }}</h2>
        <p>
            @if ($view == 'index')
                <a href="{{ route('contactoexcel') }}" class="btn btn-sm  btn-outline-success"><i class="fas fa-file-excel"></i> Exportar Xls </a>
                <a href="{{ route('contactos.trashed') }}" class="btn btn-outline-dark">Ver papelera</a>
                <a href="{{ route('contactocreate') }}" class="btn btn-dark" >Nuevo Contacto</a>
            @else
                <a href="{{ route('listacontactos') }}" class="btn btn-outline-dark">Regresar al listado de Contactos</a>
            @endif
        </p>
   </div>
  @if ($contactos->isNotEmpty())
    @include('empresas.contactos.partials.tablecontactos')
  @else
      <p>No hay contacos registrados.</p>
  @endif

@endsection

