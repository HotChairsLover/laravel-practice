import {ref} from 'vue'
import axios from "axios";
import {useRouter} from 'vue-router';

export default function useCategories() {
    const categories = ref([])
    const router = useRouter()
    const errors = ref('')

    const getCategories = async (api_url) => {
        api_url = api_url || '/api/categories';
        let origin = window.location.origin;
        let response = await axios.get(origin + api_url)
        categories.value = response.data;
    }


    return {
        categories: categories,
        errors,
        getCategories: getCategories,
    }
}
