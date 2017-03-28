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
                          <input class="form-control" type="text" placeholder="Start Type" v-model="user.username">
                          <span v-if="formErrors['username']" class="error text-danger">{{ formErrors['username'] }}</span>
                      </div>

                      <div class="from-group">
                          <label class="col-md-4 control-label" for="title">Name:</label>
                          <input class="form-control" type="text" placeholder="Start Type" v-model="user.name">

                              <span v-if="formErrors['name']" class="help-block text-danger">
                                  <strong>{{ formErrors['name']}}</strong>
                              </span>


                      </div>

                      <div class="from-group">
                          <label class="col-md-4 control-label"  for="title">E-Mail:</label>
                          <input class="form-control" type="text" placeholder="Start Type" v-model="user.email">
                          <span v-if="formErrors['email']" class="error text-danger">{{ formErrors['email'] }}</span>
                      </div>

                      <div  class="from-group">
                          <label class="col-md-4 control-label" for="title">Password:</label>
                          <input class="form-control" type="text" placeholder="Start Type" v-model="user.password">
                          <span v-if="formErrors['password']" class="error text-danger">{{ formErrors['password'] }}</span>
                      </div>
                      <div  class="from-group">
                          <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Abbrechen</button>
                          <button class="btn btn-primary" @click="createItem" >Anlegen</button>
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
                formErrors: {},
                user: {
                    username: 'NewNAme',
                    name: 'Tewtst ste',
                    email: 'test.test@best.de',
                    password: 'testettzZ',
                }

            };
        },
        methods: {
            createItem() {
                axios.post('/api/adduser', this.user).then(response => {

                    this.formErrors=response.data;

                    if (response.data.username == this.user.username) {
                        console.log('true');
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
    .settings {
        display: flex;
    }

    .settings input {
        flex: 1 auto;
    }

    .settings button {
        border-radius: 0;
    }
</style>
