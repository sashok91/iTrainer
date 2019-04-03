<template>
  <div class="alert alert-primary">
    <h3>Success: {{ stats.success }}</h3>
    <h3>Error: {{ stats.error }}</h3>
    <hr>
    <div class="buttons">
      <button class="btn btn-primary" @click="$emit('repeat')">
        Reapet
      </button>
      <button class="btn btn-primary" @click="$emit('nextLevel')">
        Next Level
      </button>
    </div>

  </div>
</template>

<script>
export default {
  name: 'MTResultScreen',
  props: ['stats'],
};
</script>

<style scoped>
.buttons {
  display: flex;
  justify-content: space-between;
}
</style>
