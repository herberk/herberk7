<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.partials._head')
<body>
    <div id="app">
        @php($mess = 'Caza y pesca')
       @php(config(['app.nombrempresa' => $mess]))

       @include('layouts.partials._navbar',['value' => 'data'])
        <div class="row mx-1">
             <main class= "col-12 mt-5">   {{-- separa la parte superior del nav --}}
               @yield('content')
            </main>
        </div>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/toastr.js') }}"></script>
    <script src="{{ asset('js/jquery.easy-autocomplete.js') }}"></script>
    <script src="{{ asset('js/bootstrap-editable.min.js') }}"></script>
    <script src="{{ asset('vendors/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.es.min.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
 {{--   <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/messages/messages.es-es.js" type="text/javascript"></script>--}}

     {!! Toastr::render() !!}

    @yield('script')
</body>
</html>
