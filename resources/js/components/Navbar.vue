<template>
    <nav>
        <v-toolbar flat app >

            <v-toolbar-side-icon @click="toggleSidebar" class="grey--text text--darken-2"></v-toolbar-side-icon>

            <v-toolbar-title class=" grey--text  text--darken-2">
                <span>i</span><span class="text-uppercase">Trainer</span>
            </v-toolbar-title>

            <v-spacer></v-spacer>

            <v-toolbar-items >
                <v-btn class="grey--text text--darken-2" flat to="/app">Home</v-btn>
                <v-btn class="grey--text text--darken-2" flat to="/login">Log In</v-btn>
                <v-btn class="grey--text text--darken-2" flat to="/registration">Sign Up</v-btn>
            </v-toolbar-items>

            <v-btn flat @click="onLogoutClick" class="grey--text text--darken-2">
                <span>Log out</span>
                <v-icon right>exit_to_app</v-icon>
            </v-btn>

        </v-toolbar>

        <side-navigation></side-navigation>
    </nav>
</template>

<script>
    import SideNavigation from '../components/SideNavigation.vue';

    export default {
        name: "Navbar",
        components: {
            SideNavigation
        },
        methods: {
            toggleSidebar() {
                let drawer = !this.$store.state.nav.drawer;
                this.$store.commit('nav/drawer', drawer);
            },

            onLogoutClick() {
                let router = this.$router;
                let store = this.$store;

                axios.post('/api/logout', store.state.user.auth)
                    .then(response => {
                        if (response.data.success) {
                            // pass empty object to action for clearing userinfo in localStorage and store
                            store.dispatch('user/updateUserInfo', {});
                            router.push({name: 'home',});
                        }
                    })
                    .catch(error => {
                    })

            }
        }
    }
</script>

<style scoped>

</style>
