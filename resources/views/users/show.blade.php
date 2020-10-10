@extends('layouts.app')
@section('title', "{$user->name}")
@section('content')
<div class="card">
     <h4 class="card-header">Mostrar usuario</h4>
     <div class="card-body">
        <h4><strong>Nombre</strong>: {{ $user->name }}</h4>
        <div class="row">
            <div class="col-sm-2">  {{--el sm hace que se pongan uno sobre otro--}}
                <div class="card pt-2 px-4">
                    <div class="row justify-content-center">
                        <div class="profile-header-img">
                            <img class="rounded-circle mb-4" src="/storage/avatars/{{ $user->avatar }}" />
                        </div>
                    </div>
                </div>
            </div>
            @include('users.partials._showfields')
        </div>
            <div class="form-group mt-4 float-right">
                <div class="btn-group">
                    <a href="{{ route('users.index') }}"
                       class="btn btn-outline-dark btn-sm"><i class="fa fa-undo"></i> Regresar a lista de usuarios</a>
                    <button type="button" class="btn btn-outline-success dropdown-toggle" data-toggle="dropdown">
                        <i class="fas fa-file-pdf"></i> Exportar a PDF </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <a class="dropdown-item" href="{{ route('Exports',[$user->id,$pd='1'])}}">Descargar <i class="fas fa-download"></i></a>
                        <a class="dropdown-item" href="{{ route('Exports',[$user->id,$pd='2'])}}">Pantalla <i class="fas fa-desktop"></i></a>
                     </div>
                </div>
            </div>
        </div>
    </div>
@endsection
