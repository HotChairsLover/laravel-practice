import {ref} from 'vue'
import axios from "axios";
import {useRouter} from 'vue-router';

export default function useCategories() {
    const categories = ref([])
    const router = useRouter()
    const errors = ref('')

    const getCategories = async () => {
        let response = await axios.get('/api/categories')
        categories.value = response.data.data;
    }


    return {
        categories: categories,
        errors,
        getCategories: getCategories,
    }
}
