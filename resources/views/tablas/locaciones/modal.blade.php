@extends('layouts.app')
@if ($view == 'lista')
    @section('title',"Lista de Items")
    @section('content')
        <div class="container">
            <!-- Modal -->
               @include('tablas.locaciones.partials._locacionesfields')
      </div>
    @endsection
@endif
@if ($view == 'create')
    @section('title',"Nueva Ciudad")
     @section('content')
     <div class="container">
            <!-- Modal -->
            {!! Form::model($ciudades, ['route' => ['ciudadcreate'], 'method' => 'POST','class'=>"form-horizontal"]) !!}
                 @include('tablas.locaciones.partials._locacionesfields')
            {!! Form::close() !!}
        </div>
       @endsection
@endif

@if ($view == 'elimina')
    @section('title',"Elimina ciudad")
@section('content')
    <div class="container">
        <!-- Modal -->
        {!! Form::model($ciudades, ['route' => ['ciudaddelete', $ciudades], 'method' => 'DELETE','class'=>"form-horizontal"]) !!}
        @include('tablas.locaciones.partials._locacionesfields')
        {!! Form::close() !!}
    </div>
@endsection
@endif

@if ($view == 'edit')
    @section('title',"Modifica ciudad")
@section('content')
    <div class="container">
        <!-- Modal -->
        {!! Form::model($ciudades, ['route' => ['update', $ciudades], 'method' => 'PUT','class'=>"form-horizontal"]) !!}
        @include('tablas.locaciones.partials._locacionesfields')
        {!! Form::close() !!}
    </div>
@endsection
@endif


@section('script')
<script>

    $('#LocaModal').modal('show');

</script>
@endsection
