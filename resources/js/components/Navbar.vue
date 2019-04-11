<template>
    <nav>
        <v-toolbar flat app>

            <v-toolbar-side-icon @click="toggleSidebar" class="grey--text text--darken-2"></v-toolbar-side-icon>

            <v-toolbar-title class=" grey--text  text--darken-2">
                <span>i</span><span class="text-uppercase">Trainer</span>
            </v-toolbar-title>

            <v-spacer></v-spacer>

            <div v-if="!userInfo.isLoggedin">
                <v-btn class="grey--text text--darken-2" flat to="/login">Log In</v-btn>
                <v-btn class="grey--text text--darken-2" flat to="/registration">Sign Up</v-btn>
            </div>

            <v-toolbar-title v-if="userInfo.isLoggedin">
                <span class="grey--text text--darken-1 font-weight-lighter">{{userInfo.name || ''}}</span>
            </v-toolbar-title>

            <div v-if="userInfo.isLoggedin">
                <v-tooltip bottom>
                    <template v-slot:activator="{ on }">
                        <v-btn flat @click="onLogoutClick" v-on="on" class="grey--text text--darken-2">
                            <v-icon>exit_to_app</v-icon>
                        </v-btn>
                    </template>
                    <span>Log out</span>
                </v-tooltip>
            </div>


        </v-toolbar>

        <side-navigation></side-navigation>
    </nav>
</template>

<script>
    import SideNavigation from '../components/SideNavigation.vue';
    import {mapState} from 'vuex';

    export default {
        name: "Navbar",
        components: {
            SideNavigation
        },
        computed: {
            ...mapState({
                userInfo: storeState => storeState.user.auth,
                drawer: storeState => storeState.nav.drawer,
            }),
        },
        methods: {
            toggleSidebar() {
                this.$store.commit('nav/drawer', !this.drawer);
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
