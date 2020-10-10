<form class="form-horizontal" method="POST" action="{{ route('estadisticastore') }}" >
   {{ csrf_field() }}
    <div class="input-group">
        {!! Form::select('mes',config('options.mes'),null, ['class'=>'form-control-sm py-1','id' => 'selectmes']) !!}
        <input type="hidden" class="form-control "  name="no" id="no" value="No editabel" >
        <p>-</p>
        <input type="number" class="form-control mr-2 text-right" name="venta" id="venta" value=0 onchange="sumasaldo();" required >
        <input type="number" class="form-control mr-2 text-right" name="otroing" id="otroing" value=0 onchange="sumasaldo();" required>
        <p>-</p>
        <input type="number" class="form-control mr-2 text-right" name="compra" id="compra" value=0  onchange="sumasaldo();">
        <input type="number" class="form-control mr-2 text-right" name="remun" id="remun"  value=0 onchange="sumasaldo();">
        <input type="number" class="form-control mr-2 text-right" name="honora" id="honora" value=0  onchange="sumasaldo();">
        <input type="number" class="form-control mr-2 text-right" name="arriendo" id="arriendo" value=0  onchange="sumasaldo();">
        <input type="number" class="form-control mr-2 text-right" name="otrogas"  id="otrogas" value=0  onchange="sumasaldo();">

        <input type="hidden" class="form-control mr-2 text-right" name="utmes"  id="utmes" value="">
        <input type="number" class="form-control mr-2 text-right" name="saldo" id="saldo" value="" >
        <input type="hidden" class="form-control mr-2 text-right" name="ano"  id="ano" value="{{setting('ano')}}">
        <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-save"></i> Guardar</button>
    </div>
</form>


@section('script')
    @include('estadisticas.partials.script_esta')
@endsection
