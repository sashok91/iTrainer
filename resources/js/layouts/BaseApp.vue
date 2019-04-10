<template>
    <div class="base-app">
        <navbar></navbar>
        <v-content>
            <router-view/>
        </v-content>
    </div>
</template>

<script>
    import Navbar from '../components/Navbar.vue';

    export default {
        name: "BaseApp",
        components: {
            Navbar
        }
    }
</script>

<style scoped>

</style>