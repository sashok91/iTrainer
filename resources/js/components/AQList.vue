<template>
    <div class="a-q-list">
        <div v-if="!questions || !questions.length" class="ma-5">There are no questions</div>
        <v-card v-for="question in questions" :key="question.id" flat class="question-list-item my-4"
                :class="[question.state || '']">
            <v-layout row wrap>
                <v-flex xs1 >
                    <v-checkbox class="px-3 py-0" ></v-checkbox>
                </v-flex>
                <v-flex xs11 sm9 grow>
                    <v-card-text> {{question.text || ''}}
                    </v-card-text>
                </v-flex>
                <v-flex xs12 sm2 text-xs-right>
                    <v-btn dark color="indigo" @click="onEditClick(question.id)">
                        Edit
                    </v-btn>
                </v-flex>
            </v-layout>
            <v-layout v-if="question.tags && question.tags.length" class="px-3 pb-3">
                <div>
                    <v-chip v-for="tag in question.tags" :key="tag.id" small color="indigo" text-color="white">
                        {{tag.name}}
                    </v-chip>
                </div>
            </v-layout>
        </v-card>
    </div>

</template>

<script>
    export default {
        name: "AQList",
        props: {
            'questions': Array
        },
        methods: {
            onEditClick(questionId) {
                if (questionId) {
                    this.$router.push({
                        name: 'edit-question',
                        params: {'id': questionId}
                    });
                } else {
                    console.error('Question id is empty!');
                }
            }
        }
    }
</script>

<style scoped>
    .question-list-item.draft {
        border-left: 4px solid #c4c4c4;
    }

    .question-list-item.active {
        border-left: 4px solid #9600ee;
    }
</style>