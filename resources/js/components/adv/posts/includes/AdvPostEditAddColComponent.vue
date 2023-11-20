<script>
import {defineComponent} from "vue";
import usePosts from "@/composables/adv/posts/posts.js"

const {errors, destroyPost, updatePost} = usePosts()
export default defineComponent({

    props: {
        post: {
            required: true
        },
    },
    methods: {
        async handleSubmit(e) {
            e.preventDefault()
            await updatePost(this.post.id, this.post)
            if (errors.value === '') {
                this.$router.push({name: 'adv.posts'})
            }
            this.$emit('updateParent',
                {
                    errors: errors
                })
        },
        async handleDelete(e) {
            e.preventDefault()
            await destroyPost(this.post.id)
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
    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <ul class="list-unstyled">
                        ID: {{ post.id }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Создано</label>
                        <input type="text" v-model="post.created_at" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="title">Изменено</label>
                        <input type="text" v-model="post.updated_at" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="title">Опубликовано</label>
                        <input type="text" v-model="post.published_at" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="title">Удалено</label>
                        <input type="text" v-model="post.deleted_at" class="form-control" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary" @click="handleDelete">Удалить</button>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
