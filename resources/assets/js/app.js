
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
        messages: [
            {
                message: 'Hey',
                date: "12.12.12 14.12",
                user: "Ch Theile"
            },
            {
                message: 'Hey !!',
                date: "12.12.12 14.12",
                user: "Ch Theile"
            }
        ]
    },
    methods: {
        addMessage(message) {
            // add to existing messages
            this.messages.push(message)

            // Persist to the database etc

        }
    }
  });


