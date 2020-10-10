{{--Incrustado en el edit de empresas para mostrar contactos--}}
{{-- <div class="col-12" id="flotante3" style="display:none;">
    <div class="card mb-2 text-right" id="close2"><a href="javascript:cerrar3();"><h5>Cerrar</h5></a>
        <div class="text-justify">
            <div class="form-row">
                <div class="col-5 mb-1"><u>Nombre Completo</u></div><div class="col-2"><u>Fono</u></div> <div class="col-4"><u>Correo Electronico</u></div>
            </div>
            @foreach ($contactos as $contacto)
                <div class="form-row">
                    <div class="col-5 mb-1">{{$contacto->name}}</div><div class="col-2">{{$contacto->fono}}</div>
                    <div class="col-5">{{$contacto->email}}</div>
                </div>
            @endforeach
        </div>
  </div>
</div>--}}

<div class="col-12" id="flotante3" style="display:none;">
    <div class="card mb-2 text-right">
        <div class="text-justify">
            <div class="form-row">
                <div class="col-3 mt-1"><u>Nombre</u></div>
                <div class="col-2 mt-1"><u>Telefonos</u></div>
                <div class="col-5 mt-1"><u>Email</u></div>
                <div class="col-1 mt-1" id="close"><a href="javascript:cerrar3();">Cerrar</a></div>
            </div>
{{--            @foreach($empresas->contacto as $contacto)--}}
                @foreach ($contactos as $contacto)
                <div class="form-row">
                    <div class="col-3 mt-1">{{$contacto->name}}</div>
                    <div class="col-2 mt-1">{{$contacto->fono}}</div>
                    <div class="col-5 mt-1">{{$contacto->email}}</div>
                </div>
            @endforeach
        </div>
    </div>
</div>