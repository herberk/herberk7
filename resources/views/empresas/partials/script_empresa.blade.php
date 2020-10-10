<script>
    document.getElementById('capital').readOnly = true;

    $('.datepicker1').datepicker({
        format: "dd-mm-yyyy",
        language: "es",
        autoclose: true
    });

    $('.datepicker2').datepicker({
        format: "dd-mm-yyyy",
        language: "es",
        autoclose: true
    });

    $('.datepicker3').datepicker({
        format: "dd-mm-yyyy",
        language: "es",
        autoclose: true
    });
    // codigo de recarga  los select de regiones comunas
  $(document).ready(function () {
        $('#ciudad_id','#comuna_id','#region_id').select2({
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


    function mostrar1() {
        div = document.getElementById('flotante1');
        div.style.display = '';
    }

    function cerrar1() {
        div = document.getElementById('flotante1');
        div.style.display = 'none';
    }
    function mostrar2() {
        div = document.getElementById('flotante2');
        div.style.display = '';
    }

    function cerrar2() {
        div = document.getElementById('flotante2');
        div.style.display = 'none';
    }
    function mostrar3() {
        div = document.getElementById('flotante3');
        div.style.display = '';
    }

    function cerrar3() {
        div = document.getElementById('flotante3');
        div.style.display = 'none';
    }
    function mostrar4() {
        div = document.getElementById('flotante4');
        div.style.display = '';
    }

    function cerrar4() {
        div = document.getElementById('flotante4');
        div.style.display = 'none';
    }
    $(document).ready(function () {
        $("#giro").easyAutocomplete({
            url: "/autocomplete/giros",
            getValue: "name",
            template: {
                type: "description",
                fields: {
                    description: "codigo"
                }
            },

            list: {
                match: {
                    enabled: true
                },

                onSelectItemEvent: function() {
                    var giro = $("#giro").getSelectedItemData();
                    $('#codigo').val(giro.codigo);
                },

            },
            theme: "bootstrap",
            ajaxSettings: {
                dataType: "json",
                method: "GET",
                data: {
                }
            },
            requestDelay: 500
        }).change(function () {
            $('#codigo').val('');
        });
    });
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
