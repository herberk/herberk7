<script>
// codigo de recarga  los select de giros
$(document).ready(function () {

    $('#giroa_id','#girob_id','#giros_id').select2({
        allowClear: true,
        placeholder: {
            id: "",
            text: 'Selecione valor'
        }
    });
        $.fn.populateSelect = function (values) {
            var options = '';
            $.each(values, function (key, row) {
                options += '<option value="' + row.value + '">'+ row.text2+'  ' + row.text +'  </option>';
            });
            $(this).html(options);
        }
        $('#giroa_id').change(function () {
            $('#girob_id').empty().change();
            var giroa_id = $(this).val();
            if (giroa_id == '') {
                $('#girob_id').empty().change();
            } else {
                $.getJSON('girosb/'+giroa_id, null, function (values) {
                    $('#girob_id').populateSelect(values);
                });
            }
        });
       $('#girob_id').change(function () {
            $('#giros_id').empty().change();
            var girob_id = $(this).val();
            if (girob_id == '') {
                $('#giros_id').empty().change();
            } else {
                $.getJSON('detallegiro/'+girob_id, null, function (values) {
                    $('#giros_id').populateSelect(values);
                });
            }
        });
});

//codigo para el text que muesta las opciones de la tabla y codigo
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
</script>
{{--
<script>
    $(function() {
        $('.list-group-item').on('click', function() {
            $('.fa', this)
                .toggleClass('fa fa-chevron-right')
                .toggleClass('fa fa-chevron-down');
        });
    });
</script>
--}}
