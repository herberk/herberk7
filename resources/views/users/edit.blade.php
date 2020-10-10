@extends('layouts.app')
@section('title', "Crear usuario")
@section('content')
    <div class="card">
        <h4 class="card-header">Editar usuario</h4>
        <div class="card-body">


        @include('shared._errors')

        <form method="POST" action="{{ url("usuarios/{$user->id}") }}">
            {{ method_field('PUT') }}

            @include('users.partials._fields')

            <div class="form-group mt-2 float-right">
                <button type="submit" class="btn btn-primary">Actualizar usuario</button>
                <a href="{{ route('users.index') }}" class="btn btn-outline-primary"><i class="fa fa-undo"></i> Regresar al listado de usuarios</a>
            </div>
        </form>
        </div>
    </div>
@endsection
