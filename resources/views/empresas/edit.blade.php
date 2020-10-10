@extends('layouts.app')
@section('title',"Editar Empresas")
@section('content')
<div class="card card">
  {{--  <div class="card-header">
        <div class="clearfix">
            <div class="Display4 float-left"></div>
            <h4><i class="fas fa-building" style=color:#e4c40a></i> Editar empresa</h4>
        </div>
        @if (Session::has('message'))
            <p class="alert alert-success">{{ Session::get('message')}}</p>
        @endif
    </div>--}}
    <div class="d-flex justify-content-between align-items-end">
        <h2 >
            <i class="fas fa-building" style=color:#e4c40a></i>
            Editar empresa
        </h2>
        <p>
        <p>
            @include('shared._errors')
            @include('shared._message-er')
            @include('shared._message-su')
        </p>
        <p>
            {{--            <a href="{{ route('newcategorias') }}" class="btn btn-sm  btn-outline-dark mt-1 mr-1"></i> Nueva Categoria </a>--}}

        </p>
    </div>
    {!! Form::model($empresas, ['route' => ['empresa/update', $empresas], 'method' => 'PUT','class'=>"form-horizontal"]) !!}
        @include('empresas.partials._fields')
        {{--Ultima linea de botones--}}
        @include('empresas.partials.editboton')
    {!! Form::close() !!}

 </div>
@endsection

@section('script')
    @include('empresas.partials.script_empresa')
@endsection
