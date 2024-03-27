<template>
    <a-pagination
        id="pagination"
        hide-on-single-page
        responsive
        show-less-items
        :showSizeChanger="false">

        <template #itemRender="{ type, originalElement }">
            <a v-if="type === 'prev'">
                <font-awesome-icon :icon="['fas', 'angle-left']"/>
                <span class="ms-1">Précédent</span>
            </a>
            <a v-else-if="type === 'next'">
                <span class="me-1">Suivant</span>
                <font-awesome-icon :icon="['fas', 'angle-right']"/>
            </a>
            <component :is="originalElement" v-else></component>
        </template>
    </a-pagination>
</template>

<script>

</script>

<style>

#pagination,
#pagination * {
    font-family: inherit !important;
    /*@apply text-sm;*/
}

#pagination .ant-pagination-item,
#pagination .ant-pagination-jump-prev,
#pagination .ant-pagination-jump-next,
#pagination .ant-pagination-prev,
#pagination .ant-pagination-next {
    /*@apply pt-1.5;*/
}

#pagination .ant-pagination-item-active{
    @apply border-0 bg-secondary;
}

#pagination .ant-pagination-item-active a{
    @apply text-white;
}


</style>
