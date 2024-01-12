<script setup>

</script>
<script>
import {defineComponent} from "vue";
import useProfile from "@/composables/profile/profile.js";

const {errors, updateProfile} = useProfile()
export default defineComponent({
    props: {
        user: {
            required: true
        }
    },
    methods: {
        async handleSubmit(e) {
            e.preventDefault()
            await updateProfile(this.user)
            if (errors.value === '') {
                this.$router.push({name: 'profile.index'})
            }
            this.$emit('updateParent',
                {
                    errors: errors
                })
        },
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
                        ID: {{user.id}}
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
                        <p class="form-control m-0">{{user.created_at}}</p>
                    </div>
                    <div class="form-group">
                        <label for="title">Изменено</label>
                        <p class="form-control m-0">{{user.updated_at}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<style scoped>

</style>
