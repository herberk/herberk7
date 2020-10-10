{{--Seccioon para probar el funcionamiento de selectores de comuna regiones--}}
@extends('layouts.app')
@section('content')
{{--    primera linea--}}
    <div class="col-md-12">
        <div class="card border-success">
            <div class="form-row ">
                <div class="col-4">
                    {!! Field::select('region_id', $reg_com, null, ['class' => 'form-control py-1']) !!}

                 </div>
                <div class="col-4">
                    {!! Field::select('comuna_id',$com_com, null, ['class' => 'form-control py-1'])!!}
                </div>
                <div class="col-4">
                    {!! Field::select('ciudad_id',$ciu_com, null, ['class' => 'form-control py-1']) !!}
                </div>
            </div>
        </div>
    </div>
{{--segunda Linea--}}
    <div class="col-md-12">
        <div class="card border-success">
            <div class="form-row ">
                <div class="col-sm-3">
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Categorias</div>
                        </div>
                          {!! Field::select('tipo_id',$tipo_com, null, ['class' => 'form-control py-1']) !!}
                       </div>
                </div>
            </div>
        </div>
    </div>

{{--tercera linea--}}
    <div class="col-md-12">
        <div class="card border-success">
            <div class="form-row ">
                <div class="col-3 my-0">
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <div class="input-group-text">1.- Documento Comercial</div>
                        </div>
                        {!! Form::select('arti_id', $art[0], null, ['class' => 'form-control py-1']) !!}

                    </div>
                </div>

                <div class="col-3 my-0">
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <div class="input-group-text">2.- Monedas</div>
                        </div>
                        {!! Form::select('arti_id', $art[1], null, ['class' => 'form-control py-1']) !!}
                    </div>
                </div>
                <div class="col-3 my-0">
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <div class="input-group-text">3.- Operacion Comercial</div>
                        </div>
                        {!! Form::select('arti_id', $art[2], null, ['class' => 'form-control py-1']) !!}
                    </div>
                </div>
                <div class="col-3 my-0">
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <div class="input-group-text">4.- Documento Mercantil</div>
                        </div>
                        {!! Form::select('arti_id', $art[3], null, ['class' => 'form-control py-1']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--cuarta linea--}}
    <div class="col-md-12">
        <div class="card border-success">
            <div class="form-row ">
                <div class="col-3 my-0">
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <div class="input-group-text">5.-Motivo de Castigo</div>
                        </div>
                        {!! Form::select('arti_id', $art[4], null, ['class' => 'form-control py-1']) !!}
                    </div>
                </div>

                <div class="col-3 my-0">
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <div class="input-group-text">6.- Tipo de Empresas</div>
                        </div>
                        {!! Form::select('arti_id', $art[5], null, ['class' => 'form-control py-1']) !!}
                    </div>
                </div>
                <div class="col-3 my-0">
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <div class="input-group-text">7.- Regimen Tributacion</div>
                        </div>
                        {!! Form::select('arti_id', $art[6], null, ['class' => 'form-control py-1']) !!}
                    </div>
                </div>
                <div class="col-3 my-0">
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <div class="input-group-text">8.- Instituciones Bancarias</div>
                        </div>
                        {!! Form::select('arti_id', $art[7], null, ['class' => 'form-control py-1']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--quinta linea--}}
<div class="col-md-12">
    <div class="card border-success">
      <div class="form-row ">
             <div class="col-3 my-0">
                 <div class="input-group mb-1">
                     <div class="input-group-prepend">
                         <div class="input-group-text">9.- Declaraciones Juradas</div>
                     </div>
                     {!! Form::select('arti_id', $art[8], null, ['class' => 'form-control py-1']) !!}
                 </div>
             </div>

              <div class="col-3 my-0">
                        <div class="input-group mb-1">
                            <div class="input-group-prepend">
                                <div class="input-group-text">10.- Estado de DJ</div>
                            </div>
                            {!! Form::select('arti_id', $art[9], null, ['class' => 'form-control py-1']) !!}
                        </div>
                    </div>
               <div class="col-3 my-0">
                   <div class="input-group mb-1">
                       <div class="input-group-prepend">
                           <div class="input-group-text">11.- Segmentos empresas</div>
                       </div>
                       {!! Form::select('arti_id', $art[10], null, ['class' => 'form-control py-1']) !!}
                   </div>
               </div>
         {{-- <div class="col-3 my-0">
                   <div class="input-group mb-1">
                       <div class="input-group-prepend">
                           <div class="input-group-text">Doctos Mercantil</div>
                       </div>
                       {!! Form::select('arti_id', $art[12], null, ['class' => 'form-control py-1']) !!}
                   </div>
               </div>
        </div>--}}
    </div>
</div>
@endsection

@section('script')
<script>
    // codigo de recarga  los select de regiones comunas
    $(document).ready(function () {
        $('#ciudad_id,#comuna_id,#region_id,#tipo_id,#atributo_id','#arti_id').select2({
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
        $('#region_id').change(function () {
            $('#comuna_id').empty().change();
            var region_id = $(this).val();
            if (region_id == '') {
                $('#comuna_id').empty().change();
            } else {
                $.getJSON('comunas/'+region_id, null, function (values) {
                    $('#comuna_id').populateSelect(values);
                });
            }
        });
    });

</script>
@endsection
