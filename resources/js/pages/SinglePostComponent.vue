<template>
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">Sezione My Post</div>
      <div v-if="posts">
        {{ posts.title }}
      </div>
      <div v-else>Caricamento in corso</div>
    </div>
  </div>
</template>

<script>
export default {
  name: "SinglePostComponent",
  data() {
    return {
      posts: undefined,
    };
  },

  mounted() {
    const id = this.$route.params.id;
    console.log(id);

    window.axios
      .get("http://127.0.0.1:8000/api/posts/" + id)
      .then((results) => {
        console.log(results);
        if (results.status === 200 && results.data.success) {
          this.posts = results.data.results;
        }
        // console.log(this.posts);
      })
      .catch((e) => {
        console.log(e);
      });
  },
};
</script>

<style lang="scss" scoped>
</style>>

