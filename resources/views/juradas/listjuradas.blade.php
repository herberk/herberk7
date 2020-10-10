@extends('layouts.app')
@section('title', 'Juradas')
@section('style')
@include('juradas.partials.style_juradas')
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-end">
         <h2 class="pb-1"> <i class="fas fa-building" style=color:#e4c40a></i> &nbsp; Declaraciones Juradas por empresas, del año Tributario {{ setting('ano') }}  </h2>
        <a href="{{ url('jurada/Exports') }}" class="btn btn-sm  btn-outline-success"><i class="fas fa-file-excel"></i> Exportar Xlsx </a>
    </div>
    <div class="just-padding">
        <div class="list-group list-group-root well">
{{--            {{$empresas->ano}}--}}
            <?php $pos=0 ?>
            @foreach($empresas as $empresa)
                <a href="#item-{{$empresa->id}}" class="list-group-item" data-toggle="collapse">
                     <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    <strong>{{ $empresa->rut  }} &nbsp;&nbsp;  {{  $empresa->name_corto }}&nbsp;&nbsp;&nbsp;&nbsp; {{  $empresa->name }}</strong>
                </a>
                @foreach($empresa->juradas as $indexkey=>$jura)
                    <div  class="list-group-mio collapse mt-2" id="item-{{$empresa->id}}">
                        <div class="row">
                            <?php $pos++ ?>
                            <div class="mio col-3 ml-5"><strong>{{$indexkey+1 }}</strong>  {{ $jura->desc_corta}}</div>
                            <div class="col-1">{{DATE_FORMAT( date_create($jura->fe_vence),"d/m/Y")}}</div>
                            <div class="col-1">{{$jura->certificado}}</div>
                            <div class="col-1">{{DATE_FORMAT( date_create($jura->fe_certifica),"d/m/Y")}}</div>
                            <div class="col-2">{{$jura->pivot->estado}}</div>
                            <div class="col-1">{{$jura->pivot->folio}}</div>
                            <div class="col-1">{{$jura->pivot->anot}}</div>
                            <div class="col-1">
                                <a href="{{ route('showedo',[$jura->pivot->id, $jura->desc_corta]) }}" class="btn btn-outline-secondary btn-sm">Editar </a>
                            </div>
                       </div>
                    </div>
                @endforeach
             @endforeach
        </div>
        <blockquote class="blockquote text-center mt-2">
            @if($pos > 0)
              <strong>Total Declaraciones &nbsp;&nbsp;{{ $pos  }}  </strong>
            @else
                <strong>No hay Declaraciones con el año Tributario: &nbsp;&nbsp;{{ setting('ano') }}  </strong>
            @endif
        </blockquote>
    </div>

    {{--https://jsfiddle.net/ann7tctp/--}}

@endsection
@section('script')
    @include('juradas.partials.script_juradas')
@endsection
