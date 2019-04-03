<template>
    <div class="alert" :class="'alert-' + type">
      <h2>{{text}}</h2>
      <hr>
      <button class="btn btn-primary" @click="$emit('next')">Continue</button>
    </div>
</template>

<script>
export default {
  name: 'MTMessage',
  props: [
    'type',
    'text',
  ],
};
</script>

<style scoped>

</style>
