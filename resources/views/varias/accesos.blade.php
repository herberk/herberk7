<div class="card border-success my-2">
    <div class="card-header"><strong>Accesos directos </strong></div>
    <div class="card-body text-center">
        <table class="table table-sm text-left">
            <thead class="thead-dark">
            <strong>Seleccione accesos directos</strong>
            <small id="fileHelp" class="form-text text-muted mt-2">Para acceder directamente a seccion, haga Clik sobre su nombre</small>
            </thead>
            @foreach ($accesdirs as $key =>$acces)
                <tr data-id="{{ $key}}">
                    <td >{{ $key+1 }}</td>
                    <td><a href="{{ $acces->ruta }}">{{ $acces->name }}</a></td>
                </tr>
            @endforeach
        </table>
        <a href="{{ route('home') }}"
           class="btn btn-outline-dark btn-sm"><i class="fa fa-undo"></i> Regresar al escritorio</a>
    </div>
</div>

