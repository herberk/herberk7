@extends('layouts.app')
@section('title', "{$empresas->name}")
@section('content')
<div class="card card">
    <div class="card-header">
        <div class="clearfix">
            <div class="Display4 float-left"></div>
                <h4><i class="fas fa-building" style=color:#e4c40a></i><strong>Nombre</strong>: {{ $empresas->name }}</h4>
         </div>
            @if (Session::has('message'))
                <p class="alert alert-success">{{ Session::get('message')}}</p>
            @endif
     </div>
      <div class="row">
            @include('empresas.partials._showfields')
       </div>
    <div class="text-center my-2">
        <div class="btn-group">
            <a href="{{ route('empresaindex') }}"
               class="btn btn-outline-dark btn-sm"><i class="fa fa-undo"></i> Regresar a lista de empresas</a>
            <button type="button" class="btn btn-outline-success dropdown-toggle" data-toggle="dropdown">
                <i class="fas fa-file-pdf"></i> Exportar a PDF </button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <a class="dropdown-item" href="{{ route('empresaexports',[$empresas->id,$pd='1'])}}"><i class="fas fa-download">Descargar Pdf</i></a>
                <a class="dropdown-item" href="{{ route('empresaexports',[$empresas->id,$pd='2'])}}"><i class="fas fa-desktop">Pantalla Pdf</i></a>

             {{--   <a class="dropdown-item" href="{{route('capitalexports',[$cap->ano,$pd='1'])}}"><i class="fas fa-file-pdf"> Descargar Pdf</i></a>
                <a class="dropdown-item" href="{{route('capitalexports',[$cap->ano,$pd='2'])}}"><i class="fas fa-file-pdf"> Pantalla Pdf</i></a>
                <a class="dropdown-item" href="{{route('capitalexports',[$cap->ano,$pd='3'])}}"><i class="fas fa-file-excel"> Exportar Xlsx</i></a>--}}

             </div>
        </div>
    </div>

 </div>
@endsection
@section('script')
    @include('empresas.partials.script_empresa')
@endsection
