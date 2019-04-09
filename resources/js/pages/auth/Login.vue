<template>
    <div class="login-page">
        <v-content>
            <v-container fluid>
                <v-layout align-center justify-center column mb-5>
                        <img src="../../../images/logo3.png" height="200" width="200"/>
                </v-layout>
                <v-layout align-center justify-center>
                    <v-flex xs12 sm8 md4>
                        <v-card class="elevation-12">
                            <v-toolbar dark color="primary">
                                <v-btn icon @click="onBack">
                                    <v-icon>arrow_back</v-icon>
                                </v-btn>
                                <v-toolbar-title>Login form</v-toolbar-title>
                                <v-spacer></v-spacer>
                            </v-toolbar>
                            <login-form></login-form>
                        </v-card>
                    </v-flex>
                </v-layout>
            </v-container>
        </v-content>
    </div>
</template>

<script>
    import LoginForm from "../../components/LoginForm.vue";
    import utils from "../../helpers/utils";

    export default {
        name: "login",
        components: {
            LoginForm,
        },
        methods: {
            onBack(){
                let routeName = utils.getRouteBeforeAuth();
                this.$router.push({name: routeName});
            }
        }
    }
</script>

<style scoped>


</style>