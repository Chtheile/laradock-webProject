<template lang="html">
    <div class="user-table">
      <table class="table table-bordred table-striped ">
      <thead>
        <tr>
          <th>Name</th>
          <th>Benutzername</th>
          <th>E-mail</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
        <tr v-for="user in users">
          <td>{{ user.name }}</td>
          <td>{{ user.username }}</td>
          <td>{{ user.email }}</td>
          <td>
            <button class="btn btn-default btn-xs" @click.prevent="editItem(user)"><span class="glyphicon glyphicon-pencil"></span></button>
          </td>
          <td>
              <button class="btn btn-danger btn-xs" @click.prevent="deleteItem(user)"><span class="glyphicon glyphicon-trash"></span></button>
          </td>
        </tr>
      </table>
    </div>
</template>

<script>
/*jshint esversion: 6 */
export default {
    props: ['users'],
    data() {
        return {

        };
    },
    methods:{
        editItem(user){
          console.log(user);
        },
        deleteItem(user){
          console.log(user);
        }
    }
  };
</script>

<style lang="css" >

</style>
