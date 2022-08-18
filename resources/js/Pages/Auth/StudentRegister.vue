<template>
  <Head title="Student Register" />
    <div class="auth-wrapper">
     <div
        class="relative flex flex-col m-6 space-y-10 bg-white shadow-2xl  md:flex-row md:space-y-0 md:m-0"
      >
      <div class="px-10 py-10 space-y-7 w-[800px]">
        <div class="flex flex-col space-y-2">
          <h1 class="font-bold text-2xl mb-3">Register as a Student</h1>
          <h6 class="text-gray-700 text-sm font-bold">Step 1 of 3</h6>
        </div>

        <div class="flex flex-col space-y-2">
          <label for="fullname" class="form-label">Fullname</label>
          <input type="text" id="fullname" placeholder="Enter your fullname" class="text-xs text-gray-700 py-4" />
        </div>
  
        <div class="flex flex-col space-y-2">
          <label for="email" class="form-label">Email</label>
          <input type="email" id="email" placeholder="Enter your school email" class="text-xs text-gray-700 py-4" />
        </div>

         <div class="flex flex-col space-y-2">
          <label for="password" class="form-label">Password</label>
          <input type="password" id="password" placeholder="Enter your password" class="text-xs text-gray-700 py-4"/>
        </div>

        <div>
            <button class="bg-veryDarkBlue text-white px-4 py-3">Next Step</button>
        </div>
      </div>
    </div>
    </div>
</template>

<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
</script>