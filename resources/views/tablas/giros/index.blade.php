@extends('layouts.app')

@section('title', 'Giros')

@section('content')
<div class="col-md-12">
    <div class="d-flex justify-content-between align-items-end">
        <h2 >
            <i class="fas fa-fw fa-table" style=color:#3729fa></i>
            {{ trans("trans.titlegiro.{$view}") }}
        </h2>
    </div>
    <div class="card border-success col-md-10 ">
        <div class="card-header">Actividades Economicas SII</div>
        <div class="card-body ">
         {{--   <h5 class="card-title">Success card title</h5>--}}
            <p class="card-text">En el caso que Ud. requiera agregar Actividades Económicas, busque la nueva Actividad Económica (“por palabra clave", "por rubro" o a través del “Asistente para la selección de Actividades Económicas”), una vez seleccionada, agréguela.</p>
            <p> 1) Por palabra clave: Se deben escribir palabra(s) que contengan el texto a buscar.</p>
            <div class="form-row">
                <div class="col-sm-9">
                    {!! Field::text('giro', ['class' => 'easy-autocomplete','label'=>'Actividad o Giro principal SII']) !!}
                </div>
                <div class="col-sm-3">
                    {!! Field::text('codigo',['id' => 'codigo','label'=>'Codigo Giro SII','readonly']) !!}
                </div>
            </div>  <!-- fin row -->
        <p>2) Por rubro: La búsqueda en este caso, es de lo general a lo particular. Se hace una búsqueda por rubro y finalmente en ese rubro Ud. escoge los giros relacionados con el rubro seleccionado.</p>
            <div class="col-9">
                {!! Field::select('giroa_id', $giroa_com, null, ['class' => 'form-control py-1']) !!}
            </div>
            <div class="col-9">
                {!! Field::select('girob_id',$girob_com, null, ['class' => 'form-control py-1'])!!}
            </div>
            <div class="col-9">
                {!! Field::select('giros_id',$giros_com, null, ['class' => 'form-control py-1']) !!}
            </div>
        </div>
    </div>
    <div class="just-padding">
        <div class="list-group list-group-root well">

        </div>
    </div>
</div>
@endsection
@section('script')
  @include('tablas.partials.script_giros')
 @endsection
