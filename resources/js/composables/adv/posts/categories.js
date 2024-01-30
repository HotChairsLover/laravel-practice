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
        categories.value = response.data.data;
    }

    const destroyCategory = async (id) => {
        try {
            await axios.delete('/api/categories/' + id)
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
        categories: categories,
        errors,
        destroyCategory: destroyCategory,
        getCategories: getCategories,
    }
}
