<script setup>
import usePosts from "@/composables/adv/posts/posts.js"
import useCategories from "@/composables/adv/posts/categories.js";
import {onBeforeMount} from "vue"

const {post, getPost, router} = usePosts()
const {categories, getCategories} = useCategories()
const props = defineProps({
    id: {
        required: true,
        type: String
    }
})

async function job() {
    await getPost(props.id, window.Laravel.user)
    await getCategories()
    let author_id = await post._value.user_id;
    let user_id = window.Laravel.user.id;
    return author_id === user_id;

}

onBeforeMount(async () => {
    if (!await job()) {
        if(!window.Laravel.user.admin){
            router.push({name: 'adv.posts'})
        }
    }
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
    methods: {
        onErrorUpdate(errors) {
            this.error = errors
        }
    },
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
                <adv-post-edit-main-col-component :post="post"
                                                  :categories="categories"></adv-post-edit-main-col-component>
            </div>
            <div class="col-md-3">
                <adv-post-edit-add-col-component :post="post"
                                                 @updateParent="onErrorUpdate"></adv-post-edit-add-col-component>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
