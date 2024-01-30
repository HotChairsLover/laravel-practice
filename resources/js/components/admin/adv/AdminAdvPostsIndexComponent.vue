<template>
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Категория</th>
                                    <th>Заголовок</th>
                                    <th>Дата публикации</th>
                                </tr>
                                </thead>
                                <tbody v-for="post in posts.data">
                                    <tr>
                                        <td>{{post.id}}</td>
                                        <td>{{post.category.title}}</td>
                                        <td>
                                            <router-link :to="{name: 'adv.posts.edit', params: {id: post.id} }">{{post.title}}</router-link>
                                        </td>
                                        <td>{{post.published_at}}</td>
                                    </tr>
                                </tbody>
                                <tfoot></tfoot>
                            </table>
                        </div>
                    </div>
                </div>
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
<script setup>
import usePosts from "@/composables/adv/posts/posts.js"
import {onMounted} from "vue"
const { posts, getPosts, getByCategory, getBySearch } = usePosts()
let queryString = window.location.search;
let urlParams = new URLSearchParams(queryString);
let param = urlParams.get('search');
onMounted(() => getBySearch(param))
</script>
