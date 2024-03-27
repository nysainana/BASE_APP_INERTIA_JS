<template>
    <a-alert :type="type"
             class="main-card main-alert !border-l-4 border-[current-color]"
             :style="{borderColor: color}"
             show-icon>
        <template #icon>
            <font-awesome-icon v-if="type === 'warning'" class="!text-sm" icon="fa-solid fa-triangle-exclamation"/>
            <font-awesome-icon v-else-if="type === 'error'" class="!text-sm" icon="fa-solid fa-triangle-exclamation"/>
            <font-awesome-icon v-else-if="type === 'success'" class="!text-sm" icon="fa-solid fa-triangle-exclamation"/>
            <font-awesome-icon v-else-if="type === 'info'" class="!text-sm" icon="fa-solid fa-triangle-exclamation"/>
        </template>
        <template #message>
            <slot name="message">{{ message }}</slot>
        </template>
        <template #description>
            <slot name="description">{{ description }}</slot>
        </template>
    </a-alert>
</template>

<script setup>

import {computed, defineProps} from "vue";

const props = defineProps({
    type: {
        type: String,
        default: 'info'
    },
    message: String,
    description: String
})

const color = computed(() => {
    switch (props.type) {
        case 'error': return '#FF4D4F';
        case 'success': return '#52C41A';
        case 'warning': return '#FAAD14';
        default: return '#1677FF';
    }
})

</script>

<style>

.main-alert .ant-alert-message{
    @apply text-lg font-medium;
}

</style>
