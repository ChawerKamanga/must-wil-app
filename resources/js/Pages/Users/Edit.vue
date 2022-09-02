<template>
    <Authenticated>
      <Head title="Update User" />
      <RolesNav>
        <template v-slot:username>
          {{ authUser.name }}
        </template>
  
         <template v-slot:userrole>
          {{ authUserRole.name }}
        </template>
      </RolesNav>
  
      <section class="w-full lg:w-10/12 lg:items-center m-4 mx-auto">
        <div class="container w-full mx-auto px-5 py-5 flex flex-col space-y-5">
          <div>
            <h1 class="text-veryDarkBlue text-3xl font-bold">Edit user</h1>
          </div>
          <div
            class="flex lg:flex-row flex-col space-x-10 space-y-10 lg:space-y-0"
          >
            <form
              @submit.prevent="submit(user.id)"
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
                        >user Name<sup class="text-red-500">*</sup></label
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
                            
                          </p>
                        </div>
  
                        <div class="space-y-1">
                          <p>Last modified At</p>
                          <p class="text-xs text-veryDarkBlue">
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
  import { Head, Link, useForm, usePage } from "@inertiajs/inertia-vue3";
  
  const authUser = usePage().props.value.auth.user;
  const authUserRole = usePage().props.value.auth.user.user;
  
  const props = defineProps({
    errors: Object,
    user: Object,
  });
  
  let form = useForm({
    name: props.user.name,
    description: props.user.description,
  });
  
  let submit = (id) => {
    form.put(route("roles.update", id));
  };
  </script>