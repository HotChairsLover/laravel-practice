<script setup>
import useProfile from "@/composables/profile/profile.js";
import {onMounted} from "vue"
const { posts, getProfilePosts} = useProfile()
onMounted(getProfilePosts)
</script>

<template>
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
                <template v-for="post in posts.data">
                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                 xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                 preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c"></rect>
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                            </svg>
                            <div class="card-body">
                                <p class="card-text">{{post.category.title}}</p>
                                <p class="card-text">{{post.title}}</p>
                                <p class="card-text">{{post.price}} ₽</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">
                                            <router-link :to="{name: 'adv.posts.show', params: {id: post.id} }">View</router-link>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">
                                            <router-link :to="{name: 'adv.posts.edit', params: {id: post.id} }">Edit</router-link>
                                        </button>
                                    </div>
                                    <small class="text-body-secondary">{{post.published_at}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
            <br>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <ul class="pagination justify-content-center">
                                <li v-bind:class="[{disabled: !posts.first_page_url}]" class="page-item">
                                    <a class="page-link" href="#" @click="getPosts(posts.first_page_url)">First</a>
                                </li>
                                <li v-bind:class="[{disabled: !posts.prev_page_url}]" class="page-item">
                                    <a class="page-link" href="#" @click="getPosts(posts.prev_page_url)">Previous</a>
                                </li>
                                <li class="page-item disabled">
                                    <a class="page-link" href="#">{{ posts.current_page }} of {{ posts.last_page }}</a>
                                </li>
                                <li v-bind:class="[{disabled: !posts.next_page_url}]" class="page-item">
                                    <a class="page-link" href="#" @click="getPosts(posts.next_page_url)">Next</a>
                                </li>
                                <li v-bind:class="[{disabled: !posts.last_page_url}]" class="page-item">
                                    <a class="page-link" href="#" @click="getPosts(posts.last_page_url)">Last</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
