@extends('layouts.app')
@section('title', "Configuracion")

@section('content')
 <div class="col-md-12 col-md-offset-3">
        <div class="d-flex justify-content-between align-items-end mb-2">
            <h2 class="pb-1">
                <i class="fas fa-cog" style=color:#505050></i>
                 Configuraciones
            </h2>
            <p>
                <a href="{{ route('cacheclear') }}" class="btn btn-sm  btn-outline-warning"><i class="fas fa-sync-alt"></i> Refrescar </a>
                <a href="{{ route('exportset') }}" class="btn btn-sm  btn-outline-success"><i class="fas fa-file-excel"></i> Exportar Xlsx </a>
                <a href="{{ route('config') }}" class="btn btn-outline-dark btn-sm"> <i class="fas fa-cog"> Modificar</i></a>
            </p>
        </div>
        <h5 class="card-title"> Para la Empresa:  {{ setting('company') }}</h5>
        <p class="card-text"> Aquí están los valores de configuración actuales almacenados en la base de datos. </p>
        <table class="table table-sm">
            <tr>
                <thead class="thead-dark">
                <th>Configuracion</th>
                <th>Valor</th>
                <th>Accessor</th>
                </thead>
            </tr>
            @forelse($settings as $setting)
                <tr>
                    <td>{{ $setting->name }}</td>
                    <td>{{ $setting->val }}</td>
                    <td><code>\setting('{{ $setting->name }}')</code></td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">No hay configuraciones guardadas en DB.</td>
                </tr>
            @endforelse
        </table>
 </div>


@endsection
