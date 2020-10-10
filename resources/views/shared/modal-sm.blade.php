@extends('layouts.app')
@section('content')
<div class="container">
    <div class="modal fade bdmodal-sm" id="Modalsmal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    @if ($view=='2')
                        @include('setting._confirm')
                    @endif
                    @if ($view=='1')
                        @include('setting._selectano')
                    @endif
                    @if ($view=='accesos')
                         @include('varias.accesos')
                    @endif
            </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $('#Modalsmal').modal('show');
    </script>
@endsection
