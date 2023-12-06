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
                                    <th>Родитель</th>
                                </tr>
                                </thead>
                                <tbody v-for="category in categories.data">
                                    <tr>
                                        <td>{{category.id}}</td>
                                        <td>
                                            <router-link :to="{name: 'adv.posts.edit', params: {id: category.id} }">{{category.title}}</router-link>
                                        </td>
                                        <td>
                                            <template v-if="category.parent_category">
                                                {{category.parent_category.title}}
                                            </template>
                                        </td>
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
                                <li v-bind:class="[{disabled: !categories.first_page_url}]" class="page-item">
                                    <a class="page-link" href="#" @click="getCategories(categories.first_page_url)">First</a>
                                </li>
                                <li v-bind:class="[{disabled: !categories.prev_page_url}]" class="page-item">
                                    <a class="page-link" href="#" @click="getCategories(categories.prev_page_url)">Previous</a>
                                </li>
                                <li class="page-item disabled">
                                    <a class="page-link" href="#">{{ categories.current_page }} of {{ categories.last_page }}</a>
                                </li>
                                <li v-bind:class="[{disabled: !categories.next_page_url}]" class="page-item">
                                    <a class="page-link" href="#" @click="getCategories(categories.next_page_url)">Next</a>
                                </li>
                                <li v-bind:class="[{disabled: !categories.last_page_url}]" class="page-item">
                                    <a class="page-link" href="#" @click="getCategories(categories.last_page_url)">Last</a>
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
import useCategories from "@/composables/adv/posts/categories.js"
import {onMounted} from "vue"
const { categories, getCategories } = useCategories()
onMounted(() => getCategories())
</script>
