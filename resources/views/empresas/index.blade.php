@extends('layouts.app')
@section('title', 'Empresas')
@section('content')

   <div class="d-flex justify-content-between align-items-end mb-3">
        <h2 class="pb-1">
            <i class="fas fa-building" style=color:#e4c40a></i>
            {{ trans("trans.titleemp.{$view}") }}
        </h2>
        <p>
        @if ($view == 'index')

            <a href="{{ url('empresa/excel') }}" class="btn btn-sm  btn-outline-success"><i class="fas fa-file-excel"></i> Exportar Xlsx </a>
            <a href="{{ route('empresa.trashed') }}" class="btn btn-outline-dark">Ver papelera</a>
            <a href="{{ route('creatempresa') }}" class="btn btn-dark">Nueva empresa</a>
        @else
            <a href="{{ route('empresaindex') }}" class="btn btn-outline-dark">Regresar al listado de empresas</a>
        @endif
        </p>
    </div>
    @if ($empresas->isNotEmpty())

    <div class="table-responsive-lg">
        <table class="table table-sm">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th style="width: 120px;">RUT</th>
                <th scope="col" class="sort-desc">Nombre corto   - Nombre <i class="fas fa-caret-down"></i><i class="fas fa-caret-up"></i></th>
                <th scope="col">Domicilio <i class="fas fa-caret-down"></i><i class="fas fa-caret-up"></i></th>
                <th scope="col">Correo <i class="fas fa-caret-down"></i><i class="fas fa-caret-up"></i></th>
                <th scope="col">Fechas <i class="fas fa-caret-down"></i><i class="fas fa-caret-up"></i></th>
                <th scope="col" class="text-right th-actions">Acciones</th>
            </tr>
            </thead>
            <tbody>
                @each('empresas.partials._row', $empresas, 'empresas')
            </tbody>
        </table>

        {{--{{ $empresas->links() }}--}}
        {{--<p>Viendo página {{ $empresas->currentPage() }} de {{ $empresas->lastPage() }}</p>--}}

    </div>
    @else
        <strong>No hay empresas registrados.</strong>
    @endif

@endsection


