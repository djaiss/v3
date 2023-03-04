<script setup>
const props = defineProps({
  class: String,
});
</script>

<template>
  <div :class="class">
    <p class="mb-3 mt-1 text-xs text-gray-500 dark:text-gray-300" :for="id">
      <slot />
    </p>
  </div>
</template>
