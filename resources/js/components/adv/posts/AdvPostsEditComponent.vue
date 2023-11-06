<script setup>
import usePosts from "@/composables/adv/posts/posts.js"
import useCategories from "@/composables/adv/posts/categories.js";
import {onMounted, onUnmounted} from "vue"

const {post, getPost} = usePosts()
const {categories, getCategories} = useCategories()
const props = defineProps({
    id: {
        required: true,
        type: String
    }
})
onMounted(() => {
    getPost(props.id)
    getCategories()
})
</script>
<script>
import advPostEditAddColComponent from "@/components/adv/posts/includes/AdvPostEditAddColComponent.vue";
import advPostEditMainColComponent from "@/components/adv/posts/includes/AdvPostEditMainColComponent.vue";

export default {
    components: {
        advPostEditAddColComponent,
        advPostEditMainColComponent
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
                <adv-post-edit-main-col-component :post="post" :categories="categories"></adv-post-edit-main-col-component>
            </div>
            <div class="col-md-3">
                <adv-post-edit-add-col-component :post="post" ></adv-post-edit-add-col-component>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
