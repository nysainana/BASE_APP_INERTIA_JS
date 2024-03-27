<template>
    <a-form-item id="form-item" class="first:mt-5" :help="help" :validate-status="help ? 'error' : ''">
        <div class="ml-0.5">
            <slot></slot>
        </div>
    </a-form-item>
</template>

<script setup>

import {defineProps} from "vue";

const props = defineProps({
    help: String
})

</script>

<style>

#form-item .ant-form-item-label{
    padding-bottom: 5px !important;
    @apply block font-medium text-sm text-gray-700;
}

#form-item .ant-input-number-in-form-item .ant-input-number-input{
    @apply focus:ring-0;
}

</style>
