<script setup>
import Guest from '@/Shared/Guest.vue';
import InputLabel from '@/Shared/Forms/InputLabel.vue';
import InputText from '@/Shared/Forms/InputText.vue';
import InputHelp from '@/Shared/Forms/InputHelp.vue';
import Button from '@/Shared/Forms/Button.vue';
import Link from '@/Shared/Forms/Link.vue';
import Error from '@/Shared/Forms/Error.vue';
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
  data: Array,
  errors: Object,
});

const form = useForm({
  email: 'admin@admin.com',
  password: 'admin123',
  password_confirmation: 'admin123',
});

const loadingState = ref(false);

const submit = () => {
  loadingState.value = 'loading';

  form.post(props.data.url.store, {
    preserveScroll: true,
    onSuccess: () => form.reset('password'),
    onError: () => loadingState.value = false,
  })
};
</script>

<template>
  <Guest>
    <img src="img/logo.svg" alt="logo" class="text-center mx-auto mb-4 block">

    <h2 class="font-bold text-center mb-2">Welcome to OfficeLife</h2>
    <h3 class="text-sm text-gray-700 mb-4 text-center">Create your account now for free.</h3>

    <form @submit.prevent="submit()">

      <!-- Email adddress -->
      <div class="mt-4">
        <InputLabel id="email" :required="true">Email</InputLabel>
        <InputText v-model="form.email" dusk="email-field" id="email" type="email" inputClass="block w-full" autocomplete="username" :required="true" />
        <InputHelp>We will send you a verification email, and won't spam you.</InputHelp>
        <Error v-if="errors.email">{{ errors.email }}</Error>
      </div>

      <!-- Password -->
      <div class="mt-4">
        <InputLabel id="password" :required="true">Password</InputLabel>
        <InputText v-model="form.password" dusk="password-field" id="password" type="password" inputClass="block w-full" autocomplete="new-password" :required="true" />
        <InputHelp>Minimum 6 characters, up to 60.</InputHelp>
        <Error v-if="errors.password">{{ errors.password }}</Error>
      </div>

      <!-- Confirm password -->
      <div class="mt-4">
        <InputLabel id="password_confirmation" :required="true">Confirm password</InputLabel>
        <InputText v-model="form.password_confirmation" dusk="password-confirmation-field" id="password_confirmation" type="password" inputClass="block w-full" autocomplete="new-password" :required="true" />
        <Error v-if="errors.password_confirmation">{{ errors.password_confirmation }}</Error>
      </div>

      <!-- actions -->
      <div class="flex items-center justify-between mt-4">
        <Link :href="props.data.url.login">Already have an account?</Link>

        <Button primary :state="loadingState" dusk="submit-button">Register</Button>
      </div>
    </form>
  </Guest>
</template>
