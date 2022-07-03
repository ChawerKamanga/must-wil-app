<template>
  <Authenticated> 
    <Head title="Dashboard" />
    <DashboardNav />
  </Authenticated>
</template>

<script setup>
import Authenticated from "@/Layouts/Authenticated.vue";
import DashboardNav from "@/Components/DashboardNav.vue";
import Head from "@inertiajs/inertia-vue3";
</script>