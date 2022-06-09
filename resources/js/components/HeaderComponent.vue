<template>
  <header>
    <nav class="navbar navbar-light">
      <ul class="nav">
        <li
          v-for="(itemLink, index) in menu"
          :key="index"
          class="nav-item mr-3"
        >
          <router-link :to="{ name: itemLink.href }">
            {{ itemLink.name }}
          </router-link>
        </li>
      </ul>
    </nav>
  </header>
</template>

<script>
export default {
  name: "HeaderComponent",
  data() {
    return {
      menu: [
        {
          href: "home",
          name: "Home",
        },
        {
          href: "contacts",
          name: "Contatti",
        },
        {
          href: "blog",
          name: "Posts",
        },
      ],
    };
  },
};
</script>

<style lang="scss" scoped>
</style>


