@extends('layouts.app')
@section('title',"Nueva Empresas")
@section('content')
<div class="card card">
    <div class="d-flex justify-content-between align-items-end">
        <h2 >
            <i class="fas fa-building" style=color:#e4c40a></i>
            Nueva empresa
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
    <form class="form-horizontal" method="POST" action="{{ route('storempresa') }}">
       {{ csrf_field() }}
         @include('empresas.partials._fields')
        {{--Ultima linea de botones--}}
        @include('empresas.partials.newboton')
    </form>
</div>
@endsection

@section('script')
@include('empresas.partials.script_empresa')
@endsection
