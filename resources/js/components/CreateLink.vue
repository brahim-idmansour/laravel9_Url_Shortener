<template>
    <div class="col-md-7">
        <div class="card my-4">
            <div class="card-body">
                <div class="mb-2">
                    Errors
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
import { reactive } from 'vue';

const data = reactive({
    url: {
        data: {
            full_url: '',
            url_desc: '',

        }
    }
});

const storeUrl = async () => {
    try {
        const response = await axios.post('/api/add/url', {
            full_url: data.url.data.full_url,
            url_desc: data.url.data.url_desc,
            user_id: 1
        });
        console.log(response.data);
    } catch (error) {
        console.log(error);
    }
}

</script>
<style>


</style>


