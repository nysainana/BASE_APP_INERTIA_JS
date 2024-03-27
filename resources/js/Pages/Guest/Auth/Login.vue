<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import FormItem from "@/Components/FormItem.vue";
import GoogleLogo from "@/Components/Utils/GoogleLogo.vue";
import FacebookLogo from '@/Components/Utils/FacebookLogo.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout title="Se connecter">

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <div>
            <h1 class="uppercase text-2xl font-bold">Se connecter</h1>

            <p class="mt-4 text-red-500" v-if="$page.props.message">
                {{ $page.props.message }}
            </p>

            <a-form layout="vertical" class="mt-7" @submit.prevent="submit">
                <form-item has-feedback label="Votre e-mail" :help="form.errors.email">
                    <a-input class="py-3 px-4" v-model:value="form.email" size="large"/>
                </form-item>

                <form-item has-feedback label="Mot de passe" :help="form.errors.password">
                    <a-input-password class="py-3 px-4" v-model:value="form.password" size="large"/>
                </form-item>

                <form-item>
                    <div class="flex">
                        <a-checkbox v-model:checked="form.remember">Se souvenir de moi</a-checkbox>
                        <div class="ms-auto">
                            <Link
                                v-if="canResetPassword"
                                :href="route('password.request')"
                                class="text-sm text-blue-500 hover:underline"
                            >
                                Mot de passe oublier?
                            </Link>
                        </div>
                    </div>
                </form-item>

                <a-flex justify="start" gap="small" class="mt-2 ms-1.5 flex flex-col items-center gap-5">
                    <a-button html-type="submit"
                              class="uppercase !py-4 w-full !bg-primary"
                              type="primary"
                              :loading="form.processing">
                        Connexion
                    </a-button>
                </a-flex>
            </a-form>

        </div>
    </GuestLayout>
</template>
