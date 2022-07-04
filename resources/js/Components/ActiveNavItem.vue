<template>
  <div class="active-menu-item-wrapper group">
    <Link :href="route(routeName)" class="menu-item-link bg-gray-300">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="menu-icon text-[#344461]"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
        stroke-width="2"
      >
        <slot />
      </svg>
      <span class="menu-text text-[#344461]">{{ itemName }}</span>
    </Link>
  </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
  routeName: String,
  itemName: String,
});
</script>