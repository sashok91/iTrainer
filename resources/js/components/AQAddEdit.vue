<template>
    <div class="add-edit-question">

        <base-block-for-edit icon="edit" title="Question" @iconClick="editQuestion">
            <v-card-text>{{questionCopy.text}}</v-card-text>
        </base-block-for-edit>
        <base-edit-modal v-model="dialog.question" title="Question" v-slot @save="saveQuestion">
            <v-textarea
                    outline
                    auto-grow
                    :rules="[v => !!v || 'Field is required']"
                    v-model="textQuestionForEdit"
            ></v-textarea>
        </base-edit-modal>

        <base-block-for-edit icon="edit" title="Short Answer" @iconClick="editShortAnswer">
            <v-card-text>{{answer.short_answer || ''}}</v-card-text>
        </base-block-for-edit>
        <base-edit-modal v-model="dialog.shortAnswer" title="Short Answer" v-slot @save="saveShortAnswer">
            <v-textarea
                    outline
                    auto-grow
                    :rules="[v => !!v || 'Field is required']"
                    v-model="shortAnswerForEdit"
            ></v-textarea>
        </base-edit-modal>

        <base-block-for-edit icon="edit" title="Long Answer" @iconClick="editLongAnswer">
            <v-card-text>{{answer.long_answer || ''}}</v-card-text>
        </base-block-for-edit>
        <base-edit-modal v-model="dialog.longAnswer" title="Long Answer" v-slot @save="saveLongAnswer">
            <v-textarea
                    outline
                    auto-grow
                    :rules="[v => !!v || 'Field is required']"
                    v-model="longAnswerForEdit"
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

        <base-edit-modal v-model="dialog.links" title="Link" v-slot @save="saveLink">
            <v-layout wrap>
                <v-flex xs12>
                    <v-text-field
                            label="Href"
                            :rules="[v => !!v || 'Href is required']"
                            required
                            v-model="linkForEdit.href"
                    ></v-text-field>
                </v-flex>
                <v-flex xs12>
                    <v-text-field
                            label="Text"
                            v-model="linkForEdit.text"
                    ></v-text-field>
                </v-flex>
            </v-layout>
        </base-edit-modal>

    </div>
</template>

<script>
    import BaseBlockForEdit from './BaseBlockForEdit.vue';
    import BaseModalTextarea from './BaseModalTextarea.vue';
    import BaseEditModal from './BaseEditModal.vue';
    import api from "../helpers/api";

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
                //for page binding
                questionCopy: {
                    answers: {
                    }
                },
                linkForEdit: {
                    href: '',
                    text: ''
                },
                textQuestionForEdit: '',
                shortAnswerForEdit: '',
                longAnswerForEdit: '',
            }
        },
        computed: {
            answer() {
                return this.questionCopy ? this.questionCopy.answers : {};
            }
        },
        watch: {
            question() {
                this.questionCopy =  _.cloneDeep(this.question);
            }
        },
        methods: {
            editQuestion() {
                // set initial value before dialog opening
                this.textQuestionForEdit = this.questionCopy.text;
                // show dialog
                this.dialog.question = true;
            },
            editShortAnswer() {
                // set initial value before dialog opening
                this.shortAnswerForEdit = this.questionCopy.answers.short_answer;
                this.dialog.shortAnswer = true;
            },
            editLongAnswer() {
                // set initial value before dialog opening
                this.longAnswerForEdit = this.questionCopy.answers.long_answer;
                this.dialog.longAnswer = true;
            },
            addLink() {
                this.linkForEdit = {};
                this.dialog.links = true;
            },
            onLinkEditClick(link) {
                this.linkForEdit = _.cloneDeep(link);
                this.dialog.links = true;
            },
            onLinkRemoveClick(link) {
                if (link) {
                    api.deleteLink(link.id).then((resp) => {
                        if (resp.data.success) {
                            let linkIndex = _.findIndex(this.questionCopy.answers.links, {id: link.id});
                            if (linkIndex !== -1) {
                                this.questionCopy.answers.links.splice(linkIndex, 1);
                            }
                        }
                    });
                }
            },
            saveQuestion() {
                api.editQuestion(this.questionCopy.id, {text: this.textQuestionForEdit}).then((resp) => {
                    if (resp.data.success) {
                        this.questionCopy.text = this.textQuestionForEdit;
                    }
                });

            },
            saveShortAnswer() {
                api.editAnswer(this.questionCopy.answers.id, {text: this.shortAnswerForEdit}).then((resp) => {
                    if (resp.data.success) {
                        this.questionCopy.answers.short_answer = this.shortAnswerForEdit;
                    }
                });
            },
            saveLongAnswer() {
                api.editAnswer(this.questionCopy.answers.id, {long_answer: this.longAnswerForEdit}).then((resp) => {
                    if (resp.data.success) {
                        this.questionCopy.answers.long_answer = this.longAnswerForEdit;
                    }
                });

            },
            saveLink() {
                if (this.linkForEdit.id) {
                    // edit existing link
                    api.editLink(this.linkForEdit.id, this.linkForEdit).then((resp) => {
                        if (resp.data.success) {
                            let linkIndex = _.findIndex(this.questionCopy.answers.links, {id: this.linkForEdit.id});
                            if (linkIndex !== -1) {
                                this.questionCopy.answers.links.splice(linkIndex, 1, resp.data.link);
                            }
                        }
                    });
                } else {
                    // add new link
                    this.linkForEdit.answer_id = this.questionCopy.answers.id;
                    api.addLink(this.linkForEdit).then((resp) => {
                        if (resp.data.success) {
                            this.questionCopy.answers.links.push(resp.data.link);
                        }
                    });

                }

            }
        }
    }
</script>

<style scoped>

</style>