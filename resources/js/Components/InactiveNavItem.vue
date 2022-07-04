<template>
  <div>
    <Link
      :href="route(routeName)"
      class="menu-item-link group inactive-nav-item"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="menu-icon text-gray-300 group-hover:text-darkBlue"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
        stroke-width="2"
      >
        <slot />
      </svg>
      <span class="menu-text text-gray-300 text-xs group-hover:text-darkBlue"
        >{{ itemName }}</span
      >
    </Link>
  </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
  routeName: String,
  itemName: String
});
</script>