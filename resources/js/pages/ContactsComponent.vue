<template>
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">Contatti</div>
      <div class="col-12">
        <form method="post">
          <input type="email" name="from" />
          <input type="text" name="name" />
          <textarea name="message" cols="30" rows="10"></textarea>
          <button type="submit">Invia</button>
        </form>
      </div>
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
