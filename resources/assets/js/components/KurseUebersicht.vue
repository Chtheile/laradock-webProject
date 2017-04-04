<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Kursübersicht</div>
                    <div class="panel-body">

                      <div class="pull-left">
                          <h3>Kursverwaltung: </h3>
                        </div>
                      <div class="pull-right">
                         <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-kurse">
                           Kurs anlegen
                         </button>


                     </div>
                     <!-- Kurse Table -->
                      <table class="table  table-striped">
                        <thead>
                          <tr>
                            <th>Ansicht</th>
                            <th>Kursname</th>
                            <th>Beschreibung</th>
                            <th>Zuordnen</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                      <tr >
                          <tr v-for="kurs in kurse">
                            <td>  <button class="btn btn-default btn-xs" @click.prevent="ansicht(kurs)"><span class="glyphicon glyphicon-eye-open"></span></button></td>
                            <td>{{kurs.name}}</td>
                            <td>{{kurs.description}}</td>
                            <td>
                                <button class="btn btn-default btn-xs" @click.prevent="zuordnen(kurs)"><span class="glyphicon glyphicon-pencil"></span></button>
                            </td>
                            <td>
                                <button class="btn btn-danger btn-xs" @click.prevent="deleteKurs(kurs)"><span class="glyphicon glyphicon-trash"></span></button>
                            </td>
                          </tr>
                        </tr>
                      </table>

                      <nav>
                        <ul class="pagination pagination-sm">
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


                     <!-- Modal add Kurse -->
                     <div class="modal fade" id="create-kurse" role="dialog" aria-labelledby="myModalLabel">
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
                                     <label class="col-sm-2 control-label" for="name"> Kursename:  </label>
                                   <div class="col-sm-10">
                                     <input class="form-control" type="text" id="name" placeholder="Start Type" v-model="kurs.name">
                                     <span v-if="formErrors['name']" class="error text-danger">{{ formErrors['name'] }}</span>
                                   </div>
                                 </div>

                                 <div class="from-group">
                                     <label class="col-sm-2 control-label" for="description">Beschreibung:</label>
                                       <div class="col-sm-10">
                                         <input class="form-control" type="text" id="description" placeholder="Start Type" v-model="kurs.description">
                                         <span v-if="formErrors['description']" class="help-block">
                                             <strong class="text-danger">{{ formErrors['description']}}</strong>
                                         </span>
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
                   <!-- Modal add Kurse close -->
                    <!--Modal Kurse und Benutzer zuordnen -->
                   <div class="modal fade" id="zuordnen" role="dialog" aria-labelledby="myModalLabel">
                     <div class="modal-dialog" role="document">
                       <div class="modal-content">
                         <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close" role="dialog"><span aria-hidden="true">×</span></button>
                           <h4 class="modal-title" id="myModalLabel">Benutzer zuordnen zu {{zuordnenKurs.name}}</h4>
                         </div>
                         <div class="modal-body">
                           <table class="table table-bordred table-striped ">
                           <thead>
                             <tr>
                               <th>Check</th>
                               <th>Name</th>
                               <th>Benutzername</th>
                               <th>E-mail</th>
                             </tr>
                           </thead>
                             <tr v-for="user in users">
                               <td><input type="checkbox" v-bind:key="user" v-bind:value="user" v-model="checkedUser">
                               </td>
                               <td>{{ user.name }}</td>
                               <td>{{ user.username }}</td>
                               <td>{{ user.email }}</td>

                             </tr>
                           </table>
                       </div>
                         <div class="modal-footer">
                             <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Abbrechen</button>
                             <button class="btn btn-primary" @click="zuordnungSpeichern" >Speichern</button>
                         </div>
                       </div>
                     </div>
                 </div>
                 <!--Modal Kurse und Benutzer zuordnen close -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
/*jshint esversion: 6 */
    export default {
        mounted() {
                

          this.getkursePage(this.pagination.current_page);
          axios.get('/api/usersall').then(response => {
            this.users = response.data;
          });
        },
        data() {
          return {
            users : {},
            kurse : {},
            formErrors: {},
            kurs: {
              name:'',
              description:'',
            },
            pagination: {
              total: 0,
              per_page: 2,
              from: 1,
              to: 0,
              current_page: 1
            },
            offset: 4,
            zuordnenKurs : {},
            checkedUser :[],
          };
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
          getkursePage(page){
          axios.get('/api/kurse?page='+page).then(response => {
            this.kurse = response.data.data;
            this.pagination = response.data;
            console.log(response);
          });

        },
          createItem(){
          axios.post('/api/addkurse', this.kurs).then(response => {
            this.formErrors = response.data;
            if (response.data.name == this.kurs.name){
              console.log('true');
              this.kurs ={
                'name':'',
                'description':'',
              };
              this.fromErrors = {};
              $("#create-kurse").modal('hide');
            } else {
                console.log('false');
            }

          });
        },
        zuordnen(kurs){
            $("#zuordnen").modal('show');
            this.zuordnenKurs = kurs;
            console.log(kurs);
        },
        deleteKurs(kurs){

                  },
        ansicht(kurs){

        },
        zuordnungSpeichern(){
                console.log(this.zuordnenKurs);
              axios.post('/api/kurseuser', this.zuordnenKurs).then(response => {
                console.log('Done');
              });
        }
        }
    };

</script>
