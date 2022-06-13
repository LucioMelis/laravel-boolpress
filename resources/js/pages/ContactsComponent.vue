<template>
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">Contatti</div>
      <!-- INPUT AREA MAIL  -->
      <form method="post" @submit.prevent="sendForm()">
        <div>
          <label for="email">Inserisci email</label>
          <input v-model="email" type="email" name="email" />
        </div>
        <div>
          <label for="name">Inserisci nome</label>
          <input v-model="name" type="text" name="name" />
        </div>
        <div>
          <label for="message">Inserisci contenuto</label>
          <textarea
            v-model="message"
            name="message"
            cols="30"
            rows="10"
          ></textarea>
        </div>
        <!-- SUBMIT  -->
        <button type="submit">Invia</button>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: "ContactsComponent",
  data() {
    return {
      email: "",
      name: "",
      message: "",
      sending: false,
      success: false,
    };
  },
  methods: {
    sendForm() {
      window.axios
        .post("/api/contacts", {
          name: this.name,
          email: this.email,
          message: this.message,
        })
        .then((response) => {
          this.message = "";
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
