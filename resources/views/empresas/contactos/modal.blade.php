@extends('layouts.app')
@if ($view == 'nota')
    @section('title',"Notas de Contacto")
    @section('content')
        <div class="container">
            <!-- Modal -->
            {!! Form::model($contactos, ['route' => ['contacto/updatenota', $contactos], 'method' => 'PUT','class'=>"form-horizontal"]) !!}
               @include('empresas.contactos.partials.NoteModal')
            {!! Form::close() !!}
      </div>
    @endsection
@endif
@if ($view == 'create')
    @section('title',"Nuevo Contacto")
     @section('content')
     <div class="container">
            <!-- Modal -->
            {!! Form::model($contactos, ['route' => ['storecontacto'], 'method' => 'POST','class'=>"form-horizontal"]) !!}
              @include('empresas.contactos.partials.contactosfields')
            {!! Form::close() !!}
        </div>
       @endsection
@endif

@if ($view == 'edit')
    @section('title',"Modifica contacto")
@section('content')
    <div class="container">
        <!-- Modal -->
        {!! Form::model($contactos, ['route' => ['contacto/update', $contactos], 'method' => 'PUT','class'=>"form-horizontal"]) !!}
        @include('empresas.contactos.partials.contactosfields')
        {!! Form::close() !!}
    </div>
@endsection
@endif



@section('script')
<script>
    function myfunction(val) {
        alert("The input value has changed. The new value is: " + val);
        // document.getElementById('acciones').readOnly = false;
    }
    $('#NoteModalLong').modal('show');

// https://gist.github.com/rotvulpix/69a24cc199a4253d058c
function checkRut(rut) {
// Despejar Puntos
var valor = rut.value.replace('.','');
// Despejar Guión
valor = valor.replace('-','');
// Aislar Cuerpo y Dígito Verificador
cuerpo = valor.slice(0,-1);
dv = valor.slice(-1).toUpperCase();
// Formatear RUN
rut.value = cuerpo + '-'+ dv
// Si no cumple con el mínimo ej. (n.nnn.nnn)
if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}
// Calcular Dígito Verificador
suma = 0;
multiplo = 2;
// Para cada dígito del Cuerpo
for(i=1;i<=cuerpo.length;i++) {
// Obtener su Producto con el Múltiplo Correspondiente
index = multiplo * valor.charAt(cuerpo.length - i);
// Sumar al Contador General
suma = suma + index;
// Consolidar Múltiplo dentro del rango [2,7]
if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
}
// Calcular Dígito Verificador en base al Módulo 11
dvEsperado = 11 - (suma % 11);
// Casos Especiales (0 y K)
dv = (dv == 'K')?10:dv;
dv = (dv == 0)?11:dv;
// Validar que el Cuerpo coincide con su Dígito Verificador
if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }
// Si todo sale bien, eliminar errores (decretar que es válido)
rut.setCustomValidity('');
}
</script>



@endsection
