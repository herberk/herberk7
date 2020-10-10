@extends('layouts.app')
@if ($view == 'nota')
    @section('title',"Notas de Empresas")
    @section('content')
        <div class="container">
            <!-- Modal -->
            {!! Form::model($empresas, ['route' => ['empresa/updatenota', $empresas], 'method' => 'PUT','class'=>"form-horizontal"]) !!}
               @include('empresas.partials.NoteModal')
            {!! Form::close() !!}
      </div>
    @endsection
@endif
@if ($view == 'logo')
    @section('title',"logo de Empresas")
     @section('content')
        <div class="container">
            <!-- Modal -->
            {!! Form::model($empresas, ['route' => ['logo', $empresas], 'method' => 'POST','enctype' =>"multipart/form-data",'class'=>"form-horizontal"]) !!}
                @include('empresas.partials._logoModal')
            {!! Form::close() !!}
        </div>
        @endsection
@endif
@if ($view == 'seljurada')
    @section('title',"Selecciona declaraciones juradas")
@section('content')
    <div class="container">
        <!-- Modal -->
        {!! Form::model($empresas, ['route' => ['juradasselstore', $empresas], 'method' => 'PUT','class'=>"form-horizontal"]) !!}
             @include('empresas.partials._selecjurada')
        {!! Form::close() !!}
    </div>
@endsection
@endif


@section('script')
<script>
$('#NoteModalLong').modal('show');
</script>
@endsection
