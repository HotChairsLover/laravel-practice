<script setup>

</script>
<script>
import {defineComponent} from "vue";
import usePosts from "@/composables/adv/posts/posts.js"

const {errors, storePost} = usePosts()
export default defineComponent({
    props: {
        post: {
            required: true
        },
    },
    methods: {
        async handleSubmit(e) {
            e.preventDefault()
            let post_data = {
                title: this.post.title,
                description: this.post.description,
                price: this.post.price,
                is_published: this.post.is_published,
                category_id: this.post.category_id
            }
            await storePost(post_data)
            if (errors.value === '') {
                this.$router.push({name: 'adv.posts'})
            }
            this.$emit('updateParent',
                {
                    errors: errors
                })
        }
    },
})
</script>
<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary" @click="handleSubmit">Сохранить</button>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
