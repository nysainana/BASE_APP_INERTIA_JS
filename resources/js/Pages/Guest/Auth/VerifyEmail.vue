<script setup>
import { computed } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    status: String,
});

const form = useForm({});

const submit = () => {
    form.post(route('verification.send'));
};

const verificationLinkSent = computed(() => props.status === 'verification-link-sent');
</script>

<template>
    <GuestLayout title="Email Verification" logout>

        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            Merci de vous être inscrit ! Avant de commencer, pourriez-vous vérifier votre adresse e-mail en cliquant sur le lien que nous venons de vous envoyer par e-mail ?
            Si vous n'avez pas reçu l'e-mail, nous serons ravis de vous en envoyer un autre.
            <span>{{ props.status }}</span>
        </div>

        <div class="mb-4 font-medium text-sm text-green-600" v-if="verificationLinkSent">
            Un nouveau lien de vérification a été envoyé à l'adresse e-mail que vous avez fournie lors de l'inscription.
        </div>

<!--        <template #extra>-->
<!--            <Link-->
<!--                :href="route('logout')"-->
<!--                method="post"-->
<!--                class="text-blue-500 hover:underline"-->
<!--            >-->
<!--                Deconnexion-->
<!--            </Link>-->
<!--        </template>-->

        <form >
            <a-flex justify="start" gap="small" class="mt-2 ms-1.5 flex items-center gap-5">
                <a-button @click="submit"
                          class="uppercase !py-4 w-full !bg-primary"
                          type="primary"
                          :loading="form.processing">
                    Renvoyer l'e-mail de vérification
                </a-button>
            </a-flex>
        </form>
    </GuestLayout>
</template>
