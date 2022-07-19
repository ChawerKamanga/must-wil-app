<template>
   <Authenticated>
    <Head title="Assessments" />
    <AssessmentsNav />

    <section class="w-full lg:w-10/12 lg:items-center lg:mx-auto space-y-10">
    </section>
  </Authenticated>
</template>

<script setup>
import Authenticated from '@/Layouts/Authenticated.vue';
import AssessmentsNav from '@/Components/AssessmentsNav.vue';
</script>