@extends('layouts.app')
@if ($view == 'estado')
    @section('title',"Notas de Empresas")
    @section('content')
    {!! Form::model($empresa_juradas, ['route' => ['updatedo', $empresa_juradas], 'method' => 'PUT','class'=>"form-horizontal"]) !!}

    <div class="modal fade bd-example-modal-lg" id="NoteModalLong" tabindex="-1" role="dialog" aria-labelledby="NoteModalLongTitle" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title mt-3 ml-5" id="NoteModalLongTitle">Modifica estado: {{$jura}} </h4>
                    {{--de :{{$empresa_juradas}}--}}
                </div>

                <div class="modal-body">
                    <div class="col-sm"> {{--el sm hace que se pongan uno sobre otro--}}
                        <div class="card">
                            <div class="form-row ">
                                <div class="col-8">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Seleccionar Estado</div>

                                       {!! Form::select('arti_id', $art[9], null, ['class' => 'form-control py-1' ]) !!}
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Folio</div>
                                        <input id="folio" type="text" class="form-control text-right"
                                               name="folio" value="{{ old('folio',$empresa_juradas->folio) }}">
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('infojuradas') }}"
                           class="btn btn-outline-dark btn-sm"><i class="fa fa-undo"></i> Regresar a lista Juradas por empresas</a>
                        <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-save"></i> Guardar cambios</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
   {!! Form::close() !!}
    @endsection
@endif

@section('script')
    <script>
        $('#NoteModalLong').modal('show');
    </script>
@endsection