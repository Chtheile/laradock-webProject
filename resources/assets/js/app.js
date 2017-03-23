
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
/**
 * Uncomment below when compiling to production
 */


Vue.component('chat-log', require('./components/ChatLog.vue'));

Vue.component('chat-message',require('./components/ChatMessage.vue'));

Vue.component('chat-composer', require('./components/ChatComposer.vue'));

const app = new Vue({
    el: '#app',
    data:{
        messages: [],
        usersInRoom:[]

    },
    methods: {
        addMessage(message) {
            // add to existing messages
            this.messages.push(message)

            // Persist to the database etc
            axios.post('/api/messages',message).then(response=> {
               // console.log(response);
            });
        }
    },
    created(){
        axios.get('/api/messages').then(response => {
           this.messages =  response.data
        });

        Echo.join('chatroom')
            .here((users) => {
                this.usersInRoom = users;
                console.log(users.length);
            })
            //.joining()
            //.leaving()
            .listen('MessagePosted',(e) =>{
                console.log(e);
            });

    }

  });

const settings = new Vue({
  el:'#settings'
});

