<template>
    <v-layout row justify-center>
        <v-dialog v-model="show" persistent max-width="600px">
            <v-card>
                <v-card-title v-if="title">
                    <span class="headline">{{title}}</span>
                </v-card-title>
                <v-card-text>
                    <v-form ref="form">
                        <slot></slot>
                    </v-form>
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
        name: "BaseEditModal",
        props: {
            title: String,
            value: Boolean
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
        methods: {
            onSaveClick() {
                if (this.$refs.form.validate()) {
                    this.show = false;
                    this.$emit('onSave');
                }
            },
            onCloseClick() {
                this.show = false;
                this.$refs.form.resetValidation();
            }
        }
    }
</script>

<style scoped>

</style>