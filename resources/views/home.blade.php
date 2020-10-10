@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-success my-2">
                <div class="card-header"><h4><i class="fas fa-desktop" style=color:Tomato></i> Escritorio</h4></div>
                <div class="row">
{{--               primer card--}}
                    <div class="col-sm-3">
                        <div class="card border-success my-2">
                            <div class="card-header"><strong>Empresas seleccionada:  </strong></div>
                            <div class="card-body text-center ">

                                 <table class="table table-sm">
                                     <thead class="thead-dark">
                                    <strong>Seleccione Empresa</strong>
                                    <small id="fileHelp" class="form-text text-muted mt-2">Para seleccionar una empresa y sus datos, haga Clik sobre su nombre</small>
                                     </thead>
                                     @foreach ($companies as $company)
                                         <tr data-id="{{ $company->id}}">
                                             <td><a href="{{ route('select',[$company->id,$view='2'])}}">{{ $company->name }}</a></td>
                                      @endforeach
                                </table>
                                <a class="btn btn-outline-success btn-block mt-2" href="empresaindex" role="button"><strong>Gestion de empresas</strong></a>
                            </div>
                        </div>
                    </div>
{{--          segundo card--}}
                    <div class="col-sm-3">
                        <div class="card border-success my-2">
                            <div class="card-header"><strong>Accesos directos </strong></div>
                            <div class="card-body text-center">
                                <table class="table table-sm text-left">
                                    <thead class="thead-dark">
                                    <strong>Seleccione accesos directos</strong>
                                    <small id="fileHelp" class="form-text text-muted mt-2">Para acceder directamente a seccion, haga Clik sobre su nombre</small>
                                    </thead>
                                    @foreach ($accesdirs as $key =>$acces)
                                      <tr data-id="{{ $key}}">
                                        <td >{{ $key+1 }}</td>
{{--                                    <td >{{implode(" - ",$value) }}</td>--}}
                                         <td><a href="{{ $acces->ruta }}">{{ $acces->name }}</a></td>
                                      </tr>
                                    @endforeach
                                </table>
                                <a class="btn btn-outline-success btn-block mt-2" href="selectdir" role="button"><strong>Gestion de Accesos directos</strong></a>
                            </div>
                        </div>

                    </div>
 {{--            tercer card--}}
                    <div class="col-sm-3">
                        <div class="card border-success my-2">
                            <div class="card-header"><strong>Dependencia</strong></div>
                            <div class="card-body">
                                <table class="table table-sm">
                                    @foreach ($dependen as $key =>$depen)
                                        <tr data-id="{{ $depen}}">
                                            <td>{{$key}}</td>
                                            <td>{{$depen}}</td>

                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
{{--            cuarto card--}}
                    <div class="col-sm-3">
                        <div class="card border-success my-2">
                            <div class="card-header"><strong>Ambiente </strong></div>
                            <div class="card-body">
                                <table class="table table-sm">
                                    @foreach ($envs as $key => $value)
                                        <tr data-id="{{ $key}}">
                                            <td >{{ $key }}</td>
                                             <td >{{implode(" - ",$value) }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <a class="btn btn-outline-danger btn-block mt-2" href="{{ route('logout') }}" role="button"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">Salir del programa </a>
                    </div>
                    <!--Termina row-->
                </div>
            </div>
            <!--Termina la card que envuelve solo tiene titulo-->
            <div class="card-footer small text-muted">Actualizado el: </div>
        </div>

    </div>

@endsection
@section('style')
@endsection
