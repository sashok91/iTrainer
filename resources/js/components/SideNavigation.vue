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
        data() {
            return {
                userInfo: {
                    isLogin: true,
                    user_role: 'admin'
                },
            }
        },
        computed: {
            ...mapState({
                baseNav: storeState => storeState.nav.baseNav,
                userNav: storeState => storeState.nav.userNav,
                adminNav: storeState => storeState.nav.adminNav,

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
                let res = this.baseNav;

                if (this.userInfo.isLogin && this.userInfo.user_role === 'admin') {
                    res = this.adminNav;
                } else if (this.userInfo.isLogin) {
                    res = this.userNav;
                }

                return res;
            }
        }
    }
</script>

<style scoped>

</style>