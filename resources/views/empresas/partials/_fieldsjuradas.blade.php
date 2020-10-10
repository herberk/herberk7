<div class="col-12" id="flotante2" style="display:none;">
    <div class="card mb-2 text-right" >
        <div class="text-justify">
            <div class="form-row">
                <div class="col-4 mt-1"><u>N° Descripcion</u></div>
                <div class="col-2 mt-1"><u>Vencimiento</u></div>
                <div class="col-1 mt-1"><u>Cert.</u></div>
                <div class="col-2 mt-1"><u>Vence Cert.</u></div>
                <div class="col-2 mt-1"><u>Estado.</u></div>
                <div class="col-1 mt-1" id="close"><a href="javascript:cerrar2();">Cerrar</a></div>
                {{--<div class="note">{{ $empresas->juradas->implode('desc_corta', ', - ') }}</div>--}}
            </div>

            @foreach($empresas->juradas as $jura)
                {{--{{dd($jura)}}--}}
                <div class="form-row">
                    <div class="col-4 mt-1">{{$jura->desc_corta}}</div>
                    <div class="col-2 mt-1">{{$jura->fe_vence}}</div>
                    <div class="col-1 mt-1">{{$jura->certificado}}</div>
                    <div class="col-2 mt-1">{{$jura->fe_certifica}}</div>
                    <div class="col-3 mt-1">{{$jura->pivot->estado}}</div>
                    {{--<div class="note">{{ $empresas->juradas->implode('desc_corta', ', - ') }}</div>--}}
                </div>
            @endforeach
        </div>
    </div>
</div>