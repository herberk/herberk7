@extends('layouts.app')
@section('title',"Lista de Regiones Comunas")
@section('content')
    <div class="col-md-12">
        <div class="card border-success">
            <div class="d-flex justify-content-between align-items-end">
                <h2 class="pb-1"> <i class="fas fa-fw fa-table" style=color:#3729fa></i>  Regiones Comunas Ciudades</h2>
                <p>
                    @include('shared._errors')
                    @include('shared._message-er')
                    @include('shared._message-su')
                </p>
                <p>

                </p>
            </div>
            <div class="row">
                <!--Regiones-->
                @if ($regiones->isNotEmpty())
                    @include('tablas.locaciones.partials._region')
                @else
                    <p>No hay Locaciones registradas.</p>
                @endif

            <!--Comunas-->
                @if ($regiones->isNotEmpty())
                    @include('tablas.locaciones.partials._comuna')
                @else
                    <p>No hay Locaciones registradas.</p>
                @endif
            <!--Ciudades-->
                @if ($regiones->isNotEmpty())
                    @include('tablas.locaciones.partials._ciudades')
                @else
                    <p>No hay Locaciones registradas.</p>
                @endif
{{--            <locaciones-master></locaciones-master>--}}
            </div>
        </div>
    </div>
@endsection


