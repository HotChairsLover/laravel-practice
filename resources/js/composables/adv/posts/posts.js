import {ref} from 'vue'
import axios from "axios";
import {useRouter} from 'vue-router';

export default function usePosts() {
    const posts = ref([])
    const post = ref([])
    const errors = ref('')
    const router = useRouter()

    const getPosts = async (api_url) => {
        api_url = api_url || '/api/posts'
        let response = await axios.get(api_url)
        posts.value = response.data;
    }

    const getByCategory = async (category) => {
        let response = await axios.get('api/posts/search/' + category)
        posts.value = response.data;
    }

    const getBySearch = async (search) => {
        let origin = window.location.origin;
        search = search || ''
        let response = await axios.get(origin + '/api/posts/search?search=' + search)
        posts.value = response.data;
    }

    const getPost = async (id, user) => {
        try {
            let response = await axios.get('/api/posts/' + id)
            if(response.data.data.user_id === user.id)
            {
                post.value = response.data.data;
            }
            else if(user.admin)
            {
                post.value = response.data.data;
            }
        } catch (error) {
            throw 'Поста не существует'
        }

    }

    const getShow = async (id) => {
        try {
            let response = await axios.get('/api/posts/' + id)
            post.value = response.data.data;
        } catch (error) {
            throw 'Поста не существует'
        }

    }

    const storePost = async (data) => {
        const config = {
            headers: {
                'content-type': 'multipart/form-data'
            }
        }
        errors.value = ''
        try {
            await axios.post('/api/posts/', data, config)
                .then(response => {
                    errors.value = ''
                })
                .catch(response => {
                    errors.value = response.response.data.message
                })
        } catch (e) {
            return e
        }
    }

    const updatePost = async (id, data) => {
        const config = {
            headers: {
                'content-type': 'multipart/form-data'
            }
        }
        try {
            data['_method'] = 'PATCH';
            console.log(data);
            await axios.post('/api/posts/' + id, data, config)
                .then(response => {
                    errors.value = ''
                    console.log(response)
                })
                .catch(response => {
                    console.log(response)
                    errors.value = response.response.data.message
                })
        } catch (e) {
            return e
        }
    }

    const destroyPost = async (id) => {
        try {
            await axios.delete('/api/posts/' + id)
                .then(response => {
                    errors.value = ''
                })
                .catch(response => {
                    errors.value = response.response.data.message
                })
        } catch (e) {
            return e
        }
    }


    return {
        posts: posts,
        post: post,
        errors,
        router: router,
        getShow: getShow,
        getPosts: getPosts,
        getByCategory: getByCategory,
        getBySearch: getBySearch,
        getPost: getPost,
        storePost: storePost,
        updatePost: updatePost,
        destroyPost: destroyPost
    }
}
