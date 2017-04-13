<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{frage.name}} <div class="pull-right">{{frage.author}}    </div></div>

                    <div class="panel-body">
                        {{frage.body}}
                        <div v-if="frage.type === 'png'">
                          <img  :src="frage.media"  style="max-width: 75%; max-height: 75%;" class="rounded" alt="...">
                        </div>
                        <br>
                        <br>
                        <!-- 16:9 aspect ratio -->

                        <div v-if="frage.type === 'mp4'" class="embed-responsive embed-responsive-16by9 ">
                          <video width="320" height="240" controls>
                            <source  :src="frage.media" type="video/mp4">
                                Your browser does not support the video tag.
                         </video>
                        </div>

                        <audio v-if="frage.type === 'mpga'" controls>
                            <source  :src="frage.media" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                        <div class="row">
                          <div class="col-xs-6">
                          </div>
                          <div class="col-xs-6">
                          </div>
                        </div>
                        <div class="row">
                          <div v-if="frage.antwort1 !== '0'" class="col-xs-6">
                            <input id="antwort1" type="checkbox" @click="getContendView(frage.antwortLink1,frage.antwortLink1type)">
                            <label for="antwort1">{{ frage.antwort1 }}</label>
                          </div>
                          <div v-if="frage.antwort2 !== '0'" class="col-xs-6">
                            <input id="antwort2" type="checkbox" @click="getContendView(frage.antwortLink2,frage.antwortLink2type)">
                            <label  for="antwort2">{{ frage.antwort2 }}</label></div>
                        </div>
                        <div class="row">
                          <div v-if="frage.antwort3 !== '0'" class="col-xs-6">
                            <input  id="antwort3" type="checkbox" @click="getContendView(frage.antwortLink3,frage.antwortLink3type)">
                            <label  for="antwort3">{{ frage.antwort3 }}</label>
                          </div>

                          <div v-if="frage.antwort4 !== '0'" class="col-xs-6"><input id="antwort4" type="checkbox" @click="getContendView(frage.antwortLink4,frage.antwortLink4type)">
                            <label for="antwort4">{{ frage.antwort4 }}</label>
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
        props: ['frage'],
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
          getContendView(id,type){

               this.$emit('increment',{
                 id:id,
                 type:type
               });
             //this.$emit('getContend',{
              //  id : 2
              //});

               $(':checkbox').prop('checked', false);
              console.log(id);
          }
        }
    };
</script>
