<template>
<div class="row">
    <!-- Tabla con las Categorias -->
    <div class="col-md-4">
        <div class="column text-center">
            <button type="button" class="btn btn-sm  btn-dark float-right my-2"
                    data-toggle="modal" data-target="#myModal" @click="openModal('tipo','create')">
                <i class="fa fa-plus"></i> Agregar nueva Categoria</button>
         </div>
        <div v-if="!tipos.length">No hay tipos </div>
       <table v-else class="table table-sm table-bordered table-striped" width="100%" style="font-size: 14px">
         <thead>
            <th>#</th>
            <th>Nombre Categoria</th>
            <th>N°</th>
            <th style= "width: 30px;">Ver</th>
            <th style= "width: 30px;">Editar</th>
            <th style= "width: 30px;">Borrar</th>
          </thead>
           <tbody>
            <tr v-for="tipo in tipos">
                <td>{{ tipo.id }}</td>
                <td>{{ tipo.name }}</td>
                <td>{{ tipo.atributo_count }}</td>
                <td class="text-center" @click="Query_atributo(tipo.id,tipo.name)">
                    <i class="fa fa-eye" style=color:#3729fa></i> </td>
                <td class="text-center"><a @click="openModal('tipo','update',tipo)">
                    <i class="fas fa-pencil-alt" style=color:#15be0e></i></a></td>
                <td class="text-center"><a @click="openModal('tipo','delete',tipo)">
                    <i class="fas fa-trash" style=color:Tomato></i></a></td>
            </tr>
          </tbody>
        </table>

    </div>

      <!-- Tabla de atributos -->
    <div class="col-md-8">
        <div class="column text-center">
            <button type="button" class="btn btn-dark float-right my-2"
                    data-toggle="modal" data-target="#myModal" @click="openModal('atributo','create')">
                <i class="fa fa-plus"></i> Agregar nuevo Atributo</button>
        </div>

        <div v-if="!atributos.length">No hay atributos</div>
      <table v-else class="table table-sm table-bordered table-striped" width="100%" style="font-size: 14px">
            <thead>
            <th>#</th>
            <th>Tipo</th>
            <th>Atributo</th>
            <th style= "width: 80px;">Codigo</th>
            <th style= "width: 30px;">Editar</th>
            <th style= "width: 30px;">Borrar</th>
            </thead>
            <tbody>
            <tr v-for="atributo in atributos">
                <td>{{ atributo.id }}</td>
                <td>{{ atributo.tipos.name }}</td>
                <td>{{ atributo.name }}</td>
                <td>{{ atributo.codigo }}</td>
                <td class="text-center"><a @click="openModal('atributo','update',atributo)">
                    <i class="fas fa-pencil-alt" style=color:#15be0e></i></a>
                </td>
                <td class="text-center"><a @click="openModal('atributo','delete',atributo)">
                    <i class="fas fa-trash" style=color:Tomato></i></a>
                </td>
             </tr>
            </tbody>
        </table>
    <!--paginate-->
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

    <!--ventana modal-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                    <p v-if="modalTipo">
                        <input type="text" class="form-control" placeholder="Tipo" v-model="titleTipo"
                               :readonly="modalTipo==3" required>
                    </p>
                    <div v-if="modalAtributo">
                        <input type="text" class="form-control" placeholder="Atributo max. 30 Car." v-model="titleAtributo" :readonly="modalAtributo==3">
                        <input type="text" class="form-control" placeholder="Codigo max. 10 Car." v-model="codigoAtributo"
                               :readonly="modalAtributo==3">
                        <select class="form-control py-1" :disabled="modalAtributo==3" v-model="idTipoAtributo">
                            <option v-for="tipo in  tipos" :value="tipo.id">{{ tipo.name }}
                            </option>
                        </select>
                    </div>
                    <div v-if="modalLista">
                        <div v-if="!elatributos.length"><strong>No hay atributos para esta Categoria</strong></div>
                        <table v-else class="table table-condensed table-striped table-bordered" style="font-size: 12px">
                            <tbody>
                                <tr v-for="elatributo in elatributos">
                                    <td>{{ elatributo.name }}</td>
                                    <td>{{ elatributo.codigo }}</td>
                                </tr>
                             </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" @click="closeModal()">Cancelar</button>
                    <button type="button" class="btn btn-success" @click="createTipo()" v-if="modalTipo==1">Aceptar</button>
                    <button type="button" class="btn btn-success" @click="updateTipo()" v-if="modalTipo==2">Aceptar</button>
                    <button type="button" class="btn btn-danger" @click="destroyTipo()" v-if="modalTipo==3">Eliminar</button>
                    <button type="button" class="btn btn-success" @click="createAtributo()" v-if="modalAtributo==1">Aceptar</button>
                    <button type="button" class="btn btn-success" @click="updateAtributo()" v-if="modalAtributo==2">Aceptar</button>
                    <button type="button" class="btn btn-danger" @click="destroyAtributo()" v-if="modalAtributo==3">Eliminar</button>
                </div>
            </div>
        </div>
    </div> 
    </div>
</div>
</template>

 <script>
      export default {
        mounted: function () {
            this.Tipo_Query(), this.Atibuto_Query();
        },
        data() {
            return{
            modalGeneral: 0, //Cuando hay mas tablas q usan el modal
            titleModal: '',    //ok
            messageModal: '',   //ok
            errors: [],    //ok

            /***** Tipos *****/
            modalTipo: 0,  // Nuevo=1,editar=2 y eliminar=3 ok
            titleTipo: '',  //ok
            errorTitleTipo: 0,  //no
            tipos:[],
            errorEmployee: 0,
            errorMessageTipo: [],  // Mensaje del request
            menu: 0,
            /********* Atributos ***********/
            atributos: [],
            modalAtributo: 0,
            titleAtributo: '',
            codigoAtributo: '',
            errorTitleAtributo: 0,
            idTipoAtributo: 0,
            idAtributo: 0,
            /********* elatributo ***********/
            elatributos:[],
            modalLista: 0,
            page: 0,
            pagination:{       //ok
                'total':0,
                'current_page':0,
                'per_page':0,
                'last_page':0,
                'from':0,
                'to':0
            },
            total: 1,     // para averiguar si elimina
            offset: 2    //ok
           }
        },
        watch: {
            modalGeneral: function (value) {
                if (!value) this.Tipo_Query(), this.Atibuto_Query();
            },

        },
        computed:{
            isActived: function () {
                return this.pagination.current_page;
            },
            pagesNumber: function () {
                if(!this.pagination.to){
                    return[];
                }
                var from = this.pagination.current_page - this.offset;
                if(from < 1){
                    from = 1;
                }
                var to = from +(this.offset * 2);
                if(to >= this.pagination.last_page){
                    to = this.pagination.last_page;
                }
                var pagesArray = [];
                while(from <= to){
                    pagesArray.push(from);
                    from++;
                }
                return pagesArray;
            }
        },
        methods: {
            changePage: function (page) {
                this.pagination.current_page = page;
                this.Atibuto_Query(page);
            },
            Tipo_Query(page) {
                let me = this;
                var urlkeeps = 'Tipo_Query?page='+page;
                axios.get(urlkeeps)
                    .then(function (response) {
                        let answer = response.data;
                        me.tipos = answer.tipos;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            Atibuto_Query(page) {
                let me = this;
                var urlkeeps = 'Atributo_Query?page='+page;
                axios.get(urlkeeps)
                    .then(function (response) {
                        let answer = response.data;
                        me.atributos = answer.atributos.data;
                        me.pagination = answer.pagination;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            Query_atributo(tipo,nombre){
                 let me = this;
                var urlhay = 'hayQuery?tipo='+tipo;
                axios.get(urlhay)
                    .then(function (response) {
                        let answer = response.data;
                        me.elatributos = answer.elatributos;
                        me.modalGeneral = 1;
                        me.titleModal = 'Lista : '+nombre;
                        me.modalLista = 4;
                        $('#myModal').modal('show');
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            closeModal() {
                $('#myModal').modal('hide');
                this.errors = [];
                this.modalGeneral = 0;
                this.titleModal = '';
                this.messageModal = '';
                this.modalTipo = 0;
                this.modalAtributo = 0;
                this.modalLista = 0;
            },
           updateTipo() {
                let me = this;
                axios.put('/tipoupdate/'+this.idTipo, {
                    'name': this.titleTipo,
                    'id': this.idTipo,
                }, {
                    headers: {Authorization: '123 456'}
                })
            .then(function (response) {
                    me.titleTipo = '';
                    me.idTipo = 0;
                    me.errorTitleTipo = 0;
                    me.modalTipo = 0;
                    me.closeModal();
                })
                    .catch(error => {
                        this.errors = [];
                        if (error.response.data.errors.name) {
                            this.errors.push(error.response.data.errors.name[0]);
                        }
                    });
            },
             destroyTipo() {
                var mensaje = confirm('Elimina definitivamente! '+this.titleTipo);
                if (mensaje) {
                    let me = this;
                    axios.delete('/tipodelete/'+ this.idTipo)
                        .then(function (response) {
                            me.idTipo = 0;
                            me.titleTipo = '';
                            me.modalTipo = 0;
                            me.closeModal();
                        })
                        .catch(function (error) {
                            console.log('error: ' + error);
                        });
                }
             },
           createTipo() {
               let me = this;
                axios.post('/tipocreate', {
                    'name': this.titleTipo,
                }, {
                    headers: {Authorization: '123 456'}
                })
            .then(function (response) {
                    me.titleTipo= '';
                    me.errorTitleTipo = 0;
                    me.modalTipo = 0;
                    me.closeModal();
                })
                    .catch(error => {
                        this.errors = [];
                        if (error.response.data.errors.name) {
                            this.errors.push(error.response.data.errors.name[0]);
                        }
                    });

            },
             updateAtributo() {
                let me = this;
                 axios.put('/atributoupdate/'+this.idAtributo, {
                    'id': this.idAtributo,
                    'name': this.titleAtributo,
                    'atributo': this.idTipoAtributo,
                    'codigo': this.codigoAtributo
                },{
                     headers: {Authorization: '123 456'}
             })
            .then(response => {
                    me.titleAtributo = '';
                    me.codigoAtributo ='';
                    me.errorTitleAtributo = 0;
                    me.modalPosition = 0;
                    me.idTipoAtributo = 0;
                    me.idAtributo = 0;
                    me.closeModal();
                })
                    .catch(error => {
                        this.errors = [];
                        if (error.response.data.errors.name) {
                            this.errors.push(error.response.data.errors.name[0]);}
                        if (error.response.data.errors.codigo) {
                            this.errors.push(error.response.data.errors.codigo[0]);}
                    });
            },
            createAtributo() {
                  let me = this;
                axios.post('/atributocreate',{
                    'name': this.titleAtributo,
                    'atributo': this.idTipoAtributo,
                    'codigo': this.codigoAtributo
                })
            .then(function (response) {
                    me.titleAtributo = '';
                    me.codigoAtributo='';
                    me.errorTitleAtributo = 0;
                    me.modalPosition = 0;
                    me.idTipoAtributo = 0;
                    me.closeModal();
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
            destroyAtributo() {
                var mensaje = confirm('Elimina definitivamente! '+this.titleAtributo);
                if (mensaje) {
                    let me = this;
                    axios.delete('/atributodelete/'+ this.idAtributo)
                        .then(function (response) {
                            me.titleAtributo = '';
                            me.codigoAtributo='';
                            me.errorTitleAtributo = 0;
                            me.modalPosition = 0;
                            me.idTipoAtributo = 0;
                            me.idAtributo = 0;
                            me.closeModal();
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                }
            },
            openModal(type, action, data=[]) {
                switch (type) {
                    case "tipo": {
                        switch (action) {
                            case 'create': {
                                this.modalGeneral = 1;
                                this.titleModal = 'Creación de un Tipo de atributo';
                                this.messageModal = 'Ingrese el nombre del Tipo';
                                this.modalTipo = 1;
                                this.titleTipo = '';
                                this.errorTitleTipo = 0;
                                this.errorTitleAtributo = 0;
                                break;
                            }
                            case 'update': {
                                this.modalGeneral = 1;
                                this.titleModal = 'Modificación de un Tipo de atributo';
                                this.messageModal = 'Modifique el nombre del Tipo';
                                this.modalTipo = 2;
                                this.titleTipo = data['name'];
                                this.idTipo = data['id'];
                                this.errorTitleTipo = 0;
                                $('#myModal').modal('show');
                                break;
                            }
                            case 'delete': {
                                let me = this;
                                var urlkeeps = 'contar/'+data['id'];
                                axios.get(urlkeeps)
                                    .then(function (response) {
                                        let answer = response.data;
                                        me.total = answer.total;
                                    })
                                    .catch(function (error) {
                                        console.log(error);
                                    });
                                if (!this.total == 0){
                                    alert(data['name']+' NO se puede eliminar pues tiene atributos!','Borrar');
                                }else{
                                    this.titleModal = 'Eliminación de un Tipo de atributo';
                                    this.messageModal = 'Nombre del tipo';
                                    this.modalTipo = 3;
                                    this.modalGeneral = 1;
                                    this.titleTipo =  data['name'];
                                    this.idTipo = data['id'];
                                    this.errorTitleTipo = 0;
                                    $('#myModal').modal('show');
                                    break;
                                }
                            }
                        }
                        break;
                    }
                    case "atributo": {
                        switch (action) {
                            case 'create': {
                                this.modalGeneral = 1;
                                this.titleModal = 'Creación de Atributo';
                                this.messageModal = 'Ingrese el nombre del atributo';
                                this.modalAtributo = 1;
                                this.titleAtributo = '';
                                this.codigoAtributo ='';
                                this.errorTitleAtributo = 0;
                                this.errorTitleTipo = 0;
                                this.idTipoAtributo = this.tipos[0].id;
                                break;
                            }
                            case 'update': {
                                $('#myModal').modal('show');
                                this.modalGeneral = 1;
                                this.titleModal = 'Modificacion del Atributo';
                                this.messageModal = 'Modifica el Atributo';
                                this.modalAtributo = 2;
                                this.titleAtributo = data['name'];
                                this.idAtributo = data['id'];
                                this.codigoAtributo = data['codigo'];
                                this.idTipoAtributo = data['tipos']['id'];
                                this.errorTitleAtributo = 0;
                                break;
                            }
                            case 'delete': {
                                $('#myModal').modal('show');
                                this.modalGeneral = 1;
                                this.titleModal = 'Eliminacion de Atributo';
                                this.messageModal = 'Confirmear';
                                this.modalAtributo = 3;
                                this.titleAtributo = data['name'];
                                this.idAtributo = data['id'];
                                this.errorTitleAtributo = 0;
                                this.idTipoAtributo = data['tipos']['id'];

                                break;
                            }
                        }
                        break;
                    }
                }
            },
        },
 }
</script>
