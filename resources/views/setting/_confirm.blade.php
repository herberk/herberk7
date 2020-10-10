<div class="row">
    <div class="col-md-12blog-main">
        <h3 class="pb-4  text-center border-bottom">
            La empresa seleccionada: {{ setting('company' ) }}
        </h3>
        <h3 class="text-center">
            El año de Tabajo es: {{setting( 'ano')}}
        </h3>
    </div>
    <a href="{{ route('home') }}" class="btn btn-outline-success btn-lg btn-block">Aceptar</a>
</div>


