<script setup>
import { ref, computed } from 'vue';

const props = defineProps({
  class: String,
  inputClass: {
    type: String,
    default: '',
  },
  id: String,
  required: Boolean,
  modelValue: [String, Number],
  type: {
    type: String,
    default: 'text',
  },
  autocomplete: {
    type: String,
    default: 'off',
  },
  autofocus: {
    type: String,
    default: '',
  },
  disabled: {
    type: Boolean,
    default: false,
  },
  maxLength: {
    type: Number,
    default: null,
  },
  placeholder: {
    type: String,
    default: null,
  },
  dusk: {
    type: String,
    default: '',
  },
});

const displayMaxLength = ref(false);

const charactersLeft = computed({
  get() {
    var char = 0;
    if (props.modelValue) {
      char = props.modelValue.length;
    }

    return `${props.maxlength - char} / ${props.maxlength}`;
  },
});

const localInputClasses = computed({
  get() {
    return [
      'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm placeholder:text-gray-600 placeholder:dark:text-gray-400 disabled:bg-slate-50 disabled:dark:bg-slate-900',
      props.inputClass,
    ];
  },
});
</script>

<template>
  <div :class="class">
    <div class="relative">
      <input
        :id="id"
        ref="input"
        :class="localInputClasses"
        :value="modelValue"
        :type="type"
        :maxlength="maxLength"
        :required="required"
        :autocomplete="autocomplete"
        :autofocus="autofocus"
        :disabled="disabled"
        :dusk="dusk"
        :placeholder="placeholder"
        @input="$emit('update:modelValue', $event.target.value)"
        @focus="displayMaxLength = true" />
      <span v-if="maxlength && displayMaxLength" class="length absolute rounded text-xs dark:text-gray-100">
        {{ charactersLeft }}
      </span>
    </div>
  </div>
</template>

<style lang="scss" scoped>
.length {
  top: 10px;
  right: 10px;
  background-color: #e5eeff;
  padding: 3px 4px;
}

@media (prefers-color-scheme: dark) {
  .length {
    background-color: #2d2f33;
  }
}
</style>
