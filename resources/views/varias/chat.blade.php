@extends('layouts.app')

@section('content')
<div class="col-md-12 col-md-offset-3">
    <div class="d-flex justify-content-between align-items-end mb-2">
        <h2 class="pb-1">
            <i class="far fa-bell style=color:#116a0d"></i>
            Registro de Charlas
        </h2>

    </div>
    <p class="card-text"> Aquí están los registros de las charlas de los usuario, de esta aplicacion </p>
    <sent-message v-on:messagesent="addMessage" :user="{{ Auth::user() }}"></sent-message>
    <message :messages="messages"></message>
</div>

@endsection
