  /*jshint esversion: 6 */
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

  Vue.component('chat-message', require('./components/ChatMessage.vue'));

  Vue.component('chat-composer', require('./components/ChatComposer.vue'));

  Vue.component('create-user-modal', require('./components/CreateUserModal.vue'));

  Vue.component('user-table', require('./components/UserTable.vue'));

  const app = new Vue({

      el: '#app',
      data: {
          messages: [],
          usersInRoom: [],

      },
      methods: {
          addMessage(message) {
              // add to existing messages
              this.messages.push(message);

              // Persist to the database etc
              axios.post('/api/messages', message).then(response => {
                  console.log(response);
              });
          }
      },
      created() {

          axios.get('/api/messages').then(response => {
              this.messages = response.data;
          });
          //  Echo.join('chatroom')
          //    .here((users) => {
          //      this.usersInRoom = users;
          //    console.log(users.length);
          //  })
          //.joining()
          //.leaving()
          //.listen('MessagePosted', (e) => {
          //      console.log(e);
          //  });
      }

  });


  var app2 = new Vue({
      el: '#app-2',
      data: {
          formErrors: [],
          newUser: {},
          users: [],
          pagination: {
              total: 0,
              per_page: 2,
              from: 1,
              to: 0,
              current_page: 1
          },
          offset: 4,
      },
      computed: {
          isActived: function() {
              return this.pagination.current_page;
          },
          pagesNumber: function() {
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
          }
      },
      created: function() {
          // `this` points to the vm instance
          this.getuserPage(this.pagination.current_page);
      },
      methods: {
          getuserPage(page) {
              axios.get('/api/users?page=' + page).then(response => {
                  this.users = response.data.data;
                  this.pagination = response.data;

              });
          },
          changePage: function(page) {
              this.pagination.current_page = page;
              this.getuserPage(page);
          }
      }
  });
