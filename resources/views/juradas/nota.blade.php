@extends('layouts.app')
@if ($view == 'instructivo')
    @section('title',"instructivo")
    @section('content')
    <div class="container">
        <!-- Modal -->
        @include('juradas.partials._instruccionsModal')
    </div>
    @endsection
@endif
@if ($view == 'plantilla')
    @section('title',"Plantilla")
    @section('content')
    <div class="container">
        <!-- Modal -->
        @include('juradas.partials._plantillasModal')
    </div>
    @endsection
@endif

@section('script')
    <script>
        $('#NoteModalLong').modal('show');
    </script>
@endsection