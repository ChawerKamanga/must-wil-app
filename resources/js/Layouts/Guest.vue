<script setup>
import BreezeApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link } from "@inertiajs/inertia-vue3";
</script>

<template>
  <div
    class="
      min-h-screen
      flex flex-col
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
        w-full
        sm:max-w-md
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
