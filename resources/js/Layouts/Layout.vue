<template>
    <a-config-provider :theme="AntdvTheme">
        <div class="text-gray-800">
            <slot></slot>
        </div>
    </a-config-provider>
</template>

<script setup>
import AntdvTheme from "../Theme/antdv-theme"

</script>
