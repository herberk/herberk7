@extends('layouts.app')
@section('title', 'Indices')

@section('content')
<div class="col-md-12">
    <div class="card card">
        <div class="d-flex justify-content-between align-items-end">
                <h2 >
                    <i class="fas fa-fw fa-table" style=color:#3729fa></i>
                    {{ trans("trans.titleindice.{$view}") }}
                </h2>
                @include('shared._errors')
                @include('shared._message-er')
                @include('shared._message-su')

            </p>
            <p>

                <a href="{{ route('insertano') }}" class="btn btn-sm  btn-outline-dark mt-1" ></i> Nuevo Año </a>
                <button type="button" class="btn btn-primary mt-1" data-toggle="modal" data-target="#exampleModal">
                    Importar valores
                </button>
                <a class="btn btn-primary mt-1 mr-1" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fas fa-info"> </i> Info.
                </a>
            </p>
        </div>
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <textarea  rows="5">
                {{$helps->notes}}
              </textarea>
            </div>
        </div>
                 @if ($valores->isNotEmpty())
                    @include('tablas.indices.partials._row')
                @else
                    <div class="mt-3" > <strong>No hay datos registrados para el año.{{ $elano }}</strong>  </divc>
                 @endif
          </div>
         <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Importar archivo Excel</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('import') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                           <div class="d-flex  p-4 justify-content-between  text-white">
                                <div class="p-2 bg-info"><input  type="file" class="form-control" name="file" ></div>
                            </div>
                         </div>
                        <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                             <button class="btn btn-primary">Importar valores</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
    <script>
        // function helpme() {
        //     var mi = 1;
        //           $.getJSON('buscahelp/'+mi, null, function (values) {
        //               document.getElementById("demo").innerHTML = (values);
        //
        //            //   alert(mi);.value=Object.values(values);
        //           });
        // }
      $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            });

            $('.xedit').editable({
                url: '{{url("unidad/update")}}',
                title: 'Update',
                success: function (response, newValue) {
                    console.log('Updated', response)
                }
            });
        })

    </script>
@endsection
