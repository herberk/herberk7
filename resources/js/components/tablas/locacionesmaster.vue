<template>
 <div class="row">
     <!--Regiones-->
      <div class="col-3">
         <div v-if="!regiones.length">No hay Regiones </div>
          <table v-else class="table table-sm table-bordered table-striped" width="100%" style="font-size: 14px">
            <thead>
                <th style= "width: 30px;">#</th>
                <th>Region</th>
                <th style= "width: 30px;">Ver</th>
            </thead>
            <tbody>
            <tr v-for="regione in regiones">
                <td>{{ regione.id }}</td>
                <td>{{ regione.name }}</td>
                <td class="text-center" @click="Query_comuna(regione.id,regione.name)">
                    <i class="fas fa-eye" style=color:#3729fa></i> </td>
            </tr>
            </tbody>
            </table>
        </div>
     <!--<div class="col-1"></div>-->
     <!--Comunas-->
    <div class="col-5">
     <div v-if="!comunas.length">No hay Comunas</div>
          <table v-else class="table table-sm table-bordered table-striped" width="100%" style="font-size: 14px">
              <thead>
              <th style= "width: 30px;">#</th>
              <th>Region</th>
              <th>Comunas</th>
              </thead>
              <tbody>
              <tr v-for="comuna in comunas">
                  <td>{{ comuna.id }}</td>
                  <td>{{ comuna.regiones.name }}</td>
                  <td>{{ comuna.name }}</td>
              </tr>
              </tbody>
          </table>
        <!--paginate region-->
        <nav>
            <ul class="pagination justify-content-center pagination-sm">
                <li class="page-item" v-if="pagination.current_page > 1">
                    <a  class="page-link" href="#" @click.prevent="changePage(pagination.current_page - 1)">
                        <span>&laquo;</span>
                    </a>
                </li>

                <li class="page-item" v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'active':'']">
                    <a  class="page-link" href="#" @click.prevent="changePage(page)">
                        {{ page }}
                    </a>
                </li>

                <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                    <a  class="page-link" href="#"  @click.prevent="changePage(pagination.current_page + 1)">
                        <span>&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
     <!--Ciudaeds-->
   <div class="col-4">
       <button type="button" class="btn btn-sm  btn-dark float-right my-1"
                 data-toggle="modal" data-target="#myModal" @click="openModal('ciudad','create',ciudad)">
             <i class="fa fa-plus"></i> Agregar nueva Ciudad </button>
       <div v-if="!ciudades.length">  No hay ciudades  </div>
         <table v-else class="table table-sm table-bordered table-striped" width="100%" style="font-size: 14px">
             <thead>
             <th style= "width: 20px;">#</th>

             <th>Nombre</th>
             <th style= "width: 30px;">Codigo</th>
             <th style= "width: 30px;">Editar</th>
             <th style= "width: 30px;">Borrar</th>
             </thead>
             <tbody>
             <tr v-for="(ciudad, index) in ciudades">
                 <td>{{ index + 1 }}</td>

                 <td>{{ ciudad.name }}</td>
                 <td>{{ ciudad.codigo }}</td>
                 <td class="text-center"><a @click="openModal('ciudad','update',ciudad)">
                     <i class="fas fa-pencil-alt" style=color:#15be0e></i></a>
                 </td>
                 <td class="text-center"><a @click="openModal('ciudad','delete',ciudad)">
                     <i class="fas fa-trash" style=color:Tomato></i></a>
                 </td>
             </tr>
             </tbody>
         </table>
<!--      paginador de ciuades -->
          <nav>
              <ul class="pagination justify-content-center pagination-sm">
                  <li class="page-item" v-if="Bpagination.current_page > 1">
                      <a  class="page-link" href="#" @click.prevent="BchangePage(Bpagination.current_page - 1)">
                          <span>&laquo;</span>
                      </a>
                  </li>

                  <li class="page-item" v-for="Bpage in BpagesNumber" v-bind:class="[ Bpage == isBActived ? 'active':'']">
                      <a  class="page-link" href="#" @click.prevent="BchangePage(Bpage)">
                          {{ Bpage }}
                      </a>
                  </li>

                  <li class="page-item" v-if="Bpagination.current_page < Bpagination.last_page">
                      <a  class="page-link" href="#"  @click.prevent="BchangePage(Bpagination.current_page + 1)">
                          <span>&raquo;</span>
                      </a>
                  </li>
              </ul>
          </nav>

      </div>
        <!--ventana modal-->
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="text-center">{{titleModal}}</h3>
                    </div>
                    <div class="modal-body">
                       <label><p>{{messageModal}}</p></label>
                        <div class="alert alert-danger" v-if="errors.length > 0">
                            <li v-for="error in errors">{{ error }}</li>
                        </div>
                        <div v-if="modalLista">
                            <div v-if="!elcomunas.length"><strong>No hay comunas para este tipo</strong></div>
                            <table v-else class="table table-sm table-bordered table-striped">
                                <tbody>
                                <tr v-for="elcomuna in elcomunas">
                                    <td>{{ elcomuna.name }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div v-if="modalCiudad" class="form-group">
                            <input type="text" class="form-control" placeholder="Ciudad" v-model="titleCiudad"
                                   :readonly="modalCiudad==3" required>
                            <input type="text" class="form-control" placeholder="Codigo max. 5 Car." v-model="codigoCiudad"
                                   :readonly="modalCiudad==3">
                        </div>
                      </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" @click="closeModal()">Cancelar</button>
                        <button type="button" class="btn btn-success" @click="createciudad()" v-if="modalCiudad==1">Aceptar</button>
                        <button type="button" class="btn btn-success" @click="updateciudad()" v-if="modalCiudad==2">Aceptar</button>
                        <button type="button" class="btn btn-danger" @click="destroyciudad()" v-if="modalCiudad==3">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>


 </div>
</template>

<script>
    export default {
        mounted: function () {
            this.Query_locaciones(), this.ciudadQuery();
        },
        data() {
            return {
                // modalGeneral: 0, //Cuando hay mas tablas q usan el modal
                titleModal: '',
                messageModal: '',
                // modalTipo: 0,  // Nuevo=1,editar=2 y eliminar=3 lista =O
                titleTipo: '',
                errorTitleTipo: 0,
                errorMessageTipo: [],  // Mensaje del request
                regiones: [],
                comunas: [],
                ciudades: [],
                 elcomunas: [],  //Mustra las comunas de la region
                 modalLista: 0,
                 pagination: {
                    'total': 0,
                    'current_page': 0,
                    'per_page': 0,
                    'last_page': 0,
                    'from': 0,
                    'to': 0
                },
                Bpagination: {
                    'total': 0,
                    'current_page': 0,
                    'per_page': 0,
                    'last_page': 0,
                    'from': 0,
                    'to': 0
                },
                total: 1,
                offset: 3,
                /***** Ciudades *****/
                modalCiudad: 0,  // Nuevo=1,editar=2 y eliminar=3
                ciudad: '',
                titleCiudad: '',
                codigoCiudad: '',
                errors: [],
            }
        },
        watch: {
           //   modalGeneral: function (value) {
           //      if (!value) this.Tipo_Query(), this.Atibuto_Query(), this.ciudadQuery();
           // },
        },
        computed: {
            isActived: function () {
                return this.pagination.current_page;
            },
            pagesNumber: function () {
                if (!this.pagination.to) {
                    return [];
                }
                var from = this.pagination.current_page - this.offset;
                if (from < 1) {
                    from = 1;
                }
                var to = from + (this.offset * 2);
                if (to >= this.pagination.last_page) {
                    to = this.pagination.last_page;
                }
                var pagesArray = [];
                while (from <= to) {
                    pagesArray.push(from);
                    from++;
                }
                return pagesArray;
            },
            isBActived: function () {
                return this.Bpagination.current_page;
            },
            BpagesNumber: function () {
                if (!this.Bpagination.to) {
                    return [];
                }
                var from = this.Bpagination.current_page - this.offset;
                if (from < 1) {
                    from = 1;
                }
                var to = from + (this.offset * 2);
                if (to >= this.Bpagination.last_page) {
                    to = this.Bpagination.last_page;
                }
                var pagesArray = [];
                while (from <= to) {
                    pagesArray.push(from);
                    from++;
                }
                return pagesArray;
            }
        },
           methods: {
              Query_locaciones(page) {
                   let me = this;
                   var urlkeeps = 'locacionesQuery?page='+page;
                   axios.get(urlkeeps)
                       .then(function (response) {
                           let answer = response.data;
                           me.comunas = answer.comunas.data;
                           me.regiones = answer.regiones;
                           me.pagination = answer.pagination;
                       })
                       .catch(function (error) {
                           console.log(error);
                       });
               },
               Query_comuna(tipo,nombre){
                   let me = this;
                   var urlhay = 'hayComunas?tipo='+tipo;
                   axios.get(urlhay)
                       .then(function (response) {
                           let answer = response.data;
                           me.elcomunas = answer.elcomunas;
                           // me.modalGeneral = 1;
                           me.titleModal = 'Region : '+nombre;
                           me.modalLista = 4;
                           $('#myModal').modal('show');
                       })
                       .catch(function (error) {
                           console.log(error);
                       });
               },
               ciudadQuery(Bpage) {
                   let me = this;
                   var urlciudad ='ciudadQuery?page='+Bpage
                   axios.get(urlciudad)
                       .then(function (response) {
                           let answer = response.data;
                           me.ciudades = answer.ciudades.data;
                           me.Bpagination = answer.Bpagination;
                       })
                       .catch(function (error) {
                           console.log(error);
                       });
               },
               updateciudad() {
                   axios.put('ciudadupdate/'+this.idCiudad,{
                       'name': this.titleCiudad,
                       'codigo': this.codigoCiudad,
                   }, {
                       headers: {Authorization: '123 456'}
                   })
                       .then(response => {
                           this.ciudades.push(response.data.ciudades);
                           this.ciudadQuery();
                           this.closeModal();
                       })
                       .catch(error => {
                           this.errors = [];
                           if (error.response.data.errors.name) {
                               this.errors.push(error.response.data.errors.name[0]);
                           }
                           if (error.response.data.errors.codigo) {
                               this.errors.push(error.response.data.errors.codigo[0]);
                           }
                       });
               },
               destroyciudad() {
                   var mensaje = confirm('Elimina '+this.titleCiudad);
                   if (mensaje) {
                       axios.delete('ciudaddelete/'+this.idCiudad)
                           .then(response => {
                               this.ciudades.splice(this.idCiudad, 1);
                               this.ciudadQuery();
                               this.closeModal();
                           })
                           .catch(error => {
                           });
                   }

               },
               createciudad() {
                   let me = this;
                   axios.post('ciudadcreate', {
                       'name': this.titleCiudad,
                       'codigo': this.codigoCiudad,
                   }, {
                       headers: {Authorization: '123 456'}
                   })
                       .then(response => {
                           this.ciudades.push(response.data.ciudades);
                           this.ciudadQuery();
                           this.closeModal();
                       })
                       .catch(error => {
                           this.errors = [];
                           if (error.response.data.errors.name) {
                               this.errors.push(error.response.data.errors.name[0]);
                           }
                           if (error.response.data.errors.codigo) {
                               this.errors.push(error.response.data.errors.codigo[0]);
                           }
                       });
               },
               openModal(type, action, data=[]) {
                   switch (type) {
                       case "ciudad": {
                           switch (action) {
                               case 'create': {
                                   // this.modalGeneral = 1;
                                   this.titleModal = 'Creación de Ciudades';
                                   this.messageModal = 'Ingrese el nombre de la Ciudad';
                                   this.modalCiudad = 1;
                                   this.titleCiudad = '';
                                   this.codigoCiudad = '';
                                   this.errorTitleCiudad = 0;
                                   $('#myModal').modal('show');
                                   break;
                               }
                               case 'update': {
                                   // this.modalGeneral = 1;
                                   this.titleModal = 'Modificación de la ciudad';
                                   this.messageModal = 'Modifique el nombre de la ciudad';
                                   this.modalCiudad = 2;
                                   this.titleCiudad = data['name'];
                                   this.codigoCiudad = data['codigo'];
                                   this.idCiudad = data['id'];
                                   this.errorTitleCiudad = 0;
                                   $('#myModal').modal('show');
                                   break;
                               }
                               case 'delete': {
                                   // this.modalGeneral = 1;
                                   this.titleModal = 'Eliminación de ciudades';
                                   this.messageModal = 'Nombre de la ciudad';
                                   this.modalCiudad = 3;
                                   this.titleCiudad =  data['name'];
                                   this.idCiudad = data['id'];
                                   this.errorTitleCiudad = 0;
                                   $('#myModal').modal('show');
                                   break;
                               }
                           }
                           break;
                       }
                   }
               },
               closeModal() {
                   $('#myModal').modal('hide');
                   // this.modalGeneral = 0;
                   this.titleModal = '';
                   this.messageModal = '';
                   // this.modalTipo = 0;
                   this.modalAtributo = 0;
                   this.modalLista = 0;
                   this.errorTitleCiudad = 0;
                   this.modalCiudad = 0;
                   this.errors = [];
               },
               changePage: function (page) {
                   this.pagination.current_page = page;
                   this.Query_locaciones(page);
               },
               BchangePage: function (Bpage) {
                   this.Bpagination.current_page = Bpage;
                   this.Query_locaciones(Bpage);
               }
           },
       }
</script>
