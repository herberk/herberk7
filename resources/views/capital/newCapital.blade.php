@extends('layouts.app')
@section('title', "Capital Tributario")
@section('content')
<div class="container">
   <div class="col-md-11 col-md-offset-2">
       <div class="card card">
            <div class="card-header">
                <div class="clearfix">
                    <div class="Display4 float-left"></div>
                    <h4><i class="far fa-money-bill-alt"></i> Determinacion del capital propio tributario</h4>
                    <h5 class="card-title"> Para la Empresa:  <strong> {{ setting('company') }}</strong> y el año comercial: <strong>{{ setting('ano') }}</strong></h5>
                    <p class="card-text"> Mètodo activos menos pasivos a valor Tributario. </p>
                    @include('shared._errors')
                </div>
            </div>
           @if ($view == 'edit')
                       {!! Form::model($capital, ['route' => ['Capitalup', $capital], 'method' => 'PUT','class'=>"form-horizontal"]) !!}
               {{ csrf_field() }}
           @else
               <form class="form-horizontal" method="POST" action="{{ route('capitalstore') }}" >
                   {{ csrf_field() }}
           @endif
                <div class="accordion" id="accordionExample">
                   <div class="card">
                       <div class="card-header" >
                               @include('capital.partials._activo')
                       </div>
                       {{-- <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample"></div>--}}
                    </div>
                    <div class="card">
                       <div class="card-header" id="headingTwo">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <div class="clearfix">
                                    <strong><span class="badge badge-primary"> 2 Menos:</span>  Valores I.N.T.O. y cuentas complementarias de activo</strong>
                                </div>
                           </button>
                      </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                          @include('capital.partials._into')
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <strong> <span class="badge badge-primary">3 Mas o menos: </span> Diferencias por Valorizaciòn </strong>
                                </button>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                             @include('capital.partials._valfinatibu')
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" >
                              @include('capital.partials._efectivo')
                        </div>
                      {{--  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample"> </div>--}}
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingcuatro">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapsecuatro" aria-expanded="false" aria-controls="collapsecuatro">
                                    <strong> <span class="badge badge-primary">5 Menos: </span> Pasivo Exigible</strong>
                                </button>
                        </div>
                        <div id="collapsecuatro" class="collapse" aria-labelledby="headingcuatro" data-parent="#accordionExample">
                                @include('capital.partials._exigible')
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" >
                                @include('capital.partials._propio')
                        </div>
                      </div>
                    <div class="card">
                        <div class="card-header" >
{{--                                @include('capital.partials._correccion')--}}

                        </div>
                    </div>
                    <div class="form-group float-right mt-3">
                        @if ($view == 'edit')
                            <a href="{{ route('capital.index') }}"  class="btn btn-outline-dark btn-sm"><i class="fa fa-undo"></i> Regresar a lista Capital</a>
                            <a href="{{ route('valcapital.edit') }}"  class="btn btn-outline-primary btn-sm"><i class="fa fa-equals"></i> Validar Capital Propio</a>
                            <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-save"></i>  Modificar Capital</button>

                         @else
                            <a href="{{ route('capital.index') }}"  class="btn btn-outline-dark btn-sm"><i class="fa fa-undo"></i> Regresar a lista Capital</a>
                            <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-save" onclick="sumartot();"></i>  Guarda Capital</button>
                         @endif

                    </div>
                 </div>

               @if ($view == 'edit')
                       {{ Form::close() }}
               @else
                        </form>
               @endif
       </div>
   </div>
</div>
@endsection

@section('script')
    @include('capital.partials.script_capital')
@endsection
