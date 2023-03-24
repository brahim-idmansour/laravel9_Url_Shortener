<template>
    <div class="col-md-7">
        <div class="card my-4">
            <div class="card-body">
                <div class="mb-2" v-if="data.error">
                    <ul 
                    v-for="(errorArray,index) in  data.error"
                    :key="index"
                    class="list-group">
                        <li
                            v-for="(error,index) in  errorArray"
                            :key="index"
                            class="listgroup-item bg-danger text-white mb-1 p-2 rounded">
                            {{ error }}
                        </li>
                    </ul>
                </div>
                <form @submit.prevent="storeUrl">
                    <div class="form-group mb-2">
                        <input v-model="data.url.data.full_url" type="text" class="form-control" placeholder="Full Url">
                    </div>
                    <div class="form-group mb-2">
                        <textarea v-model="data.url.data.url_desc" class="form-control" cols="30" rows="5" placeholder="Description"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">
                            Submit
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</template>
<script setup>
import { inject, reactive } from 'vue';

const user_id = inject('user_id');

const data = reactive({
    url: {
        data: {
            full_url: '',
            url_desc: '',

        }
    },
    error: null
});

const storeUrl = async () => {
    try {
        const response = await axios.post('/api/add/url', {
            full_url: data.url.data.full_url,
            url_desc: data.url.data.url_desc,
            user_id
        });
        data.url = {
            data: {
                full_url: '',
                url_desc: '',

            }
        };
        data.error = null;
    } catch (error) {
        data.error = error.response.data.errors;
    }
}

</script>
<style>


</style>


