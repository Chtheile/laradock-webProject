
<template lang="html">
  <div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="myModalLabel">Benutzer anlegen</h4>
        </div>
        <div class="modal-body">
                <div class="create-user-modal">
                  <div id="settings">
                      <div class="from-group">
                          <label class="col-md-4 control-label" for="title">Benutzername:</label>
                          <input type="text" placeholder="Start Type" v-model="username">
                          <span v-if="formErrors['title']" class="error text-danger">@{{ formErrors['title'] }}</span>
                      </div>

                      <div class="from-group">
                          <label class="col-md-4 control-label" for="title">Name:</label>
                          <input type="text" placeholder="Start Type" v-model="name">
                          <span v-if="formErrors['title']" class="error text-danger">@{{ formErrors['name'] }}</span>
                      </div>

                      <div class="from-group">
                          <label class="col-md-4 control-label"  for="title">E-Mail:</label>
                          <input type="text" placeholder="Start Type" v-model="email">
                          <span v-if="formErrors['title']" class="error text-danger">@{{ formErrors['email'] }}</span>
                      </div>

                      <div  class="from-group">
                          <label class="col-md-4 control-label" for="title">Password:</label>
                          <input type="text" placeholder="Start Type" v-model="password">
                          <span v-if="formErrors['title']" class="error text-danger">@{{ formErrors['password'] }}</span>
                      </div>
                          <div  class="from-group">
                      <div class="pull-left">
                          <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Abbrechen</button>
                      </div>
                      <div class="pull-right">
                          <button class="btn btn-primary" @click="createItem">Anlegen</button>
                      </div>

                    </div>
                </div>
                </div>
            </div>

          </div>

        </div>

      </div>

</template>

<script>
/*jshint esversion: 6 */
export default {
    data() {
        return {
            formErrors:{},
            username: 'test',
            name:'test',
            email: 'test',
            password : 'test'
        };
    },
    methods: {
        createItem() {
          console.log('Test');
          console.log(this.username);

        }


    }

};
</script>

<style lang="css" >
.settings {
    display: flex;
}
.settings input{
    flex: 1 auto;
}

    .settings button {
        border-radius: 0;
    }
</style>
