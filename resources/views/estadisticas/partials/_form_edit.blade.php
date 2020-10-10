{!! Form::model($rec, ['route' => ['estadisticaupdate', $rec], 'method' => 'PUT','class'=>"form-horizontal"]) !!}
{{ csrf_field() }}
        <div class="input-group">
            <input type="hidden" class="form-control mr-2 " name="mes" id="mes" value="{{ old('mes',$rec->meses_id) }}">
            <input type="number" class="form-control "  name="no" id="no" value="No editabel" >

            <input type="number" class="form-control mr-2 text-right" name="venta" id="venta" value="{{ old('venta',$rec->ventaRCV) }}" required onchange="sumasaldo();">
            <input type="number" class="form-control mr-2 text-right" name="otroing" id="otroing" value="{{ old('otroing',$rec->otroing) }}" required onchange="sumasaldo();">
            <p>-</p>
            <input type="number" class="form-control mr-2 text-right" name="compra" id="compra" value="{{ old('compra',$rec->compraRCV) }}" required onchange="sumasaldo();">
            <input type="number" class="form-control mr-2 text-right" name="remun" id="remun" value="{{ old('remun',$rec->remuneraciones) }}" required onchange="sumasaldo();">
            <input type="number" class="form-control mr-2 text-right" name="honora" id="honora" value="{{ old('honoa',$rec->honorarios) }}" required onchange="sumasaldo();">
            <input type="number" class="form-control mr-2 text-right" name="arriendo" id="arriendo" value="{{ old('arriendo',$rec->arriendos) }}" required onchange="sumasaldo();">
            <input type="number" class="form-control mr-2 text-right" name="otrogas" id="otrogas" value="{{ old('otrogas',$rec->otrogas) }}" required onchange="sumasaldo();">

            <input type="hidden" class="form-control mr-2 text-right" name="utmes" value="{{ old('utmes',$rec->utmes) }}" >
            <input type="number" class="form-control mr-2 text-right" name="saldo" id="saldo" value="{{ old('utmes',$rec->saldo) }}">

            <a href="{{ route('estadistica.index') }}"
               class="btn btn-outline-dark btn-sm"><i class="fa fa-undo"></i></a>
            <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-save"></i> Modificar</button>
        </div>
{!! Form::close() !!}

@section('script')
    @include('estadisticas.partials.script_esta')
@endsection
