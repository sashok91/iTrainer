<template>
  <div class="Results">
    <div
      v-for="item in results"
      class="Item"
    >
      <a
        :href="item.url"
        class="Item__title"
      >{{ item.title }}</a>
      <div class="Item__url">{{item.url}}</div>
      <div class="Item_snippet" v-html="item.snippet"></div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'SearchAppResult',
  computed: {
    results() {
      return this.$store.getters.results;
    },
  },
};
</script>

<style scoped>
  .Results {
    padding: 10px 0 30px 146px;
    text-align: left;
  }

  .Item {
    padding: 10px;
    width: 590px;
  }

  .Item__title {
    font-size: 16px;
    color: #331cb5;
    text-decoration: none;
  }

  .Item__title:hover {
    text-decoration: underline;
  }

  .Item__url {
    font-size: 14px;
    color: #006621;
  }

  .Item__title, .Item__url {
    margin-bottom: 2px;
  }

  .Item__snippet {
    font-size: 13px;
    color: #6a6a6a;
  }

  .Item__snippet .searchmatch {
    font-weight: bold;
  }
</style>
