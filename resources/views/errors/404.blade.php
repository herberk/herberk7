@extends('layouts.app')

@section('title', "Página no encontrada")

@section('content')
   <h3 class="text-center">'Sorry '.{{ auth()->user()->name}} . '! Esta direccion no esxiste.';</h3>
@endsection
