@extends('layouts.app')

@section('title', 'Juradas')
@section('style')
    @include('archivos.partials.style_file')
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-end">
        <h2 class="pb-1"> <i class="fas fa-archive" style=color:#80202b></i>&nbsp;Archivos por empresas </h2>
        <a href="{{ url('jurada/Exports') }}" class="btn btn-sm  btn-outline-success"><i class="fas fa-file-excel"></i> Exportar Xlsx </a>

    </div>
    <div class="just-padding">
        <div class="list-group list-group-root well">
            <?php $pos=1 ?>
            @foreach($empresas as $empresa)
                    @if(count($empresa->directorios)==0)
                        <a href="#item-{{$empresa->id}}" class="list-group-minus my-2" data-toggle="collapse">
                        <i class="far fa-minus-square"></i>
                            <strong>{{ $empresa->rut  }} &nbsp;&nbsp;  {{  $empresa->name_corto }}&nbsp;&nbsp;&nbsp;&nbsp; {{  $empresa->name }}</strong>
                        </a>
                    @else
                        <a href="#item-{{$empresa->id}}" class="list-group-plus my-2" data-toggle="collapse">
                        <i class="far fa-plus-square"></i>
                            <strong>{{ $empresa->rut  }} &nbsp;&nbsp;  {{  $empresa->name_corto }}&nbsp;&nbsp;&nbsp;&nbsp; {{  $empresa->name }}</strong>
                        </a>
                    @endif

                   @foreach($empresa->directorios as $indexkey=>$directori)
                        <div  class="collapse my-1"  id="item-{{$empresa->id}}">
                            <?php $pos  ?>
                            @if(count($directori->ficheros)==0)
                             <a href="#item-{{$empresa->id}}-{{$indexkey}}" class="list-group-minus " data-toggle="collapse">
                                  <i class="far fa-minus-square"></i>
                                  &nbsp;&nbsp;<strong> {{ $directori->name }} </strong>
                               </a>
                            @else
                            <a href="#item-{{$empresa->id}}-{{$indexkey}}" class="list-group-plus" data-toggle="collapse">
                                <i class="far fa-plus-square"></i>
                                &nbsp;&nbsp;&nbsp;<strong> {{ $directori->name }} </strong>
                            </a>
                            @endif
                        </div>
                             @foreach($directori->ficheros as $indexkey=>$fichero)
                               <div class="list-group-arch collapse my-1 " id="item-{{$empresa->id}}">
                                   <a href="#" > <strong>{{ $fichero->created_at->format('d-m-Y') }}{{ " - " }}{{ $fichero->name }}</strong> </a>
                              </div>
                             @endforeach
                    @endforeach
            @endforeach
        </div>
        <blockquote class="blockquote text-center mt-2">
            <strong>Total Archivos &nbsp;&nbsp;{{ $pos  }}  </strong>
        </blockquote>
    </div>
    {{--https://jsfiddle.net/ann7tctp/--}}
@endsection
@section('script')
    @include('archivos.partials.script_file')
@endsection
