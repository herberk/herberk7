<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.partials._head')
<body>
    <div id="app">
       @include('landing.partials._navbar')
        <div class="row">

            <main class= "col-md-12 container-fluid py-1">   {{-- separa la parte superior del nav --}}
               @yield('content')

            </main>
        </div>

    </div>
</body>
</html>
