<script setup>
const props = defineProps({
  class: String,
  id: String,
  required: Boolean,
});
</script>

<template>
  <div :class="class">
    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-1" :for="id">
      <slot />

      <span v-if="!required" class="optional-badge text-xs">
        optional
      </span>
    </label>
  </div>
</template>

<style lang="scss" scoped>
.optional-badge {
  border-radius: 4px;
  color: #283e59;
  background-color: #edf2f9;
  padding: 1px 3px;
}

@media (prefers-color-scheme: dark) {
  .optional-badge {
    color: #d4d8dd;
    background-color: #2f3031;
  }
}
</style>
