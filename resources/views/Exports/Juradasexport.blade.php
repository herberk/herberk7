<table class="table">
   <thead>
        <tr>
          <th></th>
          <th> Nomnia de Declaraciones juradas</th>
        </tr>
    </thead>
    <tbody>
    <?php $pos=1 ?>
        @foreach($empresas as $empresa)
            <tr>
                <td>{{ $empresa->rut  }}</td>
                <td>{{  $empresa->name }}</td>
            </tr>
            <tr>
                <td>#</td>
                <td>Declaracion jurada</td>
                <td>Vencimiento</td>
                <td>Estado</td>
                <td>Folio</td>
            </tr>
             @foreach($empresa->juradas as $jura)
              <tr>
                     <?php $pos++ ?>
                     <td> {{$jura->pivot->id}}</td>
                     <td> {{$jura->desc_corta}}</td>
                     <td>{{DATE_FORMAT( date_create($jura->fe_vence),"d/m/Y")}}</td>
                     <td> {{$jura->pivot->estado}}</td>
                     <td> {{$jura->pivot->folio}}</td>
              </tr>
            @endforeach
        @endforeach
     </tbody>
</table>
<table class="table">
    <thead>
    <tr>
        <th>Total Declaraciones: </th>
        <th>{{ $pos  }}</th>
    </tr>
    </thead>
</table>