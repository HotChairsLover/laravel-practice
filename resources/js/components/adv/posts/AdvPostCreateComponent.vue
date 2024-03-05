<script setup>
import useCategories from "@/composables/adv/posts/categories.js";
import usePosts from "@/composables/adv/posts/posts.js";
import {onMounted} from "vue"
import { useMeta } from 'vue-meta'
useMeta({title: 'Создать объявление', description: 'Страница создания объявления'})
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
    methods: {
        onErrorUpdate(errors){
            this.error = errors
        }
    }
}
</script>
<template>
    <br>
    <div class="container">
        <div class="justify-content-center">
            <div class="alert alert-danger" role="alert" v-if="error !== null">
                {{ error.errors }}
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <adv-post-create-main-col-component :post="post" :categories="categories"></adv-post-create-main-col-component>
            </div>
            <div class="col-md-3">
                <adv-post-create-add-col-component :post="post" @updateParent = "onErrorUpdate"></adv-post-create-add-col-component>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
