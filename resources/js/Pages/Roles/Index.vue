<template>
  <Authenticated>
    <Head title="Dashboard" />
    <RolesNav />

   
  </Authenticated>
</template>

<script setup>
import Authenticated from "@/Layouts/Authenticated.vue";
import RolesNav from "@/Components/RolesNav.vue";
import Head from "@inertiajs/inertia-vue3";
</script>