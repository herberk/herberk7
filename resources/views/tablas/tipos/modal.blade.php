@extends('layouts.app')
@if ($view == 'lista')
{{--    @section('title',"Lista de categorias")--}}
    @section('content')
        <div class="container">
            <!-- Modal -->
               @include('tablas.tipos.partials._categoriasfields')
      </div>
    @endsection
@endif
@if ($view == 'create')
{{--    @section('title',"Nueva Ciudad")--}}
     @section('content')
     <div class="container">
            <!-- Modal -->
            {!! Form::model($categorias, ['route' => ['storecategoria'], 'method' => 'POST','class'=>"form-horizontal"]) !!}
                 @include('tablas.tipos.partials._categoriasfields')
            {!! Form::close() !!}
        </div>
       @endsection
@endif

@if ($view == 'elimina')
    @section('content')
        <div class="container">
            <!-- Modal -->
            {!! Form::model($categorias, ['route' => ['categoriadelete', $categorias], 'method' => 'DELETE','class'=>"form-horizontal"]) !!}
            @include('tablas.tipos.partials._categoriasfields')
            {!! Form::close() !!}
        </div>
    @endsection
@endif

@if ($view == 'edit')
@section('content')
    <div class="container">
        <!-- Modal -->
        {!! Form::model($categorias, ['route' => ['updatecat', $categorias], 'method' => 'PUT','class'=>"form-horizontal"]) !!}
        @include('tablas.tipos.partials._categoriasfields')
        {!! Form::close() !!}
    </div>
@endsection
@endif

@if ($view == 'createitem')
@section('content')
    <div class="container">
        <!-- Modal -->
        {!! Form::model($items, ['route' => ['storeitem'], 'method' => 'POST','class'=>"form-horizontal"]) !!}
        @include('tablas.tipos.partials._itemsfields')
        {!! Form::close() !!}
    </div>
@endsection
@endif


@if ($view == 'edititem')
@section('content')
    <div class="container">
        <!-- Modal -->
        {!! Form::model($items, ['route' => ['updateitem', $items], 'method' => 'PUT','class'=>"form-horizontal"]) !!}
        @include('tablas.tipos.partials._itemsfields')
        {!! Form::close() !!}
    </div>
@endsection
@endif

@if ($view == 'eliminaitem')
@section('content')
    <div class="container">
        <!-- Modal -->
        {!! Form::model($items, ['route' => ['itemdelete', $items], 'method' => 'DELETE','class'=>"form-horizontal"]) !!}
        @include('tablas.tipos.partials._itemsfields')
        {!! Form::close() !!}
    </div>
@endsection
@endif

@section('script')
<script>

    $('#LocaModal').modal('show');

</script>
@endsection
