<div class="text-center my-2">
     {{--@tooltip--}}
    {{--@slot('mensa', 'Ver o editar Notas de empresa')--}}
    {{--<a href="{{ route('logo', [$empresas->id]) }}" class="btn btn-outline-secondary btn-sm"> <i class="fas fa-crop" style=color:#3729fa></i> Cambiar Logotipo</a>--}}
    {{--@endtooltip--}}
    <a href="{{ route('juradas.index') }}"
       class="btn btn-outline-dark btn-sm"><i class="fa fa-undo"></i> Regresar a lista de declaraciones juradas </a>
    <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-save"></i> Modifica declaracion</button>
</div>