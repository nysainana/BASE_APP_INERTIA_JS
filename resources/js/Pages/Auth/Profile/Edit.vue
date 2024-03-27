<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import SendVerificationMail from './Partials/SendVerificationMail.vue';
import Container from '@/Components/Container.vue';
import Alert from '@/Components/Alert.vue';

defineProps({
    mustVerifyEmail: Boolean,
    status: String,
});

</script>

<template>

    <AuthenticatedLayout title="Profile" :has-sider="$page.props.auth.configured">

        <container>
            <template #extraTop>
                <send-verification-mail v-if="mustVerifyEmail && $page.props.auth.user.email_verified_at === null" />
            </template>

            <template #extraBottom>
                <DeleteUserForm />
            </template>

            <alert class="mb-16" v-if="$page.props.message" v-bind="$page.props.message" />
            <UpdateProfileInformationForm />
            <UpdatePasswordForm />
        </container>
    </AuthenticatedLayout>
</template>
