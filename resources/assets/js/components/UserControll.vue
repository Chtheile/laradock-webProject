<template >
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading">Settings</div>
                  <div class="panel-body">
                      <div class="pull-left">
                          <h3>Benutzerverwaltung: </h3>
                        </div>
                    <div class="pull-right">
                       <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">Benutzer anlegen</button>
                   </div>
                        <user-table :users="users"></user-table>
                        <create-user-modal v-on:update="changePage"></create-user-modal>

                        <nav>
                          <ul class="pagination">
                            <li v-if="pagination.current_page > 1">
                              <a href="#" aria-label="Previous" @click.prevent="changePage(pagination.current_page - 1)">
                                <span aria-hidden="true">«</span>
                              </a>
                            </li>
                            <li v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'active' : '']">
                              <a href="#" @click.prevent="changePage(page)">{{ page }}</a>
                            </li>
                            <li v-if="pagination.current_page < pagination.last_page">
                              <a href="#" aria-label="Next" @click.prevent="changePage(pagination.current_page + 1)">
                                <span aria-hidden="true">»</span>
                              </a>
                            </li>
                          </ul>
                        </nav>
                  </div>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
/*jshint esversion: 6 */
export default {
  data()  {
    return {
        formErrors: {},
        users:[],
        pagination: {
            total: 0,
            per_page: 2,
            from: 1,
            to: 0,
            current_page: 1
        },
        offset: 4,
      };
  },
  created: function() {
      // `this` points to the vm instance
      this.getuserPage(this.pagination.current_page);
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
  methods: {
      getuserPage(page) {
          axios.get('/api/users?page=' + page).then(response => {
              this.users = response.data.data;
              this.pagination = response.data;
              console.log(response);
          });

      },
      changePage: function(page) {
          this.pagination.current_page = page;
          this.getuserPage(page);
      }
  }

  };
</script>

<style lang="css" >
/* Enter and leave animations can use different */
/* durations and timing functions.              */
.slide-fade-enter-active {
  transition: all .3s ease;
}
.slide-fade-leave-active {
  transition: all .0s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active for <2.1.8 */ {
  transform: translateX(10px);
  opacity: 0;
}
</style>
