<script setup>
import { Link } from '@inertiajs/vue3'

const props = defineProps({
  href: String,
  class: String,
  dusk: {
    type: String,
    default: '',
  },
});
</script>

<template>
  <Link :href="href" :class="class" class="text-blue-500 underline hover:text-blue-800 hover:underline dark:text-gray-400 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"><slot /></Link>
</template>
