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
                axios.post('/api/posts/', {
                    title: this.post.title,
                    description: this.post.description,
                    price: this.post.price,
                    is_published: this.post.is_published,
                    category_id: this.post.category_id
                })
                    .then(response => {
                        console.log(response)
                        if (response.status === 201) {
                            window.location.href = "/"
                        } else {
                            this.$emit('updateParent',
                            {
                                errors: response.data.message
                            })
                        }
                    })
                    .catch(response => {
                        this.$emit('updateParent',
                            {
                                errors: response.response.data.message
                            })
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
</template>

<style scoped>

</style>
