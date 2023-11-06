<script setup>

</script>
<script>
import {defineComponent} from "vue";

export default defineComponent({
    props: {
        post: {
            required: true
        },
    },
    methods: {
        handleSubmit(e) {
            e.preventDefault()
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.patch('/api/posts/' + this.post.id, {
                    title: this.post.title,
                    description: this.post.description,
                    price: this.post.price,
                    is_published: this.post.is_published,
                    category_id: this.post.category_id
                })
                    .then(response => {
                        console.log(response)
                        if (response.status === 200) {
                            window.location.href = "/"
                        } else {
                            this.error = response.data.message
                        }
                    })
                    .catch(response => {
                        console.log(response)
                        console.log(response.response.data.message)
                        this.error = response.response.data.message
                    });
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
</template>

<style scoped>

</style>
