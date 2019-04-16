<template>
    <div class="a-q-list">
        <div v-if="!questions || !questions.length" class="ma-5">There are no questions</div>
        <v-card v-for="question in questions" :key="question.id" flat class="question-list-item my-4" :class="[question.state || '']">
            <v-layout row>
                <v-flex >
                    <v-checkbox class="pl-3"></v-checkbox>
                </v-flex>
                <v-flex >
                    <v-card-text class="pa-3"> {{question.text || ''}}
                    </v-card-text>
                </v-flex>
                <v-flex >
                    <v-btn dark color="indigo" @click="onEditClick(question.id)" class="ma-3">
                        Edit
                    </v-btn>
                </v-flex>
            </v-layout>
            <v-layout class="px-3 pb-3">
                <div>
                    <v-chip v-for="tag in question.tags" :key="tag.id" small color="indigo" text-color="white">{{tag.name}}</v-chip>
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
            onEditClick(id) {
                this.$emit('editQuestion', id)
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