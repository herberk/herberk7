<script>
    function muestracomuna(tipo,nombre) {
       alert('hola'+tipo);
        Query_comuna(tipo,nombre){
          let me = this;
            var urlhay = 'comunas?tipo='+tipo;
            axios.get(urlhay)
                .then(function (response) {
                    let answer = response.data;
                    me.elcomunas = answer.elcomunas;
                    me.titleModal = 'Region : '+nombre;
                    me.modalLista = 4;
                    $('#myModal').modal('show');
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    }
</script>
