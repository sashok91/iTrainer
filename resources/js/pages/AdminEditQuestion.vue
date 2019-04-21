<template>
    <div class="admin-edit-question">
        <h2 class="ml-4 grey--text text--darken-2">Edit Question</h2>
        <v-container>
            <a-q-add-edit :question="question"></a-q-add-edit>
        </v-container>
    </div>
</template>

<script>
    import AQAddEdit from '../components/AQAddEdit.vue';
    import api from '../helpers/api';

    export default {
        name: "AdminEditQuestion",
        components: {
            AQAddEdit
        },
        props: {
            id: Number
        },
        data() {
            return {
                question: {}
            }
        },
        created() {
            let id = this.$route.params.id;
            api.getQuestion(id).then((resp) => {
                if (resp.data) {
                    this.question = resp.data;
                }
            });
        }
    }
</script>

<style scoped>

</style>