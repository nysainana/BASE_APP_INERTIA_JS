<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import GoogleLogo from '@/Components/Utils/GoogleLogo.vue';
import FacebookLogo from '@/Components/Utils/FacebookLogo.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import FormItem from "@/Components/FormItem.vue";

const form = useForm({
    name: '',
    email: '',
    adresse: '',
    tel: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout title="S'inscrire" login>

        <div>
            <h1 class="uppercase text-2xl font-bold">S'inscrire</h1>

            <p class="mt-4 text-red-500" v-if="$page.props.message">
                {{ $page.props.message }}
            </p>

            <a-form layout="vertical" class="mt-7">
                <form-item :rules="[{ required: true }]" has-feedback label="Nom" :help="form.errors.nom">
                    <a-input v-model:value="form.nom" size="large"/>
                </form-item>

                <form-item has-feedback label="Téléphone" :help="form.errors.tel">
                    <a-input v-model:value="form.tel" size="large"/>
                </form-item>

                <form-item has-feedback label="Adresse" :help="form.errors.adresse">
                    <a-input v-model:value="form.adresse" size="large"/>
                </form-item>

                <form-item :rules="[{ required: true }]" has-feedback label="E-mail" :help="form.errors.email">
                    <a-input v-model:value="form.email" size="large"/>
                </form-item>

                <form-item :rules="[{ required: true }]" has-feedback label="Mot de passe" :help="form.errors.password">
                    <a-input-password v-model:value="form.password" size="large"/>
                    <ul class="mt-3 ms-2 text-gray-600">
                        <li>- Le mot de passe doit comporter au moins 8 caractères.</li>
                    </ul>
                </form-item>

                <form-item :rules="[{ required: true }]" has-feedback label="Confirmer mot de passe" :help="form.errors.password_confirmation">
                    <a-input-password v-model:value="form.password_confirmation" size="large"/>
                </form-item>

                <a-flex justify="start" gap="small" class="mt-2 ms-1.5 flex items-center gap-5">
                    <a-button @click="submit"
                              class="uppercase !py-4 w-full !bg-primary"
                              type="primary"
                              :loading="form.processing">
                        S'inscrire
                    </a-button>
                </a-flex>
            </a-form>

        </div>
    </GuestLayout>
</template>
