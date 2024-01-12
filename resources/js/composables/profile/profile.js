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

    const updateProfile = async (data) => {
        try {
            await axios.patch('/api/profile/', data)
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
        profile: profile,
        posts: posts,
        errors,
        getProfile: getProfile,
        getProfilePosts: getProfilePosts,
        updateProfile: updateProfile
    }
}
