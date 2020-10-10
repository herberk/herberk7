@extends('layouts.app')
@section('title', 'Log')
@section('content')
<div class="col-md-12 col-md-offset-3">
    <div class="d-flex justify-content-between align-items-end mb-2">
        <h2 class="pb-1">
            <i class="fas fa-fingerprint"></i>
          Registro de actividades
        </h2>
        <p>
{{--            <a href="{{ route('cacheclear') }}" class="btn btn-sm  btn-outline-warning"><i class="fas fa-sync-alt"></i> Refrescar </a>--}}
            <a href="{{ route('exportact') }}" class="btn btn-sm  btn-outline-success"><i class="fas fa-file-excel"></i> Exportar Xlsx </a>

        </p>
    </div>
        <h5 class="card-title"> Para la Empresa:  {{ setting('company') }}</h5>
        <p class="card-text"> Aquí están los registros de actividades ordenados desde los mas recientes. </p>

    <table class="table table-sm">
        <div class="table-responsive-lg">
            <thead class="thead-dark">
               <tr>
                     {{--     <th scope="col"># </th>--}}
                    <th scope="col">Fecha <i class="fas fa-caret-down"></i><i class="fas fa-caret-up"></i></th>
                    <th scope="col" style="width: 180px;">Modulo <i class="fas fa-caret-down"></i><i class="fas fa-caret-up"></i></th>
                   <th scope="col" >Accion <i class="fas fa-caret-down"></i><i class="fas fa-caret-up"></i></th>
                    <th scope="col" style="width: 100px;">Usuario <i class="fas fa-caret-down"></i><i class="fas fa-caret-up"></i></th>
                    <th scope="col">Detalle de acciones <i class="fas fa-caret-down"></i><i class="fas fa-caret-up"></i></th>
                </tr>
             </thead>
             @if ($activites->isNotEmpty())
              <tbody>
                    @each('varias.partials._rowActivity', $activites, 'activites')
              </tbody>

             @else
            <tr>
                <td colspan="4" class="text-center">No hay Actividades  guardadas en DB.</td>
            </tr>

           @endif
        </div>
    </table>
    {{ $activites->links() }}
    <p>Viendo página {{ $activites->currentPage() }} de {{ $activites->lastPage() }}</p>
</div>
@endsection