<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';
import FormItem from "@/Components/FormItem.vue";

const props = defineProps({
    email: String,
    token: String,
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('password.store'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout title="Reset Password" login singin>

        <div>
            <a-form layout="vertical" class="mt-7">
                <form-item has-feedback label="E-mail" :help="form.errors.email">
                    <a-input v-model:value="form.email" size="large"/>
                </form-item>

                <form-item has-feedback label="Mot de passe" :help="form.errors.password">
                    <a-input-password v-model:value="form.password" size="large"/>
                </form-item>

                <form-item has-feedback label="Confirmer mot de passe" :help="form.errors.password_confirmation">
                    <a-input-password v-model:value="form.password_confirmation" size="large"/>
                </form-item>

                <a-flex justify="start" gap="small" class="mt-2 ms-1.5 flex items-center gap-5">
                    <a-button @click="submit"
                              class="uppercase !py-4 w-full !bg-primary"
                              type="primary"
                              :loading="form.processing">
                        Reset Password
                    </a-button>
                </a-flex>
            </a-form>
        </div>

    </GuestLayout>
</template>
