<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';
import FormItem from "@/Components/FormItem.vue";

const form = useForm({
    password: '',
});

const submit = () => {
    form.post(route('password.confirm'), {
        onFinish: () => form.reset(),
    });
};
</script>

<template>
    <GuestLayout title="Confirm Password" login singin>

        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            Ceci est une zone sécurisée de l'application. Veuillez confirmer votre mot de passe avant de continuer.
        </div>

        <div>
            <a-form layout="vertical" class="mt-7">
                <form-item has-feedback label="Mot de passe" :help="form.errors.password">
                    <a-input-password v-model:value="form.password" size="large"/>
                </form-item>

                <a-flex justify="start" gap="small" class="mt-2 ms-1.5 flex items-center gap-5">
                    <a-button @click="submit"
                              class="uppercase !py-4 w-full !bg-primary"
                              type="primary"
                              :loading="form.processing">
                        Confirmé
                    </a-button>
                </a-flex>
            </a-form>
        </div>
    </GuestLayout>
</template>
