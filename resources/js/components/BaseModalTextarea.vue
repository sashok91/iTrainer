<template>
    <v-layout row justify-center>
        <v-dialog v-model="show" persistent max-width="600px">
            <v-card>
                <v-card-title>
                    <span class="headline">{{data.title}}</span>
                </v-card-title>
                <v-card-text>
                    <v-textarea
                            outline
                            auto-grow
                            v-model="text"
                    ></v-textarea>
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="indigo darken-1" flat @click="onCloseClick">Close</v-btn>
                    <v-btn color="indigo darken-1" flat @click="onSaveClick">Save</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-layout>
</template>

<script>
    export default {
        name: "BaseModalTextarea",

        props: {
            data: Object,
            value: Boolean
        },
        data() {
            return {
                text: ''
            }
        },
        computed: {
            show: {
                get() {
                    return this.value
                },
                set(value) {
                    this.$emit('input', value)
                }
            }
        },
        watch: {
            show(value) {
                // after each opening of modal we should show initial text
                if (value) {
                    this.text = this.data.text;
                }
            }
        },
        methods: {
            initTextarea() {
                return this.data.text;
            },
            onSaveClick() {
                this.show = false;
                this.$emit('onSave', {text: this.text});
            },
            onCloseClick() {
                this.show = false;
            }
        }
    }
</script>

<style scoped>

</style>