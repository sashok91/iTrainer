<template>
    <div class="admin-questions-page">
        <h2 class="ml-4 grey--text text--darken-2">Questions</h2>
        <v-container>
            <v-layout grid-list-lg row wrap text-xs-center>
                <v-flex xs12 sm11 order-xs2 order-sm1>
                    <a-q-filter></a-q-filter>
                </v-flex>
                <v-flex xs12 sm1 order-xs1 order-sm2>
                    <v-btn small fab dark color="indigo" @click="onAddClick">
                        <v-icon dark>add</v-icon>
                    </v-btn>
                </v-flex>
            </v-layout>
            <v-layout>
                <v-flex>
                    <a-q-list :questions="questions"></a-q-list>
                </v-flex>

            </v-layout>

        </v-container>
    </div>
</template>

<script>
    import AQFilter from '../components/AQFilter.vue';
    import AQList from '../components/AQList.vue';
    import api from '../helpers/api.js';

    export default {
        name: 'AdminQuestions',
        data() {
            return {
                questions: [
                    {
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
                        ]
                    },
                    {
                        id: 2,
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
                        ]
                    },
                    {
                        id: 3,
                        text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut, nulla, sapiente? Cum eaque minima recusandae voluptate. Alias autem deserunt error et ex ipsum laboriosam',
                        state: 'active',
                        tags: [
                            {
                                id: '1',
                                name: 'php'
                            },
                            {
                                id: '2',
                                name: 'junior'
                            },
                        ]
                    }

                ]
            }
        },
        components: {
            AQFilter,
            AQList
        },
        created() {
            api.getQuestionsForAdmin().then((resp) => {
                this.questions = resp.data;
            });
        },
        methods: {
            onAddClick() {
                this.$router.push({
                    name: 'admin-add-question'
                })
            }
        }
    }
</script>

<style scoped>

</style>