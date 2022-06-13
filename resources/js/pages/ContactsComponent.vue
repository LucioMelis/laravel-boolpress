<template>
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">Contatti</div>
      <form method="post">
        <input type="email" name="from" />
        <textarea name="content" cols="30" rows="10"></textarea>
        <button type="submit">Invia</button>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: "ContactsComponent",
};
</script>

<style lang="scss" scoped>
</style>
