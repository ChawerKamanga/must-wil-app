<script setup>
defineProps({
  type: {
    type: String,
    default: "submit",
  },
});
</script>

<template>
  <button
    :type="type"
    class="
      px-5
      py-4
      text-xs
      transition-all
      text-center
      rounded-md
      text-white
      bg-gradient-to-r
      from-[#4b73b9]
      to-[#213352]
      hover:bg-gradient-to-l
      hover:from-[#4b73b9]
      hover:to-[#213352]
      hover:text-white
      duration-500
    "
  >
    <slot />
  </button>
</template>
