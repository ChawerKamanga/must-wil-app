<template>
  <main class="bg-lightGray">
     <section class="lg:relative hidden lg:block">
      <div class="flex justify-between">
        
        <slot />
        
      </div>
    </section>
  </main>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3'
</script>