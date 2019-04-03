<template>
  <div class="Search">
    <input type="text" class="Search__input" v-model="query">
    <button class="Search__button" @click="search">Search</button>
  </div>
</template>

<script>
export default {
  name: 'SearchAppSearch',
  data() {
    return {
      query: '',
    };
  },
  methods: {
    search() {
      this.$store.dispatch('search', this.query);
    },
  },
};
</script>

<style scoped>
  .Search {
    display: flex;
  }

  .Search__input {
    width: 590px;
    height: 32px;
    border: 1px solid #cac9cc;
    border-right: none;
    padding: 0 10px;
    font-size: 16px;
    outline: none;
  }

  .Search__button {
    width: 60px;
    background-color: #4886f3;
    border: 1px solid #4f84d7;
    border-top-right-radius: 2px;
    border-bottom-right-radius: 2px;
    color: #fff;
    cursor: pointer;
    height: 32px;
    font-size: 12px;
  }

</style>
