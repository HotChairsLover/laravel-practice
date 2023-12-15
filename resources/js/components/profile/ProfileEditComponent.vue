<script setup>
import useProfile from "@/composables/profile/profile.js";
import { onMounted } from "vue"
const { profile, getProfile } = useProfile()
onMounted(() => getProfile())
</script>
<script>
import ProfileEditMainColComponent from "@/components/profile/includes/ProfileEditMainColComponent.vue";
import ProfileEditAddColComponent from "@/components/profile/includes/ProfileEditAddColComponent.vue";

export default {
    components: {
        ProfileEditMainColComponent,
        ProfileEditAddColComponent
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
                <profile-edit-main-col-component :user = profile></profile-edit-main-col-component>
            </div>
            <div class="col-md-3">
                <profile-edit-add-col-component :user = profile></profile-edit-add-col-component>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
