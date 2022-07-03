<script setup>
import { onMounted, ref } from "vue";

defineProps(["modelValue"]);

defineEmits(["update:modelValue"]);

const input = ref(null);

onMounted(() => {
  if (input.value.hasAttribute("autofocus")) {
    input.value.focus();
  }
});
</script>

<template>
  <input
    class="
      py-3
      px-4
      text-left text-black
      border
      placeholder:text-left
      border-gray-300
      rounded-md
      placeholder:text-xs
      focus:border-[#4b73b9] focus:outline-none
    "
    :value="modelValue"
    @input="$emit('update:modelValue', $event.target.value)"
    ref="input"
  />
</template>
