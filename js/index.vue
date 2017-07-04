<template lang="html">
    <div>
        <h1>{{title}}</h1>
        <p>Welcome to the {{title}} demo.</p>
        <h2>Users from MySQL database</h2>
        <!-- <div>{{users}}</div> -->
        <br/>
        <table>
          <tr v-for="user in users">
            <td>{{user.name}}</td>
            <td>{{user.address}}</td>
            <td>{{user.email}}</td>
            <td>{{user.phone}}</td>
            <td><a v-bind:href="'/edit/'+user.id">Edit</a></td>
            <td><a v-bind:href="'/delete/'+user.id">Delete</a></td>
          </tr>
        </table>
        <!--<p>Component below</p>
        <users :users="users"></users>-->
        <br/>
        <button type="button" onclick="window.location.href = '/add';">Add User</button>
    </div>
</template>

<script>
export default {
    data: function() {
        return {
        }
    }
}
</script>

<style lang="css">
</style>
