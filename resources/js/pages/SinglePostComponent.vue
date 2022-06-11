<template>
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">Dettaglio Post</div>
      <div v-if="post">
        <h2>{{ post.title }}</h2>
        <h4>Contenuto Post:</h4>
        <p>{{ post.content }}</p>
        <div>
          <h4>Categoria:</h4>
          <p>{{ post.category.name }}</p>
        </div>
        <div>
          <h4>Tags:</h4>
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
    const slug = this.$route.params.slug;
    // console.log(slug);

    window.axios
      .get("http://127.0.0.1:8000/api/posts/" + slug)
      .then((results) => {
        // console.log(results);
        if (results.status === 200 && results.data.success) {
          this.post = results.data.results;
        }
        console.log(this.post);
      })
      .catch((e) => {
        console.log(e);
      });
  },
};
</script>

<style lang="scss" scoped>
</style>>

