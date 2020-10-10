@extends('layouts.app')
@section('title', "Crear usuario")
@section('content')
<div class="card">
    <h4 class="card-header">Nuevo usuario</h4>
    <div class="card-body">
        @include('shared._errors')
        <form method="POST" action="{{ url('usuarios') }}">
            @include('users.partials._fields')
            <div class="form-group mt-2 float-right">
                <button type="submit" class="btn btn-primary">Crear usuario</button>
                <a href="{{ route('users.index') }}" class="btn btn-outline-primary"><i class="fa fa-undo"></i> Regresar al listado de usuarios</a>
            </div>
        </form>
    </div>
</div>
@endsection
