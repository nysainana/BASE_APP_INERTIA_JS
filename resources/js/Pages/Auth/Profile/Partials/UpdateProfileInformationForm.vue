<script setup>
import FormItem from "@/Components/FormItem.vue";
import { useForm, usePage } from '@inertiajs/vue3';
import UploadProfilAvatar from "./UploadProfilAvatar.vue";

const user = usePage().props.auth.user;

const form = useForm({
    name: user.name,
    email: user.email,
    tel: user.tel,
    adresse: user.adresse,
});
</script>

<template>

    <a-card class="main-card">
        <div class="flex -mt-[90px] sm:-mt-[105px]">
            <upload-profil-avatar />
        </div>

        <div class="mt-7">
            <p class="text-gray-600">Mettez à jour les informations de profil de votre compte ainsi que votre adresse e-mail.</p>

            <a-form layout="vertical">

                <form-item has-feedback label="Nom" :help="form.errors.name">
                    <a-input v-model:value="form.name" size="large"/>
                </form-item>

                <form-item has-feedback label="Email" :help="form.errors.email">
                    <a-input v-model:value="form.email" size="large"/>
                </form-item>

                <form-item has-feedback label="Téléphone" :help="form.errors.tel">
                    <a-input v-model:value="form.tel" size="large"/>
                </form-item>

                <form-item has-feedback label="Adresse" :help="form.errors.adresse">
                    <a-input v-model:value="form.adresse" size="large"/>
                </form-item>

                <a-flex justify="start" gap="small" class="mt-2 ms-1.5">
                    <a-button @click="form.put(route('profile.update'))" class="uppercase" type="primary" :loading="form.processing">
                        Enrégistrer les modifications
                    </a-button>
                </a-flex>
            </a-form>
        </div>

    </a-card>
</template>
