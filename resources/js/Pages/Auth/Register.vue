<script setup>
import Guest from '@/Shared/Guest.vue';
import InputLabel from '@/Shared/Forms/InputLabel.vue';
import InputText from '@/Shared/Forms/InputText.vue';
import InputHelp from '@/Shared/Forms/InputHelp.vue';
import Button from '@/Shared/Forms/Button.vue';
import Link from '@/Shared/Forms/Link.vue';
import { reactive, ref } from 'vue';
import { router } from '@inertiajs/vue3';

const form = reactive({
  email: 'admin@admin.com',
  password: 'admin123',
  password_confirmation: 'admin123',
});

const loadingState = ref(false);

const submit = () => {
  loadingState.value = 'loading';
};
</script>

<template>
  <Guest>
    <img src="img/logo.svg" alt="logo" class="text-center mx-auto mb-4 block">

    <h2 class="font-bold text-center mb-2">Welcome to OfficeLife</h2>
    <h3 class="text-sm text-gray-700 mb-4 text-center">Create your account now for free.</h3>

    <form @submit.prevent="submit()">
      <!-- Email Address -->
      <div class="mt-4">
        <InputLabel id="email" :required="true">Email</InputLabel>
        <InputText v-model="form.email" dusk="email-field" id="email" type="email" inputClass="block w-full" autocomplete="username" :required="true" />
        <InputHelp>We will send you a verification email, and won't spam you.</InputHelp>
        <x-input-error class="mt-2" />
      </div>

      <!-- Password -->
      <div class="mt-4">
        <InputLabel id="password" :required="true">Password</InputLabel>
        <InputText v-model="form.password" dusk="password-field" id="password" type="password" inputClass="block w-full" autocomplete="new-password" :required="true" />
        <InputHelp>Minimum 6 characters, up to 60.</InputHelp>
      </div>

      <!-- Confirm Password -->
      <div class="mt-4">
        <InputLabel id="password_confirmation" :required="true">Confirm password</InputLabel>
        <InputText v-model="form.password_confirmation" dusk="password-confirmation-field" id="password_confirmation" type="password" inputClass="block w-full" autocomplete="new-password" :required="true" />
        <x-input-error class="mt-2" />
      </div>

      <div class="flex items-center justify-between mt-4">
        <Link href="/login">Already have an account?</Link>

        <Button primary :state="loadingState" dusk="submit-button">Register</Button>
      </div>
    </form>
  </Guest>
</template>
