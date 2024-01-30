<script setup>

</script>
<script>
import {defineComponent} from "vue";

export default defineComponent({
    props: {
        post: {
            required: true
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
                        <label>Название</label>
                        <p class="form-control m-0">{{post.title}}</p>
                    </div>
                    <div class="form-group">
                        <label>Фото</label>
                        <p class="form-control m-0">
                            <img class="bd-placeholder-img card-img-top" width="100%" height="225"
                                 v-bind:src="post.image" alt="img" ></p>
                    </div>
                    <div class="form-group">
                        <label>Категория</label>
                        <p class="form-control m-0">{{post.category_title}}</p>
                    </div>
                    <div class="form-group">
                        <label>Автор</label>
                        <p class="form-control m-0">{{post.user_name}}</p>
                    </div>
                    <div class="form-group">
                        <label for="price">Цена</label>
                        <p class="form-control m-0">{{post.price}} ₽</p>
                    </div>
                    <div class="form-group">
                        <label for="price">Описание</label>
                        <p class="form-control m-0">{{post.description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<style scoped>

</style>
