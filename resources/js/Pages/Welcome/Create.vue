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
  name: '',
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
    <h2 class="font-bold text-center mb-2 text-gray-600 dark:text-gray-400">Let's setup your company's account</h2>
    <p class="text-center mb-6 text-gray-600">It will host all your company's data.</p>

    <form @submit.prevent="submit()">
      <div class="mt-4">
        <InputLabel id="name" :required="true">Name of the company</InputLabel>
        <InputText v-model="form.name" dusk="company-name-field" id="name" type="text" inputClass="block w-full" :autofocus="true" :required="true" />
        <Error v-if="errors.name" class="mt-1">{{ errors.name }}</Error>
      </div>

      <!-- actions -->
      <div class="flex items-center justify-between mt-4">
        <Link :href="props.data.url.back">Go back</Link>

        <Button primary :state="loadingState" dusk="submit-button">Create</Button>
      </div>
    </form>
  </Guest>
</template>
