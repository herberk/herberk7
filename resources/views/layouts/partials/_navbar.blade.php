<nav class="navbar navbar-expand-md navbar-light navbar-laravel fixed-top" id="mainNav">
{{--    <a id="profit" class="navbar-brand" href="{{ url('/') }}">--}}
    <a href="{{ url('/') }}">
{{--    <img  src="/storage/images/hb.png" width="23" height="23" />--}}
    <img  src="/images/hb.png" width="23" height="23" />
    </a>
     <a id="profit" class="navbar-brand" href="{{ url('/home') }}">
       <strong>&nbsp;
           {{ setting('company') }}
       </strong>
    </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <strong>Año: {{ setting('ano') }}</strong>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @include('setting._selectano')
                    </div>
                </li>

                <li class="nav-item {{! Route::is('home')?:'active'}}">
                    <a class="nav-link" href="{{ route('home') }}"><i class="fas fa-desktop" style=color:Tomato></i><strong>  Escritorio</strong></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-fw fa-table" style=color:#3729fa></i> <strong> Tablas</strong>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('/locaciones') }}">Regiones Comunas Ciudades</a>
                        <a class="dropdown-item" href="{{ url('/giros') }}">Giros o Actividades SII</a>
                        <a class="dropdown-item" href="{{ url('/categorias') }}">Categorias e Items</a>
                        <a class="dropdown-item" href="{{ url('/listaunidad') }}">Valures e Indices</a>
                        <div class="dropdown-divider"></div>
                         <a class="dropdown-item" href="{{ url('atributo/Exports') }}"><i class="far fa-file-excel"></i> Listado Categorias</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-building" style=color:#e4c40a></i>
                        <strong> Empresas</strong>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('empresaindex')}}"><i class="far fa-list-alt"></i> Lista Empresas</a>
                        <a class="dropdown-item" href="{{ url('empresa/papelera')}}">Papelera Empresa</a>
                        <a class="dropdown-item" href="{{ url('creatempresa')}}">Nueva Empresa</a>
                         <div class="dropdown-divider"></div>
{{--                        <a class="dropdown-item" href="{{ url('/contactos') }}"><i class="far fa-list-alt"></i> Lista de Contactos</a>--}}
                        <a class="dropdown-item" href="{{ url('listacontactos') }}"><i class="far fa-list-alt"></i> Lista de Contactos</a>
                        <a class="dropdown-item" href="{{ url('listasocios') }}"><i class="far fa-list-alt"></i> Lista de Socios</a>
                        <a class="dropdown-item" href="{{ url('bancos/index') }}"><i class="far fa-list-alt"></i> Lista de Bancos</a>
                         <a class="dropdown-item" href="{{ url('/capital') }}"><i class="far fa-list-alt"></i> Lista de Capital Propio</a>
                        <a class="dropdown-item" href="{{ url('/juradas') }}"><i class="far fa-list-alt"></i> Lista D.Juradas</a>
                        <a class="dropdown-item" href="{{ url('/infojuradas') }}">Lista empresas y sus Juradas </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('empresa/excel') }}"><i class="far fa-file-excel"></i> Listado de Empresas</a>
                        <a class="dropdown-item" href="{{ route('socioexcel') }}"><i class="far fa-file-excel"> </i> Listado de Socios</a>
                        <a class="dropdown-item" href="{{ url('jurada/Exports') }}"><i class="far fa-file-excel"></i> Listado D. Juradas</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-archive" style=color:#80202b></i>
                        <strong> Archivos</strong>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('file/show')}}">Lista empresas y sus archivos</a>
                        <a class="dropdown-item" href="{{ url('listacategori')}}"><i class="far fa-list-alt"></i> Lista de directorios</a>
                        <a class="dropdown-item" href="{{ url('fileslista')}}"><i class="far fa-list-alt"></i> Lista de archivos</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-chart-line" style=color:#b31e9f></i>
                        <strong> Estadisticas</strong>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <a class="dropdown-item" href="{{ url('estadistica')}}"><i class="far fa-list-alt"></i> Lista de Estadisticas</a>

                    </div>
                </li>

            </ul>
          {{--  <ul class="navbar-nav ml-auto" >
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user fa-fw" style=color:#116a0d></i><strong> Usuarios</strong>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('/usuarios') }}">Lista de Usuarios</a>
                        <a class="dropdown-item" href="{{ url('/usuarios/papelera') }}">Papelera de Usuarios</a>
                        <a class="dropdown-item" href="{{ url('/usuarios/nuevo') }}">Nuevo Usuario</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('/habilidades') }}">Lista de Habilidades</a>
                        <a class="dropdown-item" href="{{ url('/profesiones') }}">Lista de Profesiones</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('Exports',[$user='0',$pd='0']) }}"><i class="far fa-file-excel"></i> Listado Usuarios</a>

                    </div>
                </li>
            </ul>--}}

            <!-- Right Side Of Navbar -->

            <ul class="navbar-nav ml-auto">

                <a href="accesdir" class="btn btn-outline-dark btn-sm mx-1"><span class="badge badge-dark"> <i class="fa fa-elementor"></i></a>

  {{--         boton de configuracion y actividades       --}}
                <ul class="navbar-nav ml-auto" >
                    <li class="nav-item dropdown">
                        <a class="btn btn-outline-dark btn-sm" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-cog"></i></a>
                        </a>
                         <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('settings') }}">Configuraciones</a>
                            <a class="dropdown-item" href="{{ route('activiti') }}">Lista actividades</a>
                        </div>
                    </li>
                 </ul>
{{--         boton de mensajes       --}}

               <ul class="navbar-nav ml-auto" >
                    <li class="nav-item dropdown">
                        <a class="btn btn-outline-dark btn-sm" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="far fa-bell"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="ver-msge">Mensajes externos</a>
                            <a class="dropdown-item" href="{{ route('chatear') }}">Chat usuarios</a>
                        </div>
                    </li>
                </ul>
                <a>&nbsp;</a>
                <!-- Authentication Links      $mess}} -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    </li>
                @else

                 <img src="/storage/avatars/{{ Auth::user()->avatar }}" width="25" height="23" class="img-circle" />
                    <li class="nav-item dropdown" >
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <strong> {{ Auth::user()->nickname }}</strong> <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" >
                            <div class="row justify-content-center">

                               <img class="rounded-circle" src="/storage/avatars/{{ Auth::user()->avatar }}" width="100" height="100" />
                            </div>
                            <div class="row justify-content-center mt-2">
                                <p> {{ Auth::user()->name }}<p>
                            </div>
                            <div class="row justify-content-center">
                                <a class="dropdown-item" href="{{ url('/habilidades') }}">Lista de Habilidades</a>
                                <a class="dropdown-item" href="{{ url('/profesiones') }}">Lista de Profesiones</a>
                                <a class="dropdown-item" href="{{ url('/usuarios') }}"><i class="far fa-list-alt"></i> Lista de Usuarios</a>
                                <a class="dropdown-item" href="{{ route('Exports',[$user='0',$pd='0']) }}"><i class="far fa-file-excel"></i> Listado Usuarios</a>

                            </div>
                            <div class="dropdown-divider"></div>
                                <div class="float-left">
                                    <a class="dropdown-item" href="{{ url('/profile') }}" >Ver Foto</a>
                                 </div>
                                <div class="float-right">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();"> {{ __('Salir') }}  </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                    </li>
                @endguest
            </ul>
        </div>
</nav>

