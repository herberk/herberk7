@extends('layouts.app')
@if ($view == 'nota')
    @section('title',"Notas de Bancos")
    @section('content')
        <div class="container">
            <!-- Modal -->
            {!! Form::model($bancos, ['route' => ['banco/updatenota', $bancos], 'method' => 'PUT','class'=>"form-horizontal"]) !!}
               @include('empresas.bancos.partials.NoteModal')
            {!! Form::close() !!}
      </div>
    @endsection
@endif
@if ($view == 'create')
    @section('title',"Nuevo Banco")
     @section('content')
     <div class="container">
            <!-- Modal -->
            {!! Form::model($bancos, ['route' => ['bancosstore'], 'method' => 'POST','class'=>"form-horizontal"]) !!}
                 @include('empresas.bancos.partials.bancosfields')
            {!! Form::close() !!}
        </div>
       @endsection
@endif

@if ($view == 'edit')
    @section('title',"Modifica Banco")
@section('content')
    <div class="container">
        <!-- Modal -->
        {!! Form::model($bancos, ['route' => ['banco/update', $bancos], 'method' => 'PUT','class'=>"form-horizontal"]) !!}
           @include('empresas.bancos.partials.bancosfields')
        {!! Form::close() !!}
    </div>
@endsection
@endif



@section('script')
<script>

    $('#NoteModalLong').modal('show');

</script>
@endsection
