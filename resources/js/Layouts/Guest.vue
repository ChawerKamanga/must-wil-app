<script setup>
import { Link } from "@inertiajs/inertia-vue3";
</script>

<template>
  <div
    class="
      min-h-screen
      flex 
      justify-center
      sm:justify-center
      items-center
      pt-6
      sm:pt-0
      bg-gradient-to-l
      from-[#E3F2F9]
      to-[#ACD5F3]
    "
  >
    <div
      class="
        flex
        flex-col
        items-center
        sm:max-w-md
        rounded-lg
        mt-6
        pr-6
        py-4
        bg-white
        shadow-md
        overflow-hidden
        sm:rounded-lg
        justify-center
      "
    >
      <slot />
    </div>
  </div>
</template>
