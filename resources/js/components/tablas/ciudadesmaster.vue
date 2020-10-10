<template>
     <div>
        <button type="button" class="btn btn-sm  btn-outline-primary btm-sm float-right"
                data-toggle="modal" data-target="#myModal" @click="openModal('ciudad','create',ciudad)">
                <i class="fa fa-plus"></i> Agregar nueva Ciudad </button><p>nombre{{ nickname}}</p>
         <div v-if="!ciudades.length">
            No hay ciudades
        </div>
    <!--tabla-->
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
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="text-center">{{titleModal}}</h3>
                    </div>
                    <div class="modal-body">
                        <label><p class="lead">{{messageModal}}</p></label>
                        <div class="alert alert-danger" v-if="errors.length > 0">
                            <li v-for="error in errors">{{ error }}</li>
                        </div>

                        <div v-if="modalCiudad" class="form-group">
                             <input type="text" class="form-control" placeholder="Ciudad" v-model="titleCiudad"
                                   :readonly="modalCiudad==3" required>
                        </div>
                        <div class="form-group">
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
            this.ciudadQuery();
                console.log(App, App.empresas, App.user);
        },
        data() {
            return {
                modalGeneral: 0,
                titleModal: '',
                messageModal: '',
                /***** Ciudades *****/
                modalCiudad: 0,  // Nuevo=1,editar=2 y eliminar=3
                ciudad: '',
                titleCiudad: '',
                codigoCiudad: '',
                // errorTitleCiudad: 0,
                ciudades: [],
                errors: [],
                // errorMessageCiudad: [],  // Mensaje del request
                pagination: {
                    'total': 0,
                    'current_page': 0,
                    'per_page': 0,
                    'last_page': 0,
                    'from': 0,
                    'to': 0
                },
                offset: 2,
            }
        },
        watch: {
            modalGeneral: function (value) {
                if (!value) this.ciudadQuery();
            }
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
            ciudadQuery(page) {
                let me = this;
                var urlciudad ='ciudadQuery?page='+page
                axios.get(urlciudad)
                    .then(function (response) {
                        let answer = response.data;
                        me.ciudades = answer.ciudades.data;
                        me.pagination = answer.pagination;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            closeModal() {
                $('#myModal').modal('hide');
                this.modalGeneral = 0;
                this.titleModal = '';
                this.messageModal = '';
                this.modalCiudad = 0;
                this.errors = [];

            },
            changePage: function (page) {
                this.pagination.current_page = page;
                this.ciudadQuery(page);
            },
            updateciudad() {
                 axios.put('/ciudadupdate/'+this.idCiudad,{
                    'name': this.titleCiudad,
                    'codigo': this.codigoCiudad,
                }, {
                headers: {Authorization: '123 456'}
            })
                    .then(response => {
                        this.ciudades.push(response.data.ciudades);
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
                    axios.delete('/ciudaddelete/'+this.idCiudad)
                        .then(response => {
                            this.ciudades.splice(this.idCiudad, 1);
                            this.closeModal();
                        })
                        .catch(error => {
                        });
                }

            },
            createciudad() {
                   let me = this;
                   axios.post('/ciudadcreate', {
                       'name': this.titleCiudad,
                       'codigo': this.codigoCiudad,
                   }, {
                       headers: {Authorization: '123 456'}
                   })
                       .then(response => {
                         this.ciudades.push(response.data.ciudades);
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
                                this.modalGeneral = 1;
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
                                this.modalGeneral = 1;
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
                                this.modalGeneral = 1;
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
        },
    }
</script>

