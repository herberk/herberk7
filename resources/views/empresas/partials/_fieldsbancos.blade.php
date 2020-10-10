<div class="col-12" id="flotante1" style="display:none;">
    <div class="card mb-2 text-right">
        <div class="text-justify">
            <div class="form-row">
                <div class="col-3 mt-1"><u>Nombre</u></div>
                <div class="col-2 mt-1"><u>N° cta</u></div>
                <div class="col-5 mt-1"><u>Firman</u></div>
                <div class="col-1 mt-1"><u>Monto</u></div>
                <div class="col-1 mt-1" id="close"><a href="javascript:cerrar1();">Cerrar</a></div>
            </div>
            @foreach($empresas->bancos as $banco)
                {{--{{dd($jura)}}--}}
                <div class="form-row">
                    <div class="col-3 mt-1">{{$banco->name}}</div>
                    <div class="col-2 mt-1">{{$banco->ctacte}}</div>
                    <div class="col-5 mt-1">{{$banco->firman}}</div>
                    <div class="col-2 mt-1">{{$banco->montoLin}}</div>
                </div>
            @endforeach
        </div>
    </div>
</div>