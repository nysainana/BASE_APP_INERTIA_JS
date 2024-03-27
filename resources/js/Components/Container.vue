<template>
    <div class="flex flex-col md:flex-row gap-4 justify-center">
        <div class="w-full flex flex-col gap-4 max-w-3xl">
            <div class="flex flex-col gap-4 md:hidden">
                <slot name="extraTop"/>
            </div>
            <slot/>
            <div class="flex flex-col gap-4 md:hidden">
                <slot name="extraBottom"/>
            </div>
        </div>
        <div v-if="slots.extraTop || slots.extraBottom" class="min-w-[320px] md:max-w-[320px] hidden md:flex-col md:flex md:gap-4">
            <slot name="extraTop"/>
            <slot name="extraBottom"/>
        </div>
    </div>
</template>

<script setup>
import {useSlots} from 'vue'

const slots = useSlots()

</script>

<style scoped>

</style>
