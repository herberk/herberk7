{{--Listado de categorias.  Es ilimitado en cuanto a ingresar, contiene items o tipos de datos--}}
@extends('layouts.app')
@section('title',"Categorias y atributos")
@section('content')
<div class="col-md-10">
    <div class="card border-success">
        <div class="d-flex justify-content-between align-items-end">
            <h2 >
                <i class="fas fa-fw fa-table" style=color:#3729fa></i>
                Categorias e Items
            </h2>
            <p>
                <p>
                    @include('shared._errors')
                    @include('shared._message-er')
                    @include('shared._message-su')
                </p>
            <p>
                <a href="{{ route('newcategorias') }}" class="btn btn-sm  btn-outline-dark mt-1 mr-1"></i> Nueva Categoria </a>

            </p>
        </div>

        <div class="card border-success">
            <?php $pos=0 ?>
            <div class="accordion" id="accordionExample">
                @foreach($categorias as $categoria)
                    <?php $pos=$pos+1 ?>
                <div class="card">
                    <div class="card-header" id="heading-{{$pos}}">
                       <div class="form-row ">
                              <div class="col-sm-3">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-{{$pos}}" aria-expanded="true" aria-controls="collapse-{{$pos}}">
                                        <strong>{{$categoria->name}}</strong>
                                    </button>
                             </div>
                             <div class="col-sm-3">
                                <button class="btn btn-link"> <a href="{{ route('editarcat', [$categoria->id]) }}"
                                    data-toggle="tooltip"  title="Modifica categorias"><i class="fas fa-pencil-alt" style=color:#15be0e></i></a></button>
                                 <button class="btn btn-link"> <a href="{{ route('eliminarcat', [$categoria->id]) }}"
                                    data-toggle="tooltip"  title="Eliminar categorias"><i class="fas fa-trash" style=color:Tomato></i></a></button>
                                 <button class="btn btn-link"> <a href="{{ route('newitem', [$categoria->id]) }}"
                                     data-toggle="tooltip"  title="Nuevo Item"><i class="far fa-plus-square" style=color:black></i></a></button>
                             </div>
                     </div>
                  </div>
                    <div id="collapse-{{$pos}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <table>
                            <thead>
                                <th style= "text-align: center;">Items</th>
                                </thead>
                            @foreach($items as $item)
                                  @if($categoria->id==$item->categoria_id)
                                    <tr >
{{--                                        <td>{{ $categoria->id}}</td>--}}
                                        <td style= "width: 300px;">{{$item->name}}</td>
                                        <td style= "width: 80px;">{{$item->codigo}}</td>
                                        <td>
                                            <button class="btn btn-link"> <a href="{{ route('editaritem', [$item->id,$categoria->id]) }}"
                                                    data-toggle="tooltip"  title="Modifica Item"><i class="fas fa-pencil-alt" style=color:#15be0e></i></a></button>
                                        </td>

                                        <td>
                                            <button class="btn btn-link"> <a href="{{ route('eliminaritem', [$item->id,$categoria->id]) }}"
                                                   data-toggle="tooltip"  title="Eliminar Item"><i class="fas fa-trash" style=color:Tomato></i></a></button>
                                        </td>
                                    </tr>
                                    @endif

                            @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
