<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Herberk</title>
    <link rel="stylesheet" href="http://www.expertphp.in/css/bootstrap.css" type="text/css" media="all" />
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Styles -->
    <style>

        html, body {
            background-color:#f5f8fa;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 94px;
        }

        .links > a {
            color: #fcf8f7;
            padding: 0 25px;
            font-size: 16px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
        .header {
            background: url(../images/bg-masthead.jpg) no-repeat center;
            background-color: transparent !important;
            background-size: cover;
            min-height: 100vh;
        }

    </style>
    <script src="http://demo.expertphp.in/js/jquery.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    {!! NoCaptcha::renderJs() !!}
</head>
<body>
<header class="header">
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>

                @else
                    <a href="{{ url('/') }}">Home</a>
                    <a href="contact-us">Contacto</a>
                    <a href="{{ route('login') }}">Login</a>
                @endauth
            </div>
        @endif
            {{--<div class="row justify-content-center">--}}
          <div class="col-md-8">
              <div class="panel panel-primary">
                  <div class="panel-heading"><h4>Formulario para contacto:<strong>  Hermann Berkhoff Felis</strong></h4></div>
                       <div class="panel-body">
                          <div class="col-md-4">
                              <div class="card-body text-center">
                                 <i class="fa fa-globe fa-5x text-success"></i>
                                  <p><i class="fas fa-mobile fa-2x text-primary"></i> Mov. 9-87695505<br/>
                                      <i class="fas fa-phone fa-2x text-primary"></i> Fono (56)45-2294321<br/></p>
                                    <p class="lead ">
                                      Diego Portales 1383,<br/>
                                      Temuco,<br/>
                                      Chile </p>
                                  <i class="fab fa-laravel fa-3x text-danger"></i>
                                  <p class="card-text"></p>
                                  <a href="{{ route('login') }}" class="btn btn-primary">Ve a algún lugar</a>
                              </div>

                          </div>
                          <div class="col-md-8">

                            {!! Form::open(array('route' => 'postcontact','method'=>'POST')) !!}
                                <div class="form-group">
                                    <strong>Nombre::</strong>
                                    {!! Form::text('name', null, array('placeholder' => 'Nombre completo','class' => 'form-control')) !!}
                                    {!! $errors->first('name', '<span class="invalid-feedback text-danger" role="alert">:message</span>') !!}
                                </div>
                                <div class="form-group">
                                    <strong>Email:</strong>
                                    {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                                   {!! $errors->first('email', '<span class="invalid-feedback text-danger" role="alert">:message</span>') !!}
                                </div>
                                <div class="form-group">
                                    <strong>Mensaje:</strong>
                                    {!! Form::textarea('message', null, array('placeholder' => 'Mensaje de 255 caracteres','class' => 'form-control','style'=>'height:100px')) !!}
                                    {!! $errors->first('message', '<span class="invalid-feedback text-danger" role="alert">:message</span>') !!}
                                </div>
                                      <input id="user_id" name="user_id" type="hidden" value=1>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    {!! Form::submit('Enviar',['class'=>'btn btn-success']) !!}
                                </div>
                                 <input type="hidden" id="custId" name="tipo" value="2">
                                  <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                      <label class="col-md-4 control-label">Captcha</label>
                                      <div class="col-md-12">
                                          {!! app('captcha')->display() !!}
                                          @if ($errors->has('g-recaptcha-response'))
                                              <span class="help-block text-danger">
                                               <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                             </span>
                                          @endif
                                      </div>
                                  </div>
                            {!! Form::close() !!}
                        </div>
                     </div>
                  </div>
              </div>
            <script>
            @if(Session::has('message'))
                var type = "{{ Session::get('alert-type', 'info') }}";
                switch(type){
                    case 'info':
                        toastr.info("{{ Session::get('message') }}");
                        break;

                    case 'warning':
                        toastr.warning("{{ Session::get('message') }}");
                        break;
                    case 'success':
                        toastr.success("{{ Session::get('message') }}");
                        break;
                    case 'error':
                        toastr.error("{{ Session::get('message') }}");
                        break;
                }
                @endif
            </script>
    </div>
</header>
</body>
</html>
