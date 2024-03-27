<template>
    <a-layout-sider
        id="side-bar"
        v-model:collapsed="collapsed"
        theme="light"
        :width="220"
        breakpoint="lg"
        :collapsed-width="0"
        :trigger="null"
        :zero-width-trigger-style="{display: 'none'}"
        class="p-2 !fixed h-full !overflow-y-auto !bg-transparent z-40 main-scrool"
    >
        <div class="bg-white h-full shadow-md shadow-gray-400 rounded-md p-1">
            <div class="flex items-center h-20">
                <img src="/logo.png" class="h-16" alt="logo"/>
                <span class="text-xl font-medium">Laravel</span>
            </div>

            <a-menu
                :selectedKeys="selectedKeys"
                class="!border-0 bg-transparent"
                theme="light"
                mode="inline">

                <a-menu-divider class="!mb-3"/>

                <a-menu-item key="dashboard">
                    <Link :href="route('dashboard')">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6a7.5 7.5 0 1 0 8 8h-8V6Z"/>
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 3H13v8h8v-.5A7.5 7.5 0 0 0 13.5 3Z"/>
                        </svg>
                        <span>Dashboard</span>
                    </Link>
                </a-menu-item>

            </a-menu>
        </div>
    </a-layout-sider>
</template>

<script setup>
import {Link} from '@inertiajs/vue3';
import {defineProps, ref, watch} from 'vue';

const collapsed = defineModel('collapsed')
const props = defineProps({
    selectedKeys: {
        type: Array,
        default: []
    }
})

</script>

<style>

#side-bar .ant-menu-item{
    @apply !px-3 mb-2 text-sm hover:bg-white hover:shadow motion-safe:hover:scale-[1.02] transition-all duration-300;
}

#side-bar .ant-menu-item a{
    @apply flex items-center rounded-md;
}

#side-bar .ant-menu-item-selected{
    @apply shadow-md hover:shadow-md scale-[1.02] motion-safe:text-white motion-safe:bg-primary transition-all duration-500 hover:bg-primary shadow-gray-300 hover:shadow-gray-300;
}

#side-bar .ant-menu-item svg{
    @apply w-5 h-5 me-3;
}

#side-bar::-webkit-scrollbar {
    width: 4px;
}

</style>
