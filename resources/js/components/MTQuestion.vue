<template>
  <div class="alert alert-secondary">
    <h3>{{ x }} + {{ y }} = ?</h3>
    <hr>
    <div class="buttons">
      <button
        v-for="answer in answers"
        :key="answer"
        class="btn btn-success"
        @click="onAnswer(answer)"
      >
        {{ answer }}
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: 'MTQuestion',
  props: ['settings'],
  data() {
    return {
      x: mtRand(this.settings.from, this.settings.to),
      y: mtRand(this.settings.from, this.settings.to),
    };
  },
  computed: {
    answers() {
      const res = [];
      res.push(this.correct);
      while (res.length < this.settings.variants) {
        const num = mtRand(this.correct - this.settings.range, this.correct + this.settings.range);
        if (res.indexOf(num) === -1) {
          res.push(num);
        }
      }
      return res.sort(() => 0.5 - Math.random());
    },
    correct() {
      return this.x + this.y;
    },
  },
  methods: {
    onAnswer(answer) {
      if (answer === this.correct) {
        this.$emit('correctAnswer');
      } else {
        this.$emit('incorrectAnswer', `${this.x} + ${this.y} = ${this.correct}!`);
      }
    },
  },
};
function mtRand(min, max) {
  const diff = max - min;
  return Math.floor(Math.random() * (diff + 1) + min);
}
</script>

<style scoped>
  .buttons {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
  }

</style>
