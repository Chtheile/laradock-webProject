<template>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{text.hallo}}</div>

                <div class="panel-body">
                  <div class="pull-left">
                      <h4>Aktuelles: </h4>
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
      props: ['text'],
        mounted() {
            console.log('Component mounted.');
            console.log(this.text.hallo);
        }
    };
</script>
