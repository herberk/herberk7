@extends('layouts.app')
@section('title', "Crear Jurada")
@section('content')
    <div class="card card">
        <div class="card-header">
            <div class="clearfix">
                <div class="Display4 float-left"></div>
                <h4><i class="fas fa-building" style=color:#e4c40a></i> Edita declaracion jurada</h4>
            </div>
          </div>
        {!! Form::model($juradas, ['route' => ['jurada/update', $juradas], 'method' => 'PUT','class'=>"form-horizontal"]) !!}
            {{ csrf_field() }}
            @include('shared._errors')
            @include('juradas.partials._fields')
            {{--Ultima linea de botones--}}
            @include('juradas.partials.editboton')
        {!! Form::close() !!}
    </div>
@endsection

@section('script')
@include('juradas.partials.script_juradas')
@endsection