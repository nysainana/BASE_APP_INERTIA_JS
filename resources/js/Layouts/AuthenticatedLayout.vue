<script setup>
import {defineProps, ref} from 'vue';
import {Head, Link} from '@inertiajs/vue3';
import SideBar from './Partials/SideBar.vue';
import MainAvatar from './Partials/MainAvatar.vue'

const affixed = ref(false)
const siderCollapsed = ref(false)
const props = defineProps({
    title: String,
    fullContent: {
        default: false
    },
    selectedMenu: {
        type: String,
        default: 'dashboard'
    },
    hasSider: {
        type: Boolean,
        default: true
    },
    backTo: String
})

</script>

<template>
    <Head :title="title"/>

    <!--    <div @click="siderCollapsed=true" v-if="!siderCollapsed" class="w-screen h-screen fixed bg-black/30 z-30 sm:hidden"></div>-->


    <a-layout id="content" :has-sider="hasSider" class="min-h-screen bg-dots-darker bg-gray-100 bg-fixed">

        <side-bar v-if="hasSider" v-model:collapsed="siderCollapsed" :selected-keys="[selectedMenu]"/>

        <a-layout-content class="flex p-4" :class="{'lg:ml-[220px]': hasSider && !siderCollapsed}">
            <div class="mx-auto w-full max-w-screen-xl pt-0 pb-6 sm:pt-6">
                <a-affix :offset-top="7" @change="affixed = $event">
                    <div class="flex gap-2 items-center sm:px-5" :class="{'affixed': affixed}">
                        <div v-if="hasSider">
                            <Link type="button"
                                  :href="backTo"
                                  v-if="backTo"
                                  class="inline-flex items-center text-xl p-1 text-sm text-gray-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-200">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
                                </svg>
                            </Link>
                            <button type="button"
                                    @click="siderCollapsed = !siderCollapsed"
                                    v-else
                                    class="inline-flex items-center text-xl p-1 text-sm text-gray-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-200">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                          d="M5 7h14M5 12h14M5 17h10"/>
                                </svg>
                            </button>
                        </div>
                        <h1 class="text-xl font-semibold">{{ title }}</h1>

                        <div class="flex gap-3 text-gray-500 ms-auto items-center pe-1">
                            <button type="button"
                                    class="inline-flex items-center p-2 text-sm rounded-lg focus:outline-none focus:ring focus:ring-gray-200">
                                <font-awesome-icon icon="fa-solid fa-bell"/>
                            </button>
                            <main-avatar/>
                        </div>
                    </div>
                </a-affix>

                <div class="pt-28 pb-5 sm:px-5">
                    <slot></slot>
                </div>

            </div>
        </a-layout-content>

    </a-layout>

</template>

<style scoped>

    .affixed{
        @apply motion-safe:bg-white motion-safe:shadow-md motion-safe:p-3 motion-safe:rounded-md transition-all duration-300;
    }

</style>
