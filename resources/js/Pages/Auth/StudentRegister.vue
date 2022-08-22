<template>
  <Head title="Student Register" />
    <div class="auth-wrapper">
     <div
        class="relative flex flex-col m-6 space-y-10   md:flex-row md:space-y-0 md:m-0"
      >
      <div class="min-w-[600px]">
        <div class="flex justify-center items-center mb-5">
            <div class="progress-round bg-veryDarkBlue">1</div>
            <div class="w-48 h-1 bg-gray-100"></div>
            <div class="progress-round bg-gray-500">2</div>
            <div class="w-48 h-1 bg-gray-100"></div>
            <div class="progress-round bg-gray-500">3</div>
        </div>
       <div class="space-y-7 bg-white px-10 py-10  shadow-2xl rounded-lg">
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
          <label for="personal-number" class="form-label">Phonenumber</label>
          <input type="text" id="personal-number" placeholder="Enter your phonenumber" class="text-xs text-gray-700 py-4"/>
        </div>

         <div class="flex flex-col space-y-2">
          <label for="personal-number" class="form-label">Next of Kin</label>
          <input type="text" id="personal-number" placeholder="Enter your phonenumber" class="text-xs text-gray-700 py-4"/>
        </div>

        <div>
            <button class="bg-veryDarkBlue text-white px-4 py-3 rounded">Next Step</button>
        </div>
       </div>
      </div>
    </div>
    </div>
</template>

<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia";

const form = useForm({
  name: "",
  email: "",
  user_name: "",
  address: "",
});

</script>