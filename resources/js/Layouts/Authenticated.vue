<template>
  <main class="bg-lightGray">
     <section class="lg:relative hidden lg:block">
      <div class="flex justify-between">
        <!-- NavBar -->
        <slot />

        <!-- Main Content -->
        
      </div>
    </section>
  </main>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3'
</script>