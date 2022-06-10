<template>
  <div class="container">
    <div class="d-flex flex-column">
      <div v-for="post in posts" :key="post.id">
        <h1>{{ post.title }}</h1>
        <p>{{ post.content }}</p>
        <router-link :to="{ name: 'single-post', params: { slug: post.slug } }">
          Visualizza Post
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "PostCardComponent",
  props: {
    posts: Array,
  },
};
</script>

<style lang="scss" scoped>
</style>
