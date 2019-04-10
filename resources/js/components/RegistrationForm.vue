<template>
    <div class="registration-form">
        <v-card-text>
            <v-form>
                <v-text-field
                        prepend-icon="person"
                        name="name"
                        label="Login"
                        type="text"
                        v-model="form.name"
                        :error-messages="checkError('name')"
                ></v-text-field>
                <v-text-field
                        prepend-icon="email"
                        name="email"
                        label="E-mail"
                        type="email"
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
                <v-text-field
                        prepend-icon="lock"
                        name="password_confirm"
                        label="Password confirmation"
                        type="password"
                        v-model="form.password_confirmation"
                ></v-text-field>
            </v-form>
        </v-card-text>
        <v-card-actions>
            <v-card-text>
                <a @click="onLogIn">Already have an account? Log in now</a>
            </v-card-text>
            <v-spacer></v-spacer>
            <v-btn @click="onRegister" color="primary">Sign up</v-btn>
        </v-card-actions>
    </div>
</template>

<script>
    export default {
        name: "RegistrationForm",
        data() {
            return {
                form: {
                    name: null,
                    email: null,
                    password: null,
                    password_confirmation: null,
                },
                errors: []
            }
        },
        methods: {
            onRegister() {
                this.error = {};
                let router = this.$router;
                axios.post('/api/register', this.form)
                    .then(response => {
                        if (response.data.success) {
                            router.push({name: 'login'});
                        }
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                    })

            },

            onLogIn() {
                this.$router.push('login');
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