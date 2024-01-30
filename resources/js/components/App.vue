<script setup>

</script>
<script>
export default {
    name: "App",
    data() {
        return {
            isLoggedIn: false,
            user: null
        }
    },
    created() {
        if (window.Laravel.isLoggedin) {
            this.isLoggedIn = true
            this.user = window.Laravel.user
        }
    },
    methods: {
        logout(e) {
            e.preventDefault()
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('/api/logout')
                    .then(response => {
                        if (response.status === 204) {
                            window.location.href = "/"
                        } else {
                            console.log(response)
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
        }
    },
}
</script>
<template>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">
                Advertisements
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <router-link :to="{name: 'adv.posts'}" class="nav-link">Advertisements</router-link>
                    </li>
                    <li class="nav-item" v-if="isLoggedIn">
                        <router-link :to="{name: 'adv.posts.create'}" class="nav-link">Create advertisement</router-link>
                    </li>
                    <li class="nav-item" v-if="isLoggedIn && user.admin">
                        <router-link :to="{name: 'admin.adv.posts'}" class="nav-link">Admin posts</router-link>
                    </li>
                    <li class="nav-item" v-if="isLoggedIn && user.admin">
                        <router-link :to="{name: 'admin.adv.categories'}" class="nav-link">Admin categories</router-link>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <form role="search" method="GET" action="/">
                            <input class="form-control" type="search" name="search" placeholder="Search" aria-label="Search">
                        </form>
                    </li>
                    <!-- Authentication Links -->
                    <li class="nav-item" v-if="isLoggedIn === false">
                        <router-link class="nav-link" to="/login">Login</router-link>
                    </li>
                    <li class="nav-item" v-if="isLoggedIn === false">
                        <router-link class="nav-link" to="/register">Register</router-link>
                    </li>
                    <li class="nav-item dropdown" v-else>
                        <router-link  id="navbarDropdown" class="nav-link dropdown-toggle" to="#" role="button"
                                      data-bs-toggle="dropdown" aria-haspopup="true"
                                      aria-expanded="false">{{user.name}}</router-link>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <router-link class="dropdown-item" :to="{name: 'profile.index'}">Profile</router-link>
                            <router-link class="dropdown-item" :to="{name: 'profile.posts'}">User Posts</router-link>
                            <a class="dropdown-item" style="cursor: pointer;" @click="logout">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <router-view></router-view>
</template>

<style scoped>

</style>
