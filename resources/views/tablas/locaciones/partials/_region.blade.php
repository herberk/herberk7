<!--Regiones-->
<div class="col-3">
    <div class="card border-success">
        <table class="table table-sm table-striped">
            <thead class="thead-dark">
            <th style= "width: 30px;">#</th>
            <th>Region</th>
            <th style= "width: 30px;">Ver</th>
            </thead>
            <tbody>
            @foreach($regiones as $region)
           <tr>
               <td>{{ $region->id }}</td>
               <td>{{ $region->name }}</td>
                <td><a href="{{ route('comunaspor', [$region->id]) }}"
                    data-toggle="tooltip"  title="Lista de comunas"><i class="fas fa-eye" style=color:#3729fa></i></a>
              </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
