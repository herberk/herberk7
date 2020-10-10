<div class="col-12" id="flotante4" style="display:none;">
    <div class="card mb-2 text-right" >
        <div class="text-justify">
            <div class="form-row">
                <div class="col-2 mt-1"><u> RUT</u></div>
                <div class="col-4 mt-1"><u>Nombre</u></div>
                <div class="col-1 mt-1"><u>Rep.</u></div>
                <div class="col-1 mt-1"><u>%</u></div>
                <div class="col-1 mt-1" style="text-align: center"><u>Pagado</u></div>
                <div class="col-2 mt-1" style="text-align: center"><u>Aporte.</u></div>
                <div class="col-1 mt-1" id="close"><a href="javascript:cerrar4();">Cerrar</a></div>
                {{--<div class="note">{{ $empresas->juradas->implode('desc_corta', ', - ') }}</div>--}}
            </div>

            @foreach($empresas->socios as $socio)
                {{--{{dd($jura)}}--}}
                <div class="form-row">
                    <div class="col-2 mt-1">{{$socio->rut}}</div>
                    <div class="col-4 mt-1">{{$socio->name}}</div>
                    <div class="col-1 mt-1">{{$socio->rep_legal}}</div>
                    <div class="col-1 mt-1">{{$socio->porcen}}</div>
                    <div class="col-2 mt-1" style="text-align: right">{{number_format($socio->apopago)}}</div>
                    <div class="col-2 mt-1" style="text-align: right">{{number_format($socio->aporte)}}</div>
                    {{--<div class="note">{{ $empresas->juradas->implode('desc_corta', ', - ') }}</div>--}}
                </div>
            @endforeach
            <div  style="text-align: right">Capital: {{number_format($capital)}}</div>

        </div>
    </div>
</div>