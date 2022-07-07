<template>
  <main class="bg-lightGray">
     <section class="lg:relative hidden lg:block">
      <div class="flex justify-between">
        
        <slot />
         <div v-if="true" class="text-blue-600">
          {{ $page.props.flash.message }}
          Message
        </div>

        <!-- Main Content -->
        
      </div>
    </section>
  </main>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3'
</script>