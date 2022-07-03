<script setup>
import BreezeButton from "@/Components/Button.vue";
import BreezeCheckbox from "@/Components/Checkbox.vue";
import BreezeGuestLayout from "@/Layouts/Guest.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeLabel from "@/Components/Label.vue";
import BreezeValidationErrors from "@/Components/ValidationErrors.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

defineProps({
  canResetPassword: Boolean,
  status: String,
});

const form = useForm({
  email: "",
  password: "",
  remember: false,
});

const submit = () => {
  form.post(route("login"), {
    onFinish: () => form.reset("password"),
  });
};
</script>

<template>
  <BreezeGuestLayout>
    <Head title="Log in" />

    <BreezeValidationErrors class="mb-4" />

    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
      {{ status }}
    </div>

    <form @submit.prevent="submit">
     
        <!-- Card Container -->
        <div
          class="
            flex flex-col
            p-6
            m-3
            w-full
            space-y-5
          "
        >
          <div class="flex flex-col items-center space-y-2">
            <img src="images/must-logo.png" class="w-20" alt="must-logo" />
            <span class="text-2xl font-bold text-center"
              >WIL Evaluation System</span
            >
          </div>
          <input
            type="email"
            placeholder="Email"
            class="
              py-3
              px-4
              text-left text-black
              border
              placeholder:text-left
              border-gray-300
              rounded-md
              placeholder:text-xs
              focus:border-[#4b73b9] focus:outline-none
            "
          />
          <input
            type="password"
            placeholder="Password"
            class="
              py-3
              px-4
              text-left text-black
              border
              placeholder:text-left
              border-gray-300
              rounded-md
              placeholder:text-xs
              focus:border-[#4b73b9] focus:outline-none
            "
          />
          <a
            href="dashboard.html"
            class="
              px-5
              py-4
              text-xs
              transition-all
              text-center
              rounded-md
              text-white
              bg-gradient-to-r
              from-[#4b73b9]
              to-[#213352]
              hover:bg-gradient-to-l
              hover:from-[#4b73b9]
              hover:to-[#213352]
              hover:text-white
              duration-500
            "
          >
            Login
          </a>
        </div>
    </form>
  </BreezeGuestLayout>
</template>
