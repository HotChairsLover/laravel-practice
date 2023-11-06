import { ref } from 'vue'
import axios from "axios";
import { useRouter } from 'vue-router';

export default function usePosts() {
    const posts = ref([])
    const post = ref([])
    const router = useRouter()
    const errors = ref('')

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
        let response = await axios.get('api/posts/search?search=' + search)
        posts.value = response.data;
    }

    const getPost = async (id) => {
        let response = await axios.get('/api/posts/' + id)
        post.value = response.data.data;
    }

    const storePost = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/posts/', data)
            await router.push({name: 'posts.index'})
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
    }

    const updatePost = async (id) => {
        errors.value = ''
        try {
            await axios.put('/api/posts/' + id, post.value)
            await router.push({name: 'posts.index'})
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
    }

    const destroyPost = async (id) => {
        await axios.delete('/api/posts/' + id)
    }


    return {
        posts: posts,
        post: post,
        errors,
        getPosts: getPosts,
        getByCategory: getByCategory,
        getBySearch: getBySearch,
        getPost: getPost,
        storePost: storePost,
        updatePost: updatePost,
        destroyPost: destroyPost
    }
}
