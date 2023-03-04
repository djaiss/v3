<script setup>
import Guest from '@/Shared/Guest.vue';
import InputLabel from '@/Shared/Forms/InputLabel.vue';
import InputText from '@/Shared/Forms/InputText.vue';
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
});

const loadingState = ref(false);

const submit = () => {
  loadingState.value = 'loading';

  form.post(props.data.url.store, {
    onError: () => loadingState.value = false,
  })
};
</script>

<template>
  <Guest>
    <img src="img/logo.svg" alt="logo" class="text-center mx-auto mb-4 block">

    <h2 class="font-bold text-center mb-2">Welcome back to OfficeLife</h2>
    <p class="mb-4 text-center">
      <Link :href="props.data.url.register">Don't have an account?</Link>
    </p>

    <form @submit.prevent="submit()">
      <!-- Email adddress -->
      <div class="mt-4">
        <InputLabel id="email" :required="true">Email</InputLabel>
        <InputText v-model="form.email" dusk="email-field" id="email" type="email" inputClass="block w-full" autocomplete="username" :required="true" />
        <Error v-if="errors.email" class="mt-1">{{ errors.email }}</Error>
      </div>

      <!-- Password -->
      <div class="mt-4">
        <InputLabel id="password" :required="true">Password</InputLabel>
        <InputText v-model="form.password" dusk="password-field" id="password" type="password" inputClass="block w-full" autocomplete="new-password" :required="true" />
        <Error v-if="errors.password">{{ errors.password }}</Error>
      </div>

      <!-- Remember Me -->
      <div class="block mt-4">
        <label for="remember_me" class="inline-flex items-center">
          <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
          <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Remember me</span>
        </label>
      </div>

      <!-- actions -->
      <div class="flex items-center justify-between mt-4">
        <Link :href="props.data.url.login">Forgot your password?</Link>

        <Button primary :state="loadingState" dusk="login-button">Login</Button>
      </div>
    </form>
  </Guest>
</template>
