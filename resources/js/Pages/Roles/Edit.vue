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
          class="flex lg:flex-row flex-col space-x-10 space-y-10 lg:space-y-0"
        >
          <form
            @submit.prevent="submit(role.id)"
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
                      v-model="form.name"
                      type="text"
                      required
                      id="name"
                      class="dashboard-textinput"
                    />

                    <div v-if="errors.name" class="text-sm text-red-500">
                      {{ errors.name }}
                    </div>
                  </div>
                </div>

                <div>
                  <label for="description"
                    >Description<sup class="text-red-500">*</sup></label
                  >
                  <textarea
                    id="description"
                    required
                    class="dashboard-textarea"
                    cols="30"
                    rows="10"
                    v-model="form.description"
                  ></textarea>

                  <div v-if="errors.description" class="text-sm text-red-500">
                    {{ errors.description }}
                  </div>
                </div>
              </div>

              <div class="space-y-5">
                <div class="white-card">
                  <div class="px-7 py-5">
                    <div class="space-y-5">
                      <div class="space-y-1">
                        <p>Created At</p>
                        <p class="text-xs text-veryDarkBlue">
                          {{ role.createdAt }}
                        </p>
                      </div>

                      <div class="space-y-1">
                        <p>Last modified At</p>
                        <p class="text-xs text-veryDarkBlue">
                          {{ role.updatedAt }}
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="flex space-x-3">
              <button class="create-btn" type="submit">Update</button>
              <Link :href="route('roles.index')" class="create-secondaryBtn"
                >Cancel</Link
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
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import DashboardTextInput from "@/Components/DashboardTextInput.vue";
import DashboardTextArea from "@/Components/DashboardTextArea.vue";

const props = defineProps({
  errors: Object,
  role: Object,
});

let form = useForm({
  name: props.role.name,
  description: props.role.description,
});

let submit = (id) => {
  form.put(route("roles.update", id));
};
</script>