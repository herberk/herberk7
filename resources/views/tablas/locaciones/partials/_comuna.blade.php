 <!--Comunas-->
<div class="col-5">
    <div class="card border-success">

           <table class="table table-sm table-striped">
                <thead class="thead-dark">
                <th style= "width: 30px;">#</th>
                <th>Comunas</th>
                <th>Region</th>
              </thead>
                <tbody>
                @foreach($comunas as $comuna)
                    <tr>
                        <td>{{ $comuna->id }}</td>
                        <td>{{ $comuna->name }}</td>
                        <td>{{ $comuna->regiones->name }}</td>
                     </tr>
                @endforeach
                </tbody>
            </table>


        {{ $comunas->links() }}
        <p>Viendo página {{ $comunas->currentPage() }} de {{ $comunas->lastPage() }}</p>
    </div>
</div>








