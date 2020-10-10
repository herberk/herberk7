<table class="table table-sm">
    <div class="table-responsive-lg">
        <thead class="thead-dark">
        <tr>
            {{--     <th scope="col"># </th>--}}
            <th>Fecha</th>
            <th>Modulo </th>
            <th>Accion </th>
            <th>Usuario </th>
            <th >Detalle de acciones </th>
        </tr>
        </thead>
        @if ($activites->isNotEmpty())
            <tbody>
            @each('varias.partials._rowActivity', $activites, 'activites')
            </tbody>

        @else
            <tr>
                <td colspan="4" class="text-center">No hay Actividades  guardadas en DB.</td>
            </tr>

        @endif
    </div>
</table>

