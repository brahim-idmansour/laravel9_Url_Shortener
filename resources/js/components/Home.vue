<template>
 <div class="row">
     <CreateLink />
     <linksList />
 </div>

</template>
<script setup>
import CreateLink from "@/components/CreateLink.vue";
import linksList from "@/components/linksList.vue";
import { provide } from "vue";

provide('user_id', props.user_id);

const props = defineProps({
    user_id: {
        type: Number,
        required: true,
    }
});

</script>
<style>


</style>