<template>
    <div class="add-edit-question">

        <base-block-for-edit icon="edit" title="Question" @iconClick="editQuestion">
            <v-card-text>{{question.text}}</v-card-text>
        </base-block-for-edit>
        <base-edit-modal v-model="dialog.question" title="Question" v-slot>
            <v-textarea
                    outline
                    auto-grow
                    :rules="[v => !!v || 'Field is required']"
                    v-model="questionCopy.text"
            ></v-textarea>
        </base-edit-modal>

        <base-block-for-edit icon="edit" title="Short Answer" @iconClick="editShortAnswer">
            <v-card-text>{{answer.short_answer || ''}}</v-card-text>
        </base-block-for-edit>
        <base-edit-modal v-model="dialog.shortAnswer" title="Short Answer" v-slot>
            <v-textarea
                    outline
                    auto-grow
                    :rules="[v => !!v || 'Field is required']"
                    v-model="questionCopy.answer.short_answer"
            ></v-textarea>
        </base-edit-modal>

        <base-block-for-edit icon="edit" title="Long Answer" @iconClick="editLongAnswer">
            <v-card-text>{{answer.long_answer || ''}}</v-card-text>
        </base-block-for-edit>
        <base-edit-modal v-model="dialog.longAnswer" title="Long Answer" v-slot>
            <v-textarea
                    outline
                    auto-grow
                    :rules="[v => !!v || 'Field is required']"
                    v-model="questionCopy.answer.long_answer"
            ></v-textarea>
        </base-edit-modal>

        <base-block-for-edit icon="add" title="Links" @iconClick="addLink">
            <div v-for="link in answer.links" :key="link.id" class="pa-2">
                <v-layout>
                    <v-flex class="my-auto">
                        <a :href="link.href" target="_blank">{{link.text || link.href}}</a>
                    </v-flex>
                    <v-flex class="text-xs-right">
                        <v-btn flat small fab dark color="indigo" @click="onLinkEditClick(link)">
                            <v-icon dark>edit</v-icon>
                        </v-btn>
                        <v-btn flat small fab dark color="indigo" @click="onLinkRemoveClick(link)">
                            <v-icon dark>delete</v-icon>
                        </v-btn>
                    </v-flex>
                </v-layout>
            </div>
        </base-block-for-edit>

        <base-edit-modal v-model="dialog.links" title="Link" v-slot>
            <v-layout wrap>
                <v-flex xs12>
                    <v-text-field
                            label="Href"
                            :rules="[v => !!v || 'Href is required']"
                            required
                    ></v-text-field>
                </v-flex>
                <v-flex xs12>
                    <v-text-field label="Text"></v-text-field>
                </v-flex>
            </v-layout>
        </base-edit-modal>

    </div>
</template>

<script>
    import BaseBlockForEdit from './BaseBlockForEdit.vue';
    import BaseModalTextarea from './BaseModalTextarea.vue';
    import BaseEditModal from './BaseEditModal.vue';

    export default {
        name: "AQAddEdit",
        components: {
            BaseBlockForEdit,
            BaseModalTextarea,
            BaseEditModal
        },
        props: {
            'question': Object
        },
        data() {
            return {
                dialog: {
                    question: false,
                    longAnswer: false,
                    shortAnswer: false,
                    links: false
                },
                questionCopy: _.cloneDeep(this.question)
            }
        },
        computed: {
            answer() {
                return this.questionCopy ? this.questionCopy.answer : null;
            }
        },
        methods: {
            editQuestion() {
                // show dialog
                this.dialog.question = true;
            },
            editShortAnswer() {
                this.dialog.shortAnswer = true;
            },
            editLongAnswer() {
                this.dialog.longAnswer = true;
            },
            addLink() {
                this.dialog.links = true;
            },
            onLinkEditClick(link) {
                this.dialog.links = true;
            },
            onLinkRemoveClick(link) {

            }
        }
    }
</script>

<style scoped>

</style>