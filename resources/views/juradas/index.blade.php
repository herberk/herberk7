@extends('layouts.app')

@section('title', 'Juradas')
@section('content')
<div class="d-flex justify-content-between align-items-end">
    <h2 class="pb-1"> <i class="fas fa-building" style=color:#e4c40a></i> {{ trans("trans.titlejurada.{$view}") }}</h2>
    <a href="{{ route('createjurada') }}" class="btn btn-dark">Nueva Declaracion Jurada</a>
</div>

<table class="table table-sm table-striped">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Nº y Nombre declaracion Jurada </th>
        <th scope="col">Vencimiento</th>
        <th scope="col">Certificadoa</th>
        <th scope="col" style= "width: 650px;">Descripcion</th>
        <th scope="col" style= "width: 200px;"> Acciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($juradas as $jurada)
        <tr>
            <th>{{ $jurada->desc_corta }}</th>
            <td>{{DATE_FORMAT( date_create($jurada->fe_vence),"d/m/Y")}}</td>
            <td>
                <span class="note">Nº Certificado: {{ $jurada->certificado }} </span>
                <span class="note">Fecha : {{DATE_FORMAT( date_create($jurada->fe_certifica),"d/m/Y")}}</span>
            </td>
            <th>{{ $jurada->descripcion }}</th>
            <td>

                @slot('mensa', 'Ver plantilla formulario')
                <a href="{{ route('juradashownotas', [$jurada, $tip='0'])}}" class="btn btn-outline-primary btn-sm"
                   data-toggle="tooltip"  title="Ver plantilla formulario">  <i class="fas fa-info-circle"></i> Plantilla</a>

                <a href="{{ route('juradashownotas', [$jurada, $tip='1'])}}" class="btn btn-outline-secondary btn-sm"
                   data-toggle="tooltip"  title='Ver instructivo SII'><i class="fas fa-info-circle"></i>Instructivo</a>

                <a href="{{ route('juradaedit', [$jurada->id]) }}" class="btn btn-outline-success btn-sm"
                   data-toggle="tooltip"  title='Edita Declaracion Jurada'><i class="fas fa-pencil-alt"></i></a>


            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $juradas->links() }}
<p>Viendo página {{ $juradas->currentPage() }} de {{ $juradas->lastPage() }}</p>
@endsection
