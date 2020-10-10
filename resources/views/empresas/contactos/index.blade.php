@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Contact List</h3>
                </div>
                <table class="table table-bordered table-striped table-condensed">
                    <tr>
                        <td>Empresa</td>
                        <td>Nombre</td>
                        <td>Rut</td>
                        <td>Telefonos</td>
                        <td>Correo</td>
                    </tr>

                    @foreach($data as $row)
                        <tr>
                            <td>
                                <a href="#" id="empresa"
                                   data-type="select"
                                   data-pk={{$row->id}}
                                   data-title="Select status">
                                    {{$row->empresas->name_corto}}
                                </a>
                                {{--<a href="#" class="xedit" id="empresa"
                                   data-type="select"
                                   data-pk="{{$row->id}}"
                                   data-name="name_corto">
                                    {{$row->empresas->name_corto}}</a>--}}
                            </td>
                            <td>
                                <a href="#" class="xedit"
                                   data-pk="{{$row->id}}"
                                   data-name="name">
                                    {{$row->name}}</a>
                            </td>
                            <td>
                                <a href="#" class="xedit"
                                   data-pk="{{$row->id}}"
                                   data-name="name">
{{--                                   data-placement="right"--}}
                                    {{$row->rut}}</a>
                            </td>
                            <td>
                                <a href="#" class="xedit"
                                   data-pk="{{$row->id}}"
                                   data-name="fono"
                                   data-emptytext="Vacio">
                                    {{$row->fono}}</a>
                            </td>
                            <td>
                                <a href="#" class="xedit"
                                   data-pk="{{$row->id}}"
                                   data-name="email"
                                   data-title="Enter ">
                                    {{$row->email}}</a>
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>

        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            });

            $('.xedit').editable({
                url: '{{url("contacts/update")}}',
                title: 'Update',
                success: function (response, newValue) {
                    console.log('Updated', response)
                }
            });



                $(function(){
                    $('#empresa').editable({
                        value: 2,
                        source: [
                            {value: 1, text: 'ASA'},
                            {value: 2, text: 'Cente'},
                            {value: 3, text: 'Maketa'}
                        ]
                    });
                });

           /* $(function(){
                $('#empresa').editable({
                    value: 2,
                    source: [
                        {value: 1, text: 'ASA'},
                        {value: 2, text: 'Cente'},
                        {value: 3, text: 'Maketa'}
                    ]
                });
            });*/

        })
    </script>

@endsection
