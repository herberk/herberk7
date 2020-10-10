   <div class="col-sm-6">  {{--el sm hace que se pongan uno sobre otro--}}
        <div class="card pt-2 px-2">
            @if ($view == 'show')
                <div class="row justify-content-center">
                    <div class="profile-header-img mb-4">
                        <img class="rounded-circle" src="/storage/logos/{{ $empresas->logo }}" width="150" height="150" />
                    </div>
                </div>
            @endif
            <p><strong>Nombre Corto</strong>: {{ $empresas->name_corto ?:'sin Nombre corto :(' }}</p>
            <p><strong>RUT</strong>: {{ $empresas->rut }}</p>
            <p><strong>Domicilio</strong>: {{ $empresas->direccion ?:'sin direccion :(' }}</p>
            <p><strong>Tipo</strong>: {{ $empresas->tipo ?:'sin tipo :(' }}</p>
            <p><strong>Fecha de registro</strong>: {{ \Carbon\Carbon::parse($empresas->created_at)->format('d-m-Y') }}</p>
            <p><strong>Acvtvidad</strong>: {{ $empresas->actividad ?:'sin actividad :('}}</p>  <!-- ?:'sin actividad :('-->
            <p><strong>Region</strong>: {{ $empresas->region ?:'sin Region :('}}</p>
            <p><strong>Comuna</strong>: {{ $empresas->comuna ?:'sin comuna :('}}</p>
            <p><strong>Ciudad</strong>: {{ $empresas->ciudad ?:'sin ciudad :('}}</p>
            <p><strong>Telefono</strong>: {{ $empresas->fono ?:'sin fono:('}}</p>
            <p><strong>Código Zip</strong>: {{ $empresas->codpostal ?:'sin Zip:('}}</p>
            <p><strong>Correo Email</strong>: {{ $empresas->email ?:'sin email:('}}</p>
        </div>
       @if ($view == 'show')
           <div class="col-10">
               <div class="form-group">
                   <label for="comment">Notas:</label>
                   <textarea readonly class="form-control" rows="6" id="editor1">{{$empresas->notas}}</textarea>
               </div>
           </div>
       @else

       @endif

    </div>
    <div class="col-sm-6">
        <div class="card pt-2 px-2">
            <h5 class="ml-4"><strong>Datos del SII</strong> </h5>
            <p><strong>Capital</strong>: {{ $empresas->capital ?:'sin Capital :(' }}</p>
            <p><strong>Fecha de Inicio Actividades</strong>: {{ \Carbon\Carbon::parse($empresas->fe_inicio)->format('d-m-Y') }}</p>
            <p><strong>Tipo de Tributacion</strong>: {{ $empresas->tipo_tri ?:'sin especificar :('}}</p>
            <p><strong>Segmento de la empresa</strong>: {{ $empresas->segmento ?:'sin especificar :('}}</p>
            <p><strong>Codigo actividad</strong>: {{ $empresas->codigo ?:'sin especificar :('}}</p>
            <p><strong>Actividad o Giro</strong>: {{ $empresas->giro ?:'sin especificar :('}}</p>
           {{-- <p><strong>habilidades</strong>: {{ $user->skills->implode('name', ', ')?:'sin habilidades :(' }}</p>
            <p><strong>Activo</strong>: {{ ($user->active)?'Si':'No'}}<span class="status st-{{ $user->state }}"></span></p>--}}
            <h5 class="ml-4"><strong>Informacion sobre constitucion social</strong> </h5>
            <p><strong>Notaria</strong>: {{ $empresas->notario ?:'sin especificar :(' }}</p>
            <p><strong>Repertorio</strong>: {{ $empresas->repertorio ?:'sin especificar :(' }}</p>
            <p><strong>Fecha de la escritura</strong>: {{ \Carbon\Carbon::parse($empresas->fe_notario)->format('d-m-Y') }}</p>
            <p><strong>Edicion diario Of.</strong>: {{ $empresas->nro_edicion ?:'sin especificar :(' }}</p>
            <p><strong>Fecha publicacion diario Of.</strong>: {{ \Carbon\Carbon::parse($empresas->fe_diario)->format('d-m-Y') }}</p>
            <p><strong>Registro de comercio</strong>: {{ $empresas->reg_comercio ?:'sin especificar :(' }}</p>
            {{-- 3°seccion derecha  con los socios --}}
            @if ($view == 'show')
                <div class="card mt-2 ">
                    <h5 class="ml-4"><strong> Socios o accionistas de la empresa </strong><a href="javascript:mostrar4();"> Mostrar</a></h5>
                    @include('empresas.partials._fieldsocios')
                </div>   <!-- fin card-->
            @else
                <div class="card mt-2 ">
                    <h5 class="ml-4"><strong> Socios o accionistas de la empresa </strong><a href="javascript:mostrar4();"> Mostrar</a></h5>
                    @include('empresas.partials._fieldsocios')
                </div>   <!-- fin card-->
            @endif
            {{-- 3°seccion derecha  Bancos --}}
            @if ($view == 'show')
                <div class="card mt-2 ">
                    <h5 class="ml-4"><strong> Instituciones Bancarias de la empresa </strong><a href="javascript:mostrar1();"> Mostrar</a></h5>
                    @include('empresas.partials._fieldsbancos')
                </div>   <!-- fin card-->
            @endif
            @if ($view == 'show')
                <div class="card mt-2 ">
                    <h5 class="ml-4"><strong>Declaraciones Juradas anuales </strong><a href="javascript:mostrar2();"> Mostrar</a> </h5>
                    @include('empresas.partials._fieldsjuradas')
                </div>   <!-- fin card-->
            @endif
            @if ($view == 'show')
              <div class="card" >
                    <h5 class="ml-4"><strong>Personas de contacto de la empresa</strong><a href="javascript:mostrar3();"> Mostrar</a> </h5>
                      @include('empresas.partials._contacto')
              </div>
            @endif

        </div>
    </div>

