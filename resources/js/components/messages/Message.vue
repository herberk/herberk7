<template>
    <div class="container">

     <div class="row">
            <div class="col-md-8">
                <div class="card my-2" v-for="message in messages.messages.data">
                     <div class="form-group"><strong>{{ message.user.name }}</strong></div>
                    <div>
                        <p>{{ message.message }}</p>
                        <span class="float-right"><em>{{ message.created_at | timeago }}</em></span>
                    </div>
                </div>
            </div>
        </div>
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
    </div>
</template>

<script>
    moment.locale('es');
    export default {
       props: ['messages'],
          mounted() {
              console.log(this.messages)
          },
        data() {
            return {
                page: 0,
                pagination: {       //ok
                    'total': 0,
                    'current_page': 0,
                    'per_page': 0,
                    'last_page': 0,
                    'from': 0,
                    'to': 0
                },
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
       filters: {
            timeago(value) {
                return moment.utc(value).local().fromNow()
            }
        }
    }
</script>
<style scoped>
    .panel{
        margin-bottom: 0;
    }
    .text-diff {
        font-size: 0.8em;
        color: #505050;
    }

</style>
