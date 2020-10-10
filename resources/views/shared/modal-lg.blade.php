@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="modal fade bdmodal-lg" id="Modallarge" tabindex="-1" data-backdrop="static" data-keyboard="false" >
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        @if ($view=='selecdir')
                            {!! Form::model($accesdirs, ['route' => ['updatedir', $accesdirs], 'method' => 'PUT','class'=>"form-horizontal"]) !!}
                                @include('varias.selectdirec')
                            {!! Form::close() !!}
                        @endif
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        $('#Modallarge').modal('show');
    </script>
@endsection
