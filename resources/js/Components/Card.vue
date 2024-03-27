<template>
    <div class="p-4 sm:p-8 bg-white sm:rounded shadow">

        <slot name="header">
            <h2 class="text-lg font-medium underline underline-offset-8 decoration-2 decoration-primary">{{ title }}</h2>
        </slot>

        <slot name="description">
            <p class="text-sm text-gray-600" :class="{'mt-4': !!title}">{{ description }}</p>
        </slot>

        <slot></slot>
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
