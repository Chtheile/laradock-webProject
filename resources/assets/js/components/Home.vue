<template>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{text.name}} <div class="pull-right">{{text.author}}    </div></div>

                <div class="panel-body">
                                        {{text.body}}

                    <div v-if="text.type === 'png'">
                      <img  :src="text.media"  style="max-width: 75%; max-height: 75%;" class="rounded" alt="...">
                    </div>
                    <br>
                    <br>
                    <!-- 16:9 aspect ratio -->

                    <div v-if="text.type === 'mp4'" class="embed-responsive embed-responsive-16by9 ">
                      <video width="320" height="240" controls>
                        <source  :src="text.media" type="video/mp4">
                            Your browser does not support the video tag.
                     </video>
                    </div>

                    <audio v-if="text.type === 'mpga'" controls>
                        <source  :src="text.media" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                    <!-- Modal add Kurse -->
                    <div class="modal fade" id="create-text" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" role="dialog"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">Text Bearbeiten</h4>
                          </div>x
                          <div class="modal-body">
                            <div class="row" >
                            <div id="settings" class="form-horizontal">

                                <div class="from-group">
                                    <label class="col-sm-2 control-label" for="name"> Überschrift:  </label>
                                  <div class="col-sm-10">
                                    <input class="form-control" type="text" id="name" placeholder="Start Type" v-model="text.name">
                                    <span v-if="formErrors['name']" class="error text-danger">{{ formErrors['name'] }}</span>
                                  </div>
                                </div>

                                <div class="from-group">
                                    <label class="col-sm-2 control-label" for="body">Text:</label>
                                      <div class="col-sm-10">
                                          <textarea class="form-control" rows="5" v-model="text.body" id="body"></textarea>
                                        <span v-if="formErrors['description']" class="help-block">
                                            <strong class="text-danger">{{ formErrors['body']}}</strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="from-group">
                                    <label class="col-sm-2 control-label" for="body">Media:</label>
                                    <div class="col-sm-10">
                                      <form enctype="multipart/form-data">
                                        <input class="form-control" type="file" id="input">
                                      </form>
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
                </div>
            </div>
        </div>
    </div>
</div>


</template>
<script>
/*jshint esversion: 6 */

    export default {
      props: ['text'],
        mounted() {
            console.log('Component mounted.');

        },
        data() {
          return {
            formErrors : {},
            kurse : {},
            img : 'http://localhost/storage/',
        };
        },
        methods:{
          createItem (){

            var selectedFile = document.getElementById('input').files;
            var   nFiles = selectedFile.length;
            var uploadDatei = selectedFile[0];


            var fd = new FormData();
            fd.append('uploadFile',uploadDatei);
            fd.append('name',this.text.name);
            fd.append('body',this.text.body);
            fd.append('author',this.text.author);
            fd.append('id',this.text.id);
            fd.append('type',this.text.type);
            console.log(fd);
            console.log(this.text);
            axios.post('/api/testText', fd).then(response => {
              console.log('Done');
              this.text.media = response.data.media;
              this.text.type = response.data.type;
              $("#create-text").modal('hide');

            });
            },
        }
    };
</script>
