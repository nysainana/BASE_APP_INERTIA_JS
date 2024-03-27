<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import FormItem from "@/Components/FormItem.vue";

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <GuestLayout title="Mot de passe oblier" login singin>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ status }}
        </div>

        <div>
<!--            <h1 class="uppercase text-2xl font-bold">Mot de passe oublier</h1>-->

            <div class="mb-4 text-sm text-gray-600 mt-2">
                Mot de passe oublié ? Aucun problème. Il vous suffit de nous communiquer votre
                adresse e-mail et nous vous enverrons un lien de réinitialisation de mot de passe
                par e-mail, qui vous permettra d'en choisir un nouveau.
            </div>

            <a-form layout="vertical" class="mt-7">
                <form-item has-feedback label="Votre adresse e-mail" :help="form.errors.email">
                    <a-input v-model:value="form.email" size="large"/>
                </form-item>

                <a-flex justify="start" gap="small" class="mt-2 ms-1.5 flex items-center gap-5">
                    <a-button @click="submit"
                              class="uppercase !py-4 w-full !bg-primary"
                              type="primary"
                              :loading="form.processing">
                        Envoyer le lien de réinitialisation
                    </a-button>
                </a-flex>

            </a-form>
        </div>
    </GuestLayout>
</template>
