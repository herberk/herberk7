@extends('layouts.app')
@section('title', 'Capital')
@section('content')
    <div class="card card mx-5">
        <div class="card-header mt-5">
            <div class="clearfix">
                <div class="Display4 float-left"></div>
                  <h4><i class="fas fa-building" style=color:#e4c40a></i><strong>Capital propio de</strong>: {{setting('company' )}}&nbsp;&nbsp; Año: {{$capital->ano}}</h4>
                </div>
            </div>
        <div class="row">
          @include('capital.exports.showpdf')
        </div>
        <div class="text-center my-2">
            <div class="btn-group">
                <a href="{{ route('capital.index') }}"
                   class="btn btn-outline-dark btn-sm"><i class="fa fa-undo"></i> Regresar a lista de capitales</a>
                <button type="button" class="btn btn-outline-success dropdown-toggle" data-toggle="dropdown">
                    <i class="fas fa-file-pdf"></i> Exportar a PDF </button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                </div>
            </div>
        </div>
    </div>
