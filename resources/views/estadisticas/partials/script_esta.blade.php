<script>
    document.getElementById('saldo').readOnly = true;
    $('#selectmes').change(function () {
       var mi = document.getElementById('ano').value+document.getElementById('selectmes').value;
        $.getJSON('buscautm/'+mi, null, function (values) {
            document.getElementById('utmes').value=Object.values(values);
       });
    });

    function sumasaldo() {
        var tot1 = document.getElementById('venta').value;
        var tot2 = document.getElementById('otroing').value;
        var tot3 = document.getElementById('compra').value;
        var tot4 = document.getElementById('remun').value;
        var tot5 = document.getElementById('honora').value;
        var tot6 = document.getElementById('arriendo').value;
        var tot7 = document.getElementById('otrogas').value;
        // var tot8 = document.getElementById('utmes').value;
        document.getElementById('saldo').value= parseInt(tot1)+parseInt(tot2)-parseInt(tot3)-parseInt(tot4)-parseInt(tot5)-parseInt(tot6)-parseInt(tot7);
    }
// esta por el edit  y da un eror en edit pues no esta lo pose a ambos lados  (response.data.ciudades)
    document.getElementById('no').readOnly = true;


</script>
