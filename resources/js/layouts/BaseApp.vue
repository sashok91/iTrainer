<template>
    <div class="base-app">
        <v-layout justify-center column fluid>
            <v-flex>
                <v-toolbar>

                    <v-toolbar-side-icon></v-toolbar-side-icon>

                    <v-toolbar-title>TitleTitleTitleTitleTitleTitleTitleTitleTitleTitle</v-toolbar-title>

                    <v-spacer></v-spacer>

                    <v-toolbar-items class="hidden-sm-and-down">
                        <v-btn flat to="/app">Home</v-btn>
                        <v-btn flat to="/login">Log In</v-btn>
                        <v-btn flat to="/registration">Sign Up</v-btn>
                    </v-toolbar-items>

                </v-toolbar>
            </v-flex>
        </v-layout>
        <v-content>
            <router-view/>
        </v-content>
    </div>
</template>

<script>
    export default {
        name: "BaseApp"
    }
</script>

<style scoped>

</style>