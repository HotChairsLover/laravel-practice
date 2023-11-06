<script setup>
import useCategories from "@/composables/adv/posts/categories.js";
import usePosts from "@/composables/adv/posts/posts.js";
import {onMounted} from "vue"

const {categories, getCategories} = useCategories()
const {post, getPost} = usePosts()
onMounted(() => {
    getCategories()
})
</script>
<script>
import advPostCreateMainColComponent from "@/components/adv/posts/includes/AdvPostCreateMainColComponent.vue";
import advPostCreateAddColComponent from "@/components/adv/posts/includes/AdvPostCreateAddColComponent.vue";

export default {
    components: {
        advPostCreateAddColComponent,
        advPostCreateMainColComponent
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            return next('/');
        }
        next();
    },
    data() {
        return {
            error: null
        }
    },
}
</script>
<template>
    <br>
    <div class="alert alert-danger" role="alert" v-if="error !== null">
        {{ error }}
    </div>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <adv-post-create-main-col-component :post="post" :categories="categories"></adv-post-create-main-col-component>
            </div>
            <div class="col-md-3">
                <adv-post-create-add-col-component :post="post" ></adv-post-create-add-col-component>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
