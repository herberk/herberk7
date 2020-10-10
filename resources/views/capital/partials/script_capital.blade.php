<script>
 $(document).ready(function() {
          // document.getElementById('efectivo').value=4;

     sumarinto();
     sumarcomp();
     sumarvalor();
     sumarpasivo();
     sumartot();
    });
    document.getElementById('efectivo').readOnly = true;
    document.getElementById('propio').readOnly = true;

    function sumartot() {
        var tot1 = document.getElementById('activo').value;
        var tot2 = document.getElementById('into21').value;
        var tot3 = document.getElementById('into22').value;
        var tot4 = document.getElementById('valfinanciero31').value;
        var tot5 = document.getElementById('valtributario32').value;
        var total = parseInt(tot1)+parseInt(tot2)+parseInt(tot3)+parseInt(tot4)+parseInt(tot5);
        document.getElementById('efectivo').value=total;
        var tot6 = document.getElementById('pasivo51').value;
        var totalfin = total+parseInt(tot6)
       document.getElementById('propio').value=totalfin;
        var tot7 = document.getElementById('cmanual').value;
     }
    document.getElementById('into21').readOnly = true;
    document.getElementById('into22').readOnly = true;
    document.getElementById('valfinanciero31').readOnly = true;
    document.getElementById('valtributario32').readOnly = true;
    document.getElementById('pasivo51').readOnly = true;

    function sumarinto() {
        var in1 = document.getElementById('into1').value;
        var in2 = document.getElementById('into2').value;
        var in3 = document.getElementById('into3').value;
        var in4 = document.getElementById('into4').value;
        var in5 = document.getElementById('into5').value;
        var in6 = document.getElementById('into6').value;
        var in7 = document.getElementById('into7').value;
        var in8 = document.getElementById('into8').value;
        var in9 = document.getElementById('into9').value;
        var totin = -parseInt(in1)-parseInt(in2)-parseInt(in3)-parseInt(in4)-parseInt(in5)-parseInt(in6)-parseInt(in7)-parseInt(in8)-parseInt(in9);
        document.getElementById('into21').value=totin;
        sumartot();
    }
    function sumarcomp() {
        var com1 = document.getElementById('complementa1').value;
        var com2 = document.getElementById('complementa2').value;
        var com3 = document.getElementById('complementa3').value;
        var totacom = -parseInt(com1)-parseInt(com2)-parseInt(com3);
        document.getElementById('into22').value=totacom;
        sumartot();
    }
   function sumarvalor() {
       var valorf1 = document.getElementById('valfinanciero1').value;
       var valorf2 = document.getElementById('valfinanciero2').value;
       var valorf3 = document.getElementById('valfinanciero3').value;
       var valorf4 = document.getElementById('valfinanciero4').value;
       var valorf5 = document.getElementById('valfinanciero5').value;
       var valorf6 = document.getElementById('valfinanciero6').value;
       var valorf7 = document.getElementById('valfinanciero7').value;
       var valorf8 = document.getElementById('valfinanciero8').value;
       var valorf9 = document.getElementById('valfinanciero9').value;
       var totavalf = -parseInt(valorf1)-parseInt(valorf2)-parseInt(valorf3)-parseInt(valorf4)-parseInt(valorf5)-parseInt(valorf6)
                       -parseInt(valorf7)-parseInt(valorf8)-parseInt(valorf9);
       document.getElementById('valfinanciero31').value=totavalf;
       var valort1 = document.getElementById('valtributario1').value;
       var valort2 = document.getElementById('valtributario2').value;
       var valort3 = document.getElementById('valtributario3').value;
       var valort4 = document.getElementById('valtributario4').value;
       var valort5 = document.getElementById('valtributario5').value;
       var valort6 = document.getElementById('valtributario6').value;
       var valort7 = document.getElementById('valtributario7').value;
       var valort8 = document.getElementById('valtributario8').value;
       var totavalt = +parseInt(valort1)+parseInt(valort2)+parseInt(valort3)+parseInt(valort4)+parseInt(valort5)+parseInt(valort6)
           +parseInt(valort7)+parseInt(valort8);
       document.getElementById('valtributario32').value=totavalt;
       sumartot();
   }
    function sumarpasivo() {
        var pas1 = document.getElementById('pasivoexigi1').value;
        var pas2 = document.getElementById('pasivoexigi2').value;
        var pas3 = document.getElementById('pasivoexigi3').value;
        var pas4 = document.getElementById('pasivoexigi4').value;
        var pas5 = document.getElementById('pasivoexigi5').value;
        var pas6 = document.getElementById('pasivoexigi6').value;
        var pas7 = document.getElementById('pasivoexigi7').value;
        var pas8 = document.getElementById('pasivoexigi8').value;
        var pas9 = document.getElementById('pasivoexigi9').value;
        var pas10 = document.getElementById('pasivoexigi10').value;
        var pas11 = document.getElementById('pasivoexigi11').value;
        var pas12 = document.getElementById('pasivoexigi12').value;
        var pas13 = document.getElementById('pasivoexigi13').value;
        var totapas = -parseInt(pas1)-parseInt(pas2)-parseInt(pas3)-parseInt(pas4)-parseInt(pas5)-parseInt(pas6)-parseInt(pas7)
            -parseInt(pas8)-parseInt(pas9)-parseInt(pas10)-parseInt(pas11)-parseInt(pas12)-parseInt(pas13);
        document.getElementById('pasivo51').value=totapas;
        sumartot();
    }
    function multiplica() {
        var tot7 = document.getElementById('cmanual').value;
        totalfin = document.getElementById('propio').value;
        sumartot();
    }
</script>
