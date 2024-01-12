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
                        <input name="name" id="name" type="text" class="form-control" minlength="2"
                               v-model="user.name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Почта</label>
                        <input name="email" id="email" type="text" class="form-control"
                               v-model="user.email" required>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<style scoped>

</style>
