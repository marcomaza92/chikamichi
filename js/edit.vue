<template lang="html">
    <div>
        <h1>{{title}}</h1>
        <p>Welcome to the {{title}} demo.</p>
        <h2>Edit an existent user below</h2>
        <form v-for="user in users" method="post" v-bind:action="'/edit/'+user.id">
          <div class="">
            <label for="">Name</label>
            <input v-bind:value="user.name" type="text" name="name" required>
          </div>
          <div class="">
            <label for="">Address</label>
            <input v-bind:value="user.address" type="text" name="address" required>
          </div>
          <div class="">
            <label for="">Email</label>
            <input v-bind:value="user.email" type="email" name="email" required>
          </div>
          <div class="">
            <label for="">Phone</label>
            <input v-bind:value="user.phone" type="number" name="phone" required>
          </div>
          <div class="">
            <button type="submit" name="submit">Edit</button>
            <button type="button" onclick="window.location.href = '/';">Cancel</button>
          </div>
        </form>
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
