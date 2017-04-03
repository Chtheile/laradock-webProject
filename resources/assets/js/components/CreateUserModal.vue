<template lang="html">
  <div class="modal fade" id="create-item" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" role="dialog"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="myModalLabel">Benutzer anlegen</h4>
        </div>
          <div class="modal-body">
          <div class="row" >
          <div id="settings" class="form-horizontal">

              <div class="from-group">
                  <label class="col-sm-2 control-label" for="username">Benutzername:  </label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" id="username" placeholder="Start Type" v-model="user.username">
                  <span v-if="formErrors['username']" class="error text-danger">{{ formErrors['username'] }}</span>
                </div>
              </div>

              <div class="from-group">
                  <label class="col-sm-2 control-label" for="title">Name:</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" placeholder="Start Type" v-model="user.name">
                      <span v-if="formErrors['name']" class="help-block">
                          <strong class="text-danger">{{ formErrors['name']}}</strong>
                      </span>
                  </div>
              </div>

              <div class="from-group">
                  <label class="col-sm-2 control-label"  for="title">E-Mail:</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" placeholder="Start Type" v-model="user.email">
                    <span v-if="formErrors['email']" class="error text-danger">{{ formErrors['email'] }}</span>
                  </div>
              </div>

              <div  class="from-group">
                  <label class="col-sm-2 control-label" for="title">Password:</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" placeholder="Start Type" v-model="user.password">
                      <span v-if="formErrors['password']" class="error text-danger">{{ formErrors['password'] }}</span>
                    </div>
              </div>

          </div>
        </div>
      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Abbrechen</button>
            <button class="btn btn-primary" @click="createItem" >Anlegen</button>
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
                formErrors: {},
                user: {
                    username: '',
                    name: '',
                    email: '',
                    password: '',
                }

            };
        },
        methods: {
            createItem() {
                axios.post('/api/adduser', this.user).then(response => {

                    this.formErrors = response.data;

                    if (response.data.username == this.user.username) {
                        console.log('true');
                          this.$emit('update', 1);
                          this.user = {
                              'username': '',
                              'name': '',
                              'email': '',
                              'password': ''
                          };
                          this.formErrors = {};
                        $("#create-item").modal('hide');
                    } else {
                        console.log('False');


                    }
                    //
                });
            }
        }

    };
</script>

<style lang="css">
    .modal-body .form-horizontal .col-sm-2,
    .modal-body .form-horizontal .col-sm-10 {
        width: 100%
    }

    .modal-body .form-horizontal .control-label {
        text-align: left;
    }
    .modal-body .form-horizontal .col-sm-offset-2 {
        margin-left: 15px;
    }
</style>
