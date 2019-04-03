<template>
  <div class="training">
    <h1>Math Trainer! Level {{level + 1}}</h1>
    <div class="progress">
      <div
        class="progress-bar"
        :style="progressStyles"
      />
    </div>
    <div class="box">
      <transition
        name="flip"
        mode="out-in"
      >
        <m-t-start-screen
          v-if="state === 'start'"
          @onStart="onStart"
        />
        <m-t-question
          v-else-if="state === 'question'"
          @correctAnswer="onCorrectAnswer"
          @incorrectAnswer="onIncorrectAnswer"
          :settings="levels[level]"
        />
        <m-t-message
          v-else-if="state === 'message'"
          :type="message.type"
          :text="message.text"
          @next="onNext"
        />

        <m-t-result-screen
          v-else-if="state === 'result'"
          :stats="stats"
          @repeat="onStart"
          @nextLevel="onNextLevel"
        />
        <div v-else>
          Uncknown state
        </div>
      </transition>
    </div>
  </div>
</template>

<script>
import MTMessage from '../components/MTMessage.vue';
import MTQuestion from '../components/MTQuestion.vue';
import MTResultScreen from '../components/MTResultScreen.vue';
import MTStartScreen from '../components/MTStartScreen.vue';

export default {
  name: 'MathTrainer',
  components: {
    MTMessage,
    MTQuestion,
    MTResultScreen,
    MTStartScreen,
  },
  data() {
    return {
      state: 'start',
      stats: {
        error: 0,
        success: 0,
      },
      message: {
        type: '',
        text: '',
      },
      questionMax: 3,
      level: 0,
      levels: [
        {
          from: 10,
          to: 40,
          range: 5,
          variants: 2,
        },
        {
          from: 100,
          to: 200,
          range: 20,
          variants: 4,
        },
        {
          from: 100,
          to: 900,
          range: 50,
          variants: 6,
        },
      ],
    };
  },
  computed: {
    questionDone() {
      return this.stats.error + this.stats.success;
    },
    progressStyles() {
      return {
        width: `${this.questionDone / this.questionMax * 100}%`,
      };
    },
  },
  methods: {
    onStart() {
      this.state = 'question';
      this.stats.error = 0;
      this.stats.success = 0;
    },
    onCorrectAnswer() {
      this.state = 'message';
      this.message.text = 'Good job';
      this.message.type = 'success';
      this.stats.success++;
    },
    onIncorrectAnswer(message) {
      this.state = 'message';
      this.message.text = message;
      this.message.type = 'warning';
      this.stats.error++;
    },
    onNext() {
      if (this.questionDone >= this.questionMax) {
        this.state = 'result';
      } else {
        this.state = 'question';
      }
    },
    onNextLevel() {
      this.level++;
      this.onStart();
    },
  },
};
</script>

<style scoped>
  .training {
    max-width: 700px;
    margin: 20px auto;
  }
  .box {
    margin: 10px 0;
  }

  .progress-bar {
    transition: width 2s;
  }
  .flip-enter {

  }

  .flip-enter-active {
    animation: flipInX 0.3s linear;
  }

  .flip-leave {

  }

  .flip-leave-active {
    animation: flipOutX 0.3s linear;
  }

  @keyframes flipInX {
    from {
      transform: rotateX(90deg);
    }
    to {
      transform: rotateX(0deg);
    }
  }

  @keyframes flipOutX {
    from {
      transform: rotateX(0deg);
    }
    to {
      transform: rotateX(90deg);
    }
  }
</style>
