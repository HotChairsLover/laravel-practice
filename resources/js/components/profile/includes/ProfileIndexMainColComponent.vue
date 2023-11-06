<script setup>

</script>
<script>
import {defineComponent} from "vue";

export default defineComponent({
    props: {
        user: {
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
                        <label for="name">Имя</label>
                        <p class="form-control m-0">{{user.name}}</p>
                    </div>
                    <div class="form-group">
                        <label for="email">Почта</label>
                        <p class="form-control m-0">{{user.email}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<style scoped>

</style>
