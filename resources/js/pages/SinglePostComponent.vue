<template>
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">Dettaglio Post</div>
      <div v-if="post">
        <h2>{{ post.title }}</h2>
        <h3>Contenuto Post:</h3>
        <p>{{ post.content }}</p>
        <div>
          <h3>Categoria:</h3>
          <p>{{ post.category.name }}</p>
        </div>
        <div>
          <h3>Tags:</h3>
          <ul>
            <li v-for="tag in post.tags" :key="tag.id">
              {{ tag.name }}
            </li>
          </ul>
        </div>
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
      post: undefined,
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
          this.post = results.data.results;
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

