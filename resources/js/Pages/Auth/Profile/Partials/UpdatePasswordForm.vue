<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import FormItem from "@/Components/FormItem.vue";

const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const form = useForm({
    current_password: '',
    password: '',
    password_confirmation: '',
});

const updatePassword = () => {
    form.put(route('password.update'), {
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.password) {
                form.reset('password', 'password_confirmation');
                passwordInput.value.focus();
            }
            if (form.errors.current_password) {
                form.reset('current_password');
                currentPasswordInput.value.focus();
            }
        },
    });
};
</script>

<template>

    <a-card class="main-card" title="Modification du mot de passe">

        <a-card-meta description="Changez votre mot de passe." />

        <div class="mt-7">
            <a-form layout="vertical">
                <form-item has-feedback label="Mot de passe actuel" :help="form.errors.current_password">
                    <a-input-password v-model:value="form.current_password" size="large"/>
                </form-item>

                <form-item has-feedback label="Nouvelle mot de passe" :help="form.errors.password">
                    <a-input-password v-model:value="form.password" size="large"/>
                    <ul class="mt-3 ms-2 text-gray-600">
                        <li>- Le mot de passe doit comporter au moins 8 caractères.</li>
                    </ul>
                </form-item>

                <form-item has-feedback label="Confirmez votre nouvelle mot de passe" :help="form.errors.password_confirmation">
                    <a-input-password v-model:value="form.password_confirmation" size="large"/>
                </form-item>

                <a-flex justify="start" gap="small" class="mt-2 ms-1.5">
                    <a-button @click="updatePassword" class="uppercase" type="primary" :loading="form.processing">
                        Enrégistrer
                    </a-button>
                </a-flex>
            </a-form>
        </div>
    </a-card>

</template>
