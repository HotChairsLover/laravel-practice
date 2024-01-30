<script setup>

</script>
<script>
import {defineComponent} from "vue";

export default
defineComponent({
    props: {
        post: {
            required: true
        },
        categories: {
            required: true
        }
    },
    methods: {
        changeImage(e){
            this.post.image = e.target.files[0];
        }
    }
})

</script>
<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Заголовок</label>
                        <input name="title"
                               id="title"
                               type="text"
                               class="form-control"
                               minlength="3"
                               v-model="post.title"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="description">Описание</label>
                        <textarea name="description"
                                  id="description"
                                  class="form-control"
                                  v-model="post.description"
                                  rows="20">

                    </textarea>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Категория</label>

                        <select name="category_id"
                                id="category_id"
                                class="form-control"
                                v-model="post.category_id"
                                required>
                            <option v-for="category in categories" v-bind:value="category.id">
                                {{category.title}}
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Цена</label>
                        <input name="price"
                               id="price"
                               class="form-control"
                               v-model="post.price">
                    </div>
                    <div class="form-group">
                        <label for="image">Фото</label>
                        <input name="image"
                               id="image"
                               class="form-control"
                               type="file"
                               accept="image/png,jpeg,jpg"
                               v-on:change="changeImage">
                    </div>
                    <div class="form-check">
                        <input name="is_published"
                               id="is_published"
                               type="checkbox"
                               class="form-check-input"
                               v-model="post.is_published">
                        <label class="form-check-label" for="is_published">Опубликовано</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<style scoped>

</style>
