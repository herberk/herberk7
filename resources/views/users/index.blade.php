@extends('layouts.app')

@section('title', 'Usuarios')
 {{--   @include('users.partials._sidebar')--}}
@section('content')
   <div class="d-flex justify-content-between align-items-end mb-3">
        <h1 class="pb-1">
            <i class="fas fa-user fa-fw" style=color:#116a0d></i>
            {{ trans("trans.title.{$view}") }}
        </h1>
        <p>
        @if ($view == 'index')
            <a href="{{ route('Exports',[$user='0',$pd='0']) }}" class="btn btn-sm  btn-outline-success"><i class="fas fa-file-excel"></i> Exportar Xlsx </a>
            <a href="{{ route('users.trashed') }}" class="btn btn-outline-dark">Ver papelera</a>
            <a href="{{ route('users.create') }}" class="btn btn-dark">Nuevo usuario</a>
        @else
            <a href="{{ route('users.index') }}" class="btn btn-outline-dark">Regresar al listado de usuarios</a>
        @endif
        </p>
    </div>

    @includeWhen($view == 'index', 'users.partials._filters')

    @if ($users->isNotEmpty())

    <div class="table-responsive-lg">
        <table class="table table-sm">
            <thead class="thead-dark">
            <tr>
                <th scope="col"># <i class="fas fa-caret-down"></i><i class="fas fa-caret-up"></i></th>
                <th scope="col" class="sort-desc">Edo. Nombre <i class="fas fa-caret-down"></i><i class="fas fa-caret-up"></i> Apodo</th>
                <th scope="col">Correo <i class="fas fa-caret-down"></i><i class="fas fa-caret-up"></i></th>
                <th scope="col">Fechas <i class="fas fa-caret-down"></i><i class="fas fa-caret-up"></i></th>
                <th scope="col" class="text-right th-actions">Acciones</th>
            </tr>
            </thead>
            <tbody>
                @each('users.partials._row', $users, 'user')
            </tbody>
        </table>

        {{ $users->links() }}
        <p>Viendo página {{ $users->currentPage() }} de {{ $users->lastPage() }}</p>
    </div>

    @else
        <strong>No hay usuarios registrados.</strong>
    @endif

@endsection
@section('script')
    @include('users.partials.scipt_user')
@endsection
