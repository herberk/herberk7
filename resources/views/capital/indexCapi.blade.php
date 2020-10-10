@extends('layouts.app')
@section('title', 'Capital')
@section('content')
<div class="col-md-11 ml-5">
    <div class="d-flex justify-content-between align-items-end mb-2">
        <h2 class="pb-1"> <i class="far fa-money-bill-alt"></i>Lista de Capital Tributario</h2>
        <p>
        @if ($view == 'index')
            <a href="{{ route('capitalexcel') }}" class="btn btn-sm  btn-outline-success"><i class="fas fa-file-excel"></i> Exportar Xlsx </a>
            <a href="{{ route('papelera') }}" class="btn btn-outline-dark">Ver papelera</a>
            <a href="{{ route('capitalcreate') }}" class="btn btn-dark">  Nuevo Capital</a>
                <a class="btn btn-primary mt-1 mr-1" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fas fa-info"> </i> Info.
                </a>
        @else
            <a href="{{ route('capital.index') }}" class="btn btn-outline-dark">Regresar al listado de Capitales</a>
        @endif
        </p>
    </div>
    <div class="collapse" id="collapseExample">
        <div class="card card-body">
                <textarea  rows="5">
                {{$helps->notes}}
              </textarea>
        </div>
    </div>
    @if ($view == 'index')
        <h5 class="card-title"> Para la Empresa: <strong> {{ setting('company') }}</strong> </h5>
    @else
        <h2>Papelera de capitales</h2>
    @endif

    <table class="table table-sm">
        <tr>
            <thead class="thead-dark">
            <th style="width: 40px;text-align: center">Año</th>
            <th style="width: 120px;text-align: center">Total activo</th>
            <th style="width: 120px;text-align: center">Total Into</th>
            <th style="width: 120px;text-align: center">Diferencias</th>
            <th style="width: 120px;text-align: center">Capital efectivo</th>
            <th style="width: 120px;text-align: center">Pasivos</th>
            <th style="width: 120px;text-align: center">Capital tributario</th>
            <th style="width: 200px;text-align: center">Acciones</th>
            </thead>
        </tr>
        @forelse($capital as $cap)
            <tr>
                <td>{{ $cap->ano }}</td>
                <td style="text-align: right">{{ number_format( $cap->activo) }}</td>
                <td style="text-align: right">{{ number_format($cap->into21) }}</td>
                <td style="text-align: right">{{ number_format($cap->into22) }}</td>
                <td style="text-align: right">{{ number_format($cap->activo+($cap->into21+$cap->into22)) }}</td>
                <td style="text-align: right">{{ number_format($cap->pasivo51) }}</td>
                <td style="text-align: right">{{ number_format($cap->capitaltri)}}</td>
                <td style="width: 200px;text-align: right">
                    @if ($cap->trashed())
{{--                        <form action="{{ route('empresa.destroy', $socios) }}" method="POST">--}}
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('Capital/restore', $cap->id) }}" class="btn btn-outline-secondary btn-sm"
                               data-toggle="tooltip"  title="Restaurar Capital "><i class="far fa-window-restore"></i></a>
                            <button type="submit" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"
                                data-toggle="tooltip"  title="Eliminar No operativo "></i></button>
{{--                        </form>--}}
                    @else
                            @csrf
                            @method('PATCH')
                            @if ($cap->ano == setting('ano'))
                                <a href="{{ route('Capital.edit') }}" class="btn btn-outline-success btn-sm"
                                   data-toggle="tooltip"  title="Edita Capital"><i class="fas fa-pencil-alt"></i></a>
                            @endif
                                     @if ($cap->notas !== '')
                                          <a href="{{ route('capitalshownotas', [$cap->id]) }}" class="btn btn-outline-secondary btn-sm"
                                             data-toggle="tooltip"  title="Ver o editar Notas capital"> <i class="fas fa-tasks" style=color:blue></i></a>
                                      @else
                                        <a href="{{ route('capitalshownotas', [$cap->id]) }}" class="btn btn-outline-secondary btn-sm">  <i class="fas fa-tasks" style=color:grey></i></a>
                                     @endif
                               <a href="{{ route('Capital.show', [$cap->ano]) }}" class="btn btn-outline-secondary btn-sm"
                                  data-toggle="tooltip"  title="Ver capital"><i class="fas fa-eye"></i></a>
                             <button type="button" class="btn btn-outline-success dropdown-toggle" data-toggle="dropdown"
                                    data-toggle="tooltip"  title="Exportar capital"> <i class="fas fa-file-export"></i> </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item" href="{{route('capitalexports',[$cap->ano,$pd='1'])}}"><i class="fas fa-file-pdf"> Descargar Pdf</i></a>
                                <a class="dropdown-item" href="{{route('capitalexports',[$cap->ano,$pd='2'])}}"><i class="fas fa-file-pdf"> Pantalla Pdf</i></a>
                                <a class="dropdown-item" href="{{route('capitalexports',[$cap->ano,$pd='3'])}}"><i class="fas fa-file-excel"> Exportar Xlsx</i></a>
                            </div>
                           <a href="{{ route('Capitals/trash', [$cap->id]) }}" class="btn btn-outline-danger btn-sm"
                            data-toggle="tooltip"  title="Borrar capital"><i class="fas fa-times-circle"></i></a>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center">No hay datos guardadas en DB.</td>
            </tr>
        @endforelse
    </table>
</div>
@endsection

