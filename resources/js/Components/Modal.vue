<template>
    <a-modal id="modal">
        <slot />
        <template #footer>
            <slot name="footer">
                <div class="bg-gray-100 ">
                    <a-button key="back" @click="handleCancel">Annuler</a-button>
                    <a-button key="submit" type="primary"  @click="handleOk">Submit</a-button>
                </div>
            </slot>
        </template>
    </a-modal>
</template>

<script setup>

</script>

<style scoped>

#modal {

}

</style>
