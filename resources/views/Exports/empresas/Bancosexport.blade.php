<table class="table">
    <thead>
    <tr >
        <th>#</th>
        <th style="width: 15px">Empresa</th>
        <th style="width: 15px">Nombre Banco</th>
        <th style="width: 20px;text-align: center">N# Cta. Cte.</th>
        <th style="width: 60px">Personas que firman</th>
        <th >Monto linea.</th>
     </tr>
    </thead>
    <tbody>
    @forelse($bancos as $banco)
        <tr>
            <th>{{ $banco->id }}</th>
            <td>{{ $banco->empresas->name_corto }}</td>
            <td>{{$banco->name}}</td>
            <td style="text-align: right">{{ $banco->ctacte }}</td>
            <td>{{ $banco->firman }}</td>
            <td style="text-align: right">{{$banco->montoLin}}</td>

        </tr>
    @empty
        <tr>
            <td colspan="3" class="text-center">No hay Datos  guardadas en DB.</td>
        </tr>
    @endforelse
    </tbody>
</table>
