<template>
    <div class="flex flex-col border-b py-3 last:border-b-0">
        <p class="font-semibold">{{ title }}</p>
        <p class="text-gray-600">
            <span v-if="description">{{ description }}</span>
            <span class="text-gray-300 text-justify" v-else>Aucune information</span>
        </p>
    </div>
</template>

<script setup>

import {defineProps} from "vue";

const props = defineProps({
    title: String,
    description: String
})

</script>

<style scoped>

</style>
