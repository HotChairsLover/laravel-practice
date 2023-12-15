<script setup>
import usePosts from "@/composables/adv/posts/posts.js"
import { onMounted } from "vue"
import router from "@/router/index.js";
const { post, getPost } = usePosts()
const props = defineProps({
    id: {
        required: true,
        type: String
    }
})
onMounted(async () => {
    try {
        await getPost(props.id)
    }
    catch (error){
        router.push({path: '/'})
    }
})
</script>
<script>
import advPostShowMainColComponent from "@/components/adv/posts/includes/AdvPostShowMainColComponent.vue";
import advPostShowAddColComponent from "@/components/adv/posts/includes/AdvPostShowAddColComponent.vue";
export default {
    components: {
        advPostShowMainColComponent,
        advPostShowAddColComponent
    },
}
</script>
<template>
    <br>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <adv-post-show-main-col-component :post="post"></adv-post-show-main-col-component>
            </div>
            <div class="col-md-3">
                <adv-post-show-add-col-component :post="post"></adv-post-show-add-col-component>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
