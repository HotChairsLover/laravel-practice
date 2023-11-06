import {ref} from 'vue'
import axios from "axios";
import {useRouter} from 'vue-router';

export default function useProfile() {
    const profile = ref([])
    const posts = ref([])
    const router = useRouter()
    const errors = ref('')

    const getProfile = async () => {
        let response = await axios.get('/api/profile')
        profile.value = response.data.data;
    }

    const getProfilePosts = async () => {
        let response = await axios.get('/api/profile/posts')
        console.log(response)
        posts.value = response.data;

    }


    return {
        profile: profile,
        posts: posts,
        errors,
        getProfile: getProfile,
        getProfilePosts: getProfilePosts
    }
}
