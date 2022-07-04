<template>
  <Authenticated>
    <Head title="Roles" />
    <RolesNav />

    <section class="w-full lg:w-11/12 lg:items-center lg:mx-auto space-y-10">
      <div class="container w-full mx-auto px-5 py-5 flex flex-col space-y-10">
        <div>
          <h1 class="text-veryDarkBlue text-3xl font-bold">Roles</h1>
        </div>

        <div class="flex justify-between items-center my-4">
          <!-- Search bar -->
          <div class="flex items-center">
            <input type="text" placeholder="Search..." class="search-input" />
            <a href="#" class="px-3 text-gray-500 text-base">Reset</a>
          </div>
          <!-- Create button -->
          <div>
            <Link
              :href="route('roles.create')"
              class="
                bg-veryDarkBlue
                text-white
                py-3
                px-4
                rounded-md
                hidden
                lg:block
              "
              >Create Role</Link
            >
            <a
              href="organization-create.html"
              class="bg-veryDarkBlue text-white py-2 px-4 rounded-md lg:hidden"
              >Create</a
            >
          </div>
        </div>

        <div class="bg-white rounded-xl w-full">
          <div class="w-full mt-6 flex flex-col space-y-6">
            <table class="items-center w-full bg-transparent border-collapse">
              <thead>
                <tr>
                  <th class="dashboard-th text-left">Index</th>
                  <th class="dashboard-th text-left">Role Name</th>
                  <th class="dashboard-th text-left">Role Description</th>
                  <th class="dashboard-th text-left">Created At</th>
                  <th class="dashboard-th">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr
                  v-for="(role, index) in roles"
                  :key="role.id"
                  class="border-b border-gray-200"
                >
                  <th
                    class="
                      border-t-0
                      px-6
                      align-middle
                      border-l-0 border-r-0
                      text-xs
                      whitespace-nowrap
                      p-4
                      text-left
                    "
                  >
                    <span class="font-normal">{{ index+1 }}</span>
                  </th>
                  <td
                    class="
                      border-t-0
                      px-6
                      align-middle
                      border-l-0 border-r-0
                      text-xs
                      whitespace-nowrap
                      p-4
                    "
                  >
                    <span>{{ role.name }}</span>
                  </td>
                  <td
                    class="
                      border-t-0
                      px-6
                      align-middle
                      border-l-0 border-r-0
                      text-xs
                      whitespace-nowrap
                      p-4
                    "
                  >
                    <span>
                     {{ role.description }}
                    </span>
                  </td>
                  <td
                    class="
                      border-t-0
                      px-6
                      align-middle
                      border-l-0 border-r-0
                      text-xs
                      whitespace-nowrap
                      p-4
                    "
                  >
                    {{ role.createdAt }}
                  </td>
                  <td
                    class="
                      border-t-0
                      px-6
                      align-middle
                      border-l-0 border-r-0
                      text-xs
                      whitespace-nowrap
                      p-4
                    "
                  >
                    <div
                      class="flex space-x-1 justify-center hover:cursor-pointer"
                    >
                      <div class="bg-gray-500 rounded-full w-1 h-1"></div>
                      <div class="bg-gray-500 rounded-full w-1 h-1"></div>
                      <div class="bg-gray-500 rounded-full w-1 h-1"></div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </Authenticated>
</template>

<script setup>
import Authenticated from "@/Layouts/Authenticated.vue";
import RolesNav from "@/Components/RolesNav.vue";
import {Head, Link} from "@inertiajs/inertia-vue3";

const props = defineProps({
  roles: Array,
});
</script>