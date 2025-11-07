<script setup>
import {ref} from "vue";
import { useDebounceFn } from "@vueuse/core"

const prop = defineProps({
    results: {
        type: String,
        required: true
    },
})
const searchQuery = ref('');
const results = ref(JSON.parse(prop.results))

const search = () => {
    // Couple ways to handle this.
    // The dataset is very small so we can filter on the client side.
    // For larger datasets, we would want to make an API call to the server to fetch results.
    // For the larger datasets we would pass the query to the searchForPets() service function.

    // For the purpose of this developer test I've opted for client side for the reasons above.
    results.value = JSON.parse(prop.results).filter(item =>
        item.name.toLowerCase().includes(searchQuery.value.toLowerCase())
    );

};

const onInput = useDebounceFn(() => {
    search();
}, 500)

</script>

<template>
    <h3 class="typewriter mb-4">
        <span id="typewriterText">What pet are you looking for?</span>
    </h3>

    <form v-on:submit.prevent="search" class="d-flex justify-content-center w-100" style="max-width: 800px;">
        <div class="position-relative w-100">
            <input id="searchInput" v-model="searchQuery" @input="onInput" class="form-control me-2 rounded-5 form-control-lg" type="search" placeholder="Search" aria-label="Search">
            <i class="ph ph-magnifying-glass position-absolute searchInput-icon"></i>
        </div>
    </form>
    <div class="mt-4">
        <p v-for="item in results">
            <a :href="item.path">{{ item.name }}</a>
        </p>
    </div>
</template>

<style>
</style>belg
