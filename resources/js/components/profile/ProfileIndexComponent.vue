<script setup>
import useProfile from "@/composables/profile/profile.js";
import { onMounted } from "vue"
import { useMeta } from 'vue-meta'
useMeta({title: 'Профиль', description: 'Страница профиля на сайте объявлений'})
const { profile, getProfile } = useProfile()
onMounted(() => getProfile())
</script>
<script>
import ProfileIndexMainColComponent from "@/components/profile/includes/ProfileIndexMainColComponent.vue";
import ProfileIndexAddColComponent from "@/components/profile/includes/ProfileIndexAddColComponent.vue";

export default {
    components: {
        ProfileIndexMainColComponent,
        ProfileIndexAddColComponent
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            return next('/');
        }
        next();
    },

}
</script>

<template>
    <br>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <profile-index-main-col-component :user = profile></profile-index-main-col-component>
            </div>
            <div class="col-md-3">
                <profile-index-add-col-component :user = profile></profile-index-add-col-component>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
