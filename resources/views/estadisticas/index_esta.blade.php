@extends('layouts.app')
@section('title', 'Bancos')
@section('content')
  <div class="d-flex justify-content-between align-items-end">
        <h2 class="pb-1"> <i class="fas fa-chart-line" style=color:#b31e9f ></i>  {{ trans("trans.titlesta.{$view}") }}</h2>
        <p>
            @include('shared._errors')
            @include('shared._message-er')
            @include('shared._message-su')
        </p>
        <p>
            @if ($view == 'index' )
                <a href="{{ route('estadisticaexcel') }}" class="btn btn-sm  btn-outline-success"><i class="fas fa-file-excel"></i> Exportar Xls </a>
                <a href="{{ route('estadistica.trashed') }}" class="btn btn-outline-dark">Ver papelera</a>
            @else
                <a href="{{ route('estadistica.index') }}" class="btn btn-outline-dark">Regresar al listado</a>
            @endif
        </p>
  </div>
  <table class="table table-sm table-bordered table-striped" id="dataTable">
      <thead class="thead-dark">
      <tr>
          <th style="text-align: center;width: 50px">Año</th>
          <th style="text-align: center;width: 60px">Mes</th>
          <th style="text-align: right; width: 180px">Ventas </th>
          <th style="text-align: right; width: 180px">Otros Ing.</th>
          <th>-</th>
          <th style="text-align: right ; width: 180px">Compras</th>
          <th style="text-align: right; width: 180px">Remuneraciones</th>
          <th style="text-align: right; width: 180px">Honorarios</th>
          <th style="text-align: right; width: 180px">Arriendos</th>
          <th style="text-align: right; width: 180px">Otros Gts.</th>
          <th style="text-align: right; width: 180px">Saldo</th>
          <th style="text-align: center; width: 100px">Acciones</th>
      </tr>
      </thead>
  @if ($recuentos->isNotEmpty() )
        @include('estadisticas.partials._row')
    {{--    @include('estadisticas.partials._form_new')--}}
  @else
         <p>No hay datos registrados.</p>
   @endif
 </table>

  @if ($formu == 'new' )
        @include('estadisticas.partials._form_new')
     @endif
    @if ($formu == 'edit' )
        @include('estadisticas.partials._form_edit')
    @endif
  {{ $recuentos->links() }}
  <p>Viendo página {{ $recuentos->currentPage() }} de {{ $recuentos->lastPage() }}</p>
@endsection




