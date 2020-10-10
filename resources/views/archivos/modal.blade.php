@extends('layouts.app')

@if ($view == 'create')
    @section('title',"Nuevo directorio")
     @section('content')
     <div class="container">
            <!-- Modal  -->
            {!! Form::model($categori, ['route' => ['storedirect'], 'method' => 'POST','class'=>"form-horizontal"]) !!}
              @include('archivos.partials.directoriofields')
            {!! Form::close() !!}
        </div>
       @endsection
@endif

@if ($view == 'edit')
    @section('title',"Modifica socio")
@section('content')
    <div class="container">
        <!-- Modal -->
        {!! Form::model($categori, ['route' => ['direct/update', $categori], 'method' => 'PUT','class'=>"form-horizontal"]) !!}
        @include('archivos.partials.directoriofields')
        {!! Form::close() !!}
    </div>
@endsection
@endif

@if ($view == 'createfile')
    @section('title',"Nuevo archivo")
@section('content')
    <div class="container">
        <!-- Modal -->
        {!! Form::model($file, ['route' => ['files.store', $file], 'method' => 'Post', 'enctype' => 'multipart/form-data','class'=>"form-horizontal"]) !!}
           @include('archivos.partials.filefields')
        {!! Form::close() !!}
    </div>
@endsection
@endif
@section('script')
<script>
    $('#NoteModalLong').modal('show');

    $('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });

    // codigo de recarga  los select de empresas y sus directorios
    $(document).ready(function () {
        $('#dir_id,#empre_id').select2({
            allowClear: true,
            placeholder: {
                id: "",
                text: 'Selecione valor'
            }
        });
        $.fn.populateSelect = function (values) {
            var options = '';
            $.each(values, function (key, row) {
                options += '<option value="' + row.value + '">' + row.text + '</option>';
            });
            $(this).html(options);
        }
        $('#empre_id').change(function () {
            $('#dir_id').empty().change();
            var empre_id = $(this).val();
            if (empre_id == '') {
                $('#dir_id').empty().change();
            } else {
                $.getJSON('directorios/'+empre_id, null, function (values) {
                    $('#dir_id').populateSelect(values);
                });
            }
        });
    });
</script>



@endsection
