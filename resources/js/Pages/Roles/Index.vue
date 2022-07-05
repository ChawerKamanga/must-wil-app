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
            <input
              type="text"
              placeholder="Search..."
              v-model="search"
              class="search-input"
            />
            <button @click="erase()" class="px-3 text-gray-500 text-base">
              Reset
            </button>
          </div>
          <!-- Create button -->
          <div>
            <Link
              :href="route('roles.create')"
              class="create-btn hidden lg:block"
              >Create Role</Link
            >
            <a href="organization-create.html" class="create-btn lg:hidden"
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
                  v-for="(role, index) in roles.data"
                  :key="role.id"
                  class="border-b border-gray-200"
                >
                  <th class="text-left">
                    <span class="font-normal">{{ index + 1 }}</span>
                  </th>
                  <td class="text-td">
                    <span>{{ role.name }}</span>
                  </td>
                  <td class="text-td">
                    <span>
                      {{ role.description }}
                    </span>
                  </td>
                  <td class="text-td">
                    {{ role.createdAt }}
                  </td>
                  <td class="text-td relative">
                    <!-- <div
                      class="flex space-x-1 justify-center hover:cursor-pointer bg-white absolute top-0 w-28 z-40"
                    >
                      <div class="bg-gray-500 rounded-sm w-full h-8 text-center">
                        <span class="text-center py-2">Edit</span>
                      </div>
                      
                    </div> -->
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
import { ref, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";
import debounce from "lodash/debounce";
import { Head, Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
  roles: Object,
  filters: Object,
});

let search = ref(props.filters.search);

const erase = () => {
  Inertia.get("/roles");
};

watch(
  search,
  debounce(function (value) {
    Inertia.get(
      "/roles",
      { search: value },
      {
        preserveState: true,
        replace: true,
      }
    );
  }, 300)
);
</script>