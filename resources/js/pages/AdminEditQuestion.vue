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

    export default {
        name: "AdminEditQuestion",
        components: {
            AQAddEdit
        },
        data() {
            return {
                question: {
                    id: 1,
                    text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut, nulla, sapiente? Cum eaque minima recusandae voluptate. Alias autem deserunt error et ex ipsum laboriosam',
                    state: 'draft',
                    tags: [
                        {
                            id: '1',
                            name: 'php'
                        },
                        {
                            id: '2',
                            name: 'junior'
                        },
                    ],
                    answer: {
                        id: 1,
                        short_answer: '<p><i>Lorem</i> ipsum dolor sit amet, consectetur adipisicing elit. Aut, nulla, sapiente? Cum eaque minima recusandae voluptate. Alias autem deserunt error et ex ipsum</p>',
                        long_answer: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut, nulla, sapiente? Cum eaque minima recusandae voluptate. Alias autem deserunt error et ex ipsum laboriosamLorem ipsum dolor sit amet, consectetur adipisicing elit. Aut, nulla, sapiente? Cum eaque minima recusandae voluptate. Alias autem deserunt error et ex ipsum laboriosam et, consectetur adipisicing elit. Aut, nulla, sapiente? Cum eaque minima recusandae voluptate. Alias autem deserunt error et ex ipsum laboriosam',
                        is_correct: true,
                        links: [
                            {
                                id: 1,
                                href: 'http://tut.by',
                                text: 'About Tut'
                            }
                        ]
                    }
                }
            }
        }
    }
</script>

<style scoped>

</style>