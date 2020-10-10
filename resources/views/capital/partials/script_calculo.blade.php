<script>
    $('#NoteModalLong').modal('show');
    $(document).ready(function() {

        });
    function sumaform() {

        var tot1 = document.getElementById('capitaltri').value;
        var tot2 = document.getElementById('revaloriza').value;
        var tot3 = document.getElementById('resultado').value;
        var tot4 = document.getElementById('revalimpto').value;
        var tot5 = document.getElementById('retiro').value;
        document.getElementById('capitalsgte').value=parseInt(tot1)+parseInt(tot2)+parseInt(tot3)+parseInt(tot4)+parseInt(tot5);
    }
    function multiplicacapi(){
        var capitaltri = document.getElementById('capitaltri').value;
        var pranual = document.getElementById('pranual').value;
        var tot = ((capitaltri*pranual)/100);
        document.getElementById('revaloriza').value=Math.round(tot);

    }
    function multiplicaimpto() {
        var impto = document.getElementById('impto').value;
        var prim = document.getElementById('primpto').value;
         document.getElementById('revalimpto').value=Math.round(((-impto*prim)/100));

    }

</script>
