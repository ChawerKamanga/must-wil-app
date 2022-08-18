<template>
  <Head title="Student Register" />
    <div class="auth-wrapper">
     <div
        class="relative flex flex-col m-6 space-y-10 bg-white shadow-2xl  md:flex-row md:space-y-0 md:m-0"
      >
      <div class="px-10 py-5 space-y-5 w-[800px]">

        <div class="flex flex-col space-y-2">
          <h1 class="font-bold text-xl">Register as a Student</h1>
          <h6 class="text-gray-700 text-sm">Step 1 of 3</h6>
        </div>

        <div class="flex flex-col space-y-2">
          <label for="fullname" class="text-sm font-bold">Fullname</label>
          <input type="text" id="fullname" />
        </div>
  
        <div class="flex flex-col space-y-2">
          <label for="email">Email</label>
          <input type="email" id="email" />
        </div>

         <div class="flex flex-col space-y-2">
          <label for="password">Password</label>
          <input type="password" id="password" />
        </div>

        <div>
            <button class="bg-veryDarkBlue text-white p-4">Next Step</button>
        </div>
      </div>
    </div>
    </div>
</template>

<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
</script>