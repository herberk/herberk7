require('./bootstrap');

window.Vue = require('vue');
window.moment = require('moment');


Vue.component('message', require('./components/messages/Message.vue').default);
Vue.component('sent-message', require('./components/messages/Sent.vue').default);

import VuePaginate from 'vue-paginate'
Vue.use(VuePaginate)


const app = new Vue({
    el: '#app',
    data: {
        messages: [],
    },
   mounted(){
        this.fetchMessages();
        Echo.private('chat')
            .listen('MessageSentEvent', (e) => {
                this.messages.push({
                    message: e.message.message,
                    user: e.user
                });
            });
    },
     methods: {
        addMessage(message) {
            this.messages.push(message);
            axios.post('/messages', message).then(response => {
                 console.log(response.data);
            });
        },
        fetchMessages(page) {
            axios.get('/messages?page=\'+page').then(response => {
                this.messages = response.data;
                this.pagination = response.data.pagination;
            });
        },
         changePage: function (page) {
             this.pagination.current_page = page;
             this.fetchMessages(page);changePage
         },

    },
});

