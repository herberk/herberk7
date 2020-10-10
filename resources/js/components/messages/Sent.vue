<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 text-center my-3">
                <div class="card">
                    <div class="panel-body">
                        <form @submit.prevent.keyup="sent">
                            <div class="form-group">
                                <input type="text" class="form-control" v-model="message.message">
                                <button type="submit" class=" btn btn-primary">Enviar mensaje</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['user'],
    data() {
        return {
            message: {
                message: '',
                user: this.user            }
        }
    },
    methods: {
        sent() {
            this.$emit('messagesent', this.message)
            this.message = {}
        }
    }
    }
</script>
