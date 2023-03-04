<script setup>
import Guest from '@/Shared/Guest.vue';
import Button from '@/Shared/Forms/Button.vue';
import Link from '@/Shared/Forms/Link.vue';
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
  data: Array,
  errors: Object,
});

const form = useForm({});

const loadingState = ref(false);
const showSuccess = ref(false);

const submit = () => {
  loadingState.value = 'loading';
  showSuccess.value = false;

  form.post(props.data.url.store, {
    onSuccess: () => {
      showSuccess.value = true,
      loadingState.value = false
    },
    onError: () => loadingState.value = false,
  })
};
</script>

<template>
  <Guest>
    <img src="img/logo.svg" alt="logo" class="text-center mx-auto mb-4 block">

    <div class="mb-4 dark:text-gray-400 border-b border-gray-200 pb-4">
      Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you?
    </div>

    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
      If you didn't receive the email, we will gladly send you another.
    </div>

    <div v-if="showSuccess" class="mb-8 font-medium text-sm text-green-600 dark:text-green-400 border rounded-lg p-5 border-green-200 bg-emerald-50">
      A new verification link has been sent to the email address you provided during registration.
    </div>

    <div class="mt-4 sm:flex items-center sm:justify-between">
      <form @submit.prevent="submit()" class="mb-4 sm:mb-0">
        <Button primary :state="loadingState">Resend verification email</Button>
      </form>
    </div>
  </Guest>
</template>
