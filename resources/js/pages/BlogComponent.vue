<template>
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">Sezione My Post</div>
      <div v-if="posts.length > 0">
        <PostCardComponent :posts="posts" />
        <button
          class="btn btn-primary"
          v-if="previousPageLink"
          @click="goPreviousPage()"
        >
          Prev
        </button>
        <button
          class="btn btn-primary"
          v-if="nextPageLink"
          @click="goNextPage()"
        >
          Next
        </button>
      </div>
      <div v-else>Caricamento in corso</div>
    </div>
  </div>
</template>

<script>
import PostCardComponent from "../components/PostCardComponent";

export default {
  name: "BlogComponent",
  components: {
    PostCardComponent,
  },
  data() {
    return {
      posts: [],
      currentPage: 1,
      previosPageLink: "",
      nextPageLink: "",
    };
  },
  mounted() {
    this.loadPage("http://127.0.0.1:8000/api/posts");
  },
  methods: {
    loadPage(url) {
      window.axios
        .get(url)
        .then((results) => {
          console.log(results);
          if (results.status === 200 && results.data.success) {
            this.posts = results.data.results.data;
            this.currentPage = results.data.results.current_page;
            this.previousPageLink = results.data.results.prev_page_url;
            this.nextPageLink = results.data.results.next_page_url;
          }
          console.log(this.posts);
        })
        .catch((e) => {
          console.log(e);
        });
    },
    goPreviousPage() {
      this.loadPage(this.previousPageLink);
    },
    goNextPage() {
      this.loadPage(this.nextPageLink);
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
