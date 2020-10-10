<table class="table table-sm table-bordered table-striped" id="dataTable">
    <thead class="thead-dark">
        <tr>
           <th>#</th>
           <th style="width: 100px;text-align: center">RUT</th>
           <th>Nombre</th>
           <th>Empresa</th>
           <th style="width: 50px; text-align: center">N°Acc.</th>
           <th>Rep.</th>
           <th>%</th>
           <th style="width: 100px;text-align: center">Pagado</th>
           <th style="width: 100px;text-align: center">Pendiente</th>
           <th style="width: 100px;text-align: center">Aporte</th>
           <th style="width: 200px;text-align: center">Acciones</th>
      </tr>
    </thead>
    @foreach ($socios as $socio)
       <tr data-id="{{ $socio->id}}">
       <td>{{ $socio->id}}</td>
       <td style="text-align: right">{{ $socio->rut}}</td>
       <td>{{ $socio->name}}</td>
       <td>{{ $socio->empresas->name_corto}}</td>
       <td style="text-align: center">{{ $socio->acciones}}</td>
       <td style="text-align: center" >{{ $socio->rep_legal}}</td>
       <td style="text-align: center" >{{ $socio->porcen}}</td>
       <td style="text-align: right">{{ number_format($socio->apopago)}}</td>
       <td style="text-align: right">{{ number_format($socio->apopend)}}</td>
       <td style="text-align: right">{{ number_format($socio->aporte)}}</td>
        <td style="width: 200px;text-align: right">
          @if ($socio->trashed())
                <form action="{{ route('empresa.destroy', $socios) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('socio/restore', $socio->id) }}" class="btn btn-outline-secondary btn-sm"
                       data-toggle="tooltip"  title="Restaurar"><i class="far fa-window-restore"></i></a>
                    @slot('mensa', 'Elimina socio NO operativo')
                    <button type="submit" class="btn btn-outline-danger btn-sm"
                            data-toggle="tooltip"  title="Elimina ,- NO operativo"><i class="fas fa-times-circle"></i></button>
                </form>
            @else
                @if ($socio->notas !== "")
                    <a href="{{ route('socioshownotas', [$socio->id])}}" class="btn btn-outline-secondary btn-sm"
                       data-toggle="tooltip"  title="Notas con datos"><i class="fas fa-tasks"></i></a>
                @else
                    <a href="{{ route('socioshownotas', [$socio->id])}}" class="btn btn-outline-primary btn-sm"
                       data-toggle="tooltip"  title="Notas sin datos"><i class="fas fa-tasks"></i></a>
                @endif
                <a href="{{ route('socioedit',$socio)}}" class="btn btn-outline-success btn-sm"
                   data-toggle="tooltip"  title="Editar"><i class="fas fa-pencil-alt"></i></a>
                <a href="{{ route('socio/trash', [$socio->id]) }}" class="btn btn-outline-danger btn-sm"
                   data-toggle="tooltip"  title="Borrar"><i class="fas fa-trash fa-sm"></i></a>
            @endif
        </td>
    @endforeach
</table>
{{ $socios->links() }}
<p>Viendo página {{ $socios->currentPage() }} de {{ $socios->lastPage() }}</p>
