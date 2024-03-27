<script setup>
import {Head} from '@inertiajs/vue3';
import GuestOption from './Partials/GuestOption.vue';

defineProps({
    title: {
        type: String,
        default: 'Laravel'
    },
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
    <Head :title="title"/>
    <div class="flex min-h-screen bg-white">

        <div class="bg-image-sider min-w-[500px] max-w-[500px] min-h-screen hidden xl:flex xl:flex-col p-7 text-white">
            <div>
                <img  src="/img/dna-gestcom-plat-man.png" alt="logo">
            </div>

            <div class="mt-auto text-2xl bottom-0">
                <p>Gerer facilement vos activités commerciales. Créer vos documents de vente en seulement quelque clic.</p>
            </div>
        </div>

        <div class="w-full flex flex-col min-h-screen px-10 py-5 container mx-auto">

            <div class="flex mb-10 md:mb-4 items-center">
                <img class="w-64 mx-auto md:ms-0 xl:hidden" src="/img/dna-gestcom-plat-man-noir.png" alt="logo">
                <div class="hidden md:ms-auto md:block">
                    <GuestOption :singin="singin" :login="login" :logout="logout" />
<!--                    <slot name="extra"></slot>-->
                </div>
            </div>

            <div class="w-full max-w-sm mx-auto my-auto py-5">
                <slot></slot>
            </div>

            <div class="flex mt-10 md:hidden">
                <div class="mx-auto">
                    <GuestOption :singin="singin" :login="login" :logout="logout" />
<!--                    <slot name="extra"></slot>-->
                </div>
            </div>

        </div>
        <!--        <slot/>-->
    </div>
</template>

<style>

</style>
