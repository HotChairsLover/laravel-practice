import { createRouter, createWebHistory } from "vue-router";

import AdvPostsIndexComponent from "@/components/adv/posts/AdvPostsIndexComponent.vue";
import AdvPostsShowComponent from "@/components/adv/posts/AdvPostsShowComponent.vue";
import Register from "@/components/auth/Register.vue";
import Login from "@/components/auth/Login.vue";
import AdvPostsEditComponent from "@/components/adv/posts/AdvPostsEditComponent.vue";
import AdvPostCreateComponent from "@/components/adv/posts/AdvPostCreateComponent.vue";
import ProfileIndexComponent from "@/components/profile/ProfileIndexComponent.vue";
import ProfilePostsComponent from "@/components/profile/ProfilePostsComponent.vue";

const routes = [
    {
        path: '/',
        name: 'home',
        component: AdvPostsIndexComponent
    },
    {
        path: '/login',
        name: 'login',
        component: Login
    },
    {
        path: '/register',
        name: 'register',
        component: Register
    },

    {
        path: '/posts',
        name: 'adv.posts',
        component: AdvPostsIndexComponent
    },
    {
        path: '/posts/:id',
        name: 'adv.posts.show',
        component: AdvPostsShowComponent,
        props: true,
    },
    {
        path: '/posts/create',
        name: 'adv.posts.create',
        component: AdvPostCreateComponent,
        props: true,
    },
    {
        path: '/posts/:id/edit',
        name: 'adv.posts.edit',
        component: AdvPostsEditComponent,
        props: true,
    },
    {
        path: '/profile',
        name: 'profile.index',
        component: ProfileIndexComponent
    },
    {
        path: '/profile/posts',
        name: 'profile.posts',
        component: ProfilePostsComponent
    }
]

export default createRouter({
    history: createWebHistory(),
    routes
})
