<script setup>
import { computed } from 'vue';

const props = defineProps({
  state: String,
  dusk: {
    type: String,
    default: '',
  },
  primary: {
    type: Boolean,
    default: false,
  },
});

const localClasses = computed({
  get() {
    return props.primary ? [
      'primary',
    ] : '';
  },
});
</script>

<template>
  <button :class="localClasses" :dusk="dusk" :disabled="state == 'loading' || state == 'disabled'" type="submit">
    <span v-if="props.state == 'loading'"> Loading… </span>

    <span v-if="props.state != 'loading'">
      <slot />
    </span>
  </button>
</template>

<style lang="scss" scoped>
button {
  position: relative;
  background-color: rgb(246, 248, 250);
  display: inline-block;
  padding: 5px 16px;
  font-weight: 500;
  line-height: 20px;
  white-space: nowrap;
  vertical-align: middle;
  cursor: pointer;
  user-select: none;
  border: 1px solid #d6d8da;
  border-radius: 6px;
  box-shadow: rgba(27, 31, 36, 0.04) 0px 1px 0px 0px, rgba(255, 255, 255, 0.25) 0px 1px 0px 0px inset;
  transition: 80ms cubic-bezier(0.33, 1, 0.68, 1);
  transition-property: color,background-color,box-shadow,border-color;

  &:hover {
    background-color: #f3f4f6;
    border-color: rgba(27, 31, 36, 0.15);
    transition-duration: .1s;
    text-decoration: none;
  }

  &:active {
    background-color: hsla(220,14%,93%,1);
    border-color: rgba(27,31,36,0.15);
    transition: none;
  }

  &:focus {
    outline-offset: -2px;
    box-shadow: none;
  }

  &:focus:not(:focus-visible) {
    outline: solid 1px transparent;
  }

  &:disabled {
    color: #8c959f;
    background-color: #f6f8fa;
    border-color: rgba(27,31,36,0.15);
    outline-offset: -2px;
    box-shadow: none;
  }
  &.primary {
    color: #fff;
    background-color: #52a858;
    border-color: #4a8f4f;
    box-shadow: rgba(27, 31, 36, 0.1) 0px 1px 0px 0px, rgba(255, 255, 255, 0.03) 0px 1px 0px 0px inset;

    &:hover {
      background-color: #4e9553;
    }

    &:disabled {
      color: rgba(255,255,255,0.8);
      background-color: #94d3a2;
      border-color: rgba(27,31,36,0.15);
    }
  }
}
</style>
