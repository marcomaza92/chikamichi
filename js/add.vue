<template lang="html">
    <div>
        <h1>{{title}}</h1>
        <p>Welcome to the {{title}} demo.</p>
        <h2>Add a new user below</h2>
        <form method="post" action="./add">
          <div class="">
            <label for="">Name</label>
            <input type="text" name="name" required>
          </div>
          <div class="">
            <label for="">Address</label>
            <input type="text" name="address" required>
          </div>
          <div class="">
            <label for="">Email</label>
            <input type="email" name="email" required>
          </div>
          <div class="">
            <label for="">Phone</label>
            <input type="number" name="phone" required>
          </div>
          <div class="">
            <button type="submit" name="submit">Save</button>
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
