@extends('layouts.app')
@section('content')
{{--<div class="container">--}}
{{--    <div class="col-md-8 col-md-offset-2">--}}
    <div class="card card">
        <div class="card-header">
            <div class="clearfix">
                <div class="Display4 float-left"></div>
                <h4><i class="fas fa-cog" style=color:#505050></i> Configuraciones</h4>
            </div>
        </div>
        <form method="post" action="{{ route('settings.store') }}" class="form-horizontal" role="form">
            {!! csrf_field() !!}
            <?php $pos=0 ?>
        <div class="accordion" id="accordionExample">
                <div class="card">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(count(config('setting_fields', [])) )
                        @foreach(config('setting_fields') as $section => $fields)
                            <?php $pos=$pos+1 ?>
                        <div class="card-header" id="heading-{{$pos}}">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-{{$pos}}" aria-expanded="true" aria-controls="collapse-{{$pos}}">
                                   <strong> <i class="{{ Arr::get($fields, 'icon', 'fas fa-flushed') }}"></i>
                                    {{$pos}} - {{ $fields['title'] }}</strong>

                                </button>
                            </h2>
                        </div>

                            <div id="collapse-{{$pos}}" class="collapse" aria-labelledby="heading1" data-parent="#accordionExample">
{{--                                <p class="text-muted offset-1 mt-1"> {{ $fields['desc'] }}</p>--}}
                                <div class="card-body offset-1">

                                    @foreach($fields['elements'] as $field)

                                        @includeIf('setting.fields.' . $field['type'] )

                                    @endforeach

                                </div>
                            </div>

                     <!-- end panel for {{ $fields['title'] }} -->
                        @endforeach
                     @endif
                </div>

                <div class="form-group mt-2 float-right">
                    <a href="{{ route('settings') }}" class="btn btn-outline-dark btn-sm"><i class="fa fa-undo"></i> Regresar </a>
                    <button class="btn btn-outline-success btn-sm"><i class="fa fa-save"></i>  Guarda Configuraciones</button>
                </div>
         </div>
        </form>
    </div>
{{-- </div>--}}
@endsection
