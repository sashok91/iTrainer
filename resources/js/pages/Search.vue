<template>
  <div>
    <header>
      <div class="logo">

      </div>
      <search-app-search></search-app-search>
    </header>
    <main>
      <search-app-result></search-app-result>
    </main>
  </div>
</template>

<script>
import SearchAppSearch from '../components/SearchAppSearch.vue';
import SearchAppResult from '../components/SearchAppResult.vue';

export default {
  name: 'Search',
  components: {
    SearchAppSearch,
    SearchAppResult,
  },
};
</script>

<style scoped>
  * {
    box-sizing: border-box;
  }

  body, html {
    padding: 0;
    margin: 0;
    font-family: Helvetica, Arial, sans-serif;
  }

  header {
    background-color: #f1f1f1;
    height: 62px;
    padding: 15px 20px;
    border-bottom: 1px solid #edeaed;
    display: flex;
  }

  .logo {
    display: flex;
    align-items: center;
    height: 28px;
    width: 125px;
    flex-shrink: 0;
  }

  .logo img {
    height: 100%;
  }
</style>
