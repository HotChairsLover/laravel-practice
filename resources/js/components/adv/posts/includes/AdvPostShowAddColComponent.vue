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
                        <label for="title">Опубликовано</label>
                        <p class="form-control m-0">{{post.published_at}}</p>
                    </div>
                    <div class="form-group">
                        <label for="title">Изменено</label>
                        <p class="form-control m-0">{{post.updated_at}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<style scoped>

</style>
