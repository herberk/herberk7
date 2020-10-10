@extends('layouts.app')
@if ($view == 'edith')
    @section('title',"Validar Capital Propio")
    @section('content')
    <div class="container">
        <!-- Modal -->
        {!! Form::model($valcapital, ['route' => ['valcapitalup', $valcapital], 'method' => 'PUT','class'=>"form-horizontal"]) !!}
           @include('capital.partials._valmodal')
        {!! Form::close() !!}

    </div>
    @endsection
@endif
@if ($view == 'nota')
    @section('title',"Notas del Capital")
    @section('content')
    <div class="container">
        <!-- Modal -->
        {!! Form::model($capital, ['route' => ['capital/updatenota', $capital], 'method' => 'PUT','class'=>"form-horizontal"]) !!}
             @include('capital.partials.NoteModal')
        {!! Form::close() !!}
    </div>
    @endsection

@endif
@section('script')
    @include('capital.partials.script_calculo')
@endsection


