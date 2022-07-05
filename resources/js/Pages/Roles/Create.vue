<template>
  <Authenticated>
    <Head title="Create Roles" />
    <RolesNav />

    <section class="w-full lg:w-10/12 lg:items-center m-4 mx-auto">
      <div class="container w-full mx-auto px-5 py-5 flex flex-col space-y-5">
        <div>
          <h1 class="text-veryDarkBlue text-3xl font-bold">Create Role</h1>
        </div>
        <div
          class="
            flex lg:flex-row flex-col space-x-10 space-y-10 lg:space-y-0
          "
        >
          <form
            @submit.prevent="submit"
            method="post"
            class="space-y-7"
          >
            <div class="flex space-x-7">
            <div
              class="
                flex flex-col
                w-[800px]
                space-y-5
                border-gray-200
                bg-white
                p-5
                rounded-lg
              "
            >
              <div
                class="
                  flex flex-col
                  lg:flex-row
                  space-x-0
                  lg:space-x-5
                  space-y-5
                  lg:space-y-0
                "
              >
                <div class="w-full">
                  <label for="name"
                    >Role Name<sup class="text-red-500">*</sup></label
                  >
                  <input
                    type="text"
                    required
                    id="name"
                    v-model="form.name"
                    class="
                      py-2
                      px-4
                      text-left
                      w-full
                      text-gray-700
                      border
                      placeholder:text-left
                      border-gray-300
                      rounded-md
                      placeholder:text-base
                      focus:border-gray-200 focus:outline-none
                    "
                  />

                  <div v-if="errors.name" class="text-sm text-red-500">{{ errors.name }}</div>
                </div>
              </div>

              <div>
                <label for="description"
                  >Description<sup class="text-red-500">*</sup></label
                >
                <textarea
                  id="description"
                  v-model="form.description"
                  required
                  class="
                    py-2
                    px-4
                    text-left
                    w-full
                    text-gray-700
                    border
                    placeholder:text-left
                    border-gray-300
                    rounded-md
                    placeholder:text-base
                    focus:border-gray-200 focus:outline-none
                  "
                  cols="30"
                  rows="10"
                ></textarea>
                <div v-if="errors.description" class="text-sm text-red-500">{{ errors.description }}</div>
              </div>
            </div>

            <div class="space-y-5">
              <div
                class="
                  bg-white
                  p-5
                  shadow-md
                  border
                  w-[400px]
                  border-gray-200
                  rounded-lg
                  space-y-2
                "
              >
                <div class="px-7 py-5">
                  <div class="space-y-5">
                    <div>
                      <p>Created At</p>
                      <p>-</p>
                    </div>

                    <div>
                      <p>Last modified At</p>
                      <p>-</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
        <div class="flex space-x-3">
          <button class="create-btn" type="submit">
            Create
          </button>
          <button
            class="
              bg-none
              border border-gray-300
              text-veryDarkBlue
              py-2
              px-4
              rounded-md
            "
          >
            Create & create another
          </button>
          <a
            href="organization.html"
            class="
              bg-none
              border border-gray-300
              text-veryDarkBlue
              py-2
              px-4
              rounded-md
            "
            >Cancel</a
          >
        </div>
          </form>
        </div>
      </div>
    </section>
  </Authenticated>
</template>

<script setup>
import Authenticated from "@/Layouts/Authenticated.vue";
import RolesNav from "@/Components/RolesNav.vue";
import { ref } from "vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";


defineProps({
  errors: Object
});


let form = useForm({
  name: "",
  description: "",
});

let submit = () => {
  form.post(route('roles.store'));
};
</script>