<template>
    <div class="side-nav">
        <v-navigation-drawer v-model="drawer" app dark class="indigo">

            <v-list>

                <v-list-tile v-for="item in navList" :to="item.route" :key="item.text">
                    <v-list-tile-action>
                        <v-icon class="white--text">{{item.icon}}</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content class="white--text">
                        <v-list-tile-title>{{item.text}}</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>

            </v-list>

        </v-navigation-drawer>
    </div>
</template>

<script>
    import {mapState} from 'vuex';

    export default {
        name: "SideNavigation",
        computed: {
            ...mapState({
                userInfo: storeState => storeState.user.auth,
            }),
            drawer: {
                get() {
                    return this.$store.state.nav.drawer;
                },
                set(state) {
                    if (state !== this.$store.state.nav.drawer) {
                        this.$store.commit('nav/drawer', state);
                    }
                }
            },
            navList() {
                let res;

                if (this.userInfo.isLoggedin && this.userInfo.role === 'admin') {
                    res = this.$store.state.nav.adminNav;
                } else if (this.userInfo.isLoggedin) {
                    res = this.$store.state.nav.userNav;
                } else {
                    res = this.$store.state.nav.baseNav;
                }

                return res;
            }
        }
    }
</script>

<style scoped>

</style>