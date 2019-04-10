<template>
    <div class="login-form">
        <v-card-text>
            <v-form>
                <v-text-field
                        prepend-icon="person"
                        name="email"
                        label="E-mail"
                        type="text"
                        v-model="form.email"
                        :error-messages="checkError('email')"
                ></v-text-field>
                <v-text-field
                        prepend-icon="lock"
                        name="password"
                        label="Password"
                        type="password"
                        v-model="form.password"
                        :error-messages="checkError('password')"
                ></v-text-field>
            </v-form>
        </v-card-text>
        <v-card-actions>
            <v-card-text>
                <a @click="onSignUp">New user? Sign up to create your account</a>
            </v-card-text>
            <v-spacer></v-spacer>
            <v-btn @click="onLogin" color="primary">Login</v-btn>
        </v-card-actions>
    </div>
</template>

<script>
    import utils from '../helpers/utils';

    export default {
        name: "LoginForm",
        data() {
            return {
                form: {
                    email: null,
                    password: null,
                },
                errors: []
            }
        },
        methods: {
            onLogin() {
                this.error = {};
                let router = this.$router;
                let store = this.$store;

                axios.post('/api/login', this.form)
                    .then(response => {
                        if (response.data.success) {
                            store.dispatch('user/updateUserInfo', response.data);
                            let routeName = utils.getRouteNameBeforeAuth();
                            router.push({name: routeName,});
                        }
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                    })

            },

            onSignUp() {
                this.$router.push({name: 'registration',})
            },

            checkError(field) {
                return this.errors.hasOwnProperty(field) ? this.errors[field]: [];
            }
        }
    }
</script>

<style scoped>
    a {
        text-decoration: none;
    }

</style>