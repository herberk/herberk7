@extends('layouts.app')

@section('title', 'Habilidades')

@section('content')
    <div class="d-flex justify-content-between align-items-end">
        <h1 class="pb-1"><i class="fas fa-user fa-fw" style=color:#116a0d></i>Listado de habilidades</h1>
    </div>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Título</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($skills as $skill)
            <tr>
                <th scope="row">{{ $skill->id }}</th>
                <td>{{ $skill->name }}</td>
                <td>
                    {{--<form action="{{ route('users.destroy', $user) }}" method="POST">--}}
                        {{--{{ csrf_field() }}--}}
                        {{--{{ method_field('DELETE') }}--}}
                        {{--<button type="submit" class="btn btn-link"><span class="oi oi-trash"></span></button>--}}
                    {{--</form>--}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('sidebar')
    @parent
@endsection
