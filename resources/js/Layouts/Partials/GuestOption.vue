<script setup>
import {defineProps} from 'vue';
import {router} from '@inertiajs/vue3';

const props = defineProps({
    singin: {
        type: Boolean,
        default: false
    },
    login: {
        type: Boolean,
        default: false
    },
    logout: {
        type: Boolean,
        default: false
    }
})

</script>

<template>
    <div class="flex gap-2">
        <a-button
            v-if="singin"
            @click="router.get(route('register'))"
            class="!px-7 shadow-none rounded-full hover:!border-primary hover:!text-primary">
            S'inscrire
        </a-button>
        <a-button
            v-if="login"
            @click="router.get(route('login'))"
            type="primary"
            class="!px-7 shadow-none rounded-full !bg-primary">
            Se connecter
        </a-button>
        <a-button
            v-if="logout"
            @click="router.post(route('logout'))"
            type="primary"
            class="!px-7 shadow-none rounded-full !bg-primary">
            Déconnexion
        </a-button>
    </div>
</template>

<style scoped>

</style>
