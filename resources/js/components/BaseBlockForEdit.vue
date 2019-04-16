<template>
    <div class="bae-block-for-edit">
        <v-layout row justify-space-around>
            <v-flex>
                <div class="subheading mt-3">
                    {{title || ''}}
                </div>
            </v-flex>
            <v-flex class="text-xs-right" v-if="icon">
                <v-btn flat small fab dark color="indigo" @click="onIconClick">
                    <v-icon dark>{{icon}}</v-icon>
                </v-btn>
            </v-flex>
        </v-layout>
        <v-card flat class="mb-4">
            <slot></slot>
        </v-card>
    </div>
</template>

<script>
    export default {
        name: "BaseBlockForEdit",
        props: {
            'title': String,
            'icon': String
        },
        methods: {
            onIconClick() {
                this.$emit('iconClick');
            }
        }
    }
</script>

<style scoped>

</style>